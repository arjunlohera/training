<?php
class Incident_model extends CI_Model {

    /**
     * Load database in class constructor
     */
    public function __construct() {
        $this->load->database();
    }

    /**
     * This method is called from new_incident method of Incident controller.
     * It gets all the method posted by form using post method.
     * and then insert in database.
     * Return: true if inserted, false otherwise.
     */
    public function insert_incident() {
        $data = array(
            'type' => $this->input->post('incident_type'),
            'date' => date("Y-m-d", strtotime($this->input->post('incident_date'))),
            'description' => $this->input->post('description')
        );
         $this->db->insert('incident_details', $data);
        
    return ($this->db->affected_rows() > 0) ? true : false; 
    }

    /**
     * This method is called in view() and show_incidents() methods of Incident controller.
     * It get the rows from database based on given limit and offset value
     * Return: fetched data, false otherwise.
     */

    public function get_incidents($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('ID', 'DESC');
        $query = $this->db->get('incident_details');
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false; 
    }

    /**
     * This method return the count of total rows in [incident_details] table. 
     */
    public function get_total_rows() {
        return $this->db->count_all('incident_details');
    }

    /**
     * This method get called from delete_incident() method of Incident controller.
     * It deletes a row based on the given ID
     * Return: true if successfully deleted, false otherwise.
     */
    public function delete_query($id) {
        $this->db->delete('incident_details', array('id' => $id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }
}
?>
