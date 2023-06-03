<?php include './include/conn.php'; ?>
<?php include './include/navbar.php' ?>
<?php include './include/sidebar.php'?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-10 col-md-5 col-lg-5">
                    <div class="card">
                        <form id="quantdata">
                            <div class="card-header">
                                <h4>Quantity</h4>
                                <a href="./viewquant.php" class="btn btn-info ml-auto">View Quantity</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" placeholder="Enter Quantity" name="qquantity" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="qdescription" required></textarea>
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
var mydata = new FormData(quantdata);
$.ajax({
url:"./files/insert-quant.php",
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