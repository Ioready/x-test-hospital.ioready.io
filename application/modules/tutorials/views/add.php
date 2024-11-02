<script src="<?php echo base_url() . 'backend_asset/admin/js/' ?>helpers/ckeditor/ckeditor.js"></script>
<style>
    .modal-footer .btn+.btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }

    .modal-dialog {
        width: 766px !important;
    }
</style>
<div id="commonModal" class="modal fade" role="dialog">
<div class="modal-dialog model-lg" >
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/tutorials/tutorial_add') ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title fw-bold">Add Tutorial</h4>
                </div>
                <div class="modal-body">
                    <!-- <div class="alert alert-danger" id="error-box" style="display: none"></div> -->
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class=" control-label m-4">Category</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select Category</option>
                                            <?php foreach ($category as $cat) { ?>
                                                <option value="<?php echo $cat->id; ?>"><?php echo $cat->category_name; ?></option>
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
                                    <label class=" control-label m-4">Tutorial</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="tutorial" id="tutorial" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label m-4">Description</label>
                                    <div class="col-md-12">
                                        <!-- <textarea type="text" class="form-control summernote" name="description" id="description"></textarea> -->

                                        <textarea class="form-control summernote ckeditor" name="description" id="description"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="space-22"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger"  class="btn btn-danger" data-dismiss="modal"><?php echo lang('close_btn'); ?></button>
                    <button type="submit" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;"  id="submit" class="<?php echo THEME_BUTTON; ?>"><?php echo lang('submit_btn'); ?></button>
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