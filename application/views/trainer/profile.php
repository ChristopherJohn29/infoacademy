.<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trainer | Dashboard</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/dist' ?>/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>main_styles.css">
    <style>
        body {
            color: black;
        }

        .form-control {
            color: black;
        }

        .option {
            display: inline-flex !important;
        }
    </style>
    <style>
        /* Remove bullet points for the list */
        .nav.navbar-nav {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        /* Align to the right */
        .navbar-right {
            margin-left: auto; /* Pushes the content to the right */
        }

        /* Style for user menu */
        .user-menu a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        /* Hover effect */
        .user-menu a:hover {
            background-color: #f4f4f4;
        }

        /* Profile image */
        .user-menu .user-image {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* User name styling */
        .user-menu .hidden-xs {
            margin-left: 10px;
            font-size: 16px;
            font-weight: 500;
            color: #333;
        }


    </style>
    <!-- Google Font: Source Sans Pro -->
</head>
<body class="hold-transition layout-top-nav">
<!-- Modal -->

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <div class="logo_container">
                <a href="#">
                    <div class="logo_text">Info<span>Academy</span></div>
                </a>
            </div>
            <?php 
            
            if(!empty($trainer)){

                if(isset($trainer[0]['photo']) && !empty($trainer[0]['photo'])){
                    $photo = $trainer[0]['photo'];
                } else {
                    $photo = base_url().'/assets/template/dist/img/avatar5.png';
                }
            } else {
                $photo = base_url().'/assets/template/dist/img/avatar5.png';
            }
    
            
            ?>
         


            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <!-- Messages Dropdown Menu -->
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#"> <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span> </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"> <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span> </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"> <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span> </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"> <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span> </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="user user-menu">
                    <a href="<?= base_url('trainer/profile') ?>" class="d-flex align-items-center">
                        <img src="<?=$photo?>" class="user-image" alt="User Image">
                        <span class="hidden-xs ml-2"><?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></span>
                    </a>
                </li>
              
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> My Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                           
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline"></div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 </strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . '/assets/template/dist' ?>/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . '/assets/template/dist' ?>/js/demo.js"></script>

</body>
</html>
