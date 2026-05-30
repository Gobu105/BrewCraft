<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Owner Panel | BrewCraft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/public/css/style.css" rel="stylesheet">
</head>
<body class="bg-cream">
    
    <!-- Sidebar -->
    <div class="sidebar position-fixed top-0 start-0 bottom-0 border-end border-light d-flex flex-column" style="width: 250px; z-index: 1000; background-color: var(--bg-cream);">
        <div class="p-4 mb-2">
            <h4 class="fw-bold text-primary mb-0 d-flex align-items-center" style="font-family: 'Playfair Display', serif;">
                <i class="fa fa-store me-2" style="font-size: 1.2rem;"></i> Owner Panel
            </h4>
        </div>
        <div class="nav flex-column px-3 gap-1 flex-grow-1">
            <?php 
                $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $uri = str_replace(BASE_URL, '', $uri);
            ?>
            <a href="<?php echo BASE_URL; ?>/" class="nav-link text-dark"><i class="fa fa-home fa-fw me-2"></i> Home</a>
            <a href="<?php echo BASE_URL; ?>/owner" class="nav-link text-dark <?php echo ($uri == '/owner' || $uri == '/admin/dashboard') ? 'active' : ''; ?>"><i class="fa fa-chart-line fa-fw me-2"></i> Dashboard</a>
            <a href="<?php echo BASE_URL; ?>/owner/orders" class="nav-link text-dark <?php echo strpos($uri, 'orders') !== false ? 'active' : ''; ?>"><i class="fa fa-shopping-cart fa-fw me-2"></i> Orders</a>
            <a href="<?php echo BASE_URL; ?>/owner/products" class="nav-link text-dark <?php echo strpos($uri, 'products') !== false ? 'active' : ''; ?>"><i class="fa fa-box fa-fw me-2"></i> Products</a>
            <a href="<?php echo BASE_URL; ?>/owner/categories" class="nav-link text-dark <?php echo strpos($uri, 'categories') !== false ? 'active' : ''; ?>"><i class="fa fa-tags fa-fw me-2"></i> Categories</a>
            <a href="<?php echo BASE_URL; ?>/owner/settings" class="nav-link text-dark <?php echo strpos($uri, 'settings') !== false ? 'active' : ''; ?>"><i class="fa fa-cog fa-fw me-2"></i> Shop Settings</a>
        </div>
        <div class="p-4 mt-auto border-top">
            <a href="<?php echo BASE_URL; ?>/logout" class="text-danger text-decoration-none fw-medium"><i class="fa fa-sign-out-alt fa-fw me-2"></i> Sign Out</a>
        </div>
    </div>

    <!-- Main Content -->
    <div style="margin-left: 250px; min-height: 100vh; background-color: var(--bg-cream);">
        <?php echo $content; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
