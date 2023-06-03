<?php
    include('./include/conn.php');
    include('./include/header.php');
    $sd=$_GET['st'];
     @$pemail = $_SESSION['pemail'];
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                <?php
                                                    $msql="SELECT * FROM `category`";
                                                    $mrun=mysqli_query($conn,$msql);
                                                    while($mfet=mysqli_fetch_array($mrun)){
                                                        ?>
                                                    <li><a href="./category.php?cd=<?php echo $mfet['sid'];?>"><?php echo $mfet['ccate'];?></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Sub Category</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                <?php 
                                                        $ssql = "SELECT * FROM `subcategory` WHERE `scid`='$sd'";
                                                        $srun = mysqli_query($conn,$ssql);
                                                        $mfet = mysqli_fetch_array($srun);
                                                        $md = $mfet['mscat'];

                                                        $sssql = "SELECT * FROM `subcategory` WHERE `mscat`='$md'";
                                                        $ssrun = mysqli_query($conn,$sssql);

                                                        while($mssfet = mysqli_fetch_array($ssrun)){
                                                            ?>
                                                            <li><a href="./subcategory.php?st=<?php echo $mssfet['scid'] ?>"><?php echo $mssfet['subcate'] ?></a></li> 
                                                            <?php
                                                        }
                                                    ?>
                                                </ul>
                                            

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php 
                            $psl = "SELECT * FROM `product` WHERE `scatedrop` = '$sd'";
                            $prun = mysqli_query($conn,$psl);
                            // echo $sd;
                            while($pfet=mysqli_fetch_array($prun)){
                                if($pfet['prorad']=='on'){

                                    $pic=explode(",",$pfet['pimg']);
                                    // echo $pfet; 
                                    $c = count($pic);
                        ?>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <?php 
                                if($c>1){
                                ?>
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo "../admin/imgs/" . $pic[0] ?>">
                                    <?php
                                }
                                else{
                                    ?>
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo "../admin/imgs/" . $pfet['pimg'] ?>">
                                    <?php
                                }
                                ?>
                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $pfet['proname'] ?></h6>
                                    <form id="formdata">
                                    <input type="hidden" name="pid" id="pid" value="<?php echo $pfet['pid'] ?>" >
                                        <input type="hidden" name="proname" id="proname" value="<?php echo $pfet['proname'] ?>" />
                                        <input type="hidden" name="prodes" id="prodes" value="<?php echo $pfet['prodes'] ?>"  />
                                        <input type="hidden" name="uprice" id="uprice" value="<?php echo $pfet['uprice'] ?>" />
                                        <input type="hidden" name="pimg" id="pimg" value="<?php echo $pfet['pimg'] ?>"  />
                                        <input type="hidden" name="procode" id="procode" value="<?php echo $pfet['procode'] ?>"  />
                                        <input type="hidden" name="prostck" id="prostck" value="<?php echo $pfet['prostck'] ?>"  />
                                        <input type="hidden" name="prostck" id="prostck" value="<?php echo $pfet['srppr'] ?>"  />
                                        <input type="hidden" name="pemail" id="pemail" value="<?php echo @$semail ?>" />
                                    <a href="#" id="addcart" class="addcart">+ Add To Cart</a>
                                    </form>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>Rs.<?php echo $pfet['srppr'] ?></h5>
                                    
                                </div>
                            </div>
                        </div>
                        <?php   
                        }  
                    }                            
                        ?>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <?php
    include('./include/footer.php');
?>   

<script>
$(document).ready(function(){
    $(document).on("click","#addtocard",function(stop){
        stop.preventDefault();
        var form=$(this).closest("#formdata");
        var id=form.find(".pid").val();
        var proname=form.find(".proname").val();
        var pdes=form.find(".prodes").val();
        var uprice=form.find(".uprice").val();
        var procode=form.find(".procode").val();
        var prostck=form.find(".prostck").val();
        var srppr=form.find(".srppr").val();
        var pimg=form.find(".pimg").val();
        var pemail=form.find(".pemail").val();

        $.ajax({
            url:'./Ajex/Add-cart.php',
            method:"POST",
            data:{pid:id,proname:proname,prodes:pdes,uprice:uprice,procode:procode,prostck:prostck,srppr:srppr,pimg:pimg,pemail:pemail},
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
})
    </script>