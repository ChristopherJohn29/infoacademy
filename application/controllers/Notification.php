<?php
class Notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('notification_model');
        // Make sure session library is loaded if using session-based authentication
        $this->load->library('session');
    }

    // Returns notifications as JSON (to be used by AJAX calls)
    public function get_notifications() {
        $user_id = $this->session->userdata('user_id'); // adjust based on your auth logic
        $notifications = $this->notification_model->get_notifications($user_id);
        echo json_encode($notifications);
    }

    // Optional: A method to mark a notification as read (triggered by user action)
    public function mark_read($id) {
        $this->notification_model->mark_as_read($id);
        echo json_encode(['status' => 'success']);
    }
}
