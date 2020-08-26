<?php 
defined('BASEPATH') or exit ('No direct script access allowed');

class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function checkmail($email){
        $this->db->select('u.user_id,u.name,u.email,u.image,u.phone');
        $this->db->from('users u');
        $this->db->where('u.email',$email);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function checkUserToken($user_id, $token_id){
        $check_query = $this->db->get_where('notification', ['user_id' => $user_id, 'token_id' => $token_id]);
        if ($check_query->num_rows() >= 1) {
            $this->db->delete('notification', ['user_id' => $user_id, 'token_id' => $token_id]);
            return $this->db->affected_rows();
        }
    }
    
    public function checkpass($email, $pass){
        $this->db->select('u.user_id,u.name,u.email,u.image,u.phone');
        $this->db->from('users u');
        $this->db->where('email',$email);
        $this->db->where('u.password',hash('sha256',$pass));
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function signUp($name,$email,$pass,$file1,$unique_id){
        $this->db->insert('users',['name'=>$name,'email'=>$email,'password'=>hash('sha256',$pass),'image'=>$file1,'source'=>'self','unique_id'=>$unique_id]);
        $id =  $this->db->insert_id();
        $this->db->select('u.user_id,u.name,u.email,u.image,u.phone');
        $this->db->from('users u');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function updatePass($email,$newpass){
        $this->db->where('email',$email);
        $this->db->update('users',['password'=>hash('sha256',$newpass)]);
        return $this->db->affected_rows();
    }
    
    public function checkold($old_pass,$user_id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('password',hash('sha256',$old_pass));
        $this->db->where('user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function changePass($user_id,$old_pass,$new_pass){
        $old_p = hash('sha256',$old_pass);
        $this->db->select('*');
        $this->db->from('users');
        $where = "user_id = '$user_id' AND password = '$old_p'";
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0){
           $this->db->where('user_id',$user_id);
           $q = $this->db->update('users',['password'=>hash('sha256',$new_pass)]);
           return true; 
        }else{
            return false;
        }
    }
    public function getprofileimg($userid){
        $this->db->select('image');
        $this->db->from('users');
        $this->db->where('user_id',$userid);
        $s = $this->db->get();
        return $s->row_array();
    }
    
    public function LoginwithFacebook($name,$email){
        $ins = $this->db->insert('users',['name'=>$name,'email'=>$email]);
        $id =  $this->db->insert_id();
        $this->db->select('u.user_id,u.image,u.name,u.email,u.phone');
        $this->db->from('users u');
        $this->db->where('user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function doupdateBankDetails($user_id,$bank_name,$branch_name,$ifsc_code,$account_no,$recipient){
        $this->db->where('user_id',$user_id);
        $this->db->update('users',['bank_name'=>$bank_name,'branch_name'=>$branch_name,'ifsc_code'=>$ifsc_code,'acc_no'=>$account_no,'recipient_name'=>$recipient]);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function addPost($user_id,$manufacturer_id,$size_id,$pcd_id,$location_id,$title,$features,$color,$price,$description,$reference_no,$date,$time){
        $data = array(
            'user_id'=>$user_id,
            'manufacturer_id' =>$manufacturer_id,
            'size_id' => $size_id,
            'pcd_id'=>  $pcd_id,
            'location_id'=> $location_id,
            'title' =>$title,
            'features'=>$features,
            'color'=>$color,
            'price'=>   $price,
            'description'=> $description,
            'reference_no'=>$reference_no,
            'date'=>$date,
            'time'=>$time
        );
        $this->db->insert('posts',$data);
        $id = $this->db->insert_id();
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('post_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }

    public function editPost($post_id,$manufacturer_id,$size_id,$pcd_id,$location_id,$title,$features,$color,$price,$description){
        $data = array(
            'manufacturer_id' =>$manufacturer_id,
            'size_id' => $size_id,
            'pcd_id'=>  $pcd_id,
            'location_id'=> $location_id,
            'title' =>$title,
            'features'=>$features,
            'color'=>$color,
            'price'=>   $price,
            'description'=> $description
        );
        $this->db->update('posts',$data, ['post_id' => $post_id]);
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function postImages($image,$post_id){
        $this->db->insert('post_media',['media'=>$image,'post_id'=>$post_id]);
        return $this->db->insert_id();
    }

    public function getPostDetailByPostId($post_id){
        $this->db->select('p.user_id,p.post_id,p.title,p.features,p.color,p.price,p.description,p.reference_no,p.ad_type,p.date,p.time,m.manufacturer_id as manufacturer,m.manufacturer_name as manufacturer_id,pc.pcd_id as pcd,pc.pcd_name as pcd_id,s.size_id as size,s.size as size_id,c.id as location,c.name as location_id');
        $this->db->from('posts p');
        $this->db->join('manufacturer m', 'm.manufacturer_id = p.manufacturer_id');
        $this->db->join('pcd pc', 'pc.pcd_id = p.pcd_id');
        $this->db->join('size s', 's.size_id = p.size_id');
        $this->db->join('cities c', 'c.id = p.location_id');
        $this->db->where('p.post_id', $post_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getUserDetailByUserId($user_id){
        $query = $this->db->get_where('users', ['user_id'=>$user_id]);
        return $query->row_array();
    }

    public function get_user_data($user_id){
        $this->db->select('u.name,u.image');
        $this->db->from('users u');
        $this->db->where('u.user_id', $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getPostImages($post_id){
        $query = $this->db->get_where('post_media', ['post_id'=>$post_id]);
        return $query->result_array();
    }

    public function getPostImage($post_id){
        $query = $this->db->get_where('post_media', ['post_id'=>$post_id]);
        return $query->row_array();
    }

    public function getPostListingByUserId($user_id, $post_id = null){
        $this->db->select('p.post_id,p.user_id,p.date,p.time,p.title,p.description,p.price,p.ad_type');
        $this->db->from('posts p');
        $this->db->join('users u', 'u.user_id=p.user_id');
        if(!empty($post_id)){
            $this->db->where('p.post_id !=', $post_id);
        }
        $this->db->where('p.user_id', $user_id);
        $this->db->where('p.ad_type !=', null);
        $this->db->group_by('p.post_id');
        $this->db->order_by('p.post_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function do_delete_post($post_id){
        $this->db->delete('posts', ['post_id' => $post_id]);
        $this->db->delete('post_media', ['post_id' => $post_id]);
        return $this->db->affected_rows();
    }

    public function do_delete_post_image($image_id, $post_id){
        $this->db->delete('post_media', ['media_id' => $image_id, 'post_id' => $post_id]);
        return $this->db->affected_rows();
    }

    public function getBasicPostListing($user_id, $city_id){
        $this->db->select('p.post_id,p.user_id,p.title,p.date,p.time,p.description,p.price,p.ad_type');
        $this->db->from('posts p');
        $this->db->where('p.ad_type', 'Basic');
        $this->db->where('p.location_id', $city_id);
        $this->db->where('p.user_id!=', $user_id);
        $this->db->group_by('p.post_id');
        $this->db->order_by('p.post_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPopularPostListing($user_id, $city_id){
        $this->db->select('p.post_id,p.user_id,p.title,p.date,p.time,p.description,p.price,p.ad_type');
        $this->db->from('posts p');
        $this->db->where('p.ad_type', 'Popular');
        $this->db->where('p.location_id', $city_id);
        $this->db->where('p.user_id!=', $user_id);
        $this->db->group_by('p.post_id');
        $this->db->order_by('p.post_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function checkFavourites($post_id, $user_id) {
        $check_query = $this->db->get_where('favourite', ['user_id' => $user_id, 'post_id' => $post_id]);
        if ($check_query->num_rows() >= 1) {
            $this->db->delete('favourite', ['user_id' => $user_id, 'post_id' => $post_id]);
            return $this->db->affected_rows();
        }
    }

    public function addToWishlist($post_id, $user_id) {
        $data = array(
            'user_id' => $user_id,
            'post_id' => $post_id
           
        );
        $query = $this->db->insert('favourite', $data);
        return 1;
    }

    public function favouritesList($user_id){
        $this->db->select('p.post_id,p.user_id,p.date,p.time,p.title,p.description,p.price,p.ad_type');
        $this->db->from('favourite f');
        $this->db->join('posts p', 'p.post_id = f.post_id');
        $this->db->group_by('p.post_id');
        $this->db->where('f.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delpostimages($post_id){
        $this->db->where('post_id',$post_id);
        $this->db->delete('post_media');
        return $this->db->affected_rows();
    }

    public function doupdateprofileimg($name,$phone,$fnn,$user_id){
        $this->db->where('user_id',$user_id);
        $this->db->update('users',['name'=>$name,'phone'=>$phone,'image'=>$fnn]);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }

    public function doupdateprofile($name,$phone,$user_id){
        $this->db->where('user_id',$user_id);
        $this->db->update('users',['name'=>$name,'phone'=>$phone]);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }

    public function checkfavourite($post_id,$user_id){
        $data=array(
            'post_id'=>$post_id,
            'user_id'=>$user_id
        );
        $query=$this->db->get_where('favourite',$data);
        $query->row_array();
        if($query->num_rows()>0){
            return 1;
        }else{
            return 0;
        }
    }

    public function getallCities(){
        $this->db->select('cities.id,cities.name');
        $this->db->from('cities');
        $this->db->join('states','states.id=cities.state_id');
        $this->db->join('countries','countries.id=states.country_id');
        $this->db->where('countries.id','82');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getallFilterCities(){
        $this->db->select('distinct(location_id) as id,cities.name');
        $this->db->from('posts');
        $this->db->join('cities','cities.id=posts.location_id');
        $this->db->where('posts.ad_type!=','');
        $sel = $this->db->get();
        return $sel->result_array();
    }

    public function doInsertAdType($post_id, $ad_type){
        $this->db->where('post_id', $post_id);
        $this->db->update('posts', ['ad_type' => $ad_type]);
        $this->db->select('post_media.media');
        $this->db->from('post_media');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }

    public function getallManufacturers(){
        $this->db->select('m.manufacturer_id as id,m.manufacturer_name as name');
        $this->db->from('manufacturer m');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallSizes(){
        $this->db->select('s.size_id as id,s.size as name');
        $this->db->from('size s');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallPCD(){
        $this->db->select('p.pcd_id as id,p.pcd_name as name');
        $this->db->from('pcd p');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getColorName(){
        $this->db->select('distinct(p.color) as name');
        $this->db->from('posts p');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function doInsertReviewRating($post_id, $sender_id, $reciever_id, $review, $rating){
        $data = array(
            'post_id' => $post_id,
            'sender_id' => $sender_id,
            'receiver_id' => $reciever_id,
            'review' => $review,
            'rating' => $rating
        );
        $this->db->insert('reviews',$data);
        return $this->db->insert_id();
    }

    public function getReviewsPostid($post_id){
        $this->db->select('r.review,r.rating,u.name,u.image');
        $this->db->from('reviews r');
        $this->db->join('users u', 'u.user_id = r.sender_id');
        $this->db->where('r.post_id', $post_id);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function checkSenderToReceiver($post_id,$sender_id, $reciever_id, $message, $time, $date){
		$data = array(
            'post_id' => $post_id,
            'sender_id' => $sender_id,
            'reciever_id' => $reciever_id,
            'message' => $message,
            'time' => $time,
            'date' => $date
        );
        $query = $this->db->get_where('chat',(['sender_id'=>$sender_id,'reciever_id'=>$reciever_id,'post_id'=>$post_id]));
		return $query->row_array();
	}
	
	public function checkReceiverToSender($post_id,$sender_id, $reciever_id, $message, $time, $date){
		$data = array(
            'post_id' => $post_id,
            'sender_id' => $sender_id,
            'reciever_id' => $reciever_id,
            'message' => $message,
            'time' => $time,
            'date' => $date
        );
        $query = $this->db->get_where('chat',(['sender_id'=>$reciever_id,'reciever_id'=>$sender_id,'post_id'=>$post_id]));
		return $query->row_array();
	}

    public function updatechatlist($post_id,$message,$time,$date){
       $this->db->where('post_id',$post_id);
       $q = $this->db->update('chat',['message'=>$message, 'time'=> $time, 'date'=> $date]);
       return $this->db->affected_rows();
    }
	
	public function insertchatList($post_id,$sender_id, $reciever_id, $message, $time, $date){
		$data = array(
        'post_id' => $post_id,
        'sender_id' => $sender_id,
        'reciever_id' => $reciever_id,
        'message' => $message,
        'time' => $time,
        'date' => $date
    );
		$this->db->insert('chat',$data);
		return $this->db->insert_id();
	}

    public function getPages($page){
        $query = $this->db->get_where('pages', ['page' => $page]);
        return $query->row_array();
    } 

    public function getFilteredBasicData($manufacturer_id, $size_id, $pcd_id, $city_id, $color_name, $user_id){
        $this->db->select('p.post_id,p.user_id,p.title,p.date,p.time,p.description,p.price,p.ad_type');
        $this->db->from('posts p');
        $this->db->where('p.ad_type', 'Basic');
        if(!empty($manufacturer_id)){
            $this->db->where('p.manufacturer_id', $manufacturer_id);
        }
        if(!empty($size_id)){
            $this->db->where('p.size_id', $size_id);
        }
        if(!empty($pcd_id)){
            $this->db->where('p.pcd_id', $pcd_id);
        }
        if(!empty($city_id)){
            $this->db->where('p.location_id', $city_id);
        }
        if(!empty($color_name)){ 
            $this->db->where('p.color', $color_name);
        }
        if(!empty($user_id)){ 
            $this->db->where('p.user_id!=', $user_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getFilteredPopularData($manufacturer_id, $size_id, $pcd_id, $city_id, $color_name, $user_id){
        $this->db->select('p.post_id,p.user_id,p.title,p.date,p.time,p.description,p.price,p.ad_type');
        $this->db->from('posts p');
        $this->db->where('p.ad_type', 'Popular');
        if(!empty($manufacturer_id)){
            $this->db->where('p.manufacturer_id', $manufacturer_id);
        }
        if(!empty($size_id)){
            $this->db->where('p.size_id', $size_id);
        }
        if(!empty($pcd_id)){
            $this->db->where('p.pcd_id', $pcd_id);
        }
        if(!empty($city_id)){
            $this->db->where('p.location_id', $city_id);
        }
        if(!empty($color_name)){ 
            $this->db->where('p.color', $color_name);
        }
        if(!empty($user_id)){ 
            $this->db->where('p.user_id!=', $user_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getChatList($reciever_id){
        $this->db->select('c.message, c.time, u.name, u.user_id');
        $this->db->from('chat c');
        $this->db->join('users u', 'u.user_id = c.sender_id');
        $this->db->where('c.reciever_id', $reciever_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserImage($user_id){
        $this->db->select('u.image');
        $this->db->from('users u');
        $this->db->where('u.user_id', $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function getchatuserlists($user_id){
        $this->db->select('u.name,u.user_id as receiver_id,u.image as receiver_image,u.email as receiver_email,p.title ,p.post_id,p.price,c.message,c.time,c.status,c.sender_id,c.reciever_id as receiver_id1');
        $this->db->from('users u');
        $this->db->join('chat c', 'c.reciever_id = u.user_id OR c.sender_id = u.user_id', 'left');
        $this->db->join('posts p', 'p.post_id = c.post_id');
        $this->db->where("(c.sender_id= $user_id OR c.reciever_id= $user_id)", NULL, FALSE);
        $this->db->where("u.user_id !=", $user_id);
        $this->db->order_by('c.id','desc');
        $this->db->order_by('c.date','desc');
        $this->db->order_by('c.time','desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function checkChatStatus($post_id, $user_id){
        $this->db->select('c.sender_id,c.reciever_id,c.post_id,c.status');
        $this->db->from('chat c');
        $this->db->where("(c.sender_id= $user_id OR c.reciever_id= $user_id)", NULL, FALSE);
        $this->db->where('c.post_id', $post_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function getpostimg($post_id){
        $this->db->select('post_media.media');
        $this->db->from('post_media');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
	
	public function finishdeal($user_id,$post_id,$rec_id){
	    $this->db->where('post_id',$post_id);
		$this->db->where("(sender_id= $user_id OR reciever_id= $user_id)", NULL, FALSE);
		$this->db->where("(sender_id= $rec_id OR reciever_id= $rec_id)", NULL, FALSE);
		$this->db->update('chat',['status'=>'0']);
		return $this->db->affected_rows();
	}
	
	public function deletechat($user_id,$post_id,$rec_id){
		$this->db->where('post_id',$post_id);
		$this->db->where("(sender_id= $rec_id OR reciever_id= $rec_id)", NULL, FALSE);
		$this->db->where("(sender_id= $user_id OR reciever_id= $user_id)", NULL, FALSE);
		$this->db->delete('chat');
		return $this->db->affected_rows();
	}
	
	public function userReviews($user_id){
		$this->db->select('reviews.*,users.name,users.image');
		$this->db->from('reviews');
		$this->db->join('users','users.user_id=reviews.sender_id');
		$this->db->where('receiver_id',$user_id);
		$sel = $this->db->get();
		return $sel->result_array();
	}
	
	public function stripetransaction($user_id,$post_id,$txn_id,$source){
		$this->db->insert('transaction',['user_id'=>$user_id,'post_id'=>$post_id,'transaction_id'=>$txn_id,'source'=>$source]);
        return $this->db->insert_id();
	}
	
	public function paypalPayment($post_id,$user_id,$source,$txn_id){
		$this->db->insert('transaction',['user_id'=>$user_id,'post_id'=>$post_id,'transaction_id'=>$txn_id,'source'=>$source]);
        return $this->db->insert_id();
	}
	
	public function updateAdType($price,$post_id){
        if($price == '5'){
            $this->db->where('post_id',$post_id);
            $this->db->update('posts',['ad_type'=>'Basic']);
            return $this->db->affected_rows();
        }
        if($price == '10'){
            $this->db->where('post_id',$post_id);
            $this->db->update('posts',['ad_type'=>'Popular']);
            return $this->db->affected_rows();
        }
    }
    
    public function avgrating($user_id){
		$this->db->select('AVG(rating)');
		$this->db->from('reviews');
		$this->db->where('receiver_id',$user_id);
        $sel = $this->db->get();
		return $sel->row_array()['AVG(rating)'];
		
	}
}
?>