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
							<form action="#" class="comment_form">
								<div>
									<div class="form_title">Name</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Email</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Message</div>
									<textarea class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">submit now</button>
								</div>
							</form>
						</div>
					</div>

					<!-- Contact Info -->
					<div class="col-lg-6">
						<div class="contact_info">
							<div class="contact_info_title">Contact Info</div>
							<div class="contact_info_text">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a distribution of letters.</p>
							</div>
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
</body>
</html>
