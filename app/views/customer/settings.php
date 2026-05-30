<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Profile Settings</h1>
        <p class="text-muted fs-5">Update your delivery address and contact information.</p>
    </div>

    <?php if(isset($_SESSION['success_msg'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 600px;">
        <div class="card-body p-4">
            <form action="<?php echo BASE_URL; ?>/customer/settings" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-medium text-muted">Full Name</label>
                    <input type="text" name="name" class="form-control form-control-lg bg-light" value="<?php echo htmlspecialchars($user->name ?? ''); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-medium text-muted">Email Address (Cannot be changed)</label>
                    <input type="email" class="form-control form-control-lg bg-light" value="<?php echo htmlspecialchars($user->email ?? ''); ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium text-muted">Phone Number</label>
                    <input type="tel" name="phone" class="form-control form-control-lg bg-light" value="<?php echo htmlspecialchars($user->phone ?? ''); ?>" placeholder="(555) 123-4567">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium text-muted">Delivery Address</label>
                    <textarea name="address" class="form-control form-control-lg bg-light" rows="3" placeholder="123 Coffee St, Seattle, WA 98101"><?php echo htmlspecialchars($user->address ?? ''); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold rounded-pill">Save Profile</button>
            </form>
        </div>
    </div>
</div>
