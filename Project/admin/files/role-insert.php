<?php
    include('../include/conn.php');

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

    // if($name=="" || $role==""){
    //     echo 0;
    //     // echo "Please fill out all filled";
    // }else
    
        $sql="INSERT INTO `role`(`name`, `role`,`admin`, `cate`, `subcate`, `sup`, `qty`, `product`, `user`, `myorder`, `pos`,`contact`) VALUES ('$name','$role','$admin','$cate','$subcate','$sup','$qty','$product','$user','$myorder','$pos','$contact')";
        $run=mysqli_query($conn,$sql);
        if($run){
            echo 1;
            // Prduct inserted
        }else{
            echo 2;
            // Prduct not inserted
        }
    

?>