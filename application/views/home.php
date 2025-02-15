<!DOCTYPE html>
<html lang="en">
<head>
<title>Infoacademy</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="InfoAcademy project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/styles/'?>bootstrap4/bootstrap.min.css">
<link href="<?php echo base_url().'/assets/unicat/plugins/'?>font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/plugins/'?>OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/plugins/'?>OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/plugins/'?>OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/styles/'?>main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/unicat/styles/'?>responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

<?php $this->load->view('header') ?>

	<!-- Menu -->



	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">

			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?php echo base_url().'/assets/unicat/images/'?>home_slider_1.jpg)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title">The Premium Training System</div>
									<div class="home_slider_subtitle"></div>
			
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>

		<!-- Home Slider Nav -->

	</div>

	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Welcome To InfoAcademy</h2>
						<div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
					</div>
				</div>
			</div>
			<div class="row features_row">

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?php echo base_url().'/assets/unicat/images/'?>icon_1.png" alt=""></div>
						<h3 class="feature_title">The Experts</h3>
						<div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?php echo base_url().'/assets/unicat/images/'?>icon_2.png" alt=""></div>
						<h3 class="feature_title">Book & Library</h3>
						<div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?php echo base_url().'/assets/unicat/images/'?>icon_3.png" alt=""></div>
						<h3 class="feature_title">Best Trainings</h3>
						<div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?php echo base_url().'/assets/unicat/images/'?>icon_4.png" alt=""></div>
						<h3 class="feature_title">Award & Reward</h3>
						<div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Popular Trainings -->

	<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url().'/assets/unicat/images/'?>courses_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Featured Online Trainings</h2>
						<div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
					</div>
				</div>
			</div>
			<div class="row courses_row">

				<!-- Course -->
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="<?php echo base_url().'/assets/unicat/images/'?>course_1.jpg" alt=""></div>
						<div class="course_body">
							<h3 class="course_title"><a href="#">Software Training</a></h3>
							<div class="course_teacher">Mr. John Taylor</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i>
									<span>20 Student</span>
								</div>
								<div class="course_info">
									<i class="fa fa-star" aria-hidden="true"></i>
									<span>5 Ratings</span>
								</div>
								<div class="course_price ml-auto">₱130</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Course -->
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="<?php echo base_url().'/assets/unicat/images/'?>course_2.jpg" alt=""></div>
						<div class="course_body">
							<h3 class="course_title"><a href="#">Developing Mobile Apps</a></h3>
							<div class="course_teacher">Ms. Lucius</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i>
									<span>20 Student</span>
								</div>
								<div class="course_info">
									<i class="fa fa-star" aria-hidden="true"></i>
									<span>5 Ratings</span>
								</div>
								<div class="course_price ml-auto">Free</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Course -->
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="<?php echo base_url().'/assets/unicat/images/'?>course_3.jpg" alt=""></div>
						<div class="course_body">
							<h3 class="course_title"><a href="#">Starting a Startup</a></h3>
							<div class="course_teacher">Mr. Charles</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i>
									<span>20 Student</span>
								</div>
								<div class="course_info">
									<i class="fa fa-star" aria-hidden="true"></i>
									<span>5 Ratings</span>
								</div>
								<div class="course_price ml-auto"><span>₱320</span>₱220</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="#">view all trainings</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Counter -->


	<!-- Events -->


	<!-- Team -->


	<!-- Latest News -->


	<!-- Newsletter -->


	<!-- Footer -->
  <?php $this->load->view('footer') ?>

</div>


<script src="<?php echo base_url().'/assets/unicat/styles/'?>bootstrap4/popper.js"></script>
<script src="<?php echo base_url().'/assets/unicat/styles/'?>bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>easing/easing.js"></script>
<script src="<?php echo base_url().'/assets/unicat/plugins/'?>parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url().'/assets/unicat/js/'?>custom.js"></script>
</body>
</html>
