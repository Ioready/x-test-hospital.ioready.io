<!-- Page content -->

<style>
        /* Custom Styles for Enhanced UI */
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            
            max-width: 1100px;
        }

        .table-responsive {
            margin-bottom: 20px;
        }

        /* Table with full border */
        table.dataTable.table {
            background-color:white;
            border: 1px solid #dee2e6 !important;
            border-collapse: collapse !important;
        }

        /* Table cell border */
        .table td, .table th {
            border: 1px solid #dee2e6;
        }

        /* Center header text */
        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #495057;
            text-align: center !important;
        }

        .table tbody tr {
            background-color: #fff;
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
        }

        /* Action Buttons */
        .table-action {
            cursor: pointer;
            color: #0d6efd;
        }

        .table-action:hover {
            color: #0b5ed7;
        }

        /* Badges */
        .badge-outstanding {
            background-color: #ffc107;
            font-size: 12px;
            color: white;
            padding: 5px 8px;
            border-radius: 10px;
        }

        /* Custom total, paid, outstanding layout */
        .invoice-status {
            line-height: 1.3;
            text-align: center;
        }

        .invoice-status .total {
            font-weight: bold;
        }

        .invoice-status .paid {
            color: green;
        }

        .invoice-status .outstanding {
            color: red;
        }

        /* Mobile Specific Styles */
        @media (max-width: 767px) {
            .table-responsive {
                overflow-x: auto;
            }

            .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            table.dataTable.table {
                width: 100%;
                font-size: 14px;
            }

            .pagination {
                justify-content: center;
            }
        }
        .btn-primary {
            background:#0d6efd!important;
            color:#fff;
        }
    </style>

<div id="page-content">
    <div class="block_list full">
      
    </div>
  
    <?php if ($this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
       

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
        <!-- <div class="row text-center"> -->

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
                    if ($menu_name == 'Invoices Management') { 
                     ?>
                    

            <div class="mt-5">
                <h2 class="mb-4">Invoice Management</h2>

                <div class="d-flex justify-content-between mb-3 align-items-center flex-wrap">
                    <!-- <button class="btn btn-primary">New Invoice +</button> -->
                   <?php if($menu_create =='1'){ ?>
                    <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary save-btn" id="patient_ids">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?> 
                    </a></h2>
                    <?php }?>
                    
                    <div class="mt-2">
                        <label for="dateRange" class="me-2">Duration:</label>
                        <input type="text" id="dateRange" class="form-control d-inline-block" style="width: 250px;" readonly>
                    </div>
                </div>
                <?php if($menu_view =='1'){ ?>
                <div class="table-responsive">
                    <table id="invoiceTable" class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light text-center ">
                        <tr>
                            <th>Invoice</th>
                            <th>Patient</th>
                            <th>Total</th>
                            <th>Invoice Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($invoice_list as $row){ ?>
                        <tr>
                            <td><?php echo $row->invoice_number;?></td>
                            <td><?php echo $row->patient_name;?></td>
                            <td>
                                <div class="invoice-status">
                                    <span class="total">Total: <?php echo $row->total_amount;?></span><br>
                                    <span class="paid">Paid: £<?php echo $row->Paid;?></span><br>
                                    <span class="outstanding">Outstanding: <?php echo $row->Outstanding;?></span>
                                </div>
                            </td>
                            <td><?php echo date("d/m/Y", strtotime($row->invoice_date)); ?></td>

                            <td>
                           
                            <?php if(empty($row->Paid)){?>
                            <a href="javascript:void(0)" class="btn btn-primary" onclick="payFn('<?php echo $model; ?>', 'pay', '<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');">Pay</a>
                            <?php }else{?>

                               <a href="javascript:void(0)" class="btn btn-success" onclick="pdfInvoiceReceipt('<?php echo $model; ?>', 'pdfInvoiceReceipt','<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');">Receipt</a>
                            <?php }?>
                            <?php if($menu_update =='1'){ ?>
                            <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                            <?php } if($menu_delete =='1'){ ?>
                            <a href="javascript:void(0)" onclick="deleteFnInvoice('<?php echo GROUPS;?>','id','<?php echo encoding($row->id); ?>','invoices/managements')" class="on-default edit-row text-danger"><img width="20" src="<?php echo base_url().DELETE_ICON;?>" /></a>
                            <?php }?>
                            <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="pdfInvoice('<?php echo $model; ?>', 'pdfInvoice','<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-solid fa-download"></i> </a>

                            </td>
                        </tr>
                        <?php }?>
                        
                        </tbody>
                    </table>
                </div>
                <?php } ?>
                <div class="black-screen" id="blackScreen"></div>

                <!-- Edit Modal -->
                <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Invoice</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                    
                                <div class="alert alert-danger" id="error-box" style="display: none"></div>
                                    <div class="form-body">
                                        <div class="row">
                                    <!-- Invoice Form Section -->
                                        <div class="form-container">
                                            <!-- Invoice Form -->
                                            <div class="form-section">
                                                <h2>Create new Invoice</h2>
                                                <div class="form-group">
                                                    <label for="header">Header <span class="required" style="color:red;">*</span></label>
                                                    <select name="header" id="header" required>
                                                        <option value="Droitwich Knee Clinic & Bromsgrove P...">Droitwich Knee Clinic & Bromsgrove P...</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="select-date">Select Date <span class="required" style="color:red;">*</span></label>
                                                    <input type="date" name="invoice_date" id="invoice_date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="practitioner">Practitioner</label>
                                                    
                                                    <select name="practitioner" id="practitioner">
                                                    <?php  foreach($practitioner as $row){ ?>
                                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <!-- <input type="text" name="practitioner" id="practitioner" placeholder="Select Practitioner"> -->
                                                </div>
                                            </div>

                                            <!-- Billing and Comments -->
                                            <div class="form-section">
                                                <h2>Billing</h2>
                                                <div class="form-group">
                                                    <label for="patient">Patient <span style="color:red;">*</span></label>
                                                    
                                                    <select name="patient" id="patient">
                                                    <?php  foreach($patient as $row){ ?>
                                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                                        <?php } ?>
                                                    </select>

                                                    <!-- <input type="hidden" name="patient" id="patient" value="<?php echo $patient->id;?>"><h3><span><?php echo $patient->name;?></span></h3> -->
                                                </div>

                                                <div class="form-group">
                                                    <label for="billing">Billing to <span style="color:red;">*</span></label>
                                                    <select name="billing_to" id="billing_to">
                                                        <option value="Self Pay">Self Pay</option>
                                                    </select>
                                                </div>

                                                <h2>Comments</h2>
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea name="notes" id="notes" placeholder="Enter notes"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="internal-notes">Internal notes</label>
                                                    <textarea name="internal_notes" id="internal_notes" placeholder="Enter internal notes"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    <!-- Line Items Section -->

                                        <div class="panel panel-default">
                                            <!-- <div class="panel-heading">Dynamic Form Fields - Add & Remove Multiple fields</div> -->
                                            <div class="panel-heading">Item Description</div>
                                            <div class="panel-body">
                                            
                                            <div id="education_fields">
                                                    
                                                    </div>
                                                <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="products" name="products[]" value="" placeholder="Products">
                                            </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="rate" name="rate[]" value="" placeholder="Rate" oninput="calculatePrice(this)">
                                            </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity" oninput="calculatePrice(this)">
                                            </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="price" name="price[]" value="" placeholder="Price">
                                            </div>
                                            </div>

                                            <div class="clear"></div>
                                            
                                            </div>
                    
                                                </div>
                                                <!-- Total Amount at the bottom -->
                                                <div class="save-invoice-section">
                                                    <div class="total-amount">
                                                        Total amount: £345.00
                                                    </div>
                                                    <button class="add-invoice-item" type="button"  onclick="education_fields();"> <span class="add-invoice-item" aria-hidden="true">+ Add invoice item</span> </button>

                                                    <!-- <button type="button" id="submit" class="add-invoice-item">+ Add invoice item</button> -->

                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $results->id; ?>" />

                                                <div class="space-22"></div>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


<?php }}} if($this->ion_auth->is_facilityManager()){?>

    <div class="mt-5">
                <h2 class="mb-4">Invoice Management</h2>

                <div class="d-flex justify-content-between mb-3 align-items-center flex-wrap">
                    <!-- <button class="btn btn-primary">New Invoice +</button> -->
                  
                    <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary save-btn" id="patient_ids">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?> 
                    </a></h2>
                   
                    
                    <div class="mt-2">
                        <label for="dateRange" class="me-2">Duration:</label>
                        <input type="text" id="dateRange" class="form-control d-inline-block" style="width: 250px;" readonly>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table id="invoiceTable" class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light text-center ">
                        <tr>
                            <th>Invoice</th>
                            <th>Patient</th>
                            <th>Total</th>
                            <th>Invoice Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($invoice_list as $row){ ?>
                        <tr>
                            <td><?php echo $row->invoice_number;?></td>
                            <td><?php echo $row->patient_name;?></td>
                            <td>
                                <div class="invoice-status">
                                    <span class="total">Total: £ <?php echo $row->total_amount;?></span><br>
                                    <span class="paid">Paid: £<?php echo $row->Paid;?></span><br>
                                    <span class="outstanding">Outstanding: £ <?php echo $row->Outstanding;?></span>
                                </div>
                            </td>
                            <td><?php echo date("d/m/Y", strtotime($row->invoice_date)); ?></td>

                            <td>
                            
                            <?php if(empty($row->Paid)){?>
                                
                            <a href="javascript:void(0)" class="btn btn-primary" onclick="payFn('<?php echo $model; ?>', 'pay', '<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');">Pay</a>
                            <!-- <a href="javascript:void(0)" class="btn btn-primary" onclick="payFn('<?php echo $model; ?>', 'pay', '<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');">Pay</a> -->
                            
                            <?php }else{?>
                                <a href="javascript:void(0)" class="btn btn-success" onclick="pdfInvoiceReceipt('<?php echo $model; ?>', 'pdfInvoiceReceipt','<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');">Receipt</a>
                            <?php }?>
                           
                            <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-pencil"></i></a>
                            
                            <a href="javascript:void(0)" onclick="deleteFnInvoice('<?php echo GROUPS;?>','id','<?php echo encoding($row->id); ?>','invoices/managements')" class="on-default edit-row text-danger"><img width="20" src="<?php echo base_url().DELETE_ICON;?>" /></a>
                            
                            <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="pdfInvoice('<?php echo $model; ?>', 'pdfInvoice','<?php echo encoding($row->id) ?>', '<?php echo $model; ?>');"><i class="fa fa-solid fa-download"></i> </a>

                            </td>
                        </tr>
                        <?php }?>
                        
                        </tbody>
                    </table>
                </div>
            
                <div class="black-screen" id="blackScreen"></div>

                <!-- Edit Modal -->
                <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Invoice</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                    
                                <div class="alert alert-danger" id="error-box" style="display: none"></div>
                                    <div class="form-body">
                                        <div class="row">
                                    <!-- Invoice Form Section -->
                                        <div class="form-container">
                                            <!-- Invoice Form -->
                                            <div class="form-section">
                                                <h2>Create new Invoice</h2>
                                                <div class="form-group">
                                                    <label for="header">Header <span class="required" style="color:red;">*</span></label>
                                                    <select name="header" id="header" required>
                                                        <option value="Droitwich Knee Clinic & Bromsgrove P...">Droitwich Knee Clinic & Bromsgrove P...</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="select-date">Select Date <span class="required" style="color:red;">*</span></label>
                                                    <input type="date" name="invoice_date" id="invoice_date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="practitioner">Practitioner</label>
                                                    
                                                    <select name="practitioner" id="practitioner">
                                                    <?php  foreach($practitioner as $row){ ?>
                                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <!-- <input type="text" name="practitioner" id="practitioner" placeholder="Select Practitioner"> -->
                                                </div>
                                            </div>

                                            <!-- Billing and Comments -->
                                            <div class="form-section">
                                                <h2>Billing</h2>
                                                <div class="form-group">
                                                    <label for="patient">Patient <span style="color:red;">*</span></label>
                                                    
                                                    <select name="patient" id="patient">
                                                    <?php  foreach($patient as $row){ ?>
                                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                                        <?php } ?>
                                                    </select>

                                                    <!-- <input type="hidden" name="patient" id="patient" value="<?php echo $patient->id;?>"><h3><span><?php echo $patient->name;?></span></h3> -->
                                                </div>

                                                <div class="form-group">
                                                    <label for="billing">Billing to <span style="color:red;">*</span></label>
                                                    <select name="billing_to" id="billing_to">
                                                        <option value="Self Pay">Self Pay</option>
                                                    </select>
                                                </div>

                                                <h2>Comments</h2>
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea name="notes" id="notes" placeholder="Enter notes"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="internal-notes">Internal notes</label>
                                                    <textarea name="internal_notes" id="internal_notes" placeholder="Enter internal notes"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    <!-- Line Items Section -->

                                        <div class="panel panel-default">
                                            <!-- <div class="panel-heading">Dynamic Form Fields - Add & Remove Multiple fields</div> -->
                                            <div class="panel-heading">Item Description</div>
                                            <div class="panel-body">
                                            
                                            <div id="education_fields">
                                                    
                                                    </div>
                                                <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control" id="products" name="products[]" value="" placeholder="Products"> -->
                                            </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="rate" name="rate[]" value="" placeholder="Rate" oninput="calculatePrice(this)">
                                            </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity" oninput="calculatePrice(this)">
                                            </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="price" name="price[]" value="" placeholder="Price">
                                            </div>
                                            </div>

                                            <div class="clear"></div>
                                            
                                            </div>
                    
                                                </div>
                                                <!-- Total Amount at the bottom -->
                                                <div class="save-invoice-section">
                                                    <div class="total-amount">
                                                        Total amount: £345.00
                                                    </div>
                                                    <button class="add-invoice-item" type="button"  onclick="education_fields();"> <span class="add-invoice-item" aria-hidden="true">+ Add invoice item</span> </button>

                                                    <!-- <button type="button" id="submit" class="add-invoice-item">+ Add invoice item</button> -->

                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $results->id; ?>" />

                                                <div class="space-22"></div>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
    <?php }?>
        <!-- </div> -->
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
<div id="form-modal-box-pay"></div>
<div id="form-modal-box-pdf"></div>
<div id="form-modal-box-receipt"></div>

<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            /* padding: 20px; */
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