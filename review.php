<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>

    <style>
        .rating-container {
            text-align: center;
        }

        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            font-size: 28px;
            cursor: pointer;
            display: inline-block; /* Added to align stars properly */
        }

        .rating input {
            display: none;
        }

        .rating label {
            display: inline-block;
            position: relative;
            width: 48px;
            margin: 0; /* Adjusted to remove default margin */
            color: #fff; /* Initial color */
        }

        .rating label::before {
            content: "\2605";
            position: absolute;
            opacity: 1; /* Changed from 0 to 1 to make all stars visible */
            transition: color 0.25s;
        }

        .rating label:hover:before,
        .rating input:checked ~ label:before {
            color: orange; /* Color on hover and when checked */
        }
    </style>
</head>
<body>

<?php include "inc/header.php"; ?>

<br><br><br><br><br><br><br><br>

<div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image" data-aos="zoom-in">
                <!-- Side Image -->
            </div>

            <div class="col-md-6 right" data-aos="zoom-out">
                <div class="input-box">
                <form action="vijayinsert.php" method="post" onsubmit="return validateForm()">
                        <header class="mt-2">Write Your Review</header>
                        <div class="input-field">
                            <input type="text" class="input" name="name" id="name" required="" autocomplete="off">
                            <label for="name"> <i class="fa-solid fa-user"></i> &nbsp; Name </label>
                        </div>
                        <div class="input-field">
                            <input type="num" class="input" name="mobno" id="mobno" required="" autocomplete="off">
                            <label for="mobno"> <i class="fa-solid fa-mobile"></i> &nbsp; MobNo</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" name="email" id="email" required="" autocomplete="off">
                            <label for="email"> <i class="fa-solid fa-envelope"></i> &nbsp; Email</label>
                        </div>
                        <br>
                        <textarea class="review-text" name="review" id="review" rows="7" cols="65" placeholder="Write your review here..." required></textarea>
                        
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                        </div>
                        <br><br><br>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "inc/footer.php"; ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>
<script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var mobno = document.getElementById('mobno').value;
        var review = document.getElementById('review').value;

        if (name == "" || email == "" || mobno == "" || review == "") {
            alert("All fields must be filled out");
            return false;
        }

        // Validate email format
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Invalid email address");
            return false;
        }

        // Validate mobile number format
        var mobnoPattern = /^\d{10}$/;
        if (!mobnoPattern.test(mobno)) {
            alert("Invalid mobile number");
            return false;
        }

        // Validate name format (only alphabetic characters and spaces)
        var namePattern = /^[A-Za-z\s]+$/;
        if (!namePattern.test(name)) {
            alert("Name can only contain alphabetic characters and spaces");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
