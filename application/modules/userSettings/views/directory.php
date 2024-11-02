<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('userSettings/letterTemplate'); ?>"><?php echo 'Letter Template'; ?></a>
        </li>
    </ul>
  
    <!-- END Quick Stats -->
    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
        <div class="block full" style="position: sticky; top: 0;">
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
        </div>
        

    <?php } ?>
    <!-- Datatables Content -->
    <!-- Datatables Content -->
    

            <div class="block full">
                <?php 
                $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                ?>

                <div class="table-responsive">          
                    <div>
                        <div class="col-md-12">
                            <label for="">
                                <h2>
                            <strong> Letter templates </strong> 
                                </h2>
                            </label>
                        </div>
                        <br>
                            <div class="col-md-12">
                                Letter templates are the building blocks of your letter. You can use them in combination when creating a patient letter.

                                <br><br>
                    </div>   

                    <div class="col-md-12">   
                        <div class="col-md-11" style="box-shadow: 0px 1px 4px 0px; padding: 16px;">
                            <strong>Set paragraph spacing</strong>
                            <label for="">
                            Changes you make here will affect any new letters and letter templates you create, or any new changes you make to existing ones. 
                            They will not be applied retrospectively.</label>
                            
                                <div class="row">
                                    <div class="col-md-2">
                                    <strong>Paragraph</strong>
                                    </div>
                                        <div class="col-md-4">
                                        
                                            <select class="form-control selectpicker" data-live-search="true" data-container="body">
                                            <option data-tokens="Single Line Spacing" value="single_line_spacing">Single Line Spacing</option>
                                            <option data-tokens="Double Line Spacing" value="double_line_spacing">Double Line Spacing</option>
                                            </select>
                                        </div>
                                </div>
                        </div>  
                    </div>


                    <div class="col-md-12">
    <div class="main">
        <!-- Actual search box -->
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </div>
</div> 

                    
                    

                </div>  

            </div>
        
            </div>

   




            
            <div class="block full">
    <?php 
    $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    ?>
    <div class="">  
        <div class="row">
            <div class="col-md-1 mt-4">
                <img src="<?php echo base_url(); ?>uploads/icons/business.png" style="height:50px;width:60px;" alt="avatar"> 
            </div> 
            <div class="col-md-8">
                <div>
                    <div class="col-md-12">
                        <label for="">
                            <h2><strong> Headers </strong></h2>
                        </label>
                    </div>
                    <br>
                    <div class="col-md-12">
                        Headers appear at the top of every page and usually include addresses and logos.
                    </div>   
                </div> 
            </div>
            <div class="col-md-3 mt-4">
                <a href="<?php echo site_url('userSettings/header'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "directory") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">
                    <button type="button" class="btn btn-primary save-btn"><i class="fa fa-solid fa-plus"></i> New Headers</button>
                </span></a>
                <div class="header-toggle">
                    <span class="arrow"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="header_content">    
                    <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Sn.</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Name</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Created On</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Updated On</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Status</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($header_list)) {
                                $rowCount = 0;
                                foreach ($header_list as $rows) {
                                    $rowCount++;     
                            ?>
                                <tr>
                                    <td><?php echo $rowCount; ?></td>
                                    <td><?php echo $rows->internal_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->updated_on)); ?></td>
                                    <td>
                                        <?php if($rows->status == 0): ?>
                                            <button type="button" class="btn btn-default" style="color:green">Active</button>
                                        <?php else: ?>
                                            Inactive
                                        <?php endif; ?>
                                        
                                    </td>
                                    <td class="actions">
                                    <a href="<?php echo base_url() . 'userSettings/editHeader?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                                $rowCount = 0;
                                foreach ($header_list as $rows) :
                                    $rowCount++;
                            ?>
                                <tr>
                                    <td><?php echo $rowCount; ?></td>
                                    <td><?php echo $rows->internal_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->updated_on)); ?></td>
                                    <td><?php echo $rows->status; ?></td>
                                    <td class="actions">
                                    <a href="<?php echo base_url() . 'userSettings/editHeader?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                            <?php
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block full">
    <?php 
    $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    ?>
    <div class="">  
        <div class="row">
            <div class="col-md-1 mt-4">
                <img src="<?php echo base_url(); ?>uploads/icons/business.png" style="height:50px;width:60px;" alt="avatar"> 
            </div> 
            <div class="col-md-8 ">
                <div>
                    <div class="col-md-12">
                        <label for="">
                            <h2><strong> Bodies </strong></h2>
                        </label>
                    </div>
                    <br>
                    <div class="col-md-12">
                        Document content that is often the same. These can be pulled into the main body of the document and edited if required. You can insert as many bodies as you need into your letters.
                    </div>   
                </div> 
            </div>
            <div class="col-md-3 mt-4">
                <a href="<?php echo site_url('userSettings/bodies'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "directory") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">
                    <button type="button" class="btn btn-primary save-btn"><i class="fa fa-solid fa-plus"></i> New Bodies</button>
                </span></a>
                <div class="body-toggle ">
                    <span class="arrow"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="body_content">    
                    <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Sn.</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Name</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Created On</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Updated On</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Status</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($body_list)) {
                                $rowCount = 0;
                                foreach ($body_list as $rows) {
                                    $rowCount++;     
                            ?>
                                <tr>
                                    <td><?php echo $rowCount; ?></td>
                                    <td><?php echo $rows->internal_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->updated_on)); ?></td>
                                    <td>
                                        <?php if($rows->status == 0): ?>
                                            <button type="button" class="btn btn-default" style="color:green">Active</button>
                                        <?php else: ?>
                                            Inactive
                                        <?php endif; ?>
                                    </td>
                                    <td class="actions">
                                    <a href="<?php echo base_url() . 'userSettings/editBody?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                    
                                        <!-- Action buttons -->
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                                $rowCount = 0;
                                foreach ($body_list as $rows) :
                                    $rowCount++;
                            ?>
                                <tr>
                                    <td><?php echo $rowCount; ?></td>
                                    <td><?php echo $rows->internal_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->updated_on)); ?></td>
                                    <td><?php echo $rows->status; ?></td>
                                    <td class="actions">
                                        <!-- Action buttons -->
                                        <a href="<?php echo base_url() . 'userSettings/editBody?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                
                                    </td>
                                </tr>
                            <?php
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block full">
    <?php 
    $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    ?>

    <div class="">  
        <div class="row">
            <div class="col-md-1 mt-4">
                <img src="<?php echo base_url(); ?>uploads/icons/business.png" style="height:50px;width:60px;" alt="avatar"> 
            </div> 
            <div class="col-md-7">
                <div>
                    <div class="col-md-12">
                        <label for="">
                            <h2><strong> Recipients block </strong></h2>
                        </label>
                    </div>
                    <br>
                    <div class="col-md-12">
                        Set up placeholders to automatically display information for all the recipients that have been copied into your letter.
                    </div>   
                </div> 
            </div>
            <div class="col-md-4 mt-4">
                <a href="<?php echo site_url('userSettings/recipients'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "directory") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">
                    <button type="button" class="btn btn-sm btn-primary  save-btn"><i class="fa fa-solid fa-plus"></i> New Recipients block</button>
                </span></a>
                <div class="rec-toggle">
                    <span class="arrow"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="rec_content">    
                    <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Sn.</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Name</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Created On</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Updated On</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Status</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($recipients_list)) {
                                $rowCount = 0;
                                foreach ($recipients_list as $rows) {
                                    $rowCount++;     
                            ?>
                                <tr>
                                    <td><?php echo $rowCount; ?></td>
                                    <td><?php echo $rows->internal_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->updated_on)); ?></td>
                                    <td>
                                        <?php if($rows->status == 0): ?>
                                            <button type="button" class="btn btn-default" style="color:green">Active</button>
                                        <?php else: ?>
                                            Inactive
                                        <?php endif; ?>
                                    </td>
                                    <td class="actions">
                                    <a href="<?php echo base_url() . 'userSettings/editRecipients?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                
                                        <!-- Action buttons -->
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                                $rowCount = 0;
                                foreach ($recipients_list as $rows) :
                                    $rowCount++;
                            ?>
                                <tr>
                                    <td><?php echo $rowCount; ?></td>
                                    <td><?php echo $rows->internal_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->updated_on)); ?></td>
                                    <td><?php echo $rows->status; ?></td>
                                    <td class="actions">
                                    <a href="<?php echo base_url() . 'userSettings/editRecipients?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                
                                        <!-- Action buttons -->
                                    </td>
                                </tr>
                            <?php
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="block full">
    <?php 
    $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    ?>

    <div class="">  
        <div class="row">
            <div class="col-md-1 mt-4">
                <img src="<?php echo base_url(); ?>uploads/icons/business.png" style="height:50px;width:60px;"  alt="avatar"> 
            </div> 
            <div class="col-md-8">
                <div>
                    <div class="col-md-12">
                        <label for="">
                            <h2><strong> Footers </strong></h2>
                        </label>
                    </div>
                    <br>
                    <div class="col-md-12">
                        Footers appear at the bottom of every page. They might have a secondary logo and an address.
                    </div>   
                </div> 
            </div>
            <div class="col-md-3 mt-4">
                <a href="<?php echo site_url('userSettings/footer'); ?>" class="<?php echo (strtolower($this->router->fetch_class()) == "directory") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">
                    <button type="button" class="btn btn-primary save-btn"><i class="fa fa-solid fa-plus"></i> New Footers</button>
                </span></a>
                <div class="footer-toggle">
                    <span class="arrow"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="footer_content">    
                    <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Sn.</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Name</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Created On</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Updated On</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Status</th>
                                <th style="background-color:#DBEAFF;font-size:1.3rem;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($footer_list)) {
                                $rowCount = 0;
                                foreach ($footer_list as $rows) {
                                    $rowCount++;     
                            ?>
                                <tr>
                                    <td><?php echo $rowCount; ?></td>
                                    <td><?php echo $rows->internal_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->updated_on)); ?></td>
                                    <td>
                                        <?php if($rows->status == 0): ?>
                                            <button type="button" class="btn btn-default" style="color:green">Active</button>
                                        <?php else: ?>
                                            Inactive
                                        <?php endif; ?>
                                    </td>
                                    <td class="actions">
                                    <a href="<?php echo base_url() . 'userSettings/editFooters?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                
                                        <!-- Action buttons -->
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                                $rowCount = 0;
                                foreach ($footer_list as $rows) :
                                    $rowCount++;
                            ?>
                                <tr>
                                    <td><?php echo $rowCount; ?></td>
                                    <td><?php echo $rows->internal_name; ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->created_on)); ?></td>
                                    <td><?php echo date('m/d/Y', strtotime($rows->updated_on)); ?></td>
                                    <td><?php echo $rows->status; ?></td>
                                    <td class="actions">
                                    <a href="<?php echo base_url() . 'userSettings/editFooters?id=' . encoding($rows->id); ?>" data-toggle="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                
                                        <!-- Action buttons -->
                                    </td>
                                </tr>
                            <?php
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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

</script>

<style>
    .main {
    width: 80%;
    margin: 50px auto;
}

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
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
    background:none;
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

<script>
$(document).ready(function() {
    $('.header-toggle').click(function() {
        $(this).find('.arrow').toggleClass('up');
        $('.header_content').slideToggle();
    });


    $('.body-toggle').click(function() {
        $(this).find('.arrow').toggleClass('up');
        $('.body_content').slideToggle();
    });

    $('.rec-toggle').click(function() {
        $(this).find('.arrow').toggleClass('up');
        $('.rec_content').slideToggle();
    });

    $('.footer-toggle').click(function() {
        $(this).find('.arrow').toggleClass('up');
        $('.footer_content').slideToggle();
    });

});


</script>
<style>
    .header_content {
    display: none;
    padding-top: 44px;
    /* Your content styles */
}
    .header-toggle{
        float: inline-end;
    }
    .body_content {
    display: none;
    padding-top: 44px;
    /* Your content styles */
}
    .body-toggle{
        float: inline-end;
    }

    .rec_content {
    display: none;
    padding-top: 44px;
    /* Your content styles */
}
    .rec-toggle{
        float: inline-end;
    }

    .footer_content {
    display: none;
    padding-top: 44px;
   
}
    .footer-toggle{
        float: inline-end;
    }

    .arrow {
    display: inline-block;
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-bottom: 5px solid black;
    margin-right: 5px;

}
.arrow.up {
    border-bottom: none;
    border-top: 5px solid black;
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






