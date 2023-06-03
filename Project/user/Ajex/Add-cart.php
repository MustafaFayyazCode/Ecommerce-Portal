<?php
include '../include/conn.php';

function mac(){
    ob_start();
    system("ipconfig/all");
    $mycon=ob_get_contents();
    ob_clean();
    $findme="Physical";
    $pmac=strpos($mycon,$findme);
    $mac=substr($mycon,($pmac+36),17);
    return $mac;
}

$_SESSION['mac']= mac();
$mac=$_SESSION['mac'];

if((isset($_POST['pemail']))){
    if($_POST['pemail']==""){
        echo 4;
    }else{

$pid=mysqli_real_escape_string($conn,$_POST['pid']);
$proname=mysqli_real_escape_string($conn,$_POST['proname']);
$prodes=mysqli_real_escape_string($conn,$_POST['prodes']);
$uprice=mysqli_real_escape_string($conn,$_POST['uprice']);
$procode=mysqli_real_escape_string($conn,$_POST['procode']);
$prostck=mysqli_real_escape_string($conn,$_POST['prostck']);
$srppr=mysqli_real_escape_string($conn,$_POST['srppr']);
$pimg=$_POST['pimg'];
$pemail=mysqli_real_escape_string($conn,$_POST['pemail']);
$quant=1;
$sql="SELECT * FROM `addcart` WHERE `procode`='$procode' AND `pemail`='$pemail'";
    $run=mysqli_query($conn,$sql);
    if(mysqli_num_rows($run)){
        // echo ("Already exist");
        echo 0;
    }else{
// $p=array();
// foreach($p as $val){
//     $exe=strtolower(pathinfo($val,PATHINFO_EXTENSION));
//     $arr=array("jpg","jpeg","png");
//     if(in_array($exe,$arr)){
//         $p[]=$val;
//         @$msg="right";
//     }
//     else{
//         $msg="not right";
//     }
// }

// $pic=implode(",",$p); 
// if(@$msg =="right"){
 $sql="INSERT INTO `addcart`(`pid`,`proname`,`prodes`,`uprice`,`procode`,`prostck`,`srppr`,`quant`,`pimg`,`maccode`,`pemail`)VALUES('$pid','$proname','$prodes','$uprice','$procode','$prostck','$srppr','$quant','$pimg','$mac','$pemail')";
    $run=mysqli_query($conn,$sql);
    if($run){
        // echo("Data Inserted");
        echo 1;
    }else{
        // echo("Data Not Inserted");
        echo 2;
    }
    
    }
}

}

if(isset($_POST['mycart'])){
    $count="SELECT * FROM `addcart`";
    $runc=mysqli_query($conn,$count);
    $c=mysqli_num_rows($runc);
    echo $c;
}

if(isset($_POST['upid'])){
    $pid=$_POST['upid'];
    $pqty=$_POST['quant'];
    $tpr= $_POST['uprice'];
    $h=$pqty*$tpr;
$upt="UPDATE `addcart` SET `quant`='$pqty',`srppr`='$h' WHERE `cartid`='$pid'";
    $run=mysqli_query($conn,$upt);
    if($run){
        echo 1;
    }else{
        echo 2;
    }
}
if(isset($_POST['myremove'])){
    $sql="DELETE FROM `addcart` WHERE `maccode`='$mac'";
    $run=mysqli_query($conn,$sql);
    if($run){
        echo 1;
    }else{
        echo 2;

    }
}
?>