<?php
class Order {
    private $conn;
    private $table_name = "orders";
    private $items_table = "order_items";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createOrder($customer_id, $shop_id, $total_price, $cart_items) {
        try {
            $this->conn->beginTransaction();

            $query = "INSERT INTO " . $this->table_name . " (customer_id, shop_id, total_price) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$customer_id, $shop_id, $total_price]);
            
            $order_id = $this->conn->lastInsertId();

            $item_query = "INSERT INTO " . $this->items_table . " (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
            $item_stmt = $this->conn->prepare($item_query);

            foreach($cart_items as $item) {
                $item_stmt->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);
            }

            $this->conn->commit();
            return $order_id;
        } catch(PDOException $e) {
            $this->conn->rollBack();
            return false;
        }
    }
}
