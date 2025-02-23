<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InfoAcademy | Payments</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>main_styles.css">
    <link rel="stylesheet" href="<?= base_url() . '/assets/template' ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() . '/assets/template' ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/template/plugins' ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .logo_container {
            text-align: center;
        }

        .logo_text {
            font-size: 25px;
            padding-top: 20px;
        }

        .navbar-expand .navbar-nav {
            min-height: 55px;
        }

 


    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('admin/header') ?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light elevation-4">
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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Payments</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Participant Number</th>
                                <th>Name</th>
                                <th>Training Enrolled</th>
                                <th>Date Enrolled</th>
                                <th>Payment Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($training_class as $class): ?>
                                <tr>
                                    <td><?= $class['participant_id'] ?></td>
                                    <td><?= $class['participant_name'] ?> </td>
                                    <td><?= $class['training_title'] ?> </td>
                                    <td><?= (new DateTime($class['date_enrolled']))->format('F j, Y g:iA') ?> </td>
                                    <td><?= $class['status'] ?></td>
                                    <td>

                                        <button 
                                            type="button" 
                                            class="btn btn-primary btn-sm" 
                                            data-toggle="modal" 
                                            data-target="#paymentModal"
                                            data-id="<?= $class['id'] ?>"
                                            data-name="<?= $class['participant_name'] ?>"
                                            data-number="<?= $class['participant_id'] ?>"
                                            data-enrolled="<?= (new DateTime($class['date_enrolled']))->format('F j, Y g:iA') ?>"
                                            data-payment="<?= $class['payment_option'] ?>"
                                            data-transaction="<?= $class['transaction_no'] ?>"
                                            data-date="<?= (new DateTime($class['payment_date']))->format('F j, Y g:iA') ?>"
                                            data-proof="<?= base_url('uploads/'.$class['proof_of_payment']) ?>"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div 
                    class="modal fade" 
                    id="paymentModal" 
                    tabindex="-1" 
                    role="dialog" 
                    aria-labelledby="paymentModalLabel" 
                    aria-hidden="true"
                >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="paymentModalLabel">Payment Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Participant Name:</strong> <span id="modalName"></span></p>
                                <p><strong>Participant Number:</strong> <span id="modalNumber"></span></p>
                                <p><strong>Date Enrolled:</strong> <span id="modalEnrolled"></span></p>
                                <p><strong>Mode of Payment:</strong> <span id="modalPayment"></span></p>
                                <p><strong>Transaction Number:</strong> <span id="modalTransaction"></span></p>
                                <p><strong>Payment Date:</strong> <span id="modalDate"></span></p>
                                <p><strong>Proof of Payment:</strong> <a href="#" target="_blank" id="modalProof">View</a></p>
                                <div class="form-group mt-2">
                                    <label for="paymentStatus">Validate Payment:</label>
                                    <select id="paymentStatus" class="form-control">
                                        <option value="1">Validate</option>
                                        <option value="2">Decline</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" id="submitPayment">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- /.card-footer-->
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
<script src="<?= base_url() . '/assets/template' ?>/dist/js/notification.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    $(document).ready(function () {
        $('#paymentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            // Extract info from data-* attributes
            var id = button.data('id'); // Payment ID
            var name = button.data('name');
            var number = button.data('number');
            var enrolled = button.data('enrolled');
            var payment = button.data('payment');
            var transaction = button.data('transaction');
            var date = button.data('date');
            var proof = button.data('proof');

            // Update modal content
            var modal = $(this);
            modal.find('#modalName').text(name);
            modal.find('#modalNumber').text(number);
            modal.find('#modalEnrolled').text(enrolled);
            modal.find('#modalPayment').text(payment);
            modal.find('#modalTransaction').text(transaction);
            modal.find('#modalDate').text(date);
            modal.find('#modalProof').attr('href', proof);

            // Attach the payment ID to the submit button as a data attribute
            modal.find('#submitPayment').data('id', id);
        });

        // Handle the submission
        $('#submitPayment').on('click', function () {
            var payment_id = $(this).data('id'); // Retrieve the payment ID
            var status = $('#paymentStatus').val(); // Get the selected status

            if (!status) {
                alert('Please select a status.');
                return;
            }

            // AJAX request to submit payment status
            $.ajax({
                url: '<?= base_url('admin/submit_payment') ?>', // Replace 'controller' with your actual controller name
                type: 'POST',
                data: {
                    payment_id: payment_id,
                    status: status
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        alert(response.message);
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('An error occurred while updating payment status.');
                }
            });
        });
    });

</script>

</body>
</html>
