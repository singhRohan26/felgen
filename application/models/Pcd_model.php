<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Pcd_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getAllPcds(){
        $this->db->order_by('pcd_id','desc');
        $query = $this->db->get_where('pcd',['status'=>'Active']);
        return $query->result_array();
    }

    // public function getAllCities(){
    //     $this->db->order_by('id','desc');
    //     $query = $this->db->get('cities');
    //     return $query->result_array();
    // }

    public function get_pcd_by_id($id) {
        $query = $this->db->get_where('pcd', ['pcd_id' => $id]);
        return $query->row_array();
    }

    public function get_pcd_validation($id) {
        $query = $this->db->get_where('pcd', ['pcd_id' => $id])->row()->pcd_name;
        return $query;
    }

    public function do_add_pcd(){
        $data = array(
            'pcd_name' => $this->security->xss_clean($this->input->post('pcd_name'))
        );
        $this->db->insert('pcd', $data);
        return $this->db->insert_id();
    }

    public function do_edit_pcd($id){
        $data = array(
            'pcd_name' => $this->security->xss_clean($this->input->post('pcd_name'))
        );
        $this->db->update('pcd', $data, ['pcd_id' => $id]);
        return $this->db->affected_rows();
    }

    public function change_pcd_status($id, $status){
        $this->db->update('pcd', ['status' => $status], ['pcd_id' => $id]);
        return $this->db->affected_rows();
    }
}
?>