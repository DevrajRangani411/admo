<?php
$qry="";
if(isset($_GET['ad_id']) && $_GET['ad_id']!="")
    {
        $qry = "UPDATE wishlist SET status = 0 WHERE wi_id=".$_GET['ad_id'];
    }

if($qry!=""){
    require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
header("Location: ../cart.php");
?>
