<?php  
include './include/conn.php';

$puid=$_GET['puid'];
$psql="SELECT * FROM `product` WHERE `pid`='$puid'";
$prun=mysqli_query($conn,$psql);
$pfet=(mysqli_fetch_array($prun));

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
                        <form id="pup">
                            <div class="card-header">
                                <h4>Product</h4>
                                <input type="hidden" name="pid" value="<?php echo $pfet['pid']?>">
                                <a href="./viewpro.php" class="btn btn-info ml-auto">View Product</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="catedrop" id="" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php
                                $pcsql="SELECT * FROM `category`";
                                $pcrun=mysqli_query($conn,$pcsql);
                                while($pcfet=mysqli_fetch_assoc($pcrun)){
                          ?>
                                        <option value="<?php echo $pcfet['sid']?>"><?php echo $pcfet['ccate']?></option>
                                        <?php 
                                }
                          ?>

                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="scatedrop" id="" class="form-control">
                                        <option value="">Select Subategory</option>
                                        <?php
                                $pssql="SELECT * FROM `subcategory`";
                                $psrun=mysqli_query($conn,$pssql);
                                while($psfet=mysqli_fetch_assoc($psrun)){
                          ?>
                                        <option value="<?php echo $psfet['scid']?>"><?php echo $psfet['subcate']?>
                                        </option>
                                        <?php 
                                }
                          ?>

                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="suppdrop" id="" class="form-control">
                                        <option value="">Select Supplier</option>
                                        <?php
                                $ssql="SELECT * FROM `supplier`";
                                $srun=mysqli_query($conn,$ssql);
                                while($psfet=mysqli_fetch_assoc($srun)){
                          ?>
                                        <option value="<?php echo $psfet['sup']?>"><?php echo $psfet['supnam']?>
                                        </option>
                                        <?php 
                                }
                          ?>

                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Product code</label>
                                    <input type="text" class="form-control" placeholder="Enter Product code"
                                        name="procode" value="<?php echo $pfet['procode']?>" required>
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Product name"
                                        value="<?php echo $pfet['proname']?>" name="proname" required>
                                    <label>Description</label>
                                    <textarea class="form-control" name="prodes" value="<?php echo $pfet['prodes']?>"
                                        required></textarea>

                                    <label>Unit Price</label>
                                    <input type="text" class="form-control" placeholder="Enter Unit Price"
                                        value="<?php echo $pfet['uprice']?>" name="uprice" required>
                                    <label>Srp Price</label>
                                    <input type="text" class="form-control" value="<?php echo $pfet['srppr']?>"
                                        placeholder="Enter Srp" name="srppr" required>
                                    <label>Quantity Type</label>
                                    <input type="text" class="form-control" placeholder="Enter Quantity type" value="<?php echo $pfet['qtype']?>"  name="qtype" required>
                                    <label>Stock</label>
                                    <input type="text" class="form-control" placeholder="Enter Stock" name="prostck" value="<?php echo $pfet['prostck']?>" required>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php echo @$m; ?> name="prorad"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            online
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php echo @$f; ?> name="prorad"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            ofline
                                        </label>
                                    </div>

                                    <label>Product image</label>
                                    <input type="file" class="form-control" name="pimg[]" Multiple required>
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
        var mydata = new FormData(pup);
        $.ajax({
            url: "./files/update-pro.php",
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