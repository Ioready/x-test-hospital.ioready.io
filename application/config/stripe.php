<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx'; 
$config['stripe_publishable_key'] = 'pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj'; 
$config['stripe_currency']        = 'usd';


// define('STRIPE_PUBLISHABLE_KEY', 'pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj');
// define('STRIPE_SECRET_KEY', 'sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx');
// define('CURRENCY_CODE', 'usd'); 