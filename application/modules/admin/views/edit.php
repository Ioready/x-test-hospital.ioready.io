<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('facilityManager');?>"><?php echo $title;?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong><?php echo $title;?></strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="editFormAjaxUser" method="post" action="<?php echo base_url('index.php/admin/update') ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
            </div>
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
                <div class="form-body">
                        <div class="row">
                            
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Admin Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Admin Name" value="<?php echo $results->hospital_name; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $results->first_name; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $results->last_name; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label"><?php echo lang('user_email'); ?></label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $results->email; ?>" readonly/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label"><?php echo "Current Password"; ?></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="current_password" id="current_password" value="<?php echo $results->is_pass_token; ?>" readonly=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label"><?php echo lang('new_password'); ?></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="new_password" id="new_password"/>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label"><?php echo lang('user_gender');?></label>
                                    <div class="col-md-12">
                                    
                                        <label class="checkbox-inline"><input type="radio" name="user_gender" id="user_gender" <?php echo ($results->gender == "MALE") ? 'checked' : ''; ?> value="MALE">MALE</label>
                                        <label class="checkbox-inline"><input type="radio" name="user_gender" id="user_gender" <?php echo ($results->gender == "FEMALE") ? 'checked' : ''; ?> value="FEMALE">FEMALE</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label"><?php echo lang('date_of_birth');?></label>
                                    <div class="col-md-12">
                                    <input type="text" class="form-control readonly" name="date_of_birth" id="date_of_birth" placeholder="<?php echo lang('date_of_birth');?>" value="<?php echo $results->date_of_birth; ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Country Phone Code</label>
                                    <div class="col-md-12">                                
                                            <select id="phone_code" name="phone_code" class="form-control select2" size="1">
                                                <option value="0">Please select</option>
                                                <?php foreach($countries as $country){?>
                                                    
                                                    <option value="<?php echo $country->id; ?>" <?php echo ($results->phone_code == $country->id) ? "selected" : ""; ?>><?php echo $country->sortname."(".$country->phonecode.")";?></option>
                                                
                                                    
                                                <?php }?>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label"><?php echo lang('phone_no'); ?></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="<?php echo lang('phone_no'); ?>" value="<?php echo $results->phone; ?>"/>
                                    </div>
                                     <span class="help-block m-b-none col-md-offset-1"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note'); ?></span> 
                                </div>
                            </div>
                    
                  

                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Country</label>
                           
                                        <div class="col-md-12">
                                 <!-- <input type="text" class="col-md-12 form-control" name="country_id" id="country_in" placeholder="Country"/> <br> -->
                                
                                        <select id="country" onchange="getStates(this.value)" name="country" class="form-control select2" size="1">
                                            <option value="0">Please select</option>
                                                 <?php foreach ($countries as $country) { ?>
                                                        
                                            <option value="<?php echo $country->id; ?>" <?php echo ($results->country == $country->id) ? "selected" : ""; ?>><?php echo $country->name; ?></option>
                                                    
                                                <?php } ?>
                                        </select>
                               
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">State</label>
                                    <div class="col-md-12">
                                    
                                    <select id="country" name="state" class="form-control select2" size="1">
                                            <option value="" disabled selected>Please select</option>
                                            <?php foreach ($states as $state) { ?>

                                                <option value="<?php echo $state->id_state; ?>"  <?php echo ($results->state == $state->id_state) ? "selected" : ""; ?>><?php echo $state->state; ?></option>
                                                <?php } ?>
                                    </select>
                                    </div>
                                    <div class="col-md-12" id="state_div">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">City</label>
                                    <!-- <div class="col-md-12"> -->
                                    

                                    <!-- <input type="text" class="form-control" name="city_id" id="city_in" placeholder="City Name"/> -->
                                    <!-- </div> -->

                                    <div class="col-md-12">
                                        <select id="country" name="city" class="form-control select2" size="1">
                                            <option value="" disabled selected>Please select</option>
                                            <?php foreach ($cities as $city) { ?>

                                                <option value="<?php echo $city->id_city; ?>"  <?php echo ($results->city == $city->id_city) ? "selected" : ""; ?>><?php echo $city->city; ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12" id="city">
                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Zipcode Access</label>
                                    <div class="col-md-12">
                                    <input type="text" id="postalCode" class="form-control" placeholder="Enter Postal Code" name="zipCode" value="<?php echo $results->zipcode_access; ?>">
                                    <!-- <div id="result"></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label class="m-4 control-label">Address</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="address1" value="<?php echo $results->address1; ?>"/>
                                    </div>
                                </div>
                            </div>


                    

                        <input type="hidden" name="id" value="<?php echo $results->id; ?>" />
                        <input type="hidden" name="password" value="<?php echo $results->password; ?>" />
                        <input type="hidden" name="exists_image" value="<?php echo $results->profile_pic; ?>" />
                        <div class="space-22"></div>
                    </div>
            </div>
            <div class="text-right">
            <button type="submit" id="submit" class="btn btn-sm text-white" style="background-color: #337ab7;">
            Save
        </button>

        <!-- <div class="modal-footer">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit"  class="btn btn-sm btn-primary" style="background: #337ab7;" id="submit">Save Changes</button>
                        </div>
                    </div> -->

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
        endDate:'today'       
    });

</script>

<script>


function getStates(countryId) {
   

    $.ajax({
        url: 'admin/getStates',
        type: 'POST',
        dataType: "json",
        data: { id: countryId },
        success: function(response) {
            $('#state_div').html(response);
            
        },
        error: function(xhr, status, error) {
            // console.error(xhr.responseText);
        }
    });
}


function getCities(stateId) {
    $.ajax({
        url: 'admin/getCity',
        type: 'POST',
        dataType: "json",
        data: { id: stateId },
        success: function(response) {
   
    $('#city').html(response);
},
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

</script>

    <script>
        $(document).ready(function() {
            $('#postalCode').on('keyup', function() {
                var postalCode = $(this).val();
                
                    $.ajax({
                        url: 'https://data.opendatasoft.com/api/records/1.0/search/',
                        data: {
                            dataset: 'geonames-postal-code@public',
                            q: postalCode,
                            // rows: 1
                        },
                        success: function(response) {
                            var records = response.records;
                            if (records.length > 0) {
                                var record = records[0].fields;
                                var html = '<p>City: ' + record.place_name + '</p>';
                                html += '<p>State: ' + record.admin_name1 + '</p>';
                                html += '<p>Country: ' + record.country_code + '</p>';
                                if(record.country_code == 'GB'){
                                    var countryData = 'United Kingdom';
                                }else{
                                    var countryData = record.country_code;
                                }
                                $('#city_in').val(record.place_name);

                                $('#state_in').val(record.admin_name1);

                                $('#country_in').val(countryData);

                                $('#result').html(html);


                            } else {
                                $('#result').html('<p>No results found</p>');
                            }
                        },
                        error: function() {
                            $('#result').html('<p>An error occurred while fetching data</p>');
                        }
                    });
                
            });
        });
    </script>

    
