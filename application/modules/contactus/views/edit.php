<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($this->router->fetch_class()); ?>"><?php echo $title;?></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <div class="row">
    <p style="display:none">
    <?php $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>
    </p>
        <div class="col-md-12" >    <div class="block full">
                <div class="block-title">
                    <h2><strong><?php echo $title;?></strong> Panel</h2>
                </div>        
                <form class="form-horizontal" role="form" id="editFormAjaxUser" method="post" action="<?php echo base_url('contactus/update') ?>" enctype="multipart/form-data">
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                    </div>
                    <!-- <div class="loaders">
                        <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif'; ?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">


                        <?php //print_r($results->first_name);die; ?>
                            <div class="col-md-12" style="display:none">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Facility Manager</label>
                                    <div class="col-md-9">  
                                    <input type="text" class="form-control" name="facility_manager_id" id="facility_manager_id" placeholder="Login ID" value="<?php echo $LoginID; ?>"/>                              
                                            <!-- <select id="facility_manager_id" name="facility_manager_id" class="form-control select2" size="1">
                                                <option value="">Please select</option>
                                                <?php foreach($care_unit as $row){?>
                                                            
                                                <option value="<?php echo $row->id;?>" <?php echo ($results->facility_manager_id == $row->id) ? "selected" : ""; ?>><?php echo $row->first_name." ".$row->last_name;?></option>
                                                        
                                                <?php }?>
                                            </select> -->
                                    </div>
                                </div>
                            </div>

            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form- mt-4">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <!-- <div class="col-md-2"></div>

                           <div class="col-md-10"> -->
                            <div class="col-md-4">
                            <label class="">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="<?php echo lang('first_name');?>" value="<?php echo $results->first_name; ?>"/>
                            </div>
                            <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span> -->
                            
                            <div class="col-md-4">
                            <label class=""><?php echo lang('last_name');?></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="<?php echo lang('last_name');?>" value="<?php echo $results->last_name; ?>"/>
                            </div>

                            
                            <div class="col-md-4">
                            <label class=""><?php echo lang('title');?> (Optional)</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="<?php echo lang('title');?>" value="<?php echo $results->title; ?>"/>
                            </div>

                            </div>

                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <div class="col-md-2">

                            </div> -->

                            <!-- <div class="col-md-12"> -->
                                <!-- <div class="col-md-12"> -->
                                    <label class="">Company (Optional)</label>
                                    <input type="text" class="form-control" name="company" id="company" placeholder="<?php echo lang('company');?>" value="<?php echo $results->company; ?>"/>
                                <!-- </div> -->
                            
                            <!-- </div> -->
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <div class="col-md-2"></div> -->

                            <!-- <div class="col-md-10"> -->
                                <!-- <div class="col-md-12"> -->
                                 <label class="">This Contacts is a clinician</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="contacts_clinician" name="contacts_clinician" class="custom-control-input" value="<?php echo $results->contacts_clinician; ?>">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="contacts_clinician" name="contacts_clinician" class="custom-control-input" value="<?php echo $results->contacts_clinician; ?>">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             <!-- </div>
                            </div> -->
                        </div>
                    </div>

                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <div class="col-md-2">

                            </div> -->

                             <!-- <div class="col-md-10">
                                <div class="col-md-12"> -->
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment; ?></textarea>
                                <!-- </div>
                            
                            </div> -->
                        </div>
                    </div>


                    <div class="text-center">
                        <h3 class="modal-title"><strong> Contact details</strong></h3>
                    </div>

                    
                    <div class="col-md-12" >
                        <div class="form-group">
                           <!-- <div class="col-md-2">
                           </div> -->

                           <!-- <div class="col-md-10"> -->
                                <div class="col-md-6">
                                    <label class="">Phone Type</label>
                                    <select id="phone_code" name="phone_type" class="form-control select2" size="1" placeholder="Choose a phone type" value="<?php echo $results->phone_type; ?>">
                                        <option value="" disabled selected>Choose a phone type</option>
                                        <option value="mobile">Mobile</option>
                                        <option value="home">Home</option>
                                        <option value="office">Office</option>
                                        <option value="fax">Fax</option>
                                        <option value="other">Other</option>      
                                    </select>
                                 </div>
                                    <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span> -->
                            
                                <div class="col-md-6">
                                    <label class="">Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" value="<?php echo $results->phone_number; ?>"/>
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>



                    <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <div class="col-md-2">

                            </div> -->

                            <!-- <div class="col-md-10">
                                <div class="col-md-12"> -->
                                    <label class=""><?php echo lang('user_email');?> (Optional)</label>
                                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="<?php echo lang('user_email');?>" value="<?php echo $results->user_email; ?>"/>
                                <!-- </div>
                            
                            </div> -->
                        </div>
                    </div>

                
                    <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <div class="col-md-2">

                            </div> -->

                            <!-- <div class="col-md-10">
                                <div class="col-md-12"> -->
                                    <label class="">Address Lookup</label>
                                    <input type="text" class="form-control" name="address_lookup" id="address_lookup" placeholder="Address Lookup" value="<?php echo $results->address_lookup; ?>"/>
                                <!-- </div>
                            
                            </div> -->
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                            <!-- <div class="col-md-2">

                            </div> -->

                            <!-- <div class="col-md-10">
                                <div class="col-md-12"> -->
                                    <label class="">Street address (Optional)</label>
                                    <input type="text" class="form-control" name="streem_address" id="streem_address" placeholder="Streem Address" value="<?php echo $results->streem_address; ?>"/>
                                <!-- </div>
                            
                            </div> -->
                        </div>
                    </div>
                     


                    <div class="col-md-12" >
                        <div class="form-group">
                          <!-- <div class="col-md-2"></div> -->

                           <!-- <div class="col-md-10"> -->
                           <div class="col-md-4">
                           <div class="form-group">
                            <label class="m-4 control-label">Country*</label>
                                    
                                    <select id="country" onchange="getStates(this.value)" name="country" class="form-control select2" size="1" value="<?php echo $results->country; ?>">
                                        <option value="0">Please select</option>
                                            <?php foreach ($countries as $country) { ?>
                                                        
                                            <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                    
                                            <?php } ?>
                                    </select>
                                    </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="m-4 control-label">State</label>
                                   
                                    <div class="col-md-12" id="state_div">
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="m-4 control-label">City</label>
                                
                                <div class="col-md-12" id="city">
                                
                                </div>
                            </div>
                        </div>
                        </div>

                            <div class="col-md-12">
                            <div class="form-group">
                            <label class="">PostCode (Optional)</label>
                                <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Post Code" value="<?php echo $results->post_code; ?>"/>
                            </div>

                             </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <h3 class="modal-title"><strong> Billing settings</strong></h3>
                    </div>

                    <div class="col-md-12 mt-4" >
                        <div class="form-group">
                           <!-- <div class="col-md-2">
                           </div> -->

                           <!-- <div class="col-md-10"> -->
                                <div class="col-md-6">
                                    <label class="">Billing details(optional)</label>
                                    
                                    <input type="text" class="form-control" name="billing_detail" id="billing_detail" placeholder="Choose a billing details" value="<?php echo $results->billing_detail; ?>"/>
                                 </div>
                                   
                            
                                <div class="col-md-6">
                                    <label class="">Payment reference(optional)</label>
                                    <input type="text" class="form-control" name="payment_reference" id="payment_reference" placeholder="<?php echo lang('Payment Reference');?>" value="<?php echo $results->payment_reference; ?>"/>
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>


                    
                    <div class="text-center">
                        <h3 class="modal-title"><strong> ID numbers</strong></h3>
                    </div>


                    <div class="col-md-12 mt-4" >
                        <div class="form-group">
                            <!-- <div class="col-md-2">

                            </div> -->

                            <!-- <div class="col-md-10"> -->
                                <div class="col-md-12">
                                    <label class="">System</label>
                                    <input type="text" class="form-control" name="System" id="System" placeholder="System Id" value="<?php echo $results->System; ?>"/>
                                </div>
                            
                            <!-- </div> -->
                        </div>
                    </div>


                    <div class="text-center">
                        <h3 class="modal-title"><strong> Healthcode</strong></h3>
                    </div>


                    <div class="col-md-12 mt-4" >
                        <div class="form-group">
                            <!-- <div class="col-md-2">

                            </div> -->

                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label class="">Healthcode identifier (insurance)(optional)</label>
                                    <input type="text" class="form-control" name="healthcode" id="healthcode" placeholder="Health Code" value="<?php echo $results->healthcode; ?>"/>
                                </div>
                            
                            </div>
                        </div>
                    </div>

            </div>
            


                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />
                            <!-- <input type="hidden" name="password" value="<?php echo $results->password; ?>" />
                            <input type="hidden" name="exists_image" value="<?php echo $results->profile_pic; ?>" /> -->
                            <div class="space-22"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit"  class="btn btn-sm btn-primary" id="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div></div>

    </div>

    <!-- Datatables Content -->







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
    /*    $("#zipcode").select2({
     allowClear: true
     });*/
</script>

<script>


function getStates(countryId) {
   

    $.ajax({
        url: 'contactus/getStates',
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
        url: 'contactus/getCity',
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
