<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('users');?>">Users</a>
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->




    <div class="block full">
    <div class="block-title">
        <h2 class="fw-bold"><strong>User</strong> Add</h2>
    </div>
    <form class="form-horizontal p-4" role="form" id="addFormAjax" method="post" action="<?php echo base_url('users/users_add') ?>" enctype="multipart/form-data">
        <div class="alert alert-danger" id="error-box" style="display: none"></div>
        <div class="row">
    <div class="col-md-6">
        <div class="form-group me-2">
            <label class="control-label">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group me-2">
            <label class="control-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group me-2">
            <label class="control-label"><?php echo lang('user_email');?></label>
            <input type="email" class="form-control" name="user_email" id="user_email" placeholder="<?php echo lang('user_email');?>" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group me-2">
            <label class="control-label">Country</label>
            <select id="country" name="country" class="form-control select2" size="1">
                <option value="" disabled selected>Please select</option>
                <?php foreach($countries as $country){?>
                <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group me-2">
            <label class="control-label"><?php echo lang('phone_no');?></label>
            <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="<?php echo lang('phone_no');?>" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group me-2">
            <label class="control-label"><?php echo lang('password');?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="<?php echo lang('password');?>" value="<?php echo randomPassword();?>" />
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group me-2">
            <label class="control-label"><?php echo lang('profile_image'); ?></label>
            <div class="group_filed">
                <div class="img_back_prieview_Academic">
                    <div class="images_box_upload_ven_adduser_vendore">
                        <div id="image-preview-adduser-vendore">
                            <input type="file" name="user_image" id="image-upload-adduser-vendore" />
                        </div>
                    </div>
                    <div id="image-preview-adduser">
                        <label for="image-upload-adduser-vendore" id="image-label-adduser-vendore"  class="btn btn-sm btn-primary" style="background:#337ab7;">Upload Logo</label>
                    </div>
                </div>
            </div>
            <div class="ceo_file_error file_error text-danger"></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="modal-footer">
            <button type="submit" id="submit"  class="btn btn-sm btn-primary" style="background:#337ab7;"><?php echo lang('submit_btn');?></button>
        </div>
    </div>
</div>

    </form>
</div>




</div>
<script type="text/javascript">
 $('#date_of_birth').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                endDate:'today'
       
       
       });
</script>