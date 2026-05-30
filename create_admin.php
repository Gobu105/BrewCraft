<?php
require 'c:/Project/BrewCraft/config/database.php';
$db = (new Database())->getConnection();
$hash = password_hash('password123', PASSWORD_DEFAULT);
$db->exec("INSERT INTO users (name, email, password, role) VALUES ('Super Admin', 'admin@brewcraft.com', '$hash', 'admin')");
echo "Admin created successfully!";
?>
