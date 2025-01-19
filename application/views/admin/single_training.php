<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InfoAcademy | Trainings</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>main_styles.css">
    <link rel="stylesheet" href="<?= base_url() . '/assets/template' ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() . '/assets/template' ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
    <style>
        .logo_container {
            text-align: center;
        }

        .logo_text {
            font-size: 25px;
            padding-top: 20px;
            color: white;
        }

        .navbar-expand .navbar-nav {
            min-height: 55px;
        }

        .nav-link p {
            color: white;
            font-weight: bold;
        }

        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active, .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
            background-color: gray;
        }

        .repeatable {
            width: 100%;
            display: inline-flex;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <!-- SEARCH FORM -->
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <div class="logo_container">
            <a href="#">
                <div class="logo_text">Info<span>Academy</span></div>
            </a>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
            <!-- Sidebar Menu -->
            <?php $this->load->view('admin/sidebar') ?>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header"><h3 class="m-0 text-dark"> </div>

                            <div class="card-body" style="background: #f4f4f4">
                                <div class="">
                                    <?php if ($this->session->flashdata('success_message')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('success_message'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('error_message')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('error_message'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                </div>
                                <input type="hidden" name="tid" value="<?=$_GET['id']?>">
                                <div class="card">
                                    <div class="card-header">
                                        <strong> Training Information </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Title of Training</label>
                                                    <input type="text" class="form-control" name="training_title" value="<?= $training_data['training_title'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>No. of training hours</label>
                                                    <input type="number" name="required_no_of_hours" class="form-control" value="<?= $training_data['required_no_of_hours'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Validity</label>
                                                    <input type="text" name="validity" class="form-control" value="<?= $training_data['validity'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select name="category" class="form-control" id="category" disabled>
                                                        <option value="0">All Categories</option>
                                                        <?php
                                                        $categories = $this->System_model->fetchAllCategories();
                                                        foreach ($categories as $category) { 
                                                            $selected = ($category['id'] == $training_data['category_id']) ? 'selected' : ''; ?>
                                                            <option value="<?= $category['id'] ?>" <?= $selected ?>><?= $category['category_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Subcategory</label>
                                                    <select name="subcategory" class="form-control" id="subcategory" disabled>
                                                        <option value="0">All Subcategories</option>
                                                        <option value="<?= $training_data['subcategory'] ?>" selected><?= $training_data['subcategory'] ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <select name="level" class="form-control" disabled>
                                                        <option value="Intermediate" <?= ($training_data['level'] == 'Intermediate') ? 'selected' : '' ?>>Intermediate</option>
                                                        <option value="Easy" <?= ($training_data['level'] == 'Easy') ? 'selected' : '' ?>>Easy</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Language</label>
                                                    <select name="language" class="form-control" disabled>
                                                        <option value="English" <?= ($training_data['language'] == 'English') ? 'selected' : '' ?>>English</option>
                                                        <option value="Filipino" <?= ($training_data['language'] == 'Filipino') ? 'selected' : '' ?>>Filipino</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Banner</label>
                                                    <div class="input-group">
                                                        <a href=" <?= base_url('uploads/').$training_data['banner'] ?>" target="_blank">  <?= $training_data['banner'] ?> </a> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" rows="3" disabled><?= $training_data['description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Requirements</label>
                                                    <textarea name="requirements" class="form-control" rows="3" disabled><?= $training_data['requirements'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Target Participant</label>
                                                    <textarea name="target_participant" class="form-control" rows="3" disabled><?= $training_data['target_participant'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <?php $instructions = json_decode($training_data['instruction']); ?>
                                    <div class="card-header"><strong>Steps, instruction and percentage</strong></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Label Row (Do not repeat labels) -->
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>Steps</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Instructions</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Section</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Percentage</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="repeatable-instruction">
                                            <?php foreach ($instructions as $key => $data): ?>

                                                <div class="row repeatable-row col-12">
                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="step[]" value="# <?= $key + 1 ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" name="instruction[]" class="form-control" value="<?= $data->description ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select name="section[]" class="form-control" disabled>
                                                                <option value="video" <?= $data->section == 'video' ? 'selected' : '' ?>>Video</option>
                                                                <option value="workshop" <?= $data->section == 'workshop' ? 'selected' : '' ?>>Workshop</option>
                                                                <option value="examination" <?= $data->section == 'examination' ? 'selected' : '' ?>>Examination</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <input type="number" name="percentage[]" class="form-control" value="<?= $data->percentage ?>" disabled>
                                                                <button type="button" class="btn btn-danger btn-sm ml-2 delete-row" disabled>Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>
                                        </div>
                             
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Training Videos</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="repeatable-video">
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>Video no.</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Video Title</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Video Youtube link</label>
                                                </div>
                                            </div>
                                            <?php
                                            $videos = json_decode($training_data['video'], true);
                                            if (!empty($videos)) {
                                                foreach ($videos as $index => $video) { ?>
                                                    <div class="repeatable">
                                                        <div class="col-sm-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="# <?= $index + 1 ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="text" name="video_title[]" class="form-control" value="<?= $video['title'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <input type="url" name="video_url[]" class="form-control" value="<?= $video['url'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Training Workshop</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="repeatable-workshop">
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>W. no.</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Workshop Title</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Workshop File</label>
                                                </div>
                                            </div>
                                            <?php
                                            $workshops = json_decode($training_data['workshop'], true);
                                            if (!empty($workshops)) {
                                                foreach ($workshops as $index => $workshop) { ?>
                                                    <div class="repeatable">
                                                        <div class="col-sm-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="# <?= $index + 1 ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="text" name="workshop_title[]" class="form-control" value="<?= $workshop['title'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <a href=" <?= base_url('uploads/').$workshop['file'] ?>" target="_blank">  <?= $workshop['file'] ?> </a> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Training Examination</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="repeatable-examination">
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>Exam. no.</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Examination Title</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Examination File</label>
                                                </div>
                                            </div>
                                            <?php
                                            $examinations = json_decode($training_data['examination'], true);
                                            if (!empty($examinations)) {
                                                foreach ($examinations as $index => $examination) { ?>
                                                    <div class="repeatable">
                                                        <div class="col-sm-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="# <?= $index + 1 ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="text" name="examination_title[]" class="form-control" value="<?= $examination['title'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <a href=" <?= base_url('uploads/').$examination['file'] ?>" target="_blank">  <?= $examination['file'] ?> </a> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Training References and Example</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="repeatable-reference">
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>Ref. no.</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Reference Title</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Reference link</label>
                                                </div>
                                            </div>
                                            <?php
                                            $references = json_decode($training_data['ref'], true);
                                            if (!empty($references)) {
                                                foreach ($references as $index => $reference) { ?>
                                                    <div class="row repeatable-reference col-12">
                                                        <div class="col-sm-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="# <?= $index + 1 ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="text" name="reference_title[]" class="form-control" value="<?= $reference['title'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                <input type="url" name="reference_url[]" class="form-control" value="<?= $reference['url'] ?>" disabled>
                                                                    <button type="button" class="btn btn-danger btn-sm ml-2 delete-reference" disabled>Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <form action="/submit_training" method="post">
                        <!-- Training Fee -->
                        <div class="form-group">
                            <label for="trainingFee">Training Fee (in USD):</label>
                            <input type="number" step="0.01" class="form-control" id="trainingFee" name="training_fee" placeholder="Enter training fee" required>
                        </div>

                        <!-- Approval Options -->
                        <div class="form-group">
                            <label for="approvalStatus">Approval Status:</label>
                            <select class="form-control" id="approvalStatus" name="approval_status" required>
                                <option value="">Select an option</option>
                                <option value="approve">Approve</option>
                                <option value="decline">Decline</option>
                            </select>
                        </div>

                        <!-- Additional Notes -->
                        <div class="form-group">
                            <label for="notes">Additional Notes:</label>
                            <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Enter any additional notes"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>                
                
            </div><!-- /.container-fluid -->

      
        </div>

        
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body"></div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block"></div>
        <strong> Copyright ©2020 All rights reserved
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= base_url() . '/assets/template' ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() . '/assets/template' ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() . '/assets/template' ?>/dist/js/demo.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
    jQuery(document).ready(function () {
        bsCustomFileInput.init();
        $('#repeatable-instruction').on('change', 'select', function () {
            updateEachRepeatable();

        });

        function updateEachRepeatable () {
            let $counter = 0;
            let $video = 0;
            let $workshop = 0;
            let $examination = 0;
            let video_input = 0;
            let workshop_input = 0;
            let examination_input = 0;
            $('#repeatable-instruction').find('select').each(function () {
                $counter++;
                if ($(this).val() === 'video') {
                    $video++;
                }
                if ($(this).val() === 'workshop') {
                    $workshop++;
                }
                if ($(this).val() === 'examination') {
                    $examination++;
                }
            });
            video_input = jQuery('#repeatable-video').find('.repeatable').length;
            workshop_input = jQuery('#repeatable-workshop').find('.repeatable').length;
            examination_input = jQuery('#repeatable-examination').find('.repeatable').length;

            generateRepeatable('video', video_input, $video);
            generateRepeatable('workshop', workshop_input, $workshop);
            generateRepeatable('examination', examination_input, $examination);
            bsCustomFileInput.init();
        }


        function generateRepeatable($kind, $inputNumber, $actualNumber){
            let $html = '';
            if($kind === 'video'){
                while ($inputNumber < $actualNumber) {
                    $html = '<div class="repeatable">' +
                        '<div class="col-sm-1"> ' +
                        '<div class="form-group">' +
                        '<input type="text" class="form-control" value="# ' + parseInt($inputNumber+1) + '" disabled="">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-6">' +
                        '<div class="form-group">' +
                        '<input required type="text" name="video_title[]" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-5">' +
                        '<div class="form-group">' +
                        '<input required type="url" name="video_url[]" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $("#repeatable-video").append($html);
                    $inputNumber++;
                }
                while ($inputNumber > $actualNumber) {
                    $("#repeatable-video .repeatable").last().remove();
                    $inputNumber--;
                }
            }

            if($kind === 'workshop'){
                while ($inputNumber < $actualNumber) {
                    $html = '<div class="repeatable">' +
                        '<div class="col-sm-1">' +
                        '<div class="form-group">' +
                        '<input type="text" class="form-control" name="" value="# ' + parseInt($inputNumber+1) + '" disabled="">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-6">' +
                        '<div class="form-group">' +
                        '<input required type="text" name="workshop_title[]" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-5">' +
                        '<div class="form-group">' +
                        '<div class="input-group">' +
                        '<div class="custom-file">' +
                        '<input type="file" required accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" name="workshop_file_' + parseInt($inputNumber+1) + '" class="custom-file-input" id="workshop' + parseInt($inputNumber+1) + '">' +
                        '<label class="custom-file-label" for="workshop' + parseInt($inputNumber+1) + '">Choose file</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $("#repeatable-workshop").append($html);
                    $inputNumber++;
                }
                while ($inputNumber > $actualNumber) {
                    $("#repeatable-workshop .repeatable").last().remove();
                    $inputNumber--;
                }
            }

            if($kind === 'examination'){
                while ($inputNumber < $actualNumber) {
                    $html = '<div class="repeatable">' +
                        '<div class="col-sm-1">' +
                        '<div class="form-group">' +
                        '<input type="text" class="form-control" name="" value="# ' + parseInt($inputNumber+1) + '" disabled="">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-6">' +
                        '<div class="form-group">' +
                        '<input required type="text" name="examination_title[]" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-5">' +
                        '<div class="form-group">' +
                        '<div class="input-group">' +
                        '<div class="custom-file">' +
                        '<input type="file" required accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" name="examination_file_' + parseInt($inputNumber+1) + '" class="custom-file-input" id="examination' + parseInt($inputNumber+1) + '">' +
                        '<label class="custom-file-label" for="examination' + parseInt($inputNumber+1) + '">Choose file</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $("#repeatable-examination").append($html);
                    $inputNumber++;
                }
                while ($inputNumber > $actualNumber) {
                    $("#repeatable-examination .repeatable").last().remove();
                    $inputNumber--;
                }
            }

        }

        
        $("#additional-step").click(function (e) {
            step = jQuery('.repeatable-row').length + 1;
            $html = '<div class="row repeatable-row col-12">' + // Added "repeatable-row" class for grouping
                '<div class="col-sm-1">' +
                '<div class="form-group">' +
                '<input type="text" class="form-control step" value="# ' + step + '" disabled="">' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-6">' +
                '<div class="form-group">' +
                '<input type="text" name="instruction[]" class="form-control" required>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-3">' +
                '<div class="form-group">' +
                '<select name="section[]" class="form-control" required>' +
                '<option value="" selected disabled></option>' +
                '<option value="video">Video</option>' +
                '<option value="workshop">Workshop</option>' +
                '<option value="examination">Examination</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-2">' +
                '<div class="form-group">' +
                '<div class="d-flex justify-content-between align-items-center">' +
                '<input type="text" name="percentage[]" class="form-control" required>' +
                '<button type="button" class="btn btn-danger btn-sm ml-2 delete-row">Delete</button>' + // Delete button
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $("#repeatable-instruction").append($html);
            return false;
        });


        // Event delegation for dynamically added delete buttons
        $("#repeatable-instruction").on("click", ".delete-row", function () {
            $(this).closest(".repeatable-row").remove(); // Remove the closest parent row with class "repeatable-row"

            $("#repeatable-instruction .repeatable-row").each(function (index) {
                // Update the value of the input with the current step number
                $(this).find(".step").val("# " + (index + 1));
            });

            bsCustomFileInput.init();
            updateEachRepeatable();
            


        });

        var references = 1;

        // Add new reference row
        $("#additional-references").click(function (e) {
            e.preventDefault(); // Prevent default behavior of the button
            references = jQuery('.repeatable-reference').length + 1;
            const $html = `
                <div class="row repeatable-reference col-12">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <input type="text" class="form-control reference-number" value="# ${references}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="reference_title[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="url" name="reference_url[]" class="form-control">
                                <button type="button" class="btn btn-danger btn-sm ml-2 delete-reference">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>`;
            $("#repeatable-reference").append($html);
        });

        // Delete reference row and update reference numbers
        $("#repeatable-reference").on("click", ".delete-reference", function () {
            // Remove the clicked row
            $(this).closest(".repeatable-reference").remove();

            // Recalculate and update the reference numbers
            $("#repeatable-reference .repeatable-reference").each(function (index) {
                $(this).find(".reference-number").val("# " + (index + 1));
            });

            // Decrement references count
            references = $("#repeatable-reference .repeatable-reference").length;
        });

    })
</script>

<script>
    // jQuery to dynamically load subcategories based on selected category
    $('#category').change(function() {
        var category_id = $(this).val();
        if(category_id != '0') {
            $.ajax({
                url: '<?= base_url('trainer/get_subcategories_by_category') ?>', // Update with the correct URL to fetch subcategories
                type: 'POST',
                dataType: 'json', // Enforce JSON parsing
                data: {category_id: category_id},
                success: function(response) {
                    console.log('Response:', response);
                    var subcategory_select = $('#subcategory');
                    subcategory_select.empty();
                    subcategory_select.append('<option value="0">All Subcategories</option>');

                    if (Array.isArray(response)) {
                        $.each(response, function(index, subcategory) {
                            subcategory_select.append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                        });
                    } else {
                        console.error("Response is not an array", response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                }
            });

        } else {
            // Clear subcategory options if no category is selected
            $('#subcategory').empty();
            $('#subcategory').append('<option value="0">All Subcategories</option>');
        }
    });
</script>
</body>
</html>
