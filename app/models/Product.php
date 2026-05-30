<?php
class Product {
    private $conn;
    private $table_name = "menu";

    public $item_id;
    public $item_name;
    public $price;
    public $description;
    public $image_url;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
