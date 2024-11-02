<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($this->router->fetch_class()); ?>"><?php echo $title;?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <div class="row">
 
        <div class="col-md-12" >    <div class="block full">
                <div class="block-title">
                    <h2><strong><?php echo $title;?></strong> Panel</h2>
                </div>        
                <form class="form-horizontal" role="form" id="editFormAjaxUser" method="post" action="<?php echo base_url('index.php/facilityManager/update') ?>" enctype="multipart/form-data">
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                    </div>
                   
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                        <div class="form-body">
                                <div class="row">


                                    <div class="col-md-12" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hospital Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="hospital_name" id="hospital_name" placeholder="Hospital Name" value="<?php echo $results->hospital_name; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">First Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $results->first_name; ?>"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Last Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $results->last_name; ?>"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"><?php echo lang('user_email'); ?></label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $results->email; ?>" readonly/>
                                                <?php $user_id = $this->session->userdata('user_id');?>
                                        <input type="hidden" class="form-control" name="admin_id" id="admin_id" value="<?php echo $user_id;?>"/>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-12" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"><?php echo "Current Password"; ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="current_password" id="current_password" value="<?php echo $results->is_pass_token; ?>" readonly=""/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"><?php echo lang('new_password'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="new_password" id="new_password"/>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $results->id; ?>" />
                                    <input type="hidden" name="password" value="<?php echo $results->password; ?>" />
                                    <input type="hidden" name="exists_image" value="<?php echo $results->profile_pic; ?>" />
                                    <div class="space-22"></div>
                                </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit"  class="btn btn-sm btn-primary" id="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div></div>

    </div>

    <!-- Datatables Content -->







    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<script type="text/javascript">
    $('#date_of_birth').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        endDate: 'today'
    });
    /*    $("#zipcode").select2({
     allowClear: true
     });*/
</script>
