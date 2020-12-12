<?php
 define('DB_HOST','localhost');
 define('DB_USER','root');
 define('DB_PASS','');
 define('DB_NAME','android_api');
$conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno()){
        die('unable to connect to database' . mysqli_connect_error());
}
$stmt= $conn->prepare("SELECT shop_ID, shop_name, Latitude, Longitude FROM shop;");
$stmt->execute();
$stmt->bind_result($shop_ID, $shop_name, $Latitude, $Longitude);
$shop= array();
while($stmt->fetch()){
        $temp=array();
        $temp['shop_ID']=$shop_ID;
        $temp['shop_name']=$shop_name;
        $temp['Latitude']=$Latitude;
        $temp['Longitude']=$Longitude;

        array_push($shop, $temp);
}
echo json_encode($shop);