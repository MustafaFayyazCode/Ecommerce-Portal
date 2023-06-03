<?php
    include('./include/conn.php');
    include('./include/navbar.php');
    include('./include/sidebar.php');

?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
                  <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <?php 
                                   
                                    $usql="SELECT * FROM `signup`";
                                    $urun=mysqli_query($conn,$usql);
                                    $fet=mysqli_fetch_assoc($urun);
                                ?>
                                <h2>Admin Profile</h2>
                               
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Name:</strong><br>
                                       <p><?php echo $fet['name']." ".$fet['fname'] ;?></p> 
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <strong>Address:</strong><br>
                                       
                                        <?php echo $fet['address'] ?><br>
                                        <?php if($fet['saddress']!=""){
                                            echo "OR <br>".$fet['saddress'];
                                        } ?>
                                    </address>
                                </div>
                                
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <address>
                                        <strong>Country:</strong><br>
                                        <?php echo $fet ['country']?><br>
                                       
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <strong>City:</strong><br>
                                        <?php echo $fet ['city']?><br>
                                        
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <strong>Contact:</strong><br>
                                        <?php echo $fet ['contact']?><br>
                                        
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <strong>Email:</strong><br>
                                        <?php echo $fet ['email']?><br>
                                        
                                    </address>
                                </div>
                                
                                
                            </div>
                            <div class="row">
                              
                            </div>
                        </div>
                    </div>
    </div>
  </section>
</div>
<?php
    include('./include/footer.php');
?>