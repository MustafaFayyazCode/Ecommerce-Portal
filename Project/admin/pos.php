<?php
    include('./include/conn.php');
    include ('./include/navbar.php');
    include ('./include/sidebar.php');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product Table</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Stock</th>
                                            <th>Add</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="SELECT * FROM `product`";
                                            $run=mysqli_query($conn,$sql);
                                            while($fet=mysqli_fetch_assoc($run)){
                                        ?>
                                        <tr>

                                            <td><?php echo $fet['procode'];?></td>
                                            <td><?php echo $fet['proname'];?></td>
                                            <td><?php echo $fet['uprice'];?></td>
                                            <td size="5%"><input type="number" size="2%" class="quant" value="1"></td>

                                            <input type="hidden"  value="<?php echo $fet['srppr'];?>">

                                            <td><?php echo $fet['prostck'];?></td>

                                            <td><button type="button" class="btn btn-primary btn1" name="add"
                                                    data-proid="<?php echo $fet['pid']; ?>">Add</button></td>

                                            <!-- <td class="td"><button type="button" class="btn btn-danger delete"
                                                    data-del="<?php echo $fet['pid']; ?>">Delete</button></td> -->

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

                <div class="col-6">
                    <div class="card ">
                        <form id="formdata">
                            <div class="card-header">
                                <h4>POS</h4>
                                <a href="saleproview.php" class="btn btn-primary mb-4 "
                                    style="margin-left:75%;color:white; height: 30px; width:100px; text-transform:uppercase; font-weight:bold;">View</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Invoice</label>
                                    <input type="text" name="pf_order" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="pf_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="pf_contact" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Total Cash</label>
                                    <input type="text" name="tcash" class="form-control postotal" required readonly>
                                </div>
                                <div class="form-group">
                                    <select name="pf_status" id="" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="in_process">In Process</option>
                                        <option value="complete">Complete</option>

                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn" id="btn3" style=" background-color:#464c45; color:white;"
                                    type="submit" name="sub" value="Submit" />
                            </div>
                        </form>
                    </div>
                    <!-- ===============================3rd=========================== -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>View Cart</h4>
                                    <a href="#" id="empty" data-emp="empty" class="btn btn-danger mb-4 mt-2"
                                        style="margin-left:75%;color:white; height:30px; width:100px; text-transform:uppercase; font-weight:bold;">Empty</a>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="tableExport"
                                            style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total Price</th>
                                                    <th>Stock</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tdata" class="tdata">

                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- =================3rd================== -->
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>

<?php 
    include ('./include/footer.php');
?>

<script>
$(document).ready(function() {
    $(document).on("click", ".btn1", function() {
        var add = $(this).closest("tr");
        var qty = add.find(".quant").val();
        var pid = $(this).data("proid");
        // alert(q);
        // alert(pid);

        var msg = this;
        // alert (msg);

        $.ajax({
            url: "./files/pos-insert.php",
            method: "POST",
            data: {
                quant: qty,
                pid: pid
            },
            success: function(res) {
                // alert(res);
                if (res == 0) {
                    alert("order already exist");
                } else if (res == 1) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Product Has Been Inserted successfully'
                    })
                    // alert ("Product has been insereted");
                    // location.reload(true);
                    load_cart_item();
                } else {
                    alert("Product has been not insereted");
                }
            }
        })
    })
})
</script>

<!-- all product total work -->
<script>
    load_cart_item();
    function load_cart_item(){
        $.ajax({
            url:"./files/pos_insert.php",
            method:"POST",
            data:{cartview:"postcart"},
            alert(data);
            success:function(res){
                // alert(res);
                $("#tdata").html(res);
                var a = $('#a').html();
                $(".postotal").val(a);
               

            }
        })
    }
</script>
<!-- all product total work -->


<!-- view cart delete work -->

<script>
$(document).ready(function() {
    $(document).on("click", "#delete", function() {
        var del = $(this).data("del");
        var msg = this;
        $.ajax({
            url: "./files/pos_del.php",
            method: "POST",
            data: {
                mydel: del
            },
            success: function(res) {
                // alert(res);
                if (res == 1) {
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
                                        Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Product Has Been Deleted Successfully'
                            })
                            $(msg).closest("tr").fadeOut();
                            // load_cart_item_number();
                            load_cart_item();
                        }
                    })
                } else {
                    alert("Data HAS NOT BEEN DELETED");
                }
            }
        });
    });
});
</script>

<!-- change quantity  on change view-->
<script>
$(document).on("change", ".input_number", function() {
    var data = $(this).closest("tr");
    var id = data.find(".pid").val();
    var posprice = data.find(".posprice").val();
    var qty = data.find(".input_number").val();
    // alert(qty);
    $.ajax({
        url: "./files/pos_insert.php",
        method: "POST",
        data: {
            upid: id,
            posprice: posprice,
            qty: qty
        },
        success: function(res) {
            // alert(res);
            if (res == 4) {
                load_cart_item();
                // location.reload(true);
            }
        }
    });
});
</script>


<!--=============== Empty button work ==============-->

<script>
$(document).ready(function() {
    $(document).on("click", "#empty", function() {
        var emp = $(this).data("emp");
        // alert (emp);
        var msg = this;
        $.ajax({
            // alert (res);
            url: "./files/pos_insert.php",
            method: "POST",
            data: {
                myemp: emp
            },
            success: function(res) {
                // alert(res);
                if (res == 4) {
                    // alert("Cart Has been empty");
                    // location.reload(true);
                    load_cart_item();
                    // load_cart_item_numnber();
                }
            }
        });
    });
});
</script>


<!--========================== pos form work ==========================-->

<script>
$(document).ready(function() {
    $("#btn3").on("click", function(e) {
        // alert("run");
        e.preventDefault();
        var mydata = new FormData(formdata);
        // alert (mydata);
        $.ajax({
            url: "./files/form_insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                alert(res);
                if (res == 0) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'Please fill out all filled'
                    })
                    // alert(" ALREADY EXIST");   
                } else if(res == 1){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'Invoice number Already Exist'
                    })
                }
                 else if (res == 2) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Product Has Been Inserted successfully'
                    })
                    // location.reload(true);
                    // $('#mycategory').trigger('reset');
                } else {
                    alert("product HAS BEEN NOT INSERTED");
                }
            }
        });
    });
});
</script>