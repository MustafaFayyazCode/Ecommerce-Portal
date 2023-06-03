<?php
    include ('../admin/include/conn.php');
    include('./include/header.php');
?>

<!--========== Contact Us Section Start ==========-->

<section class="contact section" id="contact">
    <div class="container">
        <form id="myform">
            <div class="row text-center mb-5 mt-5">
                <h2>Sign Up</h2>
            </div>
            <div class="row">
                <div class="contact-form padd-15">
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="sname" class="form-control" placeholder="Enter First Name ">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="sfname" class="form-control" placeholder="Enter Last Name ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="scontact" class="form-control"
                                    placeholder="Enter Contact Number">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="saddress" class="form-control"
                                    placeholder="Enter Permanent Address ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="saddress2" class="form-control"
                                    placeholder="Enter Temparory Address">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="scountry" class="form-control"
                                    placeholder="Enter Country Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="scity" class="form-control" placeholder="Enter City Name">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="postal" class="form-control" placeholder="Enter Postal Code ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-12 padd-15">
                            <div class="form-group">
                                <input type="email" name="semail" class="form-control" placeholder="Enter Your Email ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="password" name="spassword" class="form-control"
                                    placeholder="Enter Email Password ">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="password" name="sconfirm" class="form-control"
                                    placeholder="Confirm Email Password ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-12 padd-15">
                            <button id="btn" type="submit" name="sub" class="main-btn mb-5">Sign Up</button>
                            <a id="btn1" href="shopping-cart.php" type="submit" name="sub" class="main-btn mb-5">Log
                                In</a>
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
    $("#btn").on("click", function(e) {
        // alert("run");
        e.preventDefault();
        var mydata = new FormData(myform);
        // alert(mydata);
        $.ajax({
            // alert(res);
            url: "./ajax/sign.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                // alert("res");
                if (res == 0) {
                    alert("email all ready exictyed");

                } else if (res == 2) {
                    alert("form inserted");
                    window.location.href = "login.php";
                } else if (res == 3) {
                    alert("form not inserted");

                } else {
                    alert("check password");
                }
            }
        });
    });
});
</script>