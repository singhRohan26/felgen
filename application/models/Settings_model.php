<?php 
defined('BASEPATH') or exit ('No direct script access allowed');

/**
 * Author Rajat Agarwal
 */
class Settings_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getSiteSettings(){
        $query = $this->db->get('pages');
        return $query->result_array();
    }

    public function do_edit_settings($id){
        $description = $this->input->post('description');
        $this->db->update('pages', ['text'=>$description], ['id'=>$id]);
        return $this->db->affected_rows();
    }

    public function getAllUsers(){
        $this->db->order_by('user_id', 'DESC');
        $this->db->select('u.user_id,u.name,u.email,u.phone,u.image,u.status');
        $this->db->from('users u');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_users_by_id($id) {
        $query = $this->db->get_where('users', ['user_id' => $id]);
        return $query->row_array();
    }

    public function change_users_status($id, $status){
        $this->db->update('users', ['status' => $status], ['user_id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllPosts(){
        $this->db->order_by('p.post_id','DESC');
        $this->db->select('p.post_id,p.title,p.color,p.price,p.reference_no,m.manufacturer_name,s.size,pc.pcd_name,c.name as city,u.name');
        $this->db->from('posts p');
        $this->db->join('manufacturer m', 'm.manufacturer_id = p.manufacturer_id');
        $this->db->join('size s', 's.size_id = p.size_id');
        $this->db->join('pcd pc', 'pc.pcd_id = p.pcd_id');
        $this->db->join('cities c', 'c.id = p.location_id');
        $this->db->join('users u', 'u.user_id = p.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPostDetailByPostId($post_id){
        $this->db->select('p.title,p.color,p.price,p.features,p.description,p.ad_type,p.reference_no,m.manufacturer_name,s.size,pc.pcd_name,c.name as city,u.name,p.date,p.time');
        $this->db->from('posts p');
        $this->db->join('manufacturer m', 'm.manufacturer_id = p.manufacturer_id');
        $this->db->join('size s', 's.size_id = p.size_id');
        $this->db->join('pcd pc', 'pc.pcd_id = p.pcd_id');
        $this->db->join('cities c', 'c.id = p.location_id');
        $this->db->join('users u', 'u.user_id = p.user_id');
        $this->db->where('p.post_id', $post_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getPostImagesByPostId($post_id){
        $this->db->select('pm.media,pm.post_id');
        $this->db->from('post_media pm');
        $this->db->where('pm.post_id',$post_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_social_media_by_id($id) {
        $query = $this->db->get_where('socialmedia', ['id' => $id]);
        return $query->row_array();
    }

    public function getAllSocialMedia(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('socialmedia');
        return $query->result_array();
    }

    public function do_edit_social_media($id) {
        $data = array(
            'url' => $this->security->xss_clean($this->input->post('url'))
        );
        $this->db->update('socialmedia', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllFaqs(){
        $query = $this->db->get('faq');
        return $query->result_array();
    }

    public function get_faq_by_id($id) {
        $query = $this->db->get_where('faq', ['id' => $id]);
        return $query->row_array();
    }

    public function do_add_faq(){
        $data = array(
            'question' => $this->input->post('question'),
            'answer' => $this->input->post('answer')
        );
        $this->db->insert('faq', $data);
        return $this->db->insert_id();
    }

    public function do_edit_faq($id) {
        $data = array(
            'question' => $this->security->xss_clean($this->input->post('question')),
            'answer' => $this->security->xss_clean($this->input->post('answer')),
        );
        $this->db->update('faq', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function change_faq_status($id, $status) {
        $this->db->update('faq', ['status' => $status], ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllContacts(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('contact_us');
        return $query->result_array();
    }
}
?>