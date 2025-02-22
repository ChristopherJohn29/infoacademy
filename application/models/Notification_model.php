<?php
class Notification_model extends CI_Model {

    // Retrieve notifications for a specific user
    public function get_notifications($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('notifications');
        return $query->result();
    }

    // Add a new notification
    public function add_notification($data) {
        $this->db->insert('notifications', $data);
        return $this->db->insert_id();
    }

    // Mark a notification as read
    public function mark_as_read($id) {
        $this->db->where('id', $id);
        $this->db->update('notifications', array('read_status' => 1));
    }
}
