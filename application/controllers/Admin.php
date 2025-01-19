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

            $training_id = $this->input->get('tid'); 
            $data['training_data'] = $this->System_model->get_training_by_id($training_id);

            $this->load->view('admin/single_training', $data);
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

    public function category()
    {
        $data['categories'] =  $this->System_model->fetchAllCategories();
        $data['sub_categories'] = $this->System_model->fetchAllSubCategories();
        $this->load->view('admin/category', $data);
    }

    public function trainer()
    {
        $this->load->view('admin/trainer');
    }

    public function systemControl()
    {
        $this->load->view('admin/system');
    }

     // Method to handle form submission
     public function submitCategory() {
        // Get the category name from POST request
        $categoryName = $this->input->post('categoryName', TRUE);

        // Validate the input
        if (empty($categoryName)) {
            $response = ['status' => 'error', 'message' => 'Category name is required.'];
            echo json_encode($response);
            return;
        }

        // Save the category using the model
        $isSaved = $this->System_model->saveCategory($categoryName);

        // Prepare response
        if ($isSaved) {
            $response = ['status' => 'success', 'message' => 'Category saved successfully!'];
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to save category. Please try again.'];
        }

        echo json_encode($response);
    }

    public function updateCategory() {
        $categoryId = $this->input->post('category_id');
        $categoryName = $this->input->post('category_name');
    
        if (empty($categoryId) || empty($categoryName)) {
            echo json_encode(['status' => 'error', 'message' => 'Category ID and name are required.']);
            return;
        }
    
        $result = $this->System_model->updateCategory($categoryId, $categoryName);
    
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Category updated successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update category.']);
        }
    }
    
    public function deleteCategory() {
        $categoryId = $this->input->post('id');
    
        if (empty($categoryId)) {
            echo json_encode(['status' => 'error', 'message' => 'Category ID is required.']);
            return;
        }
    
        $result = $this->System_model->deleteCategory($categoryId);
    
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete category.']);
        }
    }

    // Add a new subcategory
    public function addSubCategory() {
        $categoryId = $this->input->post('category_id');
        $name = $this->input->post('name');
        $this->System_model->addSubCategory($categoryId, $name);
        echo json_encode(['status' => 'success', 'message' => 'Subcategory added successfully']);
    }

    // Update a subcategory
    public function updateSubCategory() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $this->System_model->updateSubCategory($id, $name);
        echo json_encode(['status' => 'success', 'message' => 'Subcategory updated successfully']);
    }

    // Delete a subcategory
    public function deleteSubCategory() {
        $id = $this->input->post('id');
        $this->System_model->deleteSubCategory($id);
        echo json_encode(['status' => 'success', 'message' => 'Subcategory deleted successfully']);
    }

    public function submit_training() {
        // Get form data
        $training_id = $this->input->post('tid');
        $training_fee = $this->input->post('training_fee');
        $approval_status = $this->input->post('approval_status');
        $notes = $this->input->post('notes');

        // Prepare data for insertion/update
        $data = [
            'training_fee' => $training_fee,
            'status' => $approval_status,
            'notes' => $notes,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Save to database
        if ($this->System_model->updateTraining($training_id, $data)) {
            // Success message
            $this->session->set_flashdata('success', 'Training details updated successfully.');
            redirect('admin/trainings');
        } else {
            // Error message
            $this->session->set_flashdata('error', 'Failed to update training details. Please try again.');
            redirect('admin/training/?tid='.$training_id);
        }

        // Redirect to the desired page (e.g., training list)
       
    }
    

}
