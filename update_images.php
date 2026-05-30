<?php
require_once 'c:/Project/BrewCraft/config/database.php';
$db = (new Database())->getConnection();
$db->exec("UPDATE shops SET logo = 'logo.png', banner = 'banner.png'");
$db->exec("UPDATE products SET image = 'coffee.png' WHERE category_id IN (SELECT id FROM categories WHERE name IN ('Hot Beverages', 'Espresso Bar', 'Cold Brews'))");
$db->exec("UPDATE products SET image = 'pastry.png' WHERE category_id IN (SELECT id FROM categories WHERE name IN ('Snacks', 'Desserts', 'Quick Bites'))");
echo "Images assigned successfully!";
?>
