
<?php include './include/conn.php';?>
<?php include './include/navbar.php' ?>
<?php include './include/sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-10 col-md-5 col-lg-5">
                    <div class="card">
                        <form id="formdata">
                            <div class="card-header">
                                <h4>User</h4>
                                <a href="./viewsup.php" class="btn btn-info ml-auto">View User</a>
                            </div>
                            <div class="card-body">
                            <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="contact" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label>sAddress</label>
                                    <input type="text" class="form-control" placeholder="Enter Second Address" name="saddress" required>
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="country" class="form-control" id="scountry" required>
                                        <option value="">Select Your Country</option>
                                        <option value="pakistan">Pakistan</option>
                                        <option value="india">India</option>
                                        <option value="united states">United States</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="city" class="form-control" required>
                                        <option value="">Select Your City</option>
                                        <option value="punjab">Lahore</option>
                                        <option value="sindh">Faisalabad</option>
                                        <option value="delhi">Karachi</option>
                                        <option value="mumbai">Mumbai</option>
                                        <option value="los_angelas">Los Angeles</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Postal Code" name="postal" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" placeholder="Enter Password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Second Password</label>
                                    <input type="text" class="form-control" placeholder="Enter Second Password" name="confirm" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="submit" id="btn" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
<?php include './include/footer.php' ?> 
<script>
$(document).ready(function() {
    $("#btn").on('click', function(e) {
        e.preventDefault();
        var mydata = new FormData(formdata);
        $.ajax({
            url: "./files/user-insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success:function(res){
                const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Data has been Inserted',
})
            }
        })
            })
})
                </script>