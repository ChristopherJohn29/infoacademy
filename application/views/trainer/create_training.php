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

        .repeatable {
            width: 100%;
            display: inline-flex;
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('trainer/mainheader')?>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6"></div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url() . '/trainer/dashboard' ?>">Home</a></li>
                            <li class="breadcrumb-item active">Create Training</li>
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
                            <div class="card-header"><h3 class="m-0 text-dark"> Create Training</h3></div>
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
                                <?php echo form_open_multipart('trainer/submitTraining'); ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong> Training Information </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Title of Traning</label>
                                                    <input type="text" class="form-control" name="training_title" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>No. of training hours</label>
                                                    <input type="number" name="required_no_of_hours" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Validity</label>
                                                    <input type="text" name="validity" class="form-control" required>
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
                                                            foreach ($categories as $category) { ?>
                                                                <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Subcategory</label>
                                                    <select name="subcategory" class="form-control" id="subcategory" required>
                                                        <option value="0">All Subcategories</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <select name="level" class="form-control" required>
                                                        <option value="Easy">Easy</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Language</label>
                                                    <select name="language" class="form-control" required>
                                                        <option value="English">English</option>
                                                        <option value="Filipino">Filipino</option>
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
                                                            <input type="file" name="banner" class="custom-file-input" id="banner" accept="image/*" required>
                                                            <label class="custom-file-label" for="banner">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ..." required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Requirements</label>
                                                    <textarea name="requirements" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Target Participant</label>
                                                    <textarea name="target_participant" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header"><strong> Steps, instruction and percentage </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="repeatable-instruction">
                                            <!-- Existing Rows -->
                                            <div class="row repeatable-row col-12">
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label>Steps</label>
                                                        <input type="text" class="form-control step" value="# 1" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Instructions</label>
                                                        <input type="text" name="instruction[]" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Section</label>
                                                        <select name="section[]" class="form-control" required="">
                                                            <option value="" selected="" disabled=""></option>
                                                            <option value="video">Video</option>
                                                            <option value="workshop">Workshop</option>
                                                            <option value="examination">Examination</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Percentage</label>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <input type="text" name="percentage[]" class="form-control" required="">
                                                            <button type="button" class="btn btn-danger btn-sm ml-2 delete-row" disabled>Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Add Step Button -->
                                        <div class="row" style="display: block; text-align: right; margin: 2px;">
                                            <div class="form-group">
                                                <a class="btn btn-sm btn-primary" id="additional-step" href="#">Add additional step</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong> Training Videos </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="repeatable-video">
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Training Workshop</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="repeatable-workshop">
                                     
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Training Examination</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="repeatable-examination">
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong> Training References and Example </strong>
                                    </div>
                                    <div class="card-body">
                                        <div  id="repeatable-reference">
                                            <div class="row repeatable-reference col-12">
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label>Ref. no.</label>
                                                        <input type="text" class="form-control" value="# 1" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Reference Title</label>
                                                        <input type="text" name="reference_title[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <label>Reference link</label>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <input type="url" name="reference_url[]" class="form-control">
                                                            <button type="button" class="btn btn-danger btn-sm ml-2 delete-reference" disabled>Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                        <button class="btn btn-sm btn-success">Submit Training</button>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
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
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?php echo base_url() . '/assets/template/dist' ?>/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . '/assets/template/dist' ?>/js/demo.js"></script>
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

            if ($kind === 'examination' || $kind === 'workshop') {
                const repeatableId = $kind === 'examination' ? "#repeatable-examination" : "#repeatable-workshop";
                const titleName = $kind === 'examination' ? "examination_title[]" : "workshop_title[]";
                const fileName = $kind === 'examination' ? "examination_file_" : "workshop_file_";
                const inputIdPrefix = $kind === 'examination' ? "examination" : "workshop";
                const linkName = $kind === 'examination' ? "google_docs_link_" : "google_docs_link_workshop_";

                while ($inputNumber < $actualNumber) {
                    $html = '<div class="repeatable">' +
                        '<div class="col-sm-1">' +
                        '<div class="form-group">' +
                        '<input type="text" class="form-control" name="" value="# ' + parseInt($inputNumber + 1) + '" disabled="">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-6">' +
                        '<div class="form-group">' +
                        '<input required type="text" name="' + titleName + '" class="form-control" placeholder="Title">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-5">' +
                        '<div class="form-group">' +
                        '<div class="input-group">' +
                        '<div class="custom-file">' +
                        '<input type="file" accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.txt,.pdf" name="' + fileName + parseInt($inputNumber + 1) + '" class="custom-file-input" id="' + inputIdPrefix + parseInt($inputNumber + 1) + '">' +
                        '<label class="custom-file-label" for="' + inputIdPrefix + parseInt($inputNumber + 1) + '">Choose file</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group mt-2">' +
                        '<label for="googleDocsLink' + parseInt($inputNumber + 1) + '">OR provide Google Docs link</label>' +
                        '<input type="url" name="' + linkName + parseInt($inputNumber + 1) + '" class="form-control" id="googleDocsLink' + parseInt($inputNumber + 1) + '" placeholder="https://docs.google.com/...">' +
                        '</div>' +
                        '<div class="form-check">' +
                        '<input class="form-check-input" type="checkbox" id="optionalCheck' + parseInt($inputNumber + 1) + '" onchange="toggleRequired(this, \'' + inputIdPrefix + parseInt($inputNumber + 1) + '\', \'' + 'googleDocsLink' + parseInt($inputNumber + 1) + '\')">' +
                        '<label class="form-check-label" for="optionalCheck' + parseInt($inputNumber + 1) + '">Check if you are providing only one (file or link)</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $(repeatableId).append($html);
                    $inputNumber++;
                }
                while ($inputNumber > $actualNumber) {
                    $(repeatableId + " .repeatable").last().remove();
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

        function toggleRequired(checkbox, fileId, linkId) {
            const fileInput = document.getElementById(fileId);
            const linkInput = document.getElementById(linkId);

            if (checkbox.checked) {
                fileInput.removeAttribute('required');
                linkInput.removeAttribute('required');
            } else {
                fileInput.setAttribute('required', 'required');
                linkInput.setAttribute('required', 'required');
            }
        }

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
