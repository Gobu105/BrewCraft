<?php

class SuperAdminController {
    
    private function checkAuth() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }
    
    public function index() {
        $this->checkAuth();
        
        $stats = [
            'shops' => 1,
            'users' => 3,
            'orders' => 0,
            'gmv' => 0
        ];
        
        ob_start();
        require_once __DIR__ . '/../views/superadmin/dashboard.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/super_admin.php';
    }

    public function users() {
        $this->checkAuth();
        
        $users = [
            ['id' => 1, 'name' => 'Super Admin', 'email' => 'admin@brewcraft.com', 'role' => 'Admin', 'created_at' => 'May 27, 2026'],
            ['id' => 2, 'name' => 'Maya Chen', 'email' => 'owner@brewcraft.com', 'role' => 'Owner', 'created_at' => 'May 27, 2026'],
            ['id' => 3, 'name' => 'Alex Rivera', 'email' => 'customer@brewcraft.com', 'role' => 'Customer', 'created_at' => 'May 27, 2026']
        ];
        
        ob_start();
        require_once __DIR__ . '/../views/superadmin/users.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/super_admin.php';
    }

    public function shops() {
        $this->checkAuth();
        
        $shops = [
            ['id' => 1, 'name' => 'Sightglass Coffee', 'owner' => 'Maya Chen', 'created_at' => 'May 27, 2026', 'status' => 'Active']
        ];
        
        ob_start();
        require_once __DIR__ . '/../views/superadmin/shops.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/super_admin.php';
    }
}
