<?php

class ShopAdminController {
    
    private function checkAuth() {
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['owner', 'shop_owner'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }
    
    private function getShopId($db) {
        $stmt = $db->prepare("SELECT id FROM shops WHERE owner_id = :owner_id LIMIT 1");
        $stmt->bindParam(':owner_id', $_SESSION['user_id']);
        $stmt->execute();
        $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // If shop doesn't exist, create a default one
        if (!$shop) {
            $name = $_SESSION['name'] . "'s Shop";
            $ins = $db->prepare("INSERT INTO shops (owner_id, name) VALUES (:owner_id, :name)");
            $ins->bindParam(':owner_id', $_SESSION['user_id']);
            $ins->bindParam(':name', $name);
            $ins->execute();
            return $db->lastInsertId();
        }
        
        return $shop['id'];
    }

    public function index() {
        $this->checkAuth();
        
        $database = new Database();
        $db = $database->getConnection();
        $shop_id = $this->getShopId($db);
        
        // Dashboard Stats
        $stats = [
            'revenue' => 0,
            'orders' => 0,
            'customers' => 0,
            'pending' => 0
        ];
        
        $stmt = $db->prepare("SELECT COUNT(*) as cnt, SUM(total_price) as rev FROM orders WHERE shop_id = :shop_id");
        $stmt->bindParam(':shop_id', $shop_id);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $stats['orders'] = $res['cnt'] ?? 0;
        $stats['revenue'] = $res['rev'] ?? 0;
        
        ob_start();
        require_once __DIR__ . '/../views/admin/dashboard.php';
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../views/layouts/admin.php';
    }
    
    
    public function categories() {
        $this->checkAuth();
        $db = (new Database())->getConnection();
        $shop_id = $this->getShopId($db);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            if ($name) {
                $stmt = $db->prepare("INSERT INTO categories (shop_id, name) VALUES (?, ?)");
                $stmt->execute([$shop_id, $name]);
            }
            header("Location: " . BASE_URL . "/admin/categories");
            exit;
        }
        
        $stmt = $db->prepare("SELECT * FROM categories WHERE shop_id = ?");
        $stmt->execute([$shop_id]);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ob_start();
        require_once __DIR__ . '/../views/admin/categories.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/admin.php';
    }

    public function products() {
        $this->checkAuth();
        $db = (new Database())->getConnection();
        $shop_id = $this->getShopId($db);
        
        $stmt = $db->prepare("SELECT * FROM categories WHERE shop_id = ?");
        $stmt->execute([$shop_id]);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $cat_id = $_POST['category_id'] ?? null;
            if ($name) {
                $stmt = $db->prepare("INSERT INTO products (shop_id, category_id, name, price) VALUES (?, ?, ?, ?)");
                $stmt->execute([$shop_id, $cat_id, $name, $price]);
            }
            header("Location: " . BASE_URL . "/admin/products");
            exit;
        }
        
        $stmt = $db->prepare("SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.shop_id = ?");
        $stmt->execute([$shop_id]);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ob_start();
        require_once __DIR__ . '/../views/admin/products.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/admin.php';
    }

    public function orders() {
        $this->checkAuth();
        $db = (new Database())->getConnection();
        $shop_id = $this->getShopId($db);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order_id = $_POST['order_id'];
            $status = $_POST['status'];
            $stmt = $db->prepare("UPDATE orders SET status = ? WHERE id = ? AND shop_id = ?");
            $stmt->execute([$status, $order_id, $shop_id]);
            header("Location: " . BASE_URL . "/admin/orders");
            exit;
        }
        
        $stmt = $db->prepare("SELECT o.*, u.name as customer_name FROM orders o JOIN users u ON o.customer_id = u.id WHERE o.shop_id = ? ORDER BY o.created_at DESC");
        $stmt->execute([$shop_id]);
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ob_start();
        require_once __DIR__ . '/../views/admin/orders.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/admin.php';
    }

    public function settings() {
        $this->checkAuth();
        $db = (new Database())->getConnection();
        $shop_id = $this->getShopId($db);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $address = $_POST['address'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $theme_color = $_POST['theme_color'] ?? '#4a3320';
            
            // Handle logo upload
            $logo = $_POST['current_logo'] ?? 'default_logo.png';
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
                $upload_dir = __DIR__ . '/../../public/uploads/shops/';
                if(!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
                $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $logo = 'logo_' . uniqid() . '.' . $ext;
                move_uploaded_file($_FILES['logo']['tmp_name'], $upload_dir . $logo);
            }
            
            // Handle banner upload
            $banner = $_POST['current_banner'] ?? 'default_banner.jpg';
            if (isset($_FILES['banner']) && $_FILES['banner']['error'] == 0) {
                $upload_dir = __DIR__ . '/../../public/uploads/shops/';
                if(!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
                $ext = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
                $banner = 'banner_' . uniqid() . '.' . $ext;
                move_uploaded_file($_FILES['banner']['tmp_name'], $upload_dir . $banner);
            }
            
            $stmt = $db->prepare("UPDATE shops SET name=?, description=?, address=?, phone=?, theme_color=?, logo=?, banner=? WHERE id=?");
            $stmt->execute([$name, $description, $address, $phone, $theme_color, $logo, $banner, $shop_id]);
            
            $_SESSION['success_msg'] = "Shop settings updated successfully!";
            header("Location: " . BASE_URL . "/owner/settings");
            exit;
        }
        
        $stmt = $db->prepare("SELECT * FROM shops WHERE id = ?");
        $stmt->execute([$shop_id]);
        $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        
        ob_start();
        require_once __DIR__ . '/../views/admin/settings.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/admin.php';
    }
}
