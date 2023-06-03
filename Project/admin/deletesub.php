<?php
include './include/conn.php';
$duid = $_GET['duid'];
$qsql = "DELETE FROM `subcategory` WHERE `scid` = '$duid'";
$srun = mysqli_query($conn,$qsql);
if($srun){
   echo  "<script> alert('Data has been deleted') </script>";
   header("refresh:0, url=./viewsub.php");
}else{
    echo "<script> alert('Data has been not deleted') </script>";
    header("refresh:0, url=./viewsub.php");
}

?>