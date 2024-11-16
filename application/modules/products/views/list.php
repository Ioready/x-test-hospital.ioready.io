<!-- Page content -->
<div id="page-content"  style="background-color: whitesmoke;">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($model); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Quick Stats -->
    <div class="block_list full">


    </div>
    <!-- END Quick Stats -->
    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
        <!-- <div class="block full"> -->
            <!-- <div class="row text-center">

            <div class="col-sm-6 col-lg-12">
            
            </div> -->
                <!-- <div class="col-sm-6 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="tab-pane-second" role="tabpanel" aria-labelledby="pills-home-tab">
                                <ul class="nav nav-pills-second nav-fill nav-tab-appointment active" id="pills-tab" role="tablist">
                                    <li class="nav-item-second col-md-4 p-2">
                                        <a  style="background:#337ab7;" class="btn btn-sm btn-primary mt-2 nav-link-second new-contact save-btn" data-target="#pills-5" role="tab" href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model">New</a>
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
                </div> -->
            <!-- </div> -->
        <!-- </div> -->

    <?php } ?>
    <!-- Datatables Content -->
    <!-- Datatables Content -->

    <div class="">


            <?php 
            $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
            ?>
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
                    if ($menu_name == 'Products') { 
                        if ($menu_view =='1') { ?>

                <div class="table-responsive">
                <ul class="nav nav-pills-second nav-fill nav-tab-appointment active" id="pills-tab" role="tablist">
                                    <li class="nav-item-second col-md-4 p-2">
                                        <a  style="background:#337ab7;" class="btn btn-sm btn-primary mt-2 nav-link-second new-contact save-btn" data-target="#pills-5" role="tab" href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model">New</a>
                                    </li>
                        </ul>
                    <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;width: 40px;" class="text-center" >Sr. No</th>
                                <!--                                <th><?php echo "Referral Code"; ?></th>-->
                                <?php if($this->ion_auth->is_admin()){ ?>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;width: 150px;" class="text-center" ><?php echo "Facility Manager Name"; ?></th>
                                <?php } ?>

                                <?php //if($this->ion_auth->is_subAdmin()){ ?>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;width: 150px;" class="text-center"><?php echo "Type"; ?></th>
                                <?php //} ?>

                                <th  class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Renewal"; ?></th>

                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Name"; ?></th>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Price"; ?></th>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Product Code"; ?></th>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Serial Number"; ?></th>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Supplier"; ?></th>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Stock Level"; ?></th>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Tax"; ?></th>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Cost"; ?></th>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Comment"; ?></th>

                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Appointment Booked"; ?></th>
                                
                                
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Status"; ?></th>
                                <!-- <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 200px;"><?php echo "Date"; ?></th> -->

                                
                                <?php //if($this->ion_auth->is_facilityManager()){?>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 60px;">Created Date</th>
                               
                                <?php if($this->ion_auth->is_facilityManager()){?>
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 60px;"><?php echo lang('action'); ?></th>
                                <?php } ?>

                                
                                <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width: 70px;"><?php echo lang('action'); ?></th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 
                            $rowCount = 0;
                            foreach ($list as $rows){
                                $rowCount++;
                                ?>
                                
                                <tr>
                                
                                    <td class="text-center"><strong><?php echo $rowCount; ?></strong></td>  

                                    
                                    <td class=""><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>

                                    
                                    
                                    <td class=""><?php echo $rows->type; ?></td>
                               

                                    <td><?php echo $rows->renewal ?></td>
                                    <td><?php echo $rows->name ?></td>
                                    <td><?php echo $rows->price ?></td>
                                    <td><?php echo $rows->supplier ?></td>
                                    <td><?php echo $rows->product_code ?></td>
                                    <td><?php echo $rows->serial_number ?></td>
                                    <td><?php echo $rows->stock_level ?></td>
                                    <td><?php echo $rows->tax ?></td>
                                    <td><?php echo $rows->cost ?></td>
                                    <td><?php echo $rows->comment ?></td>
                                    <td><?php echo $rows->appointment_booked ?></td>
                                    <!-- <td><?php //echo $rows->status ?></td> -->
                                    <!-- <td></td> -->
                                    <td class="text-center"><?php $start_dateAvailability = date('Y-m-d', strtotime($rows->create_on));
                                    echo $start_dateAvailability; ?></td>
                                    
                                    <td class="actions text-center">
                                        <div class="btn-group btn-group-xs">
                                            <!-- <a href="<?php echo base_url() . 'products/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a> -->
                                                    <?php if($rows->status == 1){ ?>

                                                    
                                                    <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-danger" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Active Now"><i class="fa fa-times"></i> Inactive</a>
                                        <?php   }else {?>

                                            <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-success" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes','<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')" title="Inactive"><i class="fa fa-times"></i> Active</a>
                                            <?php   }?>
                                            </div>
                                        </td>
                                    </tr>
                                   
                                    <?php }; ?>
                        </tbody>
                    </table>

                </div>

        <?php }}}} if($this->ion_auth->is_facilityManager()){?>

            <div class="table-responsive">
            <ul class="nav nav-pills-second nav-fill nav-tab-appointment active" id="pills-tab" role="tablist">
                                    <li class="nav-item-second col-md-4 p-2">
                                        <a  style="background:#337ab7;" class="btn btn-sm btn-primary mt-2 nav-link-second new-contact save-btn" data-target="#pills-5" role="tab" href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model">New</a>
                                    </li>
                        </ul>

                        <div class="table-responsive">
    <table id="common_datatable_users" class="table table-striped table-bordered text-center align-middle">
        <thead class="table-light">
            <tr>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 40px;">Sr. No</th>

                <?php if ($this->ion_auth->is_admin()) { ?>
                    <th style="background-color:#DBEAFF; font-size:1.2rem; width: 150px;">Facility Manager Name</th>
                <?php } ?>

                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 150px;">Type</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Renewal</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Name</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Price</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Product Code</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Serial Number</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Supplier</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Stock Level</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Tax</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Cost</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Comment</th>
                <th style="background-color:#DBEAFF; font-size:1.2rem; width: 200px;">Appointment Booked</th>

                <?php if ($this->ion_auth->is_facilityManager()) { ?>
                    <th style="background-color:#DBEAFF; font-size:1.2rem; width: 150px;">Created Date</th>
                    <th style="background-color:#DBEAFF; font-size:1.2rem; width: 100px;">Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $rowCount = 0;
            foreach ($list as $rows) {
                $rowCount++;
            ?>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;"><?php echo $rowCount; ?></td>

                    <?php if ($this->ion_auth->is_admin()) { ?>
                        <td style="padding: 10px;"><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
                    <?php } ?>

                    <td style="padding: 10px;"><?php echo $rows->type; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->renewal; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->name; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->price; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->product_code; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->serial_number; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->supplier; ?></td>

                    <td style="padding: 10px;">
                        <?php if ($rows->stock_level > 0) { ?>
                            <span style="color: green;"><?php echo $rows->stock_level; ?></span>
                        <?php } else { ?>
                            <span style="color: red;"><?php echo $rows->stock_level; ?></span>
                        <?php } ?>
                    </td>

                    <td style="padding: 10px;"><?php echo $rows->tax; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->cost; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->comment; ?></td>
                    <td style="padding: 10px;"><?php echo $rows->appointment_booked; ?></td>

                    <td style="padding: 10px;"><?php echo date('Y-m-d', strtotime($rows->create_on)); ?></td>

                    <!-- Action Buttons -->
                    <td style="padding: 10px; display: flex; justify-content: center; gap: 10px; align-items: center;">
    <!-- Edit Button -->
    <a href="<?php echo base_url() . 'products/edit?id=' . encoding($rows->id); ?>"
       style="display: inline-flex; align-items: center; padding: 5px 15px; background-color: #007bff; color: #fff; border-radius: 5px; text-decoration: none; cursor: pointer; gap: 5px;">
        <i class="fa fa-pencil" style="font-size: 1.2rem;"></i> <span>Edit</span>
    </a>

    <!-- Status Button -->
    <?php if ($rows->status == 1) { ?>
        <!-- Inactive Button -->
        <a href="javascript:void(0);" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'No', '<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')"
           style="display: inline-flex; align-items: center; padding: 5px 15px; background-color: #dc3545; color: #fff; border-radius: 5px; text-decoration: none; cursor: pointer; gap: 5px;">
            <i class="fa fa-times" style="font-size: 1.2rem;"></i> <span>Inactive</span>
        </a>
    <?php } else { ?>
        <!-- Active Button -->
        <a href="javascript:void(0);" onclick="changeVendorStatus('<?php echo encoding($rows->id); ?>', 'Yes', '<?php echo $rows->first_name . ' ' . $rows->last_name; ?>')"
           style="display: inline-flex; align-items: center; padding: 5px 15px; background-color: #28a745; color: #fff; border-radius: 5px; text-decoration: none; cursor: pointer; gap: 5px;">
            <i class="fa fa-check" style="font-size: 1.2rem;"></i> <span>Active</span>
        </a>
    <?php } ?>
</td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


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
    padding: 0.6rem 2.25rem !important;
    background-color: #337ab7 !important;
}
.save-btn:hover{
    background:#00008B !important;
}



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