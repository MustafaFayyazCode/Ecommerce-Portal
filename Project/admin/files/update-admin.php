<?php
     include('../include/conn.php');

    $uid=mysqli_real_escape_string($conn,$_POST['aid']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);
    
   $sql="UPDATE `admin` SET `aid`='$uid',`name`='$name',`email`='$email',`password`='$password',`cpassword`='$cpassword',`role`='$role' WHERE `aid`='$uid'";
    $run=mysqli_query($conn,$sql);
    if($run){
    //    echo "<script>alert('DATA HAS BEEN Updated')</script>";
    echo 1;
    }else{
    //    echo "<script>alert('DATA HAS NOT BEEN Updated')</script>";
    echo 2;
    }
 
?>