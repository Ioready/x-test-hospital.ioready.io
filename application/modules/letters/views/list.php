<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <!-- <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($model); ?>"><?php echo $title; ?></a>
        </li>
    </ul> -->

    
    <div class="block_list full">
    <div class="row text-center">
        
        <div class="col-sm-6 col-lg-2 mb-4">
            <a href="<?php echo base_url()."careUnit/";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 10px; ">
                <div class="widget-extra themed-background-dark"   style="background:#337ab7;">
                    <h4 style="font-size:14px; font-weight:600; color:white;">Department</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4">
            <a href="<?php echo base_url()."letters";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Letters</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
       
        <!-- <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."invoices";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">invoices</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div> -->


        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."initialDx";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Diagnosis</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>


        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."initialRx";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Antibiotic</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."precautions";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Precautions</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."cultureSource";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Lab</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url()."organism";?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">organism</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
        
        
        
    </div>


   
    <!-- END Quick Stats -->
    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) { ?>
        

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
                    if ($menu_name == 'Letters') { 
                        if ($menu_create =='1') {
                     ?>

          <div class="block-title">
            <?php //if ($this->ion_auth->is_subAdmin()) { ?>
                <h2>
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/add_new_template" class="btn btn-sm save-btn">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
           
                
          </div>

         
        <div class="block-title">
            <!-- <h2><strong><?php echo 'Users';?></strong> Panel</h2> -->
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
            <!-- <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
            </div> -->
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
            
                                <div class="col-md-12">
                                <h2>Letters Templates List</h2>
                            <form id="timeSlotForm" action="submit.php" method="post">
                                    
                            
                            <!-- </div> -->
                             <!-- <input type="date" id="date" name="date" class="form-control" required> -->
                            </div>
                            
                        </div>
                    </div>

                     <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <label class="col-md-3 control-label">Doctor Name:</label> -->
                            <div class="col-md-9">
                           
                        <input type="hidden" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo $userData->id; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" >
                   
                    <div class="space-22"></div>
                </div>
            </div>
            <div class="text-right">
                <!-- <button type="submit" id="submit" class="btn btn-sm btn-primary" >Save</button> -->
            </div>
            
        </form>

        <?php } if ($menu_view =='1'){ ?>
            <div class="col-sm-12"> 
                         
                         <div class="table-responsive" >
                         

                             <table id="appointmentTable" class="table table-bordered table-hover align-middle text-center">
                         
        <!-- <div class="table-responsive"> -->
            <!-- <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered"> -->
            
            <thead>
                    <tr>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;width:10px;" >Sr. No</th>
                        <th  style="background-color:#DBEAFF;font-size:1.3rem;">Header Name</th>
                        <th  style="background-color:#DBEAFF;font-size:1.3rem;">Header logo</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;">Bodies</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;">Recipients</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;">Footer</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    
                    if (!empty($template_list)) {
                        $rowCount = 0;
                        foreach ($template_list as $rows) {
                            $rowCount++;
                            // print_r($rows->bodies_template);
                            if(!empty($rows->header_internal_name)){
                    ?>
                           

                            <tr>
                                <td><?php echo $rowCount; ?></td>
                                <td><?php echo $rows->header_internal_name; ?></td>
                                <?php $image_url = base_url('/uploads/'); ?>
                                <td><img width="100px;" src="<?php echo $image_url.$rows->header_logo; ?>" alt="header"></td>
                                <td><?php echo $rows->bodies_template; ?></td>
                                <td><?php echo $rows->recipient_template; ?></td>
                               
                                
                                <td><?php echo $rows->footer_internal_name; ?><img width="100px;" src="<?php echo $image_url.$rows->logo; ?>" alt="footer"></td>
                                <td class="actions">
                                <?php if ($menu_create =='1'){ ?>
                                    <h3>
                                        <a href="javascript:void(0)" onclick="generateTemplate('<?php echo $rows->id; ?>')" class="btn btn-sm save-btn">Generate Template</a>
                                    </h3>
                                    <?php } ?>
                                    <?php  //print_r($rows->bodies_template);?>
                                    <!-- Hidden form -->
                                    <form id="templateForm_<?php echo $rows->id; ?>" style="display: none;">
                                        <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                                        <input type="hidden" name="internal_name" value="<?php echo $rows->header_internal_name; ?>">
                                        <input type="hidden" name="header_logo" value="<?php echo $rows->header_logo; ?>">
                                        <textarea name="bodies_templatess" id="bodies_templatess" value="<?php echo $rows->bodies_template; ?>"></textarea>
                                        <textarea name="recipient_template" id="recipient_template" value="<?php echo $rows->recipient_template; ?>"></textarea>
                                        <!-- <input type="text" name="bodies_templatess" value="<?php echo $rows->bodies_template; ?>"> -->
                                        <!-- <input type="hidden" name="recipient_template" value="<?php echo $rows->recipient_template; ?>"> -->
                                        <input type="hidden" name="logo" value="<?php echo $rows->logo; ?>">
                                        <!-- Add other hidden fields if needed -->
                                    </form>
                                </td>
                            </tr>

                        <?php
                        }
                        
                    }
                   
                    
                    }
                    ?>

                </tbody>
            </table>
            </div>
        </div>

        <?php }}}} if($this->ion_auth->is_facilityManager()){?>


            <div class="block-title">
            <?php if ($this->ion_auth->is_subAdmin()) { ?>
                <h2>
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/add_new_template" class="btn btn-sm save-btn">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                    <h2>
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/add_new_template" class="btn btn-sm save-btn">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
                <?php } ?>
          </div>

        <div class="block-title">
            <!-- <h2><strong><?php echo 'Users';?></strong> Panel</h2> -->
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
            <!-- <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
            </div> -->
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
            
                                <div class="col-md-12">
                                <h2>Letters Templates List</h2>
                            <form id="timeSlotForm" action="submit.php" method="post">
                                    
                            
                            <!-- </div> -->
                             <!-- <input type="date" id="date" name="date" class="form-control" required> -->
                            </div>
                            
                        </div>
                    </div>

                     <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <label class="col-md-3 control-label">Doctor Name:</label> -->
                            <div class="col-md-9">
                           
                        <input type="hidden" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo $userData->id; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" >
                   
                    <div class="space-22"></div>
                </div>
            </div>
            <div class="text-right">
                <!-- <button type="submit" id="submit" class="btn btn-sm btn-primary" >Save</button> -->
            </div>
            
        </form>
        <div class="col-sm-12"> 
                         
                         <div class="table-responsive" >
                         

                             <table id="appointmentTable" class="table table-bordered table-hover align-middle text-center">
                         
            <!-- <table id="common_datatable_users" class="table table-vcenter table-condensed table-bordered"> -->
            <thead>
                    <tr>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;width:10px;" >Sr. No</th>
                        <th  style="background-color:#DBEAFF;font-size:1.3rem;">Header Name</th>
                        <th  style="background-color:#DBEAFF;font-size:1.3rem;">Header logo</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;">Bodies</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;">Recipients</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;">Footer</th>
                        <th style="background-color:#DBEAFF;font-size:1.3rem;"><?php echo lang('action'); ?></th>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    
                    if (!empty($template_list)) {
                        $rowCount = 0;
                        foreach ($template_list as $rows) {
                            $rowCount++;
                            // print_r($rows->bodies_template);
                            if(!empty($rows->header_internal_name)){
                    ?>
                           

                            <tr>
                                <td><?php echo $rowCount; ?></td>
                                <td><?php echo $rows->header_internal_name; ?></td>
                                <?php $image_url = base_url('/uploads/'); ?>
                                <td><img width="100px;" src="<?php echo $image_url.$rows->header_logo; ?>" alt="header"></td>
                                
                                <td style="vertical-align: top;">
                                    <?php 
                                    // Get the content from the `bodies_template`
                                    $content = $rows->bodies_template;

                                    // Split the content into words
                                    $words = explode(' ', $content);

                                    // Check if the content has more than 20 words
                                    if (count($words) > 20) {
                                        // Take only the first 20 words and join them into a string
                                        $content_trimmed = implode(' ', array_slice($words, 0, 20)) . '...';
                                    } else {
                                        // If it's less than 20 words, show the full content
                                        $content_trimmed = $content;
                                    }

                                    // Echo the content (trimmed or full)
                                    echo $content_trimmed;
                                    ?>
                                </td>


                                <td><?php echo $rows->recipient_template; ?></td>
                               
                                
                                <td><?php echo $rows->footer_internal_name; ?><img width="100px;" src="<?php echo $image_url.$rows->logo; ?>" alt="footer"></td>
                                <td class="actions">
                                    <h3>
                                        <a href="javascript:void(0)" onclick="generateTemplate('<?php echo $rows->id; ?>')" class="btn btn-sm save-btn">Generate Template</a>
                                    </h3>
                                    <?php  //print_r($rows->bodies_template);?>
                                    <!-- Hidden form -->
                                    <form id="templateForm_<?php echo $rows->id; ?>" style="display: none;">
                                        <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                                        <input type="hidden" name="internal_name" value="<?php echo $rows->header_internal_name; ?>">
                                        <input type="hidden" name="header_logo" value="<?php echo $rows->header_logo; ?>">
                                        <textarea name="bodies_templatess" id="bodies_templatess" value="<?php echo $rows->bodies_template; ?>"></textarea>
                                        <textarea name="recipient_template" id="recipient_template" value="<?php echo $rows->recipient_template; ?>"></textarea>
                                        <!-- <input type="text" name="bodies_templatess" value="<?php echo $rows->bodies_template; ?>"> -->
                                        <!-- <input type="hidden" name="recipient_template" value="<?php echo $rows->recipient_template; ?>"> -->
                                        <input type="hidden" name="logo" value="<?php echo $rows->logo; ?>">
                                        <!-- Add other hidden fields if needed -->
                                    </form>
                                </td>
                            </tr>

                        <?php
                        }
                        
                    }
                   
                    
                    }
                    ?>

                </tbody>
            </table>
            </div>
        </div>

            <?php }?>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {
    $('#appointmentTable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": false,
            "pageLength": 10,
            "order": [[0, 'desc']]  // Here, 0 represents the first column (index starts from 0)
        });
    });
    </script>
<script>
function generateTemplate(id) {
    // Populate hidden form with data
    var form = document.getElementById('templateForm_' + id);
    form.action = '<?php echo base_url('letters/generate_template'); ?>';
    // Add any additional data to be sent
    // form.append('key', 'value');

    // Submit form via AJAX
    $.ajax({
        type: 'POST',
        url: form.action,
        data: $(form).serialize(), // Serialize form data
        success: function(response) {
            // Handle success response
            alert('Template generated successfully!');
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(xhr.responseText);
        }
    });
}

</script>

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







