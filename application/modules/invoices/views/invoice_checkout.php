<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Stripe Payment</title>
<script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<h2>Stripe Payment Gateway Integration</h2>
 
    <?php if ($this->session->flashdata('success')): ?>
<p style="color:green;"><?php echo $this->session->flashdata('success'); ?></p>
<?php elseif ($this->session->flashdata('error')): ?>
<p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>
 
    <form action="<?php echo base_url('invoices/processPayment'); ?>" method="POST" id="payment-form">
<input type="hidden" name="amount" value="5000"> <!-- $50 in cents -->
 
        <div id="card-element"></div>
<button type="submit">Pay $50</button>
 
        <div id="card-errors" role="alert"></div>
</form>
 
    <script>
        var stripe = Stripe('<?php echo $stripe_publishable_key; ?>');
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');
 
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    document.getElementById('card-errors').textContent = result.error.message;
                } else {
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });
</script>
</body>