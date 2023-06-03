<?php  
include './include/conn.php';
$sp=$_GET['sp'];
$sql="SELECT * FROM `supplier` WHERE `sup`='$sp'";
$srun=mysqli_query($conn,$sql);
$sfet=mysqli_fetch_array($srun);
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
                        <form id="supup">
                            <div class="card-header">
                                <h4>Supplier</h4>
                                <a href="./viewsup.php" class="btn btn-info ml-auto">View Supplier</a>
                            </div>
                            <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="sup" value="<?php echo $sfet['sup'] ?>" >
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="supnam" value="<?php
                                    echo $sfet['supnam'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="supmail" value="<?php echo $sfet['supmail'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Contact Number" name="supno" value="<?php
                                    echo $sfet['supno'];?>" required>
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
        var mydata = new FormData(supup);
        $.ajax({
            url: "./files/update-sup.php",
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