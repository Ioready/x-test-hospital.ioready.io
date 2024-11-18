<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
        <a href="<?php echo site_url('emailTemplate/letterTemplate');?>"><strong>Back</strong></a>
         
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    
    
 
    <div class="block full">
    <div class="block-title">
        <h2><strong>Bodies</strong> Panel</h2>
    </div>
    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
        <div class="alert alert-danger" id="error-box" style="display: none"></div>
        <div class="form-body">
            <div class="row">.
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Select Header*</label>
                        <div class="col-md-10">
                            <select name="header_id" id="header_id" class="form-control">
                                <option value="">Select Header</option>
                                <?php 
                                foreach($header_list as $row){ ?>
                                     <option value="<?php echo $row->id?>"><?php echo $row->internal_name?></option>

                               <?php }
                                ?>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Internal name*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="internal_name" id="internal_name" placeholder="<?php echo lang('first_name');?>" />
                            <span class="help-block">This is used for internal reference and won't be seen by patients.</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" >
                    <div class="form-group">
                        <label class="col-md-2 control-label">Create Letter template*</label>
                        <div class="col-md-10">
                            <textarea id="editor1" name="bodies_template"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" id="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>

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
        endDate:'today'       
    });

   

</script>

<script src="<?php echo base_url() . 'backend_asset/admin/js/' ?>helpers/ckeditor/ckeditor.js"></script>

<script>
  // Initialize CKEditor
  CKEDITOR.replace('editor1');
</script>
