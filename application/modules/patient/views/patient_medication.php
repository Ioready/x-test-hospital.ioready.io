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



#framework{
  height:40px;
  overflow-y:auto;
    width:50px;
}
/* option{
  overflow-y:scroll;
} */

.open> .dropdown-menu {
    display: block;
    height: 164px;
    overflow-y: auto;
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
                <a href="<?php echo base_url(). 'index.php/patient/patientMedication?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Medications</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>

                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Letters and forms</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Prescriptions</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
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
                <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
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
                    if ($menu_name == 'Medications') { 
                       if ($menu_create =='1') {
                     ?>
          <div class="block-title">
                    <h2 class="save-btn">
                    <a href="javascript:void(0)"  onclick="open_model_medication('<?php echo $model_medicine; ?>')" class="btn btn-sm btn-primary" style="background: #337ab7;">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a>
                    </h2>
               
          </div>

        <div class="block-title">
            <h2><strong><?php echo 'Medication';?></strong> Panel</h2>
        </div>

        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
            <!-- <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
            </div> -->

            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
            
                                <div class="col-md-12">
                                <!-- <h2>Users</h2> -->
                            <form id="timeSlotForm" action="submit.php" method="post">
                                    
                            <div style="overflow-x: auto; overflow-y: auto; width: auto; height: auto;">

                           
                            
                        </div>
                    </div>

                     <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <label class="col-md-3 control-label">Doctor Name:</label> -->
                            <div class="col-md-9">
                           
                        <input type="hidden" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo $userData->id; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" >
                   
                    <div class="space-22"></div>
                </div>
            </div>
            <div class="text-right">
                <!-- <button type="submit" id="submit" class="btn btn-sm btn-primary" >Save</button> -->
            </div>
            
        </form>

        <?php } if ($menu_view =='1') { ?>
        <div class="table-responsive">
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px;">Sr. No</th>
                        <th class="text-center" style="font-size:14px;">Type</th>
                        <th class="text-center" style="font-size:14px;">Name</th>
                        <th class="text-center" style="font-size:14px;">Details</th>
                        <th class="text-center" style="font-size:14px;">Last Recorded</th>
                        <th class="text-center" style="font-size:14px;">Last Prescribed</th>
                        <th class="text-center" style="font-size:14px;">Review</th>
                        <th class="text-center" style="font-size:14px;">Created date</th>
                        <th class="text-center" style="font-size:14px;">Status</th>
                        <th class="text-center" style="font-size:14px;"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    
                    if (!empty($careUnitsUser_list)) {
                        $rowCount = 0;
                        foreach ($careUnitsUser_list as $rows) {
                            $rowCount++;
                           
                    ?>


                            <tr>
                                <td class="text-center" style="font-size:14px;"><?php echo $rowCount; ?></td>
                                <td class="text-center" style="font-size:14px;"><?php echo $rows->internal_name; ?></td>
                                <td class="text-center" style="font-size:14px;"><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                               
                                <td class="actions">
                                <td class="actions">
                                    <!-- <a href="javascript:void(0)" class="btn btn-default" onclick="editFn('index.php/userSettings/open_consult/edit?id=', '<?php echo encoding($rows->id) ?>', 'userSettings/open_consult');"><i class="fa fa-pencil"></i></a> -->
                                                    <a href="<?php echo base_url() . 'userSettings/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-sm  btn-default"><i class="fa fa-eye"></i></a>
                                                                        
                                    <!-- <a href="<?php echo base_url() . 'index.php/userSettings/existing_list/' . $rows->pid; ?>" target='_blank' data-toggle="tooltip" class="btn btn-default">View History</a> -->
                                    <a href="javascript:void(0)" onclick="deletePatient('<?php echo $rows->id; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                </td>

                                </td>
                            </tr>


                        <?php
                        }
                        //}
                    } else {
                        $rowCount = 0;
                        foreach ($list as $rows) :
                            $rowCount++;
                        ?>
                            <tr>
                            <td><?php echo $rowCount; ?></td>
                                <td class="text-center"><?php echo $rows->internal_name; ?></td>

                                <td class="text-center"><?php echo $rows->name; ?></td>
                                <td class="text-center"><?php  
                                $cleanedString = str_replace(array('["', '"]'), '', $rows->question);
                                 echo $cleanedString;?></td>
                                <td class="text-center"><img src="<?php echo $rows->diagram_url; ?>" alt="" width="150px;"></td>

                                <td class="text-center"><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                <td class="text-center"><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                <td class="text-center"><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                <td class="text-center"><?php echo date('m/d/Y', strtotime($rows->status)); ?></td>
                                    <td class="actions text-center">
                                    <!-- <a href="javascript:void(0)" class="btn btn-default" onclick="editFn('index.php/userSettings/open_consult/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a> -->
                                    <a href="<?php echo base_url() . 'userSettings/consultEdit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                                        
                                    <!-- <a href="<?php echo base_url() . 'index.php/userSettings/open_consult/existing_list/' . $rows->pid; ?>" target='_blank' data-toggle="tooltip" class="btn btn-default">View History</a> -->
                                    <a href="javascript:void(0)" onclick="deleteConsult('<?php echo $rows->id; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                    <?php
                        endforeach;
                    }
                    ?>

                </tbody>
            </table>
            </div>
        </div>


        <?php }}} } if($this->ion_auth->is_facilityManager()){ ?>


            <?php }?>
    <!-- END Datatables Content -->

    <div id="form-modal-medicine-box"></div>


    <style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}
</style>
<!-- <div id="commonModalMedicine" class="modal fade lg" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="dataForm" method="post" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                    </div>
                <div class="modal-body">
                    
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Patient Name</label>
                                    <div class="col-md-9">
                                    <h4 class="no-margins fw-bold"><?php echo $results->patient_name; ?></h4>
                                        <input type="text" class="form-control" name="patient_id" id="patient_id" value="<?php echo $results->id; ?>" placeholder="Name" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Type</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" class="form-control" name="type" id="type" placeholder="Type" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" >
                           
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Antibiotic Name</label>
                                    <div class="col-md-9">
                                    <select id="framework" name="initial_rx[]" multiple class="form-control">
                                    
                                    <?php foreach ($initial_rx as $category) { ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div>

                            

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Details</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" class="form-control" name="detail" id="detail" placeholder="detail" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Recorded</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="last_recorded" id="last_recorded" placeholder="Last Recorded" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Prescribed</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="last_prescribed" id="last_prescribed" placeholder="Last Prescribed" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-22"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <input type="submit" id="submit" class="btn btn-sm btn-primary"  value="<?php echo lang('submit_btn');?>">
                </div>
            </form>
        </div> 
    </div>
</div> -->
</div>
<!-- END Page Content -->
<!-- <div id="form-modal-box"></div> -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

<!-- <script type="text/javascript">
  $(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'342px',

 });
});

</script> -->

<script>
        $(document).ready(function() {
            $('#dataForm').on('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                $.ajax({
                    url: '<?= base_url("/patient/add_medicine") ?>', // URL to the controller method
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#response').html(response); // Display response message
                    },
                    error: function(xhr, status, error) {
                        $('#response').html('An error occurred: ' + xhr.responseText);
                    }
                });
            });
        });
</script>



