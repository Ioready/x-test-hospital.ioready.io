<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('contestUs'); ?>">Contact List</a>
        </li>
    </ul>
    <!-- END Datatables Header -->

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
                    if ($menu_name == 'Contacts') { 
                       if ($menu_create =='1') {
            ?>

        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
           
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            

            <!-- <?php //} else if($this->ion_auth->is_subAdmin()){?>
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>

                <?php //} ?> -->
        </div>
        <?php }  if ($menu_view =='1') {?>
        
        <div class="block-title">
            <h2><strong>Contact</strong> List</h2>
        </div>
        <div class="table-responsive">
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo lang('serial_no'); ?></th>
                        <th>Full Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <!--<th class="text-center">Subject</th>
                        <th>Message</th>-->
                        <th>Contact Date</th>
                        <th>Action</th>
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
                                <td class="text-center"><?php echo $rowCount; ?></td>        
                                <td class="text-center"><?php echo $rows->full_name; ?></td>
                                <td class="text-center"><?php echo $rows->email; ?></td>
                                <td class="text-center"><?php echo $rows->phone; ?></td>
                                 <!--<td class="text-center"><?php echo $rows->subject; ?></td>
                                <td class="text-center"><?php echo $rows->message; ?></td>-->
                                <td class="text-center"><?php echo $rows->created_date; ?></td>
                                <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('contestUs', 'view', '<?php echo $rows->id ?>', 'menuCategory');"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>

        <?php }}}} if($this->ion_auth->is_facilityManager()){?>

            <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <?php if ($this->ion_auth->is_facilityManager()) { ?>
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            

            <?php } else if($this->ion_auth->is_subAdmin()){?>
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>

                <?php } ?>
        </div>

        
        <div class="block-title">
            <h2><strong>Contact</strong> List</h2>
        </div>
        <div class="table-responsive">
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo lang('serial_no'); ?></th>
                        <th>Full Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <!--<th class="text-center">Subject</th>
                        <th>Message</th>-->
                        <th>Contact Date</th>
                        <th>Action</th>
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
                                <td class="text-center"><?php echo $rowCount; ?></td>        
                                <td class="text-center"><?php echo $rows->full_name; ?></td>
                                <td class="text-center"><?php echo $rows->email; ?></td>
                                <td class="text-center"><?php echo $rows->phone; ?></td>
                                 <!--<td class="text-center"><?php echo $rows->subject; ?></td>
                                <td class="text-center"><?php echo $rows->message; ?></td>-->
                                <td class="text-center"><?php echo $rows->created_date; ?></td>
                                <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('contestUs', 'view', '<?php echo $rows->id ?>', 'menuCategory');"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;
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


