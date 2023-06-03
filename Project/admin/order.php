<?php
     include('./include/conn.php');
    include ('./include/navbar.php');
    include ('./include/sidebar.php');
?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <a href="product.php"><button type="btn" class="btn  mb-3" style="margin-left:90%;background-color:#464c45;color:white;">
                            Add Order</button></a>
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Order Number</th>
                                            <th>Status</th>
                                            <th>Check Box</th>
                                            <th>Invoice</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                                    <?php
                                                        $sql="SELECT * FROM `user`";
                                                        $run=mysqli_query($conn,$sql);
                                                        while($fet=mysqli_fetch_assoc($run)){
                                                    ?>
                                                <tr>
                                                    <td><?php echo $fet['name']." ".$fet['fname'] ;?></td>
                                                    <td><?php echo $fet['email'];?></td>
                                                    <td><?php echo $fet['contact'];?></td>
                                                    <td><?php echo $fet['uorder'];?></td>
                                                    <td><?php echo $fet['payment_method'];?></td>

                                                    <?php
                                                        $ordcheck="";
                                                        if($fet['payment_method']=="Completed"){
                                                            $ordcheck="checked";
                                                        }else{
                                                            $ordcheck="unchecked";
                                                        }
                                                    ?>
                                                        <td><input type="checkbox" class="cbox" data-check="<?php echo $fet['uorder'] ?>" name="input" id="check" <?php echo @$ordcheck ?>></td>

                                                        <td><a class="btn btn-primary" href="./invoice.php?inid=<?php echo $fet ['uorder'] ?>">Invoice</a></td>

                                                    <td class="td"><button type="button" class="btn btn-danger delete" data-del="<?php echo $fet['uorder'] ?>">Delete</button></td>
                                                </tr>
                                                    <?php
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php 
    include ('./include/footer.php');
?>

<!--===================== checkbox completed and pending work =====================-->

<script>
    $(document).ready(function(){
        $(document).on("click",".cbox",function(){
            var payment = "";
            if(this.checked){
                payment = "Completed";
            }else{
                payment = "Pending";
            }
            var orduid = $(this).data("check");
            $.ajax({
                url: "./files/order_ajax.php",
                method : "POST",
                data: {
                    payment : payment,
                    orduid : orduid,
                },
                success:function(res){
                    // alert(res);
                    if(res==1){
                        window.location.reload();
                    }
                }
            });
        });
    });
</script>

<!--===================== order delete work =====================-->

<script>
    $(document).ready(function(){
        $(document).on("click", ".delete", function(){
        var del = $(this).data("del");
            var msg = this;
            $.ajax({
                url: './files/order_delete.php',
                method: 'POST',
                data: {
                    mydel: del
                },
                success: function(res){
                    // alert (res);
                    if(res== 1){
                        alert ("Your order has been deleted");
                        $(msg).closest('tr').fadeOut();
                    }else{
                        alert ("Your order has been not deleted");
                    }
                }
            })
        }); 
    });
</script>