function increment(element) {
    var quantityElement = element.parentNode.querySelector('span');
    var quantity = parseInt(quantityElement.textContent);
    quantityElement.textContent = quantity + 1;
    updateTotal(element);
    updateSubtotal();
  }
  
  function decrement(element) {
    var quantityElement = element.parentNode.querySelector('span');
    var quantity = parseInt(quantityElement.textContent);
    if (quantity > 1) {
      quantityElement.textContent = quantity - 1;
      updateTotal(element);
      updateSubtotal();
    }
  }
  
  function updateTotal(element) {
    var quantity = parseInt(element.parentNode.querySelector('span').textContent);
    var price = parseInt(element.parentNode.parentNode.querySelector('td:nth-child(2)').textContent.replace('$', ''));
    var totalElement = element.parentNode.parentNode.querySelector('td:nth-child(4)');
    var total = quantity * price;
    totalElement.textContent = 'Rs.' + total;
  }
  
  function updateSubtotal() {
    var subtotal = 0;
    var rows = document.querySelectorAll('tbody tr');
    rows.forEach(function(row) {
      var total = parseInt(row.querySelector('td:nth-child(4)').textContent.replace('Rs.', ''));
      subtotal += total;
    });
    var tax = parseFloat(document.getElementById('tax').value);
    var shipping = parseFloat(document.getElementById('shipping').value);
    var totalAmount = subtotal + (subtotal * (tax / 100)) + shipping;
    document.getElementById('subtotal').textContent = 'Rs.' + totalAmount.toFixed(2);
}

    let popup = document.getElementById("popup");
        
        
    function openPopup()
    {
     popup.classList.add("open-popup");
    }
    
    function closePopup()
    {
     popup.classList.remove("open-popup");
    }

    function applyCoupon() { 
        var couponCode = document.getElementById('coupon').value;
        // You can implement coupon code validation and apply discounts here
        alert('Coupon code applied successfully!');
            };

        