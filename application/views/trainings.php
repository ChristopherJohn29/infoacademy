<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trainings</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>bootstrap4/bootstrap.min.css">
    <link href="<?php echo base_url() . '/assets/unicat/plugins/' ?>font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() . '/assets/unicat/plugins/' ?>colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/plugins/' ?>OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/plugins/' ?>OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/plugins/' ?>OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>courses.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>courses_responsive.css">
</head>
<body>
<div class="super_container">
    <!-- Header -->
    <?php $this->load->view('header'); ?>
    <!-- Home -->
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Trainings</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trainings -->
    <div class="courses">
        <div class="container">
            <div class="row">
                <!-- Trainings Main Content -->
                <div class="col-lg-8">
                    <div class="courses_search_container">
                        <form action="<?= base_url('control/trainings') ?>" method="post" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
                            <input type="search" class="courses_search_input" name="search" placeholder="Search Trainings">
                            
                            <select id="courses_search_select" name="category" class="courses_search_select courses_search_input" style="margin-right:19px;">
                                <option value="0">All Categories</option>
                                <?php
                                    $categories = $this->System_model->fetchAllCategories();
                                    foreach ($categories as $category) { ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                                <?php } ?>
                            </select>

                            <select id="courses_search_subcategory" name="subcategory" class="courses_search_select courses_search_input" disabled>
                                <option value="0">Select Subcategory</option>
                            </select>

                            <button type="submit" class="courses_search_button ml-auto">Search Now</button>
                        </form>
                    </div>
                    <div class="courses_container">
                        <div class="row courses_row">
                            <!-- Course -->
                            <!-- Course -->
                            <?php
                            
                            foreach ($trainings as $training) {
                                $banner = $training['banner'] ? $training['banner'] : 'not_found.jpg';
                                $trainer = $this->System_model->fetchTrainer($training['author_id']);
                                ?>
                                <div class="col-lg-6 course_col">
                                    <div class="course">
                                        <div class="course_image">
                                            <a href="<?= base_url() . '/control/detailsPage/?tid=' . $training['id'] ?>">
                                                <img src="<?= base_url() . '/uploads/image_trans.png'; ?>" style="background-image: url('<?= base_url() . '/uploads/' . $banner ?>'); background-size: contain; background-position: center;" alt="">
                                            </a>
                                        </div>
                                        <div class="course_body" style="min-height:150px;">
                                            <h3 class="course_title">
                                                <a href="<?= base_url() . '/control/detailsPage/?tid=' . $training['id'] ?>"><?= $training['training_title'] ?></a>
                                            </h3>
                           
                                        </div>
                                        <div class="course_footer">
                                            <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                  
                                                <div class="course_price ml-auto">₱<?=number_format($training['training_fee'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }

                            ?>

                            <?php
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Trainings Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Categories -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Categories</div>
                            <div class="sidebar_categories">
                              
                                <ul>
                                    <li><a href="<?=base_url("control/trainings/")?>">All</a></li>
                                    <?php
                                    $categories = $this->System_model->fetchAllCategories();

                                    foreach ($categories as $category) { ?>
                                        <li><a href="<?=base_url("control/trainings/?c=").$category['id']?>"><?= $category['category_name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Latest Course -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Latest Trainings</div>
                            <div class="sidebar_latest">
                                <!-- Latest Course -->
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image">
                                        <div>
                                            <img src="<?php echo base_url() . '/assets/unicat/images' ?>/latest_1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="latest_content">
                                        <div class="latest_title">
                                            <a href="course.html">How to Design a Logo a Beginners Course</a></div>
                                        <div class="latest_price">Free</div>
                                    </div>
                                </div>
                                <!-- Latest Course -->
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image">
                                        <div>
                                            <img src="<?php echo base_url() . '/assets/unicat/images' ?>/latest_2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="latest_content">
                                        <div class="latest_title">
                                            <a href="course.html">Photography for Beginners Masterclass</a></div>
                                        <div class="latest_price">₱170</div>
                                    </div>
                                </div>
                                <!-- Latest Course -->
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image">
                                        <div>
                                            <img src="<?php echo base_url() . '/assets/unicat/images' ?>/latest_3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="latest_content">
                                        <div class="latest_title"><a href="course.html">The Secrets of Body Language</a>
                                        </div>
                                        <div class="latest_price">₱220</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Gallery -->
                        <!-- Tags -->
                        <!-- Banner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter -->

    <!-- Footer -->
    <?php $this->load->view('footer'); ?>
</div>
<script src="<?php echo base_url() . '/assets/unicat/styles/' ?>bootstrap4/popper.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/styles/' ?>bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>easing/easing.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/js/' ?>courses.js"></script>
<script>
    $(document).ready(function () {
        // Listen for category change
        $('#courses_search_select').on('change', function () {
            var categoryId = $(this).val();
            
            // Reset subcategory dropdown
            $('#courses_search_subcategory').html('<option value="0">Select Subcategory</option>').prop('disabled', true);
            
            // If a category is selected, fetch the subcategories
            if (categoryId != '0') {
                $.ajax({
                    url: '<?= base_url("control/getSubCategories") ?>', // URL to your controller method
                    method: 'POST',
                    data: { category_id: categoryId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            var subcategoryOptions = '<option value="0">Select Subcategory</option>';
                            $.each(response.subcategories, function (index, subcategory) {
                                subcategoryOptions += '<option value="' + subcategory.id + '">' + subcategory.name + '</option>';
                            });
                            $('#courses_search_subcategory').html(subcategoryOptions).prop('disabled', false);
                        } else {
                            alert('No subcategories found.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while fetching subcategories.');
                    }
                });
            }
        });
    });


</script>
</body>
</html>
