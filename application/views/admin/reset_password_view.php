<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset Password</title>
  <!-- Responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- AdminLTE style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/dist/css/adminlte.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    body {
      color: black;
    }
    .login-box {
      margin: 50px auto;
      max-width: 400px;
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
      
      <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php } ?>

      <?php if(isset($message)) { ?>
      <div class="alert alert-success"><?php echo $message; ?></div>
      <?php } ?>

      <?php if(!isset($message)) { ?>
      <p class="login-box-msg">Enter your new password</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
          </div>
        </div>
      </form>
      <?php } ?>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url('assets/template/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
