


<!-- <?php
//defined('BASEPATH') OR exit('No direct script access allowed');
?> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Implement Stripe Payment Gateway in Codeigniter</title> -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
		rel="stylesheet" />
        <script src="https://js.stripe.com/v3/"></script>
<!-- </head> -->
<!-- <body> <br><br><br> -->

<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($parent); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong><?php echo $title; ?>Checkout </strong> Panel</h2>
            <?php if ($this->ion_auth->is_superAdmin()) { ?>
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo "New Plan"; ?>
                    </a></h2>
            <?php }
            else if($this->ion_auth->is_facilityManager()){ ?>
                <!-- <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php //echo $title; ?>
                    </a></h2> -->
                    <?php } ?>

        </div>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php if($this->session->flashdata('success')){ ?>
						<div class="alert alert-success text-center">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<p><?php echo $this->session->flashdata('success'); ?></p>
						</div>
						<?php } ?>
						<form role="form" action="<?php echo base_url('check');?>" method="post"
							class="form-validation" data-cc-on-file="false"
							data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
							id="payment-form">
							<div class='col-xs-12 form-group expiration required'>
								<input class='form-control' type='hidden' name="total_price" value="<?php echo $results;?>">
							</div>

	

							<div class='form-row row'>
								<div class='col-xs-12 form-group required'>
								<label class='control-label'>Name on Card</label>
									<input class='form-control' type='text' name="name">
								</div>
							</div>

							<div class='form-row row'>
								<div class='col-xs-12 form-group required'>
									<label class='control-label'>Email</label>
									<input class='form-control' size='4' type='text' name="email">
								</div>
							</div>

							<div class='form-row row '>
								<div class='col-xs-12 form-group card required '>
									<label class='control-label mt-2'>Card Number</label>
									<input autocomplete='off' class='form-control card-number mb-4' size='20' type='text' name="card_num">
								</div>
							</div>
							<div class='form-row row'>
								<div class='col-xs-12 col-md-4 form-group cvc required'>
									<label class='control-label'>CVC</label>
									<input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
										size='4' type='text' name="cvc">
								</div>
								<div class='col-xs-12 col-md-4 form-group expiration required'>
									<label class='control-label'>Expiration Month</label>
									<input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="exp_month">
								</div>
								<div class='col-xs-12 col-md-4 form-group expiration required'>
									<label class='control-label'>Expiration Year</label>
									<input class='form-control card-expiry-year' placeholder='YYYY' size='4'
										type='text' name="exp_year">
								</div>
								<input class='form-control' placeholder='YYYY' size='4'
										type='hidden' name="amount" value="<?php echo $results;?>">
								
							</div>
							<div class='form-row row'>
								<div class='col-md-12 error form-group hide'>
									<div class='alert-danger alert'>Error occured while making the payment.</div>
								</div>
							</div>
							<div class='col-xs-12 form-group expiration required'>
								<input class='form-control' type='hidden' name="plan_id" value="<?php echo $plan_id;?>">
							</div>

							


							<div class="row">
								<div class="col-xs-12">
									<button class="btn btn-danger btn-lg btn-block" type="submit">Pay ($<?php echo $results;?>)</button>
								</div>
							</div>
						</form>


                       
					</div>
				</div>
                
			</div>
		</div>
	</div>
</div>
</div>
    
<!-- </body> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
	$(function () {
		var $stripeForm = $(".form-validation");
		$('form.form-validation').bind('submit', function (e) {
			var $stripeForm = $(".form-validation"),
				inputSelector = ['input[type=email]', 'input[type=password]',
					'input[type=text]', 'input[type=file]',
					'textarea'
				].join(', '),
				$inputs = $stripeForm.find('.required').find(inputSelector),
				$errorMessage = $stripeForm.find('div.error'),
				valid = true;
			$errorMessage.addClass('hide');
			$('.has-error').removeClass('has-error');
			$inputs.each(function (i, el) {
				var $input = $(el);
				if ($input.val() === '') {
					$input.parent().addClass('has-error');
					$errorMessage.removeClass('hide');
					e.preventDefault();
				}
			});
			if (!$stripeForm.data('cc-on-file')) {
				e.preventDefault();
				Stripe.setPublishableKey($stripeForm.data('stripe-publishable-key'));
				Stripe.createToken({
					number: $('.card-number').val(),
					cvc: $('.card-cvc').val(),
					exp_month: $('.card-expiry-month').val(),
					exp_year: $('.card-expiry-year').val()
				}, stripeResponseHandler);
			}
		});
		function stripeResponseHandler(status, res) {
			if (res.error) {
				$('.error')
					.removeClass('hide')
					.find('.alert')
					.text(res.error.message);
			} else {
				var token = res['id'];
				$stripeForm.find('input[type=text]').empty();
				$stripeForm.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
				$stripeForm.get(0).submit();
			}
		}
	});
</script>

    <script>
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe('pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj');
        var elements = stripe.elements();
     
        var card = elements.create('card');
       
        card.mount('#card-element');

    //     var idealElement = elements.create('idealBank');
    // iban.mount('#idealBank');

    // Create Payment Request Button element
    // var paymentRequestButton = elements.create('paymentRequestButton');
    // paymentRequestButton.mount('#payment-request-button');


        // iban.mount('#iban-element');
        // paymentRequestButton.mount('#payment-request-button');

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID
        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>
<!-- </html> -->