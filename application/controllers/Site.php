<?php defined('BASEPATH') or exit('No direct script access allowed');
    header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");

    /**
     * Author Rohan Singh
    */
    class Site extends CI_Controller{
    	
    	public function __construct(){
    		parent::__construct();
    		$this->load->model(['Ecommerce_model']);
            $this->load->model(['Post_model']);
            $this->load->config('facebook');
    	}
    
        public function getDataByUniqueId() {
            if (!empty($this->session->userdata('unique_id'))) {
                $unique_id = $this->session->userdata('unique_id');
                $data = $this->Ecommerce_model->getDataByUniqueId($unique_id);
                return $data;
            }
        }
    
        public function uniqueId() {
            $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNIPQRSTUVWXYZ';
            $nstr = str_shuffle($str);
            $unique_id = substr($nstr, 0, 10);
            return $unique_id;
        }
    
    	public function index(){
    		$data['title'] = 'Home';
            $data['user'] = $this->getDataByUniqueId();
    		$user_id = $data['user']['user_id'];
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getbasic'] = $this->Ecommerce_model->getLatest($user_id);
            $data['getPopular'] = $this->Ecommerce_model->getPopular($user_id);
            $i=0;
            foreach($data['getbasic'] as $basic){
                $post_id = $basic['post_id'];
                $basicimage=$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($basicimage['media'])){
                    $data['getbasic'][$i]['image']=base_url('uploads/posts/test/'.$basicimage['media']);   
                }else{
                    $data['getbasic'][$i]['image']='';
                }
                $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($data['user']['user_id']);
                $arr = [];
                foreach ($data['wishlists'] as $wishlist) {
                    $arr[] = $wishlist['post_id'];
                }
                $data['wishlists'] = $arr;
                $i++;
            }
            $i=0;
            foreach($data['getPopular'] as $popular){
                $post_id = $popular['post_id'];
                $popularimage =$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($popularimage['media'])){
                    $data['getPopular'][$i]['image']=base_url('uploads/posts/test/'.$popularimage['media']);   
                }else{
                    $data['getPopular'][$i]['image']='';
                }
                $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($data['user']['user_id']);
                $arr = [];
                foreach ($data['wishlists'] as $wishlist) {
                    $arr[] = $wishlist['post_id'];
                }
                $data['wishlists'] = $arr;
                $i++;
            }
    		if(!empty($this->session->userdata('unique_id'))){
    		    $data['chatList'] = $this->Post_model->chatList($user_id);		
    		}
            $data['getmanufactures'] = $this->Post_model->getmanufactures();
            $data['getsize'] = $this->Post_model->getsize();
            $data['getpcd'] = $this->Post_model->getpcd();
            $data['getLocations'] = $this->Post_model->getLocations();
            $data['getcolors'] = $this->Ecommerce_model->getcolors();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header',$data);
            $this->load->view('front/index',$data);
            $this->load->view('front/commons/footer',$data);
        }
    
        public function signUp(){
            $data['title'] = 'Signup';
    		$data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/signup');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function register() {
            $this->output->set_content_type('application/json');
            $this->form_validation->set_message('is_unique', 'This {field} is already taken.');
            $this->form_validation->set_rules('name', 'Nutzername', 'required');
            $this->form_validation->set_rules('email', 'E-Mail-ID', 'required|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Passwort', 'required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Kennwort bestätigen', 'required|max_length[20]|matches[password]');
            if ($this->form_validation->run() === FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            $unique_id = $this->uniqueId();
            $result = $this->Ecommerce_model->registerForm($unique_id);
            if ($result) {
                $this->session->set_userdata('unique_id', $unique_id);
                $this->session->set_userdata('userId', $result);
                $this->load->library('email');
                $htmlContent = "<h3>Sehr Geehrter " . $result['name'] . ",</h3>";
                $htmlContent .= "<div style='padding-top:8px;'>Willkommen bei Felgeninserate</div>";
                $htmlContent .= "Vielen Dank, dass Sie sich bei uns angemeldet haben.";
                $to = $result['email'];
                $subject = 'Willkommen bei Felgeninserate';
                $message = $htmlContent;
                    $header = "from:Felgeninserate<info@felgen.com> \r\n";
                    $header .= "MIME-Version: 1.0\r\n";
                    $header .= "Content-type: text/html\r\n";
                    $retval = mail ($to,$subject,$message,$header);
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Anmeldung erfolgreich', 'url' => base_url('bank_detail')]));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Sie haben bereits einen Account angelegt !! Bitte loggen Sie sich ein']));
                return FALSE;
            }
        }
    
        public function bankDetail(){
            $data['title'] = 'Bank Detail';
            $data['user'] = $this->getDataByUniqueId();
    		$data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/bank_detail', $data);
            $this->load->view('front/commons/footer',$data);
        }
    
        public function doUpdateBankDetail($user_id){
            $this->output->set_content_type('application/json');
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
            $this->form_validation->set_rules('branch_name', 'Zweigname', 'required');
            $this->form_validation->set_rules('acc_no', 'Kontonummer', 'required');
            $this->form_validation->set_rules('cacc_no', 'Kontonummer bestätigen', 'required|matches[acc_no]');
            $this->form_validation->set_rules('ifsc', 'IFSC-Code', 'required|max_length[16]');
            $this->form_validation->set_rules('recipient', 'Empfängername', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            $user = $this->getDataByUniqueId();
            $result = $this->Ecommerce_model->doUpdateBankDetail($user['user_id']);
            if ($result) {
                $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('/'), 'msg' => 'Detail erfolgreich aktualisiert']));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('/'), 'msg' => 'Detailaktualisierung fehlgeschlagen !!']));
                return FALSE;
            }
        }
    
        public function login_username(){
            if(!empty($this->session->userdata('unique_id'))) {
                redirect(base_url());
            }
            $data['title'] = 'Login';
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
    	    $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
    	    $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/login_username');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function doLoginUsername(){
            $this->output->set_content_type('application/json');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run() == FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            $checkmail = $this->Ecommerce_model->checkmail($this->input->post('email'));
            if($checkmail){
                $this->session->set_userdata('unique_email', $checkmail);
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Email überprüft' ,'url' => base_url('login_password')]));
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Email existiert nicht.']));
                return FALSE;
            }
        }
    
        public function login_password(){
            $data['title'] = 'Login';
            $data['user'] = $this->session->userdata('unique_email');
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
    		$data['contact_address'] = $this->Ecommerce_model->getContactAddress();
    		$data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header_new', $data);
            $this->load->view('front/login_password');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function doLoginPassword($user_id){
            $this->output->set_content_type('application/json');
            $this->form_validation->set_message('password', 'Falsches Passwort');
            $this->form_validation->set_rules('password', 'Passwort', 'required|min_length[6]|max_length[20]');
            if ($this->form_validation->run() == FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            $user = $this->session->userdata('unique_email');
            $checkpass = $this->Ecommerce_model->checkpass($user['email'], $this->security->xss_clean(hash('sha256',$this->input->post('password'))));
            if($checkpass){
                $this->session->set_userdata('unique_id', $checkpass['unique_id']);
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Anmeldung erfolgreich' ,'url' => base_url('/')]));
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Das Passwort ist inkorrekt.']));
                return FALSE;
            }
        }
    
        public function fbLogin() {
            if ($this->facebook->is_authenticated()) {
                $userProfile = $this->facebook->request('get', '/me?fields=id,name,email');
                if (!isset($userProfile['error'])) {
                    if(empty($userProfile['email'])){
                        $this->session->set_flashdata('fb_req_email', "Bitte fügen Sie Ihre E-Mail in Facebook");
                        redirect(base_url('/'));
                    }
                    $session_data['email'] = $userProfile['email'];
                    $session_data['name'] = $userProfile['name'];
                    $session_data['source'] = 'facebook';
                    $email = $session_data['email'];
                    $name = $session_data['name'];
                    $source = 'facebook';
                    $result = $this->Ecommerce_model->checkClient($email);
                    if ($result) {
                        $this->session->set_userdata('unique_id', $result['unique_id']);
                        redirect(base_url('/'));
                    } else {
                        $unique_id = substr(md5(time()),0, 10);
                        $this->Ecommerce_model->client_login($session_data, $unique_id);
                        $this->session->set_userdata('unique_id', $unique_id);
                        redirect(base_url('/'));
                    }
                } else {
                    $this->facebook->destroy_session();
                    $url = $this->session->userdata('postUrl');
                    redirect($_SERVER['http_reffrer']);
                }
            }
        }
    
        public function saveUrl(){
            $this->output->set_content_type('application/json');
            $postUrl=$this->input->post('postUrl');
            $this->session->set_userdata('postUrl',$postUrl);
            $this->output->set_output(json_encode(['result' => 1, 'url' => $postUrl]));
            return FALSE;
        }
    
        public function forgotPassword(){
    		if(!empty($this->session->userdata('unique_id'))){
    			return redirect('/');
    		}
            $data['title'] = 'Forgot Password';
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header',$data);
            $this->load->view('front/forgot-password',$data);
            $this->load->view('front/commons/footer');
        }
    
        public function forgot_password_checked() {
            $this->output->set_content_type('application/json');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            $result = $this->Ecommerce_model->verify_username();
            if ($result) {
                $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                $activationcode = substr(str_shuffle($str), 0, 10);
                $this->send_forgot_password_link($result, $activationcode);
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Der Link zum Zurücksetzen des Passworts wurde an Ihre E-Mail-ID gesendet. Bitte überprüfen Sie Ihre E-Mail-Adresse.', 'url' => base_url('Site/login_username')]));
                return FALSE;
            }else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Benutzer existiert nicht..!!']));
                return FALSE;
            }
        }
    
        public function send_forgot_password_link($result, $activationcode) {
            $this->load->library('email');
            $getEmailResponse = $this->Ecommerce_model->insert_user_activationcode($activationcode, $result);
            $htmlContent = "<h3>Hallo" .''. $result['name'] . ",</h3>";
            $htmlContent .= "<div style='padding-top:8px;'>Klicken Sie hier, um ein neues Passwort zu erstellen</div>";
            $htmlContent .= base_url('reset-password/' . $result['user_id'] . '/' . $activationcode);
            $to = $result['email'];
            $subject = 'Passwort zurücksetzen';
            $message = $htmlContent;
                $header = "from:Felgeninserate<info@felgen.com> \r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";
                $retval = mail ($to,$subject,$message,$header);
            return true;
        }
    
        public function password_reset($user_id, $activationcode) {
    // 		if(empty($this->session->userdata('unique_id'))){
    // 			return redirect('/');
    // 		}
            $data['user_id'] = $user_id;
            $checkResponse = $this->Ecommerce_model->update_user_email_status($user_id, $activationcode);
            $data['title'] = "Reset Password";
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            if ($checkResponse) {
                $this->load->view('front/commons/header_new',$data);
                $this->load->view('front/reset-password',$data);
                $this->load->view('front/commons/footer_new');
            } else {
                echo "This is the Wrong or Expired Activation Code";
            }
        }
    
        public function update_forgot_password() {
            $this->output->set_content_type('application/json');
            $this->form_validation->set_rules('new_password', 'Neues Kennwort', 'required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('conf_password', 'Kennwort bestätigen', 'required|max_length[20]|matches[new_password]');
            if ($this->form_validation->run() === FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            $result = $this->Ecommerce_model->doChangeForgotPassword();
            if ($result) {
                $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('login_username'), 'msg' => 'Passwort erfolgreich geändert.']));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Aktuelles Passwort und Neues Passwort sollten nicht gleich sein!']));
                return FALSE;
            }
        }
    
        public function contactUs() {
            $data['title'] = 'Contact Us';
    		$data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
    		}
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header',$data);
            $this->load->view('front/contactus');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function doContactUs() {
            $this->output->set_content_type('application/json');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('message', 'Botschaft', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            $result = $this->Ecommerce_model->contactUs();
            if ($result) {
                $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('contactus'), 'msg' => 'Erfolgreich kontaktiert']));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('contactus'), 'msg' => 'Kontakt fehlgeschlagen !!']));
                return FALSE;
            }
        }
    
        public function about_us() {
            $data['title'] = 'About Us';
    		$data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);	
    		}
            $data['about_us'] = $this->Ecommerce_model->getSiteSettings();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/about');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function terms() {
            $data['title'] = 'Terms & Conditions';
    		$data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
    		}
            $data['terms'] = $this->Ecommerce_model->getSiteSettings();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/terms');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function privacy() {
            $data['title'] = 'Privacy Policy';
    		$data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);	
    		}
            $data['privacy'] = $this->Ecommerce_model->getSiteSettings();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/privacy');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function support() {
            $data['title'] = 'Support';
    		$data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
    		}
            $data['support'] = $this->Ecommerce_model->getSiteSettings();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/support');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function info() {
            $data['title'] = 'Info';
    		$data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
    		}
            $data['info'] = $this->Ecommerce_model->getSiteSettings();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/info');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function faq() {
            $data['title'] = 'FAQ';
    		$data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
    		}
            $data['faq'] = $this->Ecommerce_model->getallFaqs();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/faq');
            $this->load->view('front/commons/footer',$data);
        }
    
        public function logout(){
            $this->output->set_content_type('application/json');
            $this->session->unset_userdata('unique_id');
            $this->session->unset_userdata('userId');
            redirect(base_url('/'));
        }
    
        public function profile(){
    		if(empty($this->session->userdata('unique_id'))){
    			return redirect('/');
    		}
    		$data['login_user'] = $this->getDataByUniqueId();
    		$login_user = $data['login_user']['user_id'];
    		$data['chatList'] = $this->Post_model->chatList($login_user);
            $data['title'] = 'Profile';
            $data['user'] = $this->getDataByUniqueId();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/profile',$data);
            $this->load->view('front/commons/footer',$data);
        }
        
        public function doupdateprofile(){
            $this->output->set_content_type('application/json');
            $user = $this->getDataByUniqueId();
            $user_id = $user['user_id'];
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('number', 'Telefonnummer', 'numeric|min_length[10]');
            if ($this->form_validation->run() == FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            if (!empty($_FILES['imageUpload']['name'])) {
                $image_name = $_FILES['imageUpload']['name'];
                $img = rand(1, 99999);
                $image_tmp = $_FILES['imageUpload']['tmp_name'];
                $allowed_types = ["jpeg","jpg","png"];
                $ext = pathinfo($image_name, PATHINFO_EXTENSION);
                if(in_array($ext, $allowed_types)){
                    $image = $img.".".$ext;
                    move_uploaded_file($image_tmp, './uploads/profile-images/'.$image);
                }
            }else{
                $image = $user['image'];
            }
            $result = $this->Ecommerce_model->doupdateprofile($image,$user_id);
            if ($result) {
                $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Site/profile'), 'msg' => 'Profil aktualisiert']));
                return FALSE;
            }else {
                $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Site/profile'), 'msg' => 'Es wurden keine Änderungen vorgenommen.']));
                return FALSE;
            }  
        }
    
        function doUploadImg($path) {
            $config = array(
                'upload_path' => "./system",
                'allowed_types' => "jpeg|jpg|png",
                'file_name' => rand(11111, 99999),
                'max_size' => "3048" // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );
            $this->load->library('upload', $config);
            if($this->upload->do_upload($path)) {
                $data = $this->upload->data();
                return $data['file_name'];
            } else {
                $this->session->set_userdata('error', [$path => $this->upload->display_errors()]);
                return 0;
            }
        }
        
        public function doUpdateBankDeatils(){
            $this->output->set_content_type('application/json');
            $user = $this->getDataByUniqueId();
            $user_id = $user['user_id'];
            $result = $this->Ecommerce_model->doUpdateBankDeatils($user_id);
            if ($result) {
                $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Site/profile'), 'msg' => 'Bankverbindung aktualisiert']));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Es wurden keine Änderungen vorgenommen.']));
                return FALSE;
            } 
        }
        
        public function doUpdatePass(){
            $this->output->set_content_type('application/json');
            $data['user_data'] = $user = $this->getDataByUniqueId();
            $this->form_validation->set_rules('op', 'Altes Passwort', 'required|min_length[6]|max_length[20]');
            if ($this->form_validation->run() === FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
            $this->form_validation->set_rules('np', 'Neues Kennwort', 'required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('cp', 'Kennwort bestätigen', 'required|matches[np]|min_length[6]|max_length[20]');
            $result = $this->Ecommerce_model->do_check_oldpassword($user['email']);
            if(empty($result)){
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Altes Passwort stimmt nicht mit aktuellem Passwort überein!']));
                return FALSE;
            }else{
                if($this->input->post('op') == $this->input->post('np')){
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Aktuelles Passwort und Neues Passwort sollten nicht gleich sein!']));
                    return FALSE;
                }
                if ($this->form_validation->run() === FALSE) {
                    $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                    return FALSE;
                }
            }
            $changed = $this->Ecommerce_model->reset_password($user['email']);
            if ($changed) {
                $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('/'), 'msg' => 'Passwort erfolgreich aktualisiert.']));
                return FALSE;
            }
        }
        
        public function myPosts(){
    		if(empty($this->session->userdata('unique_id'))){
    			return redirect('/');
    		}
    		$data['delete'] = 1;
    		$data['login_user'] = $this->getDataByUniqueId();
    		$login_user = $data['login_user']['user_id'];
    		$data['chatList'] = $this->Post_model->chatList($login_user);
            $data['title'] = 'My Posts';
            $user = $this->getDataByUniqueId();
            $user_id = $user['user_id'];
            $data['getusersposts'] = $this->Ecommerce_model->getusersposts($user_id);
            $i=0;
            foreach($data['getusersposts'] as $posts){
                $post_id = $posts['post_id'];
                $image = $this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($image)){
                    $data['getusersposts'][$i]['image'] = base_url('uploads/posts/'.$image['media']);
                }else{
                    $data['getusersposts'][$i]['image'] = '';
                }
                $i++;
            }
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/myposts',$data);
            $this->load->view('front/commons/footer',$data);
        }
        
        public function postDetails($post_id){
            $data['title'] = 'Post Details';
            $data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
        		
    		}
    		$data['review'] = $this->Ecommerce_model->review($post_id);
            $data['postDetail'] = $this->Ecommerce_model->postDetail($post_id);
            $data['postImages'] = $this->Ecommerce_model->postImages($post_id);
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($data['user']['user_id']);
            $arr = [];
            foreach ($data['wishlists'] as $wishlist) {
                $arr[] = $wishlist['post_id'];
            }
            $data['wishlists'] = $arr;
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/postDetails',$data);
            $this->load->view('front/commons/footer',$data);
        }
        
        public function userpostDetails($post_id){
            $data['title'] = 'My Post Details';
            $data['user'] = $this->getDataByUniqueId();
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
        		$data['review'] = $this->Ecommerce_model->review($post_id);	
    		}
            $data['postDetail'] = $this->Ecommerce_model->postDetail($post_id);
            $data['postImages'] = $this->Ecommerce_model->postImages($post_id);
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($data['user']['user_id']);
            $arr = [];
            foreach ($data['wishlists'] as $wishlist) {
                $arr[] = $wishlist['post_id'];
            }
            $data['wishlists'] = $arr;
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/userpostDetails',$data);
            $this->load->view('front/commons/footer',$data);
        }
    
        public function success(){
            $data['title'] = 'Success Page';
            $data['user'] = $this->getDataByUniqueId();
    		$login_user = $data['user']['user_id'];
    		$data['chatList'] = $this->Post_model->chatList($login_user);
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header', $data);
            $this->load->view('front/success',$data);
            $this->load->view('front/commons/footer',$data);
        }
    
        public function postWishlist($post_id, $user_id) {
            $this->output->set_content_type('application/json');
            $checkingResponse = $this->Ecommerce_model->checkPostWishlist($post_id, $user_id);
            if ($checkingResponse) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Produkt erfolgreich von Wunschliste gelöscht !.']));
                return FALSE;
            } else {
                $response = $this->Ecommerce_model->addPostWishlist($post_id, $user_id);
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Produkt erfolgreich zur Wunschliste hinzugefügt !.']));
                return FALSE;
            }
        }
        
        public function post_wrapper(){
            $this->output->set_content_type('application/json');
            $data['user'] = $this->getDataByUniqueId();
    		$user_id = $data['user']['user_id'];
    		if(empty($this->session->userdata('unique_id'))){
    			$data['getPopular'] = $this->Ecommerce_model->getPopularwithoutlogin();
    		}
            $data['getPopular'] = $this->Ecommerce_model->getPopular($user_id);
            $i=0;
            foreach($data['getPopular'] as $popular) {
                $post_id = $popular['post_id'];
                $popularimage =$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($popularimage['media'])){
                    $data['getPopular'][$i]['image']=base_url('uploads/posts/'.$popularimage['media']);   
                }else{
                    $data['getPopular'][$i]['image']='';
                }
                $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($user_id);
                $arr = [];
                foreach ($data['wishlists'] as $wishlist) {
                    $arr[] = $wishlist['post_id'];
                }
                $data['wishlists'] = $arr;
                $i++;
            }
            $content_wrapper = $this->load->view('front/include/post_wrapper', $data, true);
            $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
            return FALSE;
        }
        
        public function dohomepagefilteration(){
            $manufacture=$this->input->post('manufacture');
            $size = $this->input->post('size');
            $pcd = $this->input->post('pcd');
            $color = $this->input->post('color');
            $location = $this->input->post('location');
            $data['user'] = $user = $this->getDataByUniqueId();
            $user_id = "";
            if(!empty($user['user_id'])){
                $user_id = $user['user_id'];
            }
            $data['result'] = $this->Ecommerce_model->dohomepagefilteration($manufacture,$size,$pcd,$color,$location,$user_id);
            // print_r($data['result']);die;
            if($data){
            $i=0;
            foreach($data['result'] as $res){
                $post_id = $res['post_id'];
                $popularimage =$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($popularimage['media'])){ 
                    $data['result'][$i]['image']=base_url('uploads/posts/'.$popularimage['media']);   
                }else{
                    $data['result'][$i]['image']='';
                }
                $i++;
            }
            $data['getmanufactures'] = $this->Post_model->getmanufactures();
            $data['getsize'] = $this->Post_model->getsize();
            $data['getpcd'] = $this->Post_model->getpcd();
            $data['getLocations'] = $this->Post_model->getLocations();
            $data['getcolors'] = $this->Ecommerce_model->getcolors();
            $data['title'] = 'Homepage Filters';  
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($data['user']['user_id']);
                $arr = [];
                foreach ($data['wishlists'] as $wishlist) {
                    $arr[] = $wishlist['post_id'];
                }
                $data['wishlists'] = $arr;
                $i++;
            $this->load->view('front/commons/header',$data);
            $this->load->view('front/homepagefilter',$data);
            $this->load->view('front/commons/footer',$data);
                
            } 
        }
        
    	public function chat_wrapper($user_id,$post_id,$chat_id=null,$check=null){
    		$this->output->set_content_type('application/json');
    		$user = $this->getDataByUniqueId();
    		$data['user'] = $user['user_id'];
    		if(!empty($chat_id)){
    		    $data['chat_id'] = $chat_id;
    		}else{
    		    $data['chat_id'] = "";
    		}
    		$data['check'] = $check;
    		$data['chatStatus'] = $this->Post_model->checkChatStatus($user['user_id'], $post_id, $user_id);
    		$data['postdetailchat'] = $this->Post_model->postdetailchat($post_id);
    		$data['postchatimg'] = $this->Post_model->postchatimg($post_id);
    		$data['receiver_user'] = $this->Post_model->receiver_user_Details($user_id);
    		$chat_wrapper = $this->load->view('front/include/chat_wrapper', $data, true);
            $this->output->set_output(json_encode(['result' => 1, 'chat_wrapper' => $chat_wrapper]));
            return FALSE;
    	}
    	
    	public function dochatfilter($receiver_id){
    		$this->output->set_content_type('application/json');
    		$data['receiver_user'] = $this->Ecommerce_model->dochatfilter($receiver_id);
    		$chat_wrapper = $this->load->view('front/include/chat_wrapper', $data, true);
            $this->output->set_output(json_encode(['result' => 1, 'chat_wrapper' => $chat_wrapper]));
            return FALSE;
    	}
    	
        public function dopopularfilteration(){
            $this->output->set_content_type('application/json');
            $manufacture=$this->input->post('manufacture');
            $size = $this->input->post('size');
            $pcd = $this->input->post('pcd');
            $color = $this->input->post('color');
            $location = $this->input->post('location');
            $data['user'] = $user = $this->getDataByUniqueId();
            $user_id = "";
            if(!empty($user['user_id'])){
                $user_id = $user['user_id'];
            }
            $result = $this->Ecommerce_model->dopopularfilteration($manufacture,$size,$pcd,$color,$location,$user_id);
            $data['getPopular'] = $result;
            $i=0;
            foreach($data['getPopular'] as $popular) {
                $post_id = $popular['post_id'];
                $popularimage =$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($popularimage['media'])){ 
                    $data['getPopular'][$i]['image']=base_url('uploads/posts/'.$popularimage['media']);   
                }else{
                    $data['getPopular'][$i]['image']='';
                }
                $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($data['user']['user_id']);
                $arr = [];
                foreach ($data['wishlists'] as $wishlist) {
                    $arr[] = $wishlist['post_id'];
                }
                $data['wishlists'] = $arr;
                $i++;
            }
            $content_wrapper = $this->load->view('front/include/post_wrapper', $data, true);
            $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
            return FALSE;
        }
        
        public function allProducts(){
    		$user = $this->getDataByUniqueId();
    		$user_id = $user['user_id'];
    		if(empty($this->session->userdata('unique_id'))){
    			$data['getPopular'] = $this->Ecommerce_model->getPopularwithoutlogin();
    		}
            $data['getPopular'] = $this->Ecommerce_model->getPopular($user_id);
            $i=0;
            foreach($data['getPopular'] as $popular){
                $post_id = $popular['post_id'];
                $popularimage =$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($popularimage['media'])){
                    $data['getPopular'][$i]['image']=base_url('uploads/posts/'.$popularimage['media']);   
                }else{
                    $data['getPopular'][$i]['image']='';
                }
                $i++;
            }
    		if(!empty($this->session->userdata('unique_id'))){
        		$data['chatList'] = $this->Post_model->chatList($user_id);
        		$data['review'] = $this->Ecommerce_model->review($post_id);	
    		}
            $data['title'] = 'Popular Products';
            $data['getmanufactures'] = $this->Post_model->getmanufactures();
            $data['getsize'] = $this->Post_model->getsize();
            $data['getpcd'] = $this->Post_model->getpcd();
            $data['getLocations'] = $this->Post_model->getLocations();
            $data['getcolors'] = $this->Ecommerce_model->getcolors();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
    		$data['user'] = $this->getDataByUniqueId();
    		$data['wishlists'] = $this->Ecommerce_model->getPostWishlist($data['user']['user_id']);
    		$arr = [];
    		foreach ($data['wishlists'] as $wishlist) {
    			$arr[] = $wishlist['post_id'];
    		}
    		$data['wishlists'] = $arr;
    		$i++;
            $this->load->view('front/commons/header',$data);
            $this->load->view('front/allProducts',$data);
            $this->load->view('front/commons/footer',$data);
        }
        
        public function basicProducts(){
    	    $data['user'] = $this->getDataByUniqueId();
    		$user_id = $data['user']['user_id'];
    		if(empty($this->session->userdata('unique_id'))){
    			$data['getbasic'] = $this->Ecommerce_model->getbasicwithoutlogin();
    		}
            $data['getbasic'] = $this->Ecommerce_model->getbasic($user_id);
            $i=0;
            foreach($data['getbasic'] as $basic){
                $post_id = $basic['post_id'];
                $basicimage=$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($basicimage['media'])){
                    $data['getbasic'][$i]['image']=base_url('uploads/posts/'.$basicimage['media']);   
                }else{
                    $data['getbasic'][$i]['image']='';
                }
                $i++;
            }
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
        // 		$data['review'] = $this->Ecommerce_model->review($post_id);
    		}
            $data['title'] = 'Basic Products';
            $data['getmanufactures'] = $this->Post_model->getmanufactures();
            $data['getsize'] = $this->Post_model->getsize();
            $data['getpcd'] = $this->Post_model->getpcd();
            $data['getLocations'] = $this->Post_model->getLocations();
            $data['getcolors'] = $this->Ecommerce_model->getcolors();
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header',$data);
            $this->load->view('front/basicproducts',$data);
            $this->load->view('front/commons/footer',$data);
        }
        
        public function basic_product_wrapper(){
            $this->output->set_content_type('application/json');
            $data['user'] = $this->getDataByUniqueId();
    		$user_id = $data['user']['user_id'];
    		if(empty($this->session->userdata('unique_id'))){
    			$data['getbasic'] = $this->Ecommerce_model->getbasicwithoutlogin();
    		}
            $data['getbasic'] = $this->Ecommerce_model->getbasic($user_id);
            $i=0;
            foreach($data['getbasic'] as $basic){
                $post_id = $basic['post_id'];
                $basicimage=$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($basicimage['media'])){
                    $data['getbasic'][$i]['image']=base_url('uploads/posts/'.$basicimage['media']);   
                }else{
                    $data['getbasic'][$i]['image']='';
                }
                $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($data['user']['user_id']);
                $arr = [];
                foreach ($data['wishlists'] as $wishlist) {
                    $arr[] = $wishlist['post_id'];
                }
                $data['wishlists'] = $arr;
                $i++;
            }
            $basic_wrapper = $this->load->view('front/include/basic_product_wrapper', $data, true);
            $this->output->set_output(json_encode(['result' => 1, 'basic_wrapper' => $basic_wrapper]));
            return FALSE; 
        }
        
        public function dobasicfilteration(){
            $this->output->set_content_type('application/json');
            $manufacture=$this->input->post('manufacture');
            $size = $this->input->post('size');
            $pcd = $this->input->post('pcd');
            $color = $this->input->post('color');
            $location = $this->input->post('location');
            $data['user'] = $user = $this->getDataByUniqueId();
            $user_ids = "";
            if(!empty($user['user_id'])){
                $user_ids = $user['user_id'];
            }
            $result = $this->Ecommerce_model->dobasicfilteration($manufacture,$size,$pcd,$color,$location,$user_ids);
            $data['getbasic'] = $result;
            $user_id = $data['user']['user_id'];
            $i=0;
            foreach($data['getbasic'] as $basic){
                $post_id = $basic['post_id'];
                $basicimage=$this->Ecommerce_model->getuserspostImages($post_id);
                if(!empty($basicimage['media'])){
                    $data['getbasic'][$i]['image']=base_url('uploads/posts/'.$basicimage['media']);   
                }else{
                    $data['getbasic'][$i]['image']='';
                }
                $data['wishlists'] = $this->Ecommerce_model->getPostWishlist($user_id);
                $arr = [];
                foreach ($data['wishlists'] as $wishlist) {
                    $arr[] = $wishlist['post_id'];
                }
                $data['wishlists'] = $arr;
                $i++;
            }
            $basic_wrapper = $this->load->view('front/include/basic_product_wrapper', $data, true);
            $this->output->set_output(json_encode(['result' => 1, 'basic_wrapper' => $basic_wrapper]));
            return FALSE;
        }
        
        public function userProfile($user_id){
            $data['user_id'] = $user_id;
            $data['user'] = $this->getDataByUniqueId();
            $data['postsByUser'] = $this->Ecommerce_model->postsByUser($user_id);
            $i=0;
            foreach($data['postsByUser'] as $postUser) {
                $post_id = $postUser['post_id'];
                $postimages=$this->Ecommerce_model->getuserspostImagesByUserId($post_id);
                if(!empty($postimages['media'])){
                    $data['postsByUser'][$i]['image']=base_url('uploads/posts/'.$postimages['media']);   
                }else{
                    $data['postsByUser'][$i]['image']='';
                }
                $i++;
            }
    		if(!empty($this->session->userdata('unique_id'))){
        		$login_user = $data['user']['user_id'];
        		$data['chatList'] = $this->Post_model->chatList($login_user);
        		$data['review'] = $this->Ecommerce_model->review($post_id);	
    		}
    		$data['adcountbyuser'] = $this->Ecommerce_model->adcountbyuser($user_id);
    		$data['avgrating'] = $this->Ecommerce_model->avgrating($user_id);
            if(empty($data['avgrating'])){
                $data['avgrating'] = 0;
            }
            $data['postuserDetails'] = $this->Ecommerce_model->postuserDetails($user_id);
            $data['title'] = 'View Profile';
            $data['socialmedia'] = $this->Ecommerce_model->getAllSocialMedias();
            $data['contact_address'] = $this->Ecommerce_model->getContactAddress();
            $data['getaddress'] = $this->Ecommerce_model->getaddress();
            $this->load->view('front/commons/header',$data);
            $this->load->view('front/userProfile',$data);
            $this->load->view('front/commons/footer',$data);
        }
        
        public function oauth2callback(){
            $this->output->set_content_type('application/json');
            $session_data['email'] = $this->input->post('email');
            $session_data['name'] = $this->input->post('name');
            $session_data['source'] = 'google';
            $email = $session_data['email'];
            $name = $session_data['name'];
            $source = 'google';
            $this->session->set_userdata('user_email', $email);
            $result = $this->Ecommerce_model->checkClient($email);
            if ($result) {
                $this->session->set_userdata('unique_id', $result['unique_id']);
            }else {
                $unique_id = $this->uniqueId();
                $this->Ecommerce_model->client_login($session_data, $unique_id);
                $this->session->set_userdata('unique_id', $unique_id);
            }
            $this->output->set_output(json_encode(['result' => 1]));
            return FALSE;
        }
    	
    	public function setapikey(){
            $this->output->set_content_type('application/json');
            $firebase = array(
                'apiKey' => "AIzaSyChGtdKcYx0clh5NIpeGeKJfnJ-rmuQgiQ",
                'authDomain' => "felgen-ee7d1.firebaseapp.com",
                'databaseURL' => "https://felgen-ee7d1.firebaseio.com",
                'projectId' => "felgen-ee7d1",
                'storageBucket' => "felgen-ee7d1.appspot.com",
                'messagingSenderId' => "37539385244",
                'appId' => "1:37539385244:web:50d133627b9612f4f84259",
                'measurementId' => "G-XV8M4KL5V7"
            );
            $this->output->set_output(json_encode(['result' => 1, 'firebase' => $firebase]));
            return FALSE;
        }
    }
?>