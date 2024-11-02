<!-- Page content -->
<style>
#act{
    display: none;
   
}
.t-head{
    background-color:rgb(219, 234, 255) !important;
    font-size:1.3rem !important;
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
            <?php if ($this->ion_auth->is_admin()) { ?>
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
                    <?php } ?>

        </div>
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                       
                        <th  class="t-head" style="width:40px;">Sr. No</th>
                        
                        <th class="t-head">User Name</th>
                        <th class="t-head">Plan Name</th>
                        <th class="t-head">Amount</th>
                        <th class="t-head">Plan Type</th>
                        <th class="t-head">Order Date</th>
                        <th class="t-head">Plan Expire Date</th>
                        <th class="t-head">status</th>

                        <!-- <th>Email</th> -->
                        <?php if ($this->ion_auth->is_superAdmin()){?>
                        <th class="t-head"><?php echo lang('action'); ?></th>
                        <?php } else if ($this->ion_auth->is_facilityManager()){?>
                            <!-- <th><?php //echo lang('action'); ?></th> -->
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
                                <?php
                                $currentDate1 = $rows->created;

                                if($rows->DurationInMonths == 'month'){

                                    $expireDate = date('Y-m-d - H:i', strtotime('+1 month', strtotime($currentDate1)));
                                }else if($rows->DurationInMonths == 'years'){
                                    $expireDate = date('Y-m-d - H:i', strtotime('+1 year', strtotime($currentDate1)));
                                }

                                
                                ?>

                                <td><?php echo $rowCount1; ?></td>            
                                <td><?php echo $rows->first_name.' '. $rows->last_name; ?></td>
                                <td><?php echo $rows->PlanName; ?></td>
                                <td><?php echo $rows->Price; ?></td>
                                <td><?php echo $rows->DurationInMonths; ?></td>
                                <td><?php echo $rows->created; ?></td>
                                <td><?php echo $expireDate; ?></td>
                                <!-- <td><?php echo $rows->expire_date; ?></td>
                                <td><?php echo $rows->user_createdAtid; ?></td> -->
                                <!-- <td><?php echo $rows->payment_status; ?></td> -->
                                <td>
                                <?php if ($rows->payment_status == 'succeeded') { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success"  title="Active Now">Active</a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Inactive Now">Inactive Now</a>
                                    <?php } ?>
                                </td>
                                
                                <!-- <td><?php //echo (!empty($rows->email)) ? $rows->email : ""; ?></td> -->

                                <td class="actions">
                                    <!-- <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a> -->
                                    <?php if ($rows->status == 0) { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php } ?>

                                    <a href="javascript:void(0)" data-toggle="tooltip"   onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'index.php/userOrder', 'index.php/userOrder/delete','<?php echo $rows->name; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                     <?php
                               $currentDate1 = $rows->created;

                               if($rows->DurationInMonths == 'month'){

                                   $expireDate = date('Y-m-d - H:i', strtotime('+1 month', strtotime($currentDate1)));
                               }else if($rows->DurationInMonths == 'years'){
                                   $expireDate = date('Y-m-d - H:i', strtotime('+1 year', strtotime($currentDate1)));
                               }
                               
                             
                                ?>

                                <td><?php echo $rowCount; ?></td>            
                                <td><?php echo $rows->first_name.' '. $rows->last_name; ?></td>
                                <td><?php echo $rows->PlanName; ?></td>
                                <td><?php echo $rows->Price; ?></td>
                                <td><?php echo $rows->DurationInMonths; ?></td>
                                <td><?php echo $rows->created; ?></td>
                                <td><?php echo $expireDate; ?></td>
                                <!-- <td><?php echo $rows->expireDate; ?></td> -->
                                <!-- <td><?php echo $rows->user_createdAtid; ?></td> -->
                                <!-- <td><?php echo $rows->payment_status; ?></td> -->
                                
                                <td>
                                <?php if ($rows->payment_status == 'succeeded') { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success"  title="Active Now">Active</a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Inactive Now">Inactive Now</a>
                                    <?php } ?>
                                </td>
                                

                                <td class="actions">
                                    <!-- <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a> -->
                                    <?php if ($rows->payment_status == 'succeeded') { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" data-toggle="tooltip"   onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'index.php/userOrder', 'index.php/userOrder/delete','<?php echo $rows->name; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <!-- <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->first_name.' '. $rows->last_name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
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
