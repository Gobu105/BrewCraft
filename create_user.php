<?php
require_once __DIR__ . '/config/database.php';
$db = (new Database())->getConnection();

// Create owner
$hash = password_hash('password123', PASSWORD_DEFAULT);
$db->exec("DELETE FROM users WHERE email='owner@brewcraft.com'");
$stmt = $db->prepare("INSERT INTO users (name, email, password, role) VALUES ('Test Owner', 'owner@brewcraft.com', ?, 'owner')");
$stmt->execute([$hash]);
$ownerId = $db->lastInsertId();

// Ensure shop exists for owner
$db->exec("DELETE FROM shops WHERE owner_id = " . $ownerId);
$db->exec("INSERT INTO shops (owner_id, name) VALUES ($ownerId, 'Test Shop')");

// Create super admin
$db->exec("DELETE FROM users WHERE email='admin@brewcraft.com'");
$stmt2 = $db->prepare("INSERT INTO users (name, email, password, role) VALUES ('Super Admin', 'admin@brewcraft.com', ?, 'admin')");
$stmt2->execute([$hash]);

// Create customer
$db->exec("DELETE FROM users WHERE email='customer@brewcraft.com'");
$stmt3 = $db->prepare("INSERT INTO users (name, email, password, role) VALUES ('Test Customer', 'customer@brewcraft.com', ?, 'customer')");
$stmt3->execute([$hash]);

echo 'Accounts created successfully!';
