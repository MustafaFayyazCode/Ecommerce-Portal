<?php  
include ("../include/Connection.php");
// include '../include/conn.php';

$in=new connection();
// $cate=$in->insert("pinventory",);

$ccate=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['ccate']));
$cdes=mysqli_real_escape_string($in->mysqli,$_POST['cdes']);
$cdate=mysqli_real_escape_string($in->mysqli,date("Y-m-d"));

$d=$in->insert("category",array(
    "ccate"=>$ccate,
    "cdes"=>$cdes,
    "cdate"=>$cdate
));

    // $sql="INSERT INTO `category`(`ccate`,`cdes`,`cdate`)VALUES('$ccate','$cdes','$cdate')";
    // $run=mysqli_query($conn,$sql);
    if($d== "inserted"){
        echo 1;
    }else{
        echo 2;
    }
 
?>
