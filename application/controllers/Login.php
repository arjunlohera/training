<?php
class Login extends CI_Controller {

    /**
     * Class constructor:
     * loads model, helper and library.
     */
    public function __construct() {
        parent::__construct();
        $helpers = array('url', 'form'); //Add helper name in this array, which you want to load.
        $this->load->model('Login_model');
        $this->load->helper($helpers);
        $this->load->library('session');
    }

    /**
     * Default load method
     */
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('Login_form');
        $this->load->view('templates/footer');
    }

    /**
     * Validate that whether user is exist with the given password and email id
     * if yes then echo 1 and the one of the view method admin_view() and user_view() is called using ajax (in script.js) based on the role_id.  
     * role_id = 1 for Admin and 2 for User and
     * set all the session variable after successfully login.
     */
    public function login_validation(){
        if($result = $this->Login_model->get_row()) {
            /** Setting the session variable */
            $session_vars = array(
                'role_id' => $result->role_id,
                'user_id' => $result->ID,
                'fname' => $result->fname,
                'lname' => $result->lname,
                'is_login' => TRUE
            );
            $this->session->set_userdata($session_vars);
            // $this->session->set_userdata('user_id', $result->ID);

            /**echo role_id for (script.js) file */
            echo $result->role_id;
        } else {
            echo "FALSE";
        }
    }

    /** 
     * To show Admin view after successfully login
     */
    public function admin_view(){
        $this->load->view('templates/header');
        $this->load->view('Admin_home');
        $this->load->view('templates/footer');
    }

    /**
     * To show User view after successfully login
     */
    public function user_view(){
        $this->load->view('templates/header');
        $this->load->view('User_home');
        $this->load->view('templates/footer');
    }

    /**
     * This function log out a user
     * It destroy the current session and redirect to login page
     */
    public function logout(){
        // $this->session->unset_userdata('role_id');
        $this->session->sess_destroy();
        redirect('/', 'location');
    }

}

?>