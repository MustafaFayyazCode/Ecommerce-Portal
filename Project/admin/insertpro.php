
<?php include './include/conn.php'; ?>
<?php include './include/navbar.php' ?>
<?php include './include/sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-10 col-md-5 col-lg-5">
                    <div class="card">
                        <form id="prodata">
                            <div class="card-header">
                                <h4>Product</h4>
                                <a href="./viewpro.php" class="btn btn-info ml-auto">View Product</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group"> `  
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
                                    <input type="text" class="form-control" placeholder="Enter Product code" name="procode" required>
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Product name"
                                        name="proname" required>
                                    <label>Description</label>
                                    <textarea class="form-control" name="prodes" required></textarea>

                                    <label>Unit Price</label>
                                    <input type="text" class="form-control" placeholder="Enter Unit Price" name="uprice"
                                        required>
                                    <label>Srp Price</label>
                                    <input type="text" class="form-control" placeholder="Enter Srp" name="srppr"
                                        required>
                                    <label>Quantity Type</label>
                                    <input type="text" class="form-control" placeholder="Enter Quantity type"
                                        name="qtype" required>
                                    <label>Stock</label>
                                    <input type="text" class="form-control" placeholder="Enter Stock" name="prostck"
                                        required>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="prorad"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            online
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="prorad"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            ofline
                                        </label>
                                    </div>

                                    <label>Product image</label>
                                    <input type="file" class="form-control" name="pimg" required>
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
    $(document).ready(function(){
        $("#btn").on('click',function(e){
            e.preventDefault();
            var mydata = new FormData(prodata);
            // alert(mydata);
            $.ajax({
                url:"./files/insert-pro.php",
                method:"POST",
                data: mydata,
                contentType:false,
                processData:false,
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