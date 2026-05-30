<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Manage Shops</h1>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: white; overflow: hidden;">
        <table class="table mb-0 align-middle">
            <thead class="bg-white">
                <tr>
                    <th class="border-bottom-0 text-muted fw-medium py-3 ps-4" style="font-size: 0.95rem;">Shop ID</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Name</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Owner</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Created</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Status</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3 pe-4 text-end" style="font-size: 0.95rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($shops as $i => $s): ?>
                <tr>
                    <td class="py-3 ps-4 text-muted">#<?php echo $i+1; ?></td>
                    <td class="py-3 text-dark fw-medium"><?php echo htmlspecialchars($s['name']); ?></td>
                    <td class="py-3 text-dark"><?php echo htmlspecialchars($s['owner']); ?></td>
                    <td class="py-3 text-muted"><?php echo htmlspecialchars($s['created_at']); ?></td>
                    <td class="py-3">
                        <span class="badge text-success bg-success bg-opacity-10 px-2 py-1 border border-success" style="border-radius: 4px;"><?php echo htmlspecialchars($s['status']); ?></span>
                    </td>
                    <td class="py-3 pe-4 text-end">
                        <form method="POST" action="<?php echo BASE_URL; ?>/admin/shops/ban" class="d-inline" onsubmit="return confirm('Are you sure you want to ban and delete this shop?');">
                            <input type="hidden" name="shop_id" value="<?php echo $s['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-danger rounded text-white px-3 fw-bold" style="background-color: #ef4444; border-color: #ef4444;">Ban</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
