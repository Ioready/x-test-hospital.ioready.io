
<!-- Page content -->
<style>
    #act{
        display: none;
       
    }
    </style>
    <div id="page-content">
        <ul class="breadcrumb breadcrumb-top">
            <li>
                <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url($parent); ?>"><?php echo $title; ?></a>
            </li>
        </ul>
        <!-- Datatables Content -->
        <div class="block full">
            <div class="block-title">
                <h2><strong><?php echo 'Add New Relationship' ?></strong> Panel</h2>
                <?php if ($this->ion_auth->is_admin()) { ?>
                    <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                            <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                        </a></h2>
                <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                    <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                            <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                        </a></h2>
                        <?php } ?>
    
            </div>
            <div class="table-responsive">
                <div class="col-md-12" id="relationship">
                    <div class="form-group">
                        <div class="col-md-12">
                            
                            <label class="control-label">Relation Type</label><br>
                            <select class="form-control" name="relation" id="relation">
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
                

                    <div class="show-hide" id="Anaesthetist">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            
                            <input type="hidden" name="type" id="type" value="Anaesthetist">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"> 
                                            <br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="Emergency_Contact">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Emergency_Contact">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                        <br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="Family_Member">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Family_Member">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                        <br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="GP">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="GP">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                        <br><br>

                                            <label class="">GP Practice</label><br>
                                            <span>You can search by name or postcode</span>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="Insurance_Provider">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Insurance_Provider">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <br><br>

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
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <br><br>

                                            <div class="form-group">          
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label class="">Policy Number</label>
                                                        <input type="text" class="form-control" name="policy_number" id="policy_number" placeholder="<?php echo lang('Policy Number');?>" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="">Authorisation code</label>
                                                        <input type="text" class="form-control" name="authorisation_code" id="authorisation_code" placeholder="<?php echo lang('Authorisation Code');?>" />
                                                    </div>
                                                </div>
                                            </div><br>

                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="Next_Of_kin">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Next_Of_kin">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"><br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="Parent_Guardian">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Parent_Guardian">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"><br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="Paying_Account">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Paying_Account">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <br><br>

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
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="Pharmacy">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Pharmacy">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"><br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                    <div class="show-hide" id="Practitioner">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Practitioner">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"><br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <div class="show-hide" id="Referring_Clinician">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Referring_Clinician">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"><br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <div class="show-hide" id="Social_Worker">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Social_Worker">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"><br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <div class="show-hide" id="Spouse_Partner">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Spouse_Partner">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"><br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <div class="show-hide" id="default">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="">
                                
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12"><br><br>
                                            <label class="">Contact/Company</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="<?php echo lang('Phone Number');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                
            </div>

        </div>
        <!-- END Datatables Content -->
    </div>
    <!-- END Page Content -->
    <div id="form-modal-box"></div>
    </div>
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
$("#Selected").show();

//listen to dropdown for change
$("#relation").change(function(){
  //rehide content on change
  $('.show-hide').hide();
  //unhides current item
  $('#'+$(this).val()).show();
});

});
</script>
    



