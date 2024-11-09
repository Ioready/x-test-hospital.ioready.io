<!-- Page content -->
<div id="page-content"  style="background-color: whitesmoke;">
    
    <!-- <div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li class="fw-bold">
            <a href="<?php echo site_url($parent); ?>"><?php echo $title; ?></a>
        </li>
    </ul> -->
    <div class="block_list full">
    <div class="row text-center">
        
        <div class="col-sm-4 col-lg-2 mb-3">
            <a href="<?php echo base_url()."careUnit/";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 10px; ">
                <div class="widget-extra themed-background-dark"   style="background:#337ab7;">
                    <h4 style="font-size:14px; font-weight:600; color:white;">Department</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
            </a>
        </div>
        <div class="col-sm-4 col-lg-2 mb-3">
            <a href="<?php echo base_url()."letters";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Letters</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
       
        <!-- <div class="col-sm-4 col-lg-2 mb-3">
        <a href="<?php echo base_url()."invoices";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">invoices</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div> -->


        <div class="col-sm-6 col-lg-2 mb-3">
        <a href="<?php echo base_url()."initialDx";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Diagnosis</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."initialRx";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Antibiotic</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."precautions";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Precautions</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."cultureSource";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Lab</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."organism";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">organism</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
        
        
        
    </div>


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
                    if ($menu_name == 'Department') { 
                    if($menu_create =='1'){ ?>


<div class="block-title">

<?php foreach($careUnit_user_id as $value){

    $user_idddd = $value->facility_user_id;
}

//print_r($user_idddd);die;
?>
    <h2><strong><?php echo $title; ?></strong> Panel</h2>
    <?php //if ($this->ion_auth->is_admin()) { ?>
        
        <!-- <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')"  class="btn btn-sm btn-primary  fw-bold" style="background:#337ab7;">
                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
            </a></h2> -->
    
        <!-- <h2><a href="javascript:void(0)" onclick="open_modal('<?php echo $model; ?>')"  class="btn btn-sm btn-primary  fw-bold" style="background:#337ab7;">
                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
      </a></h2> -->

        <?php //}else if(($this->ion_auth->is_facilityManager()) && $user_idddd!=''){ ?>
        <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')"  class="btn btn-sm btn-primary  fw-bold" style="background:#337ab7;">
                <i class="gi gi-circle_plus m-2"></i><?php echo $title; ?>
      </a></h2>

</div>

<?php } if($menu_view =='1'){ ?>

<div class="table-responsive">
    <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
        <thead>
            <tr>
                <th class="text-center"  style="font-size:13px;">Sr. No</th>
                <th class="text-center" style="font-size:13px;">Care Unit Code</th>
                <th class="text-center" style="font-size:13px;">Name</th>
                <th class="text-center" style="font-size:13px;">Email</th>
              <?php if($this->ion_auth->is_admin()){?>
                <th><?php echo lang('action'); ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
           // print_r($careUnit);die;
            if (!empty($careUnit)){

                $rowCount = 0;
                foreach ($careUnit as $rows){
                    // print_r($rows);die;
                    $rowCount++;
                    ?>
                    <tr>
                        <td><?php echo $rowCount; ?></td>
                        <td><?php echo $rows->care_unit_code; ?></td>           
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->email; ?></td>
                       
                        <td class="actions">
                        <?php if($menu_update =='1'){ ?>
                            <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                            <?php  if ($rows->is_active == 1) { ?>
                                <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                            <?php } else { ?>
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                            
                                <?php } } if($menu_delete =='1'){ ?>
                            <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            <?php } ?>
                            
                        </td>
                    </tr>
                    <?php
               }
            }else if($this->ion_auth->is_facilityManager()){
                $rowCount = 0;
                foreach ($careUnit as $rows){
                    // print_r($rows);die;
                    $rowCount++;
                    ?>
                    <tr>
                        <td><?php echo $rowCount; ?></td>
                        <td><?php echo $rows->care_unit_code; ?></td>           
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->email; ?></td>
                       <!--  <td class="actions">
                            <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                            <?php if ($rows->is_active == 1) { ?>
                                <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                            <?php } else { ?>
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                            <?php } ?>
                            <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </td> -->
                    </tr>
                    <?php
               }

            }else{ 
                $rowCount = 0;
                foreach ($list as $rows){
                    $rowCount++;
                    // print_r($rows);die;
                    ?>
<tr>
                        <td><?php echo $rowCount; ?></td>
                        <td><?php echo $rows->care_unit_code; ?></td>           
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->email; ?></td>
                        <td class="actions">
                        <?php } if($menu_update =='1'){ ?>
                            <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                            <?php  if ($rows->is_active == 1) { ?>
                                <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                            <?php } else { ?>
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                            <?php } } if($menu_delete =='1'){ ?>
                            <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
          <?php   } }
            ?>
        </tbody>
    </table>
</div>
</div>
<!-- END Datatables Content -->
</div>


<?php }}} if($this->ion_auth->is_facilityManager()){?>

    <div class="block-title">

        <?php foreach($careUnit_user_id as $value){

            $user_idddd = $value->facility_user_id;
        }

        //print_r($user_idddd);die;
        ?>
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <?php if ($this->ion_auth->is_admin()) { ?>
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')"  class="btn btn-sm btn-primary  fw-bold" style="background:#337ab7;">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            <?php }else if(($this->ion_auth->is_facilityManager()) &&  $user_idddd =='') { ?>
               
                <h2><a href="javascript:void(0)" onclick="open_modal('<?php echo $model; ?>')"  class="btn btn-sm btn-primary  fw-bold" style="background:#337ab7;">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
              </a></h2>

                <?php }else if(($this->ion_auth->is_facilityManager()) && $user_idddd!=''){ ?>
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')"  class="btn btn-sm btn-primary  fw-bold" style="background:#337ab7;">
                        <i class="gi gi-circle_plus m-2"></i><?php echo $title; ?>
              </a></h2>
            <?php } ?>
        </div>
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center"  style="font-size:13px;">Sr. No</th>
                        <th class="text-center" style="font-size:13px;">Care Unit Code</th>
                        <th class="text-center" style="font-size:13px;">Name</th>
                        <th class="text-center" style="font-size:13px;">Email</th>
                      <?php if($this->ion_auth->is_admin()){?>
                        <th><?php echo lang('action'); ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   // print_r($careUnit);die;
                    if (!empty($careUnit)){

                        $rowCount = 0;
                        foreach ($careUnit as $rows){
                            // print_r($rows);die;
                            $rowCount++;
                            ?>
                            <tr>
                                <td><?php echo $rowCount; ?></td>
                                <td><?php echo $rows->care_unit_code; ?></td>           
                                <td><?php echo $rows->name; ?></td>
                                <td><?php echo $rows->email; ?></td>
                               <!--  <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    <?php if ($rows->is_active == 1) { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td> -->
                            </tr>
                            <?php
                       }
                    }else if($this->ion_auth->is_facilityManager()){
                        $rowCount = 0;
                        foreach ($careUnit as $rows){
                            // print_r($rows);die;
                            $rowCount++;
                            ?>
                            <tr>
                                <td><?php echo $rowCount; ?></td>
                                <td><?php echo $rows->care_unit_code; ?></td>           
                                <td><?php echo $rows->name; ?></td>
                                <td><?php echo $rows->email; ?></td>
                               <!--  <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    <?php if ($rows->is_active == 1) { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td> -->
                            </tr>
                            <?php
                       }

                    }else{ 
                        $rowCount = 0;
                        foreach ($list as $rows){
                            $rowCount++;
                            // print_r($rows);die;
                            ?>
<tr>
                                <td><?php echo $rowCount; ?></td>
                                <td><?php echo $rows->care_unit_code; ?></td>           
                                <td><?php echo $rows->name; ?></td>
                                <td><?php echo $rows->email; ?></td>
                                <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    <?php if ($rows->is_active == 1) { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                  <?php   } }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<?php }?>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>
