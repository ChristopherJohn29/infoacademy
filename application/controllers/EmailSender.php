<?php
// Controller: EmailSender.php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailSender extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
    }

    public function send_email() {
        // SMTP Email configuration
        $config['wordwrap'] = TRUE;
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.bizmail.yahoo.com';
        $config['smtp_user'] = 'konozubadoh@gmail.com';
        $config['smtp_pass'] = 'dacdznqsvhxgqclp';
        $config['smtp_port'] = '465';
        $config['mailtype'] = 'html';

        // Load email library and initialize configuration
        $this->email->initialize($config);

        // Sender email
        $this->email->from('konozubadoh@gmail.com', 'Infoacademy');

        // Recipient email
        $this->email->to('christopherjohngamo@gmail.com'); // Change this to the recipient's email

        // Email subject and body
        $this->email->subject('Test Email');
        $this->email->message('<h1>Welcome to Global Medical Group</h1><p>This is a test email sent using CodeIgniter SMTP settings.</p>');

        // Send email and check for success or failure
        if ($this->email->send()) {
            echo 'Email has been sent successfully.';
        } else {
            // Display error message
            echo 'Failed to send email. Error: ' . $this->email->print_debugger(['headers']);
        }
    }
}

?>