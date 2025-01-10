<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trainer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('System_model');
        if (isset($_SESSION['account_type'])) {
            if ($_SESSION['account_type'] == 2) {
            } else {
                redirect('control');
            }
        } else {
            redirect('control');
        }
    }

    public function addCollaborator()
    {
        if ($_POST['training_id']) {
            $collaborator = $_POST['collaborator'];
            $data['id'] = html_escape($_POST['training_id']);
            $data['collaborator1'] = isset($collaborator[0]) ? html_escape($collaborator[0]) : '';
            $data['collaborator2'] = isset($collaborator[1]) ? html_escape($collaborator[1]) : '';

            if ($this->System_model->updateCollaborator($data)) {
                redirect('trainer/dashboard');
            }
        }
    }

    public function dashboard()
    {
        $user_id = $_SESSION['id'];
        $data['user'] = $this->System_model->getUserData($user_id);
        $data['trainer'] = $this->System_model->getTrainerProfile($user_id);

        $this->load->view('trainer/dashboard',$data);
    }

    public function profile()
    {
        $user_id = $_SESSION['id'];
        $data['trainer'] = $this->System_model->getTrainerProfile($user_id);
    
        

        $this->load->view('trainer/profile',$data);
    }

    public function createTraining()
    {
        $this->load->view('trainer/create_training');
    }

    public function classroom()
    {
        if (isset($_GET['id'])) {
            $this->load->view('trainer/classroom');
        }
    }

    public function submitTraining()
    {
        if (isset($_POST)) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx';
            $this->load->library('upload', $config);
            $error_check = 0;
            if (!$this->upload->do_upload('banner')) {
                $error = array('error' => $this->upload->display_errors());
                $banner = '';
            } else {
                $file = array('upload_data' => $this->upload->data());
                $banner = $file['upload_data']['file_name'];
            }

            $instruction = array();
            $instruction_description = html_escape($_POST['instruction']);
            $instruction_section = html_escape($_POST['section']);
            $instruction_percentage = html_escape($_POST['percentage']);

            $count = 0;
            foreach ($instruction_description as $instruction_value) {
                $instruction[$count]['description'] = $instruction_value;
                $instruction[$count]['section'] = $instruction_section[$count];
                $instruction[$count]['percentage'] = $instruction_percentage[$count];
                $instruction[$count]['completed'] = 0;
                $count = $count + 1;
            }

            $video = array();
            if (isset($_POST['video_title'])){
                $video_title = html_escape($_POST['video_title']);
                $video_url = html_escape($_POST['video_url']);

                $count = 0;
                foreach ($video_title as $video_value) {
                    $video[$count]['title'] = $video_value;
                    $video[$count]['url'] = $video_url[$count];
                    $count = $count + 1;
                }
            }

            $workshop = array();
            if(isset($_POST['workshop_title'])){
                $workshop_title = html_escape($_POST['workshop_title']);

                $count = 0;
                $file_count = 1;
                foreach ($workshop_title as $workshop_value) {
                    $workshop[$count]['title'] = $workshop_value;

                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx';
                    $this->load->library('upload', $config);
                    $error_check = 0;
                    if (!$this->upload->do_upload('workshop_file_' . $file_count)) {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump('workshop error');
                        exit;
                        $workshop[$count]['file'] = $error;
                    } else {
                        $file = array('upload_data' => $this->upload->data());
                        $workshop[$count]['file'] = $file['upload_data']['file_name'];
                    }

                    $file_count = $file_count + 1;
                    $count++;

                }
            }




            $examination = array();

            if(isset($_POST['examination_title'])){
                $examination_title = html_escape($_POST['examination_title']);

                $count = 0;
                $file_count = 1;
                foreach ($examination_title as $examination_value) {
                    $examination[$count]['title'] = $examination_value;

                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx';
                    $this->load->library('upload', $config);
                    $error_check = 0;
                    if (!$this->upload->do_upload('examination_file_' . $file_count)) {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump('exam error');
                        exit;
                        $examination[$count]['file'] = $error;
                    } else {
                        $file = array('upload_data' => $this->upload->data());
                        $examination[$count]['file'] = $file['upload_data']['file_name'];
                    }

                    $file_count = $file_count + 1;
                    $count++;

                }

            }


            $references = array();
            $references_title = html_escape($_POST['reference_title']);
            $references_url = html_escape($_POST['reference_url']);

            $count = 0;
            foreach ($references_title as $references_value) {
                $references[$count]['title'] = $references_value;
                $references[$count]['url'] = $references_url[$count];
                $count = $count + 1;
            }

            $category_id = html_escape($_POST['category']);
            $subcategory = html_escape($_POST['subcategory']);

            $data = [
                'training_title' => html_escape($_POST['training_title']),
                'required_no_of_hours' => html_escape($_POST['required_no_of_hours']),
                'validity' => html_escape($_POST['validity']),
                'level' => html_escape($_POST['level']),
                'language' => html_escape($_POST['language']),
                'description' => html_escape($_POST['description']),
                'requirements' => html_escape($_POST['requirements']),
                'target_participant' => html_escape($_POST['target_participant']),
                'banner' => html_escape($banner),
                'instruction' => json_encode(html_escape($instruction)),
                'video' => json_encode(html_escape($video)),
                'workshop' => json_encode(html_escape($workshop)),
                'examination' =>json_encode(html_escape($examination)),
                'ref' => json_encode(html_escape($references)),
                'author_id' => $_SESSION['id'],
                'category_id' => $category_id,
                'subcategory' => $subcategory
            ];

            if ($this->System_model->saveTraining($data)) {
                redirect('trainer/dashboard');
            } else {
                redirect('trainer/createTraining');
            }

        }
    }

    public function get_subcategories_by_category()
    {
        if (isset($_POST['category_id'])) {
            $category_id = $_POST['category_id'];
            $subcategories = $this->System_model->fetchSubcategoriesByCategory($category_id);
            echo json_encode($subcategories);
        }
    }
}
