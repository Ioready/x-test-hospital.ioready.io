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

<style>
        /* Button styling */
        .btn {
            margin: 1px 0;
            background-color: #b9adad;
        }

        /* Styling for dynamically opened forms */
        .form-section {
            display: none;
            /* margin: 20px; */
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */
            /* background-color: #f9f9f9; */
        }

        /* Styling for the save button */
        .save-btn {
            font-weight: 700;
            font-size: 1.5rem;
            padding: 0.6rem 2.25rem;
            background: #337ab7;
            color: #fff;
        }

        /* Styling for the close button */
        .close-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-btn:hover {
            background-color: darkred;
        }

        /* Button group styling */
        .btn-group button {
            background-color: #337ab7;
            color: white;
            border-radius: 5px;
            margin: 5px;
        }

        /* Close Button Styling */
    .close-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #aaa;
        font-size: 20px;
        cursor: pointer;
    }

    .close-icon:hover {
        color: #333;
    }

    .form-section {
        position: relative;
        display: none;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
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




        <!-- <div class="block-title">
            <h2><strong>Consultation Template</strong> Panel</h2>
        </div> -->

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
             <div class="block-title">
            <h2><strong>Consultation Template</strong> Panel</h2>
        </div>
            <div class="form-body">
                <div class="row">
                    <!-- Buttons for Form Sections -->
                    <div class="col-md-8" >
                    
            
                        <!-- Dynamic Form Sections -->
                        <div id="form-sections">
                            <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data">
                        
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

                        
                            <div id="form-complaint" class="form-section mt-4" style="display:none;">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                            <!-- Presenting Complaint -->

                            <!-- <div class="row">
                                    <div class="col-md-12">
                                            
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
                                </div> -->

                        
                                <span class="close-icon" onclick="$('#form-complaint').hide()">&times;</span>
                                <h4>Presenting Complaint</h4>
                                <input type="text" class="form-control" name="presenting_complaint" id="presenting_complaint" placeholder="Enter Complaint">
                                <input type="hidden" class="form-control" name="presenting_type" id="presenting" placeholder="Enter presenting">
                            
                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-complaint').hide()">Close</button>
                        </form> -->

                        </div>
                            <!-- Problem Heading -->

                            
                            <div id="form-problem" class="form-section mt-4" style="display:none;">

                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                        
                               

                            <span class="close-icon" onclick="$('#form-problem').hide()">&times;</span>
                                <h4>Problem Heading</h4>
                                <div class="row">
                                    <span style="padding: 10px; margin-left: 25px;"><b>Problem</b></span>
                                </div>
                                <div class="row">
                                <input type="hidden" class="form-control" name="problem_type" id="problem" placeholder="Enter problem">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Problem</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" name="problem_search" class="form-control" placeholder="Search ..." id="problemSearch">
                                            <div id="result_problem"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" name="problem_since" id="since" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" name="problem_condition_type" id="condition_type" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" name="problem_condition_significance" id="condition_significance" class="form-control">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="problem_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="showSummary" name="showSummary">
                                            <label for="showSummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-problem').hide()">Close</button>
                            </form> -->
                            </div>

                            <!-- Examination -->
                            <div id="form-exam" class="form-section mt-4" style="display:none;">
                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                                

                            <span class="close-icon" onclick="$('#form-exam').hide()">&times;</span>
                                <h4>Examination</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="examination_type" id="examination" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Examination</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="examSearch" name="examination_search">
                                            <div id="result_examination"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <label>Value</label>
                                        <input type="text" class="form-control" name="examination_value" id="value">
                                        <label>Comment</label>
                                        <textarea class="form-control" name="examination_comment" id="comment" rows="4"></textarea>
                                    </div>
                                </div>
                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-exam').hide()">Close</button>
                            </form> -->
                            </div>

                            <!-- Allergy -->
                            <div id="form-allergy" class="form-section mt-4" style="display:none;">
                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                                                        
                            

                            <span class="close-icon" onclick="$('#form-allergy').hide()">&times;</span>
                                <h4>Allergy</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="allergy_type" id="allergy" placeholder="Enter allergy">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label for="allergySearch">Allergy</label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search allergies" id="allergySearch" name="allergy_search">
                                            <div id="result_allergy"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <label>Severity</label>
                                        <select class="form-control" name="allergy_severity" id="severity">
                                            <option value="severity">Select Severity</option>
                                        </select>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="allergy_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="allergySummary" name="allergySummary">
                                            <label for="allergySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-allergy').hide()">Close</button>
                            </form> -->

                            </div>

                            <!-- Medical History -->
                            <div id="form-medical-history" class="form-section mt-4" style="display:none;">
                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                                                        
                           
                            <span class="close-icon" onclick="$('#form-medical-history').hide()">&times;</span>
                                <h4>Medical History</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="medical_type" id="medical" placeholder="Enter medical">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Medical History</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="medicalHistorySearch" name="medical_history_search">
                                            <div id="result_medical_history"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control" name="medical_history_since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control" name="medical_history_condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control" name="medical_history_condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="medical_history_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="medicalHistorySummary" name="medicalHistorySummary">
                                            <label for="medicalHistorySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-medical-history').hide()">Close</button>
                                
                                </form> -->
                            </div>

                            <!-- Family History -->
                            <div id="form-family-history" class="form-section mt-4" style="display:none;">
                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                            
                            <span class="close-icon" onclick="$('#form-family-history').hide()">&times;</span>
                                <h4>Family History</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="family_type" id="family" placeholder="Enter family">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label for="familyHistorySearch">Family History</label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="familyHistorySearch" name="family_history_search">
                                            <div id="result_family_history"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <label>Relationship</label>
                                        <select class="form-control" name="relationship" id="relationship">
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
                                        <textarea class="form-control" rows="4" name="family_history_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="familyHistorySummary" name="familyHistorySummary">
                                            <label for="familyHistorySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-family-history').hide()">Close</button>
                                </form> -->
                            </div>

                            <!-- Social -->
                            <div id="form-social" class="form-section" style="display:none;">

                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                            <span class="close-icon" onclick="$('#form-social').hide()">&times;</span>                                        
                                <h4>Social</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="social_type" id="social" placeholder="Enter social">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Social</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="socialSearch" name="social_search">
                                            <div id="result_social"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control" name="social_since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control" name="social_condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control" name="social_condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="social_comment" id="comment"></textarea>
                                    </div>
                                </div>

                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-social').hide()">Close</button>
                                </form> -->
                            </div>

                            <!-- Medication -->
                            <div id="form-medication" class="form-section mt-4" style="display:none;">
                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                        
                            
                            <span class="close-icon" onclick="$('#form-medication').hide()">&times;</span>
                                <h4>Medication</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="medication_type" id="medication" placeholder="Enter medication">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Medication</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="medicationSearch" name="medication_search">
                                            <div id="result_medication"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control" name="medication_since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control" name="medication_condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control" name="medication_condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="medication_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="medicationSummary" name="medicationSummary" >
                                            <label for="medicationSummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-medication').hide()">Close</button>
                                </form> -->
                            </div>

                            <!-- Product -->
                            <div id="form-product" class="form-section mt-4" style="display:none;">
                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                            <span class="close-icon" onclick="$('#form-product').hide()">&times;</span>
                                <h4>Product</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="product_type" id="product" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Product</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="productSearch" name="product_search">
                                            <div id="result_product"></div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control" name="product_since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control" name="product_condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control" name="product_condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="4" name="product_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="productSummary" name="productSummary">
                                            <label for="productSummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                <button type="button" class="close-btn" onclick="$('#form-product').hide()">Close</button>
                                </form> -->
                            </div>

                            <!-- Comment -->
                            <div id="form-comment" class="form-section mt-4" style="display:none;">

                            <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">

                            <span class="close-icon" onclick="$('#form-comment').hide()">&times;</span>
                                <h4>Comment</h4>
                                <input type="hidden" class="form-control" name="comments_type" id="comments" placeholder="Enter Complaint">
                            
                                <textarea class="form-control" placeholder="Enter Comment" name="comment" id="comment"></textarea>

                                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>    
                                <button type="button" class="close-btn" onclick="$('#form-comment').hide()">Close</button>
                            </form> -->
                            </div>

                             <!-- Diagram -->
                             <div id="form-diagram" class="form-section" style="display:none;">

                                <!-- <form id="addFormAjax" method="post" action="<?php echo base_url($formUrlConsult) ?>" enctype="multipart/form-data"> -->
                                <div class="alert alert-danger" id="error-box" style="display: none"></div>

                                <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                            
                                

                                <span class="close-icon" onclick="$('#form-diagram').hide()">&times;</span>
                                    <h4>Diagram</h4>
                                    <input type="hidden" class="form-control" name="diagram_type" id="diagram" placeholder="Enter Complaint">
                                    
                                    <button type="button" style="color:green; background:white; border: 1px solid green; border-radius:5px; padding:5px;" data-toggle="modal" data-target="#myModal"> Add a diagram</button>
                                    <div id="select_question"></div>

                                    <textarea class="form-control" placeholder="Enter diagram text" name="diagram_comment" id="diagram_comment"></textarea>

                                    <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>    
                                    <button type="button" class="close-btn" onclick="$('#form-comment').hide()">Close</button>
                                </form> -->
                            </div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>    
                                   
                        </form>
                        
                        <hr class="new3">
                         <!-- </form> -->

                         <div class="btn-group mb-4" role="group">
                            <button type="button" id="btn-complaint" onclick="setTypePresenting('presenting_complaint')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Presenting Complaint</button>
                            <button type="button" id="btn-problem" onclick="setTypeProblem('problem_heading')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Problem Heading</button>
                            <button type="button" id="btn-exam" onclick="setTypeExamination('examination')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Examination</button>
                            <button type="button" id="btn-allergy" onclick="setTypeAllergy('allergy')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Allergy</button>
                            <button type="button" id="btn-medical-history" onclick="setTypeMedical('medical_history')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Medical History</button>
                            <button type="button" id="btn-family-history" onclick="setTypeFamily('family_history')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Family History</button>
                            <button type="button" id="btn-social" onclick="setTypeSocial('social')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Social</button>
                            <button type="button" id="btn-medication" onclick="setTypeMedication('medication')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Medication</button>
                            <button type="button" id="btn-product" onclick="setTypeProduct('product')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Product</button>
                            <button type="button" id="btn-comment" onclick="setTypeComment('comment')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Comment</button>
                            <button type="button" id="btn-diagram" onclick="setTypeDiagram('diagram')" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Diagram</button>
                        </div>

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
                            <li>Diagram</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-right mt-4">
                <!-- <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button> -->
            </div>
        <!-- </form> -->
    </div>


<script>
    $(document).on("click","#cust_btn",function(){
  
  $("#myModal").modal("toggle");
  
})
</script>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form id="myForm" method="post" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Diagram.</h4>
                </div>
                <div class="modal-body">
                    <!-- <p>Question.</p> -->
                    <select name="question" id="question" class="form-control">
                    <!-- <option value="">Select a question type</option> -->
                        <!-- <option value="Presenting Complaint">Presenting complaint</option>
                        <option value="Problem Heading">Problem heading</option>
                        <option value="Allergy">Allergy</option>
                        <option value="Current Hedication">Current medication</option>
                        <option value="Examination">Examination</option>
                        <option value="Family History">Family history</option>
                        <option value="Medical History">Medical history</option>
                        <option value="Social History">Social history</option>
                        <option value="Prescibe Medication">Prescibe medication</option>
                        <option value="Dispense Products">Dispense products</option> -->
                        <option id="selected_diagram">Diagram</option>
                        <!-- <option value="" disabled>---------</option>
                        <option value="Custome Question">Custome question</option> -->


                    </select>
                    

                        <div id="diagram" >
                            
                            <div class="row">

                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_f.jpg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_f.jpg" alt="Body 1" width="145px;" style="margin-left: 39px;">
                                    <div>Body 1</div>
                                </div>
                        
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_m.jpg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_m.jpg" alt="Body 2" width="149px;" style="margin-left: 39px;">
                                    <div>Body 2</div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_m.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_m.jpeg" alt="Male" width="195px;" style="margin-left: 39px;">
                                    <div>Male</div>
                                </div>
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_f.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_f.jpeg" alt="Female" width="145px;" style="margin-left: 39px;">
                                    <div>Female</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_b.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_b.jpeg" alt="Boy" width="145px;" style="margin-left: 39px;">
                                        <div>Boy</div>
                                </div>
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_g.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_g.jpeg" alt="Girl" width="145px;" style="margin-left: 39px;">
                                    <div>Girl</div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/hand.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/hand.jpeg" alt="Hand" width="145px;" style="margin-left: 39px;">
                                    <div>Hand</div>
                                </div>

                                <div class="col-md-6">
                                            <!-- <div class="human-body">
                                                <svg data-position="head" class="head" xmlns="http://www.w3.org/2000/svg" width="15.594" height="40.031" viewBox="0 0 56.594 95.031"><path d="M15.92 68.5l8.8 12.546 3.97 13.984-9.254-7.38-4.622-15.848zm27.1 0l-8.8 12.546-3.976 13.988 9.254-7.38 4.622-15.848zm6.11-27.775l.108-11.775-21.16-14.742L8.123 26.133 8.09 40.19l-3.24.215 1.462 9.732 5.208 1.81 2.36 11.63 9.72 11.018 10.856-.324 9.56-10.37 1.918-11.952 5.207-1.81 1.342-9.517zm-43.085-1.84l-.257-13.82L28.226 11.9l23.618 15.755-.216 10.37 4.976-17.085L42.556 2.376 25.49 0 10.803 3.673.002 24.415z"></path></svg>
                                                <svg data-position="shoulder" class="shoulder" xmlns="http://www.w3.org/2000/svg" width="50.532" height="16.594" viewBox="0 0 109.532 46.594"><path d="M38.244-.004l1.98 9.232-11.653 2.857-7.474-2.637zm33.032 0l-1.98 9.232 11.653 2.857 7.474-2.637zm21.238 10.54l4.044-2.187 12.656 14 .07 5.33S92.76 10.66 92.515 10.535zm-1.285.58c-.008.28 17.762 18.922 17.762 18.922l.537 16.557-6.157-10.55L91.5 30.988 83.148 15.6zm-74.224-.58L12.962 8.35l-12.656 14-.062 5.325s16.52-17.015 16.764-17.14zm1.285.58C18.3 11.396.528 30.038.528 30.038L-.01 46.595l6.157-10.55 11.87-5.056L26.374 15.6z"></path></svg>
                                                <svg data-position="arm" class="arm" xmlns="http://www.w3.org/2000/svg" width="106.344" height="40.25" viewBox="0 0 156.344 119.25"><path d="M21.12 56.5a1.678 1.678 0 0 1-.427.33l.935 8.224 12.977-13.89 1.2-8.958A168.2 168.2 0 0 0 21.12 56.5zm1.387 12.522l-18.07 48.91 5.757 1.333 19.125-39.44 3.518-22.047zm-5.278-18.96l2.638 18.74-17.2 46.023L.01 113.05l6.644-35.518zm118.015 6.44a1.678 1.678 0 0 0 .426.33l-.934 8.222-12.977-13.89-1.2-8.958A168.2 168.2 0 0 1 135.24 56.5zm-1.39 12.52l18.073 48.91-5.758 1.333-19.132-39.44-3.52-22.05zm5.28-18.96l-2.64 18.74 17.2 46.023 2.658-1.775-6.643-35.518zm-103.1-12.323a1.78 1.78 0 0 1 .407-.24l3.666-27.345L33.07.015l-7.258 10.58-6.16 37.04.566 4.973a151.447 151.447 0 0 1 15.808-14.87zm84.3 0a1.824 1.824 0 0 0-.407-.24l-3.666-27.345L123.3.015l7.258 10.58 6.16 37.04-.566 4.973a151.447 151.447 0 0 0-15.822-14.87zM22.288 8.832l-3.3 35.276-2.2-26.238zm111.79 0l3.3 35.276 2.2-26.238z"></path></svg>
                                                <svg data-position="cheast" class="cheast" xmlns="http://www.w3.org/2000/svg" width="30.594" height="10.063" viewBox="0 0 86.594 45.063"><path d="M19.32 0l-9.225 16.488-10.1 5.056 6.15 4.836 4.832 14.07 11.2 4.616 17.85-8.828-4.452-34.7zm47.934 0l9.225 16.488 10.1 5.056-6.15 4.836-4.833 14.07-11.2 4.616-17.844-8.828 4.45-34.7z"></path></svg>
                                                <svg data-position="stomach" class="stomach" xmlns="http://www.w3.org/2000/svg" width="20.25" height="30.594" viewBox="0 0 75.25 107.594"><path d="M19.25 7.49l16.6-7.5-.5 12.16-14.943 7.662zm-10.322 8.9l6.9 3.848-.8-9.116zm5.617-8.732L1.32 2.15 6.3 15.6zm-8.17 9.267l9.015 5.514 1.54 11.028-8.795-5.735zm15.53 5.89l.332 8.662 12.286-2.665.664-11.826zm14.61 84.783L33.28 76.062l-.08-20.53-11.654-5.736-1.32 37.5zM22.735 35.64L22.57 46.3l11.787 3.166.166-16.657zm-14.16-5.255L16.49 35.9l1.1 11.25-8.8-7.06zm8.79 22.74l-9.673-7.28-.84 9.78L-.006 68.29l10.564 14.594 5.5.883 1.98-20.735zM56 7.488l-16.6-7.5.5 12.16 14.942 7.66zm10.32 8.9l-6.9 3.847.8-9.116zm-5.617-8.733L73.93 2.148l-4.98 13.447zm8.17 9.267l-9.015 5.514-1.54 11.03 8.8-5.736zm-15.53 5.89l-.332 8.662-12.285-2.665-.664-11.827zm-14.61 84.783l3.234-31.536.082-20.532 11.65-5.735 1.32 37.5zm13.78-71.957l.166 10.66-11.786 3.168-.166-16.657zm14.16-5.256l-7.915 5.514-1.1 11.25 8.794-7.06zm-8.79 22.743l9.673-7.28.84 9.78 6.862 12.66-10.564 14.597-5.5.883-1.975-20.74z"></path></svg>
                                                <svg data-position="legs" class="legs" xmlns="http://www.w3.org/2000/svg" width="30.626" height="76.625" viewBox="0 0 93.626 286.625"><path d="M17.143 138.643l-.664 5.99 4.647 5.77 1.55 9.1 3.1 1.33 2.655-13.755 1.77-4.88-1.55-3.107zm20.582.444l-3.32 9.318-7.082 13.755 1.77 12.647 5.09-14.2 4.205-7.982zm-26.557-12.645l5.09 27.29-3.32-1.777-2.656 8.875zm22.795 42.374l-1.55 4.88-3.32 20.634-.442 27.51 4.65 26.847-.223-34.39 4.87-13.754.663-15.087zM23.34 181.24l1.106 41.267 8.853 33.28-9.628-4.55-16.045-57.8 5.533-36.384zm15.934 80.536l-.664 18.415-1.55 6.435h-4.647l-1.327-4.437-1.55-.222.332 4.437-5.864-1.778-1.55-.887-6.64-1.442-.22-5.214 6.418-10.87 4.426-5.548 10.844-4.437zM13.63 3.076v22.476l15.71 31.073 9.923 30.85L38.23 66.1zm25.49 30.248l.118-.148-.793-2.024L21.9 12.992l-1.242-.44L31.642 40.93zM32.865 44.09l6.812 17.6 2.274-21.596-1.344-3.43zM6.395 61.91l.827 25.34 12.816 35.257-3.928 10.136L3.5 88.133zM30.96 74.69l.345.826 6.47 15.48-4.177 38.342-6.594-3.526 5.715-35.7zm45.5 63.953l.663 5.99-4.647 5.77-1.55 9.1-3.1 1.33-2.655-13.755-1.77-4.88 1.55-3.107zm-20.582.444l3.32 9.318 7.08 13.755-1.77 12.647-5.09-14.2-4.2-7.987zm3.762 29.73l1.55 4.88 3.32 20.633.442 27.51-4.648 26.847.22-34.39-4.867-13.754-.67-15.087zm10.623 12.424l-1.107 41.267-8.852 33.28 9.627-4.55 16.046-57.8-5.533-36.384zM54.33 261.777l.663 18.415 1.546 6.435h4.648l1.328-4.437 1.55-.222-.333 4.437 5.863-1.778 1.55-.887 6.638-1.442.222-5.214-6.418-10.868-4.426-5.547-10.844-4.437zm25.643-258.7v22.476L64.26 56.625l-9.923 30.85L55.37 66.1zM54.48 33.326l-.118-.15.793-2.023L71.7 12.993l1.24-.44L61.96 40.93zm6.255 10.764l-6.812 17.6-2.274-21.595 1.344-3.43zm26.47 17.82l-.827 25.342-12.816 35.256 3.927 10.136 12.61-44.51zM62.64 74.693l-.346.825-6.47 15.48 4.178 38.342 6.594-3.527-5.715-35.7zm19.792 51.75l-5.09 27.29 3.32-1.776 2.655 8.875zM9.495-.007l.827 21.373-7.028 42.308-3.306-34.155zm2.068 27.323L26.24 59.707l3.307 26-6.2 36.58L9.91 85.046l-.827-38.342zM84.103-.01l-.826 21.375 7.03 42.308 3.306-34.155zm-2.066 27.325L67.36 59.707l-3.308 26 6.2 36.58 13.436-37.24.827-38.34z"></path></svg>
                                                <svg data-position="hands" class="hands" xmlns="http://www.w3.org/2000/svg" width="68" height="15.938" viewBox="0 0 205 38.938"><path d="M21.255-.002l2.88 6.9 8.412 1.335.664 12.458-4.427 17.8-2.878-.22 2.8-11.847-2.99-.084-4.676 12.6-3.544-.446 4.4-12.736-3.072-.584-5.978 13.543-4.428-.445 6.088-14.1-2.1-1.25-7.528 12.012-3.764-.445L12.4 12.9l-1.107-1.78L.665 15.57 0 13.124l8.635-7.786zm162.49 0l-2.88 6.9-8.412 1.335-.664 12.458 4.427 17.8 2.878-.22-2.8-11.847 2.99-.084 4.676 12.6 3.544-.446-4.4-12.736 3.072-.584 5.978 13.543 4.428-.445-6.088-14.1 2.1-1.25 7.528 12.012 3.764-.445L192.6 12.9l1.107-1.78 10.628 4.45.665-2.447-8.635-7.786z"></path></svg>
                                            </div> -->
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <button id="submit" type="submit" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;" data-toggle="modal" data-target="#modalForm">Submit</button>
                </div>
            </div>

            </form>
        </div>
    </div>



</div>

<!-- CSS for Human Body and Additional Styling -->
<style>
    .form-section{
        /* margin:20px; */
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

    hr.new3 {
  border-top: 3px dotted red;
}

</style>


<script>
    $(document).ready(function() {
        // Function to toggle form visibility
        function toggleForm(formId) {
            const form = $(formId);

            // Toggle visibility
            form.toggle();
        }

        

        // Button click handlers to show corresponding forms
        $('#btn-complaint').click(function() {
            toggleForm('#form-complaint');
        });

        $('#btn-problem').click(function() {
            toggleForm('#form-problem');
        });

        $('#btn-exam').click(function() {
            toggleForm('#form-exam');
        });

        $('#btn-allergy').click(function() {
            toggleForm('#form-allergy');
        });

        $('#btn-medical-history').click(function() {
            toggleForm('#form-medical-history');
        });

        $('#btn-family-history').click(function() {
            toggleForm('#form-family-history');
        });

        $('#btn-social').click(function() {
            toggleForm('#form-social');
        });

        $('#btn-medication').click(function() {
            toggleForm('#form-medication');
        });

        $('#btn-product').click(function() {
            toggleForm('#form-product');
        });

        $('#btn-comment').click(function() {
            toggleForm('#form-comment');
        });
        $('#btn-diagram').click(function() {
            toggleForm('#form-diagram');
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

<script>
    function setTypePresenting(value) {
        // Set the value of the hidden input
        document.getElementById('presenting').value = value;
    }

    function setTypeProblem(value) {
        // Set the value of the hidden input
        document.getElementById('problem').value = value;
    }

    function setTypeExamination(value) {
        // Set the value of the hidden input
        document.getElementById('examination').value = value;
    }
    function setTypeAllergy(value) {
        // Set the value of the hidden input
        document.getElementById('allergy').value = value;
    }
    function setTypeMedical(value) {
        // Set the value of the hidden input
        document.getElementById('medical').value = value;
    }
    function setTypeFamily(value) {
        // Set the value of the hidden input
        document.getElementById('family').value = value;
    }
    function setTypeSocial(value) {
        // Set the value of the hidden input
        document.getElementById('social').value = value;
    }
    function setTypeMedication(value) {
        // Set the value of the hidden input
        document.getElementById('medication').value = value;
    }
    function setTypeProduct(value) {
        // Set the value of the hidden input
        document.getElementById('product').value = value;
    }
    function setTypeComment(value) {
        // Set the value of the hidden input
        document.getElementById('comments').value = value;
    }
    function setTypeDiagram(value) {
        // Set the value of the hidden input
        document.getElementById('diagram').value = value;
    }
</script>


<script>
function selectDiagram(diagramName) {
    // Assuming you want to post the selected diagram name to the server

    // alert(diagramName);
    // var diagramvalue = val('#question');
    // document.getElementById('question').value = diagramName;
    document.getElementById('selected_diagram').value = diagramName;

    $.ajax({
        type: "POST",
        url: "your_server_url_here",
        data: { diagram: diagramName },
        success: function(response) {
            // Handle response from the server
            console.log("Response from server:", response);
            // You can update the UI or do something else with the response here
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error("Error:", error);
        }
    });
}
</script>


<script>
    $('#question').on('change', function() {
//   $('#custome_question').css('display', 'none');
//   if ( $(this).val() === 'Custome Question' ) {
//     $('#custome_question').css('display', 'block');
//   }

  $('#diagram_structure').css('display', 'none');
  if ( $(this).val() === 'Diagram' ) {
    $('#diagram_structure').css('display', 'block');
  }

//   $('#examination').css('display', 'none');
//   if ( $(this).val() === 'Examination' ) {
//     $('#examination').css('display', 'block');
//   }
  
});

</script>

<script>

    $('#addQuestion').on('click', '.btn-danger', function() {
        $(this).closest('div').remove(); 
        var valueToRemove = $(this).siblings('input').val(); 
        $('#select_question').find('input[value="' + valueToRemove + '"]').remove();
    });


    $('#myForm').on('submit', function(event) {
        event.preventDefault();
        var selectQuestion = $('select#question').find(':selected').val();

        $("#addQuestion").append('<div style="padding-top: 15px;"><i class="fa fa-bars"></i> ' + selectQuestion + ' <button type="button" class="btn btn-danger" style="float: right;">Delete</button></div>');
        
        $("#select_question").append('<input type="hidden" name="question[]" value="' + selectQuestion + '">');

        $("#select_question").append('<img width="150px" src="' + selectQuestion + '" alt="Selected Question Image">');
    });

    // If you want to handle the change event of the dropdown to add data
    $('select#question').on('submit', function() {
        var selectQuestion = $(this).find(':selected').val();
        
        // Append new data to the existing content
        $("#addQuestion").append('<div style="padding-top: 15px;"><i class="fa fa-bars"></i> ' + selectQuestion + ' <button type="button" class="btn btn-danger" style="float: right;">Delete</button></div>');
        
        // Add a hidden input field with the selected value
        $("#select_question").append('<input type="text" name="question[]" value="' + selectQuestion + '">');
    });
</script>







