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
                            <div class="card-header"><h3 class="m-0 text-dark"> Update Training</h3></div>

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
                                <?php echo form_open_multipart('trainer/submitUpdateTraining'); ?>
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
                                                    <input type="text" class="form-control" name="training_title" value="<?= $training_data['training_title'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>No. of training hours</label>
                                                    <input type="number" name="required_no_of_hours" class="form-control" value="<?= $training_data['required_no_of_hours'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Validity</label>
                                                    <input type="text" name="validity" class="form-control" value="<?= $training_data['validity'] ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select name="category" class="form-control" id="category" required>
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
                                                    <select name="subcategory" class="form-control" id="subcategory" required>
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
                                                    <select name="level" class="form-control" required>
                                                        <option value="Intermediate" <?= ($training_data['level'] == 'Intermediate') ? 'selected' : '' ?>>Intermediate</option>
                                                        <option value="Easy" <?= ($training_data['level'] == 'Easy') ? 'selected' : '' ?>>Easy</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Language</label>
                                                    <select name="language" class="form-control" required>
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
                                                        <div class="custom-file">
                                                            <input type="file" name="banner" class="custom-file-input" id="banner" accept="image/*">
                                                            <label class="custom-file-label" for="banner"><?= $training_data['banner'] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" rows="3" required><?= $training_data['description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Requirements</label>
                                                    <textarea name="requirements" class="form-control" rows="3"><?= $training_data['requirements'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Target Participant</label>
                                                    <textarea name="target_participant" class="form-control" rows="3"><?= $training_data['target_participant'] ?></textarea>
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
                                                            <input type="text" name="instruction[]" class="form-control" value="<?= $data->description ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select name="section[]" class="form-control" required>
                                                                <option value="video" <?= $data->section == 'video' ? 'selected' : '' ?>>Video</option>
                                                                <option value="workshop" <?= $data->section == 'workshop' ? 'selected' : '' ?>>Workshop</option>
                                                                <option value="examination" <?= $data->section == 'examination' ? 'selected' : '' ?>>Examination</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <input type="number" name="percentage[]" class="form-control" value="<?= $data->percentage ?>" required>
                                                                <button type="button" class="btn btn-danger btn-sm ml-2 delete-row">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>
                                        </div>
                                        <div class="row" style="display: block; text-align: right; margin: 2px;">
                                            <div class="form-group">
                                                <a class="btn btn-sm btn-primary" id="additional-step" href="#">Add additional step</a>
                                            </div>
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
                                                                <input type="text" name="video_title[]" class="form-control" value="<?= $video['title'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <input type="url" name="video_url[]" class="form-control" value="<?= $video['url'] ?>" required>
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
                                                                <input type="text" name="workshop_title[]" class="form-control" value="<?= $workshop['title'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="workshop_file_<?= $index + 1 ?>" class="custom-file-input" id="workshop<?= $index + 1 ?>" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                                                                        <label class="custom-file-label" for="workshop<?= $index + 1 ?>">Choose file</label>
                                                                    </div>
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
                                                                <input type="text" name="examination_title[]" class="form-control" value="<?= $examination['title'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="examination_file_<?= $index + 1 ?>" class="custom-file-input" id="examination<?= $index + 1 ?>" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                                                                        <label class="custom-file-label" for="examination<?= $index + 1 ?>">Choose file</label>
                                                                    </div>
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
                                                                <input type="text" name="reference_title[]" class="form-control" value="<?= $reference['title'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                <input type="url" name="reference_url[]" class="form-control" value="<?= $reference['url'] ?>">
                                                                    <button type="button" class="btn btn-danger btn-sm ml-2 delete-reference" disabled>Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <div class="row" style="display:block; text-align:right; margin:2px;">
                                            <div class="form-group">
                                                <a class="btn btn-sm btn-primary" id="additional-references" href="">Add additional references</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row" style="display:block; text-align:right; margin:2px;">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-success">Update Training</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
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
</script>
</body>
</html>
