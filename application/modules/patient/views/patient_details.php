<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>



 

<style>

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
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($this->router->fetch_class()); ?>"><strong>Back</strong></a>
        </li>
    </ul>

    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
        <div class="block full">

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
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/accountStatement?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Account statements</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                
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
                <a href="<?php echo base_url() . 'index.php/patient/communication?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Logs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
            </div>


            <div class="row text-center">
                <div class="col-sm-6 col-lg-12">
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="panel panel-default">
                        <div >
                            
                            <!-- <ul class="nav nav-pills nav-fill nav-tabss mt-4" id="pills-tab" role="tablist" >
                                <li class="nav-item">
                                <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide text-dark">Patient</span></a>
                                </li>
                                <li class="nav-item">
                                
                                <a href="<?php echo base_url() . 'index.php/patient/summary?id=' . encoding($results->id); ?>" data-toggle="tooltip"><span class="sidebar-nav-mini-hide text-dark">Summary</span></a>

                                </li>
                               
                                <li class="nav-item">
                                <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($results->id); ?>"data-toggle="tooltip"><span class="sidebar-nav-mini-hide text-dark"> Consultation Templates</span></a>
                                </li>
                                <li class="nav-item">
                                
                                <a href="<?php echo base_url() . 'index.php/patient/communication?id=' . encoding($results->id); ?>" data-toggle="tooltip"><span class="sidebar-nav-mini-hide text-dark">Communication</span></a>
                                </li>
                                
                            </ul> -->
                        </div> 

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="=" crossorigin="anonymous" />
                <div class="m-4">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="card l-bg-cherry">
                                <div class="card-statistic-3 m-4">
                            
                                    <div class="card-icon card-icon-large"><i class="fas fa-tint" style="font-size:3em;"></i></div> <!-- Using fa-tint icon -->
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
                <div class="card-icon card-icon-large"><i class="fas fa-heartbeat" style="font-size:3em;"></i></div> <!-- Using fa-heartbeat icon -->
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
                <div class="card-icon card-icon-large"><i class="fas fa-heartbeat" style="font-size:3em;"></i></div> <!-- Using fa-heartbeat icon -->
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
                <div class="card-icon card-icon-large"><i class="fas fa-thermometer-half" style="font-size:3em;"></i></div> <!-- Using fa-thermometer-half icon -->
<div class="mb-4">
    <h4 class="card-title mb-0">Temperature</h4>
    <h4 class="text-center fw-bold m-2">98.6°F</h4> <!-- Example temperature value in Fahrenheit -->
</div>

            </div>
        </div>
    </div>
</div>
<div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

    <!-- END Datatables Header -->
    <div class="row">
        
        <div class="col-md-12" >
        <div style="margin-bottom:20px;">
      
        </div>
            <div class="block" style=" background-color: #FFFF; padding: 15px;  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);">
           
                <!-- Customer Info Title -->
                <div class="block-title p-2">
                    <h2><i class="fa fa-file-o"></i> <strong><?php echo $title; ?></strong> Info</h2>
                    <button type="button" class="btn btn-md btn-primary sendmail mt-2 fw-bold" style="background: #337ab7" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Send Patient Details on Mail</button>
                </div>
                
                <!-- END Customer Info Title -->
                <!-- Customer Info -->
                <div class="block-section text-center">
<!--                    <a href="javascript:void(0)">
                        <img src="<?php echo (!empty($results->img)) ? base_url() . $results->img : base_url() . 'backend_asset/images/default.jpg'; ?>" alt="avatar" class="img-circle" style=" width: 100px; height: 100px;">
                    </a>-->
<!--                    <h3>
                        <strong><?php echo $results->patient_name; ?></strong><br><small></small>
                    </h3>-->
                </div>
                <table class="table table-borderless table-striped table-vcenter"  style=" background-color: #FFFF; padding: 15px;  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);">
                    <tbody>
                        <tr>
                            <td class="text-center"><strong>Patient ID</strong></td>
                            <td><?php echo $results->patient_id; ?></td>
                        </tr>
                        <?php if(empty($results->room_number)){ ?>
                        <tr>
                            <td class="text-center"><strong>Room Number</strong></td>
                            <td>NULL</td>
                        </tr>
                        <?php   } else{ ?>
                            <tr>
                            <td class="text-center"><strong>Room Number</strong></td>
                            <td><?php echo $results->room_number; ?></td>
                        </tr>
                        <?php } ?>
                        <!-- <tr>
                            <td class="text-center"><strong>Address</strong></td>
                            <td><?php echo $results->address; ?></td>
                        </tr> -->
                        <tr>
                            <td class="text-center"><strong>Care Unit</strong></td>
                            <td><?php echo ucwords($results->care_unit_name); ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Provider MD</strong></td>
                            <td><?php echo ucwords($results->doctor_name); ?></td>
                        </tr>
                        <?php if($results->symptom_onset == 'Facility'){ ?>
                        <tr>
                            <td class="text-center"><strong>Infection Onset</strong></td>
                            <td>Facility/HAI<!-- <?php echo $results->symptom_onset; ?> --></td>    
                        </tr>
                        <?php } else if($results->symptom_onset == 'Hospital'){ ?>
                        <tr>
                            <td class="text-center"><strong>Infection Onset</strong></td>
                            <td>Hospital/CAI<!-- <?php echo $results->symptom_onset; ?> --></td>    
                        </tr>
                        <?php }else{ ?>
                        <tr>
                            <td class="text-center"><strong>Infection Onset</strong></td>
                            <td><?php echo $results->symptom_onset; ?></td>    
                        </tr>
                        <?php } ?>
                        <!-- <tr>
                            <td class="text-center"><strong>MD Steward Consult</strong></td>
                            <td><?php //echo $results->md_stayward_consult; ?></td>
                        </tr> -->
                        <tr>
                            <td class="text-center"><strong>MD Steward</strong></td>
                            <td><?php echo ucwords($results->md_steward); ?></td>
                        </tr>
                          <!-- <tr>
                            <td class="text-center"><strong>Total Days Of Patient Stay</strong></td>
                            <td>
                            <?php echo $results->total_days_of_patient_stay; ?></td>
                        </tr> -->
                          <tr>
                            <td class="text-center"><strong>Date of start abx</strong></td>
                            <td><?php echo date('m/d/Y',strtotime($results->date_of_start_abx)); ?></td>
                        </tr>
   

                    </tbody>
                </table>
                <!-- END Customer Info -->
            </div>
        </div>
        <div class="col-md-6" >
            <div class="block" style=" background-color: #FFFF; padding: 15px;  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);">
                <!-- Customer Info Title -->
                <div class="block-title">
                    <h2><i class="fa fa-file-o fw-bold"></i> <strong>Initial</strong> Info</h2>
                </div>
                <!-- END Customer Info Title -->
                <table class="table table-borderless table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-center"><strong>Antibiotic Name</strong></td>
                            <td ><?php echo $results->initial_rx_name; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Diagnosis</strong></td>
                            <td><?php echo $results->initial_dx_name; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Days of Therapy</strong></td>
                            <td><?php echo $results->initial_dot; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>ABX Checklist</strong></td>
                            <td><?php echo $results->infection_surveillance_checklist; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Criteria Met</strong></td>
                            <td><?php echo $results->criteria_met; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Culture Source</strong></td>
                            <td><?php echo $results->culture_source_name; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Organism</strong></td>
                            <td><?php echo $results->organism_name; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Precautions</strong></td>
                            <td><?php echo $results->precautions_name; ?></td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Customer Info -->
            </div>
        </div>
        <div class="col-md-6" >
            <div class="block" style=" background-color: #FFFF; padding: 15px;  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);">
                <!-- Customer Info Title -->
                <div class="block-title" >
                    <h2 ><i class="fa fa-file-o fw-bold"></i> <strong >MD Steward</strong> Recommendation</h2>
                </div>
                <!-- END Customer Info Title -->
                <table class="table table-borderless table-striped table-vcenter">
                    <tbody>
                       
                          <tr>
                            <td class="text-center"><strong>MD Steward Response</strong></td>
                            <td><?php echo $results->md_stayward_response; ?></td>
                        </tr>
                      
                        <tr>
                            <td class="text-center"><strong>NEW Antibiotic Name</strong></td>
                            <td><?php echo $results->new_initial_rx_name; ?></td>
                        </tr>

                        <tr>
                            <td class="text-center"><strong>PSA(Provider Steward Agreement)</strong></td>
                            <td><?php echo $results->psa; ?></td>
                        </tr>

                        <tr>
                            <td class="text-center"><strong>New Diagnosis</strong></td>
                            <td><?php echo $results->new_initial_dx_name; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>New Days of Therapy</strong></td>
                            <td><?php echo $results->new_initial_dot; ?></td>
                        </tr>
                       <!--  <tr>
                            <td class="text-center"><strong>Comment</strong></td>
                            <td><?php //echo $results->comment; ?></td>
                        </tr> -->
                        <!-- <tr>
                            <td class="text-center"><strong>PCT</strong></td>
                            <td><?php echo $results->pct; ?></td>
                        </tr> -->
                        <tr>
                            <td class="text-center"><strong>Additional Comment</strong></td>
                            <td><?php echo str_replace( array('[','"',']') , ''  , $results->additional_comment_option )
                            ; ?></td>
                        </tr>
                        
                    </tbody>
                </table>
                <!-- END Customer Info -->
            </div>
        </div>
    </div>
    <!-- Datatables Content -->
    <!-- END Datatables Content -->
</div>
<!-- </div> -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" style="margin-top:-40px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title fw-bold" style="text-align:center;" id="exampleModalLabel">Mail Complete Information of Patient </h3>        
      </div>
      <div class="modal-body1">
        <form  method="post" id="contact-form" data-toggle="validator" role="form" action="" enctype="multipart/form-data">
       

         </br>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mail Id:</label>
            <input id="to_email" type="email" name="to_email" multiple required="required" data-error="Valid email is required." placeholder="To Email Address" class="form-control" >
            <div class="help-block with-errors"></div>

           <div class="modal_popup">
           <input  name="id"  id='name' value="<?php echo $results->patient_id; ?>" /> 
           <?php if(empty($results->room_number)){ ?>
           <input  name="room_number"  id='room_number' value="NULL" /> 
           <?php   } else{ ?>
           <input  name="room_number"  id='room_number' value="<?php echo $results->room_number; ?>" /> 
            <?php } ?>
           <input  name="care_unit_name"  id='care_unit_name' value="<?php echo ucwords($results->care_unit_name); ?>" /> 
           <input  name="doctor_name"  id='doctor_name' value="<?php echo ucwords($results->doctor_name); ?>" /> 
           <input  name="symptom_onset"  id='symptom_onset' value="<?php echo $results->symptom_onset; ?>" /> 
           <input  name="culture_source_name"  id='culture_source_name' value="<?php echo $results->culture_source_name; ?>" /> 
           <input  name="organism_name"  id='organism_name' value="<?php echo $results->organism_name; ?>" /> 
           <input  name="precautions_name"  id='precautions_name' value="<?php echo $results->precautions_name; ?>" /> 
           <input  name="md_steward"  id='md_steward' value="<?php echo ucwords($results->md_steward); ?>" /> 
           <input  name="date_of_start_abx"  id='date_of_start_abx' value="<?php echo date('m/d/Y',strtotime($results->date_of_start_abx)); ?>" /> 
           <input  name="initial_rx_name"  id='initial_rx_name' value="<?php echo $results->initial_rx_name; ?>" /> 
           <input  name="initial_dx_name"  id='initial_dx_name' value="<?php echo $results->initial_dx_name; ?>" /> 
           <input  name="initial_dot"  id='initial_dot' value="<?php echo $results->initial_dot; ?>" /> 
           <input  name="infection_surveillance_checklist"  id='infection_surveillance_checklist' value="<?php echo $results->infection_surveillance_checklist; ?>" /> 
           <input  name="criteria_met"  id='criteria_met' value="<?php echo $results->criteria_met; ?>" /> 
           <input  name="md_stayward_response"  id='md_stayward_response' value="<?php echo $results->md_stayward_response; ?>" /> 
           <input  name="new_initial_rx_name"  id='new_initial_rx_name' value="<?php echo $results->new_initial_rx_name; ?>" /> 
           <input  name="psa"  id='psa' value="<?php echo $results->psa; ?>" /> 
           <input  name="new_initial_dx_name"  id='new_initial_dx_name' value="<?php echo $results->new_initial_dx_name; ?>" /> 
           <input  name="new_initial_dot"  id='new_initial_dot' value="<?php echo $results->new_initial_dot; ?>" /> 
          <!--  <input  name="pct"  id='pct' value="<?php echo $results->pct; ?>" />  -->
           <input  name="additional_comment_option"  id='additional_comment_option' value="<?php echo str_replace( array('[','"',']') , ''  , $results->additional_comment_option); ?>" /> 
           

        </div>
          </div>
          <br>
          <div class="modal-footer mailmodel">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  id="submit1"  class="btn btn-primary" style="background: #337ab7">Send Mail</button>
      </div>

        </form>
      </div>
     
    </div>
  </div>
</div>
<!-- END Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>


<script type="text/javascript">
    $('#date_of_birth').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        endDate: 'today'
    });
    /*    $("#zipcode").select2({
     allowClear: true
     });*/
</script>

<script type="text/javascript">
$("#contact-form").submit(function(e) {
  $.ajax({
         type: "POST",
         url: '',
         data: $("#submit1").serialize(), // serializes the form's elements.
         success: function(data)
         {
             $("#contact-form").html("<h2 style='color:#2E8B57;text-align:center;'><b>Mail Sent Successfully....!!!</b></h2>");
         }
       });
  e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>