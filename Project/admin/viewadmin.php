<?php include './include/Connection.php' ?>
<?php
   $in=new connection();
       
   $res=$in->select("admin","*",null,"`aid`");
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
                            <h4>Admin View</h4>
                            <a href="./insertadmin.php" class="btn btn-info ml-auto">Add Admin</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Confirm Password</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                // $sql = "SELECT * FROM `admin`";
                                                // $run=mysqli_query($conn,$sql);
                                                // while($fet=mysqli_fetch_array($run)){
                                                    foreach($res as $data){

                                                    
                                                    ?>
                                        <tr>
                                            <td><?php echo $data['aid'] ?></td>
                                            <td><?php echo $data['name'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['password'] ?></td>
                                            <td><?php echo $data['cpassword'] ?></td>
                                            <td><a class="btn btn-primary" href="./updateadmin.php?uid=<?php echo $fet['aid'] ?>">Update</a></td>
                                           <td><button class="btn btn-danger delete" data-del="<?php echo $fet['aid'] ?>">Delete</button></td>
                                            <?php
                                                }
                                            ?>
                                        </tr>
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
                var cdel=$(this).data("del");
                var msg=this;
                $.ajax({
                    url:"./files/delete-cate.php",
                    method:"GET",
                    data:{mydel:cdel},
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