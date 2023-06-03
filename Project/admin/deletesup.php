<?php
include './include/conn.php';
$dsp=$_GET['dsp'];
$sql="DELETE FROM `supplier` WHERE `sup`='$dsp'";
$run=mysqli_query($conn,$sql);
if($run){
echo  "<script> alert('Data has been deleted') </script>";
header("refresh:0, url=./viewsup.php");
}else{
 echo "<script> alert('Data has been not deleted') </script>";
 header("refresh:0, url=./viewsup.php");
}
?>