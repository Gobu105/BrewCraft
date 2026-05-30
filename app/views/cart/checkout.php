<div class="container py-5 mt-4 min-vh-100">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="display-6 fw-bold text-primary mb-4" style="font-family: 'Playfair Display', serif;">Checkout</h1>
            
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h4 class="mb-4">Delivery Details</h4>
                    <form action="<?php echo BASE_URL; ?>/checkout" method="POST">
                        <input type="hidden" name="shop_id" value="<?php echo htmlspecialchars($_POST['shop_id'] ?? ''); ?>">
                        
                        <div class="mb-3">
                            <label class="form-label text-muted fw-medium">Full Name</label>
                            <input type="text" class="form-control bg-light" value="<?php echo htmlspecialchars($user->name ?? ''); ?>" disabled>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted fw-medium">Phone Number</label>
                            <input type="tel" name="phone" class="form-control bg-light" value="<?php echo htmlspecialchars($user->phone ?? ''); ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted fw-medium">Delivery Address</label>
                            <textarea name="address" class="form-control bg-light" rows="3" required><?php echo htmlspecialchars($user->address ?? ''); ?></textarea>
                        </div>

                        <div class="alert alert-info border-0 bg-secondary bg-opacity-10 d-flex align-items-center">
                            <i class="fa fa-info-circle fa-2x text-primary me-3"></i> 
                            <div>
                                <h6 class="fw-bold mb-1">Payment Method</h6>
                                <p class="mb-0 small">Pay at Shop / Cash on Delivery</p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold mt-2">Confirm & Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
