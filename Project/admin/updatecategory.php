<?php include './include/conn.php';
$cuid=$_GET['cuid'];
$csql="SELECT * FROM `category` WHERE `sid`= $cuid";
$crun=mysqli_query($conn,$csql);
$cfet=mysqli_fetch_array($crun);

?>
<?php include './include/navbar.php' ?>
<?php include './include/sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-10 col-md-5 col-lg-5">
                    <div class="card">
                        <form id="catup">
                            <div class="card-header">
                                <h4>Category</h4>
                                <a href="./viewcate.php" class="btn btn-info ml-auto">View Category</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" value=" <?php  echo $cfet['sid']; ?>" class="form-control" name="sid">
                                    <label>Category</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="ccate" value="<?php
                                    echo $cfet['ccate']; ?>" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="cdes" required><?php
                                    echo $cfet['cdes']; ?></textarea>
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
        var mydata = new FormData(catup);
        $.ajax({
            url: "./files/update-cate.php",
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
  title: 'Data has been inserted',
})
        }
        })
    })
});
</script>