<!DOCTYPE html>
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
<div class="modal fade" id="modal-addcollaborator">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url() . '/trainer/addCollaborator'; ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Collaborator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Collaborators</label> <input type="hidden" name="training_id" id="training-id">
                        <select class="select2" name="collaborator[]" multiple="multiple" data-placeholder="Select a trainer" style="width: 100%;">
                            <?php
                            $registered_trainer = $this->System_model->fetchTrainers();

                            foreach ($registered_trainer as $reg) {
                                echo '<option value="' . $reg['id'] . '">' . $reg['first_name'] . ' ' . $reg['last_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
            
            if (!isset($trainer['photo']) || empty($trainer['photo'])) {
                $photo = base_url() . '/assets/template/dist/img/avatar5.png';
            } else {
                $photo = base_url('uploads/' . $trainer['photo']);
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
                <li class="nav-item dropdown">
                    <a class="nav-link user user-menu" data-toggle="dropdown" href="#">
                        <img src="<?= $photo ?>" class="user-image" alt="User Image">
                        <span class="ml-2"><?= $user['first_name'] . ' ' . $user['last_name'] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('trainer/profile') ?>" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('trainer/dashboard') ?>" class="dropdown-item">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    </div>
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
                        <h1 class="m-0 text-dark"> My Dashboard</h1>
                    </div><!-- /.col -->
        
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row" style="display:block; text-align: right; margin:2px;">
                    <a class="btn btn-success btn-sm col-sm-2" href="<?php echo base_url() . '/trainer/createTraining' ?>" style="margin:10px; margin-left:0px;">Create Training</a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Training Title</th>
                                        <th>Author</th>
                                        <th>Collaborator/s</th>
                                        <th>Required no. of hours</th>
                                        <th>No. of enrollees</th>
                                        <th>No. of completions</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $trainings = $this->System_model->fetchTrainings($_SESSION['id']);


                                    $html = '';
                                    foreach ($trainings as $value) {
                                        $trainer = $this->System_model->fetchTrainer($value['author_id']);

                                        $trainer_col1 = $this->System_model->fetchTrainer($value['collaborator1']);
                                        $trainer_col2 = $this->System_model->fetchTrainer($value['collaborator2']);

                                        $col = '';
                                        if ($trainer_col1) {
                                            $col .= '' . $trainer_col1[0]['first_name'] . ' ' . $trainer_col1[0]['last_name'] . '';
                                        }

                                        if ($trainer_col2) {
                                            $col .= ', ' . $trainer_col2[0]['first_name'] . ' ' . $trainer_col2[0]['last_name'] . '';
                                        }

                                        $enrollees_count = $this->System_model->fetchEnrollees($value['id']);
                                        $enrollees_completion = $this->System_model->fetchEnrolleesCompletion($value['id']);
                                        $status = $value['status'] == 1 ? 'Approved' : 'Pending';
                                        $html .= '<tr>
                                        <td>' . $value['training_title'] . '</td>' .
                                            '<td>' . $trainer[0]['first_name'] . ' ' . $trainer[0]['last_name'] . '</td>
                                        <td>' . $col . '</td>
                                        <td>' . $value['required_no_of_hours'] . '</td>
                                        <td>' . $enrollees_count . '</td>
                                        <td>' . $enrollees_completion . '</td>
                                        <td>' . $status . '</td>
                                        <td class="option"><a data-toggles="tooltip" data-placement="top" title="Update" class="btn btn-sm btn-default" href="' . base_url() . '/trainer/updateTraining/?id=' . $value['id'] . '"><i class="fa fa-sync" aria-hidden="true"></i></a><a style="margin-left: 2px" data-toggles="tooltip" data-placement="top" title="Go to Classroom" class="btn btn-default btn-sm" href="' . base_url() . '/trainer/classroom/?id=' . $value['id'] . '"> <i class="fa fa-university" aria-hidden="true"></i></a><button class="btn-sm btn btn-default add-collaborator-btn" data-toggle="modal" data-target="#modal-addcollaborator"  data-toggles="tooltip" title="Add Collaborator" style="margin-left: 2px" data-id="' . $value['id'] . '"><i class="fa fa-user" aria-hidden="true"></i></button></td>
                                    </tr>';
                                    }
                                    echo $html;
                                    ?>
                                    </tbody>
                                </table>
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
<script>
    $(function () {
        $('.select2').select2({
            maximumSelectionLength: 2,
            formatSelectionTooBig: function (limit) {
                return 'Too many collaborators';
            }
        });
        $('[data-toggles="tooltip"]').tooltip();
        jQuery('#example1 tbody').on('click', '.add-collaborator-btn', function () {
            jQuery('#training-id').val(jQuery(this).data('id'));
        });
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
</body>
</html>
