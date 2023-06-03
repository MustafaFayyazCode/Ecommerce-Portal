<?php  
include '../include/Connection.php';
$in=new connection();

    $qquantity=mysqli_real_escape_string($in->mysqli,$_POST['qquantity']);
    $qdescription=mysqli_real_escape_string($in->mysqli,$_POST['qdescription']);
    $date=mysqli_real_escape_string($in->mysqli,date("Y-m-d"));
 

// $sql="INSERT INTO `quantity`(`qquantity`,`qdescription`,`date`)VALUES('$qquantity','$qdescription','$date')";

$d=$in->insert("quantity",array(
   "qquantity"=>$qquantity,
   "qdescription"=>$qdescription,
   "date"=>$date
));
// $run=mysqli_query($conn,$sql);
if($d=="inserted"){
   echo 1;
}else{
    echo 2;

}

?>