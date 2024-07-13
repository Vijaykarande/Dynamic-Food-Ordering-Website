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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nikhil.css">
    <link rel="stylesheet" href="Ratnakar.css">
    <link rel="stylesheet" href="dishant.css">
    <link rel="stylesheet" href="loader.css">
    <link rel="stylesheet" href="ratan.css">

    <title>
        पाहुणचार</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="img" href="img/logo1.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        .log4 {
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

<body>
    <?php
    include "inc/header.php";


    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



    <div class="container-fluid mt-5" style="margin-top: 200px;">

    </div>


    <br><br><br>
    <!-- Nikhil Page strat here -->

    <div class="container mt-5">
        <h2>Featured Categories</h2>
        <div class="container mt-2">
            <div class="row">
                <?php
                // Check if the connection is successful
                if ($conn) {
                    // Query to fetch categories
                    $data = "SELECT * FROM category WHERE status = 1 ORDER BY id DESC";
                    $data_show = mysqli_query($conn, $data);
                    $check_data = mysqli_num_rows($data_show) > 0;

                    // Check if the query was successful
                    if ($check_data) {
                        // Loop through each category
                        while ($show = mysqli_fetch_array($data_show)) {


                            ?>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mt-3 log2 ms-3 d" style="width: 18rem;">
                                <div class="card border-0 rounded shadow">
                                    <a href="sub_categories.php?title=<?php echo $show['title']; ?>"
                                        class="text-decoration-none text-dark">
                                        <div class="card-body mt-4">
                                            <img src="upload/<?php echo $show['user_image']; ?>" class="card-img-top log4 img-fluid"
                                                alt="<?php echo $show['title']; ?> image">
                                            <div class="mt-4">
                                                <h5 class="fw-bold text-center"><?php echo $show['title']; ?></h5>
                                            </div>
                                        </div>
                                    </a>
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
    </div>



    <section class="home" id="Home">
        <div class="content">
            <h3>Fresh And <span>100% Pure</span> Produts For You</h3>
            <p>This Website Is Totally Designed By पाहुणचार So That Everyone Can Easily Orderd Their Products And Use
                100% Pure Foods In Their Own Day To Day Life</p>
            <a href="#" class="btn">Order Now</a>
        </div>
    </section>


    <?php
    include "inc/footer.php";
    ?>

    <script>
        jQuery(function ($) {
            var path = window.location.href;
            // because the 'href' property of the DOM element is the absolute path
            $('ul a').each(function () {
                if (this.href === path) {
                    $(this).addClass('active');
                }
            });
            I
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="nikhil.js"></script>
    <script src="ratnakar.js"></script>
    <script src="loader.js"></script>


    <div class="loader">
        <img src="/PahuncharHMP2/loader.gif" alt="">
    </div>


</body>

</html>