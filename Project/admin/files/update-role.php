<?php
     include('../include/conn.php');
    @$uid=mysqli_real_escape_string($conn,$_POST['rid']);
    @$name=strtolower(mysqli_real_escape_string($conn,$_POST['name']));
    @$role=strtolower(mysqli_real_escape_string($conn,$_POST['role']));
    @$admin=strtolower(mysqli_real_escape_string($conn,$_POST['admin']));
    @$cate=strtolower(mysqli_real_escape_string($conn,$_POST['cate']));
    @$subcate=strtolower(mysqli_real_escape_string($conn,$_POST['subcate']));
    @$sup=strtolower(mysqli_real_escape_string($conn,$_POST['sup']));
    @$qty=strtolower(mysqli_real_escape_string($conn,$_POST['qty']));
    @$product=strtolower(mysqli_real_escape_string($conn,$_POST['product']));
    @$user=strtolower(mysqli_real_escape_string($conn,$_POST['user']));
    @$myorder=strtolower(mysqli_real_escape_string($conn,$_POST['myorder']));
    @$pos=strtolower(mysqli_real_escape_string($conn,$_POST['pos']));
    @$contact=strtolower(mysqli_real_escape_string($conn,$_POST['contact']));

   $sql="UPDATE `role` SET `rid`='$uid',`name`='$name',`role`='$role',`admin`='$admin',`cate`='$cate',`subcate`='$subcate',`sup`='$sup',`qty`='$qty',`product`='$product',`user`='$user',`myorder`='$myorder',`pos`='$pos',`contact`='$contact' WHERE `rid`='$uid'";
    $run=mysqli_query($conn,$sql);
    if($run){
    echo 1;
    }else{
    echo 2;
    }
 
?>