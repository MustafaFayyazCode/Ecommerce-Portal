<?php
    include('../include/conn.php');

    
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

        if($name=="" || $fname=="" || $contact=="" || $address=="" || $saddress=="" || $country=="" || $city=="" || $postal=="" || $email=="" || $password=="" || $confirm==""){
            echo 0;
        }else{
            $ssql="SELECT * FROM `signup` WHERE  `email`='$email'";
            $srun=mysqli_query($conn,$ssql);
            if(mysqli_num_rows($srun)>0){
                // echo "Email alredy exist";
                echo 1;
            }else{
                if($password == $confirm){
                    $sql="INSERT INTO `signup`( `name`, `fname`, `contact`, `address`, `saddress`, `country`,`city`, `postal`,`email`, `password`, `confirm`, `sdate`) VALUES ('$name','$fname','$contact','$address','$saddress','$country','$city','$postal','$email','$password','$confirm','$sdate')";
                    $run2=mysqli_query($conn,$sql);
                }
            }
        
        
        }