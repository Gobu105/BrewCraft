<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- Hero Start -->
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-white">Coffee Shop Menu</h1>
        <a href="<?php echo BASE_URL; ?>/cart" class="btn btn-outline-primary rounded-pill"><i class="fa fa-shopping-cart"></i> View Cart</a>
    </div>
    
    <form action="<?php echo BASE_URL; ?>/addToCart" method="post" id="orderForm">
        <div class="row g-4">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $row): ?>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100 border-0">
                            <div class="position-relative">
                                <img class="card-img-top" src="<?php echo $row['image_url']; ?>" alt="<?php echo htmlspecialchars($row['item_name']); ?>">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-primary fs-6">₹<?php echo htmlspecialchars($row['price']); ?></span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title fw-bold"><?php echo htmlspecialchars($row['item_name']); ?></h4>
                                <p class="card-text text-muted mb-4 flex-grow-1"><?php echo htmlspecialchars($row['description']); ?></p>
                                
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <label for="quantity_<?php echo $row['item_id']; ?>" class="text-muted fw-bold">Qty:</label>
                                    <div class="input-group" style="width: 100px;">
                                        <input type="number" name="quantity_<?php echo $row['item_id']; ?>" id="quantity_<?php echo $row['item_id']; ?>" class="form-control text-center bg-dark border-0" value="0" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5 glass-panel">
                    <p class="text-muted fs-4">No menu items available at the moment.</p>
                </div>
            <?php endif; ?>

            <div class="col-md-12 mt-5 text-center">
                <button type="button" class="btn btn-primary rounded-pill px-5 py-3 shadow-lg" onclick="addToCart()">
                    <i class="fa fa-plus me-2"></i> Add Items to Cart
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    function addToCart() {
        var quantityInputs = document.querySelectorAll("[id^='quantity_']");
        var cartItems = [];

        quantityInputs.forEach(function(input) {
            var itemId = input.id.split('_')[1];
            var quantity = input.value;
            if (quantity > 0) {
                cartItems.push(itemId + ":" + quantity);
            }
        });

        if(cartItems.length === 0) {
            alert("Please select at least one item.");
            return;
        }

        var cartItemsInput = document.createElement("input");
        cartItemsInput.type = "hidden";
        cartItemsInput.name = "cart_items";
        cartItemsInput.value = cartItems.join(",");
        document.getElementById("orderForm").appendChild(cartItemsInput);

        // Submit form in a real scenario:
        // document.getElementById("orderForm").submit();
        alert("Added items to your cart.");
    }
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
