<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author Rajat Agarwal
 */
class Pcd extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model(['admin_model', 'pcd_model']);
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
            $data['pcd'] = $this->pcd_model->get_pcd_by_id($id);
        }
        $data['title'] = 'PCD';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/pcd/pcd');
        $this->load->view('admin/commons/footer');
    }

    public function get_pcd_wrapper() {
        $this->output->set_content_type('application/json');
        $data['pcd'] = $this->pcd_model->getAllPcds();
        $content_wrapper = $this->load->view('admin/pcd/pcd-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }

    public function do_add_pcd() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('pcd_name', 'PCD', 'trim|required|is_unique[pcd.pcd_name]');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->pcd_model->do_add_pcd();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'PCD erfolgreich hinzugefügt', 'url' => base_url('admin/pcd')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'PCD PCD nicht hinzugefügt']));
            return FALSE;
        }
    }

    public function do_edit_pcd($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $original_value = $this->pcd_model->get_pcd_validation($id);
        if ($this->input->post('pcd_name') != $original_value) {
            $is_unique = '|is_unique[pcd.pcd_name]';
        } else {
            $is_unique = '';
        }
        $this->form_validation->set_rules('pcd_name', 'PCD', 'trim|required' . $is_unique);
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->pcd_model->do_edit_pcd($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'PCD erfolgreich aktualisiert!', 'url' => base_url('admin/pcd')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Es wurden keine Änderungen vorgenommen.', 'url' => base_url('admin/pcd')]));
            return FALSE;
        }
    }

    public function change_pcd_status($id, $status) {
        $this->output->set_content_type('application/json');
        $this->pcd_model->change_pcd_status($id, $status);
        $pcd = $this->pcd_model->get_pcd_by_id($id);
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Der Status des "'. $pcd['pcd_name'].'" Namens ändert sich in '.$pcd['status'].'.']));
        return FALSE;
    }

    public function cities() {
        $data['title'] = 'Cities';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/cities/cities');
        $this->load->view('admin/commons/footer');
    }

    public function get_city_wrapper() {
        $this->output->set_content_type('application/json');
        $data['cities'] = $this->pcd_model->getAllCities();
        $content_wrapper = $this->load->view('admin/cities/cities-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }
}
?>