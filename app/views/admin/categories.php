<div class="p-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold text-primary mb-2" style="font-family: 'Playfair Display', serif;">Categories</h1>
            <p class="text-muted fs-5">Group your menu items.</p>
        </div>
        <button class="btn text-white fw-bold shadow-sm" style="background-color: #4a3320; border-radius: 8px; padding: 10px 20px;">
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
                        <button class="btn btn-sm btn-link text-muted"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-sm btn-link text-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
