<!-- Footer -->
  <footer class="footer bg-light footer-bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">Copyright &copy;  2011 - <?php print date('Y', time());?> <a href="https://techarise.com/">TECHARISE.COM</a> All rights reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script>
    var baseurl = "<?php print site_url();?>";
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script type="text/javascript">
  //set your publishable key
  Stripe.setPublishableKey('<?php print STRIPE_PUBLISHABLE_KEY; ?>');
  //callback to handle the response from stripe
  function stripeResponseHandler(status, response) {
      if (response.error) {
          //enable the submit button
          $('#payBtn').removeAttr("disabled");
          //display the errors on the form
          $(".payment-errors").html('<div class="alert alert-danger">'+response.error.message+'</div>');
      } else {
          var form$ = $("#paymentFrm");
          //get token id
          var token = response['id'];
          //insert the token into the form
          form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
          //submit form to the server
          form$.get(0).submit();
      }
  }
  $(document).ready(function() {
      //on form submit
      $("#paymentFrm").submit(function(event) {
          //disable the submit button to prevent repeated clicks
          $('#payBtn').attr("disabled", "disabled");
          
          //create single-use token to charge the user
          Stripe.createToken({
              number: $('#stripe-card-number').val(),
              cvc: $('#stripe-card-cvc').val(),
              exp_month: $('#stripe-card-expiry-month').val(),
              exp_year: $('#stripe-card-expiry-year').val()
          }, stripeResponseHandler);
          //submit from callback
          return false;
      });
  });  
  </script> 
  <script src="<?php print HTTP_JS_PATH; ?>custom.js"></script>
</body>
</html>