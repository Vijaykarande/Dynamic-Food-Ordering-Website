<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .card-body {
            padding: 2rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.75rem 1.25rem;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 0.75rem 1.25rem;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .cart-table th {
            font-size: 0.875rem;
            text-transform: uppercase;
            font-weight: bold;
            color: #495057;
            background-color: #f1f1f1;
        }

        .cart-table img {
            max-width: 100px;
            height: auto;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity button {
            background-color: #e9ecef;
            border: none;
            color: #495057;
            padding: 0.5rem;
            cursor: pointer;
        }

        .quantity input {
            width: 40px;
            text-align: center;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            margin: 0 0.5rem;
            padding: 0.5rem;
            box-sizing: border-box;
        }

        .quantity input:focus {
            outline: none;
        }

        .card-shopping {
            margin-top: 2rem;
        }

        .shopping-btn {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.75rem 1.25rem;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        .shopping-btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .checkout-btn {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">

            <?php
            // Include your database connection file
            include 'db.php';

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get the product ID and quantity from the form
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $total_price = $quantity * $price; // Calculate the total price
                


                

                // Check if the product is already in the cart
                $existing_product_query = "SELECT * FROM cart WHERE product_id = ?";
                $existing_product_stmt = $conn->prepare($existing_product_query);
                $existing_product_stmt->bind_param("i", $product_id);
                $existing_product_stmt->execute();
                $existing_product_result = $existing_product_stmt->get_result();

                if ($existing_product_result->num_rows > 0) {
                    // Product already exists in the cart, update the quantity
                    $existing_product = $existing_product_result->fetch_assoc();
                    $new_quantity = $existing_product['quantity'] + $quantity;

                    $update_query = "UPDATE cart SET quantity = ?, total_price = ? WHERE product_id = ?";
                    $update_stmt = $conn->prepare($update_query);
                    $update_stmt->bind_param("idi", $new_quantity, $total_price, $product_id);
                    $update_stmt->execute();
                } else {
                    // Product does not exist in the cart, add it
                    // Prepare and execute the SQL query to insert the item into the cart table
                    $insert_query = "INSERT INTO cart (product_id, product_name, price, quantity, total_price) VALUES (?, ?, ?, ?, ?)";
                    $insert_stmt = $conn->prepare($insert_query);
                    $insert_stmt->bind_param("isidi", $product_id, $product_name, $price, $quantity, $total_price);
                    $insert_stmt->execute();
                }

                // Redirect to prevent form resubmission
                header("Location: index.php");
                exit();
            }



            
            // Retrieve cart details and display cart summary and product details
            $cart_query = "SELECT * FROM cart INNER JOIN add_product ON cart.product_id = add_product.id ";
            $cart_result = mysqli_query($conn, $cart_query);

            ?>
            <div class="col-lg-8 col-md-12">
                <h2>Your Cart</h2>

                <?php
                if ($cart_result && mysqli_num_rows($cart_result) > 0) {
                    ?>
                    <table class="table">
                        <tr class="cart-table">
                            <th>#</th>
                            <!-- <th>Id</th> -->
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Modify</th>
                            <th>Total</th>
                            <th>Action</th>
                            <!-- <th><button type="button" class="btn btn-danger">Delete All</button></th> -->
                        </tr>
                        <?php
                        $serial = 1;
                        while ($cart_item = mysqli_fetch_array($cart_result)) {
                            // Display each cart item
                            ?>




                            <tr>
                                <td><?php echo $serial++; ?></td>
                                <!-- <td><?php echo $cart_item['id']; ?></td> -->
                                <td><img src="upload/<?php echo $cart_item['thumb1']; ?>"
                                        alt="<?php echo $cart_item['ptitle']; ?> image" style="width: 50px;"></td>
                                <td><?php echo $cart_item['ptitle']; ?></td>
                                <td class="iprice">&#8377;<?php echo $cart_item['price']; ?></td>
                                <form method="POST" action="update_cart.php">
                                    <input type="hidden" name="product_id" value="<?php echo $cart_item['id']; ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $cart_item['ptitle']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $cart_item['price']; ?>">
                                    <td>
                                        <div class="quantity">
                                            <button type="button" class="decrement">-</button>
                                            <input type="text" name="quantity" class="iquantity"
                                                value="<?php echo $cart_item['quantity']; ?>">
                                            <button type="button" class="increment">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Modify</button>
                                    </td>
                                </form>

                                <td class="itotal" id="total_product_<?php echo $cart_item['id']; ?>">
                                    &#8377;<?php echo $cart_item['price'] * $cart_item['quantity']; ?></td>
                                <td>

                                    <a href="delete_cart.php?product_id=<?php echo $cart_item['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                } else {
                    // Display message if cart is empty
                    echo "<p>Your cart is empty!</p>";
                }
                ?>

                <div class="card-shopping">
                    <a href="index.php" class="btn btn-info shopping-btn">Continue Shopping</a>
                </div>
            </div>


            <div class="col-lg-4 col-md-12">
                <br><br><br><br>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        <hr>
                        <div class="subtotal">
                            <p>Subtotal:</p><span id="quantity_product"><i
                                    class="fa-solid fa-indian-rupee-sign"></i></span>
                        </div>
                        <a href="checkoutpage.php" class="btn btn-primary btn-block checkout-btn">Proceed to
                            Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- constant -->



<!-- 

<script>
    function modifyCart(productId) {
        var form = document.getElementById('updateCartForm_' + productId);
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_cart.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert("Cart updated successfully!");
                // You can perform additional actions here if needed
            }
        };
        xhr.send(formData);
    }
</script> -->





    <script>
    // Updated JavaScript code here
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var subtotalElement = document.getElementById('quantity_product');
    var subtotal = 0;

    function subTotal() {
        subtotal = 0;
        for (i = 0; i < iprice.length; i++) {
            var price = parseFloat(iprice[i].innerText.replace('₹', ''));
            var quantity = parseInt(iquantity[i].value);
            var totalItemPrice = price * quantity;
            itotal[i].innerText = '₹' + totalItemPrice.toFixed(2);
            subtotal += totalItemPrice;
        }
        subtotalElement.innerHTML = "<i class='fa-solid fa-indian-rupee-sign'></i>" + subtotal.toFixed(2);
    }

    subTotal();

    function updateTotal() {
        var changedQuantity = parseInt(this.value);
        if (changedQuantity < 1 || isNaN(changedQuantity)) {
            this.value = 1;
            changedQuantity = 1;
        }

        var productId = this.parentNode.querySelector('input[name="product_id"]').value;
        var productPrice = parseFloat(this.parentNode.querySelector('.iprice').innerText.replace('₹', ''));
        var totalItemPrice = productPrice * changedQuantity;

        this.parentNode.nextElementSibling.innerText = '₹' + totalItemPrice.toFixed(2);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_cart.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send('product_id=' + productId + '&quantity=' + changedQuantity);
        subTotal();
    }

    var quantityInputs = document.querySelectorAll('.iquantity');
    quantityInputs.forEach(function(input) {
        input.addEventListener('change', updateTotal);
    });

    var incrementButtons = document.querySelectorAll('.increment');
    incrementButtons.forEach(function(button) {
        button.addEventListener('click', incrementQuantity);
    });

    var decrementButtons = document.querySelectorAll('.decrement');
    decrementButtons.forEach(function(button) {
        button.addEventListener('click', decrementQuantity);
    });

    function incrementQuantity() {
        var input = this.parentNode.querySelector('.iquantity');
        var currentQuantity = parseInt(input.value);
        input.value = currentQuantity + 1;
        updateTotal.call(input);
    }

    function decrementQuantity() {
        var input = this.parentNode.querySelector('.iquantity');
        var currentQuantity = parseInt(input.value);
        if (currentQuantity > 1) {
            input.value = currentQuantity - 1;
            updateTotal.call(input);
        }
    }
</script>

</body>

</html>
<?php
// Close the database connection
$conn->close();
?>