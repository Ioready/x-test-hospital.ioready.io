<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
        <a href="<?php echo site_url('letters');?>">Letters</a>
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    
    
 
    
    <div class="block full">
        <div class="block-title">
            <h2><strong>Recipients</strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('letters/updateRecipients') ?>" enctype="multipart/form-data">

       
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row">

                <div class="col-md-12" >

                    
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                            <div class="col-md-12">
                            <label class="">Select Body*</label>
                            <select name="body_id" id="body_id" class="form-control">
                                <option value="">Select Body</option>
                                <?php 
                                foreach($body_list as $row){ ?>
                                     <option value="<?php echo $row->id?>" <?php echo $results->body_id == $row->id?'selected':'';?>><?php echo $row->internal_name?></option>

                               <?php }
                                ?>
                            </select>

                            </div>
                            <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span> -->
                            
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" >

                    
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                            <div class="col-md-12">
                            <label class="">Internal name*</label><br>
                            <span>This is used for internal reference and won't be seen by patients.</span>
                                <input type="text" class="form-control" name="internal_name" id="internal_name" value="<?php echo $results->internal_name;?>" />
                                <input type="hidden" class="form-control" name="recipients_id" id="recipients_id" value="<?php echo $results->id;?>"/>
                            
                            </div>
                            <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span> -->
                            
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">
                            </div>
                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Create Letter template * </label><br>
                                    <!-- <div class="col-md-12 offset-md-2">                                       -->
                                    <textarea id="editor1" name="bodies_template"><?php echo $results->recipient_template; ?></textarea>
                                    <!-- </div> -->

                                    <!-- <input type="file" class="form-control" id="comment" name="comment" rows="3"> -->
                                </div>                         
                            </div>
                        </div>
                    </div>
            </div>
            <div class="text-right">
                <button type="submit" id="submit" class="btn btn-sm btn-primary"   style="background: #337ab7;">Save</button>
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

 <!-- CKEditor JS (CDN) -->
 <script src="<?php echo base_url() . 'backend_asset/admin/js/' ?>helpers/ckeditor/ckeditor.js"></script>

<script>
  // Initialize CKEditor
  CKEDITOR.replace('editor1');
</script>
