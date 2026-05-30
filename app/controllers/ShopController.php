<?php

class ShopController {
    public function index() {
        $database = new Database();
        $db = $database->getConnection();
        
        $search = $_GET['search'] ?? '';
        
        $query = "SELECT s.*, 
                 (SELECT COUNT(*) FROM products p WHERE p.shop_id = s.id AND p.in_stock = 1) as product_count
                 FROM shops s";
                 
        if ($search) {
            $query .= " WHERE s.name LIKE :search OR s.address LIKE :search";
        }
        
        $stmt = $db->prepare($query);
        
        if ($search) {
            $searchTerm = "%$search%";
            $stmt->bindParam(':search', $searchTerm);
        }
        
        $stmt->execute();
        $shops = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        require_once __DIR__ . '/../views/shop/index.php';
    }

    public function show() {
        $id = $_GET['id'] ?? 0;
        
        $database = new Database();
        $db = $database->getConnection();
        
        // Fetch Shop
        $stmt = $db->prepare("SELECT * FROM shops WHERE id = ?");
        $stmt->execute([$id]);
        $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$shop) {
            header("Location: " . BASE_URL . "/");
            exit;
        }
        
        // Fetch Categories
        $stmt = $db->prepare("SELECT * FROM categories WHERE shop_id = ?");
        $stmt->execute([$id]);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Fetch Products
        $stmt = $db->prepare("SELECT * FROM products WHERE shop_id = ? AND in_stock = 1");
        $stmt->execute([$id]);
        $all_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Group products by category
        $products_by_category = [];
        foreach ($all_products as $p) {
            $cat_id = $p['category_id'] ?: 0;
            if (!isset($products_by_category[$cat_id])) {
                $products_by_category[$cat_id] = [];
            }
            $products_by_category[$cat_id][] = $p;
        }
        
        require_once __DIR__ . '/../views/shop/show.php';
    }
}
