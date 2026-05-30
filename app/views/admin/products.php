<div class="p-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Menu Products</h1>
            <p class="text-muted fs-5">Manage your coffee and food items.</p>
        </div>
        <button class="btn text-white fw-bold shadow-sm" style="background-color: #4a3320; border-radius: 8px; padding: 10px 20px;">
            <i class="fa fa-plus me-2"></i> Add Product
        </button>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: white; overflow: hidden;">
        <table class="table mb-0 align-middle text-center">
            <thead class="bg-white">
                <tr>
                    <th class="border-bottom-0 text-muted fw-medium py-3 ps-4 text-start" style="font-size: 0.95rem;">Name</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Category</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">Price</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3" style="font-size: 0.95rem;">In Stock</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3 pe-4" style="font-size: 0.95rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Dummy data if empty for layout purposes
                if(empty($products)) {
                    $products = [
                        ['id' => 1, 'name' => 'Ethiopia Yirgacheffe', 'category_name' => 'Pour Overs', 'price' => 6.50, 'in_stock' => 1],
                        ['id' => 2, 'name' => 'Guatemala Antigua', 'category_name' => 'Pour Overs', 'price' => 5.75, 'in_stock' => 1],
                        ['id' => 3, 'name' => 'Cortado', 'category_name' => 'Espresso', 'price' => 4.50, 'in_stock' => 1],
                        ['id' => 4, 'name' => 'Oat Milk Latte', 'category_name' => 'Espresso', 'price' => 5.25, 'in_stock' => 1],
                        ['id' => 5, 'name' => 'Signature Cold Brew', 'category_name' => 'Cold Brew', 'price' => 5.50, 'in_stock' => 1],
                        ['id' => 6, 'name' => 'Almond Croissant', 'category_name' => 'Pastries', 'price' => 4.75, 'in_stock' => 1],
                        ['id' => 7, 'name' => 'Morning Bun', 'category_name' => 'Pastries', 'price' => 4.25, 'in_stock' => 1]
                    ];
                }
                foreach($products as $product): ?>
                <tr>
                    <td class="py-3 ps-4 text-start">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                <i class="fa fa-image text-muted opacity-50"></i>
                            </div>
                            <span class="text-dark fw-medium"><?php echo htmlspecialchars($product['name']); ?></span>
                        </div>
                    </td>
                    <td class="py-3 text-muted"><?php echo htmlspecialchars($product['category_name'] ?? 'Uncategorized'); ?></td>
                    <td class="py-3 text-dark fw-medium">$<?php echo number_format($product['price'], 2); ?></td>
                    <td class="py-3">
                        <div class="form-check form-switch d-inline-block m-0" style="font-size: 1.2rem;">
                            <input class="form-check-input cursor-pointer" type="checkbox" <?php echo $product['in_stock'] ? 'checked' : ''; ?>>
                        </div>
                    </td>
                    <td class="py-3 pe-4">
                        <button class="btn btn-sm btn-link text-muted"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-sm btn-link text-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
