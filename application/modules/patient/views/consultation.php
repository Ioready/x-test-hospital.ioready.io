<!-- Page content -->
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
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container-data {
            /* display: flex;
            max-width: 1200px;
            margin: auto;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */

            display: flex;
            max-width: 1100px;
            margin: auto;
            background-color: white;
        }
    /* border-radius: 10px; */
    /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        }

        /* Left side list */
        .left-panel {
            flex: 1;
            border-right: 1px solid #e5e5e5;
            padding: 20px;
        }

        .left-panel .header {
            margin-bottom: 20px;
        }

        .note-list {
            list-style-type: none;
        }

        .note-list li {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .note-list li:hover {
            background-color: #f0f0f0;
        }

        .note-list li.active {
            background-color: #d1f5e0;
        }

        .note-title {
            font-weight: bold;
        }

        .note-meta {
            font-size: 12px;
            color: #777;
        }

        .consultation-note {
            font-size: 12px;
            color: #00897b;
            font-weight: bold;
            text-decoration: underline;
            cursor: pointer;
        }

        /* Right side details */
        .right-panel {
            flex: 2;
            padding: 20px;
        }

        .right-panel .note-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .right-panel .note-details {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 20px;
        }

        .note-heading {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .note-meta-details {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .problem-heading {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .note-content {
            font-size: 14px;
            color: #333;
        }

        /* Action buttons */
        .actions {
            display: flex;
            gap: 10px;
        }

        .actions button {
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .actions button:hover {
            background-color: #e0e0e0;
        }

        .display-buttons {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .display-buttons button {
            padding: 10px;
            margin-left: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .container-data {
                flex-direction: column;
            }

            .left-panel {
                border-right: none;
                border-bottom: 1px solid #e5e5e5;
                padding-bottom: 10px;
            }

            .right-panel {
                padding-top: 10px;
            }
        }

        .actions a {
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            cursor: pointer;
            transition: background-color 0.3s;
            color: black;
        }
    </style>
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($model); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
   
    <!-- END Quick Stats -->
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
                <a href="<?php echo base_url() . 'index.php/patient/patientLogs?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
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
    </div> 
</div>

    <?php } ?>
    <!-- Datatables Content -->
    <!-- Datatables Content -->
    <div class="block full">

          <!-- <div class="block-title">
            <?php if ($this->ion_auth->is_subAdmin() ) { ?>
                <h2>
                <input type="text" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_consult" class="btn btn-sm btn-primary" style="background: #337ab7">
                        <i class="gi gi-circle_plus"></i> <?php echo 'New'; ?>
                    </a></h2>
            <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                    <h2>
                    <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_consult?id=<?php echo encoding($patient_id);?>" class="btn btn-sm btn-primary" style="background: #337ab7">
                        <i class="gi gi-circle_plus"></i> <?php echo 'New'; ?>
                    </a></h2>
                <?php } ?>
          </div> -->

        
    

        <div class="container-data">
    <!-- Left panel: List of consultation notes -->

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
                    if ($menu_name == 'Consultation') { 
                     ?>
                    


    <div class="left-panel">
        <?php  if ($menu_create =='1') {?>
        <div class="header">

            <div class="block-title">
                
                        <h2>
                        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                        <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_consult?id=<?php echo encoding($patient_id);?>" class="btn btn-sm btn-primary" style="background: #337ab7">
                            <i class="gi gi-circle_plus"></i> <?php echo 'New'; ?>
                        </a></h2>
                   
            </div>

                <!-- <button style="background-color: #007B83; color: white; padding: 10px; border: none; border-radius: 5px;">New</button> -->
        </div>
        <?php } if ($menu_view =='1') {?>
        <ul class="note-list">

            <?php
                      
                        $rowCount = 0;
                        foreach ($list as $rows) :
                            $rowCount++;
                        ?>
            <li class="active" onclick="viewConsultationDetails(<?php echo $rows->id; ?>)">
                <div class="note-title"><?php echo $rows->first_name. ' '. $rows->last_name; ?></div>
                <div class="note-meta"><?php echo $rows->create_date; ?></div>
                <div class="consultation-note" ><?php echo $rows->search; ?></div>
                <div class="consultation-note" ><?php echo $rows->type; ?> <?php echo $rows->comment; ?></div>
            </li>

            <!-- <li>
                <div class="note-title">Kirti Moholkar</div>
                <div class="note-meta">30 Jul 2024, 20:39</div>
                <div class="consultation-note">Consultation note</div>
            </li> -->
            <!-- <li>
                <div class="note-title">Kirti Moholkar</div>
                <div class="note-meta">30 Jul 2024, 20:38</div>
                <div class="consultation-note">Consultation note</div>
            </li>
            <li>
                <div class="note-title">Kirti Moholkar</div>
                <div class="note-meta">30 Jul 2024, 20:36</div>
                <div class="consultation-note">Consultation note</div>
            </li>
            <li>
                <div class="note-title">Kirti Moholkar</div>
                <div class="note-meta">21 Jun 2024, 15:50</div>
                <div class="consultation-note">Knee pain</div>
            </li> -->
            <?php
                        endforeach;
                    
                    ?>
        </ul>
<?php } ?>
    </div>
    <?php if ($menu_view =='1') { ?>

    <!-- Right panel: Details of the selected consultation -->
    <div class="right-panel">
        <div class="display-buttons">
            <button>Display all</button>
            <button>Print all</button>
        </div>
        <!-- <div id="consultation_details"></div> -->

        <div class="note-header">
            <div>
            
                <div class="note-meta-details" id="consultation_details">Kirti Moholkar, 30 Jul 2024, 20:46</div>
                <div class="note-heading" id="consultation_type">Nurse consultation</div>
                <div class="consultation-note">Consultation note</div>
            </div>
            <div class="actions" id="edit_consultation_id" style="margin-left: 164px;">
                <!-- <a href = "<?php echo site_url('patient/editConsultation'); ?>" >Edit</a>
                <button onclick="sendEmail()">Email</button>
                <button onclick="printConsultation()">Print</button> -->
                <!-- <button onclick="sendEmail()">Email</button> -->
                <!-- <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Email</button>
                <button onclick="printConsultation()">Print</button> -->

            </div>
            <div class="actions">
            <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Email</button>
                <button onclick="printConsultation()">Print</button>
            </div>

        </div>

        <div class="note-details">
            <div class="problem-heading">Free notes</div>
            <div class="note-content">Headache site, Since: 01/07/2024, Acute, Minor. The patient was happy and did want an MRI.</div>
        </div>


    </div>

    <?php }}} } if($this->ion_auth->is_facilityManager()){ ?>

        <div class="left-panel">
        <div class="header">

            <div class="block-title">
                <?php if ($this->ion_auth->is_subAdmin()) { ?>
                    <h2>
                    <input type="text" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                        <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_consult" class="btn btn-sm btn-primary" style="background: #337ab7">
                            <i class="gi gi-circle_plus"></i> <?php echo 'New'; ?>
                        </a></h2>
                <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                        <h2>
                        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                        <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_consult?id=<?php echo encoding($patient_id);?>" class="btn btn-sm btn-primary" style="background: #337ab7">
                            <i class="gi gi-circle_plus"></i> <?php echo 'New'; ?>
                        </a></h2>
                    <?php } ?>
            </div>

                <!-- <button style="background-color: #007B83; color: white; padding: 10px; border: none; border-radius: 5px;">New</button> -->
        </div>

        <ul class="note-list">

            <?php
                      
                        $rowCount = 0;
                        foreach ($list as $rows) :
                            $rowCount++;
                        ?>
            <li class="active" onclick="viewConsultationDetails(<?php echo $rows->id; ?>)">
                <div class="note-title"><?php echo $rows->first_name. ' '. $rows->last_name; ?></div>
                <div class="note-meta"><?php echo $rows->create_date; ?></div>
                <div class="consultation-note" ><?php echo $rows->search; ?></div>
                <div class="consultation-note" ><?php echo $rows->type; ?> <?php echo $rows->comment; ?></div>
            </li>

            <!-- <li>
                <div class="note-title">Kirti Moholkar</div>
                <div class="note-meta">30 Jul 2024, 20:39</div>
                <div class="consultation-note">Consultation note</div>
            </li> -->
            <!-- <li>
                <div class="note-title">Kirti Moholkar</div>
                <div class="note-meta">30 Jul 2024, 20:38</div>
                <div class="consultation-note">Consultation note</div>
            </li>
            <li>
                <div class="note-title">Kirti Moholkar</div>
                <div class="note-meta">30 Jul 2024, 20:36</div>
                <div class="consultation-note">Consultation note</div>
            </li>
            <li>
                <div class="note-title">Kirti Moholkar</div>
                <div class="note-meta">21 Jun 2024, 15:50</div>
                <div class="consultation-note">Knee pain</div>
            </li> -->
            <?php
                        endforeach;
                    
                    ?>
        </ul>

    </div>

    <!-- Right panel: Details of the selected consultation -->
    <div class="right-panel">
        <div class="display-buttons">
            <button>Display all</button>
            <button>Print all</button>
        </div>
        <!-- <div id="consultation_details"></div> -->

        <div class="note-header">
            <div>
            
                <div class="note-meta-details" id="consultation_details">Kirti Moholkar, 30 Jul 2024, 20:46</div>
                <div class="note-heading" id="consultation_type">Nurse consultation</div>
                <div class="consultation-note">Consultation note</div>
            </div>
            <div class="actions" id="edit_consultation_id" style="margin-left: 164px;">
                <!-- <a href = "<?php echo site_url('patient/editConsultation'); ?>" >Edit</a>
                <button onclick="sendEmail()">Email</button>
                <button onclick="printConsultation()">Print</button> -->
                <!-- <button onclick="sendEmail()">Email</button> -->
                <!-- <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Email</button>
                <button onclick="printConsultation()">Print</button> -->

            </div>
            <div class="actions">
            <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Email</button>
                <button onclick="printConsultation()">Print</button>
            </div>

        </div>

        <div class="note-details">
            <div class="problem-heading">Free notes</div>
            <div class="note-content">Headache site, Since: 01/07/2024, Acute, Minor. The patient was happy and did want an MRI.</div>
        </div>


    </div>

        <?php }?>

</div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>

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


<!-- Edit Consultation  -->

<div class="modal fade  bd-example-modal-lg" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" style="margin-top:-40px;" data-dismiss="modal" aria-label="Close" onclick="closeAndReload()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title fw-bold" style="text-align:center;" id="exampleModalLabel">Edit Consultation </h3>        
      </div>
      <div class="modal-body1">
        <!-- <form  method="post" id="contact-form" data-toggle="validator" role="form" action="" enctype="multipart/form-data"> -->
       

         </br>
          <div class="form-group">
            
           
           <!-- Dynamic Form Sections -->
           <!-- <div id="form-sections"> -->
           
                        <div id="form-complaint" class="form-section" style="display:none;">

                        <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">

                        
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
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                            <!-- <input type="text" class="form-control consultationType" name="consultationType" id="consultationType"> -->
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                           
                            <!-- Presenting Complaint -->
                            
                                <h4>Presenting Complaint</h4>
                                <input type="text" class="form-control" name="presenting_complaint" id="presenting_complaint" placeholder="Enter Complaint">
                                <input type="hidden" class="form-control" name="type" id="type" value="presenting_complaint" placeholder="Enter Complaint">
                            
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                        </form>
                        </div>
                  
                            <!-- Problem Heading -->

                            
                            <div id="form-problem" class="form-section" style="display:none;">

                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                <h4>Problem Heading</h4>
                                <div class="row">
                                    <span style="padding: 10px; margin-left: 25px;"><b>Problem</b></span>
                                </div>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="problem_heading" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Problem</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" name="search" class="form-control" placeholder="Search ..." id="problemSearch">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" name="since" id="since" class="form-control problem-heading-since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" name="condition_type" id="condition_type" class="form-control problem-heading-condition-type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" name="condition_significance" id="condition_significance" class="form-control problem-heading-condition-significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control problem-heading-comment" rows="4" name="comment" id="comment"></textarea>
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
                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                                <h4>Examination</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="examination" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Examination</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="examSearch" name="search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <label>Value</label>
                                        <input type="text" class="form-control" name="value" id="value">
                                        <label>Comment</label>
                                        <textarea class="form-control examination-comment" name="comment" id="comment" rows="4"></textarea>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                            </form>
                            </div>
                          
                            <!-- Allergy -->
                            <div id="form-allergy" class="form-section" style="display:none;">
                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                <h4>Allergy</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="allergy" placeholder="Enter Complaint">
                                <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label for="allergySearch">Allergy</label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search allergies" id="allergySearch" name="search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <label>Severity</label>
                                        <select class="form-control allergy-severity" name="severity" id="severity">
                                            <option value="severity">Select Severity</option>
                                            <option value="severity1"> Severity 1</option>
                                            <option value="severity2"> Severity 2</option>
                                        </select>
                                        <label>Comment</label>
                                        <textarea class="form-control allergy-comment" rows="4" name="comment" id="comment"></textarea>
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
                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                <h4>Medical History</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="medical_history" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Medical History</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="medicalHistorySearch" name="search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control medical-history-since" name="since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control medical-history-condition-type" name="condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control medical-history-condition-significance" name="condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control medical-history-comment" rows="4" name="comment" id="comment"></textarea>
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
                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                                <h4>Family History</h4>
                                <div class="row">
                                <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                <input type="hidden" class="form-control" name="type" id="type" value="family_history" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label for="familyHistorySearch">Family History</label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="familyHistorySearch" name="search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <label>Relationship</label>
                                        <select class="form-control family-history-relationship" name="relationship" id="relationship">
                                            <!-- <option value="relationship">Please select</option> -->
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
                                        <textarea class="form-control family-comment" rows="4" name="comment" id="comment"></textarea>
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

                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                <h4>Social</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="social" placeholder="Enter Complaint">
                                <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Social</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="socialSearch" name="search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control social-since" name="since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control social-condition-type" name="condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control social-condition-significance" name="condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control social-comment" rows="4" name="comment" id="comment"></textarea>
                                    </div>
                                </div>

                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                </form>
                            </div>
                         
                            <!-- Medication -->
                            <div id="form-medication" class="form-section" style="display:none;">
                                <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">

                                
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
                                                    <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control consultation_date" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                                         <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                         <h4>Medication</h4>
                                        <div class="row">
                                        <input type="hidden" class="form-control" name="type" id="type" value="medication" placeholder="Enter Complaint">
                                        <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                            <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                             <label><strong>Medication</strong></label>
                                            <div class="input-group mb-3">
                                                <input type="search" class="form-control" placeholder="Search ..." id="medicationSearch" name="search">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                </div>
                                            </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Since</label>
                                                        <input type="datetime-local" class="form-control medication-since" name="since" id="since">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Condition Type</label>
                                                        <input type="text" class="form-control medication-condition-type" name="condition_type" id="condition_type">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Condition Significance</label>
                                                        <input type="text" class="form-control medication-condition-significance" name="condition_significance" id="condition_significance">
                                                    </div>
                                                </div>
                                                <label>Comment</label>
                                                <textarea class="form-control medication-comment" rows="4" name="comment" id="comment"></textarea>
                                                <div>
                                                    <input type="checkbox" id="medicationSummary" name="medicationSummary">
                                                    <label for="medicationSummary"> Show in summary</label>
                                                </div>
                                            </div>
                                        </div>
                                    <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                                </form>
                            </div>
                            
                            <!-- Product -->
                            <div id="form-product" class="form-section" style="display:none;">
                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                                <h4>Product</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="type" id="type" value="product" placeholder="Enter Complaint">
                                <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Product</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="productSearch" name="search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control product-since" name="since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control product-condition-type" name="condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control product-condition-significance" name="condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control product-comment" rows="4" name="comment" id="comment"></textarea>
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

                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control" name="type" id="type" value="comment" placeholder="Enter Complaint">
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >

                                <h4>Comment</h4>
                                <textarea class="form-control" placeholder="Enter Comment" name="comment" id="comment"></textarea>

                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>                                </form>
                            </div>
                           
                        </div>
                    <!-- </div> -->


          <br>
          <div class="modal-footer mailmodel">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  id="submit1"  class="btn btn-primary" style="background: #337ab7">Save</button> -->
      </div>

        </form>
      </div>
     
    </div>
  </div>
</div>


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
</script>

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
<script>
   
    // Function to handle Print button click
    function printConsultation() {
        window.print();  // This will trigger the browser's print dialog
    }

    // Existing function to view consultation details via AJAX
    function viewConsultationDetails(consultation_id) {
        $.ajax({
            url: "<?php echo site_url('patient/fetchViewConsultation'); ?>",
            method: "POST",
            data: { consultation_id: consultation_id },
            dataType: "json",
            success: function(data) {

                var consultationDetails = data.first_name + ' ' + data.last_name + ', ' + data.create_date;
                $('#consultation_details').html(consultationDetails);

                var consultationType = data.doctor_name;

                $('#consultation_type').html(consultationType);
                $('.note-content').html(data.presenting_complaint + ', Since: ' + data.since + ', ' + data.condition_type + ', ' + data.condition_significance);
                
                // edit consultation 

                var presenting_complaint=  data.presenting_complaint;
                var search=  data.search;
                var since=  data.since;
                var condition_type=  data.condition_type;
                var comment=  data.comment;
                var value=  data.value;
                var severity=  data.severity;
                var condition_significance=  data.condition_significance;
                var relationship=  data.relationship;
                var showSummary=  data.showSummary;
                var id = data.id; 
                var consultation_type = data.consultation_type; 
                var consultation_date = data.consultation_date; 
// alert(since);
                
                $('#presenting_complaint').val(presenting_complaint);
                // $('#since').val(since);
                $('.medication-since').val(since);
                $('.product-since').val(since);
                $('.social-since').val(since);
                $('.medical-history-since').val(since);
                $('.problem-heading-since').val(since);
               

                // $('#condition_type').val(condition_type);
                $('.problem-heading-condition-type').val(condition_type);
                $('.medical-history-condition-type').val(condition_type);
                $('.social-condition-type').val(condition_type);
                $('.medication-condition-type').val(condition_type);
                $('.product-condition-type').val(condition_type);

                // $('#comment').val(comment);

                $('.problem-heading-comment').val(comment);
                $('.medical-history-comment').val(comment);
                $('.social-comment').val(comment);
                $('.medication-comment').val(comment);
                $('.product-comment').val(comment);
                // $('#comment').val(comment);
                // $('#comment').val(comment);

                $('#value').val(value);
                $('.consultation_date').val(consultation_date);
                // $('.problem-heading-severity').val(severity);
                // $('.medical-history-severity').val(severity);
                // $('.social-severity').val(severity);
                // $('.medication-severity').val(severity);
                // $('.product-severity').val(severity);

                $("#consultationType option[value='" + consultation_type + "']").prop("selected", true);
                // $('#severity').val(severity);
                // $('#severity').val(severity);

                $('.problem-heading-condition-significance').val(condition_significance);
                $('.medical-history-condition-significance').val(condition_significance);
                $('.social-condition-significance').val(condition_significance);
                $('.medication-condition-significance').val(condition_significance);
                $('.product-condition-significance').val(condition_significance);

                
                // $('#condition_significance').val(condition_significance);

                // $('#relationship').val(relationship);
                $(".family-history-relationship option[value='" + relationship + "']").prop("selected", true);

                $('#showSummary').val(showSummary);
                $('#id').val(id);

                $('#problemSearch').val(search);
                $('#examSearch').val(search);
                $('#allergySearch').val(search);
                $('#medicalHistorySearch').val(search);
                $('#familyHistorySearch').val(search);
                $('#socialSearch').val(search);
                $('#medicationSearch').val(search);
                $('#productSearch').val(search);


                $(".allergy-severity option[value='" + severity + "']").prop("selected", true);

               
                var action = '<button type="button" data-toggle="modal" data-target="#exampleModalEdit" ' +
             'data-whatever="@mdo" data-type="' + data.type + '" data-id="' + data.id + '">Edit</button>';

                    $('#edit_consultation_id').html(action);
                    $('#exampleModalEdit').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var type = button.data('type');      // Extract info from data-* attributes
                    var id = button.data('id');          // Extract the consultation id

                    // Update the modal content with the consultation type and id
                    
                    $('.consultationType').val(type);  // Insert type into modal
                    $('.consultationId').val(id);

                    if(type == 'product'){
                            $('#form-product').css("display","block");
                    }
                    if(type == 'medication'){
                            $('#form-medication').css("display","block");
                    }
                    if(type == 'social'){
                            $('#form-social').css("display","block");
                    }
                    if(type == 'family_history'){
                            $('#form-family-history').css("display","block");
                    }
                    if(type == 'medical_history'){
                            $('#form-medical-history').css("display","block");
                    }
                    if(type == 'allergy'){
                            $('#form-allergy').css("display","block");
                    }
                    if(type == 'examination'){
                            $('#form-exam').css("display","block");
                    }
                    if(type == 'problem_heading'){
                            $('#form-problem').css("display","block");
                    }
                    if(type == 'presenting_complaint'){
                            $('#form-complaint').css("display","block");
                    }
                    if(type == 'comment'){
                            $('#form-comment').css("display","block");
                    }
                        // Insert id into modal
                    });

            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }

    function closeAndReload() {
    $('#myModal').modal('hide'); // Closes the modal
    setTimeout(function() {
        window.location.reload(); // Reloads the window after closing the modal
    }, 500); // Adds a slight delay to ensure modal closes before reload
}
</script>






