<?php

session_start();

echo "<font color='red' size='5px';'>Welcome  </font>" .",    ". $_SESSION['user_email'];

include 'db.php';
$email= $_SESSION['user_email'];

if($email == true)
{


}
else
{

header('location:Login.php');

}


?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Cart</title>

    <link rel="stylesheet" href="dishant.css">
    <link rel="stylesheet" href="loader.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    

<?php
    include "inc/header.php";
    ?>

<br><br><br><br><br><br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h2>Your Cart</h2>

                <table class="table">
                    <tr class="cart-table">
                        <th>Id</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                        <th><button type="button" class="btn btn-danger">Delete All</button></th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td>Coconut</td>
                        <td>149</td>
                        <td>
                            <div class="quantity">
                                <button onclick="decrement('product1')">-</button>
                                <input type="text" id="quantity_product1" value="1">
                                <button onclick="increment('product1')">+</button>
                            </div>
                        </td>
                        <td>248</td>
                        <td><button type="button" class="btn btn-danger">Delete</button></td>
                    </tr>
                </table>

                <div class="card-shopping">
                    <a href="#" class="btn btn-info shopping-btn">Continue Shopping</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-12">
            <br><br><br><br>
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        <hr>
                        <div class="subtotal">
                            <p>Subtotal: 248rs.</p>

                        </div>
                        <a href="checkoutpage.php" class="btn btn-primary btn-block checkout-btn">Proceed to
                            Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
<?php
    include "inc/footer.php";
    ?>
 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="dishant.js"></script>
    <script src="loader.js"></script>


    <div class="loader">
        <img src="/PahuncharHMP2/loader.gif" alt="">
    </div>
    


</body>

</html>