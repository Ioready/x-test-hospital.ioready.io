<!-- Page content -->
<div id="page-content"  style="background-color: whitesmoke;">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
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
                    if ($menu_name == 'Communication') { 
                       if ($menu_create =='1') {
            ?>
        <li>
            <a href="<?php echo site_url($model); ?>"><?php echo $title; ?></a>
        </li>
        <?php }}}} if($this->ion_auth->is_facilityManager()){?>
            <li>
            <a href="<?php echo site_url($model); ?>"><?php echo $title; ?></a>
        </li>
        <?php } ?>
    </ul>
    <!-- END Datatables Header -->

    <!-- Quick Stats -->
    <div class="block_list full">

    </div>
    <!-- END Quick Stats -->
    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
        
        <div class="block full">
            <div class="row text-center">
            

                <div class="col-sm-6 col-lg-12">

                
                </div>
              
        <div class="col-sm-6 col-lg-12">
            <div class="panel panel-default">
                <ul class="nav nav-pills nav-fill nav-tabss mt-4" id="pills-tab" role="tablist" >
                    <li class="nav-item">
                    <a href="<?php echo site_url('contactus'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contactus") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">Practice Contacts</span></a>
                        <!-- <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab">Practice Contacts</a> -->
                    </li>
                    <li class="nav-item">
                    <a href="<?php echo site_url('contactus/directory'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "directory") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">Directory</span></a>
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab"></a>
                    </li>
                </ul>

        <div class="panel-body">
            <div class="tab-pane-second" role="tabpanel" aria-labelledby="pills-home-tab">
             <ul class="nav nav-pills-second nav-fill nav-tab-appointment active" id="pills-tab" role="tablist">
                    <li class="nav-item-second col-md-4 p-2">
                        <a style="background:#337ab7;" class="btn btn-sm btn-primary mt-2 nav-link-second new-contact save-btn" data-target="#pills-5" role="tab" href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model">New</a>
                    </li>
                    <li class="input-group col-md-4 p-2">
                        <div class="form-group"> 
                            <select class="form-control" id="companySelect">
                                <option value="company1">Company</option>
                                <option value="first_name">First Name</option>
                                <option value="last_name">Last Name</option>
                            </select>
                        </div>
                    </li>
                    <li class="input-group col-md-4 p-2">
                    <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
        </div>
           </li>
                </ul>
            </div>
        </div> 
    </div>
</div>

            </div>
        </div>

    <?php } ?>
    <!-- Datatables Content -->
    <!-- Datatables Content -->
    <div class="block full">
        <!-- <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
            <?php if ($this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            

            <?php } else if($this->ion_auth->is_subAdmin()){?>
                <h2>
                    
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>

                <?php } ?>
        </div> -->

        
        <?php   $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>

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
                    if ($menu_name == 'Contacts') { 
                       if ($menu_view =='1') {
            ?>

        <div class="table-responsive">
            <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 40px;">Sr. No</th>
                        <!--                                <th><?php echo "Referral Code"; ?></th>-->
                        <?php if($this->ion_auth->is_admin()){ ?>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 150px;"><?php echo "Facility Manager Name"; ?></th>
                        <?php } ?>

                        <?php if($this->ion_auth->is_subAdmin() or $this->ion_auth->is_all_roleslogin()){ ?>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 150px;"><?php echo "Full Name"; ?></th>
                        <?php } ?>

                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Title"; ?></th>

                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Company"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Clinician"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Comment"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Phone Type"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Phone Number"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Email"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Address Lookup"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Streem Address"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "City"; ?></th>

                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Post Code"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Country"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Billing Detail"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Payment Reference"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "System"; ?></th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Health Code"; ?></th>
                        
                        <?php if($this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()){?>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;">Created Date</th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;"><?php echo lang('action'); ?></th>
                        <?php }else if($this->ion_auth->is_admin()){ ?>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;">Query Date</th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;"><?php echo lang('action'); ?></th>
                        <?php } ?>
                        <?php if($this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()){?>
                            <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;">Created Date</th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:70px;"><?php echo lang('action'); ?></th>
                        <?php } ?>

                        <?php if($this->ion_auth->is_subAdmin() or $this->ion_auth->is_all_roleslogin()){?>
                            <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;">Created Date</th>
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;"><?php echo lang('action'); ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rowCount = 0;
                    foreach ($list as $rows){
                        $rowCount++;
                        ?>
                        
                        <tr>
                        
                            <td class="text-center "><strong><?php echo $rowCount; ?></strong></td>  

                            <?php if($this->ion_auth->is_admin()){ ?>

                            <td class=""><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>

                            <?php } ?>
                            
                            <?php if($this->ion_auth->is_subAdmin() or $this->ion_auth->is_all_roleslogin()){ ?>
                            <td class=""><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
                            <?php } ?>

                            <td><?php echo $rows->title ?></td>
                            <td><?php echo $rows->company ?></td>
                            <td><?php echo $rows->contacts_clinician ?></td>
                            <td><?php echo $rows->comment ?></td>
                            <td><?php echo $rows->phone_type ?></td>
                            <td><?php echo $rows->phone_number ?></td>
                            <td><?php echo $rows->user_email ?></td>
                            <td><?php echo $rows->address_lookup ?></td>
                            <td><?php echo $rows->streem_address ?></td>
                            <td><?php echo $rows->city ?></td>
                            <td><?php echo $rows->post_code ?></td>
                            <td><?php echo $rows->country ?></td>
                            <td><?php echo $rows->billing_detail ?></td>
                            <td><?php echo $rows->payment_reference ?></td>
                            <td><?php echo $rows->System ?></td>
                            <td><?php echo $rows->healthcode ?></td>
                           
                            <td class="text-center"><?php echo date('m/d/Y', $rows->create_at); ?></td>
                            <?php if ($this->ion_auth->is_facilityManager() || $this->ion_auth->is_subAdmin() || $this->ion_auth->is_all_roleslogin()) { ?>

                            <td class="actions text-center" >
                                <div class="btn-group btn-group-xs">
                                    <a href="<?php echo base_url() . 'contactus/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                    
                                        <?php
                                        if ($rows->id != '') {
                                            if ($rows->is_active == 1) {
                                                ?>
                                                                            <!--                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="statusFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>')" title="Inactive Now"><i class="fa fa-check"></i></a>-->
                                            <?php } else { ?>
                                                                            <!--                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="statusFn('<?php echo USERS; ?>', 'id', '<?php echo encoding($rows->id); ?>', '<?php echo $rows->is_active; ?>')" title="Active Now"><i class="fa fa-times"></i></a>-->
                                                <?php
                                            }
                                            if ($rows->is_active == 1) {
                                                ?>
                                                <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Inactive Now"><i class="fa fa-check"></i> Active</a>
                                            <?php } else { ?>
                                             <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Active Now"><i class="fa fa-times"></i> Inactive</a>
                                            <?php } ?>
                                            <a href="javascript:void(0)" style="margin-left: 10px;" data-toggle="tooltip"  class="btn btn-danger" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>', 'contactus', 'contactus/delVendors','<?php echo 'this entry' ?>')"><i class="fa fa-trash"></i></a>
                                       
                                       <?php }
                                        ?>
                                        <a href="<?php echo base_url() . 'vendors/paymentList/' . $rows->id; ?>" class="btn btn-sm btn-primary">Client List</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php
                        // }
                    };
             
                    ?>
                </tbody>
            </table>
        </div>

        <?php }}}} if($this->ion_auth->is_facilityManager()){?>
            <div class="table-responsive">
            <table id="common_datatable_users"class="table-bordered"  style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
    <thead>
        <tr style="background-color: #DBEAFF;">
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 40px; border-bottom: 2px solid #ccc;">Sr. No</th>

            <?php if ($this->ion_auth->is_admin()) { ?>
                <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 150px; border-bottom: 2px solid #ccc;">Facility Manager Name</th>
            <?php } ?>

            <?php if ($this->ion_auth->is_subAdmin() || $this->ion_auth->is_all_roleslogin()) { ?>
                <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 150px; border-bottom: 2px solid #ccc;">Full Name</th>
            <?php } ?>

            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Title</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Company</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Clinician</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Comment</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Phone Type</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Phone Number</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Email</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Address Lookup</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Street Address</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">City</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Post Code</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Country</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Billing Detail</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Payment Reference</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">System</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 200px; border-bottom: 2px solid #ccc;">Health Code</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 60px; border-bottom: 2px solid #ccc;">Created Date</th>
            <th style="text-align: center; padding: 10px; font-size: 1.3rem; width: 60px; border-bottom: 2px solid #ccc;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $rowCount = 0;
        foreach ($list as $rows):
            $rowCount++;
        ?>
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 10px; text-align: center;"><?php echo $rowCount; ?></td>
            <td style="padding: 10px;"><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
            <td style="padding: 10px;"><?php echo $rows->title; ?></td>
            <td style="padding: 10px;"><?php echo $rows->company; ?></td>
            <td style="padding: 10px;"><?php echo $rows->contacts_clinician; ?></td>
            <td style="padding: 10px;"><?php echo $rows->comment; ?></td>
            <td style="padding: 10px;"><?php echo $rows->phone_type; ?></td>
            <td style="padding: 10px;"><?php echo $rows->phone_number; ?></td>
            <td style="padding: 10px;"><?php echo $rows->user_email; ?></td>
            <td style="padding: 10px;"><?php echo $rows->address_lookup; ?></td>
            <td style="padding: 10px;"><?php echo $rows->streem_address; ?></td>
            <td style="padding: 10px;"><?php echo $rows->city; ?></td>
            <td style="padding: 10px;"><?php echo $rows->post_code; ?></td>
            <td style="padding: 10px;"><?php echo $rows->country; ?></td>
            <td style="padding: 10px;"><?php echo $rows->billing_detail; ?></td>
            <td style="padding: 10px;"><?php echo $rows->payment_reference; ?></td>
            <td style="padding: 10px;"><?php echo $rows->System; ?></td>
            <td style="padding: 10px;"><?php echo $rows->healthcode; ?></td>
            <td style="padding: 10px; text-align: center;"><?php echo date('m/d/Y', $rows->create_at); ?></td>
            <td style="padding: 10px; text-align: center; display: flex; justify-content: center; gap: 10px; align-items: center;">
    <!-- Edit Button -->
    <a href="<?php echo base_url() . 'contactus/edit?id=' . encoding($rows->id); ?>"
       style="padding: 8px 12px; background-color: #007bff; color: #fff; border-radius: 5px; text-decoration: none; display: flex; align-items: center; cursor: pointer;">
        <i class="fa fa-pencil" style="margin-right: 5px;"></i> Edit
    </a>

    <!-- Delete Button -->
    <a href="javascript:void(0);" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($rows->id); ?>')"
       style="padding: 8px 12px; background-color: #dc3545; color: #fff; border-radius: 5px; text-decoration: none; display: flex; align-items: center; cursor: pointer;">
        <i class="fa fa-trash" style="margin-right: 5px;"></i> Delete
    </a>
</td>


        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        </div>
            <?php }?>

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
.save-btn{
    font-weight:700;
    font-size: 1.5rem;
    padding: 0.6rem 2.25rem !important;
    background-color: #337ab7 !important;
}
.save-btn:hover{
    background:#00008B !important;
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




