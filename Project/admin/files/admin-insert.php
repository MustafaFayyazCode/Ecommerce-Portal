 <?php
 include '../include/Connection.php';
$in=new connection();
 $name=mysqli_real_escape_string($in->mysqli,$_POST['name']);
 $email=mysqli_real_escape_string($in->mysqli,$_POST['email']);
 $password=mysqli_real_escape_string($in->mysqli,$_POST['password']);
 $cpassword=mysqli_real_escape_string($in->mysqli,$_POST['cpassword']);
 $role=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['role']));

// $sql="INSERT INTO `admin`(`name`,`email`,`password`,`cpassword`,`role`)VALUES('$name','$email','$password','$cpassword','$role')"; 
// $run=mysqli_query($conn,$sql);
$d=$in->insert("admin",array(
    "name"=>$name,
    "email"=>$email,
    "password"=>$password,
    "cpassword"=>$cpassword,
    "role"=>$role

));
if($d=="inserted"){
    echo 1;
}else{
    echo 2;
}

 ?>