<div class="p-5 d-flex flex-column" style="min-height: 100vh;">
    <div class="mb-5">
        <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Platform Overview</h1>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small fw-medium">Total Shops</span>
                        <i class="fa fa-store text-muted"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-1"><?php echo $stats['shops']; ?></h2>
                    <span class="text-muted small">1 active</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small fw-medium">Total Users</span>
                        <i class="fa fa-users text-muted"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-1"><?php echo $stats['users']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small fw-medium">Total Orders</span>
                        <i class="fa fa-box text-muted"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-1"><?php echo $stats['orders']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small fw-medium">Platform GMV</span>
                        <i class="fa fa-dollar-sign text-muted"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-1">₹<?php echo number_format($stats['gmv'], 2); ?></h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-auto pt-5">
        <div class="card border-0 shadow-sm" style="border-radius: 12px; background: white;">
            <div class="card-body p-4">
                <h6 class="fw-medium text-dark mb-0">Welcome back!</h6>
            </div>
        </div>
    </div>
</div>
