<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold text-dark mb-2">Platform Overview</h1>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="stat-card card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="card-title mb-0">Total Shops</span>
                    <i class="fa fa-store text-muted"></i>
                </div>
                <h2 class="fw-bold text-dark"><?php echo $stats['shops']; ?></h2>
                <small class="text-muted"><?php echo $stats['shops']; ?> active</small>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="card-title mb-0">Total Users</span>
                    <i class="fa fa-users text-muted"></i>
                </div>
                <h2 class="fw-bold text-dark"><?php echo $stats['users']; ?></h2>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="card-title mb-0">Total Orders</span>
                    <i class="fa fa-box text-muted"></i>
                </div>
                <h2 class="fw-bold text-dark"><?php echo $stats['orders']; ?></h2>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="card-title mb-0">Platform GMV</span>
                    <i class="fa fa-dollar-sign text-muted"></i>
                </div>
                <h2 class="fw-bold text-dark">$<?php echo number_format($stats['gmv'], 2); ?></h2>
            </div>
        </div>
    </div>
</div>
