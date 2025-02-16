<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['wordwrap'] = TRUE;
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.bizmail.yahoo.com';
$config['smtp_user'] = 'your-email@example.com'; // Your email username
$config['smtp_pass'] = 'your-email-password'; // Your email password
$config['smtp_port'] = '465';
$config['mailtype'] = 'html';
$config['newline'] = "\r\n";