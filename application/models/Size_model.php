<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Size_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getAllSizes(){
        $this->db->order_by('size_id','desc');
        $query = $this->db->get_where('size',['status'=>'Active']);
        return $query->result_array();
    }

    public function get_size_by_id($id) {
        $query = $this->db->get_where('size', ['size_id' => $id]);
        return $query->row_array();
    }

    public function get_size_validation($id) {
        $query = $this->db->get_where('size', ['size_id' => $id])->row()->size;
        return $query;
    }

    public function do_add_size(){
        $data = array(
            'size' => $this->security->xss_clean($this->input->post('size'))
        );
        $this->db->insert('size', $data);
        return $this->db->insert_id();
    }

    public function do_edit_size($id){
        $data = array(
            'size' => $this->security->xss_clean($this->input->post('size'))
        );
        $this->db->update('size', $data, ['size_id' => $id]);
        return $this->db->affected_rows();
    }

    public function change_size_status($id, $status){
        $this->db->update('size', ['status' => $status], ['size_id' => $id]);
        return $this->db->affected_rows();
    }
}
?>