<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>

<div class="container">
    <h1 class="my-4">Shopping Cart</h1>
    <div id="cartItems">
        <!-- Cart items will be dynamically added here -->
    </div>
</div>

<script>
    // Sample cart items data (you can fetch this from the server)
    const cartItemsData = [
        { name: "Coffee 1", price: 3.99 },
        { name: "Coffee 2", price: 4.99 },
        { name: "Coffee 3", price: 2.99 }
    ];

    // Function to dynamically render cart items
    function renderCartItems() {
        const cartContainer = document.getElementById("cartItems");
        cartContainer.innerHTML = "";
        cartItemsData.forEach(item => {
            const cartItemHTML = `
                <div class="mb-2">
                    ${item.name} - $${item.price}
                </div>
            `;
            cartContainer.innerHTML += cartItemHTML;
        });
    }

    // Render cart items when the page loads
    window.onload = renderCartItems;
</script>

</body>
</html>
