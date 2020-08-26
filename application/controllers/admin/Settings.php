<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author Rajat Agarwal
 */
class Settings extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model(['admin_model', 'settings_model']);
		if (empty($this->session->userdata('email_admin'))) {
            redirect(base_url('admin'));
        }
	}

	public function getUserData() {
        $email = $this->session->userdata('email_admin');
        return $this->admin_model->getUserdata($this->session->userdata('is_admin'), $email);
    }

    public function aboutUs(){
        $data['title'] = 'Über uns';
        $data['editor'] = '1';
        $data['user'] = $this->getUserData();
        $data['about_us'] = $this->settings_model->getSiteSettings();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/site-settings/about');
        $this->load->view('admin/commons/footer');
    }

    public function privacy(){
        $data['title'] = 'Datenschutz-Bestimmungen';
        $data['editor'] = '1';
        $data['user'] = $this->getUserData();
        $data['about_us'] = $this->settings_model->getSiteSettings();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/site-settings/privacy');
        $this->load->view('admin/commons/footer');
    }

    public function terms(){
        $data['title'] = 'Terms & Bedingungen';
        $data['editor'] = '1';
        $data['user'] = $this->getUserData();
        $data['about_us'] = $this->settings_model->getSiteSettings();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/site-settings/terms');
        $this->load->view('admin/commons/footer');
    }

    public function support(){
        $data['title'] = 'Unterstützung';
        $data['editor'] = '1';
        $data['user'] = $this->getUserData();
        $data['about_us'] = $this->settings_model->getSiteSettings();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/site-settings/support');
        $this->load->view('admin/commons/footer');
    }

    public function info(){
        $data['title'] = 'Die Info';
        $data['editor'] = '1';
        $data['user'] = $this->getUserData();
        $data['about_us'] = $this->settings_model->getSiteSettings();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/site-settings/info');
        $this->load->view('admin/commons/footer');
    }

    public function doEditSettings($id){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('description', 'Beschreibung', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->settings_model->do_edit_settings($id);
        if ($result) {
            if ($id == 1) {
                $url = base_url('admin/about');
            }
            if ($id == 2) {
                $url = base_url('admin/privacy');
            }
            if ($id == 3) {
                $url = base_url('admin/terms');
            }
            if ($id == 4) {
                $url = base_url('admin/support');
            }
            if ($id == 5) {
                $url = base_url('admin/info');
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Erfolgreich eingereicht', 'url' => $url]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Es wurden keine Änderungen vorgenommen']));
            return FALSE;
        }
    }

    public function usersList(){
        $data['title'] = 'Benutzer';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/users/users');
        $this->load->view('admin/commons/footer');
    }

    public function get_users_wrapper() {
        $this->output->set_content_type('application/json');
        $data['users'] = $this->settings_model->getAllUsers();
        $content_wrapper = $this->load->view('admin/users/users-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }

    public function change_users_status($id, $status) {
        $this->output->set_content_type('application/json');
        $this->settings_model->change_users_status($id, $status);
        $users = $this->settings_model->get_users_by_id($id);
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Der "'. $users['name'].'" Status des Benutzers ändert sich in '.$users['status'].'.']));
        return FALSE;
    }

    public function postList(){
        $data['title'] = 'Beiträge';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/posts/posts');
        $this->load->view('admin/commons/footer');
    }

    public function get_post_wrapper() {
        $this->output->set_content_type('application/json');
        $data['posts'] = $this->settings_model->getAllPosts();
        $content_wrapper = $this->load->view('admin/posts/posts-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }

    public function view_post_detail($post_id){
        $data['title'] = 'Informationen veröffentlichen';
        $data['user'] = $this->getUserData();
        $data['post'] = $this->settings_model->getPostDetailByPostId($post_id);
        $data['post_image'] = $this->settings_model->getPostImagesByPostId($post_id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/posts/postinfo', $data);
        $this->load->view('admin/commons/footer');
    }

    public function allSocialMedia($id=NULL) {
        if (!empty($id)) {
            $data['socialmedia'] = $this->settings_model->get_social_media_by_id($id);
        }
        $data['title'] = 'Social Media Links';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/site-settings/social-media');
        $this->load->view('admin/commons/footer');
    }

    public function get_social_media_wrapper() {
        $this->output->set_content_type('application/json');
        $data['socialmedia'] = $this->settings_model->getAllSocialMedia();
        $content_wrapper = $this->load->view('admin/site-settings/social-media-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }

    public function doEditSocialMedia($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('url', 'URL', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->settings_model->do_edit_social_media($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Social Media erfolgreich aktualisiert!', 'url' => base_url('admin/socialmedia')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Es wurden keine Änderungen vorgenommen.', 'url' => base_url('admin/socialmedia')]));
            return FALSE;
        }
    }

    public function faq() {
        $data['title'] = 'FAQ';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/site-settings/view-faq');
        $this->load->view('admin/commons/footer');
    }

    public function get_faq_wrapper() {
        $this->output->set_content_type('application/json');
        $admin = $this->getUserData();
        $data['faq'] = $this->settings_model->getAllFaqs();
        $content_wrapper = $this->load->view('admin/site-settings/faq-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }

    public function addFaq($id = NULL) {
        if (!empty($id)) {
            $data['faq'] = $this->settings_model->get_faq_by_id($id);
        }
        $data['title'] = 'FAQ';
        $data['editor'] = '1';
        $data['user'] = $this->getUserdata();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/site-settings/faq');
        $this->load->view('admin/commons/footer');
    }

    public function doAddFaq(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('question', 'Frage', 'trim|required');
        $this->form_validation->set_rules('answer', 'Antworten', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->settings_model->do_add_faq();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'FAQ erfolgreich hinzugefügt', 'url' => base_url('admin/faq')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'FAQ nicht hinzugefügt']));
            return FALSE;
        }
    }

    public function do_edit_faq($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('question', 'Frage', 'trim|required');
        $this->form_validation->set_rules('answer', 'Antworten', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->settings_model->do_edit_faq($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'FAQ erfolgreich aktualisiert!', 'url' => base_url('admin/faq')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Es wurden keine Änderungen vorgenommen.', 'url' => base_url('admin/faq')]));
            return FALSE;
        }
    }

    public function change_faq_status($id, $status) {
        $this->output->set_content_type('application/json');
        $this->settings_model->change_faq_status($id, $status);
        $faq = $this->settings_model->get_faq_by_id($id);
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Status wechselt zu '.$faq['status'].'.']));
        return FALSE;
    }

    public function contacts() {
        $data['title'] = 'Kontakte';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/contact/viewContact');
        $this->load->view('admin/commons/footer');
    }

    public function get_contact_wrapper() {
        $this->output->set_content_type('application/json');
        $data['contact'] = $this->settings_model->getAllContacts();
        $content_wrapper = $this->load->view('admin/contact/contact-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }
}
?>