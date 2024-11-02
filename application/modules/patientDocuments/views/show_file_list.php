<style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}
</style>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        
       
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
                                <div class="form-group mt-5">

                                <div class="row">
                                    
                                    <?php foreach ($results as $image){ ?>
                                        <div class="col-md-4">
                                            <div class="panel panel-default bootcards-file">
                                                <div class="list-group">
                                                    <div class="list-group-item">
                                                        <a href="#">
                                                            <i class="icon-file-pdf"></i>
                                                        </a>
                                                        <h4 class="list-group-item-heading">
                                    <?php if (strtoupper(pathinfo($image->file_name, PATHINFO_EXTENSION)) == 'PDF') { ?>
                                        <a href="#">
                                            <span class="pdf-icon">
                                                <img src="https://logowik.com/content/uploads/images/638_pdf_icon.jpg" alt="PDF Icon" style="width: -webkit-fill-available;">
                                            </span>
                                        </a>
                                    <?php } ?>
                                </h4>

                        <!-- <p class="list-group-item-text"><strong><?= strtoupper(pathinfo($image->file_name, PATHINFO_EXTENSION)) ?></strong></p> -->
                        
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                        <a href="<?= base_url($image->file_name); ?>" class="btn btn-default" target="_blank">
                            <!-- <a href="<?= base_url($image->file_name); ?>" download class="btn btn-default" > -->
                                <i class="fa fa-eye"></i> View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

                          </div>

  
                                </div>
                            </div>
                            
                            <div class="space-22"></div>
                        </div>
                    </div>
                    </div>
                </div>
                
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

</div>



