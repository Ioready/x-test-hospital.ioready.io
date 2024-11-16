<!-- Page content -->
<div id="page-content"  style="background-color: whitesmoke;">
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($parent); ?>"><?php echo $title; ?></a>
        </li>
    </ul>

    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
        <div class="block full">
            <div class="row text-center">
            

                <div class="col-sm-6 col-lg-12 mt-4">
                    <div class="panel panel-default">
                       
                        <div class="p-4">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="text-left fw-bold">Download File:</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-left text-danger">Note: select care unit to download specific care unit's file or, overall file will be downloaded</div>
                    </div>
                    
                </div>
            </div>


                        <div class="panel-body">
                            <form action="<?php echo site_url('tasks'); ?>" name="patientForm" method="get">

                            <div class="col-lg-3">
                                    <?php // print_r($careUnitsUser);die;
                                    ?>
                                    <select id="care_unit" name="careUnit" class="form-control select-2" onchange="getPatient()">
                                        <option value="">Select Care Unit</option>
                                        <?php
                                        if (!empty($careUnitsUser)) {


                                            if (isset($careUnitsUser) && !empty($careUnitsUser)) {
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
                                            if (isset($careUnit) && !empty($careUnit)) {
                                                foreach ($careUnit as $row) {
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
                                        }
                                        ?>
                                    </select>
                                </div>
                                


                                <?php
                                if (isset($careUnitID)) {
                                    $careUnitID = (!empty($careUnitID)) ? $careUnitID : '';
                                }
                                ?>
                                <!-- month year download -->
                                <!-- <form action="<?php echo site_url('task/monthYearPatientExport'); ?>" name="patientFormExport" method="get"> -->
                                <div>
                                <!-- <div class="col-lg-3">
                                        <select class="form-control" name="month" id="month">
                                            <option value="">Select Month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div> -->
                                    <div class="col-lg-2">
                                    <select class="form-control" name="year" id="year">
                                            <?php
                                            // Get the current year
                                            $current_year = date("Y");

                                            // Loop through years from 10 years ago to 10 years in the future
                                            for ($i = $current_year - 10; $i <= $current_year + 10; $i++) {
                                                // Check if the current iteration is the current year
                                                $selected = ($i == $current_year) ? 'selected' : '';

                                                // Output each year as an option
                                                echo "<option value='$i' $selected>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6 col-lg-1" style="margin-right: 8px;">
                                        <input type="submit" name="search" class="btn btn-primary btn-sm save-btn" value="Search" />
                                    </div>
                                    

                                    <form action="<?php echo site_url('task'); ?>" name="patientFormExport" method="get">
                                <div class="col-sm-12 col-lg-2">
                                    <button type="submit" class="btn btn-primary btn-sm save-btn">
                                        <fa class="fa fa-undo"></fa> Reset
                                    </button>
                                </div>
                            </form>

                                   
                                </div>
                                <!-- </form> -->

                                <!-- <div class="col-sm-12 col-lg-1">
                                    <button type="submit" value="Export" name="export" class="btn btn-success btn-sm">
                                        <fa class="fa fa-file-pdf-o"></fa> Export
                                    </button>
                                </div> -->
                            </form>

                            <!-- <div class="col-sm-12 col-lg-3" style="margin-left:-20px;margin-right:-30px;">
                                        <button type="submit" class="btn btn-success btn-sm" value="Export" name="export">
                                            <fa class="fa fa-file-pdf-o"></fa> Download Monthly Surveillance List
                                        </button>
                                    </div> -->

                                    <div class="col-sm-12 col-lg-12 mt-4" style="margin-left:-20px;margin-right:-12px; ">
                                        <button type="submit" class="btn btn-success  fw-bold btn-sm" value="Export" name="export">
                                            <fa class="fa fa-file-pdf-o"></fa> Download Monthly Surveillance List
                                        </button>
                                    </div>


                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    <!-- Datatables Content -->
    <div class=>
        
    <?php 
                $all_permission = $this->ion_auth->is_permission();
                if (!empty($all_permission['form_permission'])) {
                foreach($all_permission['form_permission'] as $permission){
                   
                    $menu_view =$permission->menu_view;
                    $menu_create= $permission->menu_create;
                    $menu_update= $permission->menu_update;
                    $menu_delete =$permission->menu_delete;
                    $menu_name =$permission->menu_name;
                    // echo $menu_name;
                    if ($menu_name == 'Tasks') { 
                    if($menu_create =='1'){ ?>

        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <h2>
               
                    <a href="#" class="btn btn-sm btn-primary save-btn" data-toggle="modal" data-target="#myModal" >
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a>
                </h2>
            </div>
            <?php }}}} if($this->ion_auth->is_facilityManager()){?>
<!-- 
                <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <h2>
               
                    <a href="#" class="btn btn-sm btn-primary save-btn" data-toggle="modal" data-target="#myModal" >
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a>
                </h2>
            </div> -->

                <?php }?>
            <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('tasks/add') ?>" enctype="multipart/form-data">
        <div class="modal-header" style="text-align: center; padding: 15px; border-bottom: 1px solid #ddd; position: relative; background-color: #f8f9fa;">
    <!-- Close Button -->
    <button type="button" class="close" data-dismiss="modal"
        style="position: absolute; top: 15px; right: 20px; font-size: 1.5rem; color: #333; border: none; cursor: pointer;">
        <span aria-hidden="true">&times; Close</span>
        <span class="sr-only">Close</span>
    </button>

    <!-- Modal Title -->
    <h2 style="margin: 0; font-size: 1.6rem; font-weight: bold; color: #333; display: inline-flex; align-items: center;">
        <i class="fa fa-pencil" style="margin-right: 10px; color: #007bff;"></i>
        <?php echo (isset($title)) ? ucwords($title) : ""; ?>
    </h2>
</div>

    <div class="modal-body">
        <div class="alert alert-danger" id="error-box" style="display: none"></div>
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="m-4 control-label">Task Name</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="task_name" id="task_name" placeholder="Task Name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="m-4 control-label">Assign to</label>
                        <div class="col-md-12">
                            <select id="assign_to" name="assign_to" class="form-control select-chosen" size="1" onchange='getPatientId(this.value)'>
                                <option value="">Please select</option>
                                <?php
                                if (!empty($doctors)) {
                                    foreach ($doctors as $doctor) {
                                        ?>
                                        <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name . ' ' . $doctor->last_name; ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="m-4 control-label">Patient</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="search" placeholder="Search Patient" />
                            <!-- <input type="text" class="form-control" placeholder="Search" id="search"> -->

                            <!-- <div id="result"></div> -->
                        </div>
                    </div>

                    
                        <div class="form-group">
                            
                            <div class="col-md-12">
                            <input type="hidden" name="type" id="type" value="clinic_appointment">
                            <div id="result"></div>
                        </div>
                        </div>
               

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="m-4 control-label"><?php echo 'Due Date'; ?></label>
                        <div class="col-md-12">
                            <input type="datetime-local" class="form-control" name="due_date" id="due_date" placeholder="<?php echo 'due date'; ?>" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="m-4 control-label">Type</label>
                        <div class="col-md-12">
                            <select id="type" name="type" class="form-control select-chosen" size="1">
                                <?php
                                if (!empty($care_unit)) {
                                    if (!empty($care_unit)) {
                                        foreach ($care_unit as $row) {
                                            $select = "";
                                            if (isset($care_unit)) {
                                                if ($care_unit == $row->id) {
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="m-4 control-label" >Priority</label>
                        <div class="col-md-12">
                            <label class="priority-label" data-priority="High">
                                <input type="radio" class="form-control priority" name="priority" value="High" style="height: 1px; border: aliceblue;" />
                                <i class="fa fa-flag-o fa_custom"></i> High
                            </label>
                            <label class="priority-label pl" data-priority="Medium">
                                <input type="radio" class="form-control priority" name="priority" value="Medium" style="height: 1px; border: aliceblue;" />
                                <i class="fa fa-flag-o fa_custom"></i> Medium
                            </label>
                            <label class="priority-label pl" data-priority="Low">
                                <input type="radio" class="form-control priority" name="priority" value="Low" style="height: 1px; border: aliceblue;" />
                                <i class="fa fa-flag-o fa_custom"></i> Low
                            </label>
                            <label class="priority-label pl" data-priority="Unset">
                                <input type="radio" class="form-control priority" name="priority" value="Unset" style="height: 1px; border: aliceblue;" />
                                <i class="fa fa-flag-o fa_custom"></i> Unset
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="m-4 control-label">Comment</label>
                        <div class="col-md-12" >
                            <textarea class="form-control" name="task_comment" id="task_comment" placeholder="0000" row="5" cols="100"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button"  class="btn btn-sm btn-danger me-2"   data-dismiss="modal"><?php echo lang('reset_btn'); ?></button>
        <button type="submit" id="submit" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;"><?php echo lang('submit_btn'); ?></button>
    </div>
</form>

        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
                    </div>
        </div>

        <?php 
                $all_permission = $this->ion_auth->is_permission();
                if (!empty($all_permission['form_permission'])) {
                foreach($all_permission['form_permission'] as $permission){
                   
                    $menu_view =$permission->menu_view;
                    $menu_create= $permission->menu_create;
                    $menu_update= $permission->menu_update;
                    $menu_delete =$permission->menu_delete;
                    $menu_name =$permission->menu_name;
                    // echo $menu_name;
                    if ($menu_name == 'Tasks') { 
                    if($menu_create =='1'){ ?>
        <!-- <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered table table-bordered table-hover align-middle text-center">
                 -->
                 <div class="col-sm-12"> 
                         <div class="table-responsive" >
                            
                             <table id="appointmentTable" class="table table-bordered table-hover align-middle text-center">
                         
            <thead>
                    <tr>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;width:40px !important">Sr. No</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Priority</th>
                        
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Task Name</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Assign To</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Patient Name</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Type</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Task Comment</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Due Date</th>
                        <!-- <th style="background-color:#DBEAFF;font-size:1.3rem">MD Steward</th> -->
                        <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //if(!empty($careUnitsUser_list)){


                    if (!empty($careUnitsUser_list)) {
                        $rowCount = 0;
                        foreach ($careUnitsUser_list as $rows) {
                            $rowCount++;
                        
                            // print_r($rows);die;
                            
                    ?>
                            <tr>
                                <td><?php echo $rowCount; ?></td>
                                <td><?php if($rows->priority =="High"){ 
                                    ?>
                                    <label class="priority-label" data-priority="High">
                                    <i class="fa fa-flag-o fa_custom"></i>
                                    <?php
                                    echo 'H'; 
                                } else if($rows->priority =="Low"){
                                    ?>
                                    <label class="priority-label" data-priority="Low">
                                    <i class="fa fa-flag-o fa_custom"></i>
                                    <?php
                                echo 'L';
                                }else if($rows->priority =="Medium"){
                                    ?>
                                    <label class="priority-label" data-priority="Medium">
                                    <i class="fa fa-flag-o fa_custom"></i>
                                    <?php
                                    
                                    echo 'M';
                                } ?></td>

                                <td><?php echo $rows->task_name; ?></td>
                                <td><?php echo $rows->f_name. ' '.$rows->l_name; ?></td>
                                <td><?php echo $rows->patient_fname. ' '.$rows->patient_lname; ?></td>
                                <td><?php echo $rows->type_name; ?></td>
                                <td><?php echo $rows->task_comment; ?></td>
                                <td><?php echo $rows->culture_source_name; ?></td>

                                <td>
                                
                                            <?php 
                                            if ($this->ion_auth->is_all_roleslogin()){
                    
                                                if ($rows->task_status == 'Done'): ?>
                                                    <input type="hidden" class="notification-id" value="<?php echo $rows->patient_id; ?>">
                                                    <select class="statusDropdown custom-badge <?php echo ($rows->task_status == 'Done') ? 'status-green' : 'status-red'; ?>">
                                                        <option value="Done" selected><strong>Done</strong></option>
                                                        <option value="Pending"><strong>Pending</strong></option>
                                                    </select>
                                                <?php else: ?>
                                                    <input type="hidden" class="notification-id" value="<?php echo $rows->patient_id; ?>">
                                                    <select class="statusDropdown custom-badge <?php echo ($rows->task_status == 'Pending') ? 'status-red' : 'status-green'; ?>">
                                                        <option value="Done"><strong>Done</strong></option>
                                                        <option value="Pending" selected><strong>Pending</strong></option>
                                                    </select>
                                                <?php endif; 
                                                

                                             }else if($this->ion_auth->is_facilityManager()){ 
                                                if($rows->task_status == 'Done'): ?>
                                                <span class="custom-badge status-green"><?php echo $rows->task_status; ?></span> 
                                                
                                            <?php else: ?>
                                                <span class="custom-badge status-red"><?php echo $rows->task_status; ?></span> 
                                
                                             <?php endif; } ?>
                                        </td>
                            </tr>

                        <?php
                        }
                    }
                   
                    ?>

                </tbody>
            </table>
        </div>
        </div>

        <?php }}}} if($this->ion_auth->is_facilityManager()){?>

            <!-- <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered">
                -->
                <div class="col-sm-12"> 
                         <div class="table-responsive" >
                             <table id="appointmentTable" class="table table-bordered  align-middle text-center">
  


<div class=""style=" display: flex; justify-content: space-between; align-items: center;">
<h2 style=" font-weight: bold;font-size:20px">
        <strong><?php echo $title; ?></strong> Panel
    </h2>
               
                    <a href="#" class="btn btn-sm btn-primary save-btn" data-toggle="modal" data-target="#myModal" >
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a>
                </h2>
            </div>

                             <thead>
    <tr style="border-bottom: 2px solid #ccc;">
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; width: 40px; text-align: center; border-right: 1px solid #ccc;">Sr. No</th>
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; text-align: left; border-right: 1px solid #ccc;">Priority</th>
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; text-align: left; border-right: 1px solid #ccc;">Task Name</th>
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; text-align: left; border-right: 1px solid #ccc;">Assign To</th>
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; text-align: left; border-right: 1px solid #ccc;">Patient Name</th>
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; text-align: left; border-right: 1px solid #ccc;">Type</th>
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; text-align: left; border-right: 1px solid #ccc;">Task Comment</th>
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; text-align: left; border-right: 1px solid #ccc;">Due Date</th>
        <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 10px; text-align: center;">Action</th>
    </tr>
</thead>

<tbody>
    <?php
    if (!empty($careUnitsUser_list)) {
        $rowCount = 0;
        foreach ($careUnitsUser_list as $rows) {
            $rowCount++;
    ?>
        <tr style="border-bottom: 1px solid #ccc;">
            <!-- Serial Number -->
            <td style="padding: 10px; text-align: center;"><?php echo $rowCount; ?></td>

            <!-- Priority -->
            <td style="padding: 10px; text-align: center;">
                <?php if ($rows->priority == "High") { ?>
                    <label style="color: #d9534f; font-weight: bold; display: inline-flex; align-items: center;">
                        <i class="fa fa-flag-o" style="margin-right: 5px; color: #d9534f;"></i> H
                    </label>
                <?php } elseif ($rows->priority == "Medium") { ?>
                    <label style="color: #f0ad4e; font-weight: bold; display: inline-flex; align-items: center;">
                        <i class="fa fa-flag-o" style="margin-right: 5px; color: #f0ad4e;"></i> M
                    </label>
                <?php } elseif ($rows->priority == "Low") { ?>
                    <label style="color: #5bc0de; font-weight: bold; display: inline-flex; align-items: center;">
                        <i class="fa fa-flag-o" style="margin-right: 5px; color: #5bc0de;"></i> L
                    </label>
                <?php } ?>
            </td>

            <!-- Task Name -->
            <td style="padding: 10px;"><?php echo $rows->task_name; ?></td>

            <!-- Assigned To -->
            <td style="padding: 10px;"><?php echo $rows->f_name . ' ' . $rows->l_name; ?></td>

            <!-- Patient Name -->
            <td style="padding: 10px;"><?php echo $rows->patient_fname . ' ' . $rows->patient_lname; ?></td>

            <!-- Type -->
            <td style="padding: 10px;"><?php echo $rows->type_name; ?></td>

            <!-- Task Comment -->
            <td style="padding: 10px;"><?php echo $rows->task_comment; ?></td>

            <!-- Culture Source Name -->
            <td style="padding: 10px;"><?php echo $rows->culture_source_name; ?></td>

            <!-- Task Status -->
            <td style="padding: 10px; text-align: center;">
                <?php 
                if ($this->ion_auth->is_subAdmin()) {
                    if ($rows->task_status == 'Done') { ?>
                        <input type="hidden" class="notification-id" value="<?php echo $rows->patient_id; ?>">
                        <select style="padding: 5px; border-radius: 4px; background-color: #dff0d8; color: #3c763d; border: 1px solid #3c763d;">
                            <option value="Done" selected>Done</option>
                            <option value="Pending">Pending</option>
                        </select>
                    <?php } else { ?>
                        <input type="hidden" class="notification-id" value="<?php echo $rows->patient_id; ?>">
                        <select style="padding: 5px; border-radius: 4px; background-color: #f2dede; color: #a94442; border: 1px solid #a94442;">
                            <option value="Done">Done</option>
                            <option value="Pending" selected>Pending</option>
                        </select>
                    <?php } 
                } elseif ($this->ion_auth->is_facilityManager()) {
                    if ($rows->task_status == 'Done') { ?>
                        <span style="padding: 5px 10px; border-radius: 4px; background-color: #dff0d8; color: #3c763d;">Done</span>
                    <?php } else { ?>
                        <span style="padding: 5px 10px; border-radius: 4px; background-color: #f2dede; color: #a94442;">Pending</span>
                    <?php }
                } ?>
            </td>
        </tr>
    <?php
        }
    }
    ?>
</tbody>

            </table>
        </div>
        </div>

            <?php }?>

    </div>
</div>
<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {
    $('#appointmentTable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": false,
            "pageLength": 10,
            "order": [[0, 'desc']]  // Here, 0 represents the first column (index starts from 0)
        });

        $('.statusDropdown').on('change', function() {
        var selectedStatus = $(this).val();
        var notificationId = $(this).prev('.notification-id').val(); 
        
        $.ajax({
            url: '<?php echo base_url('tasks/update_task_doctor'); ?>',
            method: 'POST',
            data: { notificationId: notificationId, status: selectedStatus },
            success: function(response) {
                // Handle success response, if needed
                console.log(response);
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response, if needed
                console.error(xhr.responseText);
            }
        });
    });
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
.save-btn{
    font-weight:700;
    font-size: 1.1rem;
    padding: 0.6rem 2.25rem;
    background:#337ab7;
}
.save-btn:hover{
    /* background-color:#00008B !important; */
    background:#00008B !important;
}

</style>

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

<script>
 $(document).ready(function() {
    $('.priority-label input[type="radio"]').click(function() {
        $('.priority-label').removeClass('active');
        $(this).parent().addClass('active');
    });
});



</script>


<script>
    // Function to handle the priority selection
function handlePriorityChange(event) {
    // Remove 'highlighted' class from all labels
    const labels = document.querySelectorAll('.priority-label');
    labels.forEach(label => {
        label.classList.remove('highlighted');
    });
    
    // Get the selected input element
    const selectedInput = event.target;
    
    // Add 'highlighted' class to the label corresponding to the selected input
    const selectedLabel = selectedInput.parentNode;
    selectedLabel.classList.add('highlighted');
}

// Add event listeners to the radio buttons
const priorityInputs = document.querySelectorAll('input.priority');
priorityInputs.forEach(input => {
    input.addEventListener('change', handlePriorityChange);
});

</script>

<style>
    /* Highlight classes */
.priority-label.highlighted {
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);
    background-color: #FFFF; /* Example color, change as desired */
    padding:5px;
    border-radius:10px;
    margin:5px;

    
    

}

</style>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- Include DataTables CSS -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> -->
<!-- Include jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- Include DataTables -->
<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
<script>
$(document).ready(function() {
    // $('#common_datatable_menucat').DataTable();
    $('#appointmentTable').DataTable();

    // $('.statusDropdown').on('change', function() {
    //     var selectedStatus = $(this).val();
    //     var notificationId = $(this).prev('.notification-id').val(); 
        
    //     $.ajax({
    //         url: '<?php echo base_url('tasks/update_task_doctor'); ?>',
    //         method: 'POST',
    //         data: { notificationId: notificationId, status: selectedStatus },
    //         success: function(response) {
    //             // Handle success response, if needed
    //             console.log(response);
    //             window.location.reload();
    //         },
    //         error: function(xhr, status, error) {
    //             // Handle error response, if needed
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
});
</script>
<style>
    .custom-badge {
	border-radius: 4px;
	display: inline-block;
	font-size: 12px;
	min-width: 95px;
	padding: 1px 10px;
	text-align: center;
}
.status-red,
a.status-red {
	background-color: red;
	border: 1px solid #fe0000;
	color: white;
    border-radius:10px;
    padding:2px;
}
.status-green,
a.status-green {
	background-color: green;
	border: 1px solid #00ce7c;
    border-radius:10px;
    padding:2px;
	color: white;
}

</style>

<script>
    $(document).ready(function() {
        $("#search").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('tasks/fetch'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#result').html('');
            }
        });
    });
</script>