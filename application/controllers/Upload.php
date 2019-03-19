<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('session');
        }

        public function index()
        {
                $this->load->view('templates/header');
                $this->load->view('Upload_file');
                $this->load->view('templates/footer');
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|txt';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name']            = date('Ymd')."-ID".$this->session->user_id."-".$this->session->fname."-".$this->session->lname."-0";

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('templates/header');
                        $this->load->view('Upload_file', $error);
                        $this->load->view('templates/footer');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $this->load->view('templates/header');
                        $this->load->view('upload_success', $data);
                        $this->load->view('templates/footer');
                }
                }
        }

?>
