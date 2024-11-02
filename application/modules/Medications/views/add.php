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
                    <!-- <div class="loaders">
                        <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <!-- <div class="form-body"> -->

                    <div class="form-body">
                        
                                         <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo encoding($patient_id);?>" placeholder="Enter Complaint">
                           
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <!-- Consultation Type & Date -->
                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <label for="consultationType">Consultation Type</label>
                                                                <select name="consultationType" id="consultationType" class="form-control" required>
                                                                    <option value="">Doctor Consultation</option>

                                                                    <?php if (!empty($doctors)) {
                                                                                foreach ($doctors as $doctor) { ?>
                                                                                        <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                                    <?php } } ?>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="consultationDate">Date</label>
                                                                <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>

                                        <div class="row">
                                        <input type="hidden" class="form-control" name="type" id="type" value="medication" placeholder="Enter Complaint">
                                        <input type="hidden" class="form-control consultationId" name="consultationId" id="consultationId" >
                                            <div class="col-md-11" style="border: 3px groove; border-radius: 10px; padding: 16px; margin-left: 31px;">
                                             <label><strong>Medication</strong></label>
                                            <div class="input-group mb-3">
                                                <input type="search" class="form-control medicationSearchData" placeholder="Search ..." id="medicationSearch" name="search">
                                                <div id="result_medication"></div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                </div>
                                            </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Since</label>
                                                        <input type="datetime-local" class="form-control" name="since" id="since">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Condition Type</label>
                                                        <input type="text" class="form-control" name="condition_type" id="condition_type">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Condition Significance</label>
                                                        <input type="text" class="form-control" name="condition_significance" id="condition_significance">
                                                    </div>
                                                </div>
                                                <label>Comment</label>
                                                <textarea class="form-control" rows="4" name="comment" id="comment"></textarea>
                                                <div>
                                                    <input type="checkbox" id="medicationSummary" name="medicationSummary">
                                                    <label for="medicationSummary"> Show in summary</label>
                                                </div>
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

<script type="text/javascript">
  $(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'342px',

 });
});

</script>

<!-- Consultation Medication script -->

<script>
    $(document).ready(function() {
        $("#medicationSearch").keyup(function() {
            var query = $(this).val();
            alert(query);
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('medications/fetchMedication'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_medication').html(data);
                    }
                });
            } else {
                $('#result_medication').html('');
            }
        });
    });
</script>
<script>
    function getSearchconsultationMedication() {
        var searchValue = document.getElementById("consultation_medication").value;

        document.getElementById("medicationSearch").value = searchValue;
    }
</script>

