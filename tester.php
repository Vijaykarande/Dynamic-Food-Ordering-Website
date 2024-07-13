<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('path/to/your/image.jpg'); /* Add path to your image */
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* This ensures that the background image remains fixed */
    }

    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: rgba(255, 255, 255, 0.8); /* You can adjust the transparency as needed */
        padding: 20px;
        border-radius: 10px;
    }

    .input-box {
        text-align: center;
    }

    .input-field {
        margin-bottom: 20px;
    }

    .input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .submit {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit:hover {
        background-color: #0056b3;
    }

    .signin {
        text-align: center;
    }
</style>
</head>
<body>

<div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 right">
                <form action="loginconnect.php" method="post">
                    <div class="input-box">
                        <header class="mt-2">Welcome Back!!</header>
                        <div class="input-field">
                            <input type="text" name="email" class="input" id="email" required="" autocomplete="off">
                            <label for="email"><i class="fa-solid fa-envelope"></i> &nbsp;  Email</label> 
                        </div> 
                        <div class="input-field">
                            <input type="password" name="password" class="input" id="password" required="">
                            <label for="pass"><i class="fa-solid fa-lock"></i> &nbsp; Password</label>
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
                    </div>
                </form>
            </div>
            <div class="col-md-6 side-image1">
                <!-- Your side image content here -->
            </div>
        </div>
    </div>
</div>

</body>
</html>
