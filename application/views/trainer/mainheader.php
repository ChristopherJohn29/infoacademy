<style>
    /* Remove bullet points for the list */
    .nav.navbar-nav {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    /* Align to the right */
    .navbar-right {
        margin-left: auto; /* Pushes the content to the right */
    }

    /* Style for user menu */
    .user-menu a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    /* Hover effect */
    .user-menu a:hover {
        background-color: #f4f4f4;
    }

    /* Profile image */
    .user-menu .user-image {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* User name styling */
    .user-menu .hidden-xs {
        margin-left: 10px;
        font-size: 16px;
        font-weight: 500;
        color: #333;
    }


    /* Set a max-width for the dropdown to force wrapping */
    .nav-item.dropdown .dropdown-menu {
    max-width: 350px;  /* Adjust width as needed */
    width: auto;
    }

    /* Style for the header text */
    .nav-item.dropdown .dropdown-menu .dropdown-header {
    font-size: 12px;
    white-space: normal;
    word-wrap: break-word;
    overflow-wrap: break-word;
    }

    /* Style for each notification item */
    .nav-item.dropdown .dropdown-menu .dropdown-item {
    white-space: normal;          /* Allow text to wrap */
    word-wrap: break-word;        /* Break words when necessary */
    overflow-wrap: break-word;    /* Modern word wrap */
    font-size: 12px;              /* Smaller font size */
    line-height: 1.2;             /* Adjust line spacing */
    }

    /* Optional: Adjust footer font size */
    .nav-item.dropdown .dropdown-menu .dropdown-footer {
    font-size: 13px;
    }

    .notification-badge {
        position: absolute;
        top: -8px;            /* Position the badge above the icon */
        right: -8px;          /* Position the badge to the right of the icon */
        background-color: #dc3545; /* Red background */
        color: #fff;          /* White text */
        font-size: 12px;      /* Adjust badge font size */
        font-weight: bold;
        padding: 2px 6px;     /* Spacing inside the badge */
        border-radius: 50%;   /* Makes the badge circular */
        min-width: 20px;      /* Ensures a circular shape if the number is single-digit */
        text-align: center;
        box-sizing: border-box;
    }


</style>
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <div class="logo_container">
            <a href="#">
                <div class="logo_text">Info<span>Academy</span></div>
            </a>
        </div>
        <?php 
        
        if (!isset($trainer['photo']) || empty($trainer['photo'])) {
            $photo = base_url() . '/assets/template/dist/img/avatar5.png';
        } else {
            $photo = base_url('uploads/' . $trainer['photo']);
        }

        ?>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Right navbar links -->

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge" id="notification_count">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header" id="notification_header">0 Notifications</span>
                <div class="dropdown-divider"></div>
                <div id="notification_items">
                    <!-- Dynamic notification items will be appended here -->
 
                </div>
   
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link user user-menu" data-toggle="dropdown" href="#">
                    <img src="<?= $photo ?>" class="user-image" alt="User Image">
                    <span class="ml-2"><?= $user['first_name'] . ' ' . $user['last_name'] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('trainer/profile') ?>" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('trainer/dashboard') ?>" class="dropdown-item">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('control/logout') ?>" class="dropdown-item">
                        <i class="nav-icon fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>

        
    </div>
</nav>

<script>
  // Define the base site URL
  var SITE_URL = "<?php echo site_url(); ?>";
</script>