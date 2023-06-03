<?php  
include '../include/Connection.php';
$in=new connection();

    $supnam=mysqli_real_escape_string($in->mysqli,$_POST['supnam']);
    $supmail=mysqli_real_escape_string($in->mysqli,$_POST['supmail']);
    $supno=mysqli_real_escape_string($in->mysqli,$_POST['supno']);
  
$d=$in->insert("supplier",array(
   "supnam"=>$supnam,
   "supmail"=>$supmail,
   "supno"=>$supno
));
    // $sql="INSERT INTO `supplier`(`supnam`,`supmail`,`supno`)VALUE('$supnam','$supmail','$supno')";
    // $srun=mysqli_query($conn, $sql);
    if($d=="inserted"){
        echo 1;
    }else{
        echo 2;
    }



?>