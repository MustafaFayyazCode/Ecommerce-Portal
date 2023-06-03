<?php  
include './include/conn.php';
$uid=$_GET['uid'];
$usql="SELECT * FROM `quantity` WHERE `qid`='$uid'";
$urun=mysqli_query($conn,$usql);
$ufet=mysqli_fetch_array($urun);
?>
<?php include './include/navbar.php' ?>
<?php include './include/sidebar.php'?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-10 col-md-5 col-lg-5">
                    <div class="card">
                        <form id="qup">
                            <div class="card-header">
                                <h4>Quantity</h4>
                                <a href="./viewquant.php" class="btn btn-info ml-auto">View Quantity</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <input type="hidden" class="form-control" placeholder="Enter Quantity"
                                        name="qid" value="<?php echo $ufet['qid']?>">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" placeholder="Enter Quantity"
                                        name="qquantity" value="<?php echo $ufet['qquantity']?>" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="qdescription"
                                        value="<?php echo $ufet['qdescription']?>" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="submit"  id="btn"class="btn btn-primary">
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
        var mydata = new FormData(qup);
        $.ajax({
            url: "./files/update-quant.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                alert(res);
            }
            });
    });
});
</script>