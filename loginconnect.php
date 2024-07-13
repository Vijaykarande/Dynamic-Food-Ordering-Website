<?php

session_start();

include 'db.php';

if(isset($_POST['submit'])) {

$email = $_POST['email'];

$password = $_POST['password'];

$query = "SELECT * FROM `register_user` WHERE email = '$email' && password = '$password' ";

$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

if($total == 1) 
{

$_SESSION['user_email'] = $email;
header('location:index.php');

}
else
{
    header('location:Login.php');
}

}

?>