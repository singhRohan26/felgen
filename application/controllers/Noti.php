<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author Rajat Agarwal
 */
class Noti extends CI_Controller{
	
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
    
    
	
}
?>