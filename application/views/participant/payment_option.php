<!DOCTYPE html>
<html lang="en">
<head>
    <title>Virtual Classroom</title>
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
        #example1_wrapper {
            width: 100%;
            color: black;
        }

        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
            height: calc(2.25rem + 2px);
            margin-bottom: 0;
        }

        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: calc(2.25rem + 2px);
            margin: 0;
            opacity: 0;
        }

        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            box-shadow: none;
        }

        .custom-file-input:lang(en) ~ .custom-file-label::after {
            content: "Browse";
        }

        .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            height: 2.25rem;
            padding: .375rem .75rem;
            line-height: 1.5;
            color: #495057;
            content: "Browse";
            background-color: #e9ecef;
            border-left: inherit;
            border-radius: 0 .25rem .25rem 0;
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
            color: #000000;
        }

        .card-body {
            color: black;
            font-size: 19px;
            text-align: center;

        }

        .card-header {
            text-align: center;
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
                        <h2 class="section_title">Payment Option</h2>
                    </div>
                </div>
            </div>
            <div class="row my-profile-row">
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Bank deposit / Bank transfer</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Account Name: Infoadvance</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>BDO Account #: 123 123 123</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>LBP Account #: 123 123 123</label>
                                    </div>
                                </div>
                            </div>
                            <!-- input states -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card card-warning" style="margin-top:20px;">
                        <div class="card-header">
                            <h3 class="card-title">Gcash</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Account Name: Infoadvance</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>GCASH #: 123 123 123</label>
                                    </div>
                                </div>
                            </div>
                            <!-- input states -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- general form elements disabled -->
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Transaction</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?=base_url().'/control/submitPayment'?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="tid" value="<?= $_GET['tid']?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Payment Option</label>
                                            <select class="form-control payment-option" name="payment_option">
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <option value="Gcash">Gcash</option>
                                                <option value="Paymaya">Paymaya</option>
                                                <option value="Coupon">Coupon</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 transaction-date">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Transaction Date</label>
                                            <input name="transaction_date" type="date" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row transaction-no">
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Transaction No.</label>
                                            <input name="transaction_no" type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row proof-of-payment">
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="customFile">Proof of payment</label>
                                                <div class="custom-file">
                                                    <input type="file" name="proof_of_payment" class="custom-file-input" accept="image/*" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row coupon" style="display:none;">
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Coupon code</label>
                                            <input name="coupon_code" type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>
                                </div>
                                <!-- input states -->
                                <button type="submit" class="counter_form_button">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- general form elements disabled -->
                    <!-- /.card -->
                </div>
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
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
    jQuery(document).ready(function () {
        bsCustomFileInput.init();
        $('.payment-option').change(function () {
            if (jQuery(this).val() == 'Coupon') {
                jQuery('.transaction-date').css('display', 'none');
                jQuery('.transaction-no').css('display', 'none');
                jQuery('.proof-of-payment').css('display', 'none');
                jQuery('.coupon').css('display', 'block');
            } else {
                jQuery('.transaction-date').css('display', 'block');
                jQuery('.transaction-no').css('display', 'block');
                jQuery('.proof-of-payment').css('display', 'block');
                jQuery('.coupon').css('display', 'none');
            }
        });
    });
</script>
</body>
</html>
