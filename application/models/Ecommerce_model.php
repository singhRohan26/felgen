<?php 
defined('BASEPATH') or exit ('No direct script access allowed');

/**
 * Author Rohan Singh
 */
class Ecommerce_model extends CI_model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getAllSocialMedias(){
        $query = $this->db->get('socialmedia');
        return $query->result_array();
    }

    public function contactUs() {
        $data = array(
            'name' => $this->security->xss_clean($this->input->post('name')),
            'email' => $this->security->xss_clean($this->input->post('email')),
            'message' => $this->security->xss_clean($this->input->post('message')),
        );
        $this->db->insert('contact_us', $data);
        return $this->db->insert_id();
    }

    public function getSiteSettings(){
        $query = $this->db->get('pages');
        return $query->result_array();
    }

    public function getContactAddress(){
        $query = $this->db->get('admin');
        return $query->row_array();
    }

    public function getallFaqs(){
        $query = $this->db->get('faq');
        return $query->result_array();
    }

    public function registerForm($unique_id) {
        $data = array(
            'name' => $this->security->xss_clean($this->input->post('name')),
            'email' => $this->security->xss_clean($this->input->post('email')),
            'password' => $this->security->xss_clean(hash('sha256',$this->input->post('password'))),
            'source' => 'self',
            'unique_id' => $unique_id
        );
        $this->db->insert('users', $data);
        $id =  $this->db->insert_id();
        $sel = $this->db->get_where('users',['user_id'=>$id]);
        return $sel->row_array();
    }

    public function getDataByUniqueId($unique_id) {
        $this->db->select('u.*');
        $this->db->from('users u');
        $this->db->where('unique_id',$unique_id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function doUpdateBankDetail($user_id){
        $data = array(
            'bank_name' => $this->security->xss_clean($this->input->post('bank_name')),
            'acc_no' => $this->security->xss_clean($this->input->post('acc_no')),
            'recipient_name' => $this->security->xss_clean($this->input->post('recipient')),
            'branch_name' => $this->security->xss_clean($this->input->post('branch_name')),
            'ifsc_code' => $this->security->xss_clean($this->input->post('ifsc')),
        );
        $this->db->update('users', $data, ['user_id' => $user_id]);
        return $this->db->affected_rows();
    }

    public function checkmail($email){
        $this->db->select('u.user_id,u.name,u.email,u.unique_id');
        $this->db->from('users u');
        $this->db->where('u.email',$email);
        $sel = $this->db->get();
        return $sel->row_array();
    }

    public function checkpass($email, $pass){
        $this->db->select('u.user_id,u.name,u.email,u.unique_id');
        $this->db->from('users u');
        $this->db->where('email',$email);
        $this->db->where('u.password',$pass);
        $sel = $this->db->get();
        return $sel->row_array();
    }

    public function checkClient($email) {
        $query = $this->db->get_where('users', ['email' => $email]);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
        return 0;
    }

    public function client_login($session_data, $unique_id) {
        $unique_id = $unique_id;
        $data = array(
            'name' => $session_data['name'],
            'email' => $session_data['email'],
            'source' => $session_data['source'],
            'unique_id' => $unique_id
        );
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function verify_username() {
        $this->db->select('u.*');
        $this->db->from('users u');
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_user_activationcode($activationcode, $result) {
        $data = array(
            'user_id' => $result['user_id'],
            'activationcode' => $activationcode
        );
        $this->db->insert('user_email_verify', $data);
        return $this->db->insert_id();
    }

    public function update_user_email_status($user_id, $activationcode) {
        $query = $this->db->get_where('user_email_verify', ['user_id' => $user_id, 'activationcode' => $activationcode, 'status' => 'Inactive']);
        if (!empty($query->row_array())) {
            $this->db->update('user_email_verify', ['status' => 'Active'], ['user_id' => $user_id, 'activationcode' => $activationcode]);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function doChangeForgotPassword() {
        $data = array(
            'password' => hash('sha256', $this->security->xss_clean($this->input->post('new_password'))),
        );
        $id = $this->security->xss_clean($this->input->post('userid'));
        $this->db->update('users', $data, ['user_id' => $id]);
        return $this->db->affected_rows();
    }
    
    public function doupdateprofile($image,$user_id){
        $name = $this->input->post('name');
        // $email = $this->input->post('email');
        $phone = $this->input->post('number');
        
        $this->db->where('user_id',$user_id);
        $this->db->update('users',['name'=>$name,'phone'=>$phone,'image'=>$image]);
        return $this->db->affected_rows();
    }
    
    public function doUpdateBankDeatils($user_id){
        $bank_name = $this->input->post('bank_name');
        $branch = $this->input->post('branch');
        $acc = $this->input->post('acc');
        $ifsc = $this->input->post('ifsc');
        $recipient = $this->input->post('recipient');
        $this->db->where('user_id',$user_id);
        $this->db->update('users',['bank_name'=>$bank_name,'branch_name'=>$branch,'acc_no'=>$acc,'ifsc_code'=>$ifsc,'recipient_name'=>$recipient]);
        return $this->db->affected_rows();
        
        
    }
    
    public function dochangepass($user_id){
        $new_pass = $this->security->xss_clean($this->input->post('np'));
        $this->db->where('user_id',$user_id);
          $this->db->update('users',['password'=>$new_pass]);
          return $this->db->affected_rows();
    }
    
    public function getusersposts($user_id){
        
        $this->db->select('posts.post_id,posts.user_id,posts.title,posts.date,posts.time,posts.description');
        $this->db->from('posts');
        $this->db->where('user_id',$user_id);
		$this->db->where('posts.ad_type!=','');
        $this->db->order_by('post_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getuserspostImages($post_id){
        $this->db->select('post_media.media');
        $this->db->from('post_media');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function postDetail($post_id){
        $this->db->select('posts.*,users.*,manufacturer.manufacturer_name,pcd.pcd_name,size.size');
        $this->db->from('posts');
        $this->db->join('users','users.user_id=posts.user_id');
        $this->db->join('manufacturer','manufacturer.manufacturer_id=posts.manufacturer_id');
        $this->db->join('pcd','pcd.pcd_id=posts.pcd_id');
        $this->db->join('size','size.size_id=posts.size_id');
        $this->db->where('posts.post_id',$post_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function postImages($post_id){
        $this->db->select('post_media.media');
        $this->db->from('post_media');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getbasic($user_id){
        $this->db->select('posts.title,posts.post_id,posts.date,posts.time');
        $this->db->from('posts');
        $this->db->where('ad_type','Basic');
		$this->db->where('user_id !=',$user_id);
        $this->db->limit(8);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getLatest($user_id){
        $this->db->select('posts.title,posts.post_id,posts.date,posts.time');
        $this->db->from('posts');
        $this->db->where('ad_type','Basic');
        $this->db->or_where('ad_type','Popular');
		$this->db->where('user_id !=',$user_id);
		$this->db->order_by('posts.post_id');
        $this->db->limit(8);
        $sel = $this->db->get();
        return $sel->result_array();
    }
	
	public function getbasicwithoutlogin(){
        $this->db->select('posts.title,posts.post_id,posts.date,posts.time');
        $this->db->from('posts');
        $this->db->where('ad_type','Basic');
		$sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getPopular($user_id){
        $this->db->select('posts.title,posts.post_id,posts.date,posts.time');
        $this->db->from('posts');
        $this->db->where('ad_type','Popular');
		$this->db->where('user_id !=',$user_id);
        $this->db->limit(8);
        $this->db->order_by('post_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
	
	public function getPopularwithoutlogin(){
        $this->db->select('posts.title,posts.post_id,posts.date,posts.time');
        $this->db->from('posts');
        $this->db->where('ad_type','Popular');
		// $this->db->where('user_id !=',$user_id);
        // $this->db->limit(6);
        $this->db->order_by('post_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getcolors(){
        $this->db->select('distinct(p.color) as color_name');
        $this->db->from('posts p');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getLocations()
    {
        $this->db->select('distinct(location)');
        $this->db->from('posts');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function dohomepagefilteration($manufacture,$size,$pcd,$color,$location,$user_id){
        $this->db->select('posts.title,posts.post_id,posts.date,posts.time,posts.manufacturer_id,posts.size_id,posts.pcd_id,posts.location_id,posts.color');
        $this->db->from('posts');
        if(!empty($manufacture)){
            $this->db->where('posts.manufacturer_id',$manufacture);
        }
        if(!empty($size)){
            $this->db->where('posts.size_id',$size);
        }
        if(!empty($pcd)){
            $this->db->where('posts.pcd_id',$pcd);
        }
        if(!empty($color)){
            $this->db->where('posts.color',$color);
        }
        if(!empty($location)){
            $this->db->where('posts.location_id',$location);
        }
        if(!empty($user_id)){
            $this->db->where('posts.user_id!=',$user_id);
        }
        $this->db->where('posts.ad_type!=','');
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->result_array();
    }
    public function dopopularfilteration($manufacture,$size,$pcd,$color,$location,$user_id){
        $this->db->select('posts.title,posts.post_id,posts.date,posts.time,posts.manufacturer_id,posts.size_id,posts.pcd_id,posts.location_id,posts.color');
        $this->db->from('posts');
        if(!empty($manufacture)){
            $this->db->where('posts.manufacturer_id',$manufacture);
        }
        if(!empty($size)){
            $this->db->where('posts.size_id',$size);
        }
        if(!empty($pcd)){
            $this->db->where('posts.pcd_id',$pcd);
        }
        if(!empty($color)){
            $this->db->where('posts.color',$color);
        }
        if(!empty($location)){
            $this->db->where('posts.location_id',$location);
        }
        if(!empty($user_id)){
            $this->db->where('posts.user_id!=',$user_id);
        }
        $this->db->where('posts.ad_type','Popular');
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function dobasicfilteration($manufacture,$size,$pcd,$color,$location,$user_id){
        $this->db->select('posts.title,posts.post_id,posts.date,posts.time,posts.manufacturer_id,posts.size_id,posts.pcd_id,posts.location_id,posts.color');
        $this->db->from('posts');
        if(!empty($manufacture)){
            $this->db->where('posts.manufacturer_id',$manufacture);
        }
        if(!empty($size)){
            $this->db->where('posts.size_id',$size);
        }
        if(!empty($pcd)){
            $this->db->where('posts.pcd_id',$pcd);
        }
        if(!empty($color)){
            $this->db->where('posts.color',$color);
        }
        if(!empty($location)){
            $this->db->where('posts.location_id',$location);
        }
        if(!empty($user_id)){
            $this->db->where('posts.user_id!=',$user_id);
        }
        $this->db->where('posts.ad_type','Basic');
        $sel = $this->db->get();
        return $sel->result_array();
    }

    public function checkPostWishlist($post_id, $userid) {
        $check_query = $this->db->get_where('favourite', ['user_id' => $userid, 'post_id' => $post_id]);
        if ($check_query->num_rows() >= 1) {
            $this->db->delete('favourite', ['user_id' => $userid, 'post_id' => $post_id]);
            return $this->db->affected_rows();
        }
    }

    public function addPostWishlist($post_id, $userid) {
        $data = array(
            'user_id' => $userid,
            'post_id' => $post_id
        );
        $query = $this->db->insert('favourite', $data);
        return 1;
    }

    public function getpostWishlist($user_id) {
        $query = $this->db->get_where('favourite', ['user_id' => $user_id]);
        return $query->result_array();
    }

    public function do_check_oldpassword($email){
        $oldpassword = $this->security->xss_clean(hash('sha256', $this->input->post('op')));
        $query = $this->db->get_where('users', ['email'=>$email, 'password'=>$oldpassword]);
        return $query->row_array();
    }

    public function reset_password($email){
        $newpassword = $this->security->xss_clean(hash('sha256', $this->input->post('np')));
        $this->db->update('users', ['password'=>$newpassword], ['email'=>$email]);
        return $this->db->affected_rows();
    }

    public function doUploadProfileImage($user_id, $image_name) {
        $data = array(
            'image' => $image_name
        );
        $this->db->update('users', $data, ['user_id' => $user_id]);
        return $this->db->affected_rows();
    }
    
    public function postsByUser($user_id){
        $this->db->select('posts.post_id,posts.title,posts.date,posts.time');
        $this->db->from('posts');
        $this->db->where('user_id',$user_id);
		$this->db->where('posts.ad_type!=','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getuserspostImagesByUserId($post_id){
        $this->db->select('post_media.media');
        $this->db->from('post_media');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function postuserDetails($user_id){
        $this->db->select('users.user_id,users.name,users.image');
        $this->db->from('users');
        $this->db->where('user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
	
	public function dochatfilter($receiver_id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$receiver_id);
		$sel = $this->db->get();
		return $sel->row_array();
	}
	
	public function review($post_id){
		$this->db->select('reviews.*,users.name,users.image');
		$this->db->from('reviews');
		$this->db->join('users','users.user_id=reviews.sender_id');
		$this->db->where('reviews.post_id',$post_id);
		$this->db->limit('2');
		$this->db->order_by('reviews.id','desc');
		$sel = $this->db->get();
		return $sel->result_array();
		
	}
	
	public function adcountbyuser($user_id){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('user_id',$user_id);
		$this->db->where('ad_type!=','');
		$sel = $this->db->get();
		return $sel->num_rows();
	}
	
	public function avgrating($user_id){
		$this->db->select('AVG(rating)');
		$this->db->from('reviews');
		$this->db->where('receiver_id',$user_id);
		$sel = $this->db->get();
		return $sel->row_array()['AVG(rating)'];
		
	}
	
	public function getaddress()
	{
	    $this->db->select('*');
        $this->db->from('address');
        $se = $this->db->get();
        return $se->row_array();
	}
    
    
}
?>