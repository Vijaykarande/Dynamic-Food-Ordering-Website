
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
    <link rel="stylesheet" href="yogesh1.css">
    <link rel="stylesheet" href="loader.css">

</head>
<body>


<?php
    include "inc/header.php";
    ?>

<br><br><br><br><br><br><br><br>
<div class="wrapper">
    <div class="container main">
        <div class="row">
            

            <div class="col-md-6 right"data-aos="fade-left">

            <form action="loginconnect.php" method="post" onsubmit="return validateForm()">

                
                <div class="input-box">
                   
                   <header class="mt-2">Welcome Back!!</header>

                   <div class="input-field">
                        <input type="text" name="email" class="input" id="email" required="" autocomplete="off">
                        <label for="email">   <i class="fa-solid fa-envelope"></i> &nbsp;  Email</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password" name="password" class="input" id="password" required="">
                        <label for="pass">  <i class="fa-solid fa-lock"></i> &nbsp; Password</label>
                    </div> 

                    <div class="input-field mb-4">
                        
                        
                        <p><span><input type="checkbox"> Remember Me</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span style="text-align: right;"><a href="#" class="r1">Forgot Password</a></span></p>
                        
                   </div> 

                   <div class="input-field">
                        
                        <input type="submit" name="submit" class="submit" value="Login">
                   </div> 
                   <div class="signin mb-2">
                    <span>Don't Have an Account? &nbsp; <a href="Register.php">Register Now!!</a></span>


                   </div>

                
            </form>
                
            </div>  
            </div>


            <div class="col-md-6 side-image1" data-aos="fade-right">
                       
      <!-- <img src="images/picture4.jpg" alt=""> -->
                
            </div>
        </div>
    </div>
</div>

<?php
    include "inc/footer.php";
    ?>

              

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
    duration: 4000;



    function formLogin(){
        Swal.fire({
  title: "Successfully Logged In!!",
  text: "Thank You.",
  icon: "success"
});
    }
  </script>
  <script>
    function validateForm() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        // Check if email is empty
        if (email.trim() === "") {
            alert("Email must be filled out");
            return false;
        }

        // Check if email is valid (simple check for @ symbol)
        if (email.indexOf("@") === -1) {
            alert("Please enter a valid email address");
            return false;
        }

        // Check if password is empty
        if (password.trim() === "") {
            alert("Password must be filled out");
            return false;
        }

        return true; // Form is valid
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>