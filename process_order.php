<?php
// Connect to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "coffee_shop_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Generate a unique customer ID
    $customer_id = uniqid();

    // Retrieve form data
    $menu_items = $_POST['menu_items'];
    $quantity = $_POST['quantity'];

    // Check if the customer already exists
    $sql_check_customer = "SELECT customer_id FROM customers WHERE customer_id = '$customer_id'";
    $result_check_customer = mysqli_query($conn, $sql_check_customer);

    if (mysqli_num_rows($result_check_customer) == 0) {
        // Insert the customer record
        $sql_insert_customer = "INSERT INTO customers (customer_id) VALUES ('$customer_id')";
        if (!mysqli_query($conn, $sql_insert_customer)) {
            echo "Error: " . $sql_insert_customer . "<br>" . mysqli_error($conn);
            mysqli_close($conn);
            exit();
        }
    }

    // Insert order into orders table
    $sql_order = "INSERT INTO orders (customer_id, total_price) VALUES ('$customer_id', 0)";
    if (mysqli_query($conn, $sql_order)) {
        // Get the ID of the inserted order
        $order_id = mysqli_insert_id($conn);

        // Calculate total price and insert order items into order_items table
        $total_price = 0;
        foreach ($menu_items as $index => $item_id) {
            $item_quantity = $quantity[$index];
            $sql_item = "INSERT INTO order_items (order_id, item_id, quantity) VALUES ('$order_id', '$item_id', '$item_quantity')";
            mysqli_query($conn, $sql_item);

            // Get the price of the menu item
            $sql_price = "SELECT price FROM menu WHERE item_id = '$item_id'";
            $result = mysqli_query($conn, $sql_price);
            $row = mysqli_fetch_assoc($result);
            $item_price = $row['price'];

            // Calculate total price
            $total_price += $item_quantity * $item_price;
        }

        // Update total price in orders table
        $sql_update_price = "UPDATE orders SET total_price = '$total_price' WHERE order_id = '$order_id'";
        mysqli_query($conn, $sql_update_price);

        // Close database connection
        mysqli_close($conn);

        // Redirect to a confirmation page or display a success message
        header("Location: confirmation.php");
        exit();
    } else {
        echo "Error: " . $sql_order . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Your Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Custom styles -->
    <style>
        /* Custom styles if needed */
    </style>
</head>
<body>
        <!-- Header Section Start Here-->
        <div class="container">
<nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse d-lg-flex collapse" id="navbarsExample11" >
          <a class="navbar-brand col-lg-3 me-0" href="#">Centered nav</a>
          <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="menu.php">Menu</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="process_order.php">Place Oder</a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <div class="col-md-3 text-end">
        <a type="button" href="login.php" class="btn btn-outline-primary me-2">Login</a>
        <a type="button" class="btn btn-primary">Sign-up</a>
      </div>
        </div>
      </div>
    </nav>
</div>

    <div class="container">
        <h1 class="my-4">Place Your Order</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="menu_items">Select Items:</label>
                <select name="menu_items[]" id="menu_items" class="form-control" multiple>
                    <?php
                    // Include database connection file
                    include('datacon.php');

                    // Query to fetch menu items from the database
                    $sql = "SELECT * FROM menu";
                    $result = mysqli_query($conn, $sql);

                    // Check if there are any menu items
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['item_id'] . "'>" . $row['item_name'] . " - $" . $row['price'] . "</option>";
                        }
                    } else {
                        echo "No menu items available.";
                    }

                    // Close database connection
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function addToCart() {
            // Get selected item from the menu
            var selectedOption = document.getElementById("menu_items").value;
            var selectedText = document.getElementById("menu_items").options[document.getElementById("menu_items").selectedIndex].text;

            // Get quantity
            var quantity = document.getElementById("quantity").value;

            // Append selected item and quantity to a hidden input field
            var cartItem = document.createElement("input");
            cartItem.type = "hidden";
            cartItem.name = "cart_items[]";
            cartItem.value = selectedOption + ":" + quantity;
            document.getElementById("orderForm").appendChild(cartItem);

            // Alert user
            alert("Added " + quantity + " " + selectedText + " to your cart.");
        }
    </script>
</body>
</html>
