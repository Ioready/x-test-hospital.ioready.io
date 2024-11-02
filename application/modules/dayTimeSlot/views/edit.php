<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($this->router->fetch_class()); ?>"><?php echo $title;?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <div class="row">
 
        <div class="col-md-12" >    <div class="block full">
                <div class="block-title">
                    <h2><strong><?php echo $title;?></strong> Panel</h2>
                </div>        
                <form class="form-horizontal" role="form" id="editFormAjaxUser" method="post" action="<?php echo base_url('index.php/appointment/update') ?>" enctype="multipart/form-data">
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                    </div>
                    <!-- <div class="loaders">
                        <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif'; ?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                   
                    <div class="form-body">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label class="col-md-3 control-label">Date</label>
                            <div class="col-md-9">
                            <input type="date" id="date" name="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($results->date)); ?>" required>

                            <!-- <input type="date" id="date" name="date" class="form-control" value="<?php echo isset($results->date) ? $results->date : ''; ?>" required> -->

                            </div>
                             <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span>  -->
                        </div>
                    </div>
                   
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label class="col-md-3 control-label">Start Time</label>
                            <div class="col-md-9">
                            <input type="time" class="form-control" value="<?php $date = date("H:i", strtotime($results->time_start)); echo "$date"; ?>" id="time_start" name="time_start" />
                            <!-- <input type="time" id="time_start" name="time_start" class="form-control" required> -->
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label class="col-md-3 control-label">End Time</label>
                            <div class="col-md-9">
                            <input type="time" class="form-control" value="<?php $date = date("H:i", strtotime($results->time_end)); echo "$date"; ?>" id="time_end" name="time_end" />
                            <!-- <input type="time" id="time_end" name="time_end" class="form-control" required> -->
                            </div>
                           
                        </div>
                    </div>

                <div class="col-md-12" >
                        <div class="form-group">
                            <label class="col-md-3 control-label">Patient Name:</label>
                            <div class="col-md-9">
                           
                    <input type="text" id="patient_name" name="patient_name" class="form-control" value="<?php echo $results->patient_id; ?>" required>
                            </div>
                             <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span>  -->
                        </div>
                    </div>
                    
                     <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <label class="col-md-3 control-label">Doctor Name:</label> -->
                            <div class="col-md-9">
                           
                        <input type="hidden" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo $results->doctor_id; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" >
                    <div class="form-group">
                            <label class="col-md-3 control-label">Reason for Appointment:</label>
                            <div class="col-md-9">
                        <textarea id="reason" name="reason" rows="4" cols="50" class="form-control" value="<?php echo $results->reason; ?>" required><?php echo $results->reason; ?></textarea>
                            </div>
                        </div>
                    <div class="space-22"></div>
                </div>
            </div>

                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />
                            <input type="hidden" name="password" value="<?php echo $results->password; ?>" />
                            <input type="hidden" name="exists_image" value="<?php echo $results->profile_pic; ?>" />
                            <div class="space-22"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit"  class="btn btn-sm btn-primary" id="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div></div>

    </div>

    <!-- Datatables Content -->







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
        endDate: 'today'
    });
    /*    $("#zipcode").select2({
     allowClear: true
     });*/
</script>
