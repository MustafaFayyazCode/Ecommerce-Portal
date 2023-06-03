<?php
     include('./include/conn.php');
    include ('./include/navbar.php');
    include ('./include/sidebar.php');
    
?>
<?php
$uid=$_GET['uid'];
$gsql="SELECT * FROM `role` WHERE `rid`='$uid'";
$grun=mysqli_query($conn,$gsql);
$gfet=mysqli_fetch_array($grun);
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="view_role.php"><button type="btn" class="btn mb-5"
                            style=" background-color:#6f42c1; color:white;">
                            View Role</button></a>
                    <div class="card ">
                        <form id="myrole">
                            <div class="card-header">
                                <h4>Registration Role Form</h4>
                            </div>
                            <input type="hidden" name="rid" class="form-control" value="<?php echo $gfet['rid'] ?>"
                                required>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input type="text" name="name" value="<?php echo $gfet['name'] ?>"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Access</label>
                                    <select name="role" value="<?php echo $gfet['role'] ?>"
                                        class="form-control raccess">
                                        <option>Select Option </option>
                                        <option value="all">All</option>
                                        <option value="custom" id="custom">Custom</option>
                                    </select>
                                    <div id="hide">
                                        <div class="modules">
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['admin']=="admin") ?"checked":"admin"?>"
                                                name="admin">Admin <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['cate']=="Category") ?"checked":"Category"?>"
                                                name="cate">Category <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['subcate']=="subcategory") ?"checked":"Subcategory"?>"
                                                name="subcate">Sub Category <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['sup']=="Supplier") ?"checked":"Supplier"?>"
                                                name="sup">Supplier <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['qty']=="Quantity") ?"checked":"Quantity"?>"
                                                name="qty">Quantity <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['product']=="Product") ?"checked":"Product"?>"
                                                name="product">Product <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['myorder']=="Order") ?"checked":"Order"?>"
                                                name="myorder">Order <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['user']=="User") ?"checked":"User"?>"
                                                name="user">Register User <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['pos']=="POS") ?"checked":"POS"?>"
                                                name="pos">POS <br>
                                            <input type="checkbox"
                                                value="<?php echo ($gfet['contact']=="contact") ?"checked":"contact"?>"
                                                name="contact">Contact
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn" id="btn1" style=" background-color:#6f42c1; color:white;" type="submit" name="sub" value="Update" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
    include ('./include/footer.php');
?>
<script>
$("#hide").hide();
$(".raccess").change(function() {
    if ($(".raccess").val() == 'custom') {
        $("#hide").slideDown();
    } else {
        $("#hide").slideUp();

    }
})
</script>
<script>
$(document).ready(function() {
    $("#btn1").on("click", function(e) {
        // alert("run");
        e.preventDefault();
        var mydata = new FormData(myrole);
        // alert (mydata);
        $.ajax({
            url: "./files/update-role.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                // alert(res);
                if (res == 1) {
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
                        icon: 'success',
                        title: 'Data Has Been Updated successfully'
                    })
                    window.location.href = "./viewrole.php";;
                } else {
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
                        icon: 'success',
                        title: 'Data Has Been Not Updated'
                    })
                }
            }
        });
    });
});
</script>