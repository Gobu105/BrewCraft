<div class="container min-vh-100 d-flex justify-content-center align-items-center py-5">
    <div class="text-center auth-card p-5" style="max-width: 500px;">
        <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle mb-4 shadow" style="width: 80px; height: 80px;">
            <i class="fa fa-check fa-3x"></i>
        </div>
        <h2 class="fw-bold text-dark mb-3">Order Confirmed!</h2>
        <p class="text-muted fs-5 mb-4">Your order #<?php echo $order_id; ?> has been successfully placed. The shop is now preparing it.</p>
        
        <div class="d-flex justify-content-center gap-3">
            <a href="<?php echo BASE_URL; ?>/" class="btn btn-outline-primary rounded-pill px-4">Back to Home</a>
        </div>
    </div>
</div>
