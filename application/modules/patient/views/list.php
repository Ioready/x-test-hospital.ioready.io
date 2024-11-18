<!-- Page content -->
<div id="page-content" style="background-color: whitesmoke;">
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
                <!--  <div class="col-sm-6 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="msg"></div>
                        <?php
                        $message = $this->session->flashdata('success');
                        if (!empty($message)) :
                        ?><div class="alert alert-success">
                                <?php echo $message; ?></div><?php endif; ?>
                        <?php
                        $error = $this->session->flashdata('error');
                        if (!empty($error)) :
                        ?><div class="alert alert-danger">
                                <?php echo $error; ?></div><?php endif; ?>
                        <form action="<?php echo site_url('patient/patientImport'); ?>" name="patientFormExport" method="post" enctype="multipart/form-data">
                            <div class="col-sm-6 col-lg-2">
                                <div class="text-left">Upload File:</div>
                            </div>
                            <div class="col-sm-6 col-lg-10">
                                <div class="text-left text-danger">Note: First, select care unit to upload the file</div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <select id="care_unit1" name="careUnit" class="form-control select-2" onchange="getPatient()">
                                    <option value="">Select Care Unit</option>
                                    <?php
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
                                            ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-lg-4 hidetext">
                                <input type="file" name="patientFile" class="form-control" accept=".csv"/>
                            </div>
                            <div class="col-sm-6 col-lg-1 hidetext">
                                <button type="submit" class="btn btn-info btn-sm" value="Import"><fa class="fa fa-file-pdf-o"></fa> Import</button>
                            </div>
                            <div id="labelError"></div>
                        </form>
                    </div>
                </div></div> -->

                <div class="row">
                
                <div class="col-lg-12 mt-4">
                <div class="panel panel-default">
            <div class="p-4">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="text-left fw-bold">Download File:</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-left text-danger">Note: select care unit to download specific care unit's file or, overall file will be downloaded</div>
                    </div>
                    <div class="col-lg-2">
                        <?php
                        $message = $this->session->flashdata('success');
                        if (!empty($message)) :
                        ?>
                        <div class="alert alert-success"><?php echo $message; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-2">
                        <?php
                        $error = $this->session->flashdata('error');
                        if (!empty($error)) :
                        ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

                        <div class="panel-body">
                            <form action="<?php echo site_url('patient'); ?>" name="patientForm" method="get">

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
                                <!-- <div class="col-sm-12 col-lg-2">
                                    <input type="text" class="form-control" name="date" id="date" placeholder="from date" />
                                </div>
                                <div class="col-sm-12 col-lg-2">
                                    <input type="text" class="form-control" name="date1" id="date1" placeholder="to date" />
                                </div> -->


                                <?php
                                if (isset($careUnitID)) {
                                    $careUnitID = (!empty($careUnitID)) ? $careUnitID : '';
                                }
                                ?>
                                <!-- month year download -->
                                <!-- <form action="<?php echo site_url('patient/monthYearPatientExport'); ?>" name="patientFormExport" method="get"> -->
                                <div>
                                <div class="col-lg-2">
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
                                    </div>
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

                                    <div class="col-lg-1">
                        <input type="submit" name="search" class="save-btn btn btn-primary btn-sm" value="Search" />
                    </div>

                    <form action="<?php echo site_url('patient'); ?>" name="patientFormExport" method="get">
                                <div class="col-sm-12 col-lg-2">
                                    <button type="submit" class="btn btn-primary save-btn btn-sm">
                                        <fa class="fa fa-undo"></fa> Reset
                                    </button>
                                </div>
                            </form>

                       

                                    <div class="col-sm-12 col-lg-12 mt-4" style="margin-left:-20px;margin-right:-12px; ">
                                        <button type="submit" class="btn btn-success  fw-bold btn-sm" value="Export" name="export">
                                            <fa class="fa fa-file-pdf-o"></fa> Download Monthly Surveillance List
                                        </button>
                                    </div>
                                </div>
                                <!-- </form> -->

                                <!-- <div class="col-sm-12 col-lg-1">
                                    <button type="submit" value="Export" name="export" class="btn btn-success btn-sm">
                                        <fa class="fa fa-file-pdf-o"></fa> Export
                                    </button>
                                </div> -->
                            </form>


                         
                        </div>
                    </div>
                </div>

                </div>

            </div>
        </div>

    <?php } ?>
    <!-- Datatables Content -->
    <div class="block full">

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
                    if ($menu_name == 'Patients') { 
                        if ($menu_create =='1') {
                     ?>

        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <!-- <h2><a href="javascript:void(0)" onclick="open_modal('<?php
                                                                    echo 'index.php/'.$model; ?>')" class="btn save-btn btn-sm btn-primary">
                    <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                </a></h2> -->
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary save-btn">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>

        </div>

        <?php } if($menu_view =='1'){ ?>
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
               
            <thead>
                    <tr>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;width:40px !important">Sr. No</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Date Of Start patient frist seen</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Patient ID</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Patient Name</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Specility</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Provider MD</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Diagnosis</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Room Number</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Complication</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Nect appointment</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Investigation</th>
                        <!-- <th style="background-color:#DBEAFF;font-size:1.3rem">Culture Source</th> -->
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Lettercomplete/Notcomplete</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Invoice</th>
                        <!-- <th style="background-color:#DBEAFF;font-size:1.3rem">MD Steward</th> -->
                        <th style="background-color:#DBEAFF;font-size:1.3rem">Pending task</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    //if(!empty($careUnitsUser_list)){


                    // if (!empty($careUnitsUser_list)) {
                    //     $rowCount = 0;
                    //     foreach ($careUnitsUser_list as $rows) {
                    //         $rowCount++;
                    ?>


                            


                        <?php
                        // }
                        //}
                    // } else {
                        $rowCount = 0;
                        foreach ($list as $rows) :
                            $rowCount++;
                            
                        ?>
                            <tr>
                                <td><?php echo $rowCount; ?></td>
                                <td><?php echo date('m/d/Y', strtotime($rows->date_of_start_abx)); ?></td>
                                <td><?php echo $rows->pid; ?></td>
                                <td><?php echo $rows->patient_name; ?></td>
                                <td><?php echo $rows->care_unit_name; ?></td>
                                <td><?php echo $rows->doctor_name; ?></td>
                                <td><?php echo $rows->initial_dx_name; ?></td>
                                <td><?php echo $rows->room_number; ?></td>
                                <?php if ($rows->symptom_onset == 'Facility') { ?>
                                    <td><?php echo 'Facility/HAI'; ?></td>
                                <?php } else if ($rows->symptom_onset == 'Hospital') { ?>
                                    <td><?php echo 'Hospital/CAI'; ?></td>
                                <?php } else { ?>
                                    <td><?php echo 'NULL'; ?></td>
                                <?php } ?>

                                <td><?php echo $rows->total_days_of_patient_stay; ?></td>

                                <?php if (!empty($rows->culture_source_name)) { ?>
                                    <td><?php echo $rows->culture_source_name; ?></td>
                                <?php } else { ?>
                                    <td><?php echo 'NULL'; ?></td>
                                <?php } ?>

                                <?php if (!empty($rows->organism_name)) { ?>
                                    <td><?php echo $rows->organism_name; ?></td>
                                <?php } else { ?>
                                    <td><?php echo 'NULL'; ?></td>
                                <?php } ?>

                                <td><?php echo $rows->initial_rx_name; ?></td>
                                <td><?php echo ucfirst($rows->md_patient_status); ?></td>
                    
                            <td class="actions">
                                <!-- <a href="javascript:void(0)" class="btn btn btn-xs  btn-warning" onclick="editFn('index.php/patient', 'edit_patient', '<?php echo encoding($rows->patient_id) ?>', 'patient');"> -->
                                <!-- <i class="fa fa-pencil"></i>
                                </a> -->
                                <?php if($menu_update =='1'){ ?>

                                <a href="<?php echo base_url() . 'patient/edit?id=' . encoding($rows->patient_id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                        
                                <!-- <a href="<?php echo base_url() . 'patient/edit_parient?id=' . encoding($rows->patient_id); ?>" data-toggle="tooltip" class="btn btn-default" target="_blank"><i class="fa fa-pencil"></i></a> -->
                                <!-- <a href="<?php echo base_url() . 'index.php/patient/existing_list/' . $rows->pid; ?>" target='_blank' data-toggle="tooltip" class="btn btn-default">View History</a> -->
                                <!-- <a href="<?php echo base_url() . 'index.php/patient/existing_list/' . $rows->pid; ?>" target='_blank' data-toggle="tooltip" class="btn btn-xs  btn-success"><i class="fa fa-eye"></i></a> -->
                                <!-- <a href="<?php echo base_url() . 'index.php/patient/patientDetails?id=' . encoding($rows->patient_id); ?>" data-toggle="tooltip" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> -->
                                <a href="<?php echo base_url() . 'index.php/patient/summary?id=' . encoding($rows->patient_id); ?>" data-toggle="tooltip" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                <?php } if($menu_delete =='1'){ ?>
                                <a href="javascript:void(0)" onclick="deletePatient('<?php echo $rows->patient_id; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                <?php }?>
                            </td>

                            </tr>
                    <?php
                        endforeach;
                    // }
                    ?>

                </tbody>
            </table>
        </div>

        <?php }}}} if($this->ion_auth->is_facilityManager()){?>

            <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <!-- <h2><a href="javascript:void(0)" onclick="open_modal('<?php
                                                                    echo 'index.php/'.$model; ?>')" class="btn save-btn btn-sm btn-primary">
                    <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                </a></h2> -->
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary save-btn">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>

        </div>

        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                <tr>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; width: 40px; text-align: center; border-bottom: 2px solid #ccc;">Sr. No</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Date Of Start Patient First Seen</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Patient ID</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Patient Name</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Specialty</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Provider MD</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Diagnosis</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Room Number</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Complication</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Next Appointment</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Investigation</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Letter Complete/Not Complete</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Invoice</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;">Pending Task</th>
    <th style="background-color: #DBEAFF; font-size: 1.3rem; font-weight: bold; padding: 12px; text-align: left; border-bottom: 2px solid #ccc;"><?php echo lang('action'); ?></th>
</tr>

                </thead>
                <tbody>


                    <?php
                    //if(!empty($careUnitsUser_list)){


                    // if (!empty($careUnitsUser_list)) {
                    //     $rowCount = 0;
                    //     foreach ($careUnitsUser_list as $rows) {
                    //         $rowCount++;
                    ?>


                            


                        <?php
                        // }
                        //}
                    // } else {
                        $rowCount = 0;
                        foreach ($list as $rows) :
                            $rowCount++;
                            
                        ?>
                         <tr style="border-bottom: 1px solid #ddd;">
    <td style="padding: 10px;"><?php echo $rowCount; ?></td>
    <td style="padding: 10px;"><?php echo date('m/d/Y', strtotime($rows->date_of_start_abx)); ?></td>
    <td style="padding: 10px;"><?php echo $rows->pid; ?></td>
    <td style="padding: 10px;"><?php echo $rows->patient_name; ?></td>
    <td style="padding: 10px;"><?php echo $rows->care_unit_name; ?></td>
    <td style="padding: 10px;"><?php echo $rows->doctor_name; ?></td>
    <td style="padding: 10px;"><?php echo $rows->initial_dx_name; ?></td>
    <td style="padding: 10px;"><?php echo $rows->room_number; ?></td>

    <td style="padding: 10px;">
        <?php echo ($rows->symptom_onset == 'Facility') ? 'Facility/HAI' : (($rows->symptom_onset == 'Hospital') ? 'Hospital/CAI' : 'NULL'); ?>
    </td>

    <td style="padding: 10px;"><?php echo $rows->total_days_of_patient_stay; ?></td>

    <td style="padding: 10px;">
        <?php echo !empty($rows->culture_source_name) ? $rows->culture_source_name : 'NULL'; ?>
    </td>

    <td style="padding: 10px;">
        <?php echo !empty($rows->organism_name) ? $rows->organism_name : 'NULL'; ?>
    </td>

    <td style="padding: 10px;"><?php echo $rows->initial_rx_name; ?></td>
    <td style="padding: 10px;"><?php echo ucfirst($rows->md_patient_status); ?></td>

    <td class="actions" style="padding: 10px; text-align: center; display: flex; justify-content: center; gap: 5px;">
    <!-- Edit Button -->
    <a href="<?php echo base_url() . 'patient/edit?id=' . encoding($rows->patient_id); ?>"
       style="color: #337ab7; border: 1px solid #337ab7; padding: 5px 10px; border-radius: 4px; display: inline-block; text-decoration: none;">
        <i class="fa fa-pencil"></i>
    </a>

    <!-- View Summary Button -->
    <a href="<?php echo base_url() . 'index.php/patient/summary?id=' . encoding($rows->patient_id); ?>"
       style="color: #fff; background-color: #5cb85c; padding: 5px 10px; border-radius: 4px; display: inline-block; text-decoration: none;">
        <i class="fa fa-eye"></i>
    </a>

    <!-- Delete Button -->
    <a href="javascript:void(0)"
       onclick="deletePatient('<?php echo $rows->patient_id; ?>')"
       style="color: #fff; background-color: #d9534f; padding: 5px 10px; border-radius: 4px; display: inline-block; text-decoration: none;">
        <i class="fa fa-trash"></i>
    </a>
</td>

</tr>

                    <?php
                        endforeach;
                    // }
                    ?>

                </tbody>
            </table>
        </div>

            <?php }?>

    </div>
</div>
<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>

<style>

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



    ::-webkit-scrollbar {
    width: 2px !important;
    display:none
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1 !important; 
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888 !important; 
  }
  
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555 !important; 
  }

</style>