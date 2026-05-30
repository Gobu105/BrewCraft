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
        $db = (new Database())->getConnection();
        
        $stats = ['shops' => 0, 'users' => 0, 'orders' => 0, 'gmv' => 0];
        
        $stmt = $db->query("SELECT COUNT(*) FROM shops");
        $stats['shops'] = $stmt->fetchColumn();
        
        $stmt = $db->query("SELECT COUNT(*) FROM users");
        $stats['users'] = $stmt->fetchColumn();
        
        $stmt = $db->query("SELECT COUNT(*) FROM orders");
        $stats['orders'] = $stmt->fetchColumn();
        
        $stmt = $db->query("SELECT SUM(total_price) FROM orders WHERE status = 'completed'");
        $stats['gmv'] = $stmt->fetchColumn() ?: 0;
        
        ob_start();
        require_once __DIR__ . '/../views/superadmin/dashboard.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/super_admin.php';
    }

    public function users() {
        $this->checkAuth();
        $db = (new Database())->getConnection();
        
        $stmt = $db->query("SELECT * FROM users ORDER BY created_at DESC");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ob_start();
        require_once __DIR__ . '/../views/superadmin/users.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/super_admin.php';
    }

    public function shops() {
        $this->checkAuth();
        $db = (new Database())->getConnection();
        
        $stmt = $db->query("SELECT s.*, u.name as owner FROM shops s JOIN users u ON s.owner_id = u.id ORDER BY s.created_at DESC");
        $shops = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($shops as &$s) {
            $s['status'] = 'Active';
        }
        
        ob_start();
        require_once __DIR__ . '/../views/superadmin/shops.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/super_admin.php';
    }
}
