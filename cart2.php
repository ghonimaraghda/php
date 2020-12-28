<?php
 define('DB_HOST','localhost');
 define('DB_USER','root');
 define('DB_PASS','');
 define('DB_NAME','android_api');
$conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno()){
        die('unable to connect to database' . mysqli_connect_error());
}
$stmt= $conn->prepare("SELECT cart_ID, shopName, productName, Price, user_ID FROM cart;");
$stmt->execute();
$stmt->bind_result($cart_ID, $shopName, $productName, $Price, $user_ID);
$cart2= array();
while($stmt->fetch()){
        $temp=array();
        $temp['cart_ID']=$cart_ID;
        $temp['shopName']=$shopName;
        $temp['productName']=$productName;
        $temp['Price']=$Price;
        $temp['user_ID']=$user_ID;

        array_push($cart2, $temp);
}
echo json_encode($cart2);