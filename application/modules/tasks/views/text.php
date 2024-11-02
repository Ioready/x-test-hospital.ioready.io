<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('tasks');?>"><?php echo $title;?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <!-- Datatables Content -->
    <div class="block full">
    <div class="block-title">
            <?php if ($this->ion_auth->is_subAdmin()) { ?>
                <h2>
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                    <h2>
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
                <?php } ?>
        </div>


        <div class="block-title">
            <h2><strong><?php echo $title;?></strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('index.php/' .$formUrl) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
            </div>
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
            
                                <div class="col-md-12">
                                <h2>Weekly Timetable</h2>
                            <form id="timeSlotForm" action="submit.php" method="post">
                                    
                            <div style="overflow-x: auto; overflow-y: auto; width: auto; height: 500px;">
                            <table class="table table-bordered" style="width: max-content;">
                                <thead>
                                <tr>
                                    <th>Time</th>
                                    <?php foreach($care_unit as $department) { ?>
                                    <th class="day-cell"><?php echo $department->name; ?></th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $start_time = strtotime('07:00');
                                $end_time = strtotime('20:00');
                                $interval = 30 * 60; // 30 minutes interval
                                $index = 1;
                                
                                for ($time = $start_time; $time <= $end_time; $time += $interval) {
                                    $formatted_time = date('H:i', $time); // Format time in 24-hour format
                                ?>
                                    <tr>
                                    <td><?php echo $index; ?></td>
                                    <td class="time-cell"><?php echo $formatted_time; ?></td>
                                    <?php foreach($care_unit as $department) { ?>
                                        <td class="day-cell" data-time="<?php echo $formatted_time; ?>" data-day="<?php echo $department->id; ?>">
                                        <?php echo $formatted_time; ?>
                                        </td>
                                    <?php } ?>
                                    </tr>
                                <?php $index++; } ?>
                                </tbody>
                            </table>
                            </div>

  <!-- <table class="table table-bordered" style="overflow-x: auto; overflow-y: auto; width: 300px; height: 300px;">
    <thead>
      <tr>
        <th>Time</th>

        

        <?php  $countDepartent = count($care_unit);
        
        foreach($care_unit as $key => $department){ ?>

        <th class="day-cell"><?php echo $department->name;?></th>

        <?php  }?>

        
      </tr>
    </thead>
    <tbody>
      <?php
        $start_time = strtotime('07:00');
        $end_time = strtotime('20:00');
        $interval = 30 * 60; // 30 minutes interval
        $index = 1;
        
        for ($time = $start_time; $time <= $end_time; $time += $interval) {
          $formatted_time = date('H:i', $time); // Format time in 24-hour format
      ?>
          <tr>
            <td><?php echo $index; ?></td>
            <td class="time-cell"><?php echo $formatted_time; ?></td>
            <?php for ($day = 1; $day <= $countDepartent; $day++) { ?>
              <td class="day-cell" data-time="<?php echo $formatted_time; ?>" data-day="<?php echo $day; ?>">
                <?php echo $formatted_time; ?>
              </td>
            <?php } ?>
          </tr>
      <?php  $index++; } ?>
    </tbody>
  </table> -->
  <!-- Hidden input fields to store selected time and day -->
  
  <!-- Submit button -->
  <!-- <button type="submit">Submit</button>
</form> -->

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

    

<!-- <table class="table table-bordered">
    <thead>
      <tr>
      <th>Days</th>
        <th colspan="10">Time</th>
        
      </tr>
    </thead>
    <tbody >
    <?php
     
      $start_time = strtotime('07:00');
      $end_time = strtotime('20:00');
      $interval = 30 * 60;
      $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    ?>
        <tr style="overflow-x:auto;">
        <?php foreach ($days as $day) {  ?>
            <td> 
            <?php echo $day; ?>
            </td>
            <?php
             for ($time = $start_time; $time <= $end_time; $time += $interval) {
                $formatted_time = date('H:i', $time);
            ?>           
              <td ><?php echo $formatted_time; ?></td>
          <?php } ?>
        </tr>
    <?php } ?>
  </tbody>
</table> -->

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
        

       
    </div>
<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
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