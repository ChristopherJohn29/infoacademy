<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->load->model('System_model');
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
        if(isset($_POST['search'])) {
            echo "Test";
            echo $_POST['search'];
            exit;
            $data['trainings'] = $this->System_model->fetchAllPublishedTrainingsBySearch($_POST['search'], $_POST['category']); 
        } else if(isset($_GET['c'])){
            $data['trainings'] = $this->System_model->fetchAllPublishedTrainingsByCategory($_GET['c']); 
        } else  {
            $data['trainings'] = $this->System_model->fetchAllPublishedTrainings();
        }

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
                $_SESSION['redirection'] = '/control/enroll' . html_escape($_GET['tid']);
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
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2000;
                $config['max_width'] = 2000;
                $config['max_height'] = 2000;
                $this->load->library('upload', $config);
                $error_check = 0;

                if (!$this->upload->do_upload('proof_of_payment')) {
                    $error = array('error' => $this->upload->display_errors());
                    $proof_of_payment = '';
                } else {
                    $file = array('upload_data' => $this->upload->data());
                    $proof_of_payment = $file['upload_data']['file_name'];
                }
                $training = $this->System_model->fetchSingleTraining(html_escape($_POST['tid']));
                $instruction = $training[0]['instruction'];

                $data = [
                    'proof_of_payment' => html_escape($proof_of_payment),
                    'payment_option' => html_escape($_POST['payment_option']),
                    'transaction_date' => html_escape($_POST['transaction_date']),
                    'transaction_no' => html_escape($_POST['transaction_no']),
                    'coupon_code' => html_escape($_POST['coupon_code']),
                    'participant_id' => html_escape($_SESSION['id']),
                    'training_id' => html_escape($_POST['tid']),
                    'date_enrolled' => date('Y-m-d'),
                    'training_instruction' => $instruction,
                    'progress' => 0,
                    'status' => 0
                ];

                $success = $this->System_model->enrollSubmit($data);

                if ($success) {
                    redirect('control/participant');
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
                        if ($result[0]['account_type'] == '1') {

                            $_SESSION['id'] = $result[0]['id'];
                            if (isset($_SESSION['redirection'])) {
                                redirect($_SESSION['redirection']);
                            } else {
                                redirect('/control/participant');
                            }

                        } elseif ($result[0]['account_type'] == '2') {
                            $_SESSION['id'] = $result[0]['id'];
                            redirect('/trainer/dashboard');
                        } else {
                            $_SESSION['id'] = $result[0]['id'];
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
                redirect('admin/dashboard');
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

    public function submitExamination()
    {
        if($_POST){
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx';
            $config['max_size'] = 2000;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;
            $this->load->library('upload', $config);
            $error_check = 0;

            if (!$this->upload->do_upload('examination_file')) {
                $error = array('error' => $this->upload->display_errors());
                $examination_file = '';
            } else {
                $file = array('upload_data' => $this->upload->data());
                $examination_file = $file['upload_data']['file_name'];
            }
            $training_id = $_POST['tid'];
            $step = $_POST['step'];

            $training_class = $this->System_model->fetchFromTrainingClass($training_id);
            $instruction = json_decode($training_class[0]['training_instruction']);

//            var_dump();

            if ($instruction[$step]->section == 'examination') {
                $instruction[$step]->completed = 1;
            } else {
                redirect('control');
            }

            $new_instruction = json_encode($instruction);

            $training_class = $this->System_model->saveFromTrainingClass($training_id, $new_instruction);

            $data = array(
                'training_id' => $training_id,
                'step' => $step,
                'examination_file' => $examination_file,
                'participant_id' => intval($_SESSION['id'])
            );

            $saveExamination = $this->System_model->saveExamination(html_escape($data));

            if ($training_class && $saveExamination) {
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
        if (isset($_POST)) {
            $data = html_escape($_POST);
            unset($data['retype_password']);
            unset($data['terms']);
            $data['account_status'] = 0;
            $data['email_verify'] = 0;
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['verification_code'] = uniqid() . '-' . uniqid() . '-' . uniqid();
            $data['creation_date'] = date("Y-m-d h:i:s");

            if ($this->System_model->duplicateChecker(array('username' => $data['username']))) {
                $this->register('<p style="color:red;">Username already exist! Please try again. </p>');
            } elseif ($this->System_model->duplicateChecker(array('email_address' => $data['email_address']))) {
                $this->register('<p style="color:red;">Email already exist! Please try again. </p>');
            } else {
                if ($this->System_model->registerModel($data)) {
                    $this->email->from('infoacademy@infoadvance.com', 'InfoAcademy');
                    $this->email->to($data['email_address']);
                    $this->email->subject('User Verification Code');
                    $this->email->message('To verify your account kindly click this link' . ' ' . base_url() . '/?v=' . $data['verification_code']);
                    $this->email->send();
                    $this->login('<p style="color:green;">Please check your email.</p>');
                } else {
                    $this->login('<p style="color:red;">Error! Please try again. </p>');
                }
            }

        } else {
            redirect('control');
        }
    }
}
