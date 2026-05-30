<div class="p-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Categories</h1>
            <p class="text-muted fs-5">Group your menu items.</p>
        </div>
        <button class="btn text-white fw-bold shadow-sm" style="background-color: #4a3320; border-radius: 8px; padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fa fa-plus me-2"></i> Add Category
        </button>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: white; overflow: hidden;">
        <table class="table mb-0 align-middle">
            <thead class="bg-white">
                <tr>
                    <th class="border-bottom-0 text-muted fw-medium py-3 ps-4" style="font-size: 0.95rem;">Name</th>
                    <th class="border-bottom-0 text-muted fw-medium py-3 pe-4 text-end" style="font-size: 0.95rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Dummy data if empty for layout purposes
                if(empty($categories)) {
                    $categories = [
                        ['id' => 1, 'name' => 'Pour Overs'],
                        ['id' => 2, 'name' => 'Espresso'],
                        ['id' => 3, 'name' => 'Cold Brew'],
                        ['id' => 4, 'name' => 'Pastries']
                    ];
                }
                foreach($categories as $category): ?>
                <tr>
                    <td class="py-3 ps-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                <i class="fa fa-grip-vertical text-muted opacity-50"></i>
                            </div>
                            <span class="text-dark fw-medium"><?php echo htmlspecialchars($category['name']); ?></span>
                        </div>
                    </td>
                    <td class="py-3 pe-4 text-end">
                        <button class="btn btn-sm btn-link text-muted" data-bs-toggle="modal" data-bs-target="#editCategoryModal-<?php echo $category['id']; ?>"><i class="fa fa-pen"></i></button>
                        <form method="POST" action="<?php echo BASE_URL; ?>/owner/categories/delete" class="d-inline" onsubmit="return confirm('Delete this category? This will also delete all products inside this category.');">
                            <input type="hidden" name="category_id" value="<?php echo $category['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-link text-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Category Modal -->
                <div class="modal fade" id="editCategoryModal-<?php echo $category['id']; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog text-start">
                    <div class="modal-content border-0" style="border-radius: 12px;">
                      <form method="POST" action="<?php echo BASE_URL; ?>/owner/categories/edit">
                      <input type="hidden" name="category_id" value="<?php echo $category['id']; ?>">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-medium">Category Name</label>
                            <input type="text" name="name" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($category['name']); ?>" required>
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

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0" style="border-radius: 12px;">
      <form method="POST" action="<?php echo BASE_URL; ?>/owner/categories">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label class="form-label text-muted small fw-medium">Category Name</label>
            <input type="text" name="name" class="form-control bg-light border-0" required>
        </div>
      </div>
      <div class="modal-footer border-0 bg-light rounded-bottom">
        <button type="button" class="btn btn-link text-muted text-decoration-none" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn text-white px-4" style="background-color: var(--primary); border-radius: 8px;">Save Category</button>
      </div>
      </form>
    </div>
  </div>
</div>
