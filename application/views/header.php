<style>

.notification-module .notification-link {
  position: relative;
  color: #333; /* or your theme color */
}
.notification-module .notification-badge {
  background: #f39c12;
  color: #fff;
  padding: 2px 6px;
  border-radius: 50%;
  font-size: 0.75rem;
  position: absolute;
  top: -5px;
  right: -10px;
}
.notification-dropdown {
  width: 300px;
}

</style>

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
                                    <div>+632 8583-0962</div>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <div>infoadvancecompany@gmail.com</div>
                                </li>
                            </ul>
                            <div class="top_bar_login ml-auto">
                                <?php if (isset($_SESSION['id'])): ?>
                                    <!-- Display Logout Button if the user is logged in -->
                                    <div class="login_button">
                                        <a href="<?php echo base_url() . '/control/logout'; ?>">Logout</a>
                                    </div>
                                <?php else: ?>
                                    <!-- Display Login / Sign Up Button if the user is not logged in -->
                                    <div class="login_button">
                                        <a href="<?php echo base_url() . '/control/login'; ?>">Login / Sign up</a>
                                    </div>
                                <?php endif; ?>
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
                        
                        <!-- Notification Module for Unicat Template -->
                        <div class="notification-module dropdown ml-auto">
                            <a href="#" class="notification-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <span class="notification-badge">15</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <h6 class="dropdown-header">15 Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                <i class="fa fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                <i class="fa fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                <i class="fa fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center" href="#">See All Notifications</a>
                            </div>
                        </div>
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
