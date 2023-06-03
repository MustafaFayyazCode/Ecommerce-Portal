<?php
    include ('./include/navbar.php');
    include ('./include/sidebar.php');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="view_role.php"><button type="btn" class="btn mb-5"
                            style="margin-left:77%;background-color:#464c45;color:white;">
                            View Role</button></a>
                    <div class="card ">
                        <form id="myrole">
                            <div class="card-header">
                                <h4>Role Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Success</label>
                                    <select name="role" class="form-control raccess">
                                        <option>Select</option>
                                        <option value="all">All</option>
                                        <option value="custom" id="custom">Custom</option>
                                    </select>
                                    <div id="hide">
                                        <div class="modules">
                                            <input type="checkbox" class="cbox" value="admin" name="admin">Admin <br>
                                            <input type="checkbox" class="cbox" value="category" name="cate">Category
                                            <br>
                                            <input type="checkbox" class="cbox" value="subcategory" name="subcate">Sub
                                            Category <br>
                                            <input type="checkbox" class="cbox" value="supplier" name="sup">Supplier
                                            <br>
                                            <input type="checkbox" class="cbox" value="quantity" name="qty">Quantity
                                            <br>
                                            <input type="checkbox" class="cbox" value="product" name="product">Product
                                            <br>
                                            <input type="checkbox" class="cbox" value="myorder" name="myorder">Order
                                            <br>
                                            <input type="checkbox" class="cbox" value="user" name="user">Register User
                                            <br>
                                            <input type="checkbox" class="cbox" value="pos" name="pos">POS <br>
                                            <input type="checkbox" class="cbox" value="contact" name="contact">Contact
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn" id="btn1" style="background-color:#464c45;color:white;" type="submit"
                                    name="sub" value="Submit" />
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
        $("input:checked").prop("checked", false);

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
            url: "./files/role-insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                 alert(res);
                // if (res == 1) {
                //     const Toast = Swal.mixin({
                //         toast: true,
                //         position: 'top-end',
                //         showConfirmButton: false,
                //         timer: 3000,
                //         timerProgressBar: true,
                //         didOpen: (toast) => {
                //             toast.addEventListener('mouseenter', Swal.stopTimer)
                //             toast.addEventListener('mouseleave', Swal
                //                 .resumeTimer)
                //         }
                //     })

                //     Toast.fire({
                //         icon: 'success',
                //         title: 'Role Has Been Inserted successfully'
                //     })
                //      alert("CATEGORY HAS BEEN INSERTED");
                //     $('#myrole').trigger('reset');
                // } else {
                //      alert("Category HAS BEEN NOT INSERTED");
                //     const Toast = Swal.mixin({
                //         toast: true,
                //         position: 'top-end',
                //         showConfirmButton: false,
                //         timer: 3000,
                //         timerProgressBar: true,
                //         didOpen: (toast) => {
                //             toast.addEventListener('mouseenter', Swal.stopTimer)
                //             toast.addEventListener('mouseleave', Swal
                //                 .resumeTimer)
                //         }
                //     })

                //     Toast.fire({
                //         icon: 'error',
                //         title: 'Role Has Not Been Inserted successfully'
                //     })
                // }
            }
        });
    });
});
</script>