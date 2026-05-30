<?php
require 'c:/Project/BrewCraft/config/database.php';
$db = (new Database())->getConnection();
$stmt = $db->query("SELECT email, role FROM users WHERE role = 'admin' OR role = 'super_admin'");
print_r($stmt->fetchAll());
?>
