<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Shop Settings</h1>
        <p class="text-muted fs-5">Manage your shop's appearance and details.</p>
    </div>

    <?php if(isset($_SESSION['success_msg'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 800px;">
        <div class="card-body p-4">
            <form action="<?php echo BASE_URL; ?>/owner/settings" method="POST" enctype="multipart/form-data">
                
                <h5 class="fw-bold mb-3 border-bottom pb-2">Basic Info</h5>
                <div class="mb-3">
                    <label class="form-label text-muted fw-medium">Shop Name</label>
                    <input type="text" name="name" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($shop['name'] ?? ''); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted fw-medium">Description</label>
                    <textarea name="description" class="form-control bg-light border-0" rows="3"><?php echo htmlspecialchars($shop['description'] ?? ''); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted fw-medium">Phone</label>
                        <input type="tel" name="phone" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($shop['phone'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted fw-medium">Theme Color</label>
                        <input type="color" name="theme_color" class="form-control form-control-color bg-light border-0 w-100" value="<?php echo htmlspecialchars($shop['theme_color'] ?? '#4a3320'); ?>" title="Choose your color">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted fw-medium">Address</label>
                    <input type="text" name="address" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($shop['address'] ?? ''); ?>">
                </div>

                <h5 class="fw-bold mb-3 border-bottom pb-2 mt-4">Branding</h5>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label text-muted fw-medium">Shop Logo</label>
                        <input type="hidden" name="current_logo" value="<?php echo htmlspecialchars($shop['logo'] ?? 'default_logo.png'); ?>">
                        <input type="file" name="logo" class="form-control bg-light border-0" accept="image/*">
                        <?php if(!empty($shop['logo'])): ?>
                            <div class="mt-2 text-muted small">Current: <?php echo htmlspecialchars($shop['logo']); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted fw-medium">Banner Image</label>
                        <input type="hidden" name="current_banner" value="<?php echo htmlspecialchars($shop['banner'] ?? 'default_banner.jpg'); ?>">
                        <input type="file" name="banner" class="form-control bg-light border-0" accept="image/*">
                        <?php if(!empty($shop['banner'])): ?>
                            <div class="mt-2 text-muted small">Current: <?php echo htmlspecialchars($shop['banner']); ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold">Save Settings</button>
            </form>
        </div>
    </div>
</div>
