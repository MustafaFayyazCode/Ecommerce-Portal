
<?php
include './include/conn.php';
include './include/header.php';

@$email = $_SESSION['email'];
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form id="order">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                    <?php
                                            $sql="SELECT * FROM `signup` WHERE `email`='$email'";
                                            $run=mysqli_query($conn,$sql);
                                            $fet=mysqli_fetch_assoc($run);
                                        ?>
                                        <p>Fist Name<span>*</span></p>
                                    <input type="text" name="name" value="<?php echo $fet['name'];?>">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="fname" value="<?php echo $fet['fname'];?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                            <input type="text" name="country" value="<?php echo $fet['country'];?>">
                                
                            </div>
                            <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text"  name="address" value="<?php echo $fet['address'];?>" placeholder="Street Address"
                                class="checkout__input__add">
                            <input type="text" name="saddress" value="<?php echo $fet['saddress'];?>"
                                placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                            <input type="text" name="city" value="<?php echo $fet['city'];?>">
                                
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                            <input type="text" name="country" value="<?php echo $fet['country'];?>">
                                
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postal" value="<?php echo $fet['postal'];?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="contact" value="<?php echo $fet['contact'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="<?php echo $fet['email'];?>">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            </div>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Note about your order, e.g, special noe for delivery
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div> -->
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                <?php
                                    $sql="SELECT * FROM `addcart`";
                                    $run=mysqli_query($conn,$sql);
                                    $gtotal=0;
                                    while($fet=mysqli_fetch_assoc($run)){
                                        ?>

                                <li><?php echo $fet['proname']."".$fet['quant']."";?><span><?php echo $fet['uprice'];?></span>
                                </li>
                                <?php
                                 $gtotal=$gtotal+$fet['srppr'];
                                    ?>
                                <?php
                                    }
                                    ?>
                                </ul>
                                <ul class="checkout__total__all">
                                <li>Total <span><?php echo $gtotal?> </span></li>
                               
                                </ul>
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p> -->
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <button type="submit" id="uorder" class="site-btn">PLACE ORDER</button>
                            <a href="shop.php" type="submit" class="site-btn" style="text-decoration: none;"><i class="fa-solid fa-cart-shopping ml-4 mr-2"></i>Continue Shopping</a>

                            <a href="shopping-cart.php" type="submit" class="site-btn" style="text-decoration: none;text-align:center;">Back To Card</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <?php
    include './include/footer.php';
    ?>
    <script>
  $(document).ready(function() {
      $("#uorder").on("click", function(e) {
        // alert("run");
        e.preventDefault();
        var myorder = new FormData(order);
        // alert (myorder);
        $.ajax({
            url: "./Ajex/order_enter.php",
            method: "POST",
            data: myorder,
            contentType: false,
            processData: false,
            success: function(res) {
                alert(res);
                // if(res==0){
                //     alert ("fill out all filed");
                // }
                //   else if (res == 1) {
                //     alert("Form HAS BEEN INSERTED");
                //     location.reload(true);
                //     } else{
                //         alert("Form HAS BEEN Not INSERTED");
                //     } 
                }
            });
        });
    });
</script>