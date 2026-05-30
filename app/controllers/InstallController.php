<?php

class InstallController {
    public function index() {
        require_once __DIR__ . '/../../config/database.php';
        $db = new Database();
        
        try {
            $conn = $db->getConnection();
            
            // Drop existing tables to start fresh for V2
            $conn->exec("DROP TABLE IF EXISTS order_items, orders, favorites, reviews, products, categories, shops, users");
            
            // 1. Users Table
            $conn->exec("CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                role ENUM('customer', 'owner', 'admin') DEFAULT 'customer',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");
            
            // 2. Shops Table
            $conn->exec("CREATE TABLE shops (
                id INT AUTO_INCREMENT PRIMARY KEY,
                owner_id INT NOT NULL,
                name VARCHAR(100) NOT NULL,
                description TEXT,
                address VARCHAR(255),
                phone VARCHAR(20),
                logo VARCHAR(255) DEFAULT 'default_logo.png',
                banner VARCHAR(255) DEFAULT 'default_banner.jpg',
                theme_color VARCHAR(20) DEFAULT '#4a3320',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (owner_id) REFERENCES users(id) ON DELETE CASCADE
            )");
            
            // 3. Categories Table
            $conn->exec("CREATE TABLE categories (
                id INT AUTO_INCREMENT PRIMARY KEY,
                shop_id INT NOT NULL,
                name VARCHAR(50) NOT NULL,
                FOREIGN KEY (shop_id) REFERENCES shops(id) ON DELETE CASCADE
            )");
            
            // 4. Products Table
            $conn->exec("CREATE TABLE products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                shop_id INT NOT NULL,
                category_id INT,
                name VARCHAR(100) NOT NULL,
                description TEXT,
                price DECIMAL(10,2) NOT NULL,
                image VARCHAR(255) DEFAULT 'default_product.jpg',
                in_stock BOOLEAN DEFAULT TRUE,
                FOREIGN KEY (shop_id) REFERENCES shops(id) ON DELETE CASCADE,
                FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
            )");
            
            // 5. Orders Table
            $conn->exec("CREATE TABLE orders (
                id INT AUTO_INCREMENT PRIMARY KEY,
                customer_id INT NOT NULL,
                shop_id INT NOT NULL,
                total_price DECIMAL(10,2) NOT NULL,
                status ENUM('pending', 'accepted', 'preparing', 'ready', 'completed', 'cancelled') DEFAULT 'pending',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE,
                FOREIGN KEY (shop_id) REFERENCES shops(id) ON DELETE CASCADE
            )");
            
            // 6. Order Items Table
            $conn->exec("CREATE TABLE order_items (
                id INT AUTO_INCREMENT PRIMARY KEY,
                order_id INT NOT NULL,
                product_id INT NOT NULL,
                quantity INT NOT NULL,
                price DECIMAL(10,2) NOT NULL,
                FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
                FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
            )");
            
            // 7. Reviews Table
            $conn->exec("CREATE TABLE reviews (
                id INT AUTO_INCREMENT PRIMARY KEY,
                shop_id INT NOT NULL,
                customer_id INT NOT NULL,
                rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
                comment TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (shop_id) REFERENCES shops(id) ON DELETE CASCADE,
                FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE
            )");

            // Create default Super Admin
            $hashed = password_hash('admin123', PASSWORD_DEFAULT);
            $conn->exec("INSERT INTO users (name, email, password, role) VALUES ('Super Admin', 'admin@brewcraft.com', '$hashed', 'admin')");
            
            echo "BrewCraft 2.0 Database successfully migrated!";
            
        } catch(PDOException $e) {
            echo "Migration failed: " . $e->getMessage();
        }
    }
}
