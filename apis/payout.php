<?php
$qry="";
if(isset($_GET['uid']) && $_GET['uid']!="")
    {
        $qry = "UPDATE claim SET status = 0 WHERE UserId=".$_GET['uid'];
    }

if($qry!=""){
    require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
header("Location: ../payout.php");
?>
