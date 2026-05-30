<?php

require_once __DIR__ . '/../models/Product.php';

class MenuController {
    public function index() {
        // Initialize DB connection
        $database = new Database();
        $db = $database->getConnection();

        // Fetch products
        $product = new Product($db);
        $stmt = $product->getAll();
        
        $products = [];
        if ($stmt->rowCount() > 0) {
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Render menu view
        require_once __DIR__ . '/../views/menu/index.php';
    }
}
