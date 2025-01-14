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

    public function fetchAllTrainings()
    {
        $this->db->select('*');
        $this->db->from('training');
        $result = $this->db->get()->result_array();

        return $result;
    }



    public function fetchFromTrainingClass($id = false){
        $this->db->select('*');
        $this->db->where('training_id', $id);
        $this->db->where('participant_id', intval($_SESSION['id']));
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

    public function saveCompleted($tid = false){
        $query = array(
            'is_complete' => 1
        );

        $this->db->set($query);
        $this->db->where('training_id', $tid);
        $this->db->where('participant_id', intval($_SESSION['id']));
        return $this->db->update('training_class');
    }

    public function saveExamination($data = array()){
        if ($this->db->insert('examination_data', $data)) {
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
        $this->db->where('email_verify', '1');
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

    public function fetchEnrollees($id = false)
    {
        $this->db->where('training_id', $id);
        $this->db->from('training_class');
        return $this->db->count_all_results();
    }

    public function fetchEnrolleesCompletion($id = false)
    {
        $this->db->where('training_id', $id);
        $this->db->where('status', 3);
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

}
