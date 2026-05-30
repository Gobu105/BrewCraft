<?php
require_once __DIR__ . '/config/database.php';
$db = (new Database())->getConnection();

// Create dummy shop
$db->exec("INSERT IGNORE INTO users (id, name, email, password, role) VALUES (2, 'Owner', 'owner@test.com', 'pass', 'owner')");
$db->exec("INSERT IGNORE INTO shops (id, owner_id, name) VALUES (1, 2, 'Test Shop')");
$db->exec("INSERT IGNORE INTO categories (id, shop_id, name) VALUES (1, 1, 'Coffee')");
$db->exec("INSERT IGNORE INTO products (id, shop_id, category_id, name, price) VALUES (1, 1, 1, 'Latte', 4.50)");

echo "Dummy data created.\n";

// Test dashboard
session_start();
$_SESSION['user_id'] = 2;
$_SESSION['role'] = 'owner';
$_SERVER['REQUEST_URI'] = '/admin/dashboard';
$_SERVER['SCRIPT_NAME'] = '/index.php';
ob_start();
require 'index.php';
$output = ob_get_clean();
if (strpos($output, '500 Internal') !== false || strpos($output, 'Fatal error') !== false || strpos($output, '404 Not Found') !== false) {
    echo "Dashboard Error: " . substr($output, 0, 500) . "\n";
} else {
    echo "Dashboard OK.\n";
}

// Test cart
$_SERVER['REQUEST_URI'] = '/addToCart?id=1';
$_GET['id'] = 1;
ob_start();
require 'index.php';
$output = ob_get_clean();
echo "Cart add: " . $output . "\n";
print_r($_SESSION['cart_items']);
