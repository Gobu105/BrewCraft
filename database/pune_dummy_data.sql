-- Pune Dummy Data for BrewCraft
-- Run this in phpMyAdmin to populate your database with Pune-based shops and products.
-- Note: All passwords are set to: password123

-- 1. Insert Shop Owners
INSERT INTO users (name, email, password, role, address, phone) VALUES 
('Rahul Deshmukh', 'rahul@fcroad.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'shop_owner', 'Shivajinagar, Pune', '+91 9876543210'),
('Priya Kulkarni', 'priya@kpcafe.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'shop_owner', 'Koregaon Park, Pune', '+91 9876543211'),
('Amit Joshi', 'amit@vimannagar.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'shop_owner', 'Viman Nagar, Pune', '+91 9876543212');

-- 2. Insert Shops (Using subqueries to dynamically fetch owner_id)
INSERT INTO shops (owner_id, name, description, address, phone, theme_color, logo, banner) VALUES 
((SELECT id FROM users WHERE email='rahul@fcroad.com'), 'FC Road Roasters', 'Authentic filter coffee and fresh bakes on FC Road.', 'Fergusson College Rd, Shivajinagar, Pune, Maharashtra 411004', '+91 8000011111', '#8B4513', 'default_logo.png', 'default_banner.jpg'),
((SELECT id FROM users WHERE email='priya@kpcafe.com'), 'Koregaon Park Cafe', 'Premium espressos and a quiet ambiance in KP.', 'Lane 6, Koregaon Park, Pune, Maharashtra 411001', '+91 8000022222', '#2F4F4F', 'default_logo.png', 'default_banner.jpg'),
((SELECT id FROM users WHERE email='amit@vimannagar.com'), 'Viman Nagar Coffee House', 'Your friendly neighborhood cafe for cold brews and snacks.', 'Datta Mandir Chowk, Viman Nagar, Pune, Maharashtra 411014', '+91 8000033333', '#CD853F', 'default_logo.png', 'default_banner.jpg');

-- 3. Insert Categories
INSERT INTO categories (shop_id, name) VALUES 
((SELECT id FROM shops WHERE name='FC Road Roasters'), 'Hot Beverages'),
((SELECT id FROM shops WHERE name='FC Road Roasters'), 'Snacks'),
((SELECT id FROM shops WHERE name='Koregaon Park Cafe'), 'Espresso Bar'),
((SELECT id FROM shops WHERE name='Koregaon Park Cafe'), 'Desserts'),
((SELECT id FROM shops WHERE name='Viman Nagar Coffee House'), 'Cold Brews'),
((SELECT id FROM shops WHERE name='Viman Nagar Coffee House'), 'Quick Bites');

-- 4. Insert Products
-- FC Road Roasters
INSERT INTO products (shop_id, category_id, name, description, price, in_stock) VALUES 
((SELECT id FROM shops WHERE name='FC Road Roasters'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='FC Road Roasters') AND name='Hot Beverages'), 'Authentic Filter Coffee', 'Traditional South Indian filter coffee.', 60.00, 1),
((SELECT id FROM shops WHERE name='FC Road Roasters'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='FC Road Roasters') AND name='Hot Beverages'), 'Irani Chai', 'Classic Pune-style Irani Chai.', 40.00, 1),
((SELECT id FROM shops WHERE name='FC Road Roasters'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='FC Road Roasters') AND name='Snacks'), 'Bun Maska', 'Freshly baked bun with generous butter.', 50.00, 1),
((SELECT id FROM shops WHERE name='FC Road Roasters'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='FC Road Roasters') AND name='Snacks'), 'Kanda Poha', 'Maharashtrian style flattened rice snack.', 45.00, 1);

-- Koregaon Park Cafe
INSERT INTO products (shop_id, category_id, name, description, price, in_stock) VALUES 
((SELECT id FROM shops WHERE name='Koregaon Park Cafe'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='Koregaon Park Cafe') AND name='Espresso Bar'), 'Cortado', 'Equal parts espresso and steamed milk.', 150.00, 1),
((SELECT id FROM shops WHERE name='Koregaon Park Cafe'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='Koregaon Park Cafe') AND name='Espresso Bar'), 'Flat White', 'Smooth espresso with microfoam milk.', 180.00, 1),
((SELECT id FROM shops WHERE name='Koregaon Park Cafe'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='Koregaon Park Cafe') AND name='Desserts'), 'Blueberry Cheesecake', 'Classic cheesecake topped with blueberries.', 220.00, 1),
((SELECT id FROM shops WHERE name='Koregaon Park Cafe'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='Koregaon Park Cafe') AND name='Desserts'), 'Chocolate Croissant', 'Flaky, buttery croissant with chocolate center.', 140.00, 1);

-- Viman Nagar Coffee House
INSERT INTO products (shop_id, category_id, name, description, price, in_stock) VALUES 
((SELECT id FROM shops WHERE name='Viman Nagar Coffee House'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='Viman Nagar Coffee House') AND name='Cold Brews'), 'Signature Cold Brew', 'Steeped for 24 hours for a smooth finish.', 200.00, 1),
((SELECT id FROM shops WHERE name='Viman Nagar Coffee House'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='Viman Nagar Coffee House') AND name='Cold Brews'), 'Vanilla Iced Latte', 'Espresso, milk, and vanilla syrup over ice.', 190.00, 1),
((SELECT id FROM shops WHERE name='Viman Nagar Coffee House'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='Viman Nagar Coffee House') AND name='Quick Bites'), 'Peri Peri Fries', 'Crispy fries tossed in spicy peri peri mix.', 120.00, 1),
((SELECT id FROM shops WHERE name='Viman Nagar Coffee House'), (SELECT id FROM categories WHERE shop_id=(SELECT id FROM shops WHERE name='Viman Nagar Coffee House') AND name='Quick Bites'), 'Grilled Sandwich', 'Stuffed with veggies, cheese and green chutney.', 110.00, 1);

-- 5. Insert Dummy Customers
INSERT INTO users (name, email, password, role, address, phone) VALUES 
('Ramesh Patwardhan', 'ramesh@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'customer', 'Kothrud, Pune', '+91 9998887776'),
('Sneha Shinde', 'sneha@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'customer', 'Baner, Pune', '+91 9998887775');
