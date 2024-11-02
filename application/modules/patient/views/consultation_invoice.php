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
                <h2><a href="javascript:void(0)" onclick="open_model_invoice('<?php echo $model; ?>')" class="btn btn-sm btn-primary"  style="background: #337ab7" id="patient_ids">
                        <i class="gi gi-circle_plus"></i> <?php echo 'add invoice'; ?>
                    </a></h2>
            
        </div>
        <?php } if ($menu_view =='1') {?>
        
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px">Invoice No</th>
                        <th class="text-center" style="font-size:14px">Date</th>
                        <th class="text-center" style="font-size:14px">Total</th>
                        <th class="text-center" style="font-size:14px">Billing to</th>
                        <th class="text-center" style="font-size:14px"><?php echo lang('action'); ?></th>
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

                                <td class="actions">
                                <?php if(empty($rows->Paid)){?>
                            <a href="javascript:void(0)" class="btn btn-primary" onclick="payFnP('<?php echo $model; ?>', 'pay', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');">Pay</a>
                            
                            <?php }else{?>
                                <a href="javascript:void(0)" class="btn btn-success" onclick="pdfInvoiceReceipt('<?php echo $model; ?>', 'pdfInvoiceReceipt','<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');">Receipt</a>
                            <?php }?>

                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'editInvoice', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    
                                    <?php if ($rows->status == 'Paid') { ?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a> -->
                                    <?php } else { ?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a> -->
                                    <?php } ?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="pdfInvoice('<?php echo $model; ?>', 'pdfInvoice','<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-solid fa-download"></i> </a>

                                </td>



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
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <?php //if ($this->ion_auth->is_admin()) { ?>
            <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                <h2><a href="javascript:void(0)" onclick="open_model_invoice('<?php echo $model; ?>')" class="btn btn-sm btn-primary"  style="background: #337ab7" id="patient_ids">
                        <i class="gi gi-circle_plus"></i> <?php echo 'add invoice'; ?>
                    </a></h2>
            <?php //} ?>
        </div>
        <div class="table-responsive">
            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:14px">Invoice No</th>
                        <th class="text-center" style="font-size:14px">Date</th>
                        <th class="text-center" style="font-size:14px">Total</th>
                        <th class="text-center" style="font-size:14px">Billing to</th>
                        <th class="text-center" style="font-size:14px"><?php echo lang('action'); ?></th>
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

                                <td class="actions">
                                <?php if(empty($rows->Paid)){?>
                            <a href="javascript:void(0)" class="btn btn-primary" onclick="payFnP('<?php echo $model; ?>', 'pay', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');">Pay</a>
                            
                            <?php }else{?>
                                <a href="javascript:void(0)" class="btn btn-success" onclick="pdfInvoiceReceipt('<?php echo $model; ?>', 'pdfInvoiceReceipt','<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');">Receipt</a>
                            <?php }?>

                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'editInvoice', '<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                                    
                                    <?php if ($rows->status == 'Paid') { ?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-success" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a> -->
                                    <?php } else { ?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="editStatusFn('<?php echo $tablePrefix; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>','<?php echo $rows->name; ?>')" title="Active Now"><i class="fa fa-times"></i></a> -->
                                    <?php } ?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $model; ?>','','<?php echo $rows->name; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="pdfInvoice('<?php echo $model; ?>', 'pdfInvoice','<?php echo encoding($rows->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-solid fa-download"></i> </a>

                                </td>

                               

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
<div id="form-modal-box-payp"></div>
<div id="form-modal-box-pdf"></div>
<div id="form-modal-box-receipt"></div>

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

<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .patient-info {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .details {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .details span {
            margin-right: 10px;
        }

        .expand-label {
            color: #007B83;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .expand-section {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
        }

        .expand-section svg {
            margin-right: 5px;
        }

        .save-invoice-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .save-button {
            background-color: #00695C;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .total-amount {
            font-weight: bold;
            font-size: 16px;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .form-container .form-section {
            flex: 1;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select, .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            height: 80px;
        }

        .line-items-container {
            margin-top: 30px;
        }

        .line-items-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .line-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .line-item div {
            flex: 1;
        }

        .add-invoice-item {
            background-color: #00695C;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
            }

            .save-invoice-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .save-button {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>

<script>
    // Initialize DataTable with search and pagination
    $(document).ready(function () {
       
        $('#invoiceTable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": false,
            "pageLength": 10,
            "order": [[0, 'desc']]  // Here, 0 represents the first column (index starts from 0)
        });

        // Initialize date range picker

        // $('#dateRange').daterangepicker({
        //     opens: 'left',
        //     startDate: moment().subtract(89, 'days'),
        //     endDate: moment(),
        //     locale: {
        //         format: 'DD-MM-YYYY'
        //     }
        // });

        // $('#dateRange').on('apply.daterangepicker', function (ev, picker) {
        //     console.log("Start Date: " + picker.startDate.format('DD-MM-YYYY'));
        //     console.log("End Date: " + picker.endDate.format('DD-MM-YYYY'));
        // });
    });

    // Placeholder edit function
    function editInvoice() {
        $('#editModal').modal('show');
    }

    // Placeholder delete function
    function deleteInvoice() {
        alert('Delete invoice action triggered.');
    }
</script>
<script>
    var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="products" name="products[]" value="" placeholder="Products name"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="rate" name="rate[]" value="" placeholder="Rate"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity"></div></div><div class="col-sm-3 nopadding"><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="price" name="price[]" value="" placeholder="Price"></div></div><div class="col-sm-4 nopadding"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span> </button></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>
