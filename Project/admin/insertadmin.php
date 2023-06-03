<?php include './include/navbar.php'; ?>
<?php include './include/sidebar.php'; ?>
<?php include './include/conn.php'; ?>


<!-- Main Content -->
<!-- <div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-10 col-md-5 col-lg-5">
                    <div class="card">
                        <form id="cate">
                            <div class="card-header">
                                <h4>Category</h4>
                                <a href="./viewcate.php" class="btn btn-info ml-auto">View Category</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Name"
                                        name="ccate" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="cdes" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                            <input type="submit" name="sub" id="btn" class="btn btn-primary">
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div> -->

<?php include './include/footer.php' ?>

<script>
// $(document).ready(function(){
//     $("#btn").on("click", function(e) {
//         e.preventDefault();
//         var mydata = new FormData(cate);
//         $.ajax({
//             url: "./files/insert-cate.php",
//             method: "POST",
//             data: mydata,
//             success: function(res) {
//                 alert(res);
//                 if (res == 1) {
//                     alert("data has been inserted");
//                 } else {
//                     alert("data has not been inserted");
//                 }
//             }
//         });
//     });
// });
</script>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-10 col-md-5 col-lg-5">
                    <div class="card">
                        <form id="myformdata">
                            <div class="card-header">
                                <h4>Admin</h4>
                                <a href="./viewadmin.php" class="btn btn-info ml-auto">View Admin</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                        required>
                                </div>
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email"
                                    required>
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" placeholder="Enter Password"
                                    required>
                                <label>Confirm Password</label>
                                <input type="text" class="form-control" name="cpassword" placeholder="Confirm Password"
                                    required>
                                    <div class="form-group">
                                    <label>Access</label>
                                    <select name="role" class="form-control raccess">
                                        <option value="">Select</option>
                                       <?php 
                                        $ssql ="SELECT * FROM `role`";
                                        $srun = mysqli_query($conn,$ssql);
                                        while($sfet = mysqli_fetch_array($srun)){
                                            ?>
                                        <option value="<?php echo $sfet['rid'] ?>"><?php echo $sfet['name'] ?></option>
                                            
                                            <?php
                                        }
                                       ?>
                                    </select>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="sub" id="btn" class="btn btn-primary">
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
        var mydata = new FormData(myformdata);
        $.ajax({
            url: "./files/admin-insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                alert(res);

            }
        })
    })
})
</script>