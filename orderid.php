<?php
// Include the database connection file
include 'db.php';

// Initialize variables
$customer_name = "";
$order_id = "";

// Fetch customer details from the database for the most recent order
$query = "SELECT cname, order_id FROM customer_order ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

// Check if query executed successfully
if($result) {
    // Check if any rows are returned
    if(mysqli_num_rows($result) > 0) {
        // Fetch the customer name and order ID from the result
        $row = mysqli_fetch_assoc($result);
        $customer_name = $row['cname'];
        $order_id = $row['order_id'];
    } else {
        // No orders found
        $customer_name = "No orders found";
        $order_id = "No orders found";
    }
} else {
    // Query execution failed
    $customer_name = "Error fetching order details";
    $order_id = "Error fetching order details";
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<head>
<style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            background-image:url('shade.jpg');
            background-size:cover;
            background-repeat:no-repeat;
            /* background-position:center; */
            
        }

        .container {
            
            margin-top: 150px;
        }

        h1 {
            color: darkblue;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
            transition: 0.3s;
            border-radius: 10px;
            
            
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: teal;
            border: none;
        }

        .btn-primary:hover {
            background-color:darkblue;
            
        }
        
#head{
    
  font-family: "Pacifico", cursive;
  font-weight: 200;
  font-style: normal;
  font-size:25px;
  text-align:center;

}
#head2{
    
  font-family: "Abril Fatface", serif;
  font-weight: 400;
  font-style: normal;
  text-decoration:underline;

}

#back{ background-image:url('1.jpg');
       

}


    </style>
<!-- Head content here -->
</head>

<body>
    <div class="container" >
        <div class="row justify-content-center" >
            <div class="col-md-6">
                <div class="card" id="back">
                    <div class="card-body">
                        <h1 class="text-center mb-4" id="head2">Order Details</h1>
                        <h2 id="head" class="mb-4">Order Placed Successfully...<i class="fa-regular fa-face-smile" style="font-size:30px; color:red;"></i></h2>
                        <p class="text-center mb-4"><i class="fa-solid fa-user"></i>&nbsp;<strong>Customer Name:</strong> <?php echo htmlspecialchars($customer_name); ?></p>
                        <p class="text-center mb-4"><i class="fa-regular fa-id-badge"></i>&nbsp;<strong>Order ID:</strong> <?php echo htmlspecialchars($order_id); ?></p>
                        <!-- <button class="btn btn-primary btn-block" onclick="trackOrder('<?php echo $order_id; ?>')" class="mb-4">Track Order</button> -->
                        <a href="User Panel/my_order.php" class="btn btn-primary btn-block">Track Order</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include any necessary JavaScript -->
    <script>
 function trackOrder(orderId) {
    console.log('Tracking order:', orderId);
    // Redirect to the order tracking page with the order ID
    window.location.href = 'my_order.php?order_id=' + encodeURIComponent(orderId);
}


    </script>
</body>

</html>
