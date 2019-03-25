<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * get_row() method checks whether the user with the provided email and password is available or not
     * if yes then it return the related data of that person 
     * if no than retrun false
     */

    public function get_row() {
        $email = $this->input->post('email');
        $password = $this->input->post('pwd');
        $query = $this->db->get_where('User_info', array('email' => $email, 'pwd' => $password));
        $row = $query->row();
        if(isset($row)){
            return $row;
        } else {
            return FALSE;
        }

    }
}
?>