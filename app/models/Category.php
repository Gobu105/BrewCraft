<?php
class Category {
    private $conn;
    private $table_name = "categories";

    public $id;
    public $shop_id;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET shop_id=:shop_id, name=:name";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":shop_id", $this->shop_id);
        $stmt->bindParam(":name", $this->name);
        return $stmt->execute();
    }

    public function readByShop($shop_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE shop_id = ? ORDER BY name ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$shop_id]);
        return $stmt;
    }
    
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }
}
