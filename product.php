<?php
 define('DB_HOST','localhost');
 define('DB_USER','root');
 define('DB_PASS','');
 define('DB_NAME','android_api');
$conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno()){
        die('unable to connect to database' . mysqli_connect_error());
}
$stmt= $conn->prepare("SELECT product_ID, product_name, description, image_url FROM product;");
$stmt->execute();
$stmt->bind_result($product_ID, $product_name, $description, $image_url);
$product= array();
while($stmt->fetch()){
        $temp=array();
        $temp['product_ID']=$product_ID;
        $temp['product_name']=$product_name;
        $temp['description']=$description;
        $temp['image_url']=$image_url;

        array_push($product, $temp);
}
echo json_encode($product);
