<?php
include '../../admin/include/conn.php'; 
session_start();
// ================== Profile Image Changing ===============
if(isset($_POST['pemail'])){
    $pimg=$_FILES['pimage']['name'];
    $ptem = $_FILES['pimage']['tmp_name'];
    $pemail = mysqli_real_escape_string($conn,$_POST['pemail']);
    $exe = pathinfo($pimg,PATHINFO_EXTENSION);
    $arr = ['jpg','JPG','JPEG','PNG','jpeg','png'];
    if(in_array($exe, $arr)){
        $picname = rand(100000,900000);
        $pic2 = $picname.".".$exe;
        @$msg3="right";
    }else{
        echo 1;
    }
    
    if(@$msg3=="right"){
        $isql = "UPDATE `signup` SET `image`='$pic2' WHERE `email`='$pemail'";
        $irun = mysqli_query($conn,$isql);
        if($irun){
            move_uploaded_file($_FILES['pimage']['tmp_name'],"../img/images/".$pic2);
            echo 2;
        }else{
            echo 3;
        }
    }
}
// ================== Profile Image Changing ===============


// =====================Table==============================

$output="";
if(isset($_POST['pdata'])){
    $pemail = $_SESSION['email'];
    
    $output="";
    $csql = "SELECT * FROM `myorder` WHERE `order_email`='$pemail' AND `order_status`='Pending'";
    $crun = mysqli_query($conn,$csql);
    while($cfet = mysqli_fetch_array($crun)){
        $output.='<tr>
        
        <td>'.$cfet['order_id'].'</td>
        <td>'.$cfet['proname'].'</td>
        <td>'.$cfet['procode'].'</td>
        <td>'.$cfet['srppr'].'</td>
        <td>'.$cfet['quant'].'</td>
        <td>'.$cfet['uprice'].'</td>
        <td>'.$cfet['order_status'].'</td>
        <td>'.$cfet['order_date'].'</td>
        </tr>';
       
    }
    if($output!=""){
        echo $output;
    }else{
        echo "<tr><td colspan=7 style='color:black; font-size:25px; padding-top:7px;' > No Record Found </td></tr>";
    }
}

$output="";
if(isset($_POST['cdata'])){
    $pemail = $_SESSION['email'];
    $output="";
    $csql = "SELECT * FROM `myorder` WHERE `order_email`='$pemail' AND `order_status`='Completed'";
    $crun = mysqli_query($conn,$csql);
    while($cfet = mysqli_fetch_array($crun)){
        $output.='<tr>
        <td>'.$cfet['order_id'].'</td>
        <td>'.$cfet['proname'].'</td>
        <td>'.$cfet['procode'].'</td>
        <td>'.$cfet['srppr'].'</td>
        <td>'.$cfet['quant'].'</td>
        <td>'.$cfet['uprice'].'</td>
        <td>'.$cfet['order_status'].'</td>
        <td>'.$cfet['order_date'].'</td>
        </tr>';
    }
    if($output!=""){
        echo $output;
    }else{
        echo "<tr><td colspan=7 style='color:black; font-size:25px; padding-top:7px;' > No Record Found </td></tr>";
    }
}
// =====================Table==============================


?>