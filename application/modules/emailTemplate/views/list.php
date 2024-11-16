<style>
#message_div{
        background-color: #ffffff;
        border: 1px solid;
        box-shadow: 10px 10px 5px #888888;
        display: none;
        height: auto;
        left: 36%;
        position: fixed;
        top: 20%;
        width: 40%;
        z-index: 1;
      }

#close_button{
        right:-15px;
        top:-15px;
        cursor: pointer;
        position: absolute;
    }
    #close_button img{
        width:30px;
        height:30px;
    }    
    #message_container{
        height: 450px;
        overflow-y: scroll;
        padding: 20px;
        text-align: justify;
        width: 99%;
    }
    .t-head{
    background-color:rgb(219, 234, 255) !important;
}

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
    <!-- Page content -->
    <div id="page-content"  style="background-color: whitesmoke;">
        <!-- Datatables Header -->
        <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('emailTemplate');?>">Email Templates</a>
        </li>
        </ul>
        <!-- END Datatables Header -->


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
                            if ($menu_name == 'Email Template') {
                               if ($menu_create =='1') {?>


                        <div class="block-title">
                        <!-- <h2><strong>Email</strong> Panel</h2> -->
                        
                        <h2>
                        <a href="<?php echo site_url('emailTemplate/letterTemplate'); ?>" class="save-btn btn btn-sm btn-primary <?php echo (strtolower($this->router->fetch_class()) == "emailTemplate") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide"> <i class="gi gi-circle_plus"></i> Add New Template</span></a>
                                                                                                    
                            <!-- <a href="javascript:void(0)" onclick="open_modal('emailTemplate/letterTemplate')" class="save-btn btn btn-sm btn-primary"> -->
                                <!-- <i class="gi gi-circle_plus"></i> Email Template -->
                                <!-- </a> -->
                            </h2>  
                        </div>

                        <?php } if($menu_view =='1'){?>

                <?php if(!empty($useTemplate)){ ?>
                <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('/emailTemplate/sendEmailTemplate') ?>" enctype="multipart/form-data">
                <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    
                    <div class="form-body" id="template_data">

                        <div class="row">
                            <div class="col-md-5">
                            <?php $image_url = base_url('/uploads/'); ?>
                            <img width="100px;" src="<?php echo $image_url. $useTemplate->image; ?>" alt="Header">
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                    <h3 class="m-4 fw-bold"> <label for="input1"><strong class="fw-bold"><?php echo ucwords($useTemplate->title);?></strong></label> </h3>
                                    </div>
                                </div>
                            </div>

                    

                        <!-- <h3 class="m-4 fw-bold"><?php echo $useTemplate->internal_name;?></h3> -->
                        <div class="row m-4 p-4"  style="background-color: #FFFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);">

                        
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">App Name : <strong class="fw-bold"><input type="text" class="form-control" name="app_name" id="app_name" value="<?php echo $useTemplate->title;?>" placeholder="<?php echo lang('password');?>" /></strong></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Company Name : <strong class="fw-bold"><input type="text" class="form-control" name="company_name" id="company_name" placeholder="<?php echo lang('Company name');?>" /></strong></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">App Url : <strong class="fw-bold"><input type="text" class="form-control" name="app_url" id="app_url" placeholder="<?php echo lang('app url');?>" /></strong></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Email : <strong class="fw-bold"><input type="email" class="form-control" name="email" id="email" placeholder="<?php echo lang('Email');?>" /></strong></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Password : <strong class="fw-bold">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo lang('password');?>" />
                                    
                                    </strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="row m-4">
                            <div class="col-md-6">
                                <label class=" control-label">Subject*</label>
                                <div class="form-group"> 
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="<?php echo lang('subject');?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class=" control-label">From*</label>
                                <div class="form-group"> 
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="from_mail" id="from_mail" placeholder="<?php echo lang('from_mail');?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                        <label class="control-label mb-4">Create Letter template*</label>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="editor" name="description"><?php echo $useTemplate->bodies_template;?></textarea>
                                </div>
                            </div>
                        </div> -->
                        <label class="control-label mb-4">Create Recipient*</label>
                            <div class="form-group">
                                <div class="col-md-12">
                                <textarea id="recipient_template" name="description"><?php echo $useTemplate->recipient_template;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                            <img width="100px;" src="<?php echo $image_url. $useTemplate->footer_logo; ?>" alt="footer">
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                    <!-- <textarea id="recipient_template" name="description"><?php echo $useTemplate->recipient_template;?></textarea> -->
                                    <!-- <h3 class="m-4 fw-bold"> <label for="input1"><strong class="fw-bold"><?php echo ucwords($useTemplate->recipient_template);?></strong></label> </h3> -->
                                    </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" id="submit"  class="btn btn-sm btn-primary mt-2" style="background:#337ab7;">Save</button>
                        </div>
                        <?php //}?>
                        <?php //}?>
                    </div>
                </form>
                <?php  }?>
            

            <?php }}}} if($this->ion_auth->is_facilityManager() or $this->ion_auth->is_admin() or $this->ion_auth->is_superAdmin()){?>

                    <div class="block-title">
                        <!-- <h2><strong>Email</strong> Panel</h2> -->
                        
                        <h2>
                        <a href="<?php echo site_url('emailTemplate/letterTemplate'); ?>" class="save-btn btn btn-sm btn-primary <?php echo (strtolower($this->router->fetch_class()) == "emailTemplate") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide"> <i class="gi gi-circle_plus"></i> Add New Template</span></a>
                                                                                                    
                            <!-- <a href="javascript:void(0)" onclick="open_modal('emailTemplate/letterTemplate')" class="save-btn btn btn-sm btn-primary"> -->
                                <!-- <i class="gi gi-circle_plus"></i> Email Template -->
                                <!-- </a> -->
                            </h2>  
                    </div>

                <?php if(!empty($useTemplate)){ ?>

                <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('/emailTemplate/sendEmailTemplate') ?>" enctype="multipart/form-data">
                <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    
                    <div class="form-body" id="template_data">

                        <div class="row">
                            <div class="col-md-5">
                            <?php $image_url = base_url('/uploads/'); ?>
                            <img width="100px;" src="<?php echo $image_url. $useTemplate->image; ?>" alt="Header">
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                    <h3 class="m-4 fw-bold"> <label for="input1"><strong class="fw-bold"><?php echo ucwords($useTemplate->title);?></strong></label> </h3>
                                    </div>
                                </div>
                            </div>

                    

                        <!-- <h3 class="m-4 fw-bold"><?php echo $useTemplate->internal_name;?></h3> -->
                        <div class="row m-4 p-4"  style="background-color: #FFFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);">

                        
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">App Name : <strong class="fw-bold"><input type="text" class="form-control" name="app_name" id="app_name" value="<?php echo $useTemplate->title;?>" placeholder="<?php echo lang('password');?>" /></strong></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Company Name : <strong class="fw-bold"><input type="text" class="form-control" name="company_name" id="company_name" placeholder="<?php echo lang('Company name');?>" /></strong></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">App Url : <strong class="fw-bold"><input type="text" class="form-control" name="app_url" id="app_url" placeholder="<?php echo lang('app url');?>" /></strong></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Email : <strong class="fw-bold"><input type="email" class="form-control" name="email" id="email" placeholder="<?php echo lang('Email');?>" /></strong></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Password : <strong class="fw-bold">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo lang('password');?>" />
                                    
                                    </strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="row m-4">
                            <div class="col-md-6">
                                <label class=" control-label">Subject*</label>
                                <div class="form-group"> 
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="<?php echo lang('subject');?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class=" control-label">From*</label>
                                <div class="form-group"> 
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="from_mail" id="from_mail" placeholder="<?php echo lang('from_mail');?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                        <label class="control-label mb-4">Create Letter template*</label>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="editor" name="description"><?php echo $useTemplate->bodies_template;?></textarea>
                                </div>
                            </div>
                        </div> -->
                        <label class="control-label mb-4">Create Recipient*</label>
                            <div class="form-group">
                                <div class="col-md-12">
                                <textarea id="recipient_template" name="description"><?php echo $useTemplate->recipient_template;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                            <img width="100px;" src="<?php echo $image_url. $useTemplate->footer_logo; ?>" alt="footer">
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                    <!-- <textarea id="recipient_template" name="description"><?php echo $useTemplate->recipient_template;?></textarea> -->
                                    <!-- <h3 class="m-4 fw-bold"> <label for="input1"><strong class="fw-bold"><?php echo ucwords($useTemplate->recipient_template);?></strong></label> </h3> -->
                                    </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" id="submit"  class="btn btn-sm btn-primary mt-2" style="background:#337ab7;">Save</button>
                        </div>
                        <?php //}?>
                        <?php //}?>
                    </div>
                </form>
                <?php  }?>

            <?php }?>



            
        <!-- Datatables Content -->
    <div class="block full">
            <div class="block-title">
            
            <h2><strong>Email Template</strong> Panel</h2>
           
              
        <?php if ($this->ion_auth->is_superAdmin()) {?>

            <!-- <h2><a href="javascript:void(0)" onclick="open_modal('emailTemplate')" class="save-btn btn btn-sm btn-primary">
            <i class="gi gi-circle_plus"></i> Email Template
            </a></h2>       -->
        <?php }?>

            </div>
            <!-- <h2><a href="javascript:void(0)" onclick="open_modal('emailTemplate')" class="btn btn-sm btn-primary" style="background:#337ab7;">
            <i class="gi gi-circle_plus m-2"></i> Email Template
            </a></h2>    -->

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
                            if ($menu_name == 'Email Template') {
                              // if ($menu_view =='1') {?>

            <div class="table-responsive">
                <table id="common_datatable_cms" class="table table-vcenter table-condensed table-bordered text-center">
                    <thead>
                        <tr>                                            
                            <th  class="t-head text-center"><?php echo lang('serial_no'); ?></th>
                            <!-- <th class="t-head text-center">Email Type</th> -->
                            <th class="t-head text-center" class="t-head">Header</th>
                            <th class="t-head">Body</th>
                            <th class="t-head">Recipients</th>
                            <th class="t-head">Footer</th>
                            <th class="t-head text-center"><?php echo lang('action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($all_template) && !empty($all_template)):
                        $rowCount = 0;
                        foreach ($all_template as $rows):
                            $rowCount++;
                            ?>
                            <tr>
                                <td><?php echo $rowCount; ?></td>            
                                <!-- <td><?php echo $rows->email_type; ?></td> -->
                                <td>
                                <?php echo $rows->header_names; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php $image_url = base_url('/uploads/'); ?>
                                

                               <img width="100" src="<?php if (!empty($rows->logo)) {
                                    echo $image_url.$rows->logo;
                                
                            } else {
                                echo base_url() . DEFAULT_NO_IMG_PATH;
                            } ?>" />

                            </td>
                               <td style="width:25%;"><?php
                                    if (strlen($rows->bodies_template) > 400) {
                                        $content = $rows->bodies_template;
                                        echo mb_substr($rows->bodies_template, 0, 400, 'UTF-8') . '...<br>';
                                        ?>
                                        <a style="cursor:pointer" onclick="show_message('<?php echo base64_encode($content); ?>')"><?php echo lang('view'); ?></a>
                                        <?php
                                    } else if (strlen($rows->bodies_template) > 0) {
                                        echo $rows->bodies_template;
                                    }
                                    ?></td>
                                    <td style="width:25%;"><?php
                                    if (strlen($rows->recipient_template) > 400) {
                                        $content = $rows->recipient_template;
                                        echo mb_substr($rows->recipient_template, 0, 400, 'UTF-8') . '...<br>';
                                        ?>
                                        <a style="cursor:pointer" onclick="show_message('<?php echo base64_encode($content); ?>')"><?php echo lang('view'); ?></a>
                                        <?php
                                    } else if (strlen($rows->recipient_template) > 0) {
                                        echo $rows->recipient_template;
                                    }
                                    ?></td>

                                    <?php $image_url = base_url('/uploads/'); ?>
                                

                                <td><img width="100" src="<?php if (!empty($rows->footer_logo)) {
                                    echo $image_url.$rows->footer_logo. ' '.$rows->footer_internal_name;
                                
                            } else {
                                echo base_url() . DEFAULT_NO_IMG_PATH;
                            } ?>" /></td>

                                <td class="actions">

                                    <?php if($rows->active_template != 1 && $rows->is_active == 1) { ?>

                                        <?php //if ($menu_update =='1') { ?>

                                        <a href="javascript:void(0)" onclick="useTemplate('<?php echo $rows->id; ?>')" class="btn save-btn" style="color:white;">Use template</a>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-success" style="background:green;">Active template</button> 
                                        <?php } ?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('emailTemplate','template_edit','<?php echo encoding($rows->id) ?>');"><i class="fa fa-pencil"></i></a> -->
                                        <?php if($rows->is_active == 1) {?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('vendor_sale_email_template','id','<?php echo encoding($rows->id);?>','<?php echo $rows->is_active;?>')" title="Inactive Now"><i class="fa fa-check"></i></a> -->
                                        <?php } else { ?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('vendor_sale_email_template','id','<?php echo encoding($rows->id); ?>','<?php echo $rows->is_active;?>')" title="Active Now"><i class="fa fa-times"></i></a> -->
                                        <?php } 
                                    //} if ($menu_delete =='1') {?>
                                        <a href="javascript:void(0)" onclick="deleteFn('vendor_sale_email_template','id','<?php echo encoding($rows->id); ?>','emailTemplate')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    
                                        <form id="templateForm_<?php echo $rows->id; ?>" style="display: none;">
                                            <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                                        
                                        </form>
                                        <?php //}?>

                                </td>
                            </tr>
                        <?php endforeach;
                    endif; ?>
                    </tbody>
                </table>
            </div>

    <?php }}} if($this->ion_auth->is_facilityManager()){?>
    
            <div class="table-responsive">
                <table id="common_datatable_cms" class="table table-vcenter table-condensed table-bordered text-center">
                    <thead>
                        <tr>                                            
                            <th  class="t-head text-center"><?php echo lang('serial_no'); ?></th>
                            <!-- <th class="t-head text-center">Email Type</th> -->
                            <th class="t-head text-center" class="t-head">Header</th>
                            <th class="t-head">Body</th>
                            <th class="t-head">Recipients</th>
                            <th class="t-head">Footer</th>
                            <th class="t-head text-center"><?php echo lang('action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($all_template) && !empty($all_template)):
                        $rowCount = 0;
                        foreach ($all_template as $rows):
                            $rowCount++;
                            ?>
                            <tr>
                            <td><?php echo $rowCount; ?></td>            
                                <!-- <td><?php echo $rows->email_type; ?></td> -->
                                <td>
                                <?php echo $rows->header_names; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php $image_url = base_url('/uploads/'); ?>
                                

                               <img width="100" src="<?php if (!empty($rows->logo)) {
                                    echo $image_url.$rows->logo;
                                
                            } else {
                                echo base_url() . DEFAULT_NO_IMG_PATH;
                            } ?>" />

                            </td>
                               <td style="width:25%;"><?php
                                    if (strlen($rows->bodies_template) > 400) {
                                        $content = $rows->bodies_template;
                                        echo mb_substr($rows->bodies_template, 0, 400, 'UTF-8') . '...<br>';
                                        ?>
                                        <a style="cursor:pointer" onclick="show_message('<?php echo base64_encode($content); ?>')"><?php echo lang('view'); ?></a>
                                        <?php
                                    } else if (strlen($rows->bodies_template) > 0) {
                                        echo $rows->bodies_template;
                                    }
                                    ?></td>
                                    <td style="width:25%;"><?php
                                    if (strlen($rows->recipient_template) > 400) {
                                        $content = $rows->recipient_template;
                                        echo mb_substr($rows->recipient_template, 0, 400, 'UTF-8') . '...<br>';
                                        ?>
                                        <a style="cursor:pointer" onclick="show_message('<?php echo base64_encode($content); ?>')"><?php echo lang('view'); ?></a>
                                        <?php
                                    } else if (strlen($rows->recipient_template) > 0) {
                                        echo $rows->recipient_template;
                                    }
                                    ?></td>

                                    <?php $image_url = base_url('/uploads/'); ?>
                                

                                <td><?php echo $rows->footer_internal_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="100" src="<?php if (!empty($rows->footer_logo)) {
                                    echo $image_url.$rows->footer_logo;
                                
                            } else {
                                echo base_url() . DEFAULT_NO_IMG_PATH;
                            } ?>" /></td>

                                <td class="actions">

                                    <?php if($rows->active_template != 1 && $rows->is_active == 1) { ?>

                                        <?php //if ($menu_update =='1') { ?>

                                        <a href="javascript:void(0)" onclick="useTemplate('<?php echo $rows->header_id; ?>')" class="btn save-btn" style="color:white;">Use template</a>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-success" style="background:green;">Active template</button> 
                                        <?php } ?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('emailTemplate','template_edit','<?php echo encoding($rows->id) ?>');"><i class="fa fa-pencil"></i></a> -->
                                        <?php if($rows->is_active == 1) {?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('vendor_sale_email_template','id','<?php echo encoding($rows->id);?>','<?php echo $rows->is_active;?>')" title="Inactive Now"><i class="fa fa-check"></i></a> -->
                                        <?php } else { ?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('vendor_sale_email_template','id','<?php echo encoding($rows->id); ?>','<?php echo $rows->is_active;?>')" title="Active Now"><i class="fa fa-times"></i></a> -->
                                        <?php } 
                                    //} if ($menu_delete =='1') {?>
                                        <!-- <a href="javascript:void(0)" onclick="deleteFn('vendor_sale_email_template','id','<?php echo encoding($rows->header_id); ?>','emailTemplate')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
                                        <a href="javascript:void(0)" data-toggle="tooltip"   onclick="deleteFn('<?php echo 'vendor_sale_lettel_header'; ?>', 'id', '<?php echo encoding($rows->header_id); ?>', 'index.php/emailTemplate', 'index.php/emailTemplate/delVendors','<?php echo $rows->header_id . ' ' . $rows->header_id; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            
                                        <form id="templateForm_<?php echo $rows->header_id; ?>" style="display: none;">
                                            <input type="hidden" name="id" value="<?php echo $rows->header_id; ?>">
                                        
                                        </form>
                                        <?php //}?>

                                </td>
                            </tr>
                        <?php endforeach;
                    endif; ?>
                    </tbody>
                </table>
            </div>

            <?php } ?>

        </div>
        <!-- END Datatables Content -->
    </div>

            </div>
<div id="form-modal-box"></div>
<!-- CKEditor JS (CDN) -->
<script src="<?php echo base_url() . 'backend_asset/admin/js/' ?>helpers/ckeditor/ckeditor.js"></script>


<script>
    CKEDITOR.replace('recipient_template');
    CKEDITOR.replace('recipient_template');

    
</script>
<!-- <script>
     $("#template_list").change(function () {
        var template_id = this.value;
        alert(template_id);
        var firstDropVal = $('#template_data').val();
    });
</script> -->

<script>
    $("#template_list").change(function () {
        var template_id = this.value;
        // alert(template_id);

        // Assuming you want to send the template_id as a filter parameter
        $.ajax({
            url: '<?php echo base_url(); ?>' + "/emailTemplate/index", // Replace with your controller endpoint URL
            method: 'GET', // Or 'POST' depending on your preference
            data: { template_id: template_id },
            success: function(response) {
                // Update the content of the div with the response
                // $('#template_data').text(response);
            },
            error: function(xhr, status, error) {
                // Handle any errors
                console.error(xhr.responseText);
            }
        });
    });


    // $(document).ready(function () {
    // $("#template_list").change(function () {
    //     var template_id = this.value;

    //     <?php //echo $EmailTemplates;?>

    //     $.ajax({
    //         url: '<?php echo base_url(); ?>' + "/emailTemplate/index",
    //         method: 'GET', 
    //         data: { template_id: template_id },
    //         success: function(response) {
              
    //             document.write(response);
    //         },
    //         error: function(xhr, status, error) {
                
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
// });



    // $(document).ready(function(){
    // $("#template_list").change(function () {
    //     var template_id = this.value;
    //     $.ajax({
    //         url: '<?php echo base_url(); ?>' + "/emailTemplate/index", // Replace with your controller endpoint URL
    //         method: 'GET', // Or 'POST' depending on your preference
    //         data: { template_id: template_id },
    //         success: function(response) {
    //             // Update the content of the div with the main content area
    //             $('#template_data').html($(response).find('#main-content').html());
    //         },
    //         error: function(xhr, status, error) {
    //             // Handle any errors
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
// })
</script>



<!-- Script to initialize CKEditor -->













        

    <!-- END Page Content -->
<div id="form-modal-box"></div>
<div id="message_div">
    <span id="close_button"><img src="<?php echo base_url(); ?>backend_asset/images/close.png" onclick="close_message();"></span>
    <div id="message_container"></div>
</div> 

<script>
// function useTemplate(id) {
//     // Populate hidden form with data
//     var form = document.getElementById('templateForm_' + id);
//     form.action = '<?php echo base_url('emailTemplate/usedTemplate'); ?>';
   
//     $.ajax({
//         type: 'POST',
//         url: form.action,
//         data: $(form).serialize(), // Serialize form data
//         success: function(response) {
//             // Handle success response
//             alert(status);
//             if (response.status === 1) {
//             alert(response.message); // Show success message
//             if (response.reload) {
//                 location.reload(); // Reload the window
//             }
//         } else {
//             alert(response.message); // Show error message
//         }
//         },
//         error: function(xhr, status, error) {
//             // Handle error
//             console.error(xhr.responseText);
//         }
//     });
// }

function useTemplate(id) {
    // Populate hidden form with data
    var form = document.getElementById('templateForm_' + id);
    form.action = '<?php echo base_url('emailTemplate/usedTemplate'); ?>';
   
    $.ajax({
        type: 'POST',
        url: form.action,
        data: $(form).serialize(), // Serialize form data
        success: function(response) {
            // Handle success response
            // alert(JSON.stringify(response['status'])); // Alert the entire response object as a string
            // if (response.status === 1) {
                // alert(response.message); // Show success message
                // if (response.reload) {
                    location.reload(); // Reload the window
                // }
            // } else {
            //     alert(response.message); // Show error message
            // }
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(xhr.responseText);
        }
    });
}


</script>
                    

