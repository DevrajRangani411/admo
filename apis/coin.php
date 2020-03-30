<?php
require_once("../php/connect_db.php");
$qry="";
$qry6="";
$qry5='select * from temp where UserId="' .$_GET['UserId'] .'" and ad_id="'.$_GET['ad_id'] .'"';
$result =$con->query($qry5);
if($result->num_rows==0){
 $qry1='select coin from wallet where UserId="' .$_GET['UserId'] .'"';
$coin1=$con->query($qry1);
$row = $coin1->fetch_assoc();
$coin=$row['coin']+10;
$qry3='select * from wallet where UserId="' .$_GET['UserId'] .'"';

 $count=$con->query($qry3);
if($count->num_rows >0){

    $qry4='update wallet set coin="'.$coin.'" where UserId="' .$_GET['UserId'] .'"';
    $qry6='insert into temp (UserId,ad_id) values ("' .$_GET['UserId'] .'","'.$_GET['ad_id'].'")';
     $con->query($qry6);
    $con->query($qry4);
}else{

         $qry = 'INSERT INTO wallet (UserId,coin) VALUES ("' . $_GET['UserId'] . '","'  . $coin . '")';
    $qry6='insert into temp (UserId,ad_id) values ("' .$_GET['UserId'] .'","'.$_GET['ad_id'].'")';
     $con->query($qry6);


}

if($qry!=""){

    $con->query($qry);

    require_once("../php/close_db.php");
}
}
header("Location: ../index.php");
?>

