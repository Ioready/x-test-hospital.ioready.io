<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($model); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
  
    <!-- END Quick Stats -->
    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager()) { ?>
                  <div class="block full">
                      <div class="row text-center">
                            <div class="col-sm-6 col-lg-12">
                            </div>
                            <div class="col-sm-6 col-lg-12">
                                <div class="panel panel-default">
                      
                                    <div style="margin: 0px 0px 20px 16px;">
                                         <ul class="nav nav-pills nav-fill nav-tabss" id="pills-tab" role="tablist" >
                                            <li class="nav-item">
                                            <a href="<?php echo site_url('contactus'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "contactus") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">Practice Contacts</span></a>
                                               
                                            </li>
                                            <li class="nav-item">
                                            <a href="<?php echo site_url('contactus/directory'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "directory") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">Directory</span></a>
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab"></a>
                                            </li>
                                        </ul>
                                    </div> 
                                </div> 
                            <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        

    <?php } ?>
    <!-- Datatables Content -->
    <!-- Datatables Content -->
    <div class="block full">

       
        <?php 
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        ?>

        <div class="table-responsive">          
            <div style="background-color:#b4bdb4;">
                <div class="col-md-1">
                    <span class="help-block m-b-none col-md-offset-3"> <i class="fa fa-question-circle" style="font-size:22px;"></i></span>
                </div>
                <div class="col-md-8">
                     You can&apos;t directly add a GP Practice to your Practice contacts. However you can search the directory and manually add the information.
                </div>
            </div>
        </div><br>
                <div>
                <div class="col-md-12">
                    <label for="">
                        <h2>
                    <strong> Search for an NHS GP Practice </strong> 
                        </h2>
                    </label>
                </div>
            <br>
                <div class="col-md-12">
                You can search using a postcode, practice name, phone number, email or website.

                <br><br>
                </div>            

                <div class="input-group" style="border: 1px solid; border-radius: 6px;">
                    <div class="col-md-1">
                        <button class="btn" type="search"><i class="fa fa-search" name="search-outline"></i></button>
                    </div>
                    <div class="col-md-11">
                        <input type="search" class="form-control" name="search" placeholder="Search..">
                    </div>  
                </div>

            </div>
        </div>

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
                        <!-- <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;">Created Date</th> -->
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;"><?php echo lang('action'); ?></th>
                        <?php }else if($this->ion_auth->is_admin()){ ?>
                        <!-- <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;">Query Date</th> -->
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;"><?php echo lang('action'); ?></th>
                        <?php } ?>
                        <?php if($this->ion_auth->is_facilityManager()){?>
                            <!-- <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;">Created Date</th> -->
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:70px;"><?php echo lang('action'); ?></th>
                        <?php } ?>

                        <?php if($this->ion_auth->is_subAdmin()){?>
                            <!-- <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;">Created Date</th> -->
                        <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem;width:60px;"><?php echo lang('action'); ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($this->ion_auth->is_admin()){
                    if (isset($list) && !empty($list)):
                        $rowCount = 0;
                        foreach ($list as $rows):
                            $rowCount++;
                            ?>
                            <?php if($LoginID == 1){ ?>
                            <tr>
                            
                                <td class="text-center "><strong><?php echo $rowCount; ?></strong></td> 
                                <?php if($this->ion_auth->is_admin()){ ?> 
                                <td class=""><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>
                                <?php } ?>
                                <td><?php echo $rows->title ?></td>
                                <td><?php echo $rows->description ?></td>
                                <td class="text-center"><?php echo date('m/d/Y', $rows->create_date); ?></td>
                        
                                <?php if ($this->ion_auth->is_facilityManager()) { ?>
                                <td class="actions text-center" >
                                    <div class="btn-group btn-group-xs">
                                        <a href="<?php echo base_url() . 'contactus/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        
                                            
                                         <!-- <a href="<?php echo base_url() . 'vendors/paymentList/' . $rows->id; ?>" class="btn btn-sm btn-primary">Client List</a> -->
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php
                            }endforeach;
                    endif;
                }else{
                    $rowCount = 0;
                    foreach ($list as $rows){
                        $rowCount++;
                        ?>
                        
                        <tr>
                        
                            <td class="text-center "><strong><?php echo $rowCount; ?></strong></td>  

                            <?php //if($this->ion_auth->is_admin()){ ?>

                            <td class=""><?php echo $rows->first_name . ' ' . $rows->last_name; ?></td>

                            <?php //} ?>
                            
                            <?php if($this->ion_auth->is_subAdmin()){ ?>
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
                            <?php if ($this->ion_auth->is_facilityManager() || $this->ion_auth->is_subAdmin()) { ?>

                            <td class="actions text-center" >
                                <div class="btn-group btn-group-xs">
                                    <a href="<?php echo base_url() . 'contactus/edit?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url() . 'contactus/view?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                    
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
                                        <!-- <a href="<?php echo base_url() . 'vendors/paymentList/' . $rows->id; ?>" class="btn btn-sm btn-primary">Client List</a> -->
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php
                        }};
             
                    ?>
                </tbody>
            </table>
        </div>
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




