<?php
session_start();
require 'datacon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection

    // Retrieve user input
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];
    $temp=0;
    // Prepare and execute the query
    $query = "SELECT * FROM customers WHERE email=? AND password=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
      // $temp=1;
        // If user exists, set session variables and redirect
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['customer_id'] =$row['customer_id'];
        $_SESSION['success_login'] = true; // Set session variable for success message
        header("Location: index.php"); // Redirect to home page or any other page
  
        exit();
    } else {
      $temp=2;
       $_SESSION['error'] = "Invalid email or password";
        header("Location: login.php");
 
    exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


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

  <title>login</title>
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
          <div class="nav-item dropdown">
            
          </div>
          
        </div>

        <a href="signUp.php" class="btn btn-primary py-2 px-4">Sign Up Now</a>
      </div>
    </nav>
    <!-- Navbar & Hero End  -->

    <div class="container-xxl py-5 bg-dark hero-header">
      <div class="container my-5 py-0">
      <div class="container min-vh-100 d-flex justify-content-center align-items-center ">

<form method="post" action="login.php">
  
    <h1 class="text-center display-3 text-white mb-3 my-2">Login</h1>
    <div class="form-floating mb-3">
      <input type="email" class="form-control rounded-3" id="txtEmail"  name="txtEmail"  placeholder="name@example.com" >
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control rounded-3" id="txtPassword"  name="txtPassword"  placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" id="btnlogin">Login</button>
    <small class="text-body-secondary text-center">Don't have an Account? <a href="signUp.php" class="card-link my-3"> Sign Up</a></small>
 
</form>
</div>

      </div>
     

      <!-- Bootstrap JS (optional) -->

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

      <!-- sweetalert -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
      <!-- Template Javascript -->
      <script src="js/main.js"></script>
</body>
<script>
  function reg(){
    Swal.fire({
            title: "Login Successful!",
            icon: "success",
            timer: 5000, 
            showConfirmButton: true
        }).then(() => {
            window.location.href = "index.php";
        });

  }
  
  </script>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require 'datacon.php'; // Include database connection

  // Retrieve user input
  $email = $_POST["txtEmail"];
  $password = $_POST["txtPassword"];
 // Prepare and execute the query
    $query = "SELECT * FROM customers WHERE email=? AND password=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // If user exists, set session variables
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['success_login'] = true; // Set session variable for success message
        echo "<script>alert('Login Succesfull');</script>";
        header("Location: index.php"); // Redirect to index page or any other page
        exit();
        // Redirect to home page or any other page
        
        // Call JavaScript function to show success alert
      
    } else {
        // If login fails, set an error message
        echo "<script>alert('Invalid Email or Password');</script>";
        $_SESSION['error'] = "Invalid email or password";
    }
}
?>