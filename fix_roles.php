<?php
require 'c:/Project/BrewCraft/config/database.php';
$db = (new Database())->getConnection();
$db->exec("UPDATE users SET role = 'owner' WHERE email IN ('rahul@fcroad.com', 'priya@kpcafe.com', 'amit@vimannagar.com')");
echo "Roles fixed successfully!";
?>
