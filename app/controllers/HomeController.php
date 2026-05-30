<?php
class HomeController {
    public function index() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new Database();
        $db = $database->getConnection();
        
        // Fetch featured shops (up to 6)
        $stmt = $db->query("SELECT * FROM shops LIMIT 6");
        $featuredShops = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        require_once __DIR__ . '/../views/home/index.php';
    }
}
