<header class="header">
    <!-- Top Bar -->
    <div class="top_bar">
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <ul class="top_bar_contact_list">
                                <li>
                                    <div class="question">Have any questions?</div>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div>001-1234-88888</div>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <div>info.academy@gmail.com</div>
                                </li>
                            </ul>
                            <div class="top_bar_login ml-auto">
                                <div class="login_button"><a href="<?php echo base_url() . '/control/login' ?>">Login /
                                        Sign up</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() . '/assets/unicat/js/' ?>jquery-3.2.1.min.js"></script>
    <script>
        jQuery('document').ready(function () {
            jQuery('.main_nav').find('a').each(function () {
                url = jQuery(this).attr('href');
                current_url = window.location.href.replace('#', '');
                if (window.location.href == url) {
                    jQuery(this).parent().addClass('active');
                }
            });
        });
    </script>
    <!-- Header Content -->
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container">
                            <a href="#">
                                <div class="logo_text">Info<span>Academy</span></div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner ml-auto">
                            <ul class="main_nav">
                                <li><a href="<?php echo base_url() . '' ?>">Home</a></li>
                                <li><a href="<?php echo base_url() . '/control/about/' ?>">About</a></li>
                                <li><a href="<?php echo base_url() . '/control/trainings/' ?>">Trainings</a></li>
                                <li><a href="<?php echo base_url() . '/control/contact/' ?>">Contact</a></li>
                                <?php
                                if (isset($_SESSION['account_type'])) {
                                    if ($_SESSION['account_type'] == 1) {
                                        ?>
                                        <li><a href="<?php echo base_url() . '/control/participant/' ?>">My Account</a>
                                        </li><?php
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Panel -->
    <div class="header_search_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#" class="header_search_form">
                            <input type="search" class="search_input" placeholder="Search" required="required">
                            <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container">
        <div class="menu_close">
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="search">
        <form action="#" class="header_search_form menu_mm">
            <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
            <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                <i class="fa fa-search menu_mm" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <nav class="menu_nav">
        <ul class="menu_mm">
            <li class="menu_mm"><a href="#">Home</a></li>
            <li class="menu_mm"><a href="#">About</a></li>
            <li class="menu_mm"><a href="#">Courses</a></li>
            <li class="menu_mm"><a href="#">Blog</a></li>
            <li class="menu_mm"><a href="#">Page</a></li>
            <li class="menu_mm"><a href="#">Contact</a></li>
        </ul>
    </nav>
</div>
