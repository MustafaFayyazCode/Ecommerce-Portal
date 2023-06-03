<?php  
include '../include/conn.php';



$sp=mysqli_real_escape_string($conn,$_POST['sup']);
$supnam=mysqli_real_escape_string($conn,$_POST['supnam']);
$supmail=mysqli_real_escape_string($conn,$_POST['supmail']);
$supno=mysqli_real_escape_string($conn,$_POST['supno']);


$sql="UPDATE `supplier` SET `supnam`='  $supnam',`supmail`='$supmail',`supno`=' $supno' WHERE `sup`='$sp'";
$srun=mysqli_query($conn, $sql);
if($srun){
 echo 1;
    
}else{
   echo 2;
}
?>