<!-- Page content -->

<?php if ($this->ion_auth->is_superAdmin()) { ?>
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('setting'); ?>">Setting</a>
        </li>
    </ul>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- END Datatables Header -->
    <!-- Datatables Content -->
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
                        <?php
                        $message = $this->session->flashdata('success');
                        if (!empty($message)):
                            ?><div class="alert alert-success">
                                <?php echo $message; ?></div><?php endif; ?>
                        <?php
                        $error = $this->session->flashdata('error');
                        if (!empty($error)):
                            ?><div class="alert alert-danger">
                                <?php echo $error; ?></div><?php endif; ?>
                        <div id="message"></div>
                        <div class="col-lg-12" style="overflow-x: auto">
                            <!-- Datatables Content -->
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
                                </div>

                               <?php $query = $this->db->order_by('created_on', 'desc')->limit(1)->get('vendor_sale_email_host');
                                     $result = $query->row(); ?>
                                <div class="row">
                                    <div class="col-md-4">
                                    <form class="form-horizontal" role="form" id="" method="post" action="<?php echo base_url('index.php/setting/setting_email_add') ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="input1">Mail Driver</label>
                                            <input type="text" class="form-control" id="mail_driver" name="mail_driver" value="<?php echo $result->mail_driver;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail Host</label>
                                            <input type="text" class="form-control" id="Mail_Host" name="Mail_Host" value="<?php echo $result->Mail_Host;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail port</label>
                                            <input type="text" class="form-control" id="mail_port" name="mail_port" value="<?php echo $result->mail_port;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail Username</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $result->email;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Mail Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $result->password;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail Encryption</label>
                                            <input type="text" class="form-control" id="encryption" name="encryption" value="<?php echo $result->encryption;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail From Address</label>
                                            <input type="email" class="form-control" id="from_address" name="from_address" value="<?php echo $result->from_address;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail From Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $result->name;?>">
                                        </div>
                                    </div>
                                    <!-- Add 7 more input fields similar to the above -->

                                    <!-- Add save and cancel buttons -->
                                    <div class="col-md-12 text-right">
                                    <button class="btn btn-danger" type="button" id="sendemail">Send test mail</button>
                                        
                                        <button class="btn  btn-primary " style="background:#337ab7;" type="submit"> Save changes</button>
                                        </form>
                                        
                                        
                                    
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <!-- END Datatables Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



        <!-- END Datatables Content -->
    </div>
    <!-- END Page Content -->
</div>


    <?php } else if ($this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
       
        <div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('setting'); ?>">Setting</a>
        </li>
    </ul>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- END Datatables Header -->
    <!-- Datatables Content -->
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
                
                <li class="nav-item">
                    <a href="<?php echo site_url('setting/consultationTemplates'); ?>" class="save-btn text-white <?php echo (strtolower($this->router->fetch_class()) == "consultationTemplates") ? "active" : "" ?>">
                        <span class="sidebar-nav-mini-hide">Consultation Templates</span>
                    </a>
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab"></a>
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
                        <?php
                        $message = $this->session->flashdata('success');
                        if (!empty($message)):
                            ?><div class="alert alert-success">
                                <?php echo $message; ?></div><?php endif; ?>
                        <?php
                        $error = $this->session->flashdata('error');
                        if (!empty($error)):
                            ?><div class="alert alert-danger">
                                <?php echo $error; ?></div><?php endif; ?>
                        <div id="message"></div>
                        <div class="col-lg-12" style="overflow-x: auto">
                            <!-- Datatables Content -->
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
                                </div>

                               <?php $query = $this->db->order_by('created_on', 'desc')->limit(1)->get('vendor_sale_email_host');
                                     $result = $query->row(); ?>
                                <div class="row">
                                    <div class="col-md-4">
                                    <form class="form-horizontal" role="form" id="" method="post" action="<?php echo base_url('index.php/setting/setting_email_add') ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="input1">Mail Driver</label>
                                            <input type="text" class="form-control" id="mail_driver" name="mail_driver" value="<?php echo $result->mail_driver;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail Host</label>
                                            <input type="text" class="form-control" id="Mail_Host" name="Mail_Host" value="<?php echo $result->Mail_Host;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail port</label>
                                            <input type="text" class="form-control" id="mail_port" name="mail_port" value="<?php echo $result->mail_port;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail Username</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $result->email;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Mail Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $result->password;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail Encryption</label>
                                            <input type="text" class="form-control" id="encryption" name="encryption" value="<?php echo $result->encryption;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail From Address</label>
                                            <input type="email" class="form-control" id="from_address" name="from_address" value="<?php echo $result->from_address;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="input1">Mail From Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $result->name;?>">
                                        </div>
                                    </div>
                                    <!-- Add 7 more input fields similar to the above -->

                                    <!-- Add save and cancel buttons -->
                                    <div class="col-md-12 text-right">
                                    <button class="btn btn-danger" type="button" id="sendemail">Send test mail</button>
                                        
                                        <button class="btn  btn-primary " style="background:#337ab7;" type="submit"> Save changes</button>
                                        </form>
                                        
                                        
                                    
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <!-- END Datatables Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



        <!-- END Datatables Content -->
    </div>
    <!-- END Page Content -->
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

<script>
    $(document).ready(function() {
        $('#sendemail').click(function() {
       
            $.ajax({
                url: "<?php echo base_url('index.php/setting/sending_mail_test'); ?>",
                type: 'POST',
                success: function(response) {
                     // Alert success or error message
                },
                error: function(xhr, status, error) {
                    alert('Error sending email: ' + error);
                }
            });
        });
    });
    </script>