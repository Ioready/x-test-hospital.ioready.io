<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .modal-footer .btn+.btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }

    span.select2.select2-container.select2-container--default {
        width: 100% !important;
    }

    span.select2-selection.select2-selection--multiple {
        min-height: auto !important;
        overflow: auto !important;
        border: solid #ddd0d0 1px;
        color: black;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #d9416c;
    }
</style>

<div id="commonModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo $formUrl; ?>" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                </div>
                <div class="modal-body">
                    <!--                     <div class="loaders">
                                            <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';       
                                                        ?>" class="loaders-img" class="img-responsive">
                                        </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                            <!--  <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Patient type</label>
                                    <div class="col-md-9">
                                        <select id="patient_mode" name="patient_mode" class="form-control select-chosen" size="1">
                                            <option value="">Please select</option>
                                            <option value="New">New</option>
                                            <option value="Existing">Existing</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Task Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="task_name" id="task_name" placeholder="Task Name" />
                                    </div>
                                </div>
                            </div>
                            


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Assign to</label>
                                    <div class="col-md-9">
                                        <select id="assign_to" name="assign_to" class="form-control" size="1">
                                            <option value="">Please select</option>
                                            <?php
                                                if (!empty($doctors)) {
                                                    foreach ($doctors as $doctor) {
                                                ?>
                                                        <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <?php if ($this->ion_auth->is_admin()) { ?>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Select MD Steward</label>
                                        <div class="col-md-9">
                                            <select id="md_steward_id" name="md_steward_id" class="form-control select-chosen" size="1">
                                                <option value="">Select MD Steward</option>
                                                <?php foreach ($stawardss as $row) { ?>

                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->first_name . ' ' . $row->last_name; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->


                            <?php } else if ($this->ion_auth->is_facilityManager()) { ?>

                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Doctor</label>
                                        <div class="col-md-9">
                                            <select id="doctor_id" name="doctor_id" class="form-control select-chosen">
                                                <option value="">Please Select</option>
                                                <?php
                                                if (!empty($doctors)) {
                                                    foreach ($doctors as $doctor) {
                                                ?>
                                                        <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->doctor_name; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <?php $md_steward_id = $this->session->userdata('user_id');?>
                                <input type="text" class="form-control" name="md_steward_id" id="name" placeholder="Patient Id" maxlength="9" value="<?php echo $md_steward_id?>"/> -->
                                


                            <?php } else if ($this->ion_auth->is_subAdmin()) { ?>
                               

                               

                                
                                <?php }?>

                                <?php $md_steward_id = $this->session->userdata('user_id');?>
                                <input type="hidden" class="form-control" name="user_id" id="user_id" placeholder="Patient Id" maxlength="9" value="<?php echo $md_steward_id?>"/>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Patient</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="Patient Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo 'Due Date'; ?></label>
                                    <div class="col-md-9">
                                        <input type="datetime-local" class="form-control" name="due_date" id="due_date" placeholder="<?php echo 'due date'; ?>" />
                                    </div>
                                </div>
                            </div>

                        


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Type</label>
                                    <div class="col-md-9">
                                        <select id="type" name="type" class="form-control select-chosen" size="1">
                                        <?php
                                            if (!empty($careUnitsUser)) {


                                                if (!empty($careUnitsUser)) {
                                                    foreach ($careUnitsUser as $row) {

                                                        //print_r($row);die;
                                                        $select = "";
                                                        if (isset($careUnitID)) {
                                                            if ($careUnitID == $row->id) {
                                                                $select = "selected";
                                                            }
                                                        }
                                            ?>
                                                        <option value="<?php echo $row->id; ?>" <?php echo $select; ?>><?php echo $row->name; ?></option>
                                                    <?php
                                                    }
                                                }
                                            } else {

                                                foreach ($care_unit as $category) { ?>

                                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label" style="padding-left: 40px;">priority</label>

                                        <div class="col-md-9">
                                            <label class="priority-label" data-priority="High">
                                                <input type="radio" class="form-control priority" name="priority" value="High" />
                                                <i class="fa fa-flag-o fa_custom"></i>
                                                High
                                            </label>

                                            <label class="priority-label pl" data-priority="Medium">
                                                <input type="radio" class="form-control priority" name="priority" value="Medium" />
                                                <i class="fa fa-flag-o fa_custom"></i>
                                                Medium
                                            </label>

                                            <label class="priority-label pl" data-priority="Low">
                                                <input type="radio" class="form-control priority" name="priority" value="Low" />
                                                <i class="fa fa-flag-o fa_custom"></i>
                                                Low
                                            </label>

                                            <label class="priority-label pl" data-priority="Unset">
                                                <input type="radio" class="form-control priority" name="priority" value="Unset" />
                                                <i class="fa fa-flag-o fa_custom"></i>
                                                Unset
                                            </label>
                                        </div>

                                </div>
                            </div>
                             

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-1 control-label" style="padding-left: 40px;">Comment</label>
                                    <div class="col-md-11" style="padding-left: 51px;">
                                        <textarea class="form-control" name="task_comment" id="task_comment" placeholder="0000" row="5" cols="100"> </textarea>
                                        
                                    </div>

                                </div>
                            </div>



                           


                            <iframe src='' id='myFrame' hidden>
                            </iframe>
                            <!-- <iframe src='http://localhost/IDCARE/aj.pdf' id='myFrame' frameborder='0' style='border:0;' width='300' height='300' hidden>
                            </iframe> -->
                            <div class="modal-header text-center"></div>
                         
                          
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn'); ?></button>
                    <button type="submit" id="submit" class="btn btn-sm btn-primary"><?php echo lang('submit_btn'); ?></button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>
    $('#date_of_start_abx').datepicker({
        todayBtn: "linked",
        format: "mm/dd/yyyy",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
</script>


<script>
    function myFunction4() {
        var txt;
        if (confirm("You are about to ADD the MD Steward recommendations, please confirm or cancel.")) {
            //txt = "You pressed OK!";
            document.getElementById("demo1").style = 'display:block';

        } else {
            //txt = "You pressed Cancel!";
            document.getElementById("demo1").style = 'display:none';
        }
    }


    function showDiv(select) {
        if (select.value == "Loeb" || select.value == "Nhsn -UTI" || select.value == "Nhsn -CDI/MDRO" || select.value == "McGeer – UTI" || select.value == "McGeer – RTI" || select.value == "McGeer – GITI" || select.value == "McGeer –SSTI") {
            document.getElementById('hidden_div').style.display = "block";
        } else {
            document.getElementById('hidden_div').style.display = "none";
        }
    }



    function myFun() {
        event.preventDefault();
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "Loeb") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form1.html", "_blank")
        }

        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "McGeer – UTI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form2.html", "_blank")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "McGeer – RTI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form3.html", "_blank")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "McGeer – GITI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form4.html", "_blank")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "McGeer –SSTI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form5.html", "_blank")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "Nhsn -UTI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>front_assets/images/57.114_uti_blank.pdf")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "Nhsn -CDI/MDRO") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>front_assets/images/57.128_LabIDEvent_BLANK")
        }

    }

    $('input[type=radio][name="criteria_met"]').prop('checked', false);
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".multiple-select").select2({
        // maximumSelectionLength: 2
        placeholder: "Please select",
    });
</script>
<style>
.priority-label {
    cursor: pointer;
}

.priority-label:hover i {
    color: blue; /* Change color on hover */
}

.priority-label.active i {
    color: green; /* Change color when active */
}

.priority{
    width: 20px;
}
.pl{
    padding-left: 25px;
}

.priority-label[data-priority="High"] i {
    color: red; /* Set color for High priority */
}

.priority-label[data-priority="Medium"] i {
    color: orange; /* Set color for Medium priority */
}

.priority-label[data-priority="Low"] i {
    color: green; /* Set color for Low priority */
}

.priority-label[data-priority="Unset"] i {
    color: grey; /* Set color for Unset priority */
}

</style>
<script>
 $(document).ready(function() {
    $('.priority-label input[type="radio"]').click(function() {
        $('.priority-label').removeClass('active');
        $(this).parent().addClass('active');
    });
});


</script>