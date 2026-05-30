<?php
require 'c:/Project/BrewCraft/config/database.php';
$db = (new Database())->getConnection();
$stmt = $db->query("SELECT email, role FROM users");
print_r($stmt->fetchAll());
?>
