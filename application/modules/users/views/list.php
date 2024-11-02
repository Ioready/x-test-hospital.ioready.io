<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <!-- <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-user"></i>Users<br><small>Users listing</small>
            </h1>
        </div>
    </div> -->
    <!-- <ul class="breadcrumb breadcrumb-top" >
    <li>
        <a href="<?php echo site_url('pwfpanel');?>">Home</a>
    </li>
    <li>
        <a href="<?php echo site_url('users');?>">Users</a>
    </li>
    </ul> -->
    <ul  class="breadcrumb breadcrumb-top" >
    <li style="display: inline-block; ">
        <a href="<?php echo site_url('pwfpanel');?>" style="text-decoration: none; color:black;">Home</a>
    </li>
    <li style="display: inline-block;">
        <a href="<?php echo site_url('users');?>" style="text-decoration: none; color:black;font-weight:bold;">Users</a>
    </li>
</ul>

    <!-- END Datatables Header -->





    <div class="block_list full">
    <div class="row text-center">
        
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="<?php echo base_url()."users/index/Yes";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 10px; ">
                <div class="widget-extra themed-background-dark"   style="background:#337ab7;">
                    <h4 style="font-size:14px; font-weight:600; color:white;">Activated Users</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="<?php echo base_url()."users/index/No";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Inactive Users</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <!-- Add content for the third column if needed -->
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <!-- Add content for the fourth column if needed -->
        </div>
    </div>
</div>





    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title" >
            <h2 class="fw-bold text-dark">Users Panel</h2>
            <?php if ($this->ion_auth->is_admin()) {?>
                <h2>
                    <a href="<?php echo base_url() ?>users/open_model" class="btn btn-sm btn-primary" target="_blank">
                <i class="gi gi-circle_plus"></i> User 
                </a></h2>
            <?php }?>
            <?php if ($this->ion_auth->is_subAdmin()) {?>
                <h2>
                    <a href="<?php echo base_url() ?>users/open_model"   class="btn btn-sm btn-primary" style="background:#337ab7;"  target="_blank">
                <i class="gi gi-circle_plus"></i> User
                </a></h2>
            <?php }?>
            <?php if ($this->ion_auth->is_facilityManager()) {?>
                <h2>
                    <a href="<?php echo base_url() ?>users/open_model"  class="btn btn-sm btn-primary" style="background:#337ab7;" target="_blank">
                <i class="gi gi-circle_plus"></i> User
                </a></h2>
            <?php }?>
        </div>
       

        <div class="table-responsive" >





        <table id="users" class="table table-vcenter table-condensed table-bordered" style="background-color: #F0F8FF !important; text-align: center !important">
    <thead>
        <tr>
            <th style="background-color:#DBEAFF;font-size:1.3rem; text-align: center !important;"><?php echo lang('serial_no');?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem; text-align: center;"><?php echo "Name";?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem; text-align: center;"><?php echo lang('user_email');?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem; text-align: center;"><?php echo lang('user_createdate');?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem; text-align: center;"><?php echo lang('action');?></th>
        </tr>
    </thead>
</table>





            <!-- <table id="users" class="table table-vcenter table-condensed table-bordered"> -->
                <!-- <thead > -->
                    <!-- <tr > -->

                        
            <!-- <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('serial_no');?></th> -->
            <!-- <th class="text-center"><?php echo "Team Code";?></th> -->
            <th style="background-color:#DBEAFF;font-size:1.3rem" class="text-center"><?php echo "Name";?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('user_email');?></th>
<!--            <th style="background-color:#DBEAFF;font-size:1.3rem" class="text-center"><?php echo "Phone";?></th>-->
            <!-- <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo "Total purchase amount";?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo "Total deposit amount";?></th>
             <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo "Total amount due";?></th> -->
<!--                                <th><?php echo lang('profile_image');?></th>-->
<!--             <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('status');?></th>-->
            <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('user_createdate');?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('action');?></th>
                    </tr>
                </thead>
              
            <!-- </table> -->
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
<input type="hidden" id="UserStatus" value="<?php echo $status;?>" />

<style>
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