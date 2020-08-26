<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Ram Yadav
	 *
	 */

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		$data['title'] = "COVID19-Checker";
		$this->load->view('front/index', $data);
	}

	public function doAddDetail(){
		$this->output->set_content_type('application/json');
		$data = array(
					'gender' => $this->input->post('gender'),
					'age' => $this->input->post('age'),
					'smoker' => $this->input->post('smoker'),
					'cough' => $this->input->post('cough'),
					'temp' => $this->input->post('temp'),
					'breath' => $this->input->post('breath'),
					'illness_person' => $this->input->post('person'),
					'name' => $this->input->post('user_name'),
					'phoneno' => $this->input->post('user_number'),
					'email' => $this->input->post('user_email'),
					'city' => implode(',', $this->input->post('city')),
					'diseases' => implode(',', $this->input->post('disease')),
					'payment_status' => 'yes'
				);
		$result = $this->home_model->doAddDetail($data);
		if ($result) {
			$this->session->set_userdata('user_id', $result);
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("home/result")]));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'Invalid username or password']));
			return FALSE;
		}
	}

	private function getPercentage($id = null){
		$age=0; $diseases = 0; $smoker= 0;$city = 0;$cough = 0;$temp = 0;$breath =0;$illness_person = 0;
		if(empty($id)){
		    $id = $this->session->userdata('user_id');
		}
		$result = $this->home_model->getDetailPerson($id);
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
		    if($result['illness_person'] != 'No'){
				$illness_person = '20';
			}
		}
		$per =  $age+ $diseases+ $smoker+$city+$cough+$temp+$breath+$illness_person;
		return $per;
	}

	public function payPayment(){
		if(!empty($this->input->post('pay_payment'))){
	        require_once('application/libraries/stripe-php/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
            
         try {
            $charge = \Stripe\PaymentIntent::create ([
                    "amount" => (5 * 100),
                    "currency" => "USD",
                    // "source" => $this->input->post('stripeToken'),
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
            //   echo "Something else happened, completely unrelated to Stripe";die;
            }
            
	         if($chargeJson)
	         {
	             $txn_id = $chargeJson['balance_transaction'];
	             $this->home_model->updatePersonDetail($this->session->userdata('user_id'));
	             redirect(base_url('home/result'));
	         }else{
	            $this->session->unset_userdata('stripe_payment');
	            redirect('home/paymentFailure/');
	        }
		}else{
			redirect(base_url());
		}
	}

	public function paymentFailure(){
		$data['title'] = "Payment Failure";
		$this->load->view('front/paymentFailure', $data);
	}

	public function result(){
		$data['title'] = "COVID19-Checker Result";
		$percentage = $data['percentage'] = $this->getPercentage();
		if(empty($percentage)){
			redirect(base_url());
		}else{
		    $data['id'] = $this->session->userdata('user_id');
			$this->session->unset_userdata('user_id');
			$this->load->view('front/result', $data);
		}
	}
	
	public function userResult($id){
	    $data['title'] = "COVID19-Checker Result";
	    $percentage = $data['percentage'] = $this->getPercentage($id);
		if(empty($percentage)){
			redirect(base_url());
		}else{
		    $data['id'] = $id;
			$this->load->view('front/result', $data);
		}
	}
	
	public function policy(){
	    	$data['title'] = "Privacy Policy";
	   $this->load->view('front/privacyPolicy',$data);
	}
}
