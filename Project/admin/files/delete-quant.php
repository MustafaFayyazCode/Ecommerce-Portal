<?php
include("../include/conn.php");
$del=$_GET['mydel'];
$sql2="SELECT * FROM `quantity` WHERE `qid`='$del'";

    $SQL="DELETE FROM `quantity` WHERE `qid`='$del'";
    $run=mysqli_query($conn,$SQL);
    if($run){
           echo 1;
    }else{
        echo 2;
    }

?>