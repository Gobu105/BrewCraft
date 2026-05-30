<?php

class CartController {
    public function index() {
        $user = null;
        if(isset($_SESSION['user_id'])) {
            $db = (new Database())->getConnection();
            $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_OBJ);
        }
        require_once __DIR__ . '/../views/cart/index.php';
    }
    
    public function add() {
        $id = $_GET['id'] ?? 0;
        
        $database = new Database();
        $db = $database->getConnection();
        
        $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product) {
            if(!isset($_SESSION['cart_items'])) {
                $_SESSION['cart_items'] = [];
            }
            if(!isset($_SESSION['cart_items'][$id])) {
                $_SESSION['cart_items'][$id] = [
                    'product' => $product,
                    'quantity' => 1
                ];
            } else {
                $_SESSION['cart_items'][$id]['quantity']++;
            }
        }
        echo "OK";
    }
    
    public function update() {
        $id = $_GET['id'] ?? 0;
        $change = (int)($_GET['change'] ?? 0);
        
        if(isset($_SESSION['cart_items'][$id])) {
            $_SESSION['cart_items'][$id]['quantity'] += $change;
            if($_SESSION['cart_items'][$id]['quantity'] <= 0) {
                unset($_SESSION['cart_items'][$id]);
            }
        }
        echo "OK";
    }

    public function remove() {
        $id = $_GET['id'] ?? 0;
        if(isset($_SESSION['cart_items'][$id])) {
            unset($_SESSION['cart_items'][$id]);
        }
        echo "OK";
    }
    
    public function checkout() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isset($_SESSION['user_id'])) {
                header("Location: " . BASE_URL . "/login");
                exit;
            }
            
            if(empty($_SESSION['cart_items'])) {
                header("Location: " . BASE_URL . "/");
                exit;
            }
            
            $db = (new Database())->getConnection();
            $first_item = reset($_SESSION['cart_items']);
            $shop_id = $first_item['product']['shop_id'];
            $total = 0;
            foreach($_SESSION['cart_items'] as $item) {
                $total += $item['product']['price'] * $item['quantity'];
            }
            
            $delivery_address = $_POST['delivery_address'] ?? '';
            $save_address = isset($_POST['save_address']) ? 1 : 0;
            
            if ($save_address && !empty($delivery_address)) {
                $stmt = $db->prepare("UPDATE users SET address = ? WHERE id = ?");
                $stmt->execute([$delivery_address, $_SESSION['user_id']]);
            }
            
            $stmt = $db->prepare("INSERT INTO orders (customer_id, shop_id, total_price, status, delivery_address) VALUES (?, ?, ?, 'pending', ?)");
            $stmt->execute([$_SESSION['user_id'], $shop_id, $total, $delivery_address]);
            $order_id = $db->lastInsertId();
            
            foreach($_SESSION['cart_items'] as $item) {
                $stmt = $db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
                $stmt->execute([$order_id, $item['product']['id'], $item['quantity'], $item['product']['price']]);
            }
            
            $_SESSION['cart_items'] = []; // Clear cart
            
            ob_start();
            require_once __DIR__ . '/../views/cart/checkout_success.php';
            $content = ob_get_clean();
            
            require_once __DIR__ . '/../views/layouts/header.php';
            echo $content;
            require_once __DIR__ . '/../views/layouts/footer.php';
        }
    }
}
