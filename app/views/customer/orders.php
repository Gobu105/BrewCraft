<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">My Orders</h1>
        <p class="text-muted fs-5">Track and view your recent purchases.</p>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: white; overflow: hidden;">
        <table class="table mb-0 align-middle">
            <thead class="bg-white">
                <tr>
                    <th class="border-bottom-0 text-muted fw-medium py-3 ps-4" style="font-size: 0.95rem;">Order ID</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Shop</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Date</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Total</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Status</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3 pe-4 text-end" style="font-size: 0.95rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $o): ?>
                <tr>
                    <td class="py-3 ps-4 text-muted">#<?php echo htmlspecialchars($o['id']); ?></td>
                    <td class="py-3 text-dark fw-medium"><?php echo htmlspecialchars($o['shop']); ?></td>
                    <td class="py-3 text-muted"><?php echo htmlspecialchars($o['date']); ?></td>
                    <td class="py-3 text-dark fw-bold">$<?php echo number_format($o['total'], 2); ?></td>
                    <td class="py-3">
                        <?php 
                            if($o['status'] == 'Completed') $badgeClass = 'bg-success text-success border-success';
                            else if($o['status'] == 'Processing') $badgeClass = 'bg-warning text-warning border-warning';
                            else $badgeClass = 'bg-secondary text-secondary border-secondary';
                        ?>
                        <span class="badge bg-opacity-10 px-2 py-1 border <?php echo $badgeClass; ?>" style="border-radius: 4px;"><?php echo htmlspecialchars($o['status']); ?></span>
                    </td>
                    <td class="py-3 pe-4 text-end">
                        <button class="btn btn-sm text-primary fw-medium">View Receipt</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
