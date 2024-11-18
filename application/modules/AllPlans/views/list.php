<!-- Page content -->
<style>
#act{
    display: none;
   
}

::-webkit-scrollbar {
display:none;
}

</style>

<!-- <script src="https://js.stripe.com/v3"></script> -->
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($parent); ?>"><strong>All Plans</strong></a>
        </li>
    </ul>
    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong></h2>
            <?php if ($this->ion_auth->is_superAdmin()) { ?>
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')"  style="background-color:#337ab7;" class=" btn btn-sm  text-white">
                        <i class="gi gi-circle_plus"></i> <?php echo "New Plan"; ?>
                    </a></h2>
            <?php }
            else if($this->ion_auth->is_facilityManager()){ ?>
                <!-- <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php //echo $title; ?>
                    </a></h2> -->
                    <?php } ?>

        </div>
        <div class="table-responsive">

        <!-- <section>
        <div class="content">

            <div class="basic box">
                <h2 class="title">Basic</h2>
                <div class="view">
                    <div class="icon">
                        <img src="https://i.postimg.cc/2jcfMcf4/hot-air-balloon.png" alt="hot-air-balloon">
                    </div>
                    <div class="cost">
                        <p class="amount">$09</p>
                        <p class="detail">per student per month</p>
                    </div>
                </div>
                <div class="description">
                    <ul>
                        <li>Lorem, ipsum dolor.</li>
                        <li>Harum, beatae laudantium.</li>
                        <li>Odit, fugit saepe.</li>
                        <li>Harum, veniam suscipit!</li>
                        <li>A, aut veritatis!</li>
                        <li>Aliquid, quasi repellat!</li>
                    </ul>
                </div>
                <div class="button">
                    <button type="submit" >START FREE 7 DAYS TRIAL</button>
                </div>
            </div>
    
            <div class="standard box">
                <h2 class="title">Standard</h2>
                <div class="view">
                    <div class="icon">
                        <img src="https://i.postimg.cc/DzrTN72Z/airplane.png" alt="airplane">
                    </div>
                    <div class="cost">
                        <p class="amount">$99</p>
                        <p class="detail">per student per year</p>
                    </div>
                </div>
                <div class="description">
                    <ul>
                        <li>Lorem, ipsum dolor.</li>
                        <li>Harum, beatae laudantium.</li>
                        <li>Odit, fugit saepe.</li>
                        <li>Harum, veniam suscipit!</li>
                        <li>A, aut veritatis!</li>
                        <li>Aliquid, quasi repellat!</li>
                    </ul>
                </div>
                <div class="button">
                    <button type="submit" >START FREE 7 DAYS TRIAL</button>
                </div>
            </div>
    
            <div class="business box">
                <h2 class="title">Business</h2>
                <div class="view">
                    <div class="icon">
                        <img src="https://i.postimg.cc/wvFd6FRY/startup.png" alt="startup">
                    </div>
                    <div class="cost">
                        <p class="amount">$199</p>
                        <p class="detail">per team per year</p>
                    </div>
                </div>
                <div class="description">
                    <ul>
                        <li>Lorem, ipsum dolor.</li>
                        <li>Harum, beatae laudantium.</li>
                        <li>Odit, fugit saepe.</li>
                        <li>Harum, veniam suscipit!</li>
                        <li>A, aut veritatis!</li>
                        <li>Aliquid, quasi repellat!</li>
                    </ul>
                </div>
                <div class="button">
                    <button type="submit" >START FREE 7 DAYS TRIAL</button>
                </div>
            </div>

        </div>
    </section> -->


    <div class="switch-wrapper">
    <input id="toggle-monthly" type="radio" name="switch" checked>
    <label style="font-size:1.5rem;margin-bottom:10px" for="monthly">Monthly</label>
    <input style="margin-left:2rem" id="toggle-yearly" type="radio" name="switch">
    
    <label style="font-size:1.5rem;margin-bottom:10px   " for="yearly">Yearly</label>
    <span class="highlighter"></span>
  </div>


    <section>
        <div class="content">


            <?php 
            $colors = ['#acd34c', '#ffa500', '#4caf50', '#ffd700', '#ff4d4d', '#3498db'];
            foreach($list as $key=> $row){
            
                $randomColor = $colors[array_rand($colors)]; 

            if($row->DurationInMonths == 'month'){ 

            ?>
            <div class="basic box price monthly" >
                <h2 style="margin-top:0;margin-bottom:0" class="title" style="background-color: <?php echo $randomColor; ?>"><?php echo ucfirst($row->PlanName);?></h2>
                <div class="view">
                    <div class="icon" style="height: 94px;">
                        <?php if(!empty($row->icons)){ ?> 

                       
                    <img src="<?php echo base_url($row->icons); ?>" alt="hot-air-balloon">
                    <?php  } else { ?>
                        <img src="https://i.postimg.cc/2jcfMcf4/hot-air-balloon.png" alt="hot-air-balloon">
                      <?php } ?>
                    </div>
                    <div class="price monthly cost">
                        <p class="amount">$<?php echo $row->Price;?></p>
                        <p class="detail">Admin Per Month</p>
                    </div>
                    <div class="price yearly hide cost">
                        <p class="amount">$<?php echo $row->Price;?></p>
                        <p class="detail">Admin Per Years</p>
                    </div>
                </div>
                <div class="description">
                  

                    <?php echo $row->plan_description; ?>

                </div>
                <?php if($this->ion_auth->is_superAdmin()){ ?>
                <div class="plan_button">
                
               
                
                <!--<a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a>-->
                <h2>
                    <a href="javascript:void(0)" onclick="open_modal_edit('<?php echo $model; ?>', '<?php echo $row->id; ?>')" class="plan_button save-btn btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> Edit Plan
                    </a>
                </h2>
                </div>

        <?php } else if($this->ion_auth->is_admin()){ ?>
                <div class="plan_button">
                
                <!-- <a href="<?php echo site_url('stripePayments'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "stripePaymentController") ? "active" : "" ?>"> -->
                <a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>" class="plan_button save-btn btn btn-sm btn-primary">START FREE 7 DAYS TRIAL </a>
                <!-- <a href="<?php echo base_url('my-stripe?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a> -->
                </div>
                <?php } ?>
            </div>

            

            <!-- make-stripe-payment -->
            <?php 
            }else if($row->DurationInMonths == 'years'){ ?>
            <div class="basic box price yearly " >
                <h2 style="margin-top:0;margin-bottom:0" class="title" ><?php echo ucfirst($row->PlanName);?></h2>
                <div class="view">
                <div class="icon" style="height: 94px;">
                        <?php if(!empty($row->icons)){ ?> 

                       
                    <img src="<?php echo base_url($row->icons); ?>" alt="hot-air-balloon">
                    <?php  } else { ?>
                        <img src="https://i.postimg.cc/2jcfMcf4/hot-air-balloon.png" alt="hot-air-balloon">
                      <?php } ?>
                    </div>

                    <div class="price monthly cost">
                        <p class="amount">$<?php echo $row->Price;?></p>
                        <p class="detail">Admin Per Month</p>
                    </div>
                    <div class="price yearly hide cost">
                        <p class="amount">$<?php echo $row->Price;?></p>
                        <p class="detail">Admin per Years</p>
                    </div>
                </div>
                <div class="description">
                    <!-- <ul>
                        <li>Lorem, ipsum dolor.</li>
                        <li>Harum, beatae laudantium.</li>
                        <li>Odit, fugit saepe.</li>
                        <li>Harum, veniam suscipit!</li>
                        <li>A, aut veritatis!</li>
                        <li>Aliquid, quasi repellat!</li>
                    </ul> -->
                    <?php echo $row->plan_description; ?>
                </div>
                <?php if($this->ion_auth->is_admin()){ ?>
                <!-- <div class="button">
                <a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a>
                    
                </div> -->
                <?php }?>
                <?php if($this->ion_auth->is_superAdmin()){ ?>
                <div class="plan_button">
                
               
                
                <!--<a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a>-->
                <h2 class="">
                    <a href="javascript:void(0)" onclick="open_modal_edit('<?php echo $model; ?>', '<?php echo $row->id; ?>')" class="plan_button save-btn btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> Edit Plan
                    </a>
                </h2>
                </div>

        <?php } else if($this->ion_auth->is_admin()){ ?>
                <div class="plan_button">
                
                <!-- <a href="<?php echo site_url('stripePayments'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "stripePaymentController") ? "active" : "" ?>"> -->
                <!-- <button >START FREE 7 DAYS TRIAL </button></a> -->
                <a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>" class="plan_button save-btn btn btn-sm btn-primary">START FREE 7 DAYS TRIAL </a>
                <!-- <a href="<?php echo base_url('my-stripe?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a> -->
                </div>
                <?php } ?>

            </div>


       <?php } ?>     
        
      
<?php } //}?>
        </div>
    </section>

        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>

<script>
    var stripe = Stripe('pk_test_P3N5vEUYda6Xg4MZM2tWd9PJ00hZgBj5nj', {
    betas: ['checkout_beta_4']
  });

  var checkoutButton = document.getElementById('checkout-button');
  checkoutButton.addEventListener('click', function () {
    // When the customer clicks on the button, redirect
    // them to Checkout.
    stripe.redirectToCheckout({
      items: [{sku: 'sku_EouPQJ6eEYCU1q', quantity: 1}],

      // Note that it is not guaranteed your customers will be redirected to this
      // URL *100%* of the time, it's possible that they could e.g. close the
      // tab between form submission and the redirect.
      successUrl: 'https://formhero.com/',
      cancelUrl: 'https://formhero.com/',
    })
    .then(function (result) {
      if (result.error) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, display the localized error message to your customer.
        var displayError = document.getElementById('error-message');
        displayError.textContent = result.error.message;
      }
    });
  });
</script>
<script>
    // Get the toggle buttons and pricing elements
// Get references to the toggle buttons
const monthlyButton = document.getElementById("toggle-monthly");
const yearlyButton = document.getElementById("toggle-yearly");

// Get references to the price elements
const monthlyPrices = document.querySelectorAll(".price.monthly");
const yearlyPrices = document.querySelectorAll(".price.yearly");

// Hide yearly prices initially
yearlyPrices.forEach(price => {
    price.classList.add("hide");
});

// Add click event listeners to toggle buttons
monthlyButton.addEventListener("click", () => {
    monthlyButton.classList.add("active");
    yearlyButton.classList.remove("active");
    monthlyPrices.forEach(price => {
        price.classList.remove("hide");
    });
    yearlyPrices.forEach(price => {
        price.classList.add("hide");
    });
});

yearlyButton.addEventListener("click", () => {
    yearlyButton.classList.add("active");
    monthlyButton.classList.remove("active");
    monthlyPrices.forEach(price => {
        price.classList.add("hide");
    });
    yearlyPrices.forEach(price => {
        price.classList.remove("hide");
    });
});


</script>


<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

    .save-btn{
    font-weight:700;
    font-size: 1.5rem;
    padding: 0.6rem 2.25rem;
    background:#337ab7;
}
.save-btn:hover{
    /* background-color:#00008B !important; */
    background:#00008B !important;
}


*{
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
}

:root{
    --pinkish-red: #C35A74;
    --medium-blue: #307BAA;
    --greenish-blue: #53BAB5;
    --bright-orange: #FF7445;
    --white-smoke: #F5F5F4;
    --white: #FFF;
    --dark-gray: #7D7C7C;
    --black: #000;
}

section{
    display: flex;
    justify-content: center;
    align-items: center;
    /* min-height: 100vh; */

    background: var(--white-smoke);
}

.content{
    display: flex;
    justify-content: space-between;
    width: 1200px;
    margin: 100px;
}

.box{
    display: flex;
    flex-direction: column;
    height: 586px;
    width: 300px;
    border-radius: 20px;
    margin-left: 10px;
    margin-right: 10px;
    
    background: var(--white);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 20%);
}

.title{
    width: 100%;
    padding: 10px 0;
    font-size: 22px;
    font-weight: 800;
    text-align: center;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    
    color: var(--white-smoke);
}

.basic .title{
    background: var(--pinkish-red);
}

.standard .title{
    background: var(--medium-blue);
}

.business .title{
    background: var(--greenish-blue);
}

.view{
    display: block;
    width: 100%;
    padding: 30px 0 20px;

    background: var(--white-smoke);
}

.icon{
    display: flex;
    justify-content: center;
}

.icon img{
    width: 100px;
}

.cost{
    display: flex;
    justify-content:center;
    flex-direction: row;
    margin-top: 10px;
}

.amount{
    font-size: 2.8em;
    font-weight: bolder;
}

.detail{
    margin: auto 0 auto 5px;
    width: 70px;
    font-size: 0.7em;
    font-weight: bold;
    line-height: 15px;
    color: #7D7C7C;
}

.description{
    margin: 30px auto;
    font-size: 0.8em;
    color: #7D7C7C;
}

ul{
    list-style: none;
}

li{
    margin-top: 10px;
}

.description li::before{
    content: "";
    background-image: url("https://i.postimg.cc/ht7g996V/check.png");
    background-position: center;
    background-size: cover;
    opacity: 0.5;

    display: inline-block;
    width: 10px;
    height: 10px;
    margin-right: 10px;
}

.plan_button{
    margin: 0 auto 30px;
}

.plan_button{
    /* height: 40px;
    width: 250px;
    font-size: 0.7em;
    font-weight: bold;
    letter-spacing: 0.5px;
    color: #7D7C7C;
    border: 2px solid var(--dark-gray);
    border-radius: 50px;

    background: transparent; */
    height: 40px;
    width: 250px;
    /* font-size: 0.7em; */
    font-weight: bold;
    letter-spacing: 0.5px;
    color: #f7f3f3;
    /* border: 2px solid #d9416c; */
    border-radius: 50px;
    /* background: #d90a4b; */
    
}

.plan_button:hover{
    color: var(--white-smoke);
    transition: 0.5s;
    border: none;

    /* background: var(--bright-orange); */
}

/* Responsiveness:Start */
@media screen and (max-width:970px) {
    .content{
        display: flex;
        align-items: center;
        flex-direction: column;
        margin: 50px auto;
    }
    .standard, .business{
        margin-top: 25px;
    }
}
/* Responsiveness:End */
</style>
