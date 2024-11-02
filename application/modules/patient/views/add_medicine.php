<style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}
</style>
<!-- <div id="commonModalMedicine" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                    </div>
                <div class="modal-body">
                   
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-22"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <button type="submit" id="submit" class="btn btn-sm btn-primary" ><?php echo lang('submit_btn');?></button>
                </div>
            </form>
        </div> 
    </div>
</div> -->

<div id="commonModalMedicine" class="modal fade lg" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
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
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Patient Name</label>
                                    <div class="col-md-9">
                                    <h4 class="no-margins fw-bold"><?php echo $results->patient_name; ?></h4>
                                        <input type="text" class="form-control" name="patient_id" id="patient_id" value="<?php echo $results->id; ?>" placeholder="Name" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Type</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" class="form-control" name="type" id="type" placeholder="Type" />
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12" >
                           
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Antibiotic Name</label>
                                    <div class="col-md-9">
                                    <select id="framework" name="initial_rx[]" multiple class="form-control">
                                    
                                    <?php foreach ($initial_rx as $category) { ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div> -->

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Antibiotic Name</label>
                                    <div class="col-md-9">
                                    <select id="initial_rx" name="initial_rx" class="form-control">
                                    
                                    <?php foreach ($initial_rx as $category) { ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Details</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" class="form-control" name="detail" id="detail" placeholder="detail" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Recorded</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="last_recorded" id="last_recorded" placeholder="Last Recorded" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Prescribed</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="last_prescribed" id="last_prescribed" placeholder="Last Prescribed" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-22"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <input type="submit" id="submit" class="btn btn-sm btn-primary"  value="<?php echo lang('submit_btn');?>">
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>