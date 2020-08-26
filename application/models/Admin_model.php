<?php 
defined('BASEPATH') or exit ('No direct script access allowed');

/**
 * 
 */
class Admin_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function checkLogin($user_type) {
        $data = array(
            'email' => $this->security->xss_clean($this->input->post('email')),
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('password')))
        );
        $query = $this->db->get_where($user_type, $data);
        return $query->row_array();
    }

    public function getAdminRecord(){
        $query = $this->db->get('admin');
        return $query->row_array();
    }

    public function getUserdata($user_type, $email) {
        $query = $this->db->get_where('admin', ['email' => $email]);
        return $query->row_array();
    }

    public function verify_emailid() {
        $query = $this->db->get_where('admin', ['email' => $this->input->post('registered_email')]);
        return $query->row_array();
    }

    public function do_reset_password() {
        $admin_id = $this->input->post('id');
        $password = hash('sha256',$this->input->post('password'));
        $this->db->update('admin', ['password' => $password]);
        return $this->db->affected_rows();
    }

    public function reset_password($admin_id){
        $newpassword = $this->security->xss_clean(hash('sha256', $this->input->post('new_password')));
        $this->db->update('admin', ['password'=>$newpassword], ['id'=>$admin_id]);
        return $this->db->affected_rows();
    }
    
    public function do_check_oldpassword($admin_id){
        
        $oldpassword = $this->security->xss_clean(hash('sha256', $this->input->post('old_password')));
        $query = $this->db->get_where('admin', ['id'=>$admin_id, 'password'=>$oldpassword]);
        return $query->row_array();
    }

    public function getUserDetail($email) {
        $query = $this->db->get_where('admin',['email' => $email]);
        return $query->row_array();
    }

    public function doUpdateProfile($email) {
        $data = array(
            'first_name' => $this->security->xss_clean($this->input->post('first_name')),
            'last_name' => $this->security->xss_clean($this->input->post('last_name')),
            'phone' => $this->security->xss_clean($this->input->post('phone')),
            'address' => $this->security->xss_clean($this->input->post('address'))
        );
        $this->db->update('admin',$data, ['email' => $email]);
        return $this->db->affected_rows();
    }		public function userscount()	{		$this->db->select('*');		$this->db->from('users');		$sel = $this->db->get();		return $sel->num_rows();			}		public function postscount()	{		$this->db->select('*');		$this->db->from('posts');		$sel = $this->db->get();		return $sel->num_rows();			}
    
    public function getaddress()
    {
        $this->db->select('*');
        $this->db->from('address');
        $se = $this->db->get();
        return $se->row_array();
    }
    
    public function doaddAddress($id)
    {
        $add = $this->input->post('address');
        $this->db->where('id',$id);
        $this->db->update('address',['address'=>$add]);
        return true;
    }
    
    
}
?>