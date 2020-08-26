<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	/**
	 * Admin  Model.
	 * Created By Ram Yadav
	 
	 */

	public function checkLogin() {
        $data = array(
            'email' => $this->security->xss_clean($this->input->post('email')),
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('password')))
        );
        $query = $this->db->get_where('admin', $data);
        return $query->row_array();
    }


    public function getLoginDetail($email){
        $query = $this->db->get_where('admin', ['email' => $email]);
        return $query->row_array();
    }
    public function doChangePass(){
        $data = array(
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('npass')))
        );
        $this->db->update('admin', $data);
        return $this->db->affected_rows();
    }

    public function getEmailId(){
        $query = $this->db->get_where('admin', ['email' => $this->security->xss_clean($this->input->post('email'))]);
        return $query->row_array();
    }
    public function updatePassword($password){
        $data = array(
            'password' => $this->security->xss_clean(hash('sha256', $password))
        );
        $this->db->update('admin', $data);
        return $this->db->affected_rows();
    }

    public function getUsersDetail(){
        $this->db->order_by('id','desc');
        $query = $this->db->get('answer');
        return $query->result_array();
    }
    public function getDetailPerson($id){
        $query = $this->db->get_where('answer', ['id' => $id]);
        return $query->row_array();
    }
    
}
