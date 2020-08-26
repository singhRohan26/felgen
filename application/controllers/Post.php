<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author Rajat Agarwal
 */
class Post extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
        $this->load->model(['Post_model']);
        $this->load->model(['Ecommerce_model']);
		$this->load->helper('cookie');
    }
    
    public function getDataByUniqueId() {
        if (!empty($this->session->userdata('unique_id'))) {
            $unique_id = $this->session->userdata('unique_id');
            $data = $this->Ecommerce_model->getDataByUniqueId($unique_id);
            return $data;
        }
    }
    
    public function addPost(){
        $data['title'] = 'Add Posts';
		$data['login_user'] = $this->getDataByUniqueId();
		$login_user = $data['login_user']['user_id'];
		$data['chatList'] = $this->Post_model->chatList($login_user);
        $data['getmanufactures'] = $this->Post_model->getmanufactures();
        $data['getsize'] = $this->Post_model->getsize();
        $data['getpcd'] = $this->Post_model->getpcd();
        $data['getLocations'] = $this->Post_model->getallLocations();
        $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/addPost',$data);
        $this->load->view('front/commons/footer_new');

    }
    
    public function doaddPost(){
        $user = $this->getDataByUniqueId();
        $user_id = $user['user_id'];
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('rim', 'Rim Features', 'required');
        $this->form_validation->set_rules('manufacture', 'Manufacturer Type', 'required');
        $this->form_validation->set_rules('size', 'Size Type', 'required');
        $this->form_validation->set_rules('pcd', 'PCD Type', 'required');
        $this->form_validation->set_rules('city', 'Location', 'required');
        $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('desc', 'Description', 'required');
		if(!empty($_FILES['file1']['name'])){
             $file1=$this->doUploadFile('file1');
        }else{
            $file1='';
        }
        if(!empty($_FILES['file2']['name'])){
            $file2 = $this->doUploadFile('file2');
        }else{
           $file2=''; 
        }
        if(!empty($_FILES['file3']['name'])){
            $file3 = $this->doUploadFile('file3');
        }else{
           $file3=''; 
        }
        if(!empty($_FILES['file4']['name'])){
            $file4 = $this->doUploadFile('file4');
        }else{
           $file4=''; 
        }
        $err_img = "";
        	if(empty($file1) && empty($file2) && empty($file3) && empty($file4)){
			$err_img = "Please Upload atleast one Image";
		}
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array(), 'err_img' => $err_img]));
            return FALSE;
        } if(!empty($err_img)){
			$err_arr = $err_img;
			$this->output->set_output(json_encode(['result' => 0, 'errors' => "", 'err_img' => $err_arr]));
            return FALSE;
		}
        $reference_no = rand('111111','999999');
        $result = $this->Post_model->doaddPost($user_id, $file1, $file2, $file3, $file4, $reference_no);
            if($result){
            $this->session->set_userdata('stripe_payment', 'stripe_payment');
            $post_id = $result;
            $this->output->set_output(json_encode(['result' => 4, 'url' => base_url('Post/payment/'.$post_id), 'msg' => 'Beitrag hinzugefügt']));
            return FALSE;
        }else{
        $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Post/addPost'), 'msg' => 'Etwas ist schief gelaufen']));
                return FALSE;
        }
    }
    
    public function doUploadFile($file){
        $file1 = $_FILES[$file]['name'];
        $config['upload_path'] = './uploads/posts/';
        $config['allowed_types'] = 'avi|flv|wmv|mp3|mp4|gif|jpg|png|mp4|mov|';
        $config['max_size'] = '0';
        $config['file_name'] = rand();
        $this->upload->initialize($config);
        $this->upload->do_upload($file);
        $upload_data = $this->upload->data();
        $var = $this->imageCompression($upload_data['file_name']);
        return $upload_data['file_name'];
        
    }
    
    public function imageCompression($imageName) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/posts/' . $imageName;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = 50;
        $config['width'] = 226;
        $config['height'] = 236;
        $config['new_image'] = './uploads/posts/test/' . $imageName;
        $this->load->library('image_lib', $config);
        return $this->image_lib->resize();
    }
    
    public function payment($post_id){
        $data['title'] = 'Choose Plan';
        $data['post_id'] = $post_id;
		$data['login_user'] = $this->getDataByUniqueId();
		$login_user = $data['login_user']['user_id'];
		$data['chatList'] = $this->Post_model->chatList($login_user);
		$login_user = $data['login_user']['user_id'];
        $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/payment');
        $this->load->view('front/commons/footer_new');
    }
    
    public function choosepayment($price,$post_id){
        $data['login_user'] = $this->getDataByUniqueId();
		$login_user = $data['login_user']['user_id'];
		$data['chatList'] = $this->Post_model->chatList($login_user);
		$login_user = $data['login_user']['user_id'];
        $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $data['post_id'] = $post_id;
        $data['postPrice'] = $price;
        $data['title']='Choose Payment Type';
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/choosepayment',$data);
        $this->load->view('front/commons/footer_new');
    }
    
    public function paymentGateway($price,$post_id){
        if(empty($this->session->userdata('stripe_payment'))){
            redirect(base_url());
        }
        $user = $this->getDataByUniqueId();
        $user_id = $user['user_id'];
        $data['post_id'] = $post_id;
        $data['postPrice'] = $price;
        $data['title'] = 'Choose Payment Gateway';
		$data['chatList'] = $this->Post_model->chatList($user_id);
        $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/paymentGateway',$data);
        $this->load->view('front/commons/footer_new');
    }
    
    public function stripe($postPrice,$post_id){
        $user_detail = $this->getDataByUniqueId();
        $user_id = $user_detail['user_id'];
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('acc', 'Kontonummer', 'required');
        $this->form_validation->set_rules('name', 'Name des Halters', 'required');
        $this->form_validation->set_rules('month', 'Monat', 'required');
        $this->form_validation->set_rules('year', 'Jahr', 'required');
        $this->form_validation->set_rules('cvv', 'CVV', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        require_once('application/libraries/stripe-php/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
         try {
            $charge = \Stripe\Charge::create ([
                    "amount" => ($postPrice * 100),
                    "currency" => "EUR",
                    "source" => $this->input->post('stripeToken'),
                    "description" => "Test payment" 
            ]);
            $chargeJson = $charge->jsonSerialize();
            } catch(Stripe_CardError $e) {
              // Since it's a decline, Stripe_CardError will be caught
              $body = $e->getJsonBody();
              $err  = $body['error'];
            
              print('Status is:' . $e->getHttpStatus() . "\n");
              print('Type is:' . $err['type'] . "\n");
              print('Code is:' . $err['code'] . "\n");
              // param is '' in this case
              print('Param is:' . $err['param'] . "\n");
              print('Message is:' . $err['message'] . "\n");
            } catch (Stripe_InvalidRequestError $e) {
                
              // Invalid parameters were supplied to Stripe's API
            } catch (Stripe_AuthenticationError $e) {
              // Authentication with Stripe's API failed
              // (maybe you changed API keys recently)
            } catch (Stripe_ApiConnectionError $e) {
              // Network communication with Stripe failed
            } catch (Stripe_Error $e) {
              // Display a very generic error to the user, and maybe send
              // yourself an email
            } catch (Exception $e) {
              // Something else happened, completely unrelated to Stripe
            }
         if($chargeJson)
         {
             $txn_id = $chargeJson['balance_transaction'];
             $this->Post_model->stripetransaction($user_id,$post_id,$txn_id);
			 $this->Post_model->updateAdType($postPrice,$post_id);
			  redirect('Post/success/'.$postPrice);
         }else{
            $this->session->unset_userdata('stripe_payment');
            redirect('Post/paymentFailure/');
        }
    }
    
    public function success($postPrice){
        $data['title'] = 'Thanks for Payment';
        $data['price'] = $postPrice;
		$data['login_user'] = $this->getDataByUniqueId();
		$login_user = $data['login_user']['user_id'];
        $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/success',$data);
        $this->load->view('front/commons/footer_new');
    }
    
    public function paymentFailure(){
        $this->session->set_flashdata('failed','paymentfailed');
        $data['title'] = 'Payment Failed';
        $data['login_user'] = $this->getDataByUniqueId();
		$login_user = $data['login_user']['user_id'];
        $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/failure');
        $this->load->view('front/commons/footer_new');
    }
    
    public function delPosts($post_id){
        $this->output->set_content_type('application/json');
        $this->Post_model->delPosts($post_id);
		$post = $this->Post_model->postById($post_id);
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Post "'. $post['title'].'" deleted successfully.', 'url' => base_url('Site/myPosts')]));
        return FALSE;
    }
    
    public function editposts($post_id){
        $data['title'] = 'Edit Post';
        $data['postById'] = $this->Post_model->postById($post_id);
        $data['postimgById'] = $this->Post_model->postimgById($post_id);
        $data['getmanufactures'] = $this->Post_model->getmanufactures();
        $data['getsize'] = $this->Post_model->getsize();
        $data['getpcd'] = $this->Post_model->getpcd();
        $data['getLocations'] = $this->Post_model->getLocations();
        $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/addPost',$data);
        $this->load->view('front/commons/footer_new');
    }
    
    public function doeditpost($post_id){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('title', 'Titel', 'required');
        $this->form_validation->set_rules('rim', 'Felgenmerkmale', 'required');
        $this->form_validation->set_rules('manufacture', 'Hersteller Typ', 'required');
        $this->form_validation->set_rules('size', 'Größe Typ', 'required');
        $this->form_validation->set_rules('pcd', 'PCD-Typ', 'required');
        $this->form_validation->set_rules('city', 'Standorttyp', 'required');
        $this->form_validation->set_rules('color', 'Farbe', 'required');
        $this->form_validation->set_rules('price', 'Preis', 'required');
        $this->form_validation->set_rules('desc', 'Beschreibung', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $postimgById = $this->Post_model->postimgById($post_id);
        if(!empty($_FILES['file1']['name'])){
            $file1=$this->doUploadFile('file1');
        }else{
            $file1=$postimgById[0]['media'];
        }
        if(!empty($_FILES['file2']['name'])){
            $file2 = $this->doUploadFile('file2');
        }else{
            if(!empty($postimgById[1]['media'])){
                $file2=$postimgById[1]['media']; 
            }else{
                $file2 = '';
            }
        }
        if(!empty($_FILES['file3']['name'])){
            $file3 = $this->doUploadFile('file3');
        }else{
           if(!empty($postimgById[2]['media'])){
                $file3=$postimgById[2]['media']; 
            }else{
                $file3 = '';
            }
        }
        if(!empty($_FILES['file4']['name'])){
            $file4 = $this->doUploadFile('file4');
        }else{
           if(!empty($postimgById[3]['media'])){
                $file4=$postimgById[3]['media']; 
            }else{
                $file4 = '';
            }
        }
        $result = $this->Post_model->doeditpost($post_id,$file1,$file2,$file3,$file4);
        if($result){
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Site/myPosts'), 'msg' => 'Beitrag aktualisiert']));
            return FALSE;
            
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Post/editposts'), 'msg' => 'Etwas ist schief gelaufen']));
            return FALSE;
        }
    }
	
	public function chatwithseller($user_id, $post_id, $chat_id=null){
		if(!empty($chat_id)) {
	    	$data['chat_id'] = $chat_id;
		}else{
		    $data['chat_id'] = "";
		}
		$data['post_id'] = $post_id;
		$data['receiver_user'] = $this->Post_model->receiver_user_Details($user_id);
        $data['receiver_user']['post_id'] = $post_id;
        $data['login_user'] = $this->getDataByUniqueId();
		$login_user = $data['login_user']['user_id'];
        $data['checkpostuserId'] = $this->Post_model->checkpostuserId($login_user,$post_id);
		$data['check'] = $data['checkpostuserId']['post_id'];
		$data['title'] = 'Chat With Seller';
		$data['chatList'] = $this->Post_model->chatList($login_user);
		$data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/chat',$data);
        $this->load->view('front/commons/footer_new');
	}
	
	public function addChatList(){
         $this->output->set_content_type('application/json');
         $sender_id = $this->input->post('sender_id');
         $reciever_id = $this->input->post('reciever_id');
         $post_id = $this->input->post('post_id');
         $message = $this->input->post('message');
         $time = date("h:i");
		 $result_sender=$this->Post_model->checkSenderToReceiver($post_id,$sender_id, $reciever_id, $message, $time);
		 $result_receiver=$this->Post_model->checkReceiverToSender($post_id,$sender_id, $reciever_id, $message, $time);
		 if($result_sender || $result_receiver){
			$result = $this->Post_model->updatechatlist($post_id,$message,$time);
		 }else{
			$result = $this->Post_model->insertchatList($post_id,$sender_id, $reciever_id, $message, $time);
		 }
		if($result){
            echo'inserted';
        }
    }
	
	public function review($receiver_id,$post_id){
		if(empty($this->session->userdata('unique_id'))){
			return redirect('Site/signUp');
		}
		$this->output->set_content_type('application/json');
        $this->form_validation->set_rules('rating', 'Bewertungen', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
		$data['login_user'] = $this->getDataByUniqueId();
		$sender_id = $data['login_user']['user_id'];
		$result = $this->Post_model->review($sender_id,$receiver_id,$post_id);
		if($result){
		    $this->Post_model->updateChatStatus($sender_id,$receiver_id,$post_id);
			$this->output->set_output(json_encode(['result' => 5, 'url' => base_url('/'), 'msg' => 'Vielen Dank für die Überprüfung']));
            return FALSE;
		}else{
			$this->output->set_output(json_encode(['result' => -1, 'url' => base_url('/'), 'msg' => 'Etwas ist schief gelaufen']));
            return FALSE;
		}
	}
	
	public function wishlist(){
	    $data['user'] = $this->getDataByUniqueId();
		$user_id = $data['user']['user_id'];
	    $data['title'] = 'My Wishlist';
	    $data['wishlist'] = $this->Post_model->wishlist($user_id);
	    $i=0;
	    foreach($data['wishlist'] as $wish) {
	        $post_id = $wish['post_id'];
	        $image = $this->Ecommerce_model->getuserspostImages($post_id);
            if(!empty($image)){
                $data['wishlist'][$i]['image'] = base_url('uploads/posts/'.$image['media']);
            }else{
                $data['wishlist'][$i]['image'] = '';
            }
            $i++;
	    }
	    $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $data['getaddress'] = $this->Ecommerce_model->getaddress();
	    $this->load->view('front/commons/header',$data);
        $this->load->view('front/wishlist');
        $this->load->view('front/commons/footer',$data);
	}
	
	public function deletechat($chat_id){
	    $this->output->set_content_type('application/json');
	    $result = $this->Post_model->deletechat($chat_id);
	    if($result){
	        $this->output->set_output(json_encode(['result' => 5, 'url' => base_url('/'), 'msg' => 'Chat Deleted']));
            return FALSE;
	    }else{
	        $this->output->set_output(json_encode(['result' => -1,  'msg' => 'Etwas ist schief gelaufen']));
            return FALSE;
	    }
	}
	
	public function paypal($postPrice,$post_id) {
        $this->load->library('paypal_lib');
        $data['user'] = $this->getDataByUniqueId();
		$user_id = $data['user']['user_id'];
        // Set variables for paypal form
        $returnURL = base_url() . 'Post/success_paypal/'.$postPrice.'/'.$post_id.'/'.$user_id;
        $cancelURL = base_url() . 'Post/cancel';
        $notifyURL = base_url() . 'Post/ipn';

        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name','Post');
        $this->paypal_lib->add_field('custom', $user_id);
        $this->paypal_lib->add_field('item_number','1');
        $this->paypal_lib->add_field('amount', $postPrice);
        $this->paypal_lib->paypal_auto_form();
    }
    
    public function success_paypal() {
        $orderdata = array(
            'user_id' => $user_id,
            'post_id' => $post_id,
            'txn_id' => date('d-M-Y h:i:s'),
            'source' => 'paypal'
        );
        $result = $this->Post_model->paypal($orderdata);
        $this->load->view('pages/commons/front-header', $data);
        $this->load->view('pages/order_success');
        $this->load->view('pages/commons/front-footer');
        
    }

    public function cancel() {
        $this->load->library('paypal_lib');
        $data['title'] = 'Payment Failed';
        $data['login_user'] = $this->getDataByUniqueId();
		$login_user = $data['login_user']['user_id'];
        $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
        $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
        $this->load->view('front/commons/header',$data);
        $this->load->view('front/failure');
        $this->load->view('front/commons/footer_new');
    }

    public function ipn() {
        $this->load->library('paypal_lib');
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        if (!empty($paypalInfo)) {
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
            // Check whether the transaction is valid
            if ($ipnCheck) {
                // Insert the transaction data in the database
                $data['user_id'] = $paypalInfo["custom"];
                $data['product_id'] = $paypalInfo["item_number"];
                $data['txn_id'] = $paypalInfo["txn_id"];
                $data['payment_gross'] = $paypalInfo["mc_gross"];
                $data['currency_code'] = $paypalInfo["mc_currency"];
                $data['payer_email'] = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];
                $this->product->insertTransaction($data);
            }
        }
    }
    
    public function sendNotification(){
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $text = $this->input->post('msg');
        $result = $this->Post_model->getTokenByid($user_id);
        $token = $result['token_id'];
        if($result){    
            $msg= array('body'	=> $text ,
		            'title'	=> 'New Message'
		    );
            $res = $this->send_notification($token,$msg);
            return $res;
       }
    }
    
    function send_notification($token,$msg){
        define( 'API_ACCESS_KEY', 'AAAAMHB7GD8:APA91bFj-nk-afJVFTns4pQPXmqAL_FgDK6m7tyPf-wF7hRHoE-yIICuj_6BUUpM_M96zpk4Bg2TAJ6m037X5Dg9npcgW8VmIicGDmBGBJxF4mvED9-97w-RM0hezh8fy3E6jr7mM-Mn');	    
		    $fields = array(
    			 'to' => $token,
    			 'notification' =>$msg
		 	);
            $headers = array('Authorization:key = '.API_ACCESS_KEY,
                'Content-Type: application/json'
            );
    	    $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       
            $result = curl_exec($ch);    
            if ($result === FALSE) {
               die('Curl failed: ' . curl_error($ch));
           }
           curl_close($ch);
           return 'Notification Send All';
	}
}
?>