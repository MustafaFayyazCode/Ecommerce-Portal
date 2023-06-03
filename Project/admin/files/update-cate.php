<?php  
include '../include/conn.php';

    $cuid=mysqli_real_escape_string($conn,$_POST['sid']);
    $ccate=mysqli_real_escape_string($conn,$_POST['ccate']);
    $cdes=mysqli_real_escape_string($conn,$_POST['cdes']);
    $cdate=mysqli_real_escape_string($conn,date('Y-M-D'));

$sql="UPDATE `category` SET `ccate`='$ccate',`cdes`='$cdes',`cdate`='$cdate' WHERE `sid`='$cuid'";
$run=mysqli_query($conn,$sql);
if($run){
  echo 1;
}else{
   echo 2;

}

?>