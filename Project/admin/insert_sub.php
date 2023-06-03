<?php include './include/navbar.php'?>
<?php include './include/sidebar.php'?>
<?php include './include/conn.php'; ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card ">
                        <form id="formdata">
                        <div class="card-header">
                                <h4>Sub Category</h4>
                                <a href="./viewsub.php" class="btn btn-info ml-auto">View Sub Category</a>
                            </div>
  
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Main Category</label>
                                    <select name="mscat" class="form-control">
                                        <option value="">Select Main Category</option>
                                        <?php
                                        $subsql="SELECT * FROM `category`";
                                        $subrun=mysqli_query($conn,$subsql);
                                        while($sfet=mysqli_fetch_array($subrun)){
                                            ?>
                                        <option value="<?php echo $sfet['sid']; ?>"><?php echo $sfet['ccate']; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="subcate" class="form-control" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="subdes" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" id="btn" type="submit" name="sub" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php include './include/footer.php' ?>
<script>
    $(document).ready(function() {
    $("#btn").on('click', function(e) {
        e.preventDefault();
        var mydata = new FormData(formdata);
        $.ajax({
            url: "./files/insert-sub.php",
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