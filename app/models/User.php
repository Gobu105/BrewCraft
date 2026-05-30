<?php

class User {
    private $conn;
    private $table_name = "customers";

    public $customer_id;
    public $name;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Login Method
    public function login($email, $password) {
        // Warning: This checks plain text password based on original code.
        // It should be upgraded to use password_verify() as per the project goals.
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email AND password = :password LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->customer_id = $row['customer_id'];
            $this->name = $row['name'];
            $this->email = $row['email'];
            return true;
        }
        
        return false;
    }
}
