<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title><?php echo getConfig('site_name'); ?> | <?php
                                                    if (!empty($title) && isset($title)) : echo ucwords($title);
                                                    endif;
                                                    ?></title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>backend_asset/admin/img/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>backend_asset/admin/img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>backend_asset/admin/img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>backend_asset/admin/img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>backend_asset/admin/img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>backend_asset/admin/img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>backend_asset/admin/img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>backend_asset/admin/img/icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>backend_asset/admin/img/icon180.png" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend_asset/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css">


    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend_asset/admin/css/plugins.css">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend_asset/admin/css/main.css">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend_asset/admin/css/themes.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend_asset/admin/css/themes/fancy.css">
    <link href="<?php echo base_url(); ?>backend_asset/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="<?php echo base_url(); ?>backend_asset/admin/js/vendor/modernizr.min.js"></script>
    <script src="<?php echo base_url(); ?>backend_asset/admin/js/vendor/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.js"></script>
    <style>

        .btn-primary {
            /*                background-color: #b22b57;*/
            background: linear-gradient(to right, rgba(71, 74, 127, 1) 0%, rgba(178, 43, 87, 1) 100%);
            border-color: #E47EA0;
            color: #ffffff;
        }

        .btn-primary.btn-alt {
            background-color: #b22b57;
            color: #1bbae1;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, rgba(71, 74, 127, 1) 0%, rgba(178, 43, 87, 1) 100%);
            border-color: #E47EA0;
            color: #ffffff;
        }

        .text-primary,
        .text-primary:hover,
        a,
        a:hover,
        a:focus,
        a.text-primary,
        a.text-primary:hover,
        a.text-primary:focus {
            color:
                #b22b57;
        }
        ::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
    </style>
</head>

<body>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
    <div id="page-wrapper">

        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                <div class="preloader-spinner hidden-lt-ie10"></div>
            </div>
        </div>

        <div id="page-container" style="box-sizing: border-box; display: block; background-color: #FFFF !important; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.4);" class="sidebar-partial sidebar-visible-lg sidebar-no-animations style-alt bg-light">
            <!-- Alternative Sidebar -->
            <!-- END Alternative Sidebar -->
           
            <!-- Main Sidebar -->
            <div id="sidebar"  class="bg-light" >
                <!-- Wrapper for scrolling functionality -->
                <div id="sidebar-scroll" style=" background-color:#FFFF; height:100vh; overflow-y: scroll;  overflow-x: hidden;">
                <!-- <div id="sidebar-scroll" style=" background-color:#FFFF; height:100vh; scrollbar-width: none;  overflow-y: scroll;  overflow-x: hidden;"> -->
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Brand -->
                        <!--                            <a href="index.html" class="sidebar-brand">
                                                            <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Admin </strong><?php echo getConfig('site_name'); ?></span>
                                                        </a>-->
                        <!-- END Brand -->

                        <!-- User Info -->
                        <div class="sidebar-section sidebar-fixed sidebar-user clearfix sidebar-nav-mini-hide m-0">
                            <div class="sidebar-user-avatar">
                                <a href="<?php echo base_url() . 'pwfpanel' ?>">
                                    <img src="<?php echo base_url() . getConfig('site_logo'); ?>" alt="avatar">
                                </a>
                           <br>
                            <div class="sidebar-user-name"> <?php
                                                            $user = getUser($this->session->userdata('user_id'));
                                                            if (!empty($user)) {
                                                                echo ucwords($user->first_name . " " . $user->last_name);
                                                            }
                                                            ?>
                                                            <br></div>
                                                            </div>
                           
                        </div>
                        <!-- END User Info -->

                        <!-- Sidebar Navigation -->
                        <ul class="sidebar-nav">

                        <?php if ($this->ion_auth->is_superAdmin()) { ?>

<li>
    <a href="<?php echo site_url('pwfpanel') ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "pwfpanel") ? "active" : "" ?>">
    <!-- <img src="<?php echo base_url(); ?>uploads/icons/dashboard.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Dashboard</span></a> -->
    <img src="<?php echo base_url(); ?>uploads/home.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Dashboard</span></a>
</li>

<!--                                     <li title="Reports">
        <a href="<?php echo site_url('reports'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "reports") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Reports Details</span></a>
    </li> -->
hh
<!--<li title="Reports">-->
<!--    <a href="<?php echo site_url('reportsSummary'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "reportsSummary") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/report.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide">&nbsp;Report Summary</span></a>-->
<!--</li>-->

<!-- <li title="Patient">
    <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>"><i class="fa fa-user-circle sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Patient</span></a>
</li> -->

<!-- <li title="Provider MD">
    <a href="<?php echo site_url('doctor'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "doctor") ? "active" : "" ?>"><i class="fa fa-user-md sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Provider MD</span></a>
</li> -->
<!--                                <li>
                                        <a href="<?php echo site_url('users'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "users" || strpos($parent, "UA") !== false || strpos($parent, "UH") !== false) ? "active" : "" ?>"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Users</span></a>
                                    </li>-->

<!-- <li title="Doctor/MD Steward">
    <a href="<?php echo site_url('mdSteward'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "mdSteward") ? "active" : "" ?>"><i class="fa fa-user-md sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Doctor / MD Steward</span></a>
</li> -->
            <li title="Admin">
                    <a href="<?php echo site_url('admin'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "reports") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/admin.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Admin</span></a>
                </li>

            <li title="Plans">
                
                    <a href="<?php echo site_url('AllPlans'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "AllPlans") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/ham.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Plans</span></a>
            </li>

            <li title="Coupon">
                    <a href="<?php echo site_url('Coupon'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "Coupon") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/cash-withdrawal.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Coupon</span></a>
            </li>

            <li title="Order">
                    <a href="<?php echo site_url('userOrder'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "userOrder") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/orders.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Orders</span></a>
            </li>

            <li title="Email Template">
                <a href="<?php echo site_url('emailTemplate'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "emailTemplate") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/email.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Email Template</span></a>
            </li>
            

                               <!-- <li title="CMS">
                                        <a href="<?php echo site_url('cms'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "cms") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">CMS</span></a>
                                    </li>
                               <li title="Banner">
                                        <a href="<?php echo site_url('banner'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "banner") ? "active" : "" ?>"><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Banner</span></a>
                                    </li> -->


<!--                                <li title="Email Template">
                                        <a href="<?php echo site_url('emailTemplate'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "emailTemplate") ? "active" : "" ?>"><i class="gi gi-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Email Template</span></a>
                                    </li>
                                    <li title="Newsletter">
                                        <a href="<?php echo site_url('newsLetter'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "newsLetter") ? "active" : "" ?>"><i class="gi gi-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Newsletter</span></a>
                                    </li>-->
<!--                                <li title="Category">
                                        <a href="<?php echo site_url('menuCategory'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "menuCategory") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Software Category</span></a>
                                    </li>-->
<!--                                <li title="Partners">
                                        <a href="<?php echo site_url('partners'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "partners") ? "active" : "" ?>"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Partners</span></a>
                                    </li>
                                    <li title="Services">
                                        <a href="<?php echo site_url('services'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "services") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Services</span></a>
                                    </li>
                                    <li title="How It Works">
                                        <a href="<?php echo site_url('howItWorks'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "howItWorks") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">How It Works</span></a>
                                    </li>
                                    <li title="Testimonials">
                                        <a href="<?php echo site_url('testimonial'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "testimonial") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Testimonials</span></a>
                                    </li>-->
<!--                                <li title="Contact Us">
                                        <a href="<?php echo site_url('contestUs'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contestUs") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Contact Us</span></a>
                                    </li>-->
<!--                                <li title="Client Request">
                                        <a href="<?php echo site_url('clientRequest'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "clientRequest") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Client Request</span></a>
                                    </li>-->

<!-- <li title="Recommendation">
    <a href="<?php echo site_url('recommendation'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "recommendation") ? "active" : "" ?>"><i class="fa fa-paper-plane sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Steward Communications</span></a>
</li> -->
<!-- <li title="Test">
    <a href="<?php echo site_url('test'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "test") ? "active" : "" ?>"><i class="fa fa-paper-plane sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Test</span></a>
</li> -->
<!-- <li title="FaqQuestion
     '">
    <a href="<?php echo site_url('faq'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "faq") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/qa.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide">&nbsp;FAQ</span></a>
</li> -->
<!-- <li title="Contact Us">
    <a href="<?php echo site_url('contactus'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contactus") ? "active" : "" ?>"><i class="fa fa-comment sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Contact Us</span></a>
</li> -->
<!-- <li title="Tutorial">
    <a href="https://alluring-impala-001.notion.site/Team-Home-0f87afe9fd1a4a38bc5d5f4a816c27b6" target="_blank" class=" <?php echo (strtolower($this->router->fetch_class()) == "recommendation1") ? "active" : "" ?>"><i class="fa fa-hand-o-right sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tutorials and Modules</span></a>
</li> -->
<li title="Tutorial">
    <a href="<?php echo site_url('tutorials'); ?>" target="_blank" class=" <?php echo (strtolower($this->router->fetch_class()) == "howItWorks") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/tutorials.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark text-dark">&nbsp;Tutorials</span></a>
</li>

<li title="setting">
    <a href="<?php echo site_url('setting'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "setting") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/setting.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark text-dark">&nbsp;Admin Setting</span></a>
</li>
            <?php }else if ($this->ion_auth->is_admin()) { ?>

                                <li>
                                    <a href="<?php echo site_url('pwfpanel') ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "pwfpanel") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/home.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Dashboard </span></a>
                                </li>
                                 <li title="Plans">
                                        <a href="<?php echo site_url('AllPlans'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "AllPlans") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/ham.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Plans</span></a>
                                </li>

                               
                                <!--                                     <li title="Reports">
                                        <a href="<?php echo site_url('reports'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "reports") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Reports Details</span></a>
                                    </li> -->

                                <!-- <li title="Reports">
                                    <a href="<?php echo site_url('reportsSummary'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "reportsSummary") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/report.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp;Report Summary</span></a>
                                </li> -->

                                <!-- <li title="Patient">
                                    <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>"><i class="fa fa-user-circle sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Patient</span></a>
                                </li> -->

                                <!-- <li title="Provider MD">
                                    <a href="<?php echo site_url('doctor'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "doctor") ? "active" : "" ?>"><i class="fa fa-user-md sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Provider MD</span></a>
                                </li> -->
                                                               <!-- <li>
                                                                        <a href="<?php echo site_url('users'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "users" || strpos($parent, "UA") !== false || strpos($parent, "UH") !== false) ? "active" : "" ?>"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Users</span></a>
                                                                    </li> -->

                                <!-- <li title="Doctor/MD Steward">
                                    <a href="<?php echo site_url('mdSteward'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "mdSteward") ? "active" : "" ?>"><i class="fa fa-user-md sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Doctor / MD Steward</span></a>
                                </li> -->
                                

                                <!--<li title="Data Operator">-->
                                <!--    <a href="<?php echo site_url('dataOperator'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "dataOperator") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/doctors_md.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp;Doctor</span></a>-->
                                <!--</li>-->
                                 <!-- <li title="Data Operator">
                                    <a href="<?php echo site_url('dataOperator'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "dataOperator") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/doctor.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp;Doctor</span></a>
                                </li> -->

                                <li title="Hospital Manage">
                                    
                                    <a href="<?php echo site_url('facilityManager'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "facilityManager") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/hospital.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp; Hospital Manage</span>
                                    
                                </a>
                                   
                                   
                                </li>
                               
                                <?php 
                                $user_id = $this->session->userdata('user_id');

                                $option = array(
                                    'table' => USERS . ' as user',
                                    'select' => 'user.*, group.name as group_name, UP.doc_file, CU.care_unit_code, CU.name, h.admin_id',
                                    'join' => array(
                                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id = user.id', 'left'),
                                        array(GROUPS . ' as group', 'group.id = ugroup.group_id', 'left'),
                                        array('user_profile AS UP', 'UP.user_id = user.id', 'left'),
                                        array('care_unit AS CU', 'CU.id = user.care_unit_id', 'left'),
                                        array('hospital AS h', 'h.user_id = user.id', 'left')
                                    ),
                                    'where' => array(
                                        'user.delete_status' => 0,
                                        'group.id' => 6,
                                        'h.admin_id' => $user_id
                                    ),
                                    'order' => array('user.id' => 'DESC') // Order descending by user id
                                );

                            $list = $this->common_model->customGet($option);

                        ?>

                        <!-- <li data-toggle="collapse" data-target="#new" class="collapsed" data-parent="#menu-content" onclick="toggleDropdown(event)">
                            <a href="#">
                            <img src="<?php echo base_url(); ?>uploads/hospital.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark"> Hospital List </span><i class="fa fa-chevron-down"></i>
                            </a>
                        </li>
                        <ul class="sub-menu collapse" id="new" style="background: white; color: black; padding-left: revert;">
                            <?php foreach($list as $lists){ ?>
                                <li ><a href="<?php echo site_url('facilityManager/hospitalDetail/'.$lists->id); ?> <?php base_url('facilityManager/hospitalDetail/'.$lists->id); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "facilityManager/hospitalDetail/.$lists->id") ? "active" : "" ?>" style="color: black; font-weight: bold; "><img src="<?php echo base_url(); ?>uploads/hospital.svg" style="height: 23px;width:23px;"><?php echo ucfirst($lists->first_name. ' '.$lists->last_name);?></a></li>
                            <?php }?>
                        </ul> -->






                                <!-- <li title="User Rewards">
                                    <a href="<?php echo site_url('userReward'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "userReward") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/login.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp; Login data</span></a>
                                </li> -->

                                <!--                                <li>
                                                                        <a href="<?php echo site_url('vendors') . "/index/No"; ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "vendors") ? "active" : "" ?>"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Vendor</span></a>
                                                                    </li>-->
                                <!--                                <li>
                                                                        <a href="<?php echo site_url('business') . "/index/No"; ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "business") ? "active" : "" ?>"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Vendor Business Profile</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo site_url('enquiries'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "enquiries") ? "active" : "" ?>"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Enquiries</span></a>
                                                                    </li>-->
                                <!--                                    <li class="sidebar-header">
                                        <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a><a href="javascript:void(0)" data-toggle="tooltip" title="Create the most amazing pages with the widget kit!"><i class="gi gi-lightbulb"></i></a></span>
                                        <span class="sidebar-header-title">Widget Kit</span>
                                    </li>-->
                                <!-- <li title="Department">
                                    <a href="<?php echo site_url('careUnit'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "careUnit") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/department.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp; Department/Care Unit</span></a>
                                </li>
                                <li title="Diagnosis">
                                    <a href="<?php echo site_url('initialDx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialDx") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/infection.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp; Infections</span></a>
                                </li> -->
                                <!-- <li title="Culture Source">
                                    <a href="<?php echo site_url('cultureSource'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "cultureSource") ? "active" : "" ?>"><i class="fa fa-heartbeat sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Culture Source</span></a>
                                </li>
                                <li title="Organism">
                                    <a href="<?php echo site_url('organism'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "organism") ? "active" : "" ?>"><i class="fa fa-bug sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Organism</span></a>
                                </li>
                                <li title="Precautions">
                                    <a href="<?php echo site_url('precautions'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "precautions") ? "active" : "" ?>"><i class="fa fa-h-square sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Precautions</span></a>
                                </li>
                                <li title="Antibiotic Name">
                                    <a href="<?php echo site_url('initialRx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialRx") ? "active" : "" ?>"><i class="fa fa-medkit sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Antibiotic Name</span></a>
                                </li> -->

                                <!--                                <li title="CMS">
                                                                        <a href="<?php echo site_url('cms'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "cms") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">CMS</span></a>
                                                                    </li>-->
                                <!--                                <li title="Banner">
                                                                        <a href="<?php echo site_url('banner'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "banner") ? "active" : "" ?>"><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Banner</span></a>
                                                                    </li>-->


                                <!--                                <li title="Email Template">
                                                                        <a href="<?php echo site_url('emailTemplate'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "emailTemplate") ? "active" : "" ?>"><i class="gi gi-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Email Template</span></a>
                                                                    </li>
                                                                    <li title="Newsletter">
                                                                        <a href="<?php echo site_url('newsLetter'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "newsLetter") ? "active" : "" ?>"><i class="gi gi-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Newsletter</span></a>
                                                                    </li>-->
                                <!--                                <li title="Category">
                                                                        <a href="<?php echo site_url('menuCategory'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "menuCategory") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Software Category</span></a>
                                                                    </li>-->
                                <!--                                <li title="Partners">
                                                                        <a href="<?php echo site_url('partners'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "partners") ? "active" : "" ?>"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Partners</span></a>
                                                                    </li>
                                                                    <li title="Services">
                                                                        <a href="<?php echo site_url('services'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "services") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Services</span></a>
                                                                    </li>
                                                                    <li title="How It Works">
                                                                        <a href="<?php echo site_url('howItWorks'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "howItWorks") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">How It Works</span></a>
                                                                    </li>
                                                                    <li title="Testimonials">
                                                                        <a href="<?php echo site_url('testimonial'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "testimonial") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Testimonials</span></a>
                                                                    </li>-->
                                <!--                                <li title="Contact Us">
                                                                        <a href="<?php echo site_url('contestUs'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contestUs") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Contact Us</span></a>
                                                                    </li>-->
                                <!--                                <li title="Client Request">
                                                                        <a href="<?php echo site_url('clientRequest'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "clientRequest") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Client Request</span></a>
                                                                    </li>-->

                                <!-- <li title="Recommendation">
                                    <a href="<?php echo site_url('recommendation'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "recommendation") ? "active" : "" ?>"><i class="fa fa-paper-plane sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Steward Communications</span></a>
                                </li> -->
                                <!-- <li title="Test">
                                    <a href="<?php echo site_url('test'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "test") ? "active" : "" ?>"><i class="fa fa-paper-plane sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Test</span></a>
                                </li> -->
                                <!-- <li title="FaqQuestion
                                     '">
                                    <a href="<?php echo site_url('faq'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "faq") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/qa.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide">&nbsp;FAQ</span></a>
                                </li> -->
                                <!-- <li title="Contact Us">
                                    <a href="<?php echo site_url('contactus'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contactus") ? "active" : "" ?>"><i class="fa fa-comment sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Contact Us</span></a>
                                </li> -->
                                <!-- <li title="Tutorial">
                                    <a href="https://alluring-impala-001.notion.site/Team-Home-0f87afe9fd1a4a38bc5d5f4a816c27b6" target="_blank" class=" <?php echo (strtolower($this->router->fetch_class()) == "recommendation1") ? "active" : "" ?>"><i class="fa fa-hand-o-right sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tutorials and Modules</span></a>
                                </li> -->
                                <!-- <li title="Tutorial">
                                    <a href="<?php echo site_url('tutorials'); ?>" target="_blank" class=" <?php echo (strtolower($this->router->fetch_class()) == "howItWorks") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/studying.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide">&nbsp;Tutorials</span></a>
                                </li> -->
                                <!-- <li>
                                    <a href="<?php echo site_url('users'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "users" || strpos($parent, "UA") !== false || strpos($parent, "UH") !== false) ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/patients.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Users</span></a>
                                </li> -->
                                
                               <!-- <li title="Appointment">`
                                
                                    <a href="<?php echo site_url('appointment'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointment") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/appointment.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp;Appointments</span></a>
                                </li> -->
                                <li title="Email Template">
                                    <a href="<?php echo site_url('emailTemplate'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "emailTemplate") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/email.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Email Template</span></a>
                                </li>

                                <!-- <li title="Contact Us">
                                    <a href="<?php echo site_url('contactus'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contactus") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/contact.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Contact Us</span></a>
                                </li> -->
                                <li title="setting">
                                    <a href="<?php echo site_url('setting'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "setting") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/setting.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Admin Setting</span></a>
                                </li>
                            <?php //} elseif ($this->ion_auth->is_subAdmin()) { ?>

                                <!-- <li>
                                    <a href="<?php echo site_url('pwfpanel') ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "pwfpanel") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/home.png" style="height:23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Dashboard</span></a>
                                </li>
                                <li title="Appointment">
                                
                                    <a href="<?php echo site_url('appointment'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointment") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/appointment.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Appointments</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('users/index/Yes'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "users" || strpos($parent, "UA") !== false || strpos($parent, "UH") !== false) ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/users.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Users</span></a>
                                </li>
                                
                                <li title="Patient">
                                    <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/patients.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Patients</span></a>
                                </li>

                                <li title="Tasks">
                                    <a href="<?php echo site_url('tasks'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "tasks") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/tasks.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Tasks</span></a>
                                </li>

                                <li title="Aprove">
                                    <a href="<?php echo site_url('notification/notification_list'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "notification") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/tasks.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp;Aprove Appointment</span></a>
                                </li>
                                
                                <li title="Attributes">
                                <a href="<?php echo site_url('attributes'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "attributes") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Attributes</span></a>
                                </li>
                                <li title="Labs">
                                 <a href="<?php echo site_url('cultureSource'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "cultureSource") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Labs</span></a>
                                </li>

                                <li title="Letters">
                                    <a href="<?php echo site_url('letters'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "Letters") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/letters.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Letters</span></a>
                                </li>
                                <li title="Invoices">
                                    <a href="<?php echo site_url('invoices'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "invoices") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/invoice.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Invoices</span></a>
                                </li>
                                <li title="Products">
                                    <a href="<?php echo site_url('products'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "products") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/products.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Products</span></a>
                                </li>
                                <li title="Contact Us">
                                    <a href="<?php echo site_url('contactus'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contactus") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/contact.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Contact Us</span></a>
                                </li>
                                
                                <li title="Email Template">
                                    <a href="<?php echo site_url('emailTemplate'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "emailTemplate") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/email.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Email Template</span></a>
                                </li>

                                <li title="Settings">
                                    <a href="<?php echo site_url('userSettings/index/Yes'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "userSettings") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/setting.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp; Setting</span></a>
                                </li> -->


                                        <?php 
                                            // $user_id = $this->session->userdata('user_id');
                                            
                                            //     $option = array(
                                            //         'table' => USERS . ' as user',
                                            //         'select' => 'user.*,group.name as group_name,ugroup.group_id as role_id',
                                            //         'join' => array(
                                            //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                                            //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                                            //         ),
                                            //         'order' => array('user.id' => 'DESC'),
                                            //         'where' => array('user.id'=>$user_id),
                                            //         'single'=>true,
                                            //     );
                                        
                                                // $authUser = $this->common_model->customGet($option);
                                                

                                                // $role = $authUser->role_id;
                                            
                                                // $optionRole = array(
                                                //     'table' => ROLE_PERMISSION . ' as roles_permission', // Correct spacing before alias
                                                //     'select' => 'roles_permission.*, menu.menu_name, menu.menu_icons,menu.menu_path',    // Ensure column selection is correct
                                                //     'join' => array(
                                                //         array(SIDE_MENU . ' as menu', 'menu.menu_id = roles_permission.menu_id', 'left') // Correct join syntax with proper spacing
                                                //     ),
                                                //     'where' => array('roles_permission.role_id' => $role) // Where clause for role_id
                                                // );
                                                
                                            //$module_permission = $this->common_model->customGet($optionRole);
                                            // print_r($module_permission);die;
                                           // foreach ($module_permission as $item) { ?>
                                            <!-- <li>
                                                
                                                    <a href="<?php echo site_url($item->menu_path) ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == $item->menu_path) ? "active" : "" ?>">
                                                    
                                                    <img src="<?php echo base_url(); ?><?php echo $item->menu_icons; ?>" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark"><?php echo $item->menu_name; ?></span></a>
                                                </a>
                                            </li> -->
                                        <?php // } ?>


                            <?php } elseif ($this->ion_auth->is_facilityManager()) {  ?>

                                  <li>
                                    <a href="<?php echo site_url('pwfpanel') ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "pwfpanel") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/home.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>

                                <!-- <li title="Reports">
                                    <a href="<?php echo site_url('reportsSummary'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "reportsSummary") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/icons/report.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Report Summary</span></a>
                                </li> -->

                                <li title="Risk Analysis">
                                    <a href="<?php echo site_url('reportsSummary'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "reportsSummary") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/icons/report.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Risk Analysis</span></a>
                                </li>

                                <li title="CQC Health">
                                        <a href="<?php echo site_url('cqcHealth'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "cqcHealth") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/cqc.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">CQC Health</span></a>
                                </li>
                                <!-- <li title="Appointment">
                                    <a href="<?php echo site_url('appointment'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointment") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/appointment.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Appointments</span></a>
                                </li> -->
                                <li title="Appointment">
                                    <a href="<?php echo site_url('appointment'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointment") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/appointment.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Appointments</span></a>
                                </li>

                                <li title="Aprove">
                                    <a href="<?php echo site_url('notification/notification_list'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "notification") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/tasks.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp;Aprove Appointment</span></a>
                                </li>
                                
                                <!-- <li>
                                    <a href="<?php echo site_url('users/index/Yes'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "users" || strpos($parent, "UA") !== false || strpos($parent, "UH") !== false) ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/users.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Users</span></a>
                                </li> -->

                                <li title="User management">
                                    <a href="<?php echo site_url('users/managements'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "users") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/users.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Users Management</span></a>
                                </li>

                                <li title="Invoices">
                                    <a href="<?php echo site_url('invoices/managements'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "invoices") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/invoice.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Invoices Management</span></a>
                                </li>
                                
                                <li title="Patient">
                                    <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/patients.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Patients</span></a>
                                </li>
                                 <!-- <li title="Labs">
                                 <a href="<?php echo site_url('cultureSource'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "cultureSource") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Labs</span></a>
                                </li> -->
                                <li title="Tasks">
                                    <a href="<?php echo site_url('tasks'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "tasks") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/tasks.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Tasks</span></a>
                                </li>

                                <li title="Attributes">
                                <a href="<?php echo site_url('attributes'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "attributes") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Attributes</span></a>
                                </li>
                                <li title="Appointment Type">
                                 <a href="<?php echo site_url('appointmentType'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointmentType") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Appointment Type</span></a>
                                </li>

                                <li title="Type Of Stay">
                                 <a href="<?php echo site_url('typeOfStay'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "typeOfStay") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Type Of Stay</span></a>
                                </li>
                                <!-- <li title="Provider MD">
                                    <a href="<?php echo site_url('doctor'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "doctor") ? "active" : "" ?>"><i class="fa fa-user-md sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Provider MD</span></a>
                                </li> -->

                                <!-- <li title="Doctor / MD Steward">
                                    <a href="<?php echo site_url('mdSteward'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "mdSteward") ? "active" : "" ?>"><i class="fa fa-user-md sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Doctors</span></a>
                                </li> -->
                                <li title="Data Operator">
                                    <a href="<?php echo site_url('dataOperator'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "dataOperator") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/doctor.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Doctor</span></a>
                                </li>
 
                                <!--   <li title="Facility Manager">
                                        <a href="<?php echo site_url('facilityManager'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "facilityManager") ? "active" : "" ?>"><i class="fa fa-briefcase sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Facility Manager</span></a>
                                    </li> -->

                               
                                <!-- <li title="DayTimeSlot">
                                    <a href="<?php echo site_url('dayTimeSlot'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "DayTimeSlot") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/department.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide">&nbsp;Day Time Slot</span></a>
                                </li> -->

                                
                                
                                <!-- <li title="Contact Us">
                                    <a href="<?php echo site_url('contactus'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contactus") ? "active" : "" ?>"><i class="fa fa-comment sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Contact Us</span></a>
                                </li> -->
                                <!-- <li title="Diagnosis">
                                        <a href="<?php echo site_url('initialDx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialDx") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Infections</span></a>
                                    </li>

                                    <li title="Antibiotic Name">
                                        <a href="<?php echo site_url('initialRx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialRx") ? "active" : "" ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Antibiotic Name</span></a>
                                    </li> -->
                               

                                <li title="Attributes 1">
                                <a href="<?php echo site_url('careUnit'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "careUnit") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Hospital Attributes</span></a>
                                </li>

                                <!-- <li title="Department">
                                    <a href="<?php echo site_url('careUnit'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "careUnit") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/department.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Department/Care Unit</span></a>
                                </li>  -->

                                <!-- <li title="Letters">
                                    <a href="<?php echo site_url('letters'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "Letters") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/letters.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Letters</span></a>
                                </li> -->
                                <!-- <li title="Invoices">
                                    <a href="<?php echo site_url('invoices'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "Invoices/managements") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/invoice.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Invoices</span></a>
                                </li> -->

                                <!-- <li title="Diagnosis">
                                    <a href="<?php echo site_url('initialDx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialDx") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/infection.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Infections</span></a>
                                </li> -->
                               <!-- <li title="Culture Source">
                                    <a href="<?php echo site_url('cultureSource'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "cultureSource") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/products.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Culture Source</span></a>
                                </li> -->
                                <!-- <li title="Organism">
                                    <a href="<?php echo site_url('organism'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "organism") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/products.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Organism</span></a>
                                </li> -->
                                <!-- <li title="Precautions">
                                    <a href="<?php echo site_url('precautions'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "precautions") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/products.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Precautions</span></a>
                                </li> -->
                                <!-- <li title="Antibiotic Name">
                                    <a href="<?php echo site_url('initialRx'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "initialRx") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/products.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Antibiotic Name</span></a>
                                </li>  -->

                                <li title="Products">
                                    <a href="<?php echo site_url('products'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "products") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/products.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Products</span></a>
                                </li>
                                <li title="Contact Us">
                                    <a href="<?php echo site_url('contactus'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contactus") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/contact.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Contact Us</span></a>
                                </li>
                                <!-- <li title="Contact">
                                    <a href="<?php echo site_url('contact'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "Contact") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/department.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide">&nbsp;Contacts</span></a>
                                </li> -->
                                <!-- <li title="Tutorial">
                                     <a href="<?php echo site_url('tutorials'); ?>" target="_blank" class=" <?php echo (strtolower($this->router->fetch_class()) == "howItWorks") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/tutorials.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark text-dark">Tutorials</span></a>
                                 </li> -->
                                <!-- <li title="Recommendation">
                                    <a href="<?php echo site_url('recommendation'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "recommendation") ? "active" : "" ?>"><i class="fa fa-paper-plane sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Steward Communications</span></a>
                                </li> -->
                                <!-- <li title="FaqQuestion
                                     '">
                                    <a href="<?php echo site_url('faqquestion'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "faqquestion") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/faq.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">FAQ</span></a>
                                </li> -->
                                <li title="Email Template">
                                    <a href="<?php echo site_url('emailTemplate'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "emailTemplate") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/email.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Email Template</span></a>
                                </li>

                                <!-- <li title="Settings">
                                    <a href="<?php echo site_url('userSettings/index/Yes'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "userSettings") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/setting.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Setting</span></a>
                                </li> -->
                                <li title="setting">
                                    <a href="<?php echo site_url('setting'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "setting") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/setting.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark text-dark">&nbsp;Setting</span></a>
                                </li>

                            <?php //} elseif ($this->ion_auth->is_patient()) { ?>

                                <!-- <li>
                                    <a href="<?php echo site_url('pwfpanel') ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "pwfpanel") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/home.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Dashboard</span></a>
                                </li>

                                <li title="PatientAppointment">
                                    <a href="<?php echo site_url('patientAppointment'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patientAppointment") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/icons/patient.png" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">&nbsp;Patient Appointment</span></a>
                                </li> -->

                                <!-- <li>
                                    <a href="<?php echo site_url('pwfpanel') ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "pwfpanel") ? "active" : "" ?>"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li> -->


                                <?php 
                                            // $user_id = $this->session->userdata('user_id');
                                            
                                            //     $option = array(
                                            //         'table' => USERS . ' as user',
                                            //         'select' => 'user.*,group.name as group_name,ugroup.group_id as role_id',
                                            //         'join' => array(
                                            //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                                            //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                                            //         ),
                                            //         'order' => array('user.id' => 'DESC'),
                                            //         'where' => array('user.id'=>$user_id),
                                            //         'single'=>true,
                                            //     );
                                        
                                                // $authUser = $this->common_model->customGet($option);
                                                

                                                // $role = $authUser->role_id;
                                            
                                                // $optionRole = array(
                                                //     'table' => ROLE_PERMISSION . ' as roles_permission', // Correct spacing before alias
                                                //     'select' => 'roles_permission.*, menu.menu_name, menu.menu_icons,menu.menu_path',    // Ensure column selection is correct
                                                //     'join' => array(
                                                //         array(SIDE_MENU . ' as menu', 'menu.menu_id = roles_permission.menu_id', 'left') // Correct join syntax with proper spacing
                                                //     ),
                                                //     'where' => array('roles_permission.role_id' => $role) // Where clause for role_id
                                                // );
                                                
                                            // $module_permission = $this->common_model->customGet($optionRole);
                                            // print_r($module_permission);die;
                                            // foreach ($module_permission as $item) { ?>
                                            <!-- <li> -->
                                                <!-- <a href="<?php echo base_url($item->menu_path); ?>"> url </a> -->
                                                    
                                                    <!-- <a href="<?php echo site_url($item->menu_path) ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == $item->menu_path) ? "active" : "" ?>">
                                                    
                                                    <img src="<?php echo base_url(); ?><?php echo $item->menu_icons; ?>" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark"><?php echo $item->menu_name; ?></span></a>
                                                </a> -->
                                            <!-- </li> -->
                                        <!-- <?php// } ?> -->

                                <?php //}elseif ($this->ion_auth->is_user()){?>

                                    <!-- <li>
                                    <a href="<?php echo site_url('pwfpanel') ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "pwfpanel") ? "active" : "" ?>">
                                    <img src="<?php echo base_url(); ?>uploads/home.svg" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark">Dashboard</span></a>
                                
                                </li>

                                <li title="Attributes">
                                <a href="<?php echo site_url('attributes'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "attributes") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Attributes</span></a>
                                </li>
                                <li title="Appointment Type">
                                 <a href="<?php echo site_url('appointmentType'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "appointmentType") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Appointment Type</span></a>
                                </li>

                                <li title="Type Of Stay">
                                 <a href="<?php echo site_url('typeOfStay'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "typeOfStay") ? "active" : "" ?>"><img src="<?php echo base_url(); ?>uploads/labs.svg" height="23px" width="23px"><span class="sidebar-nav-mini-hide text-dark">Type Of Stay</span></a>
                                </li> -->
                                
                                        <?php 
                                            
                                           
                                            // $user_id = $this->session->userdata('user_id');
                                            
                                            //     $option = array(
                                            //         'table' => USERS . ' as user',
                                            //         'select' => 'user.*,group.name as group_name,ugroup.group_id as role_id',
                                            //         'join' => array(
                                            //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                                            //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                                            //         ),
                                            //         'order' => array('user.id' => 'DESC'),
                                            //         'where' => array('user.id'=>$user_id),
                                            //         'single'=>true,
                                            //     );
                                        
                                            //     $authUser = $this->common_model->customGet($option);
                                                

                                            //     $role = $authUser->role_id;
                                            
                                            //     $optionRole = array(
                                            //         'table' => ROLE_PERMISSION . ' as roles_permission', // Correct spacing before alias
                                            //         'select' => 'roles_permission.*, menu.menu_name, menu.menu_icons,menu.menu_path',    // Ensure column selection is correct
                                            //         'join' => array(
                                            //             array(SIDE_MENU . ' as menu', 'menu.menu_id = roles_permission.menu_id', 'left') // Correct join syntax with proper spacing
                                            //         ),
                                            //         'where' => array('roles_permission.role_id' => $role) // Where clause for role_id
                                            //     );
                                                
                                            // $module_permission = $this->common_model->customGet($optionRole);
                                            
                                            // foreach ($module_permission as $item) { ?>
                                            <!-- <li> -->
                                               
                                                    <!-- <a href="<?php echo site_url($item->menu_path) ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == $item->menu_path) ? "active" : "" ?>">
                                                    
                                                    <img src="<?php echo base_url(); ?><?php echo $item->menu_icons; ?>" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark"><?php echo $item->menu_name; ?></span></a>
                                                </a>
                                            </li> -->
                                        <?php //} ?>
                                        
                                    <?php }elseif ($this->ion_auth->is_all_roleslogin()){?>
                                        
                                        <?php 
                                            
                                           
                                            $user_id = $this->session->userdata('user_id');
                                            // print_r($user_id);die;
                                                $option = array(
                                                    'table' => USERS . ' as user',
                                                    'select' => 'user.*,group.name as group_name,ugroup.group_id as role_id',
                                                    'join' => array(
                                                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                                                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                                                    ),
                                                    'order' => array('user.id' => 'DESC'),
                                                    'where' => array('user.id'=>$user_id),
                                                    'single'=>true,
                                                );
                                        
                                                $authUser = $this->common_model->customGet($option);
                                                

                                                $role = $authUser->role_id;
                                            
                                                $optionRole = array(
                                                    'table' => ROLE_PERMISSION . ' as roles_permission', // Correct spacing before alias
                                                    'select' => 'roles_permission.*, menu.menu_name,menu.menu_parent, menu.menu_icons,menu.menu_path',    // Ensure column selection is correct
                                                    'join' => array(
                                                        array(SIDE_MENU . ' as menu', 'menu.menu_id = roles_permission.menu_id', 'left') // Correct join syntax with proper spacing
                                                    ),
                                                    'where' => array('roles_permission.role_id' => $role) // Where clause for role_id
                                                );
                                                
                                            $module_permission = $this->common_model->customGet($optionRole);
                                            
                                            foreach ($module_permission as $item) { 

                                                if(empty($item->menu_parent)){ ?>

                                            <li>
                                                <?php //echo $item->menu_parent;?>
                                                <a href="<?php echo site_url($item->menu_path) ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == $item->menu_path) ? "active" : "" ?>">
                                                
                                                <img src="<?php echo base_url(); ?><?php echo $item->menu_icons; ?>" style="height: 23px;width:23px;" alt="avatar"><span class="sidebar-nav-mini-hide text-dark"><?php echo $item->menu_name; ?></span></a>
                                                </a>
                                            </li>

                                            <?php  } ?>
                                            
                                           
                                        <?php } ?>


                                    <?php }?>
                        </ul>
                        <!-- END Sidebar Navigation -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Main Sidebar -->

            <!-- <div id="main-container"> -->

<!-- <header class="navbar navbar-default"> -->
    <!-- Left Header Navigation -->
    <!-- <ul class="nav navbar-nav-custom"> -->
        <!-- Main Sidebar Toggle Button -->
        <!-- <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                <i class="fa fa-bars fa-fw"></i>
            </a>
        </li> -->
        <!-- END Main Sidebar Toggle Button -->

        <!-- Template Options -->
        <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
        <!-- <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="gi gi-settings"></i>
                </a>
                <ul class="dropdown-menu dropdown-custom dropdown-options">
                    <li class="dropdown-header text-center">Header Style</li>
                    <li>
                        <div class="btn-group btn-group-justified btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                        </div>
                    </li>
                    <li class="dropdown-header text-center">Page Style</li>
                    <li>
                        <div class="btn-group btn-group-justified btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                        </div>
                    </li>
                </ul>
            </li> -->
        <!-- END Template Options -->
    <!-- </ul> -->
    <!-- END Left Header Navigation -->

    <!-- Search Form -->
    <!-- <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
            <div class="form-group">
                <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
            </div>
        </form> -->
        <!-- <ul class="nav navbar-nav-custom pull-center">
        <?php if ($this->ion_auth->is_facilityManager()) { ?> -->
        <!-- <div style="background-color: #e3d3e7; text-align: center;"> -->
            <!-- <h1>
                <?php
                $user = getUser($this->session->userdata('user_id'));
                if (!empty($user)) {
                    echo '<strong>' . ucwords($user->hospital_name) . '</strong>';
                }
                ?>
            </h1> -->
        <!-- </div> -->
        <!-- <?php } ?> -->
            <!-- </ul> -->
    <!-- END Search Form -->

    <!-- Right Header Navigation -->
    <!-- <ul class="nav navbar-nav-custom pull-right"> -->
        <!-- Alternative Sidebar Toggle Button -->
        <!--                            <li>
                                             If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); 
                                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');this.blur();">
                                                <i class="gi gi-share_alt"></i>
                                                <span class="label label-primary label-indicator animation-floating">4</span>
                                            </a>
                                        </li>-->
        <!-- END Alternative Sidebar Toggle Button -->

        <!-- User Dropdown -->
        <!-- <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url() . getConfig('site_logo'); ?>" alt="avatar"> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>uploads/icons/profile.png" style="height: 20px;width:20px;" alt="avatar"><?php
                                                                                                //$user = getUser($this->session->userdata('user_id'));
                                                                                                if (!empty($user)) {
                                                                                                    echo ucwords($user->first_name . " " . $user->last_name);
                                                                                                }
                                                                                                ?></a>
                    <a href="javascript:void(0)" onclick="logout()"><img src="<?php echo base_url(); ?>uploads/icons/logout.png" style="height: 20px;width:20px;" alt="avatar"> Logout</a>
                </li> -->
                <!-- <li>
                        <a href="page_ready_timeline.html">
                            <i class="fa fa-clock-o fa-fw pull-right"></i>
                            <span class="badge pull-right">10</span>
                            Updates
                        </a>
                        <a href="page_ready_inbox.html">
                            <i class="fa fa-envelope-o fa-fw pull-right"></i>
                            <span class="badge pull-right">5</span>
                            Messages
                        </a>
                        <a href="page_ready_pricing_tables.html"><i class="fa fa-magnet fa-fw pull-right"></i>
                            <span class="badge pull-right">3</span>
                            Subscriptions
                        </a>
                        <a href="page_ready_faq.html"><i class="fa fa-question fa-fw pull-right"></i>
                            <span class="badge pull-right">11</span>
                            FAQ
                        </a>
                    </li> -->
                <!-- <li class="divider"></li> -->
                <!--                                    <li>
                                                             <a href="page_ready_user_profile.html">
                                                                <i class="fa fa-user fa-fw pull-right"></i>
                                                                Profile
                                                            </a> 
                                                             Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) 
                                                            <a href="#modal-user-settings" data-toggle="modal">
                                                                <i class="fa fa-cog fa-fw pull-right"></i>
                                                                Change Password
                                                            </a>
                                                        </li>-->
                <!--                                    <li class="divider"></li>-->
                <!--                                    <li>
                                                             <a href="page_ready_lock_screen.html"><i class="fa fa-lock fa-fw pull-right"></i> Lock Account</a> 
                                                            <a href="javascript:void(0)" onclick="logout()"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                                        </li>-->
                <!--                                    <li class="dropdown-header text-center">Activity</li>
                                                        <li>
                                                            <div class="alert alert-success alert-alt">
                                                                <small>5 min ago</small><br>
                                                                <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                                                            </div>
                                                            <div class="alert alert-info alert-alt">
                                                                <small>10 min ago</small><br>
                                                                <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                                                            </div>
                                                            <div class="alert alert-warning alert-alt">
                                                                <small>3 hours ago</small><br>
                                                                <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                                                            </div>
                                                            <div class="alert alert-danger alert-alt">
                                                                <small>Yesterday</small><br>
                                                                <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">New bug submitted</a>
                                                            </div>
                                                        </li>-->
            <!-- </ul> -->
        <!-- </li> -->
        <!-- END User Dropdown -->
    <!-- </ul> -->
    <!-- END Right Header Navigation -->
<!-- </header> -->
<!-- END Header -->

               <div id="main-container">                                                                    
                <header class="navbar navbar-default d-flex justify-content-end">
                <div class="newHeader pt-3 pb-3 ps-2 pe-4 d-flex justify-content-end align-items-center">
                    <div class="d-flex  align-items-center">
                        <img src="<?php echo base_url(); ?>uploads/user.png" style="height: 23px;width:23px; filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%)" alt="">
                        <h2 style="font-size:1.5rem;font-weight:600" class="headerFonts ms-2">
                        <a href="<?php echo site_url('pwfpanel/profile'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile" style="color:black;">User</a>
                        </h2>
                    </div>
                       <div>
                        <!-- <h2 style="font-size:1.5rem;font-weight:700" class="headerFonts ms-5 ">
                        <a href="javascript:void(0)" onclick="logout()" data-toggle="tooltip" data-placement="bottom" title="Logout">Logout</a>
                        </h2> -->
                        
                        <h2 style="font-size: 1.5rem; font-weight:600" class="headerFonts ms-5">
                           <a href="javascript:void(0)" onclick="logout()" data-toggle="tooltip" data-placement="bottom" title="Logout" style="color:black;" >Logout</a>
                      </h2>

                       </div>                                                                                             
                </div>


                <!-- <a href="<?php echo site_url('pwfpanel/profile'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><img src="<?php echo base_url(); ?>uploads/icons/profile.png" style="height: 20px;width:20px;" alt="avatar"></a>
                                <a href="<?php echo site_url('pwfpanel/password'); ?>" data-toggle="tooltip" data-placement="bottom" title="Change Password"><img src="<?php echo base_url(); ?>uploads/icons/password.png" style="height: 20px;width:20px;" alt="avatar"></a>
                                <a href="javascript:void(0)" onclick="logout()" data-toggle="tooltip" data-placement="bottom" title="Logout"><img src="<?php echo base_url(); ?>uploads/icons/logout.png" style="height: 20px;width:20px;" alt="avatar"></a>
                               -->

             </header>  