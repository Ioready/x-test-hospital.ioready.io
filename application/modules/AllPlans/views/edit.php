<style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}
</style>
<div id="commonModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="width: inherit;">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Edit Plan</h2>
                    </div>
                <div class="modal-body">
                    <!-- <div class="loaders">
                        <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                            
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Plan Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="plan_name" id="plan_name" placeholder="Plan Name"  value="<?php echo $results->PlanName;?>"/>
                                        <input type="hidden" class="form-control" name="id" id="id" placeholder="Plan Name"  value="<?php echo $results->id;?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Price</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $results->Price;?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Duration</label>
                                    <div class="col-md-12">
                                    <div class="switch-wrapper">
                                        <input id="toggle-monthly" type="radio" name="Duration" value="month" checked>
                                        <label for="monthly">Monthly</label>
                                        <input id="toggle-yearly" type="radio" name="Duration" value="years">
                                        
                                        <label for="yearly">Yearly</label>
                                        <span class="highlighter"></span>
                                    </div>
                                    

                                        <!-- <input type="datetime-local" class="form-control" name="start_date" id="start_date" placeholder="start date" /> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <?php echo $results->plan_description;?> -->
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Description</label>
                                    <div class="col-md-12">
                                        <textarea name="plan_description" id="editor" cols="30" rows="10"><?php echo $results->plan_description;?></textarea>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Uploads Icon</label>
                                        <input type="file" class="form-control" name="icons" id="icons" placeholder="icons" />
                                </div>
                            </div>
                            
                            <div class="space-22"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <button type="submit" id="submit"  style="background-color:#337ab7;" class="btn btn-sm m-2 text-white" ><?php echo lang('submit_btn');?></button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script> -->

<script>
  // Initialize CKEditor
  CKEDITOR.replace('editor1');
</script>