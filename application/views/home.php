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
					<div class="home_slider_background" style="background-image:url(<?php echo base_url().'/assets/unicat/images/'?>home_slider_1.png)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
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
						<div class="section_subtitle"><p>InfoAcademy is a digital platform that enables the delivery of education and training through the Internet, providing flexible and accessible learning opportunities for all. With the rapid advancement of technology and the growing demand for remote learning solutions, Infoacademy has revolutionized how education is consumed, breaking down traditional barriers such as time and location.

<br><br>These systems leverage a variety of digital tools, resources, and interactive technologies to facilitate learning, including video lectures, workshops, and examinations, Whether it's professional development, or skill-building courses, an online learning system serves as a versatile solution for individuals looking to expand their knowledge and capabilities.</br>

<br>What sets InfoAcademy apart from conventional classroom settings is its ability to offer personalized learning experiences, flexibility in scheduling, and real-time feedback. Learners can learn at their own pace, engage in interactive sessions, and access content from anywhere with an internet connection. </br>

<br>Thus, InfoAcademy is a powerful tool that has transformed the education landscape, providing learners with an efficient and accessible way to pursue knowledge and develop new skills at their convenience.</br></p></div>
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
