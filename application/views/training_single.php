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
                  
                        <!-- Course Image -->
                        <div class="course_image">
                            <img src="<?= base_url() . '/uploads/training_blank.png'; ?>" style="background-image: url('<?= base_url() . '/uploads/' . $banner ?>'); background-size: cover; background-position: center;" alt="">
                        </div>
                        <!-- Course Tabs -->
                        <div class="course_tabs_container">
                          
                            <div class="tab_panels">
                                <!-- Description -->
                                <div class="tab_panel active">
                                    <div class="tab_panel_title">Description</div>
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_text" style="text-align:justify;">

                                            <p><?= $description ?></p>
                                        </div>
                                        <?php if ($requirements) { ?>
                                            <div class="tab_panel_section">
                                                <div class="tab_panel_subtitle">Course Objective</div>
                                                <ul class="tab_panel_text">
                                                    <p><?= nl2br($requirements) ?></p>
                                                </ul>
                                            </div>
                                        <?php } ?>

                                        <?php if ($target_participant) {
                                            ?>
                                            <div class="tab_panel_section">
                                                <div class="tab_panel_subtitle">Methodology</div>
                                                <div class="tab_panel_text">
                                                    <p><?= nl2br($target_participant) ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        } ?>
                                 
                                    </div>
                                </div>
                                <!-- Curriculum -->
                                <!-- Reviews -->
                      
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
                                <!-- Features -->
                                <div class="feature_list">
                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i><span>Training Duration:</span></div>
                                        <div class="feature_text ml-auto"><?=$required_no_of_hours?> Hours</div>
                                    </div>
                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-file-text-o" aria-hidden="true"></i><span>Completion Time:</span>
                                        </div>
                                        <div class="feature_text ml-auto"><?=$validity?> Days</div>
                                    </div>
                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-question-circle-o" aria-hidden="true"></i><span>Price:</span>
                                        </div>
                                        <div class="feature_text ml-auto">₱<?=number_format($training_fee)?></div>
                                    </div>
                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i><span>Level:</span>
                                        </div>

                                        <div class="feature_text ml-auto"><?= $level ?></div>
                                    </div>
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i><span>Language:</span>
                                        </div>

                                        <div class="feature_text ml-auto"><?= $language ?></div>
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
                                <?php $trainer = $this->System_model->fetchTrainer($author_id); ?>
                                <div class="teacher_image"><img src="<?=base_url('uploads')?>/<?= $trainer[0]['photo'] ?>" alt=""></div>
                                <div class="teacher_title">
                                    <div class="teacher_name">
                                        <a href="#" data-toggle="modal" data-target="#trainerProfileModal"><?= $trainer[0]['first_name'] . ' ' . $trainer[0]['last_name'] ?></a>
                                    </div>
                                    <div class="teacher_position"><?= $trainer[0]['position'] ?></div>
                                </div>
                            </div>

                            <!-- Modal -->
                                <div class="modal fade" id="trainerProfileModal" tabindex="-1" role="dialog" aria-labelledby="trainerProfileModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="trainerProfileModalLabel"><?= $trainer[0]['first_name'] . ' ' . $trainer[0]['last_name'] ?> - Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Key Competencies:</strong> <br><?= nl2br($trainer[0]['key_competencies']) ?></p>
                                                <p><strong>Educational Background:</strong><br> <?= nl2br($trainer[0]['educational_background']) ?></p>
                                                <p><strong>Employment History:</strong><br> <?= nl2br($trainer[0]['employment_history']) ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            
                                        </div>
                                    </div>
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
