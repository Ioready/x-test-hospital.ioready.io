<!-- Page content -->
<div id="page-content">
    <div class="block_list full">
    <div class="row text-center">
        
        <div class="col-sm-6 col-lg-2 mb-4">
            <a href="<?php echo base_url()."careUnit/";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 10px; ">
                <div class="widget-extra themed-background-dark"   style="background:#337ab7;">
                    <h4 style="font-size:14px; font-weight:600; color:white;">Department</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4">
            <a href="<?php echo base_url()."letters";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Letters</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
       
        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."invoices";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">invoices</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>


        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."initialDx";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Diagnosis</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."initialRx";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Antibiotic</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>


        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."precautions";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Precautions</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."cultureSource";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Lab</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."organism";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">organism</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
</dib>

        
    </div>
    <!-- END Datatables Header -->

    <!-- Quick Stats -->
    <!-- <div class="block_list full">


    </div> -->
    <!-- END Quick Stats -->
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

                            <!-- <div class="col-lg-3">
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
                                </div> -->
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
                                        <!-- <select class="form-control" name="year" id="year">
                                            <option value="">Select Year</option>
                                            
                                        </select> -->

                                        <select class="form-control" name="year" id="year">
                                            <?php
                                           
                                            $current_year = date("Y");
                                            for ($i = $current_year - 10; $i <= $current_year + 10; $i++) {
                                                $selected = ($i == $current_year) ? 'selected' : '';

                                                echo "<option value='$i' $selected>$i</option>";
                                            }
                                            ?>
                                        </select>



                                    </div>

                                    <!-- <div class="col-lg-2">
                        <input type="submit" name="search" class="save-btn btn btn-primary btn-sm" value="Search" />
                    </div>

                    <form action="<?php echo site_url('patient'); ?>" name="patientFormExport" method="get">
                                <div class="col-sm-12 col-lg-2">
                                    <button type="submit" class="btn btn-primary save-btn btn-sm">
                                        <fa class="fa fa-undo"></fa> Reset
                                    </button>
                                </div>
                            </form> -->

                       

                                    <!-- <div class="col-sm-12 col-lg-12 mt-4" style="margin-left:-20px;margin-right:-12px; ">
                                        <button type="submit" class="btn btn-success  fw-bold btn-sm" value="Export" name="export">
                                            <fa class="fa fa-file-pdf-o"></fa> Download Monthly Surveillance List
                                        </button>
                                    </div> -->
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
    
    <div class="block full">



        <?php if($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()){?>
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;">
                        <i class="gi gi-circle_plus"></i> <?php echo 'New'; ?>
                    </a></h2>

                <?php } ?>

        <?php 
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        ?>

        <div class="table-responsive">
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 10px;">Sr. No</th>
                        <!--                                <th><?php echo "Referral Code"; ?></th>-->
                        <?php if($this->ion_auth->is_admin()){ ?>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;width: 150px;" class="text-center" <?php echo "Facility Manager Name"; ?></th>
                        <?php } ?>

                        <?php if($this->ion_auth->is_subAdmin()){ ?>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;width: 150px;" class="text-center" ><?php echo "Header"; ?></th>
                        <?php } ?>

                        <th style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;" class="text-center" style="width: 200px;"><?php echo "Start date"; ?></th>

                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Practitioner"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Patient"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Billing to"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Note Comment"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Interal Comment"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Total"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Status"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Created Date"; ?></th>

                        
                        <?php if($this->ion_auth->is_facilityManager()){?>
                        <th  class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 60px;">Created Date</th>
                        <?php }else if($this->ion_auth->is_admin()){ ?>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 60px;">Query Date</th>
                        <?php } ?>
                        <?php if($this->ion_auth->is_facilityManager()){?>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 70px;"><?php echo lang('action'); ?></th>
                        <?php } ?>

                        <?php if($this->ion_auth->is_subAdmin()){?>
                        <th  class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 70px;"><?php echo lang('action'); ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($this->ion_auth->is_admin()){
                    if (isset($list) && !empty($list)):
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;
                            ?>
                            <?php if($LoginID == 1){ ?>
                            <tr>
                            
                                <td class="text-center "><strong><?php echo $rowCount; ?></strong></td> 
                                <?php if($this->ion_auth->is_admin()){ ?> 
                                <td class=""><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
                                <?php } ?>
                                <td><?php echo $rows->title ?></td>
                                <td><?php echo $rows->description ?></td>
                                <td class="text-center"><?php echo date('m/d/Y', $rows->create_date); ?></td>
                        
                                <?php if ($this->ion_auth->is_facilityManager()) { ?>
                                <td class="actions text-center" >
                                    <div class="btn-group btn-group-xs">
                                        <a href="<?php echo base_url() . 'invoices/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        
                                            <?php
                                            if ($rows->id != 1) {
                                                if ($rows->is_active == 1) {
                                                    ?>
                                                                                <!--                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="statusFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>-->
                                                <?php } else { ?>
                                                                                <!--                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="statusFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>')" title="Active Now"><i class="fa fa-times"></i></a>-->
                                                    <?php
                                                }
                                                if ($rows->is_active == 1) {
                                                    ?>
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Inactive Now"><i class="fa fa-check"></i> Active</a> -->
                                                <?php } else { ?>
                                                <!--  <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Active Now"><i class="fa fa-times"></i> Inactive</a> -->
                                                <?php } ?>
                                                <a href="javascript:void(0)" style="margin-left: 10px;" data-toggle="tooltip"   onclick="deleteFn('<?php echo contactus; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'invoices', 'invoices/delVendors','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            <?php }
                                            ?>
                        <!-- <a href="<?php echo base_url() . 'vendors/paymentList/' . $rows->id; ?>" class="btn btn-sm btn-primary">Client List</a> -->
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php
                            }endforeach;
                    endif;
                }else{
                    $rowCount = 0;
                    foreach ($list as $rows){
                        $rowCount++;
                        ?>
                        
                        <tr>
                        
                            <td class="text-center "><strong><?php echo $rowCount; ?></strong></td>  

                            <?php if($this->ion_auth->is_admin()){ ?>

                            <td class=""><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>

                            <?php } ?>
                            
                            <?php if($this->ion_auth->is_subAdmin()){ ?>
                            <td class=""><?php echo $rows->header; ?></td>
                            <?php } ?>
                            <td class="text-center"><?php echo $rows->start_date; ?></td>
                            <td><?php echo $rows->practitioner ?></td>
                            <td><?php echo $rows->patient ?></td>
                            <td><?php echo $rows->billing_to ?></td>
                            <td><?php echo $rows->note_comment ?></td>
                            <td><?php echo $rows->interal_comment ?></td>
                            <td><?php echo $rows->total ?></td>
                            
                            <td><?php echo $rows->status ?></td>
    
                            <td class="text-center"><?php echo $rows->created_at; ?></td>
                            <?php if ($this->ion_auth->is_facilityManager() || $this->ion_auth->is_subAdmin()) { ?>

                            <td class="actions text-center" >
                                <div class="btn-group btn-group-xs">
                                    <a href="<?php echo base_url() . 'invoices/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                    
                                        <?php
                                        if ($rows->id != 1) {
                                            if ($rows->is_active == 1) {
                                                ?>
                                                                            <!--                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="statusFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>-->
                                            <?php } else { ?>
                                                                            <!--                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="statusFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>')" title="Active Now"><i class="fa fa-times"></i></a>-->
                                                <?php
                                            }
                                            if ($rows->is_active == 1) {
                                                ?>
                                                <!-- <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Inactive Now"><i class="fa fa-check"></i> Active</a> -->
                                            <?php } else { ?>
                                            <!--  <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Active Now"><i class="fa fa-times"></i> Inactive</a> -->
                                            <?php } ?>
                                            <a href="javascript:void(0)" style="margin-left: 10px;" data-toggle="tooltip"   onclick="deleteFn('<?php echo contactus; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'invoices', 'invoices/delVendors','<?php echo 'this entry' ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        <?php }
                                        ?>
                    <!-- <a href="<?php echo base_url() . 'vendors/paymentList/' . $rows->id; ?>" class="btn btn-sm btn-primary">Client List</a> -->
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php
                        }};
             
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>


<script type="text/javascript">
    $('#date').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        endDate:'today'       
    });
/*    $("#zipcode").select2({
        allowClear: true
    });*/
</script>

<style>
    .btnPrevious,
.btnNext{
	display: inline-block;
	border: 1px solid #444348;
	border-radius: 3px;
	margin: 5px;
	color: #444348;
	font-size: 14px;
	padding: 10px 15px;
	cursor: pointer;
}

.nav-tabss {
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    width: 316px;
    border-radius: inherit;
    font-weight: 900;
}
.nav-tab-appointment{
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    /* width: 553px; */
    padding: 20px;
    border-radius: inherit;
    background-color:white;

}
.nav-tab-appointment.active-link{
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    width: 553px;
    padding: 20px;
    border-radius: inherit;
    background-color:white;

}

.nav-pills-second{
    background-color:white;
}
.nav-pills-second>li {
    float: left;
}
.nav-pills-second.ul li:active .underline {
	transition: none;
	background-color: red;
}

.nav-link>a.active.underline {
	width: 100%;
	background-color: red;
}
.new-contact{
    background-color: darkslategray;
    color: white;
    font-weight: 900;
    width: 88px;
}
a.new-contact:hover{
    /* background-color: #d9416c !important; */
    color: white;
    font-weight: 900;
    width: 88px;
}
</style>

<style>
    /* Custom styles for dropdown */
.select-dropdown {
    position: relative;
}

/* Custom styles for search input */
.input-group-search {
    position: relative;
}

/* Adjust the dropdown and search input width as needed */
.select-dropdown .btn-secondary,
.input-group-search .form-control {
    width: 100%;
}

.save-btn{
    font-weight:700;
    font-size: 1.5rem;
    padding: 0.6rem 2.25rem;
    background:#337ab7;
}
.save-btn:hover{
    /* background-color:#00008B !important; */
    background:#00008B !important;
}


::-webkit-scrollbar {
 display:none;
}

</style>
<script>

$(document).ready(function() {
    // Toggle dropdown on button click
    $('[data-testid="button__dropdown--sort-menu"]').click(function() {
        $(this).toggleClass('active');
        // Toggle dropdown menu visibility
        $(this).next('.ListViewMenu__buttonGroup___MY6Wh').toggle();
    });

    // Handle search button click
    $('.btn-search').click(function() {
        // Get search input value
        var searchTerm = $(this).closest('.input-group').find('.form-control').val();
        // Perform search operation with the searchTerm
        console.log('Search term:', searchTerm);
    });
});

</script>




