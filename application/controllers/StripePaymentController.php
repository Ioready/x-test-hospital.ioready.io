<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripePaymentController extends Common_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    //    $this->load->library('Stripe_lib'); 
       $this->is_auth_admin();
    }
    
    // public function index() {
    //     $this->data['plan'] = $this->router->fetch_class();
    //     $this->data['model'] = $this->router->fetch_class();
    //     $id =$this->input->get('id');
    //    $option = array(
    //             'table' => 'admin_plans',
    //             'where' => array('id' => $id),
    //             // 'single' => true
    //         );
    //         $results_row = $this->common_model->customGet($option);

    //         $this->data['results'] = $results_row;
    //         print_r($this->data['results']);die;
    //             $this->load->view('checkout', $this->data);
    //     // $this->load->view('checkout');
    // }

    public function index() {
        $this->data['plan'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $id = $this->input->get('id');
        $this->load->database();
        $this->db->where('id', $id);
        $query = $this->db->get('admin_plans');
        $results_row = $query->row_array();
        $resultss['results']= $results_row['Price'];
        $resultss['plan_id']= $results_row['id'];


        $this->load->admin_render('checkout', $resultss);
        
    }
    
    public function check()
	{
        $user_id = $this->session->userdata('user_id');
		//check whether stripe token is not empty

		$option = array(
            'table' => 'payment_gateway',
            'select' => 'payment_gateway.*',
            'order' => array('payment_gateway.id' => 'DESC'),
            'single'=>true,
        );

        $stripe_payment_gateway = $this->common_model->customGet($option);
// print_r($stripe_payment_gateway->secret_key);die;
		if(!empty($_POST['stripeToken']))
		{
			//get token, card and user info from the form
			$token  = $_POST['stripeToken'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$card_num = $_POST['card_num'];
			$card_cvc = $_POST['cvc'];
			$card_exp_month = $_POST['exp_month'];
			$card_exp_year = $_POST['exp_year'];
			
            $plan_id = $_POST['plan_id'];
            $total_price = $_POST['total_price'];
// print_r($plan_id);die;
            $option = array(
                'table' => 'admin_plans',
                'where' => array('status' => 0,'id'=> $plan_id),
                'single'=>true,
                'order' => array('id' => 'desc'));

        $plan_details = $this->common_model->customGet($option);

			//include Stripe PHP library
			require_once APPPATH."third_party/stripe/init.php";
			
			//set api key
			// $stripe = array(
			//   "secret_key"      => "sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx",
			//   "publishable_key" => "pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj"
			// );

			$stripe = array(
				"secret_key"      => $stripe_payment_gateway->secret_key,
				"publishable_key" => $stripe_payment_gateway->publishable_key
			  );
			
			\Stripe\Stripe::setApiKey($stripe['secret_key']);
			
			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
				'email' => $email,
				'source'  => $token
			));
			
			//item information
			// $itemName = "Stripe Donation";
			// $itemNumber = "PS123456";
			// $itemPrice = 50;
			// $currency = "usd";
			// $orderID = "SKA92712382139";
			
            $itemName = $plan_details->PlanName;
			$itemNumber = $plan_details->id;
			$itemPrice = $total_price;
			$currency = "usd";
			$orderID = "SKA92712382139";

			//charge a credit or a debit card
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => $itemPrice,
				'currency' => $currency,
				'description' => $itemName,
				'metadata' => array(
					'item_id' => $itemNumber
				)
			));
			
			//retrieve charge details
			$chargeJson = $charge->jsonSerialize();

			//check whether the charge is successful
			if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
			{
				//order details 
				$amount = $chargeJson['amount'];
				$balance_transaction = $chargeJson['balance_transaction'];
				$currency = $chargeJson['currency'];
				$status = $chargeJson['status'];
				$date = date("Y-m-d H:i:s");
			
				
				//insert tansaction data into the database
				$dataDB = array(
                    'user_id' => $user_id,
					'plan_id' => $plan_id,
					'name' => $name,
					'email' => $email, 
					'card_num' => $card_num, 
					'card_cvc' => $card_cvc, 
					'card_exp_month' => $card_exp_month, 
					'card_exp_year' => $card_exp_year, 
					'item_name' => $itemName, 
					'item_number' => $itemNumber, 
					'item_price' => $itemPrice, 
					'item_price_currency' => $currency, 
					'paid_amount' => $amount, 
					'paid_amount_currency' => $currency, 
					'txn_id' => $balance_transaction, 
					'payment_status' => $status,
					'created' => $date,
					'modified' => $date
				);

				if ($this->db->insert('orders', $dataDB)) {
					if($this->db->insert_id() && $status == 'succeeded'){
						$data['insertID'] = $this->db->insert_id();
						// $this->load->view('payment_success', $data);
                        
                        $this->load->admin_render('payment_success', $data);
						// redirect('Welcome/payment_success','refresh');
					}else{
						echo "Transaction has been failed";
					}
				}
				else
				{
					echo "not inserted. Transaction has been failed";
				}

			}
			else
			{
				echo "Invalid Token";
				$statusMsg = "";
			}
		}
	}
    public function payment_success()
	{
		// $this->load->view('payment_success');
        $this->load->admin_render('payment_success');
	}

	public function payment_error()
	{
		// $this->load->view('payment_error');
        $this->load->admin_render('payment_error');
	}
}