<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- Shop Banner -->
<div class="container-fluid p-0 mb-5">
    <div class="bg-dark text-white d-flex align-items-end" style="height: 300px; background-color: <?php echo htmlspecialchars($shop['theme_color'] ?? 'var(--primary)'); ?> !important; background-image: url('<?php echo BASE_URL; ?>/public/uploads/shops/<?php echo htmlspecialchars($shop['banner'] ?? 'default_banner.jpg'); ?>'); background-size: cover; background-position: center; position: relative;">
        <!-- Dark overlay to ensure text is readable against any image -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 100%);"></div>
        <div class="container pb-4" style="position: relative; z-index: 1;">
            <div class="d-flex align-items-center">
                <div class="bg-white rounded p-2 me-4 shadow" style="width: 120px; height: 120px; transform: translateY(30px);">
                    <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted border border-dashed rounded overflow-hidden">
                        <img src="<?php echo BASE_URL; ?>/public/uploads/shops/<?php echo htmlspecialchars($shop['logo'] ?? 'default_logo.png'); ?>" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
                <div>
                    <h1 class="display-5 fw-bold mb-1"><?php echo htmlspecialchars($shop['name']); ?></h1>
                    <p class="fs-5 mb-0 opacity-75"><i class="fa fa-map-marker-alt me-2"></i><?php echo htmlspecialchars($shop['address']); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 mt-4">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-md-3 mb-4">
            <div class="sticky-top" style="top: 100px;">
                <h5 class="fw-bold mb-3">Menu</h5>
                <div class="list-group list-group-flush" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <?php foreach($categories as $cat): ?>
                        <?php if(!empty($products_by_category[$cat['id']])): ?>
                        <a href="#cat-<?php echo $cat['id']; ?>" class="list-group-item list-group-item-action py-3 fw-medium text-muted">
                            <?php echo htmlspecialchars($cat['name']); ?>
                        </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <!-- Menu Items -->
        <div class="col-md-9">
            <?php foreach($categories as $cat): ?>
                <?php if(!empty($products_by_category[$cat['id']])): ?>
                <div id="cat-<?php echo $cat['id']; ?>" class="mb-5 pt-3">
                    <h3 class="fw-bold mb-4 pb-2 border-bottom"><?php echo htmlspecialchars($cat['name']); ?></h3>
                    
                    <div class="row g-4">
                        <?php foreach($products_by_category[$cat['id']] as $prod): ?>
                        <div class="col-md-6">
                            <div class="card product-card h-100 p-3 flex-row align-items-center">
                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                    <i class="fa fa-image text-muted opacity-50"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-1"><?php echo htmlspecialchars($prod['name']); ?></h5>
                                    <p class="text-primary fw-bold mb-0">$<?php echo number_format($prod['price'], 2); ?></p>
                                </div>
                                <button class="btn btn-outline-primary rounded-circle p-2 ms-2" onclick="addToCart(<?php echo $prod['id']; ?>)">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
            
            <?php if(empty($all_products)): ?>
                <div class="text-center py-5">
                    <i class="fa fa-box-open fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">This shop hasn't added any products yet.</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
