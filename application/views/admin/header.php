<style>
/* Adjust the dropdown container to allow for wrapping */
.navbar-nav .dropdown-menu {
  max-width: 350px;  /* Adjust the width as needed */
  width: auto;
}

/* Style for each notification item */
.navbar-nav .dropdown-menu .dropdown-item {
  white-space: normal;          /* Allow text to wrap */
  word-wrap: break-word;        /* Break long words */
  overflow-wrap: break-word;    /* Modern property for wrapping */
  font-size: 12px;              /* Smaller font size */
  line-height: 1.2;             /* Adjust line height for tighter spacing */
}

/* Optional: Adjust the footer font size if needed */
.navbar-nav .dropdown-menu .dropdown-footer {
  font-size: 13px;
}

/* Adjust the header styling if desired */
.navbar-nav .dropdown-menu .dropdown-header {
  font-size: 12px;
  font-weight: bold;
  white-space: normal;
  word-wrap: break-word;
  overflow-wrap: break-word;
}


</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->


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

                </div>
            </div>
        </li>
    </ul>


  </nav>

<script>
  // Define the base site URL
  var SITE_URL = "<?php echo site_url(); ?>";
</script>