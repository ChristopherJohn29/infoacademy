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
        $data['user'] = $this->System_model->getUserData($user_id);
        $data['trainer'] = $this->System_model->getTrainerProfile($user_id);
    
        

        $this->load->view('trainer/profile',$data);
    }

    public function updateExamStatus() {
        $exam_id = $this->input->post('exam_id');
        $action = $this->input->post('action');  // 'accept' or 'decline'
        $remarks = $this->input->post('remarks');
        $participant_id = $this->input->post('participant_id'); // Get participant_id
        $training_id = $this->input->post('training_id');       // Get training_id
        
        // Check if the exam exists and update the status
        $this->db->where('id', $exam_id);
        $examData = $this->db->get('examination_data')->row_array();
        
        if ($examData) {
            // Determine the new status based on action (accept or decline)
            $status = ($action == 'accept') ? '1' : '3';
            
            // Prepare the data to update the exam status and remarks
            $data = [
                'status' => $status,
                'remarks' => $remarks // Save remarks if provided
            ];
    
            // Update the exam status and remarks in the database
            $this->db->where('id', $exam_id);
            $this->db->update('examination_data', $data);
            
            // Fetch the training class for the participant
            $this->db->where('participant_id', $participant_id);
            $this->db->where('training_id', $training_id);
            $trainingClass = $this->db->get('training_class')->row_array();

            if ($trainingClass && isset($trainingClass['training_instruction'])) {
                // Decode the JSON data from training_instruction field
                $trainingInstruction = json_decode($trainingClass['training_instruction'], true);
                
                // Get the step position from $examData
                $stepPosition = (int)$examData['step']; // 
                
                // Check if the position exists in the array
                if (isset($trainingInstruction[$stepPosition])) {
                    // Update the 'completed' field for the relevant step
                    if ($action == 'accept') {
                        $trainingInstruction[$stepPosition]['completed'] = 1;  // Mark it as completed (since we accepted the exam)
                    } else {
                        $trainingInstruction[$stepPosition]['completed'] = 0;  
                    }
                    // Encode the updated training_instruction array back to JSON
                    $updatedTrainingInstruction = json_encode($trainingInstruction);
                    
                    // Update the training_instruction field in the database
                    $this->db->set('training_instruction', $updatedTrainingInstruction);
                    $this->db->where('participant_id', $participant_id);
                    $this->db->where('training_id', $training_id);
                    $this->db->update('training_class');
                }
            }

            // Respond with success
            echo json_encode(['success' => true]);
        } else {
            // Respond with failure if exam not found
            echo json_encode(['success' => false, 'message' => 'Exam not found']);
        }
    }

    public function updateWorkshopStatus() {
        $workshop_id = $this->input->post('workshop_id');
        $action = $this->input->post('action');  // 'accept' or 'decline'
        $remarks = $this->input->post('remarks');
        $participant_id = $this->input->post('participant_id'); // Get participant_id
        $training_id = $this->input->post('training_id');       // Get training_id
        
        // Check if the workshop exists and update the status
        $this->db->where('id', $workshop_id);
        $workshopData = $this->db->get('workshop_data')->row_array();
        
        if ($workshopData) {
            // Determine the new status based on action (accept or decline)
            $status = ($action == 'accept') ? '1' : '3';
            
            // Prepare the data to update the workshop status and remarks
            $data = [
                'status' => $status,
                'remarks' => $remarks // Save remarks if provided
            ];
    
            // Update the workshop status and remarks in the database
            $this->db->where('id', $workshop_id);
            $this->db->update('workshop_data', $data);
            
            // Fetch the training class for the participant
            $this->db->where('participant_id', $participant_id);
            $this->db->where('training_id', $training_id);
            $trainingClass = $this->db->get('training_class')->row_array();

            if ($trainingClass && isset($trainingClass['training_instruction'])) {
                // Decode the JSON data from training_instruction field
                $trainingInstruction = json_decode($trainingClass['training_instruction'], true);
                
                // Get the step position from $workshopData
                $stepPosition = (int)$workshopData['step']; // 
                
                // Check if the position exists in the array
                if (isset($trainingInstruction[$stepPosition])) {
                    // Update the 'completed' field for the relevant step
                    if ($action == 'accept') {
                        $trainingInstruction[$stepPosition]['completed'] = 1;  // Mark it as completed (since we accepted the workshop)
                    } else {
                        $trainingInstruction[$stepPosition]['completed'] = 0;  
                    }
                    // Encode the updated training_instruction array back to JSON
                    $updatedTrainingInstruction = json_encode($trainingInstruction);
                    
                    // Update the training_instruction field in the database
                    $this->db->set('training_instruction', $updatedTrainingInstruction);
                    $this->db->where('participant_id', $participant_id);
                    $this->db->where('training_id', $training_id);
                    $this->db->update('training_class');
                }
            }

            // Respond with success
            echo json_encode(['success' => true]);
        } else {
            // Respond with failure if workshop not found
            echo json_encode(['success' => false, 'message' => 'Workshop not found']);
        }
    }
    

    public function update_profile() {
        $user_id = $_SESSION['id'];
        $user_data = array(
            'first_name'        => $this->input->post('first_name'),
            'middle_name'       => $this->input->post('middle_name'),
            'last_name'         => $this->input->post('last_name'),
            'street_number'     => $this->input->post('street_number'),
            'street_name'       => $this->input->post('street_name'),
            'barangay'          => $this->input->post('barangay'),
            'city'              => $this->input->post('city'),
            'region'            => $this->input->post('region'),
            'zip_code'          => $this->input->post('zip_code'),
            'email_address'     => $this->input->post('email_address'),
            'mobile_number'     => $this->input->post('mobile_number'),
            'sex'               => $this->input->post('sex'),
            'marital_status'    => $this->input->post('marital_status'),
        );
    
        $trainer_data = array(
            'position'  => $this->input->post('position'),
            'key_competencies'  => $this->input->post('key_competencies'),
            'educational_background' => $this->input->post('educational_background'),
            'employment_history' => $this->input->post('employment_history'),
        );
    
        // Debugging - log the data to check if they are correctly received

        // Handle profile photo
        if ($_FILES['photo']['name']) {
            $upload_path = 'uploads/';
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
            // Generate a unique name for the uploaded file using timestamp or uniqid
            $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $new_file_name = uniqid('trainer_', true) . '.' . $file_extension;
        
            // Set the new file name in the upload configuration
            $config['file_name'] = $new_file_name;
        
            $this->load->library('upload', $config);
        
            if ($this->upload->do_upload('photo')) {
                $file_data = $this->upload->data();
                $trainer_data['photo'] = $file_data['file_name']; // Save the new file name in the database
            } else {
                log_message('debug', 'Upload error: ' . $this->upload->display_errors());
            }
        }
    
        // Update user data
        $user_updated = $this->System_model->update_user($user_id, $user_data);
    
        // Update trainer profile data
        $trainer_updated = $this->System_model->update_trainer($user_id, $trainer_data);
    
        if ($user_updated || $trainer_updated) {
            echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No changes made.']);
        }
    }
    

    public function createTraining()
    {
        $this->load->view('trainer/create_training');
    }

    public function classroom()
    {
        if (isset($_GET['id'])) {
            
            $training = $this->System_model->fetchTrainingByAuthorAndID($_SESSION['id'], $_GET['id']);

            if(empty($training)){
                redirect('trainer/dashboard');
            }

            $training_class = $this->System_model->fetchClassByTrainingID($_GET['id']);

            foreach ($training_class as &$class) {
                $class['exam_status'] = $this->getExamStatus($class['training_instruction']);
                $class['workshop_status'] = $this->getWorkshopStatus($class['training_instruction']);
            }
    
            // Pass the training class data with the exam status to the view
            $data['training_class'] = $training_class;

            $this->load->view('trainer/classroom', $data);
        }
    }

    public function getWorkshopStatus($training_instruction_json) {
        $training_instruction = json_decode($training_instruction_json, true);
        $allCompleted = true;
        $hasChecking = false;

        foreach ($training_instruction as $instruction) {
            if ($instruction['section'] == 'workshop') {
                if ($instruction['completed'] == 2) {
                    $hasChecking = true;
                    break;
                }
                if ($instruction['completed'] != 1) {
                    $allCompleted = false;
                }
            }
        }

        if ($hasChecking) {
            return "for checking";
        } elseif ($allCompleted) {
            return "completed";
        } else {
            return "No New file to check";
        }
    }

    public function getExamStatus($training_instruction_json) {
        // Decode the JSON string to an array
        $training_instruction = json_decode($training_instruction_json, true);

        // Initialize variables for checking conditions
        $allCompleted = true;
        $hasChecking = false;

        // Loop through each instruction
        foreach ($training_instruction as $instruction) {
            if ($instruction['section'] == 'examination') {
                // If the completed status is 2, mark for checking
                if ($instruction['completed'] == 2) {
                    $hasChecking = true;
                    break;  // No need to continue looping if we find a "for checking" case
                }

                // If any section is not completed (i.e., not 1), set allCompleted to false
                if ($instruction['completed'] != 1) {
                    $allCompleted = false;
                }
            }
        }

        // Determine the message based on the flags
        if ($hasChecking) {
            return "for checking";
        } elseif ($allCompleted) {
            return "completed";
        } else {
            return "No New file to check";
        }
    }

    public function fetchExamData() {
        $training_id = $this->input->post('training_id');
        $participant_id = $this->input->post('participant_id');
    
        // Fetch all examination data for the participant
        $this->db->select('*');
        $this->db->from('examination_data');
        $this->db->where('training_id', $training_id);
        $this->db->where('participant_id', $participant_id);
        $query = $this->db->get();
    
        // Check if there are results
        if ($query->num_rows() > 0) {
            $data = $query->result_array();  // Fetch all rows for this participant
    
            // Prepare the response data
            $exam_data = [];
            foreach ($data as $row) {
                $exam_data[] = [
                    'id' => $row['id'],
                    'file_desc' => $row['file_desc'],
                    'examination_file' => $row['examination_file'],
                    'status' => $row['status'],
                    'remarks' => $row['remarks'],
                    'date_submitted' => (new DateTime($row['date_submitted']))->format('F j, Y g:iA'),  // Format date
                ];
            }
    
            echo json_encode(['success' => true, 'data' => $exam_data]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No data found']);
        }
    }

    public function fetchWorkshopData() {
        $training_id = $this->input->post('training_id');
        $participant_id = $this->input->post('participant_id');
    
        // Fetch all examination data for the participant
        $this->db->select('*');
        $this->db->from('workshop_data');
        $this->db->where('training_id', $training_id);
        $this->db->where('participant_id', $participant_id);
        $query = $this->db->get();
    
        // Check if there are results
        if ($query->num_rows() > 0) {
            $data = $query->result_array();  // Fetch all rows for this participant
    
            // Prepare the response data
            $exam_data = [];
            foreach ($data as $row) {
                $exam_data[] = [
                    'id' => $row['id'],
                    'file_desc' => $row['file_desc'],
                    'workshop_file' => $row['workshop_file'],
                    'status' => $row['status'],
                    'remarks' => $row['remarks'],
                    'date_submitted' => (new DateTime($row['date_submitted']))->format('F j, Y g:iA'),  // Format date
                ];
            }
    
            echo json_encode(['success' => true, 'data' => $exam_data]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No data found']);
        }
    }
    

    public function submitTraining()
    {
        if (isset($_POST)) {
            // Banner file upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx';
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('banner')) {
                $error = array('error' => $this->upload->display_errors());
                $banner = '';
            } else {
                $file = array('upload_data' => $this->upload->data());
                $banner = uniqid() . '.' . pathinfo($file['upload_data']['file_name'], PATHINFO_EXTENSION);
                rename($file['upload_data']['full_path'], $file['upload_data']['file_path'] . $banner);
            }

            // Process instruction fields
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
                $count++;
            }

            // Process video fields
            $video = array();
            if (isset($_POST['video_title'])) {
                $video_title = html_escape($_POST['video_title']);
                $video_url = html_escape($_POST['video_url']);

                $count = 0;
                foreach ($video_title as $video_value) {
                    $video[$count]['title'] = $video_value;
                    $video[$count]['url'] = $video_url[$count];
                    $count++;
                }
            }

            // Process workshop files
            $workshop = array();
            if (isset($_POST['workshop_title'])) {
                $workshop_title = html_escape($_POST['workshop_title']);

                $count = 0;
                $file_count = 1;
                foreach ($workshop_title as $workshop_value) {
                    $workshop[$count]['title'] = $workshop_value;

                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx';
                    $this->load->library('upload', $config);
                    
                    if (!$this->upload->do_upload('workshop_file_' . $file_count)) {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump('workshop error');
                        exit;
                        $workshop[$count]['file'] = $error;
                    } else {
                        $file = array('upload_data' => $this->upload->data());
                        $workshop[$count]['file'] = uniqid() . '.' . pathinfo($file['upload_data']['file_name'], PATHINFO_EXTENSION);
                        rename($file['upload_data']['full_path'], $file['upload_data']['file_path'] . $workshop[$count]['file']);
                    }

                    $file_count++;
                    $count++;
                }
            }

            // Process examination files
            $examination = array();
            if (isset($_POST['examination_title'])) {
                $examination_title = html_escape($_POST['examination_title']);

                $count = 0;
                $file_count = 1;
                foreach ($examination_title as $examination_value) {
                    $examination[$count]['title'] = $examination_value;

                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|pdf|pptx|ppt|docx|xls|xlsx|doc|docx';
                    $this->load->library('upload', $config);
                    
                    if (!$this->upload->do_upload('examination_file_' . $file_count)) {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump('exam error');
                        exit;
                        $examination[$count]['file'] = $error;
                    } else {
                        $file = array('upload_data' => $this->upload->data());
                        $examination[$count]['file'] = uniqid() . '.' . pathinfo($file['upload_data']['file_name'], PATHINFO_EXTENSION);
                        rename($file['upload_data']['full_path'], $file['upload_data']['file_path'] . $examination[$count]['file']);
                    }

                    $file_count++;
                    $count++;
                }
            }

            // Process reference fields
            $references = array();
            $references_title = html_escape($_POST['reference_title']);
            $references_url = html_escape($_POST['reference_url']);

            $count = 0;
            foreach ($references_title as $references_value) {
                $references[$count]['title'] = $references_value;
                $references[$count]['url'] = $references_url[$count];
                $count++;
            }

            // Category and Subcategory
            $category_id = html_escape($_POST['category']);
            $subcategory = html_escape($_POST['subcategory']);

            // Save training data
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
                'examination' => json_encode(html_escape($examination)),
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
