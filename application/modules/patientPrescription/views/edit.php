<style>
    .modal-footer .btn + .btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }
</style>
<div id="commonModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                </div>
                <div class="modal-body">
                    <div class="loaders">
                        <img src="<?php echo base_url() . 'backend_asset/images/Preloader_2.gif'; ?>" class="loaders-img" class="img-responsive">
                    </div>
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">

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
                                        <input type="hidden" class="form-control" name="patient_id" id="patient_id_data" value="<?php echo $results->patient_id; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                           
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Prescriptions Name</label>
                                    <div class="col-md-9">
                                    <select id="framework" name="prescriptions_name" class="form-control">
                                    
                                    <?php foreach ($precautions as $category) { ?>
                                    <option value="<?php echo $category->id; ?>" <?php echo ($results->prescriptions_name == $category->id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                            

                            <div class="col-md-12" >
                           
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Doctor Name</label>
                                    <div class="col-md-9">
                                    <select id="framework" name="doctor_name" class="form-control">
                                    
                                    <?php foreach ($doctors as $category) { ?>
                                    <option value="<?php echo $category->id; ?>" <?php echo ($results->doctor_id == $category->id) ? 'selected' : ''; ?>><?php echo $category->first_name. ' '. $category->last_name; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Details</label>
                                    <div class="col-md-9">
                                    <textarea name="detail" id="detail" rows="4" cols="45"><?php echo $results->details; ?></textarea>
                                        <!-- <input type="text" class="form-control" name="detail" id="detail" placeholder="detail" /> -->
                                    </div>
                                </div>
                            </div>

                            
                            
                            <div class="space-22"></div>
                        </div>
                    </div>
                    </div>
                </div>

                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />

                            <div class="space-22"></div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;">Save Changes</button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>