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
            
            if (!isset($trainer['photo']) && empty($trainer['photo'])) {
                $trainer['photo'] = base_url() . '/assets/template/dist/img/avatar5.png';
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
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark">My Profile</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <!-- User Info -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Personal Information</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> <?= $user['first_name'] . ' ' . $user['middle_name'] . ' ' . $user['last_name'] ?></p>
                        <p><strong>Address:</strong> <?= $user['street_number'] . ' ' . $user['street_name'] . ', ' . $user['barangay'] . ', ' . $user['city'] . ', ' . $user['region'] . ', ' . $user['zip_code'] ?></p>
                        <p><strong>Email:</strong> <?= $user['email_address'] ?></p>
                        <p><strong>Mobile:</strong> <?= $user['mobile_number'] ?></p>
                        <p><strong>Sex:</strong> <?= $user['sex'] ?></p>
                        <p><strong>Marital Status:</strong> <?= $user['marital_status'] ?></p>
                    </div>
                </div>

                <!-- Trainer Profile -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Trainer Profile</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($trainer)): ?>
                            <p><strong>Key Competencies:</strong> <?= nl2br($trainer['key_competencies']) ?></p>
                            <p><strong>Educational Background:</strong> <?= nl2br($trainer['educational_background']) ?></p>
                            <p><strong>Employment History:</strong> <?= nl2br($trainer['employment_history']) ?></p>
                            <div>
                                <img src="<?= base_url('uploads/' . $trainer['photo']) ?>" alt="Profile Photo" class="img-thumbnail" width="150">
                            </div>
                        <?php else: ?>
                            <p>No trainer profile information available yet.</p>
                            <!-- Placeholder for profile photo -->
                            <img src="<?= base_url('assets/images/default-photo.png') ?>" alt="Default Profile Photo" class="img-thumbnail" width="150">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
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
