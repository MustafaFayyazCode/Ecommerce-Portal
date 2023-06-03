<?php  
include '../include/conn.php';

    $uid=mysqli_real_escape_string($conn,$_POST['qid']);
    $qquantity=mysqli_real_escape_string($conn,$_POST['qquantity']);
    $qdescription=mysqli_real_escape_string($conn,$_POST['qdescription']);
    $date=mysqli_real_escape_string($conn,date('date'));

    $sql="UPDATE `quantity` SET `qquantity`='$qquantity',`qdescription`='$qdescription',`date`='$date' WHERE `qid`='$uid'";
$run=mysqli_query($conn,$sql);
if($run){
  echo 1;

}else{
    echo 2;

}

?>