<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>



 

<style>
   .save-btn{
    /* font-weight:700; */
    /* color:white; */
    /* font-size: 1.5rem; */
    /* padding: 0.6rem 2.25rem !important; */
    background-color: #a7afb7 !important;
    background:none;
}
.save-btn:hover{
    color:white;
    background:#00008B !important;
}
.btn {
    margin: 1px 0;
    background-color: #b9adad;
}

.modal_popup{
    display: none;
}

.form-group {
    margin-bottom: 10px;
}


.modal-body1 {
    padding: 0px 15px;
}
.modal-appointment {
    padding-left: 15px;
}
.appointment-status {
    font-weight: 900 !important;
    font-size: 14px;
}

.sendmail{
    float: right;
    margin: -41px 0;
}

.mailmodel{
    margin-left:-15px;
    margin-right:-15px;
}

@media only screen and (min-width: 668px) and (max-width: 1600px) {
        .sendmail{
            margin-top: -17px;
                 }  
    }

    @media only screen and (max-width: 600px) {
        .sendmail{
            margin-top: -32px;
                 }  
       
        }


        .card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    /* margin-bottom: 30px; */
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
}
.l-bg-cherry {
    background: linear-gradient(to right, #337a, #337a) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #337a, #337a) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #337a, #337a) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #337a, #337a) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    /* text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: -5px;
    top: 20px;
    opacity: 0.1; */
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}
</style>
<!-- Page content -->
<div id="page-content" style="background-color:whitesmoke;">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($this->router->fetch_class()); ?>"><?php echo $title; ?></a>
        </li>
    </ul>

    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
       
        <div class="block full" id="printableTable">

            <div class="row text-center">
                
                <div class="col-sm-6 col-md-2 mb-4">
                    <a href="<?php echo base_url() . 'index.php/patient/summary?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 10px; ">
                        <div class="widget-extra themed-background-dark"   style="background:#337ab7;">
                            <h4 style="font-size:14px; font-weight:600; color:white;">Summery</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                    <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Consultation</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/Medications?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Medications</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>

                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Letters and forms</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patientPrescription?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Prescriptions</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/labs?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Labs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patient/consultationInvoice?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Invoices</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <!-- <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/accountStatement?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Account statements</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div> -->
                
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patient/communication?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Communication</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patientDocuments?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Documents</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patient/patientLogs?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Logs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
            </div>

            <!-- <div class="row text-center">
                
                <div class="col-sm-6 col-lg-12">
                    <div class="panel panel-default">
                   

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="=" crossorigin="anonymous" />
                <div class="m-4">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="card l-bg-cherry">
                                <div class="card-statistic-3 m-4">
                            
                                    <div class="card-icon card-icon-large"><i class="fas fa-tint" style="font-size:3em;"></i></div> 
                                    <div class="mb-4">
                                        <h4 class="card-title mb-0">Blood Group</h4>
                                        <h4 class="text-center fw-bold m-2">A+</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="card l-bg-blue-dark">
                                <div class="card-statistic-3 m-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-heartbeat" style="font-size:3em;"></i></div> 
                                    <div class="mb-4">
                                        <h4 class="card-title mb-0">Blood Pressure</h4>
                                        <h4 class="text-center fw-bold m-2">120/80</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 m-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-heartbeat" style="font-size:3em;"></i></div> 
                                    <div class="mb-4">
                                        <h4 class="card-title mb-0">Hert rate</h4>
                                        <h4 class="text-center fw-bold m-2">120/80</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="card l-bg-orange-dark">
                                <div class="card-statistic-3 m-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-thermometer-half" style="font-size:3em;"></i></div> 
                                    <div class="mb-4">
                                        <h4 class="card-title mb-0">Temperature</h4>
                                        <h4 class="text-center fw-bold m-2">98.6°F</h4> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    </div>
                    </div>
                </div>
            </div> -->
        </div>

    <?php } ?>
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>

    <section style="background-color: #eee;">

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
                    if ($menu_name == 'Summary') { 
                     ?>


<div class="row mt-4">

    <div class="col-md-12">
        <div class="">
            <div class="card-body p-4" style="background-color:#FFFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="no-margins fw-bold"><?php echo $results->patient_name; ?></h4>
                        <h6 class="text-dark fw-bold"><?php 
                        $from = new DateTime($results->date_of_birth);
                        $to   = new DateTime('today');
                       
                        echo $results->date_of_birth.'  |  '.$from->diff($to)->y.' Years  |  '.$results->gender;?></h6>
                        <button type="button" class="btn btn-sm btn-primary save-btn btn-xs">Public</button>
                        <h5 class="text-dark fw-bold"><i class="fa fa-home" > </i> <?php echo $results->address. ',  United Kingdom';?></h5>
                        <h5 class="text-dark fw-bold"><i class="fa fa-phone" > </i> <?php echo $results->patient_phone_number. '('. $results->phone_code.')';?></h5>
                    </div>
                    <div class="col-md-1">
                    <button class="Button Button--outline" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i></button>
                    <a href="<?php echo base_url() . 'patient/edit?id=' . encoding($results->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                        <!-- <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="row p-4 mt-4">
    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold"><strong>Problem</strong></h4> 
                        <p class="text-dark fw-bold"><?php echo $results->initial_dx_name; ?></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/doctor.png" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5); border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold">Medical History</h4>
                        <p class="text-dark fw-bold"><strong>  <?php echo $results->initial_rx_name; ?></strong></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/planning.png" style="height:65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#FFE0B7; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px;">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold">Medication</h4>
                        <p class="text-dark fw-bold"><strong>   <?php echo $results->organism_name; ?></strong></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/medicine.png" style="height:65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- <div class="row p-4 mt-4">
    
</div> -->

<div class="row p-4 mt-4">
    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                <div class="col-md-8">
                <h4 class="no-margins fw-bold"><strong>Appointment</strong></h4> 
            </div>
            <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/appointment.svg" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>

    </div>
    <div class="row">

                    <div class="col-md-12">
                        
                        <?php $rowCount = 0;
                         foreach($results_rowAppointment as $appointment){ 
                            $rowCount++;
                            // print_r($appointment);die;
                            ?>
                        <div class="row" style="border-bottom: 1px solid gray;">
                        <div class="text-dark fw-bold">
                            <?php echo $rowCount. '  '.$appointment->type; ?>
                            
                         </div>
                         <div class="text-dark appointment-status">
                            <?php 
                            if($appointment->appointment_status == 'Active'):
                            
                            ?>
                                <span class="custom-badge status-green"><?php echo $appointment->appointment_status; ?></span> 
                                
                            <?php else: ?>
                                <span class="custom-badge status-red"><?php echo $appointment->appointment_status; ?></span> 
                
                             <?php endif; 
                            ?>
                            
                         </div>

                            <div class="text-dark fw-bold modal-appointment">
                            <?php echo $appointment->start_date_appointment; ?>
                            
                         </div>
                        </div>
                           
                          <?php  } 
                            ?>
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold"><strong>Task</strong></h4> 
                        <!-- <p class="text-dark fw-bold"><?php echo $results->initial_dx_name; ?></p> -->
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/tasks.svg" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        
                        <?php $rowCount = 0;
                         foreach($results_task as $task){ 
                            $rowCount++;
                            ?>
                        <div class="row" style="border-bottom: 1px solid gray;">
                        <div class="text-dark fw-bold">
                            <?php echo $rowCount. '  '.$task->task_name; ?>
                            
                         </div>

                         <div class="text-dark appointment-status">
                            <?php 
                            if($task->status == 'Done'):
                            
                            ?>
                                <span class="custom-badge status-green"><?php echo $task->status; ?></span> 
                                
                            <?php else: ?>
                                <span class="custom-badge status-red"><?php echo $task->status; ?></span> 
                
                             <?php endif; 
                            ?>
                            
                         </div>
                         
                         <div class="text-dark appointment-status">Doctor Name:  
                            <?php echo $task->doctor_name; ?>
                            
                         </div>
                         
                            <div class="text-dark fw-bold modal-appointment">Priority:
                            <?php echo $task->priority; ?>
                            
                         </div>
                         <div class="text-dark fw-bold modal-appointment">Due date:
                            <?php echo $task->due_date; ?>
                            
                         </div>
                         

                        </div>
                            <!-- <p class="text-dark fw-bold"><?php echo $appointment->end_date_appointment; ?></p> -->

                          <?php  } 
                            ?>
                        <!-- <p class="text-dark fw-bold"><?php echo $results->initial_dx_name; ?></p> -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold"><strong>Product</strong></h4> 
                        <!-- <p class="text-dark fw-bold"><?php echo $results->initial_dx_name; ?></p> -->
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/products.svg" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
            </div>
        </div>
    </div>
</div>


<?php }}} if($this->ion_auth->is_facilityManager()){?>

    <div class="row mt-4">

    <div class="col-md-12">
        <div class="">
            <div class="card-body p-4" style="background-color:#FFFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="no-margins fw-bold"><?php echo $results->patient_name; ?></h4>
                        <h6 class="text-dark fw-bold"><?php 
                        $from = new DateTime($results->date_of_birth);
                        $to   = new DateTime('today');
                       
                        echo $results->date_of_birth.'  |  '.$from->diff($to)->y.' Years  |  '.$results->gender;?></h6>
                        <button type="button" class="btn btn-sm btn-primary save-btn btn-xs">Public</button>
                        <h5 class="text-dark fw-bold"><i class="fa fa-home" > </i> <?php echo $results->address. ',  United Kingdom';?></h5>
                        <h5 class="text-dark fw-bold"><i class="fa fa-phone" > </i> <?php echo $results->patient_phone_number. '('. $results->phone_code.')';?></h5>
                    </div>
                    <div class="col-md-1">
                    <button class="Button Button--outline" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i></button>
                    <a href="<?php echo base_url() . 'patient/edit?id=' . encoding($results->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                        <!-- <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

<div class="row p-4 mt-4">
    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold"><strong>Problem</strong></h4> 
                        <p class="text-dark fw-bold"><?php echo $results->initial_dx_name; ?></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/doctor.png" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#DAEBFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5); border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold">Medical History</h4>
                        <p class="text-dark fw-bold"><strong>  <?php echo $results->initial_rx_name; ?></strong></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/planning.png" style="height:65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#FFE0B7; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px;">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold">Medication</h4>
                        <p class="text-dark fw-bold"><strong>   <?php echo $results->organism_name; ?></strong></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/medicine.png" style="height:65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- <div class="row p-4 mt-4">
    
</div> -->

<div class="row p-4 mt-4">
    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                <div class="col-md-8">
                <h4 class="no-margins fw-bold"><strong>Appointment</strong></h4> 
            </div>
            <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/appointment.svg" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>

    </div>
    <div class="row">

                    <div class="col-md-12">
                        
                        <?php $rowCount = 0;
                         foreach($results_rowAppointment as $appointment){ 
                            $rowCount++;
                            // print_r($appointment);die;
                            ?>
                        <div class="row" style="border-bottom: 1px solid gray;">
                        <div class="text-dark fw-bold">
                            <?php echo $rowCount. '  '.$appointment->type; ?>
                            
                         </div>
                         <div class="text-dark appointment-status">
                            <?php 
                            if($appointment->appointment_status == 'Active'):
                            
                            ?>
                                <span class="custom-badge status-green"><?php echo $appointment->appointment_status; ?></span> 
                                
                            <?php else: ?>
                                <span class="custom-badge status-red"><?php echo $appointment->appointment_status; ?></span> 
                
                             <?php endif; 
                            ?>
                            
                         </div>

                            <div class="text-dark fw-bold modal-appointment">
                            <?php echo $appointment->start_date_appointment; ?>
                            
                         </div>
                        </div>
                           
                          <?php  } 
                            ?>
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold"><strong>Task</strong></h4> 
                        <!-- <p class="text-dark fw-bold"><?php echo $results->initial_dx_name; ?></p> -->
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/tasks.svg" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        
                        <?php $rowCount = 0;
                         foreach($results_task as $task){ 
                            $rowCount++;
                            ?>
                        <div class="row" style="border-bottom: 1px solid gray;">
                        <div class="text-dark fw-bold">
                            <?php echo $rowCount. '  '.$task->task_name; ?>
                            
                         </div>

                         <div class="text-dark appointment-status">
                            <?php 
                            if($task->status == 'Done'):
                            
                            ?>
                                <span class="custom-badge status-green"><?php echo $task->status; ?></span> 
                                
                            <?php else: ?>
                                <span class="custom-badge status-red"><?php echo $task->status; ?></span> 
                
                             <?php endif; 
                            ?>
                            
                         </div>
                         
                         <div class="text-dark appointment-status">Doctor Name:  
                            <?php echo $task->doctor_name; ?>
                            
                         </div>
                         
                            <div class="text-dark fw-bold modal-appointment">Priority:
                            <?php echo $task->priority; ?>
                            
                         </div>
                         <div class="text-dark fw-bold modal-appointment">Due date:
                            <?php echo $task->due_date; ?>
                            
                         </div>
                         

                        </div>
                            <!-- <p class="text-dark fw-bold"><?php echo $appointment->end_date_appointment; ?></p> -->

                          <?php  } 
                            ?>
                        <!-- <p class="text-dark fw-bold"><?php echo $results->initial_dx_name; ?></p> -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-margins fw-bold"><strong>Product</strong></h4> 
                        <!-- <p class="text-dark fw-bold"><?php echo $results->initial_dx_name; ?></p> -->
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/products.svg" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
            </div>
        </div>
    </div>
</div>




    <?php }?>

</section>


<style>
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
    position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
}
.align-items-center {
    -ms-flex-align: center !important;
    align-items: center !important;
}.
.justify-content-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
}
.text-white {
    color: #fff !important;
}
.rounded-circle {
    border-radius: 50% !important;
}

.bg-info {
    background-color: #17a2b8 !important;
}
.mb-0, .my-0 {
    margin-bottom: 0 !important;
}
.small, small {
    font-size: .875em;
    font-weight: 400;
}
.text-white {
    color: #fff !important;
}
.p-3 {
    padding: 1rem !important;
}
.justify-content-between {
    -ms-flex-pack: justify !important;
    justify-content: space-between !important;
}
.d-flex {
    display: -ms-flexbox !important;
    display: flex !important;
}
.card-img, .card-img-top {
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}

.card {
    height: 200px;
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: 0.25rem;
}
</style>
</div>


    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  // Add click event listener to all td elements with class 'day-cell'
  $('.day-cell').click(function(){
    // Get time and day values from data attributes
    var time = $(this).data('time');
    var day = $(this).data('day');
    // Set hidden input values
    $('#selectedTime').val(time);
    $('#selectedDay').val(day);
    // Submit the form
    $('#timeSlotForm').submit();
  });
});
</script>
<script>
$(document).ready(function(){
  // Add click event listener to all td elements with class 'time-cell'
  $('.time-cell').click(function(){
    // Toggle 'highlight' class on click
    $(this).toggleClass('highlight');
  });

  // Add click event listener to all td elements with class 'day-cell'
  $('.day-cell').click(function(){
    // Toggle 'highlight' class on click
    $(this).toggleClass('highlight');
  });

  
});
</script>

<style>
.highlight {
    background-color: yellow; /* Change this to the desired highlight color */
  }

header h1,
header p {
  margin: 0;
}
footer {
  padding: 7vh 5vw;
  border-top: 1px solid #ddd;
}
aside {
  padding: 7vh 5vw;
}
.primary {
  overflow: auto;
  scroll-snap-type: both mandatory;
  height: 80vh;
}
@media (min-width: 40em) {
  main {
    display: flex;
  }
  aside {
    flex: 0 1 20vw;
    order: 1;
    border-right: 1px solid #ddd;
  }
  .primary {
    order: 2;
  }
}
table {
  border-collapse: collapse;
  border: 0;
}
th,
td {
  border: 1px solid #aaa;
  background-clip: padding-box;
  scroll-snap-align: start;
}
tbody tr:last-child th,
tbody tr:last-child td {
  border-bottom: 0;
}
thead {
  z-index: 1000;
  position: relative;
}
th,
td {
  padding: 0.6rem;
  min-width: 6rem;
  text-align: left;
  margin: 0;
}
thead th {
  position: sticky;
  top: 0;
  border-top: 0;
  background-clip: padding-box;
}
thead th.pin {
  left: 0;
  z-index: 1001;
  border-left: 0;
}
tbody th {
  background-clip: padding-box;
  border-left: 0;
}
tbody {
  z-index: 10;
  position: relative;
}
tbody th {
  position: sticky;
  left: 0;
}
thead th,
tbody th {
  background-color: #f8f8f8;
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('click', function() {
        checkboxes.forEach(function(cb) {
        cb.parentNode.parentNode.classList.remove('selected');
        });
        if (this.checked) {
        this.parentNode.parentNode.classList.add('selected');
        const selectedTime = this.getAttribute('data-time');
        const selectedDay = this.getAttribute('data-day');
        console.log(`Selected time: ${selectedTime}, Selected day: ${selectedDay}`);
        }
    });
    });
});
</script>



<script type="text/javascript">
    $('#date').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        endDate:'today'       
    });
/*    $("#zipcode").select2({
        allowClear: true
    });*/

    function printDiv() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }

</script>

<style>
    .custom-badge {
	border-radius: 4px;
	display: inline-block;
	font-size: 12px;
	min-width: 95px;
	padding: 1px 10px;
	text-align: center;
}
.status-red,
a.status-red {
	background-color: red;
	border: 1px solid #fe0000;
	color: white;
    border-radius:10px;
    padding:2px;
    float: inline-end;
}
.status-green,
a.status-green {
	background-color: green;
	border: 1px solid #00ce7c;
    border-radius:10px;
    padding:2px;
	color: white;
    float: inline-end;
}

</style>

<style>
    .user-setting{
        background-color: antiquewhite;
        padding: 13px;
        border-radius: 5px;
        border: 1px solid #df9595;
    }

    .btnPrevious,
.btnNext{
	display: inline-block;
	border: 1px solid #444348;
	border-radius: 3px;
	margin: 5px;
	color: #444348;
	font-size: 14px;
	padding: 10px 15px;
	cursor: pointer;
}

.nav-tabss {
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    /* width: 316px; */
    border-radius: inherit;
    font-weight: 900;
}
.nav-tab-appointment{
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    /* width: 553px; */
    padding: 20px;
    border-radius: inherit;
    background-color:white;

}
.nav-tab-appointment.active-link{
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    width: 553px;
    padding: 20px;
    border-radius: inherit;
    background-color:white;

}

.nav-pills-second{
    background-color:white;
}
.nav-pills-second>li {
    float: left;
}
.nav-pills-second.ul li:active .underline {
	transition: none;
	background-color: red;
}

.nav-link>a.active.underline {
	width: 100%;
	background-color: red;
}
.new-contact{
    background-color: darkslategray;
    color: white;
    font-weight: 900;
    width: 88px;
}
a.new-contact:hover{
    /* background-color: #d9416c !important; */
    color: white;
    font-weight: 900;
    width: 88px;
}
</style>

<style>
    /* Custom styles for dropdown */
.select-dropdown {
    position: relative;
}

/* Custom styles for search input */
.input-group-search {
    position: relative;
}

/* Adjust the dropdown and search input width as needed */
.select-dropdown .btn-secondary,
.input-group-search .form-control {
    width: 100%;
}



</style>
<script>

$(document).ready(function() {
    // Toggle dropdown on button click
    $('[data-testid="button__dropdown--sort-menu"]').click(function() {
        $(this).toggleClass('active');
        // Toggle dropdown menu visibility
        $(this).next('.ListViewMenu__buttonGroup___MY6Wh').toggle();
    });

    // Handle search button click
    $('.btn-search').click(function() {
        // Get search input value
        var searchTerm = $(this).closest('.input-group').find('.form-control').val();
        // Perform search operation with the searchTerm
        console.log('Search term:', searchTerm);
    });
});

</script>




