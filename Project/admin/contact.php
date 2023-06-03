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
                        <form id="contact">
                            <div class="card-header">
                                <h4>Contact</h4>
                                <a href="./viewcate.php" class="btn btn-info ml-auto">View Category</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="name" required>
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Category Name" name="email" required>
                                    <label>Contact</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="contact" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" required></textarea>
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
</div>
<?php include './include/footer.php' ?>
<script>


$(document).ready(function() {
    $("#btn").on('click', function(e) {
        // alert("i am clicked");
        e.preventDefault();
        var mydata = new FormData(contact);
        $.ajax({
            url: "./files/contact_insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success:function(res){
                alert(res);
//                 const Toast = Swal.mixin({
//   toast: true,
//   position: 'top-end',
//   showConfirmButton: false,
//   timer: 3000,
//   timerProgressBar: true,
//   didOpen: (toast) => {
//     toast.addEventListener('mouseenter', Swal.stopTimer)
//     toast.addEventListener('mouseleave', Swal.resumeTimer)
//   }
// })

// Toast.fire({
//   icon: 'success',
//   title: 'Data has been inserted',
// })
       }
        })
    })
})
</script>

