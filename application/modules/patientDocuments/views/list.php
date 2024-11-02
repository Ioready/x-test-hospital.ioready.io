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
.folder-name{
    font-size: medium;
    font-weight: 900;
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
            <!-- </div> -->
        

    


    <!-- Datatables Content -->


    <div class="row mt-4">
    <div class="col-md-12">
        <div class="">
            <div class="card-body p-4" style="background-color:#FFFF; border-radius:6px">
            <div class="row">
                    <div class="col-md-11">
                        <h4 class="no-margins fw-bold"><?php echo $results->patient_name; ?></h4>
                        <h6 class="text-dark fw-bold"><?php 
                        $from = new DateTime($results->date_of_birth);
                        $to   = new DateTime('today');
                       
                        echo $results->date_of_birth.'  |  '.$from->diff($to)->y.' Years  |  '.$results->gender;?></h6>
                        <!-- <button type="button" class="btn btn-sm btn-primary save-btn btn-xs">Public</button> -->
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
                    if ($menu_name == 'Patient Documents') { 
                 if ($menu_create =='1') { ?>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="">
                            <div class="card-body p-4" style="background-color:#FFFF; border-radius:6px">
                                <div class="row">
                            
                                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">

                                <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle save-btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                                    New
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="dropdown-item" id="patient_ids">
                            <b> New Folder </b>
                                    </a>
                                    <a href="javascript:void(0)"  onclick="open_modal_documents('<?php echo $model; ?>')" class="dropdown-item" id="patient_ids">
                            <b> Upload File</b></a>
                                </div>
                                </div>

                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } if($menu_view =='1'){?>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="">
                    <div class="card-body p-4" style="background-color:#FFFF; border-radius:6px">
                        <div class="row">
                    
                                <?php foreach($list as $folder){ ?>
                                <div class="col-sm-8 col-md-10">
                                <input type="hidden" name="folder_id" id="folder_id" value="<?php echo $folder->id;?>">

                                <?php if(!empty($results_files)){?>
                                <a href="javascript:void(0)"  onclick="open_modal_documents_gallery('<?php echo $modelFileGallery; ?>')" class="dropdown-item" id="patient_ids">
                                <i class="fas fa-folder" styple=""></i> 
                                <span class="folder-name"><Strong> <?php echo $folder->folder_name; ?></Strong></span> <br>
                                <span>Created <Strong> <?php $createAt = date_format(date_create($folder->create_date), 'd/m/Y'); 
                                echo $createAt; ?></Strong></span>
                                </a>
                                <?php }else{?>
                                    <i class="fas fa-folder" styple=""></i> 
                                <span class="folder-name"><Strong> <?php echo $folder->folder_name; ?></Strong></span> <br>
                                <span>Created <Strong> <?php $createAt = date_format(date_create($folder->create_date), 'd/m/Y'); 
                                echo $createAt; ?></Strong></span>
                                    <?php }?>
                                </div>

                                <div class="col-sm-2 col-md-2">
                            ....  
                            <i class="fas fa-thin fa-star"></i>
                                </div>
                                <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php }}}} if($this->ion_auth->is_facilityManager()){?>

    <div class="row mt-4">
    <div class="col-md-12">
  

        <div class="">
            <div class="card-body p-4" style="background-color:#FFFF; border-radius:6px">
                <div class="row">
            <?php if ($this->ion_auth->is_facilityManager()) { ?>
                
                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">

                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle save-btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                    New
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="dropdown-item" id="patient_ids">
               <b> New Folder </b>
                    </a>
                    <a href="javascript:void(0)"  onclick="open_modal_documents('<?php echo $model; ?>')" class="dropdown-item" id="patient_ids">
               <b> Upload File</b></a>
                </div>
                </div>

            <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mt-4">
    <div class="col-md-12">
        <div class="">
            <div class="card-body p-4" style="background-color:#FFFF; border-radius:6px">
                <div class="row">
            
                        <?php foreach($list as $folder){ ?>
                        <div class="col-sm-8 col-md-10">
                        <input type="hidden" name="folder_id" id="folder_id" value="<?php echo $folder->id;?>">

                        <?php if(!empty($results_files)){?>
                        <a href="javascript:void(0)"  onclick="open_modal_documents_gallery('<?php echo $modelFileGallery; ?>')" class="dropdown-item" id="patient_ids">
                        <i class="fas fa-folder" styple=""></i> 
                        <span class="folder-name"><Strong> <?php echo $folder->folder_name; ?></Strong></span> <br>
                        <span>Created <Strong> <?php $createAt = date_format(date_create($folder->create_date), 'd/m/Y'); 
                        echo $createAt; ?></Strong></span>
                        </a>
                        <?php }else{?>
                            <i class="fas fa-folder" styple=""></i> 
                        <span class="folder-name"><Strong> <?php echo $folder->folder_name; ?></Strong></span> <br>
                        <span>Created <Strong> <?php $createAt = date_format(date_create($folder->create_date), 'd/m/Y'); 
                        echo $createAt; ?></Strong></span>
                            <?php }?>
                        </div>

                        <div class="col-sm-2 col-md-2">
                       ....  
                       <i class="fas fa-thin fa-star"></i>
                        </div>
                        <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php }?>
<br>
<br>

    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>

<script>
    $(document).ready(function() {
  $('#patient_ids').click(function() {
   var patientsdata = $('#patient_id').val();
  
  $('#patient_id_data').val(patientsdata);

  });
});
</script>
