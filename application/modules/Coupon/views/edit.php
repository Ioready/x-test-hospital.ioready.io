<style>
    .modal-footer .btn + .btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }

    .form-group {
        margin-bottom: 15px;
        padding:5px;
    }

    .control-label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-dialog {
        max-width: 700px;
        width: 100%;
    }
</style>

<div id="commonModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="addFormAjax" method="post" action="<?php echo base_url($updateFormUrl); ?>" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo isset($title) ? ucwords($title) : ""; ?></h2>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger" id="error-box" style="display: none;"></div>

                    <div class="form-body">
                        <div class="row">
                            <!-- Coupon Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Coupon Type</label>
                                    <select class="form-control" name="coupon_type" id="coupon_type">
                                        <option value="0" <?php echo ($results->coupon_type == 0) ? 'selected' : ''; ?>>Auto</option>
                                        <option value="1" <?php echo ($results->coupon_type == 1) ? 'selected' : ''; ?>>Deposit</option>
                                        <option value="2" <?php echo ($results->coupon_type == 2) ? 'selected' : ''; ?>>Without Deposit</option>
                                        <option value="3" <?php echo ($results->coupon_type == 3) ? 'selected' : ''; ?>>Registration</option>
                                    </select>
                                </div>
                            </div>

                            <!-- User Size -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">User Size</label>
                                    <input type="text" class="form-control" name="user_size" id="user_size" placeholder="User Size" value="<?php echo $results->user_size; ?>" />
                                </div>
                            </div>

                            <!-- Cash Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cash Type</label>
                                    <select class="form-control" name="cash_type" id="cash_type">
                                        <option value="1" <?php echo ($results->cash_type == 1) ? 'selected' : ''; ?>>Cash Bonus</option>
                                        <option value="2" <?php echo ($results->cash_type == 2) ? 'selected' : ''; ?>>Cash Deposit</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $results->amount; ?>" />
                                </div>
                            </div>

                            <!-- Used Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Used Type</label>
                                    <input type="text" class="form-control" name="used_type" id="used_type" placeholder="Used Type" value="<?php echo $results->used_type; ?>" />
                                </div>
                            </div>

                            <!-- Min Amount -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Min Amount</label>
                                    <input type="text" class="form-control" name="min_amount" id="min_amount" placeholder="Min Amount" value="<?php echo $results->min_amount; ?>" />
                                </div>
                            </div>

                            <!-- Percentage in Amount -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Percentage in Amount</label>
                                    <input type="text" class="form-control" name="percentage_in_amount" id="percentage_in_amount" placeholder="Percentage in Amount" value="<?php echo $results->percentage_in_amount; ?>" />
                                </div>
                            </div>

                            <!-- Start Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo $results->start_date; ?>" />
                                </div>
                            </div>

                            <!-- End Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">End Date</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo $results->end_date; ?>" />
                                </div>
                            </div>

                            <!-- Hidden ID -->
                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Reset</button>
                    <button type="submit" id="submit" class="btn btn-sm" style="background-color: #337ab7; color: #fff;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
