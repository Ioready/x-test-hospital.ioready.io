<!-- Page content -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<style>
 * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f4f4f4;
    border-bottom: 2px solid #ccc;
}

.left-section {
    width: 50%;
}

h1 {
    font-size: 24px;
    color: #3b73cf;
}

.admission-types {
    background-color: #d3d3d3;
    padding: 10px;
    margin-top: 10px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.checkbox-group {
    display: flex;
    align-items: center;
    gap: 10px;
}

.right-section {
    width: 45%;
    text-align: right;
}

.logo h2 {
    color: #3b73cf;
    font-size: 18px;
}

.contact-info p {
    font-size: 14px;
    color: #333;
}

.completed-section {
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    border-top: 1px solid #ccc;
    margin-top: 10px;
}

.completed-section p {
    font-size: 14px;
}

/* Patient Information Section */
.patient-info {
    margin: 20px;
}

.patient-info h2 {
    color: #3b73cf;
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

.patient-table {
    width: 100%;
    border-collapse: collapse;
}

.patient-table td {
    padding: 10px;
    border: 1px solid #ccc;
}

.patient-table input[type="text"],
.patient-table input[type="email"],
.patient-table textarea {
    width: 100%;
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.patient-table input[type="checkbox"],
.patient-table input[type="radio"] {
    margin-left: 5px;
}

/* Admission Information Styles */
.admission-info {
    margin: 20px;
}

.admission-info h2 {
    color: #3b73cf;
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

.admission-table {
    width: 100%;
    border-collapse: collapse;
}

.admission-table td {
    padding: 10px;
    border: 1px solid #ccc;
}

.admission-table input[type="text"],
.admission-table input[type="email"],
.admission-table input[type="date"],
.admission-table input[type="time"],
.admission-table textarea {
    width: 100%;
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.admission-table input[type="checkbox"] {
    margin-left: 5px;
}

.admission-table textarea {
    height: 60px;
    resize: vertical;
}

/* Financial Information Styles */
.financial-info {
    margin: 20px;
}

.financial-info h2 {
    color: #3b73cf;
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

.financial-table {
    width: 100%;
    border-collapse: collapse;
}

.financial-table td {
    padding: 10px;
    border: 1px solid #ccc;
}

.financial-table input[type="text"] {
    width: 100%;
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.financial-table input[type="checkbox"] {
    margin-left: 5px;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
    }

    .admission-info, .financial-info {
        width: 100%;
    }
}

  /* Additional styling for PDF generation */
  @media print {
            body {
                width: 100%;
            }
           
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="=" crossorigin="anonymous" />
      
    </div>

            <!-- </div> -->

    <!-- Datatables Content -->

    
    <div class="block full">

<div class="block-title ">

        <a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($patient_id); ?>"  style="color: black;padding: 9px;font-weight: 900;background-color: ghostwhite;"> Back to Form
        </a>
        
        <!-- <button onclick="generatePDF()" class="btn btn-outline-success" style="margin-left: 65%;"> <i class="fa fa-edit"></i> Edit</button> -->
        <button onclick="generatePDF()" class="btn btn-outline-success" style="margin-left: 80%;"> <i class="fa fa-download"></i> Download</button>

</div>


<div class="">
    
    <?php if ($this->ion_auth->is_facilityManager()) { ?>
        <div class="row">
        <div class="col-sm-8 col-md-8">
        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
        <!-- <h3><strong> Booking Form</strong></h3> -->
            <!-- <button type="button" data-toggle="modal" data-target="#sidebar-right" class="btn btn-primary navbar-btn pull-left btn btn-sm btn-secondary save-btn tab-pane-second" id="forms_id" style="display:none; background-color:#337ab7;">New forms</button> -->
    </div>
            
    <?php } ?>
</div>

<div class="mt-5" id="content">
        
<div class="show-grid border border-light">
  
  <div class="row">
    <div class="col-sm-10"><label for="">Page:</label><select name="" id=""><option value="1">1</option></select> <label for="">Of 2</label></div>
    <div class="col-sm-2"><label for="">Zoom</label> <button type="button" class="btn btn-success" style="background-color: darkcyan;">+</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" style="background-color: darkcyan;">-</button></div>
  </div>
  
</div>
  <!-- Button to generate PDF -->
  <!-- <button onclick="generatePDF()"> <i class="fa fa-download"></i>Download</button> -->

<!-- Booking form content wrapped in a div for capturing -->


<div id="booking-form">
    <!-- Header Section -->
    <div class="header-container">
        <!-- Left Section: Booking Form Title and Checkboxes -->
        <div class="left-section">
            <h1>Booking Form</h1>
            <div class="admission-types">
                <div class="checkbox-group">
                    <label>Medical Admission</label>
                    <input type="checkbox" <?php echo $result->appointment_type =='Medical admission' ? 'checked':'';?>>
                </div>
                <div class="checkbox-group">
                    <label>Surgical Admission</label>
                    <input type="checkbox" <?php echo $result->appointment_type =='Surgical admission' ? 'checked':'';?>>
                </div>
                <div class="checkbox-group">
                    <label>Re-admission</label>
                    <input type="checkbox" <?php echo $result->appointment_type =='Re-admission' ? 'checked':'';?>>
                </div>
            </div>
        </div>

        <!-- Right Section: Contact Information -->
        <div class="right-section">
            <div class="logo">
                <h2>Circle Health Group</h2>
            </div>
            <div class="contact-info">
                <p>Tel: 0161 495 0747</p>
                <p>Email: bookings.alexandra@circlehealthgroup.co.uk</p>
                <p>For out of hours bookings, please ask for the Clinical on Site</p>
            </div>
        </div>
    </div>

    <!-- Completed by and Date Section -->
    <div class="completed-section">
        <table class="patient-table">
            <tr>
                <td>Completed by:</td>
                <td><input type="text" value="<?php echo $result->completed_by?>"></td>
                <td>Date:</td>
                <td><input type="text" placeholder="Enter date" value="<?php echo $result->completed_date?>"></td>
            </tr>
        </table>
    </div>

    <!-- Patient Information Section -->
    <div class="patient-info">
        <h2>Patient Information</h2>
        <table class="patient-table">
            <tr>
                <td>EMPI Number:</td>
                <td><input type="text" placeholder="Enter EMPI Number" value="<?php echo $result->empi_number?>"></td>
                <td>NHS Referral?</td>
                <td><input type="text" placeholder="Enter NHS Number" value="<?php echo $result->nhs_referral?>"></td>
            </tr>
            <tr>
                <td>Surname:</td>
                <td><input type="text" value="<?php echo $result->surname?>"></td>
                <td>NHS Number:</td>
                <td><input type="checkbox" <?php echo $result->nhs_number =='yes' ? 'checked':'';?>> Yes <input type="checkbox" <?php echo $result->nhs_number =='no' ? 'checked':'';?>> No</td>
    
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" value="<?php echo $result->first_name?>"></td>
                <td>Next of Kin Name:</td>
                <td><input type="text" placeholder="Enter Next of Kin" value="<?php echo $result->next_of_kin_name?>" ></td>
            </tr>
            <tr>
                <td>Other Names:</td>
                <td><input type="text" placeholder="Enter Other Names" value="<?php echo $result->first_name?>"></td>
                <td>Next of Kin Contact:</td>
                <td><input type="text" placeholder="Enter Next of Kin Contact" value="<?php echo $result->next_of_kin_contact?>"></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><input type="text" value="<?php echo $result->title?>"></td>
                <td>Interpreter Needed?</td>
                <td><input type="checkbox" <?php echo $result->interpreter_needed =='yes' ? 'checked':'';?>> Yes <input type="checkbox" <?php echo $result->interpreter_needed =='yes' ? 'checked':'';?>> No</td>
            </tr>
            <tr>
                <td>DOB:</td>
                <td><input type="text" value="<?php echo $result->dob?>"></td>
                <td>Language:</td>
                <td><input type="text" placeholder="Enter Language" value="<?php echo $result->interpreter_language?>"></td>
            </tr>
            <tr>
                <td>Ethnicity:</td>
                <td><input type="text" placeholder="Enter Ethnicity" value="<?php echo $result->ethnicity?>"></td>
                <td>Complex Needs?</td>
                <td><input type="checkbox" <?php echo $result->complex_needs =='yes' ? 'checked':'';?>> Yes <input type="checkbox" <?php echo $result->complex_needs =='yes' ? 'checked':'';?>> No</td>
            </tr>
            <tr>
                <td>Sex:</td>
                <td>
                    <input type="radio" name="sex" value="male" <?php echo $result->gender =='male' ? 'checked':'';?>> Male
                    <input type="radio" name="sex" value="female" <?php echo $result->gender =='female' ? 'checked':'';?>> Female
                    <input type="radio" name="sex" value="other" <?php echo $result->gender =='other' ? 'checked':'';?>> Other
                </td>
                <td>Details:</td>
                <td><input type="text" placeholder="Enter Details" value="<?php echo $result->details_of_complex_needs?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td colspan="3">
                    <input type="text" value="<?php echo $result->address?>">
                </td>
            </tr>
            <tr>
                <td>Contact Number:</td>
                <td colspan="3"><input type="text" value="<?php echo $result->contact?>"></td>
            </tr>
            <tr>
                <td>Contact E-mail:</td>
                <td colspan="3"><input type="email" placeholder="Enter Email" value="<?php echo $result->email?>"></td>
            </tr>
            <tr>
                <td>Co-Morbidities?</td>
                <td><input type="checkbox" <?php echo $result->co_morbidities =='yes' ? 'checked':'';?>> Yes <input type="checkbox" <?php echo $result->co_morbidities =='yes' ? 'checked':'';?>> No</td>
                <td>Details:</td>
                <td><input type="text" placeholder="Enter Details" value="<?php echo $result->details_of_co_morbidities?>"></td>
            </tr>
            <tr>
                <td>Dietary Requirements:</td>
                <td colspan="3"><input type="text" placeholder="Enter Dietary Requirements" value="<?php echo $result->dietary_requirements?>"></td>
            </tr>
        </table>
    </div>

    <!-- Admission Information Section -->
    <div class="admission-info">
        <h2>Admission Information</h2>
        <table class="admission-table">
            <tr>
                <td>Location:</td>
                <td>
                    <input type="checkbox" <?php echo $result->location =='Theatre' ? 'checked':'';?>> Theatre
                    <input type="checkbox" <?php echo $result->location =='Cath Lab' ? 'checked':'';?>> Cath Lab
                    <input type="checkbox" <?php echo $result->location =='MPU' ? 'checked':'';?>> MPU
                </td>
                <td>Admitting Consultant:</td>
                <td><input type="text" placeholder="Enter Consultant" value="<?php echo $result->admitting_consultant?>"></td>
            </tr>
            <tr>
                <td>Admission Date:</td>
                <td><input type="date" value="<?php echo $result->admission_date?>"></td>
                <td>Surgeon:</td>
                <td><input type="text" placeholder="Enter Surgeon" value="<?php echo $result->surgeon?>"></td>
            </tr>
            <tr>
                <td>Admission Time:</td>
                <td><input type="time" value="<?php echo $result->admission_time?>"></td>
                <td>Anaesthetist:</td>
                <td><input type="text" placeholder="Enter Anaesthetist" value="<?php echo $result->anaesthetist?>"></td>
            </tr>
            <tr>
                <td>Procedure Date:</td>
                <td><input type="date" value="<?php echo $result->procedure_date?>"></td>
                <td>Surgeon Assistant:</td>
                <td><input type="text" placeholder="Enter Surgeon Assistant" value="<?php echo $result->surgeon_assistant?>"></td>
            </tr>
            <tr>
                <td>Procedure Time:</td>
                <td><input type="time" value="<?php echo $result->procedure_time?>"></td>
                <td>Referring GP:</td>
                <td><input type="text" placeholder="Enter Referring GP" value="<?php echo $result->referring_gp;?>"></td>
            </tr>
            <tr>
                <td>Medical Diagnosis/Symptoms:</td>
                <td colspan="3"><textarea placeholder="Enter Medical Diagnosis/Symptoms"><?php echo $result->medical_diagnosis_symptoms?></textarea></td>
            </tr>
            <tr>
                <td>Procedure Description and Codes:</td>
                <td colspan="3"><textarea placeholder="Enter Procedure Details"><?php echo $result->procedure_description?></textarea></td>
            </tr>
            <tr>
                <td>Side of Surgery:</td>
                <td>
                    <input type="checkbox" <?php echo $result->side_of_surgery =='left' ? 'checked':'';?>> Left
                    <input type="checkbox" <?php echo $result->side_of_surgery =='right' ? 'checked':'';?>> Right
                    <input type="checkbox" <?php echo $result->side_of_surgery =='bilateral' ? 'checked':'';?>> Bilateral
                </td>
                <td>Image Intensifier Required?</td>
                <td><input type="checkbox" <?php echo $result->image_intensifier_required =='yes' ? 'checked':'';?>></td>
            </tr>
            <tr>
                <td>Type of Anaesthesia:</td>
                <td>
                    <input type="checkbox" <?php echo $result->type_of_anaesthesia =='General' ? 'checked':'';?>> General
                    <input type="checkbox" <?php echo $result->type_of_anaesthesia =='Local' ? 'checked':'';?>> Local
                    <input type="checkbox" <?php echo $result->type_of_anaesthesia =='Regional' ? 'checked':'';?>> Regional
                    <input type="checkbox" <?php echo $result->type_of_anaesthesia =='Sedation' ? 'checked':'';?>> Sedation
                </td>
                <td>Tests/Investigations Required:</td>
                <td><input type="checkbox" <?php echo $result->tests_investigations_required =='yes' ? 'checked':'';?>></td>
            </tr>
            <tr>
                <td>Length of Stay:</td>
                <td><input type="text" placeholder="Enter Length of Stay" value="<?php echo $result->length_of_stay?>"></td>
                <td>PCU Required?</td>
                <td><input type="checkbox" <?php echo $result->pcu_required =='yes' ? 'checked':'';?>> Yes <input type="checkbox" <?php echo $result->pcu_required =='no' ? 'checked':'';?>> No</td>
            </tr>
            <tr>
                <td>Special Requirements/Instrumentation for Theatres:</td>
                <td colspan="3"><textarea placeholder="Enter Requirements"><?php echo $result->special_requirements_instrumentation?></textarea></td>
            </tr>
            <tr>
                <td>Relevant Previous Medical History:</td>
                <td colspan="3"><textarea placeholder="Enter Medical History"><?php echo $result->relevant_previous_medical_history?></textarea></td>
            </tr>
        </table>
    </div>

    <!-- Financial Information Section -->
    <div class="financial-info">
        <h2>Financial Information</h2>
        <table class="financial-table">
            <tr>
                <td>Self-Pay:</td>
                <td><input type="checkbox" <?php echo $result->nhs_number =='yes' ? 'checked':'';?>></td>
                <td>Insurer Name:</td>
                <td><input type="text" placeholder="Enter Insurer Name" value="<?php echo $result->completed_date?>"></td>
            </tr>
            <tr>
                <td>Insured:</td>
                <td><input type="checkbox" <?php echo $result->nhs_number =='yes' ? 'checked':'';?>></td>
                <td>Policy Number:</td>
                <td><input type="text" placeholder="Enter Policy Number" value="<?php echo $result->completed_date?>"></td>
            </tr>
            <tr>
                <td>Sponsored:</td>
                <td><input type="checkbox" <?php echo $result->nhs_number =='yes' ? 'checked':'';?>></td>
                <td>Sponsor:</td>
                <td><input type="text" placeholder="Enter Sponsor Name" value="<?php echo $result->completed_date?>"></td>
            </tr>
        </table>
    </div>
</div>

<!-- JavaScript for PDF Generation -->
<script>
    function generatePDF() {
        const element = document.getElementById('booking-form');
        
        html2pdf(element, {
            margin: 10,
            filename: 'booking-form.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    }
</script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
   
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
    .pen body {
	padding-top:50px;
}

/* Social Buttons - Twitter, Facebook, Google Plus */
.btn-twitter {
	background: #00acee;
	color: #fff
}
.btn-twitter:link, .btn-twitter:visited {
	color: #fff
}
.btn-twitter:active, .btn-twitter:hover {
	background: #0087bd;
	color: #fff
}

.btn-instagram {
	color:#fff;
	background-color:#3f729b;
	border-color:rgba(0,0,0,0.2);
}
.btn-instagram:focus,.btn-instagram.focus {
	color:#fff;
	background-color:#305777;
	border-color:rgba(0,0,0,0.2);
}
.btn-instagram:hover {
	color:#fff;
	background-color:#305777;
	border-color:rgba(0,0,0,0.2);
}

.btn-github {
	color:#fff;
	background-color:#444;
	border-color:rgba(0,0,0,0.2);
}
.btn-github:focus,.btn-github.focus {
	color:#fff;
	background-color:#2b2b2b;
	border-color:rgba(0,0,0,0.2);
}
.btn-github:hover {
	color:#fff;
	background-color:#2b2b2b;
	border-color:rgba(0,0,0,0.2);
}

/* MODAL FADE LEFT RIGHT BOTTOM */
.modal.fade:not(.in).left .modal-dialog {
	-webkit-transform: translate3d(-25%, 0, 0);
	transform: translate3d(-25%, 0, 0);
}
.modal.fade:not(.in).right .modal-dialog {
	-webkit-transform: translate3d(25%, 0, 0);
	transform: translate3d(25%, 0, 0);
}
.modal.fade:not(.in).bottom .modal-dialog {
	-webkit-transform: translate3d(0, 25%, 0);
	transform: translate3d(0, 25%, 0);
}

.modal.right .modal-dialog {
	position:absolute;
	top:0;
	right:0;
	margin:0;
}

.modal.left .modal-dialog {
	position:absolute;
	top:0;
	left:0;
	margin:0;
}

.modal.left .modal-dialog.modal-sm {
	max-width:300px;
}

.modal.left .modal-content, .modal.right .modal-content {
	min-height:100vh;
	border:0;
}
</style>


<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });

</script>
