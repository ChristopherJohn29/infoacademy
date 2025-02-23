<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forgot Password</title>
  <!-- Responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/template/plugins'; ?>/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/template/plugins'; ?>/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/template/dist'; ?>/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/styles/'; ?>main_styles.css">
  <style>
    body {
      color: black;
    }
    .form-control {
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
      <p class="login-box-msg">Enter your email address to reset your password</p>
      
      <?php
      // Display errors or success messages if they exist
      if (isset($error) && !empty($error)) {
          echo '<div class="alert alert-danger">'.$error.'</div>';
      }
      if (isset($message) && !empty($message)) {
          echo '<div class="alert alert-success">'.$message.'</div>';
      }
      ?>
      
      <form action="<?php echo base_url().'/control/forgotpassSubmit'?>" method="post" id="forgot_form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required="required" id="email" placeholder="Email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Submit Button -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block submit-forgot">Reset Password</button>
          </div>
        </div>
      </form>
      <br>
      <a href="<?php echo base_url().'/control/login' ?>" class="text-center">Back to Login</a>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url().'/assets/template/plugins'; ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url().'/assets/template/plugins'; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'/assets/template/dist'; ?>/js/adminlte.min.js"></script>
</body>
</html>
