<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Platform Users</h1>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: white; overflow: hidden;">
        <table class="table mb-0 align-middle">
            <thead class="bg-white">
                <tr>
                    <th class="border-bottom-0 text-muted fw-medium py-3 ps-4" style="font-size: 0.95rem;">User ID</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Name</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Email</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Role</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3 pe-4" style="font-size: 0.95rem;">Joined</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $i => $u): ?>
                <tr>
                    <td class="py-3 ps-4 text-muted">#<?php echo $i+1; ?></td>
                    <td class="py-3 text-dark fw-medium"><?php echo htmlspecialchars($u['name']); ?></td>
                    <td class="py-3 text-dark"><?php echo htmlspecialchars($u['email']); ?></td>
                    <td class="py-3 text-dark fw-medium"><?php echo htmlspecialchars($u['role']); ?></td>
                    <td class="py-3 text-muted pe-4"><?php echo htmlspecialchars($u['created_at']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
