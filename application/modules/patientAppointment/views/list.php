<!-- Page content -->
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
        <div class="block-title">
            <?php if ($this->ion_auth->is_patient()) { ?>
                <h2>
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                    <h2>
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
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
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10px;">Sr. No</th>
                        <!--                                <th><?php echo "Referral Code"; ?></th>-->
                        <th class="text-center"><?php echo "Doctor Name"; ?></th>
                        <th class="text-center"><?php echo "Patient Name"; ?></th>
                        <th class="text-center"><?php echo "Start Time"; ?></th>
                        <th class="text-center"><?php echo "End Time"; ?></th>
                        <!-- <th class="text-center"><?php //echo 'Reason for Appointment'; ?></th> -->
                        <th class="text-center"><?php echo 'Appointment Date'; ?></th>
                        <!-- <th class="text-center">Created Date</th> -->
                                                   
                        <th class="text-center"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($list) && !empty($list)):
                        //print_r($list); die;
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;
                          
                            ?>
                            <tr>
                                <td class="text-center text-primary"><strong><?php echo $rowCount; ?></strong></td>        
                                <!--                            <td><?php echo $rows->id; ?></td>-->
                                <td class="text-primary"><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
                                <td class="text-primary"><?php echo $rows->patient_f_name. ' '.$rows->patient_l_name; ?></td>
                                <td class="text-primary"><?php echo (!empty($rows->time_start)) ?  $rows->time_start /* . '(' . $rows->care_unit_code.')' */ : ''; ?></td>
                                <td class="text-primary"><?php echo (!empty($rows->time_end)) ?  $rows->time_end  : ''; ?></td>
                               
                                <!-- <td><?php //echo $rows->reason ?></td> -->
        
                                <td><?php echo ($rows->date != null) ? date('d-m-Y', strtotime($rows->date)) : ""; ?></td>
                               
                                <td class="actions text-center" >
                                    <div class="btn-group btn-group-xs">
                                    
                                        <a href="<?php echo base_url() . 'index.php/appointment/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>

                                        <?php if ($this->ion_auth->is_subAdmin()) { ?>
                                            <?php
                                            if ($rows->id != '') {

                                                if ($rows->status == 0) {
                                                    ?>
                                                     <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="statusFn('<?php echo APPOINTMENT; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>')" title="Unblock Now"><i class="fa fa-check"></i></a>
                                                <?php } else { ?>
                                                     <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="statusFn('<?php echo APPOINTMENT; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->status; ?>')" title="Block Now"><i class="fa fa-times"></i></a>
                                                    <?php
                                                }

                                                if ($rows->status == 1) {
                                                    ?>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Unblock Now"><i class="fa fa-check"></i> Block</a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Block Now"><i class="fa fa-times"></i> Unblock</a>
                                                <?php } ?>

                                                <a href="javascript:void(0)" data-toggle="tooltip"   onclick="deleteFn('<?php echo APPOINTMENT; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'index.php/appointment', 'index.php/appointment/delVendors','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>