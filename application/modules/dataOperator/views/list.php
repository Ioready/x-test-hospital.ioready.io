<!-- Page content -->
<div id="page-content"  style="background-color: whitesmoke;">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($model); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Quick Stats -->
    <div class="block_list full">

        <!--        <div class="row text-center">
                    <div class="col-sm-6 col-lg-3">
                        <a href="<?php echo base_url() ?>vendors/index/No" class="widget widget-hover-effect2">
                            <div class="widget-extra themed-background">
                                <h4 class="widget-content-light"><strong> Inactivate </strong> Vendors</h4>
                            </div>
                            <div class="widget-extra-full">
                                <span class="h2 animation-expandOpen"><?php echo $inactive_vendors; ?></span></div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="<?php echo base_url() ?>vendors/index/Yes" class="widget widget-hover-effect2">
                            <div class="widget-extra themed-background-dark">
                                <h4 class="widget-content-light"><strong> Activated </strong> Vendors</h4>
                            </div>
                            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo $active_vendors; ?></span></div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
        
                    </div>
                    <div class="col-sm-6 col-lg-3">
        
                    </div>
                </div>-->

    </div>
    <!-- END Quick Stats -->

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
                    if ($menu_name == 'Doctor') { 
                    if($menu_create =='1'){ ?>


        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
           
                <h2>
                    
                    <a href="<?php echo base_url() .'index.php/'. $this->router->fetch_class(); ?>/open_model"  class="btn btn-sm btn-primary  fw-bold" style="background:#337ab7;">
                        <i class="gi gi-circle_plus M-2"></i> <?php echo $title; ?>
                    </a></h2>
           
        </div>

        <?php } if($menu_view =='1'){?>
        <!-- <div class="content-header">
            <ul class="nav-horizontal text-center">
                <li class="<?php echo ($this->uri->segment(3) == "No") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url() ?>vendors/index/No"><i class="fa fa-times"></i> Unverified Vendors</a>
                </li>
                <li class="<?php echo ($this->uri->segment(3) == "Yes") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url() ?>vendors/index/Yes"><i class="gi gi-check"></i> Verified Vendors</a>
                </li>
            </ul>
        </div> -->

        <div class="table-responsive">
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:13px;">Sr. No</th>
                        <!--                                <th><?php echo "Referral Code"; ?></th>-->
                        <th class="text-center" style="font-size:13px;"><?php echo "Name"; ?></th>
                        <th class="text-center" style="font-size:13px;"><?php echo "Care Unit"; ?></th>
                        <th class="text-center" style="font-size:13px;"><?php echo lang('user_email'); ?></th>
                        <!--  <th class="text-center"><?php echo "Phone"; ?></th>-->
                        <!--  <th><?php echo "DOB"; ?></th> -->
                        <!--                                <th><?php echo "Current Password"; ?></th>-->
                        <!--                                <th><?php echo lang('profile_image'); ?></th>-->
                        <th class="text-center">Created Date</th>
                        <!--                                <th><?php //echo lang('user_createdate');     ?></th>-->
                        <th class="text-center"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($list) && !empty($list)):
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;
                            ?>
                            <tr>
                                <td ><strong><?php echo $rowCount; ?></strong></td>        
                                <!--                            <td><?php echo $rows->team_code; ?></td>-->
                                <td ><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
                                <td ><?php echo (!empty($rows->name)) ?  $rows->name . '(' . $rows->care_unit_code.')' : ''; ?></td>
                                <td><?php echo $rows->email ?></td>
                                <!-- <td class="text-center"><?php echo $rows->phone ?></td>-->
                                <!-- <td><?php echo ($rows->date_of_birth != null) ? date('d-m-Y', strtotime($rows->date_of_birth)) : ""; ?></td> -->
                                <!-- <td><?php echo $rows->is_pass_token; ?></td>-->
                                <!-- <td><img width="100" src="<?php
                                if (!empty($rows->profile_pic)) {
                                    echo base_Url()
                                    ?><?php
                                    echo $rows->profile_pic;
                                } else {
                                    echo base_url() . DEFAULT_NO_IMG_PATH;
                                }
                                ?>" /></td>-->
                                <td class="text-center"><?php echo date('m/d/Y', $rows->created_on); ?></td>
                                <!--  <td class="text-center"><?php
                                if ($rows->vendor_profile_activate == "Yes") echo '<p class="text-success">Verified</p>';
                                else echo '<p  class="text-danger">Unverified</p>';
                                ?></td>-->
                                            <!--<td><?php //echo date('d F Y',$rows->created_on);     ?></td>-->
                                <td class="actions text-center" >
                                    <div class="btn-group btn-group-xs">
                                    <?php if($menu_update =='1'){?>
                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-default" onclick="editFn('vendors','vendor_edit','<?php echo encoding($rows->id); ?>');"><i class="fa fa-pencil"></i></a> -->
                                        <a href="<?php echo base_url() . 'dataOperator/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>

                                        
                                            <?php                
                                                
                                                if ($rows->active == 1) {
                                                    ?>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Inactive Now"><i class="fa fa-check"></i> Active</a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Active Now"><i class="fa fa-times"></i> Inactive</a>
                                                <?php }}if($menu_delete =='1'){?>
                                                <a href="javascript:void(0)" data-toggle="tooltip"   onclick="deleteFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'dataOperator', 'index.php/dataOperator/delVendors','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            <?php }
                                            ?>
                        <!-- <a href="<?php echo base_url() . 'vendors/paymentList/' . $rows->id; ?>" class="btn btn-sm btn-primary">Client List</a> -->
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>

        <?php }}}} if($this->ion_auth->is_facilityManager()){?>

            <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <?php if ($this->ion_auth->is_admin() OR $this->ion_auth->is_facilityManager()) { ?>
                <h2>
                    
                    <a href="<?php echo base_url() .'index.php/'. $this->router->fetch_class(); ?>/open_model"  class="btn btn-sm btn-primary  fw-bold" style="background:#337ab7;">
                        <i class="gi gi-circle_plus M-2"></i> <?php echo $title; ?>
                    </a></h2>
            <?php }else if($this->ion_auth->is_facilityManager()) { ?>
                <h2>
                    <?php echo "<b>Doctor </b>Panel" ?>
                </h2>

            <?php } ?>
        </div>
        <!-- <div class="content-header">
            <ul class="nav-horizontal text-center">
                <li class="<?php echo ($this->uri->segment(3) == "No") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url() ?>vendors/index/No"><i class="fa fa-times"></i> Unverified Vendors</a>
                </li>
                <li class="<?php echo ($this->uri->segment(3) == "Yes") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url() ?>vendors/index/Yes"><i class="gi gi-check"></i> Verified Vendors</a>
                </li>
            </ul>
        </div> -->
        <div class="table-responsive">
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:13px;">Sr. No</th>
                        <!--                                <th><?php echo "Referral Code"; ?></th>-->
                        <th class="text-center" style="font-size:13px;"><?php echo "Name"; ?></th>
                        <th class="text-center" style="font-size:13px;"><?php echo "Care Unit"; ?></th>
                        <th class="text-center" style="font-size:13px;"><?php echo lang('user_email'); ?></th>
                        <!--  <th class="text-center"><?php echo "Phone"; ?></th>-->
                        <!--  <th><?php echo "DOB"; ?></th> -->
                        <!--                                <th><?php echo "Current Password"; ?></th>-->
                        <!--                                <th><?php echo lang('profile_image'); ?></th>-->
                        <th class="text-center">Created Date</th>
                        <!--                                <th><?php //echo lang('user_createdate');     ?></th>-->
                        <th class="text-center"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($list) && !empty($list)):
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;
                            ?>
                            <tr>
                                <td ><strong><?php echo $rowCount; ?></strong></td>        
                                <!--                            <td><?php echo $rows->team_code; ?></td>-->
                                <td ><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
                                <td ><?php echo (!empty($rows->name)) ?  $rows->name . '(' . $rows->care_unit_code.')' : ''; ?></td>
                                <td><?php echo $rows->email ?></td>
                                <!-- <td class="text-center"><?php echo $rows->phone ?></td>-->
                                <!-- <td><?php echo ($rows->date_of_birth != null) ? date('d-m-Y', strtotime($rows->date_of_birth)) : ""; ?></td> -->
                                <!-- <td><?php echo $rows->is_pass_token; ?></td>-->
                                <!-- <td><img width="100" src="<?php
                                if (!empty($rows->profile_pic)) {
                                    echo base_Url()
                                    ?><?php
                                    echo $rows->profile_pic;
                                } else {
                                    echo base_url() . DEFAULT_NO_IMG_PATH;
                                }
                                ?>" /></td>-->
                                <td class="text-center"><?php echo date('m/d/Y', $rows->created_on); ?></td>
                                <!--  <td class="text-center"><?php
                                if ($rows->vendor_profile_activate == "Yes") echo '<p class="text-success">Verified</p>';
                                else echo '<p  class="text-danger">Unverified</p>';
                                ?></td>-->
                                            <!--<td><?php //echo date('d F Y',$rows->created_on);     ?></td>-->
                                <td class="actions text-center" >
                                    <div class="btn-group btn-group-xs">
                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-default" onclick="editFn('vendors','vendor_edit','<?php echo encoding($rows->id); ?>');"><i class="fa fa-pencil"></i></a> -->
                                        <a href="<?php echo base_url() . 'dataOperator/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>

                                        <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_facilityManager()) { ?>
                                            <?php
                                            if ($rows->id != 1) {
                                                if ($rows->active == 1) {
                                                    ?>
                                                                                <!--                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="statusFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->active; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>-->
                                                <?php } else { ?>
                                                                                <!--                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="statusFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->active; ?>')" title="Active Now"><i class="fa fa-times"></i></a>-->
                                                    <?php
                                                }
                                                if ($rows->active == 1) {
                                                    ?>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Inactive Now"><i class="fa fa-check"></i> Active</a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Active Now"><i class="fa fa-times"></i> Inactive</a>
                                                <?php } ?>
                                                <a href="javascript:void(0)" data-toggle="tooltip"   onclick="deleteFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'dataOperator', 'index.php/dataOperator/delVendors','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            <?php }
                                            ?>
                        <!-- <a href="<?php echo base_url() . 'vendors/paymentList/' . $rows->id; ?>" class="btn btn-sm btn-primary">Client List</a> -->
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }endforeach;
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