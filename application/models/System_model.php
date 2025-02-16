<?php

class System_model extends CI_Model
{
    public function registerModel($data = array())
    {

        if ($this->db->insert('user', $data)) {
            return true;
        }
    }

    public function test()
    {
        $query = $this->db->get('user');
        print_r($query->result());
    }

    public function fetchTrainings($id = false)
    {
        $this->db->select('*');
        $this->db->where('author_id', $id);
        $this->db->from('training');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchTrainingByAuthorAndID($author = false,$id = false)
    {
        $this->db->select('*');
        $this->db->where('author_id', $author);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $this->db->from('training');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchAllTrainings()
    {
        $this->db->select('training.*,CONCAT(user.first_name, " ", user.last_name) as author_name');
        $this->db->from('training');
        $this->db->join('user', 'user.id = training.author_id', 'left');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchAllTrainingClass()
    {
        $this->db->select('
            training_class.*,
            CONCAT(user.first_name, " ", user.last_name) as participant_name,
            training.training_title
        ');
        $this->db->from('training_class');
        $this->db->join('user', 'user.id = training_class.participant_id', 'left');
        $this->db->join('training', 'training.id = training_class.training_id', 'left');

        $result = $this->db->get()->result_array();

        return $result;
    }

    
    public function get_participant_data($participantId, $trainingId) {
        // Query to fetch the participant's data
        $this->db->select('
            training_class.*,
            CONCAT(user.first_name, " ", user.last_name) as participant_name,
            training.training_title
        ');
        $this->db->from('training_class');
        $this->db->where('participant_id', $participantId);
        $this->db->where('training_id', $trainingId);
        $this->db->where('is_complete', 1);
        $this->db->join('user', 'user.id = training_class.participant_id', 'left');
        $this->db->join('training', 'training.id = training_class.training_id', 'left');
        
        $query = $this->db->get();
        
        // Return the result as an associative array
        return $query->row_array();
    }

    public function fetchFromTrainingClass($id = false){
        $this->db->select('*');
        $this->db->where('training_id', $id);
        $this->db->where('participant_id', intval($_SESSION['id']));
        $this->db->from('training_class');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function getExaminationData($training_id, $step) {
        $participant_id = $_SESSION['id']; // Get participant ID from session
    
        // Fetch examination data for the participant
        $this->db->select('*');
        $this->db->from('examination_data');
        $this->db->where('training_id', $training_id);
        $this->db->where('step', $step);
        $this->db->where('participant_id', $participant_id);
        $query = $this->db->get();
    
        return $query->result_array(); // Return as an array
    }

    public function getWorkshopData($training_id, $step) {
        $participant_id = $_SESSION['id']; // Get participant ID from session
    
        // Fetch workshop data for the participant
        $this->db->select('*');
        $this->db->from('workshop_data');
        $this->db->where('training_id', $training_id);
        $this->db->where('step', $step);
        $this->db->where('participant_id', $participant_id);
        $query = $this->db->get();
    
        return $query->result_array(); // Return as an array
    }

    public function fetchClassByTrainingID($id = false){
        $this->db->select('training_class.*, user.first_name, user.last_name, training.author_id');
        $this->db->where('training_id', $id);
        $this->db->join('user', 'user.id = training_class.participant_id', 'left');
        $this->db->join('training', 'training.id = training_class.training_id', 'left');
        $this->db->from('training_class');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function saveFromTrainingClass($id = false, $instruction = ''){

        $query = array(
            'training_instruction' => $instruction
        );

        $this->db->set($query);
        $this->db->where('training_id', $id);
        $this->db->where('participant_id', intval($_SESSION['id']));
        return $this->db->update('training_class');

    }

    public function saveCompleted($tid = false)
    {
        if (!$tid) {
            return false; // Prevent processing if $tid is not provided
        }

        $participant_id = intval($_SESSION['id']);

        // Check if the record is already marked as complete
        $this->db->select('is_complete');
        $this->db->from('training_class');
        $this->db->where('training_id', $tid);
        $this->db->where('participant_id', $participant_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->is_complete == 1) {
                return false; // Already marked as complete, no update needed
            }
        }

        // Proceed with update if not already completed
        $manilaTime = new DateTime("now", new DateTimeZone('Asia/Manila'));
        $date = $manilaTime->format('Y-m-d');

        $updateData = [
            'is_complete' => 1,
            'date_completed' => $date
        ];

        $this->db->set($updateData);
        $this->db->where('training_id', $tid);
        $this->db->where('participant_id', $participant_id);
        
        return $this->db->update('training_class');
    }


    public function saveExamination($data = array()){
        if ($this->db->insert('examination_data', $data)) {
            return true;
        } else {
            return 0;
        }
    }

    public function saveWorkshop($data = array()){
        if ($this->db->insert('workshop_data', $data)) {
            return true;
        } else {
            return 0;
        }
    }

    public function fetchAllPublishedTrainings()
    {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->from('training');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchAllPublishedTrainingsByCategory($id = 0)
    {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('category_id', $id);
        $this->db->from('training');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchAllPublishedTrainingsBySearch($subcategory, $category, $searchTerm)
    {
        $this->db->select('*');
        $this->db->from('training');
        
        // Apply search term filtering
        if (!empty($searchTerm)) {
            $this->db->like('training_title', html_escape($searchTerm), 'both', FALSE);
        }
        
        // Apply category filtering
        if ($category != '0') {
            $this->db->where('category_id', $category);
        }
        
        // Apply subcategory filtering
        if ($subcategory != '0') {
            $this->db->where('subcategory', $subcategory);
        }
        
        $this->db->where('status', 1);  // assuming you only want published trainings
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function fetchAllCoupon(){

        $this->db->select('*');
        $this->db->from('coupon');
        return $this->db->get()->result_array();

    }
    
    public function fetchAllCategories(){
        $this->db->select('*');
        $this->db->from('categories');
        return $this->db->get()->result_array();
    }

    public function fetchCompanyUsingId($id = 1){
        $this->db->select('company_name');
        $this->db->where('id', $id);
        $this->db->from('company');
        $name = $this->db->get()->result_array();
        return $name[0]['company_name'];
    }

    public function fetchTrainingUsingId($id = 1){
        $this->db->select('training_title');
        $this->db->where('id', $id);
        $this->db->from('training');
        $name = $this->db->get()->result_array();

        return $name[0]['training_title'];

    }


    public function updateCollaborator($data = array())
    {
        $this->db->set('collaborator1', $data['collaborator1']);
        $this->db->set('collaborator2', $data['collaborator2']);
        $this->db->where('id', $data['id']);
        return $this->db->update('training');
    }

    public function duplicateChecker($check = array())
    {
        foreach ($check as $key => $value) {
            $this->db->where($key, $value);
        }

        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function verificationCheck($check = array())
    {
        foreach ($check as $key => $value) {
            $this->db->where($key, $value);
        }

        $this->db->where('account_status', '0');

        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function verifyUser($verification_code)
    {
        $query = array(
            'account_status' => '1'
        );
        $this->db->set($query);
        $this->db->where('verification_code', $verification_code);
        return $this->db->update('user');
    }

    public function fetchLogin($data = array())
    {
        $this->db->select('*');
        $this->db->where('username', $data['username']);
        $this->db->where('account_status', '1');
        $this->db->from('user');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchTrainingClass($id = false)
    {
        $this->db->select('*');
        $this->db->where('participant_id', $id);
        $this->db->from('training_class');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchAllStatusSingleTraining($id = false)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('training');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchTrainerProfile($id = false){
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $this->db->from('trainer_profile');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function getUserData($user_id)
    {
        return $this->db->get_where('user', ['id' => $user_id])->row_array();
    }

    public function getTrainerProfile($user_id)
    {
        return $this->db->get_where('trainer_profile', ['user_id' => $user_id])->row_array();
    }

    public function update_user($user_id, $user_data) {
        $this->db->where('id', $user_id);
        $this->db->update('user', $user_data);
        return $this->db->affected_rows() > 0; // Returns true if update was successful
    }
    
    public function update_trainer($user_id, $trainer_data) {
        $this->db->where('user_id', $user_id);
        $this->db->update('trainer_profile', $trainer_data);
        return $this->db->affected_rows() > 0; // Returns true if update was successful
    }
    
    public function fetchSingleTraining($id = false)
    {
        $this->db->select('
            training.*, 
            categories.category_name AS category_name, 
            sub_categories.name AS sub_category_name
        ');
        $this->db->from('training');
        $this->db->join('categories', 'categories.id = training.category_id', 'left');
        $this->db->join('sub_categories', 'sub_categories.id = training.subcategory', 'left');
        $this->db->where('training.id', $id);
        $this->db->where('training.status', '1');
    
        $result = $this->db->get()->result_array();
        return $result;
    }
    
    public function enrollSubmit($data = array())
    {
        if ($this->db->insert('training_class', $data)) {
            return true;
        }

    }

    public function saveTraining($data = array())
    {
        if ($this->db->insert('training', $data)) {
            return true;
        }

    }

    public function updateTraining($training_id, $data = array())
    {
        // Ensure the $training_id is provided
        if (empty($training_id)) {
            return false;
        }

        // Update the training record in the database
        $this->db->where('id', $training_id);
        if ($this->db->update('training', $data)) {
            return true;
        }

        // Return false if the update fails
        return false;
    }

    public function get_training_by_id($id)
    {
        // Ensure the ID is sanitized
        $this->db->where('id', $id);

        // Fetch the training data
        $query = $this->db->get('training');

        // Check if a result exists
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the result as an associative array
        } else {
            return false; // Return false if no data is found
        }
    }


    public function fetchEnrollees($id = false)
    {
        $this->db->where('training_id', $id);
        $this->db->from('training_class');
        return $this->db->count_all_results();
    }

    public function fetchEnrolleesCompletion($id = false)
    {
        $this->db->where('training_id', $id);
        $this->db->where('status', 1);
        $this->db->where('is_complete', 1);
        $this->db->from('training_class');
        return $this->db->count_all_results();
    }

    public function validateEnrollTraining($training_id = 0, $participant_id = 0)
    {
        $this->db->where('training_id', $training_id);
        $this->db->where('participant_id', $participant_id);
        $this->db->where('status !=', 2); // Exclude status 2
        $this->db->from('training_class');
        return $this->db->count_all_results();
    }

    public function fetchTrainer($id = false)
    {
        $this->db->select('user.*, trainer_profile.key_competencies, trainer_profile.educational_background, trainer_profile.employment_history, trainer_profile.position, trainer_profile.photo');
        $this->db->from('user');
        $this->db->join('trainer_profile', 'trainer_profile.user_id = user.id', 'left');
        $this->db->where('user.id', $id);
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function fetchTrainers($id = false)
    {
        $this->db->select('*');
        $this->db->where('account_status', '1');
        $this->db->where('account_type', '2');
        $this->db->where('email_verify', '1');
        $this->db->where('id !=', $_SESSION['id']);
        $this->db->from('user');
        $result = $this->db->get()->result_array();

        return $result;
    }

      public function fetchAllTrainers($id = false)
    {
        $this->db->select('*');
        $this->db->where('account_type', '2');
        $this->db->from('user');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function saveCategory($categoryName) {
        $data = [
            'category_name' => $categoryName,
            'created_at' => date('Y-m-d H:i:s') // Optional: Add a created timestamp
        ];

        // Insert into the database
        return $this->db->insert('categories', $data);
    }

    public function updateCategory($id, $name) {
        $this->db->where('id', $id);
        return $this->db->update('categories', ['category_name' => $name]);
    }
    
    public function deleteCategory($id) {
        $this->db->where('id', $id);
        return $this->db->delete('categories');
    }

    public function fetchAllSubCategories() {
        $this->db->select('sub_categories.*, categories.category_name');
        $this->db->from('sub_categories');
        $this->db->join('categories', 'categories.id = sub_categories.category_id');
        return $this->db->get()->result_array();
    }

    
    // Add a subcategory
    public function addSubCategory($categoryId, $name) {
        $data = [
            'category_id' => $categoryId,
            'name' => $name
        ];
        return $this->db->insert('sub_categories', $data);
    }

    // Update a subcategory
    public function updateSubCategory($id, $name) {
        $data = ['name' => $name];
        $this->db->where('id', $id);
        return $this->db->update('sub_categories', $data);
    }

    // Delete a subcategory
    public function deleteSubCategory($id) {
        return $this->db->delete('sub_categories', ['id' => $id]);
    }
    
    public function fetchSubCategoriesByCategory($categoryId) {
        $this->db->select('id, name');
        $this->db->from('sub_categories');
        $this->db->where('category_id', $categoryId);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function update_payment_status($payment_id, $data) {
        
        // Use active record to update the table
        $this->db->where('id', $payment_id);
        $this->db->update('training_class', $data);

        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function getMessagesByTraining($training_id) {
        $user_id = intval($_SESSION['id']); // Store session user ID for cleaner code
    
        // Retrieve all messages for the given training_id where the user is either sender or receiver
        $this->db->where('training_id', $training_id);
        
        // Use manual grouping for OR conditions in CodeIgniter 3
        $this->db->where("(sender_id = {$user_id} OR receiver_id = {$user_id})");
    
        $this->db->order_by('timestamp', 'ASC'); // Optional: Order messages by timestamp (oldest first)
        $query = $this->db->get('messages');
        
        // Return the result as an array
        return $query->result_array();
    }    
    
    public function isEnrolled($participant_id, $training_id) {
        // Check if the participant is enrolled in the specified training
        $this->db->where('participant_id', $participant_id);
        $this->db->where('training_id', $training_id);
        $query = $this->db->get('training_class');
        
        // Return true if enrolled, otherwise false
        return $query->num_rows() > 0;
    }

    public function sendMessage($sender_id, $receiver_id, $message, $training_id) {
        // Check if the sender is the trainer (author)
        $this->db->select('author_id');
        $this->db->where('id', $training_id);  // Get the training details by training_id
        $query = $this->db->get('training');
    
        $trainer = $query->row();  // Fetch the result
    
        if (!$trainer) {
            // If training doesn't exist, return error
            return ['status' => 'error', 'message' => 'Training not found.'];
        }
    
        // If the sender is the trainer (author), we skip the enrollment check
        if ($sender_id == $trainer->author_id) {
            // Trainer is always allowed to send messages
            return $this->insertMessage($sender_id, $receiver_id, $message, $training_id);
        }
    
        // If the sender is a participant, check if they are enrolled in the training
        if (!$this->isEnrolled($sender_id, $training_id)) {
            // If the participant is not enrolled, return an error
            return ['status' => 'error', 'message' => 'You must be enrolled in this training to send a message.'];
        }
    
        // Otherwise, insert the message
        return $this->insertMessage($sender_id, $receiver_id, $message, $training_id);
    }
    
    // Helper method to insert the message into the database
    private function insertMessage($sender_id, $receiver_id, $message, $training_id) {

        $manilaTime = new DateTime("now", new DateTimeZone('Asia/Manila'));

        // Format it for the database
        $timestamp = $manilaTime->format('Y-m-d H:i:s');
        // Prepare data for insertion into the 'messages' table
        $data = [
            'sender_id'   => $sender_id,   // ID of the sender (trainer or participant)
            'receiver_id' => $receiver_id, // ID of the receiver (trainer or participant)
            'training_id' => $training_id, // ID of the training session
            'message'     => $message,      // Message content
            'timestamp'   => $timestamp
        ];
    
        // Insert the message into the 'messages' table
        $this->db->insert('messages', $data);
    
        // Return success response
        return ['status' => 'success', 'message' => 'Message sent successfully.'];
    }
}
