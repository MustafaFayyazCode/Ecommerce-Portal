<?php  
include '../include/conn.php';
    $cuid=mysqli_real_escape_string($conn,$_POST['scid']);
    $subcate=mysqli_real_escape_string($conn,$_POST['subcate']);
    $subdes=mysqli_real_escape_string($conn,$_POST['subdes']);
    $subdate=mysqli_real_escape_string($conn,date('subdate'));

$sql="UPDATE `subcategory`SET `subcate`='$subcate',`subdes`='$subdes',`subdate`='$subdate'WHERE `scid`='$cuid'";
$run=mysqli_query($conn,$sql);
if($run){
 echo 1;

}else{
    echo 2;

}

?>