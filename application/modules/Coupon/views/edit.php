<style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}
</style>
<div id="commonModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($updateFormUrl) ?>" enctype="multipart/form-data">
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
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Coupon Type</label>
                                    <div class="col-md-12">
                                    <select class="form-control" name="coupon_type" id="coupon_type">
                                        <option class="form-control" value="0" <?php echo ($results->coupon_type == 0) ? 'selected' : ''; ?>>Auto</option>
                                        <option class="form-control" value="1" <?php echo ($results->coupon_type == 1) ? 'selected' : ''; ?>>Deposit</option>
                                        <option class="form-control" value="2" <?php echo ($results->coupon_type == 2) ? 'selected' : ''; ?>>Without deposit</option>
                                        <option class="form-control" value="3" <?php echo ($results->coupon_type == 3) ? 'selected' : ''; ?>>Registration</option>
                                    </select>

                                    <!-- <select class="form-control" name="coupon_type" id="coupon_type">
                                            <option class="form-control" value="0">Auto</option>
                                            <option class="form-control" value="1">Deposit</option>
                                            <option class="form-control" value="2">Without deposit</option>
                                            <option class="form-control" value="3">Registration</option>
                                            	
                                        </select> -->
                                        <!-- <input type="text" class="form-control" name="coupon_type" id="coupon_type" placeholder="coupon type" value="<?php echo $results->coupon_type; ?>"/> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">User Size</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="user_size" id="user_size" placeholder="User Size" value="<?php echo $results->user_size; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Cash Type</label>
                                    <div class="col-md-12">
                                    <select class="form-control" name="cash_type" id="cash_type">
                                            <option class="form-control" value="1"<?php echo ($results->cash_type == 1) ? 'selected' : ''; ?>>Cash bonus</option>
                                            <option class="form-control" value="2"<?php echo ($results->cash_type == 2) ? 'selected' : ''; ?>>Cash deposit</option>
                                           
                                        </select>
                                        <!-- <input type="text" class="form-control" name="cash_type" id="cash_type" placeholder="Cash Type" value="<?php echo $results->cash_type; ?>"/> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Amount</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $results->amount; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Used_type</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="used_type" id="used_type" placeholder="Used Type" value="<?php echo $results->used_type; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Min Amount</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="min_amount" id="min_amount" placeholder="Min Amount" value="<?php echo $results->min_amount; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Percentage in amount</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="percentage_in_amount" id="percentage_in_amount" placeholder="Percentage in amount" value="<?php echo $results->percentage_in_amount; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Start date</label>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Percentage in amount" value="<?php echo $results->start_date; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">End Date</label>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Percentage in amount" value="<?php echo $results->end_date; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />
                            <div class="space-22"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <button type="submit" id="submit"  style="background-color:#337ab7;" class="btn btn-sm m-2 text-white"><?php echo lang('submit_btn');?></button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>