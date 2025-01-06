<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('System_model');
        if (isset($_SESSION['account_type'])) {
            if ($_SESSION['account_type'] == 3) {
            } else {
                redirect('control');
            }
        } else {
            redirect('control');
        }
    }

    public function dashboard()
    {
        $this->load->view('admin/dashboard');
    }

    public function trainings()
    {
        $this->load->view('admin/trainings');
    }

    public function training()
    {
        if ($_GET['tid']) {
            $this->load->view('admin/single_training');
        } else{
            redirect('admin/trainings');
        }
    }

    public function payments()
    {
        $this->load->view('admin/payments');
    }

    public function coupons()
    {
        $this->load->view('admin/coupons');
    }

    public function trainer()
    {
        $this->load->view('admin/trainer');
    }

    public function systemControl()
    {
        $this->load->view('admin/system');
    }

}
