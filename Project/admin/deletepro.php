<?php
include './include/conn.php';
$duid = $_GET['duid'];
$csql = "DELETE FROM `product` WHERE `pid` = '$duid'";
$crun = mysqli_query($conn,$csql);
if($crun){
   echo  "<script> alert('Data has been deleted') </script>";
   header("refresh:0, url=./viewpro.php");
}else{
    echo "<script> alert('Data has been not deleted') </script>";
    header("refresh:0, url=./viewpro.php");
}

?>