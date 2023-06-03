
<?php
     include('./include/conn.php');
    //  include ('./include/header.php');
    // include ('./include/sidebar.php');
     ?>
<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admieries</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/top.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form id="login">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"  type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password"  type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <!-- <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div> -->
                  </div>
                  <div class="form-group">
                    <button type="submit"  class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <!-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div> -->
                <div class="row sm-gutters">
                  <!-- <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div> -->
                  <!-- <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php
    include ('./include/footer.php');
?>





<script>
    
    $(document).ready(function() {
        $(document).on("click", ".btn",function(e){
            // alert('i amclicked');
            e.preventDefault();
            var form=$(this).closest("#login");
            var email=form.find("#email").val();
            var password=form.find("#password").val();
            // alert(pass);
            $.ajax({
                url:"./files/login.php",
                type:"POST",
                data: {email:email,password:password},
                success:function(res){
                  // alert(res);
                  if(res==9){
                        window.location.href= "home.php";
    
                  }
                  // if(res==9){
                  //   const Toast = Swal.mixin({
                  //       toast: true,
                  //       position: 'top-end',
                  //       showConfirmButton: false,
                  //       timer: 3000,
                  //       timerProgressBar: true,
                  //       didOpen: (toast) => {
                  //           toast.addEventListener('mouseenter', Swal.stopTimer)
                  //           toast.addEventListener('mouseleave', Swal
                  //               .resumeTimer)
                  //       }
                  //   })

                  //   Toast.fire({
                  //       icon: 'success',
                  //       title: 'Enter Successfully'
                  //   })
                  // }
                  // if(res== 8){
                  //       const Toast = Swal.mixin({
                  //       toast: true,
                  //       position: 'top-end',
                  //       showConfirmButton: false,
                  //       timer: 3000,
                  //       timerProgressBar: true,
                  //       didOpen: (toast) => {
                  //           toast.addEventListener('mouseenter', Swal.stopTimer)
                  //           toast.addEventListener('mouseleave', Swal
                  //               .resumeTimer)
                  //       }
                  //   })

                  //   Toast.fire({
                  //       icon: 'error',
                  //       title: 'Please fill Email and Password'
                  //   })
                  //       // alert ("Product Already Exist");
                  //   }else if(res== 9){
                  //       const Toast = Swal.mixin({
                  //       toast: true,
                  //       position: 'top-end',
                  //       showConfirmButton: false,
                  //       timer: 3000,
                  //       timerProgressBar: true,
                  //       didOpen: (toast) => {
                  //           toast.addEventListener('mouseenter', Swal.stopTimer)
                  //           toast.addEventListener('mouseleave', Swal
                  //               .resumeTimer)
                  //       }
                  //   })

                  //   Toast.fire({
                  //       icon: 'success',
                  //       title: 'Enter Successfully'
                  //   })
                  //       window.location.href= "home.php"; 

                  //       // alert ("Product Has Been Inserted");
                  //   }else if(res==11){
                  //     const Toast = Swal.mixin({
                  //       toast: true,
                  //       position: 'top-end',
                  //       showConfirmButton: false,
                  //       timer: 3000,
                  //       timerProgressBar: true,
                  //       didOpen: (toast) => {
                  //           toast.addEventListener('mouseenter', Swal.stopTimer)
                  //           toast.addEventListener('mouseleave', Swal
                  //               .resumeTimer)
                  //       }
                  //   })

                  //   Toast.fire({
                  //       icon: 'success',
                  //       title: 'This Role is not avaliable for admin/user'
                  //   })
                  //   }else{
                  //       // alert ("Your Enteries IS not Right");
                  //       const Toast = Swal.mixin({
                  //       toast: true,
                  //       position: 'top-end',
                  //       showConfirmButton: false,
                  //       timer: 3000,
                  //       timerProgressBar: true,
                  //       didOpen: (toast) => {
                  //           toast.addEventListener('mouseenter', Swal.stopTimer)
                  //           toast.addEventListener('mouseleave', Swal
                  //               .resumeTimer)
                  //       }
                  //   })

                  //   Toast.fire({
                  //       icon: 'error',
                  //       title: 'Enter Correct Data'
                  //   })
                  //   }
                }
            })
        })
    })

</script>