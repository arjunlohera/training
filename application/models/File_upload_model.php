<?php
/**
 * This Model is for saving the file information into MSSQL database.
 * Date created: 19-03-2019
 * By: Arjun
 */
    class File_upload_model extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        /**
         * This function takes an argumnet as an array of data about uploaded file.
         * We take specific data and insert into Database
         * Return: TRUE if successful, FALSE otherwise.
         */
        public function insert_file_info($info) {
            $data = array(
                'file_name' => $info['file_name'],
                'file_type' => $info['file_type'],
                'file_path' => $info['file_path'],
                'full_path' => $info['full_path'],
                'raw_name' => $info['raw_name'],
                'file_ext' => $info['file_ext'],
                'file_size' => $info['file_size']
            );
            $this->db->insert('File_info', $data);
            return ($this->db->affected_rows() > 0) ? true : false; 
        }
    }
?>