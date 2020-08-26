<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	/**
	 * Home  Model.
	 * Created By Ram Yadav
	 
	 */

    public function doAddDetail($data){
        $this->db->insert('answer', $data);
        return $this->db->insert_id();
    }

    public function getDetailPerson($id){
        $query = $this->db->get_where('answer', ['id' => $id, 'payment_status' => 'yes']);
        return $query->row_array();
    }
    public function updatePersonDetail($id){
        $this->db->update('answer', ['payment_status' => 'yes'], ['id' => $id]);
        return $this->db->affected_rows();
    }
}
