<?php
// Start session to store user's preference
session_start();

$darkMode = isset($_SESSION['dark_mode']) ? $_SESSION['dark_mode'] : false;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the dark mode switch is checked
    if (isset($_POST['darkModeSwitch'])) {
        // Update the session variable based on the switch status
        $_SESSION['dark_mode'] = ($_POST['darkModeSwitch'] == 'on') ? true : false;
    } else {
        // If the dark mode switch is not checked, disable dark mode
        $_SESSION['dark_mode'] = false;
    }
     // Redirect the user to the index page after saving changes
     header("Location: index.php");
     exit(); // Make sure to exit after sending the redirect header
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body  class="<?php echo $darkMode ? 'bg-dark text-light' : ''; ?>">
    <div class="container-xxl d-block justify-content-around mt-5 py-5">
    <h1 class="text-primary m-0 ">Settings</h1>
        <form method="POST">
           
            <div class="form-check form-switch text-end mt-3">
                <input class="form-check-input" type="checkbox" name="darkModeSwitch" id="darkModeSwitch" <?php echo $darkMode ? 'checked' : ''; ?>>
                <label class="form-check-label" for="darkModeSwitch">Dark Mode</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
            
        </form>
    </div>
 
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
    // JavaScript to toggle dark mode/light mode
    document.addEventListener("DOMContentLoaded", function() {
        const darkModeSwitch = document.getElementById("darkModeSwitch");

        darkModeSwitch.addEventListener("change", function() {
            if (this.checked) {
                // Enable dark mode
                document.body.classList.add("bg-dark", "text-light");
            } else {
                // Disable dark mode
                document.body.classList.remove("bg-dark", "text-light");
            }
        });
    });
</script>

</body>
</html>
