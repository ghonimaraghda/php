<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    //Define your host here.
$HostName = "localhost";

//Define your database username here.
$HostUser = "root";

//Define your database password here.
$HostPass = "";

//Define your database name here.
$DatabaseName = "android_api";



 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $ID = $_POST['cart_ID'];

$Sql_Query = "DELETE FROM cart WHERE cart_ID = '$ID'";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Record Deleted Successfully';
}
else
{
 echo 'Something went wrong';
 }
 }
 mysqli_close($con);
?>