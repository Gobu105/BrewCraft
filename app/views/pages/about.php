<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- Hero Start -->
<div class="container-xxl py-5 hero-header mb-5" style="min-height: 40vh;">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container glass-panel p-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo BASE_URL; ?>/public/img/about-1.jpg" style="box-shadow: var(--glass-shadow);">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="<?php echo BASE_URL; ?>/public/img/about-2.jpg" style="margin-top: 25%; box-shadow: var(--glass-shadow);">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                <h1 class="mb-4">Welcome to <i class="fa fa-coffee text-primary me-2"></i>BrewCraft</h1>
                <p class="mb-4 text-muted">At BrewCraft, we're more than just a place to grab your daily caffeine fix—we're a destination where every cup tells a story. From the moment you step through our doors, you're greeted by the enticing aroma of freshly roasted beans.</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                            <div class="ps-4">
                                <p class="mb-0 text-muted">Years of</p>
                                <h6 class="text-uppercase mb-0 text-white">Experience</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
