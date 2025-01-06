<!DOCTYPE html>
<html lang="en">
<head>
    <title>Training Details</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>course.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/assets/unicat/styles/' ?>course_responsive.css">
    <style>
        .counter_form_button {
            width: 100%;
            height: 46px;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            border: none;
            outline: none;
            background: #14bdee;
            cursor: pointer;
            margin-top: 30px;
            box-shadow: 0px 5px 40px rgba(29,34,47,0.15);
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }
    </style>
</head>
<body>
<div class="super_container">
    <!-- Header -->
    <?php $this->load->view('header') ?>
    <!-- Home -->
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="<?= base_url() ?>">Home</a></li>
                                <li><a href="<?= base_url() . '/control/trainings' ?>">Trainings</a></li>
                                <li>Training Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Course -->
    <div class="course">
        <div class="container">
            <div class="row">
                <!-- Course -->
                <div class="col-lg-8">
                    <div class="course_container">
                        <div class="course_title">Software Training</div>
                        <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Trainer:</div>
                                <?php $trainer = $this->System_model->fetchTrainer($author_id); ?>
                                <div class="course_info_text"><a href="#"><?= $trainer[0]['first_name'] . ' ' . $trainer[0]['last_name'] ?></a></div>
                            </div>
                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Reviews:</div>
                                <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                            </div>
                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Categories:</div>
                                <div class="course_info_text"><a href="#">Languages</a></div>
                            </div>
                        </div>
                        <!-- Course Image -->
                        <div class="course_image">
                            <img src="<?= base_url() . '/uploads/training_blank.png'; ?>" style="background-image: url('<?= base_url() . '/uploads/' . $banner ?>'); background-size: cover; background-position: center;" alt="">
                        </div>
                        <!-- Course Tabs -->
                        <div class="course_tabs_container">
                            <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                <div class="tab active">description</div>
                                <div class="tab">reviews</div>
                            </div>
                            <div class="tab_panels">
                                <!-- Description -->
                                <div class="tab_panel active">
                                    <div class="tab_panel_title">Software Training</div>
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_text">

                                            <p><?= $description ?></p>
                                        </div>
                                        <?php if ($requirements) {
                                            ?>
                                            <div class="tab_panel_section">
                                            <div class="tab_panel_subtitle">Requirements</div>
                                            <ul class="tab_panel_text">
                                                <p><?= $requirements ?></p>
                                            </ul>
                                            </div><?php
                                        } ?>
                                        <?php if ($target_participant) {
                                            ?>
                                            <div class="tab_panel_section">
                                                <div class="tab_panel_subtitle">Target participant?</div>
                                                <div class="tab_panel_text">
                                                    <p><?= $target_participant ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        } ?>
                                        <div class="tab_panel_faq">
                                            <div class="tab_panel_title">FAQ</div>
                                            <!-- Accordions -->
                                            <div class="accordions">
                                                <div class="elements_accordions">
                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center">
                                                            <div>Can I just enroll in a single course?</div>
                                                        </div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center active">
                                                            <div>I'm not interested in the entire Specialization?</div>
                                                        </div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center">
                                                            <div>What is the refund policy?</div>
                                                        </div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center">
                                                            <div>What background knowledge is necessary?</div>
                                                        </div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center">
                                                            <div>Do i need to take the courses in a specific order?</div>
                                                        </div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Curriculum -->
                                <!-- Reviews -->
                                <div class="tab_panel tab_panel_3">
                                    <div class="tab_panel_title">Training Review</div>
                                    <!-- Rating -->
                                    <div class="review_rating_container">
                                        <div class="review_rating">
                                            <div class="review_rating_num">4.5</div>
                                            <div class="review_rating_stars">
                                                <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                            </div>
                                            <div class="review_rating_text">(28 Ratings)</div>
                                        </div>
                                        <div class="review_rating_bars">
                                            <ul>
                                                <li><span>5 Star</span>
                                                    <div class="review_rating_bar">
                                                        <div style="width:90%;"></div>
                                                    </div>
                                                </li>
                                                <li><span>4 Star</span>
                                                    <div class="review_rating_bar">
                                                        <div style="width:75%;"></div>
                                                    </div>
                                                </li>
                                                <li><span>3 Star</span>
                                                    <div class="review_rating_bar">
                                                        <div style="width:32%;"></div>
                                                    </div>
                                                </li>
                                                <li><span>2 Star</span>
                                                    <div class="review_rating_bar">
                                                        <div style="width:10%;"></div>
                                                    </div>
                                                </li>
                                                <li><span>1 Star</span>
                                                    <div class="review_rating_bar">
                                                        <div style="width:3%;"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Comments -->
                                    <div class="comments_container">
                                        <ul class="comments_list">
                                            <li>
                                                <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                    <div class="comment_image">
                                                        <div><img src="images/comment_1.jpg" alt=""></div>
                                                    </div>
                                                    <div class="comment_content">
                                                        <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                            <div class="comment_author"><a href="#">Milley Cyrus</a>
                                                            </div>
                                                            <div class="comment_rating">
                                                                <div class="rating_r rating_r_4">
                                                                    <i></i><i></i><i></i><i></i><i></i></div>
                                                            </div>
                                                            <div class="comment_time ml-auto">1 day ago</div>
                                                        </div>
                                                        <div class="comment_text">
                                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                                        </div>
                                                        <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                            <div class="comment_extra comment_likes">
                                                                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>15</span></a>
                                                            </div>
                                                            <div class="comment_extra comment_reply">
                                                                <a href="#"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                            <div class="comment_image">
                                                                <div><img src="images/comment_2.jpg" alt=""></div>
                                                            </div>
                                                            <div class="comment_content">
                                                                <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                                    <div class="comment_author">
                                                                        <a href="#">John Tyler</a></div>
                                                                    <div class="comment_rating">
                                                                        <div class="rating_r rating_r_4">
                                                                            <i></i><i></i><i></i><i></i><i></i></div>
                                                                    </div>
                                                                    <div class="comment_time ml-auto">1 day ago</div>
                                                                </div>
                                                                <div class="comment_text">
                                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                                                </div>
                                                                <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                                    <div class="comment_extra comment_likes">
                                                                        <a href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>15</span></a>
                                                                    </div>
                                                                    <div class="comment_extra comment_reply">
                                                                        <a href="#"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                    <div class="comment_image">
                                                        <div><img src="images/comment_3.jpg" alt=""></div>
                                                    </div>
                                                    <div class="comment_content">
                                                        <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                            <div class="comment_author"><a href="#">Milley Cyrus</a>
                                                            </div>
                                                            <div class="comment_rating">
                                                                <div class="rating_r rating_r_4">
                                                                    <i></i><i></i><i></i><i></i><i></i></div>
                                                            </div>
                                                            <div class="comment_time ml-auto">1 day ago</div>
                                                        </div>
                                                        <div class="comment_text">
                                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                                        </div>
                                                        <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                            <div class="comment_extra comment_likes">
                                                                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>15</span></a>
                                                            </div>
                                                            <div class="comment_extra comment_reply">
                                                                <a href="#"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Feature -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Training Feature</div>
                            <div class="sidebar_feature">
                                <div class="course_price">$180</div>
                                <!-- Features -->
                                <div class="feature_list">
                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i><span>Length:</span></div>
                                        <div class="feature_text ml-auto"><?=$validity?> Days</div>
                                    </div>
                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-file-text-o" aria-hidden="true"></i><span>Videos:</span>
                                        </div>
                                        <div class="feature_text ml-auto"><?=count(json_decode($video))?></div>
                                    </div>
                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-question-circle-o" aria-hidden="true"></i><span>Workshop:</span>
                                        </div>
                                        <div class="feature_text ml-auto"><?=count(json_decode($workshop))?></div>
                                    </div>
                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i><span>Examinations:</span>
                                        </div>

                                        <div class="feature_text ml-auto"><?= count(json_decode($examination)) ?></div>
                                    </div>
                                    <!-- Feature -->
                                </div>
                            </div>
                        </div>
                        <!-- Feature -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Trainer</div>
                            <div class="sidebar_teacher">
                                <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="teacher_image"><img src="images/teacher.jpg" alt=""></div>
                                    <div class="teacher_title">
                                        <div class="teacher_name"><a href="#"><?= $trainer[0]['first_name'] . ' ' . $trainer[0]['last_name'] ?></a></div>
                                        <div class="teacher_position">Marketing & Management</div>
                                    </div>
                                </div>
                                <div class="teacher_meta_container">
                                    <!-- Teacher Rating -->
                                    <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                        <div class="teacher_meta_title">Average Rating:</div>
                                        <div class="teacher_meta_text ml-auto">
                                            <span>4.7</span><i class="fa fa-star" aria-hidden="true"></i></div>
                                    </div>
                                    <!-- Teacher Review -->
                                    <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                        <div class="teacher_meta_title">Review:</div>
                                        <div class="teacher_meta_text ml-auto">
                                            <span>12k</span><i class="fa fa-comment" aria-hidden="true"></i></div>
                                    </div>
                                    <!-- Teacher Quizzes -->
                                    <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                        <div class="teacher_meta_title">Trainings:</div>
                                        <div class="teacher_meta_text ml-auto">
                                            <span><?= count($this->System_model->fetchTrainings($author_id))?></span><i class="fa fa-user" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                                <div class="teacher_info">
                                    <p>Hi! I am Masion, I’m a marketing & management eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum nam nulla ipsum.</p>
                                </div>
                                <button data-url="<?=base_url().'/control/enroll/?tid='.$id?>" class="counter_form_button button-enroll">Enroll now</button>

                            </div>
                        </div>
                        <!-- Latest Course -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter -->
    <!-- Footer -->
    <?php $this->load->view('footer') ?>
</div>
<script src="<?php echo base_url() . '/assets/unicat/js/' ?>jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/styles/' ?>bootstrap4/popper.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/styles/' ?>bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>easing/easing.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/plugins/' ?>colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url() . '/assets/unicat/js/' ?>course.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('.button-enroll').click(function () {
           window.location.href = jQuery(this).data('url');
        });
    });
</script>
</body>
</html>
