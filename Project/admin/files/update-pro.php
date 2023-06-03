<?php  
include '../include/conn.php';

    $puid=mysqli_real_escape_string($conn,$_POST['pid']);
    $catedrop=mysqli_real_escape_string($conn,$_POST['catedrop']);
    $scatedrop=mysqli_real_escape_string($conn,$_POST['scatedrop']);
    $suppdrop=mysqli_real_escape_string($conn,$_POST['suppdrop']);
    $procode=mysqli_real_escape_string($conn,$_POST['procode']);
    $proname=mysqli_real_escape_string($conn,$_POST['proname']);
    $prodes=mysqli_real_escape_string($conn,$_POST['prodes']);
    $uprice=mysqli_real_escape_string($conn,$_POST['uprice']);
    $srppr=mysqli_real_escape_string($conn,$_POST['srppr']);
    $qtype=mysqli_real_escape_string($conn,$_POST['qtype']);
    $prostck=mysqli_real_escape_string($conn,$_POST['prostck']);
    $prorad=mysqli_real_escape_string($conn,$_POST['prorad']);
    $pimg=$_FILES['pimg']['name'];
$p=array();
foreach($pimg as $val){
    $exe=strtolower(pathinfo($val,PATHINFO_EXTENSION));
    $arr=array("jpg","jpeg","png");
    if(in_array($exe,$arr)){
        $p[]=$val;
        $msg="right";
    }
    else{
        $msg="not right";
    }
}
if($msg =="right"){
    foreach($pimg as $key=>$val ){
move_uploaded_file($_FILES['pimg']['tmp_name'][$key],"../imgs/".$val);
    }
}
$pic=implode(",",$p);   
if($msg=="right"){
$sql="UPDATE `product` SET `catedrop`='$catedrop',`scatedrop`='$scatedrop',`suppdrop`='$suppdrop',`procode`='$procode',`proname`='$proname',`prodes`='$prodes',`uprice`='$uprice',`srppr`='$srppr',`qtype`='$qtype',`prostck`='$prostck',`prorad`='$prorad',`pimg`='$pic' WHERE `pid`='$puid'";
$run=mysqli_query($conn,$sql);
if($run){
    echo 1;
 }else{
     echo 2;
 }
}else{
 echo 3;
}
?>



