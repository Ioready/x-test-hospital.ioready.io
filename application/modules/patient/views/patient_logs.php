<!-- Page content -->
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($parent); ?>"><?php echo $title; ?></a>
        </li>
    </ul>


<div class="block_list full">
<div class="row text-center">
                
                <div class="col-sm-6 col-md-2 mb-4">
                    <a href="<?php echo base_url() . 'index.php/patient/summary?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 10px; ">
                        <div class="widget-extra themed-background-dark"   style="background:#337ab7;">
                            <h4 style="font-size:14px; font-weight:600; color:white;">Summery</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                    <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Consultation</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/Medications?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Medications</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>

                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Letters and forms</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patientPrescription?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Prescriptions</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/labs?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Labs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patient/consultationInvoice?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Invoices</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/accountStatement?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Account statements</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patient/communication?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Communication</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patientDocuments?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Documents</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patient/patientLogs?id=' . encoding($results->id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Logs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
            </div>
        
<!-- </div> -->
        
    </div>
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
                    if ($menu_name == 'Patient Invoice') { 
                       if ($menu_create =='1') {
            ?>
        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <?php //if ($this->ion_auth->is_admin()) { ?>
            <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                <!-- <h2><a href="javascript:void(0)" onclick="open_model_invoice('<?php echo $model; ?>')" class="btn btn-sm btn-primary"  style="background: #337ab7" id="patient_ids">
                        <i class="gi gi-circle_plus"></i> <?php echo 'add invoice'; ?>
                    </a></h2> -->
            
        </div>
        <?php } if ($menu_view =='1') {?>
        
            <div class="table-responsive">
        

        <h3><strong> Invoice </strong></h3>
        <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center" style="font-size:14px">Invoice No</th>
                    <th class="text-center" style="font-size:14px">Date</th>
                    <th class="text-center" style="font-size:14px">Total</th>
                    <th class="text-center" style="font-size:14px">Billing to</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($list) && !empty($list)):
                    $rowCount = 0;
                    foreach ($list as $rows):
                        $rowCount++;
                        // print_r($rows);die;
                        ?>
                        <tr>
                            <td><?php echo $rows->invoice_number; ?></td>            
                            <td><?php echo $rows->invoice_date; ?></td>
                            <td><?php echo $rows->total_amount; ?></td>
                            <td><?php echo $rows->billing_to; ?></td>

                            
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>

        <h3><strong>Appointment </strong></h3>
        <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center" style="font-size:14px">Appointment No</th>
                    <th class="text-center" style="font-size:14px">Start Date</th>
                    <th class="text-center" style="font-size:14px">End Date</th>
                    <th class="text-center" style="font-size:14px">Doctor Name</th>
                    <!-- <th class="text-center" style="font-size:14px">Billing to</th> -->
                   
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($results_rowAppointment) && !empty($results_rowAppointment)):
                    $rowCount = 0;
                    foreach ($results_rowAppointment as $rows):
                        $rowCount++;
                        // print_r($rows);die;
                        ?>
                        <tr>
                            <td><?php echo $rows->type_id; ?></td>            
                            <td><?php echo $rows->start_date_appointment; ?></td>
                            <td><?php echo $rows->end_date_appointment; ?></td>
                            <td><?php echo $rows->practiner_name; ?></td>
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>


        <h3><strong>Medication</strong> </h3>
        <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center" style="font-size:14px">Medication Name</th>
                    <th class="text-center" style="font-size:14px">Since</th>
                    <th class="text-center" style="font-size:14px">Condition Type</th>
                    <th class="text-center" style="font-size:14px">Condition Significance</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($results_medication) && !empty($results_medication)):
                    $rowCount = 0;
                    foreach ($results_medication as $rows):
                        $rowCount++;
                        // print_r($rows);
                        ?>
                        <tr>
                            <td><?php echo $rows->search; ?></td>            
                            <td><?php echo $rows->since; ?></td>
                            <td><?php echo $rows->condition_type; ?></td>
                            <td><?php echo $rows->condition_significance; ?></td>
                        </tr>
                        <?php
                    endforeach;
                    // die;
                endif;
                ?>
            </tbody>
        </table>

        <h3><strong>Labs </strong></h3>
        <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center" style="font-size:14px">Name</th>
                    <th class="text-center" style="font-size:14px">Doctor Name</th>
                    <th class="text-center" style="font-size:14px">Date</th>
                    <!-- <th class="text-center" style="font-size:14px">Billing to</th> -->
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($patient_labs) && !empty($patient_labs)):
                    $rowCount = 0;
                    foreach ($patient_labs as $rows):
                        $rowCount++;
                        // print_r($rows);die;
                        ?>
                        <tr>
                            <td><?php echo $rows->details; ?></td>            
                            <td><?php echo $rows->doctor_fname. ' '.$rows->doctor_lname; ?></td>
                            <td><?php echo $rows->create_date; ?></td>
                            <!-- <td><?php //echo $rows->billing_to; ?></td> -->

                            
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>

        <h3><strong>Communication</strong>  </h3>
        <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center" style="font-size:14px">Phone No</th>
                    <th class="text-center" style="font-size:14px">Messages</th>
                    <th class="text-center" style="font-size:14px">Date</th>
                    <!-- <th class="text-center" style="font-size:14px">Billing to</th> -->
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($patient_communication) && !empty($patient_communication)):
                    $rowCount = 0;
                    foreach ($patient_communication as $rows):
                        $rowCount++;
                        // print_r($rows);die;
                        ?>
                        <tr>
                            <td><?php echo $rows->phone; ?></td>            
                            <td><?php echo $rows->patient_sms_comment; ?></td>
                            <td><?php echo $rows->created_at; ?></td>
                            <!-- <td><?php echo $rows->billing_to; ?></td> -->

                            
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>

       
    </div>
        <?php }}} } if($this->ion_auth->is_facilityManager()){ ?>
            <div class="block-title">
            <h2><strong><?php echo 'Patient Logs'; ?></strong> Panel</h2>
            <?php //if ($this->ion_auth->is_admin()) { ?>
            <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                <!-- <h2><a href="javascript:void(0)" onclick="open_model_invoice('<?php echo $model; ?>')" class="btn btn-sm btn-primary"  style="background: #337ab7" id="patient_ids">
                        <i class="gi gi-circle_plus"></i> <?php echo 'add invoice'; ?>
                    </a></h2> -->
            <?php //} ?>
        </div>
        <div class="table-responsive">
        

            <h3><strong> Invoice </strong></h3>
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px">Invoice No</th>
                        <th class="text-center" style="font-size:14px">Date</th>
                        <th class="text-center" style="font-size:14px">Total</th>
                        <th class="text-center" style="font-size:14px">Billing to</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($list) && !empty($list)):
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;
                            // print_r($rows);die;
                            ?>
                            <tr>
                                <td><?php echo $rows->invoice_number; ?></td>            
                                <td><?php echo $rows->invoice_date; ?></td>
                                <td><?php echo $rows->total_amount; ?></td>
                                <td><?php echo $rows->billing_to; ?></td>

                                
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>

            <h3><strong>Appointment </strong></h3>
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px">Appointment No</th>
                        <th class="text-center" style="font-size:14px">Start Date</th>
                        <th class="text-center" style="font-size:14px">End Date</th>
                        <th class="text-center" style="font-size:14px">Doctor Name</th>
                        <!-- <th class="text-center" style="font-size:14px">Billing to</th> -->
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($results_rowAppointment) && !empty($results_rowAppointment)):
                        $rowCount = 0;
                        foreach ($results_rowAppointment as $rows):
                            $rowCount++;
                            // print_r($rows);die;
                            ?>
                            <tr>
                                <td><?php echo $rows->type_id; ?></td>            
                                <td><?php echo $rows->start_date_appointment; ?></td>
                                <td><?php echo $rows->end_date_appointment; ?></td>
                                <td><?php echo $rows->practiner_name; ?></td>
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>


            <h3><strong>Medication</strong> </h3>
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px">Medication Name</th>
                        <th class="text-center" style="font-size:14px">Since</th>
                        <th class="text-center" style="font-size:14px">Condition Type</th>
                        <th class="text-center" style="font-size:14px">Condition Significance</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($results_medication) && !empty($results_medication)):
                        $rowCount = 0;
                        foreach ($results_medication as $rows):
                            $rowCount++;
                            // print_r($rows);
                            ?>
                            <tr>
                                <td><?php echo $rows->search; ?></td>            
                                <td><?php echo $rows->since; ?></td>
                                <td><?php echo $rows->condition_type; ?></td>
                                <td><?php echo $rows->condition_significance; ?></td>
                            </tr>
                            <?php
                        endforeach;
                        // die;
                    endif;
                    ?>
                </tbody>
            </table>

            <h3><strong>Labs </strong></h3>
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px">Name</th>
                        <th class="text-center" style="font-size:14px">Doctor Name</th>
                        <th class="text-center" style="font-size:14px">Date</th>
                        <!-- <th class="text-center" style="font-size:14px">Billing to</th> -->
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($patient_labs) && !empty($patient_labs)):
                        $rowCount = 0;
                        foreach ($patient_labs as $rows):
                            $rowCount++;
                            // print_r($rows);die;
                            ?>
                            <tr>
                                <td><?php echo $rows->details; ?></td>            
                                <td><?php echo $rows->doctor_fname. ' '.$rows->doctor_lname; ?></td>
                                <td><?php echo $rows->create_date; ?></td>
                                <!-- <td><?php //echo $rows->billing_to; ?></td> -->

                                
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>

            <h3><strong>Communication</strong>  </h3>
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px">Phone No</th>
                        <th class="text-center" style="font-size:14px">Messages</th>
                        <th class="text-center" style="font-size:14px">Date</th>
                        <!-- <th class="text-center" style="font-size:14px">Billing to</th> -->
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($patient_communication) && !empty($patient_communication)):
                        $rowCount = 0;
                        foreach ($patient_communication as $rows):
                            $rowCount++;
                            // print_r($rows);die;
                            ?>
                            <tr>
                                <td><?php echo $rows->phone; ?></td>            
                                <td><?php echo $rows->patient_sms_comment; ?></td>
                                <td><?php echo $rows->created_at; ?></td>
                                <!-- <td><?php echo $rows->billing_to; ?></td> -->

                                
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>

           
        </div>
        <?php } ?>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>

<script>
    $(document).ready(function() {
  $('#patient_ids').click(function() {
   var patientsdata = $('#patient_id').val();
//   alert(patientsdata);
  $('#patient_id_data').val(patientsdata);

  });
});
</script>
