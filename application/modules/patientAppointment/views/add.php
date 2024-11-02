<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('patientAppointment');?>">Book Appointment<?php //echo $title;?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong>Book Appointment<?php //echo $title;?></strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Book Appointment<?php //echo (isset($title)) ? ucwords($title) : "" ?></h2>
            </div>
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row" style="margin-right: 10px; margin-left: 10px;">
                        <div class="form-group">


                        <label class="col-md-1 control-label">Infections</label>
                       
                            <div class="col-md-3">
                                        
                                <select id="infections_id" name="infections_id" class="form-control select-chosen" onchange="getAvailableDoctor()">
                                
                                    <option value="">Please Select</option>
                                    
                                    <?php
                                    if (!empty($initial_dx)) {
                                        
                                        foreach ($initial_dx as $initial_d) {
                                            
                                    ?>
                                            <option value="<?php echo $initial_d->id; ?>"><?php echo $initial_d->name; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>


                            <label class="col-md-1 control-label">Doctor</label>
                       
                            <div class="col-md-3">
                                        
                                <select id="doctor" name="doctor_name" class="form-control select-chosen" onchange="getAvailableSlots()">
                                
                                    <option value="">Please Select</option>
                                    
                                    <?php
                                    if (!empty($doctors)) {
                                        
                                        foreach ($doctors as $doctor) {
                                            
                                    ?>
                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->doctor_name; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>

                            <label class="col-md-1 control-label">Date</label>
                            

                            <div class="col-md-3">
                             <input type="date" id="date" name="date" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <!-- <div class="row" style="margin-right: 72px;">

                   
                        <div class="form-group">
                            <label class="col-md-2 control-label">Start Time</label>
                            <div class="col-md-4">
                            <input type="time" id="time_start" name="time_start" class="form-control" required>
                            </div>
                           
                       
                            <label class="col-md-2 control-label">End Time</label>
                            <div class="col-md-4">
                            <input type="time" id="time_end" name="time_end" class="form-control" required>
                            </div>
                           
                        </div>
                    </div>
                    <div class="row" style="margin-right: 72px;">
                    
                        <input type="hidden" id="patient_name" name="patient_name" class="form-control" value="<?php echo $userData->id; ?>">
                          
                    <div class="col-md-12" >
                    <div class="form-group">
                            <label class="col-md-3 control-label">Reason for Appointment:</label>
                            <div class="col-md-9">
                        <textarea id="reason" name="reason" rows="4" cols="50" class="form-control" required></textarea>
                            </div>
                        </div>
                    <div class="space-22"></div>
                </div> -->

               
            </div>
            <div class="text-right">
                <!-- <button type="submit" id="submit" class="btn btn-sm btn-primary" >Save</button> -->
            </div>
        </form>
        
        <!-- Modal -->

                <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointmentModalLabel">Book Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                    <input type="hidden" class="form-control" name="appointment_id" id="appointmentIdInput" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" id="submit" class="btn btn-sm btn-primary" >Yes</button>
                    </div>

                    </form>
                    </div>
                </div>
                </div>

    <table id="appointment-table" class="table">
    <thead>
        <tr>
            <th>Sn.</th>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Action</th>
            <!-- Add more columns if needed -->
        </tr>
    </thead>
    <tbody>
        <!-- Table body will be populated dynamically -->
    </tbody>
</table>
        
    </div>
<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<script>

// JavaScript Function to fetch appointment list based on doctor and date
function fetchAppointments() {
        var doctorId = document.getElementById('doctor').value;
        var date = document.getElementById('date').value;

        if (doctorId && date) {
            $.ajax({
                url: '<?php echo base_url('index.php/patientAppointment/getAvailableSlots'); ?>',
                type: 'POST',
                data: { doctor_id: doctorId, date: date },
                success: function(response) {
                    var tableBody = $('#appointment-table tbody');
                    tableBody.empty(); // Clear existing rows
                    if (response && response.length > 0) {
                        $.each(response, function(index, appointment) {

                            var formattedDate = new Date(appointment.date).toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric'
                            });

                            var time_start = new Date(appointment.time_start);
                            var formattedTimeStart = time_start.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });

                            var time_end = new Date(appointment.time_end);
                            var formattedTimeEnd = time_end.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                            var serialNumber = index + 1;
                            var row = '<tr>' +
                                '<td>' + serialNumber + '</td>' +
                                '<td>' + appointment.first_name + ' ' + appointment.last_name + '</td>' +
                                '<td>' + formattedDate + '</td>' +
                                '<td>' + appointment.time_start + '</td>' +
                                '<td>' + appointment.time_end + '</td>' +
                                '<td> <button type="button" class="btn btn-sm btn-primary book-btn" data-toggle="modal" data-target="#appointmentModal" data-appointment-id="' + appointment.id + '">Book Now</button> </td>' +
                                
                                '</tr>';
                            tableBody.append(row);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="3" style="text-align:center">No appointments found</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    }

    
    $('#doctor').change(fetchAppointments);
    $('#date').change(fetchAppointments);

  
    fetchAppointments();
</script>

<script>




// function fetchAppointmentsDoctor() {
//         var infectionsId = document.getElementById('infections_id').value;
        
//         if (infectionsId) {
//             $.ajax({
//                 url: '<?php //echo base_url('index.php/patientAppointment/getAvailableDoctor'); ?>',
//                 type: 'POST',
//                 data: { infections_id: infectionsId },
//                 success: function(response) {

//                     $('#doctor').empty();

//                     // Add default option
//                     $('#doctor').html($('<option>', {
//                         value: '',
//                         text: 'Select Doctor'
//                     }));

//                     $.each(response, function(index, doctor) {
//                         console.log(doctor.doctor_name);
//                         $("#doctor").append('<option value="'+doctor.id +'">'+doctor.doctor_name+'</option>');
                       
//                     });
//                     },
//                     error: function(xhr, status, error) {
//                     console.error(error);
//                     }
//             });
//         }
//     }

    
    // $('#doctor').change(fetchAppointments);
    // $('#date').change(fetchAppointments);

  
    // fetchAppointmentsDoctor();

</script>
<script>
 $(document).ready(function() {
   
    $('#appointmentModal').on('show.bs.modal', function(event) {
        // Get the button that triggered the modal
        var button = $(event.relatedTarget);

        // Extract appointment ID from the button's data-appointment-id attribute
        var appointmentId = button.data('appointment-id');

        // Update the input field value with the appointment ID
        $('#appointmentIdInput').val(appointmentId);
    });
});


</script>

<script type="text/javascript">
    // $('#date').datepicker({
    //     startView: 2,
    //     todayBtn: "linked",
    //     keyboardNavigation: false,
    //     forceParse: false,
    //     calendarWeeks: true,
    //     autoclose: true,
    //     endDate:'today'       
    // });
/*    $("#zipcode").select2({
        allowClear: true
    });*/
</script>