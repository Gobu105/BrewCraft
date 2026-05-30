<?php
require_once __DIR__ . '/config/database.php';
$db = (new Database())->getConnection();
$hash = password_hash('password123', PASSWORD_DEFAULT);
$db->exec("UPDATE users SET password = '$hash'");
echo "Passwords updated successfully!";
?>
