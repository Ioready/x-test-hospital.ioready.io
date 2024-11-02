<!-- Page content -->
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

.lettersform:hover {
  background-color: #def1f3;
}

.nav-link{
    color: black!important;
    font-weight: 900!important;
}
.nav-pills .nav-link.active{
    background-color:white!important;
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

.lettersform:hover {
  background-color: #def1f3;
}

.nav-link{
    color: black!important;
    font-weight: 900!important;
}
.nav-pills .nav-link.active{
    background-color:white!important;
}
.save-preview{
    background-color: cadetblue!important;
}
</style>
<div id="page-content">
<div class="block_list full">
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
        <a href="<?php echo base_url().'index.php/Medications?id=' . encoding($patient_id);?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
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
                <a href="<?php echo base_url(). 'labs?id=' . encoding($patient_id);?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
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
                <!-- <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/accountStatement?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                    <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Account statements</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div> -->
                
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

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="=" crossorigin="anonymous" /> -->
      
    </div>


    <!-- Datatables Content -->
    <div class="block full">

        <!-- <div class="block-title ">

                <a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($patient_id); ?>"  style="color: black;padding: 9px;font-weight: 900;background-color: ghostwhite;"> Back to Letters</a>
           

               <a href="<?php echo base_url().'index.php/lettersAndForm/viewImagingRequestForm?id=' . encoding($patient_id) . '&form_id=' . encoding($folder->id); ?>" class="link"><button for="" type="button" class="btn btn-success save-preview"><b> Save and preview</b></button></a>
                   
                  <button type="button" class="btn btn-success save-preview"><b> Save as draft</b></button>
        
        </div> -->

        <div class="block-title ">
            <a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($patient_id); ?>"  style="color: black;padding: 9px;font-weight: 900;background-color: ghostwhite;"> Back to Letters</a>

            <a href="<?php echo base_url().'index.php/lettersAndForm/viewImagingRequestForm?id=' . encoding($patient_id) . '&form_id=' . encoding($folder->id); ?>" class="link"><button for="" type="button" class="btn btn-success save-preview"><b> Save and preview</b></button></a>
            <button type="button" class="btn btn-success save-preview"><b> Save as draft</b></button>
        </div>


        <div class="">
            
            <?php if ($this->ion_auth->is_facilityManager()) { ?>
                <div class="row">
                <div class="col-sm-8 col-md-8">
                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                <h3><strong> Imaging Request Form</strong></h3>
                    <!-- <a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-secondary save-btn nav-tab-appointment tab-pane-second active" id="letters_id" style="background-color:#337ab7;">
                        <?php //echo "New letter"; ?> 
                    </a> -->


                    <!-- <button type="button" data-toggle="modal" data-target="#sidebar-right" class="btn btn-primary navbar-btn pull-left btn btn-sm btn-secondary save-btn tab-pane-second" id="forms_id" style="display:none; background-color:#337ab7;">New forms</button> -->
            </div>
                    <!-- <div class="col-sm-4 col-md-4"> -->
                    <!-- <button style="background-color: white;border-radius: 6px;padding-left: 22px;padding-right: 22px;">All</button>
                    <button style="background-color: white;border-radius: 6px;padding-left: 12px;padding-right: 12px;">Created Date</button>
                    <button style="background-color: white;border-radius: 6px;padding-left: 12px;padding-right: 12px;">
                    <span>
                    <i class="fa fa-light fa-border-all"></i></span>
                    </button>
                    </div>
                    </div> -->
            <?php } ?>
        </div>
<br><br>

<div class="">

    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrlData) ?>" enctype="multipart/form-data">

        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <p><span class="bmi">BMI</span> Healthcare</p>
                <h1>Imaging Request</h1>
                <span class="header-11">X-Ray/US/CT/MRI/Nuclear Medicine/PET-CT</span>
            </div>
            <div class="header-right">
                <span class="spanbold">The Alexandra Hospital</span>
                <p>Mill Lane Cheadle Cheshire SK8 2PX</p>
                <p><span class="spanbold">Imaging: </span>0161 495 6981 Option 2</p>
                <p><span class="spanbold">Fax</span> 0161 495 6891</p>
                <p><span class="spanbold">MRI</span> 0161 495 6981 Option 2</p>
                <p><span class="spanbold">Fax</span> 0161 495 6891</p>
                <p><span class="spanbold">Email:</span> imagingdirect_alx@bmihealthcare.co.uk</p>
            </div>
        </div>

        <div>
            <!-- Form Header -->
            <div class="form-header">
                <p>The Ionising Radiation (Medical Exposure) Regulations 2000 (IRMER) require you to complete all this information accurately, incomplete/illegible forms may be returned</p>
            </div>
    
            <!-- Main Content -->
            <div class="row">
                <!-- Left Section (Patient Information) -->
                <div class="left-section">
                    <h2>Patient Information</h2>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id" id="patient_id">
                        <input type="text" name="surname" id="surname" required>
                    </div>
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" name="first_name" id="first_name" required>
                    </div>
                    <div class="form-group">
                        <label>DoB</label>
                        <input type="date" name="dob" id="dob" required>
                    </div>
                    <div class="form-group radio-group">
                        <label>Male</label>
                        <input type="radio" name="gender" id="gender" value="male">
                        <label>Female</label>
                        <input type="radio" name="gender" id="gender" value="female">
                    </div>
                    <div class="form-group">
                        <label>Hospital number</label>
                        <input type="text" name="hospital_number" id="hospital_number" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="address">
                    </div>
                    <div class="form-group">
                        <label>Post Code</label>
                        <input type="text" name="post_code" id="post_code">
                    </div>
                    <div class="form-group">
                        <label>Tel home</label>
                        <input type="tel" name="tel_home" id="tel_home">
                    </div>
                    <div class="form-group">
                        <label>Tel mobile</label>
                        <input type="tel" name="tel_mobile" id="tel_mobile">
                    </div>
                </div>
    
                <!-- Right Section (Appointment and Female Patients) -->
                <div class="right-section">
                    <!-- Appointment Box -->
                    <div class="box">
                        <h2>Appointment</h2>
                        <div class="form-group">
                            <label>Date and Time</label>
                            <input type="datetime-local" class="form-control" name="date_time" id="date_time">
                        </div>
                        <div class="form-group">
                            <label>OP</label>
                            <input type="checkbox" name="op" id="op" value="op">
                            <label>IP</label>
                            <input type="checkbox" name="ip" id="ip" value="ip">
                            <label>Room No</label>
                            <input type="checkbox" name="room_no" id="room_no" value="room_id">
                        </div>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="oxygen" id="oxygen" value="oxygen">Oxygen</label>
                            <label><input type="checkbox" name="disability" id="disability" value="disability">Disability</label>
                        </div>
                    </div>
    
                    <!-- Female Patients Box -->
                    <div class="box">
                        <h2>To be completed for female patients</h2>
                        <div class="form-group radio-group">
                            <label>Do you think you may be pregnant?</label>
                            <label><input type="radio" name="pregnant" id="pregnant" value="yes"> Yes</label>
                            <label><input type="radio" name="pregnant" id="pregnant" value="no"> No</label>
                        </div>
                        <div class="form-group">
                            <label>If Yes:</label>
                            <label><input type="radio" name="xray" id="xray" value="X-ray now"> X-ray now</label>
                            <label><input type="radio" name="wait" id="wait" value="Wait for next LMP"> Wait for next LMP</label>
                        </div>
                        <div class="form-group">
                            <label>1st day of LMP (date)</label>
                            <input type="date" name="first_day_of_lmp" id="first_day_of_lmp">
                        </div>
                        <div class="form-group radio-group">
                            <label>Are you breastfeeding?</label>
                            <label><input type="radio" name="breastfeeding" id="breastfeeding" value="yes"> Yes</label>
                            <label><input type="radio" name="breastfeeding" id="breastfeeding" value="no"> No</label>
                        </div>
                        <div class="form-group">
                            <label>Signature</label>
                            <input type="text" id="signature" name="signature">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" id="date">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- second hafl -->

        <div class="full-width-section1">
            <div class="para1">
                <div class="form-group inline1">
                    <label>Examination requested:</label>
                </div>
                <div class="form-group inline1">
                    <label>Pref. Radiologist:</label>
                </div>
            </div>
          
            <p class="para1"><span class="head1">Clinical Information :-</span> Please include questions to be answered. Include all relevant laboratory results, medications, surgery, and previous examinations.</p>
        </div>

        <!-- Referrer's Declaration and Name -->
        <div class="row1">
            <div class="half-width-section1">
                <h3>Referrer's declaration (NB: This form is a legal document)</h3>
                <ul class="list-items1">
                    <li>The correct patient details have been given</li>
                    <li>I have discussed the examination with the patient/guardian</li>
                    <li>I have taken into account the possibility of pregnancy</li>
                    <li>I have given sufficient clinical information for the request to be justified according to IR(ME)R 2000</li>
                    <li>I will ensure that the examination results are recorded in the patient's notes</li>
                    <li>There are no known contra-indications to performing the requested examination/treatment</li>
                </ul>
            </div>
            <div class="half-width-section1">
                <h3>Referrer's name and address (or stamp)</h3>
                <div class="form-group inline1">
                    <label>Signature:</label>
                    <input type="text" id="referrer_signature" name="referrer_signature">
                </div>
                <div class="form-group inline1">
                    <label>Date:</label>
                    <input type="date" id="referrer_date" name="referrer_date">
                </div>
                <div class="form-group inline1">
                    <label>Name/Address:</label>
                    <input type="text" id="referrer_name_address" name="referrer_name_address">
                </div>
            </div>
        </div>

        <!-- Medication and MRI Information -->
        <div class="row1">
            <div class="half-width-section1">
                <h3>Medication Required (Referring Consultant to complete)</h3>
                <div class="form-group1">
                    <label>Allergies:</label>
                    <input type="text" id="medication_required_allergies" name="medication_required_allergies">
                </div>
                <div class="form-group1">
                    <label>Medication:</label>
                    <input type="text" id="medication_required_medication" name="medication_required_medication">
                </div>
                <div class="form-group1">
                    <label>Dose:</label>
                    <input type="text" id="medication_required_dose" name="medication_required_dose">
                </div>
                <div class="form-group1">
                    <label>Date:</label>
                    <input type="date" id="medication_required_date" name="medication_required_date">
                </div>
                <div class="form-group inline1">
                    <label>Signature:</label>
                    <input type="text" id="medication_required_signature" name="medication_required_signature">
                </div>
                <div class="form-group inline1">
                    <label>GMC No:</label>
                    <input type="text" id="medication_required_gmc_no" name="medication_required_gmc_no">
                </div>
            </div>
            <div class="half-width-section1">
                <h3>Additional information for MRI patients</h3>
                <div class="mri-info1">
                    <label>Does the patient have a cardiac pacemaker?</label>
                    <input type="radio" name="mri_patients_cardiac_pacemaker" id="mri_patients_cardiac_pacemaker" value="yes"> Yes
                    <input type="radio" name="mri_patients_cardiac_pacemaker" id="mri_patients_cardiac_pacemaker" value="no"> No
                </div>
                <div class="mri-info1">
                    <label>Does the patient have heart valve replacements?</label>
                    <input type="radio" name="mri_patients_heart_valve" id="mri_patients_heart_valve" value="yes"> Yes
                    <input type="radio" name="mri_patients_heart_valve" id="mri_patients_heart_valve" value="no"> No
                </div>
                <div class="mri-info1">
                    <label>Has the patient any metal fragments in their eyes?</label>
                    <input type="radio" name="mri_patients_metal_fragments" id="mri_patients_metal_fragments" value="yes"> Yes
                    <input type="radio" name="mri_patients_metal_fragments" id="mri_patients_metal_fragments" value="no"> No
                </div>
                <div class="mri-info1">
                    <label>Has the patient had any cranial surgery?</label>
                    <input type="radio" name="mri_patients_cranial_surgery" id="mri_patients_cranial_surgery" value="yes"> Yes
                    <input type="radio" name="mri_patients_cranial_surgery" id="mri_patients_cranial_surgery" value="no"> No
                </div>
                <div class="mri-info1">
                    <label>Does the patient have any metal in their body?</label>
                    <input type="radio" name="mri_patients_metal_body" id="mri_patients_metal_body" value="yes"> Yes
                    <input type="radio" name="mri_patients_metal_body" id="mri_patients_metal_body" value="no"> No
                </div>
                <div class="form-group1">
                    <label>Is the patient on any anti-coagulant?</label>
                    <input type="text" name="mri_patients_anti_coagulant" id="mri_patients_anti_coagulant">
                </div>
                <div class="form-group1">
                    <label>If so state value or provide eGFR:</label>
                    <input type="text" name="mri_patients_provide_egfr" id="mri_patients_provide_egfr">
                </div>
            </div>
        </div>
        <div class="war1">
            <p>This Form Has Been Returned Because</p>
        </div>

        <!-- third half -->

        <div class="form-container2">
            <!-- First Section -->
            <div class="form-section2">
                <div class="form-header2">For completion by Imaging Department staff</div>
                <textarea class="form-control input-text" rows="4" col="10" placeholder="Enter protocol" name="imaging_department_staff" id="imaging_department_staff"></textarea>
            </div>
    
            <!-- Second Section -->
            <div class="form-section2">
                <div class="form-header2">Person making exposure has checked the patient's ID</div>
                <table class="form-table">
                    <tr>
                        <th class="form-radio">YES <input type="radio" name="returned_check_id" id="returned_check_id" value="yes"></th>
                        <th class="form-radio">NO <input type="radio" name="returned_check_id" id="returned_check_id" value="no"></th>
                    </tr>
                </table>
            </div>
    
            <!-- Third Section -->
            <div class="form-section2">
                <div class="form-header2">Operator Use</div>
                <table class="form-table2">
                    <tr>
                        <td>Patient's height:</td>
                        <td><input type="text" class="input-text" placeholder="Enter height" name="operator_use_patient_height" id="operator_use_patient_height"></td>
                        <td>Patient's weight:</td>
                        <td><input type="text" class="input-text" placeholder="Enter weight" name="operator_use_patient_weight" id="operator_use_patient_weight"></td>
                    </tr>
                    <tr>
                        <td>kV:</td>
                        <td><input type="text" class="input-text" placeholder="Enter kV" name="operator_use_kv" id="operator_use_kv"></td>
                        <td>mAs:</td>
                        <td><input type="text" class="input-text" placeholder="Enter mAs" name="operator_use_mas" id="operator_use_mas"></td>
                    </tr>
                    <tr>
                        <td>Operator's name & signature:</td>
                        <td><input type="text" class="input-text" name="pperators_name_signature" id="pperators_name_signature" placeholder="Enter name/signature"></td>
                        <td>Number of exposures/films:</td>
                        <td><input type="text" class="input-text" name="operators_number_of_exposures_films" id="operators_number_of_exposures_films" placeholder="Enter exposures"></td>
                    </tr>
                    <tr>
                        <td>Dose (cGycm²):</td>
                        <td><input type="text" class="input-text" placeholder="Enter dose" name="operators_dose_cgycm" id="operators_dose_cgycm" ></td>
                        <td>Fluoro Time:</td>
                        <td><input type="text" class="input-text" placeholder="Enter time" name="operators_fluoro_time" id="operators_fluoro_time" ></td>
                    </tr>
                    <tr>
                        <td>Examination justified by: name & signature:</td>
                        <td><input type="text" class="input-text" placeholder="Enter name/signature" name="operators_examination_justified_name_signature" id="operators_examination_justified_name_signature"></td>
                        
                    </tr>
                </table>
            </div>
    
            <!-- Patient Holding Record Section -->
            <div class="form-section2">
                <div class="form-header2">Patient holding record</div>
                <div class="disclaimer2">
                    I understand that by accompanying this patient for their X-ray examination I will receive a small radiation dose not greater than approximately 2 weeks of natural background radiation. The radiographer will supply a protective lead apron.
                </div>
                <div>Female comforters and carers only – I declare that I am not pregnant</div>
                <table class="form-table2">
                    <tr>
                        <th>Yes <input type="radio" name="patient_holding_record_pregnancy" id="patient_holding_record_pregnancy" value="yes"></th>
                        <th>No <input type="radio" name="patient_holding_record_pregnancy" id="patient_holding_record_pregnancy" value="no"></th>
                    </tr>
                </table>
                <table class="form-table2">
                    <tr>
                        <th>Comforter/Carer</th>
                        <th>Signature</th>
                        <th>FFD</th>
                        <th>Patient to carer distance</th>
                        <th>Patient Dose</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="input-text" name="patient_holding_record_comforter_carer" id="patient_holding_record_comforter_carer"></td>
                        <td><input type="text" class="input-text" name="patient_holding_record_signature" id="patient_holding_record_signature"></td>
                        <td><input type="text" class="input-text" name="patient_holding_record_ffd" id="patient_holding_record_ffd"></td>
                        <td><input type="text" class="input-text" name="patient_holding_record_patient_carer_distance" id="patient_holding_record_patient_carer_distance"></td>
                        <td><input type="text" class="input-text" name="patient_holding_record_patient_dose" id="patient_holding_record_patient_dose"></td>
                    </tr>
                    <!-- <tr>
                        <td><input type="text" class="input-text"></td>
                        <td><input type="text" class="input-text"></td>
                        <td><input type="text" class="input-text"></td>
                        <td><input type="text" class="input-text"></td>
                        <td><input type="text" class="input-text"></td>
                    </tr> -->
                </table>
            </div>
    
    
            <div class="section-title2">Drugs administered</div>
            <table>
                <thead>
                    <tr>
                        <th>Drugs administered</th>
                        <th>Drug route</th>
                        <th>Volume/Dose</th>
                        <th>Exp. Date</th>
                        <th>Lot no</th>
                        <th>Injected by</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
    
            <!-- Checkbox Section -->
            <div class="section-title2">Checklist</div>
            <div class="checkbox-section2">
                <div class="checkbox-item2">
                    <input type="checkbox" id="checklist_patient_id_check" name="checklist_patient_id_check">
                    <label for="id-check">Patient ID Check</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="checklist_exam_justification" name="checklist_exam_justification">
                    <label for="exam-justification">Exam Justification</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="checklist_previous_exams" name="checklist_previous_exams">
                    <label for="previous-exams">Previous Exams</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="checklist_risk_explained" name="checklist_risk_explained">
                    <label for="risk-explained">Radiation/Risk Explained</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="checklist_within_limits" name="checklist_within_limits">
                    <label for="within-limits">Within DRL Limits</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="checklist_report_flagged" name="checklist_report_flagged">
                    <label for="report-flagged">Urgent Report Flagged</label>
                </div>
            </div>
    
            <!-- Notes Section -->
            <div class="section-title2">Notes:</div>
            <textarea class="notes-area2" name="notes" id="notes"></textarea>
    
            <!-- Patient Charges Section -->
            <div class="section-title2">Patient charges</div>
            <table>
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Code</th>
                        <th>Units</th>
                        <th>Radiologist</th>
                        <th>Changes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
    
            <!-- Operator Comments Section -->
            <div class="section-title2">Operator Comments</div>
            <textarea class="comments-area2" name="operator_comments" id="operator_comments"></textarea>
        </div>

        <div class="text-center">
                <button type="submit" type="submit" class="btn" style="background-color: #2e8cdd; color:white;">Book Now</button>
        </div>
    </form>

</div>



<style>
    .toggled-on .toggle-title {
        cursor: pointer;
        background-color: #e7f2f3;
        /* height: 44px; */
        padding: 7px;
        border-radius: 4px;
}

    .toggled-on .toggle-content {

    display: block;
    margin-top: 7px;
    border-radius: 10px;
    padding-left: 20px
    /* height: 30px; */
}

.toggle-content {
    /* box-shadow: inset 0px 0px 10px #0c0b41;  */
}

.toggle-content p {
    margin: 15px 0 15px 0;
     background-color: aliceblue;
     padding: 5px;
}

.toggled-on .fa-angle-down {
    display: none; 
}

.toggle-content-a {
    
     color: #1bbae1 !important;
}



/* .toggle-title {
   
  cursor: pointer;
    position: relative;
    background-color: #c3e0e3;
    height: 44px;
    padding: 7px;
} */

.toggle-title i {
    position: absolute;
    left: 0;
    font-size: 2.5em; 
}

.toggled-off .toggle-content {
    display: none; 
}

.toggled-off .fa-angle-up {
    display: none; 
}
</style>
<script>
    $(document).ready(function() {
  $('#patient_ids').click(function() {
   var patientsdata = $('#patient_id').val();
  
  $('#patient_id_data').val(patientsdata);

  });
});
</script>

<script>
    $(document).ready(function() {
        $(".nav-tabss .nav-link").click(function() {
            $(".nav-tabss .nav-link").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane-second").hide();
            var targetPaneId = $(this).attr("href");
            $(targetPaneId).show();
        });

        $(".nav-tab-appointment .nav-link-second").click(function() {
            $(".nav-tab-appointment .nav-link-second").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane-second").hide();

            var targetPaneId = $(this).data("target");
            $(targetPaneId).show();
        });
    });
    function toggleHidden() {
    var element = document.getElementById("elementToToggle");
    element.classList.add("hidden");
  }
    function toggleDisplay() {
    var element = document.getElementById("elementToToggle");
    element.classList.remove("hidden");
    document.getElementById("autoClickButton").click();
    document.getElementById("autoClickButton").focus();
  }
  window.onload = function() {
    document.getElementById("autoClickButton").click();
    document.getElementById("autoClickButton").focus();
  };
    
</script>

<style>
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
    width: 316px;
    border: 1px solid;
    border-radius: inherit;
}
.nav-tab-appointment{
    margin-bottom: 0;
    list-style: none;
    border-radius: inherit;
    background-color:white;

}
.nav-tab-appointment.active-link{
    margin-bottom: 0;
    list-style: none;
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


</style>


<style>
       .dots {
    display: inline-block;
    cursor: pointer;
}

.dots div {
    width: 5px;
    height: 5px;
    margin: 2px;
    background-color: black;
    border-radius: 50%;
    display: inline-block;
}

.menu {
    display: none;
    position: absolute;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 10px 0;
}

.menu ul li {
    padding: 8px 20px;
}

.menu ul li a {
    text-decoration: none;
    color: black;
}

.menu ul li a:hover {
    background-color: #f1f1f1;
}

    </style>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    var dotsMenus = document.querySelectorAll('[id^="dotsMenu"]');

    dotsMenus.forEach(function(dotsMenu) {
        dotsMenu.addEventListener("click", function(event) {
            event.stopPropagation();
            var id = this.id.replace('dotsMenu', '');
            var menu = document.getElementById('menuDropdown' + id);

            // Close all other menus
            document.querySelectorAll('.menu').forEach(function(otherMenu) {
                if (otherMenu !== menu) {
                    otherMenu.style.display = 'none';
                }
            });

            // Toggle the current menu
            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener("click", function(event) {
        document.querySelectorAll('.menu').forEach(function(menu) {
            menu.style.display = 'none';
        });
    });
});

</script>


<script>
    $ (document).ready (function () {
	$ (".modal a").not (".dropdown-toggle").on ("click", function () {
		$ (".modal").modal ("hide");
	});
});
</script>

<style>
        /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        } */

        .container {
            max-width: 1200px;
            margin: 0 auto;
            /* border: 2px solid black; */
            padding: 20px;
            border-radius: 10px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header-left p {
            font-size: 20px;
            font-weight: bold;
        }

        .header-11{
            margin-top: 40px;
        }

        .header-right {
            text-align: right;
            font-size: 12px;
        }
        
        .spanbold{
            font-weight: bold;
        }

        .bmi{
            background-color: black;
            color: white;
            padding: 5px;
            font-style: italic;
        }

        .form-header {
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .left-section,
        .right-section {
            flex: 1;
            min-width: 300px;
        }

        .left-section {
            border: 1px solid black;
            padding: 20px;
            border-radius: 15px;
        }

        .right-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .right-section .box {
            border: 1px solid black;
            padding: 24px;
            border-radius: 15px;
        }

        h1, h2 {
            margin: 0;
        }

        h1 {
            font-size: 24px;
        }

        h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .radio-group label,
        .checkbox-group label {
            font-weight: normal;
            margin-right: 15px;
        }

        .radio-group input[type="radio"],
        .checkbox-group input[type="checkbox"] {
            margin-right: 5px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .textarea {
            width: 100%;
            height: 80px;
        }

        .signature-area {
            height: 50px;
            width: 100%;
            border-bottom: 1px solid black;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-right {
                margin-top: 10px;
                text-align: left;
            }

            .row {
                flex-direction: column;
            }

            .left-section,
            .right-section {
                width: 100%;
                min-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .header-left {
                font-size: 18px;
            }

            .header-right {
                font-size: 12px;
            }

            .form-header {
                font-size: 12px;
            }

            h1 {
                font-size: 20px;
            }

            h2 {
                font-size: 14px;
            }

            input[type="text"],
            input[type="date"],
            input[type="tel"] {
                padding: 8px;
                font-size: 14px;
            }

            .radio-group label,
            .checkbox-group label {
                margin-right: 10px;
            }
        }

        /* second half */

        .form-header1 {
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }

        .row1 {
            display: flex;
            justify-content: space-between;
        }

        .left-section1, .right-section1, .full-width-section1 {
            border: 1px solid black;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 10px;
            font-size: 16px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .form-group1 {
            margin-bottom: 10px;
        }

        .radio-group1 label,
        .checkbox-group1 label {
            font-weight: normal;
            margin-right: 15px;
        }

        .radio-group1 input[type="radio"],
        .checkbox-group1 input[type="checkbox"] {
            margin-right: 5px;
        }

        .box1 {
            border: 1px solid black;
            padding: 15px;
            border-radius: 15px;
        }

        /* Full-width section for Examination and Referrer's Declaration */
        .full-width-section1 {
            width: 100%;
            margin-top: 15px;
        }

        .row1 {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            gap: 20px;
        }

        .half-width-section1 {
            width: 48%;
            padding: 24px;
            border: 1px solid black;
            border-radius: 15px;
        }

        .textarea1 {
            width: 100%;
            height: 80px;
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            resize: none;
        }

        .list-items1 {
            padding-left: 20px;
        }

        .list-items1 li {
            margin-bottom: 5px;
        }

        /* Additional styles for table-like layout */
        .form-group.inline1 {
            display: flex;
            justify-content: space-between;
        }

        .form-group.inline1 label {
            width: auto;
            margin-right: 10px;
        }

        .form-group.inline1 input {
            flex-grow: 1;
        }

        /* For MRI information */
        .mri-info1 {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .mri-info1 label {
            width: 80%;
        }

        .mri-info1 input {
            margin-right: 10px;
        }

        .para1{
            height: 80px;
        }

        .head1{
            font-weight: bold;
        }

        .para1{
            display: flex;
            justify-content: space-around;
        }

        /* Add vertical middle border */
        /* .row .half-width-section:not(:last-child) {
            border-right: 2px solid black;
        } */

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .row1 {
                flex-direction: column;
            }

            .half-width-section1 {
                width: 100%;
                padding: 10px;
            }

            .row1 .half-width-section1 {
                border-right: none;
                border-bottom: 2px solid black;
            }
        }

        @media (max-width: 480px) {
            .container1 {
                padding: 10px;
            }

            .para1 {
                height: auto;
            }

            input[type="text"], input[type="date"], input[type="tel"] {
                padding: 8px;
            }

            h3 {
                font-size: 14px;
            }

            label {
                font-size: 12px;
            }
        }
        .war1{
            border: 2px solid black;
            border-radius: 10px;
            padding: 5px;
        }

        /* third half */

        .form-container2 {
            width: 100%;
            margin: 0 auto;
            border: 1px solid #000;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
            margin-top: 15px;
        }
        .form-section2 {
            border: 1px solid #000;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-sizing: border-box;
        }
        .form-header2 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .form-table2 {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .form-table2 th, .form-table2 td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            box-sizing: border-box;
        }
        .form-table2 th {
            background-color: #f2f2f2;
        }
        .form-radio2, .form-checkbox2 {
            text-align: center;
        }
        .form-radio2 input, .form-checkbox2 input {
            margin-right: 5px;
        }
        .sign-row2 {
            text-align: center;
        }
        .sign-row2 td {
            text-align: center;
        }
        .input-text2 {
            width: 100%;
            padding: 8px;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        .disclaimer2 {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .form-table2 th, .form-table2 td {
                font-size: 14px;
                padding: 6px;
            }
            .form-section2 {
                padding: 10px;
            }
            .input-text2 {
                padding: 6px;
            }
        }
        @media (max-width: 480px) {
            .form-table2 th, .form-table2 td {
                font-size: 12px;
                padding: 4px;
            }
            .form-header2 {
                font-size: 14px;
            }
            .input-text2 {
                padding: 4px;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .section-title2 {
            background-color: #f0f0f0;
            font-weight: bold;
            padding: 5px;
            text-align: center;
            border: 1px solid black;
        }

        .notes-area2 {
            width: 100%;
            height: 80px;
            border: 1px solid black;
            margin-top: 10px;
            padding: 5px;
        }

        .checkbox-section2 {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .checkbox-section2 input {
            margin-right: 10px;
        }

        .checkbox-item2 {
            display: flex;
            align-items: center;
        }

        .comments-area2 {
            width: 100%;
            height: 50px;
            border: 1px solid black;
            padding: 5px;
        }
    </style>