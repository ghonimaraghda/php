<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);
if (isset($_POST['shopName']) && isset($_POST['productName']) && isset($_POST['Price']) && isset($_POST['user_ID'] )) {
 
    // receiving the post params
    $shopName = $_POST['shopName'];
    $productName = $_POST['productName'];
    $Price = $_POST['Price'];
    $user_ID=$_POST['user_ID'];


     // create a new cart product
     $cart = $db->storeCart($shopName, $productName, $Price, $user_ID);
     if ($cart) {
        // cart stored successfully
        $response["error"] = FALSE;
        $response["cart"]["shopName"] = $cart["shopName"];
        $response["cart"]["productName"] = $cart["productName"];
        $response["cart"]["Price"] = $cart["Price"];
        $response["cart"]["user_ID"] = $cart["user_ID"];
        echo json_encode($response);
    } else {
        // cart failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown error occurred in registration!";
        echo json_encode($response);
    }
 
   
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
}
?>