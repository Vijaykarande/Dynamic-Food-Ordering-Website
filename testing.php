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
<body>
    <?php
    include "inc/header.php";

   
    ?>
         
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



    <div class="container-fluid mt-5" style="margin-top: 200px;">
        <div class="row">
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/burger.jpg" class="d-block w-100" alt="..." id="carousel1">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 id="head">Burger</h1>
                                <p id="head1">Burgers, juicy and packed with flavorful ingredients, satisfy cravings for
                                    a classic American meal.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/cake.jpeg" class="d-block w-100" alt="..." id="carousel1">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 id="head">Cake</h1>
                                <p id="head1">Cake, a sweet indulgence with layers of moist sponge and creamy frosting,
                                    delights dessert lovers.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/pizza.jpg" class="d-block w-100" alt="..." id="carousel1">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 id="head">Pizza</h1>
                                <p id="head1">Pizza, with its gooey cheese and savory toppings, tantalizes taste buds
                                    with every bite.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


<br><br><br>
    <!-- Nikhil Page strat here -->
 
    <div class="container">
    <h2>Featured Categories</h2>
    <div class="container mt-2">
        <div class="row">
        <?php
        include "db.php"; // Include the file containing database connection
             
        // Assuming $conn is your database connection
        $sql = "SELECT * FROM `category`WHERE status = 1 ORDER BY id DESC";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Start of card div
                echo '<div class="col-xl-3 mt-3 log2 ms-2 d" style="width: 15.5rem;">';
                echo '<div class="card border-0 rounded shadow">';
                echo '<a href="All_pizzas.php" class="text-decoration-none text-dark">';
                echo '<div class="card-body mb-2">';
                echo '<img src="upload/' . $row['user_image'] . '" class="card-img-top log1">';
                echo '<h5 class="fw-bold text-center mb-0">' . $row['title'] . '</h5>';
                // echo '<p class="text-center mt-0">15</p>';
            
                echo '</div>'; // End of card-body
                echo '</a>';
                echo '</div>'; // End of card
                echo '</div>'; // End of col
            }
        } else {
            echo "zero result";
        }

        
        ?>
        </div> <!-- End of row -->
    </div> <!-- End of container -->
</div> <!-- End of container -->






 
















    <!-- Ratnakar Page strat here -->

    <div class="container mt-5">
    <h2 class="mb-5">Popular Products</h2>
    <div class="row">
        <?php
        // Check if the connection is successful
        if ($conn) {
            // Query to fetch products
            $data = "SELECT * FROM add_product WHERE status = 1 ORDER BY id DESC";
            $data_show = mysqli_query($conn, $data);

            // Check if the query was successful
            if ($data_show) {
                // Loop through each product
                while ($show = mysqli_fetch_array($data_show)) {
        ?>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3 d">
                        <div class="card border-0 rounded shadow">
                            <a href="page.php?id=<?php echo $show['id']; ?>" class="text-decoration-none text-dark">
                                <img src="upload/<?php echo $show['thumb1']; ?>" class="card-img-top log"
                                    alt="<?php echo $show['ptitle']; ?> image">
                                <div class="card-body" id="product<?php echo $show['id']; ?>">
                                    <h5 class="card-title"><?php echo $show['ptitle']; ?></h5>
                                    <h5>&#8377;<?php echo $show['price']; ?> </h5>
                            </a>
                            <div class="quantity">
                                <button onclick="decrement('quantity_product<?php echo $show['id']; ?>')">-</button>
                                <input type="text" id="quantity_product<?php echo $show['id']; ?>" name="quantity_product<?php echo $show['id']; ?>" value="1">
                                <button onclick="increment('quantity_product<?php echo $show['id']; ?>')">+</button>
                            </div>
                            <div class="add-to-cart-btn">
                                <form action="add_to_cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $show['id']; ?>">
                                    <!-- Update the value of the hidden input field to reflect the selected quantity -->
                                    <input type="hidden" name="quantity" value="1" id="quantity_hidden_product<?php echo $show['id']; ?>">
                                    <button type="submit" class="btn-style" onclick="updateQuantity(<?php echo $show['id']; ?>)">Add to Cart</button>
                                </form>
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


    <script>
    function updateQuantity(productId) {
        var selectedQuantity = document.getElementById('quantity_product' + productId).value;
        document.getElementById('quantity_hidden_product' + productId).value = selectedQuantity;
    }
</script>







    <script>
    function increment(id) {
        var input = document.getElementById(id);
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        input.value = value;
    }

    function decrement(id) {
        var input = document.getElementById(id);
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            input.value = value;
        }
    }
</script>


</body>

</html>