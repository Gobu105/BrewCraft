# ☕ BrewCraft

BrewCraft is a modern, responsive multi-tenant coffee shop management platform built using **PHP** and **MySQL**.
It empowers local café owners to create and manage their own customizable online coffee storefronts with dynamic product management, comprehensive order handling, detailed analytics dashboards, and seamless customer ordering features.

---

# ✨ Core Features

## 👤 Customer Experience
* **User Registration & Secure Login**: Role-based authentication using modern password hashing.
* **Discover Artisan Coffee**: Browse multiple coffee shops across the platform.
* **Interactive Storefronts**: Explore dynamic menus with custom shop banners, logos, and product images.
* **Shopping Cart**: Add to cart, update quantities, and place orders smoothly.
* **Order Tracking**: View detailed order history in a dedicated customer dashboard.
* **Responsive Design**: Full mobile-first experience using Bootstrap 5.

---

## 🏪 Shop Owner Dashboard (SaaS Features)
* **Storefront Branding**: Upload custom shop logos and panoramic banners, and configure theme colors.
* **Shop Settings Management**: Update shop name, description, address, and contact details dynamically.
* **Product Catalog (CRUD)**: Manage categories and upload delicious product images directly to `public/uploads/`.
* **Live Order Management**: Track incoming orders and update fulfillment statuses (Pending, Preparing, Ready, Completed).
* **Revenue Analytics**: Dedicated owner dashboard for tracking shop GMV and order volume.

---

## 🛡️ Super Admin Control Panel
* **Platform Overview**: Dynamic, real-time statistics tracking total platform GMV, total shops, users, and orders.
* **Manage Platform Users**: Full visibility of all registered customers, owners, and their join dates.
* **Manage Shops**: Centralized view of all created coffee storefronts and their respective owners.
* **Action Controls**: Ban or suspend problematic shops directly from the dashboard.

---

# 🎨 UI/UX & Design Architecture

* **Premium Coffee-Themed Design**: Rich beige/cream backgrounds (`bg-cream`) accented with deep coffee primary colors (`var(--primary)`).
* **Cinematic Banners**: Panoramic shop banners with gradient overlays for maximum text legibility.
* **Modern Dashboard Layouts**: Clean, offcanvas sidebars for mobile and persistent sidebars for desktop, with unified "Home" navigation.
* **Responsive Typography**: Implemented `clamp()` typography and Google Fonts (Playfair Display & Inter) for a sleek, premium feel across all devices.
* **Micro-interactions**: Hover effects, shadow scaling (`shadow-sm` to `shadow`), and glassmorphism elements.

---

# 🛠 Tech Stack

## Frontend
* HTML5 & CSS3 (Custom `style.css` utilizing CSS Variables)
* JavaScript
* **Bootstrap 5.3** (Grid system, Offcanvas sidebars, Modals, Utilities)
* FontAwesome 5 (Icons)

## Backend
* PHP (OOP + Custom MVC Architecture)
* Secure File Upload Handling (`move_uploaded_file`)
* Dynamic Session Routing (`$_SESSION['role']`)

## Database
* MySQL (Relational schema with strict `ENUM` constraints for roles and statuses)
* PDO (PHP Data Objects) for Prepared Statements

---

# 📂 Project Structure

```bash
brewcraft/
│
├── app/
│   ├── controllers/      # MVC Controllers (Auth, Shop, Admin, Customer)
│   ├── models/           # Database Models
│   ├── views/            # UI Templates (Organized by role: admin, customer, home, shop, superadmin)
│       └── layouts/      # Unified header, footer, and sidebar layouts
│
├── config/               # Database configuration
├── database/             # SQL schema and dummy data imports
├── public/               
│   ├── css/              # Custom stylesheets
│   └── uploads/          # Dynamically generated user uploads (shops/ & products/)
├── routes/               # Custom web.php routing logic
└── README.md
```

---

# 🔐 Authentication & Security

* **Role-Based Authentication**: Strict routing ensuring `customer`, `owner`, and `admin` users only access their designated dashboards.
* **Protected Admin Routes**: `checkAuth()` middleware implemented across all protected controllers.
* **Secure Image Uploads**: Unique ID generation for uploaded filenames to prevent collisions and malicious file overrides.
* **Session Management**: Secure session lifecycle handling.
* **Password Hashing**: Utilizes PHP's native `password_hash()` and `password_verify()`.
* **SQL Injection Prevention**: 100% Prepared Statements using PDO.

---

# 🚀 Installation & Setup

## 1. Clone Repository
```bash
git clone https://github.com/Gobu105/BrewCraft.git
```

## 2. Environment Setup
Move the project folder to your local server directory:
```bash
# For XAMPP
C:/xampp/htdocs/BrewCraft
```

## 3. Database Configuration
* Open **phpMyAdmin**.
* Create a new database named `coffeeshop`.
* Import the SQL schema file located at:
  ```bash
  database/coffee_shop_db.sql
  ```
* *(Optional)* To populate the platform with sample shops, products, and images, import the dummy data script:
  ```bash
  database/pune_dummy_data.sql
  ```
* *(Optional)* To populate the platform with sample shops, products, and images, import the dummy data script:
  ```bash
  database/brecraft_final.sql
  ```

## 4. Connect Database
Update database credentials inside `config/database.php`:
```php
<?php
$host = "localhost";
$dbname = "coffeeshop";
$username = "root";
$password = "";
```

## 5. Launch Project
Start Apache and MySQL on your local server environment, then navigate to:
```bash
http://localhost/BrewCraft
```

---

# 🎯 Demo Credentials

You can explore BrewCraft using the following demo accounts:

## 🛡️ Super Admin

Manage the entire marketplace, monitor all users, shops, orders, and platform analytics.

**Email:** [admin@brewcraft.com](mailto:admin@brewcraft.com)
**Password:** password123

---

## 🏪 Shop Owner

Access a vendor dashboard (FC Road Cafe), manage products, process orders, and track revenue.

**Email:** [rahul@fcroad.com](mailto:rahul@fcroad.com)
**Password:** password123

---

## 👤 Customer Experience

For the best customer experience, create a new account directly on the platform.

### Suggested Testing Flow

1. Register a new customer account.
2. Go to **Settings** and add your default delivery address.
3. Browse available coffee shops.
4. Add a coffee and a pastry to your cart.
5. Proceed to checkout and place an order.
6. Log in as the Shop Owner (**[rahul@fcroad.com](mailto:rahul@fcroad.com)**) to see the order appear in the dashboard and update its status.

This demonstrates the complete customer-to-owner order workflow within BrewCraft.


# 👨‍💻 Author
Developed by **Jatin Joshi**

# 📄 License
This project is for educational and portfolio purposes.
