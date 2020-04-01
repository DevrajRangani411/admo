<?php
$qry="";
if(isset($_GET['sid']) && $_GET['sid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "UPDATE advertisement SET ad_approved = 0 WHERE ad_id=".$_GET['sid'];
    }else if(isset($_GET['rev']) && $_GET['rev']==true){
        $qry = "UPDATE advertisement SET ad_approved = 1 WHERE ad_id=".$_GET['sid'];
    }
}
if($qry!=""){
    require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
header("Location: ../admin.php");
?>
