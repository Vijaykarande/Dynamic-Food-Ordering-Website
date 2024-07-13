    // Object to store quantities of each product
    var quantities = {
        product1: 1
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
