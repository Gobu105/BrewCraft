<?php
session_start();

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract cart items from POST data
    if (isset($_POST['cart_items'])) {
        $cartItems = explode(",", $_POST['cart_items']);

        // Store cart items in session as an array
        $_SESSION['cart_items'] = $cartItems;

        // Redirect to checkout page
        header("location:checkout.php");
        exit(); // Stop further execution
    } else {
        // Redirect to menu page with error message
        header("location:menu.php?status=error");
        exit(); // Stop further execution
    }
} else {
    // Redirect to menu page if form data is not submitted
    header("location:menu.php");
    exit(); // Stop further execution
}
?>