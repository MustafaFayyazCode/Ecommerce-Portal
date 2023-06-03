<?php
include("../include/conn.php");
$duid=$_GET['mydel'];
$sql2="SELECT * FROM `category` WHERE `sid`='$duid'";
$run2=mysqli_query($conn,$sql2);


    $SQL="DELETE FROM `category` WHERE `sid`='$duid'";
    $run=mysqli_query($conn,$SQL);
    if($run){
           echo 1;
        
    }else{
        echo 2;
    }


?>