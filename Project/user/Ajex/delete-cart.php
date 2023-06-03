<?php
include '../include/conn.php';
$del=$_GET['mydel'];
$sql2="SELECT * FROM `addcart` WHERE `cartid`='$del'";
$run2=mysqli_query($conn,$sql2);
$fet=mysqli_fetch_assoc($run2);
if(!empty($fet['pimg'])){
       $pic=$fet['pimg'];
       $mypic=explode(",",$pic);
       foreach($mypic as $p){
        // unlink(".././admin/imgs".$p);
    
       }
}
    $SQL="DELETE FROM `addcart` WHERE `cartid`='$del'";
    $run=mysqli_query($conn,$SQL);
    if($run){
           echo 1;
    }else{
        echo 2;
    }
?>