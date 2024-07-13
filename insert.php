<?php

include 'db.php';

if (isset($_POST['submit']))
    ;





$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];


/* dishant email query */

$checkuser = "SELECT * FROM register_user WHERE email = '$email'";
$result = mysqli_query($conn, $checkuser);
$count = mysqli_num_rows($result);
if ($count > 0) {
    echo "<script>
           alert('Email already exists');
           window.location.replace('Register.php');     
    </script>";
} else {
    $sql = "insert into register_user(id,firstname,lastname, email,phone,password,confirmpassword) 
values( '','$firstname','$lastname','$email','$phone','$password','$confirmpassword')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo " <script>

alert('Data Inserted Successsfully');
window.location.replace('Register.php');

</script>";
    } else {

        echo "Data Not Inserted Successfully";


    }
}


?>