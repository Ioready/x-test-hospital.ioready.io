<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($this->router->fetch_class()); ?>"><strong>Back</strong></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <div class="row">
    <p style="display:none">
    <?php $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>
    </p>
        <!-- <div class="col-md-12" >    <div class="block full">
                <div class="block-title">
                    <h2><strong><?php echo $title;?></strong> Panel</h2>
                </div>        
                <form class="form-horizontal" role="form" id="editFormAjaxUser" method="post" action="<?php echo base_url('contactus/update') ?>" enctype="multipart/form-data">
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                    </div>
                    <div class="loaders">
                        <img src="<?php echo base_url().'backend_asset/images/Preloader_2.gif'; ?>" class="loaders-img" class="img-responsive">
                    </div>
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">



                            <div class="col-md-12" style="display:none">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Facility Manager</label>
                                    <div class="col-md-9">  
                                    <input type="text" class="form-control" name="facility_manager_id" id="facility_manager_id" placeholder="Login ID" value="<?php echo $LoginID; ?>"/>                              
                                            <select id="facility_manager_id" name="facility_manager_id" class="form-control select2" size="1">
                                                <option value="">Please select</option>
                                                <?php foreach($care_unit as $row){?>
                                                            
                                                <option value="<?php echo $row->id;?>" <?php echo ($results->facility_manager_id == $row->id) ? "selected" : ""; ?>><?php echo $row->first_name." ".$row->last_name;?></option>
                                                        
                                                <?php }?>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $results->title; ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('description');?></label>
                                    <div class="col-md-9">
                                        <textarea type="text" class=" form-control" style="height:100px; " name="description" id="description" placeholder="Description"><?php echo $results->description;?></textarea>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />
                            <input type="hidden" name="password" value="<?php echo $results->password; ?>" />
                            <input type="hidden" name="exists_image" value="<?php echo $results->profile_pic; ?>" />
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

    </div> -->


    <!-- Datatables Content -->


    <div class="block full">
        <div class="block-title">
            <h2><strong>Contacts</strong> Panel</h2>
        </div>
        <!-- <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data"> -->

        <!-- <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('business/vendors_add') ?>" enctype="multipart/form-data"> -->
            <div class="modal-header">
                <h3 class="modal-title"><strong> Edit Product</strong></h3>
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
                    <option value="Medication" <?php echo $results->type=='Medication'?'selected':'';?>>Medication</option>
                    <option value="Vaccine" <?php echo $results->type=='Vaccine'?'selected':'';?>>Vaccine</option>
                    <option value="Lab" <?php echo $results->type=='Lab'?'selected':'';?>>Lab</option>
                    <option value="Appointment" <?php echo $results->type=='Appointment'?'selected':'';?>>Appointment</option>
                    <option value="Pathway" <?php echo $results->type=='Pathway'?'selected':'';?>>Pathway</option>
                    <option value="Membership" <?php echo $results->type=='Membership'?'selected':'';?>>Membership</option>
                    <option value="Procedure" <?php echo $results->type=='Procedure'?'selected':'';?>>Procedure</option>
                    <option value="Other" <?php echo $results->type=='Other'?'selected':'';?>>Other</option>
                </select>
            </div>
        </div>
    </div>
</div>

                    

                <div class="show-hide" id="Medication">

                           <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                            <br><br>
                            <input type="hidden" name="type" id="type" value="Medication">
                            <input type="hidden" name="id" id="id" value="<?php echo $results->id;?>">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" value="<?php echo $results->name;?>"/>
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>"  value="<?php echo $results->price;?>"/>
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
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="<?php echo $results->appointment_booked;?>" id="flexCheckIndeterminate">
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
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" value="<?php echo $results->supplier;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="product_code" placeholder="<?php echo lang('product code');?>" value="<?php echo $results->product_code;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="serial_number" placeholder="<?php echo lang('Serial Number');?>" value="<?php echo $results->serial_number;?>"/>
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
                                    <input type="number" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" value="<?php echo $results->stock_level;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" value="<?php echo $results->tax;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" value="<?php echo $results->cost;?>"/>
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment;?></textarea>
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

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice =='no'?'checked':'';?>">
                                            <label class="custom-control-label" for="customRadioInline1" >No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice =='yes'?'checked':'';?>">
                                            <label class="custom-control-label" for="customRadioInline2" >Yes</label>                                      
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
                        <input type="hidden" name="id" id="id" value="<?php echo $results->id;?>">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" value="<?php echo $results->name;?>"/>
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" value="<?php echo $results->price;?>"/>
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
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" value="<?php echo $results->supplier;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" value="<?php echo $results->product_code;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" value="<?php echo $results->serial_number;?>"/>
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
                                    <input type="number" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" value="<?php echo $results->stock_level;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" value="<?php echo $results->tax;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" value="<?php echo $results->cost;?>"/>
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment;?></textarea>
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

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
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
                        <input type="hidden" name="id" id="id" value="<?php echo $results->id;?>">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" value="<?php echo $results->name;?>"/>
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" value="<?php echo $results->price;?>"/>
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
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="<?php echo $results->appointment_booked;?>" id="flexCheckIndeterminate">
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
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" value="<?php echo $results->supplier;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" value="<?php echo $results->product_code;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" value="<?php echo $results->serial_number;?>"/>
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
                                    <input type="number" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" value="<?php echo $results->stock_level;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" value="<?php echo $results->tax;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" value="<?php echo $results->cost;?>"/>
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment;?></textarea>
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

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
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
                        <input type="hidden" name="id" id="id" value="<?php echo $results->id;?>">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" value="<?php echo $results->name;?>"/>
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" value="<?php echo $results->price;?>"/>
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
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="<?php echo $results->cost;?>" id="flexCheckIndeterminate">
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
                                    <input type="text" class="form-control" name="duration" id="duration" placeholder="<?php echo lang('duration');?>" value="<?php echo $results->duration;?>"/>
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
                            <input class="form-check-input" type="checkbox" name="color" value="<?php echo $results->color;?>" id="flexCheckIndeterminate">
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
                            <input class="form-check-input" type="checkbox" name="appointment_video_consult" value="<?php echo $results->appointment_video_consult;?>" id="flexCheckIndeterminate">
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
                            <input class="form-check-input" type="checkbox" name="online_booking" value="<?php echo $results->online_booking;?>" id="flexCheckIndeterminate">
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
                            <input class="form-check-input" type="checkbox" name="manually_confirm" value="<?php echo $results->manually_confirm;?>" id="flexCheckIndeterminate">
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
                                                        <option value="<?php echo $clinic_locations->id; ?>" value="<?php echo $results->location;?>"><?php echo $clinic_locations->clinic_location; ?></option>
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
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" value="<?php echo $results->supplier;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" value="<?php echo $results->product_code;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" value="<?php echo $results->serial_number;?>"/>
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
                                    <input type="number" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" value="<?php echo $results->stock_level;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" value="<?php echo $results->tax;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" value="<?php echo $results->cost;?>"/>
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment;?></textarea>
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

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
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
                        <input type="hidden" name="id" id="id" value="<?php echo $results->id;?>">
                        <br><br>
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" value="<?php echo $results->name;?>"/>
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" value="<?php echo $results->price;?>"/>
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
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="<?php echo $results->appointment_booked;?>" id="flexCheckIndeterminate">
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
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" value="<?php echo $results->supplier;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" value="<?php echo $results->product_code;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" value="<?php echo $results->serial_number;?>"/>
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
                                    <input type="number" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" value="<?php echo $results->stock_level;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" value="<?php echo $results->tax;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" value="<?php echo $results->cost;?>"/>
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment;?></textarea>
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

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
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
                        <input type="hidden" name="id" id="id" value="<?php echo $results->id;?>">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">


                           <div class="col-md-4">
                                    <label class="">Renewal</label>
                                    <select id="renewal" name="renewal" class="form-control select2" size="1" placeholder="Choose a phone type">
                                        <option value="" disabled selected>Select</option>
                                        <option value="Monthely" value="<?php echo $results->renewal;?>">Monthely</option>
                                        <option value="Yearly" value="<?php echo $results->renewal;?>">Yearly</option>
                                              
                                    </select>
                                 </div>



                                <div class="col-md-4">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" value="<?php echo $results->name;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" value="<?php echo $results->price;?>"/>
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
                            <input class="form-check-input" type="checkbox" name="appointment_booked" value="" id="flexCheckIndeterminate" value="<?php echo $results->appointment_booked;?>">
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
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" value="<?php echo $results->supplier;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" value="<?php echo $results->product_code;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" value="<?php echo $results->serial_number;?>"/>
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
                                    <input type="number" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" value="<?php echo $results->stock_level;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" value="<?php echo $results->tax;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" value="<?php echo $results->cost;?>"/>
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment;?></textarea>
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

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
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
                    <input type="hidden" name="id" id="id" value="<?php echo $results->id;?>">
                        <br><br>
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" value="<?php echo $results->name;?>"/>
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" value="<?php echo $results->price;?>"/>
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
                            <input class="form-check-input" type="checkbox" name="appointment_booked" id="flexCheckIndeterminate" value="<?php echo $results->appointment_booked;?>">
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
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" value="<?php echo $results->supplier;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" value="<?php echo $results->product_code;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" value="<?php echo $results->serial_number;?>"/>
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
                                    <input type="number" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" value="<?php echo $results->stock_level;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" value="<?php echo $results->tax;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" value="<?php echo $results->cost;?>"/>
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment;?></textarea>
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

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
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
                    <input type="hidden" name="id" id="id" value="<?php echo $results->id;?>">
                    <div class="col-md-12" >
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="col-md-6">
                                    <label class="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo lang('name');?>" value="<?php echo $results->name;?>"/>
                                </div>

                                <div class="col-md-6">
                                    <label class=""><?php echo 'Price';?></label>
                                     <input type="number" class="form-control" name="price" id="price" placeholder="<?php echo lang('price');?>" value="<?php echo $results->price;?>"/>
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
                                    <input class="form-check-input" type="checkbox" name="appointment_booked" value="<?php echo $results->appointment_booked;?>" id="flexCheckIndeterminate">
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
                                    <input type="text" class="form-control" name="supplier" id="name" placeholder="<?php echo lang('Supplier');?>" value="<?php echo $results->supplier;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Product Code';?> (Optional)</label>
                                     <input type="text" class="form-control" name="product_code" id="price" placeholder="<?php echo lang('product code');?>" value="<?php echo $results->product_code;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Serial Number';?></label>
                                     <input type="text" class="form-control" name="serial_number" id="price" placeholder="<?php echo lang('Serial Number');?>" value="<?php echo $results->serial_number;?>"/>
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
                                    <input type="number" class="form-control" name="stock_level" id="stock_level" placeholder="<?php echo lang('Stock Level');?>" value="<?php echo $results->stock_level;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Tax';?></label>
                                     <input type="number" class="form-control" name="tax" id="tax" placeholder="<?php echo lang('Tax');?>" value="<?php echo $results->tax;?>"/>
                                </div>

                                <div class="col-md-4">
                                    <label class=""><?php echo 'Cost';?></label>
                                     <input type="number" class="form-control" name="cost" id="cost" placeholder="<?php echo lang('Cost');?>" value="<?php echo $results->cost;?>"/>
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
                                    <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $results->comment;?></textarea>
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

                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
                                            <label class="custom-control-label" for="customRadioInline1">No</label>
                                       
                                    </div>
                                    <div class="col-md-1">
                                        
                                            <input type="radio" id="send_invoice" name="send_invoice" class="custom-control-input" value="<?php echo $results->send_invoice;?>">
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

var selectedType = $("#type").val();
$('#' + selectedType).show();

//unhides first option content
// $("#Selected").show();

//listen to dropdown for change
$("#type").change(function(){
  //rehide content on change
  $('.show-hide').hide();
  //unhides current item
 

  $('#'+$(this).val()).show();
});

});
</script>




    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->

<!-- <script type="text/javascript">
    $('#date_of_birth').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        endDate: 'today'
    });
    
</script> -->
