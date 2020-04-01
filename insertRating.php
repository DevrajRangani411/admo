<?php
require_once ('db.php');
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
session_start();
$userId = $_SESSION['sid'];
//echo $_SESSION['sid'];

if (isset($_POST["index"], $_POST["restaurant_id"])) {

    $restaurantId = $_POST["restaurant_id"];
    $rating = $_POST["index"];

    $checkIfExistQuery = "select * from rating where user_id = '" .$_SESSION['sid']. "' and ad_id = '" . $restaurantId . "'";
    if ($result = mysqli_query($conn, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }

    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO rating(user_id,ad_id, rating) VALUES ('" .$_SESSION['sid']. "','" . $restaurantId . "','" . $rating . "') ";
        $result = mysqli_query($conn, $insertQuery);
        echo "success";
    } else {
        echo "Already Voted!";
    }
}
