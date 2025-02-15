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

                /* General modal body styling */
                .modal-body {
            background-color: #fafafa; /* Light background for better contrast */
            padding: 20px;
        }

        /* Message container styling */
        .message-container {
            max-height: 400px;
            overflow-y: auto;
            padding: 15px;
            background-color: #f9f9f9; /* Light grey background */
            border-radius: 10px;
            border: 1px solid #ddd; /* Subtle border for separation */
            margin-bottom: 15px;
        }

        /* Individual message bubble styling */
        .message {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 15px;
            word-wrap: break-word;
        }

        /* Sent message bubble styling */
        .message-sent {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
            border-top-right-radius: 0;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.2);
        }

        /* Received message bubble styling */
        .message-received {
            background-color: #e9ecef;
            color: #495057;
            align-self: flex-start;
            border-top-left-radius: 0;
            box-shadow: 0 2px 8px rgba(233, 236, 239, 0.6);
        }

        /* Message header styling (sender name and timestamp) */
        .message-header {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        /* Timestamp text styling */
        .message small.text-muted {
            font-size: 12px;
            font-weight: normal;
            color: darkslategray;
        }

        /* Message body text */
        .message-body {
            font-size: 16px;
            line-height: 1.4;
        }

        /* Input area styling for typing messages */
        textarea#messageContent {
            resize: none;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            padding: 10px;
            background-color: #fff;
            width: 100%;
            margin-top: 10px;
        }

        /* Footer button styling */
        .modal-footer .btn {
            font-size: 14px;
            padding: 8px 15px;
        }

        /* Close button in modal header */
        .close {
            font-size: 1.5rem;
            color: #aaa;
        }
        .close:hover {
            color: #000;
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
    <?php $this->load->view('trainer/mainheader')?>
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

    
        <!-- Modal for sending message -->
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messageModalLabel">Message Participant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="messageContainer" class="message-container">
                            <!-- Messages will be dynamically loaded here -->
                        </div>
                        <textarea id="messageContent" class="form-control" rows="4" placeholder="Type your message here..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="sendMessage()">Send</button>
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

        <!-- For Checking Workshop Modal -->
        <div class="modal fade" id="forCheckingWorkshopModal" tabindex="-1" role="dialog" aria-labelledby="forCheckingWorkshopModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="forCheckingWorkshopModalLabel">For Checking Workshop Files</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="workshopFilesContainerForChecking">
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
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($training_class as $class): ?>
                                            <tr>
                                                <td><?php echo html_escape($class['first_name']) . ' ' . html_escape($class['last_name']); ?></td>
                                                <td><?php echo html_escape($class['participant_id']); ?></td>
                                                <td><?php echo html_escape($class['date_enrolled']); ?></td>
                                                <td><?php echo html_escape($class['status']); ?></td>
                                                <td>
                                                    <?php 
                                                    if ($class['workshop_status'] == 'completed') {
                                                        echo '<button class="btn btn-sm btn-info" onclick="openForCheckingWorkshopModal(' . $class['participant_id'] . ', ' . $class['training_id'] . ')">Completed</button>';
                                                    } elseif ($class['workshop_status'] == 'for checking') {
                                                        echo '<button class="btn btn-sm btn-warning" onclick="openForCheckingWorkshopModal(' . $class['participant_id'] . ', ' . $class['training_id'] . ')">For Checking</button>';
                                                    } else {
                                                        echo '<button class="btn btn-sm btn-default" onclick="openForCheckingWorkshopModal(' . $class['participant_id'] . ', ' . $class['training_id'] . ')">No New file to check</button>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    if ($class['exam_status'] == 'completed') {
                                                        echo '<button class="btn btn-sm btn-info" onclick="openForCheckingExamModal(' . $class['participant_id'] . ', ' . $class['training_id'] . ')">Completed</button>';
                                                    } elseif ($class['exam_status'] == 'for checking') {
                                                        echo '<button class="btn btn-sm btn-warning" onclick="openForCheckingExamModal(' . $class['participant_id'] . ', ' . $class['training_id'] . ')">For Checking</button>';
                                                    } else {
                                                        echo '<button class="btn btn-sm btn-default" onclick="openForCheckingExamModal(' . $class['participant_id'] . ', ' . $class['training_id'] . ')">No New file to check</button>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo html_escape($class['date_completed']); ?></td>
                                                <td>
                                                    <?php if ($class['is_complete'] == 1): ?>
                                                        <!-- View Certificate Button with Icon -->
                                                        <button class="btn btn-sm btn-primary" onclick="viewCertificate(<?php echo $class['participant_id']; ?>, <?php echo $class['training_id']; ?>, <?php echo $class['author_id']; ?>)">
                                                            <i class="fa fa-certificate" aria-hidden="true"></i> <!-- Font Awesome Certificate Icon -->
                                                        </button>
                                                    <?php endif; ?>
                                                    
                                                    <!-- Message Button with Icon -->
                                                    <button class="btn btn-sm btn-success message-btn" 
                                                            data-training-id="<?php echo $class['training_id']; ?>" 
                                                            data-participant-id="<?php echo $class['participant_id']; ?>" 
                                                            data-toggle="modal" 
                                                            data-target="#messageModal">
                                                        <i class="fa fa-comment" aria-hidden="true"></i> <!-- Font Awesome Comment Icon -->
                                                    </button>
                                                </td>

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
                        if (exam.status == "2" || exam.status == "1" || exam.status == "3") {
                            if (exam.examination_file === "Google Form Submitted") {
                                tableHtml += '<td>' + exam.file_desc + ' (Google Form Submitted)' + '</td>';
                                tableHtml += '<td>' + exam.date_submitted + '</td>';
                            } else {
                                tableHtml += '<td><a href="' + '<?php echo base_url("uploads/"); ?>' + exam.examination_file + '" target="_blank">' + exam.file_desc + '</a></td>';
                                tableHtml += '<td>' + exam.date_submitted + '</td>';
                            }
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


    function openForCheckingWorkshopModal(participant_id, training_id) {
        // Fetch for checking workshop data via AJAX
        $.ajax({
            url: '<?php echo base_url("trainer/fetchWorkshopData"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                training_id: training_id,
                participant_id: participant_id
            },
            success: function(response) {
                if (response.success) {
                    var workshopData = response.data;
                    // Clear previous workshop data
                    $('#workshopFilesContainerForChecking').html('');
                    
                    // Create a table structure for displaying workshop data
                    var tableHtml = '<table class="table table-striped"><thead><tr><th>Workshop File</th><th>Date Submitted</th><th>Status</th><th>Actions</th><th>Remarks</th></tr></thead><tbody>';
                    
                    workshopData.forEach(function(workshop) {
                        tableHtml += '<tr data-workshop-id="' + workshop.id + '" data-participant-id="' + participant_id + '" data-training-id="' + training_id + '">';

                        // Workshop File
                        if (workshop.status == "2" || workshop.status == "1" || workshop.status == "3") {
                            if (workshop.workshopination_file === "Google Form Submitted") {
                                tableHtml += '<td>' + workshop.file_desc + ' (Google Form Submitted)' + '</td>';
                                tableHtml += '<td>' + workshop.date_submitted + '</td>';
                            } else {
                                tableHtml += '<td><a href="' + '<?php echo base_url("uploads/"); ?>' + workshop.workshopination_file + '" target="_blank">' + workshop.file_desc + '</a></td>';
                                tableHtml += '<td>' + workshop.date_submitted + '</td>';
                            }
                        }

                        // Status
                        var statusText = '';
                        var badgeClass = '';

                        if (workshop.status == "2") {
                            statusText = 'For Checking';
                            badgeClass = 'warning';
                        } else if (workshop.status == "3") {
                            statusText = 'Declined';
                            badgeClass = 'danger';  // Declined workshops will have a red badge
                        } else {
                            statusText = 'Completed';
                            badgeClass = 'success';  // Completed workshops will have a green badge
                        }

                        tableHtml += '<td><span class="badge badge-' + badgeClass + '">' + statusText + '</span></td>';


                        // Action Buttons (Accept and Decline)
                        if (workshop.status == "2") {
                            tableHtml += '<td>';
                            tableHtml += '<button class="btn btn-sm btn-success mr-2" onclick="handleAcceptDeclineWorkshop(' + workshop.id + ', \'accept\', ' + participant_id + ', ' + training_id + ')">Accept</button>';
                            tableHtml += '<button class="btn btn-sm btn-danger" onclick="handleAcceptDeclineWorkshop(' + workshop.id + ', \'decline\', ' + participant_id + ', ' + training_id + ')">Decline</button>';
                            tableHtml += '</td>';
                        } else {
                            tableHtml += '<td>-</td>'; // No actions for completed workshops
                        }

                        // Remarks (textarea for pending workshops)
                        if (workshop.status == "2") {
                            tableHtml += '<td><textarea class="form-control remarks" data-workshop-id="' + workshop.id + '" placeholder="Enter remarks"></textarea></td>';
                        } else {
                            tableHtml += '<td>' + workshop.remarks + '</td>'; // No remarks field for completed workshops
                        }

                        tableHtml += '</tr>';
                    });

                    tableHtml += '</tbody></table>';
                    
                    // Append the generated table to the container
                    $('#workshopFilesContainerForChecking').html(tableHtml);

                    // Open the modal
                    $('#forCheckingWorkshopModal').modal('show');
                } else {
                    $('#workshopFilesContainerForChecking').html('<p>No data found</p>');
                    $('#forCheckingWorkshopModal').modal('show');
                }
            },
            error: function(xhr, status, error) {
                $('#workshopFilesContainerForChecking').html('<p>An error occurred</p>');
            }
        });
    }

    // Handle Accept/Decline actions
    function handleAcceptDeclineWorkshop(workshopId, action, participant_id, training_id) {
        var remarks = $('textarea[data-workshop-id="' + workshopId + '"]').val();

        $.ajax({
            url: '<?php echo base_url("trainer/updateWorkshopStatus"); ?>', // Update this URL with your controller method
            type: 'POST',
            dataType: 'json',
            data: {
                workshop_id: workshopId,
                action: action,
                remarks: remarks,
                participant_id: participant_id, // Pass participant_id
                training_id: training_id        // Pass training_id
            },
            success: function(response) {
                if (response.success) {
                    // Update the status in the table (for workshopple)
                    var row = $('tr[data-workshop-id="' + workshopId + '"]');
                    if (action == "accept") {
                        row.find('td:nth-child(3) span').text('Completed').removeClass('badge-warning').addClass('badge-success');
                        row.find('td:nth-child(4)').html('-'); // No actions for completed workshops
                        row.find('td:nth-child(5)').html(remarks); // No remarks field for completed workshops
                    } else if (action == "decline") {
                        row.find('td:nth-child(3) span').text('Declined').removeClass('badge-warning').addClass('badge-danger');
                        row.find('td:nth-child(4)').html('-'); // No actions for declined workshops
                        row.find('td:nth-child(5)').html(remarks); // No remarks field for declined workshops
                    }

                    // Optional: you can also reset the textarea for remarks
                    $('textarea[data-workshop-id="' + workshopId + '"]').val('');
                } else {
                    alert('Error updating status');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred');
            }
        });
    }

    function viewCertificate(participantId, trainingId, authorId) {
        // Open the certificate view page in a new tab
        window.open('/control/view_certificate/' + participantId + '/' + trainingId + '/' + authorId, '_blank');
    }

</script>

<script>
    // Open the modal and load messages when the "Message" button is clicked
    $('.message-btn').on('click', function() {
        var trainingId = $(this).data('training-id');
        var participantId = $(this).data('participant-id');
        
        // Store the training ID and participant ID in the modal for later use
        $('#messageModal').data('training-id', trainingId);
        $('#messageModal').data('participant-id', participantId);

        // Fetch messages for this training and participant
        fetchMessages(trainingId, participantId);
    });

    // Function to fetch messages based on training ID and participant ID
    function fetchMessages(trainingId, participantId) {
        $.ajax({
            url: '<?= base_url('control/fetchMessages') ?>',
            type: 'POST',
            dataType: 'json',
            data: { 
                training_id: trainingId, 
                participant_id: participantId 
            },
            success: function(response) {
                const messages = response.messages;
                let messageHtml = '';

                messages.forEach(function(message) {
                    const sender = message.sender_id == <?= $_SESSION['id'] ?> ? 'You' : 'Participant';
                    const senderClass = message.sender_id == <?= $_SESSION['id'] ?> ? 'message-sent' : 'message-received';

                    messageHtml += `
                        <div class="message ${senderClass}">
                            <div class="message-header">
                                <strong>${sender}</strong>
                                <small class="text-muted">${formatTimestamp(message.timestamp)}</small>
                            </div>
                            <div class="message-body">${message.message}</div>
                        </div>
                    `;
                });

                $('#messageContainer').html(messageHtml);
                // Auto-scroll to the bottom
                setTimeout(function() {
                var messageContainer = $('#messageContainer')[0];
                messageContainer.scrollTop = messageContainer.scrollHeight;  // Scroll to the bottom
                }, 500);
            },
            error: function() {
                alert('Error fetching messages.');
            }
        });
    }

    // Function to format timestamp (same as before)
    function formatTimestamp(timestamp) {
        const diff = Math.floor((new Date() - new Date(timestamp)) / 1000);
        const minutes = Math.floor(diff / 60);
        const hours = Math.floor(diff / 3600);
        const days = Math.floor(diff / 86400);

        if (days > 0) return days + " day(s) ago";
        if (hours > 0) return hours + " hour(s) ago";
        return minutes + " minute(s) ago";
    }

    // Function to send a new message
    function sendMessage() {
        const trainingId = $('#messageModal').data('training-id');  // Get the training ID
        const participantId = $('#messageModal').data('participant-id');  // Get the participant ID (receiver)
        const message = $('#messageContent').val().trim();  // Get the message content
        const senderId = <?= $_SESSION['id'] ?>;  // Get the sender ID (trainer ID)

        if (!message) {
            alert('Please enter a message!');
            return;
        }

        $.ajax({
            url: '<?= base_url('control/send') ?>',  // Updated to use the 'send' method in the controller
            type: 'POST',
            dataType: 'json',
            data: { 
                sender_id: senderId, 
                receiver_id: participantId,  // Participant is the receiver
                message: message, 
                training_id: trainingId
            },
            success: function(response) {
                if (response.status === 'success') {
                    $('#messageContent').val('');  // Clear the message input
                    fetchMessages(trainingId, participantId);  // Refresh the messages
                } else {
                    alert('Error sending message.');
                }
            },
            error: function() {
                alert('Error sending message.');
            }
        });
    }

</script>
</body>
</html>
