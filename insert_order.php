<?php
session_start();
require('datacon.php');

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

// Check if payment is done
if (isset($_POST['payment_done']) && $_POST['payment_done'] == 'true') {
    // Get the total price, quantity, item name quantity, and customer ID from the form
    $totalPrice = $_SESSION['totalPrice'];
    $totalQuantity = $_SESSION['totalQuantity'];
    $item_name_quantity = $_SESSION['item_name_quantity'];
    $customerId = $_SESSION['customer_id'];

    // Insert the order into the orders table
    $orderDate = date("Y-m-d H:i:s");
    $query = "INSERT INTO orders (customer_id, order_date, quantity, item_name_quantity, total_price) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "isisi", $customerId, $orderDate, $totalQuantity, $item_name_quantity, $totalPrice);
    
    if (mysqli_stmt_execute($stmt)) {
        // Order successfully inserted
        echo '<script>alert("Order Placed Successfully"); window.location.href = "menu.php";</script>';
        exit();
    } else {
        // Error inserting order
        echo "<script>alert('Failed to place order');</script>";
    }
}
?>

<!-- Template Stylesheet -->
<link href="css/style2.css" rel="stylesheet">
<div class="wrapper">
    <div class="card px-4">
        <div class="my-3">
            <p class="h8">Card number</p>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="debit-card mb-3">
            <div class="d-flex flex-column h-100">
                <label class="d-block">
                    <div class="d-flex position-relative">
                        <div>
                            <img src="https://www.freepnglogos.com/uploads/visa-inc-logo-png-11.png" class="visa" alt="">
                            <p class="mt-2 mb-4 text-white fw-bold">Sai Kumar</p>
                        </div>
                        <div class="input">
                            <input type="radio" name="card" id="check">
                        </div>
                    </div>
                </label>
                <div class="mt-auto fw-bold d-flex align-items-center justify-content-between">
                    <p>4989 1237 1234 4532</p>
                    <p>01/24</p>
                </div>
            </div>
        </div>
        <div class="debit-card card-2 mb-4">
            <div class="d-flex flex-column h-100">
                <label class="d-block">
                    <div class="d-flex position-relative">
                        <div>
                            <img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-png-transparent-svg-vector-bie-supply-0.png" alt="master" class="master">
                            <p class="text-white fw-bold">Sai Kumar</p>
                        </div>
                        <div class="input">
                            <input type="radio" name="card" id="check">
                        </div>
                    </div>
                </label>
                <div class="mt-auto fw-bold d-flex align-items-center justify-content-between">
                    <p class="m-0">5540 2345 3453 2343</p>
                    <p class="m-0">05/23</p>
                </div>
            </div>
        </div>
        <form method="POST">
            <input type="hidden" name="payment_done" value="true">
            <button type="submit" class="btn mb-4">Book Now</button>
        </form>
    </div>
</div>