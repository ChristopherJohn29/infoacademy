<!DOCTYPE html>
<html lang="en">
<head>
    <title>Virtual Classrooms</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Virtual Classroom Infoacademy">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>/bootstrap4/bootstrap.min.css">
    <link href="<?php echo base_url() . '/assets/unicat/plugins/' ?>/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() . '/assets/unicat/plugins/' ?>/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/plugins/' ?>/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/plugins/' ?>/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/plugins/' ?>/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>/about.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>/about_responsive.css">
    <style>
        #example1_wrapper {
            width: 100%;
            color: black;
        }

        .my-profile-row {
            margin-top: 56px;
            min-height: 400px;
        }

        .my-profile {
            width: 100%;
            padding-bottom: 100px;
            background: #FFFFFF;
            padding-top: 80px;
        }

        .form-control {
            color: black;
        }

        .btn-default {
            background-color: #f8f9fa;
            border-color: #ddd;
            color: #444;
        }
    </style>
</head>
<body>
<div class="super_container">
    <!-- Header -->
    <?php $this->load->view('header'); ?>
    <!-- Menu -->
    <!-- Home -->
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>About</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <div class="my-profile">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Virtual Classrooms</h2>
                    </div>
                </div>
            </div>
            <div class="row my-profile-row">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Enrolled Training</th>
                        <th>Trainer</th>
                        <th>Date of Enrollment</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $training_class = $this->System_model->fetchTrainingClass($_SESSION['id']);

                    foreach ($training_class as $value) {
                        $training = $this->System_model->fetchSingleTraining($value['training_id']);
                        $trainer = $this->System_model->fetchTrainer($training[0]['author_id']);
                        $trainer_name = $trainer[0]['first_name'] . ' ' . $trainer[0]['last_name'];
                        $training_title = $training[0]['training_title'];
                        $option = '';
                        if ($value['status'] == 0) {
                            $status = 'Payment Verification';
                            $option .= '<a style="margin-left: 2px" data-toggles="tooltip" data-placement="top" title="Go to Classroom" class="btn btn-default btn-sm" href="' . base_url() . '/control/classroom/?tid='.$value['training_id'].'"> <i class="fa fa-university" aria-hidden="true"></i></a>';
                        } elseif($value['status'] == 1) {
                            $status = 'active';
                            $option .= '<a style="margin-left: 2px" data-toggles="tooltip" data-placement="top" title="Go to Classroom" class="btn btn-default btn-sm" href="' . base_url() . '/control/classroom/?tid='.$value['training_id'].'"> <i class="fa fa-university" aria-hidden="true"></i></a>';
                        } elseif ($value['status'] == 2) {
                            $status = 'Payment Declined';
                            $option .= '<a style="margin-left: 2px" data-toggles="tooltip" data-placement="top" title="Payment" class="btn btn-default btn-sm" href="' . base_url() . '"> <i class="fa fa-money" aria-hidden="true"></i></a>';
                        } elseif ($value['status'] == 3) {
                            $status = 'Completed';
                            $option .= '<a style="margin-left: 2px" data-toggles="tooltip" data-placement="top" title="Certificate" class="btn btn-default btn-sm" href="' . base_url() . '"> <i class="fa fa-file" aria-hidden="true"></i></a>';
                        }

                        
                        if ($value['is_complete'] == 1 && $value['status'] == 1): 
                            $option .= '<a style="margin-left: 2px" data-toggle="tooltip" data-placement="top" title="Certificate" class="btn btn-default btn-sm" href="javascript:void(0)" onclick="viewCertificate(' . $_SESSION["id"] . ', ' . $training[0]["id"] . ', 0)">
                                            <i class="fa fa-certificate" aria-hidden="true"></i>
                                         </a>';
                        endif;


                        $option .= '<a style="margin-left: 2px" data-toggles="tooltip" data-placement="top" title="Message trainer" class="btn btn-default btn-sm" href="' . base_url() . '"> <i class="fa fa-comment" aria-hidden="true"></i></a>';



                        ?>
                        <tr>
                            <td><?= $training_title ?></td>
                            <td><?=$trainer_name?></td>
                            <td><?= $value['date_enrolled'] ?></td>
                            <td><?= $status ?></td>
                            <td>test</td>
                            <td><?= $option ?></td>
                        </tr>
                        <?php
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php $this->load->view('footer'); ?>
</div>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/easing/easing.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>/colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/js/' ?>/about.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
    $('[data-toggles="tooltip"]').tooltip();

    function viewCertificate(participantId, trainingId, authorId) {
        // Open the certificate view page in a new tab
        window.open('/control/view_certificate/' + participantId + '/' + trainingId + '/' + authorId, '_blank');
    }
</script>
</body>
</html>
