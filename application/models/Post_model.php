<?php 
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Post_model extends CI_Model{
	public function __construct(){
		parent::__construct();
    }
    
    public function getmanufactures(){
        $this->db->select('manufacturer.manufacturer_id,manufacturer.manufacturer_name');
        $this->db->from('manufacturer');
        $this->db->where('manufacturer.status','Active');
        $sel = $this->db->get();
        return $sel->result_array();
    }

    public function getsize(){
        $this->db->select('size.size_id,size.size');
        $this->db->from('size');
        $this->db->where('size.status','Active');
        $sel = $this->db->get();
        return $sel->result_array();
    }

    public function getpcd(){
        $this->db->select('pcd.pcd_id,pcd.pcd_name');
        $this->db->from('pcd');
        $this->db->where('pcd.status','Active');
        $sel = $this->db->get();
        return $sel->result_array();
    }

    public function getLocations(){
        $this->db->select('distinct(location_id) as id,cities.name');
        $this->db->from('posts');
        $this->db->join('cities','cities.id=posts.location_id');
        $this->db->where('posts.ad_type!=','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getallLocations(){
        $this->db->select('cities.id,cities.name');
        $this->db->from('cities');
        $this->db->join('states','states.id=cities.state_id');
        $this->db->join('countries','countries.id=states.country_id');
        $this->db->where('countries.id','82');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function doaddPost($user_id, $file1, $file2, $file3, $file4, $reference_no){
        $data = array(
             'user_id'=>$user_id,
            'title' =>$this->input->post('title'),
            'features'=>$this->input->post('rim'),
            'manufacturer_id'=>$this->input->post('manufacture'),
            'size_id'=>$this->input->post('size'),
            'pcd_id'=>$this->input->post('pcd'),
            'location_id'=>$this->input->post('city'),
            'price'=>$this->input->post('price'),
            'color'=>$this->input->post('color'),
            'description'=>$this->input->post('desc'),
            'reference_no' => $reference_no,
            'date' =>date('y-m-d'),
            'time' =>date("h:i")
        
        );
        $this->db->insert('posts',$data);
        $id = $this->db->insert_id();
        if(!empty($file1)){
            $this->db->insert('post_media',['post_id' => $id, 'media' => $file1]);
        }
        if(!empty($file2)){
            $this->db->insert('post_media',['post_id' => $id, 'media' => $file2]);
        }
        if(!empty($file3)){
            $this->db->insert('post_media',['post_id' => $id, 'media' => $file3]);
        }
        if(!empty($file4)){
            $this->db->insert('post_media',['post_id' => $id, 'media' => $file4]);
        }
        return $id;
    }
    
    public function doeditpost($post_id,$file1,$file2,$file3,$file4){
        $data = array(
            'title' =>$this->input->post('title'),
            'features'=>$this->input->post('rim'),
            'manufacturer_id'=>$this->input->post('manufacture'),
            'size_id'=>$this->input->post('size'),
            'pcd_id'=>$this->input->post('pcd'),
            'location_id'=>$this->input->post('city'),
            'price'=>$this->input->post('price'),
            'color'=>$this->input->post('color'),
            'description'=>$this->input->post('desc'),
         );
        $this->db->where('post_id',$post_id);
        $this->db->update('posts',$data);
        $this->db->delete('post_media', ['post_id'=>$post_id]);
        if(!empty($file1)){
            $this->db->insert('post_media',['post_id' => $post_id, 'media' => $file1]);
        }
        if(!empty($file2)){
            $this->db->insert('post_media',['post_id' => $post_id, 'media' => $file2]);
        }
        if(!empty($file3)){
            $this->db->insert('post_media',['post_id' => $post_id, 'media' => $file3]);
        }
        if(!empty($file4)){
            $this->db->insert('post_media',['post_id' => $post_id, 'media' => $file4]);
        }
        return $this->db->insert_id();
    }
    
    public function updateAdType($postPrice,$post_id){
        if($postPrice == '5'){
            $this->db->where('post_id',$post_id);
            $this->db->update('posts',['ad_type'=>'Basic']);
            return $this->db->affected_rows();
        }
        if($postPrice == '10'){
            $this->db->where('post_id',$post_id);
            $this->db->update('posts',['ad_type'=>'Popular']);
            return $this->db->affected_rows();
        }
    }
    
    public function stripetransaction($user_id,$post_id,$txn_id){
        $this->db->insert('transaction',['user_id'=>$user_id,'post_id'=>$post_id,'transaction_id'=>$txn_id]);
        return $this->db->insert_id();
    }
    
    public function delPosts($post_id){
        $this->db->delete('posts', ['post_id' => $post_id]);
        $this->db->delete('post_media', ['post_id' => $post_id]);
        return $this->db->affected_rows();
    }
    
    public function postById($post_id){
        $this->db->select('posts.*,manufacturer.manufacturer_name,pcd.pcd_name,size.size,cities.name');
        $this->db->from('posts');
        $this->db->join('manufacturer','manufacturer.manufacturer_id=posts.manufacturer_id');
        $this->db->join('pcd','pcd.pcd_id=posts.pcd_id');
        $this->db->join('size','size.size_id=posts.size_id');
        $this->db->join('cities','cities.id=posts.location_id');
        $this->db->where('posts.post_id',$post_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function postimgById($post_id){
        $this->db->select('*');
        $this->db->from('post_media');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
	
	public function receiver_user_Details($user_id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$user_id);
		$sel = $this->db->get();
		return $sel->row_array();
	}
	
	public function checkSenderToReceiver($post_id,$sender_id, $reciever_id, $message, $time){
		$data = array(
            'post_id' => $post_id,
            'sender_id' => $sender_id,
            'reciever_id' => $reciever_id,
            'message' => $message,
            'time' => $time,
            'date'=>date('Y-m-d'),
        );
        $query = $this->db->get_where('chat',(['sender_id'=>$sender_id,'reciever_id'=>$reciever_id,'post_id'=>$post_id]));
		return $query->row_array();
	}
	
	public function checkReceiverToSender($post_id,$sender_id, $reciever_id, $message, $time){
		$data = array(
            'post_id' => $post_id,
            'sender_id' => $sender_id,
            'reciever_id' => $reciever_id,
            'message' => $message,
            'time' => $time,
            'date'=>date('Y-m-d'),
        );
        $query = $this->db->get_where('chat',(['sender_id'=>$reciever_id,'reciever_id'=>$sender_id,'post_id'=>$post_id]));
		return $query->row_array();
	}

    public function updatechatlist($post_id,$message,$time){
           $this->db->where('post_id',$post_id);
           $q = $this->db->update('chat',['message'=>$message, 'time'=> $time,'date'=>date('Y-m-d')]);
           return $this->db->affected_rows();
    }
	
	public function insertchatList($post_id,$sender_id, $reciever_id, $message, $time){
		$data = array(
            'post_id' => $post_id,
            'sender_id' => $sender_id,
            'reciever_id' => $reciever_id,
            'message' => $message,
            'time' => $time,
            'date'=>date('Y-m-d'),
        );
		$this->db->insert('chat',$data);
		return $this->db->insert_id();
	}
	
	public function chatList($login_user){
		$this->db->select('u.name,u.user_id as receiver_id,u.image as receiver_image,u.email as receiver_email,p.title ,p.post_id,p.price,c.message,c.time,c.id as chat_id,c.date');
        $this->db->from('users u');
        $this->db->join('chat c', 'c.reciever_id = u.user_id OR c.sender_id = u.user_id', 'left');
        $this->db->join('posts p', 'p.post_id = c.post_id');
        $this->db->where("(c.sender_id= $login_user OR c.reciever_id= $login_user)", NULL, FALSE);
        $this->db->where("u.user_id !=", $login_user);
        $this->db->order_by('c.date','desc');
        $this->db->order_by('c.time','desc');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function review($sender_id,$receiver_id,$post_id){
		$data = array(
    		'post_id'=>$post_id,
    		'sender_id'=>$sender_id,
    		'receiver_id'=>$receiver_id,
    		'rating' => $this->input->post('rating'),
    		'review' => $this->input->post('review')
		);
		$this->db->insert('reviews',$data);
		return $this->db->insert_id();
	}
	
	public function updateChatStatus($sender_id,$receiver_id,$post_id){
	    $this->db->update('chat', ['status' => '0'],['sender_id'=>$sender_id,'reciever_id'=>$receiver_id,'post_id'=>$post_id]);
	    return $this->db->affected_rows();
	}
	
	public function checkpostuserId($login_user,$post_id){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('user_id',$login_user);
		$this->db->where('post_id',$post_id);
		$sel = $this->db->get();
		return $sel->row_array();
	}
	
	public function postdetailchat($post_id){
		$this->db->select('posts.title,posts.price,posts.user_id');
		$this->db->from('posts');
		$this->db->where('post_id',$post_id);
		$sel = $this->db->get();
		return $sel->row_array();
	}
	
	public function checkChatStatus($user_id, $post_id, $chat_id){
	    $this->db->select('c.status');
	    $this->db->from('chat c');
	    $this->db->where('c.sender_id', $user_id);
	    $this->db->or_where('c.reciever_id', $user_id);
	    $this->db->where('c.id', $chat_id);
	    $this->db->where('c.post_id', $post_id);
	    $query = $this->db->get();
	    return $query->row_array()['status'];
	}
	
	public function postchatimg($post_id){
		$this->db->select('post_media.media');
		$this->db->from('post_media');
		$this->db->where('post_id',$post_id);
		$sel = $this->db->get();
		return $sel->row_array();
	}
	
	public function wishlist($user_id){
	    $this->db->select('favourite.*,posts.title,posts.post_id,posts.date,posts.time,posts.description');
	    $this->db->from('favourite');
	    $this->db->join('posts','posts.post_id=favourite.post_id');
	    $this->db->where('favourite.user_id',$user_id);
	    $sel = $this->db->get();
	    return $sel->result_array();
	}
	
	public function deletechat($chat_id){
	    $this->db->where('id',$chat_id);
	    $this->db->delete('chat');
	    return $this->db->affected_rows();
	}
	
	public function checkTokenid($token_id){
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('token_id',$token_id);
        $res = $this->db->get();
        return $res->row_array();
    }
    
    public function checkUser($user_id){
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('user_id',$user_id);
        $res = $this->db->get();
        return $res->row_array();
    }
    
    public function updateToken($user_id,$token_id){
        $this->db->where('user_id',$user_id);
        $this->db->update('notification',['token_id'=>$token_id]);
        return $this->db->affected_rows();
    }
    
    public function getToken($user_id,$token_id){
        $this->db->insert('notification',['user_id'=>$user_id,'token_id'=>$token_id,'date'=>date('y-m-d')]);
        return $this->db->insert_id();
    }
    
    public function getTokenByid($user_id){
        $this->db->select('notification.token_id');
        $this->db->from('notification');
        $this->db->where('user_id',$user_id);
        $res = $this->db->get();
        return $res->result_array();
    }
    
    public function paypal($orderdata){
        $this->db->insert('transaction',$orderdata);
        return $this->db->insert_id();
    }
}
?>