<?php
require_once __DIR__ . '/config/database.php';
$db = (new Database())->getConnection();

// First, let's truncate existing data to prevent duplicates
$db->exec("SET FOREIGN_KEY_CHECKS = 0;");
$db->exec("TRUNCATE TABLE order_items;");
$db->exec("TRUNCATE TABLE orders;");
$db->exec("TRUNCATE TABLE products;");
$db->exec("TRUNCATE TABLE categories;");
$db->exec("TRUNCATE TABLE shops;");
$db->exec("DELETE FROM users WHERE role != 'super_admin';");
$db->exec("SET FOREIGN_KEY_CHECKS = 1;");

// Then import the Pune data
$sql = file_get_contents(__DIR__ . '/database/pune_dummy_data.sql');

try {
    $db->exec($sql);
    echo "Successfully imported Pune dummy data!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
