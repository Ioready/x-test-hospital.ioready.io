<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('dataOperator'); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <!-- Datatables Content -->
    <p style="display:none">
        <?php $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>
    </p>

    <div class="block full">
        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
            </div>
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            
            <div class="form-body">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class=" control-label m-4">First Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" />
                            </div>
                            <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note'); ?></span> -->
                        </div>
                    </div>

                    <div class="col-md-6" style="display:none">
                        <div class="form-group">
                            <label class="m-4 control-label">Login ID</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="login_id" id="login_id" placeholder="Login ID" value="<?php echo $LoginID; ?>" />
                            </div>
                            <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note'); ?></span> -->
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="m-4 control-label">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" />
                            </div>
                            <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note'); ?></span>  -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="m-4 control-label"><?php echo lang('user_email'); ?></label>
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="user_email" id="user_email" placeholder="<?php echo lang('user_email'); ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="m-4 control-label"><?php echo lang('password'); ?></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="password" id="password" placeholder="<?php echo lang('password'); ?>" value="<?php echo randomPassword(); ?>" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="m-4 control-label">Tie Doctor to department</label>
                            <div class="col-md-12">                                
                                    <select id="care_unit_id" name="care_unit_id" class="form-control select2" size="1">
                                        <option value="">Please select</option>
                                        <?php foreach($care_unit as $row){?>
                                                    
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name."(".$row->care_unit_code.")";?></option>
                                                
                                        <?php }?>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label">Country Phone Code</label>
                            <div class="col-md-12">                                
                                    <select id="phone_code" name="phone_code" class="form-control select2" size="1">
                                        <option value="0">Please select</option>
                                        <?php foreach ($countries as $country) { ?>
                                                    
                                        <option value="<?php echo $country->phonecode; ?>"><?php echo $country->sortname . "(" . $country->phonecode . ")"; ?></option>
                                                
                                        <?php } ?>
                                    </select>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label"><?php echo lang('phone_no'); ?></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="<?php echo lang('phone_no'); ?>" />
                            </div>
                             <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note'); ?></span> 
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label">Qualifications</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="qualification" id="qualification" placeholder=""/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="m-4 control-label">Availability</label>
                            <div class="col-md-12">                                
                                    <select id="availability" name="availability" class="form-control select2" size="1">
                                        <option value="">Please select</option>
                                        <?php foreach($initial_dx as $row){?>
                                                    
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                                
                                        <?php }?>
                                    </select>
                            </div>

                            <!-- <div class="col-md-9">                                
                                    <select id="availability_week" name="availability_week" class="form-control select2" size="1">
                                        <option value="">Select Week</option>
                                           
                                        <option value="all">All Week</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>        
                                      
                                    </select>
                            </div>
                            <div class="col-md-9">                                
                                    <select id="availability_week" name="availability_week" class="form-control select2" size="1">
                                        <option value="">Select Day</option>
                                           
                                        <option value="all">All Days</option>
                                        <option value="1">Monday</option>
                                        <option value="2">Tuesday</option>
                                        <option value="3">Wednesday</option>
                                        <option value="4"></option>        
                                      
                                    </select>
                            </div> -->

                            <!-- <div class="availability-list">
                                <h3>Availability</h3>
                                <ul>
                                    <?php foreach ($availability_data as $day => $slots): ?>
                                        <li><strong><?php echo ucfirst($day); ?>:</strong>
                                            <?php if (!empty($slots)): ?>
                                                <?php echo implode(', ', $slots); ?>
                                            <?php else: ?>
                                                Not Available
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div> -->


                        </div>
                    </div>

                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label"><?php echo lang('user_gender'); ?></label>
                            <div class="col-md-12">
                                <label class="checkbox-inline"><input type="radio" name="user_gender" id="user_gender" checked value="MALE">MALE</label>
                                <label class="checkbox-inline"><input type="radio" name="user_gender" id="user_gender" value="FEMALE">FEMALE</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" >
                       <div class="form-group">
                            <label class="m-4 control-label"><?php echo lang('date_of_birth'); ?></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="<?php echo lang('date_of_birth'); ?>" readonly=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                       <div class="form-group">
                         <label class="m-4 control-label">Zipcode Access</label>
                            <div class="col-md-12">
                            <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="<?php echo lang('Zipcode'); ?>"/>

                                 <!-- <select class="" name="zipcode[]" id="zipcode" multiple="" style="width:100%;" placeholder="Select Zipcode">
                                     <option value="">Select Zipcode</option>
                                    
                                </select> -->
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label">Country</label>
                            <div class="col-md-12">
                                 <!-- <input type="text" class="form-control" name="country" id="country" placeholder="Country"/>  -->
                                
                                    <select id="country" onchange="getStates(this.value)" name="country" class="form-control select2" size="1">
                                        <option value="0">Please select</option>
                                            <?php foreach ($countries as $country) { ?>
                                                        
                                            <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                    
                                            <?php } ?>
                                    </select>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="m-4 control-label">State</label>
                            <div class="col-md-12" id="state_div">
                                <!-- <select id="state" onchange="getCities(this.value)" name="state" class="form-control" size="1">
                                    <option value="" disabled selected>Please select</option>
                                </select> -->
                            </div>
                        </div>

                        <!-- <div class="col-md-12" id="state_div">

                        </div> -->

                    </div>

                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label">City</label>
                            <div class="col-md-12" id="city">
                                <!-- <select id="city" name="city" class="form-control select2" size="1"> -->
                                     <!-- <option value="" disabled selected>Please select</option> -->
                                 <!-- </select> -->
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label">Address</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="address1" placeholder=""/>
                            </div>
                        </div>
                    </div>

                 
                    <div class="space-22"></div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" id="submit" class="btn btn-sm btn-primary"  style="background: #337ab7">Save</button>
            </div>
        </form>

    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<script type="text/javascript">
    $('#date_of_birth').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        endDate: 'today'
    });
   


</script>

<script>


function getStates(countryId) {
    $.ajax({
        url: 'dataOperator/getStates',
        type: 'POST',
        dataType: "json",
        data: { id: countryId },
        success: function(response) {
            // console.log('state list', response);
            
            $('#state_div').html(response);
            
        },
        error: function(xhr, status, error) {
            // console.error(xhr.responseText);
        }
    });
}






// Function to fetch cities based on selected state
// Function to fetch cities based on selected state
function getCities(stateId) {
    $.ajax({
        url: 'dataOperator/getCity',
        type: 'POST',
        dataType: "json",
        data: { id: stateId },
        success: function(response) {
    //        var stateData= JSON.stringify(response);
    //        console.log(stateData);
    // var statesDropdown = $('#state'); // Corrected the target element ID
    
    // statesDropdown.empty(); // Clear existing options
    
    // Append new options for each state in the response
    // $.each(response.data, function(index, state) {
    //     statesDropdown.append($('<option>', {
    //         value: state.id_state,
    //         text: state.state
    //     }));
    // });
    $('#city').html(response);
},
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

// Event listener for state selection change
// $('#country').change(function() {
//     var countryId = $(this).val();
//     if (countryId) {
//         getStates(countryId);
//     }
// });

$('#state').change(function() {
    var stateId = $(this).val();
    if (stateId) {
        getCities(stateId); // Call the getCities function with the selected state ID
    }
});


</script>
