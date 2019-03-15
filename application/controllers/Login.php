<?php
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->helper('url');
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
     * Validate that weather user is exist with the given password and email id
     * if yes then echo 1 and the one of the view method admin_view() and user_view() is called using ajax (in script.js) based on the role_id.  
     */
    public function login_validation(){
        if($result = $this->Login_model->get_role()) {
            echo $result;
        } else {
            echo FALSE;
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

}

?>