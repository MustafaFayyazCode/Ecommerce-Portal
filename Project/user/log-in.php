<?php
    include './include/conn.php';
    include './include/header.php';
?>
    
<!--========== Contact Us Section Start ==========-->

<section class="contact section" id="contact">
    <div class="container">
        <form id="formlogin">
            <div class="row text-center mb-5 mt-5">
                <h2>Login</h2>
            </div>
            <!-- <div class="row"> -->
                <div class="contact-form padd-15 col-lg-10 col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                    <input type="text" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Password<span>*</span></p>
                                <input type="text" name="password" id="pass" class="form-control">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-item col-12 padd-15">
                            <a href="#" id="login" name="sub" class="btn btn-primary mb-5">Log In</a>
                            <a href="./signup.php" name="sub" class="btn btn-danger mb-5">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--========== Contact Us Section End ==========-->
</body>

</html>

<?php
    include('./include/footer.php');
?>

<script>
    
    $(document).ready(function() {
        $(document).on("click", "#login",function(e){
            e.preventDefault();
            var form=$(this).closest("#formlogin");
            // alert (form);
            var myemail=form.find("#email").val();
            var pass=form.find("#pass").val();
            // alert(myemail);
            $.ajax({
                url:"./Ajex/sign-up.php",
                type:"POST",
                data: {pemail:myemail,pass:pass},
                success:function(res){
                    // alert(res);
                    if(res== 8){
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'Please fill Email and Password'
                    })
                        // alert ("Product Already Exist");
                    }else if(res== 9){
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 6000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Email and Password Inserted Successfully'
                    })
                        window.location.href= "shop.php";
                        load_cart_item_number();

                        // alert ("Product Has Been Inserted");
                    }else{
                        alert ("Email and Password Not Inserted");
                    }
                }
            })
        })
    })

</script>