<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="<?php echo base_url() . '/assets/template/plugins' ?>/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
          href="<?php echo base_url() . '/assets/template/plugins' ?>/icheck-bootstrap/icheck-bootstrap.min.css">
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
    </style>
    <style>
        .weak-password {
            background: #dc3545;
            text-align: center;
            color: white;
            margin-bottom: 1rem !important
        }

        .medium-password {
            background: #ffc107;
            text-align: center;
            margin-bottom: 1rem !important
        }

        .strong-password {
            text-align: center;
            background: #28a745;
            color: white;
            margin-bottom: 1rem !important
        }

        #register_success, #register_failed {
            display: none !important;
        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="register-box" style="width:90%;">
    <div class="register-logo">
        <div class="logo_container">
            <a href="#">
                <div class="logo_text">Info<span>Academy</span></div>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <div id="error-message" style="color: red; display: none;"></div>
            <form id="register-form" action="<?php echo base_url() . '/control/registersubmit' ?>" method="post">
                <p class="login-box-msg" style="text-align:left; padding:0px 0px 20px;">Personal Information</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="first_name" placeholder="*First name"
                           required="required">
                    <input type="text" class="form-control" name="middle_name" placeholder="Middle name">
                    <input type="text" class="form-control" name="last_name" placeholder="*Last name"
                           required="required">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="street_number" placeholder="Street no.">
                    <input type="text" class="form-control" name="street_name" placeholder="Street name">
                    <input type="text" class="form-control" name="region" placeholder="*Region" required="required">
                    <input type="text" class="form-control" name="city" placeholder="*City / Municipality"
                           required="required">
                    <input type="text" class="form-control" name="barangay" placeholder="*Barangay" required="required">
                    <input type="text" class="form-control" name="zip_code" placeholder="Zip code">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-home"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select class="form-control" required="required" name="sex">
                        <option value="" selected disabled>*Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <select class="form-control" required="required" name="marital_status">
                        <option value="" disabled selected>*Marital Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>
                    <select class="form-control" required="required" name="nationality">
                        <option value="" disabled selected>*Nationality</option>
                        <option value="Filipino">Filipino</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-flag"></span>
                        </div>
                    </div>
                </div>
                <p class="login-box-msg" style="text-align:left; padding:0px 0px 20px;">Employment</p>
                <div class="input-group mb-3">
                    <select class="form-control" required="required" name="type_of_employment">
                        <option value="">*Type of Employment</option>
                        <option value="contractual">Contractual</option>
                        <option value="full-time">Full-time</option>
                    </select>
                    <input type="text" class="form-control" placeholder="*Name of company" required="required"
                           name="name_of_company">
                    <input type="text" class="form-control" placeholder="*No. of years" required="required"
                           name="number_of_years">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Street no." name="office_street_number">
                    <input type="text" class="form-control" placeholder="Street name" name="office_street_name">
                    <input type="text" class="form-control" placeholder="*Region"
                           name="office_region">
                    <input type="text" class="form-control" placeholder="*City / Municipality"
                           name="office_city">
                    <input type="text" class="form-control" placeholder="*Barangay"
                           name="office_barangay">
                    <input type="text" class="form-control" placeholder="Zip Code" name="office_zip_code">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-building"></span>
                        </div>
                    </div>
                </div>
                <p class="login-box-msg" style="text-align:left; padding:0px 0px 20px;">Contact Information</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="*Email address" required="required"
                           name="email_address">
                    <input type="text" class="form-control" placeholder="*Mobile number" required="required"
                           name="mobile_number">
                    <input type="text" class="form-control" placeholder="*Telephone number"
                           name="telephone_number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <p class="login-box-msg" style="text-align:left; padding:0px 0px 20px;">User Account Information</p>
                <?php
                if ($error) {
                    echo $error;
                }
                ?>
                <div class="input-group mb-3">
                    <select name="account_type" class="form-control" required="required">
                        <option value="" disabled selected>*Account Type</option>
                        <option value="1">Participant</option>
                        <option value="2">Trainor
                        <option>
                    </select>
                    <input type="text" class="form-control" placeholder="*Username" required="required" name="username">
                    <input type="password" id="password" class="form-control" placeholder="*Password"
                           required="required" name="password">
                    <input type="password" id="retype-password" class="form-control" placeholder="*Confirm password"
                           required="required" name="retype_password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="password-strength-status"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block register-btn" disabled="disabled">
                            Register
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="<?php echo base_url() . '/control/login' ?>" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
<!-- jQuery -->
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . '/assets/template/plugins' ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . '/assets/template/dist' ?>/js/adminlte.min.js"></script>
<script>
    var app = {
        init: function () {
            var obj = this;
            this.terms();
            jQuery('#password').keyup(function () {
                obj.password();
                obj.passwordRetype();
            });
            jQuery('#retype-password').keyup(function () {
                obj.passwordRetype();
            });
        },
        terms: function () {
            jQuery('#agreeTerms').click(function () {
                if (jQuery(this).prop('checked') == true && jQuery('#password-strength-status.strong-password').length && !jQuery('#retype-password.is-invalid').length) {
                    jQuery('.register-btn').removeAttr('disabled');
                } else {
                    jQuery('.register-btn').attr('disabled', 'disabled');
                }
            });
        },
        password: function () {
            var number = /([0-9])/;
            var alphabets_lower = /([a-z])/;
            var alphabets_upper = /([A-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if (jQuery('#password').val().length < 8) {
                jQuery('#password-strength-status').removeClass();
                jQuery('#password-strength-status').addClass('weak-password');
                jQuery('#password-strength-status').html("Weak (should be atleast 8 characters.)");
                jQuery('.register-btn').attr('disabled', 'disabled');
            } else {
                if (jQuery('#password').val().match(number) && $('#password').val().match(alphabets_lower) && $('#password').val().match(alphabets_upper) && $('#password').val().match(special_characters)) {
                    jQuery('#password-strength-status').removeClass();
                    jQuery('#password-strength-status').addClass('strong-password');
                    jQuery('#password-strength-status').html("Strong Password");
                    if (jQuery('#agreeTerms').prop('checked') == true && !jQuery('#retype-password.is-invalid').length) {
                        jQuery('.register-btn').removeAttr('disabled');
                    }
                } else {
                    jQuery('#password-strength-status').removeClass();
                    jQuery('#password-strength-status').addClass('medium-password');
                    jQuery('#password-strength-status').html("Medium (Must contain at least 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.)");
                    jQuery('.register-btn').attr('disabled', 'disabled');
                }
            }
        },
        passwordRetype: function () {
            password = jQuery('#password').val();
            validator = jQuery('#retype-password').val();
            if (password !== validator) {
                if (!jQuery('#retype-password.is-invalid').length) {
                    jQuery('#retype-password').addClass('is-invalid');
                    jQuery('.register-btn').attr('disabled', 'disabled');
                }
            } else {
                jQuery('#retype-password').removeClass('is-invalid');
                if (jQuery('#agreeTerms').prop('checked') == true && jQuery('#password-strength-status.strong-password').length) {
                    jQuery('.register-btn').removeAttr('disabled');
                } else {
                    jQuery('.register-btn').attr('disabled', 'disabled');
                }
            }
        }
    }
    jQuery(document).ready(function () {
        app.init();
    });
</script>
<script>
    $(document).ready(function() {
        $("#register-form").submit(function(e) {
            e.preventDefault(); // Prevent page refresh

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = response.redirect_url; // Redirect to login page
                    } else {
                        $("#error-message").html(response.error).show(); // Show error message
                    }
                },
                error: function() {
                    $("#error-message").html("An unexpected error occurred. Please try again.").show();
                }
            });
        });
    });
</script>

</body>
</html>
