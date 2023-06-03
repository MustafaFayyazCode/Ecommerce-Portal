<?php
    include('./include/conn.php');
    include('./include/header.php');

?>
<style>
    .upload{
  width: 125px;
  position: relative;
  padding-top:30%;
  margin: auto;
}

.upload img{
  border-radius: 20%;
  width:100%;
  height:50%;
  border: 8px solid #DCDCDC;
}

.upload .round{
  position: absolute;
  bottom: 0;
  right: 0;
  background: #00B4FF;
  width: 32px;
  height: 32px;
  line-height: 33px;
  text-align: center;
  border-radius: 50%;
  overflow: hidden;
}

.upload .round input[type = "file"]{
  position: absolute;
  transform: scale(2);
  opacity: 0;
}

input[type=file]::-webkit-file-upload-button{
    cursor: pointer;
}
.my2{
    padding-top:70px;
    margin-bottom:10px;
}
.btn1{
    margin-bottom:10px;
    width:200px;
    height:40px;
    text-transform:uppercase;

}
.btn2{
    margin-bottom:10px;
    width:200px;
    height:40px;
    text-transform:uppercase;
}
.btn3{
    width:200px;
    height:40px;
    text-transform:uppercase;
}
.buton{
    padding-top:70px;

}
.text{
    margin-left:1050px;
    margin-top:-250px;
    text-transform:uppercase;
   

}
.text p{
    font-size:20px;
    cursor: pointer;
    

}

</style>

<?php
                                                        $sql="SELECT * FROM `myorder`";
                                                        $run=mysqli_query($conn,$sql);
                                                        while($fet=mysqli_fetch_assoc($run)){
                                                    ?>
<div class="container">
  <div class="row">
    <div class="col-3">
    <div class="upload">
       
       <img src="./p-imgs/hello" width = 125 height = 125 title="">
       <!-- <img src="./p-imgs/11" alt=""> -->
<?php
echo $fet ['pimg'];
?>
       <div class="round">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
         <input type="hidden" name="name" value="<?php echo $name; ?>">
         <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
         <i class = "fa fa-camera" style = "color: #fff;"></i>
       </div>
     </div>
    </div>
    <div class="col-6">

    </div>
                        
                        
    <div class="col-3  buton">
    <button type="button" class="btn btn-danger btn1" >Edit</button><br>
    <button type="button" class="btn btn-danger btn2" >Forget Password</button><br>
    <button type="button" class="btn btn-danger btn3" >Signup</button>
    
    </div>
  </div>
  <div class="row my2">
    <div class="col-7">
    <table  border="1" cellspacing="0" cellpadding="10" width="1000px" style="background-color:black; border:white; text-align:center; font-size:20px; color:white; margin-top:0px;" >
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Order Number</th>
        <th>Status</th>
    </tr>
    
    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $fet['oid'];?></td>
                                            <td><?php echo $fet['proname'];?></td>
                                            <td><?php echo $fet['order_email'];?></td>
                                            <td><?php echo $fet['order_number'];?></td>
                                            <td><?php echo $fet['order_status'];?></td>

                                           
                                        </tr>
                                        <?php
                                                        }
                                        ?>
                                    </tbody>
</table>

    </div>
    <div class="col-3 text">
  
                <p>Peding Status</p>
                <p>Complete Status</p>
    </div>
  </div>
  

</div>
  <?php
    include('./include/footer.php');
  
  ?>