<!-- Page content -->
<style>
#act{
    display: none;
   
}

::-webkit-scrollbar {
display:none;
}

</style>

<!-- <style>
        .risk-table {
            width: 100%;
            border-collapse: collapse;
        }
        .risk-table th, .risk-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .risk-table th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .risk-table td {
            text-align: center;
        }
        .risk-green {
            background-color: green;
            color: white;
        }
        .risk-yellow {
            background-color: yellow;
        }
        .risk-amber {
            background-color: orange;
        }
        .risk-red {
            background-color: red;
            color: white;
        }
    </style> -->

    <style>
        .risk-table {
            width: 100%;
            border-collapse: collapse;
        }
        .risk-table th, .risk-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .risk-table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .risk-red {
            background-color: #ff0000;
            color: white;
        }
        .risk-amber {
            background-color: #ffbf00;
            color: white;
        }
        .risk-yellow {
            background-color: #ffff00;
            color: black;
        }
        .risk-green {
            background-color: #00ff00;
            color: white;
        }
    </style>

<!-- <script src="https://js.stripe.com/v3"></script> -->
<div id="page-content" style="background-color: whitesmoke;"s>
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($parent); ?>"><?php echo 'Risk Management Dashboard'; ?></a>
        </li>
    </ul>
    <!-- Datatables Content -->
    <div class="block full">

            <?php 
                $all_permission = $this->ion_auth->is_permission();
                if (!empty($all_permission['form_permission'])) {
                foreach($all_permission['form_permission'] as $permission){
                   
                    $menu_view =$permission->menu_view;
                    $menu_create= $permission->menu_create;
                    $menu_update= $permission->menu_update;
                    $menu_delete =$permission->menu_delete;
                    $menu_name =$permission->menu_name;
                    // echo $menu_name;
                    if ($menu_name == 'CQC Health') { 
                    if($menu_create =='1'){ ?>

            <div class="block-title">
                <h2><strong><?php echo 'Risk Management Dashboard'; ?></strong></h2>
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

            <?php } if($menu_view =='1'){?>
            <table class="risk-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Risk Name</th>
                        <th>Description</th>
                        <th>Risk Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($risks as $risk): ?>
                        <tr class="risk-<?php echo $risk->risk_level; ?>">
                            <td><?php echo $risk->id; ?></td>
                            <td><?php echo $risk->risk_name; ?></td>
                            <td><?php echo $risk->risk_description; ?></td>
                            <td><?php echo ucfirst($risk->risk_level); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div>
            </div>

            <div class="row">
                    <div class="col-md-4 col-ls-4 col-sm-4">
                        <h2>Patient Report</h2>
                        <div>
                            <canvas id="mypatientChart"></canvas>
                        </div>
                    </div>

                    <div class="col-md-4 col-ls-4 col-sm-4">
                        <!-- <h2>Patient Report</h2> -->
                        <div>
                            <canvas id="mypatientChart"></canvas>
                        </div>
                    </div>

                    <div class="col-md-4 col-ls-4 col-sm-4">
                        <h2>Doctor Report</h2>
                        <div>
                        <canvas id="riskChart"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
               document.addEventListener('DOMContentLoaded', function() {
               const ctx = document.getElementById('riskChart').getContext('2d');
                 const chartData = <?php echo $chart_data; ?>;
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ["M", "T", "W", "T", "F", "S", "S"],
                            datasets: [{
                            backgroundColor: [
                                "#2ecc71",
                                "#3498db",
                                "#95a5a6",
                                "#9b59b6",
                                "#f1c40f",
                                "#e74c3c",
                                "#34495e"
                            ],
                            
                            data: [12, 19, 3, 17, 28, 24, 7]
                            }]
                        }
                        });
                        });
                </script>

                </div>
            </div>

            <?php }}}} if($this->ion_auth->is_facilityManager()){?>


                <div class="block-title">
            <h2><strong><?php echo 'Risk Management Dashboard'; ?></strong></h2>
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
            <table class="risk-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Risk Name</th>
                        <th>Description</th>
                        <th>Risk Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($risks as $risk): ?>
                        <tr class="risk-<?php echo $risk->risk_level; ?>">
                            <td><?php echo $risk->id; ?></td>
                            <td><?php echo $risk->risk_name; ?></td>
                            <td><?php echo $risk->risk_description; ?></td>
                            <td><?php echo ucfirst($risk->risk_level); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


            
            <div>
            </div>
            <div class="row">
                    <div class="col-md-4 col-ls-4 col-sm-4">
                        <h2>Patient Report</h2>
                        <div>
                            <canvas id="mypatientChart"></canvas>
                        </div>
                    </div>

                    <div class="col-md-4 col-ls-4 col-sm-4">
                        <!-- <h2>Patient Report</h2> -->
                        <div>
                            <canvas id="mypatientChart"></canvas>
                        </div>
                    </div>

                    <div class="col-md-4 col-ls-4 col-sm-4">
                        <h2>Doctor Report</h2>
                        <div>
                        <canvas id="riskChart"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
               document.addEventListener('DOMContentLoaded', function() {
               const ctx = document.getElementById('riskChart').getContext('2d');
                 const chartData = <?php echo $chart_data; ?>;
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ["M", "T", "W", "T", "F", "S", "S"],
                            datasets: [{
                            backgroundColor: [
                                "#2ecc71",
                                "#3498db",
                                "#95a5a6",
                                "#9b59b6",
                                "#f1c40f",
                                "#e74c3c",
                                "#34495e"
                            ],
                            
                            data: [12, 19, 3, 17, 28, 24, 7]
                            }]
                        }
                        });
                        });
                </script>

                </div>
            </div>

                <?php }?>
        </div>
        <!-- END Page Content -->
                <div id="form-modal-box"></div>
        <!-- </div>

    </div> -->
</div>



<script>
var ctx = document.getElementById("mypatientChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["M", "T", "W", "T", "F", "S", "S"],
    datasets: [{
      backgroundColor: [
        "#2ecc71",
        "#3498db",
        "#95a5a6",
        "#9b59b6",
        "#f1c40f",
        "#e74c3c",
        "#34495e"
      ],
      data: [12, 19, 3, 17, 28, 24, 7]
    }]
  }
});
</script>

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
