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
        
        ob_start();
        echo "<div class='p-5'><h1 class='fw-bold text-primary mb-2' style='font-family: Playfair Display, serif;'>Account Settings</h1><p class='text-muted fs-5'>Manage your profile</p></div>";
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/customer.php';
    }
}
