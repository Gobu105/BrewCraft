<div class="p-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Menu Products</h1>
            <p class="text-muted fs-5">Manage your coffee and food items.</p>
        </div>
        <button class="btn text-white fw-bold shadow-sm" style="background-color: #4a3320; border-radius: 8px; padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#addProductModal">
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
                            <div class="bg-light rounded d-flex align-items-center justify-content-center me-3 overflow-hidden" style="width: 35px; height: 35px; min-width: 35px;">
                                <?php if(!empty($product['image']) && $product['image'] !== 'default_product.jpg'): ?>
                                    <img src="<?php echo BASE_URL; ?>/public/uploads/products/<?php echo htmlspecialchars($product['image']); ?>" class="w-100 h-100" style="object-fit: cover;">
                                <?php else: ?>
                                    <i class="fa fa-image text-muted opacity-50"></i>
                                <?php endif; ?>
                            </div>
                            <span class="text-dark fw-medium"><?php echo htmlspecialchars($product['name']); ?></span>
                        </div>
                    </td>
                    <td class="py-3 text-muted"><?php echo htmlspecialchars($product['category_name'] ?? 'Uncategorized'); ?></td>
                    <td class="py-3 text-dark fw-medium">₹<?php echo number_format($product['price'], 2); ?></td>
                    <td class="py-3">
                        <form method="POST" action="<?php echo BASE_URL; ?>/owner/products/stock" class="d-inline">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <div class="form-check form-switch d-inline-block m-0" style="font-size: 1.2rem;">
                                <input class="form-check-input cursor-pointer" type="checkbox" name="in_stock" onchange="this.form.submit()" <?php echo $product['in_stock'] ? 'checked' : ''; ?>>
                            </div>
                        </form>
                    </td>
                    <td class="py-3 pe-4">
                        <button class="btn btn-sm btn-link text-muted" data-bs-toggle="modal" data-bs-target="#editProductModal-<?php echo $product['id']; ?>"><i class="fa fa-pen"></i></button>
                        <form method="POST" action="<?php echo BASE_URL; ?>/owner/products/delete" class="d-inline" onsubmit="return confirm('Delete this product?');">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-link text-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                
                <!-- Edit Product Modal -->
                <div class="modal fade" id="editProductModal-<?php echo $product['id']; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog text-start">
                    <div class="modal-content border-0" style="border-radius: 12px;">
                      <form method="POST" action="<?php echo BASE_URL; ?>/owner/products/edit" enctype="multipart/form-data">
                      <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-medium">Product Name</label>
                            <input type="text" name="name" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-medium">Price (₹)</label>
                            <input type="number" step="0.01" name="price" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($product['price']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-medium">Category</label>
                            <select name="category_id" class="form-select bg-light border-0" required>
                                <?php foreach($categories as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>" <?php echo $product['category_id'] == $cat['id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($cat['name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-medium">Product Image</label>
                            <input type="file" name="image" class="form-control bg-light border-0" accept="image/*">
                            <div class="form-text">Leave blank to keep current image.</div>
                        </div>
                      </div>
                      <div class="modal-footer border-0 bg-light rounded-bottom">
                        <button type="button" class="btn btn-link text-muted text-decoration-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn text-white px-4" style="background-color: var(--primary); border-radius: 8px;">Save Changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0" style="border-radius: 12px;">
      <form method="POST" action="<?php echo BASE_URL; ?>/owner/products" enctype="multipart/form-data">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label class="form-label text-muted small fw-medium">Product Name</label>
            <input type="text" name="name" class="form-control bg-light border-0" required>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-medium">Price (₹)</label>
            <input type="number" step="0.01" name="price" class="form-control bg-light border-0" required>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-medium">Category</label>
            <select name="category_id" class="form-select bg-light border-0" required>
                <?php foreach($categories as $cat): ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-medium">Product Image</label>
            <input type="file" name="image" class="form-control bg-light border-0" accept="image/*">
        </div>
      </div>
      <div class="modal-footer border-0 bg-light rounded-bottom">
        <button type="button" class="btn btn-link text-muted text-decoration-none" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn text-white px-4" style="background-color: var(--primary); border-radius: 8px;">Save Product</button>
      </div>
      </form>
    </div>
  </div>
</div>
