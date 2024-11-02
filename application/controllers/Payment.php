<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'vendor/autoload.php'); // Include Stripe PHP library

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load any necessary models or helpers here
    }

    public function index() {
        // Load the payment view
        $this->load->view('payment');
    }

    public function process_payment() {
        // Load the Stripe API library
        \Stripe\Stripe::setApiKey('sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx');

        // Get POST data from the form
        $token = $this->input->post('stripeToken');
        $email = $this->input->post('email');
        $amount = $this->input->post('amount');
        // Other necessary data

        // Create a charge
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $amount * 100, // Amount should be in cents
                'currency' => 'usd',
                'source' => $token,
                'description' => 'Example charge',
                // Other options as needed
            ]);

            // Redirect to thank you page or display success message
            echo "Payment Successful";
        } catch (Exception $e) {
            // Handle errors
            $error = $e->getMessage();
            // Return error response
            echo "Error: ".$error;
        }
    }
}
