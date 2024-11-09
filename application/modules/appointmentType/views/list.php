<!-- Page content -->

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
<div id="page-content"  style="background-color: whitesmoke;">
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li class="fw-bold">
            <a href="<?php echo site_url($parent); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
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
                    if ($menu_name == 'Appointment Type') { 
                    if($menu_create =='1'){ ?>
                    <div class="block-title ">
                    <h2 class="fw-bold"><strong><?php echo $title; ?></strong> Panel</h2>

                    <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary save-btn">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
                    </div>
                    <?php }if($menu_view =='1'){ ?>
                    <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th  class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem;width:15%;;">Sr. No</th>
                        <th  class="text-center fw-bold"  style="background-color:#DBEAFF;font-size:1.3rem;width:60%;;">Name</th>
                        <th  class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('action'); ?></th>
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
                                <td><?php echo $rowCount; ?></td>            
                                <td><?php echo $rows->name; ?></td>

                                <td class="actions">
                                    <?php if($menu_update =='1'){?>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    <?php } if ($rows->is_active == 1) { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php }  if($menu_delete =='1'){?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
<?php }}} }?>

            <?php  if ($this->ion_auth->is_facilityManager()) { ?>
                <div class="block-title ">
            <h2 class="fw-bold"><strong><?php echo $title; ?></strong> Panel</h2>

                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary save-btn">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
           
        </div>
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr >
                        <th  class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem;width:15%;;">Sr. No</th>
                        <th  class="text-center fw-bold"  style="background-color:#DBEAFF;font-size:1.3rem;width:60%;;">Name</th>
                        <th  class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('action'); ?></th>
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
                                <td><?php echo $rowCount; ?></td>            
                                <td><?php echo $rows->name; ?></td>

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
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>
