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
    <?php $this->load->view('trainer/mainheader')?>
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

                <div class="row" style="display:block; text-align: right; margin:2px;">
                    <a class="btn btn-success btn-sm col-sm-2" href="<?php echo base_url() . '/trainer/createTraining' ?>" style="margin:10px; margin-left:0px;">Create Training</a>
                </div>

                <!-- Message Modal -->
                <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="messageModalLabel">Message Enrollees</h5>
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
                                                $col .= $trainer_col1[0]['first_name'] . ' ' . $trainer_col1[0]['last_name'];
                                            }

                                            if ($trainer_col2) {
                                                $col .= ', ' . $trainer_col2[0]['first_name'] . ' ' . $trainer_col2[0]['last_name'];
                                            }

                                            $enrollees_count = $this->System_model->fetchEnrollees($value['id']);
                                            $enrollees_completion = $this->System_model->fetchEnrolleesCompletion($value['id']);
                                            $status = $value['status'] == 1 ? 'Approved' : 'Pending';

                                            $html .= '<tr>
                                                <td>' . $value['training_title'] . '</td>
                                                <td>' . $trainer[0]['first_name'] . ' ' . $trainer[0]['last_name'] . '</td>
                                                <td>' . $col . '</td>
                                                <td>' . $value['required_no_of_hours'] . '</td>
                                                <td>' . $enrollees_count . '</td>
                                                <td>' . $enrollees_completion . '</td>
                                                <td>' . $status . '</td>
                                                <td class="option">
                                                    <a data-toggles="tooltip" data-placement="top" title="Update" class="btn btn-sm btn-default" href="' . base_url() . '/trainer/updateTraining/?id=' . $value['id'] . '"><i class="fa fa-sync" aria-hidden="true"></i></a>
                                                    <a style="margin-left: 2px" data-toggles="tooltip" data-placement="top" title="Go to Classroom" class="btn btn-default btn-sm" href="' . base_url() . '/trainer/classroom/?id=' . $value['id'] . '"> <i class="fa fa-university" aria-hidden="true"></i></a>
                                                    <button class="btn-sm btn btn-default add-collaborator-btn" data-toggle="modal" data-target="#modal-addcollaborator" data-toggles="tooltip" title="Add Collaborator" style="margin-left: 2px" data-id="' . $value['id'] . '"><i class="fa fa-user" aria-hidden="true"></i></button>
                                                    <!-- Add Message Button -->
                                                    <button class="btn-sm btn btn-default message-btn" data-toggle="modal" data-target="#messageModal" data-training-id="' . $value['id'] . '" data-toggles="tooltip" title="Message Enrollees"><i class="fa fa-comment" aria-hidden="true"></i></button>
                                                </td>
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

    $(document).ready(function() {
        // When the message button is clicked, pass the training ID to the modal
        $('.message-btn').on('click', function() {
            var trainingId = $(this).data('training-id');
            fetchMessages(trainingId);  // Call the function to fetch messages
        });

        // Function to fetch messages based on training ID
        function fetchMessages(trainingId) {
            $.ajax({
                url: '<?= base_url('control/fetchMessages') ?>',
                type: 'POST',
                dataType: 'json',
                data: { training_id: trainingId },
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
                    $('#messageContainer').scrollTop($('#messageContainer')[0].scrollHeight); // Scroll to the bottom
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
            const message = $('#messageContent').val().trim();
            
            if (!message) {
                alert('Please enter a message!');
                return;
            }

            $.ajax({
                url: '<?= base_url('control/sendMessage') ?>',
                type: 'POST',
                dataType: 'json',
                data: { 
                    training_id: trainingId, 
                    message: message 
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $('#messageContent').val('');  // Clear the message input
                        fetchMessages(trainingId);  // Refresh the messages
                    } else {
                        alert('Error sending message.');
                    }
                },
                error: function() {
                    alert('Error sending message.');
                }
            });
        }
    });

</script>
</body>
</html>
