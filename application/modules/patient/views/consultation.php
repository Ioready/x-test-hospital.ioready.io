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
    padding: 30px;
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
            <div id="diagram_image"></div>
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
            <div id="diagram_image"></div>
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

<div class="modal right fade  bd-example-modal-lg" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg scrollbar" role="document">
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
                                                <option value="<?php echo $doctor->id; ?>">
                                                    <?php echo $doctor->first_name. ' '.$doctor->last_name; ?>
                                                </option>
                                            <?php } } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="consultationDate">Date</label>
                                        <input type="datetime-local consultation_dates" name="consultation_date" id="consultation_date" class="form-control" required>
                                    </div>
                                 </div>
                            </div>
                            </div>
                            <div id="form-complaint" class="form-section" style="display:none;">
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                           
                            <!-- Presenting Complaint -->
                            
                                <h4>Presenting Complaint</h4>
                                <input type="text" class="form-control" name="presenting_complaint" id="presenting_complaint" placeholder="Enter Complaint">
                                <!-- <input type="hidden" class="form-control" name="type" id="type" value="presenting_complaint" placeholder="Enter Complaint"> -->
                                <input type="hidden" class="form-control" name="presenting_type" id="presenting" value="presenting_complaint" placeholder="Enter presenting">
                            
                               
                        </div>
                  
                            <!-- Problem Heading -->

                            
                            <div id="form-problem" class="form-section" style="display:none;">

                           
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                <h4>Problem Heading</h4>
                                <div class="row">
                                    <span style="padding: 10px; margin-left: 25px;"><b>Problem</b></span>
                                </div>
                                <div class="row">
                                <!-- <input type="hidden" class="form-control" name="type" id="type" value="problem_heading" placeholder="Enter Complaint"> -->
                            
                                <input type="hidden" class="form-control" name="problem_type" id="problem" value="problem_heading">
                            

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
                                                <input type="datetime-local" name="problem_since" id="since" class="form-control problem-heading-since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" name="problem_condition_type" id="condition_type" class="form-control problem-heading-condition-type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" name="problem_condition_significance" id="condition_significance" class="form-control problem-heading-condition-significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control problem-heading-comment" rows="4" name="problem_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="showSummary" name="showSummary">
                                            <label for="showSummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <!-- Examination -->
                            <div id="form-exam" class="form-section" style="display:none;">
                            
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                                <h4>Examination</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="examination_type" id="type" value="examination" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Examination</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="examSearch" name="examination_search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <label>Value</label>
                                        <input type="text" class="form-control" name="examination_value" id="value">
                                        <label>Comment</label>
                                        <textarea class="form-control examination-comment" name="examination_comment" id="comment" rows="4"></textarea>
                                    </div>
                                </div>
                               
                            </div>
                          
                            <!-- Allergy -->
                            <div id="form-allergy" class="form-section" style="display:none;">
                            
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                <h4>Allergy</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="allergy_type" id="type" value="allergy" placeholder="Enter Complaint">
                                <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label for="allergySearch">Allergy</label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search allergies" id="allergySearch" name="allergy_search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <label>Severity</label>
                                        <select class="form-control allergy-severity" name="allergy_severity" id="severity">
                                            <option value="severity">Select Severity</option>
                                            <option value="severity1"> Severity 1</option>
                                            <option value="severity2"> Severity 2</option>
                                        </select>
                                        <label>Comment</label>
                                        <textarea class="form-control allergy-comment" rows="4" name="allergy_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="allergySummary" name="allergySummary">
                                            <label for="allergySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!-- Medical History -->
                            <div id="form-medical-history" class="form-section" style="display:none;">
                            
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                <h4>Medical History</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="medical_type" id="type" value="medical_history" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Medical History</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="medicalHistorySearch" name="medical_history_search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control medical-history-since" name="medical_history_since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control medical-history-condition-type" name="medical_history_condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control medical-history-condition-significance" name="medical_history_condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control medical-history-comment" rows="4" name="medical_history_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="medicalHistorySummary" name="medicalHistorySummary">
                                            <label for="medicalHistorySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                           
                            <!-- Family History -->
                            <div id="form-family-history" class="form-section" style="display:none;">
                            
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                                <h4>Family History</h4>
                                <div class="row">
                                <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                <input type="hidden" class="form-control" name="family_type" id="type" value="family_history" placeholder="Enter Complaint">
                            
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label for="familyHistorySearch">Family History</label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="familyHistorySearch" name="family_history_search">
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
                                        <textarea class="form-control family-comment" rows="4" name="family_history_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="familyHistorySummary" name="familyHistorySummary">
                                            <label for="familyHistorySummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!-- Social -->
                            <div id="form-social" class="form-section" style="display:none;">

                            
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                <h4>Social</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="social_type" id="type" value="social" placeholder="Enter Complaint">
                                <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Social</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="socialSearch" name="social_search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control social-since" name="social_since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control social-condition-type" name="social_condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control social-condition-significance" name="social_condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control social-comment" rows="4" name="social_comment" id="comment"></textarea>
                                    </div>
                                </div>

                               
                            </div>
                         
                            <!-- Medication -->
                            <div id="form-medication" class="form-section" style="display:none;">
                                
                                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                                         <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                         <h4>Medication</h4>
                                        <div class="row">
                                        <input type="hidden" class="form-control" name="medication_type" id="type" value="medication" placeholder="Enter Complaint">
                                        <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                            <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                             <label><strong>Medication</strong></label>
                                            <div class="input-group mb-3">
                                                <input type="search" class="form-control" placeholder="Search ..." id="medicationSearch" name="medication_search">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                </div>
                                            </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Since</label>
                                                        <input type="datetime-local" class="form-control medication-since" name="medication_since" id="since">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Condition Type</label>
                                                        <input type="text" class="form-control medication-condition-type" name="medication_condition_type" id="condition_type">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Condition Significance</label>
                                                        <input type="text" class="form-control medication-condition-significance" name="medication_condition_significance" id="condition_significance">
                                                    </div>
                                                </div>
                                                <label>Comment</label>
                                                <textarea class="form-control medication-comment" rows="4" name="medication_comment" id="comment"></textarea>
                                                <div>
                                                    <input type="checkbox" id="medicationSummary" name="medicationSummary">
                                                    <label for="medicationSummary"> Show in summary</label>
                                                </div>
                                            </div>
                                        </div>
                                   
                            </div>
                            
                            <!-- Product -->
                            <div id="form-product" class="form-section" style="display:none;">
                            
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           

                                <h4>Product</h4>
                                <div class="row">
                                <input type="hidden" class="form-control" name="product_type" id="type" value="product" placeholder="Enter Complaint">
                                <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                    <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                        <label><strong>Product</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search ..." id="productSearch" name="product_search">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Since</label>
                                                <input type="datetime-local" class="form-control product-since" name="product_since" id="since">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Type</label>
                                                <input type="text" class="form-control product-condition-type" name="product_condition_type" id="condition_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Condition Significance</label>
                                                <input type="text" class="form-control product-condition-significance" name="product_condition_significance" id="condition_significance">
                                            </div>
                                        </div>
                                        <label>Comment</label>
                                        <textarea class="form-control product-comment" rows="4" name="product_comment" id="comment"></textarea>
                                        <div>
                                            <input type="checkbox" id="productSummary" name="productSummary">
                                            <label for="productSummary"> Show in summary</label>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                            
                            <!-- Comment -->
                            <div id="form-comment" class="form-section" style="display:none;">

                           
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                            <input type="hidden" class="form-control" name="comments_type" id="type" value="comment" placeholder="Enter Complaint">
                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                            <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >

                                <h4>Comment</h4>
                                
                                <textarea class="form-control" placeholder="Enter Comment" name="comment" id="comment"></textarea>

                                
                            </div>
                           
                        <!-- </div> -->

                        <!-- Diagram -->
                        <div id="form-diagram" class="form-section" style="display:none;">

                            
                            <div class="alert alert-danger" id="error-box" style="display: none"></div>

                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                                                                        
                                <h4>Diagram</h4>
                                <input type="hidden" class="form-control" name="diagram_type" id="diagram" value="diagram">
                                
                                <button type="button" style="color:green; background:white; border: 1px solid green; border-radius:5px; padding:5px;" data-toggle="modal" data-target="#editMyModal"> Add a diagram</button>
                                <div id="select_question"></div>
                                <div id="edit_diagram"></div>
                            
                                <textarea class="form-control" placeholder="Enter diagram text" name="diagram_comment" id="diagram_comment"></textarea>

                                
                            <button type="submit" id="submit" class="btn btn-sm m-2" style="background-color:#337ab7; color: white;" >Save</button>
                           
                           
                            
                    </div>
                    </form>
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
  <!-- <script>
    $(document).on("click","#cust_btn",function(){
  
  $("#myModal").modal("toggle");
  
})
</script> -->

  

    <script>
    $(document).on("click","#cust_btn",function(){
  
  $("#editMyModal").modal("toggle");
  
})
</script>

    <!-- <div class="modal fade" id="editMyModal" role="dialog">
        <div class="modal-dialog">
            <form id="myForm" method="post" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Diagram.</h4>
                </div>
                <div class="modal-body">
                  
                    <select name="question" id="question" class="form-control">
                        <option id="selected_diagram">Diagram</option>
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
                                           
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;" data-dismiss="modal">Close</button>
                    
                    <button id="submit" type="submit" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;" data-toggle="modal" data-target="#modalForm">Submit</button>
                </div>
            </div>

            </form>
        </div>
    </div> -->


</div>


    <div class="modal fade" id="editMyModal" role="dialog">
        <div class="modal-dialog">

            <form id="myForm" method="post" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Diagram.</h4>
                </div>
                <div class="modal-body">
                  
                    <select name="question" id="question" class="form-control">
                        <option id="selected_diagram">Diagram</option>
                    </select>
                    

                        <div id="diagram" >
                            
                            <div class="row">

                                <div class="col-md-6 card diagram-img" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_f.jpg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_f.jpg" alt="Body 1" width="140px;" style="margin-left: 24px;">
                                    <div>Body 1</div>
                                </div>
                        
                                <div class="col-md-6 card diagram-img" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_m.jpg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_m.jpg" alt="Body 2" width="140px;" style="margin-left: 24px;">
                                    <div>Body 2</div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 card diagram-img" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_m.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_m.jpeg" alt="Male" width="140px;" style="margin-left: 24px;">
                                    <div>Male</div>
                                </div>
                                <div class="col-md-6 card diagram-img" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_f.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_f.jpeg" alt="Female" width="140px;" style="margin-left: 24px;">
                                    <div>Female</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 card diagram-img" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_b.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_b.jpeg" alt="Boy" width="140px;" style="margin-left: 24px;">
                                        <div>Boy</div>
                                </div>
                                <div class="col-md-6 card diagram-img" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_g.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_g.jpeg" alt="Girl" width="140px;" style="margin-left: 24px;">
                                    <div>Girl</div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 card diagram-img" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/hand.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/hand.jpeg" alt="Hand" width="140px;" style="margin-left: 24px;">
                                    <div>Hand</div>
                                </div>

                                <div class="col-md-6">
                                           
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;" data-dismiss="modal">Close</button>
                    
                    <button id="submitDiagramBtn" type="button" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;" data-toggle="modal" data-target="#modalForm">Submit</button>
                </div>
            </div>

            </form>
        </div>
    </div>
    



<!-- Bootstrap JS and jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function () {
    let select_question = '';

    // Open Edit Consultation Modal
    $('#editConsultationBtn').on('click', function () {
      $('#editConsultationModal').modal('show');
    });

    // Open Add Diagram Modal
    $('#addDiagramBtn').on('click', function () {
      $('#addDiagramModal').modal('show');
    });

    // Handle Diagram Selection
    $('.diagram-img').on('click', function () {
      $('.diagram-img').removeClass('selected');
      $(this).addClass('selected');
      select_question = $(this).data('diagram');
    });

    // Submit Diagram Selection
    // $('#submitDiagramBtn').on('click', function () {
    //   if (select_question) {
    //     $('#select_question').html(`<p>Selected Diagram: <strong>${select_question}</strong></p>`);
    //     $('#addDiagramModal').modal('hide');
    //   } else {
    //     alert('Please select a diagram.');
    //   }
    // });

    // Save Consultation
    $('#saveConsultationBtn').on('click', function () {
      const complaint = $('#complaintInput').val();
      if (!complaint) {
        alert('Please enter a complaint.');
        return;
      }
      alert(`Complaint: ${complaint}\nSelected Diagram: ${select_question}`);
      $('#editConsultationModal').modal('hide');
    });
  });
</script>


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
    .scrollbar
{

    max-height: 96%;
    overflow: auto;
}

    .selected-card {
    background-color: pink;
}

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

    //             var notes = 
    // data.first_name + ' ' + data.last_name + ', ' +
    // 'Created on: ' + data.create_date + '\n' +
    // 'Consultation Type: ' + data.consultation_type + '\n' +
    // 'Consultation Date: ' + data.consultation_date + '\n' +
    // 'Presenting Complaint: ' + data.presenting_complaint + '\n' +
    // 'Comment: ' + data.comment + '\n' +
    // 'Relationship: ' + data.relationship + '\n' +
    // 'diagram:';
   
   
    var notes = 
    data.first_name + ' ' + data.last_name + ',\n</br> ' +
    '<b>Created on: </b>' + data.create_date + '\n</br>' +
    '<b>Consultation Type: </b>' + data.consultation_type + '\n</br>' +
    '<b>Consultation Date: </b>' + data.consultation_date + '\n</br>' +
    '<b>Presenting Complaint: </b>' + data.presenting_complaint + '\n</br>' +
    '<b>Comment: </b>' + data.comment + '\n</br>' +
    '<b>Relationship: </b>' + data.relationship + '\n</br>' +
    '<b>Allergy Search: </b>' + data.allergy_search + '\n</br>' +
    '<b>Allergy Comment: </b>' + data.allergy_comment + '\n</br>' +
    '<b>Severity: </b>' + data.severity + '\n</br>' +
    '<b>Examination Comment: </b>' + data.examination_comment + '\n</br>' +
    '<b>Family History: </b>' + data.family_comment + '\n</br>' +
    '<b>Medication Type: </b>' + data.medication_type + '\n</br>' +
    '<b>Social Comment: </b>' + data.social_comment + '\n</br>' +
    '<b>Problem Heading: </b>' + data.problem_heading_search + '\n</br>' +
    '<b>Problem Comment: </b>' + data.problem_comment + '\n</br>' +
    '<b>Product Comment: </b>' + data.product_comment + '\n</br>' +
    '<b>Doctor Name: </b>' + data.doctor_name + '\n</br>' +            // Add Doctor Name
    '<b>Allergy Severity: </b>' + data.allergy_severity + '\n</br>' +  // Add Allergy Severity
    '<b>Examination Value: </b>' + data.examination_value + '\n</br>' + // Add Examination Value
    '<b>Medical History Since: </b>' + data.medical_history_since + '\n</br>' + // Add Medical History Since
    '<b>diagram:</b>';

$('.note-content').html(notes);
var myArray = jQuery.parseJSON(data.diagram_url);

const images = myArray;

// Get the container element
const container = document.getElementById('diagram_image');

// Clear previous images
container.innerHTML = ''; // Removes all existing images

// Add new images from myArray
images.forEach(image => {
    const img = document.createElement('img');
    img.src = image;
    
    // Set width and height
    img.style.width = '200px';  // Adjust as needed
    img.style.height = '150px'; // Adjust as needed

    // Append the image to the container
    container.appendChild(img);
});


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
// $('.note-content').html(notes);


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
                
                var presenting_type = data.presenting_type; 
                var product_type = data.product_type; 
                var medication_type = data.medication_type; 
                var social_type = data.social_type; 
                var family_type = data.family_type; 
                var medical_type = data.medical_type; 
                var allergy_type = data.allergy_type; 
                var examination_type = data.examination_type; 
                var problem_type = data.problem_type; 
                var comments_type = data.comments_type; 
                var diagram_type = data.diagram_type; 
                var allergy_search = data.allergy_search; 
                var allergy_comment = data.allergy_comment; 
                var allergy_severity = data.allergy_severity; 
                var examination_search = data.examination_search; 
                var examination_comment = data.examination_comment; 
                var examination_value = data.examination_value; 
                var family_comment = data.family_comment; 
                var family_search = data.family_search; 
                var medical_his_search = data.medical_his_search; 
                var medical_history_since = data.medical_history_since; 
                var medical_history_condition_type = data.medical_history_condition_type; 
                var medical_history_condition_significance = data.medical_history_condition_significance; 
                var medical_history_comment = data.medical_history_comment; 

                var medical_history_type = data.medical_history_type; 
                var medication_search = data.medication_search; 
                var medication_since = data.medication_since; 
                var medication_condition_type = data.medication_condition_type; 
                var medication_condition_significance = data.medication_condition_significance; 
                var medication_comment = data.medication_comment; 
                var problem_heading_search = data.problem_heading_search; 
                var problem_since = data.problem_since; 
                var problem_condition_type = data.problem_condition_type; 
                var problem_condition_significance = data.problem_condition_significance; 
                var problem_comment = data.problem_comment; 
                var problem_heading_type = data.problem_heading_type; 
                var product_search = data.product_search; 
                var product_since = data.product_since;
                var product_condition_type = data.product_condition_type;
                var product_condition_significance = data.product_condition_significance;
                var product_comment = data.product_comment;
                var social_search = data.social_search;
                var social_since = data.social_since;
                var social_condition_type = data.social_condition_type;
                var social_condition_significance = data.social_condition_significance;
                var social_comment = data.social_comment;
 
                var myArray = jQuery.parseJSON(data.diagram_url);
                const diagram = document.getElementById('edit_diagram');
                diagram.innerHTML = ''; // Clears any existing content

                myArray.forEach(image => {
                    const img = document.createElement('img');
                    img.src = image;
                    img.style.width = '120px';
                    img.style.height = '120px';
                    img.style.border= '1px dotted gray';
                    img.style.padding= '15px';
                    diagram.appendChild(img); // Append the image to the 'edit_diagram' container
                });

                $('#presenting_complaint').val(presenting_complaint);
                // $('#since').val(since);
                $('.medication-since').val(medication_since);
                $('.product-since').val(product_since);
                $('.social-since').val(social_since);
                $('.medical-history-since').val(medical_history_since);
                $('.problem-heading-since').val(problem_since);
               

                // $('#condition_type').val(condition_type);
                $('.problem-heading-condition-type').val(problem_condition_type);
                $('.medical-history-condition-type').val(medical_history_condition_type);
                $('.social-condition-type').val(social_condition_type);
                $('.medication-condition-type').val(medication_condition_type);
                $('.product-condition-type').val(product_condition_type);

                // $('#comment').val(comment);

                $('.problem-heading-comment').val(problem_comment);
                $('.medical-history-comment').val(comment);
                $('.social-comment').val(social_comment);
                $('.medication-comment').val(comment);
                $('.product-comment').val(product_comment);
                // $('#comment').val(comment);
                // $('#comment').val(comment);

                $('#value').val(value);

                $('#consultation_date').val(consultation_date);
                
                // $(".consultation_dates").val(consultation_date).prop("selected", true);       // $('.problem-heading-severity').val(severity);
                // $('.medical-history-severity').val(severity);
                // $('.social-severity').val(severity);
                // $('.medication-severity').val(severity);
                // $('.product-severity').val(severity);

                $("#consultationType option[value='" + consultation_type + "']").prop("selected", true);
                // $('#severity').val(severity);
                // $('#severity').val(severity);

                $('.problem-heading-condition-significance').val(problem_condition_significance);
                $('.medical-history-condition-significance').val(medical_history_condition_significance);
                $('.social-condition-significance').val(social_condition_significance);
                $('.medication-condition-significance').val(medication_condition_significance);
                $('.product-condition-significance').val(product_condition_significance);

                
                // $('#condition_significance').val(condition_significance);

                // $('#relationship').val(relationship);
                $(".family-history-relationship option[value='" + relationship + "']").prop("selected", true);

                $('#showSummary').val(showSummary);
                $('#id').val(id);

                $('#problemSearch').val(problem_heading_search);
                $('#examSearch').val(examination_search);
                $('#allergySearch').val(allergy_search);
                $('#medicalHistorySearch').val(medical_his_search);
                $('#familyHistorySearch').val(family_search);
                $('#socialSearch').val(social_search);
                $('#medicationSearch').val(medication_search);
                $('#productSearch').val(product_search);


                $(".allergy-severity option[value='" + severity + "']").prop("selected", true);

               
                var action = '<button type="button" data-toggle="modal" data-target="#exampleModalEdit" ' +
             'data-whatever="@mdo" data-type="' + data.type + '" data-product_type="' + data.product_type + '" data-medication_type="' + data.medication_type + '" data-social_type="' + data.social_type + '" data-family_type="' + data.family_type + '" data-medical_type="' + data.medical_type + '" data-allergy_type="' + data.allergy_type + '" data-examination_type="' + data.examination_type + '" data-problem_type="' + data.problem_type + '" data-presenting_type="' + data.presenting_type + '" data-comments_type="' + data.comments_type + '" data-diagram_type="' + data.diagram_type + '" data-id="' + data.id + '">Edit</button>';

           

                    $('#edit_consultation_id').html(action);
                    $('#exampleModalEdit').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var type = button.data('type');      // Extract info from data-* attributes
                    var id = button.data('id');          // Extract the consultation id

                    var product_type = button.data('product_type'); 
                    var medication_type = button.data('medication_type'); 
                    var social_type = button.data('social_type'); 
                    var family_type = button.data('family_type'); 
                    var medical_type = button.data('medical_type'); 
                    var allergy_type = button.data('allergy_type'); 
                    var examination_type = button.data('examination_type'); 
                    var problem_type = button.data('problem_type'); 
                    var presenting_type = button.data('presenting_type'); 
                    var comments_type = button.data('comments_type'); 
                    var diagram_type = button.data('diagram_type'); 

                    // Update the modal content with the consultation type and id
                    
                    $('.consultationType').val(type);  // Insert type into modal
                    $('.consultationId').val(id);

                    if(product_type == 'product'){
                            $('#form-product').css("display","block");
                    }
                    if(medication_type == 'medication'){
                            $('#form-medication').css("display","block");
                    }
                    if(social_type == 'social'){
                            $('#form-social').css("display","block");
                    }
                    if(family_type == 'family_history'){
                            $('#form-family-history').css("display","block");
                    }
                    if(medical_type == 'medical_history'){
                            $('#form-medical-history').css("display","block");
                    }
                    if(allergy_type == 'allergy'){
                            $('#form-allergy').css("display","block");
                    }
                    if(examination_type == 'examination'){
                            $('#form-exam').css("display","block");
                    }
                    if(problem_type == 'problem_heading'){
                            $('#form-problem').css("display","block");
                    }
                    if(presenting_type == 'presenting_complaint'){
                            $('#form-complaint').css("display","block");
                    }
                    if(comments_type == 'comment'){
                            $('#form-comment').css("display","block");
                    }
                    if(diagram_type == 'diagram'){
                            $('#form-diagram').css("display","block");
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

    $('#submitDiagramBtn').on('click', function () {
      if (diagramName) {
        // $('#select_question').html(`<p>Selected Diagram: <strong>${diagramName}</strong></p>`);
        $("#select_question").append('<input type="hidden" name="patient_diagram[]" value="' + diagramName + '">');
        $("#select_question").append('<input type="hidden" name="question[]" value="' + diagramName + '">');

        $("#select_question").append('<img width="150px" src="' + diagramName + '" alt="Selected Question Image">');

        // $('#addDiagramModal').modal('hide');
      } else {
        alert('Please select a diagram.');
      }
    });

    // alert(diagramName);
    // var diagramvalue = val('#question');
    document.getElementById('question').value = diagramName;
    document.getElementById('selected_diagram').value = diagramName;

    document.querySelectorAll('.card').forEach(card => card.classList.remove('selected-card'));

    // Add the 'selected-card' class to the clicked card
    event.currentTarget.classList.add('selected-card');


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


    $('#submitDiagramBtn').on('submit', function(event) {
        event.preventDefault();
        var selectQuestion = $('select#question').find(':selected').val();

        $("#addQuestion").append('<div style="padding-top: 15px;"><i class="fa fa-bars"></i> ' + selectQuestion + ' <button type="button" class="btn btn-danger" style="float: right;">Delete</button></div>');
        
        $("#select_question").append('<input type="text" name="question[]" value="' + selectQuestion + '">');

        $("#select_question").append('<img width="50px" src="' + selectQuestion + '" alt="Selected Question Image">');
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
