<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Letters extends Common_Controller {

    public $data = array();
    public $file_data = "";
    // public $_table = 'contactus';
    public $_table = 'doctors_contactus';
    
    public $title = "Letters Templates";

    public function __construct() {
        parent::__construct();
        $this->is_auth_admin();
    }

    /**
     * @method index
     * @description listing display
     * @return array
     */
    
    public function index($vendor_profile_activate = "No") {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $role_name = $this->input->post('role_name');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }

        if ($this->ion_auth->is_facilityManager()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        } else if($this->ion_auth->is_all_roleslogin()) {
            $user_id = $this->session->userdata('user_id');
            $optionData = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.id'=>$user_id),
                'single'=>true,
            );
        
            $authUser = $this->common_model->customGet($optionData);
        
            $hospital_id = $authUser->hospital_id;
            // 'users.hospital_id'=>$hospital_id
            
        }

        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );
        if ($vendor_profile_activate == "No") {
            $vendor_profile_activate = 0;
        } else {
            $vendor_profile_activate = 1;
        }

     
        $optionheader = array(
            'table' => 'vendor_sale_lettel_header',
            'select' => 'vendor_sale_lettel_header`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_header.user_id' => $hospital_id)
        );
        // 'users.hospital_id'=>$hospital_id

        $this->data['header_list'] = $this->common_model->customGet($optionheader);

        $option_body = array(
            'table' => 'vendor_sale_lettel_bodies',
            'select' => 'vendor_sale_lettel_bodies`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_bodies.user_id' => $hospital_id)
        );

        $this->data['body_list'] = $this->common_model->customGet($option_body);

        $optionrecipient = array(
            'table' => 'vendor_sale_lettel_recipients',
            'select' => 'vendor_sale_lettel_recipients`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_recipients.user_id' => $hospital_id)
        );

        $this->data['recipients_list'] = $this->common_model->customGet($optionrecipient);

        $optionfooter = array(
            'table' => 'vendor_sale_lettel_footer',
            'select' => 'vendor_sale_lettel_footer`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_footer.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_footer.user_id' => $hospital_id)
        );

        $this->data['footer_list'] = $this->common_model->customGet($optionfooter);



        $optionEmailTemplate = array(
            'table' => 'vendor_sale_lettel_header',
            // 'select' => 'vendor_sale_lettel_header.*',
            'select' => 'vendor_sale_lettel_header.*, vendor_sale_lettel_header.internal_name as header_internal_name ,vendor_sale_lettel_header.logo as header_logo, vendor_sale_lettel_bodies.*,vendor_sale_lettel_recipients.*,vendor_sale_lettel_footer.* ,vendor_sale_lettel_footer.internal_name as footer_internal_name',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left'),
                array('vendor_sale_lettel_bodies', 'vendor_sale_lettel_header.id=vendor_sale_lettel_bodies.header_id','left'),
                array('vendor_sale_lettel_recipients', 'vendor_sale_lettel_bodies.id=vendor_sale_lettel_recipients.body_id','left'),
                array('vendor_sale_lettel_footer', 'vendor_sale_lettel_recipients.id=vendor_sale_lettel_footer.recipient_id','left')
                
            ),
            'where' => array('vendor_sale_lettel_header.user_id' => $hospital_id)
        );

        $this->data['template_list'] = $this->common_model->customGet($optionEmailTemplate);
        // print_r($this->data['template_list']);die;
        
        $this->load->admin_render('list', $this->data, 'inner_script');
    }

    public function add_new_template($vendor_profile_activate = "No") {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        
        $role_name = $this->input->post('role_name');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }
        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );
        if ($vendor_profile_activate == "No") {
            $vendor_profile_activate = 0;
        } else {
            $vendor_profile_activate = 1;
        }

     
        $optionheader = array(
            'table' => 'vendor_sale_lettel_header',
            'select' => 'vendor_sale_lettel_header`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_header.user_id' => $LoginID)
        );

        $this->data['header_list'] = $this->common_model->customGet($optionheader);

        $option_body = array(
            'table' => 'vendor_sale_lettel_bodies',
            'select' => 'vendor_sale_lettel_bodies`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_bodies.user_id' => $LoginID)
        );

        $this->data['body_list'] = $this->common_model->customGet($option_body);

        $optionrecipient = array(
            'table' => 'vendor_sale_lettel_recipients',
            'select' => 'vendor_sale_lettel_recipients`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_recipients.user_id' => $LoginID)
        );

        $this->data['recipients_list'] = $this->common_model->customGet($optionrecipient);

        $optionfooter = array(
            'table' => 'vendor_sale_lettel_footer',
            'select' => 'vendor_sale_lettel_footer`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_footer.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_footer.user_id' => $LoginID)
        );

        $this->data['footer_list'] = $this->common_model->customGet($optionfooter);


        
        $optionEmailTemplate = array(
            'table' => 'vendor_sale_lettel_header',
            // 'select' => 'vendor_sale_lettel_header.*',
            'select' => 'vendor_sale_lettel_header.*,vendor_sale_lettel_header.logo as header_logo, vendor_sale_lettel_bodies.*,vendor_sale_lettel_recipients.*,vendor_sale_lettel_footer.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left'),
                array('vendor_sale_lettel_bodies', 'vendor_sale_lettel_header.id=vendor_sale_lettel_bodies.header_id','left'),
                array('vendor_sale_lettel_recipients', 'vendor_sale_lettel_bodies.id=vendor_sale_lettel_recipients.body_id','left'),
                array('vendor_sale_lettel_footer', 'vendor_sale_lettel_recipients.id=vendor_sale_lettel_footer.recipient_id','left')
                
            ),
            'where' => array('vendor_sale_lettel_header.user_id' => $LoginID)
        );

        $this->data['template_list'] = $this->common_model->customGet($optionEmailTemplate);
        // print_r($this->data['template_list']);die;
        
        $this->load->admin_render('directory', $this->data, 'inner_script');
    }



    public function header($vendor_profile_activate = "No") {

        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        // $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/addHeader";

        $role_name = $this->input->post('role_name');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }
        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );
        if ($vendor_profile_activate == "No") {
            $vendor_profile_activate = 0;
        } else {
            $vendor_profile_activate = 1;
        }

        $option1 ="SELECT `vendor_sale_doctors_contactus`.`title`,`vendor_sale_doctors_contactus`.`first_name`, `vendor_sale_doctors_contactus`.`last_name`,`vendor_sale_doctors_contactus`.`company`,
        `vendor_sale_doctors_contactus`.`id`, 
        `vendor_sale_doctors_contactus`.`contacts_clinician`,
        `vendor_sale_doctors_contactus`.`comment`,
        `vendor_sale_doctors_contactus`.`created_at`,
        -- `vendor_sale_users`.`first_name 'as f_name'`,
        -- `vendor_sale_users`.`last_name as l_name`,
        `vendor_sale_doctors_contactus`.`user_id`,`vendor_sale_doctors_contactus`.`phone_type`,`vendor_sale_doctors_contactus`.`phone_number`,`vendor_sale_doctors_contactus`.`user_email`
        ,`vendor_sale_doctors_contactus`.`address_lookup`,`vendor_sale_doctors_contactus`.`streem_address`,`vendor_sale_doctors_contactus`.`city`,`vendor_sale_doctors_contactus`.`post_code`
        ,`vendor_sale_doctors_contactus`.`country`,`vendor_sale_doctors_contactus`.`billing_detail`,`vendor_sale_doctors_contactus`.`payment_reference`
        ,`vendor_sale_doctors_contactus`.`System`,`vendor_sale_doctors_contactus`.`healthcode`
        FROM `vendor_sale_doctors_contactus` 
        LEFT JOIN `vendor_sale_users` ON 
        `vendor_sale_users`.`id` = `vendor_sale_doctors_contactus`.`user_id`
        WHERE `vendor_sale_doctors_contactus`.`delete_status` = 0  and
        `vendor_sale_doctors_contactus`.`user_id` =$LoginID
        ORDER BY `vendor_sale_doctors_contactus`.`id` DESC";
        
        $this->data['list'] = $this->common_model->customQuery($option1);

        $this->load->admin_render('header', $this->data, 'inner_script');
    }


    public function bodies($vendor_profile_activate = "No") {
        
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrl'] = $this->router->fetch_class() . "/addBodies";
        $role_name = $this->input->post('role_name');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }
        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );
        if ($vendor_profile_activate == "No") {
            $vendor_profile_activate = 0;
        } else {
            $vendor_profile_activate = 1;
        }

       
        $optionheader = array(
            'table' => 'vendor_sale_lettel_header',
            'select' => 'vendor_sale_lettel_header`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_header.user_id' => $LoginID)
        );

        $this->data['header_list'] = $this->common_model->customGet($optionheader);


        $this->load->admin_render('bodies', $this->data, 'inner_script');
    }

    public function recipients($vendor_profile_activate = "No") {
        
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrl'] = $this->router->fetch_class() . "/addRecipients";
        $role_name = $this->input->post('role_name');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }
        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );
        if ($vendor_profile_activate == "No") {
            $vendor_profile_activate = 0;
        } else {
            $vendor_profile_activate = 1;
        }

        $option1 ="SELECT `vendor_sale_doctors_contactus`.`title`,`vendor_sale_doctors_contactus`.`first_name`, `vendor_sale_doctors_contactus`.`last_name`,`vendor_sale_doctors_contactus`.`company`,
        `vendor_sale_doctors_contactus`.`id`, 
        `vendor_sale_doctors_contactus`.`contacts_clinician`,
        `vendor_sale_doctors_contactus`.`comment`,
        `vendor_sale_doctors_contactus`.`created_at`,
        -- `vendor_sale_users`.`first_name 'as f_name'`,
        -- `vendor_sale_users`.`last_name as l_name`,
        `vendor_sale_doctors_contactus`.`user_id`,`vendor_sale_doctors_contactus`.`phone_type`,`vendor_sale_doctors_contactus`.`phone_number`,`vendor_sale_doctors_contactus`.`user_email`
        ,`vendor_sale_doctors_contactus`.`address_lookup`,`vendor_sale_doctors_contactus`.`streem_address`,`vendor_sale_doctors_contactus`.`city`,`vendor_sale_doctors_contactus`.`post_code`
        ,`vendor_sale_doctors_contactus`.`country`,`vendor_sale_doctors_contactus`.`billing_detail`,`vendor_sale_doctors_contactus`.`payment_reference`
        ,`vendor_sale_doctors_contactus`.`System`,`vendor_sale_doctors_contactus`.`healthcode`
        FROM `vendor_sale_doctors_contactus` 
        LEFT JOIN `vendor_sale_users` ON 
        `vendor_sale_users`.`id` = `vendor_sale_doctors_contactus`.`user_id`
        WHERE `vendor_sale_doctors_contactus`.`delete_status` = 0  and
        `vendor_sale_doctors_contactus`.`user_id` =$LoginID
        ORDER BY `vendor_sale_doctors_contactus`.`id` DESC";
        
        $this->data['list'] = $this->common_model->customQuery($option1);

        $optionheader = array(
            'table' => 'vendor_sale_lettel_bodies',
            'select' => 'vendor_sale_lettel_bodies`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_bodies.user_id' => $LoginID)
        );

        $this->data['body_list'] = $this->common_model->customGet($optionheader);

        $this->load->admin_render('recipients', $this->data, 'inner_script');
    }


    public function footer($vendor_profile_activate = "No") {
        
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $role_name = $this->input->post('role_name');
        $this->data['formUrl'] = $this->router->fetch_class() . "/addFooter";


        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }
        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );
        if ($vendor_profile_activate == "No") {
            $vendor_profile_activate = 0;
        } else {
            $vendor_profile_activate = 1;
        }

        $option1 ="SELECT `vendor_sale_doctors_contactus`.`title`,`vendor_sale_doctors_contactus`.`first_name`, `vendor_sale_doctors_contactus`.`last_name`,`vendor_sale_doctors_contactus`.`company`,
        `vendor_sale_doctors_contactus`.`id`, 
        `vendor_sale_doctors_contactus`.`contacts_clinician`,
        `vendor_sale_doctors_contactus`.`comment`,
        `vendor_sale_doctors_contactus`.`created_at`,
        -- `vendor_sale_users`.`first_name 'as f_name'`,
        -- `vendor_sale_users`.`last_name as l_name`,
        `vendor_sale_doctors_contactus`.`user_id`,`vendor_sale_doctors_contactus`.`phone_type`,`vendor_sale_doctors_contactus`.`phone_number`,`vendor_sale_doctors_contactus`.`user_email`
        ,`vendor_sale_doctors_contactus`.`address_lookup`,`vendor_sale_doctors_contactus`.`streem_address`,`vendor_sale_doctors_contactus`.`city`,`vendor_sale_doctors_contactus`.`post_code`
        ,`vendor_sale_doctors_contactus`.`country`,`vendor_sale_doctors_contactus`.`billing_detail`,`vendor_sale_doctors_contactus`.`payment_reference`
        ,`vendor_sale_doctors_contactus`.`System`,`vendor_sale_doctors_contactus`.`healthcode`
        FROM `vendor_sale_doctors_contactus` 
        LEFT JOIN `vendor_sale_users` ON 
        `vendor_sale_users`.`id` = `vendor_sale_doctors_contactus`.`user_id`
        WHERE `vendor_sale_doctors_contactus`.`delete_status` = 0  and
        `vendor_sale_doctors_contactus`.`user_id` =$LoginID
        ORDER BY `vendor_sale_doctors_contactus`.`id` DESC";
        
        $this->data['list'] = $this->common_model->customQuery($option1);

        $optionheader = array(
            'table' => 'vendor_sale_lettel_recipients',
            'select' => 'vendor_sale_lettel_recipients`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_recipients.user_id' => $LoginID)
        );

        $this->data['recipient_list'] = $this->common_model->customGet($optionheader);

        $this->load->admin_render('footer', $this->data, 'inner_script');
    }



    function open_model() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/add";
        $option = "SELECT `vendor_sale_users`.`id`,`vendor_sale_users`.`first_name`, 
        `vendor_sale_users`.`last_name`
        FROM `vendor_sale_users` 
        LEFT JOIN `vendor_sale_users_groups` ON `vendor_sale_users_groups`.`user_id` = `vendor_sale_users`.`id`
        LEFT JOIN `vendor_sale_groups` ON `vendor_sale_groups`.`id` = `vendor_sale_users_groups`.`group_id`
        WHERE `vendor_sale_users`.`delete_status` = 0 and `vendor_sale_users_groups`.`group_id` = 5
        ORDER BY `vendor_sale_users`.`first_name` ASC";
        
        $this->data['users'] = $this->common_model->customQuery($option);

        $option = array('table' => 'countries',
            'select' => '*'
        );
        $this->data['countries'] = $this->common_model->customGet($option);
        $option = array('table' => 'states',
                    'select' => '*');
                $this->data['states'] = $this->common_model->customGet($option);

        $this->load->admin_render('add', $this->data, 'inner_script');
    }

    /**
     * @method users_add
     * @description add dynamic rows
     * @return array
     */



     function open_consult() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/addConsult";
        $this->data['formUrlModel'] = $this->router->fetch_class() . "/addQuestion";

        
        $option = "SELECT `vendor_sale_users`.`id`,`vendor_sale_users`.`first_name`, 
        `vendor_sale_users`.`last_name`
        FROM `vendor_sale_users` 
        LEFT JOIN `vendor_sale_users_groups` ON `vendor_sale_users_groups`.`user_id` = `vendor_sale_users`.`id`
        LEFT JOIN `vendor_sale_groups` ON `vendor_sale_groups`.`id` = `vendor_sale_users_groups`.`group_id`
        WHERE `vendor_sale_users`.`delete_status` = 0 and `vendor_sale_users_groups`.`group_id` = 5
        ORDER BY `vendor_sale_users`.`first_name` ASC";
        
        $this->data['users'] = $this->common_model->customQuery($option);

        $option = array('table' => 'countries',
            'select' => '*'
        );
        $this->data['countries'] = $this->common_model->customGet($option);
        $option = array('table' => 'states',
                    'select' => '*');
                $this->data['states'] = $this->common_model->customGet($option);

                // print_r($this->data['users']);die;

        $this->load->admin_render('add_consultation', $this->data, 'inner_script');
    }

    /**
     * @method users_add
     * @description add dynamic rows
     * @return array
     */

     

     public function addHeader() {

        //                 echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
       

        if ($this->form_validation->run() == true) {
            // $this->filedata['status'] = 1;
            // print_r($this->input->post());die;
            // if ($this->filedata['status'] == 0) {
            //     $response = array('status' => 0, 'message' => $this->filedata['error']);
            // // }
            // } else {
             

                    $image = '';
		
                        $new_name = time().$_FILES["image"]['name'];
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = '*';
                        $config['file_name'] = $new_name;
                        $config['overwrite'] = TRUE;
                        $config['remove_spaces'] = TRUE;
                        // echo $new_name;die;
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('image')) {
                            $error = array('error' => $this->upload->display_errors());
                            echo $error['error'];
                            }else{ 
                            $imageDetailArray = $this->upload->data();
                            $image =  $imageDetailArray['file_name'];
                        } 
                    


                $options_data = array(
                    'user_id'=> $LoginID,
                    'internal_name' => $this->input->post('internal_name'),
                    'header_checked' => $this->input->post('header_checked'),
                    'logo' => $image,
                                        
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_lettel_header', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
            // }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    public function addFooter() {

        // echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
        // $this->form_validation->set_rules('description', "Description", 'required|trim');

        if ($this->form_validation->run() == true) {
            

                    $image = '';
		
                        $new_name = time().$_FILES["image"]['name'];
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = '*';
                        $config['file_name'] = $new_name;
                        $config['overwrite'] = TRUE;
                        $config['remove_spaces'] = TRUE;
                        // echo $new_name;die;
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('image')) {
                            $error = array('error' => $this->upload->display_errors());
                            echo $error['error'];
                            }else{ 
                            $imageDetailArray = $this->upload->data();
                            $image =  $imageDetailArray['file_name'];
                        } 
                    

            //             $image = "";
            // if (!empty($_FILES['user_image']['name'])) {
            //     $this->filedata = $this->commonUploadImage($_POST, 'users', 'user_image');
            //     if ($this->filedata['status'] == 1) {
            //         $image = 'uploads/users/' . $this->filedata['upload_data']['file_name'];
            //     }
            // }


                $options_data = array(
                    'user_id'=> $LoginID,
                    'recipient_id'=> $this->input->post('recipient_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'header_checked' => $this->input->post('footer_booked'),
                    'logo' => $image,
                                        
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_lettel_footer', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
           
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    public function addBodies() {

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
        $this->form_validation->set_rules('header_id', "header", 'required|trim');

        if ($this->form_validation->run() == true) {
        

                $options_data = array(
                    'user_id'=> $LoginID,
                    'header_id'=> $this->input->post('header_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'bodies_template' => $this->input->post('bodies_template'),
                    
                                        
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_lettel_bodies', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
          
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    public function addRecipients() {

        // echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
        $this->form_validation->set_rules('body_id', "body_id", 'required|trim');

        if ($this->form_validation->run() == true) {
            
             

                $options_data = array(
                    'user_id'=> $LoginID,
                    'body_id'=> $this->input->post('body_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'recipient_template' => $this->input->post('bodies_template'),
                    
                                        
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_lettel_recipients', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
           
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    public function add() {

        //                 echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('first_name', "first_name", 'required|trim');
        // $this->form_validation->set_rules('description', "Description", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            } else {
                // $options_data = array(
                //     'facility_manager_id' => $LoginID,
                //     'title' => $this->input->post('title'),
                //     'description' => $this->input->post('description'),

                //     'is_active' => 1,
                //     'create_date' => strtotime(datetime()),
                // );

                $options_data = array(
                    'user_id'=> $LoginID,
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'title' => $this->input->post('title'),
                    'company' => $this->input->post('company'),
                    'contacts_clinician' => $this->input->post('contacts_clinician'),
                    'comment' => $this->input->post('comment'),
                    'phone_type' => $this->input->post('phone_type'),
                    'phone_number' => $this->input->post('phone_number'),
                    'user_email' => $this->input->post('user_email'),
                    'address_lookup' => $this->input->post('address_lookup'),
                    'streem_address' => $this->input->post('streem_address'),
                    'city' => $this->input->post('city'),
                    'post_code' => $this->input->post('post_code'),
                    'country' => $this->input->post('country'),
                    'billing_detail' => $this->input->post('billing_detail'),
                    'payment_reference' => $this->input->post('payment_reference'),
                    'System' => $this->input->post('System'),
                    'healthcode' => $this->input->post('healthcode'),
                    
                );
                $option = array('table' => $this->_table, 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
            }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    public function consultationTemplates($vendor_profile_activate = "No") {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $role_name = $this->input->post('role_name');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }
        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );
        if ($vendor_profile_activate == "No") {
            $vendor_profile_activate = 0;
        } else {
            $vendor_profile_activate = 1;
        }

        $optionheader = array(
            'table' => 'vendor_sale_user_consultation_setting',
            'select' => 'vendor_sale_user_consultation_setting`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_user_consultation_setting.user_id','left')
            ),
            // 'where' => array('vendor_sale_user_consultation_setting.user_id' => $LoginID)
        );

        $this->data['list'] = $this->common_model->customGet($optionheader);
        $optionEmailTemplate = array(
            'table' => 'vendor_sale_lettel_header',
            // 'select' => 'vendor_sale_lettel_header.*',
            'select' => 'vendor_sale_lettel_header.*, vendor_sale_lettel_header.internal_name as header_internal_name ,vendor_sale_lettel_header.logo as header_logo, vendor_sale_lettel_bodies.*,vendor_sale_lettel_recipients.*,vendor_sale_lettel_footer.* ,vendor_sale_lettel_footer.internal_name as footer_internal_name',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left'),
                array('vendor_sale_lettel_bodies', 'vendor_sale_lettel_header.id=vendor_sale_lettel_bodies.header_id','left'),
                array('vendor_sale_lettel_recipients', 'vendor_sale_lettel_bodies.id=vendor_sale_lettel_recipients.body_id','left'),
                array('vendor_sale_lettel_footer', 'vendor_sale_lettel_recipients.id=vendor_sale_lettel_footer.recipient_id','left')
                
            ),
            // 'where' => array('vendor_sale_lettel_header.user_id' => $LoginID)
        );

        $this->data['template_list'] = $this->common_model->customGet($optionEmailTemplate);

        $this->load->admin_render('consultation', $this->data, 'inner_script');
    }


    public function addConsult() {

        // echo "<pre>";
        

        // print_r($this->input->post());die;
        // echo "</pre>";


        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
            
                $options_data = array(
                    'user_id'=> $LoginID,
                    'internal_name' => $this->input->post('internal_name'),
                    'name' => $this->input->post('name'),
                    'question' => $this->input->post('question'),                    
                );
                $option = array('table' => 'vendor_sale_user_consultation_setting', 'data' => $options_data);
                $this->common_model->customInsert($option);

               $consultation_id = $this->db->insert_id();


               $custome_name = $this->input->post('custome_name');
               $response_type = $this->input->post('response_type');

                $options_data = array(
                    'custome_name' => $custome_name,
                    'response_type' => $response_type
                );

                $options_data1 = array(
                    'consultation_id' => $consultation_id,
                    'question_name' => json_encode($options_data),
                    'question' => $this->input->post('question'),                    
                );
                $option1 = array('table' => 'vendor_sale_consultation_question', 'data' => $options_data1);

                if ($this->common_model->customInsert($option1)) {
                    
                   

                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
            }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    public function addQuestion() {

    
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->form_validation->set_rules('question', "question", 'required|trim');
       
        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

                $options_data = array(
                    'user_id'=> $LoginID,
                    'question' => $this->input->post('question'),
                    // 'recipient_template' => $this->input->post('bodies_template'),                         
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_consultation_question', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
            }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    /**
     * @method user_edit
     * @description edit dynamic rows
     * @return array
     */

     public function consultEdit() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;
        $id = decoding($_GET['id']);
        // print_r($id);die;
        
        if (!empty($id)) {

 
            $option = array(
                'table' => contactus . ' as R',
                'select' => 'R.*, '
                . 'U.id as u_id,U.first_name,U.last_name,',
                'join' => array(
                    array(USERS . ' as U', 'U.id=R.facility_manager_id', '')),
                'where' => array('R.id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);


            // if (!empty($results_row)) {
                
                // $this->data['results'] = $results_row;

                $optionheader = array(
                    'table' => 'vendor_sale_user_consultation_setting',
                    'select' => 'vendor_sale_user_consultation_setting`.*',
                    'join' => array(
                        array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_user_consultation_setting.user_id','left')
                    ),
                    'where' => array('vendor_sale_user_consultation_setting.id' => $id),
                    'single'=>true,
                );
        
                $this->data['list'] = $this->common_model->customGet($optionheader);

                // print_r($this->data['list']);die;

                $this->load->admin_render('edit_consultation', $this->data, 'inner_script');
            // } else {
            //     $this->session->set_flashdata('error', lang('not_found'));
            //     redirect($this->router->fetch_class());
            // }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    public function edit() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;
        $id = decoding($_GET['id']);
        // print_r($id);die;
        
        if (!empty($id)) {


            $option = array(
                'table' => contactus . ' as R',
                'select' => 'R.*, '
                . 'U.id as u_id,U.first_name,U.last_name,',
                'join' => array(
                    array(USERS . ' as U', 'U.id=R.facility_manager_id', '')),
                'where' => array('R.id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);


            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;


            // $option = "SELECT `vendor_sale_users`.`id`,`vendor_sale_users`.`first_name`, 
            //                 `vendor_sale_users`.`last_name`
            //                 FROM `vendor_sale_users` 
            //                 LEFT JOIN `vendor_sale_users_groups` ON `vendor_sale_users_groups`.`user_id` = `vendor_sale_users`.`id`
            //                 LEFT JOIN `vendor_sale_groups` ON `vendor_sale_groups`.`id` = `vendor_sale_users_groups`.`group_id`
            //                 WHERE `vendor_sale_users`.`delete_status` = 0 and `vendor_sale_users_groups`.`group_id` = 5
            //                 ORDER BY `vendor_sale_users`.`first_name` ASC";

                // $this->data['care_unit'] = $this->common_model->customQuery($option);

                $optionheader = array(
                    'table' => 'vendor_sale_user_consultation_setting',
                    'select' => 'vendor_sale_user_consultation_setting`.*',
                    'join' => array(
                        array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_user_consultation_setting.user_id','left')
                    ),
                    'where' => array('vendor_sale_user_consultation_setting.id' => $id),
                    'single'=>true,
                );
        
                $this->data['list'] = $this->common_model->customGet($optionheader);

                

                $this->load->admin_render('edit', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }


    public function editHeader() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;

        $id = decoding($_GET['id']);
       
        
        if (!empty($id)) {
            // print_r($id);die;
            $optionheader = array(
                'table' => 'vendor_sale_lettel_header',
                'select' => 'vendor_sale_lettel_header`.*',
                'join' => array(
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
                ),
                // 'where' => array('vendor_sale_lettel_header.user_id' => $LoginID),
                'where' => array('vendor_sale_lettel_header.id' => $id),
           'single' => true
            );
            $results_row = $this->common_model->customGet($optionheader);
            // $option_body = array(
            //     'table' => 'vendor_sale_lettel_bodies',
            //     'select' => 'vendor_sale_lettel_bodies`.*',
            //     'join' => array(
            //         array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
            //     ),
            //     'where' => array('vendor_sale_lettel_bodies.user_id' => $LoginID)
            // );
    
            // $this->data['body_list'] = $this->common_model->customGet($option_body);
    
            // $optionrecipient = array(
            //     'table' => 'vendor_sale_lettel_recipients',
            //     'select' => 'vendor_sale_lettel_recipients`.*',
            //     'join' => array(
            //         array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
            //     ),
            //     'where' => array('vendor_sale_lettel_recipients.user_id' => $LoginID)
            // );
    
            // $this->data['recipients_list'] = $this->common_model->customGet($optionrecipient);
    
            // $optionfooter = array(
            //     'table' => 'vendor_sale_lettel_footer',
            //     'select' => 'vendor_sale_lettel_footer`.*',
            //     'join' => array(
            //         array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_footer.user_id','left')
            //     ),
            //     'where' => array('vendor_sale_lettel_footer.user_id' => $LoginID)
            // );
    
            // $this->data['footer_list'] = $this->common_model->customGet($optionfooter);
    

            
            // $option = array(
            //     'table' => contactus . ' as R',
            //     'select' => 'R.*, '
            //     . 'U.id as u_id,U.first_name,U.last_name,',
            //     'join' => array(
            //         array(USERS . ' as U', 'U.id=R.facility_manager_id', '')),
            //     'where' => array('R.id' => $id),
            //     'single' => true
            // );
            // $results_row = $this->common_model->customGet($option);


            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;

            
                $this->load->admin_render('edit_header', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    /**
     * @method user_update
     * @description update dynamic rows
     * @return array
     */


     public function updateHeader() {
       
        $where_id = $this->input->post('header_id');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'internal_name' => $this->input->post('internal_name'),
                    'header_checked' => $this->input->post('header_checked'),
                    'logo' => $this->input->post('image'),                    
                );
                // $option = array('table' => 'vendor_sale_user_consultation_setting', 'data' => $options_data);

                
                $option = array(
                    'table' =>'vendor_sale_lettel_header',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);
                
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('letters'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }


    public function editBody() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;


        if ($this->ion_auth->is_facilityManager()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        } else if($this->ion_auth->is_all_roleslogin()) {
            $user_id = $this->session->userdata('user_id');
            $optionData = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.id'=>$user_id),
                'single'=>true,
            );
        
            $authUser = $this->common_model->customGet($optionData);
        
            $hospital_id = $authUser->hospital_id;
            // 'users.hospital_id'=>$hospital_id
            
        }

        $id = decoding($_GET['id']);
       
        
        if (!empty($id)) {
            // print_r($id);die;
            $optionheader = array(
                'table' => 'vendor_sale_lettel_bodies',
                'select' => 'vendor_sale_lettel_bodies`.*',
                'join' => array(
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
                ),
                // 'where' => array('vendor_sale_lettel_header.user_id' => $LoginID),
                'where' => array('vendor_sale_lettel_bodies.id' => $id),
           'single' => true
            );
            $results_row = $this->common_model->customGet($optionheader);
            // $option_body = array(
            //     'table' => 'vendor_sale_lettel_bodies',
            //     'select' => 'vendor_sale_lettel_bodies`.*',
            //     'join' => array(
            //         array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
            //     ),
            //     'where' => array('vendor_sale_lettel_bodies.user_id' => $LoginID)
            // );
    
            // $this->data['body_list'] = $this->common_model->customGet($option_body);
    
            // $optionrecipient = array(
            //     'table' => 'vendor_sale_lettel_recipients',
            //     'select' => 'vendor_sale_lettel_recipients`.*',
            //     'join' => array(
            //         array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
            //     ),
            //     'where' => array('vendor_sale_lettel_recipients.user_id' => $LoginID)
            // );
    
            // $this->data['recipients_list'] = $this->common_model->customGet($optionrecipient);
    
            // $optionfooter = array(
            //     'table' => 'vendor_sale_lettel_footer',
            //     'select' => 'vendor_sale_lettel_footer`.*',
            //     'join' => array(
            //         array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_footer.user_id','left')
            //     ),
            //     'where' => array('vendor_sale_lettel_footer.user_id' => $LoginID)
            // );
    
            // $this->data['footer_list'] = $this->common_model->customGet($optionfooter);
    
            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;

            
                $optionheader = array(
                    'table' => 'vendor_sale_lettel_header',
                    'select' => 'vendor_sale_lettel_header`.*',
                    'join' => array(
                        array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
                    ),
                    'where' => array('vendor_sale_lettel_header.user_id' => $hospital_id)
                );
        
                $this->data['header_list'] = $this->common_model->customGet($optionheader);

                
                $this->load->admin_render('edit_body', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    /**
     * @method user_update
     * @description update dynamic rows
     * @return array
     */


     public function updateBody() {
       
        $where_id = $this->input->post('body_id');
        // print_r($where_id);die;
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            // $this->filedata['status'] = 1;

            // if ($this->filedata['status'] == 0) {
            //     $response = array('status' => 1, 'message' => $this->filedata['error']);
            // } else {

              
                $options_data = array(
                    'header_id' => $this->input->post('header_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'bodies_template' => $this->input->post('bodies_template'),
                                    
                );
               
                
                $optionBody = array(
                    'table' =>'vendor_sale_lettel_bodies',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                
                $update = $this->common_model->customUpdate($optionBody);
                // print_r($update);die;
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('letters'), 'id' => encoding($this->input->post('id')));
                
            // }
        endif;

        echo json_encode($response);
    }


    public function editRecipients() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;


        if ($this->ion_auth->is_facilityManager()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        } else if($this->ion_auth->is_all_roleslogin()) {
            $user_id = $this->session->userdata('user_id');
            $optionData = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.id'=>$user_id),
                'single'=>true,
            );
        
            $authUser = $this->common_model->customGet($optionData);
        
            $hospital_id = $authUser->hospital_id;
            // 'users.hospital_id'=>$hospital_id
            
        }

        $id = decoding($_GET['id']);
       
        
        if (!empty($id)) {
            // print_r($id);die;
            $optionheader = array(
                'table' => 'vendor_sale_lettel_recipients',
                'select' => 'vendor_sale_lettel_recipients`.*',
                'join' => array(
                            array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
                        ),
                'where' => array('vendor_sale_lettel_recipients.id' => $id),
           'single' => true
            );
            $results_row = $this->common_model->customGet($optionheader);
      
            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;

            
                $optionheader = array(
                    'table' => 'vendor_sale_lettel_bodies',
                    'select' => 'vendor_sale_lettel_bodies`.*',
                    'join' => array(
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
                ),
                    'where' => array('vendor_sale_lettel_bodies.user_id' => $hospital_id)
                );
        
                $this->data['body_list'] = $this->common_model->customGet($optionheader);

                
                $this->load->admin_render('edit_recipients', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    /**
     * @method user_update
     * @description update dynamic rows
     * @return array
     */


     public function updateRecipients() {
       
        $where_id = $this->input->post('recipients_id');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'body_id' => $this->input->post('body_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'recipient_template' => $this->input->post('bodies_template'),
                                    
                );
               
                
                $optionRecipient = array(
                    'table' =>'vendor_sale_lettel_recipients',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                
                $update = $this->common_model->customUpdate($optionRecipient);
                // print_r($update);die;
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('letters'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }


    public function editFooters() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;


        if ($this->ion_auth->is_facilityManager()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        } else if($this->ion_auth->is_all_roleslogin()) {
            $user_id = $this->session->userdata('user_id');
            $optionData = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.id'=>$user_id),
                'single'=>true,
            );
        
            $authUser = $this->common_model->customGet($optionData);
        
            $hospital_id = $authUser->hospital_id;
            // 'users.hospital_id'=>$hospital_id
            
        }

        $id = decoding($_GET['id']);
        if (!empty($id)) {
            
            $optionheader = array(
                'table' => 'vendor_sale_lettel_footer',
                'select' => 'vendor_sale_lettel_footer`.*',
                'join' => array(
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_footer.user_id','left')
                ),
                'where' => array('vendor_sale_lettel_footer.id' => $id),
           'single' => true
            );
            $results_row = $this->common_model->customGet($optionheader);
            
    
            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;

            
                $optionheader = array(
                    'table' => 'vendor_sale_lettel_recipients',
                'select' => 'vendor_sale_lettel_recipients`.*',
                'join' => array(
                            array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
                        ),
                    'where' => array('vendor_sale_lettel_recipients.user_id' => $hospital_id)
                );
        
                $this->data['recipient_list'] = $this->common_model->customGet($optionheader);

                
                $this->load->admin_render('edit_footer', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    /**
     * @method user_update
     * @description update dynamic rows
     * @return array
     */


     public function updateFooters() {
       
        $where_id = $this->input->post('footer_id');
        // print_r($where_id);die;
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'recipient_id' => $this->input->post('recipient_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'header_checked' => $this->input->post('footer_booked'),
                    'logo' => $this->input->post('image'),
                                    
                );
               
                
                $optionBody = array(
                    'table' =>'vendor_sale_lettel_footer',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                
                $update = $this->common_model->customUpdate($optionBody);
                // print_r($update);die;
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('letters'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }


    public function update() {
       
        $where_id = $this->input->post('id');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'internal_name' => $this->input->post('internal_name'),
                    'name' => $this->input->post('name'),
                    'question' => $this->input->post('question'),                    
                );
                // $option = array('table' => 'vendor_sale_user_consultation_setting', 'data' => $options_data);

                
                $option = array(
                    'table' =>'vendor_sale_user_consultation_setting',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);
                
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('contactus/edit'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }

    function delete_patient()
    {

        $option = array(
            'table' => 'user_consultation_setting',
            'where' => array('id' => $this->input->post('id'))
        );
        // $this->common_model->customDelete($option);
        // $option = array(
        //     'table' => 'patient_consult',
        //     'where' => array('patient_id' => $this->input->post('id'))
        // );
        // $this->common_model->customDelete($option);
        // $option = array(
        //     'table' => 'notifications',
        //     'where' => array(
        //         'patient_id' => $this->input->post('id')
        //     )
        // );
        $this->common_model->customDelete($option);

        $response = array('status' => 200, 'message' => 'Deleted Successfully', 'url' => base_url($this->router->fetch_class()));
        echo json_encode($response);
    }



   /*  public function update1() {

        $this->form_validation->set_rules('title', lang('title'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('description', lang('description'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('facility_manager_id', "Facility Manager", 'required|trim|xss_clean');
        $newpass = $this->input->post('new_password');
        $user_email = $this->input->post('user_email');
        if ($newpass != "") {
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[6]|max_length[14]');
            //$this->form_validation->set_rules('confirm_password1', 'Confirm Password', 'trim|required|xss_clean|matches[new_password]');
            if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $this->input->post('new_password'))) {
                $response = array('status' => 0, 'message' => "The Password Should be required alphabetic and numeric");
                echo json_encode($response);
                exit;
            }
        }
        $where_id = $this->input->post('id');
        #print_r($where_id);die('ajay');
        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $option = array(
                'table' => USERS,
                'select' => 'email',
                'where' => array('email' => $user_email, 'id !=' => $where_id)
            );
            $is_unique_email = $this->common_model->customGet($option);
            if (empty($is_unique_email)) {
                $this->filedata['status'] = 1;
                $image = $this->input->post('exists_image');
                if (!empty($_FILES['user_image']['name'])) {
                    $this->filedata = $this->commonUploadImage($_POST, 'users', 'user_image');

                    if ($this->filedata['status'] == 1) {
                        $image = 'uploads/users/' . $this->filedata['upload_data']['file_name'];
                        unlink_file($this->input->post('exists_image'), FCPATH);
                    }
                }
                if ($this->filedata['status'] == 0) {
                    $response = array('status' => 0, 'message' => $this->filedata['error']);
                } else {
                    if (empty($newpass)) {
                        $currentPass = $this->input->post('current_password');
                    } else {
                        $currentPass = $newpass;
                    }
                    $options_data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'last_name' => $this->input->post('last_name'),
                        'date_of_birth' => "0000-00-00",
                        'gender' => "OTHER",
                        'phone' => $this->input->post('phone_no'),
                        'profile_pic' => $image,
                        'email' => $user_email,
                        'zipcode_access' => json_encode($this->input->post('zipcode')),
                        'facility_manager_id' => $this->input->post('facility_manager_id'),
                        'is_pass_token' => $currentPass,
                    );
                    $this->ion_auth->update($where_id, $options_data);
                    $additional_data_profile = array(
                        'description' => $this->input->post('description'),
                        'designation' => $this->input->post('designation'),
                        'website' => $this->input->post('website'),
                        'country' => $this->input->post('country'),
                        'state' => $this->input->post('state'),
                        'city' => $this->input->post('city'),
                        'address1' => $this->input->post('address1'),
                        'category_id' => (!empty($this->input->post('category_id'))) ? implode(",", $this->input->post('category_id')) : "",
                        'company_name' => $this->input->post('company_name'),
                        'profile_pic' => $image,
                        'update_date' => date('Y-m-d H:i:s')
                    );
                    $this->db->where("user_id", $where_id);
                    $this->db->update('vendor_sale_user_profile', $additional_data_profile);
                    if ($newpass != "") {
                     $change = $this->ion_auth->change_password($user_email, $this->input->post('current_password'), $this->input->post('new_password'));
                       // $pass_new = $this->common_model->encryptPassword($this->input->post('new_password'));
                        //$this->common_model->customUpdate(array('table' => 'users', 'data' => array('password' => $pass_new), 'where' => array('id' => $where_id)));
                    }
                    $response = array('status' => 1, 'message' => 'updated Successfully', 'url' => base_url('mdSteward/edit'), 'id' => encoding($this->input->post('id')));
                }
            } else {
                $response = array('status' => 0, 'message' => "The email address already exists");
            }

        endif;

        echo json_encode($response);
    } */

    public function updateAccountStatus() {
        $id = decoding($this->input->post('userId'));
        $status = $this->input->post('status');
        if ($status == "No") {
            $status = 0;
        } else {
            $status = 1;
        }
        $update = $this->common_model->customUpdate(array('table' => 'users', 'data' => array('active' => $status), 'where' => array('id' => $id)));
        if ($update) {
            $response = array('status' => 1, 'message' => "Vendor Verified Successfully");
        } else {
            $response = array('status' => 0, 'message' => "Error");
        }
        echo json_encode($response);
    }

    /**
     * @method export_user
     * @description export users
     * @return array
     */
    public function export_user() {
        $option = array(
            'table' => USERS,
            'select' => '*'
        );
        $users = $this->common_model->customGet($option);
        $print_array = array();
        $i = 1;
        foreach ($users as $value) {
            $print_array[] = array('s_no' => $i, 'name' => $value->name, 'email' => $value->email);
            $i++;
        }
        $filename = "user_email_csv.csv";
        $fp = fopen('php://output', 'w');
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        fputcsv($fp, array('S.no', 'User Name', 'Email'));
        foreach ($print_array as $row) {
            fputcsv($fp, $row);
        }
    }

    /**
     * @method reset_password
     * @description reset password
     * @return array
     */
    public function reset_password() {
        $user_id_encode = $this->uri->segment(3);

        $data['id_user_encode'] = $user_id_encode;

        if (!empty($_POST) && isset($_POST)) {

            $user_id_encode = $_POST['user_id'];

            if (!empty($user_id_encode)) {

                $user_id = base64_decode(base64_decode(base64_decode(base64_decode($user_id_encode))));


                $this->form_validation->set_rules('new_password', 'Password', 'required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('reset_password', $data);
                } else {


                    $user_pass = $_POST['new_password'];

                    $data1 = array('password' => md5($user_pass));
                    $where = array('id' => $user_id);

                    $out = $this->common_model->updateFields(USERS, $data1, $where);



                    if ($out) {

                        $this->session->set_flashdata('passupdate', 'Password Successfully Changed.');
                        $data['success'] = 1;
                        $this->load->view('reset_password', $data);
                    } else {

                        $this->session->set_flashdata('error_passupdate', 'Password Already Changed.');
                        $this->load->view('reset_password', $data);
                    }
                }
            } else {

                $this->session->set_flashdata('error_passupdate', 'Unable to Change Password, Authentication Failed.');
                $this->load->view('reset_password');
            }
        } else {
            $this->load->view('reset_password', $data);
        }
    }

    /**
     * @method delVendors
     * @description delete vendors
     * @return array
     */
    public function delVendors() {
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        if (!empty($table) && !empty($id) && !empty($id_name)) {
            $option = array(
                'table' => $table,
                'data' => array('delete_status' => 1),
                'where' => array($id_name => $id)
            );
            $delete = $this->common_model->customUpdate($option);
            if ($delete) {
                $response = 200;
            } else $response = 400;
        }else {
            $response = 400;
        }
        echo $response;
    }

    public function generate_template() {
        
        $this->form_validation->set_rules('internal_name', 'internal_name', 'required');
        
       
        
        if ($this->form_validation->run() == true) {     
            
                 $options_data = array(
                    'email_type'    => $this->input->post('internal_name'),
                    'title'         => $this->input->post('internal_name'),
                    'description'   => $this->input->post('internal_name'),
                    'image'         => $this->input->post('header_logo'),
                    'bodies_template'=> $this->input->post('bodies_templatess'),
                    'recipient_template'=> $this->input->post('recipient_template'),
                    'footer_logo'=>$this->input->post('logo'),
                    'create_date'   => datetime(),
                    'is_active'        => 1,
                );
               
                $option = array('table' => 'vendor_sale_email_template', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => 'Successfuly Saved', 'url' => base_url('emailTemplate'));
                }else {
                    $response = array('status' => 0, 'message' => 'Failed');
                }                
            
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        return json_encode($response);
    }

    // public function generate_template() {
        
    //         // Process form data here
    //         // $id = $this->input->post('id');
    //         $id = $this->input->post();
    //         // Generate template logic
    //         // Return appropriate response
    //         echo json_encode(array('success' => true)); // Example response
      
    //     print_r($id);die;
    //     // Perform any necessary logic to generate the template based on the ID
        
    //     // Redirect or return a response as needed
    // }
    

}
