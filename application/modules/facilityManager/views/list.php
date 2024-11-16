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
              <!--<div class="row text-center">
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





    <!-- <div class="block full">
    <div class="block-title">
        <h2><strong>hospital</strong> Panel</h2>
    </div>
    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
        <div class="alert alert-danger" id="error-box" style="display: none"></div>
        <div class="form-body">
            
     
            <h3 class="m-4 fw-bold">placeholder</h3>
            <div class="row m-4 p-4"  style="background-color: #FFFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="input1">App Name : <strong class="fw-bold">(App Name)</strong></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="input1">company Name : <strong class="fw-bold">(company Name)</strong></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="input1">App Url : <strong class="fw-bold">(App_url)</strong></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="input1">Email : <strong class="fw-bold">(Email)</strong></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="input1">Password : <strong class="fw-bold">(Password)</strong></label>
                    </div>
                </div>
            </div>
            <div class="row m-4">
                <div class="col-md-6">
                    <label class=" control-label">Subject*</label>
                    <div class="form-group"> 
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="internal_name" id="internal_name" placeholder="<?php echo lang('first_name');?>" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class=" control-label">From*</label>
                    <div class="form-group"> 
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="internal_name" id="internal_name" placeholder="<?php echo lang('first_name');?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
            <label class="control-label mb-4">Create Letter template*</label>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea id="editor" name="bodies_template"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" id="submit"  class="btn btn-sm btn-primary mt-2" style="background:#337ab7;">Save</button>
            </div>
        </div>
    </form>
</div>






 <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

<script>

CKEDITOR.replace('editor');
</script> -->














<!-- 
    <div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <?php
                        $message = $this->session->flashdata('success');
                        if (!empty($message)):
                            ?><div class="alert alert-success">
                                <?php echo $message; ?></div><?php endif; ?>
                        <?php
                        $error = $this->session->flashdata('error');
                        if (!empty($error)):
                            ?><div class="alert alert-danger">
                                <?php echo $error; ?></div><?php endif; ?>
                        <div id="message"></div>
                        <div class="col-lg-12" style="overflow-x: auto">
                            <div class="block full">
                                <div class="block-title">
                                    <h2 class="fw-bold"><strong><?php echo $title; ?></strong> Panel</h2>
                                    <?php if ($this->ion_auth->is_facilityManager()) { ?>
                                        <h2>
                                            <a href="javascript:void(0)" onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                                                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                                            </a>
                                        </h2>
                                    <?php } ?>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->








    <!-- END Quick Stats -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
        <?php if ($this->ion_auth->is_superAdmin()) { ?>
                <h2>
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            

            <?php }else if ($this->ion_auth->is_admin()) { ?>
                <h2>
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;">
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
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered text-center text-sm">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px;">Sr. No</th>
                        <!--                                <th><?php echo "Referral Code"; ?></th>-->
                                                       <th><?php echo "Token"; ?></th>
                        <th class="text-center" style="font-size:14px;"><?php echo "Hospital Name"; ?></th>
                        <th class="text-center" style="font-size:14px;"><?php echo "User Name"; ?></th>
                        <!-- <th class="text-center"><?php echo "Department"; ?></th> -->
                        <!-- <th class="text-center"><?php echo "Doctor Name"; ?></th> -->
                        <th class="text-center" style="font-size:14px;"><?php echo lang('user_email'); ?></th>
<!--                        <th class="text-center"><?php echo "Phone"; ?></th>-->
                        <!--  <th><?php echo "DOB"; ?></th> -->
                        <!--                                <th><?php echo "Current Password"; ?></th>-->
                        <!--                                <th><?php echo lang('profile_image'); ?></th>-->
                        <th class="text-center" style="font-size:14px;">Created Date</th>
                        <!--                                <th><?php //echo lang('user_createdate');     ?></th>-->
                        <th class="text-center" style="font-size:14px;"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($list) && !empty($list)):
                        //print_r($list); die;
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;
                        //    print_r($rows); die;
                            ?>
                            <tr>
                                <td class="text-center text-dark"><strong><?php echo $rowCount; ?></strong></td>
                                <td class="text-dark"><?php echo $rows->token_uniq; ?></td>        
                                <!--                            <td><?php echo $rows->team_code; ?></td>-->
                                <td class="text-dark"><?php echo $rows->hospital_name ?></td>
                                <td class="text-dark"><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
                                <!-- <td class="text-primary"><?php echo (!empty($rows->name)) ?  $rows->name /* . '(' . $rows->care_unit_code.')' */ : ''; ?></td> -->
                                <!-- <td class="text-primary"><?php echo (!empty($rows->name1)) ?  $rows->name1  : ''; ?></td> -->
                               
                                <td><?php echo $rows->email ?></td>
        <!--                                <td class="text-center"><?php echo $rows->phone ?></td>-->
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
            <!--                                <td class="text-center"><?php
                                if ($rows->vendor_profile_activate == "Yes") echo '<p class="text-success">Verified</p>';
                                else echo '<p  class="text-danger">Unverified</p>';
                                ?></td>-->
                                            <!--<td><?php //echo date('d F Y',$rows->created_on);     ?></td>-->
                                <td class="actions text-center" >
                                    <div class="btn-group btn-group-xs">
                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-default" onclick="editFn('vendors','vendor_edit','<?php echo encoding($rows->id); ?>');"><i class="fa fa-pencil"></i></a> -->
                                        <a href="<?php echo base_url() . 'index.php/facilityManager/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo base_url() . 'index.php/facilityManager/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-eye"></i></a>

                                                                    
                                        <?php if ($this->ion_auth->is_admin()) { ?>
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
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Inactive Now"><i class="fa fa-check"></i> </a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Active Now"><i class="fa fa-times"></i> Inactive</a>
                                                <?php } ?>
                                        
                                                <a href="javascript:void(0)" data-toggle="tooltip"   onclick="deleteFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'index.php/facilityManager', 'index.php/facilityManager/delVendors','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            
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