<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trainer | Dashboard</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"
          href="<?php echo base_url() . '/assets/template/plugins' ?>/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
          href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
          href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
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
    </style>
    <!-- Google Font: Source Sans Pro -->
</head>
<body class="hold-transition layout-top-nav">
<!-- Modal -->
<div class="modal fade" id="modal-addcollaborator">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Collaborator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Collaborators</label>
                        <select class="select2" name="collaborator[]" multiple="multiple" data-placeholder="Select a trainer" style="width: 100%;">
                            <?php
                            $registered_trainer = $this->System_model->fetchTrainers();

                            foreach ($registered_trainer as $reg){
                                echo '<option value="'.$reg['id'].'">'.$reg['first_name'].' '.$reg['last_name'].'</option>';
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
            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <!-- Messages Dropdown Menu -->
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
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
                        <h1 class="m-0 text-dark"> Classroom</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                            <li class="breadcrumb-item active">Classroom</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->

        <div class="modal fade" id="completedExamModal" tabindex="-1" role="dialog" aria-labelledby="completedExamModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="completedExamModalLabel">Completed Examination</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Container to display multiple examination files -->
                        <div id="examFilesContainer"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


       <!-- For Checking Exam Modal -->
        <div class="modal fade" id="forCheckingExamModal" tabindex="-1" role="dialog" aria-labelledby="forCheckingExamModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="forCheckingExamModalLabel">For Checking Examination Files</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="examFilesContainerForChecking">
                            <!-- Dynamic content will be loaded here -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        
        <div class="content">
            <div class="container">
                <div class="row" style="display:block; text-align: right; margin:2px;">
                    <a class="btn btn-success btn-sm col-sm-2"
                       href="<?php echo base_url() . '/trainer/dashboard' ?>"
                       style="margin:10px; margin-left:0px;">Back</a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Participant</th>
                                            <th>Participant no.</th>
                                            <th>Date enrolled</th>
                                            <th>Status</th>
                                            <th>Output</th>
                                            <th>Exam</th>
                                            <th>Date Completed</th>
                                            <th>Question and answer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($training_class as $class): ?>
                                            <tr>
                                                <td><?php echo html_escape($class['first_name']) . ' ' . html_escape($class['last_name']); ?></td>
                                                <td><?php echo html_escape($class['participant_id']); ?></td> <!-- Replace with the correct field -->
                                                <td><?php echo html_escape($class['date_enrolled']); ?></td> <!-- Replace with the correct field -->
                                                <td><?php echo html_escape($class['status']); ?></td> <!-- Replace with the correct field -->
                                                <td><?php echo html_escape($class['workshop_status']); ?></td> <!-- Replace with the correct field -->
                                                <td>
                                                    <?php 
                                                    if ($class['exam_status'] == 'completed') {
                                                        echo '<button class="btn btn-sm btn-info" onclick="openForCheckingExamModal(' . $class['participant_id'] . ', ' . $class['training_id'] . ')">Completed</button>';
                                                    } elseif ($class['exam_status'] == 'for checking') {
                                                        echo '<button class="btn btn-sm btn-warning" onclick="openForCheckingExamModal(' . $class['participant_id'] . ', ' . $class['training_id'] . ')">For Checking</button>';
                                                    } else {
                                                        echo 'No New file to check';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo html_escape($class['date_completed']); ?></td> <!-- Replace with the correct field -->
                                                <td><?php echo html_escape($class['question_answer']); ?></td> <!-- Replace with the correct field -->
                                            </tr>
                                        <?php endforeach; ?>
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
        <div class="float-right d-none d-sm-inline">
        </div>
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

        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });



    function openForCheckingExamModal(participant_id, training_id) {
        // Fetch for checking exam data via AJAX
        $.ajax({
            url: '<?php echo base_url("trainer/fetchExamData"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                training_id: training_id,
                participant_id: participant_id
            },
            success: function(response) {
                if (response.success) {
                    var examData = response.data;
                    // Clear previous exam data
                    $('#examFilesContainerForChecking').html('');
                    
                    // Create a table structure for displaying exam data
                    var tableHtml = '<table class="table table-striped"><thead><tr><th>Examination File</th><th>Date Submitted</th><th>Status</th><th>Actions</th><th>Remarks</th></tr></thead><tbody>';
                    
                    examData.forEach(function(exam) {
                        tableHtml += '<tr data-exam-id="' + exam.id + '" data-participant-id="' + participant_id + '" data-training-id="' + training_id + '">';

                        // Examination File
                        if (exam.status == "2") {
                            tableHtml += '<td><a href="' + '<?php echo base_url("uploads/"); ?>' + exam.examination_file + '" target="_blank">' + exam.file_desc + '</a></td>';
                            tableHtml += '<td>' + exam.date_submitted + '</td>';
                        } else if (exam.status == "1") {
                            tableHtml += '<td><a href="' + '<?php echo base_url("uploads/"); ?>' + exam.examination_file + '" target="_blank">' + exam.file_desc + '</a></td>';
                            tableHtml += '<td>' + exam.date_submitted + '</td>';
                        } else if (exam.status == "3") {
                            tableHtml += '<td><a href="' + '<?php echo base_url("uploads/"); ?>' + exam.examination_file + '" target="_blank">' + exam.file_desc + '</a></td>';
                            tableHtml += '<td>' + exam.date_submitted + '</td>';
                        }

                        // Status
                        var statusText = '';
                        var badgeClass = '';

                        if (exam.status == "2") {
                            statusText = 'For Checking';
                            badgeClass = 'warning';
                        } else if (exam.status == "3") {
                            statusText = 'Declined';
                            badgeClass = 'danger';  // Declined exams will have a red badge
                        } else {
                            statusText = 'Completed';
                            badgeClass = 'success';  // Completed exams will have a green badge
                        }

                        tableHtml += '<td><span class="badge badge-' + badgeClass + '">' + statusText + '</span></td>';


                        // Action Buttons (Accept and Decline)
                        if (exam.status == "2") {
                            tableHtml += '<td>';
                            tableHtml += '<button class="btn btn-sm btn-success mr-2" onclick="handleAcceptDecline(' + exam.id + ', \'accept\', ' + participant_id + ', ' + training_id + ')">Accept</button>';
                            tableHtml += '<button class="btn btn-sm btn-danger" onclick="handleAcceptDecline(' + exam.id + ', \'decline\', ' + participant_id + ', ' + training_id + ')">Decline</button>';
                            tableHtml += '</td>';
                        } else {
                            tableHtml += '<td>-</td>'; // No actions for completed exams
                        }

                        // Remarks (textarea for pending exams)
                        if (exam.status == "2") {
                            tableHtml += '<td><textarea class="form-control remarks" data-exam-id="' + exam.id + '" placeholder="Enter remarks"></textarea></td>';
                        } else {
                            tableHtml += '<td>' + exam.remarks + '</td>'; // No remarks field for completed exams
                        }

                        tableHtml += '</tr>';
                    });

                    tableHtml += '</tbody></table>';
                    
                    // Append the generated table to the container
                    $('#examFilesContainerForChecking').html(tableHtml);

                    // Open the modal
                    $('#forCheckingExamModal').modal('show');
                } else {
                    $('#examFilesContainerForChecking').html('<p>No data found</p>');
                    $('#forCheckingExamModal').modal('show');
                }
            },
            error: function(xhr, status, error) {
                $('#examFilesContainerForChecking').html('<p>An error occurred</p>');
            }
        });
    }

    // Handle Accept/Decline actions
    function handleAcceptDecline(examId, action, participant_id, training_id) {
        var remarks = $('textarea[data-exam-id="' + examId + '"]').val();

        $.ajax({
            url: '<?php echo base_url("trainer/updateExamStatus"); ?>', // Update this URL with your controller method
            type: 'POST',
            dataType: 'json',
            data: {
                exam_id: examId,
                action: action,
                remarks: remarks,
                participant_id: participant_id, // Pass participant_id
                training_id: training_id        // Pass training_id
            },
            success: function(response) {
                if (response.success) {
                    // Update the status in the table (for example)
                    var row = $('tr[data-exam-id="' + examId + '"]');
                    if (action == "accept") {
                        row.find('td:nth-child(3) span').text('Completed').removeClass('badge-warning').addClass('badge-success');
                        row.find('td:nth-child(4)').html('-'); // No actions for completed exams
                        row.find('td:nth-child(5)').html(remarks); // No remarks field for completed exams
                    } else if (action == "decline") {
                        row.find('td:nth-child(3) span').text('Declined').removeClass('badge-warning').addClass('badge-danger');
                        row.find('td:nth-child(4)').html('-'); // No actions for declined exams
                        row.find('td:nth-child(5)').html(remarks); // No remarks field for declined exams
                    }

                    // Optional: you can also reset the textarea for remarks
                    $('textarea[data-exam-id="' + examId + '"]').val('');
                } else {
                    alert('Error updating status');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred');
            }
        });
    }



</script>
</body>
</html>
