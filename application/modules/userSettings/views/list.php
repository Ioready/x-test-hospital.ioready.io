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
    <ul class="breadcrumb breadcrumb-top">
    <li>
        <a href="<?php echo site_url('pwfpanel');?>">Home</a>
    </li>
    <li>
        <a href="<?php echo site_url('users');?>">Users</a>
    </li>
    </ul>
    <!-- END Datatables Header -->
    
    <div class="block_list full">

    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
        <div class="block full">
            <div class="row text-center">
            
            <div class="col-sm-6 col-lg-12">
    <ul class="nav nav-pills nav-fill nav-tabss" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a href="<?php echo site_url('userSettings'); ?>" class="save-btn <?php echo (strtolower($this->router->fetch_class()) == "userSettings") ? "active" : "" ?>">
                <span class="sidebar-nav-mini-hide">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('userSettings/letterTemplate'); ?>" class="save-btn <?php echo (strtolower($this->router->fetch_class()) == "letterTemplate") ? "active" : "" ?>">
                <span class="sidebar-nav-mini-hide">Letter Templates</span>
            </a>
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab"></a>
        </li>
        <!-- <li class="nav-item">
            <a href="<?php echo site_url('userSettings/letterTemplate'); ?>" class="save-btn <?php echo (strtolower($this->router->fetch_class()) == "letterTemplate") ? "active" : "" ?>">
                <span class="sidebar-nav-mini-hide">Email Templates</span>
            </a>
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab"></a>
        </li> -->
        <li class="nav-item">
            <a href="<?php echo site_url('userSettings/consultationTemplates'); ?>" class="save-btn <?php echo (strtolower($this->router->fetch_class()) == "consultationTemplates") ? "active" : "" ?>">
                <span class="sidebar-nav-mini-hide">Consultation Templates</span>
            </a>
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab"></a>
        </li>
    </ul>
</div>

        </div>

    <?php } ?>
    <!-- Datatables Content -->
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
                    if ($menu_name == 'Patient Documents') { 
                 if ($menu_create =='1') { ?>

            <div class="block-title">
                    <!-- <?php //if ($this->ion_auth->is_subAdmin()) { ?>
                        <h2>
                            <a href="<?php //echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary"  style="background:#337ab7;">
                                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                            </a></h2>
                    <?php //}else if($this->ion_auth->is_facilityManager()){ ?> -->
                            <h2>
                            <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary"  style="background:#337ab7;">
                                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                            </a></h2>
                    <!-- <?php //} ?>  -->
            </div>


     
            <div class="row text-center">
                
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo base_url()."userSettings/index/Yes";?>" class="widget widget-hover-effect2">
                        <div class="widget-extra themed-background-dark"  style="background:#337ab7;">
                            <h4 class="widget-content-light"><strong> Activated </strong> Users</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo base_url()."userSettings/index/No";?>" class="widget widget-hover-effect2">
                        <div class="widget-extra themed-background"  style="background:#337ab7;">
                            <h4 class="widget-content-light"><strong> Inactivate </strong> Users</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    
                </div>
                <div class="col-sm-6 col-lg-3">
                    
                </div>
            </div>  

            <?php }}} } if($this->ion_auth->is_facilityManager()){ ?>

                <div class="block-title">
                    <?php if ($this->ion_auth->is_subAdmin()) { ?>
                        <h2>
                            <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary"  style="background:#337ab7;">
                                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                            </a></h2>
                    <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                            <h2>
                            <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary"  style="background:#337ab7;">
                                <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                            </a></h2>
                    <?php } ?> 
            </div>


     
            <div class="row text-center">
                
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo base_url()."userSettings/index/Yes";?>" class="widget widget-hover-effect2">
                        <div class="widget-extra themed-background-dark"  style="background:#337ab7;">
                            <h4 class="widget-content-light"><strong> Activated </strong> Users</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo base_url()."userSettings/index/No";?>" class="widget widget-hover-effect2">
                        <div class="widget-extra themed-background"  style="background:#337ab7;">
                            <h4 class="widget-content-light"><strong> Inactivate </strong> Users</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    
                </div>
                <div class="col-sm-6 col-lg-3">
                    
                </div>
            </div>  


                <?php } ?>
                
        </div>

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong>Users</strong> Panel</h2>
            <?php if ($this->ion_auth->is_admin()) {?>
                <h2>
                    <a href="<?php echo base_url() ?>users/open_model" class="btn btn-sm btn-primary" target="_blank">
                <i class="gi gi-circle_plus"></i> User
                </a></h2>
            <?php }?>
        </div>
       

        <div class="table-responsive">
        <table id="users" class="table table-vcenter table-condensed table-bordered text-cneter" style="text-align:center !important">
    <thead>
        <tr>
            <th class="text-center" style="background-color:#DBEAFF;font-size:1.3rem; "><?php echo lang('serial_no');?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem; "><?php echo "Name";?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem; "><?php echo lang('user_email');?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem; "><?php echo lang('user_createdate');?></th>
            <th style="background-color:#DBEAFF;font-size:1.3rem; "><?php echo lang('action');?></th>
        </tr>
    </thead>
</table>
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
<input type="hidden" id="UserStatus" value="<?php echo $status;?>" />



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  // Add click event listener to all td elements with class 'day-cell'
  $('.day-cell').click(function(){
    // Get time and day values from data attributes
    var time = $(this).data('time');
    var day = $(this).data('day');
    // Set hidden input values
    $('#selectedTime').val(time);
    $('#selectedDay').val(day);
    // Submit the form
    $('#timeSlotForm').submit();
  });
});
</script>
<script>
$(document).ready(function(){
  // Add click event listener to all td elements with class 'time-cell'
  $('.time-cell').click(function(){
    // Toggle 'highlight' class on click
    $(this).toggleClass('highlight');
  });

  // Add click event listener to all td elements with class 'day-cell'
  $('.day-cell').click(function(){
    // Toggle 'highlight' class on click
    $(this).toggleClass('highlight');
  });

  
});
</script>

<style>
.highlight {
    background-color: yellow; /* Change this to the desired highlight color */
  }

header h1,
header p {
  margin: 0;
}
footer {
  padding: 7vh 5vw;
  border-top: 1px solid #ddd;
}
aside {
  padding: 7vh 5vw;
}
.primary {
  overflow: auto;
  scroll-snap-type: both mandatory;
  height: 80vh;
}
@media (min-width: 40em) {
  main {
    display: flex;
  }
  aside {
    flex: 0 1 20vw;
    order: 1;
    border-right: 1px solid #ddd;
  }
  .primary {
    order: 2;
  }
}
table {
  border-collapse: collapse;
  border: 0;
}
th,
td {
  border: 1px solid #aaa;
  background-clip: padding-box;
  scroll-snap-align: start;
}
tbody tr:last-child th,
tbody tr:last-child td {
  border-bottom: 0;
}
thead {
  z-index: 1000;
  position: relative;
}
th,
td {
  padding: 0.6rem;
  min-width: 6rem;
  text-align: left;
  margin: 0;
}
thead th {
  position: sticky;
  top: 0;
  border-top: 0;
  background-clip: padding-box;
}
thead th.pin {
  left: 0;
  z-index: 1001;
  border-left: 0;
}
tbody th {
  background-clip: padding-box;
  border-left: 0;
}
tbody {
  z-index: 10;
  position: relative;
}
tbody th {
  position: sticky;
  left: 0;
}
thead th,
tbody th {
  background-color: #f8f8f8;
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('click', function() {
        checkboxes.forEach(function(cb) {
        cb.parentNode.parentNode.classList.remove('selected');
        });
        if (this.checked) {
        this.parentNode.parentNode.classList.add('selected');
        const selectedTime = this.getAttribute('data-time');
        const selectedDay = this.getAttribute('data-day');
        console.log(`Selected time: ${selectedTime}, Selected day: ${selectedDay}`);
        }
    });
    });
});
</script>



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
    .user-setting{
        background-color: antiquewhite;
        padding: 13px;
        border-radius: 5px;
        border: 1px solid #df9595;
    }

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
    /* width: 316px; */
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
    color:white;
    font-size: 1.5rem;
    padding: 0.6rem 2.25rem !important;
    background-color: #337ab7 !important;
}
.save-btn:hover{
    color:white;
    background:#00008B !important;
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




