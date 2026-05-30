<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold text-dark mb-2">Orders</h1>
        <p class="text-muted">Manage your incoming orders.</p>
    </div>

    <div class="card stat-card p-4">
        <table class="table table-borderless align-middle">
            <thead class="text-muted border-bottom">
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th class="text-end">Update</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $o): ?>
                <tr class="border-bottom">
                    <td class="fw-bold">#<?php echo str_pad($o['id'], 5, '0', STR_PAD_LEFT); ?></td>
                    <td><?php echo htmlspecialchars($o['customer_name']); ?></td>
                    <td class="fw-bold">$<?php echo number_format($o['total_price'], 2); ?></td>
                    <td>
                        <?php 
                        $badgeClass = 'bg-secondary';
                        if($o['status'] == 'pending') $badgeClass = 'bg-warning text-dark';
                        if($o['status'] == 'preparing') $badgeClass = 'bg-primary';
                        if($o['status'] == 'ready') $badgeClass = 'bg-info text-dark';
                        if($o['status'] == 'completed') $badgeClass = 'bg-success';
                        ?>
                        <span class="badge <?php echo $badgeClass; ?> rounded-pill px-3 py-2 text-uppercase" style="font-size: 0.75rem;">
                            <?php echo htmlspecialchars($o['status']); ?>
                        </span>
                    </td>
                    <td class="text-end">
                        <form method="POST" action="<?php echo BASE_URL; ?>/admin/orders" class="d-inline-flex gap-2">
                            <input type="hidden" name="order_id" value="<?php echo $o['id']; ?>">
                            <select name="status" class="form-select form-select-sm" style="width: 130px;">
                                <option value="pending" <?php if($o['status']=='pending') echo 'selected'; ?>>Pending</option>
                                <option value="preparing" <?php if($o['status']=='preparing') echo 'selected'; ?>>Preparing</option>
                                <option value="ready" <?php if($o['status']=='ready') echo 'selected'; ?>>Ready</option>
                                <option value="completed" <?php if($o['status']=='completed') echo 'selected'; ?>>Completed</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <?php if(empty($orders)): ?>
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">
                        <i class="fa fa-inbox fa-3x mb-3 opacity-25"></i>
                        <h5>No orders yet.</h5>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
