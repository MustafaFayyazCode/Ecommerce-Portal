<?php include './include/Connection.php' ?>
<?php
$in=new connection();

$res=$in->select("product","*","`pid`");
?>
<?php include "./include/navbar.php" ?>
<?php include "./include/sidebar.php" ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product View</h4>
                            <a href="./insertpro.php" class="btn btn-info ml-auto">Add Product</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Supplier</th>
                                            <th>Product code</th>
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Unit Price</th>
                                            <th>Serial Price</th>
                                            <th>Quantity Type</th>
                                            <th>Product Stoke</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php 
                                                // $sql = "SELECT * FROM `product`";
                                                // $run=mysqli_query($conn,$sql);
                                                // while($fet=mysqli_fetch_array($run)){
                                                    foreach($res as $fet){
                                                    ?>
                                                    <tr>

                                            <td><?php echo $fet['catedrop'] ?></td>
                                            <td><?php echo $fet['scatedrop'] ?></td>
                                            <td><?php echo $fet['suppdrop'] ?></td>
                                            <td><?php echo $fet['procode'] ?></td>
                                            <td><?php echo $fet['proname'] ?></td>
                                            <td><?php echo $fet['prodes'] ?></td>
                                            <td><?php echo $fet['uprice'] ?></td>
                                            <td><?php echo $fet['srppr'] ?></td>
                                            <td><?php echo $fet['qtype'] ?></td>
                                            <td><?php echo $fet['prostck'] ?></td>
                                            <td><?php echo $fet['prorad'] ?></td>
                                            <td>
                                            <?php
                                            $p=explode(",",$fet['pimg']);
                                            foreach($p as $pic){
                                                ?>
                                  <img src="<?php echo"./imgs/" .$pic?>" height="70" width="40">
                                            </td>
                                  
                                  <?php
                                  
                                            }
                                            ?>
                                            </td>
                                            <td><a class="btn btn-primary" href="./updatepro.php?puid=<?php echo $fet['pid'] ?>">Update</a></td>
                                            <td><button class="btn btn-danger delete" data-del="<?php echo $fet['pid'] ?>">Delete</button></td>
                                            </tr>

                                            <?php
                                                }  
                                            ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            $(document).on("click",".delete",function(){
                var pdel=$(this).data("del");
                var msg=this;
                $.ajax({
                    url:"./files/delete-pro.php",
                    method:"GET",
                    data:{mydel:pdel},
                    success:function(res){     
                        if (res == 1) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to empty cart",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Data Has Been Deleted'
                            })
                            $(msg).closest("tr").fadeOut();
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Data Has Been Deleted'
                            })
                        }
                    })
                }
            }
        })
    })
})
    
</script>