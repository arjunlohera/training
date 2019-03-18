<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * Get role method checks whether the user with the provided email and password is available or not
     * if yes then it return the role_id of that person 
     * if no than retrun false
     * role_id = 1 for Admin and 2 for User
     */

    public function get_role() {
        $email = $this->input->post('email');
        $password = $this->input->post('pwd');
        $query = $this->db->get_where('User_info', array('email' => $email, 'pwd' => $password));
        $row = $query->row();
        if(isset($row)){
            return $row->role_id;
        } else {
            return FALSE;
        }

    }
}
?>