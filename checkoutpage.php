<?php

session_start();

// echo "<font color='red' size='5px';'>Welcome  </font>" . ",    " . $_SESSION['user_email'];

include 'db.php';


// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: Login.php");
    exit;
}

$user_email = $_SESSION['user_email'];

// Fetch user data from the database based on the user's email
$query = "SELECT * FROM register_user WHERE email = '$user_email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@400;500;700&family=Poppins:wght@300;400;500&family=Source+Code+Pro:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="yogesh.css">
    <link rel="stylesheet" href="loader.css">
</head>

<body>

    <?php
    include "inc/header.php";
    ?>
    <br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">




            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 50px;"
                    style="background-color:          lightgray;">
                    <h4 class="mb-4" style="text-decoration: underline;"><b>CHECKOUT FORM</b></h4>
                    <h5 class=" mb-4">Billing Details</h5>






                    <form action=" " method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fullName"><i class="fa-solid fa-user"></i>&nbsp;Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="cname"
                                value="<?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>">
                            <input type="hidden" name="rand" value="<?php echo "#ord_id_" . rand(100, 999999) ?>">
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fa-solid fa-envelope"></i>&nbsp;Email</label>
                            <input type="email" class="form-control" id="email" name="cemail"
                                value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone"><i class="fa-solid fa-phone"></i>&nbsp;Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="cphone"
                                value="<?php echo $row['phone']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="date"><i class="fa-solid fa-location-dot"></i>&nbsp;Date</label>
                            <input type="text" class="form-control" id="date" name="date"
                                placeholder="Enter Today's Date">
                        </div>

                        <div class="form-group">
                            <label for="address"><i class="fa-solid fa-location-dot"></i>&nbsp;Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter Your Address">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city"><i class="fa-solid fa-city"></i>&nbsp;City</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter Your City">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="state"><i class="fa-solid fa-flag-usa"></i>&nbsp;State</label>
                                <input type="text" class="form-control" id="state" placeholder="Enter Your State">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="zip">ZIP Code</label>
                                <input type="number" class="form-control" id="zip" placeholder="Enter Zip code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country"><i class="fa-solid fa-credit-card"></i>&nbsp;Payment Mode</label>
                            <select class="form-control" id="country" name="pay_mode" placeholder="Enter Card Name">
                                <option value="">Select Mode Of Payment</option>
                                <option value="Cash On Dilevery">Cash On Dilevery</option>
                                <option value="Debit/Credit Card">Debit/Credit Card</option>
                                <option value="Netbanking">Netbanking</option>
                                <option value="UPI & QR Code">UPI & QR Code</option>

                            </select>
                        </div>
                        <hr>
                        <h4>PAYMENT INFORMATION</h4>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container mb-3">
                            <i class="fa-brands fa-cc-mastercard" style="color:orange;"></i>
                            <i class="fa-brands fa-cc-visa" style="color:red;"></i>
                            <i class="fa-brands fa-cc-stripe" style="color:navy;"></i>
                            <i class="fa-brands fa-cc-paypal" style="color:green;"></i>
                            <i class="fa-brands fa-cc-apple-pay" style="color:blue;"></i>


                        </div>




                        <div class="form-group">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                placeholder="Enter Card Number">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="expiryDate">Expiry Date</label>
                                <input type="text" class="form-control" id="expiryDate" name="expiryDate"
                                    placeholder="MM/YYYY">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Enter cvv">
                            </div>
                        </div>



                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12" class="d2">

                <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 50px;"
                    style="background-color:  lightgray;">




                    <h4 class="mb-4" style="text-decoration: underline;"><b>ORDER SUMMARY</b></h4>


                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>

                        <?php

                        include 'db.php';

                        $fetch_cart = "SELECT * FROM cart ORDER BY id DESC ";
                        $fetch_show = mysqli_query($conn, $fetch_cart);
                        $serial = 1;
                        while ($cart_item = mysqli_fetch_assoc($fetch_show)) {


                            ?>



                            <tbody>

                                <tr>
                                    <td><?php echo $serial++; ?></td>
                                    <td><?php echo $cart_item['product_name']; ?></td>
                                    <input type="hidden" name="prd_name" value="<?php echo $cart_item['product_name']; ?>">


                                    <td><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $cart_item['price']; ?></td>

                                    <td>
                                        <div class="text-center">
                                            <?php echo $cart_item['quantity']; ?>
                                        </div>
                                        <input type="hidden" name="quantity" value="<?php echo $cart_item['quantity']; ?>">
                                    </td>


                                    <td><i
                                            class="fa-solid fa-indian-rupee-sign"></i><?php echo $cart_item['total_price']; ?>
                                        <input type="hidden" name="tprice" value="<?php echo $cart_item['total_price']; ?>">

                                    </td>

                                    <!-- <td>
                                        <a href=""><button class="btn bg-danger text-white">Delete</button></a>
                                    </td> -->


                            </tbody>

                            <?php
                        }
                        ?>

                    </table>

                    <?php
                    // Calculate subtotal
                    $subTotal = 0;
                    $taxRate = 0.10; // 10% tax rate
                    $shippingCharge = 5;

                    // Fetch items from the cart
                    $fetch_cart = "SELECT * FROM cart";
                    $fetch_show = mysqli_query($conn, $fetch_cart);

                    while ($cart_item = mysqli_fetch_assoc($fetch_show)) {
                        $subTotal += $cart_item['total_price'];
                    }

                    // Calculate tax and total
                    $tax = $subTotal * $taxRate;
                    $total = $subTotal + $tax + $shippingCharge;
                    ?>

                    <div style="margin-top: 20px;">
                        <strong>Subtotal:</strong> ₹<?php echo number_format($subTotal, 2); ?><br>
                        <strong>Tax (10%):</strong> ₹<?php echo number_format($tax, 2); ?><br>
                        <strong>Shipping Charge:</strong> ₹<?php echo number_format($shippingCharge, 2); ?><br>
                        <strong>Total:</strong> ₹<?php echo number_format($total, 2); ?><br>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6"> <!-- Adjust the column size as needed -->
                        <button type="submit" class="btn btn-secondary btn-block" onclick="placeOrder()"
                            name="save">Place Your Order</button>
                    </div>
                </div>
            </div>

            </form>


            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">


                    <div class="row">
                        <!-- <button type="button" class="btn">Ok</button> -->

                        <div class="popup" id="popup">

                            <img src="/PahuncharHMP/img/tick.jpg" alt="">

                            <h2>Thank You!</h2>
                            <p>Your Order Has Been Placed Successfully. Thanks!</p>
                            <button type="button">Ok</button>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            include "inc/footer.php";
            ?>
            <script src="yogesh.js"></script>
            <script src="loader.js"></script>
            <div class="loader">
                <img src="/PahuncharHMP2/loader.gif" alt="">
            </div>



        </div>
    </div>



    <script>
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var subtotalElement = document.getElementById('subtotalValue'); // Update subtotal element ID

        var subtotal = 0;

        function subTotal() {
            subtotal = 0;
            for (var i = 0; i < iprice.length; i++) {
                var price = parseFloat(iprice[i].innerText.replace('₹', '')); // Parse the price as a float
                var quantity = parseInt(iquantity[i].value); // Parse the quantity as an integer
                var totalItemPrice = price * quantity; // Calculate total price for the item
                itotal[i].innerText = '₹' + totalItemPrice.toFixed(2); // Update total price for the item with 2 decimal places
                subtotal += totalItemPrice; // Add the total price of the item to the subtotal
            }
            subtotalElement.innerText = '₹' + subtotal.toFixed(2); // Update subtotal with 2 decimal places
        }

        subTotal(); // Call the subTotal() function initially

        // Function to handle quantity change event
        function updateTotal() {
            var changedQuantity = parseInt(this.value); // Get the changed quantity as an integer
            if (changedQuantity < 1 || isNaN(changedQuantity)) {
                this.value = 1; // Ensure quantity is not less than 1
                changedQuantity = 1;
            }
            subTotal(); // Recalculate subtotal and total prices when quantity changes
        }

        // Function to handle increment button click
        function incrementQuantity() {
            var input = this.parentNode.querySelector('.iquantity'); // Get the quantity input field
            var currentQuantity = parseInt(input.value); // Get the current quantity as an integer
            input.value = currentQuantity + 1; // Increment quantity
            updateTotal.call(input); // Update total price
        }

        // Function to handle decrement button click
        function decrementQuantity() {
            var input = this.parentNode.querySelector('.iquantity'); // Get the quantity input field
            var currentQuantity = parseInt(input.value); // Get the current quantity as an integer
            if (currentQuantity > 1) {
                input.value = currentQuantity - 1; // Decrement quantity if greater than 1
                updateTotal.call(input); // Update total price
            }
        }

        // Attach event listeners to quantity input fields
        var quantityInputs = document.querySelectorAll('.iquantity');
        quantityInputs.forEach(function (input) {
            input.addEventListener('change', updateTotal); // Call updateTotal() function when quantity changes
        });

        // Attach event listeners to increment buttons
        var incrementButtons = document.querySelectorAll('.increment');
        incrementButtons.forEach(function (button) {
            button.addEventListener('click', incrementQuantity); // Call incrementQuantity() function when button is clicked
        });

        // Attach event listeners to decrement buttons
        var decrementButtons = document.querySelectorAll('.decrement');
        decrementButtons.forEach(function (button) {
            button.addEventListener('click', decrementQuantity); // Call decrementQuantity() function when button is clicked
        });
    </script>



    <script>
        function placeOrder() {
            // Show SweetAlert for successful order placement
            Swal.fire({
                title: "Order Placed Successfully!",
                text: "Thank You For Your Purchase.",
                icon: "success"
            }).then(function () {
                // Get the values of order_id and customer_name
                var order_id = "<?php echo $order_id; ?>";
                var customer_name = "<?php echo $customer['name']; ?>";

                // Redirect to order_placed.php with necessary parameters
                window.location.href = 'orderid.php?order_id=' + order_id + '&customer_name=' + customer_name;
            });
        }
    </script>
<script>
    // Get today's date in YYYY-MM-DD format
    function getCurrentDate() {
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth() + 1; // January is 0
        var year = today.getFullYear();

        // Add leading zeros if necessary
        if (day < 10) {
            day = '0' + day;
        }
        if (month < 10) {
            month = '0' + month;
        }

        return year + '-' + month + '-' + day;
    }

    // Set the current date in the input field
    document.getElementById('date').value = getCurrentDate();
</script>

</body>

</html>

<?php
if (isset($_POST['save'])) {
    // Check if the cart is empty
    $fetch_cart = "SELECT COUNT(*) as total FROM cart";
    $fetch_show = mysqli_query($conn, $fetch_cart);
    $cart_count = mysqli_fetch_assoc($fetch_show)['total'];

    if ($cart_count == 0) {
        // Cart is empty, show pop-up message
        echo "<script>alert('Please add products to the cart first.');</script>";
    } else {
        // Get the common data for all products
        $cname = $_POST['cname'];
        $cemail = $_POST['cemail'];
        $cphone = $_POST['cphone'];
        $pay_mode = $_POST['pay_mode'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $subTotal = $_POST['subtotal'];
        $tax = $_POST['tax'];
        $shippingCharge = $_POST['shipping_charge'];

        // Generate a single order ID
        $rand = "#ord_id_" . rand(100, 999999);

        // Fetch items from the cart
        $fetch_cart = "SELECT product_name, price, SUM(quantity) AS quantity FROM cart GROUP BY product_name";
        $fetch_show = mysqli_query($conn, $fetch_cart);

        // Calculate total amount
        $subTotal = 0;
        $taxRate = 0.10; // 10% tax rate
        $shippingCharge = 5;

        $productNames = [];
        $totalQuantity = 0;
        while ($cart_item = mysqli_fetch_assoc($fetch_show)) {
            $productNames[] = $cart_item['product_name'] . '(' . $cart_item['quantity'] . ')';
            $price = $cart_item['price'];
            $quantity = $cart_item['quantity'];
            $totalItemPrice = $price * $quantity;
            $subTotal += $totalItemPrice;
            $totalQuantity += $quantity;
        }
        $tax = $subTotal * $taxRate;
        $total = $subTotal + $tax + $shippingCharge;

        // Insert order details into database
        $productName = implode(", ", $productNames); // Combine product names into a single string
        $query = "INSERT INTO `customer_order`(`order_id`, `prd_name`, `quantity`, `cname`, `cemail`, `cphone`, `pay_mode`, `tprice`, `date`, `address`, `subtotal`, `tax`, `shipping_charge`) 
                  VALUES ('$rand', '$productName', '$totalQuantity', '$cname', '$cemail', '$cphone', '$pay_mode', '$total', '$date', '$address', '$subTotal', '$tax', '$shippingCharge')";

        $data = mysqli_query($conn, $query);

        if (!$data) {
            echo "Error inserting order: " . mysqli_error($conn);
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
                    Swal.fire({
                        title: 'Order Placed Successfully',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'orderid.php?order_id=" . $rand . "'; // Redirect to orderid.php with order ID
                        }
                    });
                  </script>";

            // Clear the cart after placing the order
            $clear_cart = "DELETE FROM cart";
            mysqli_query($conn, $clear_cart);
        }
    }
}

?>