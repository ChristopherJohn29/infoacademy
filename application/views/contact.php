<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/styles/'?>bootstrap4/bootstrap.min.css">
<link href="<?php echo base_url().'/assets/unicat/plugins/'?>font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/styles/'?>contact.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/styles/'?>contact_responsive.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<style>
  .comment_form {
      max-width: 600px;
      margin: 0 auto;
    }
    .form_title {
      font-weight: bold;
      margin-bottom: 5px;
    }
    .comment_input {
      width: 100%;
      padding: 8px;
      margin: 5px 0 15px;
      box-sizing: border-box;
    }
    .comment_button {
      padding: 10px 20px;
      background: #007bff;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 4px;
    }
    .comment_button:hover {
      background: #0056b3;
    }
    .message {
      margin: 20px 0;
      padding: 15px;
      border-radius: 4px;
      text-align: center;
      font-weight: bold;
    }
    .success {
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      color: #155724;
    }
    .error {
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      color: #721c24;
    }
</style>
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
								<li>Contact</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">

		<!-- Contact Map -->

		

		<!-- Contact Info -->

		<div class="contact_info_container">
			<div class="container">
				<div class="row">

					<!-- Contact Form -->
					<div class="col-lg-6">
						<div class="contact_form">
							<div class="contact_info_title">Contact Form</div>
							  <!-- Message container for displaying success/error messages -->
							<div id="form_message"></div>

							<!-- Form with id for AJAX handling -->
							<form id="comment_form" action="<?php echo site_url('control/submit'); ?>" method="post">
								<div>
									<div class="form_title">Name</div>
									<input type="text" class="comment_input" name="name" required="required">
								</div>
								<div>
									<div class="form_title">Email</div>
									<input type="email" class="comment_input" name="email" required="required">
								</div>
								<div>
									<div class="form_title">Message</div>
									<textarea class="comment_input comment_textarea" name="message" required="required"></textarea>
								</div>
								<!-- Google reCAPTCHA widget -->
								<div>
									<div class="g-recaptcha" data-sitekey="6Lf_498qAAAAANrgHmHxFcK7HMcSUyA2Sf2ondIw"></div>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">Submit Now</button>
								</div>
							</form>
						</div>
					</div>

					<!-- Contact Info -->
					<div class="col-lg-6">
						<div class="contact_info">
							<div class="contact_info_title">Contact Info</div>
							
							<div class="contact_info_location">
								
								<ul class="location_list">

									<li>Tower 6, Unit 3G Escalades, 20th Ave., Brgy. San Roque 1109 Cubao Quezon City</li>
									<li>+632 8583 - 0962</li>
									<li>Globe (0917) 1146015</li>
									<li>SUN (0923) 5790675</li>
									<li>infoadvancecompany@gmail.com</li>
		
								</ul>
							</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

	<!-- Footer -->

	<?php $this->load->view('footer'); ?>
</div>


<script src="<?php echo base_url().'/assets/unicat/styles/'?>bootstrap4/popper.js"></script>
<script src="<?php echo base_url().'/assets/unicat/styles/'?>bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>easing/easing.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>marker_with_label/marker_with_label.js"></script>
<script src="<?php echo base_url().'/assets/unicat/js/'?>contact.js"></script>
<script src="<?php echo base_url() . '/assets/template/dist' ?>/js/notification.js"></script>

<script>
$(document).ready(function(){
$('#comment_form').on('submit', function(e){
	e.preventDefault(); // Prevent the default form submission

	// Clear any previous messages
	$('#form_message').html('');

	$.ajax({
	type: 'POST',
	url: $(this).attr('action'),
	data: $(this).serialize(),
	dataType: 'json',
	success: function(response){
		if(response.success){
		$('#form_message').html('<div class="message success">'+response.message+'</div>');
		// Optionally reset the form fields
		$('#comment_form')[0].reset();
		// Reset the reCAPTCHA widget
		grecaptcha.reset();
		} else {
		$('#form_message').html('<div class="message error">'+response.error+'</div>');
		}
	},
	error: function(xhr, status, error){
		$('#form_message').html('<div class="message error">An error occurred. Please try again later.</div>');
	}
	});
});
});
</script>

</body>
</html>
