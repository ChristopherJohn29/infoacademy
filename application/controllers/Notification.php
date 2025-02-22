<?php
class Notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Notification_model');
        // Ensure your session library is loaded if you use session-based authentication
        $this->load->library('session');
    }

    // Returns notifications as JSON (for AJAX calls)
    public function get_notifications() {
        $user_id = $this->session->userdata('user_id'); // adjust according to your auth system
        $notifications = $this->Notification_model->get_notifications($user_id);
        echo json_encode($notifications);
    }

    // Mark a notification as read (triggered via user action)
    public function mark_read($id) {
        $this->Notification_model->mark_as_read($id);
        echo json_encode(['status' => 'success']);
    }
}
