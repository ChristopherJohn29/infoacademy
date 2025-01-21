
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        
        <li class="nav-item">
            <a href="<?= base_url('admin/trainings') ?>" class="nav-link <?= $this->uri->segment(2) === 'trainings' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>Trainings</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('admin/payments') ?>" class="nav-link <?= $this->uri->segment(2) === 'payments' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-wallet"></i>
                <p>Payments</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('admin/coupons') ?>" class="nav-link <?= $this->uri->segment(2) === 'coupons' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-gift"></i>
                <p>Coupons</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('admin/category') ?>" class="nav-link <?= $this->uri->segment(2) === 'category' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-list"></i>
                <p>Category</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('admin/trainer') ?>" class="nav-link <?= $this->uri->segment(2) === 'trainer' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-users"></i>
                <p>Trainer</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('admin/systemControl') ?>" class="nav-link <?= $this->uri->segment(2) === 'systemControl' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-cog"></i>
                <p>System Control</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('control/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>

</nav>
<style>
.nav-pills .nav-link.active, .nav-pills .show>.nav-link{
    background-color: lightblue;
}
</style>