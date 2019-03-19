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
                $this->load->view('templates/header');
                $this->load->view('Upload_file');
                $this->load->view('templates/footer');
        }

        /**
         * This function perform file uploading with custom rules and configurations.
         * it uses do_upload() method of 'upload' library to upload the file from input name = 'userfile'
         * If custom configuration get not matched an error is shown,
         * otherwise we get the uploaded data and show it on upload_success.php page 
         */
        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'php|html|txt';
                $config['file_name']            = date('Ymd')."-ID".$this->session->user_id."-".$this->session->fname."-".$this->session->lname."-0"; //Custom naming a file with format: [YYYYMMDD-IDuser_id-fname-lname-0.ext] 

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
                        // $data = array('upload_data' => $this->upload->data());
                        $data['upload_data'] = $this->upload->data();
                        $this->load->model('File_upload_model');
                        if($this->File_upload_model->insert_file_info($data['upload_data'])) {
                                echo "<script>
                                        alert('File uploaded Successfuly');
                                </script>";
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
