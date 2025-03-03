<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trainer | My Profile</title>
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

<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('trainer/mainheader')?>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark">My Profile</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <!-- Update Profile Button -->
                <!-- Update Profile Button -->
                <div class="row" style="display:block; text-align: right; margin:2px;">
                    <a class="btn btn-success btn-sm col-sm-2" href="#" style="margin:10px; margin-left:0px;" data-toggle="modal" data-target="#updateProfileModal">Update Profile</a>
                </div>

                <!-- Modal for Updating Profile -->
                <div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document"> <!-- Added modal-lg class here -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- User Information Form -->
                                <form id="updateProfileForm">
                                    <div class="form-group">
                                        <label for="profilePhoto">Profile Photo</label>
                                        <input type="file" class="form-control-file" id="profilePhoto" name="photo">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="first_name" value="<?= $user['first_name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" class="form-control" id="middleName" name="middle_name" value="<?= $user['middle_name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="last_name" value="<?= $user['last_name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="street_number">Street Number</label>
                                        <input type="text" class="form-control" id="street_number" name="street_number" value="<?= $user['street_number'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="street_name">Street Name</label>
                                        <input type="text" class="form-control" id="street_name" name="street_name" value="<?= $user['street_name'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="barangay">Barangay</label>
                                        <input type="text" class="form-control" id="barangay" name="barangay" value="<?= $user['barangay'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="<?= $user['city'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="region">Region</label>
                                        <input type="text" class="form-control" id="region" name="region" value="<?= $user['region'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="zip_code">Zip Code</label>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?= $user['zip_code'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email_address" value="<?= $user['email_address'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile_number" value="<?= $user['mobile_number'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sex">Sex</label>
                                        <select class="form-control" id="sex" name="sex">
                                            <option value="Male" <?= $user['sex'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                            <option value="Female" <?= $user['sex'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                            <option value="Other" <?= $user['sex'] == 'Other' ? 'selected' : '' ?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="maritalStatus">Marital Status</label>
                                        <select class="form-control" id="maritalStatus" name="marital_status">
                                            <option value="Single" <?= $user['marital_status'] == 'Single' ? 'selected' : '' ?>>Single</option>
                                            <option value="Married" <?= $user['marital_status'] == 'Married' ? 'selected' : '' ?>>Married</option>
                                            <option value="Divorced" <?= $user['marital_status'] == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position" name="position" value="<?= $trainer['position'] ?>" required>
                                    </div>
                                    <!-- Trainer Profile Form -->
                                    <div class="form-group">
                                        <label for="keyCompetencies">Key Competencies</label>
                                        <textarea class="form-control" id="keyCompetencies" name="key_competencies" rows="3"><?= $trainer['key_competencies'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="educationalBackground">Educational Background</label>
                                        <textarea class="form-control" id="educationalBackground" name="educational_background" rows="3"><?= $trainer['educational_background'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="employmentHistory">Employment History</label>
                                        <textarea class="form-control" id="employmentHistory" name="employment_history" rows="3"><?= $trainer['employment_history'] ?></textarea>
                                    </div>
                                
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" form="updateProfileForm" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- User Info -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Personal Information</h3>
                    </div>
                    <div class="card-body">

                        <img src="<?= $photo ?>" alt="Profile Photo" class="img-thumbnail float-right" width="150">
                        <p><strong>Name:</strong> <?= $user['first_name'] . ' ' . $user['middle_name'] . ' ' . $user['last_name'] ?></p>
                        <p><strong>Address:</strong> <?= $user['street_number'] . ' ' . $user['street_name'] . ', ' . $user['barangay'] . ', ' . $user['city'] . ', ' . $user['region'] . ', ' . $user['zip_code'] ?></p>
                        <p><strong>Email:</strong> <?= $user['email_address'] ?></p>
                        <p><strong>Mobile:</strong> <?= $user['mobile_number'] ?></p>
                        <p><strong>Sex:</strong> <?= $user['sex'] ?></p>
                        <p><strong>Marital Status:</strong> <?= $user['marital_status'] ?></p>
                    </div>
                </div>

                <!-- Trainer Profile -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Trainer Profile</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($trainer)): ?>
                            <p><strong>Position:</strong><br> <?= nl2br($trainer['position']) ?></p>
                            <p><strong>Educational Background:</strong><br> <?= nl2br($trainer['educational_background']) ?></p>
                            <p><strong>Key Competencies:</strong> <br><?= nl2br($trainer['key_competencies']) ?></p>
                            <p><strong>Employment History:</strong> <br><?= nl2br($trainer['employment_history']) ?></p>
                        
                        <?php else: ?>
                            
                            <p>No trainer profile information available yet.</p>
                            <!-- Placeholder for profile photo -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
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
<script src="<?php echo base_url() . '/assets/template/dist' ?>/js/notification.js"></script>
<script>
$(document).ready(function() {
    // Handle form submission
    $('#updateProfileForm').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: '<?= base_url('trainer/update_profile') ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert(data.message);
                    // Close the modal
                    $('#updateProfileModal').modal('hide');
                    // Optionally, you can reload the page to reflect the changes
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            },
            error: function() {
                alert('There was an error processing your request.');
            }
        });
    });
});


</script>
</body>
</html>
