<?php
class Shop {
    private $conn;
    private $table_name = "shops";

    public $shop_id;
    public $owner_id;
    public $shop_name;
    public $description;
    public $logo_url;
    public $banner_url;
    public $theme_color;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getShopByOwnerId($owner_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE owner_id = :owner_id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':owner_id', $owner_id);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->shop_id = $row['shop_id'];
            $this->shop_name = $row['shop_name'];
            $this->theme_color = $row['theme_color'];
            return true;
        }
        return false;
    }
}
