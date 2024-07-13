<?php


$servername= "localhost";
$username= "root";
$password= "";
$dbname= "db_pahunchaar";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    //  echo "Connection is Successful";
}
else
{
    echo "Connection is Failed".mysqli_connect_error();                      ;
 }
?>