<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('product');?>">product</a>
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    
    
 
    
    <div class="block full">
        <div class="block-title">
            <h2><strong>Contacts</strong> Panel</h2>
        </div>
        <!-- <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data"> -->

        <!-- <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('business/vendors_add') ?>" enctype="multipart/form-data"> -->
            <div class="modal-header">
                <h3 class="modal-title"><strong> New Product</strong></h3>
            </div>
            
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row">
                <p style="padding-left: 60px;">Products are anything you provide that you need to invoice for. They include appointments, labs, medications, and memberships. You must have at least one bookable product set up in order to start booking appointments. 
You can upload product lists from Semble's lab partners from the Lab settings page.</p>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-2"></div>

        <div class="col-md-10">
            <h2><span for="" style="float:left"><strong>Product</strong></span></h2><br><br>
            <div class="col-md-4">
                <label class="">Type</label>
                <select id="type" name="type" class="form-control" size="1">
                    <option value="Selected">Select</option>
                    <option value="Medication">Medication</option>
                    <option value="Vaccine">Vaccine</option>
                    <option value="Lab">Lab</option>
                    <option value="Appointment">Appointment</option>
                    <option value="Pathway">Pathway</option>
                    <option value="Membership">Membership</option>
                    <option value="Procedure">Procedure</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
    </div>
</div>

                    

                <div class="show-hide" id="Medication">

                           <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Medication">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" />
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            This is an appointment that can be booked in the calendar
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> More details</strong></h4>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="product_code" placeholder="<?php echo lang('product code');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="serial_number" placeholder="<?php echo lang('Serial Number');?>" />
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Stock Level</label>
                                    <input type="text" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Healthcode</strong></h4>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Do you want to send invoices for this product to Healthcode?</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Contracts</strong></h4>
                    </div>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Set different prices for the same product, depending on which contact or insurance provider the patient has as their payer. You must first add the contact or insurance providers on the Contacts page.</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-5">

                                        <a href="#">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Add contract pricing
                                        </a>
                                       
                                    </div>
                                    
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>



                <div class="show-hide" id="Vaccine">

                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                        <br><br>
                        <input type="hidden" name="type" id="type" value="Vaccine">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" />
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="appointment_booked" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            This is an appointment that can be booked in the calendar
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> More details</strong></h4>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" />
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Stock Level</label>
                                    <input type="text" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Healthcode</strong></h4>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Do you want to send invoices for this product to Healthcode?</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Contracts</strong></h4>
                    </div>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Set different prices for the same product, depending on which contact or insurance provider the patient has as their payer. You must first add the contact or insurance providers on the Contacts page.</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-5">

                                        <a href="#">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Add contract pricing
                                        </a>
                                       
                                    </div>
                                    
                                    </div>
                             </div>
                            </div>
                        </div>

                        
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="show-hide" id="Lab">

                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                        <br><br>
                        <input type="hidden" name="type" id="type" value="Lab">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" />
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            This is an appointment that can be booked in the calendar
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> More details</strong></h4>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" />
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Stock Level</label>
                                    <input type="text" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Healthcode</strong></h4>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Do you want to send invoices for this product to Healthcode?</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Contracts</strong></h4>
                    </div>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Set different prices for the same product, depending on which contact or insurance provider the patient has as their payer. You must first add the contact or insurance providers on the Contacts page.</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-5">

                                        <a href="#">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Add contract pricing
                                        </a>
                                       
                                    </div>
                                    
                                    </div>
                             </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                    </div>

                </div>

                <div class="show-hide" id="Appointment">
                    
                    <br><br>
                    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                        <input type="hidden" name="type" id="type" value="Appointment">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" />
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="1" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            This is an appointment that can be booked in the calendar
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>


                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Appointment Options</strong></h4>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Duration (mins)</label>
                                    <input type="text" class="form-control" name="duration" id="duration" placeholder="<?php echo lang('duration');?>" />
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                <label for=""> Color</label>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="color" value="1" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="appointment_video_consult" value="1" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            This appointment is a video consultation
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="online_booking" value="1" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            Enable pre-payment for online booking (you must have Payment Services connected in Integrations)
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="manually_confirm" value="1" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            Manually confirm these appointments on the calendar
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-12">

                                    <label class="">Add Locations</label>
                                    <!-- <div class="col-md-10"> -->
                                        <select id="location" name="location" class="form-control select-chosen" size="1" onchange='getPatientId(this.value)'>
                                            <option value="">Please select</option>
                                            <?php
                                                if (!empty($clinic_location)) {
                                                    foreach ($clinic_location as $clinic_locations) {
                                                ?>
                                                        <option value="<?php echo $clinic_locations->id; ?>"><?php echo $clinic_locations->clinic_location; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-12">

                                    <label class="">Add Clinicians</label>
                                    <!-- <div class="col-md-10"> -->
                                        <select id="clinicians" name="clinicians" class="form-control select-chosen" size="1" onchange='getPatientId(this.value)'>
                                            <option value="">Please select</option>
                                            <?php
                                                if (!empty($clinic_location)) {
                                                    foreach ($clinic_location as $clinic_locations) {
                                                ?>
                                                        <option value="<?php echo $clinic_locations->id; ?>"><?php echo $clinic_locations->name; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>


                    


                    <div class="modal-header">
                        <h4 class="modal-title"><strong> More details</strong></h4>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" />
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Stock Level</label>
                                    <input type="text" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Healthcode</strong></h4>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Do you want to send invoices for this product to Healthcode?</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Contracts</strong></h4>
                    </div>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Set different prices for the same product, depending on which contact or insurance provider the patient has as their payer. You must first add the contact or insurance providers on the Contacts page.</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-5">

                                        <a href="#">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Add contract pricing
                                        </a>
                                       
                                    </div>
                                    
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>

                <div class="show-hide" id="Pathway">

                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                        <input type="hidden" name="type" id="type" value="Pathway">
                        <br><br>
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" />
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            This is an appointment that can be booked in the calendar
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> More details</strong></h4>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" />
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Stock Level</label>
                                    <input type="text" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Healthcode</strong></h4>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Do you want to send invoices for this product to Healthcode?</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Contracts</strong></h4>
                    </div>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Set different prices for the same product, depending on which contact or insurance provider the patient has as their payer. You must first add the contact or insurance providers on the Contacts page.</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-5">

                                        <a href="#">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Add contract pricing
                                        </a>
                                       
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <button class="btn btn-primary">Submit

                        </button>
                        </form>
                </div>

                <div class="show-hide" id="Membership">
                        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                        <br><br>
                        <input type="hidden" name="type" id="type" value="Membership">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">


                           <div class="col-md-4">
                                    <label class="">Renewal</label>
                                    <select id="renewal" name="renewal" class="form-control select2" size="1" placeholder="Choose a phone type">
                                        <option value="" disabled selected>Select</option>
                                        <option value="Monthely">Monthely</option>
                                        <option value="Yearly">Yearly</option>
                                              
                                    </select>
                                 </div>



                                <div class="col-md-4">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            This is an appointment that can be booked in the calendar
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> More details</strong></h4>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" />
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Stock Level</label>
                                    <input type="text" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Healthcode</strong></h4>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Do you want to send invoices for this product to Healthcode?</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Contracts</strong></h4>
                    </div>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Set different prices for the same product, depending on which contact or insurance provider the patient has as their payer. You must first add the contact or insurance providers on the Contacts page.</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-5">

                                        <a href="#">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Add contract pricing
                                        </a>
                                       
                                    </div>
                                    
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="show-hide" id="Procedure">
                    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                    <input type="hidden" name="type" id="type" value="Procedure">
                        <br><br>
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" />
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            This is an appointment that can be booked in the calendar
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> More details</strong></h4>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" />
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Stock Level</label>
                                    <input type="text" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Healthcode</strong></h4>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Do you want to send invoices for this product to Healthcode?</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Contracts</strong></h4>
                    </div>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Set different prices for the same product, depending on which contact or insurance provider the patient has as their payer. You must first add the contact or insurance providers on the Contacts page.</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-5">

                                        <a href="#">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Add contract pricing
                                        </a>
                                       
                                    </div>
                                    
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>


                <div class="show-hide" id="Other">
                                            
                    <br><br>
                    <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                    <input type="hidden" name="type" id="type" value="Other">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" />
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;"> 
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="appointment_booked" value="" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                     This is an appointment that can be booked in the calendar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-header">
                        <h4 class="modal-title"><strong> More details</strong></h4>
                    </div>


                <div class="col-md-12">
                    <div class="form-group">
                           <div class="col-md-2">
                           </div>
                            <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" />
                                </div>

                            </div>
                    </div>
                </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-4">
                                    <label class="">Stock Level</label>
                                    <input type="text" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" />
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Comments (Optional)</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Healthcode</strong></h4>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Do you want to send invoices for this product to Healthcode?</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-1">

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Yes</label>                                      
                                    </div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal-header">
                        <h4 class="modal-title"><strong> Contracts</strong></h4>
                    </div>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

                <div class="col-md-12" >
                    <div class="form-group">
                            <div class="col-md-2"></div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                 <label class="">Set different prices for the same product, depending on which contact or insurance provider the patient has as their payer. You must first add the contact or insurance providers on the Contacts page.</label> <br>
                                 
                                    <div class="form-group">
                                        <div class="col-md-5">

                                        <a href="#">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Add contract pricing
                                        </a>
                                       
                                    </div>
                                    
                                    </div>
                             </div>
                            </div>
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

                <form>

            </div>

        <!-- </form> -->
        
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
    $(document).ready(function(){

//hides dropdown content
$(".show-hide").hide();

//unhides first option content
$("#Selected").show();

//listen to dropdown for change
$("#type").change(function(){
  //rehide content on change
  $('.show-hide').hide();
  //unhides current item
  $('#'+$(this).val()).show();
});

});
</script>