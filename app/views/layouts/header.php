<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BrewCraft | Discover Artisan Coffee</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/public/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a href="<?php echo BASE_URL; ?>/" class="navbar-brand d-flex align-items-center">
                <i class="fa fa-coffee fa-2x me-2 text-primary"></i>
                <h2 class="mb-0 text-primary">BrewCraft</h2>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto ps-4">
                    <a href="<?php echo BASE_URL; ?>/shops" class="nav-item nav-link fw-medium">Discover</a>
                </div>
                
                <div class="navbar-nav ms-auto align-items-center">
                    <a href="<?php echo BASE_URL; ?>/cart" class="nav-item nav-link position-relative me-3">
                        <i class="fa fa-shopping-bag fa-lg text-primary"></i>
                        <?php if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo count($_SESSION['cart_items']); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                    
                    <?php if (isset($_SESSION['name'])): ?>
                        <?php 
                            $dashRoute = '/customer';
                            if($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'super_admin') $dashRoute = '/admin';
                            else if(in_array($_SESSION['role'], ['owner', 'shop_owner'])) $dashRoute = '/owner';
                        ?>
                        <a href="<?php echo BASE_URL . $dashRoute; ?>" class="nav-item nav-link fw-bold text-dark">Dashboard</a>
                        <a href="<?php echo BASE_URL; ?>/logout" class="btn btn-outline-primary ms-3 rounded-pill px-4">Sign out</a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>/login" class="nav-item nav-link fw-bold text-dark">Sign in</a>
                        <a href="<?php echo BASE_URL; ?>/register" class="btn btn-primary ms-3 rounded-pill px-4">Get Started</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
