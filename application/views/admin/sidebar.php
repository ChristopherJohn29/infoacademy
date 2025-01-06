<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <?php
            $url = 'https://' . $_SERVER['HTTP_HOST']
                . explode('?', $_SERVER['REQUEST_URI'], 2)[0];
          
            ?>
            <?php
            if ($url == base_url() . 'admin/dashboard') {
                $active = 'active';
            } else {
                $active = '';
            }
            ?>
            <a href="<?= base_url() . 'admin/dashboard' ?>" class="nav-link <?= $active ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard </p>
            </a>
        </li>
        <li class="nav-item">
            <?php
            if ($url == base_url() . 'admin/trainings') {
                $active = 'active';
            } else {
                $active = '';
            }
            ?>
            <a href="<?= base_url() . 'admin/trainings' ?>" class="nav-link <?= $active ?>">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Trainings </p>
            </a>
        </li>
        <li class="nav-item">
            <?php
            if ($url == base_url() . 'admin/payments') {
                $active = 'active';
            } else {
                $active = '';
            }
            ?>
            <a href="<?= base_url() . 'admin/payments' ?>" class="nav-link <?= $active ?>">
                <i class="nav-icon fas fa-wallet"></i>
                <p>
                    Payments </p>
            </a>
        </li>
        <li class="nav-item">
            <?php
            if ($url == base_url() . 'admin/coupons') {
                $active = 'active';
            } else {
                $active = '';
            }
            ?>
            <a href="<?= base_url() . 'admin/coupons' ?>" class="nav-link <?= $active ?>">
                <i class="nav-icon fa fa-gift"></i>
                <p>
                    Coupons </p>
            </a>
        </li>
        <li class="nav-item">
            <?php
            if ($url == base_url() . 'admin/trainer') {
                $active = 'active';
            } else {
                $active = '';
            }
            ?>
            <a href="<?= base_url() . 'admin/trainer' ?>" class="nav-link <?= $active ?>">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    Trainer </p>
            </a>
        </li>
        <li class="nav-item">
            <?php
            if ($url == base_url() . 'admin/systemControl') {
                $active = 'active';
            } else {
                $active = '';
            }
            ?>
            <a href="<?= base_url() . 'admin/systemControl' ?>" class="nav-link <?= $active ?>">
                <i class="nav-icon fa fa-cog"></i>
                <p>
                    System Control </p>
            </a>
        </li>
    </ul>
</nav>
