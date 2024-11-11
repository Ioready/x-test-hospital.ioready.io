<style>
.select2-container, .select2-drop, .select2-search, .select2-search input {
    width: 290px !important;
}

.dataTables_wrapper {
            margin-top: 20px;
        }

        .dataTables_paginate {
            margin-top: 10px;
        }

        .dataTables_length {
            margin-bottom: 10px;
        }

        .dataTables_info {
            margin-bottom: 10px;
        }

        .dataTables_filter {
            margin-top: 10px;
        }


.custom-badge {
	border-radius: 4px;
	display: inline-block;
	font-size: 12px;
	min-width: 95px;
	padding: 1px 10px;
	text-align: center;
}

    .status-red,
a.status-red {
	background-color: red;
	border: 1px solid #fe0000;
	color: white;
    border-radius:10px;
    padding:2px;
}
.status-green,
a.status-green {
	background-color: green;
	border: 1px solid #00ce7c;
    border-radius:10px;
    padding:2px;
	color: white;
}

.status-yellow,
a.status-yellow {
	background-color: red;
	border: 1px solid #fe0000;
	color: white;
}

    /* Center table data */
    #appointmentTable {
        margin: 20px auto;
        border-collapse: collapse;
        width: 100%;
    }

    #appointmentTable th,
    #appointmentTable td {
        font-size:14px;
        text-align: center;
        vertical-align: middle;
        border: 1px solid #dddddd;
        padding: 8px;
    }

    #appointmentTable th {
        background-color: #f2f2f2;
    }

    
 


</style>

<div id="page-content" style="background-color: whitesmoke;">
        <!-- Datatables Header -->
        <h2><?php echo (isset($headline)) ? ucwords($headline) : "" ?></h2>
        <ul class="breadcrumb breadcrumb-top">
        <li>
        <a href="<?php echo site_url('pwfpanel'); ?>"><?php echo lang('home'); ?></a>
        </li>
        <li>
        <a href="<?php echo site_url('notification'); ?>"><?php echo "Notification"; ?></a>
        </li>
        </ul>
        <!-- END Datatables Header -->


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
                    if ($menu_name == 'Aprove Appointment') { 
                    if($menu_view =='1'){ ?>



            <div class="wrapper wrapper-content animated fadeIn m-4">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content">
                                <div class="row">
                                    
                                    <div id="message"></div>
                                    <div class="col-sm-12">     
                                            <div class="table-responsive">
                                            <table id="appointmentTable" class="table table-striped custom-table">
                                            <thead>
                                                <tr> <th>ID</th>
                                                    <th>Appointment Type ID</th>
                                                    <th>Patient Name</th>
                                                    <!-- <th>Doctor Name</th> -->
                                                    <th>Practitioner Name</th>
                                                    <th>Clinician Name</th>
                                                    <th>Appointment Date</th>
                                                    <th>Appointment Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                        <?php 
                                                        
                                                            $formatted_time = date('Y-m-d');
                                                            foreach ($notifications as $key=>$notification): 
                                                            $appointmentTime = date('g:i A', strtotime($notification->start_date_appointment));
                                                            $end_date_appointment = date('g:i A', strtotime($notification->end_date_appointment));

                                                            // Out Of Office
                                                        
                                                            $out_start_time_at = date('g:i A', strtotime($notification->out_start_time_at));
                                                            $out_end_time_at = date('g:i A', strtotime($notification->out_end_time_at));
                                                            $out_of_office_comment = $notification->out_of_office_comment;

                                                            // Availability

                                                            $start_date_availability = date('g:i A', strtotime($notification->start_date_availability));
                                                            $end_time_date_availability = date('g:i A', strtotime($notification->end_time_date_availability));
                                                            $out_of_office_comment = $notification->out_of_office_comment;

                                                            // theatre Appointment

                                                            $theatre_date_time = date('g:i A', strtotime($notification->theatre_date_time));
                                                            $theatre_time_duration = $notification->theatre_time_duration;
                                                            
                                                            $durationInSeconds = $theatre_time_duration * 60;
                                                            $theatre_end_time = date('g:i A', strtotime($theatre_date_time . " +$durationInSeconds seconds"));
                                                            $theatre_comment = $notification->theatre_comment;
                                                            $theatre_clinician = $notification->theatre_clinician;

                                                            $appointment_date = date('Y-m-d', strtotime($notification->start_date_appointment));

                                                            $out_start_timeAt = date('Y-m-d', strtotime($notification->out_start_time_at));

                                                            $start_dateAvailability = date('Y-m-d', strtotime($notification->start_date_availability));

                                                            $theatre_dateTime = date('Y-m-d', strtotime($notification->theatre_date_time));
                                                            $theatre_admission_date = date('Y-m-d', strtotime($notification->theatre_admission_date_time));
                                                        ?>
                                                <tr>
                                                <td><?php echo $notification->notification_ids;?></td>
                                                <td><?php echo $notification->appointment_type.'_'. $notification->clinic_appointment_id;?></td>
                                                
                                                    <td><img width="28" height="28" src="<?php echo base_url('/assets/img/user.jpg')?>" class="rounded-circle m-r-5" alt="" style="float:left"> &nbsp;  <?php echo $notification->first_name;?></td>
                                                    <!-- <td><?php //echo $notification->doctor_name;?></td> -->
                                                    <td><?php echo $notification->practitioner_name;?></td>
                                                    <td><?php echo $notification->doctor_name;?></td>
                                                    <td><?php if(!empty($appointment_date)){
                                                        echo $appointment_date ?? '';
                                                    }else if(!empty($theatre_admission_date)){
                                                        echo $theatre_admission_date ?? '';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?></td>
                                                    <td>
                                                    <?php 
                                                        if ($appointment_date) {
                                                            
                                                            echo $appointmentTime . ' - ' . $end_date_appointment;
                                                        } elseif ($out_start_timeAt) {
                                                            echo $out_start_time_at . ' - ' .  $out_end_time_at;
                                                        } elseif ($start_dateAvailability) {
                                                            echo $start_date_availability . ' - ' .  $end_time_date_availability;
                                                        } elseif ($theatre_dateTime) {
                                                            echo $theatre_date_time . ' - ' .  $theatre_end_time;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if($menu_update =='1'){
                                                         if($notification->appointment_status == 'Inactive'): ?>
                                                            <span class="custom-badge status-red">Inactive</span> 
                                                        <?php elseif($notification->appointment_status == 'Active'): ?>
                                                            <input type="hidden" class="notification-id" value="<?php echo $notification->notification_ids;?>">
                                                            <select class="statusDropdown custom-badge <?php echo ($notification->appointment_status == 'Active') ? 'status-green' : 'status-red'; ?>">
                                                                <option value="Active"><strong>Active</strong></option>
                                                                <option value="Inactive"><strong>Inactive</strong></option>
                                                            </select>
                                                        <?php else: ?>
                                                            <input type="hidden" class="notification-id" value="<?php echo $notification->notification_ids;?>">
                                                            <select class="statusDropdown custom-badge <?php echo ($notification->appointment_status == 'pending') ? 'status-red' : 'status-green'; ?>">
                                                                <option disabled selected><strong  > Pending</strong></option>
                                                                <option value="Active"><strong>Active</strong></option>
                                                                <option value="Inactive"><strong>Inactive</strong></option>
                                                            </select>
                                                        <?php endif; }?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <?php }}}} if ($this->ion_auth->is_facilityManager()){ ?>

   <div class="wrapper wrapper-content animated fadeIn m-4">

   <h3>Approve Appointment</h3> 
    <div class="row">

        <div class="col-lg-12">
        
            <div class="ibox float-e-margins">
              
                <div class="ibox-content">
                    <div class="row">
                        <?php
                        $message = $this->session->flashdata('success');
                        if (!empty($message)):
                            ?><div class="alert alert-success">
                        <?php echo $message; ?></div><?php endif; ?>
                        <?php
                        $error = $this->session->flashdata('error');
                        if (!empty($error)):
                            ?><div class="alert alert-danger">
                        <?php echo $error; ?></div><?php endif; ?>
                        <div id="message"></div>

                        <div class="col-sm-12"> 
                         
                                <div class="table-responsive" >
                                

                                    <table id="appointmentTable" class="table table-bordered table-hover align-middle text-center">
								
                                    <thead>
									<tr>
										<th>Appointment Type ID</th>
										<th>Patient Name</th>
                                        <!-- <th>Doctor Name</th> -->
                                        <th>Practitioner Name</th>
                                        <th>Clinician Name</th>
										<th>Appointment Date</th>
										<th>Appointment Time</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
                                <?php $formatted_time = date('Y-m-d');

                                foreach ($notifications as $notification)
                                    : 
                                    $appointmentTime = date('g:i A', strtotime($notification->start_date_appointment));
                                    
                                    $end_date_appointment = date('g:i A', strtotime($notification->end_date_appointment));
                                    

                                    // Out Of Office
                            
                                    $out_start_time_at = date('g:i A', strtotime($notification->out_start_time_at));
                                    $out_end_time_at = date('g:i A', strtotime($notification->out_end_time_at));
                                    $out_of_office_comment = $notification->out_of_office_comment;

                                    // Availability

                                    $start_date_availability = date('g:i A', strtotime($notification->start_date_availability));
                                    $end_time_date_availability = date('g:i A', strtotime($notification->end_time_date_availability));
                                    $out_of_office_comment = $notification->out_of_office_comment;

                                    // theatre Appointment

                                    $theatre_date_time = date('g:i A', strtotime($notification->theatre_date_time));
                                    $theatre_time_duration = $notification->theatre_time_duration;
                                    // Convert theatre_time_duration to seconds
                                    $durationInSeconds = $theatre_time_duration * 60;

                                    // Add duration to theatre_date_time
                                    $theatre_end_time = date('g:i A', strtotime($theatre_date_time . " +$durationInSeconds seconds"));

                                    $theatre_comment = $notification->theatre_comment;
                                    $theatre_clinician = $notification->theatre_clinician;

                                    //  print_r($theatre_end_time);
                                    $appointment_date = date('Y-m-d', strtotime($notification->start_date_appointment));

                                    $out_start_timeAt = date('Y-m-d', strtotime($notification->out_start_time_at));

                                    $start_dateAvailability = date('Y-m-d', strtotime($notification->start_date_availability));

                                    $theatre_dateTime = date('Y-m-d', strtotime($notification->theatre_date_time));
                                    $theatre_start_date_time = date('Y-m-d', strtotime($notification->theatre_start_date_time));
                                        
                                ?>
								<tr>
                                    <td><?php echo $notification->appointment_type.'_'. $notification->clinic_appointment_id;?></td>
										<!-- <td>APT0001</td> -->
										<td><img width="28" height="28" src="<?php echo base_url('/assets/img/user.jpg')?>" class="rounded-circle m-r-5" alt="" style="float:left"> &nbsp;  <?php echo $notification->first_name;?></td>
                                        <!-- <td><?php //echo $notification->doctor_name;?></td> -->
										<td><?php echo $notification->practitioner_name;?></td>
                                        <td><?php echo $notification->doctor_name;?></td>
                                        <td><?php echo $appointment_date; ?></td>

										<td>
                                        <?php 
                                            if ($appointment_date) {
                                                
                                                echo $appointmentTime . ' - ' . $end_date_appointment;
                                            } elseif ($out_start_timeAt) {
                                                echo $out_start_time_at . ' - ' .  $out_end_time_at;
                                            } elseif ($start_dateAvailability) {
                                                echo $start_date_availability . ' - ' .  $end_time_date_availability;
                                            } elseif ($theatre_dateTime) {
                                                echo $theatre_date_time . ' - ' .  $theatre_end_time;
                                            }
                                            ?>
                                        </td>
										<td>
                                            <?php if($notification->appointment_status == 'Inactive'): ?>
                                                <span class="custom-badge status-red">Inactive</span> 
                                            <?php elseif($notification->appointment_status == 'Active'): ?>
                                                <input type="hidden" class="notification-id" value="<?php echo $notification->notification_ids;?>">
                                                <select class="statusDropdown custom-badge <?php echo ($notification->appointment_status == 'Active') ? 'status-green' : 'status-red'; ?>">
                                                    <option value="Active"><strong>Active</strong></option>
                                                    <option value="Inactive"><strong>Inactive</strong></option>
                                                </select>
                                            <?php else: ?>
                                                <input type="hidden" class="notification-id" value="<?php echo $notification->notification_ids;?>">
                                                <select class="statusDropdown custom-badge <?php echo ($notification->appointment_status == 'pending') ? 'status-red' : 'status-green'; ?>">
                                                    <option disabled selected><strong  > Pending</strong></option>
                                                    <option value="Active"><strong>Active</strong></option>
                                                    <option value="Inactive"><strong>Inactive</strong></option>
                                                </select>
                                            <?php endif; ?>
                                        </td>
									</tr>
                                    <?php endforeach; ?>
								</tbody>
							</table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</div>

</div>


<?php } ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include DataTables CSS -->
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

    // $('#appointmentTable').DataTable();
    $('.statusDropdown').on('change', function() {
        var selectedStatus = $(this).val();
        var notificationId = $(this).prev('.notification-id').val(); 
        // alert(selectedStatus);
        $.ajax({
            url: '<?php echo base_url('notification/update_notification_doctor'); ?>',
            method: 'POST',
            data: { notificationId: notificationId, status: selectedStatus },
            success: function(response) {
                // Handle success response, if needed
                console.log(response);
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response, if needed
                console.error(xhr.responseText);
            }
        });
    });
});
</script>




















































