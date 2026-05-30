<?php

class AuthController {
    
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $database = new Database();
            $db = $database->getConnection();
            
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['success_login'] = true;
                
                header("Location: " . BASE_URL . "/");
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password.";
                header("Location: " . BASE_URL . "/login");
                exit();
            }
        }
        
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $role = isset($_POST['role']) && $_POST['role'] === 'owner' ? 'owner' : 'customer';
            
            $database = new Database();
            $db = $database->getConnection();
            
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            try {
                $stmt = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->bindParam(':role', $role);
                $stmt->execute();
                
                $_SESSION['success_login'] = true;
                $_SESSION['name'] = $name;
                $_SESSION['role'] = $role;
                $_SESSION['user_id'] = $db->lastInsertId();
                $_SESSION['email'] = $email;
                
                header("Location: " . BASE_URL . "/");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Registration failed. Email might already exist.";
                header("Location: " . BASE_URL . "/register");
                exit();
            }
        }
        
        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: " . BASE_URL . "/");
        exit();
    }
}
