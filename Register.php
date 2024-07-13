<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="yogesh11.css">
</head>

<body>

    <?php
    include "inc/header.php";
    ?>

    <br><br><br><br><br><br><br><br>

    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image" data-aos="zoom-in">



                </div>

                <div class="col-md-6 right" data-aos="zoom-out">

                    <div class="input-box">
                        <form action="insert.php" method="post" onsubmit="return formdata()">

                            <header class="mt-2">Create An Account</header>

                            <div class="input-field">
                                <input type="text" class="input" name="firstname" id="fname" required=""
                                    autocomplete="off">
                                <label for="firstname"> <i class="fa-solid fa-user"></i> &nbsp; First Name </label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" name="lastname" id="lname" required=""
                                    autocomplete="off">
                                <label for="lastname"> <i class="fa-solid fa-user"></i> &nbsp; Last Name</label>
                            </div>
                            <div class="input-field">
                                <input type="email" class="input" name="email" id="email" required=""
                                    autocomplete="off">
                                <label for="email"> <i class="fa-solid fa-envelope"></i> &nbsp; Email</label>
                            </div>
                            <div class="input-field">
                                <input type="phone" class="input" name="phone" id="phone" required=""
                                    autocomplete="off">
                                <label for="phone"> <i class="fa-solid fa-envelope"></i> &nbsp; Contact Number </label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" name="password" id="password" required="">
                                <label for="password"> <i class="fa-solid fa-lock"></i> &nbsp; Password</label>
                            </div>

                            <div class="input-field">
                                <input type="password" class="input" name="confirmpassword" id="confirmpassword"
                                    required="">
                                <label for="password"> <i class="fa-solid fa-lock"></i> &nbsp; Confirm Password</label>
                            </div>
                            <div class="input-field mb-1">


                                <p><span><input type="checkbox"> I Agree with <a1 style="text-decoration: underline;">
                                            Terms and Conditions.</a1>
                                </p>

                            </div>
<br>
                            <div class="input-field">

                                <input type="submit" name="submit" class="submit" value="Sign Up">
                            </div>
                            <div class="signin">
                                <span >Already have an account? <a href="Login.php">Log in here</a></span>
                            </div>
                            <br><br>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    include "inc/footer.php";
    ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="register.js"></script>

    <script>
        AOS.init();
        duration: 4000;
    </script>

</body>

</html>