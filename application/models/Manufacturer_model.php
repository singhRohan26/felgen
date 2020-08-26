<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Manufacturer_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getAllManufacturer(){
        $this->db->order_by('manufacturer_id','desc');
        $query = $this->db->get_where('manufacturer',['status'=>'Active']);
        return $query->result_array();
    }

    public function get_manufacturer_by_id($id) {
        $query = $this->db->get_where('manufacturer', ['manufacturer_id' => $id]);
        return $query->row_array();
    }

    public function do_add_manufacturer(){
        $data = array(
            'manufacturer_name' => $this->security->xss_clean($this->input->post('manufacturer_name'))
        );
        $this->db->insert('manufacturer', $data);
        return $this->db->insert_id();
    }

    public function get_manufacturer_validation($id) {
        $query = $this->db->get_where('manufacturer', ['manufacturer_id' => $id])->row()->manufacturer_name ;
        return $query;
    }

    public function do_edit_manufacturer($id){
        $data = array(
            'manufacturer_name' => $this->security->xss_clean($this->input->post('manufacturer_name'))
        );
        $this->db->update('manufacturer', $data, ['manufacturer_id' => $id]);
        return $this->db->affected_rows();
    }

    public function change_manufacturer_status($id, $status){
        $this->db->update('manufacturer', ['status' => $status], ['manufacturer_id' => $id]);
        return $this->db->affected_rows();
    }
}
?>