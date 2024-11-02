<div id="commonModalUser" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
            <form class="form-horizontal" role="form" id="editFormAjaxUser" method="post" action="<?php echo base_url('users/updateUserData') ?>" enctype="multipart/form-data">

                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                </div>

                <div class="modal-body">
                   
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                                 <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $results->first_name;?>"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('last_name');?></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="<?php echo lang('last_name');?>" value="<?php echo $results->last_name;?>"/>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('user_email');?></label>
                                    <div class="col-md-7">
                                        <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $results->email;?>" readonly/>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-md-7">
                                        <!-- <input type="text" class="form-control" name="country" id="country" placeholder="Country"/> -->
                                        
                                            <select id="country" name="country" class="form-control select2" size="1">
                                                <option value="" disabled selected>Please select</option>
                                                <?php foreach($countries as $country){?>
                                                            
                                                <option value="<?php echo $country->id;?>" <?php echo ($results->country == $country->id) ? "selected": "";?>><?php echo $country->name;?></option>
                                                        
                                                <?php }?>
                                            </select>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('phone_no');?></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="<?php echo lang('phone_no');?>" value="<?php echo $results->phone;?>"/>
                                    </div>
                                    <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span> -->
                                </div>
                            </div>
                              <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo "Current Password";?></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="current_password" id="current_password" value="<?php echo $results->is_pass_token;?>" readonly=""/>
                                    </div>
                                </div>
                            </div>
                            
                              <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('new_password');?></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="new_password" id="new_password"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="role">Role</label>
                                    <div class="col-md-7">
                                    <select class="form-select" id="role" name="role">
                                    
                                    <?php foreach ($roles_list as $rows): ?>
                                        <?php if ($rows->name !== 'Patient' && $rows->name !== 'Doctor' && $rows->name !== 'SubAdmin'): ?>
                                            <option value="<?php echo $rows->id; ?>" <?php echo $rows->id == $results->group_id ? 'selected':''?>><?php echo $rows->name; ?></option>
                                                
                                                    <?php endif; ?>

                                        <?php endforeach ?>
                                    </select>
                                    </div>
                                </div>
                            </div>

                                <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo lang('profile_image'); ?></label>
                                    <div class="col-md-7">
                                        
                                        
                                        <div class="group_filed">
                                            <div class="img_back_prieview_Academic">
                                                <div class="images_box_upload_ven_user_vendore">
                                                    <div id="image-preview-user-vendore">
                                                         <input type="file" name="user_image" id="image-upload-user-vendore" />
                                                    </div>
                                                </div>
                                                    <div id="image-preview-user">
                                                         <label for="image-upload-user-vendore" id="image-label-user-vendore">Upload Logo</label>
                                                    </div>
                                            </div>
                                    </div>
                                        
                                        
                                            <div class="profile_content edit_img">
                                            <div class="file_btn file_btn_logo">
                                              <input type="file"  class="input_img2" id="user_image" name="user_image" style="display: inline-block;">
                                              <span class="glyphicon input_img2 logo_btn" style="display: block;">
                                                <div id="show_company_img"></div>
                                                <span class="ceo_logo row push">
                                                    <?php if(!empty($results->profile_pic)){ ?>
                                                        <div class="col-sm-6 col-md-4">
                                                            <a href="<?php echo base_url().$results->profile_pic;?>" data-toggle="lightbox-image">
                                                                <img src="<?php echo base_url().$results->profile_pic;?>" alt="image">
                                                            </a>
                                                        </div>
                                                        
                                                    <?php }else{ ?>
                                                        <div class="col-sm-6 col-md-4">
                                                            <a href="<?php echo base_url().'backend_asset/images/default.jpg';?>" data-toggle="lightbox-image">
                                                                <img src="<?php echo base_url().'backend_asset/images/default.jpg';?>" alt="image">
                                                            </a>
                                                        </div>
                                        
                                                   <?php }?>
                                                    
                                                </span>
                                                
                                              </span>
                                              <img class="show_company_img2" style="display:none" alt="img" src="<?php echo base_url() ?>/backend_asset/images/logo.png">
                                              <span style="display:none" class="fa fa-close remove_img"></span>
                                            </div>
                                          </div>
                                          
                                          
                                          
                                          <div class="ceo_file_error file_error text-danger"></div>
                                    </div>
                                </div>
                                </div>
                                
                            
                             <input type="hidden" name="id" value="<?php echo $results->id;?>" />
                             <input type="hidden" name="password" value="<?php echo $results->password;?>" />
                            <input type="hidden" name="exists_image" value="<?php echo $results->profile_pic;?>" />
                            <div class="space-22"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit"  class="btn btn-sm btn-primary" style="background:#337ab7;" id="submit">Save Changes</button>
                </div>
            </form>

        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>