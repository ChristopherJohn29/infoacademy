<!DOCTYPE html>
<html lang="en">
<head>
    <title>Virtual Classroom</title>
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

        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
            height: calc(2.25rem + 2px);
            margin-bottom: 0;
        }

        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: calc(2.25rem + 2px);
            margin: 0;
            opacity: 0;
        }

        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            box-shadow: none;
        }

        .custom-file-input:lang(en) ~ .custom-file-label::after {
            content: "Browse";
        }

        .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            height: 2.25rem;
            padding: .375rem .75rem;
            line-height: 1.5;
            color: #495057;
            content: "Browse";
            background-color: #e9ecef;
            border-left: inherit;
            border-radius: 0 .25rem .25rem 0;
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
                        <?php
                        $training = $this->System_model->fetchSingleTraining($_GET['tid']);
                        $training_title = $training[0]['training_title'];

                        ?>
                        <h2 class="section_title"><?= $training_title ?></h2>
                    </div>
                </div>
            </div>
            <div class="row my-profile-row">
                <?php
                $training_class = $this->System_model->fetchFromTrainingClass($_GET['tid']);
                $instruction = json_decode($training_class[0]['training_instruction']);

                ?>
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Training Instruction</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $count = 0;
                            foreach ($instruction as $value) {
                                $count++;
                                ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Step # <?= $count ?>: <?= $value->description ?></label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }

                            ?>
                            <!-- input states -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <?php

                    $count = 0;
                    $video = 0;
                    $workshop = 0;
                    $examination = 0;

                    $display = 1;
                    $step = count($instruction);

//                    $training_section = json_decode($training[0]);

//                    echo '<pre>';
//                    var_dump($training);
//                    echo '</pre>';

                    foreach ($instruction as $value) {
                        $training_section = json_decode($training[0][$value->section]);


                        if ($value->section == 'video' && $display == 1) {
                            $url = str_replace('watch?v=', 'embed/', $training_section[$video]->url);

                            ?>
                            <div class="card card-warning  step-<?= $count ?>" style="margin-top:20px;">
                                <div class="card-header">
                                    <h3 class="card-title"><?= $training_section[$video]->title ?></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <iframe width="100%" height="543" src="<?= $url ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <!-- input states -->
                                </div>
                                <?php

                                if ($value->completed != 1) {

                                    ?>
                                    <button data-url="https://infoacademy.infoadvance.com.ph/control/finishwatching?tid=<?= $training[0]['id'] ?>&step=<?= $count ?>" class="counter_form_button button-enroll finish-watching">Finish watching</button>
                                    <?php
                                }

                                ?>
                                <!-- /.card-body -->
                            </div>
                            <?php
                            $video++;
                        }
                        ?><?php
                        if ($value->section == 'workshop' && $display == 1) {
                            ?>
                            <div class="card card-warning  step-<?= $count ?>" style="margin-top:20px;">
                                <div class="card-header">
                                    <h3 class="card-title"><?= $training_section[$workshop]->title ?></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <a class="btn btn-default btn-sm" href="<?= base_url() ?>/uploads/<?= $training_section[$workshop]->file ?>" download="download">Download Workshop</a>
                                            <br/><br/> <label for="customFile">Submit Workshop</label>
                                            <form action="<?= base_url() . '/control/submitWorkshop' ?>" method="POST" enctype="multipart/form-data">
                                                <input name="tid" type="hidden" value="<?= $training[0]['id'] ?>">
                                                <input name="step" type="hidden" value="<?=$count?>">
                                                <input name="" type="hidden" value="">
                                                <div class="custom-file">
                                                    <input type="file" name="workshop_file" class="custom-file-input" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf, .jpg, .jpeg, .png " id="customFile-<?= $workshop ?>">
                                                    <label class="custom-file-label" for="customFile-<?= $workshop ?>">Choose file</label>
                                                </div>
                                                <?php

                                                if ($value->completed != 1) {

                                                    ?>
                                                    <button type="submit" data-url="https://infoacademy.infoadvance.com.ph/control/finishwatching?tid=<?= $training[0]['id'] ?>&step=<?= $count ?>" class="counter_form_button button-enroll">Submit Workshop</button>
                                                    <?php
                                                }

                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- input states -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <?php
                            $examination++;
                        }
                        ?><?php
                        if ($value->section == 'examination' && $display == 1) {
                            ?>
                            <div class="card card-warning  step-<?= $count ?>" style="margin-top:20px;">
                                <div class="card-header">
                                    <h3 class="card-title"><?= $training_section[$examination]->title ?></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <a class="btn btn-default btn-sm" href="<?= base_url() ?>/uploads/<?= $training_section[$examination]->file ?>" download="download">Download Examination</a>
                                            <br/><br/> <label for="customFile">Submit Examination</label>
                                            <form action="<?= base_url() . '/control/submitExamination' ?>" method="POST" enctype="multipart/form-data">
                                                <input name="tid" type="hidden" value="<?= $training[0]['id'] ?>">
                                                <input name="step" type="hidden" value="<?=$count?>">
                                                <input name="" type="hidden" value="">
                                                <div class="custom-file">
                                                    <input type="file" name="examination_file" class="custom-file-input" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf, .jpg, .jpeg, .png " id="customFile-<?= $examination ?>">
                                                    <label class="custom-file-label" for="customFile-<?= $examination ?>">Choose file</label>
                                                </div>
                                                <?php

                                                if ($value->completed != 1) {

                                                    ?>
                                                    <button type="submit" data-url="https://infoacademy.infoadvance.com.ph/control/finishwatching?tid=<?= $training[0]['id'] ?>&step=<?= $count ?>" class="counter_form_button button-enroll">Submit Examination</button>
                                                    <?php
                                                }

                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- input states -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <?php
                            $examination++;
                        }

                        if ($value->completed == 1) {
                            $display = 1;
                        } else {
                            $display = 0;
                        }

                        $count++;
                        if ($step == $count) {
                            if ($value->completed == 1) {
                                $this->System_model->saveCompleted($training[0]['id']);
                                ?>
                                <div class="section_title_container text-center" style="margin-top: 80px">
                                    <h2 class="section_title">Training Completed</h2>
                                </div>
                                <?php
                            }
                        }
                    }

                    ?>
                    <!-- /.card -->
                    <!-- general form elements disabled -->
                    <!-- /.card -->
                </div>
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
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
    jQuery(document).ready(function () {
        bsCustomFileInput.init();
        jQuery('.finish-watching').click(function () {
            url = jQuery(this).data('url');
            window.location.href = url;
        });
        jQuery('.finish-reading').click(function () {
            url = jQuery(this).data('url');
            window.location.href = url;
        });
    });
</script>
</body>
</html>
