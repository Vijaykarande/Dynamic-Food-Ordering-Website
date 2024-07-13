var quantities = {
    product1: 1,
    product2: 1,
    product3: 1,
    product4: 1,
    product5: 1,
    product6: 1,
    product7: 1,
    product8: 1
};

function increment(productId) {
    var quantityInput = document.getElementById('quantity_' + productId);
    var currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
    quantities[productId]++;
}

function decrement(productId) {
    var quantityInput = document.getElementById('quantity_' + productId);
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
        quantities[productId]--;
    }
}

function addToCart(productId) {
    var quantity = quantities[productId];
    alert('Added ' + quantity + ' of Product ' + productId + ' to cart.');
    // Here you can implement the logic to actually add the product to the cart
}