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
                    <div class="col-md-3">
                        <button class="btn" type="search"><i class="fa fa-search" name="search-outline"></i></button>
                    </div>
                    <div class="col-md-9">
                        <input type="search" class="form-control" name="search" placeholder="Search..">
                    </div>  
                </div>

            </div>
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




