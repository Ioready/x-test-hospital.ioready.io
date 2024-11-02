<style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}
input { 
    text-align: justify;
}
</style>
<div id="commonModalNew" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="<?php echo base_url($formUrlAddNew) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title fw-bold"><i class="fa fa-pencil"></i> Add new patient form</h2>
                    </div>
                <div class="modal-body">
                    <!-- <div class="loaders">
                        <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
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
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" style="text-align: justify;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" style="text-align: justify;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Title (Optional)</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" style="text-align: justify;"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Date Of Birth</label>
                                    <input type="text" class="form-control" name="day" id="day" placeholder="Day" maxlength="2" style="text-align: justify;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 10px;">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label"></label>
                                    <select class="form-control" name="month" id="month">
                                        <option value="">Select Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
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
                                                                    $selected = ($i == $current_year) ? 'selected' : '';

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
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Not_Known">Not Known</option>
                                        <option value="Indeterminate">Indeterminate</option>
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
                                    <textarea class="form-control" name="comment" id="comment" rows="10"></textarea>
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
                                            <option value="mobile">Mobile</option>
                                            <option value="home">Home</option>
                                            <option value="office">Office</option>
                                            <option value="fax">Fax</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" style="text-align: justify;"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class=""><?php echo lang('user_email');?></label>
                                        <input type="email" class="form-control" name="user_email" id="user_email" placeholder="<?php echo lang('user_email');?>" style="text-align: justify;"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label"><?php echo lang('password'); ?></label>
                                        <input type="text" class="form-control" name="password" id="password" placeholder="<?php echo lang('password'); ?>" value="<?php echo randomPassword(); ?>" style="text-align: justify;"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="">Address Lookup</label>
                                        <input type="text" class="form-control" name="address_lookup" id="address_lookup" placeholder="Address Lookup" style="text-align: justify;"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="">Street address (Optional)</label>
                                        <input type="text" class="form-control" name="streem_address" id="streem_address" placeholder="Street Address" style="text-align: justify;"/>
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
                                                                            
                                                                <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                                        
                                                                <?php } ?>
                                                        </select>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                            <div class="form-group">
                                                <label class="m-4 control-label">State</label>
                                                <div class="col-md-12">
                                                <!-- <input type="text" class="form-control" name="state_id" id="state_in" placeholder="State Name"/> -->
                                                </div>
                                                <div class="col-md-12" id="state_div">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                            <div class="form-group">
                                                <label class="m-4 control-label">City</label>
                                                <div class="col-md-12">
                                                <!-- <input type="text" class="form-control" name="city_id" id="city_in" placeholder="City Name"/> -->
                                                </div>
                                                <div class="col-md-12" id="city">
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                        <div class="form-group">
                                            <label class="m-4 control-label">Zipcode Access</label>
                                                <div class="col-md-12">
                                                <input type="text" id="postalCode" class="form-control" placeholder="Enter Postal Code" name="post_code" style="text-align: justify;">
                                                <!-- <div id="result"></div> -->
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- </div> -->
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
                                        <input type="text" class="form-control" name="Occupation" id="Occupation" placeholder="<?php echo 'Occupation' ;?>" style="text-align: justify;"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="">Company (optional)</label>
                                        <input type="text" class="form-control" name="Company" id="Company" placeholder="<?php echo 'Company'; ?>" style="text-align: justify;"/>
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
                                            <option value="Baha'i">Baha'i</option>
                                            <option value="Buddhaist">Buddhaist</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Jain">Jain</option>
                                            <option value="Jewish">Jewish</option>
                                            <option value="Muslim">Muslim</option>
                                            <option value="Pagan">Pagan</option>
                                            <option value="Sikh">Sikh</option>
                                            <option value="Zoroastrian">Zoroastrian</option>
                                            <option value="Other">Other</option>
                                            <option value="None">None</option>
                                            <option value="Declines_to_Disclose">Declines to Disclose</option>
                                            <option value="Patient_Religion_Unknown">Patient Religion Unknown</option>
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
                                            <option value="White_British">White - British</option>
                                            <option value="White_Irish">White - Irish</option>
                                            <option value="Any_other_White_background">Any other White background</option>
                                            <option value="Mixed_White_and_Black_Caribbean">Mixed - White and Black Caribbean</option>
                                            <option value="Mixed_White_and_Black_African">Mixed - White and Black African</option>
                                            <option value="Mixed_White_and_Asian">Mixed - White and Asian</option>
                                            <option value="Any_other_mixed_background">Any other mixed background</option>
                                            <option value="Asian_Indian">Asian - Indian</option>
                                            <option value="Asian_Pakistani">Asian - Pakistani</option>
                                            <option value="Asian_Bangladeshi">Asian - Bangladeshi</option>
                                            <option value="Black_Caribbean">Black - Caribbean</option>
                                            <option value="Black_African">Black - African</option>
                                            <option value="Any_other_Black_background">Any other Black background</option>
                                            <option value="Black_or_Black_British">Black or Black British</option>
                                            <option value="Chinese">Chinese</option>
                                            <option value="Any_other_ethnic_group">Any other ethnic group</option>
                                            <option value="Not_stated">Not stated</option>
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
                                                <input type="text" class="form-control" name="death_day" id="death_day" placeholder="Death Day" maxlength="2" />
                                            </div>
                                            <div class="col-md-2" style="padding-right: 0;">
                                                <select class="form-control" name="death_month" id="death_month">
                                                    <option value="">Select Month</option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="death_year" id="death_year" placeholder="Death Year" style="text-align: justify;"/>
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
                                    <!-- <a href="" target="blank">Add new relation</a> -->
                                    <!-- <a href="<?php echo site_url('patient/openRelationship'); ?>" target="blank" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide">Add New Relationship</span></a> -->
                                    <!-- <button type="button" style="border" onclick="addRelationship(this.click);" >Add New Relationship</button> -->
                                    <!-- <button class="save-btn" type="button" style="border:#b4bdb4;" data-toggle="modal" data-target="#myModal" >Add New Relationship</button> -->
                                    
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="text" class="form-control" name="storedData" id="storedData" readonly>
                        <input type="text" class="form-control" name="storedDataType" id="storedDataType" readonly>
                        <input type="hidden" class="form-control" name="policy_number" id="policy_number" readonly>
                        <input type="hidden" class="form-control" name="authorisation_code" id="authorisation_code" readonly>
                    </div> 
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
                                                <input type="checkbox" id="receive_emails" name="receive_emails" class="custom-control-input" value="receive_emails" >
                                                <label class="custom-control-label check-labels" for="customRadioInline1">Receive emails</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" id="receive_sms_messages" name="receive_sms_messages" class="custom-control-input" value="receive_sms_messages">
                                                <label class="custom-control-label check-labels" for="customRadioInline2">Receive SMS messages</label>                                      
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" id="has_consented_to_promotional_marketing" name="has_consented_to_promotional_marketing" class="custom-control-input" value="has_consented_to_promotional_marketing">
                                                <label class="custom-control-label check-labels" for="customRadioInline2">Has consented to promotional marketing</label>                                      
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" id="receive_payment_reminders" name="receive_payment_reminders" class="custom-control-input" value="receive_payment_reminders">
                                                <label class="custom-control-label check-labels" for="customRadioInline2">Receive payment reminders</label>                                      
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <h4 class=""><strong>Privacy policy</strong></h4>
                                    
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="radio" id="privacy_policy_no_response" name="privacy_policy" class="custom-control-input" value="no_response">
                                                <label class="custom-control-label check-labels" for="customRadioInline1">No response</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="radio" id="privacy_policy_accepted" name="privacy_policy" class="custom-control-input" value="accepted">
                                                <label class="custom-control-label check-labels" for="customRadioInline2">Accepted</label>                                      
                                            </div>
                                            <div class="col-md-12">
                                                <input type="radio" id="privacy_policy_rejected" name="privacy_policy" class="custom-control-input" value="rejected">
                                                <label class="custom-control-label check-labels" for="customRadioInline2">Rejected</label>                                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="modal-header">
                            <h3 class="modal-title"><strong>Billing settings</strong></h3>
                        </div> -->
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
                                        <input type="text" class="form-control" name="billing_detail" id="billing_detail" placeholder="Choose a billing details" style="text-align: justify;"/>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="">Payment reference (optional)</label>
                                        <input type="text" class="form-control" name="payment_reference" id="payment_reference" placeholder="Payment Reference" style="text-align: justify;"/>
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
                                        <input type="text" class="form-control ccFormatMonitor mb-4" name="card_number" id="card_number" placeholder="Card Number" style="text-align: justify;">
                                        <input type="text" id="inputExpDate" class="form-control mb-4" name="exp_month_year" id="exp_month_year" placeholder="MM / YY" maxlength='5' style="text-align: justify;">
                                        <input type="password" class="form-control cvv" name="cvv" id="cvv" placeholder="CVV" style="text-align: justify;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->  

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
                                        <input type="text" class="form-control" name="System_id" id="System_id" placeholder="System Id" style="text-align: justify;"/>
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
                                                        if ($careUnitID == $row->id) {
                                                            $select = "selected";
                                                        }
                                                    }
                                        ?>
                                                    <option value="<?php echo $row->id; ?>" <?php echo $select; ?>><?php echo $row->name; ?></option>
                                                <?php
                                                }
                                            }
                                        } else {

                                            foreach ($care_unit as $category) { ?>

                                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
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
                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>

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
                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->first_name. ' '.$doctor->last_name; ?></option>

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
                                        <option value="Hospital">Hospital/CAI</option>
                                        <option value="Facility">Facility/HAI</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date of start abx</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="date_of_start_abx" id="date_of_start_abx" />
                                </div>
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Room Number</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="room_number" id="room_number" placeholder="0000" maxlength="4" style="text-align: justify;"/>
                                    <p><b>Note :</b> Room Number can be 3 digit or 4 digit <br> number,if you dont know then write '<b>NA</b>'.</p>
                                </div>

                            </div>
                        </div>
                        <div class="modal-header text-center"></div>
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
                                                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
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
                                                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Days of Therapy</label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control" name="initial_dot" onkeyup="myFunction()" id="initial_dot" placeholder="0" style="text-align: justify;"/>
                                                        <b style="color:red;"><span id="test"></span></b>
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
                                                            <option value="N/A">N/A</option>
                                                            <option value="Loeb">Loeb</option>
                                                            <option value="McGeer – UTI">McGeer – UTI</option>
                                                            <option value="McGeer – RTI">McGeer – RTI</option>
                                                            <option value="McGeer – GITI">McGeer – GITI</option>
                                                            <option value="McGeer –SSTI">McGeer –SSTI
                                                            </option>
                                                            <option value="Nhsn -UTI">NHSN -UTI
                                                            </option>
                                                            <option value="Nhsn -CDI/MDRO">NHSN -CDI/MDRO
                                                            </option>
                
                                                        </select>
                                                        <br />
                                                        <div id="hidden_div" style="display: none;">
                                                            <div style="text-align: right;">
                                                                <button class="save-btn btn btn-sm btn-primary" onclick="myFun()">Print ABX Checklist form</button>
                                                            </div>
                                                            <label> Criteria Met</label>
                                                            <input type="radio" id="criteria_met" name="criteria_met" value="Yes">
                                                            <label for="criteria_met">YES</label>
                                                            <input type="radio" id="criteria_met" name="criteria_met" value="No">
                                                            <label for="criteria_met">NO</label>
                
                                                        </div>
                
                                                    </div>
                                                </div>
                
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Culture Source</label>
                                                    <div class="col-md-9">
                                                        <select id="culture_source" name="culture_source" class="form-control select-chosen" size="1">
                                                            <option value="">Please select</option>
                                                            <?php foreach ($culture_source as $category) { ?>
                                                                <option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Organism</label>
                                                    <div class="col-md-9">
                                                        <select id="organism" name="organism" class="form-control select-chosen" size="1">
                                                            <option value="">Please select</option>
                                                            <?php foreach ($organism as $category) { ?>
                                                                <option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
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
                                                                <option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
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
                                                                <option value="Agree">Agree</option>
                                                                <option value="Disagree">Disagree</option>
                                                                <option value="NoResponse">Neutral</option>
                                                                <option value="Modify">Modify</option>
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
                                                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
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
                                                                <option value="Agree">Agree</option>
                                                                <option value="Disagree">Disagree</option>
                                                                <option value="NoResponse">No Response</option>
                                                                <option value="Neutral">Neutral</option>
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
                                                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">New Days of Therapy</label>
                                                        <div class="col-md-9">
                                                            <input type="number" onchange="isDirty(this.value)" onkeyup="myFunction1()" class="form-control" name="new_initial_dot" id="new_initial_dot" placeholder="0" style="text-align: justify;"/>
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
                                                            <select id="additional_comment_option" name="additional_comment_option[]" onchange="isDirty(this.value)" class="form-control multiple-select select-chosen" size="1" multiple="multiple">
                                                                <option value="" disabled>Please select</option>
                                                                <option value="Does not meet Loeb/ McGeer Criteria ">Does not meet Loeb/ McGeer Criteria</option>
                                                                <option value="Consider shorter antibiotic course ">Consider shorter antibiotic course</option>
                                                                <option value="Antibiotics not recommended ">Antibiotics not recommended</option>
                                                                <option value="Other/Free Text">Other/Free Text</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Additional Comment</label>
                                                        <div class="col-md-9">
                                                            <input type="text" onchange="isDirty(this.value)" class="form-control" name="additional_comment_option[]" id="additional_comment_option" placeholder="Add your comment" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="space-22"></div>
                                            </div>
                                        <!-- </div> -->
                
                    <!-- <div class="modal-footer"> -->

                    <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <button  style="background: #337ab7" type="submit" class="btn btn-sm btn-primary m-2" ><?php echo lang('submit_btn');?></button>
                </div> 

                                                <!-- <button type="button" class="btn btn-sm btn-default reset-btn" data-dismiss="modal"><?php echo lang('reset_btn'); ?></button>
                                                <button type="submit" id="submit" class="save-btn btn btn-sm btn-primary"><?php echo lang('submit_btn'); ?></button> -->
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
                                                            <option value="Anaesthetist">Anaesthetist</option>
                                                            <option value="Emergency_Contact">Emergency Contact</option>
                                                            <option value="Family_Member">Family Member</option>
                                                            <option value="GP">GP</option>
                                                            <option value="Insurance_Provider">Insurance Provider</option>
                                                            <option value="Next_Of_kin">Next Of kin</option>
                                                            <option value="Parent_Guardian">Parent/Guardian</option>
                                                            <option value="Paying_Account">Paying Account</option>
                                                            <option value="Pharmacy">Pharmacy</option>
                                                            <option value="Practitioner">Practitioner</option>
                                                            <option value="Referring_Clinician">Referring Clinician</option>
                                                            <option value="Social_Worker">Social Worker</option>
                                                            <option value="Spouse_Partner">Spouse/Partner</option>
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                                <input type="text" class="form-control" name="ip_policy_number" id="ip_policy_number" placeholder="<?php echo lang('Phone Number');?>" />
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="">Authorisation code</label>
                                                                                <input type="text" class="form-control" name="ip_authorisation_code" id="ip_authorisation_code" placeholder="<?php echo lang('Phone Number');?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary save-btn">Save</button>
                                                <!-- </form> -->
                                            </div>



                                            <div class="show-hide" id="Next_Of_kin">
                                                <form class="form-horizontal" role="form" id="Next_Of_kin" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                                                    
                                                    <input type="hidden" name="type" id="type" value="Next_Of_kin">
                                                        
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="">Contact/Company</label>
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                                                    <input type="text" class="form-control" name="relation_number" id="relation_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                            <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div> -->

                        </div>
                        </div>
                    </div>

                    <style>
    .user-setting{
    background-color: #5c99f130;
    padding: 23px;
    border-radius: 5px;
    border: 1px solid #5c99f130;
    }

 </style>

 
<style>
    input {
 
  line-height: 30px;
  padding: 5px; 
}
</style>


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
        url: 'appointment/getStates',
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
        url: 'appointment/getCity',
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
</script>
<script>
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



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script>
    $(".multiple-select").select2({
        // maximumSelectionLength: 2
        placeholder: "Please select",
    });
</script> -->
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

                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <button  style="background: #337ab7" type="submit" id="submit" class="btn btn-sm btn-primary m-2" ><?php echo lang('submit_btn');?></button>
                </div> -->

            <!-- </form> -->
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>