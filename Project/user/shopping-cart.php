<?php
include './include/conn.php';
include './include/header.php';
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table align="center" cellspacing="5" cellpadding="5" style="width:1100px;">
                            <thead>
                            <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                             $sql="SELECT * FROM `addcart`";
                             $run=mysqli_query($conn,$sql);
                             $gtotal=0;
                             while($fet=mysqli_fetch_array($run)){
                             ?>
                             <tr>
                             <td>
                                <?php
                                $p=explode(",",$fet['pimg']);
                                foreach($p as $pic){
                                ?>
                                <img src="<?php echo "../admin/imgs/" .$pic?>" hieght="70" width="40" alt="">
                                <?php
                                }
                                ?>
                                </td>
                             <td><?php echo $fet['proname']?></td>
                             <td><?php echo $fet['uprice']?></td>

                                   <td>
                                    <input type="hidden" class="cartid" value="<?php echo $fet['cartid']?>">
                                    <input type="hidden" class="uprice" name="uprice" value="<?php echo $fet['uprice']?>">
                                    <input class="input_number text-center" size="2%" type="text" value="<?php echo $fet['quant']?>">
                                  </td>  
                                
                             <td><?php echo $fet['srppr']?></td>

                           
                                <td><button class="btn btn-danger delete" data-del="<?php echo $fet['cartid'] ?>">Delete</button></td>
                               
                             </tr>
                                <?php
                                $gtotal=$gtotal+$fet['srppr'];   
                             }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
             
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a id="remove" data-del="remove"><i class="fa fa-spinner"></i>Remove All</a>
                            </div>
                        </div>
                    </div>
                </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>Rs.<?php echo  $gtotal?>PKR</span></li>
                            <li>Total <span>Rs.<?php echo $gtotal ?>PKR</span></li>
                        </ul>
                        <a href="./checkout.php" class="primary-btn">Proceed to checkout</a>
                    </div>
    <?php
    include './include/footer.php';
    ?>
</body>
</html>

<script>
        $(document).ready(function() {
            $(document).on("click",".delete",function(){
                var pdel=$(this).data("del");
                // alert(pdel);
                var msg=this;
                $.ajax({
                    url:"./Ajex/delete-cart.php",
                    method:"GET",
                    data:{mydel:pdel},
                    success:function(res){     
                        // alert(res);
                        if (res == 1) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Data Has Been Deleted'
                            })
                            $(msg).closest("tr").fadeOut();
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Data Has Been Deleted'
                            })
                        }
                    })
                }
            }
        })
    })
})


    
</script>

<script>
        $(document).ready(function() {
            $(document).on("click","#remove",function(){
                var pdel=$(this).data("del");
                // alert(pdel);
                var msg=this;
                $.ajax({
                    url:"./Ajex/Add-cart.php",
                    method:"POST",
                    data:{myremove:pdel},
                    success:function(res){     
                        if (res == 1) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to empty cart",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Data Has Been Deleted'
                            })
                            $(msg).closest("tr").fadeOut();
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Data Has Been Deleted'
                            })
                        }
                    })
                }
            }
        })
    })
})

    
    
</script>

<script>
    $(document).on("change",".input_number",function(){
        var data=$(this).closest("tr");
        var pid=data.find(".cartid").val();
        var uprice=data.find(".uprice").val();
        var quant=data.find(".input_number").val();
        // alert(uprice);
        $.ajax({
            url:"./Ajex/Add-cart.php",
            method:"POST",
            data:{upid:pid,quant:quant,uprice:uprice},
            success:function(res){
                alert(res);
                // if(res==1){
                //     location.reload(true);
                // }
            }
        })
        
    })
</script>