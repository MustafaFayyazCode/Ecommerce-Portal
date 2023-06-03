<?php
include '../include/conn.php';


session_start();

// $mac = $_SESSION['mac'];

// =========================================Login in ===============================================
// echo $_POST['email'];
if(isset($_POST['pemail'])){
    $_SESSION['email']=$_POST['pemail'];
    $pemail=$_SESSION['email'];
    $mypass=mysqli_real_escape_string($conn,$_POST['pass']);
    if(($pemail=="")||($mypass=="")){
        echo 8;
        // echo "Please fill email and password";
    }else{
        $esql="SELECT * FROM `signup` WHERE `email`='$pemail' AND `password`='$mypass'";
        $erun=mysqli_query($conn,$esql);
        if(mysqli_num_rows($erun)){
            echo 9;
            // echo "Email and Password Insereted";
        }
        else{
            echo 10;
            // echo "Email and Password Not Insereted";
        }
    }
}


if(isset($_POST['email'])){
$name=mysqli_real_escape_string($conn,$_POST['name']);
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$contact=mysqli_real_escape_string($conn,$_POST['contact']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$saddress=mysqli_real_escape_string($conn,$_POST['saddress']);
$country=mysqli_real_escape_string($conn,$_POST['country']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$postal=mysqli_real_escape_string($conn,$_POST['postal']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$confirm=mysqli_real_escape_string($conn,$_POST['confirm']);
$sdate=date("y-m-d");

$sql="INSERT INTO `signup`(`name`,`fname`,`contact`,`address`,`saddress`,`country`,`city`,`postal`,`email`,`password`,`confirm`,`sdate`)VALUES('$name','$fname','$contact','$address','$saddress','$country','$city','$postal','$email','$password','$confirm',$sdate)";
$run=mysqli_query($conn,$sql);
if($run){
    echo 1;
}else{
    echo 2;
}
}
// else{
//     echo 4;
//     // echo "Password Does Not Match";
// }
// }


?>