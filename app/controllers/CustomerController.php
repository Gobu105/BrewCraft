<?php

class CustomerController {
    
    private function checkAuth() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }
    
    public function index() {
        header("Location: " . BASE_URL . "/customer/orders");
        exit();
    }

    public function orders() {
        $this->checkAuth();
        
        $orders = [
            ['id' => '1042', 'shop' => 'Sightglass Coffee', 'date' => 'May 28, 2026', 'total' => 12.50, 'status' => 'Completed'],
            ['id' => '1048', 'shop' => 'Ritual Roasters', 'date' => 'May 29, 2026', 'total' => 5.25, 'status' => 'Processing']
        ];
        
        ob_start();
        require_once __DIR__ . '/../views/customer/orders.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/customer.php';
    }

    public function settings() {
        $this->checkAuth();
        
        $db = (new Database())->getConnection();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';
            
            $stmt = $db->prepare("UPDATE users SET name = ?, phone = ?, address = ? WHERE id = ?");
            $stmt->execute([$name, $phone, $address, $_SESSION['user_id']]);
            
            $_SESSION['name'] = $name;
            $_SESSION['success_msg'] = "Profile updated successfully!";
            header("Location: " . BASE_URL . "/customer/settings");
            exit;
        }
        
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        
        ob_start();
        require_once __DIR__ . '/../views/customer/settings.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/customer.php';
    }
}
