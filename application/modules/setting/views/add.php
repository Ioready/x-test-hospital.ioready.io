<!-- Page content -->
<?php if ($this->ion_auth->is_superAdmin()) { ?>
<div id="page-content"  style="background-color: whitesmoke;">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('setting'); ?>">Setting</a>
        </li>
    </ul>
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
                                    ?>
                                    <div class="alert alert-success">
                                        <?php echo $message; ?>
                                    </div>
                                <?php endif; ?>
                                <?php
                                $error = $this->session->flashdata('error');
                                if (!empty($error)):
                                    ?>
                                    <div class="alert alert-danger">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>
                                <div id="message"></div>
                                <div class="col-lg-12" style="overflow-x: auto">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ibox float-e-margins">
                                                <div class="ibox-content">
                                                    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/setting/setting_add') ?>" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label fw-bold"><?php echo lang('admin_email'); ?></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="admin_email" id="admin_email" class="form-control" placeholder="email@example.com" value="<?php echo getConfig('admin_email'); ?>">
                                                                <span class="help-block m-b-none"> Required Email id of sender, through which mail is sent.</span>
                                                            </div>
                                                        </div>
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label fw-bold"><?php echo lang('site_name'); ?></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="site_name" id="site_name" class="form-control" placeholder="<?php echo lang('site_name'); ?>" value="<?php echo getConfig('site_name'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label fw-bold">Company name & Address</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="site_meta_title" id="site_meta_title" class="form-control" placeholder="Company" value="<?php echo getConfig('site_meta_title'); ?>">
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label fw-bold"><?php echo lang('site_logo'); ?></label>
                                                            <div class="col-sm-10">
                                                                <div class="col-md-9">
                                                                    <div class="profile_content edit_img">
                                                                        <div class="file_btn file_btn_logo">
                                                                            <input type="file"  class="input_img2 p-4 " id="user_image" name="user_image" style="display: inline-block; border:3px solid black;border-radius:10px ;width:40%;>
                                                                            <span class="glyphicon input_img2 logo_btn" style="display: block;">
                                                                                <div id="show_company_img"></div>
                                                                                <span class="ceo_logo">
                                                                                    <?php
                                                                                    $site_logo = getConfig('site_logo');
                                                                                    if (!empty($site_logo)) {
                                                                                        ?>
                                                                                        <img src="<?php echo base_url() . $site_logo; ?>">
                                                                                    <?php } else { ?>
                                                                                        <img src="<?php echo base_url() . 'backend_asset/images/default.jpg'; ?>">
                                                                                    <?php } ?>
                                                                                    <input type="hidden" name="site_logo_url" value="<?php echo $site_logo; ?>" />
                                                                                </span>
                                                                                <i class="fa fa-camera"></i>
                                                                            </span>
                                                                            <img class="show_company_img2" style="display:none" alt="img" src="<?php echo base_url() ?>/backend_asset/images/logo.png">
                                                                            <span style="display:none" class="fa fa-close remove_img"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ceo_file_error file_error text-danger"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-4 col-sm-offset-2">
                                                                <button style="background-color:#DC143C;color:white" class="cancel-btn btn" type="submit"><?php echo lang('cancle_btn'); ?></button>
                                                                <button class="<?php echo THEME_BUTTON; ?> save-btn" type="submit" id="submit"><?php echo lang('save_btn'); ?></button>
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
            </div>
        </div>
        <!-- END Datatables Content -->
    </div>
    <!-- END Page Content -->

    <style>
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
                                    ?>
                                    <div class="alert alert-success">
                                        <?php echo $message; ?>
                                    </div>
                                <?php endif; ?>
                                <?php
                                $error = $this->session->flashdata('error');
                                if (!empty($error)):
                                    ?>
                                    <div class="alert alert-danger">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>
                                <div id="message"></div>
                                <div class="col-lg-12" style="overflow-x: auto">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ibox float-e-margins">
                                                <div class="ibox-content">
                                                    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/setting/setting_add') ?>" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label fw-bold"><?php echo lang('admin_email'); ?></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="admin_email" id="admin_email" class="form-control" placeholder="email@example.com" value="<?php echo getConfig('admin_email'); ?>">
                                                                <span class="help-block m-b-none"> Required Email id of sender, through which mail is sent.</span>
                                                            </div>
                                                        </div>
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label fw-bold"><?php echo lang('site_name'); ?></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="site_name" id="site_name" class="form-control" placeholder="<?php echo lang('site_name'); ?>" value="<?php echo getConfig('site_name'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label fw-bold">Company name & Address</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="site_meta_title" id="site_meta_title" class="form-control" placeholder="Company" value="<?php echo getConfig('site_meta_title'); ?>">
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label fw-bold"><?php echo lang('site_logo'); ?></label>
                                                            <div class="col-sm-10">
                                                                <div class="col-md-9">
                                                                    <div class="profile_content edit_img">
                                                                        <div class="file_btn file_btn_logo">
                                                                            <input type="file"  class="input_img2 p-4 " id="user_image" name="user_image" style="display: inline-block; border:3px solid black;border-radius:10px ;width:40%;">
                                                                            <span class="glyphicon input_img2 logo_btn" style="display: block;">
                                                                                <div id="show_company_img"></div>
                                                                                <span class="ceo_logo">
                                                                                    <?php
                                                                                    $site_logo = getConfig('site_logo');
                                                                                    if (!empty($site_logo)) {
                                                                                        ?>
                                                                                        <img src="<?php echo base_url() . $site_logo; ?>">
                                                                                    <?php } else { ?>
                                                                                        <img src="<?php echo base_url() . 'backend_asset/images/default.jpg'; ?>">
                                                                                    <?php } ?>
                                                                                    <input type="hidden" name="site_logo_url" value="<?php echo $site_logo; ?>" />
                                                                                </span>
                                                                                <i class="fa fa-camera"></i>
                                                                            </span>
                                                                            <img class="show_company_img2" style="display:none" alt="img" src="<?php echo base_url() ?>/backend_asset/images/logo.png">
                                                                            <span style="display:none" class="fa fa-close remove_img"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ceo_file_error file_error text-danger"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-4 col-sm-offset-2">
                                                                <button style="background-color:#DC143C;color:white" class="cancel-btn btn" type="submit"><?php echo lang('cancle_btn'); ?></button>
                                                                <button class="<?php echo THEME_BUTTON; ?> save-btn" type="submit" id="submit"><?php echo lang('save_btn'); ?></button>
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
            </div>
        </div>
        <!-- END Datatables Content -->
    </div>
    <!-- END Page Content -->

    <style>
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
</div>
    <?php }?>
