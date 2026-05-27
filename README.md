# The Coffee Spot
![New Collection With Laptop Mockup Instagram Post](https://github.com/SmitParekh84/Images/blob/main/coffee-shop/New%20Collection%20With%20Laptop%20Mockup%20Instagram%20Post.png?raw=true)

Welcome to **The Coffee Spot** - a cozy and inviting coffee shop website where users can browse the menu, learn about services, and place orders online. This project is built using PHP, HTML, CSS, and JavaScript.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Database Setup](#database-setup)
- [Contributing](#contributing)
- [License](#license)

## Features

- **User Authentication**: Login and registration system with session handling.
- **Dark Mode**: Option for users to switch to dark mode.
- **Responsive Design**: Fully responsive layout using Bootstrap.
- **Dynamic Content**: Display dynamic content based on user sessions.
- **SweetAlert Integration**: Interactive alerts and notifications using SweetAlert.
- **Online Ordering**: Users can view the menu and place orders online.

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/the-coffee-spot.git
   ```

2. **Navigate to the Project Directory**:
   ```bash
   cd the-coffee-spot
   ```

3. **Set Up the Environment**:
   - Ensure you have a local server (e.g., XAMPP, WAMP, or MAMP) installed.
   - Place the project files in the server's root directory (e.g., `htdocs` for XAMPP).

4. **Start the Local Server**:
   - Start Apache and MySQL services using your local server control panel.

5. **Database Setup**:
   - Execute the following SQL queries in your database management system to set up the necessary tables:


   ```sql
   -- Create the 'customers' table
   CREATE TABLE customers (
       customer_id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL,
       phone VARCHAR(20),
       address VARCHAR(255),
       password VARCHAR(255) NOT NULL
   );

   -- Create the 'menu' table
   CREATE TABLE menu (
       item_id INT AUTO_INCREMENT PRIMARY KEY,
       item_name VARCHAR(100) NOT NULL,
       description TEXT,
       price DECIMAL(10, 2) NOT NULL,
       category VARCHAR(50),
       image_url VARCHAR(255)
   );

   -- Create the 'orders' table
   CREATE TABLE orders (
       order_id INT AUTO_INCREMENT PRIMARY KEY,
       customer_id INT NOT NULL,
       order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       quantity INT NOT NULL,
       item_name_quantity VARCHAR(255) NOT NULL,
       total_price DECIMAL(10, 2) NOT NULL,
       FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
   );
   ```

## Usage

1. **Access the Website**:
   - Open your web browser and navigate to `http://localhost/the-coffee-spot`.

2. **Browse the Menu**:
   - Click on the "Menu" link in the navigation bar to view available items.

3. **Place an Order**:
   - Navigate to the "Order Now" page to place your order online.

4. **User Authentication**:
   - Register a new account or log in with existing credentials to access personalized features.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature/your-feature-name`.
3. Make your changes and commit them: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin feature/your-feature-name`.
5. Submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
```

This README now includes SQL queries to create the `customers`, `menu`, and `orders` tables under the "Database Setup" section. You can copy and paste these queries into your database management system to set up the necessary tables for the project. Adjust the queries as needed based on your specific database requirements.
