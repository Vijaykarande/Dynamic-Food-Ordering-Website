<?php
// Include database connection file
include 'Admin Panel/connection.php';


?>
<?php

session_start();

// echo "<font color='red' size='5px';'>Welcome  </font>" .",    ". $_SESSION['user_email'];

include 'db.php';
$email = $_SESSION['user_email'];

if ($email == true) {


} else {

    header('location:Login.php');

}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nikhil.css">
    <link rel="stylesheet" href="Ratnakar.css">
    <link rel="stylesheet" href="loader.css">
    <title>
        पाहुणचार</title>

    <link rel="icon" type="img" href="img/logo1.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">




    <title>All Pizzas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="nikhil.css">
    <style>
        .log {
            max-width: 100%;
            aspect-ratio: 3/3;
            object-fit: contain;

        }

        .d:hover {
            transform: scale(0.9);
            box-shadow: 5px 5px 10px orange;
            transition: all 0.4s ease-in-out;
        }
    </style>
</head>

<body>
    <?php
    include "inc/header.php";
    ?>
    <br><br><br><br><br><br><br><br><br>
    <div class="container mt-5">
        <h2>Sub-Categories Page</h2>
        <div class="row mt-3">
            <?php
            $title = $_GET['title'];
            $data = "SELECT * FROM add_product WHERE pcategory = '$title' AND status = 1 ORDER BY id DESC";

            // Check if the connection is successful
            if ($conn) {



                $data_show = mysqli_query($conn, $data);

                // Check if the query was successfuld
                if ($data_show) {
                    // Loop through each product
                    while ($show = mysqli_fetch_array($data_show)) {
                        ?>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-sm-12 mt-2 d">
                            <div class="card h-100 border-0 rounded shadow">
                                <div class="mt-3"><img src="upload/<?php echo $show['thumb1']; ?>" class="card-img-top log"></div>
                                <div class="card-body" id="product3">
                                    <h5 class="card-title text-center"><?php echo $show['ptitle']; ?></h5>
                                    <h5 class="text-center">&#8377;<?php echo $show['price']; ?></h5>
                                    <div class="quantity">
                                        <button onclick="decrement('product3')">-</button>
                                        <input type="text" id="quantity_product3" value="1">
                                        <button onclick="increment('product3')">+</button>
                                    </div>
                                    <div class="add-to-cart-btn d-flex justify-content-center my-3">
                                        <button onclick="addToCart('product3')" class="btn-style ">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Error executing query: " . mysqli_error($conn);
                }

                // Close the database connection
                mysqli_close($conn);
            } else {
                echo "Error connecting to the database: " . mysqli_connect_error();
            }
            ?>
        </div>
    </div>

    <script src="nikhil.js"></script>

    <script src="loader.js"></script>


    <div class="loader">
        <img src="/PahuncharHMP2/loader.gif" alt="">
    </div>
    <?php
    include "inc/footer.php";
    ?>
</body>

</html>