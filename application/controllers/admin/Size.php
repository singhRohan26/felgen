<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author Rajat Agarwal
 */
class Size extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model(['admin_model', 'size_model']);
		if (empty($this->session->userdata('email_admin'))) {
            redirect(base_url('admin'));
        }
	}

	public function getUserData() {
        $email = $this->session->userdata('email_admin');
        return $this->admin_model->getUserdata($this->session->userdata('is_admin'), $email);
    }

	public function index($id = NULL) {
        if (!empty($id)) {
            $data['size'] = $this->size_model->get_size_by_id($id);
        }
        $data['title'] = 'Größe';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/size/size');
        $this->load->view('admin/commons/footer');
    }

    public function get_size_wrapper() {
        $this->output->set_content_type('application/json');
        $data['size'] = $this->size_model->getAllSizes();
        $content_wrapper = $this->load->view('admin/size/size-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }

    public function do_add_size() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('size', 'Größe', 'trim|required|is_unique[size.size]');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->size_model->do_add_size();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Größe erfolgreich hinzugefügt', 'url' => base_url('admin/size')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Größe nicht hinzugefügt']));
            return FALSE;
        }
    }

    public function do_edit_size($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $original_value = $this->size_model->get_size_validation($id);
        if ($this->input->post('size') != $original_value) {
            $is_unique = '|is_unique[size.size]';
        } else {
            $is_unique = '';
        }
        $this->form_validation->set_rules('size', 'Größe', 'trim|required' . $is_unique);
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->size_model->do_edit_size($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Größe erfolgreich aktualisiert!', 'url' => base_url('admin/size')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Es wurden keine Änderungen vorgenommen.', 'url' => base_url('admin/size')]));
            return FALSE;
        }
    }

    public function change_size_status($id, $status) {
        $this->output->set_content_type('application/json');
        $this->size_model->change_size_status($id, $status);
        $size = $this->size_model->get_size_by_id($id);
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Der "'. $size['size'].'" Status der Größe ändert sich in '.$size['status'].'.']));
        return FALSE;
    }
}
?>