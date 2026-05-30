<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="container py-5 mt-4 min-vh-100">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h1 class="display-5 fw-bold mb-2 text-primary" style="font-family: 'Playfair Display', serif;">Coffee Shops</h1>
            <p class="fs-5 text-muted mb-0">Discover the best artisan coffee in your area.</p>
        </div>
        <div style="width: 350px;">
            <form action="<?php echo BASE_URL; ?>/shops" method="GET" class="position-relative">
                <i class="fa fa-search position-absolute text-muted" style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
                <input type="text" name="search" class="form-control form-control-lg rounded-pill ps-5 bg-white border-light shadow-sm" placeholder="Search shops by name or location..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
            </form>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach($shops as $shop): ?>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; background-color: var(--white);">
                <!-- Shop Image Placeholder -->
                <div class="bg-beige d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f3efe6;">
                    <i class="fa fa-coffee fa-3x text-muted opacity-25"></i>
                </div>
                
                <!-- Shop Details -->
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3 d-flex align-items-center text-primary" style="font-family: 'Playfair Display', serif;">
                        <i class="fa fa-coffee me-2 text-muted" style="font-size: 1rem;"></i>
                        <?php echo htmlspecialchars($shop['name']); ?>
                    </h5>
                    
                    <p class="text-muted small mb-4">
                        <i class="fa fa-map-marker-alt me-2"></i>
                        <?php echo htmlspecialchars($shop['address'] ?? 'No address provided'); ?>
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="text-muted small fw-medium"><?php echo $shop['product_count']; ?> products</span>
                        <a href="<?php echo BASE_URL; ?>/shop?id=<?php echo $shop['id']; ?>" class="text-dark text-decoration-none fw-bold small border-bottom border-dark pb-1">View Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
        <?php if(empty($shops)): ?>
        <div class="col-12 text-center py-5">
            <i class="fa fa-store-slash fa-3x text-muted mb-3 opacity-25"></i>
            <h5 class="text-muted">No coffee shops found.</h5>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
