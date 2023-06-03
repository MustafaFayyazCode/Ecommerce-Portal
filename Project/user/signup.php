<?php
include './include/conn.php';
include './include/header.php';
?>
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
                                <input type="text" name="name"  class="form-control" placeholder="Enter First Name ">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="fname" id="fname"  class="form-control" placeholder="Enter Last Name ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="contact" class="form-control"
                                    placeholder="Enter Contact Number">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text"id="address" name="address" class="form-control"
                                    placeholder="Enter Permanent Address ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="saddress" class="form-control"
                                    placeholder="Enter Temparory Address">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" id="country" name="country" class="form-control"
                                    placeholder="Enter Country Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="Enter City Name">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" name="postal" id="postal" class="form-control" placeholder="Enter Postal Code ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-12 padd-15">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter Email Password ">
                            </div>
                        </div>
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="password" id="confirm" name="confirm" class="form-control"
                                    placeholder="Confirm Email Password ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-12 padd-15">
                            <button id="btn" type="submit" name="sub" class="btn btn-primary mb-5">Sign Up</button>
                            <!-- <a id="btn1" href="log-in.php" type="submit" name="sub" class="btn btn-danger mb-5">Log
                                In</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--========== Contact Us Section End ==========-->
<?php
include './include/footer.php';
?>
<script>
$(document).ready(function() {
    $("#btn").on("click", function(e) {
        e.preventDefault();
        var mydata = new FormData(myform);
        $.ajax({
            url: "./Ajex/sign-up.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                    alert("data has been inserted");
            }
        });
    });
});
</script>