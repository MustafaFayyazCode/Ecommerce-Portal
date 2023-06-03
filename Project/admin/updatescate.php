<?php include './include/conn.php';
   $cuid=$_GET['cuid'];
   $ssql="SELECT * FROM `subcategory` WHERE `scid`='$cuid'";
   $srun=mysqli_query($conn,$ssql);
   $sfet=mysqli_fetch_array($srun);
?>
<?php include './include/navbar.php'?>
<?php include './include/sidebar.php'?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-10 col-md-5 col-lg-5">
                    <div class="card">
                        <form id="scup">
                            <div class="card-header">
                                <input type="hidden" value="<?php echo $sfet['scid']?>" name="scid">
                                <h4>Sub Category</h4>
                                <a href="./viewsub.php" class="btn btn-info ml-auto">View Category</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="subcate" value="<?php echo $sfet['subcate']?>" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="subdes"value="<?php echo $sfet['subdes']?>" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="submit" id="btn"class="btn btn-primary">
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
        var mydata = new FormData(scup);
        $.ajax({
            url: "./files/update-scate.php",
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
  title: 'Data has been updated',
})
        }
        })
    })
});
</script>