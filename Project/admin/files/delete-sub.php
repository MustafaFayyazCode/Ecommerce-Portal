<?php
include("../include/conn.php");
$del=$_GET['mydel'];
$sql2="SELECT * FROM `subcategory` WHERE `scid`='$del'";
$run2=mysqli_query($conn,$sql2);


    $SQL="DELETE FROM `subcategory` WHERE `scid`='$del'";
    $run=mysqli_query($conn,$SQL);
    if($run){
           echo 1;
    }else{
        echo 2;
    }

?>