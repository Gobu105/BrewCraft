<?php

session_start();
// Check if dark mode preference is set in session
$darkMode = isset($_SESSION['dark_mode']) ? $_SESSION['dark_mode'] : false;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Document</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">



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

    <body class="<?php echo $darkMode ? 'bg-dark text-light' : ''; ?>">
        <!-- Navbar & Hero Start -->
        <div class=" container-xxl position-relative p-0 ">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0 ">
                <a href=" " class="navbar-brand p-0 ">
                    <h1 class="text-primary m-0 "><i class="fa fa-utensils me-3 "></i>Coffee Shop</h1>
                    <!-- <img src="img/logo.png " alt="Logo "> -->
                </a>
                <button class="navbar-toggler " type="button " data-bs-toggle="collapse " data-bs-target="#navbarCollapse ">
            <span class="fa fa-bars "></span>
        </button>
                <div class="collapse navbar-collapse " id="navbarCollapse ">
                    <div class="navbar-nav ms-auto py-0 pe-4 ">
                    <a href="index.php " class="nav-item nav-link ">Home</a>
                        <a href="about.php" class="nav-item nav-link active">About</a>
                        <a href="service.php" class="nav-item nav-link  ">Service</a>
                        <a href="menu.php " class="nav-item nav-link  ">Menu</a>
                        </div>
                    <div class="nav-item flex-shrink-0 dropdown ">

                        <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <img src="./img/person-circle.svg" alt="mdo" width="32" height="32" class="rounded-circle"> -->
                            <?php if (isset($_SESSION['name'])) {
                                echo " " . $_SESSION['name'] . "";
                            } else {
                                echo "Guest";
                            } ?>
                        </a>

                        <ul class="dropdown-menu text-small shadow">
                        <li class="dropdown-item">Hy!  <?php if (isset($_SESSION['name'])) {
                                echo " " . $_SESSION['name'] . "";
                            } else {
                                echo "Guest";
                            } ?></li>
                        <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li><a class="dropdown-item" href="#"><?php
                                                                    if (isset($_SESSION['name'])) {
                                                                        echo '<a href="logout.php" class="dropdown-item ">Logout</a>';
                                                                    } else {
                                                                        echo '<a href="login.php" class="dropdown-item ">Login Now</a>';
                                                                    }
                                                                    ?></a></li>
                            
                        </ul>
                                                                    
                    </div>
                    
            </nav>
            <!-- Navbar end -->
            <div class="container-xxl py-5 bg-dark hero-header mb-5 ">
                <div class="container text-center my-5 pt-5 pb-4 ">
                    <h1 class="display-3 text-white mb-3 animated slideInDown ">About</h1>
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb justify-content-center text-uppercase ">
                            <li class="breadcrumb-item "><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item text-white active " aria-current="page ">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <section id="about">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-coffee text-primary me-2"></i>The Coffee Spot</h1>
                        <p class="mb-4">At The Coffee Spot, we're more than just a place to grab your daily caffeine fix—we're a destination where every cup tells a story. From the moment you step through our doors, you're greeted by the enticing aroma of freshly roasted beans and the warm smiles of our passionate team. Our commitment to quality shines through in every sip, as we meticulously source the finest beans and expertly craft each drink to perfection.</p>
                        <p class="mb-4">But The Coffee Spot is more than just great coffee. It's a place where connections are forged, friendships are made, and memories are cherished. Whether you're catching up with friends over a creamy latte, diving into a good book with a velvety cappuccino, or simply seeking a moment of solace with a perfectly brewed drip coffee, our cozy ambiance and welcoming atmosphere make every visit a special one. Join us in our pursuit of coffee excellence and community camaraderie—because at [Coffee Shop Name], every cup tells a story worth savoring.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">500</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Satisfied</p>
                                        <h6 class="text-uppercase mb-0">Customers</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="about.php">Read More</a>
                    </div>
                </div>
            </div>
        </div>

            <section>
                <!-- About End -->


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