<?php if ($this->ion_auth->is_superAdmin() || $this->ion_auth->is_admin() || $this->ion_auth->is_user() || $this->ion_auth->is_subAdmin() || $this->ion_auth->is_facilityManager() || $this->ion_auth->is_all_roleslogin()) { ?>
       <!-- Include chart.js for chart rendering -->       
    <style>
    .dashboardBoxes{
        padding:2rem;
        
    }
    .ibox{
        border-radius:15px;
        padding:2rem ;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }
    .ibox strong{
        /* color:black;
        font-size:1.6rem;
        font-weight:600; */
        color:black;
        font-weight:600;
    }
    .no-margins{
        color: #333;
        font-size:1.6rem;
        font-weight:bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    .dashboard-title {
    font-size: 2rem;
    font-weight: 700;
    color: #333; /* Text color */
    text-transform: uppercase; /* Uppercase text */
    letter-spacing: 2px; /* Adjust letter spacing */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Text shadow */
}
.block-title {
    /* box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4); */
   background-color: rgba(255, 255, 255, 1) !important;
    border-radius:0px 0px 10px 10px; 
    /* Add border radius for rounded corners */
    border-bottom: 5px solid #6FD943 !important;  
}

#page-content {
    background-color: whitesmoke !important;  
    }

</style>

    <!-- Page content -->
    <div id="page-content" >
        <!--        <div id="msg"></div>-->
        <!-- eShop Overview Block -->
        <div class="block full">
            <!-- eShop Overview Title -->
          
            <div class="block-title">
          
                <!-- <h2 style="font-size: 2rem;
    font-weight: 700;">
    <strong>Dashboard</strong>
</h2> -->
<h2 class="dashboard-title">
    <strong>Dashboard</strong>
</h2>
            </div>
            <!-- END eShop Overview Title -->
            <!-- eShop Overview Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
        <?php if ($this->ion_auth->is_superAdmin()) { ?>
                          
                            




    <div class="col-lg-3 dashboardBoxes">
        <div style="background-color: #F9F5FF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $total_admin; ?></h1>
                <h5 class="text-primary"><strong>Total Admin</strong></h5>
            </div>
            <a href="<?php echo site_url('admin'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "reports") ? "active" : "" ?>">
            <img src="<?php echo base_url(); ?>uploads/administrator.png" style=" height: 45px; width: 45px; filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%); margin-bottom: 5px;" alt="">
            </a>
        </div>
    </div>


    <div class="col-lg-3 dashboardBoxes">
        <div style="background-color: #FFFAEC; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $total_coupon; ?></h1>
                <h5 class="text-primary"><strong>Total Coupon</strong></h5>
            </div>
            <a href="<?php echo site_url('Coupon'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "Coupon") ? "active" : "" ?>">
            <img src="<?php echo base_url(); ?>uploads/hospital-buildings.png" style="height: 45px; width: 45px; filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%); margin-bottom: 5px;" alt="">
            </a>
        </div>
    </div>

    <div class="col-lg-3 dashboardBoxes">
        <div style="background-color: #E6F2FF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $total_plans; ?></h1>
                <h5 class="text-primary"><strong>Total Plan</strong></h5>
            </div>
            <a href="<?php echo site_url('AllPlans'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "AllPlans") ? "active" : "" ?>">
            <img src="<?php echo base_url(); ?>uploads/checklist.png" style="height: 45px; width: 45px; filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%); margin-bottom: 5px;" alt="">
            </a>
        </div>
    </div>

    <div class="col-lg-3 dashboardBoxes">
        <div style="background-color: #D9F4E9; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $total_order; ?></h1>
                <h5 class="text-primary"><strong>Total Order</strong></h5>
            </div>
            <a href="<?php echo site_url('userOrder'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "userOrder") ? "active" : "" ?>">
            <img src="<?php echo base_url(); ?>uploads/order.png" style="height: 45px; width: 45px; filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%); margin-bottom: 5px;" alt="">
            </a>
        </div>
    </div>


    <div class="row m-2">
        <div class="col-lg-6 mt-4">
            <canvas id="myChart" style="width: 100%; height: 100%; background-color: #F9F5FF; padding: 15px;  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);"></canvas>
        </div>
        <div class="col-lg-6 mt-4">
            <canvas id="myChart2" style="width: 100%; height: 100%;  background-color: #FFFAEC; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);"></canvas>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Admin', 'Hospital', 'Plan', 'Order'],
                    datasets: [{
                        label: '# of Votes',
                        // data: [12, 19, 3, 5, 2, 3],
                        data: [<?php echo $total_admin; ?>, <?php echo $total_hospital; ?>, <?php echo $total_plans; ?>, <?php echo $total_order; ?>],
                        borderWidth: 2,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.9)',
                            'rgba(54, 162, 235, 0.9)',
                            'rgba(255, 205, 86, 0.9)',
                            'rgba(75, 192, 192, 0.9)',
                            'rgba(153, 102, 255, 0.9)',
                            'rgba(255, 159, 64, 0.9)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 205, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    maintainAspectRatio: false, // Allows chart to adjust its size based on the container size
                    responsive: true // Ensures chart responsiveness
                }
            });

            const pie = document.getElementById('myChart2');
            const data = {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };
            const config = {
                type: 'doughnut',
                data: data,
                options: {
                    maintainAspectRatio: false, // Allows chart to adjust its size based on the container size
                    responsive: true // Ensures chart responsiveness
                }
            };
            new Chart(pie, config);
        });
    </script>

    <?php }else if ($this->ion_auth->is_admin()) { ?>
    <div class="col-lg-4 dashboardBoxes">
        <div style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);"  class="ibox float-e-margins">
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $total_hospital; ?></h1>
                <h5 class="text-primary"><strong>Total Hospital</strong></h5>
            </div>
            <a href="<?php echo site_url('facilityManager'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "facilityManager") ? "active" : "" ?>">
            <img src="<?php echo base_url(); ?>uploads/hospital-buildings.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
            </a>
        </div>
    </div>

    <div class="switch-wrapper m-4">
        <input id="toggle-monthly" type="radio" name="switch" checked>
        <label style="font-size: 1.5rem; margin-bottom: 10px;" for="toggle-monthly">Monthly</label>
        <input style="margin-left: 2rem;" id="toggle-yearly" type="radio" name="switch">    
        <label style="font-size: 1.5rem; margin-bottom: 10px;" for="toggle-yearly">Yearly</label>
        <span class="highlighter"></span>
    </div>



        <section>
            <div class="content m-4">
                <?php 
                foreach($all_plan_list as $key=> $row){ 
                if($row->DurationInMonths == 'month'){  
                ?>
                <div class="basic box price monthly fw-bold"  style="background-color:#FFFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);border-radius:20px " >
                    <h2 style="margin-top:0;margin-bottom:0 fw-bold" class="title"><?php echo ucfirst($row->PlanName);?></h2>
                        <div class="view"  style="background-color:white; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" >
                            <!-- <div class="icon">
                                <img src="https://i.postimg.cc/2jcfMcf4/hot-air-balloon.png" alt="hot-air-balloon">
                            </div> -->

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
                        <?php if($this->ion_auth->is_superAdmin()){ 
                        ?>
                            <div class="button plan_button">              
                            <!--<a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a>-->
                                <h2>
                                    <a href="javascript:void(0)" onclick="open_modal_edit('<?php echo $model; ?>', '<?php echo $row->id; ?>')" class="save-btn btn btn-sm btn-primary">
                                    <i class="gi gi-circle_plus"></i> Edit Plan </a>
                                </h2>
                            </div>
                            <?php } else if($this->ion_auth->is_admin()){ ?>
                        <div class="button plan_button " style="margin-left:25px">
                        <!-- <a href="<?php echo site_url('stripePayments'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "stripePaymentController") ? "active" : "" ?>"> -->
                        <!-- <button >START FREE 7 DAYS TRIAL </button></a> -->
                        <a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>" style="text-align: center; text-decoration: none; color: white;">
                        <button style="background-color: transparent; border: none; padding: 0; cursor: pointer; margin:10px; margin-left:60px;" class="text-center">START FREE 7 DAYS TRIAL</button>
                        </a>
                        <!-- <a href="<?php echo base_url('my-stripe?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a> -->
                        </div>
                        <?php } ?>
                    </div>

                

                <!-- make-stripe-payment -->
                <?php 
                }else if($row->DurationInMonths == 'years'){ ?>
                    <div class="basic box price yearly ">
                    <h2 style="margin-top:0;margin-bottom:0" class="title"><?php echo ucfirst($row->PlanName);?></h2>
                    <div class="view">
                        <!-- <div class="icon">
                            <img src="https://i.postimg.cc/2jcfMcf4/hot-air-balloon.png" alt="hot-air-balloon">
                        </div> -->

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
                        
                        <?php echo $row->plan_description; ?>
                    </div>
                    <?php if($this->ion_auth->is_admin()){ ?>
                    <!-- <div class="button">
                    <a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a>
                        
                    </div> -->
                    <?php }?>

                    
                    <?php if($this->ion_auth->is_superAdmin()){ ?>
                    <div class="button plan_button">
                    
                
                    
                    <!--<a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a>-->
                    <h2>
                        <a href="javascript:void(0)" onclick="open_modal_edit('<?php echo $model; ?>', '<?php echo $row->id; ?>')" class="save-btn btn btn-sm btn-primary">
                            <i class="gi gi-circle_plus"></i> Edit Plan
                        </a>
                    </h2>
                    </div>

                <?php } else if($this->ion_auth->is_admin()){ ?>
                    <div class="button plan_button" style="margin-left:25px">
                    
                    <!-- <a href="<?php echo site_url('stripePayments'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "stripePaymentController") ? "active" : "" ?>"> -->
                    <!-- <button >START FREE 7 DAYS TRIAL </button></a> -->
                    <!-- <a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>"><button >START FREE 7 DAYS TRIAL </button></a> -->
                    <a href="<?php echo base_url('make-stripe-payment?'.'id='.$row->id);?>" style="text-align: center; text-decoration: none; color: white;">
                    <button style="background-color: transparent; border: none; padding: 0; cursor: pointer; margin:10px; margin-left:60px;" class="text-center">START FREE 7 DAYS TRIAL</button>
                    </a>
                    </div>
                    <?php } ?>

                </div>
        <?php } ?>     
            
        
            <?php } ?>
            </div>
        </section> 

        <?php } else if ($this->ion_auth->is_subAdmin()) { ?>

                    <div class="panel-body">
                            <form action="<?php echo site_url('pwfpanel'); ?>" name="patientForm" method="get">

                            <div class="col-lg-3">
                                    <?php // print_r($careUnitsUser);die;
                                    ?>
                                    <select id="weeks" name="weeks" class="form-control select-2">
                                       
                                        <option value="">Select Week</option>
                                            <option value="01">1 Week</option>
                                            <option value="02">2 Week</option>
                                            <option value="03">3 Week</option>
                                            <option value="04">4 Week</option>
                                            <option value="05">5 Week</option>
                                           
                                    </select>
                                </div>
                                <div>
                                <div class="col-lg-3">
                                <select class="form-control" name="month" id="month">
    <option value="">Select Month</option>
    <?php
    // Get the selected month from the form data
    $selected_month = $_POST['month'] ?? '';

    // Array to map month numbers to month names
    $months = [
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    ];

    // Loop through the months array to create options
    foreach ($months as $month_num => $month_name) {
        // Check if the current month is the selected month
        $selected = ($month_num == $selected_month) ? 'selected' : '';

        // Output each month as an option
        echo "<option value='$month_num' $selected>$month_name</option>";
    }
    ?>
</select>
                                    </div>
                                    <div class="col-lg-2">
                                    <select class="form-control" name="year" id="year">
                                            <?php
                                            // Get the current year
                                            $current_year = date("Y");

                                            // Loop through years from 10 years ago to 10 years in the future
                                            for ($i = $current_year - 10; $i <= $current_year + 10; $i++) {
                                                // Check if the current iteration is the current year
                                                $selected = ($i == $current_year) ? 'selected' : '';

                                                // Output each year as an option
                                                echo "<option value='$i' $selected>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6 col-lg-1" style="margin-right: 8px;">
                                        <input type="submit" name="search" class="btn btn-primary btn-sm save-btn" value="Search" />
                                    </div>
                                    

                                    <!-- <form action="<?php echo site_url('task'); ?>" name="patientFormExport" method="get"> -->
                                <div class="col-sm-12 col-lg-2">
                                    <button type="submit" class="btn btn-primary btn-sm save-btn">
                                        <fa class="fa fa-undo"></fa> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 dashboardBoxes">
                        <div style="background-color:<?php echo $total_today_patient_doctors > 0 ? '#F9F5FF' : '#F9F5FF'; ?>; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
                            <div class="ibox-content">
                            <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>">

                                <h1 class="no-margins"><?php echo $total_today_patient_doctors; ?></h1>
                                <h5 class="text-primary"><strong>New Review  </strong></h5>
                            </div>
                            <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                            </a>
                        </div>

                    </div>

            <!-- <div class="col-lg-3 col-md-6 dashboardBoxes">
                <div style="background-color:<?php echo $total_patient_doctors > 0 ? '#F9F5FF' : '#F9F5FF'; ?>; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $total_patient_doctors; ?></h1>
                        <h5 class="text-primary"><strong>New Review </strong></h5>
                    </div>
                    <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                </div>
            </div> -->


           <div class="col-lg-4 dashboardBoxes">
               <div style="background-color:#FEE2E1; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);"  class="ibox float-e-margins">
                   <!-- <div class="ibox-title">
                   </div> -->
                   
                   <div class="ibox-content">
                   <h1 class="no-margins">
                   <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>">

                   <?php echo $total_patient_doctors; ?>
                   </h1>
                   <h5 class="text-primary"><strong>Total Review Patient</strong></h5>
                   </div>
                   <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                    </a>
                </div>
            </div>

           <div class="col-lg-4 dashboardBoxes">
               <div style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
                   <!-- <div class="ibox-title">
                   </div> -->
                   <div class="ibox-content">
                       <a href="<?php echo site_url('initialDx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialDx") ? "active" : "" ?>">
                       <h1 class="no-margins">

                   <?php echo $initial_dx; ?>
                   </h1>
                   <h5 class="text-primary"><strong>Infections should be complication</strong></h5>
                   </div>
                   <img src="<?php echo base_url(); ?>uploads/infected.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                    </a>
                </div>
           </div>
           
           
           <div class="col-lg-4 dashboardBoxes">
                   <div style="background-color:#D0FAE4; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
                       <!-- <div class="ibox-title">
                       </div> -->
                       <div class="ibox-content">
                           <a href="<?php echo site_url('tasks'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "tasks") ? "active" : "" ?>">
                           <h1 class="no-margins"><?php echo $total_task; ?></h1>
                           <h5 class="text-primary"><strong>Task to complete</strong></h5>
                       </div>
                       <img src="<?php echo base_url(); ?>uploads/medicine.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                        </a>
                    </div>
           </div>

           <div class="col-lg-4 dashboardBoxes">
                   <div style="background-color:#D0FAE4; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
                      
                       <div class="ibox-content">
                       <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>">

                           <h1 class="no-margins"><?php echo $total_today_patient_doctors; ?></h1>
                           <h5 class="text-primary"><strong>Total Revenue</strong></h5>
                       </div>
                       <img src="<?php echo base_url(); ?>uploads/patient.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                        </a>
                    </div>
           </div>





<div class="col-lg-4 col-md-6 dashboardBoxes">
    <div style="background-color:<?php echo $total_today_patient_doctors > 0 ? '#F9F5FF' : '#F9F5FF'; ?>; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
        <div class="ibox-content">
        <a href="<?php echo site_url('appointment'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointment") ? "active" : "" ?>">
            <h1 class="no-margins"><?php echo $total_today_patient_doctors; ?></h1>
            <h5 class="text-primary"><strong>Diary- Integration with google icloud microsoft diaries  </strong></h5>
        </div>
        <!-- <a href="<?php echo site_url('initialDx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialDx") ? "active" : "" ?>"> -->
        <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
        </a>
    </div>
</div>


<!-- <div class="col-lg-4 col-md-6 dashboardBoxes">
    <div style="background-color:<?php echo $total_patient_today > 0 ? '#FFFAEC' : '#FFFAEC'; ?>; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
        <div class="ibox-content">
            <h1 class="no-margins"><?php echo $total_patient_today; ?></h1>
            <h5 class="text-primary"><strong>Opeartion and Injection</strong></h5>
        </div>
        <img src="<?php echo base_url(); ?>uploads/syringe.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
    </div>
</div> -->


<div class="row m-2">
<div class="col-lg-6 mt-4">
        <canvas id="myChart" style="width: 100%; height: 100%; background-color: #F9F5FF; padding: 15px;  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);"></canvas>
    </div>
    <div class="col-lg-6 mt-4">
        <canvas id="myChart2" style="width: 100%; height: 100%;  background-color: #FFFAEC; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);"></canvas>
    </div>   
</div>
                

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Patient', 'Total Care Unit'
, 'Total Patient Today', 'Total Infections', 'New Patient', 'Total Antibiotic'],
                datasets: [{
                    label: '# of Votes',
                    data: [<?php echo $total_patient_doctors; ?>, <?php echo $careUnit; ?>, <?php echo $total_today_patient_doctors; ?>, <?php echo $initial_dx; ?>, <?php echo $total_today_patient_doctors; ?>, <?php echo $initial_rx; ?>],
                    borderWidth: 2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.9)',
                        'rgba(54, 162, 235, 0.9)',
                        'rgba(255, 205, 86, 0.9)',
                        'rgba(61, 0, 78, 25)',
                        'rgba(153, 102, 255, 0.9)',
                        'rgba(255, 159, 64, 0.9)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(61, 0, 78, 25)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false, // Allows chart to adjust its size based on the container size
                responsive: true // Ensures chart responsiveness
            }
        });

        const pie = document.getElementById('myChart2');
        const data = {
            labels: [
                'Total Patient:<?php echo $total_patient_doctors; ?>',
                'Total Care Unit:<?php echo $careUnit; ?>',
                'Total Patient Today:<?php echo $total_today_patient_doctors; ?>'
            ],
            datasets: [{
                label: '',
                data: [<?php echo $total_patient_doctors; ?>, <?php echo $careUnit; ?>,<?php echo $total_today_patient_doctors; ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };
        const config = {
            type: 'doughnut',
            data: data,
            options: {
                maintainAspectRatio: false, // Allows chart to adjust its size based on the container size
                responsive: true // Ensures chart responsiveness
            }
        };
        new Chart(pie, config);
    });
</script>


   

<?php } else if ($this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>

                        
    <div class="panel-body">
                            <form action="<?php echo site_url('pwfpanel'); ?>" name="patientForm" method="get">

                            <div class="col-lg-3">
                                    <?php // print_r($careUnitsUser);die;
                                    ?>
                                    <select id="weeks" name="weeks" class="form-control select-2">
                                       
                                        <option value="">Select Week</option>
                                            <option value="01">1 Week</option>
                                            <option value="02">2 Week</option>
                                            <option value="03">3 Week</option>
                                            <option value="04">4 Week</option>
                                            <option value="05">5 Week</option>
                                           
                                    </select>
                                </div>
                                <div>
                                <div class="col-lg-3">
                                <select class="form-control" name="month" id="month">
    <option value="">Select Month</option>
    <?php
    // Get the selected month from the form data
    $selected_month = $_POST['month'] ?? '';

    // Array to map month numbers to month names
    $months = [
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    ];

    // Loop through the months array to create options
    foreach ($months as $month_num => $month_name) {
        // Check if the current month is the selected month
        $selected = ($month_num == $selected_month) ? 'selected' : '';

        // Output each month as an option
        echo "<option value='$month_num' $selected>$month_name</option>";
    }
    ?>
</select>
                                    </div>
                                    <div class="col-lg-2">
                                    <select class="form-control" name="year" id="year">
                                            <?php
                                            // Get the current year
                                            $current_year = date("Y");

                                            // Loop through years from 10 years ago to 10 years in the future
                                            for ($i = $current_year - 10; $i <= $current_year + 10; $i++) {
                                                // Check if the current iteration is the current year
                                                $selected = ($i == $current_year) ? 'selected' : '';

                                                // Output each year as an option
                                                echo "<option value='$i' $selected>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6 col-lg-1 rounded" style="margin-right: 20px; ">
                                        <input type="submit" name="search" class="btn btn-primary btn-sm save-btn rounded fs-4" value="Search" />
                                    </div>
                                    

                                    <form action="<?php echo site_url('task'); ?>" name="patientFormExport" method="get">
                                <div class="col-sm-12 col-lg-2">
                                    <button type="submit" class="btn btn-primary btn-sm save-btn">
                                        <fa class="fa fa-undo"></fa> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
    
            <div class="col-lg-4 dashboardBoxes">
                    <div style="background-color:#D0FAE4; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                        <!-- <div class="ibox-title">
                        </div> -->
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php echo $total_appointment; ?></h1>
                            <h5 class="text-primary"><strong>Total Today Appointment</strong></h5>
                        </div>
                        <a href="<?php echo site_url('appointment'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointment") ? "active" : "" ?>">
                        <img src="<?php echo base_url(); ?>uploads/appointment.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                        </a>
                    </div>
            </div>

            <div class="col-lg-4 col-md-6 dashboardBoxes">
                <div style="background-color:<?php echo $total_patient > 0 ? '#F9F5FF' : '#F9F5FF'; ?>; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $total_patient; ?></h1>
                        <h5 class="text-primary"><strong>Total Patient </strong></h5>
                    </div>
                    <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>">
                    <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                    </a>
                </div>
            </div>

                        


           <div class="col-lg-4 dashboardBoxes">
               <div style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                   <!-- <div class="ibox-title">
                   </div> -->
                   <div class="ibox-content">
                   <h1 class="no-margins">

                   <?php echo $doctors; ?>
                   </h1>
                   <h5 class="text-primary"><strong>Total Doctor</strong></h5>
                   </div>
                   <a href="<?php echo site_url('dataOperator'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "dataOperator") ? "active" : "" ?>">
                   <img src="<?php echo base_url(); ?>uploads/doctor.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                </a>
               </div>
           </div>

           <div class="col-lg-4 dashboardBoxes">
               <div style="background-color:#FEE2E1; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);"  class="ibox float-e-margins">
                   <!-- <div class="ibox-title">
                   </div> -->
                   <div class="ibox-content">
                   <h1 class="no-margins">

                   <?php echo $careUnit; ?>
                   </h1>
                   <h5 class="text-primary"><strong>Total Care Unit Department</strong></h5>
                   </div>
                   <a href="<?php echo site_url('careUnit'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "careUnit") ? "active" : "" ?>">
                   <img src="<?php echo base_url(); ?>uploads/department.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                    </a>
               </div>
           </div>

           <div class="col-lg-4 dashboardBoxes">
               <div style="background-color:#BABCC; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                   <!-- <div class="ibox-title">
                   </div> -->
                   <div class="ibox-content">
                   <h1 class="no-margins">

                   <?php echo $doctors; ?>
                   </h1>
                   <h5 class="text-primary"><strong>Total Operation</strong></h5>
                   </div>
                   <a href="<?php echo site_url('careUnit'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "careUnit") ? "active" : "" ?>">
                   <img src="<?php echo base_url(); ?>uploads/operation.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                    </a>
                </div>
           </div>

           <div class="col-lg-4 dashboardBoxes">
               <div style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                   <!-- <div class="ibox-title">
                   </div> -->
                   <div class="ibox-content">
                   <h1 class="no-margins">

                   <?php echo $initial_dx; ?>
                   </h1>
                   <h5 class="text-primary"><strong>Total Infections</strong></h5>
                   </div>
                   <a href="<?php echo site_url('initialDx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialDx") ? "active" : "" ?>">
                   <img src="<?php echo base_url(); ?>uploads/Infections.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                    </a>
               </div>
           </div>


           <div class="col-lg-4 dashboardBoxes">
                   <div style="background-color:#D0FAE4; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                       <!-- <div class="ibox-title">
                       </div> -->
                       <div class="ibox-content">
                           <h1 class="no-margins"><?php echo $initial_rx; ?></h1>
                           <h5 class="text-primary"><strong>Total Antibiotic</strong></h5>
                       </div>
                       <a href="<?php echo site_url('initialRx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialRx") ? "active" : "" ?>">
                       <img src="<?php echo base_url(); ?>uploads/Antibiotic.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                        </a>
                   </div>
           </div>

                        

           <div class="col-lg-4 col-md-6 dashboardBoxes">
                                <div style="background-color:<?php echo $total_patient_today > 0 ? '#F9F5FF' : '#F9F5FF'; ?>; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $total_patient_today; ?></h1>
                                        <h5 class="text-primary"><strong>Total Patient Today </strong></h5>
                                    </div>
                                    <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                                     </a>
                                </div>
                            </div>

           <div class="col-lg-4 dashboardBoxes">
               <div style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                   <div class="ibox-content">
                   <h1 class="no-margins">£

                   <?php echo $total_pay??'0'; 
                //    echo '0';
                   ?>
                   </h1>
                   <h5 class="text-primary"><strong>Total Earning</strong></h5>
                   </div>
                   <img src="<?php echo base_url(); ?>uploads/earning.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
               </div>
           </div>

                        <div class="row m-2">
                            <!-- comemnt chart code -->
                    <!-- <div class="col-lg-6 mt-4">
                            <canvas id="myChart" style="width: 100%; height: 100%; background-color: #F9F5FF; padding: 15px;  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);"></canvas>
                        </div>
                        <div class="col-lg-6 mt-4">
                            <canvas id="myChart2" style="width: 100%; height: 100%;  background-color: #FFFAEC; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);"></canvas>
                        </div>    -->
                    </div>
                


                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const ctx = document.getElementById('myChart');
                                    new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                borderWidth: 2,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.9)',
                                                    'rgba(54, 162, 235, 0.9)',
                                                    'rgba(255, 205, 86, 0.9)',
                                                    'rgba(75, 192, 192, 0.9)',
                                                    'rgba(153, 102, 255, 0.9)',
                                                    'rgba(255, 159, 64, 0.9)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 205, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            maintainAspectRatio: false, // Allows chart to adjust its size based on the container size
                                            responsive: true // Ensures chart responsiveness
                                        }
                                    });

                                    const pie = document.getElementById('myChart2');
                                    const data = {
                                        labels: [
                                            'Red',
                                            'Blue',
                                            'Yellow'
                                        ],
                                        datasets: [{
                                            label: 'My First Dataset',
                                            data: [300, 50, 100],
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    };
                                    const config = {
                                        type: 'doughnut',
                                        data: data,
                                        options: {
                                            maintainAspectRatio: false, // Allows chart to adjust its size based on the container size
                                            responsive: true // Ensures chart responsiveness
                                        }
                                    };
                                    new Chart(pie, config);
                                });
                            </script>










<div>
    <div class="row">
        <!-- Upcoming Appointments Table -->
        <div class="col-md-8 mt-4">
            <div class="card recent-sales overflow-auto" style="background-color: #FFFFFF;  border-radius: 8px;">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="font-size: 1.2rem; color: #333;">
                        Upcoming Appointments 
                        <span> | 
                            <a href="<?php echo site_url('appointment'); ?>" class="btn btn-primary btn-sm" style="background-color: #337ab7; color: #fff; padding: 0.3rem 0.6rem; border-radius: 5px;">View all</a>
                        </span>
                        <!-- <h5 class="card-title fw-bold">Upcoming Appointments <span>| <a href="<?php echo site_url('appointment'); ?>" class="btn btn-primary btn-sm" style="background: #337ab7;">View all</a></span></h5> -->
                    </h5>
                    <div class="table-responsive" >
                        <table class="table table-striped table-hover datatable" id="todayAppointmentTable" style="height:300px ;overflow-y: scroll;">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" style="font-size: 0.9rem;">#</th>
                                    <th scope="col" style="font-size: 0.9rem;">Address</th>
                                    <th scope="col" style="font-size: 0.9rem;">Appointment With</th>
                                    <th scope="col" style="font-size: 0.9rem;">Description</th>
                                    <th scope="col" style="font-size: 0.9rem;">Time</th>
                                    <th scope="col" style="font-size: 0.9rem;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clinic_appointment as $appointment): ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <img src="https://via.placeholder.com/36" width="36" height="36" alt="Profile" class="rounded-circle">
                                        </td>
                                        <td><?php echo $appointment->address1 . ", " . $appointment->city; ?></td>
                                        <td><?php echo $appointment->first_name . " " . $appointment->last_name . " - " . $appointment->practitioner_name; ?></td>
                                        <td><?php echo $appointment->comment_appointment; ?></td>
                                        <td><?php echo date('g:i A', strtotime($appointment->start_date_appointment)) . " to " . date('g:i A', strtotime($appointment->end_date_appointment)); ?></td>
                                        <td>
                                            <a href="#"><span class="badge bg-primary" style="font-size: 0.8rem;">Take Up</span></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctors Table -->
        <div class="col-md-4 mt-4">
            <div class="card recent-sales overflow-auto" style="background-color: #FFFFFF;  border-radius: 8px;">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="font-size: 1.2rem; color: #333;">Doctors</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover datatable" id="todayDoctor">
                            <thead class="table-dark" >
                                <tr>
                                    <th scope="col" style="font-size: 0.9rem;">#</th>
                                    <th scope="col" style="font-size: 0.9rem;">Doctor</th>
                                    <th scope="col" style="font-size: 0.9rem;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($doctors_list as $row): ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg" width="36" height="36" alt="Profile" class="rounded-circle">
                                        </td>
                                        <td><?php echo $row->first_name . " " . $row->last_name; ?><br><?php echo $row->qualification; ?></td>
                                        <td>
                                            <span class="badge bg-success" style="font-size: 0.8rem;">Online</span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <a href="<?php echo site_url('dataOperator'); ?>" class="text-muted fw-bold" style="text-decoration: none;">View all Doctors</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>











<div>
<div class="row">
    <!-- New Patients Table -->
    <div class="col-md-8 mt-4">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title fw-bold">
                    New Patients
                    <span>
                        |  
                        <a href="<?php echo site_url('patient'); ?>" class="btn btn-primary btn-sm <?php echo (strtolower($this->router->fetch_class()) == 'patient') ? 'active' : ''; ?>" style="background: #337ab7;">
                            View all
                        </a>
                    </span>
                </h5>
                <table class="table table-striped table-hover" id="todayPatient" style="height:170px">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="font-size: 0.9rem;">Image</th>
                            <th scope="col" style="font-size: 0.9rem;">Name</th>
                            <th scope="col" style="font-size: 0.9rem;">Email</th>
                            <th scope="col" style="font-size: 0.9rem;">Phone</th>
                            <th scope="col" style="font-size: 0.9rem;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($today_patient_list as $list) {
                            if ($count >= 5) break;
                        ?>
                        <tr>
                            <td style="vertical-align: middle;">
                                <img src="https://via.placeholder.com/36" width="36" height="36" alt="Profile" class="rounded-circle">
                            </td>
                            <td><?php echo $list->patient_name; ?></td>
                            <td><?php echo $list->email; ?></td>
                            <td><?php echo $list->phone; ?></td>
                            <td>
                                <span class="badge bg-primary"><?php echo $list->md_patient_status; ?></span>
                            </td>
                        </tr>
                        <?php
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Hospital Management Table -->
    <div class="col-md-4 mt-4">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title fw-bold">Hospital Management</h5>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="font-size: 0.9rem;">#</th>
                            <th scope="col" style="font-size: 0.9rem;">Patient</th>
                            <th scope="col" style="font-size: 0.9rem;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">1</a></td>
                            <td>OPD Patient</td>
                            <td><span class="badge bg-warning">16%</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">2</a></td>
                            <td>OPD Patient</td>
                            <td><span class="badge bg-success">24%</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">3</a></td>
                            <td>OPD Patient</td>
                            <td><span class="badge bg-success">32%</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">4</a></td>
                            <td>OPD Patient</td>
                            <td><span class="badge bg-success">45%</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">5</a></td>
                            <td>OPD Patient</td>
                            <td><span class="badge bg-success">52%</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">6</a></td>
                            <td>OPD Patient</td>
                            <td><span class="badge bg-success">60%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>






                    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"> -->
    
          
                    


                                
                   


                    <?php } else if ($this->ion_auth->is_user()) { ?> 
                        <div class="panel-body">
                        <form action="<?php echo site_url('pwfpanel'); ?>" name="patientForm" method="get">

                        <div class="col-lg-3">
                                <?php // print_r($careUnitsUser);die;
                                ?>
                                <select id="weeks" name="weeks" class="form-control select-2">
                                   
                                    <option value="">Select Week</option>
                                        <option value="01">1 Week</option>
                                        <option value="02">2 Week</option>
                                        <option value="03">3 Week</option>
                                        <option value="04">4 Week</option>
                                        <option value="05">5 Week</option>
                                       
                                </select>
                            </div>
                            <div>
                            <div class="col-lg-3">
                            <select class="form-control" name="month" id="month">
<option value="">Select Month</option>
<?php
// Get the selected month from the form data
$selected_month = $_POST['month'] ?? '';

// Array to map month numbers to month names
$months = [
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December',
];

// Loop through the months array to create options
foreach ($months as $month_num => $month_name) {
    // Check if the current month is the selected month
    $selected = ($month_num == $selected_month) ? 'selected' : '';

    // Output each month as an option
    echo "<option value='$month_num' $selected>$month_name</option>";
}
?>
</select>
                                </div>
                                <div class="col-lg-2">
                                <select class="form-control" name="year" id="year">
                                        <?php
                                        // Get the current year
                                        $current_year = date("Y");

                                        // Loop through years from 10 years ago to 10 years in the future
                                        for ($i = $current_year - 10; $i <= $current_year + 10; $i++) {
                                            // Check if the current iteration is the current year
                                            $selected = ($i == $current_year) ? 'selected' : '';

                                            // Output each year as an option
                                            echo "<option value='$i' $selected>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-6 col-lg-1" style="margin-right: 8px;">
                                    <input type="submit" name="search" class="btn btn-primary btn-sm save-btn" value="Search" />
                                </div>
                                

                                <!-- <form action="<?php echo site_url('task'); ?>" name="patientFormExport" method="get"> -->
                            <div class="col-sm-12 col-lg-2">
                                <button type="submit" class="btn btn-primary btn-sm save-btn">
                                    <fa class="fa fa-undo"></fa> Reset
                                </button>
                            </div>
                        </form>
                    </div>

        <div class="col-lg-4 dashboardBoxes">
                <div style="background-color:#D0FAE4; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                    <!-- <div class="ibox-title">
                    </div> -->
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $total_appointment; ?></h1>
                        <h5 class="text-primary"><strong>Total Today Appointment</strong></h5>
                    </div>
                    <a href="<?php echo site_url('appointment'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointment") ? "active" : "" ?>">
                    <img src="<?php echo base_url(); ?>uploads/appointment.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                    </a>
                </div>
        </div>

        <div class="col-lg-4 col-md-6 dashboardBoxes">
            <div style="background-color:<?php echo $total_patient > 0 ? '#F9F5FF' : '#F9F5FF'; ?>; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $total_patient; ?></h1>
                    <h5 class="text-primary"><strong>Total Patient </strong></h5>
                </div>
                <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>">
                <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                </a>
            </div>
        </div>

                    


       <div class="col-lg-4 dashboardBoxes">
           <div style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
               <!-- <div class="ibox-title">
               </div> -->
               <div class="ibox-content">
               <h1 class="no-margins">

               <?php echo $doctors; ?>
               </h1>
               <h5 class="text-primary"><strong>Total Doctor</strong></h5>
               </div>
               <a href="<?php echo site_url('dataOperator'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "dataOperator") ? "active" : "" ?>">
               <img src="<?php echo base_url(); ?>uploads/doctor.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
            </a>
           </div>
       </div>

       <div class="col-lg-4 dashboardBoxes">
           <div style="background-color:#FEE2E1; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);"  class="ibox float-e-margins">
               <!-- <div class="ibox-title">
               </div> -->
               <div class="ibox-content">
               <h1 class="no-margins">

               <?php echo $careUnit; ?>
               </h1>
               <h5 class="text-primary"><strong>Total Care Unit Department</strong></h5>
               </div>
               <a href="<?php echo site_url('careUnit'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "careUnit") ? "active" : "" ?>">
               <img src="<?php echo base_url(); ?>uploads/department.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                </a>
           </div>
       </div>

       <div class="col-lg-4 dashboardBoxes">
           <div style="background-color:#BABCC; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
               <!-- <div class="ibox-title">
               </div> -->
               <div class="ibox-content">
               <h1 class="no-margins">

               <?php echo $doctors; ?>
               </h1>
               <h5 class="text-primary"><strong>Total Operation</strong></h5>
               </div>
               <a href="<?php echo site_url('careUnit'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "careUnit") ? "active" : "" ?>">
               <img src="<?php echo base_url(); ?>uploads/operation.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                </a>
            </div>
       </div>

       <div class="col-lg-4 dashboardBoxes">
           <div style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
               <!-- <div class="ibox-title">
               </div> -->
               <div class="ibox-content">
               <h1 class="no-margins">

               <?php echo $initial_dx; ?>
               </h1>
               <h5 class="text-primary"><strong>Total Infections</strong></h5>
               </div>
               <a href="<?php echo site_url('initialDx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialDx") ? "active" : "" ?>">
               <img src="<?php echo base_url(); ?>uploads/Infections.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                </a>
           </div>
       </div>


       <div class="col-lg-4 dashboardBoxes">
               <div style="background-color:#D0FAE4; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
                   <!-- <div class="ibox-title">
                   </div> -->
                   <div class="ibox-content">
                       <h1 class="no-margins"><?php echo $initial_rx; ?></h1>
                       <h5 class="text-primary"><strong>Total Antibiotic</strong></h5>
                   </div>
                   <a href="<?php echo site_url('initialRx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialRx") ? "active" : "" ?>">
                   <img src="<?php echo base_url(); ?>uploads/Antibiotic.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                    </a>
               </div>
       </div>

                    

       <div class="col-lg-4 col-md-6 dashboardBoxes">
                            <div style="background-color:<?php echo $total_patient_today > 0 ? '#F9F5FF' : '#F9F5FF'; ?>; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);" class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <h1 class="no-margins"><?php echo $total_patient_today; ?></h1>
                                    <h5 class="text-primary"><strong>Total Patient Today </strong></h5>
                                </div>
                                <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>">
                                <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
                                 </a>
                            </div>
                        </div>

       <div class="col-lg-4 dashboardBoxes">
           <div style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);" class="ibox float-e-margins">
               <div class="ibox-content">
               <h1 class="no-margins">

               <?php echo $total_pay??'0'; 
            //    echo '0';
               ?>
               </h1>
               <h5 class="text-primary"><strong>Total Earning</strong></h5>
               </div>
               <img src="<?php echo base_url(); ?>uploads/earning.svg" style="height: 45px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt="">
           </div>
       </div>

                    <div class="row m-2">
                <div class="col-lg-6 mt-4">
                        <canvas id="myChart" style="width: 100%; height: 100%; background-color: #F9F5FF; padding: 15px;  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);"></canvas>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <canvas id="myChart2" style="width: 100%; height: 100%;  background-color: #FFFAEC; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);"></canvas>
                    </div>   
                </div>
            


                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const ctx = document.getElementById('myChart');
                                new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [12, 19, 3, 5, 2, 3],
                                            borderWidth: 2,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.9)',
                                                'rgba(54, 162, 235, 0.9)',
                                                'rgba(255, 205, 86, 0.9)',
                                                'rgba(75, 192, 192, 0.9)',
                                                'rgba(153, 102, 255, 0.9)',
                                                'rgba(255, 159, 64, 0.9)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 205, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        },
                                        maintainAspectRatio: false, // Allows chart to adjust its size based on the container size
                                        responsive: true // Ensures chart responsiveness
                                    }
                                });

                                const pie = document.getElementById('myChart2');
                                const data = {
                                    labels: [
                                        'Red',
                                        'Blue',
                                        'Yellow'
                                    ],
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: [300, 50, 100],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                        ],
                                        hoverOffset: 4
                                    }]
                                };
                                const config = {
                                    type: 'doughnut',
                                    data: data,
                                    options: {
                                        maintainAspectRatio: false, // Allows chart to adjust its size based on the container size
                                        responsive: true // Ensures chart responsiveness
                                    }
                                };
                                new Chart(pie, config);
                            });
                        </script>






                        <?php }else if($this->ion_auth->is_patient()){ ?>
                            
                            <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                </div>
                                <div class="ibox-content">
                                <h1 class="no-margins">

                                <?php echo $total_patient; ?>
                                </h1>
                                <h5 class="text-primary"><strong>Total Patient</strong></h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $doctors; ?></h1>
                                        <h5 class="text-primary"><strong>Total Doctor</strong></h5>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                                        <!-- <h5 class="text-primary"><strong>Care Unit</strong></h5> -->
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $careUnit; ?></h1>
                                        <h5 class="text-primary"><strong>Total Care Unit</strong></h5>
                                    </div>
                                </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                                        <!-- <h5 class="text-primary"><strong>Infections</strong></h5> -->
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $initial_dx; ?></h1>
                                        <!-- <small>Total Infections</small> -->
                                        <h5 class="text-primary"><strong>Total Infections</strong></h5>
                                    </div>
                                </div>
                         </div>

                        <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                                        <!-- <h5 class="text-primary"><strong>Total Antibiotic</strong></h5> -->
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $initial_rx; ?></h1>
                                        <!-- <small>Total Antibiotic</small> -->
                                        <h5 class="text-primary"><strong>Total Antibiotic</strong></h5>
                                    </div>
                                </div>
                        </div>

                        <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                                        <!-- <h5 class="text-primary"><strong>Patient Today</strong></h5> -->
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $total_patient_today; ?></h1>
                                        <!-- <small>Total Patient Today</small> -->
                                        <h5 class="text-primary"><strong>Total Patient Today</strong></h5>
                                    </div>
                                </div>
                        </div>


                        

                        <?php } ?>
                                    </div>

                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
     

            <!-- END eShop Overview Content -->
        </div>
        <!-- END eShop Overview Block -->

    </div>
    <!-- END Page Content -->

    



<?php }else if($this->ion_auth->is_patient()){ ?>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- Page content -->
    <div id="page-content">
        <!--        <div id="msg"></div>-->
        <!-- eShop Overview Block -->
        <div class="block full">
            <!-- eShop Overview Title -->
            <div class="block-title">
                <h2><strong>Dashboard</strong> Overview</h2>
            </div>
            <!-- END eShop Overview Title -->
            <!-- eShop Overview Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                                        
                                    </div>
                                    <div class="ibox-content">
                                        <h5 class="text-primary"><strong>Patient Appointment: </strong></h5>

                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                        <!-- <h1 class="no-margins">

                                            <?php //echo $total_patient; ?>
                                        </h1>
                                        <h5 class="text-primary"><strong>Total Patient</strong></h5> -->
                                    </div>
                                </div>
                            </div>

                           
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                    </div>
                                    <div class="ibox-content">
                                    <h2>
                                    <a href="<?php echo base_url().'index.php/' .'patientAppointment'; ?>/open_model" class="btn btn-sm btn-primary">
                                        <i class="gi gi-circle_plus"></i> Patient Appointment form
                                    </a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $careUnit; ?></h1>
                                        <h5 class="text-primary"><strong>Total Care Unit</strong></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                                        <!-- <h5 class="text-primary"><strong>Infections</strong></h5> -->
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $initial_dx; ?></h1>
                                        <!-- <small>Total Infections</small> -->
                                        <h5 class="text-primary"><strong>Total Infections</strong></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                                        <!-- <h5 class="text-primary"><strong>Total Antibiotic</strong></h5> -->
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $initial_rx; ?></h1>
                                        <!-- <small>Total Antibiotic</small> -->
                                        <h5 class="text-primary"><strong>Total Antibiotic</strong></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                                        <!-- <h5 class="text-primary"><strong>Patient Today</strong></h5> -->
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $total_patient_today; ?></h1>
                                        <!-- <small>Total Patient Today</small> -->
                                        <h5 class="text-primary"><strong>Total Patient Today</strong></h5>
                                    </div>
                                </div>
                            </div>


                        </div>
                      
                                 <!-- Flex container for charts -->
    <!-- <div class="d-flex  flex-column ">
       
        <div class=" p-3 bg-purple-50 rounded-xl box_shadow_charts">
            <p class=" p-4 text-xl font-medium">ELITE HEALTH SERVICES- 2023 Per Month Income / Expense</p>
            <canvas id="multiline-chart" width="400" height="300"></canvas>
        </div>
        
        <div class=" p-3 bg-purple-50 rounded-xl box_shadow_charts">
            <p class=" p-4 text-xl font-medium">Monthly Orders</p>
            <canvas id="bar-chart" width="400" height="300"></canvas>
        </div>
    </div> -->
                    </div>
                </div>
            </div>
            <!-- END eShop Overview Content -->
        </div>
        <!-- END eShop Overview Block -->

    </div>
    <!-- END Page Content -->
    
    <?php }?>



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

/* .button{
    margin: 0 auto 30px;
} */

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
    font-size: 0.7em;
    font-weight: bold;
    letter-spacing: 0.5px;
    color: #f7f3f3;
    border: 2px solid #d9416c;
    border-radius: 50px;
    background: #d90a4b;
    
}

.plan_button:hover{
    color: var(--white-smoke);
    transition: 0.5s;
    border: none;

    background: var(--bright-orange);
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








/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #8886; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}



</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {
    $('#todayAppointmentTable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": false,
            "pageLength": 6,
            "order": [[0, 'desc']]  // Here, 0 represents the first column (index starts from 0)
        });


$('#todayDoctor').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": false,
            "pageLength": 6,
            "order": [[0, 'desc']]  // Here, 0 represents the first column (index starts from 0)
        });

        $('#todayPatient').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": false,
            "pageLength": 10,
            "order": [[0, 'desc']]  // Here, 0 represents the first column (index starts from 0)
        });
});
</script>


  