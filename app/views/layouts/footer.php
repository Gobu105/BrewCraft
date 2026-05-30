    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0 text-white-50">&copy; 2026 BrewCraft. All rights reserved.</p>
        </div>
    </footer>

    <!-- Slide-in Cart Offcanvas -->
    <div class="offcanvas offcanvas-end shadow" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
        <div class="offcanvas-header border-bottom border-light">
            <h5 class="offcanvas-title fw-bold" id="cartOffcanvasLabel">Your Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column" id="cart-content">
            <!-- Cart items will be loaded here via JS -->
            <div class="text-center py-5 text-muted">
                <div class="spinner-border text-primary" role="status"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Cart Logic -->
    <script>
        const cartOffcanvas = new bootstrap.Offcanvas(document.getElementById('cartOffcanvas'));
        
        // Intercept cart icon click to open offcanvas
        document.querySelectorAll('a[href$="/cart"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                loadCart();
                cartOffcanvas.show();
            });
        });

        function addToCart(productId) {
            fetch('<?php echo BASE_URL; ?>/addToCart?id=' + productId)
                .then(res => res.text())
                .then(() => {
                    // Quick flash effect or toast can go here
                    loadCart();
                    cartOffcanvas.show();
                });
        }

        function loadCart() {
            fetch('<?php echo BASE_URL; ?>/cart')
                .then(res => res.text())
                .then(html => {
                    document.getElementById('cart-content').innerHTML = html;
                });
        }
    </script>
</body>
</html>
