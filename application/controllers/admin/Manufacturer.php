<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author Rajat Agarwal
 */
class Manufacturer extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model(['admin_model', 'manufacturer_model']);
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
            $data['manufacturer'] = $this->manufacturer_model->get_manufacturer_by_id($id);
        }
        $data['title'] = 'Herstellerinnen';
        $data['user'] = $this->getUserData();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/admin-sidebar', $data);
        $this->load->view('admin/manufacturer/manufacturer');
        $this->load->view('admin/commons/footer');
    }

    public function get_manufacturer_wrapper() {
        $this->output->set_content_type('application/json');
        $data['manufacturer'] = $this->manufacturer_model->getAllManufacturer();
        $content_wrapper = $this->load->view('admin/manufacturer/manufacturer-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
        return FALSE;
    }

    public function do_add_manufacturer() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('manufacturer_name', 'Herstellername', 'trim|required|is_unique[manufacturer.manufacturer_name]');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->manufacturer_model->do_add_manufacturer();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Hersteller erfolgreich hinzugefügt', 'url' => base_url('admin/manufacturer')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Hersteller nicht hinzugefügt']));
            return FALSE;
        }
    }

    public function do_edit_manufacturer($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $original_value = $this->manufacturer_model->get_manufacturer_validation($id);
        if ($this->input->post('manufacturer_name') != $original_value) {
            $is_unique = '|is_unique[manufacturer.manufacturer_name]';
        } else {
            $is_unique = '';
        }
        $this->form_validation->set_rules('manufacturer_name', 'Herstellername', 'trim|required' . $is_unique);
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->manufacturer_model->do_edit_manufacturer($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Hersteller erfolgreich aktualisiert!', 'url' => base_url('admin/manufacturer')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Es wurden keine Änderungen vorgenommen.', 'url' => base_url('admin/manufacturer')]));
            return FALSE;
        }
    }

    public function change_manufacturer_status($id, $status) {
        $this->output->set_content_type('application/json');
        $this->manufacturer_model->change_manufacturer_status($id, $status);
        $manufacturer = $this->manufacturer_model->get_manufacturer_by_id($id);
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Der "'. $manufacturer['manufacturer_name'].'" Status des Herstellers ändert sich in '.$manufacturer['status'].'.']));
        return FALSE;
    }
}
?>