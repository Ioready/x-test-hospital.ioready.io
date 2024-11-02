<!-- Page content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>

<?php if ($this->ion_auth->is_superAdmin()) { ?>

        <div id="page-content">
            
            <ul class="breadcrumb breadcrumb-top">
                <li>
                    <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo site_url('setting'); ?>">Setting</a>
                </li>
            </ul>
            
            <div class="block full">
                <div class="block-title">
                    <h2><strong>Site Setting</strong> Panel</h2>
                </div>
                <div class="col-sm-6 col-lg-12 text-white">
                    <div class="panel panel-default">
                        <ul class="nav nav-pills nav-fill nav-tabss" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a href="<?php echo site_url('setting'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "setting" && strtolower($this->router->fetch_method()) == "index") ? "active" : "" ?>">
                                    <span class="sidebar-nav-mini-hide">Basic</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('setting/emailSetting'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "setting" && strtolower($this->router->fetch_method()) == "emailsetting") ? "active" : "" ?>">
                                    <span class="sidebar-nav-mini-hide">Email Setting</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo site_url('setting/paymentSetting'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "setting" && strtolower($this->router->fetch_method()) == "paymentSetting") ? "active" : "" ?>">
                                    <span class="sidebar-nav-mini-hide">Payment setting for stripe</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('setting/bankTransferSetting'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "setting" && strtolower($this->router->fetch_method()) == "paymentSetting") ? "active" : "" ?>">
                                    <span class="sidebar-nav-mini-hide">Bank Transfer</span>
                                </a>
                            </li>
                        
                        </ul>
                    </div>
                </div>

                <div class="wrapper wrapper-content animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row">
                                        
                                        <div class="col-lg-12" style="overflow-x: auto">
                                            <!-- Datatables Content -->
                                            <form role="form" id="addFormAjax" method="post" action="<?php echo base_url('setting/addBankSetting') ?>" enctype="multipart/form-data">

                                            <div class="block full">
                                                <div class="block-title">
                                                    <h2 class="fw-bold"><strong><?php echo $title; ?></strong> Panel</h2>
                                                    <?php if ($this->ion_auth->is_facilityManager()) { ?>
                                                        <h2>
                                                            <a href="javascript:void(0)" onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                                                                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                                                            </a>
                                                        </h2>
                                                    <?php } ?>
                                                    <div>
                                                        <div style="float:right;margin-top:-38px">
                                                            <label>Enable:</label>
                                                            <label class="switch">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round " style="background-color:#6FD943;"></span>
                                                            </label>
                                                            <i class="fa fa-arrow-circle-up text-xl m-2"  style="font-size:20px; " aria-hidden="true"></i>

                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <!-- <div class="alert alert-danger" id="error-box" style="display: none"></div> -->
                                            
                                                <div class="row">
                                                <?php
                                                $message = $this->session->flashdata('success');
                                                if (!empty($message)):
                                                    ?>
                                                    <div class="alert alert-success">
                                                        <?php echo $message; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php
                                                $error = $this->session->flashdata('error');
                                                if (!empty($error)):
                                                    ?>
                                                    <!-- <div class="alert alert-danger">
                                                        <?php echo $error; ?>
                                                    </div> -->
                                                <?php endif; ?>
                                                <div id="message"></div>

                                                    <!-- <div class="col-md-6" style="">
                                                        <div class="form-group">
                                                            <label for="input1">Secret key</label>
                                                            <input type="text" class="form-control" id="secret_key" name="secret_key" value="<?php echo $list->secret_key?>">
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input1">Publishable key</label>
                                                            <input type="text" class="form-control" id="publishable_key" name="publishable_key" value="<?php echo $list->publishable_key?>">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-12">
                                                    <label for="input1">Bank Details</label>
                                                        <div class="form-group">
                                                            
                                                    <textarea name="bank_details" rows="12" cols="120" id="editorss" placeholder="    Bank: Bank of America
    Bank Holder Name: Hospital management
    Account Number: 0123456789
    IFSC Code: ABC123
    Swift Code: 123456"><?php echo $list->bank_details?></textarea>
                                                           
                                                        </div>
                                                    </div>
                                                
                                                
                                                    <!-- Add save and cancel buttons -->
                                                    <div class="col-md-12 text-right">
                                                        <button class="btn btn-danger" type="button">Cancel</button>
                                                        <button class="btn  btn-primary " style="background:#337ab7;" type="submit"> Save </button>
                                                    </div>
                                                
                                                </div>
                                            </div>

                                            </form>
                                        
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

<?php } else if ($this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
       
    <div id="page-content">
            
            <ul class="breadcrumb breadcrumb-top">
                <li>
                    <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo site_url('setting'); ?>">Setting</a>
                </li>
            </ul>
            
            <div class="block full">
                <div class="block-title">
                    <h2><strong>Site Setting</strong> Panel</h2>
                </div>
                <div class="col-sm-6 col-lg-12 text-white">
                    <div class="panel panel-default">
                        <ul class="nav nav-pills nav-fill nav-tabss" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a href="<?php echo site_url('setting'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "setting" && strtolower($this->router->fetch_method()) == "index") ? "active" : "" ?>">
                                    <span class="sidebar-nav-mini-hide">Basic</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('setting/emailSetting'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "setting" && strtolower($this->router->fetch_method()) == "emailsetting") ? "active" : "" ?>">
                                    <span class="sidebar-nav-mini-hide">Email Setting</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo site_url('setting/paymentSetting'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "setting" && strtolower($this->router->fetch_method()) == "paymentSetting") ? "active" : "" ?>">
                                    <span class="sidebar-nav-mini-hide">Payment setting for stripe</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo site_url('setting/bankTransferSetting'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "setting" && strtolower($this->router->fetch_method()) == "paymentSetting") ? "active" : "" ?>">
                                    <span class="sidebar-nav-mini-hide">Bank Transfer</span>
                                </a>
                            </li>
                        
                        </ul>
                    </div>
                </div>

                <div class="wrapper wrapper-content animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row">
                                        
                                        <div class="col-lg-12" style="overflow-x: auto">
                                            <!-- Datatables Content -->
                                            <form role="form" id="addFormAjax" method="post" action="<?php echo base_url('setting/addBankSetting') ?>" enctype="multipart/form-data">

                                            <div class="block full">
                                                <div class="block-title">
                                                    <h2 class="fw-bold"><strong><?php echo $title; ?></strong> Panel</h2>
                                                    <?php if ($this->ion_auth->is_facilityManager()) { ?>
                                                        <h2>
                                                            <a href="javascript:void(0)" onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                                                                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                                                            </a>
                                                        </h2>
                                                    <?php } ?>
                                                    <div>
                                                        <div style="float:right;margin-top:-38px">
                                                            <label>Enable:</label>
                                                            <label class="switch">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round " style="background-color:#6FD943;"></span>
                                                            </label>
                                                            <i class="fa fa-arrow-circle-up text-xl m-2"  style="font-size:20px; " aria-hidden="true"></i>

                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <!-- <div class="alert alert-danger" id="error-box" style="display: none"></div> -->
                                            
                                                <div class="row">
                                                <?php
                                                $message = $this->session->flashdata('success');
                                                if (!empty($message)):
                                                    ?>
                                                    <div class="alert alert-success">
                                                        <?php echo $message; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php
                                                $error = $this->session->flashdata('error');
                                                if (!empty($error)):
                                                    ?>
                                                    <!-- <div class="alert alert-danger">
                                                        <?php echo $error; ?>
                                                    </div> -->
                                                <?php endif; ?>
                                                <div id="message"></div>

                                                    <!-- <div class="col-md-6" style="">
                                                        <div class="form-group">
                                                            <label for="input1">Secret key</label>
                                                            <input type="text" class="form-control" id="secret_key" name="secret_key" value="<?php echo $list->secret_key?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input1">Publishable key</label>
                                                            <input type="text" class="form-control" id="publishable_key" name="publishable_key" value="<?php echo $list->publishable_key?>">
                                                        </div>
                                                    </div>
                                                 -->

                                                 <div class="col-md-12">
                                                    <label for="input1">Bank Details</label>
                                                        <div class="form-group">
                                                            
                                                    <textarea name="bank_details" rows="12" cols="120" id="editorss" placeholder="    Bank: Bank of America
    Bank Holder Name: Hospital management
    Account Number: 0123456789
    IFSC Code: ABC123
    Swift Code: 123456"><?php echo $list->bank_details?></textarea>
                                                           
                                                        </div>
                                                    </div>
                                                
                                                    <!-- Add save and cancel buttons -->
                                                    <div class="col-md-12 text-right">
                                                        <button class="btn btn-danger" type="button">Cancel</button>
                                                        <button class="btn  btn-primary " style="background:#337ab7;" type="submit"> Save </button>
                                                    </div>
                                                
                                                </div>
                                            </div>

                                            </form>
                                        
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    <?php }?>



<style>
    .save-btn.active {
        background: #00008B !important;
    }

    .save-btn {
        font-weight: 700;
        font-size: 1.5rem;
        padding: 0.6rem 2.25rem;
        background: #337ab7;
    }

    .save-btn:hover {
        background: #00008B !important;
    }

    .cancel-btn:hover {
        background-color: #e9967a !important;
    }
</style>
<script src="<?php echo base_url() . 'backend_asset/admin/js/' ?>helpers/ckeditor/ckeditor.js"></script>

<script>
  // Initialize CKEditor
  CKEDITOR.replace('editor1');
</script>
