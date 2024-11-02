<style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}
</style>
<div id="commonModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrlPDF) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                    </div>
                <div class="modal-body">
                    <!-- <div class="loaders">
                        <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <!-- <label class="col-md-3 control-label">Patient Name</label> -->
                                    
                                    <div class="col-md-9">
                                    <h4 class="no-margins fw-bold"></h4>
                                        <input type="hidden" name="patient_id" value="<?php print_r($this->data['patient_id']);?>" />
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label hover_me">Folder Name</label>
                                    <div class="col-md-9">
                                        <select name="folder_id" id="folder_id" class="form-control">
                                            <?php foreach($folder_name as $value){ ?>
                                                <option value="<?php echo $value->id;?>"><?php echo $value->folder_name;?></option>
                                               <?php } ?>
                                        </select>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label hover_me">Uploads file</label>
                                    <div class="col-md-9">
                                    <input type="file" class="form-control"  name="image_name[]" id="file" placeholder="File" multiple/>
                                    <!-- <input type="file" class="form-control" name="patient_data" id="patient_data" placeholder="file Name" /> -->
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-22"></div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <button  style="background: #337ab7" type="submit" id="submit" class="btn btn-sm btn-primary m-2" ><?php echo lang('submit_btn');?></button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

   
</div>



