<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .modal-footer .btn+.btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }

    span.select2.select2-container.select2-container--default {
        width: 100% !important;
    }

    span.select2-selection.select2-selection--multiple {
        min-height: auto !important;
        overflow: auto !important;
        border: solid #ddd0d0 1px;
        color: black;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #d9416c;
    }
</style>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('patient');?>"><strong>Back</strong></a>
        </li>
    </ul>
    
    <div class="block full">

    <?php //print_r($results);die; ?>
        <div class="block-title">
            <h2><strong>Patient</strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">

        
        <input type="hidden"  name="id"  id='name' value="<?php echo $results->patient_id; ?>" /> 

       <div class="alert alert-danger" id="error-box" style="display: none;"></div>
         <div class="form-body">
            
       

<div class="row">
    <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>Basic details</strong></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $results->first_name;?>"/>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $results->last_name;?>"/>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label">Title (Optional)</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $results->full_name;?>"/>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <div class="col-md-12">

                <?php $date =  $results->date_of_birth;;
                $timestamp = strtotime($date);

                $year = date('Y', $timestamp);
                $month = date('m', $timestamp);
                $day = date('d', $timestamp);

                ?>
                <label class="control-label">Date Of Birth</label>
                <input type="text" class="form-control" name="day" id="day" placeholder="Day" maxlength="2" value="<?php echo $day;?>"/>
            </div>
        </div>
    </div>
    <div class="col-md-2" style="padding-top: 10px;">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label"></label>
                <select class="form-control" name="month" id="month">
                    <option value="">Select Month</option>
                    <option value="01" <?php echo ($month == "01") ? "selected" : ""; ?>>January</option>
                    <option value="02" <?php echo ($month == "02") ? "selected" : ""; ?>>February</option>
                    <option value="03" <?php echo ($month == "03") ? "selected" : ""; ?>>March</option>
                    <option value="04" <?php echo ($month == "04") ? "selected" : ""; ?>>April</option>
                    <option value="05" <?php echo ($month == "05") ? "selected" : ""; ?>>May</option>
                    <option value="06" <?php echo ($month == "06") ? "selected" : ""; ?>>June</option>
                    <option value="07" <?php echo ($month == "07") ? "selected" : ""; ?>>July</option>
                    <option value="08" <?php echo ($month == "08") ? "selected" : ""; ?>>August</option>
                    <option value="09" <?php echo ($month == "09") ? "selected" : ""; ?>>September</option>
                    <option value="10" <?php echo ($month == "10") ? "selected" : ""; ?>>October</option>
                    <option value="11" <?php echo ($month == "11") ? "selected" : ""; ?>>November</option>
                    <option value="12" <?php echo ($month == "12") ? "selected" : ""; ?>>December</option>
                </select>
            </div>
        </div>
    </div>
   
    <div class="col-md-2" style="padding-top: 10px;">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label"></label>
                <select class="form-control" name="year" id="year">
                                            <?php
                                            // Get the current year
                                            $current_year = date("Y");

                                            // // Loop through years from 10 years ago to 10 years in the future
                                            for ($i = $current_year - 90; $i <= $current_year + 1; $i++) {
                                                // Check if the current iteration is the current year
                                                $selected = ($i == $year) ? 'selected' : '';

                                                // Output each year as an option
                                                echo "<option value='$i' $selected>$i</option>";
                                            }
                                            ?>
                                        </select>
                <!-- <input type="text" class="form-control" name="year" placeholder="Year" /> -->
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label">Gender</label>
                <select class="form-control" name="gender" id="gender">
    <option value="">Select Gender</option>
    <option value="Male" <?php echo ($results->gender == "MALE") ? "selected" : ""; ?>>Male</option>
    <option value="Female" <?php echo ($results->gender == "FEMALE") ? "selected" : ""; ?>>Female</option>
    <option value="Not_Known" <?php echo ($results->gender == "NOT_KNOW") ? "selected" : ""; ?>>Not Known</option>
    <option value="Indeterminate" <?php echo ($results->gender == "INDETERMINATE") ? "selected" : ""; ?>>Indeterminate</option>
</select>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label">Patient comments(optional)</label>
                <textarea class="form-control" name="comment" id="comment" rows="10"><?php echo $results->comment;?></textarea>
            </div>
        </div>
    </div>
</div>

      

      



<div class="row">
    <!-- <div class="modal-header ">
        <h3 class="modal-title text-center"><strong>Contact details</strong></h3>
    </div> -->

    <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>Contact details</strong></h3>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-6">
                    <label class="">Phone Type</label>
                    <select id="phone_code" name="phone_type" class="form-control select2" size="1" placeholder="Choose a phone type">
                        <option value="" disabled selected>Choose a phone type</option>
                        <option value="mobile" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Mobile</option>
                        <option value="home" <?php echo ($results->phone_code == "home") ? "selected" : ""; ?>>Home</option>
                        <option value="office" <?php echo ($results->phone_code == "office") ? "selected" : ""; ?>>Office</option>
                        <option value="fax" <?php echo ($results->phone_code == "fax") ? "selected" : ""; ?>>Fax</option>
                        <option value="other" <?php echo ($results->phone_code == "other") ? "selected" : ""; ?>>Other</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" value="<?php echo $results->phone;?>" />
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class=""><?php echo lang('user_email');?></label>
                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="<?php echo lang('user_email');?>" value="<?php echo $results->email;?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="control-label"><?php echo lang('password'); ?></label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="<?php echo lang('password'); ?>" value="<?php echo $results->is_pass_token;?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="">Address Lookup</label>
                    <input type="text" class="form-control" name="address_lookup" id="address_lookup" placeholder="Address Lookup" value="<?php echo $results->address;?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="">Street address (Optional)</label>
                    <input type="text" class="form-control" name="streem_address" id="streem_address" placeholder="Street Address" value="<?php echo $results->address2;?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <!-- <div class="col-md-4">
                    <label class="">City</label>
                    <select id="country" name="city" class="form-control select2" size="1">
                        <option value="" disabled selected>Please select</option>
                        <?php foreach($states as $state){?>
                        <option value="<?php echo $state->id;?>"><?php echo $state->name;?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="">PostCode</label>
                    <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Post Code" />
                </div>

                <div class="col-md-4">
                    <label class="">Country</label>
                    <select id="country" name="country" class="form-control select2" size="1">
                        <option value="0">Please select</option>
                        <?php foreach($countries as $country){?>
                        <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                        <?php }?>
                    </select>
                </div> -->


                <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label">Country</label>
                           
                            <div class="col-md-12">
                                 <!-- <input type="text" class="col-md-12 form-control" name="country_id" id="country_in" placeholder="Country"/> <br> -->
                                
                                    <select id="country" onchange="getStates(this.value)" name="country" class="form-control select2" size="1">
                                        <option value="0">Please select</option>
                                            <?php foreach ($countries as $country) { ?>
                                                        
                                            <option value="<?php echo $country->id; ?>" <?php echo $results->country ==$country->id ?'selected':'';?>><?php echo $country->name; ?></option>
                                                    
                                            <?php } ?>
                                    </select>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label">State</label>
                            <div class="col-md-12">
                            <select id="state_id"  name="state_id" class="form-control select2" size="1">
                                       
                            <?php foreach ($states as $state) { ?>
                                                        
                                <option value="<?php echo $state->id_state; ?>" <?php echo $results->state ==$state->id_state ?'selected':'';?>><?php echo $state->state; ?></option>
                                                                
                            <?php } ?>
                            </select>
                            <!-- <span><?php echo $results->state;?></span> -->
                            <!-- <input type="text" class="form-control" name="state_id" id="state_in" placeholder="State Name"/> -->
                            
                        </div>
                            <!-- <div class="col-md-12" id="state_div"> -->
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="m-4 control-label">City</label>
                            <div class="col-md-12">
                            <select id="city_id"  name="city_id" class="form-control select2" size="1">
                               
                            <?php foreach ($cities as $citie) { ?>
                                                        
                                    <option value="<?php echo $citie->id_city; ?>" <?php echo $results->city ==$citie->id_city ?'selected':'';?>><?php echo $citie->city; ?></option>
                                                                
                                    <?php } ?>
                            </select>
                               <!-- <span><?php echo $results->city;?></span> -->
                            <!-- <input type="text" class="form-control" name="city_id" id="city_in" placeholder="City Name"/> -->
                            </div>
                            <!-- <div class="col-md-12" id="city">
                               
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6" >
                       <div class="form-group">
                         <label class="m-4 control-label">Zipcode Access</label>
                            <div class="col-md-12">
                            <input type="text" id="postalCode" class="form-control" placeholder="Enter Postal Code" name="post_code"  value="<?php echo $results->zipcode_access;?>">
                            <!-- <div id="result"></div> -->
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

                
                
                
 </div>


 <div class="row">
    <!-- <div class="modal-header">
        <h3 class="modal-title"><strong>More details</strong></h3>
    </div> -->

    <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>More details</strong></h3>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="">Occupation (optional)</label>
                    <input type="text" class="form-control" name="Occupation" id="Occupation" placeholder="<?php echo 'Occupation' ;?>"  value="<?php echo $results->occupation;?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="">Company (optional)</label>
                    <input type="text" class="form-control" name="Company" id="Company" placeholder="<?php echo 'Company'; ?>"  value="<?php echo $results->company_name;?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="">Religion (optional)</label>
                    <select id="religion" name="religion" class="form-control select2" size="1">
                        <option value="" disabled selected>Please select</option>
                        <option value="Baha'i" <?php echo ($results->religion == "Baha'i") ? "selected" : ""; ?>>Baha'i</option>
                        <option value="Buddhaist" <?php echo ($results->religion == "Buddhaist") ? "selected" : ""; ?>>Buddhaist</option>
                        <option value="Christian" <?php echo ($results->religion == "Christian") ? "selected" : ""; ?>>Christian</option>
                        <option value="Hindu" <?php echo ($results->religion == "Hindu") ? "selected" : ""; ?>>Hindu</option>
                        <option value="Jain" <?php echo ($results->religion == "Jain") ? "selected" : ""; ?>>Jain</option>
                        <option value="Jewish" <?php echo ($results->religion == "Jewish") ? "selected" : ""; ?>>Jewish</option>
                        <option value="Muslim" <?php echo ($results->religion == "Muslim") ? "selected" : ""; ?>>Muslim</option>
                        <option value="Pagan" <?php echo ($results->religion == "Pagan") ? "selected" : ""; ?>>Pagan</option>
                        <option value="Sikh" <?php echo ($results->religion == "Sikh") ? "selected" : ""; ?>>Sikh</option>
                        <option value="Zoroastrian" <?php echo ($results->religion == "Zoroastrian") ? "selected" : ""; ?>>Zoroastrian</option>
                        <option value="Other" <?php echo ($results->religion == "Other") ? "selected" : ""; ?>>Other</option>
                        <option value="None" <?php echo ($results->religion == "None") ? "selected" : ""; ?>>None</option>
                        <option value="Declines_to_Disclose" <?php echo ($results->religion == "Declines_to_Disclose") ? "selected" : ""; ?>>Declines to Disclose</option>
                        <option value="Patient_Religion_Unknown" <?php echo ($results->religion == "Patient_Religion_Unknown") ? "selected" : ""; ?>>Patient Religion Unknown</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="">Ethnicity (optional)</label>
                    <select id="ethnicity" name="ethnicity" class="form-control select2" size="1">
                        <option value="0">Please select</option>
                        <option value="White_British" <?php echo ($results->ethnicity == "White_British") ? "selected" : ""; ?>>White - British</option>
                        <option value="White_Irish" <?php echo ($results->ethnicity == "White_Irish") ? "selected" : ""; ?>>White - Irish</option>
                        <option value="Any_other_White_background" <?php echo ($results->ethnicity == "Any_other_White_background") ? "selected" : ""; ?>>Any other White background</option>
                        <option value="Mixed_White_and_Black_Caribbean" <?php echo ($results->ethnicity == "Mixed_White_and_Black_Caribbean") ? "selected" : ""; ?>>Mixed - White and Black Caribbean</option>
                        <option value="Mixed_White_and_Black_African" <?php echo ($results->ethnicity == "Mixed_White_and_Black_African") ? "selected" : ""; ?>>Mixed - White and Black African</option>
                        <option value="Mixed_White_and_Asian" <?php echo ($results->ethnicity == "Mixed_White_and_Asian") ? "selected" : ""; ?>>Mixed - White and Asian</option>
                        <option value="Any_other_mixed_background" <?php echo ($results->ethnicity == "Any_other_mixed_background") ? "selected" : ""; ?>>Any other mixed background</option>
                        <option value="Asian_Indian" <?php echo ($results->ethnicity == "Asian_Indian") ? "selected" : ""; ?>>Asian - Indian</option>
                        <option value="Asian_Pakistani" <?php echo ($results->ethnicity == "Asian_Pakistani") ? "selected" : ""; ?>>Asian - Pakistani</option>
                        <option value="Asian_Bangladeshi" <?php echo ($results->ethnicity == "Asian_Bangladeshi") ? "selected" : ""; ?>>Asian - Bangladeshi</option>
                        <option value="Black_Caribbean" <?php echo ($results->ethnicity == "Black_Caribbean") ? "selected" : ""; ?>>Black - Caribbean</option>
                        <option value="Black_African" <?php echo ($results->ethnicity == "Black_African") ? "selected" : ""; ?>>Black - African</option>
                        <option value="Any_other_Black_background" <?php echo ($results->ethnicity == "Any_other_Black_background") ? "selected" : ""; ?>>Any other Black background</option>
                        <option value="Black_or_Black_British" <?php echo ($results->ethnicity == "Black_or_Black_British") ? "selected" : ""; ?>>Black or Black British</option>
                        <option value="Chinese" <?php echo ($results->ethnicity == "Chinese") ? "selected" : ""; ?>>Chinese</option>
                        <option value="Any_other_ethnic_group" <?php echo ($results->ethnicity == "Any_other_ethnic_group") ? "selected" : ""; ?>>Any other ethnic group</option>
                        <option value="Not_stated" <?php echo ($results->ethnicity == "Not_stated") ? "selected" : ""; ?>>Not stated</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-2">
                    <input type="checkbox" onclick="checkMe(this.checked);" id="deceased" name="contacts_clinician" class="custom-control-input">
                    <label class="">Deceased</label>
                </div>
                <div class="col-md-10"></div>
            </div>
        </div>
    </div>

    <div class="col-md-12" id="divcheck" style="display:none;">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label" style="padding-left:30px;">Date Of Death (Optional)</label><br>
                <div class="form-group" style="padding-left:20px;">
                    <div class="row">
                        <div class="col-md-1" style="padding-right: 0;">
                            <input type="text" class="form-control" name="death_day" id="death_day" placeholder="Death Day" maxlength="2" value="<?php echo $results->date_of_death;?>" />
                        </div>
                        <div class="col-md-2" style="padding-right: 0;">
                            <select class="form-control" name="death_month" id="death_month">
                                <option value="">Select Month</option>
                                <option value="01" <?php echo ($results->phone_code == "01") ? "selected" : ""; ?>>January</option>
                                <option value="02" <?php echo ($results->phone_code == "02") ? "selected" : ""; ?>>February</option>
                                <option value="03" <?php echo ($results->phone_code == "03") ? "selected" : ""; ?>>March</option>
                                <option value="04" <?php echo ($results->phone_code == "04") ? "selected" : ""; ?>>April</option>
                                <option value="05" <?php echo ($results->phone_code == "05") ? "selected" : ""; ?>>May</option>
                                <option value="06" <?php echo ($results->phone_code == "06") ? "selected" : ""; ?>>June</option>
                                <option value="07" <?php echo ($results->phone_code == "07") ? "selected" : ""; ?>>July</option>
                                <option value="08" <?php echo ($results->phone_code == "08") ? "selected" : ""; ?>>August</option>
                                <option value="09" <?php echo ($results->phone_code == "09") ? "selected" : ""; ?>>September</option>
                                <option value="10" <?php echo ($results->phone_code == "10") ? "selected" : ""; ?>>October</option>
                                <option value="11" <?php echo ($results->phone_code == "11") ? "selected" : ""; ?>>November</option>
                                <option value="12" <?php echo ($results->phone_code == "12") ? "selected" : ""; ?>>December</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="death_year" id="death_year" placeholder="Death Year" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
             
                
                
                                <div class="row">
                                    <!-- <div class="modal-header">
                                        <h3 class="modal-title"><strong> Relationships and emergency contacts</strong></h3>
                                    </div> -->
                                    <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>Relationships and emergency contacts</strong></h3>
            </div>
        </div>
    </div>
                
                                    <div class="col-md-12" >
                                        <div class="form-group">
                                        <div class="col-md-12">
                                                <table>
                                                    
                                                </table>
                                            </div>
                                            
                                            <div class="col-md-12">
                                               
                                                <button class="save-btn" type="button" style="border:#b4bdb4" data-toggle="modal" data-target="#myModal" >Add New Relationship</button>
                                                
                                            </div>
                
                                        </div>
                                    </div>
                
                
                                </div>
                
                                <input type="text" class="form-control" name="storedData" id="storedData" readonly>
                                <input type="text" class="form-control" name="storedDataType" id="storedDataType" readonly>
                                <input type="hidden" class="form-control" name="policy_number" id="policy_number" readonly>
                                <input type="hidden" class="form-control" name="authorisation_code" id="authorisation_code" readonly>
                              
                                <div class="row">
   
    <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>Communication preferences</strong></h3>
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <label for="">These settings will override the reminder and confirmation preferences you set for the practice.</label>
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h4 class=""><strong>Communication preferences</strong></h4>
                
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="checkbox" id="receive_emails" name="receive_emails" class="custom-control-input" value="receive_emails" <?php echo ($results->receive_emails=='receive_emails' ? 'checked' : '');?>>
                            <label class="custom-control-label check-labels" for="customRadioInline1">Receive emails</label>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="receive_sms_messages" name="receive_sms_messages" class="custom-control-input" value="receive_sms_messages" <?php echo ($results->receive_sms_messages=='receive_sms_messages' ? 'checked' : '');?>>
                            <label class="custom-control-label check-labels" for="customRadioInline2">Receive SMS messages</label>                                      
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="has_consented_to_promotional_marketing" name="has_consented_to_promotional_marketing" class="custom-control-input" value="has_consented_to_promotional_marketing" <?php echo ($results->has_consented_to_promotional_marketing=='has_consented_to_promotional_marketing' ? 'checked' : '');?>>
                            <label class="custom-control-label check-labels" for="customRadioInline2">Has consented to promotional marketing</label>                                      
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="receive_payment_reminders" name="receive_payment_reminders" class="custom-control-input" value="receive_payment_reminders" <?php echo ($results->receive_payment_reminders=='receive_payment_reminders' ? 'checked' : '');?>>
                            <label class="custom-control-label check-labels" for="customRadioInline2">Receive payment reminders</label>                                      
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h4 class=""><strong>Privacy policy</strong></h4>
                
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="radio" id="privacy_policy_no_response" name="privacy_policy" class="custom-control-input" value="no_response" <?php echo ($results->privacy_policy=='no_response' ? 'checked' : '');?>>
                            <label class="custom-control-label check-labels" for="customRadioInline1">No response</label>
                        </div>
                        <div class="col-md-12">
                            <input type="radio" id="privacy_policy_accepted" name="privacy_policy" class="custom-control-input" value="accepted" <?php echo ($results->privacy_policy=='accepted' ? 'checked' : '');?>>
                            <label class="custom-control-label check-labels" for="customRadioInline2">Accepted</label>                                      
                        </div>
                        <div class="col-md-12">
                            <input type="radio" id="privacy_policy_rejected" name="privacy_policy" class="custom-control-input" value="rejected" <?php echo ($results->privacy_policy=='rejected' ? 'checked' : '');?>>
                            <label class="custom-control-label check-labels" for="customRadioInline2">Rejected</label>                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
   
    <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>Billing settings</strong></h3>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-6">
                    <label class="">Billing details (optional)</label>
                    <input type="text" class="form-control" name="billing_detail" id="billing_detail" placeholder="Choose a billing details"  value="<?php echo $results->billing_detail;?>"/>
                </div>
                
                <div class="col-md-6">
                    <label class="">Payment reference (optional)</label>
                    <input type="text" class="form-control" name="payment_reference" id="payment_reference" placeholder="Payment Reference"  value="<?php echo $results->payment_reference;?>"/>
                </div>
            </div>
        </div>
    </div>
</div>

                                
<div class="row">
    <!-- <div class="modal-header">
        <h3 class="modal-title"><strong>Card details</strong></h3>
    </div> -->
    <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>Card details</strong></h3>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <input type="text" class="form-control ccFormatMonitor mb-4" name="card_number" id="card_number" placeholder="Card Number"  value="<?php echo $results->card_number;?>">
                    <input type="text" id="inputExpDate" class="form-control mb-4" name="exp_month_year" id="exp_month_year" placeholder="MM / YY" maxlength='7'  value="<?php echo $results->exp_month_year;?>">
                    <input type="password" class="form-control cvv" name="cvv" id="cvv" placeholder="CVV" value="<?php echo $results->cvv;?>">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  
    <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>ID numbers</strong></h3>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="">System</label>
                    <input type="text" class="form-control" name="System_id" id="System_id" placeholder="System Id"  value="<?php echo $results->System_id;?>"/>
                </div>
            </div>
        </div>
    </div>
</div>

                
                                
                                <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Care Unit</label>
                                                    <div class="col-md-9">
                                                        <select id="care_unit" name="care_unit_id" class="form-control select-chosen" size="1" onchange='getPatientId(this.value)'>
                                                            <option value="">Please select</option>
                                                            <?php
                                                            if (!empty($careUnitsUser)) {
                
                
                                                                if (!empty($careUnitsUser)) {
                                                                    foreach ($careUnitsUser as $row) {
                
                                                                        //print_r($row);die;
                                                                        $select = "";
                                                                        if (isset($careUnitID)) {
                                                                            if ($results->care_unit_id == $row->id) {
                                                                                $select = "selected";
                                                                            }
                                                                        }
                                                            ?>
                                                                        <option value="<?php echo $row->id; ?>" <?php echo $results->care_unit_id ==$row->id ?'selected':''; ?>><?php echo $row->name; ?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                            } else {
                
                                                                foreach ($care_unit as $category) { ?>
                
                                                                    <option value="<?php echo $category->id; ?>" <?php echo $results->care_unit_id ==$category->id ?'selected':''; ?>><?php echo $category->name; ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <?php if ($this->ion_auth->is_admin()) { ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Select MD Steward</label>
                                                        <div class="col-md-9">
                                                            <select id="md_steward_id" name="md_steward_id" class="form-control select-chosen" size="1">
                                                                <option value="">Select MD Steward</option>
                                                                <?php foreach ($stawardss as $row) { ?>
                
                                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->first_name . ' ' . $row->last_name; ?></option>
                
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                
                
                                            <?php } else if ($this->ion_auth->is_facilityManager()) { ?>
                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Doctor</label>
                                                        <div class="col-md-9">
                                                            <select id="doctor_id" name="doctor_id" class="form-control select-chosen">
                                                                <option value="">Please Select</option>
                                                                <?php
                                                                if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) {
                                                                ?>
                                                                <option value="<?php echo $doctor->id; ?>"  <?php echo $results->patient_doctor_id ==$doctor->id ?'selected':''; ?>><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>

                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $md_steward_id = $this->session->userdata('user_id');?>
                                                <input type="hidden" class="form-control" name="md_steward_id" id="name" placeholder="Patient Id" maxlength="9" value="<?php echo $md_steward_id?>"/>
                                                
                
                
                                            <?php } else if ($this->ion_auth->is_subAdmin()) { ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Doctor</label>
                                                        <div class="col-md-9">
                                                            <!-- <select id="doctor_id" name="doctor_id" class="form-control select-chosen">
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
                                                            </select> -->

                                                            <select id="doctor_id" name="doctor_id" class="form-control select-chosen">
                                                                <option value="">Please Select</option>
                                                                <?php
                                                                if (!empty($doctors)) {
                                                                    foreach ($doctors as $doctor) {
                                                                ?>
                                                                <option value="<?php echo $doctor->id; ?>" <?php echo $results->patient_doctor_id ==$doctor->id ?'selected':''; ?>><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>

                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Select MD Steward</label>
                                                        <div class="col-md-9">
                                                            <select id="md_steward_id" name="md_steward_id" class="form-control select-chosen" size="1">
                                                                <option value="">Select MD Steward</option>
                                                                <?php foreach ($stawardss as $row) { ?>
                
                                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->first_name . ' ' . $row->last_name; ?></option>
                
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                
                                                <?php }?>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Infection Onset</label>
                                                    <div class="col-md-9">
                                                        <select id="symptom_onset" name="symptom_onset" class="form-control select-chosen" size="1">
                                                            <option value="">Please select</option>
                                                            <option value="Hospital" <?php echo $results->symptom_onset =='Hospital'?'selected':''; ?>>Hospital/CAI</option>
                                                            <option value="Facility" <?php echo $results->symptom_onset =='Facility'?'selected':''; ?>>Facility/HAI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Date of start abx</label>
                                                    <div class="col-md-9">
                                                        <input type="date" class="form-control" name="date_of_start_abx" id="date_of_start_abx"  value="<?php echo $results->date_of_start_abx;?>"/>
                                                    </div>
                                                </div>
                                            </div>
                
                
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Room Number</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="room_number" id="room_number" placeholder="0000" maxlength="4"  value="<?php echo $results->room_number;?>"/>
                                                        <p><b>Note :</b> Room Number can be 3 digit or 4 digit <br> number,if you dont know then write '<b>NA</b>'.</p>
                                                    </div>
                
                                                </div>
                                            </div>
                
                
                                            <div class="modal-header text-center"></div>
                                            <!-- <div class="col-md-12">
                                                <div class="vender_title_admin">
                                                    <h3>Initial </h3>
                                                </div>
                                            </div> -->
                                            <div class="modal-header text-center">
        <div class="col-md-12">
            <div class="vender_title_admin">
                <h3><strong>Initial</strong></h3>
            </div>
        </div>
    </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Diagnosis</label>
                                                    <div class="col-md-9">
                                                        <select id="initial_dx" name="initial_dx" class="form-control select-chosen" size="1">
                                                            <option value="">Please select</option>
                                                            <?php foreach ($initial_dx as $category) { ?>
                                                                <option value="<?php echo $category->id; ?>" <?php echo ($results->initial_dx == $category->id) ? "selected" : ""; ?>><?php echo $category->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Antibiotic Name</label>
                                                    <div class="col-md-9">
                                                        <select id="initial_rx" name="initial_rx" class="form-control select-chosen" size="1">
                                                            <option value="">Please select</option>
                                                            <?php foreach ($initial_rx as $category) { ?>
                                                                <option value="<?php echo $category->id; ?>" <?php echo ($results->initial_rx ==$category->id) ? "selected" : ""; ?>><?php echo $category->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                
                                            
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Days of Therapy</label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control" name="initial_dot" onkeyup="myFunction()" id="initial_dot" placeholder="0"  value="<?php echo $results->initial_dot;?>"/>
                                                        <b style="color:red"><span id="test"></span></b>
                                                        <script>
                                                            function myFunction() {
                                                                var x = document.getElementById("initial_dot").value;
                                                                if (x > 50) {
                                                                    document.getElementById("test").innerHTML = " You are entering a high days on therapy, please confirm that this is correct.";
                                                                } else {
                                                                    document.getElementById("test").innerHTML = "";
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">ABX Checklist</label>
                                                    <div class="col-md-9">
                                                        <select id="infection_surveillance_checklist" name="infection_surveillance_checklist" class="form-control select-chosen" onchange="showDiv(this)" size="1">
                                                            <option value="N/A" <?php echo ($results->infection_surveillance_checklist == "N/A") ? "selected" : ""; ?>>N/A</option>
                                                            <option value="Loeb" <?php echo ($results->infection_surveillance_checklist == "Loeb") ? "selected" : ""; ?>>Loeb</option>
                                                            <option value="McGeer – UTI" <?php echo ($results->infection_surveillance_checklist == "McGeer – UTI") ? "selected" : ""; ?>>McGeer – UTI</option>
                                                            <option value="McGeer – RTI" <?php echo ($results->infection_surveillance_checklist == "McGeer – RTI") ? "selected" : ""; ?>>McGeer – RTI</option>
                                                            <option value="McGeer – GITI" <?php echo ($results->infection_surveillance_checklist == "McGeer – GITI") ? "selected" : ""; ?>>McGeer – GITI</option>
                                                            <option value="McGeer –SSTI" <?php echo ($results->infection_surveillance_checklist == "McGeer –SSTI") ? "selected" : ""; ?>>McGeer –SSTI
                                                            </option>
                                                            <option value="Nhsn -UTI" <?php echo ($results->infection_surveillance_checklist == "Nhsn -UTI") ? "selected" : ""; ?>>NHSN -UTI
                                                            </option>
                                                            <option value="Nhsn -CDI/MDRO" <?php echo ($results->infection_surveillance_checklist == "Nhsn -CDI/MDRO") ? "selected" : ""; ?>>NHSN -CDI/MDRO
                                                            </option>
                
                                                        </select>
                                                        <br />
                                                        <div id="hidden_div" style="display: none;">
                                                            <div style="text-align: right;">
                                                                <button class="save-btn btn btn-sm btn-primary" onclick="myFun()">Print ABX Checklist form</button>
                                                            </div>
                                                            <label> Criteria Met</label>
                                                            <input type="radio" id="criteria_met" name="criteria_met" value="Yes" <?php echo $results->criteria_met == 'Yes'?'checked':''; ?>>
                                                            <label for="criteria_met">YES</label>
                                                            <input type="radio" id="criteria_met" name="criteria_met" value="No"  <?php echo $results->criteria_met == 'No'?'checked':''; ?>>
                                                            <label for="criteria_met">NO</label>
                
                                                        </div>
                
                                                    </div>
                                                </div>
                
                                            </div>
                
                                            <!--  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Culture Source</label>
                                                        <div class="col-md-9">
                                                            <select id="culture_source" name="culture_source" class="form-control select-chosen" size="1">
                                                                    <option value="">Please select</option> 
                                                                    <option value="NA">NA</option>
                                                                    <option value="Blood">Blood</option>
                                                                    <option value="Nares">Nares</option>
                                                                    <option value="Sputum">Sputum</option>
                                                                    <option value="Stool">Stool</option>
                                                                    <option value="Urine">Urine</option>
                                                                    <option value="Wound">Wound</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> -->
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Culture Source</label>
                                                    <div class="col-md-9">
                                                        <select id="culture_source" name="culture_source" class="form-control select-chosen" size="1">
                                                            <option value="">Please select</option>
                                                            <?php foreach ($culture_source as $category) { ?>
                                                                <option value="<?php echo $category->name; ?>" <?php echo ($results->culture_source == $category->name) ? "selected" : ""; ?>><?php echo $category->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <!-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Organism</label>
                                                        <div class="col-md-9">
                                                            <select id="organism" name="organism" class="form-control select-chosen" size="1">
                                                                    <option value="">Please select</option> 
                                                                    <option value="NA">NA</option>
                                                                    <option value="Candida">Candida</option>
                                                                    <option value="C. auris">C. auris</option>
                                                                    <option value="Citrobacter">Citrobacter</option>
                                                                    <option value="Cdiff">Cdiff</option>
                                                                    <option value="Coag Neg Staph">Coag Neg Staph</option>
                                                                    <option value="COVID-19">COVID-19</option>
                                                                    <option value="Enterobacter">Enterobacter</option>
                                                                    <option value="Enterococcus">Enterococcus</option>
                                                                    <option value="Ecoli">Ecoli</option>
                                                                    <option value="ESBL ecoli">ESBL ecoli</option>
                                                                    <option value="ESBL klebsiella">ESBL klebsiella</option>
                                                                    <option value="Klebsiella">Klebsiella</option>
                                                                    <option value="MDRO">MDRO</option>
                                                                    <option value="MRSA">MRSA</option>
                                                                    <option value="MSSA">MSSA</option>
                                                                    <option value="Proteus">Proteus</option>
                                                                    <option value="Pseudomonas">Pseudomonas</option>
                                                                    <option value="Streptococcus">Streptococcus</option>
                                                                    <option value="VRE">VRE</option>
                                                                    <option value="Other">Other</option> 
                                                            </select>
                                                        
                                                        </div>
                                                    </div>
                                                </div> -->
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Organism</label>
                                                    <div class="col-md-9">
                                                        <select id="organism" name="organism" class="form-control select-chosen" size="1">
                                                            <option value="">Please select</option>
                                                            <?php foreach ($organism as $category) { ?>
                                                                <option value="<?php echo $category->name; ?>" <?php echo ($results->organism == $category->name) ? "selected" : ""; ?>><?php echo $category->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Precautions</label>
                                                    <div class="col-md-9">
                                                        <select id="precautions" name="precautions" class="form-control select-chosen" size="1">
                                                            <option value="">Please select</option>
                                                            <?php foreach ($precautions as $category) { ?>
                                                                <option value="<?php echo $category->name; ?>" <?php echo ($results->precautions == $category->name) ? "selected" : ""; ?>><?php echo $category->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                
                
                                            <iframe src='' id='myFrame' hidden>
                                            </iframe>
                                            <!-- <iframe src='http://localhost/IDCARE/aj.pdf' id='myFrame' frameborder='0' style='border:0;' width='300' height='300' hidden>
                                            </iframe> -->
                                            <div class="modal-header text-center"></div>
                                            <!--   <div class="col-md-12">
                                                <div class="vender_title_admin">
                                                    <h3>MD Steward Recommendation</h3>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-md-12">
                                                <div class="vender_title_admin">
                                                    <h3>
                                                        <button type="button" onclick="myFunction4()" class="btn btn-primary" data-toggle="collapse" data-target="#demo1">MD Steward Recommendation <i class="gi gi-circle_plus"></i></button>
                                                    </h3>
                                                </div>
                                            </div> -->
                                            <!-- <div id="demo1" class="collapse"> -->
                                                <!-- <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Infection Surveillance Checklist</label>
                                                    <div class="col-md-9">
                                                        <select id="infection_surveillance_checklist" name="infection_surveillance_checklist" class="form-control select-chosen" size="1">
                                                            <option value="N/A" >N/A</option>
                                                            <option value="Yes" >Yes</option>
                                                            <option value="Not Present" >Not Present</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> -->
                                                <!--  <input type="text" name="to" size="40" value="vajay8679@gmail.com" hidden> -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">MD Steward Response</label>
                                                        <div class="col-md-9">
                                                            <select id="md_stayward_response" name="md_stayward_response" class="form-control select-chosen" onchange="isDirty(this.value)" size="1">
                                                                <option value="">Please select</option>
                                                                <option value="Agree" <?php echo ($results->md_stayward_response == "Agree") ? "selected" : ""; ?>>Agree</option>
                                                                <option value="Disagree" <?php echo ($results->md_stayward_response == "Disagree") ? "selected" : ""; ?>>Disagree</option>
                                                                <option value="NoResponse" <?php echo ($results->md_stayward_response == "NoResponse") ? "selected" : ""; ?>>Neutral</option>
                                                                <option value="Modify" <?php echo ($results->md_stayward_response == "Modify") ? "selected" : ""; ?>>Modify</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">New Diagnosis</label>
                                                        <div class="col-md-9">
                                                            <select id="new_initial_dx" name="new_initial_dx" onchange="isDirty(this.value)" class="form-control select-chosen" size="1">
                                                                <option value="">Please select</option>
                                                                <?php foreach ($initial_dx as $category) { ?>
                                                                    <option value="<?php echo $category->id; ?>" <?php echo ($results->new_initial_dx == $category->id) ? "selected" : ""; ?>><?php echo $category->name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">PSA(Provider Steward Agreement)</label>
                                                        <div class="col-md-9">
                                                            <select id="psa" name="psa" class="form-control select-chosen" onchange="isDirty(this.value)" size="1">
                                                                <option value="">Please select</option>
                                                                <option value="Agree" <?php echo ($results->psa == "Agree") ? "selected" : ""; ?>>Agree</option>
                                                                <option value="Disagree" <?php echo ($results->psa == "Disagree") ? "selected" : ""; ?>>Disagree</option>
                                                                <option value="NoResponse" <?php echo ($results->psa == "NoResponse") ? "selected" : ""; ?>>No Response</option>
                                                                <option value="Neutral" <?php echo ($results->psa == "Neutral") ? "selected" : ""; ?>>Neutral</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">New Antibiotic Name</label>
                                                        <div class="col-md-9">
                                                            <select id="new_initial_rx" name="new_initial_rx" onchange="isDirty(this.value)" class="form-control select-chosen" size="1">
                                                                <option value="">Please select</option>
                                                                <?php foreach ($initial_rx as $category) { ?>
                                                                    <option value="<?php echo $category->id; ?>" <?php echo ($results->new_initial_rx == $category->id) ? "selected" : ""; ?>><?php echo $category->name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">New Days of Therapy</label>
                                                        <div class="col-md-9">
                                                            <input type="number" onchange="isDirty(this.value)" onkeyup="myFunction1()" class="form-control" name="new_initial_dot" id="new_initial_dot" placeholder="0" value="<?php echo $results->new_initial_dot;?>"/>
                                                            <b style="color:red"><span id="test1"></span></b>
                                                            <script>
                                                                function myFunction1() {
                                                                    var x = document.getElementById("new_initial_dot").value;
                                                                    if (x > 50) {
                                                                        document.getElementById("test1").innerHTML = " You are entering a high days on therapy, please confirm that this is correct.";
                                                                    } else {
                                                                        document.getElementById("test1").innerHTML = "";
                                                                    }
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Additional Comment</label>
                                                        <div class="col-md-9">
                                                            <!-- <select id="additional_comment_option" name="additional_comment_option[]" onchange="isDirty(this.value)" class="form-control multiple-select select-chosen" size="1" multiple="multiple">
                                                                <option value="" disabled>Please select</option>
                                                                <option value="Does not meet Loeb/ McGeer Criteria"<?php echo ($results->additional_comment_option == 'Does not meet Loeb/ McGeer Criteria') ? 'selected' : ''; ?> >Does not meet Loeb/ McGeer Criteria</option>
                                                                <option value="Consider shorter antibiotic course" <?php echo ($results->additional_comment_option == 'Consider shorter antibiotic course') ? 'selected' : '' ?>>Consider shorter antibiotic course</option>
                                                                <option value="Antibiotics not recommended" <?php echo ($results->additional_comment_option == 'Antibiotics not recommended') ? 'selected' : '' ?>>Antibiotics not recommended</option>
                                                                <option value="Other/Free Text" <?php echo ($results->additional_comment_option == 'Other/Free Text') ? 'selected' : '' ?>>Other/Free Text</option>
                                                            </select> -->
                                                            <?php
// Decode the selected values as an array
$selected_options = json_decode($results->additional_comment_option, true);
// print_r($selected_options);die;
?>

<select id="additional_comment_option" name="additional_comment_option[]" onchange="isDirty(this.value)" class="form-control multiple-select select-chosen" multiple="multiple">
    <option value="" disabled>Please select</option>
    <option value="Does not meet Loeb/ McGeer Criteria" <?php echo (in_array('Does not meet Loeb/ McGeer Criteria', $selected_options)) ? 'selected' : ''; ?>>Does not meet Loeb/ McGeer Criteria</option>
    <option value="Consider shorter antibiotic course" <?php echo (in_array('Consider shorter antibiotic course', $selected_options)) ? 'selected' : ''; ?>>Consider shorter antibiotic course</option>
    <option value="Antibiotics not recommended" <?php echo (in_array('Antibiotics not recommended', $selected_options)) ? 'selected' : ''; ?>>Antibiotics not recommended</option>
    <option value="Other/Free Text" <?php echo (in_array('Other/Free Text', $selected_options)) ? 'selected' : ''; ?>>Other/Free Text</option>
</select>


                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="space-22"></div>
                                            </div>
                                        </div>
                
                    <!-- <div class="modal-footer"> -->
    




                    <button type="button" class="btn btn-sm btn-default reset-btn" data-dismiss="modal"><?php echo lang('reset_btn'); ?></button>
                    <button type="submit" id="submit" class="save-btn btn btn-sm btn-primary"><?php echo lang('submit_btn'); ?></button>
                </div>
            </form>
        

                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                    <div class="col-md-12" id="relationship">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        
                                                        <label class="control-label">Relation Type</label><br>
                                                        <select class="form-control" name="relation" id="select_relation">
                                                            <option value="default">Select</option>
                                                            <option value="Anaesthetist" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Anaesthetist</option>
                                                            <option value="Emergency_Contact" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Emergency Contact</option>
                                                            <option value="Family_Member" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Family Member</option>
                                                            <option value="GP" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>GP</option>
                                                            <option value="Insurance_Provider" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Insurance Provider</option>
                                                            <option value="Next_Of_kin" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Next Of kin</option>
                                                            <option value="Parent_Guardian" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Parent/Guardian</option>
                                                            <option value="Paying_Account" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Paying Account</option>
                                                            <option value="Pharmacy" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Pharmacy</option>
                                                            <option value="Practitioner" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Practitioner</option>
                                                            <option value="Referring_Clinician" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Referring Clinician</option>
                                                            <option value="Social_Worker" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Social Worker</option>
                                                            <option value="Spouse_Partner" <?php echo ($results->phone_code == "mobile") ? "selected" : ""; ?>>Spouse/Partner</option>
                                                        </select>
                                                            
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        
                                        <div class="col-md-12" id="change_value" style="display:none;">

                                            <div class="show-hide" id="Anaesthetist">
                                                <form class="form-horizontal" role="form" id="Anaesthetist" method="post"  enctype="multipart/form-data">
                                                    
                                                    <input type="hidden" name="type" id="type" value="Anaesthetist">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12"> 
                                                                    
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="Emergency_Contact">
                                                <form class="form-horizontal" role="form" id="Emergency_Contact" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="Emergency_Contact">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                            
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="Family_Member">
                                                <form class="form-horizontal" role="form" id="Family_Member" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="Family_Member">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="GP">
                                                <form class="form-horizontal" role="form" id="GP" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="GP">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                

                                                                    <label class="">GP Practice</label><br>
                                                                    <span>You can search by name or postcode</span>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="Insurance_Provider">
                                                <form class="form-horizontal" role="form" id="Insurance_Provider" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="Insurance_Provider">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    
                                                                    <div class="table-responsive user-setting">          
                                                                        <div style="background-color:#b4bdb4;">
                                                                            <div class="col-md-1">
                                                                                <span class="help-block m-b-none col-md-offset-3"> <i class="fa fa-question-circle" style="font-size:22px;"></i></span>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                            Before connecting insurance providers to relationships, you must first add them to your Practice contacts by going to Contacts > New
                                                                            </div>
                                                                        </div>
                                                                    </div><br>

                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" value="<?php echo $results->relation_number;?>"/>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                

                                                                    <div class="form-group">          
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-6">
                                                                                <label class="">Policy Number</label>
                                                                                <input type="text" class="form-control" name="ip_policy_number" id="ip_policy_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->ip_policy_number;?>"/>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="">Authorisation code</label>
                                                                                <input type="text" class="form-control" name="ip_authorisation_code" id="ip_authorisation_code" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->ip_authorisation_code;?>"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="Next_Of_kin">
                                                <form class="form-horizontal" role="form" id="Next_Of_kin" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                    
                                                    <input type="hidden" name="type" id="type" value="Next_Of_kin">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="Parent_Guardian">
                                                <form class="form-horizontal" role="form" id="Parent_Guardian" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="Parent_Guardian">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="Paying_Account">
                                                <form class="form-horizontal" role="form" id="Paying_Account" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                    
                                                    <input type="hidden" name="type" id="type" value="Paying_Account">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                

                                                                    <div class="table-responsive user-setting">          
                                                                        <div style="background-color:#b4bdb4;">
                                                                            <div class="col-md-1">
                                                                                <span class="help-block m-b-none col-md-offset-3"> <i class="fa fa-question-circle" style="font-size:22px;"></i></span>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                            Before connecting paying accounts to relationships, you must first add them to your Practice contacts by going to Contacts > New
                                                                            </div>
                                                                        </div>
                                                                    </div><br>

                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="Pharmacy">
                                                <form class="form-horizontal" role="form" id="Pharmacy" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="Pharmacy">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>


                                            <div class="show-hide" id="Practitioner">
                                                <form class="form-horizontal" role="form" id="Practitioner" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="Practitioner">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>

                                            <div class="show-hide" id="Referring_Clinician">
                                                <form class="form-horizontal" role="form" id="Referring_Clinician" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                            
                                                    <input type="hidden" name="type" id="type" value="Referring_Clinician">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>

                                            <div class="show-hide" id="Social_Worker">
                                                <form class="form-horizontal" role="form" id="Social_Worker" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="Social_Worker">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>

                                            <div class="show-hide" id="Spouse_Partner">
                                                <form class="form-horizontal" role="form" id="Spouse_Partner" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                
                                                    <input type="hidden" name="type" id="type" value="Spouse_Partner">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>"  value="<?php echo $results->relation_number;?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                </form>
                                            </div>
                                
                                        </div>


                                    </div>       
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                        </div>
                        </div>
                    </div>
    </div>
<!-- END Datatables Content -->
</div>
<!-- END Page Content -->


<script>
$(document).ready(function() {
    $('#Anaesthetist').submit(function(event) {
        event.preventDefault();
       
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#Emergency_Contact').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#Family_Member').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#GP').submit(function(event) {
        event.preventDefault();
        
        // Get the value from the form input
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        // Set the value to the other input field
        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#Insurance_Provider').submit(function(event) {
        event.preventDefault();
        
        // Get the value from the form input
        var formData = $(this).find('input[name="relation_number"]').val();
        var policy_number = $(this).find('input[name="ip_policy_number"]').val();
        var authorisation_code = $(this).find('input[name="ip_authorisation_code"]').val();
        var type = $(this).find('input[name="type"]').val();

        // Set the value to the other input field
        $('#storedData').val(formData);
        $('#policy_number').val(policy_number);
        $('#authorisation_code').val(authorisation_code);
        $('#storedDataType').val(type);

    
    });
});
</script>

<script>
$(document).ready(function() {
    $('#Next_Of_kin').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        // Set the value to the other input field
        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#Parent_Guardian').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();
        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#Paying_Account').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#Pharmacy').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#Practitioner').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        // Set the value to the other input field
        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script><script>
$(document).ready(function() {
    $('#Referring_Clinician').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        // Set the value to the other input field
        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

</script><script>
$(document).ready(function() {
    $('#Social_Worker').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        // Set the value to the other input field
        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>

</script>
<script>
$(document).ready(function() {
    $('#Spouse_Partner').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).find('input[name="relation_number"]').val();
        var type = $(this).find('input[name="type"]').val();

        // Set the value to the other input field
        $('#storedData').val(formData);
        $('#storedDataType').val(type);
    });
});
</script>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


<style>
    .user-setting{
    background-color: #5c99f130;
    padding: 23px;
    border-radius: 5px;
    border: 1px solid #5c99f130;
    }

 </style>
<script>
    $(document).ready(function(){

//hides dropdown content
$(".show-hide").hide();

//unhides first option content
// $("#Selected").show();

//listen to dropdown for change
$("#select_relation").change(function(){
  //rehide content on change
  $('.show-hide').hide();
  
  $('#'+$(this).val()).show();
});

});

$("#select_relation").change(function(selected){
if(selected)
{
document.getElementById("change_value").style.display = "";
$('.show-hide').hide();
  
  $('#'+$(this).val()).show();
} 
else
{
document.getElementById("change_value").style.display = "none";
}
}
);

</script>

<script>
    $('#date_of_start_abx').datepicker({
        todayBtn: "linked",
        format: "mm/dd/yyyy",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
</script>

<script>


function checkMe(selected)
{
if(selected)
{
document.getElementById("divcheck").style.display = "";
} 
else
{
document.getElementById("divcheck").style.display = "none";
}

}

function addRelationship(selected){
if(selected)
{
document.getElementById("relationship").style.display = "";
} 
else
{
document.getElementById("relationship").style.display = "none";
}
}



</script>

<style>
    input {
 
  line-height: 30px;
  padding: 5px; 
}
</style>
<script>
    var app;

(function() {
  'use strict';
  
  app = {
    monthAndSlashRegex: /^\d\d \/ $/, // regex to match "MM / "
    monthRegex: /^\d\d$/, // regex to match "MM"
    
    el_cardNumber: '.ccFormatMonitor',
    el_expDate: '#inputExpDate',
    el_cvv: '.cvv',
    el_ccUnknown: 'cc_type_unknown',
    el_ccTypePrefix: 'cc_type_',
    el_monthSelect: '#monthSelect',
    el_yearSelect: '#yearSelect',
    
    cardTypes: {
      'American Express': {
        name: 'American Express',
        code: 'ax',
        security: 4,
        pattern: /^3[47]/,
        valid_length: [15],
        formats: {
          length: 15,
          format: 'xxxx xxxxxxx xxxx'
        }
      },
      'Visa': {
				name: 'Visa',
				code: 'vs',
        security: 3,
				pattern: /^4/,
				valid_length: [16],
				formats: {
						length: 16,
						format: 'xxxx xxxx xxxx xxxx'
					}
			},
      'Maestro': {
				name: 'Maestro',
				code: 'ma',
        security: 3,
				pattern: /^(50(18|20|38)|5612|5893|63(04|90)|67(59|6[1-3])|0604)/,
				valid_length: [16],
				formats: {
						length: 16,
						format: 'xxxx xxxx xxxx xxxx'
					}
			},
      'Mastercard': {
				name: 'Mastercard',
				code: 'mc',
        security: 3,
				pattern: /^5[1-5]/,
				valid_length: [16],
				formats: {
						length: 16,
						format: 'xxxx xxxx xxxx xxxx'
					}
			} 
    }
  };
  
  app.addListeners = function() {
      $(app.el_expDate).on('keydown', function(e) {
        app.removeSlash(e);
      });

      $(app.el_expDate).on('keyup', function(e) {
        app.addSlash(e);
      });

      $(app.el_expDate).on('blur', function(e) {
        app.populateDate(e);
      });

      $(app.el_cvv +', '+ app.el_expDate).on('keypress', function(e) {
        return e.charCode >= 48 && e.charCode <= 57;
      });  
  };
  
  app.addSlash = function (e) {
    var isMonthEntered = app.monthRegex.exec(e.target.value);
    if (e.key >= 0 && e.key <= 9 && isMonthEntered) {
      e.target.value = e.target.value + " / ";
    }
  };
  
  app.removeSlash = function(e) {
    var isMonthAndSlashEntered = app.monthAndSlashRegex.exec(e.target.value);
    if (isMonthAndSlashEntered && e.key === 'Backspace') {
      e.target.value = e.target.value.slice(0, -3);
    }
  };
  
  app.populateDate = function(e) {
    var month, year;
    
    if (e.target.value.length == 7) {
      month = parseInt(e.target.value.slice(0, -5));
      year = "20" + e.target.value.slice(5);
      
      if (app.checkMonth(month)) {
        $(app.el_monthSelect).val(month);
      } else {
        $(app.el_monthSelect).val(0);
      }
      
      if (app.checkYear(year)) {
        $(app.el_yearSelect).val(year);
      } else {
        $(app.el_yearSelect).val(0);
      }
      
    }
  };
  
  app.checkMonth = function(month) {
    if (month <= 12) {
      var monthSelectOptions = app.getSelectOptions($(app.el_monthSelect));
      month = month.toString();
      if (monthSelectOptions.includes(month)) {
        return true; 
      }
    }
  };
  
  app.checkYear = function(year) {
    var yearSelectOptions = app.getSelectOptions($(app.el_yearSelect));
    if (yearSelectOptions.includes(year)) {
      return true; 
    }
  };
          
  app.getSelectOptions = function(select) {
    var options = select.find('option');
    var optionValues = [];
    for (var i = 0; i < options.length; i++) {
      optionValues[i] = options[i].value;
    }
    return optionValues;
  };
  
  app.setMaxLength = function ($elem, length) {
    if($elem.length && app.isInteger(length)) {
      $elem.attr('maxlength', length);
    }else if($elem.length){
      $elem.attr('maxlength', '');
    }
  };
  
  app.isInteger = function(x) {
    return (typeof x === 'number') && (x % 1 === 0);
  };

  app.createExpDateField = function() {
    $(app.el_monthSelect +', '+ app.el_yearSelect).hide();
    $(app.el_monthSelect).parent().prepend('<input type="text" class="ccFormatMonitor">');
  };
  
  
  app.isValidLength = function(cc_num, card_type) {
    for(var i in card_type.valid_length) {
      if (cc_num.length <= card_type.valid_length[i]) {
        return true;
      }
    }
    return false;
  };

  app.getCardType = function(cc_num) {
    for(var i in app.cardTypes) {
      var card_type = app.cardTypes[i];
      if (cc_num.match(card_type.pattern) && app.isValidLength(cc_num, card_type)) {
        return card_type;
      }
    }
  };

  app.getCardFormatString = function(cc_num, card_type) {
    for(var i in card_type.formats) {
      var format = card_type.formats[i];
      if (cc_num.length <= format.length) {
        return format;
      }
    }
  };

  app.formatCardNumber = function(cc_num, card_type) {
    var numAppendedChars = 0;
    var formattedNumber = '';
    var cardFormatIndex = '';

    if (!card_type) {
      return cc_num;
    }

    var cardFormatString = app.getCardFormatString(cc_num, card_type);
    for(var i = 0; i < cc_num.length; i++) {
      cardFormatIndex = i + numAppendedChars;
      if (!cardFormatString || cardFormatIndex >= cardFormatString.length) {
        return cc_num;
      }

      if (cardFormatString.charAt(cardFormatIndex) !== 'x') {
        numAppendedChars++;
        formattedNumber += cardFormatString.charAt(cardFormatIndex) + cc_num.charAt(i);
      } else {
        formattedNumber += cc_num.charAt(i);
      }
    }

    return formattedNumber;
  };

  app.monitorCcFormat = function($elem) {
    var cc_num = $elem.val().replace(/\D/g,'');
    var card_type = app.getCardType(cc_num);
    $elem.val(app.formatCardNumber(cc_num, card_type));
    app.addCardClassIdentifier($elem, card_type);
  };

  app.addCardClassIdentifier = function($elem, card_type) {
    var classIdentifier = app.el_ccUnknown;
    if (card_type) {
      classIdentifier = app.el_ccTypePrefix + card_type.code;
      app.setMaxLength($(app.el_cvv), card_type.security);
    } else {
      app.setMaxLength($(app.el_cvv));
    }

    if (!$elem.hasClass(classIdentifier)) {
      var classes = '';
      for(var i in app.cardTypes) {
        classes += app.el_ccTypePrefix + app.cardTypes[i].code + ' ';
      }
      $elem.removeClass(classes + app.el_ccUnknown);
      $elem.addClass(classIdentifier);
    }
  };

  
  app.init = function() {

    $(document).find(app.el_cardNumber).each(function() {
      var $elem = $(this);
      if ($elem.is('input')) {
        $elem.on('input', function() {
          app.monitorCcFormat($elem);
        });
      }
    });
    
    app.addListeners();
    
  }();
  
})();
</script>


<script>
    function myFunction4() {
        var txt;
        if (confirm("You are about to ADD the MD Steward recommendations, please confirm or cancel.")) {
            //txt = "You pressed OK!";
            document.getElementById("demo1").style = 'display:block';

        } else {
            //txt = "You pressed Cancel!";
            document.getElementById("demo1").style = 'display:none';
        }
    }


    function showDiv(select) {
        if (select.value == "Loeb" || select.value == "Nhsn -UTI" || select.value == "Nhsn -CDI/MDRO" || select.value == "McGeer – UTI" || select.value == "McGeer – RTI" || select.value == "McGeer – GITI" || select.value == "McGeer –SSTI") {
            document.getElementById('hidden_div').style.display = "block";
        } else {
            document.getElementById('hidden_div').style.display = "none";
        }
    }



    function myFun() {
        event.preventDefault();
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "Loeb") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form1.html", "_blank")
        }

        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "McGeer – UTI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form2.html", "_blank")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "McGeer – RTI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form3.html", "_blank")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "McGeer – GITI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form4.html", "_blank")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "McGeer –SSTI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>application/modules/patient/views/form5.html", "_blank")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "Nhsn -UTI") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>front_assets/images/57.114_uti_blank.pdf")
        }
        if ($("#infection_surveillance_checklist").val() != "N/A" && $("#infection_surveillance_checklist").val() == "Nhsn -CDI/MDRO") {
            alert("Printable ABX Checklist form will appear after clicking OK button. Please complete and submit the form.");
            window.open("<?php echo base_url(); ?>front_assets/images/57.128_LabIDEvent_BLANK")
        }

    }

    $('input[type=radio][name="criteria_met"]').prop('checked', false);
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".multiple-select").select2({
        // maximumSelectionLength: 2
        placeholder: "Please select",
    });
</script>
<style>
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
    .reset-btn{
    font-weight:700;
    color:white;
    font-size: 1.5rem;
    padding: 0.6rem 2.25rem !important;
    background-color: #aad178 !important;
    background:none;
}
.reset-btn:hover{
    color:white;
    background:#7db831 !important;
}
.check-labels{
    font-weight:normal !important;
}
    </style>

<script>


function getStates(countryId) {
   

    $.ajax({
        url: 'patient/getStates',
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
        url: 'patient/getCity',
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

<script>
    // Function to handle the response
    function handleResponse(response) {
        var errorBox = document.getElementById('error-box');
        var successBox = document.getElementById('success-box');

        if (response.status == 1) {
            successBox.innerHTML = response.message;
            successBox.style.display = 'block';
            // Redirect after success
            if (response.url) {
                setTimeout(function() {
                    window.location.href = response.url;
                }, 2000); // Redirect after 2 seconds
            }
        } else {
            errorBox.innerHTML = response.message;
            errorBox.style.display = 'block';
        }
    }

    // Example response data (replace with actual AJAX response)
    var response = <?php echo json_encode($response); ?>;
    handleResponse(response);
</script>


<script type="text/javascript">
$("#contact-form").submit(function(e) {
  $.ajax({
         type: "POST",
         url: '',
         data: $("#submit1").serialize(), // serializes the form's elements.
         success: function(data)
         {
             $("#contact-form").html("<h2 style='color:#2E8B57;text-align:center;'><b>Mail Sent Successfully....!!!</b></h2>");
         }
       });
  e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>