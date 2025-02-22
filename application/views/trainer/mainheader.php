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
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
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
                    <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
        </ul>

        
    </div>
</nav>

<script>
  // Define the base site URL
  var SITE_URL = "<?php echo site_url(); ?>";
</script>