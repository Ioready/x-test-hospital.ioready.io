<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
 <style>
    .min-height-data{
        height: 100%!important;
    }
 </style>
 <br><br><br><br><br><br><br><br>
<div id="page-content min-height-data"> 
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('Contactus');?>"><strong>Back</strong></a>
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    
    
 
    
    <div class="block full min-height-data">
        <div class="block-title">
            <h2><strong>Contacts</strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">

        <!-- <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('business/vendors_add') ?>" enctype="multipart/form-data"> -->
            <div class="text-center">
                <h3 class="modal-title text-center"><strong> Basic Details</strong></h3>
            </div>
            <!-- <div class="loaders">
                <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
            </div> -->
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form- mt-4">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <!-- <div class="col-md-2"></div>

                           <div class="col-md-10"> -->
                            <div class="col-md-4">
                            <label class="">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="<?php echo lang('first_name');?>" />
                            </div>
                            <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span> -->
                            
                            <div class="col-md-4">
                            <label class=""><?php echo lang('last_name');?></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="<?php echo lang('last_name');?>" />
                            </div>

                            
                            <div class="col-md-4">
                            <label class=""><?php echo lang('title');?> (Optional)</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="<?php echo lang('title');?>" />
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
                                    <input type="text" class="form-control" name="company" id="company" placeholder="<?php echo lang('company');?>" />
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

                                            <input type="radio" id="contacts_clinician" name="contacts_clinician" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="contacts_clinician" name="contacts_clinician" class="custom-control-input">
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
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
                                    <select id="phone_code" name="phone_type" class="form-control select2" size="1" placeholder="Choose a phone type">
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
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
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
                                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="<?php echo lang('user_email');?>" />
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
                                    <input type="text" class="form-control" name="address_lookup" id="address_lookup" placeholder="Address Lookup" />
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
                                    <input type="text" class="form-control" name="streem_address" id="streem_address" placeholder="Streem Address" />
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
                                    
                                    <select id="country" onchange="getStates(this.value)" name="country" class="form-control select2" size="1">
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
                                <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Post Code" />
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
                                    
                                    <input type="text" class="form-control" name="billing_detail" id="billing_detail" placeholder="Choose a billing details" />
                                 </div>
                                   
                            
                                <div class="col-md-6">
                                    <label class="">Payment reference(optional)</label>
                                    <input type="text" class="form-control" name="payment_reference" id="payment_reference" placeholder="<?php echo lang('Payment Reference');?>" />
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
                                    <input type="text" class="form-control" name="System" id="System" placeholder="System Id" />
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
                                    <input type="text" class="form-control" name="healthcode" id="healthcode" placeholder="Health Code" />
                                </div>
                            
                            </div>
                        </div>
                    </div>

            </div>
            <div class="text-right">
                <button type="submit" id="submit" class="btn btn-sm btn-primary mt-2" style="background:#337ab7;">Save</button>
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