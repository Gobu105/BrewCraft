<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Dashboard</h1>
        <p class="text-muted fs-5">Overview of your shop's performance</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small fw-medium">Total Revenue</span>
                        <i class="fa fa-dollar-sign text-muted"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-0">₹<?php echo number_format($stats['revenue'], 2); ?></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small fw-medium">Orders</span>
                        <i class="fa fa-box text-muted"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-0"><?php echo $stats['orders']; ?></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small fw-medium">Customers</span>
                        <i class="fa fa-users text-muted"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-0"><?php echo $stats['customers']; ?></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small fw-medium">Pending Orders</span>
                        <i class="fa fa-clock text-muted"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-0"><?php echo $stats['pending']; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
