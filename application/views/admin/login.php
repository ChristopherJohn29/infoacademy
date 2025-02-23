<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/template/plugins'?>/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/template/plugins'?>/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/template/dist'?>/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/styles/'?>main_styles.css">
  <style>
  body{
    color:black;
  }
  .form-control
  {
  	color: black;
  }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <div class="logo_container">
      <a href="#">
        <div class="logo_text">Info<span>Academy</span></div>
      </a>
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php
       if ($error) {
           echo $error;
       }
       ?>
      <form action="<?php echo base_url().'/control/loginSubmit'?>" method="post" id="login_form">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" required="required" id="username" placeholder="Username" autocomplete="false">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required="required" name="password" placeholder="Password" autocomplete="false">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block submit-login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->


        <a href="<?php echo base_url().'/control/forgotpass' ?>" style="display:block;">I forgot my password</a>
        <a href="<?php echo base_url().'/control/register' ?>" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url().'/assets/template/plugins'?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url().'/assets/template/plugins'?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'/assets/template/dist'?>/js/adminlte.min.js"></script>

<script>
var login = {
	remember_me: function(){

			if ( localStorage.username ) {
				jQuery('#username').val(localStorage.username);
			}

		jQuery('.submit-login').click(function(e){
      e.preventDefault();
			if ( jQuery('#remember').prop('checked') == true ) {
				localStorage.username = jQuery('#username').val();
			}
      jQuery('#login_form').submit();


		});
	}
}
jQuery(document).ready(function(){
	login.remember_me();
});
</script>

</body>
</html>
