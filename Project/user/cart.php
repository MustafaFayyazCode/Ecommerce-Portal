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
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
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
                    <table align="center" border="1" cellspacing="0" cellpadding="2" width="500" style="background-color:lightblue; border:grey; text-align:center; font-size:20px; color:blue; margin-top:20px;" >
                            <thead>
                                
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Unit Price</th>
                                    <th>Product Image</th>
                                    <th>Product Code</th>
                                    <th>Product Stock</th>
                                    <th>Total Price</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                             $sql="SELECT * FROM `addcart`";
                             $run=mysqli_query($conn,$sql);
                             while($fet=mysqli_fetch_array($run)){
                             ?>
                             <tr>
                                <td><?php echo $fet['proname']?></td>
                                <td><?php echo $fet['pid']?></td>
                                <td><?php echo $fet['proname']?></td>
                                <td><?php echo $fet['prodes']?></td>
                                <td><?php echo $fet['uprice']?></td>
                                <td><?php echo $fet['pimg']?></td> 
                                <td><?php echo $fet['procode']?></td>
                                <td><?php echo $fet['prostck']?></td>
                                <td><?php echo $fet['srppr']?></td>

                                <td>
                                <?php
                                $p=explode(",",$fet['pimg']);
                                foreach($p as $pic){
                                ?>
                                <img src="<?php echo "../admin/imgs/" .$pic?>" hieght="70" width="40" alt="">
                                </td>
                                <td><button class="btn btn-danger delete" data-del="<?php echo $fet['cartid'] ?>">Delete</button></td>
                                <?php
                                }
                                ?>
                             </tr>

                               <?php
                             }
                               ?>
                               
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ 169.50</span></li>
                            <li>Total <span>$ 169.50</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
    <!-- Shopping Cart Section End -->
    
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
                        if(res==1){
                            $(msg).closest("tr").fadeOut();
                             alert("DATA HAS BEEN DELETED");
                           
                        }else{
                            alert("DATA HAS NOT BEEN DELETED");
                        }
                    }
                })
            })
        })
    
</script>