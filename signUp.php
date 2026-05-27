<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-mug-hot me-3"></i>Coffee Shop</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link ">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>

                        <a href="menu.php" class="nav-item nav-link">Menu</a>
                        
                        
                    </div>
                    <a href="login.php" class="btn btn-primary py-2 px-4">login Now</a>
                </div>
            </nav>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-0">
                <div class="container text-center ">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Register here</h1>
                <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb justify-content-center text-uppercase ">
                            <li class="breadcrumb-item "><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item text-white active " aria-current="page ">Register</li>
                        </ol>
                    </nav>
                    </div>
                </div>
            </div>
<form  method="POST" action="signUp.php">

    <div class=" rounded-4 px-5 py-4">
        <h1 class="text-center my-2">Register here</h1>
        <div class= "container">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="txtName" name="txtName" aria-describedby="emailHelp">

        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone No.</label>
            <input type="text" class="form-control" id="txtPhn" name="txtPhn">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address</label>
            <input type="text" class="form-control" id="txtAdd" name="txtAdd">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="txtEmail" name="txtEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="txtPassword" name="txtPassword">
        </div>
        <div class="d-flex justify-content-center align-items-center my-4">
        
            <button type="submit" class="w-40 btn btn-primary rounded-3 " id="btnsubmit" name="btnsubmit">Submit</button>
        </div>
        </div>
    </div>
</form>
        </div>
        <!-- Navbar & Hero End -->
  
      <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<?php
require('datacon.php');

// Check if the submit button is pressed
if (isset($_POST['btnsubmit'])) {
    // Retrieve data from the form
    $name = $_POST['txtName'];
    $mail = $_POST['txtEmail'];
    $mobile = $_POST['txtPhn'];
    $add = $_POST['txtAdd'];
    $pass = $_POST['txtPassword'];

    // Prepare SQL to insert new user data into the database
    $sql = "INSERT INTO customers (name, email, phone, address, password) VALUES ('$name', '$mail', '$mobile', '$add', '$pass')";

    // Execute the query and check the result
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Register Succesfull');</script>";
        // Optionally redirect to another page after success
        header("Location:login.php");
        
    } else {
        // Report error if insertion failed
        echo "Error in insertion: " . mysqli_error($conn);
    }
}
?>
