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

    public function fetchAllPublishedTrainingsBySearch($search, $id) {
        $this->db->select('*');
        $this->db->where('status', 1);
    
        if (intval($id) != 0) {
            $this->db->where('category_id', intval($id)); 
        }
    
        // Set escape to FALSE to avoid ESCAPE '!'
        $this->db->like('training_title', html_escape($search), 'both', FALSE);
        
        $this->db->from('training');
        $result = $this->db->get()->result_array();
    
        return $result;
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

    public function fetchSingleTraining($id = false)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('status', '1');
        $this->db->from('training');
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
        $this->db->where('status', 1);
        $this->db->from('training_class');
        return $this->db->count_all_results();
    }

    public function fetchTrainer($id = false)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('user');
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
    
  

}
