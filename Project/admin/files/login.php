<?php
    
    include '../include/conn.php';
    session_start();
    if(isset($_POST['email'])){
        // $_SESSION['email']=$_POST['email'];
        // $pemail=$_SESSION['email'];
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        if(($email=="")||($password=="")){
            echo 8;
            // echo "Please fill email and password";
        }else{
            $esql="SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'";
            $erun=mysqli_query($conn,$esql);
            if(mysqli_num_rows($erun)){
                $gsql="SELECT * FROM `admin` WHERE `email`='$email'";
                $grun=mysqli_query($conn,$gsql);
                $gfet=mysqli_fetch_assoc($grun);
               
                if(isset($gfet['role'])){
                    $_SESSION['email']=$_POST['email'];
                    $_SESSION['role']=$gfet['role'];
                    echo 9;
                // echo "Email and Password Insereted";

                }else{
                   echo 11;
                   //role not found for this admin/ user. 
                }
                
            }
            else{
                echo 10;
                // echo "Email and Password Not Insereted";
            }
        }
    }
?>