<?php
    include  "../include/conn.php";
?>
<?php
    if(isset($_POST['pid'])){
        $ppid=mysqli_real_escape_string($conn,$_POST['pid']);
        $quant=mysqli_real_escape_string($conn,$_POST['quant']);
        $psql = "SELECT * FROM `product` WHERE `pid`='$ppid'";
        $run=mysqli_query($conn,$psql);
        $fet=mysqli_fetch_assoc($run);

        $pos_name=$fet['proname'];
        $pos_code=$fet['procode'];
        $pos_price=$fet['uprice'];
        $pos_stock=$fet['prostck'];
        $tprice=$fet['uprice'];
        $pos_date=date("y-m-d");
        $order = rand(100000,900000);
        
        $sql="SELECT * FROM `pos_cart` WHERE `pos_code`='$pos_code'";
        $prun=mysqli_query($conn,$sql);
        if(mysqli_num_rows($prun)>0){
            echo 0;
            // echo "order number already exist";
        }else{
        $possql="INSERT INTO `pos_cart`(`pos_name`, `pos_code`, `pos_price`, `pos_qty`,`tprice`, `pos_stock`,`pos_order`, `pos_date`) VALUES ('$pos_name','$pos_code','$pos_price','$quant','$tprice','$pos_stock','$order','$pos_date')";
        $posrun=mysqli_query($conn,$possql);
       
        if($posrun){
            echo 1;
            // echo "product has been inserted";
        }else{
            echo 2;
            // echo "product has been not inserted";
        }
    
        }
    }
// ========================= all product total work

if(isset($_POST['cartview'])){
    $csql="SELECT * FROM `pos_cart`";
   $crun=mysqli_query($conn,$csql);
    // echo $crun;
    $output='';
    $ftprices=0;
    if($crun){
        while($fet=mysqli_fetch_assoc($crun)){
            $output.='<tr>
            <td>'.$fet['pos_code'].'</td>
            <td>'.$fet['pos_name'].'</td>
            <td>'.$fet['pos_price'].'</td>
            <td width="15%">
                <input type="hidden" name="pid" class="pid" value='. $fet['pos_id'].'>
                <input type="hidden" name="posprice" class="posprice" value='. $fet['pos_price'].'>
                <input class="input_number" name="input_number" type="number" value='.$fet['pos_qty'].'>
            </td>   
            <td>'.$fet['tprice'].'</td>
            <td>'.$fet['pos_stock'].'</td>
            <td>
                <button type="button" id="delete" class="btn btn-primary" name="del" data-del='.$fet['pos_id'].'>Delete</button>
            </td>
            </tr>';
            $ftprices=$ftprices+$fet['tprice'];
        }   
        if($output!=""){
            $output.='<tr><td colspan="4"><h4 class="pt-3 pr-5">Total</h4></td><td colspan="3"><h4 class="pt-3 pr-4"><span id="a"> '.$ftprices.' </span></h4></td></tr>';
            echo $output;
        }
    }
}

    //====================================== This is quantity work start
    
    if(isset($_POST['upid'])){
        $pid=$_POST['upid'];
        $pqty=$_POST['qty'];
        $posprice=$_POST['posprice'];
        $h=$pqty*$posprice;
        $sql="UPDATE `pos_cart` SET `pos_qty` = '$pqty' , `tprice`= '$h' WHERE `pos_id`  = '$pid'";
        $run = mysqli_query($conn,$sql);
        if($run){
            echo 4;
        }else{
            echo 5;
        }
    }

    //=================================== Quantity work end


        //=================================== This is empty work start

        if(isset($_POST['myemp'])){
            $sql="DELETE FROM  `pos_cart`";
            $run=mysqli_query($conn,$sql);
            if($run){
                echo 4;
            }else{
                echo 5;
            }
        }
    
        //=================================== Empty work End

?>
