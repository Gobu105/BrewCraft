<?php if(empty($_SESSION['cart_items'])): ?>
    <div class="text-center py-5 mt-5">
        <i class="fa fa-shopping-basket fa-3x text-muted mb-3 opacity-25"></i>
        <h5 class="text-muted fw-bold">Your cart is empty</h5>
        <p class="text-muted small">Looks like you haven't added anything yet.</p>
        <button class="btn btn-outline-primary rounded-pill mt-3 px-4" data-bs-dismiss="offcanvas">Continue Browsing</button>
    </div>
<?php else: ?>
    <div class="flex-grow-1 overflow-auto px-4 py-3 bg-white">
        <?php $total = 0; foreach($_SESSION['cart_items'] as $id => $item): 
            $subtotal = $item['product']['price'] * $item['quantity'];
            $total += $subtotal;
        ?>
        <div class="d-flex mb-4 align-items-center">
            <div class="bg-light rounded d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 55px; height: 55px;">
                <i class="fa fa-coffee text-muted opacity-50"></i>
            </div>
            <div class="flex-grow-1">
                <h6 class="fw-bold mb-1 text-dark"><?php echo htmlspecialchars($item['product']['name']); ?></h6>
                <span class="text-muted small">$<?php echo number_format($item['product']['price'], 2); ?></span>
            </div>
            <div class="d-flex align-items-center ms-3">
                <button class="btn btn-sm btn-light border text-dark" style="width: 32px; height: 32px; padding: 0;" onclick="updateCart(<?php echo $id; ?>, -1)">-</button>
                <span class="mx-2 fw-bold text-dark" style="min-width: 20px; text-align: center;"><?php echo $item['quantity']; ?></span>
                <button class="btn btn-sm btn-light border text-dark" style="width: 32px; height: 32px; padding: 0;" onclick="updateCart(<?php echo $id; ?>, 1)">+</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <div class="border-top p-4 mt-auto" style="background-color: var(--bg-cream);">
        <div class="d-flex justify-content-between mb-4">
            <span class="fw-bold fs-5 text-dark">Total</span>
            <span class="fw-bold text-dark fs-5">$<?php echo number_format($total, 2); ?></span>
        </div>
        
        <?php if(!isset($_SESSION['user_id'])): ?>
            <a href="<?php echo BASE_URL; ?>/login" class="btn w-100 rounded-3 py-3 fw-bold shadow-sm text-white" style="background-color: #4a3320;">Login to Checkout</a>
        <?php else: ?>
            <form action="<?php echo BASE_URL; ?>/checkout" method="POST">
                <button type="submit" class="btn w-100 rounded-3 py-3 fw-bold shadow-sm text-white" style="background-color: #4a3320;">Checkout</button>
            </form>
        <?php endif; ?>
    </div>
<?php endif; ?>

<script>
function updateCart(productId, change) {
    fetch('<?php echo BASE_URL; ?>/updateCart?id=' + productId + '&change=' + change)
        .then(res => res.text())
        .then(() => {
            loadCart(); // Reload the snippet
        });
}
</script>
