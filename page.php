<?php

$servername = "localhost";
$username = "root";  // username
$password = "";   // password
$dbname = "db_pahunchaar";    // database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Connection Failed";
}

$id = $_GET['id'];
$select = "SELECT * FROM `add_product` WHERE id=$id";
$all_product = mysqli_query($conn, $select);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

               <!-- font cdn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="loader.css">
               <!-- font cdn -->
               <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
       #buton{ width: 100px;
               font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
               border-radius: 15px;
               background-image: linear-gradient(orange, red,brown);
               height: 32px;
               margin-top: 10px;
               color: aliceblue;
               box-shadow: 3px 3px 3px gray;
               transition: all;
             }

             #buton:hover{ width: 100px;
               font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
               border-radius: 15px;
               background-image: linear-gradient(green,yellowgreen);
               height: 32px;
               margin-top: 10px;
               color: gold;
               box-shadow: 3px 3px 3px gray;
               transform: scale(1.1);
             }

             #box{ border: 1px solid blue;
                    font-size: 12px;
                    padding:0px  5px;
                    display: inline;
                    margin-left:15px;
                    color: blue;
                    font-weight: 10;
                    font-family: cursive    ;
             }
             .logo1{ margin-top: 20px;
                    font-size: 33px;
                    padding: 10px;
                    color: blue;
                    transition: all;
                }

                .logo2{ margin-top: 20px;
                    font-size: 33px;
                    padding: 10px;
                    color:deeppink;
                    transition: all;
                }
                .logo3{ margin-top: 20px;
                    font-size: 33px;
                    padding: 10px;
                    color:deepskyblue;
                    transition: all;
                }

            .logo1:hover{ margin-top: 20px;
                    font-size: 33px;
                    padding: 10px;
                    color: black;
                    transform: scale(1.2);
                }
                .logo2:hover{ margin-top: 20px;
                    font-size: 33px;
                    padding: 10px;
                    color:darkslateblue;
                    transform: scale(1.2);
                }
                .logo3:hover{ margin-top: 20px;
                    font-size:33px;
                    padding: 10px;
                    color: yellowgreen;
                    transform: scale(1.2);
                }

     #head1{ font-family: "Amaranth", sans-serif;
               text-shadow: 5px 5px 5px gray;
               font-size: 38px;

            }
    #head2{   font-family: "Amaranth", sans-serif;
              text-shadow: 5px 5px 5px gray;
              font-size: 28px;
           } 
           #head3{   font-family: "Amaranth", sans-serif;
                     font-size: 18px;
           }        
    </style>
  </head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include "inc/header.php"; ?>
    <br><br><br><br><br><br><br><br><br>

    <main>
        <?php
        if ($all_product->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($all_product)) {
        ?>
                <div class="container-fluid mt-5">
                    <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">

</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="border-radius:10px;box-shadow: 3px 3px 3px gray">
                  <div class="carousel-item active">
                    <img src="upload/<?php echo $row["thumb1"]; ?>" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="upload/<?php echo $row["thumb2"]; ?>" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="upload/<?php echo $row["thumb3"]; ?>" class="d-block w-100" alt="...">
                  </div>
                  
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <span class="mt-5">
                    <i class="fa-brands fa-facebook  logo1 " ></i>
                    <i class="fa-brands fa-square-instagram logo2"></i>
                    <i class="fa-brands fa-square-twitter  logo3 " ></i>
            </span>
        </div>


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <!-- Product details -->
                            <h2 id="head1"><?php echo $row["ptitle"]; ?></h2>
                            <h3 id="head1"><?php echo $row["pcategory"]; ?></h3>
                            <!-- Additional product information -->
                            <a href="#" style="text-decoration: none;">
                                <h6><img src="images/non-veg.png" alt="" style="width: 15px; height: 15px;"> &nbsp;Continental</h6>
                            </a>
                            <span>
                                <h4 style="display: inline; text-decoration: line-through;">₹<?php echo $row["price"]; ?></h4>
                                &nbsp; &nbsp;
                                <h4 style="display: inline;">₹<?php echo $row["dprice"]; ?></h4>
                            </span>
                            <div>
                                <button id="buton">ADD</button>
                            </div>
                            <br><br><br>
                            <h5 id="head2">DETAILS ABOUT THIS MEAL</h5>
                            <p id="head3"><?php echo $row["pdesc"]; ?></p>
                            <br><br>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "Product not found";
        }
        $conn->close();
        ?>
    </main>

    <script src="loader.js"></script>
    <?php include "inc/footer.php"; ?>
</body>

</html>






