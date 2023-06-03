<?php  
include '../include/Connection.php';

$in=new connection();

// if(isset($_POST['submit'])){
    $catedrop=mysqli_real_escape_string($in->mysqli,$_POST['catedrop']);
    $scatedrop=mysqli_real_escape_string($in->mysqli,$_POST['scatedrop']);
    $suppdrop=mysqli_real_escape_string($in->mysqli,$_POST['suppdrop']);
    $procode=mysqli_real_escape_string($in->mysqli,$_POST['procode']);
    $proname=mysqli_real_escape_string($in->mysqli,$_POST['proname']);
    $prodes=mysqli_real_escape_string($in->mysqli,$_POST['prodes']);
    $uprice=mysqli_real_escape_string($in->mysqli,$_POST['uprice']);
    $srppr=mysqli_real_escape_string($in->mysqli,$_POST['srppr']);
    $qtype=mysqli_real_escape_string($in->mysqli,$_POST['qtype']);
    $prostck=mysqli_real_escape_string($in->mysqli,$_POST['prostck']);
    $prorad=mysqli_real_escape_string($in->mysqli,$_POST['prorad']);
    $spic=$_FILES['pimg']['name'];
    // echo $spic;
   $exe=pathinfo($spic,PATHINFO_EXTENSION);
//    echo $exe;
   $arr=array("jpg","png","jpeg");
   if(in_array($exe,$arr)){
    $d=$in->insert("product",array(
        "catedrop"=>$catedrop,
        "scatedrop"=>$scatedrop,
        "suppdrop"=>$suppdrop,
        "procode"=>$procode,
        "proname"=>$proname,
        "prodes"=>$prodes,
        "uprice"=>$uprice,
        "srppr"=>$srppr,
        "qtype"=>$qtype,
        "prostck"=>$prostck,
        "prorad"=>$prorad,
        "pimg"=>$spic
    ));
    if($d=="inserted"){
        move_uploaded_file($_FILES['pimg']['tmp_name'],"../imgs/".$spic);
        echo 1;
    }else{
        // $msg= "<h1>Data Has NOT Been inserted</h1>";
        echo 2;
    }
   }
    //  }
    //  else{
    //     echo "hello world";
    // }

?>