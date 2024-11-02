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

<style>
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
.folder-name{
    font-size: medium;
    font-weight: 900;
}
</style>
<!-- Page content -->
<div id="page-content">
    <!-- Breadcrumbs -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo site_url('pwfpanel');?>">Home</a></li>
        <li><a href="<?php echo site_url('patient/consultationTemplates');?>">Consultation Template</a></li>
    </ul>

    <!-- Consultation Template Panel -->
    <div class="block full">


    <div class="block full">


        <div class="row text-center">
                
                <div class="col-sm-6 col-md-2 mb-4">
                    <a href="<?php echo base_url() . 'index.php/patient/summary?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 10px; ">
                        <div class="widget-extra themed-background-dark"   style="background:#337ab7;">
                            <h4 style="font-size:14px; font-weight:600; color:white;">Summery</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                    <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Consultation</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/Medications?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Medications</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>

                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Letters and forms</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patientPrescription?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Prescriptions</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/labs?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Labs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patient/consultationInvoice?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Invoices</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/accountStatement?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Account statements</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patient/communication?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Communication</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patientDocuments?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Documents</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patient/patientLogs?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Logs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
            </div>



             <div class="row text-center">
                
                <div class="col-sm-6 col-lg-12">
                    <div class="panel panel-default">
                   
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
                        <!-- <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>




        <div class="block-title">
            <h2><strong>Consultation Template</strong> Panel</h2>
        </div>

        <!-- <div class="form-body">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="consultationType">Consultation Type</label>
                            <select name="consultationType" id="consultationType" class="form-control">
                                <option value="">Doctor Consultation</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="consultationDate">Date</label>
                            <input type="date" name="date" id="consultationDate" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Form Submission Section -->
    <div class="block full">
        <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
             -->

            <div class="form-body">
                <div class="row">
                    <!-- Buttons for Form Sections -->
                    <div class="col-md-8" >
                        <div class="btn-group mb-4" role="group">
                            <button type="button" id="btn-complaint" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Presenting Complaint</button>
                            <button type="button" id="btn-problem" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Problem Heading</button>
                            <button type="button" id="btn-exam" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Examination</button>
                            <button type="button" id="btn-allergy" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Allergy</button>
                            <button type="button" id="btn-medical-history" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Medical History</button>
                            <button type="button" id="btn-family-history" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Family History</button>
                            <button type="button" id="btn-social" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Social</button>
                            <button type="button" id="btn-medication" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Medication</button>
                            <button type="button" id="btn-product" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Product</button>
                            <button type="button" id="btn-comment" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Comment</button>
                        </div>

                        
            
                        <!-- Dynamic Form Sections -->
                        <div id="form-sections">
                        <div id="form-complaint" class="form-section" style="display:none;">
                        <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                            <!-- Presenting Complaint -->

                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            
                                <h4>Presenting Complaint</h4>
                                <input type="text" class="form-control" name="presenting_complaint" id="presenting_complaint" placeholder="Enter Complaint" required>
                                <input type="hidden" class="form-control" name="type" id="type" value="presenting_complaint" placeholder="Enter Complaint">
                            
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                        </form>
                        </div>
                            <!-- Problem Heading -->

                            
                            <div id="form-problem" class="form-section" style="display:none;">

                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                        
                                <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                <h4>Problem Heading</h4>
                                <div class="row">
                                    <span style="padding: 10px; margin-left: 25px;"><b>Problem</b></span>
                                </div>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="problem_heading" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Problem</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" name="search" class="form-control" placeholder="Search ..." id="problemSearch" required>
                                            <div id="result_problem"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" name="since" id="since" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" name="condition_type" id="condition_type" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" name="condition_significance" id="condition_significance" class="form-control" required>
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="comment" id="comment" required></textarea>
                                        <div>
                                            <input type="checkbox" id="showSummary" name="showSummary">
                                            <label for="showSummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                            </form>
                            </div>

                            <!-- Examination -->
                            <div id="form-exam" class="form-section" style="display:none;">
                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                <h4>Examination</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="examination" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Examination</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="examSearch" name="search" required>
                                            <div id="result_examination"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <label>Value</label>
                                        <input type="text" class="form-control" name="value" id="value" required>
                                        <label>Comment</label>
                                        <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                            </form>
                            </div>

                            <!-- Allergy -->
                            <div id="form-allergy" class="form-section" style="display:none;">
                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                                                        
                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                <h4>Allergy</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="allergy" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label for="allergySearch">Allergy</label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search allergies" id="allergySearch" name="search" required>
                                            <div id="result_allergy"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <label>Severity</label>
                                        <select class="form-control" name="severity" id="severity" required>
                                            <option value="severity">Select Severity</option>
                                        </select>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="comment" id="comment" required></textarea>
                                        <div>
                                            <input type="checkbox" id="allergySummary" name="allergySummary">
                                            <label for="allergySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                            </form>
                            </div>

                            <!-- Medical History -->
                            <div id="form-medical-history" class="form-section" style="display:none;">
                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                                                        
                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                <h4>Medical History</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="medical_history" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Medical History</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="medicalHistorySearch" name="search" required>
                                            <div id="result_medical_history"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control" name="since" id="since" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control" name="condition_type" id="condition_type" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control" name="condition_significance" id="condition_significance" required>
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="comment" id="comment" required></textarea>
                                        <div>
                                            <input type="checkbox" id="medicalHistorySummary" name="medicalHistorySummary">
                                            <label for="medicalHistorySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                </form>
                            </div>

                            <!-- Family History -->
                            <div id="form-family-history" class="form-section" style="display:none;">
                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <h4>Family History</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="family_history" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label for="familyHistorySearch">Family History</label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="familyHistorySearch" name="search" required>
                                            <div id="result_family_history"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <label>Relationship</label>
                                        <select class="form-control" name="relationship" id="relationship" required>
                                            <option value="relationship">Please select</option>
                                            <option value="parent">Parent</option>
                                            <option value="sibling">Sibling</option>
                                            <option value="friend">Friend</option>
                                            <option value="son">Son</option>
                                            <option value="daughter">Daughter</option>
                                            <option value="father">Father</option>
                                            <option value="mother">Mother</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="comment" id="comment" required></textarea>
                                        <div>
                                            <input type="checkbox" id="familyHistorySummary" name="familyHistorySummary">
                                            <label for="familyHistorySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                </form>
                            </div>

                            <!-- Social -->
                            <div id="form-social" class="form-section" style="display:none;">

                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                        
                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                <h4>Social</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="social" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Social</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="socialSearch" name="search" required>
                                            <div id="result_social"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control" name="since" id="since" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control" name="condition_type" id="condition_type" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control" name="condition_significance" id="condition_significance" required>
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="comment" id="comment" required></textarea>
                                    </div>
                                </div>

                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                </form>
                            </div>

                            <!-- Medication -->
                            <div id="form-medication" class="form-section" style="display:none;">
                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                        
                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                <h4>Medication</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="medication" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Medication</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="medicationSearch" name="search" required>
                                            <div id="result_medication"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control" name="since" id="since" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control" name="condition_type" id="condition_type" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control" name="condition_significance" id="condition_significance" required>
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="comment" id="comment" required></textarea>
                                        <div>
                                            <input type="checkbox" id="medicationSummary" name="medicationSummary" >
                                            <label for="medicationSummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                </form>
                            </div>

                            <!-- Product -->
                            <div id="form-product" class="form-section" style="display:none;">
                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <h4>Product</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="product" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Product</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="productSearch" name="search" required>
                                            <div id="result_product"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control" name="since" id="since" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control" name="condition_type" id="condition_type" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control" name="condition_significance" id="condition_significance" required>
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="comment" id="comment" required></textarea>
                                        <div>
                                            <input type="checkbox" id="productSummary" name="productSummary">
                                            <label for="productSummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                </form>
                            </div>

                            <!-- Comment -->
                            <div id="form-comment" class="form-section" style="display:none;">

                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                        
                            <div class="row">
                                    <div class="col-md-12">
                                            <!-- Consultation Type & Date -->
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="consultationType">Consultation Type</label>
                                                    <select name="consultationType" id="consultationType" class="form-control" required>
                                                        <option value="">Doctor Consultation</option>

                                                        <?php if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) { ?>
                                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                        <?php } } ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="consultationDate">Date</label>
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                <h4>Comment</h4>
                                <textarea class="form-control" placeholder="Enter Comment" name="comment" id="comment" required></textarea>

                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>                                </form>
                            </div>
                        </div>
                         </form>
                    </div>

                    <!-- Snapshot Section -->
                    <div class="col-md-4">
                        <strong>Snapshot</strong>
                        <ul>
                            <li>Problem Heading</li>
                            <li>Medical History</li>
                            <li>Medication</li>
                            <li>Product</li>
                            <li>Family History</li>
                            <li>Social</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-right mt-4">
                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button> -->
            </div>
        <!-- </form> -->
    </div>
</div>

<!-- CSS for Human Body and Additional Styling -->
<style>
    .form-section{
        margin:20px;
    }
    /* Human Body SVG Styles */
    .human-body {
        width: 207px;
        position: relative;
        padding-top: 146px;
        margin: 0 auto;
    }

    .human-body svg:hover path {
        fill: #ff7d16;
        cursor: pointer;
    }

    .human-body svg {
        fill: #57c9d5;
    }
</style>

<!-- JavaScript for Handling Button Clicks and Form Visibility -->
<script>
    $(document).ready(function() {
        // Hide all forms initially
        $('.form-section').hide();

        // Button click handlers to show corresponding forms
        $('#btn-complaint').click(function() {
            $('.form-section').hide();
            $('#form-complaint').show();
        });

        $('#btn-problem').click(function() {
            $('.form-section').hide();
            $('#form-problem').show();
        });

        $('#btn-exam').click(function() {
            $('.form-section').hide();
            $('#form-exam').show();
        });

        $('#btn-allergy').click(function() {
            $('.form-section').hide();
            $('#form-allergy').show();
        });

        $('#btn-medical-history').click(function() {
            $('.form-section').hide();
            $('#form-medical-history').show();
        });

        $('#btn-family-history').click(function() {
            $('.form-section').hide();
            $('#form-family-history').show();
        });

        $('#btn-social').click(function() {
            $('.form-section').hide();
            $('#form-social').show();
        });

        $('#btn-medication').click(function() {
            $('.form-section').hide();
            $('#form-medication').show();
        });

        $('#btn-product').click(function() {
            $('.form-section').hide();
            $('#form-product').show();
        });

        $('#btn-comment').click(function() {
            $('.form-section').hide();
            $('#form-comment').show();
        });
    });
</script>

<!-- problem heading script -->

<script>
    $(document).ready(function() {
        $("#problemSearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('patient/fetch'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_problem').html(data);
                    }
                });
            } else {
                $('#result_problem').html('');
            }
        });
    });
</script>

<script>
    function getSearchProblem() {
        var searchValue = document.getElementById("consultation_problem_heading").value;

        document.getElementById("problemSearch").value = searchValue;
    }
</script>

<!-- Consultation Examination script -->

<script>
    $(document).ready(function() {
        $("#examSearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('patient/fetchExamination'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_examination').html(data);
                    }
                });
            } else {
                $('#result_examination').html('');
            }
        });
    });
</script>

<script>
    function getSearchExamination() {
        var searchValue = document.getElementById("consultation_examination").value;

        document.getElementById("examSearch").value = searchValue;
    }
</script>


<!-- Consultation Allergy script -->

<script>
    $(document).ready(function() {
        $("#allergySearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('patient/fetchAllergy'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_allergy').html(data);
                    }
                });
            } else {
                $('#result_allergy').html('');
            }
        });
    });
</script>

<script>
    function getSearchAllergy() {
        var searchValue = document.getElementById("consultation_allergy").value;

        document.getElementById("allergySearch").value = searchValue;
    }
</script>

<!-- Consultation Medical History script -->

<script>
    $(document).ready(function() {
        $("#medicalHistorySearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('patient/fetchMedicalHistory'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_medical_history').html(data);
                    }
                });
            } else {
                $('#result_medical_history').html('');
            }
        });
    });
</script>

<script>
    function getSearchconsultationMedicalHistory() {
        var searchValue = document.getElementById("consultation_medical_history").value;

        document.getElementById("medicalHistorySearch").value = searchValue;
    }
</script>


<!-- Consultation Medical History script -->

<script>
    $(document).ready(function() {
        $("#familyHistorySearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('patient/fetchFamilyHistory'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_family_history').html(data);
                    }
                });
            } else {
                $('#result_family_history').html('');
            }
        });
    });
</script>

<script>
    function getSearchconsultationFamilyHistory() {
        var searchValue = document.getElementById("consultation_family_history").value;

        document.getElementById("familyHistorySearch").value = searchValue;
    }
</script>

<!-- Consultation Social script -->

<script>
    $(document).ready(function() {
        $("#socialSearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('patient/fetchSocial'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_social').html(data);
                    }
                });
            } else {
                $('#result_social').html('');
            }
        });
    });
</script>

<script>
    function getSearchconsultationSocial() {
        var searchValue = document.getElementById("consultation_social").value;

        document.getElementById("socialSearch").value = searchValue;
    }
</script>


<!-- Consultation Medication script -->

<script>
    $(document).ready(function() {
        $("#medicationSearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('patient/fetchMedication'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_medication').html(data);
                    }
                });
            } else {
                $('#result_medication').html('');
            }
        });
    });
</script>

<script>
    function getSearchconsultationMedication() {
        var searchValue = document.getElementById("consultation_medication").value;

        document.getElementById("medicationSearch").value = searchValue;
    }
</script>


<!-- Consultation Product script -->

<script>
    $(document).ready(function() {
        $("#productSearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('patient/fetchProduct'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_product').html(data);
                    }
                });
            } else {
                $('#result_product').html('');
            }
        });
    });
</script>

<script>
    function getSearchconsultationProduct() {
        var searchValue = document.getElementById("consultation_product").value;

        document.getElementById("productSearch").value = searchValue;
    }
</script>










