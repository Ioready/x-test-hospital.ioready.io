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
                <a href="<?php echo base_url(). 'labs?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
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
        <div class="block-title ">
            <h2 class="fw-bold"><strong><?php echo $title; ?></strong> Panel</h2>
            
               
                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary save-btn model-medication" id="<?php echo $patient_id;?>" value="<?php echo $patient_id;?>">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?> 
                    </a></h2>
        </div>
         <?php } if ($menu_view =='1'){ ?>
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                <tr>
                        <th class="text-center" style="font-size:14px;">Sr. No</th>
                        <!-- <th class="text-center" style="font-size:14px;">Type</th> -->
                        <th class="text-center" style="font-size:14px;">Consultation type</th>
                        <th class="text-center" style="font-size:14px;">Search</th>
                        <th class="text-center" style="font-size:14px;">Since</th>
                        <th class="text-center" style="font-size:14px;">Condition Type</th>
                        <th class="text-center" style="font-size:14px;">Condition Significance</th>
                        <th class="text-center" style="font-size:14px;">comment</th>
                        <th class="text-center" style="font-size:14px;">Created date</th>
                        <!-- <th class="text-center" style="font-size:14px;">Status</th> -->
                        <th class="text-center" style="font-size:14px;"><?php echo lang('action'); ?></th>
                    </tr>


                

                    <!-- <tr >
                        <th  class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem;width:15%;;">Sr. No</th>
                        <th  class="text-center fw-bold"  style="background-color:#DBEAFF;font-size:1.3rem;width:60%;;">Name</th>
                        <th  class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('action'); ?></th>
                    </tr> -->
                </thead>
                <tbody>
                    <?php
                    if (isset($list) && !empty($list)):
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;

                            // print_r($rows);die;
                            ?>
                            <tr>
                            

                                <td><?php echo $rowCount; ?></td>            
                                <td><?php echo $rows->doctor_name; ?></td>
                                <td><?php echo $rows->search; ?></td>
                                <td><?php echo $rows->since; ?></td>
                                <td><?php echo $rows->condition_type; ?></td>
                                <td><?php echo $rows->condition_significance; ?></td>
                                <td><?php echo $rows->comment; ?></td>
                                <td><?php echo $rows->create_date; ?></td>
                               

                                <!-- <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    <?php if ($rows->status == 1) { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td> -->

                                <td class="actions">
                                <?php if ($menu_update =='1'){ ?>
                                <a href="javascript:void(0)" class="btn btn-xs" style="color:white; background: linear-gradient(to right, rgba(71, 74, 127, 1) 0%, rgb(43 178 136) 100%);" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');" title="Edit" aria-label="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                <?php } ?>
                                   
                                </td>

                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
        <?php }}} } if($this->ion_auth->is_facilityManager()){ ?>
            <div class="block-title ">
            <h2 class="fw-bold"><strong><?php echo $title; ?></strong> Panel</h2>
            <?php if ($this->ion_auth->is_facilityManager()) { ?>
               
                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary save-btn model-medication" id="<?php echo $patient_id;?>" value="<?php echo $patient_id;?>">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?> 
                    </a></h2>
            <?php } ?>
        </div>
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                <tr>
                        <th class="text-center" style="font-size:14px;">Sr. No</th>
                        <!-- <th class="text-center" style="font-size:14px;">Type</th> -->
                        <th class="text-center" style="font-size:14px;">Consultation type</th>
                        <th class="text-center" style="font-size:14px;">Search</th>
                        <th class="text-center" style="font-size:14px;">Since</th>
                        <th class="text-center" style="font-size:14px;">Condition Type</th>
                        <th class="text-center" style="font-size:14px;">Condition Significance</th>
                        <th class="text-center" style="font-size:14px;">comment</th>
                        <th class="text-center" style="font-size:14px;">Created date</th>
                        <!-- <th class="text-center" style="font-size:14px;">Status</th> -->
                        <th class="text-center" style="font-size:14px;"><?php echo lang('action'); ?></th>
                    </tr>


                

                    <!-- <tr >
                        <th  class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem;width:15%;;">Sr. No</th>
                        <th  class="text-center fw-bold"  style="background-color:#DBEAFF;font-size:1.3rem;width:60%;;">Name</th>
                        <th  class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('action'); ?></th>
                    </tr> -->
                </thead>
                <tbody>
                    <?php
                    if (isset($list) && !empty($list)):
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;

                            // print_r($rows);die;
                            ?>
                            <tr>
                            

                                <td><?php echo $rowCount; ?></td>            
                                <td><?php echo $rows->doctor_name; ?></td>
                                <td><?php echo $rows->search; ?></td>
                                <td><?php echo $rows->since; ?></td>
                                <td><?php echo $rows->condition_type; ?></td>
                                <td><?php echo $rows->condition_significance; ?></td>
                                <td><?php echo $rows->comment; ?></td>
                                <td><?php echo $rows->create_date; ?></td>
                               

                                <!-- <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    <?php if ($rows->status == 1) { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td> -->

                                <td class="actions">
                                <a href="javascript:void(0)" class="btn btn-xs" style="color:white; background: linear-gradient(to right, rgba(71, 74, 127, 1) 0%, rgb(43 178 136) 100%);" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');" title="Edit" aria-label="Edit"><i class="fa fa-pencil"></i> Edit</a>

                                   
                                </td>

                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
            <?php }?>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>

<script>
    $(document).ready(function() {
  $('.model-medication').click(function() {
   
   var id = $(this).attr('id');
//    alert(id);
  $('#patient_id_data').val(id);

  });
});
</script>

<script>
    $(document).ready(function() {
        $("#medicationSearch").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('medications/fetchMedication'); ?>",
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