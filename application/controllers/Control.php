<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->load->model('System_model');
        $this->load->model('notification_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function about()
    {
        $this->load->view('about');
    }

    public function test()
    {
        $this->System_model->test();
    }

    public function trainings()
    {   
        // Check if the search form is submitted
        if (isset($_POST['search'])) {
            // Retrieve the category and subcategory from the form input
            $category = $_POST['category'];
            $subcategory = isset($_POST['subcategory']) && $_POST['subcategory'] != '' ? $_POST['subcategory'] : 0;
        
            // Fetch trainings based on search term, category, and subcategory
            $data['trainings'] = $this->System_model->fetchAllPublishedTrainingsBySearch($subcategory, $category, $_POST['search']);
        }
        // If there's a category parameter passed via GET
        else if (isset($_GET['c'])) {
            $data['trainings'] = $this->System_model->fetchAllPublishedTrainingsByCategory($_GET['c']);
        } 
        else {
            // Fetch all trainings if no filter is applied
            $data['trainings'] = $this->System_model->fetchAllPublishedTrainings();
        }
    
        // Load the trainings view with the fetched data
        $this->load->view('trainings', $data);
    }
    public function contact()
    {
        $this->load->view('contact');
    }

    public function login($err = false)
    {
        if (isset($_GET['v'])) {
            $validate['verification_code'] = html_escape($_GET['v']);
            if ($this->System_model->verificationCheck($validate)) {
                $this->System_model->verifyUser(html_escape($_GET['v']));
                $err = '<label style="color:green;">Verification Code accepted</label>';
            } else {
                $err = '<label style="color:red;">Invalid Verification Code</label>';
            }
        }

        $data['error'] = $err;
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] == 1) {
            } elseif ($_SESSION['login'] == 2) {
            } elseif ($_SESSION['login'] == 3) {
            } else {
                echo 'Invalid Session';
                exit;
            }
        } else {
            $this->load->view('admin/login', $data);
        }
    }

    public function register($err = false)
    {
        $data['error'] = $err;
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] == 1) {
            } elseif ($_SESSION['login'] == 2) {
            } elseif ($_SESSION['login'] == 3) {
            } else {
                echo 'Invalid Session';
                exit;
            }
        } else {
            $this->load->view('admin/register', $data);
        }
    }

    public function forgotpass($err = false)
    {
        $data['error'] = $err;
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] == 1) {
            } elseif ($_SESSION['login'] == 2) {
            } elseif ($_SESSION['login'] == 3) {
            } else {
                echo 'Invalid Session';
                exit;
            }
        } else {
            $this->load->view('admin/forgotpass', $data);
        }
    }

    public function forgotpassSubmit(){
        // Set validation rules for the email input
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed – send back error messages
            $data['error'] = validation_errors();
            $this->load->view('admin/forgotpass', $data);
        } else {
            $email = $this->input->post('email');
            // Check if a user with this email exists
            $user = $this->System_model->getUserByEmail($email);
            if (!$user) {
                $data['error'] = 'The email address is not registered.';
                $this->load->view('admin/forgotpass', $data);
            } else {
                // Generate a secure token (using 100 hex characters)
                $token = bin2hex(random_bytes(50));
                // Set the token expiration time (e.g., 1 hour from now)
                $expiration = date("Y-m-d H:i:s", strtotime("+1 hour"));

                // Update the user record with the reset token and expiration
                $update = $this->System_model->updateResetToken($user['id'], $token, $expiration);

                if ($update) {
                    // Load email library and configure SMTP settings
                    $this->load->library('email');

                    $config['wordwrap']   = TRUE;
                    $config['protocol']   = 'smtp';
                    $config['smtp_host']  = 'ssl://smtp.gmail.com';
                    $config['smtp_user']  = 'konozubadoh@gmail.com';
                    $config['smtp_pass']  = 'dacdznqsvhxgqclp';
                    $config['smtp_port']  = '465';
                    $config['mailtype']   = 'html';

                    $this->email->initialize($config);

                    $this->email->from('konozubadoh@gmail.com', 'InfoAcademy');
                    $this->email->to($email);
                    $this->email->subject('Password Reset Request');

                    // Create the reset link (adjust the URL as needed)
                    $resetLink = base_url().'control/resetPassword?token='.$token;
                    $message  = "<p>Dear ".$user['last_name'].",</p>";
                    $message .= "<p>We received a request to reset your password. Click the link below to reset your password:</p>";
                    $message .= "<p><a href='".$resetLink."'>Reset Password</a></p>";
                    $message .= "<p>This link will expire in 1 hour.</p>";
                    $message .= "<p>If you did not request a password reset, please ignore this email.</p>";

                    $this->email->message($message);

                    if ($this->email->send()) {
                        $data['message'] = 'Please check your email for further instructions.';
                        $this->load->view('admin/forgotpass', $data);
                    } else {
                        $data['error'] = 'Failed to send email. Please try again later.';
                        $this->load->view('admin/forgotpass', $data);
                    }
                } else {
                    $data['error'] = 'Failed to generate reset token. Please try again later.';
                    $this->load->view('admin/forgotpass', $data);
                }
            }
        }
    }

    public function resetPassword(){
        $data = array();
        // Retrieve the reset token from the GET parameter
        $token = $this->input->get('token');
        if(empty($token)){
            $data['error'] = 'Invalid or missing token.';
            $this->load->view('admin/reset_password_view', $data);
            return;
        }

        // Get the user record using the token
        $user = $this->System_model->getUserByResetToken($token);
        if(!$user){
            $data['error'] = 'Invalid token.';
            $this->load->view('admin/reset_password_view', $data);
            return;
        }

        // Check if the token has expired
        if($user['reset_expiration'] < date('Y-m-d H:i:s')){
            $data['error'] = 'Token has expired.';
            $this->load->view('admin/reset_password_view', $data);
            return;
        }

        // If form is submitted, process the new password
        if($this->input->post()){
            // Set form validation rules
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
            
            if($this->form_validation->run() == FALSE){
                $data['error'] = validation_errors();
            } else {
                // Hash the new password
                $newPassword   = $this->input->post('password');
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                
                // Update the user's password
                if($this->System_model->updatePassword($user['id'], $hashedPassword)){
                    // Clear the reset token and expiration
                    $this->System_model->clearResetToken($user['id']);
                    $data['message'] = 'Your password has been successfully updated. You can now <a href="'.base_url().'control/login">login</a>.';
                } else {
                    $data['error'] = 'Failed to update password. Please try again.';
                }
            }
        }
        
        // Load the reset password view
        $this->load->view('admin/reset_password_view', $data);
    }

    public function enroll()
    {
        if (isset($_SESSION['id'])) {
            if (isset($_GET['tid'])) {
                $this->load->view('participant/payment_option');
            } else {
                redirect('control/trainings');
            }
        } else {
            if (isset($_GET['tid'])) {
                $_SESSION['redirection'] = '/control/enroll/?tid=' . html_escape($_GET['tid']);
                redirect('/control/login');
            } else {
                redirect('control/trainings');
            }

        }
    }

    public function submitPayment()
    {
        if (isset($_SESSION['id'])) {
            if (isset($_POST['tid'])) {

              // Get the payment option and sanitize it
                $payment_option = html_escape($_POST['payment_option']);

                // If payment option is "Coupon", validate the coupon code
                if ($payment_option === 'Coupon') {
                    $coupon_code = html_escape($_POST['coupon_code']);

                    // Check coupon validity. Ensure your System_model has a method like getCouponByCode().
                    $coupon = $this->System_model->getCouponByCode($coupon_code);
                    if (!$coupon) {
                        // Coupon is not valid: show an alert and stop further processing.
                        echo "<script>alert('Coupon code is not valid'); window.history.back();</script>";
                        exit;
                    }
                    // Since payment is via coupon, there's no proof of payment image.
                    $proof_of_payment = '';
                } else {
                    // Process file upload for non-coupon payments
                    $config['upload_path']   = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png'; // Only allow non-executable image files
                    $config['max_size']      = 2000;
                    $config['max_width']     = 2000;
                    $config['max_height']    = 2000;
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('proof_of_payment')) {
                        $error = array('error' => $this->upload->display_errors());
                        $proof_of_payment = '';
                    } else {
                        // Get the uploaded file data
                        $file = array('upload_data' => $this->upload->data());
                        // Generate a unique name using uniqid() and keep the original file extension
                        $proof_of_payment = uniqid() . '.' . pathinfo($file['upload_data']['file_name'], PATHINFO_EXTENSION);
                        // Rename the file to the unique name
                        rename($file['upload_data']['full_path'], $file['upload_data']['file_path'] . $proof_of_payment);
                    }
                }

                // Fetch training data
                $training    = $this->System_model->fetchSingleTraining(html_escape($_POST['tid']));
                $instruction = $training[0]['instruction'];

                // Data for insert or update
                $data = [
                    'proof_of_payment'     => html_escape($proof_of_payment),
                    'payment_option'       => $payment_option,
                    'transaction_date'     => html_escape($_POST['transaction_date']),
                    'transaction_no'       => html_escape($_POST['transaction_no']),
                    'coupon_code'          => html_escape($_POST['coupon_code']),
                    'participant_id'       => html_escape($_SESSION['id']),
                    'training_id'          => html_escape($_POST['tid']),
                    'status'               => 0
                ];

                // Check if a record already exists
                $existing = $this->System_model->checkEnrollmentExists($_SESSION['id'], $_POST['tid']);

    
                if ($existing) {
                    // Update existing record
                    $success = $this->System_model->updateEnrollment($data, $_SESSION['id'], $_POST['tid']);

                    $participantCode = $existing->participant_code;

                    if ($success) {

                        $admins = $this->db->get_where('user', array('account_type' => 3))->result();
    
                        foreach ($admins as $admin) {
                            $data = array(
                                'user_id'     => $admin->id, // Assumes your primary key is 'id'
                                'title'       => 'Payment',
                                'message'     => "Payment resubmitted by " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " " . $participantCode . " Awaiting for verification.",
                                'link'        => base_url('admin/payments'),
                                'read_status' => 0,
                                'created_at'  => date('Y-m-d H:i:s')
                            );
    
                            $this->notification_model->add_notification($data);
                        }
    
                        redirect('control/participant');
                    }
                } else {
                    // Save the data by inserting a new record
                    $data['date_enrolled'] = date('Y-m-d');
                    $data['training_instruction'] = $instruction;
                    $data['progress'] = 0;
                    $success = $this->System_model->enrollSubmit($data);

                    if ($success) {

                        $insertedId = $this->db->insert_id();
    
                    
                        $participantCode = $training[0]['training_code'] . '-' . date('m') . date('y') . '-' . sprintf('%04d', $insertedId);
                        
                        // Update the record with the generated participant code
                        $updateData = ['participant_code' => $participantCode];
                        $this->db->where('id', $insertedId);
                        $this->db->update('training_class', $updateData);
    
    
                         // Prepare the notification data
                        $data = array(
                            'user_id'     => $_SESSION['id'],
                            'title'       => 'Enrollment',
                            'message'     => 'You have been successfully enrolled in '.$training[0]['training_title'].'. Finish the Training within '.$training[0]['validity'].'.',
                            'link'        => base_url('control/classroom/?tid=').$_POST['tid'],  // Adjust link as needed
                            'read_status' => 0,
                            'created_at'  => date('Y-m-d H:i:s')
                        );
    
                        // Call the model to insert the notification
                        $this->notification_model->add_notification($data);
    
    
                        $data = array(
                            'user_id'     => $training[0]['author_id'],
                            'title'       => 'Enrollment',
                            'message'     => "". $_SESSION['first_name']." ".$_SESSION['last_name']." has enrolled in your training course, ".$training[0]['training_title'].".",
                            'link'        => base_url('trainer/classroom/?id=').$_POST['tid'],  // Adjust link as needed
                            'read_status' => 0,
                            'created_at'  => date('Y-m-d H:i:s')
                        );
    
                        $this->notification_model->add_notification($data);
    
                        $admins = $this->db->get_where('user', array('account_type' => 3))->result();
    
                        foreach ($admins as $admin) {
                            $data = array(
                                'user_id'     => $admin->id, // Assumes your primary key is 'id'
                                'title'       => 'Payment',
                                'message'     => "Payment submitted by " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " " . $participantCode . " Awaiting for verification.",
                                'link'        => base_url('admin/payments'),
                                'read_status' => 0,
                                'created_at'  => date('Y-m-d H:i:s')
                            );
    
                            $this->notification_model->add_notification($data);
                        }
    
                        redirect('control/participant');
                    }
                }

                
            }
        }
    }

    

    public function detailsPage()
    {
        if (isset($_GET['tid'])) {
            $data['id'] = html_escape($_GET['tid']);
            $training = $this->System_model->fetchSingleTraining($data['id']);
            if (empty($training)) {
                redirect('control/trainings');
            } else {
                $this->load->view('training_single', $training[0]);
            }
        } else {
            redirect('control/trainings');
        }
    }

    public function loginSubmit()
    {
        if (isset($_POST)) {
            $data = html_escape($_POST);
            $validate = array(
                'username' => $data['username'],
            );

            if ($this->System_model->duplicateChecker($validate)) {
                $result = $this->System_model->fetchLogin($data);

                if (is_array($result) && !empty($result)) {
                    // Check if the account is email verified
                    if ($result[0]['email_verify'] != '1') {
                        $this->login('<p style="color:red;">Account not Email Verified</p>');
                        return;
                    }

                    // Validate password
                    if (password_verify($data['password'], $result[0]['password'])) {
                        $_SESSION['user_key'] = uniqid();
                        $_SESSION['first_name'] = $result[0]['first_name'];
                        $_SESSION['middle_name'] = $result[0]['middle_name'];
                        $_SESSION['last_name'] = $result[0]['last_name'];
                        $_SESSION['email_address'] = $result[0]['email_address'];
                        $_SESSION['street_number'] = $result[0]['street_number'];
                        $_SESSION['street_name'] = $result[0]['street_name'];
                        $_SESSION['barangay'] = $result[0]['barangay'];
                        $_SESSION['city'] = $result[0]['city'];
                        $_SESSION['region'] = $result[0]['region'];
                        $_SESSION['zip_code'] = $result[0]['zip_code'];
                        $_SESSION['account_type'] = $result[0]['account_type'];
                        $_SESSION['id'] = $result[0]['id'];

                        // Redirect based on account type
                        if ($result[0]['account_type'] == '1') {
                            if (isset($_SESSION['redirection'])) {
                                redirect($_SESSION['redirection']);
                            } else {
                                redirect('/control/participant');
                            }
                        } elseif ($result[0]['account_type'] == '2') {
                            redirect('/trainer/dashboard');
                        } else {
                            redirect('/control/admin');
                        }
                    } else {
                        $this->login('<p style="color:red;">Invalid Login</p>');
                    }
                } else {
                    $this->login('<p style="color:red;">Invalid Login</p>');
                }
            } else {
                $this->login('<p style="color:red;">Invalid Login</p>');
            }
        }
    }


    public function logout(){
        session_destroy();
        $this->login('<p style="color:green;">Logout Successfully</p>');
    }

    public function admin($err = false)
    {
        if (isset($_SESSION['account_type'])) {
            if ($_SESSION['account_type'] == 3) {
                redirect('admin/trainings');
            }
        }
    }

    public function finishWatching($err = false)
    {
        if (isset($_SESSION['account_type'])) {
            if ($_SESSION['account_type'] == 1) {
                $training_id = $_GET['tid'];
                $step = $_GET['step'];

                $training_class = $this->System_model->fetchFromTrainingClass($training_id);
                $instruction = json_decode($training_class[0]['training_instruction']);

                if ($instruction[$step]->section == 'video') {
                    $instruction[$step]->completed = 1;
                } else {
                    redirect('control');
                }

                $new_instruction = json_encode($instruction);

                $training_class = $this->System_model->saveFromTrainingClass($training_id, $new_instruction);

                if ($training_class) {
                    redirect('control/classroom/?tid=' . $training_id);
                } else {
                    redirect('control');
                }

            } else {
                redirect('control');
            }
        } else {
            redirect('control');
        }
    }

    public function finishReading($err = false)
    {
        if (isset($_SESSION['account_type'])) {
            if ($_SESSION['account_type'] == 1) {
                $training_id = $_GET['tid'];
                $step = $_GET['step'];

                $training_class = $this->System_model->fetchFromTrainingClass($training_id);
                $instruction = json_decode($training_class[0]['training_instruction']);

                if ($instruction[$step]->section == 'workshop') {
                    $instruction[$step]->completed = 1;
                } else {
                    redirect('control');
                }

                $new_instruction = json_encode($instruction);

                $training_class = $this->System_model->saveFromTrainingClass($training_id, $new_instruction);

                if ($training_class) {
                    redirect('control/classroom/?tid=' . $training_id);
                } else {
                    redirect('control');
                }

            } else {
                redirect('control');
            }
        } else {
            redirect('control');
        }
    }

    public function submitWorkshop()
    {
        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx'; // Only allow non-executable files
            $config['max_size'] = 2000;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;

            // Load the upload library with the new config
            $this->load->library('upload', $config);
            $workshop_file = '';
            $error_check = 0;

            // Check if a file is uploaded
            if ($this->upload->do_upload('workshop_file')) {
                // Get the uploaded file data
                $file = array('upload_data' => $this->upload->data());
                // Generate a unique name without prefix by using uniqid() and keep the original file extension
                $workshop_file = uniqid() . '.' . pathinfo($file['upload_data']['file_name'], PATHINFO_EXTENSION);
                // Rename the file to the unique name
                rename($file['upload_data']['full_path'], $file['upload_data']['file_path'] . $workshop_file);
            } elseif (!empty($_POST['workshop_link']) && filter_var($_POST['workshop_link'], FILTER_VALIDATE_URL)) {
                // Validate and use the provided link
                $workshop_file = $_POST['workshop_link'];
            } else {
                // Redirect if neither file nor valid link is provided
                redirect('control');
            }

            $training_id = $_POST['tid'];
            $step = $_POST['step'];

            // Fetch training class data and instructions
            $training_class = $this->System_model->fetchFromTrainingClass($training_id);
            $instruction = json_decode($training_class[0]['training_instruction']);

            // Check if the step corresponds to workshop
            if ($instruction[$step]->section == 'workshop') {
                $file_desc = $instruction[$step]->description;
                $instruction[$step]->completed = 2;
            } else {
                redirect('control');
            }

            $new_instruction = json_encode($instruction);

            // Save the updated instruction and training class data
            $training_class = $this->System_model->saveFromTrainingClass($training_id, $new_instruction);

            $data = array(
                'file_desc' =>  $file_desc,
                'training_id' => $training_id,
                'step' => $step,
                'workshop_file' => $workshop_file,
                'participant_id' => intval($_SESSION['id']),
                'status' => 2
            );

            // Save workshop data
            $saveWorkshop = $this->System_model->saveWorkshop(html_escape($data));

            if ($training_class && $saveWorkshop) {

                $training = $this->System_model->get_training_by_training_id($training_id);
                
                $data = array(
                    'user_id'     => $training->author_id,
                    'title'       => 'Submittion',
                    'message'     => "". $_SESSION['first_name']." ".$_SESSION['last_name']." has submitted the workshop for ".$training->training_title.".",
                    'link'        => base_url('trainer/classroom/?id=').$training_id,  // Adjust link as needed
                    'read_status' => 0,
                    'created_at'  => date('Y-m-d H:i:s')
                );

                $this->notification_model->add_notification($data);

                redirect('control/classroom/?tid=' . $training_id);
            } else {
                redirect('control');
            }

        } else {
            redirect('control');
        }
    }



    public function submitExamination()
    {
        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx'; // Only allow non-executable files
            $config['max_size'] = 2000;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;

            // Load the upload library with the new config
            $this->load->library('upload', $config);
            $examination_file = '';
            $error_check = 0;

            // Check if a file is uploaded
            if ($this->upload->do_upload('examination_file')) {
                // Get the uploaded file data
                $file = array('upload_data' => $this->upload->data());
                // Generate a unique name without prefix by using uniqid() and keep the original file extension
                $examination_file = uniqid() . '.' . pathinfo($file['upload_data']['file_name'], PATHINFO_EXTENSION);
                // Rename the file to the unique name
                rename($file['upload_data']['full_path'], $file['upload_data']['file_path'] . $examination_file);
            } elseif (!empty($_POST['examination_link']) && filter_var($_POST['examination_link'], FILTER_VALIDATE_URL)) {
                // Validate and use the provided link
                $examination_file = $_POST['examination_link'];
            } else {
                // Redirect if neither file nor valid link is provided
                $examination_file = "Google Form Submitted";
            }

            $training_id = $_POST['tid'];
            $step = $_POST['step'];

            // Fetch training class data and instructions
            $training_class = $this->System_model->fetchFromTrainingClass($training_id);
            $instruction = json_decode($training_class[0]['training_instruction']);

            // Check if the step corresponds to examination
            if ($instruction[$step]->section == 'examination') {
                $file_desc = $instruction[$step]->description;
                $instruction[$step]->completed = 2;
            } else {
                redirect('control');
            }

            $new_instruction = json_encode($instruction);

            // Save the updated instruction and training class data
            $training_class = $this->System_model->saveFromTrainingClass($training_id, $new_instruction);

            $data = array(
                'file_desc' =>  $file_desc,
                'training_id' => $training_id,
                'step' => $step,
                'examination_file' => $examination_file,
                'participant_id' => intval($_SESSION['id']),
                'status' => 2
            );

            // Save examination data
            $saveExamination = $this->System_model->saveExamination(html_escape($data));
            

            if ($training_class && $saveExamination) {

                $training = $this->System_model->get_training_by_training_id($training_id);
                
                $data = array(
                    'user_id'     => $training->author_id,
                    'title'       => 'Submittion',
                    'message'     => "". $_SESSION['first_name']." ".$_SESSION['last_name']." has submitted the exam for ".$training->training_title.".",
                    'link'        => base_url('trainer/classroom/?id=').$training_id,  // Adjust link as needed
                    'read_status' => 0,
                    'created_at'  => date('Y-m-d H:i:s')
                );

                $this->notification_model->add_notification($data);


                redirect('control/classroom/?tid=' . $training_id);
            } else {
                redirect('control');
            }

        } else {
            redirect('control');
        }
    }

    public function classroom($err = false)
    {
        if (isset($_SESSION['id'])) {
            if (isset($_GET['tid'])) {
                $training_id = html_escape($_GET['tid']);
                $participant_id = html_escape($_SESSION['id']);
                $validate = $this->System_model->validateEnrollTraining($training_id, $participant_id);
                if ($validate > 0) {
                    $this->load->view('participant/single_classroom');
                } else {
                    redirect('control/participant');
                }
            } else {
                redirect('control/participant');
            }
        } else {
            redirect('control');
        }
    }

    public function participant($err = false)
    {
        if (isset($_SESSION['account_type'])) {
            if ($_SESSION['account_type'] == 1) {
                $this->load->view('participant/dashboard');
            } else {
                redirect('control');
            }
        } else {
            redirect('control');
        }

    }

    public function trainer()
    {
        if ($_SESSION['account_type'] == 2) {
            $this->load->view('trainer/dashboard');
        }
    }

    public function testing(){
        $this->load->view('trainer/test');
    }

    public function registerSubmit()
    {
        if ($this->input->post()) {
            $data = html_escape($this->input->post());
            unset($data['retype_password']);
            unset($data['terms']);

            // Default account settings
            $data['account_status'] = 0;
            $data['email_verify'] = 0;
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['verification_code'] = uniqid() . '-' . uniqid() . '-' . uniqid();
            $data['creation_date'] = date("Y-m-d h:i:s");

            // Check for duplicate username
            if ($this->System_model->duplicateChecker(array('username' => $data['username']))) {
                echo json_encode([
                    "success" => false,
                    "error" => "Username already exists! Please try again."
                ]);
                return;
            }

            // Check for duplicate email
            if ($this->System_model->duplicateChecker(array('email_address' => $data['email_address']))) {
                echo json_encode([
                    "success" => false,
                    "error" => "Email already exists! Please try again."
                ]);
                return;
            }

            // Attempt to register the user
            if ($this->System_model->registerModel($data)) {
                // Send verification email
                $this->load->library(['email']);

                $config['wordwrap'] = TRUE;
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'ssl://smtp.gmail.com';
                $config['smtp_user'] = 'konozubadoh@gmail.com';
                $config['smtp_pass'] = 'dacdznqsvhxgqclp';
                $config['smtp_port'] = '465';
                $config['mailtype'] = 'html';
        
                // Load email library and initialize configuration
                $this->email->initialize($config);

                $this->email->from('konozubadoh@gmail.com', 'InfoAcademy');
                $this->email->to($data['email_address']);
                $this->email->subject('User Verification Code');
                $this->email->message('To verify your account, kindly click this link: ' . base_url() . 'control/login/?v=' . $data['verification_code']);
   


                if( $this->email->send()){
                    echo json_encode([
                        "success" => true,
                        "message" => "Registration successful! Please check your email to verify your account.",
                        "redirect_url" => base_url() . "/control/login"
                    ]);
                } else {
                    echo json_encode([
                        "success" => false,
                        "error" => "Error! Sending Email."
                    ]);
                }
          
            } else {
                echo json_encode([
                    "success" => false,
                    "error" => "Error! Please try again."
                ]);
            }
        } else {
            echo json_encode([
                "success" => false,
                "error" => "Invalid request."
            ]);
        }
    }


    public function getSubCategories() {
        $categoryId = $this->input->post('category_id');
        
        // Fetch subcategories based on the selected category
        $subcategories = $this->System_model->fetchSubCategoriesByCategory($categoryId);

        // Prepare the response
        if ($subcategories) {
            echo json_encode([
                'status' => 'success',
                'subcategories' => $subcategories
            ]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function view_certificate($participantId, $trainingId, $author_id)
    {
        // Using CI3 session library (assuming session is autoloaded or loaded in the constructor)
        $user_id = $this->session->userdata('id');
    
        if ($user_id == $participantId || $user_id == $author_id) {
            $participantData = $this->System_model->get_participant_data($participantId, $trainingId);
            
            if ($participantData) {
                // Prepare data for the certificate view
                $data = [
                    'name'           => $participantData['participant_name'],
                    'course'         => $participantData['training_title'],
                    'date_enrolled'  => $participantData['date_enrolled'],
                    'date_completed' => $participantData['date_completed'],
                    'required_no_of_hours' => $participantData['required_no_of_hours'],
                    'signatory'      => "Aurelio L. Ebita, CPA" // Or load this dynamically
                ];
    
                // Load the view into a variable (third parameter true returns the HTML string)
                $html = $this->load->view('certificate', $data, true);
    
                // Include Dompdf's autoload file
                // If installed via Composer:
                require_once FCPATH . 'vendor/autoload.php';
                // If you placed Dompdf in third_party, use:
                // require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    
                // Configure Dompdf options
                $options = new \Dompdf\Options();
                $options->set('isRemoteEnabled', true); // Allow external images if needed
    
                $dompdf = new \Dompdf\Dompdf($options);
                $dompdf->loadHtml($html);
    
                // Set the paper size and orientation (A4 landscape)
                $dompdf->setPaper('A4', 'landscape');
    
                // Render the HTML as PDF
                $dompdf->render();
    
                // Output the generated PDF to the browser (Attachment=false to open in browser)
                $dompdf->stream("certificate.pdf", ["Attachment" => false]);
            } else {
                // Participant data not found
                show_404();
            }
        } else {
            // Unauthorized access
            show_404();
        }
    }
    


    public function checkEnrollment() {
        $participant_id = $this->input->post('participant_id');
        $training_id = $this->input->post('training_id');
    
        // Check if the participant is enrolled in the training
        $is_enrolled = $this->System_model->isEnrolled($participant_id, $training_id);
    
        echo json_encode(['enrolled' => $is_enrolled]);
    }

    public function fetchMessages() {
        // Get the training_id from the POST request
        $training_id = $this->input->post('training_id');
    
        if (!$training_id) {
            echo json_encode(['status' => 'error', 'message' => 'Training ID is required.']);
            return;
        }

        if(isset($_POST['participant_id'])){
            $messages = $this->System_model->getMessagesByTraining($training_id, $_POST['participant_id']);

        } else {
            $messages = $this->System_model->getMessagesByTraining($training_id);

        }
    
        // Fetch messages related to the specific training_id
    
        // Return the messages as a JSON response
        echo json_encode(['status' => 'success', 'messages' => $messages]);
    }

    public function getUnreadMessageCount() {
        $training_id = $this->input->post('training_id');
        $participant_id = $this->input->post('participant_id');
    
        // Get unread messages count
        $unread_count = $this->System_model->countUnreadMessages($participant_id, $training_id);
    
        echo json_encode(['unread_count' => $unread_count]);
    }

    public function fetchUnreadCounts() {
        $participant_id = $_SESSION['id'];
    
        // Query to count unread messages per training
        $this->db->select('training_id, COUNT(*) as unread_count');
        $this->db->where('receiver_id', $participant_id);
        $this->db->where('read_status', 0);
        $this->db->group_by('training_id');
        $query = $this->db->get('messages')->result_array();
    
        echo json_encode($query);
    }
    
    public function markMessagesAsRead() {
        $training_id = $this->input->post('training_id');
        $participant_id = $this->input->post('participant_id');
    
        // Mark messages as read
        $this->System_model->markMessagesAsRead($participant_id, $training_id);
    }

    public function markMessagesAsReadParticipant() {
        $participant_id = $_SESSION['id']; // Get logged-in user ID
        $training_id = $this->input->post('training_id');
    
        // Update all unread messages to read
        $this->db->where('receiver_id', $_SESSION['id']);
        $this->db->where('training_id', $training_id);
        $this->db->where('read_status', 0);
        $this->db->update('messages', ['read_status' => 1]);
    
        echo json_encode(["status" => "success"]);
    }
    
    public function send() {
        $sender_id   = $this->input->post('sender_id');
        $receiver_id = $this->input->post('receiver_id');
        $message     = $this->input->post('message');
        $training_id = $this->input->post('training_id');
    
        // Call sendMessage method
        $response = $this->System_model->sendMessage($sender_id, $receiver_id, $message, $training_id);

        // Return the response to the front end
        echo json_encode($response);
    }

    public function submit(){
        $response = array();
    
        // Set validation rules for form inputs
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Return validation errors
            $response['success'] = false;
            $response['error']   = validation_errors();
        } else {
            // Retrieve reCAPTCHA response
            $recaptchaResponse = $this->input->post('g-recaptcha-response');
            $secretKey         = '6Lf_498qAAAAACxIkIAGCCNzfAqDweDlE_tBOrvY'; // Your secret key
            $userIP            = $this->input->ip_address();
    
            // Prepare data for verification
            $postData = http_build_query([
                'secret'   => $secretKey,
                'response' => $recaptchaResponse,
                'remoteip' => $userIP
            ]);
    
            $opts = [
                'http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postData
                ]
            ];
    
            $context    = stream_context_create($opts);
            $result     = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
            $resultJson = json_decode($result);
    
            if (!$resultJson->success) {
                // reCAPTCHA verification failed
                $response['success'] = false;
                $response['error']   = 'reCAPTCHA verification failed. Please try again.';
            } else {
                // Process form data since reCAPTCHA is valid
                $data = [
                    'name'       => $this->input->post('name'),
                    'email'      => $this->input->post('email'),
                    'message'    => $this->input->post('message'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
    
                // Load and initialize the email library
                $this->load->library('email');
    
                $config['wordwrap']   = TRUE;
                $config['protocol']   = 'smtp';
                $config['smtp_host']  = 'ssl://smtp.gmail.com';
                $config['smtp_user']  = 'konozubadoh@gmail.com';
                $config['smtp_pass']  = 'dacdznqsvhxgqclp';
                $config['smtp_port']  = '465';
                $config['mailtype']   = 'html';
                
                $this->email->initialize($config);
    
                $this->email->from('konozubadoh@gmail.com', 'InfoAcademy');
                $this->email->to('konozubadoh@gmail.com');
                $this->email->subject('Contact Us form!');
                // Customize your email message as needed
                $this->email->message("Dear InfoAcademy,<br><br>Thank you for your message:<br>" . nl2br($data['message']) . "<br><br>Best regards,<br>".$data['name']."<br>".$data['email']);
    
                if($this->email->send()){
                    $response['success'] = true;
                    $response['message'] = 'Thank you for your comment!';
                } else {
                    $response['success'] = false;
                    $response['error']   = 'There was a problem sending the email. Please try again later.';
                }
            }
        }
    
        // Return JSON response for AJAX
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    
    
}
