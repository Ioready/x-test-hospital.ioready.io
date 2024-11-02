<!-- Page content -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .container-imag {
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
            padding: 15px;
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
            .container-imag {
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
            padding: 15px;
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
          /* Additional styling for PDF generation */
          @media print {
            body {
                width: 100%;
                border: 1px solid black;
            }
            .container-imag {
                width: 100%;
                padding: 10px;
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
        
        <button onclick="generatePDF()" class="btn btn-outline-success" style="margin-left: 65%;"> <i class="fa fa-edit"></i> Edit</button>
        <button onclick="generatePDF()" class="btn btn-outline-success"> <i class="fa fa-download"></i> Download</button>
    

</div>


<div class="">
    
    <?php if ($this->ion_auth->is_facilityManager()) { ?>
        <div class="row">
        <div class="col-sm-8 col-md-8">
        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
        <h3><strong> Imaging Request Form</strong></h3>
        </div>
            
    <?php } ?>
</div>

<div class="mt-5" id="content">
        
<!-- <div class="show-grid border border-light">
  
  <div class="row">
    <div class="col-sm-10"><label for="">Page:</label><select name="" id=""><option value="1">1</option></select> <label for="">Of 2</label></div>
    <div class="col-sm-2"><label for="">Zoom</label> <button type="button" class="btn btn-success" style="background-color: darkcyan;">+</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" style="background-color: darkcyan;">-</button></div>
  </div>
  
</div> -->

<!-- <button onclick="generatePDF()">Generate PDF</button> -->
    <div class="container-imag">
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
                        <input type="text" value="<?php echo $result->surname?>" >
                    </div>
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" value="<?php echo $result->first_name?>">
                    </div>
                    <div class="form-group">
                        <label>DoB</label>
                        <input type="text" value="<?php echo $result->dob?>">
                    </div>
                    <div class="form-group radio-group">
                        <label>Male</label>
                        <input type="radio" name="gender" <?php echo $result->gender == 'male'?'checked':'';?>>
                        <label>Female</label>
                        <input type="radio" name="gender" <?php echo $result->gender == 'female'?'checked':'';?>>
                    </div>
                    <div class="form-group">
                        <label>Hospital number</label>
                        <input type="text"  value="<?php echo $result->hospital_number?>">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text"  value="<?php echo $result->address?>">
                    </div>
                    <div class="form-group">
                        <label>Post Code</label>
                        <input type="text"  value="<?php echo $result->post_code?>">
                    </div>
                    <div class="form-group">
                        <label>Tel home</label>
                        <input type="tel"  value="<?php echo $result->tel_home?>">
                    </div>
                    <div class="form-group">
                        <label>Tel mobile</label>
                        <input type="tel" value="<?php echo $result->tel_mobile?>">
                    </div>
                </div>
    
                <!-- Right Section (Appointment and Female Patients) -->
                <div class="right-section">
                    <!-- Appointment Box -->
                    <div class="box">
                        <h2>Appointment</h2>
                        <div class="form-group">
                            <label>Date and Time</label>
                            <input type="text" value="<?php echo $result->date_time;?>">
                        </div>
                        <div class="form-group">
                            <label>OP</label>
                            <input type="checkbox" <?php echo $result->op =='op'?'checked':'';?>>
                            <label>IP</label>
                            <input type="checkbox" <?php echo $result->ip =='ip'?'checked':'';?>>
                            <label>Room No</label>
                            <input type="text" value="<?php echo $result->room_number;?>">
                        </div>
                        <div class="checkbox-group">
                            <label><input type="checkbox" <?php echo $result->oxygen =='oxygen'?'checked':'';?>>Oxygen</label>
                            <label><input type="checkbox" <?php echo $result->disability =='disability'?'checked':'';?>>Disability</label>
                        </div>
                    </div>
    
                    <!-- Female Patients Box -->
                    <div class="box">
                        <h2>To be completed for female patients</h2>
                        <div class="form-group radio-group">
                            <label>Do you think you may be pregnant?</label>
                            <label><input type="radio" name="pregnant" <?php echo $result->pregnant =='yes'?'checked':'';?>> Yes</label>
                            <label><input type="radio" name="pregnant" <?php echo $result->pregnant =='no'?'checked':'';?>> No</label>
                        </div>
                        <div class="form-group">
                            <label>If Yes:</label>
                            <label><input type="radio" name="xray" <?php echo $result->xray =='x-ray'?'checked':'';?>> X-ray now</label>
                            <label><input type="radio" name="wait" <?php echo $result->xray =='Wait for next LMP'?'checked':'';?>> Wait for next LMP</label>
                        </div>
                        <div class="form-group">
                            <label>1st day of LMP (date)</label>
                            <input type="date" value="<?php echo $result->first_day_of_lmp?>">
                        </div>
                        <div class="form-group radio-group">
                            <label>Are you breastfeeding?</label>
                            <label><input type="radio" name="breastfeeding" <?php echo $result->breastfeeding =='yes'?'checked':'';?>> Yes</label>
                            <label><input type="radio" name="breastfeeding" <?php echo $result->breastfeeding =='no'?'checked':'';?>> No</label>
                        </div>
                        <div class="form-group">
                            <label>Signature</label>
                            <input type="text" value="<?php echo $result->signature?>">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" value="<?php echo $result->date?>">
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
                    <input type="text" value="<?php echo $result->referrer_signature?>">
                </div>
                <div class="form-group inline1">
                    <label>Date:</label>
                    <input type="date" value="<?php echo $result->referrer_date?>">
                </div>
                <div class="form-group inline1">
                    <label>Name/Address:</label>
                    <input type="text" value="<?php echo $result->referrer_name_address?>">
                </div>
            </div>
        </div>

        <!-- Medication and MRI Information -->
        <div class="row1">
            <div class="half-width-section1">
                <h3>Medication Required (Referring Consultant to complete)</h3>
                <div class="form-group1">
                    <label>Allergies:</label>
                    <input type="text" value="<?php echo $result->medication_required_allergies?>">
                </div>
                <div class="form-group1">
                    <label>Medication:</label>
                    <input type="text" value="<?php echo $result->medication_required_medication?>">
                </div>
                <div class="form-group1">
                    <label>Dose:</label>
                    <input type="text" value="<?php echo $result->medication_required_dose?>">
                </div>
                <div class="form-group1">
                    <label>Date:</label>
                    <input type="date" value="<?php echo $result->medication_required_date?>">
                </div>
                <div class="form-group inline1">
                    <label>Signature:</label>
                    <input type="text" value="<?php echo $result->medication_required_signature?>">
                </div>
                <div class="form-group inline1">
                    <label>GMC No:</label>
                    <input type="text" value="<?php echo $result->medication_required_gmc_no?>">
                </div>medication_required_gmc_no
            </div>
            <div class="half-width-section1">
                <h3>Additional information for MRI patients</h3>
                <div class="mri-info1">
                    <label>Does the patient have a cardiac pacemaker?</label>
                    <input type="radio" name="pacemaker" value="yes" <?php echo $result->mri_patients_cardiac_pacemaker == 'yes'?'checked':'';?>> Yes
                    <input type="radio" name="pacemaker" value="no" <?php echo $result->mri_patients_cardiac_pacemaker == 'no'?'checked':'';?>> No
                </div>
                <div class="mri-info1">
                    <label>Does the patient have heart valve replacements?</label>
                    <input type="radio" name="heart-valve" value="yes" <?php echo $result->mri_patients_heart_valve == 'yes'?'checked':'';?>> Yes
                    <input type="radio" name="heart-valve" value="no" <?php echo $result->mri_patients_heart_valve == 'no'?'checked':'';?>> No
                </div>
                <div class="mri-info1">
                    <label>Has the patient any metal fragments in their eyes?</label>
                    <input type="radio" name="metal-fragments" value="yes" <?php echo $result->mri_patients_metal_fragments == 'yes'?'checked':'';?>> Yes
                    <input type="radio" name="metal-fragments" value="no" <?php echo $result->mri_patients_metal_fragments == 'no'?'checked':'';?>> No
                </div>
                <div class="mri-info1">
                    <label>Has the patient had any cranial surgery?</label>
                    <input type="radio" name="cranial-surgery" value="yes" <?php echo $result->mri_patients_cranial_surgery == 'yes'?'checked':'';?>> Yes
                    <input type="radio" name="cranial-surgery" value="no" <?php echo $result->mri_patients_cranial_surgery == 'no'?'checked':'';?>> No
                </div>
                <div class="mri-info1">
                    <label>Does the patient have any metal in their body?</label>
                    <input type="radio" name="metal-body" value="yes" <?php echo $result->mri_patients_metal_body == 'yes'?'checked':'';?>> Yes
                    <input type="radio" name="metal-body" value="no" <?php echo $result->mri_patients_metal_body == 'no'?'checked':'';?>> No
                </div>
                <div class="form-group1">
                    <label>Is the patient on any anti-coagulant?</label>
                    <input type="text" value="<?php echo $result->mri_patients_anti_coagulant?>">
                </div>
                <div class="form-group1">
                    <label>If so state value or provide eGFR:</label>
                    <input type="text" value="<?php echo $result->mri_patients_provide_egfr?>">
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
                <textarea class="input-text" rows="2" placeholder="Enter protocol"> <?php echo $result->imaging_department_staff?></textarea>
            </div>
    
            <!-- Second Section -->
            <div class="form-section2">
                <div class="form-header2">Person making exposure has checked the patient's ID</div>
                <table class="form-table">
                    <tr>
                        <th class="form-radio">YES <input type="radio" name="check_id" <?php echo $result->returned_check_id =='yes'?'checked':'';?>></th>
                        <th class="form-radio">NO <input type="radio" name="check_id" <?php echo $result->returned_check_id =='no'?'checked':'';?>></th>
                    </tr>
                </table>
            </div>
    
            <!-- Third Section -->
            <div class="form-section2">
                <div class="form-header2">Operator Use</div>
                <table class="form-table2">
                    <tr>
                        <td>Patient's height:</td>
                        <td><input type="text" class="input-text" placeholder="Enter height" value="<?php echo $result->operator_use_patient_height?>"></td>
                        <td>Patient's weight:</td>
                        <td><input type="text" class="input-text" placeholder="Enter weight" value="<?php echo $result->operator_use_patient_weight?>"></td>
                    </tr>
                    <tr>
                        <td>kV:</td>
                        <td><input type="text" class="input-text" placeholder="Enter kV" value="<?php echo $result->operator_use_kv?>"></td>
                        <td>mAs:</td>
                        <td><input type="text" class="input-text" placeholder="Enter mAs" value="<?php echo $result->operator_use_mas?>"></td>
                    </tr>
                    <tr>
                        <td>Operator's name & signature:</td>
                        <td><input type="text" class="input-text" placeholder="Enter name/signature" value="<?php echo $result->pperators_name_signature?>"></td>
                        <td>Number of exposures/films:</td>
                        <td><input type="text" class="input-text" placeholder="Enter exposures" value="<?php echo $result->operators_number_of_exposures_films?>"></td>
                    </tr>
                    <tr>
                        <td>Dose (cGycm²):</td>
                        <td><input type="text" class="input-text" placeholder="Enter dose" value="<?php echo $result->operators_dose_cgycm?>"></td>
                        <td>Fluoro Time:</td>
                        <td><input type="text" class="input-text" placeholder="Enter time" value="<?php echo $result->operators_fluoro_time?>"></td>
                    </tr>
                    <tr>
                        <td>Examination justified by: name & signature:</td>
                        <td><input type="text" class="input-text" placeholder="Enter name/signature" value="<?php echo $result->operators_examination_justified_name_signature?>"></td>
                        
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
                        <th>Yes <input type="radio" name="pregnancy" <?php echo $result->patient_holding_record_pregnancy =='yes'?'checked':'';?>></th>
                        <th>No <input type="radio" name="pregnancy" <?php echo $result->patient_holding_record_pregnancy =='no'?'checked':'';?>></th>
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
                        <td><input type="text" class="input-text" value="<?php echo $result->patient_holding_record_comforter_carer?>"></td>
                        <td><input type="text" class="input-text" value="<?php echo $result->patient_holding_record_signature?>"></td>
                        <td><input type="text" class="input-text" value="<?php echo $result->patient_holding_record_ffd?>"></td>
                        <td><input type="text" class="input-text" value="<?php echo $result->patient_holding_record_patient_carer_distance?>"></td>
                        <td><input type="text" class="input-text" value="<?php echo $result->patient_holding_record_patient_dose?>"></td>
                    </tr>
                    <!-- <tr>
                        <td><input type="text" class="input-text" value="<?php echo $result->surname?>"></td>
                        <td><input type="text" class="input-text" value="<?php echo $result->surname?>"></td>
                        <td><input type="text" class="input-text" value="<?php echo $result->surname?>"></td>
                        <td><input type="text" class="input-text" value="<?php echo $result->surname?>"></td>
                        <td><input type="text" class="input-text" value="<?php echo $result->surname?>"></td>
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
                    <input type="checkbox" id="id-check" <?php echo $result->checklist_patient_id_check =='on'?'checked':'';?>>
                    <label for="id-check">Patient ID Check</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="exam-justification" <?php echo $result->checklist_exam_justification =='on'?'checked':'';?>>
                    <label for="exam-justification">Exam Justification</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="previous-exams" <?php echo $result->checklist_previous_exams =='on'?'checked':'';?>>
                    <label for="previous-exams">Previous Exams</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="risk-explained" <?php echo $result->checklist_risk_explained =='on'?'checked':'';?>>
                    <label for="risk-explained">Radiation/Risk Explained</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="within-limits" <?php echo $result->checklist_within_limits =='on'?'checked':'';?>>
                    <label for="within-limits">Within DRL Limits</label>
                </div>
                <div class="checkbox-item2">
                    <input type="checkbox" id="report-flagged" <?php echo $result->checklist_report_flagged =='on'?'checked':'';?>>
                    <label for="report-flagged">Urgent Report Flagged</label>
                </div>
            </div>
    
            <!-- Notes Section -->
            <div class="section-title2">Notes:</div>
            <textarea class="notes-area2"><?php echo $result->notes;?></textarea>
    
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
            <textarea class="comments-area2"><?php echo $result->operator_comments;?></textarea>
        </div>
    </div>
      <!-- JavaScript for PDF Generation -->
      <script>
        function generatePDF() {
            // Select the form to generate PDF from
            const element = document.querySelector('.container-imag');
            
            // Call the html2pdf function
            html2pdf()
                .from(element)
                .set({
                    margin: 1,
                    filename: 'imaging-request-form.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                })
                .save();
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
