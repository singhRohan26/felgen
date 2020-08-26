<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Admin  controller.
	 * Created By Ram Yadav
	 
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
	}


	public function index()
	{
		if(!empty($this->is_login())){
			redirect(base_url('admin/dashboard'));
		}
		$data['title'] = "Login Page";
		$this->load->view('admin/login', $data);
	}

	public function forgot_password()
	{
		$data['title'] = "Forgot Password";
		$this->load->view('admin/forgot-password', $data);
	}

	public function doLogin(){
		$this->output->set_content_type('application/json');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$result = $this->admin_model->checkLogin();
		if ($result) {
			$this->session->set_userdata('email', $result['email']);
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("admin/dashboard"), 'msg' => 'Loading..']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'Invalid username or password']));
			return FALSE;
		}
	}

	private function is_login(){
		return $this->session->userdata('email');
	}


	private function getLoginDetail(){
		$email = $this->session->userdata('email');
		return $this->admin_model->getLoginDetail($email);
	}
	public function dashboard(){
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
		$data['title'] = "Dashboard";
		$res = $this->admin_model->getUsersDetail();
		$data['total'] = count($res);
		$data['userData'] = $this->getLoginDetail();
		$this->load->view('admin/commons/header', $data);
		$this->load->view('admin/commons/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/commons/footer');
	}


    public function doForgotPassword(){
        $this->output->set_content_type('application/json');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$result = $this->admin_model->getEmailId();
		if ($result) {
			$password = substr(md5(uniqid()), 0, 6);
			// $this->admin_model->updatePassword($password);
			$this->send_forgot_password_link($password, $result['name'], $result['email']);
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("admin"), 'msg' => 'Password has been sent To your Mail Id..']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'This E-mail id does not exist']));
			return FALSE;
		}
    }

    private function send_forgot_password_link($password, $name, $email) {
        $config = array(
            'mailtype' => 'html',
        );
        $this->load->library('email',$config);
        $htmlContent = "<div>Hi " . $name . ",</div>";
        $htmlContent .= "<div style='padding-top:8px;'>your password is ".$password."</div>";
        $this->email->to($email);
        $this->email->from('info@admin.com', 'Admin');
        $this->email->subject('Hey!, ' . $name . ' Forgot Password');
        $this->email->message($htmlContent);
        $this->email->send();
        return true;
    }

	public function change_password(){
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
		$data['title'] = "Change Password";
		$this->load->view('admin/commons/header', $data);
		$this->load->view('admin/commons/sidebar');
		$this->load->view('admin/change_password');
		$this->load->view('admin/commons/footer');
	}


	public function doChangePass(){
		$this->output->set_content_type('application/json');
		$this->form_validation->set_rules('opass', 'Old Password', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$this->form_validation->set_rules('npass', 'New Password', 'required|min_length[6]');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|min_length[6]|matches[npass]');
		$userData = $this->getLoginDetail();
		if($userData['password'] != $this->security->xss_clean(hash('sha256', $this->input->post('opass')))){
			$err['opass'] = 'Old Password is incorrect';
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $err]));
			return FALSE;
		}
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$result = $this->admin_model->doChangePass();
		if ($result) {
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("admin/change_password"), 'msg' => 'Password Changed Successfully..']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'Old Password and new password should not be same']));
			return FALSE;
		}
	}

	public function user(){
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
		$data['title'] = "Total Users";
		$data['users'] = $this->admin_model->getUsersDetail(); 
		$this->load->view('admin/commons/header', $data);
		$this->load->view('admin/commons/sidebar');
		$this->load->view('admin/tables');
		$this->load->view('admin/commons/footer');
	}

	public function userDetail($id){
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
		$data['title'] = "User Detail";
		$data['percentage'] = $this->getPercentage($id);
		$data['user'] = $this->admin_model->getDetailPerson($id); 
		$this->load->view('admin/commons/header', $data);
		$this->load->view('admin/commons/sidebar');
		$this->load->view('admin/userDetail');
		$this->load->view('admin/commons/footer');
	}
	public function getPercentage($id){
		$age=0; $diseases = 0; $smoker= 0;$city = 0;$cough = 0;$temp = 0;$breath =0;$illness_person = 0;
		$result = $this->admin_model->getDetailPerson($id);
		if(!empty($result['age'])){
			if($result['age'] == '0-33 years old'){
				$age = '0.5';
			} if($result['age'] == '34-66 years old'){
				$age = '4';
			} if($result['age'] == '66-99'){
				$age = '9';
			}
		}
		if(!empty($result['diseases'])){
			if($result['diseases'] == 'No'){
				$diseases = '0';
			} else{
				$diseases = '15';
			}
		}
		if(!empty($result['smoker'])){
			if($result['smoker'] == 'No'){
				$smoker = '0';
			} else{
				$smoker = '6';
			}
		} 
		if(!empty($result['city'])){
			if($result['city'] == 'No'){
				$city = '0';
			} else{
				$city = '10';
			}
		} 
		if(!empty($result['cough'])){
			if($result['cough'] == 'No'){
				$cough = '0';
			} else{
				$cough = '10';
			}
		} 
		if(!empty($result['temp'])){
			if($result['temp'] == 'No'){
				$temp = '0';
			} else{
				$temp = '20';
			}
		} 
		if(!empty($result['breath'])){
			if($result['breath'] == 'No'){
				$breath = '0';
			} else{
				$breath = '10';
			}
		} 
		if(!empty($result['illness_person'])){
			$illness_person = '20';
		}
		$per =  $age+ $diseases+ $smoker+$city+$cough+$temp+$breath+$illness_person;
		return $per;
	}
	public function logout() {
		$this->session->unset_userdata('email');
		redirect(base_url('admin'));
	}

}
