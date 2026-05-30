<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- Hero Section -->
<div class="container-fluid p-0 mb-5">
    <div class="hero-header text-center shadow-lg" style="background-color: var(--primary); color: white;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <p class="text-uppercase fw-bold text-white-50 mb-3"><i class="fa fa-coffee me-2"></i> Discover artisan coffee</p>
                    <h1 class="display-3 fw-bold text-white mb-4">Where true craft <br>meets your cup.</h1>
                    <p class="fs-5 text-white-50 mb-5">Explore independent coffee shops, order ahead, and support local roasters. The best coffee in your neighborhood is just a click away.</p>
                    
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#roasters" class="btn btn-light btn-lg rounded-pill px-5 text-primary fw-bold">Find a Coffee Shop <i class="fa fa-arrow-right ms-2"></i></a>
                        <a href="<?php echo BASE_URL; ?>/register" class="btn btn-outline-light btn-lg rounded-pill px-5">Join as a Shop Owner</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Roasters Section -->
<div class="container py-5" id="roasters">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="display-6 fw-bold text-dark">Featured Roasters</h2>
            <p class="text-muted fs-5 mb-0">Handpicked independent cafes</p>
        </div>
        <a href="<?php echo BASE_URL; ?>/shops" class="btn btn-link text-primary fw-bold text-decoration-none">View all shops <i class="fa fa-arrow-right ms-1"></i></a>
    </div>

    <div class="row g-4">
        <?php foreach ($featuredShops as $shop): ?>
        <div class="col-lg-4 col-md-6">
            <div class="card shop-card h-100">
                <div class="bg-light d-flex align-items-center justify-content-center overflow-hidden" style="height: 200px;">
                    <img src="<?php echo BASE_URL; ?>/public/uploads/shops/<?php echo htmlspecialchars($shop['banner'] ?? 'default_banner.jpg'); ?>" class="w-100 h-100" style="object-fit: cover;">
                </div>
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-1"><?php echo htmlspecialchars($shop['name']); ?></h4>
                    <p class="text-muted small mb-3"><i class="fa fa-map-marker-alt me-1"></i> <?php echo htmlspecialchars($shop['address']); ?></p>
                    <p class="text-muted line-clamp-2"><?php echo htmlspecialchars($shop['description']); ?></p>
                </div>
                <div class="card-footer bg-white border-top-0 p-4 pt-0 d-flex justify-content-between align-items-center">
                    <span class="text-muted small"><i class="fa fa-box me-1"></i> Products available</span>
                    <a href="<?php echo BASE_URL; ?>/shop?id=<?php echo $shop['id']; ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">Visit Shop</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
        <?php if (empty($featuredShops)): ?>
        <div class="col-12 text-center py-5">
            <i class="fa fa-store fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">No shops have joined yet. Be the first!</h5>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- How it Works -->
<div class="container-fluid py-5" style="background-color: var(--bg-beige);">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">How BrewCraft Works</h2>
            <p class="text-muted fs-5">A seamless experience from discovery to your first sip.</p>
        </div>
        
        <div class="row g-4 text-center">
            <div class="col-lg-4">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white shadow-sm mb-4" style="width: 80px; height: 80px;">
                    <i class="fa fa-store fa-2x text-primary"></i>
                </div>
                <h4 class="fw-bold">1. Discover</h4>
                <p class="text-muted">Find hidden gems and renowned local roasters in your area.</p>
            </div>
            <div class="col-lg-4">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white shadow-sm mb-4" style="width: 80px; height: 80px;">
                    <i class="fa fa-coffee fa-2x text-primary"></i>
                </div>
                <h4 class="fw-bold">2. Order Ahead</h4>
                <p class="text-muted">Browse the menu and place your order directly through the platform.</p>
            </div>
            <div class="col-lg-4">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white shadow-sm mb-4" style="width: 80px; height: 80px;">
                    <i class="fa fa-star fa-2x text-primary"></i>
                </div>
                <h4 class="fw-bold">3. Enjoy & Support</h4>
                <p class="text-muted">Skip the line, enjoy your artisan coffee, and support local business.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
