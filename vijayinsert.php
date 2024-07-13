<?php

include 'db.php';

if(isset($_POST['submit']));





$name=$_POST['name'];
$mobno=$_POST['mobno'];
$email=$_POST['email'];
$review=$_POST['review'];
$rating=$_POST['rating'];





$sql= "insert into `review_user`(`id`,`name`,`mobno`, `email`,`review`,`rating`) 
values( '','$name','$mobno','$email','$review','$rating')";

$query=mysqli_query($conn, $sql);

if($query) 
{
    echo " <script>

alert('Data Inserted Successsfully');
window.location.replace('Register.php');

</script>";
}

else{

echo "Data Not Inserted Successfully";


}



?>