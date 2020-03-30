<?php
 require_once("../php/connect_db.php");
$qry="";
if(isset($_GET['ad_id']) && $_GET['ad_id']!="")
    {
    $qry1='select * from wishlist where ad_id="' .$_GET['ad_id'] .    '" and UserId="'  . $_GET['UserId'] . '"';
    $result=$con->query($qry1);
    if($result->num_rows > 0){
        echo "Already aadded";

    }else{


      $qry = 'INSERT INTO wishlist (ad_id,ad_title,ad_image,UserId) VALUES ("' .$_GET['ad_id'] .    '","' .$_GET['ad_title']  . '","' .$_GET['ad_image'] .    '","'  . $_GET['UserId'] . '")';
    }

}
if($qry!=""){

    $con->query($qry);
    require_once("../php/close_db.php");
}
header("Location: ../index.php");
?>
