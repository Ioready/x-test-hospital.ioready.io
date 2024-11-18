<script src="<?php echo base_url() . 'backend_asset/admin/js/' ?>helpers/ckeditor/ckeditor.js"></script>
<style>
    .modal-footer .btn+.btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }
    .modal-dialog{
        width: 766px !important;
    }
</style>
<div id="commonModal" class="modal fade" role="dialog">
    <<div class="modal-dialog" style="max-width:60%; width: 100%; margin: 0 auto;">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="editFormAjax" method="post" action="<?php echo base_url('index.php/tutorials/tutorial_update') ?>" enctype="multipart/form-data">
            <div class="modal-header" style="padding: 15px; border-bottom: 1px solid #ddd;">
                    <button type="button" class="close" data-dismiss="modal" style="font-size: 1.5rem;">&times;</button>
                    <h4 class="modal-title" style="font-weight: bold;"><?php echo isset($title) ? ucwords($title) : ''; ?></h4>
                </div>
                <div class="modal-body">
                    <div class="loaders">
                        <img src="<?php echo base_url() . 'backend_asset/images/Preloader_2.gif'; ?>" class="loaders-img" class="img-responsive">
                    </div>
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="m-4 control-label">Category</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="category_id" id="category_id">

                                            <?php foreach ($category as $cat) { ?>
                                                <option value="<?php echo $cat->id; ?>" <?php echo ($results->category_id == $cat->id) ? "selected" : ""; ?>><?php echo $cat->category_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class=" control-label m-4">File attachment</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="image_name[]" id="file" placeholder="File" multiple />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="m-4 control-label">Tutorial</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="tutorial" id="tutorial" value="<?php echo $results->tutorial; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="m-4 control-label">Description</label>
                                    <div class="col-md-12">
                                        <textarea type="text" class="form-control ckeditor summernote" name="description" id="description"><?php echo $results->description; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />
                            <div class="space-22"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button style="background: #337ab7;" class="btn btn-primary m-2"  type="submit" id="submit" class="<?php echo THEME_BUTTON; ?>">Update</button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
    $('#commonModal').on('shown.bs.modal', function() {
        if (CKEDITOR.instances['description']) {
            CKEDITOR.instances['description'].destroy();
        }
        CKEDITOR.replace('description', {});
    });
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: true
        });
    });
</script>