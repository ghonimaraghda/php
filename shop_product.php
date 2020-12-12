<?php
 define('DB_HOST','localhost');
 define('DB_USER','root');
 define('DB_PASS','');
 define('DB_NAME','android_api');
$conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno()){
        die('unable to connect to database' . mysqli_connect_error());
}
$stmt= $conn->prepare("SELECT shop_product_ID, shop_ID, product_ID, price, special_offers FROM shop_product;");
$stmt->execute();
$stmt->bind_result($shop_product_ID, $shop_ID, $product_ID, $price, $special_offers);
$shop_product= array();
while($stmt->fetch()){
        $temp=array();
        $temp['shop_product_ID']=$shop_product_ID;
        $temp['shop_ID']=$shop_ID;
        $temp['product_ID']=$product_ID;
        $temp['price']=$price;
        $temp['special_offers']=$special_offers;

        array_push($shop_product, $temp);
}
echo json_encode($shop_product);