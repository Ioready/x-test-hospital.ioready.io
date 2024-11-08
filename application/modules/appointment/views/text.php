
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css"> -->
    <style>
        .highlight { background-color: yellow; }
        header h1, header p { margin: 0; }
        footer { padding: 7vh 5vw; border-top: 1px solid #ddd; }
        aside { padding: 7vh 5vw; }
        .primary { overflow: auto; scroll-snap-type: both mandatory; height: 80vh; }
        table { border-collapse: collapse; border: 0; }
        th, td { border: 1px solid #aaa; background-clip: padding-box; scroll-snap-align: start; }
        tbody tr:last-child th, tbody tr:last-child td { border-bottom: 0; }
        thead { z-index: 1000; position: relative; }
        th, td { padding: 0.6rem; min-width: 6rem; text-align: left; margin: 0; }
        thead th { position: sticky; top: 0; border-top: 0; background-clip: padding-box; }
        thead th.pin { left: 0; z-index: 1001; border-left: 0; }
        tbody { z-index: 10; position: relative; }
        tbody th { position: sticky; left: 0; }
        thead th, tbody th { background-color: #f8f8f8; }
        .save-btn a {
            font-weight: 700 !important;
            font-size: 1.2rem !important;
            padding: 0.6rem 2.25rem !important;
            background: #337ab7 !important;
        }
        .save-btn a:hover {
            background-color: #00008B !important;
        }
        .multiselect-ui { z-index: 1050; }
        .dropdown-menu { z-index: 1060; }
        tbody tr td{
            /* display: block; */
            justify-content: center;
           
        }
        .popup-appointment-open{
            width: -webkit-fill-available;
            padding: inherit;
            background-color: white!important;
            border: white!important;
        }
        .popup-appointment-open:hover{
            width: -webkit-fill-available;
            padding: inherit;
            background-color: white!important;
            border: white;
        }
        .popup-appointment-open:focus{
            width: -webkit-fill-available;
            padding: inherit;
            background-color: white!important;
            border: white!important;
        }
        



        .btn-position{
  top:50%;
  left:50%;
  transform:translate(-50%, -50%);
  position:absolute;
}

.modal.right.fade.in .modal-dialog {
right:0 !important;
transform: translateX(-50%);
}
.modal.right .modal-content {
/* overflow-y:scroll; */
border-radius:0;
overflow-y: scroll;
    overflow-x: hidden;
}
.modal.right .modal-dialog {
position: fixed;
margin: auto;
height: 100%;
-webkit-transform: translate3d(0%, 0, 0);
-ms-transform: translate3d(0%, 0, 0);
-o-transform: translate3d(0%, 0, 0);
transform: translate3d(0%, 0, 0);
}
.modal.right.fade.in .modal-dialog {
transform: translateX(0%);
}
.modal.right.fade .modal-dialog {
right: -320px;
-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
-moz-transition: opacity 0.3s linear, right 0.3s ease-out;
-o-transition: opacity 0.3s linear, right 0.3s ease-out;
transition: opacity 0.3s linear, right 0.3s ease-out;
}
    
    
   .modal.right .modal-header {background-color:#50caff; color:#fff; height: 33px;}
    .modal.right .modal-header::after {content:""; display:inline-block;}
    .modal.right .close {text-shadow:none; opacity:1; color:#ff4d4d; font-size:26px}
/*  form-control  */
    
    .form-control {border-radius:0; box-shadow:none}
    .form-control:focus {box-shadow:none}
    
    
/*  Button  */
    
    .btn {border-radius:0}

    .select2-container .select2-selection--multiple {
    height: auto;
}

.select2-container .select2-selection--single {
    height: auto;
}



    </style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>

<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> -->
 
<!-- Include Date Range Picker -->
<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /> -->



 <!-- Add jQuery library -->
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
 <script>
    $(document).ready(function() {
        // Handle tab clicks for the first set of tabs
        $(".nav-tabss .nav-link").click(function() {
            // Remove "active" class from all tab links
            $(".nav-tabss .nav-link").removeClass("active");
            // Add "active" class to the clicked tab link
            $(this).addClass("active");

            // Hide all tab panes
            $(".tab-pane-second").hide();

            // Show the corresponding tab pane based on the href attribute of the clicked tab link
            var targetPaneId = $(this).attr("href");
            $(targetPaneId).show();
        });

        // Handle tab clicks for the second set of tabs
        $(".nav-tab-appointment .nav-link-second").click(function() {
            // Remove "active" class from all tab links
            $(".nav-tab-appointment .nav-link-second").removeClass("active");
            // Add "active" class to the clicked tab link
            $(this).addClass("active");

            // Hide all tab panes
            $(".tab-pane-second").hide();

            // Show the corresponding tab pane based on the data-target attribute of the clicked tab link
            var targetPaneId = $(this).data("target");
            $(targetPaneId).show();
        });
    });
    function toggleHidden() {
    var element = document.getElementById("elementToToggle");
    element.classList.add("hidden");
  }
    function toggleDisplay() {
    var element = document.getElementById("elementToToggle");
    element.classList.remove("hidden");
    document.getElementById("autoClickButton").click();
    document.getElementById("autoClickButton").focus();
  }
  window.onload = function() {
    document.getElementById("autoClickButton").click();
    document.getElementById("autoClickButton").focus();
  };
    
</script>

</head>
<body>
    <div id="page-content">
        <ul class="breadcrumb breadcrumb-top">
            <li><a href="<?php echo site_url('pwfpanel');?>">Home</a></li>
            <li><a href="<?php echo site_url('appointment');?>"><?php echo $title;?></a></li>
        </ul>

        <!-- <h2>
            <a href="javascript:void(0)"  onclick="open_model_new('<?php echo $model; ?>')"  class="btn btn-sm btn-primary  fw-bold">
                New Patient
            </a>
        </h2> -->
        
            
        <div class="block full" style="border-radius:12px">
            <div class="block-title">
                <?php 
                $all_permission = $this->ion_auth->is_permission();
              
                foreach($all_permission['form_permission'] as $permission){
                   
                    $menu_view =$permission->menu_view;
                    $menu_create= $permission->menu_create;
                    $menu_update= $permission->menu_update;
                    $menu_delete =$permission->menu_delete;
                    $menu_name =$permission->menu_name;
                    if ($menu_name == 'Appointment') { 
                    if($menu_create =='1'){

                    
                    ?>
                    <h2 class="save-btn">
                        <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                            <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                        </a>
                    </h2>

                <?php } } } if($this->ion_auth->is_facilityManager()) { ?>
                    <h2 class="save-btn">
                        <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                            <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                        </a>
                    </h2>
                <?php } ?>
            </div>

            <div class="block-title d-flex justify-content-center">
                <h2 style="font-size: 2rem !important; font-weight: 700 !important;">
                    <strong><?php echo $title;?></strong> Panel
                </h2>
            </div>

            <div class="modal-header text-center" style="display:flex;border-radius:10px; background-color:#FFFF; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);">
                <?php if ($this->ion_auth->is_facilityManager()) { ?>

             <div class="col-sm-3 col-lg-3 col-md-3 m-4">
                <div class="col-md-9">
                    <select id="viewSelector" onchange="getLocations(this.value)" name="location_appointment" class="form-control select2" size="1">
                        <option value="0">View By</option>
                        <option value="practitioner"><b> Practitioner View</b></option>
                        <option value="location"><b>Location View</option>
                        <option value="clinic"><b>Clinic View</option>
                    </select>
 
                </div>
            </div>

            <div class="col-sm-6 col-lg-6 col-md-6 m-4">
                <div class="col-sm-6 col-lg-6 col-md-6 m-4">
                    <!-- <select id="departmentanddoctordata" name="departmentanddoctordata[]" class="multiselect-ui form-control dropdown-menu" multiple="multiple"></select> -->
                    <select id="departmentanddoctordata" name="departmentanddoctordata[]" class="form-control select2"></select>

                </div>
            </div>
            <?php } 
            //else if($this->ion_auth->is_subAdmin()) { 
                ?>

                <?php 
                $all_permission = $this->ion_auth->is_permission();
              
                foreach($all_permission['form_permission'] as $permission){
                   
                    $menu_view =$permission->menu_view;
                    $menu_create= $permission->menu_create;
                    $menu_update= $permission->menu_update;
                    $menu_delete =$permission->menu_delete;
                    $menu_name =$permission->menu_name;
                    if ($menu_name == 'Appointment') { 
                    if($menu_create =='1'){

                    
                    ?>

                <div class="col-sm-3 col-lg-3 col-md-3 m-4">
                    <div class="col-md-9">
                        <select id="viewSelector" onchange="getLocations(this.value)" name="location_appointment" class="form-control select2" size="1">
                            <option value="0">View By</option>
                            <option value="practitioner"><b> Practitioner View</b></option>
                            <option value="location"><b>Location View</option>
                            <option value="clinic"><b>Clinic View</option>
                        </select>
 
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-md-6 m-4">
                    <div class="col-sm-6 col-lg-6 col-md-6 m-4">
                        <select id="departmentanddoctordata" name="departmentanddoctordata[]" class="multiselect-ui form-control dropdown-menu" multiple="multiple"></select>
        </div>
                    </div>

                    
                <?php } } } ?>
               
                <div class="form-group save-btn">
                    <label for="datePicker">Select Date:</label>
                    <input type="date" id="datePicker" class="form-control">
                </div>
            </div> 
            

            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div style="overflow-x: auto; overflow-y: auto; width: auto; height: 500px;" >

                                    <table class="table table-bordered text-center">
                                        <thead id="practitioner_id" class="">
                                            <tr>
                                                <th class="text-center fw-bold appointment-header" style="font-size:16px; background-color:#337ab7;color:white;">Time</th>
                                                <!-- $([your selector]).attr('colspan',3); -->
                                                <?php
                                                    $practitionerData = [];
                                                    foreach ($practitioner as $key=> $department) {
                                                        $practitionerData[$key] = $department;
                                                        
                                                        echo '<th class="day-cell text-center" style="font-size:14px;background-color:#337ab7;color:white;" data-practitioner-id="' . $department->id . '">' . $department->name . ' ' . $department->first_name . ' ' . $department->last_name . '</th>';
                                                        // echo '<td class="day-cell appointment-row">';
                                                        // echo '</td>';
                                                    }
                                                  $prationerCount = count($practitionerData);
                                                    
                                                ?>
                                            </tr>
                                            <!-- <tr>  -->
                                        </thead>
                                        <tbody id="all_appointment " class="appointment-body datatableappintment">
                                            <?php
                                                $start_time = strtotime('07:00');
                                                $end_time = strtotime('24:00');
                                                $interval = 15 * 60;

                                                for ($time = $start_time; $time <= $end_time; $time += $interval) {

                                                    $formatted_time = date('H:i', $time);
                                                // echo '<tr>';
                                                    echo '<tr>
                                                    <td class="time-cell">' . $formatted_time . '</td>';
                                                   
                                                    foreach ($practitioner as $key => $value)
                                                    {
                                                    $object = $value->id;
                                                   
                                                            echo '<td class="time-cell">';
                                                        
                                                        foreach ($all_appointment as $appointment) {
                                                            
                                                            $appointmentTime = date('H:i', strtotime($appointment->start_date_appointment));
                                                            $end_date_appointment = date('H:i', strtotime($appointment->end_date_appointment));
                                                            $appointment_date = date('Y-m-d', strtotime($appointment->start_date_appointment));
                                                            
                                                            $out_start_time_at = date('H:i', strtotime($appointment->out_start_time_at));
                                                            $out_end_time_at = date('H:i', strtotime($appointment->out_end_time_at));
                                                            $out_start_timeAt = date('Y-m-d', strtotime($appointment->out_start_time_at));
                                                            
                                                            $start_date_availability = date('H:i', strtotime($appointment->start_date_availability));
                                                            $end_time_date_availability = date('H:i', strtotime($appointment->end_time_date_availability));
                                                            $start_dateAvailability = date('Y-m-d', strtotime($appointment->start_date_availability));
                                                            
                                                            $theatre_date_time = date('H:i', strtotime($appointment->theatre_date_time));
                                                            $theatre_time_duration = $appointment->theatre_time_duration;
                                                            $durationInSeconds = $theatre_time_duration * 60;
                                                            $theatre_end_time = date('H:i', strtotime($theatre_date_time . " +$durationInSeconds seconds"));
                                                            $theatre_dateTime = date('Y-m-d', strtotime($appointment->theatre_date_time));
                                                            
                                                            
                                                            $current_date = date('Y-m-d');


                                                                        if ($appointment->practitioner == $object && $formatted_time >= $appointmentTime && $formatted_time <= $end_date_appointment) {
                                                                            if ($formatted_time == $appointmentTime) {
                                                                                echo '<label style="background-color:green; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: green; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->comment_appointment . '<br>' . $appointmentTime . ' - ' . $end_date_appointment . '</span></label>';
                                                                            }
                                                                           
                                                                        } elseif ($appointment->practitioner == $object && $formatted_time >= $out_start_time_at && $formatted_time <= $out_end_time_at) {
                                                                            if ($formatted_time == $out_start_time_at) {
                                                                                echo '<label style="background-color:pink; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: pink; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->out_of_office_comment . '<br>' . $out_start_time_at . ' - ' . $out_end_time_at . '</span></label>';
                                                                            }
                                                                           
                                                                        } elseif ($appointment->practitioner == $object && $formatted_time >= $start_date_availability && $formatted_time <= $end_time_date_availability) {
                                                                            if ($formatted_time == $start_date_availability) {
                                                                                echo '<label style="background-color:#40E0D0; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: #40E0D0; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>Available<br>' . $start_date_availability . ' - ' . $end_time_date_availability . '</span></label>';
                                                                            }
                                                                           
                                                                        } elseif ($appointment->theatre_clinician == $object && $formatted_time >= $theatre_date_time && $formatted_time <= $theatre_end_time) {
                                                                            if ($formatted_time == $theatre_date_time) {
                                                                                echo '<label style="background-color:#800080; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: #800080; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->theatre_comment . '<br>' . $theatre_date_time . ' - ' . $theatre_end_time . '</span></label>';
                                                                            }
                                                                          
                                                                       }
                                                            }
                                                           
                                                            echo '<button id="btnMyTest001" type="button" class="btn btn-success popup-appointment-open" data-toggle="modal" data-target="#my_modal" data-age="27">Create</button>';
                                                                                
                                                            echo '</td>';
                                                    }
                                                        echo '</tr>';
                                                        }
                                                   
                                            ?>
                                        </tbody>   
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right"></div>
            </div>
        </div>


        <div id="form-modal-box"></div>
                <!-- Modal -->
                <div class="modal right fade" id="my_modal" role="dialog">
                    <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"> Appointments</h4>
                            </div>
                                <div class="modal-body">
                                <?php 
                $all_permission = $this->ion_auth->is_permission();
                $viewAppointment =[];
                foreach($all_permission['form_permission'] as $permission){
                   
                    $menu_view =$permission->menu_view;
                    $menu_create= $permission->menu_create;
                    $menu_update= $permission->menu_update;
                    $menu_delete =$permission->menu_delete;
                    $menu_name =$permission->menu_name;
                    if ($menu_name == 'Appointment') { 
                    if($menu_view =='1'){
                        $viewAppointment[] =$menu_view;
                    }}}
                    
                    ?>

                                    <?php if ($this->ion_auth->is_subAdmin() || $this->ion_auth->is_facilityManager() || in_array('1',$viewAppointment)) { ?>
                                        <div class="full">
                                            <div class="row text-center">
                                                <div id="wrapper">
                                                    <!-- Content Wrapper -->
                                                    <!-- <div id="content-wrapper" class="container d-flex flex-column"> -->
                                                        <!-- Main Content -->
                                                        <div id="content">
                                                            <!-- Begin Page Content -->
                                                            <div class="container-fluid">
                                                                <div class="tabControl">

                                                                    <div class="container">
                                                                        <div class="row" >
                                                                            <div class="col">
                                                                                <ul class="nav nav-pills nav-fill nav-tabss" id="pills-tab" role="tablist">
                                                                                    <li onclick="toggleDisplay()" class="nav-item">
                                                                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab">Appointment</a>
                                                                                    </li>
                                                                                    <li onclick="toggleHidden()" class="nav-item">
                                                                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab">Availability</a>
                                                                                    </li>
                                                                                    <li onclick="toggleHidden()" class="nav-item">
                                                                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-3" role="tab">Out of office</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div id="elementToToggle" class="tab-pane-second d-block" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
                                                                        <ul class="nav nav-pills-second nav-fill nav-tab-appointment active" id="pills-tab" role="tablist">
                                                                            <li class="nav-item-second active">
                                                                                <a id="autoClickButton" class="nav-link-second active" id="pills-home-tab" data-toggle="pill" data-target="#pills-5" href="#pills-5" role="tab">Clinic Appointment</a>
                                                                                <div class="underline"></div>
                                                                            </li>
                                                                            <li class="nav-item-second">
                                                                                <a class="nav-link-second" id="pills-profile-tab" data-toggle="pill" data-target="#pills-6" href="#pills-6" role="tab">Theatre Appointment</a>
                                                                                <div class="underline"></div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                <div class="tab-content" id="pills-tabContent">
                                                                    <div class="tab-pane-second active" id="pills-5" role="tabpanel" aria-labelledby="pills-home-tab">
                                                                        <div class="block full">
                                                                            <div class="block-title">
                                                                                <h2 class="form-head"><strong>Clinic Appointment</strong> Panel</h2>
                                                                            </div>
                                                                        <!-- <div class="modal-header text-center">
                                                                            <h4 class="modal-title"><img src="<?php echo base_url(); ?>uploads/form.svg" style="height: 20px; width: 20px; filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%); margin-bottom: 5px;" alt=""> Clinic Appointment</h4>
                                                                        </div> -->
                                                                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
                                                                            
                                                                            <div class="alert alert-danger" id="error-box" style="display: none;"></div>
                                                                            <div class="form-body">
                                                                                <br>
                                                                                <div class="row">
                                                                                <div class="col-md-12">
                                                                                <div class="form-group">

                                                                                        <label for="gsearch" class="col-md-3 control-label">Search Today patient:</label>
                                                                                        <!-- <input type="search" id="search"> -->
                                                                                        <div class="col-md-9">
                                                                                                                <div class="input-group">
                                                                                            <input type="text" class="form-control" placeholder="Search" id="search">
                                                                                        
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                    
                                                                                <h2 style="float: inline-end;">
                                                                            <a href="javascript:void(0)"  onclick="open_model_new('<?php echo $model; ?>')"  class="btn btn-sm btn-primary  fw-bold">
                                                                                New Patient
                                                                            </a>
                                                                        </h2>

                                                                                </div>

                                                                        <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label"> </label>
                                                                                    <div class="col-md-9">
                                                                                    <input type="hidden" name="type" id="type" value="clinic_appointment">
                                                                                    <div id="result"></div>
                                                                                </div>
                                                                                </div>
                                                                        </div>
      
                   
    

                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <?php 
                        if ($this->ion_auth->is_facilityManager()) { ?>
                            <label class="col-md-3 control-label">Location</label>
                                <div class="col-md-9">
                                <select id="country" name="location_appointment" class="form-control select2" size="1">
                                    <option value="0">This is The Hospital Location</option>

                                    <?php foreach ($clinic_location as $location) { ?>
                                        <option value="<?php echo $location->id; ?>"><?php echo $location->clinic_location; ?></option>
                                    <?php } ?>
                                    
                                </select>
                               
                            </div>
                        <?php }else { ?>
                        
                            <label class="col-md-3 control-label">Location</label>
                            <div class="col-md-9">
                                <select id="country" name="location_appointment" class="form-control select2" size="1">
                                    <option value="0">Please select</option>
                                   
                                    
                                    <?php foreach ($clinic_location as $location) { ?>
                                        <option value="<?php echo $location->id; ?>"><?php echo $location->clinic_location; ?></option>
                                    <?php } ?>
                                </select>
                               
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Practitioner</label>
                            <div class="col-md-9">
                                <select id="practitioner" name="practitioner" class="form-control select2" size="1">
                                    <option value="0">Please select</option>
                                  
                                    <?php foreach ($practitioner as $practitioners) { ?>
                                        <option value="<?php echo $practitioners->id; ?>"><?php echo $practitioners->name; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Appointment type</label>
                            <div class="col-md-9">
                            
                                <select id="country" name="appointment_type" class="form-control select2" size="1" required>
                                    
                                    <?php foreach ($appointment_type as $appointment_types) { ?>
                                        <option value="<?php echo $appointment_types->id; ?>"><?php echo $appointment_types->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Start Date</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input class="form-control" placeholder="" name="start_date_appointment" type="datetime-local" id="start_at">
                                    </div>
                                    <div class="col-md-2 date-time-separator">
                                        <span><strong>End Date</strong></span>
                                    </div>
                                    <div class="col-md-5">
                                        <input class="form-control" placeholder="" name="end_date_appointment" type="datetime-local" id="end_at">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Comment</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="comment_appointment" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-9">
                                <input type="hidden" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo $userData->id; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="space-22"></div>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit" class="save-btn btn btn-sm btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
                                        <div class="tab-pane-second" id="pills-6" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                        <div class="block full" style="width: 100%; max-width:900px;">
                                                                            <div class="block-title">
                                                                                <h2 class="form-head"><strong>Theatre Appointment</strong> Panel</h2>
                                                                            </div>
                                                                            <!-- <div class="modal-header text-center">
                                                                                    <h4 class="modal-title"><img src="<?php echo base_url(); ?>uploads/form.svg" style="height: 20px; width: 20px; filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%); margin-bottom: 5px;" alt=""> Theatre Appointment</h4>
                                                                                </div> -->
                                                                            
                                                                            
                                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
                                                                                
                                                                                <div class="alert alert-danger" id="error-box" style="display: none;"></div>
                                                                                <div class="form-body">
                                                                                    <br>
                                                                                    <div class="row">
                                                                                    

                                                                                        <div class="col-md-12">
                                                                                    <div class="form-group">

                                                                                            <label for="gsearch" class="col-md-3 control-label">Search Today patient:</label>
                                                                                            <!-- <input type="search" id="search"> -->
                                                                                            <div class="col-md-9">
                                                                                                                    <div class="input-group">
                                                                                                <input type="text" class="form-control" placeholder="Search" id="search_patient">
                                                                                            
                                                                                            </div>
                                                                                                </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="col-md-3 control-label"> </label>
                                                                                                <div class="col-md-9">
                                                                                                <input type="hidden" name="type" id="type" value="theatre_appointment">
                                                                                                <div id="result_patient"></div>
                                                                                            </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                
                                                                                                <?php 
                                                                                            if ($this->ion_auth->is_facilityManager()) { ?>
                                                                                                <label class="col-md-3 control-label">Location</label>
                                                                                                    <div class="col-md-9">
                                                                                                    <select id="country" name="location_appointment" class="form-control select2" size="1">
                                                                                                        <option value="0">This is The Hospital Location</option>

                                                                                                        <?php foreach ($clinic_location as $location) { ?>
                                                                                                            <option value="<?php echo $location->id; ?>"><?php echo $location->clinic_location; ?></option>
                                                                                                        <?php } ?>
                                                                                                        
                                                                                                    </select>
                                                                                                
                                                                                                </div>
                                                                                            <?php }else { ?>
                                                                                            
                                                                                                <label class="col-md-3 control-label">Location</label>
                                                                                                <div class="col-md-9">
                                                                                                    <select id="country" name="location_appointment" class="form-control select2" size="1">
                                                                                                        <option value="0">Please select</option>
                                                                                                    
                                                                                                        
                                                                                                        <?php foreach ($clinic_location as $location) { ?>
                                                                                                            <option value="<?php echo $location->id; ?>"><?php echo $location->clinic_location; ?></option>
                                                                                                        <?php } ?>
                                                                                                    </select>
                                                                                                
                                                                                                </div>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>

                                                        
                                                                                <div class="col-md-12">

                                                                                    <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Clinician</label>
                                                                                        <div class="col-md-9">
                                                                                            <select id="country" name="theatre_clinician" class="form-control select2" size="1">
                                                                                                <option value="0">Please select</option>
                                                                                                <?php foreach ($doctorsname as $country) { ?>
                                                                                                    <option value="<?php echo $country->id; ?>"><?php echo $country->first_name.' '.$country->last_name; ?></option>
                                                                                                <?php } ?>
                                                                                                <!-- <?php foreach ($clinic_location as $location) { ?>
                                                                                                    <option value="<?php echo $location->id; ?>"><?php echo $location->name; ?></option>
                                                                                                <?php } ?> -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Appointment type</label>
                                                                                        <div class="col-md-9">
                                                                                            <select id="country" name="appointment_type" class="form-control select2" size="1">
                                                                                                <option value="0">Please select</option>
                                                                                                <?php foreach ($appointment_type as $appointment_types) { ?>
                                                                                                    <option value="<?php echo $appointment_types->id; ?>"><?php echo $appointment_types->name; ?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="col-md-12 control-label" style="text-align: center;"><strong>Theatre details</strong></label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Anaesthetist</label>
                                                                                        <div class="col-md-9">
                                                                                        <input type="text" id="theatre_anaesthetist" name="theatre_anaesthetist" class="form-control" placeholder="Anaesthetist" style="text-align: justify;" required>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Type of stay</label>
                                                                                        <div class="col-md-9">
                                                                                            <select id="country" name="theatre_type_of_stay" class="form-control select2" size="1">
                                                                                                <option value="0">Please select</option>
                                                                                                <?php foreach ($type_of_stay as $type_of_stays) { ?>
                                                                                                    <option value="<?php echo $type_of_stays->id; ?>"><?php echo $type_of_stays->name; ?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 control-label">Theatre date and time</label>
                                                                                        <div class="col-md-9">
                                                                                            <div class="row">
                                                                                                <div class="col-md-5 date-time-container">
                                                                                                    <input class="form-control" placeholder="" name="theatre_date_time" type="datetime-local" id="theatre_date_time">
                                                                                                </div>
                                                                                                <div class="col-md-2 date-time-separator">
                                                                                                    <span class="separator">Duration</span>
                                                                                                </div>
                                                                                                <div class="col-md-3 date-time-container">
                                                                                                    <div class="number">
                                                                                                        <span class="minus">-</span>
                                                                                                        <input type="text" name="theatre_time_duration" value="30" /> minutes
                                                                                                        <span class="plus">+</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 control-label">Admission date and time</label>
                                                                                        <div class="col-md-9">
                                                                                            <input class="form-control" placeholder="" name="theatre_admission_date_time" type="datetime-local" id="admission_date_time">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="col-md-12 control-label" style="text-align: center;"><strong>Procedure details</strong></label>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 control-label">Anaesthetic type*</label>
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <label>
                                                                                    <input type="radio" name="theatre_anaesthetic_type" id="admission_date_time_la" value="LA-Local" style="width:initial;">
                                                                                    LA - Local
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label>
                                                                                    <input type="radio" name="theatre_anaesthetic_type" id="admission_date_time_ga" value="GA-General" style="width:initial;">
                                                                                    GA - General
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label>
                                                                                    <input type="radio" name="theatre_anaesthetic_type" id="admission_date_time_sedation" value="Sedation" style="width:initial;">
                                                                                    Sedation
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label>
                                                                                    <input type="radio" name="theatre_anaesthetic_type" id="admission_date_time_block" value="Block" style="width:initial;">
                                                                                    Block
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label>
                                                                                    <input type="radio" name="theatre_anaesthetic_type" id="admission_date_time_other" value="Other" style="width:initial;">
                                                                                    Other
                                                                                </label>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <label>
                                                                                    <input type="radio" name="theatre_anaesthetic_type" id="admission_date_time_none" value="None" style="width:initial;">
                                                                                    None
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Comment</label>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="comment_appointment" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="hidden" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo $userData->id; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="space-22"></div>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="submit" id="submit" class="save-btn btn btn-sm btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                                                            

                                            <div class="tab-pane-second" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <div class="block full" style="width: 100%; max-width: 900px; margin-top: 40px;">

                                                <div class="block-title">
                                                    <h2 class="form-head"><strong> Availability</strong> Panel</h2>
                                                </div>
                                                    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
                                                    <!-- <div class="modal-header text-center">
                                                        <h4 class="modal-title"><img src="<?php echo base_url(); ?>uploads/form.svg" style="height: 20px;width:20px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);margin-bottom:5px" alt=""> Availability</h4>
                                                    </div> -->
                                                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                                                    <div class="form-body">
                                                        <br>
                                                        <div class="row">

                                                            <input type="hidden" name="type" id="type" value="availability_appointment"> 

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    
                                                                    <?php 
                                                                if ($this->ion_auth->is_facilityManager()) { ?>
                                                                    <label class="col-md-3 control-label">Location</label>
                                                                        <div class="col-md-9">
                                                                        <select id="country" name="location_appointment" class="form-control select2" size="1">
                                                                            <option value="0">This is The Hospital Location</option>

                                                                            <?php foreach ($clinic_location as $location) { ?>
                                                                                <option value="<?php echo $location->id; ?>"><?php echo $location->clinic_location; ?></option>
                                                                            <?php } ?>
                                                                            
                                                                        </select>
                                                                    
                                                                    </div>
                                                                <?php }else { ?>
                                                                
                                                                    <label class="col-md-3 control-label">Location</label>
                                                                    <div class="col-md-9">
                                                                        <select id="country" name="location_appointment" class="form-control select2" size="1">
                                                                            <option value="0">Please select</option>
                                                                        
                                                                            
                                                                            <?php foreach ($clinic_location as $location) { ?>
                                                                                <option value="<?php echo $location->id; ?>"><?php echo $location->clinic_location; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Practitioner</label>
                                                                    <div class="col-md-9">
                                                                        <select id="practitioner" name="practitioner" class="form-control select2" size="1">
                                                                            <option value="0">Please select</option>
                                                                        
                                                                            <?php foreach ($practitioner as $practitioners) { ?>
                                                                                <option value="<?php echo $practitioners->id; ?>"><?php echo $practitioners->name; ?></option>
                                                                            <?php } ?>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 control-label">Date and time</label>
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-5 date-time-container">
                                                                                <input class="form-control" placeholder="" name="start_date_availability" type="datetime-local" id="start_time_at">
                                                                            </div>
                                                                            <div class="col-md-1 date-time-separator">
                                                                                <span class="separator">-</span>
                                                                            </div>
                                                                            <div class="col-md-5 date-time-container">
                                                                                <input type="datetime-local" class="form-control time-input" id="end_time" name="end_time_date_availability">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="hidden" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo $userData->id; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="space-22"></div>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="submit" id="submit" class="save-btn btn btn-sm btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="tab-pane-second" id="pills-3" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="block full" style="width: 100%; max-width:900px; margin-top:40px;">
                                                <div class="block-title">
                                                    <h2 class="form-head"><strong>Out Of Office</strong> Panel</h2>
                                                </div>
                                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
                                                    <!-- <div class="modal-header text-center">
                                                        <h4 class="modal-title"><img src="<?php echo base_url(); ?>uploads/form.svg" style="height: 20px; width: 20px; filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%); margin-bottom: 5px;" alt=""> Out Of Office</h4>
                                                    </div> -->
                                                    <div class="alert alert-danger" id="error-box" style="display: none;"></div>
                                                    <div class="form-body">
                                                        <br>
                                                        <div class="row">
                                                        <input type="hidden" name="type" id="type" value="out_of_office_appointment"> 
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    
                                                                    <?php 
                                                                if ($this->ion_auth->is_facilityManager()) { ?>
                                                                    <label class="col-md-3 control-label">Location</label>
                                                                        <div class="col-md-9">
                                                                        <select id="country" name="location_appointment" class="form-control select2" size="1">
                                                                            <option value="0">This is The Hospital Location</option>

                                                                            <?php foreach ($clinic_location as $location) { ?>
                                                                                <option value="<?php echo $location->id; ?>"><?php echo $location->clinic_location; ?></option>
                                                                            <?php } ?>
                                                                            
                                                                        </select>
                                                                    
                                                                    </div>
                                                                <?php }else { ?>
                                                                
                                                                    <label class="col-md-3 control-label">Location</label>
                                                                    <div class="col-md-9">
                                                                        <select id="country" name="location_appointment" class="form-control select2" size="1">
                                                                            <option value="0">Please select</option>
                                                                        
                                                                            
                                                                            <?php foreach ($clinic_location as $location) { ?>
                                                                                <option value="<?php echo $location->id; ?>"><?php echo $location->clinic_location; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Practitioner</label>
                                                                    <div class="col-md-9">
                                                                        <select id="practitioner" name="practitioner" class="form-control select2" size="1">
                                                                            <option value="0">Please select</option>
                                                                        
                                                                            <?php foreach ($practitioner as $practitioners) { ?>
                                                                                <option value="<?php echo $practitioners->id; ?>"><?php echo $practitioners->name; ?></option>
                                                                            <?php } ?>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 control-label">Date and time</label>
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-5 date-time-container">
                                                                                <input class="form-control" placeholder="" name="out_start_time_at" type="datetime-local" id="out_start_time_at">
                                                                            </div>
                                                                            <div class="col-md-1 date-time-separator">
                                                                                <span class="separator">-</span>
                                                                            </div>
                                                                            <div class="col-md-5 date-time-container">
                                                                                <input class="form-control" placeholder="" name="out_end_time_at" type="datetime-local" id="out_end_time_at">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Comment</label>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="comment_appointment" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="col-md-9">
                                                                        <input type="hidden" id="doctor_name" name="doctor_name" class="form-control" value="<?php echo $userData->id; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="space-22"></div>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="submit" id="submit" class="save-btn btn btn-sm btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
           
        </div>

    <?php } ?>
                                               
                                </div>
                            <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-success">Save</button>
                                    <button type="button" class="btn btn-default close-btn" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                            
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script> -->


    <script>
    $(document).ready(function() {
  var table = $('#all_appointment').DataTable({
		// hiding columns via datatable column.visivle API
    "columnDefs": [{
      "targets": [2],
      "visible": false
    }, {
      "targets": [3],
      "visible": false
    }, {
			// adding a more info button at the end
      "targets": -1,
      "data": null,
      "defaultContent": "<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>"
    }]
  });

  $('#example tbody').on('click', 'button', function() {
    var data = table.row($(this).parents('tr')).data(); // getting target row data
    $('.insertHere').html(
			// Adding and structuring the full data
      '<table class="table dtr-details" width="100%"><tbody><tr><td>Name<td><td>' + data[0] + '</td></tr><tr><td>Position<td><td>' + data[1] + '</td></tr><tr><td>Office<td><td>' + data[2] + '</td></tr><tr><td>Age<td><td>' + data[3] + '</td></tr><tr><td>Start date<td><td>' + data[4] + '</td></tr><tr><td>Salary<td><td>' + data[5] + '</td></tr></tbody></table>'
    );
    $('#myModal').modal('show'); // calling the bootstrap modal
  });

});

    </script>


    <script>
        $(document).ready(function() {
            $('#departmentanddoctordata').multiselect({
                includeSelectAllOption: true
            });

            $('#departmentanddoctordata').on('change', function() {
                var selectedNames = $(this).val();
                updateTableHeaders(selectedNames);
                filterAppointments();
            });

            $('#datePicker').on('change', function() {
                filterAppointments();
            });

            function updateTableHeaders(selectedNames) {
                var headerRow = $('#practitioner_id');
                headerRow.find('tr').empty(); // Clear existing headers
                headerRow.find('tr').append('<th class="text-center fw-bold" style="font-size:16px; background-color:#337ab7;color:white;">Time</th>'); // Add Time header

                selectedNames.forEach(function(practitionerId) {
                    var practitionerName = $('#departmentanddoctordata option[value="' + practitionerId + '"]').text();
                    headerRow.find('tr').append('<th class="day-cell text-center" style="font-size:14px;background-color:#337ab7;color:white;">' + practitionerName + '</th>');
                });

                $('.datatableappintment tbody tr').each(function() {
                    $(this).find('td').not(':first').remove();
                    selectedNames.forEach(function(practitionerId) {
                        console.log(practitionerId);
                        $(this).append('<td class="day-cell" data-time="' + $(this).find('.time-cell').text() + '" data-day="' + practitionerId + '"></td>');
                    }.bind(this));
                });
            }

            function filterAppointments() {
                var selectedDate = $('#datePicker').val();
                
                var selectedPractitioners = $('#departmentanddoctordata').val();
                
                if (selectedDate) {
                    $('.appointment-row').hide();
                    $('.appointment-row').filter(function() {
                        var appointmentDate = $(this).data('date');
                        var appointmentPractitioner = $(this).data('day');
                        return appointmentDate === selectedDate && (!selectedPractitioners || selectedPractitioners.includes(String(appointmentPractitioner)));
                    }).show();
                } else {
                    $('.appointment-row').hide();
                }
            }

            window.getLocations = function(view_id) {
                $.ajax({
                    url: 'appointment/getLocationFilter',
                    type: 'POST',
                    dataType: "json",
                    data: { id: view_id },
                    success: function(response) {
                        console.log(response); // Debugging line to check the response
                        $('#departmentanddoctordata').empty().append('<option value="">All Select</option>');
                        $.each(response, function(key, value) {
                            var name = value.name || '';
                            var firstName = value.first_name || '';
                            var lastName = value.last_name || '';
                            if (name !== 'N/A' || firstName !== '') {
                                $('#departmentanddoctordata').append('<option value="' + value.id + '">' + name + ' ' + firstName + ' ' + lastName + '</option>');
                            }
                        });
                        $('#departmentanddoctordata').multiselect('rebuild');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            };

            let today = new Date().toISOString().substr(0, 10);
            document.querySelector("#datePicker").value = today;
            filterAppointments();
        });
    </script>

<script>
    
     $(document).ready(function() {
            $('#departmentanddoctordata').multiselect({
                includeSelectAllOption: true
            });

            $('#departmentanddoctordata,#datePicker').on('change', function() {
                
            

     var selectedDate = $('#datePicker').val();
     
    //  var selectedPractitioners = $('#departmentanddoctordata').val();

    var selectedPractitioners = $("#departmentanddoctordata :selected").map(function(i, el) {
    return $(el).val();
}).get();

// alert(selectedPractitioners);
    //  $(.appointment-header).attr('colspan',-1,selectedPractitioners);
    //  $(.appointment-body).attr('colspan',-1, selectedPractitioners);
    $.ajax({
                    url: 'appointment/filterdateDepartment',
                    type: 'POST',
                    dataType: "html",
                    data: { departmentId: selectedPractitioners,selectedDate:selectedDate },
                    success: function(response) {
                        // alert(response);
                        // $('.datatableappintment').empty(bind());
                        console.log(response); // Debugging line to check the response
                        $(".datatableappintment").html(response);
                        
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            });
</script>

        <script>
            wow = new WOW(
                {
                boxClass:     'wow',      // default
                animateClass: 'animated', // default
                offset:       0,          // default
                mobile:       true,       // default
                live:         true        // default
                }
                )
                wow.init();
        </script>

<script>
// Get the current date and time in ISO 8601 format
function getCurrentDateTime() {
    const now = new Date();
    const year = now.getFullYear();
    const month = ('0' + (now.getMonth() + 1)).slice(-2);
    const day = ('0' + now.getDate()).slice(-2);
    const hours = ('0' + now.getHours()).slice(-2);
    const minutes = ('0' + now.getMinutes()).slice(-2);
    const dateTimeString = `${year}-${month}-${day}T${hours}:${minutes}`;
    return dateTimeString;
}

// Set the value of the input field to the current date and time
document.getElementById('start_at').value = getCurrentDateTime();
document.getElementById('end_at').value = getCurrentDateTime();
document.getElementById('theatre_date_time').value = getCurrentDateTime();

document.getElementById('admission_date_time').value = getCurrentDateTime();
document.getElementById('start_time_at').value = getCurrentDateTime();
document.getElementById('out_start_time_at').value = getCurrentDateTime();
document.getElementById('out_end_time_at').value = getCurrentDateTime();




</script>

<script>

$(document).ready(function() {
			$('.minus').click(function () {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 1 ? 1 : count;
				$input.val(count);
				$input.change();
				return false;
			});
			$('.plus').click(function () {
				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
				return false;
			});
		});
</script>

<style>

span {cursor:pointer; }
		.number{
			margin:0px;
		}
		.minus, .plus{
			width:20px;
			height:20px;	
            display: inline-block;
            text-align: center;
		}
		input{
			/* height:34px; */
            /* width: 100px; */
            text-align: center;
            font-size: 16px;
			border:1px solid #ddd;
			border-radius:4px;
            display: inline-block;
            vertical-align: middle;
        }
</style>

<script>
    // Initial duration in minutes
let durationInMinutes = 30;

// Function to update the displayed duration
function updateDuration() {
    document.getElementById('duration').textContent = durationInMinutes + " minutes";
}

// Event listener for the increase button
document.getElementById('increaseBtn').addEventListener('click', function() {
    durationInMinutes += 10; // Increase duration by 30 minutes
    updateDuration(); // Update the displayed duration
});

// Event listener for the decrease button
document.getElementById('decreaseBtn').addEventListener('click', function() {
    // Ensure duration doesn't become negative
    if (durationInMinutes > 30) {
        durationInMinutes -= 30; // Decrease duration by 30 minutes
        updateDuration(); // Update the displayed duration
    }
});

</script>





<!-- END Page Content -->
<script>


document.addEventListener('DOMContentLoaded', function() {
    // JavaScript code here

    // Get the current date and time
var currentDate = new Date();
var currentYear = currentDate.getFullYear();
var currentMonth = ('0' + (currentDate.getMonth() + 1)).slice(-2);
var currentDay = ('0' + currentDate.getDate()).slice(-2);
var currentHours = ('0' + currentDate.getHours()).slice(-2);
var currentMinutes = ('0' + currentDate.getMinutes()).slice(-2);

// Set the current date and time as default values for the input fields
document.getElementById('start_date').value = currentYear + '-' + currentMonth + '-' + currentDay;
document.getElementById('start_time').value = currentHours + ':' + currentMinutes;
document.getElementById('end_date').value = currentYear + '-' + currentMonth + '-' + currentDay;
document.getElementById('end_time').value = currentHours + ':' + currentMinutes;

});

</script>

<style>
    .date-time-container {
    display: flex;
    border: 1px solid #ccc;
    border-radius: 4px;
    /* padding: 5px; */
    margin-left: 14px;
    width: auto;
}
.date-time-separator{
    display: flex;
    border: none;
    border-radius: 4px;
}


.separator {
    align-self: center;
    margin: 7px 22px;
}
.date-input{
    border: none;
}
.date-time-container input {
    flex: 1;
    margin-right: 5px;
    border: none; /* Add this line */
    border-radius: 0; /* Optional: Reset border radius */
    box-shadow: none; /* Optional: Remove box shadow */
}
/* .tab-pane-second{
    display:block !important;
}   */
.fade:not(.show){
    display:none;
}
.hidden{
    display:none !important;
}
.form-head{
    font-size:2rem !important;
    font-weight:700 !important;
}
.modal-header{
    justify-content:center !important;
}
.block{
    box-shadow:0px 4px 8px rgba(0, 0, 0, 0.1);
}
.save-btn{
    font-weight:700;
    font-size: 1.5rem;
    padding: 0.6rem 2.25rem;
}
.save-btn:hover{
    /* background-color:#00008B !important; */
    background:#00008B !important;
}

</style>
<script>
$(document).ready(function() {
    $('#start_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        // endDate: '+0d'
    });

    $('#end_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        // endDate: '+0d'
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
    border: 1px solid;
    border-radius: inherit;
}
.nav-tab-appointment{
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    width: 553px;
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


</style>

<script>
    
$('.btnNext').click(function() {
    $('.nav-pills .active').parent().next('li').find('a').trigger('click');
});

$('.btnPrevious').click(function() {
    $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
});
</script>

<script>
    $(document).ready(function() {
        $("#search").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('appointment/fetch'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#result').html('');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $("#search_patient").keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('appointment/fetch'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_patient').html(data);
                    }
                });
            } else {
                $('#result_patient').html('');
            }
        });
    });
</script>

</body>
</html>
<style>
    .modal.right .modal-content {
    height: 100% !important;
    width: 100% !important;
    border-radius: 0 !important;
}
</style>