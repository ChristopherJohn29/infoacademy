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
            max-width: 75%;
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

            <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="messageModalLabel">Message Trainer</h5>
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


                        $option .= '<a style="margin-left: 2px" data-toggle="tooltip" data-placement="top" title="Message trainer" class="btn btn-default btn-sm" href="javascript:void(0)" onclick="openMessageModal(' . $training[0]['author_id'] . ', ' . $value['training_id'] . ')"> <i class="fa fa-comment" aria-hidden="true"></i></a>';
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

    function openMessageModal(trainerId, trainingId) {
        $.ajax({
            url: '<?= base_url('control/checkEnrollment') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                participant_id: <?= $_SESSION['id'] ?>, 
                training_id: trainingId
            },
            success: function(response) {
                if (response.enrolled) {
                    $('#messageModal').modal('show');
                    $('#messageModal').data('trainerId', trainerId);
                    $('#messageModal').data('trainingId', trainingId);
                    fetchMessages(trainingId);  // Fetch messages for the training
                } else {
                    alert('You must be enrolled in the training to message the trainer.');
                }
            },
            error: function() {
                alert('Error checking enrollment.');
            }
        });
    }

    function fetchMessages(trainingId) {
        $.ajax({
            url: '<?= base_url('control/fetchMessages') ?>',
            type: 'POST',
            dataType: 'json',
            data: { training_id: trainingId },
            success: function(response) {
                const messages = response.messages;
                let messageHtml = '';

                // Loop through each message and create HTML content
                messages.forEach(function(message) {
                    const sender = message.sender_id == <?= $_SESSION['id'] ?> ? 'You' : 'Trainer';
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

                // Update the message container with the new messages
                $('#messageContainer').html(messageHtml);

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


    // Format timestamp to "X minutes ago"
    function formatTimestamp(timestamp) {
        const diff = Math.floor((new Date() - new Date(timestamp)) / 1000);
        const minutes = Math.floor(diff / 60);
        const hours = Math.floor(diff / 3600);
        const days = Math.floor(diff / 86400);

        if (days > 0) return days + " day(s) ago";
        if (hours > 0) return hours + " hour(s) ago";
        return minutes + " minute(s) ago";
    }


    function sendMessage() {
        const messageContent = $('#messageContent').val();
        const trainerId = $('#messageModal').data('trainerId');
        const trainingId = $('#messageModal').data('trainingId');
        const participantId = <?= $_SESSION["id"] ?>;

        if (messageContent.trim() === '') {
            alert('Please type a message.');
            return;
        }

        $.ajax({
            url: '<?= base_url('control/send') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                sender_id: participantId,
                receiver_id: trainerId,
                message: messageContent,
                training_id: trainingId
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
                alert('Error sending message');
            }
        });
    }


</script>
</body>
</html>
