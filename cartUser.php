<?php
 define('DB_HOST','localhost');
 define('DB_USER','root');
 define('DB_PASS','');
 define('DB_NAME','android_api');
$conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno()){
        die('unable to connect to database' . mysqli_connect_error());
}
$stmt= $conn->prepare("SELECT id, unique_id, name, email, encrypted_password, salt, created_at, updated_at, address, number FROM users;");
$stmt->execute();
$stmt->bind_result($id, $unique_id, $name, $email, $encrypted_password, $salt, $created_at, $updated_at, $address, $number );
$cartUser= array();
while($stmt->fetch()){
        $temp=array();
        $temp['id']=$id;
        $temp['unique_id']=$unique_id;
        $temp['name']=$name;
        $temp['email']=$email;
        $temp['encrypted_password']=$encrypted_password;
        $temp['salt']=$salt;
        $temp['created_at']=$created_at;
        $temp['updated_at']=$updated_at;
        $temp['address']=$address;
        $temp['number']=$number;

        array_push($cartUser, $temp);
}
echo json_encode($cartUser);