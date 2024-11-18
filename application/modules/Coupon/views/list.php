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
.t-head{
    background-color:rgb(219, 234, 255) !important;
    font-size:1.3rem !important;
}
.srNo{
    width: 50px !important;
}
#act{
    display: none;
   
}
::-webkit-scrollbar {
display:none;
}

</style>
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($parent); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <?php if ($this->ion_auth->is_superAdmin()) { ?>
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')"  style="background-color:#337ab7;" class="btn btn-sm m-2 text-white">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                <!-- <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2> -->
                    <?php } ?>

        </div>
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="t-head srNo">Sr. No</th>
                        <th class="t-head">coupon_type</th>
                        <th class="t-head">coupon_code</th>
                        <th class="t-head">user_size</th>
                        <th class="t-head">total_use_user</th>
                        <th class="t-head">cash_type</th>
                        <th class="t-head">amount</th>
                        <th class="t-head">used_type</th>
                        <th class="t-head">min_amount</th>
                        <th class="t-head">max_amount</th>
                        <th class="t-head">percentage_in_amount</th>
                        <?php if ($this->ion_auth->is_superAdmin()){?>
                        <th class="t-head"><?php echo lang('action'); ?></th>
                        <?php } else if ($this->ion_auth->is_facilityManager()){?>
                            <!-- <th><?php echo lang('action'); ?></th> -->
                            <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($this->ion_auth->is_facilityManager()){
                        $rowCount = 0;
                        foreach ($list as $rows){
                            $rowCount1++;
                            ?>
                            <tr>
                                <td><?php echo $rowCount1; ?></td>            
                                <td><?php if($rows->coupon_type== '0'){
                                    echo 'Auto';
                                }else if($rows->coupon_type== '1'){
                                    echo 'Deposit';
                                }else if($rows->coupon_type== '2'){
                                    echo 'Without deposit';
                                }else if($rows->coupon_type== '3'){
                                    echo 'Registration';
                                }else{

                                }  ?></td>
                                <td><?php echo $rows->coupon_code; ?></td>
                                <td><?php echo $rows->user_size; ?></td>
                                <td><?php echo $rows->total_use_user; ?></td>

                                <td><?php if($rows->cash_type== '0'){
                                    echo 'Auto';
                                }else if($rows->cash_type== '1'){
                                    echo 'Deposit';
                                }else if($rows->cash_type== '2'){
                                    echo 'Without deposit';
                               
                                }else{

                                }  ?>
                                </td>
                                <td><?php echo $rows->amount; ?></td>
                                <td><?php echo $rows->used_type; ?></td>
                                <td><?php echo $rows->min_amount; ?></td>
                                <td><?php echo $rows->max_amount; ?></td>
                                <td><?php echo $rows->percentage_in_amount; ?></td>

                                <!-- <td><?php //echo (!empty($rows->email)) ? $rows->email : ""; ?></td> -->

                                <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    <?php if ($rows->status == 0) { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" data-toggle="tooltip"   onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'index.php/Coupon', 'index.php/Coupon/delete','<?php echo $rows->name; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <!-- <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
                                </td>
                            </tr>
                            <?php
                        }
                    }else if(isset($list) && !empty($list)){
                        $rowCount = 0;
                        foreach ($list as $rows){
                            $rowCount++;
                    ?>
                     <tr>
                                <td><?php echo $rowCount1; ?></td>   
                                <td><?php if($rows->coupon_type== '0'){
                                    echo 'Auto';
                                }else if($rows->coupon_type== '1'){
                                    echo 'Deposit';
                                }else if($rows->coupon_type== '2'){
                                    echo 'Without deposit';
                                }else if($rows->coupon_type== '3'){
                                    echo 'Registration';
                                }else{

                                }  ?></td>         
                                <!-- <td><?php //echo $rows->coupon_type; ?></td> -->
                                <td><?php echo $rows->coupon_code; ?></td>
                                <td><?php echo $rows->user_size; ?></td>
                                <td><?php echo $rows->total_use_user; ?></td>
                                <td><?php if($rows->cash_type== '0'){
                                    echo 'Auto';
                                }else if($rows->cash_type== '1'){
                                    echo 'Deposit';
                                }else if($rows->cash_type== '2'){
                                    echo 'Without deposit';
                               
                                }else{

                                }  ?>
                                </td>
                                <!-- <td><?php //echo $rows->cash_type; ?></td> -->
                                <td><?php echo $rows->amount; ?></td>
                                <td><?php echo $rows->used_type; ?></td>
                                <td><?php echo $rows->min_amount; ?></td>
                                <td><?php echo $rows->max_amount; ?></td>
                                <td><?php echo $rows->percentage_in_amount; ?></td>
                                

                                <td class="actions" style="display: flex; gap: 10px; align-items: center; justify-content: center;">
    <!-- Edit Button -->
    <a href="javascript:void(0)" 
       class="btn btn-xs btn-default" 
       style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 4px; background-color: #f0f0f0; border: 1px solid #ccc;" 
       onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>');">
        <i class="fa fa-pencil" style="color: #333;"></i>
    </a>

    <!-- Status Button -->
    <?php if ($rows->status == 0) { ?>
        <a href="javascript:void(0)" 
           class="btn btn-xs btn-success" 
           style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 4px; background-color: #28a745; border: none;" 
           onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>', '<?php echo $rows->name; ?>')" 
           title="Set as Inactive">
            <i class="fa fa-check" style="color: #fff;"></i>
        </a>
    <?php } else { ?>
        <a href="javascript:void(0)" 
           class="btn btn-xs btn-danger" 
           style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 4px; background-color: #dc3545; border: none;" 
           onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>', '<?php echo $rows->name; ?>')" 
           title="Set as Active">
            <i class="fa fa-times" style="color: #fff;"></i>
        </a>
    <?php } ?>

    <!-- Delete Button -->
    <a href="javascript:void(0)" 
       class="btn btn-xs btn-danger" 
       style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 4px; background-color: #dc3545; border: none;" 
       onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'index.php/Coupon', 'index.php/Coupon/delete', '<?php echo $rows->name; ?>')" 
       title="Delete">
        <i class="fa fa-trash" style="color: #fff;"></i>
    </a>
</td>

                            </tr>
                            <?php } }  ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>
