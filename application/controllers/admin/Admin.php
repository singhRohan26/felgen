<?php 
defined('BASEPATH') or exit ('No direct script access allowed');

/**
 * author Rajat Agarwal
 */
class Admin extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
        $this->load->model(['admin_model']);
	}

	private function isLogin() {
        return $this->session->userdata('email_admin');
    }

    public function getUserData() {
        $email = $this->session->userdata('email_admin');
        return $this->admin_model->getUserdata('admin', $email);
    }

    public function index() {
        if ($this->isLogin()) {
            redirect(base_url('admin/dashboard'));
        }
        $data['title'] = "Felgen Inserate| Admin Login";
        $this->load->view('admin/login', $data);
    }

    public function checkLogin() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Passwort', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->checkLogin('admin');
        if ($result) {
            $this->session->set_userdata('is_admin', $this->input->post('admin'));
            $this->session->set_userdata('email_admin', $result['email']);
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('admin/dashboard'), 'msg' => 'Wird geladen!! Warten Sie mal']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'ungültiger Benutzername oder Passwort']));
            return FALSE;
        }
    }

    public function forgotPassword() {
        if ($this->isLogin()) {
            redirect(base_url('admin/dashboard'));
        }
        $data['title'] = "Admin | Passwort vergessen";
        $this->load->view('admin/forgot-password', $data);
    }

    public function forgot_password() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('registered_email', 'Email', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->verify_emailid();
        if (!empty($result)) {
            $this->send_forgot_password_link($result);
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('admin'), 'msg' => 'Der Link zur Kennwortänderung wurde in Ihrer E-Mail-ID gesendet']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Diese E-Mail-ID existiert nicht!']));
            return FALSE;
        }
    }

    public function send_forgot_password_link($data) {
        $this->load->library('email');

        $htmlContent = "<h3>Dear ".$data['first_name'].",</h3>";
        $htmlContent.="<div style='padding-top:8px;'>Bitte klicken Sie auf den folgenden Link, um Ihr Passwort zurückzusetzen.</div>";
        $htmlContent.= base_url('admin/reset-password/' . $data['id']);
        $to = $data['email'];
        $subject = 'Link zum Zurücksetzen des Administratorkennworts';
        $message = $htmlContent;
            $header = "from:Felgeninserate<info@fengeninserate.com> \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
            $retval = mail ($to,$subject,$message,$header);
    }

    public function password_reset_link($admin_id) {
        if ($this->isLogin()) {
            redirect(base_url('admin/dashboard'));
        }
        $data['title'] = "Admin | Passwort zurücksetzen";
        $this->load->view('admin/reset-password', $data);
    }

    public function do_reset_password() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('password', 'Passwort', 'required');
        $this->form_validation->set_rules('cpassword', 'Kennwort bestätigen', 'required|matches[password]');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->do_reset_password();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('admin'), 'msg' => 'Ihr Passwort wurde aktualisiert']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Aktuelles Passwort und Neues Passwort sollten nicht gleich sein!']));
            return FALSE;
        }
    }

    public function dashboard() {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['title'] = 'Instrumententafel';
        $data['user'] = $this->getUserData();
        $data['is_admin'] = $this->session->userdata('is_admin');		
        $data['userscount'] = $this->admin_model->userscount();
        $data['postscount'] = $this->admin_model->postscount();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/commons/footer');
    }

    public function changePassword() {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['title'] = "Passwort ändern";
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/change-password', $data);
        $this->load->view('admin/commons/footer');
    }

    public function doChangePassword($admin_id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('old_password', 'Altes Passwort', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $this->form_validation->set_rules('new_password', 'Neues Kennwort', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('confirm_new_password', 'Kennwort bestätigen', 'required|matches[new_password]');
        $result = $this->admin_model->do_check_oldpassword($admin_id);
        if(empty($result)){
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Altes Passwort stimmt nicht mit aktuellem Passwort überein!']));
                return FALSE;
        }else{
            if($this->input->post('old_password') == $this->input->post('new_password')){
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Aktuelles Passwort und Neues Passwort sollten nicht gleich sein!']));
                return FALSE;
            }
            if ($this->form_validation->run() === FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
        }
        $changed = $this->admin_model->reset_password($admin_id);
        if ($changed) {
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('admin/dashboard'), 'msg' => 'Passwort erfolgreich geändert.']));
            return FALSE;
        }
    }

    public function adminProfile(){
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['title'] = "Profil";
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/admin-profile', $data);
        $this->load->view('admin/commons/footer');
    }

    public function doUpdateAdminProfile() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('first_name', 'Vorname', 'required');
        $this->form_validation->set_rules('last_name', 'Nachname', 'required');
        $this->form_validation->set_rules('phone', 'Telefonnummer', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('address', 'Adresse', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $email = $this->session->userdata('email_admin');

        $result = $this->admin_model->doUpdateProfile($email);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Profil erfolgreich aktualisiert !!','url' => base_url('admin/dashboard')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Es wurden keine Änderungen vorgenommen.']));
            return FALSE;
        }
    }

    public function logout() {
        $this->session->unset_userdata('email_admin');
        $this->session->unset_userdata('is_admin');
        redirect(base_url('admin'));
    }
    
    public function address(){
        $data['title'] = 'Fußzeilenadresse';
        $data['user'] = $this->getUserData();
        $data['address'] = $this->admin_model->getaddress();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/address',$data);
        $this->load->view('admin/commons/footer'); 
    }
    
    public function doaddAddress($id){
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->doaddAddress($id);
        if($result)
        {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Adresse aktualisiert !!','url' => base_url('admin/dashboard')]));
            return FALSE;
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Es wurden keine Änderungen vorgenommen.']));
            return FALSE;
        }
    }
}
?>