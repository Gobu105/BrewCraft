# ☕ BrewCraft

BrewCraft is a modern multi-tenant coffee shop management platform built using **PHP** and **MySQL**.
It allows local café owners to create and manage their own customizable online coffee storefronts with product management, order handling, analytics dashboards, and customer ordering features.

---

# ✨ Features

## 👤 Customer Features

* User Registration & Login
* Browse Coffee Shops
* Browse Products by Categories
* Add to Cart
* Update Cart Quantity
* Place Orders
* View Order History
* Responsive Shopping Experience

---

## 🏪 Shop Owner Features

* Create & Manage Coffee Shop
* Customize Storefront Branding

  * Shop Name
  * Logo
  * Banner
  * About Section
  * Theme Colors
* Product Management (CRUD)
* Category Management
* Order Management Dashboard
* Customer Data Management
* Revenue & Order Analytics

---

## 🛡 Super Admin Features

* Manage All Shops
* View Platform Statistics
* Manage Users
* Delete/Ban Shops
* Monitor Orders & Revenue

---

# 🎨 UI/UX Highlights

* Premium Coffee-Themed Design
* Modern Dashboard Layout
* Responsive UI
* Elegant Product Cards
* Smooth Cart Drawer
* Clean Admin Panels
* Warm Coffee Color Palette
* SaaS-style User Experience

---

# 🛠 Tech Stack

## Frontend

* HTML5
* CSS3
* JavaScript
* Bootstrap / TailwindCSS

## Backend

* PHP (OOP + MVC Architecture)

## Database

* MySQL

---

# 📂 Project Structure

```bash
brewcraft/
│
├── app/
│   ├── controllers/
│   ├── models/
│   ├── views/
│
├── config/
├── database/
├── public/
├── uploads/
├── routes/
└── README.md
```

---

# 🗄 Database Tables

The project uses relational MySQL tables:

* users
* shops
* categories
* products
* orders
* order_items
* reviews

---

# 🔐 Authentication & Security

* Role-Based Authentication
* Session Management
* Password Hashing using `password_hash()`
* Prepared Statements using PDO
* Protected Admin Routes

---

# 🚀 Installation

## 1. Clone Repository

```bash
git clone https://github.com/your-username/brewcraft.git
```

---

## 2. Move Project to XAMPP

Move the project folder to:

```bash
xampp/htdocs/
```

---

## 3. Import Database

* Open phpMyAdmin
* Create database:

```sql
brewcraft_db
```

* Import the SQL file from:

```bash
database/brewcraft_db.sql
```

---

## 4. Configure Database

Update database credentials inside:

```bash
config/database.php
```

Example:

```php
<?php

$host = "localhost";
$dbname = "brewcraft_db";
$username = "root";
$password = "";
```

---

## 5. Run Project

Start:

* Apache
* MySQL

Then open:

```bash
http://localhost/brewcraft
```

---

# 📸 Screenshots

## Customer Storefront

* Product Listing
* Cart Drawer
* Coffee Categories

## Admin Dashboard

* Revenue Analytics
* Product Management
* Orders Panel

---

# 🎯 Future Improvements

* Online Payments (Razorpay / Stripe)
* Email Notifications
* Live Order Tracking
* Table Reservation System
* Multi-language Support
* Dark Mode
* REST API Support

---

# 💡 Project Goal

BrewCraft aims to provide local coffee shops with a professional digital storefront and management system while delivering customers a smooth online coffee ordering experience.

---

# 👨‍💻 Author

Developed by Jatin Joshi

---

# 📄 License

This project is for educational and portfolio purposes.
