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
                        <form action="#" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
                            <input type="search" class="courses_search_input" placeholder="Search Trainings" required="required">
                            <select id="courses_search_select" class="courses_search_select courses_search_input">
                                <option>All Categories</option>
                                <option>Category</option>
                                <option>Category</option>
                                <option>Category</option>
                            </select>
                            <button action="submit" class="courses_search_button ml-auto">search now</button>
                        </form>
                    </div>
                    <div class="courses_container">
                        <div class="row courses_row">
                            <!-- Course -->
                            <!-- Course -->
                            <?php
                            $trainings = $this->System_model->fetchAllPublishedTrainings();
                            foreach ($trainings as $training) {
                                $banner = $training['banner'] ? $training['banner'] : 'not_found.jpg';
                                $trainer = $this->System_model->fetchTrainer($training['author_id']);
                                ?>
                                <div class="col-lg-6 course_col">
                                    <div class="course">
                                        <div class="course_image">
                                            <a href="<?= base_url() . '/control/detailsPage/?tid=' . $training['id'] ?>">
                                                <img src="<?= base_url() . '/uploads/image_trans.png'; ?>" style="background-image: url('<?= base_url() . '/uploads/' . $banner ?>'); background-size: cover; background-position: center;" alt="">
                                            </a>
                                        </div>
                                        <div class="course_body">
                                            <h3 class="course_title">
                                                <a href="<?= base_url() . '/control/detailsPage/?tid=' . $training['id'] ?>"><?= $training['training_title'] ?></a>
                                            </h3>
                                            <div class="course_teacher"><?= $trainer[0]['first_name'] . ' ' . $trainer[0]['last_name'] ?></div>
                                            <div class="course_text">
                                                <p><?= substr($training['description'], 0, 74) . '...'; ?></p>
                                            </div>
                                        </div>
                                        <div class="course_footer">
                                            <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                                <div class="course_info">
                                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                    <span>20 Student</span>
                                                </div>
                                                <div class="course_info">
                                                    <i class="fa fa-star" aria-hidden="true"></i> <span>5 Ratings</span>
                                                </div>
                                                <div class="course_price ml-auto"><span>₱320</span>₱220</div>
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
    <div class="newsletter">
        <div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url() . '/assets/unicat/images' ?>/newsletter.jpg" data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">
                        <!-- Newsletter Content -->
                        <div class="newsletter_content text-lg-left text-center">
                            <div class="newsletter_title">sign up for news and offers</div>
                            <div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
                        </div>
                        <!-- Newsletter Form -->
                        <div class="newsletter_form_container ml-lg-auto">
                            <form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                                <input type="email" class="newsletter_input" placeholder="Your Email" required="required">
                                <button type="submit" class="newsletter_button">subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>
