<?php  

include '../include/Connection.php';

$in=new connection();

$name=mysqli_real_escape_string($in->mysqli,$_POST['name']);
$email=mysqli_real_escape_string($in->mysqli,$_POST['email']);
$contact=mysqli_real_escape_string($in->mysqli,$_POST['contact']);
$description=mysqli_real_escape_string($in->mysqli,$_POST['description']);
$cdate=mysqli_real_escape_string($in->mysqli,date("Y-m-d"));

// $sql="INSERT INTO `contact`(`name`,`email`,`contact`,`description`,`cdate`)VALUES('$name','$email','$contact','$description','$cdate')";
    // $run=mysqli_query($conn,$sql);

    $d=$in->insert("contact",array(
        "name"=>$name,
        "email"=>$email,
        "contact"=>$contact,
        "description"=>$description,
        "cdate"=>$cdate
    ));

    if($d=="inserted"){
        echo 1;
    }else{
        echo 2;
    }
 
?>