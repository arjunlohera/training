<?php
/**
 * This controller is to upload files.
 * Date created: 19-03-2019
 * By: Arjun
 */
class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('session');
        }

        public function index()
        {
                // $this->load->view('templates/header');
                $this->load->view('admin/form_dropzone');
                // $this->load->view('templates/footer');
        }

        /**
         * This function is to load the view when File Upload option is selected from sidebar menu
         */
        public function fileinput(){
                $this->load->view('admin/fileinput');
        }

        /**
         * This function perform file uploading with custom rules and configurations.
         * it uses do_upload() method of 'upload' library to upload the file 
         * If custom configuration get not matched an error is shown,
         * otherwise we get the uploaded data and show it on upload_success.php page if we upload from (fileinput.php)
         */
        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'php|html|txt|jpg|jpeg|png';
                $config['file_name']            = date('Ymd')."-ID".$this->session->user_id."-".$this->session->fname."-".$this->session->lname."-0"; //Custom naming a file with format: [YYYYMMDD-IDuser_id-fname-lname-0.ext] 

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/fileinput', $error);
                }
                else
                {
                        $data['upload_data'] = $this->upload->data();
                        $this->load->model('File_upload_model');
                        if($this->File_upload_model->insert_file_info($data['upload_data'])) {
                        $this->load->view('templates/header');
                        $this->load->view('upload_success', $data);
                        $this->load->view('templates/footer');
                        } else {
                                echo "<script>
                                        alert('Failed to upload file');
                                </script>";
                        }
                        
                        
                }
                }
        }

?>
