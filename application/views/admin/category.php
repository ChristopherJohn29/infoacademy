<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InfoAcademy | Category</title>
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
            color: white;
        }

        .navbar-expand .navbar-nav {
            min-height: 55px;
        }

        .nav-link p {
            color:white;
            font-weight:bold;
        }

        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active{
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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
       <section class="content">

            <!-- Add Category Modal -->
            <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addCategoryForm" data-url="<?=base_url()?>/admin/submitCategory">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="editCategoryForm" data-url="<?= base_url('admin/updateCategory') ?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="category_id" id="editCategoryId">
                                <div class="form-group">
                                    <label for="editCategoryName">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="editCategoryName" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Default box -->

            <div class="row mb-2">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-small btn-success" data-toggle="modal" data-target="#addCategoryModal">
                        Add Category
                    </button>
                </div>
            </div>

            <div class="card">

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $categories = $this->System_model->fetchAllCategories();

                        foreach ($categories as $category) { ?>
                            <tr>
                                <td><?= $category['category_name'] ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCategoryModal" 
                                            data-id="<?= $category['id'] ?>" data-name="<?= $category['category_name'] ?>">
                                        Edit
                                    </button>

                                    <!-- Delete Button -->
                                    <button class="btn btn-sm btn-danger delete-category" 
                                            data-id="<?= $category['id'] ?>">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#addCategoryForm').on('submit', function (e) {
            e.preventDefault(); // Prevent form from submitting normally

            // Get the category name
            var categoryName = $('#categoryName').val();
            var url = $('#addCategoryForm').data('url'); // Ensure this is set to the controller's URL

            // Perform your AJAX call
            $.ajax({
                url: url,
                method: 'POST',
                data: { categoryName: categoryName },
                dataType: 'json', // Expecting JSON response from the server
                success: function (response) {
                    if (response.status === 'success') {
                        // Show success message
                        alert(response.message);

                        location.reload();
                    } else if (response.status === 'error') {
                        // Show error message
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle unexpected errors
                    console.error('AJAX Error:', status, error);
                    alert('An unexpected error occurred. Please try again later.');
                }
            });
        });
    });

    $(document).ready(function () {
        // Open Edit Modal and populate fields
        $('#editCategoryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var name = button.data('name');

            $('#editCategoryId').val(id);
            $('#editCategoryName').val(name);
        });

        // Handle Edit Form Submission
        $('#editCategoryForm').on('submit', function (e) {
            e.preventDefault();

            var url = $(this).data('url');
            var data = $(this).serialize();

            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('An error occurred while updating the category.');
                }
            });
        });

        // Handle Delete Action
        $('.delete-category').on('click', function () {
            if (confirm('Are you sure you want to delete this category?')) {
                var id = $(this).data('id');
                var url = '<?= base_url("admin/deleteCategory") ?>';

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('An error occurred while deleting the category.');
                    }
                });
            }
        });
    });


</script>

</body>
</html>
