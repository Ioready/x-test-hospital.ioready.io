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

                                <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>                                
                            </form>
                            </div>
                           
                        <!-- </div> -->

                        <!-- Diagram -->
                        <div id="form-diagram" class="form-section" style="display:none;">

                            <form id="addFormAjax" method="post" action="<?php echo base_url('patient/updateConsultation') ?>" enctype="multipart/form-data">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>

                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                        
                                <h4>Diagram</h4>
                                <input type="text" class="form-control" name="diagram_type" id="diagram" placeholder="Enter Complaint">
                                <button type="button" style="color:green; background:white; border: 1px solid green; border-radius:5px; padding:5px;" data-toggle="modal" data-target="#myModal"> Add a diagram</button>
                                <div id="select_question"></div>

                                
                            <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                           
                            </form>
                            
                    </div>
                 </div>


          <br>
          <div class="modal-footer mailmodel">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  id="submit1"  class="btn btn-primary" style="background: #337ab7">Save</button> -->
      </div>

        <!-- </form> -->
      </div>
     
    </div>
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
        // alert(consultation_id);
        $.ajax({
            url: "<?php echo site_url('patient/fetchViewConsultation'); ?>",
            method: "POST",
            data: { consultation_id: consultation_id },
            dataType: "json",
            success: function(data) {

                var consultationDetails = data.first_name + ' ' + data.last_name + ', ' + data.create_date;

                // Construct the consultation details string with additional data fields


// Optionally, insert the details into the HTML element with ID 'consultation_details'
$('#consultation_details').html(consultationDetails);


                // alert(consultationDetails);
                // $('#consultation_details').html(consultationDetails);
                // $('#consultation_details').html(consultationDetails);

                var consultationType = data.doctor_name;

                $('#consultation_type').html(consultationType);

                var notes = 
    data.first_name + ' ' + data.last_name + ', ' +
    'Created on: ' + data.create_date + '\n' +
    'Consultation Type: ' + data.consultation_type + '\n' +
    'Consultation Date: ' + data.consultation_date + '\n' +
    'Presenting Complaint: ' + data.presenting_complaint + '\n' +
    'Comment: ' + data.comment + '\n' +
    'Relationship: ' + data.relationship +
    'diagram: <img src=" '+  data.diagram_url + '" alt="Diagram Image" style="max-width:150px; margin: 5px;">';
   
   

// $('.note-content').html(notes);

//                 var notes = 
//     data.first_name + ' ' + data.last_name + ', ' +
//     'Created on: ' + data.create_date + '\n' +
//     'Consultation Type: ' + data.consultation_type + '\n' +
//     'Consultation Date: ' + data.consultation_date + '\n' +
//     'Presenting Complaint: ' + data.presenting_complaint + '\n' +
//     'Comment: ' + data.comment + '\n' +
//     'Relationship: ' + data.relationship +

//     data.diagram_url.forEach(function(url) {
//          'diagram: <img src="'+ url +'" alt="Diagram Image" style="max-width:150px; margin: 5px;">';
//     });
   
// }

$('.note-content').html(notes);


// Assuming `data` is the JavaScript object containing the information

// var notes = `
//     <h3>${data.first_name} ${data.last_name}</h3>
//     <p><strong>Consultation Date:</strong> ${data.create_date}</p>
//     <p><strong>Patient ID:</strong> ${data.patient_id}</p>
//     <p><strong>Facility User ID:</strong> ${data.facility_user_id}</p>
//     <p><strong>Consultation Type:</strong> ${data.consultation_type}</p>
//     <p><strong>Consultation Date:</strong> ${data.consultation_date}</p>
//     <p><strong>Presenting Complaint:</strong> ${data.presenting_complaint}</p>
//     <p><strong>Comment:</strong> ${data.comment}</p>
//     <p><strong>Relationship:</strong> ${data.relationship}</p>
//     <p><strong>Show Summary:</strong> ${data.showSummary ? "Yes" : "No"}</p>
// `;

// Add images from diagram_url array

// if (data.diagram_url && data.diagram_url.length > 0) {
//     notes += '<div><strong>Diagram Images:</strong><br>';
//     data.diagram_url.forEach(function(url) {
//         notes += `<img src="${url}" alt="Diagram Image" style="max-width:150px; margin: 5px;">`;
//     });
//     notes += '</div>';
// }

// Add additional details as needed
// notes += `
//     <p><strong>Status:</strong> ${data.status === 0 ? 'Inactive' : 'Active'}</p>
// `;

// Display the content in the `#consultation_details` element
// $('#consultation_details').html(consultationDetails);
$('.note-content').html(notes);


                // $('.note-content').html(data.presenting_complaint + ', Since: ' + data.since + ', ' + data.condition_type + ', ' + data.condition_significance);
                
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
                    if(type == 'diagram'){
                            $('#form-diagram').css("display","block");
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






