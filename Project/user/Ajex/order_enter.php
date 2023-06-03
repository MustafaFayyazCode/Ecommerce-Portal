<?php
include '../include/conn.php';

?>

<?php
        if(isset($_POST['name'])){

            $name=mysqli_real_escape_string($conn,$_POST['name']);
            $fname=mysqli_real_escape_string($conn,$_POST['fname']);
            $contact=mysqli_real_escape_string($conn,$_POST['contact']);
            $address=mysqli_real_escape_string($conn,$_POST['address']);
            $saddress=mysqli_real_escape_string($conn,$_POST['saddress']);
            $country=mysqli_real_escape_string($conn,$_POST['country']);
            $city=mysqli_real_escape_string($conn,$_POST['city']);
            $postal=mysqli_real_escape_string($conn,$_POST['postal']);
            $email=mysqli_real_escape_string($conn,$_POST['email']);
            $payment_method="Pending";
            $date=date("y-m-d");
            $uorder=rand(10000,90000);
            if($name=="" || $fname=="" || $contact=="" || $address=="" || $saddress=="" || $country=="" || $city=="" || 
            $postal=="" || $email=="" ||  $payment_method==""){
            echo 0;
        }
        $sql="INSERT INTO `user`(`name`, `fname`, `contact`, `address`, `saddress`, `country`, `city`,
        `postal`,`email`,`payment_method`,`date`,`uorder`) VALUES ('$name','$fname',
        '$contact','$address','$saddress','$country','$city','$postal','$email',
        '$payment_method','$date','$uorder')";
        $run=mysqli_query($conn,$sql);
        if($run){
            $msg="right";   
        }else{
            $msg="notright";
        }
        if($msg=="right"){
            $osql="SELECT * FROM `addcart` WHERE `pemail`= '$email'";
            $orun=mysqli_query($conn,$osql);
            while($ofet=mysqli_fetch_array($orun)){
                $proname=$ofet['proname'];
                $procode=$ofet['procode'];
                $uprice=$ofet['uprice'];
                $srppr=$ofet['srppr'];
                $pdes=$ofet['prodes'];
                $quant=$ofet['quant'];
                $pimg=$ofet['pimg'];
                $order_status="Pending";
                $prosql="INSERT INTO `myorder`(`proname`, `procode`, `uprice`, `srppr`, `quant`, `pimg`,`prodes`, `order_number`, `order_email`, `order_date`, `order_status`)VALUES('$proname','$procode','$uprice','$srppr','$quant','$pimg','$pdes','$uorder','$email','$date','$order_status')";
                $prorun=mysqli_query($conn,$prosql);
                if($prorun){
                    $msg1="right";
                }else{
                    $msg1="not right";
                }
            }
        }
    }

    if(@$msg1=="right"){
        $dsql="DELETE FROM `addcart` WHERE `pemail`='$email'";
        $drun=mysqli_query($conn,$dsql);
        if($drun){
            echo 1;
            // Data Has been Inserted
        }else{
            echo 2;
            // Data Has Not been Inserted
        }
    }
    ?>