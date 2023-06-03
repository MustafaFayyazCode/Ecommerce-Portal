<?php
include './include/conn.php';
$did = $_GET['did'];
$qsql = "DELETE FROM `quantity` WHERE `qid` = '$did'";
$qrun = mysqli_query($conn,$qsql);
if($qrun){
   echo  "<script> alert('Data has been deleted') </script>";
   header("refresh:0, url=./viewquant.php");
}else{
    echo "<script> alert('Data has been not deleted') </script>";
    header("refresh:0, url=./viewquant.php");
}

?>