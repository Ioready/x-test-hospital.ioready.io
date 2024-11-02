<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailTemplate extends Common_Controller { 
    public $data = array();
    public $file_data = "";
    public $_table = 'vendor_sale_email_template';
    public function __construct() {
        parent::__construct();
    }
    
     /**
     * @method index
     * @description listing display
     * @return array
     */
    public function indexs() {
        $this->data['parent'] = "emailTemplate";
        $this->data['title'] = "Email Templates";
        

        $optionEmailTemplate = array(
            'table' => 'vendor_sale_lettel_header',
            // 'select' => 'vendor_sale_lettel_header.*',
            'select' => 'vendor_sale_lettel_header.*,vendor_sale_lettel_header.logo as header_logo, vendor_sale_lettel_bodies.*,vendor_sale_lettel_recipients.*,vendor_sale_lettel_footer.*,vendor_sale_lettel_footer.internal_name as footer_internal_name',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left'),
                array('vendor_sale_lettel_bodies', 'vendor_sale_lettel_header.id=vendor_sale_lettel_bodies.header_id','left'),
                array('vendor_sale_lettel_recipients', 'vendor_sale_lettel_bodies.id=vendor_sale_lettel_recipients.body_id','left'),
                array('vendor_sale_lettel_footer', 'vendor_sale_lettel_recipients.id=vendor_sale_lettel_footer.recipient_id','left')
                
            ),
            
        );

        $this->data['all_template'] = $this->common_model->customGet($optionEmailTemplate);

        if ($request->filled('template_id')) {
            $templateId = $request->input('template_id');
            

            $this->load->admin_render('list', $this->data, 'inner_script' ,['templateId' => $templateId]);
        }

        $optionEmailTemplate = array(
            'table' => 'vendor_sale_lettel_header',
            // 'select' => 'vendor_sale_lettel_header.*',
            'select' => 'vendor_sale_lettel_header.*,vendor_sale_lettel_header.logo as header_logo, vendor_sale_lettel_bodies.*,vendor_sale_lettel_recipients.*,vendor_sale_lettel_footer.*,vendor_sale_lettel_footer.internal_name as footer_internal_name',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left'),
                array('vendor_sale_lettel_bodies', 'vendor_sale_lettel_header.id=vendor_sale_lettel_bodies.header_id','left'),
                array('vendor_sale_lettel_recipients', 'vendor_sale_lettel_bodies.id=vendor_sale_lettel_recipients.body_id','left'),
                array('vendor_sale_lettel_footer', 'vendor_sale_lettel_recipients.id=vendor_sale_lettel_footer.recipient_id','left')
                
            ),
            
            // 'where' => array('vendor_sale_lettel_header.internal_name' => 'hospital registration'),
            // 'single'=>true,
        );

        $this->data['EmailTemplates'] = $this->common_model->customGet($optionEmailTemplate);

    //   print_r($this->data['EmailTemplates']);die;



        $this->load->admin_render('list', $this->data, 'inner_script');
    }

    public function index($defaultTemplateId = "4") {

        $this->data['parent'] = "emailTemplate";
        $this->data['title'] = "Email Templates";
        $this->data['formUrl'] = $this->router->fetch_class() . "/sendEmailTemplate";
        $defaultTemplateId = 4;
    
        $alloptionEmailTemplate = [
            'table' => 'vendor_sale_lettel_header',
            'select' => 'vendor_sale_lettel_header.*, vendor_sale_lettel_header.logo as header_logo, vendor_sale_lettel_bodies.*, vendor_sale_lettel_recipients.*, vendor_sale_lettel_footer.*, vendor_sale_lettel_footer.internal_name as footer_internal_name',
            'join' => [
                ['vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id', 'left'],
                ['vendor_sale_lettel_bodies', 'vendor_sale_lettel_header.id=vendor_sale_lettel_bodies.header_id', 'left'],
                ['vendor_sale_lettel_recipients', 'vendor_sale_lettel_bodies.id=vendor_sale_lettel_recipients.body_id', 'left'],
                ['vendor_sale_lettel_footer', 'vendor_sale_lettel_recipients.id=vendor_sale_lettel_footer.recipient_id', 'left']
            ],
        ];
    
        $this->data['all_template'] = $this->common_model->customGet($alloptionEmailTemplate);
    

        $optionEmailTemplate = array(
            'table' => 'vendor_sale_lettel_header',
            'select' => 'vendor_sale_lettel_header.*,vendor_sale_lettel_header.logo as header_logo, vendor_sale_lettel_bodies.*,vendor_sale_lettel_recipients.*,vendor_sale_lettel_footer.*,vendor_sale_lettel_footer.internal_name as footer_internal_name',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left'),
                array('vendor_sale_lettel_bodies', 'vendor_sale_lettel_header.id=vendor_sale_lettel_bodies.header_id','left'),
                array('vendor_sale_lettel_recipients', 'vendor_sale_lettel_bodies.id=vendor_sale_lettel_recipients.body_id','left'),
                array('vendor_sale_lettel_footer', 'vendor_sale_lettel_recipients.id=vendor_sale_lettel_footer.recipient_id','left')
                
            ),
            // 'single'=>true,
        );
        if ($defaultTemplateId == "4") {

            $optionEmailTemplate['where'] = ['vendor_sale_lettel_header.id' => $defaultTemplateId];
        } else {

            $templateId = $request->input('template_id');
            $optionEmailTemplate['where'] = ['vendor_sale_lettel_header.id' => $templateId];
        }
        
        $this->data['EmailTemplates'] = $this->common_model->customGet($optionEmailTemplate);
        // print_r($this->data['EmailTemplates']);die;
       
    
            $optionEmailTem = array(
                'table' => 'vendor_sale_email_template',
                'select' => 'vendor_sale_email_template.*',
                'where' => array('active_template' => '1'), 
                'single'=>true,
            );
        // }
                
        $this->data['useTemplate'] = $this->common_model->customGet($optionEmailTem);
        

        $optionEmailTem = array(
            'table' => 'vendor_sale_email_template',
            'select' => 'vendor_sale_email_template.*',
        );
        
        
        $this->data['list'] = $this->common_model->customGet($optionEmailTem);
       


        return $this->load->admin_render('list', $this->data, 'inner_script');
       
    }
    

    public function sendEmailTemplate()
    {
        
     
        $this->form_validation->set_rules('subject', lang('subject'), 'required');
        
        $this->form_validation->set_rules('from_mail', lang('from_mail'), 'required');
        $user_id = $this->session->userdata('user_id');
        if ($this->form_validation->run() == true) {
                $from = $this->input->post('from_mail');
    //             echo '<pre>';
    //   print_r($this->input->post());die;
    //   echo '</pre>';
                    $additional_data = array(
                        'user_id' => $user_id,
                        'app_name' => $this->input->post('app_name'),
                        'company_name' => $this->input->post('company_name'),
                        'app_url' => $this->input->post('app_url'),
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'subject' => $this->input->post('subject'),
                        'from_mail' => $this->input->post('from_mail'),
                        'description' => $this->input->post('description'),
                        // 'update_date' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('vendor_sale_send_mail_template', $additional_data);

                    
                    $password = $this->input->post('password');
                    $option = array(
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
            
                    $authUser = $this->common_model->customGet($option);
                    $email = $authUser->email;
                    
                    $subject = "Hospital Registration Login Credentials";
                    $title = "Hospital Registration";
                    $data['name'] = ucwords($this->input->post('app_name'));
                    $data['content'] = "Hospital account login Credentials"
                        . "<p>username: " . $from . "</p><p>Password: " . $password . "</p>";
                    // $template = $this->load->view('user_signup_mail', $data, true);
                    // print_r($data);die;
                    // $template = $this->load->view('email-template/registration', $data, true);
                    // $template = $this->load->view('emailTemplate/list', $data, true);

                    // $this->send_email($email, $from, $subject, $template, $title);
                    
                    // $this->send_email_smtp($email, $from, $subject, $template, $title);

                    $EmailTemplate = getEmailTemplate("welcome");
                    
                    // if (!empty($EmailTemplate)) {
                        $html = array();
                        $html['logo'] = base_url() . getConfig('site_logo');
                        $html['site'] = getConfig('site_name');
                        $html['site_meta_title'] = getConfig('site_meta_title');
                        $name = $this->input->post('first_name') . " " . $this->input->post('last_name');
                        $html['user'] = ucwords($name);
                        $html['email'] = $email;
                        $html['password'] = $password;
                        $html['token'] = $token_uniqss;
                        $html['website'] = base_url();
                        $html['content'] = $EmailTemplate->description;
                        $template = $this->load->view('email-template/registration', $html, true);
                        $title = '[' . getConfig('site_name') . '] ' . $EmailTemplate->title;
                        $this->sendEmail($email, $from, $subject, $template, $title);
 
                    $response = array('status' => 1, 'message' => lang('user_success'), 'url' => base_url('users'));
                 
            
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }


    /**
     * @method open_model
     * @description load model box
     * @return array
     */

     public function letterTemplate($vendor_profile_activate = "No") {
        $this->data['parent'] = "emailTemplate";
        $this->data['title'] = "Email Templates";;
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

        // print_r($this->data['footer_list']);die;
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
            // 'where' => array('vendor_sale_lettel_header.user_id' => $LoginID)
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
            // 'where' => array('vendor_sale_lettel_bodies.user_id' => $LoginID)
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
            // 'where' => array('vendor_sale_lettel_recipients.user_id' => $LoginID)
        );

        $this->data['recipient_list'] = $this->common_model->customGet($optionheader);

        $this->load->admin_render('footer', $this->data, 'inner_script');
    }


    public function addHeader() {

        //                 echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
        // $this->form_validation->set_rules('description', "Description", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

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
            }
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
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

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
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

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
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

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
            }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
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
                
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('userSettings'), 'id' => encoding($this->input->post('id')));
                
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
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
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
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('userSettings'), 'id' => encoding($this->input->post('id')));
                
            }
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
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('userSettings'), 'id' => encoding($this->input->post('id')));
                
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
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('userSettings'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }


    function open_model() {
        $this->data['title'] = lang("add_cms");
        $this->load->view('add', $this->data);
    }
   

    /**
     * @method cms_add
     * @description add dynamic rows
     * @return array
     */
    public function template_add() {
        
        $this->form_validation->set_rules('email_type', 'Email Type', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', lang('description'), 'required|trim');
       
         
        if ($this->form_validation->run() == true) {     

            $this->filedata['status'] = 1;
            $image = "";
            if (!empty($_FILES['image']['name'])) {
                $this->filedata = $this->commonUploadImage($_POST, 'emailTemplate', 'image');
                if ($this->filedata['status'] == 1) {
                 $image = $this->filedata['upload_data']['file_name'];
                 //$full_path = $this->filedata['upload_data']['full_path'];
                 //$folder = "cms/thumb";
                //$this->resizeNewImage($full_path,$folder,480,828);
                }               
            }
                  
            if ($this->filedata['status'] == 0) {
               $response = array('status' => 0, 'message' => $this->filedata['error']);  
            }else{
                 $options_data = array(
                    'email_type'    => $this->input->post('email_type'),
                    'title'         => $this->input->post('title'),
                    'description'   => $this->input->post('description'),
                    'image'         => $image,
                    'create_date'   => datetime(),
                    'is_active'        => 1,
                );
       
                $option = array('table' => $this->_table, 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => 'Successfuly Saved', 'url' => base_url('emailTemplate'));
                }else {
                    $response = array('status' => 0, 'message' => 'Failed');
                }                
            }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    /**
     * @method cms_edit
     * @description edit dynamic rows
     * @return array
     */
    public function template_edit() {
        $this->data['title'] = 'Edit Template';
        $id = decoding($this->input->post('id'));
        if (!empty($id)) {
            $option = array(
                'table' => $this->_table,
                'where' => array('id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {
                $this->data['results'] = $results_row;
                $this->load->view('edit', $this->data);
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('emailTemplate');
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect('emailTemplate');
        }
    }

    /**
     * @method cms_update
     * @description update dynamic rows
     * @return array
     */
    public function template_update() {

        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('email_type', 'email_type', 'required|trim');
        $this->form_validation->set_rules('description', lang('description'), 'required|trim');
        

        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
                $this->filedata['status'] = 1;
                $image = $this->input->post('exists_image');

                if (!empty($_FILES['image']['name'])) {
                    $this->filedata = $this->commonUploadImage($_POST, 'emailTemplate', 'image');
                    
                    if ($this->filedata['status'] == 1) {
                     $image = $this->filedata['upload_data']['file_name'];
                    // $full_path = $this->filedata['upload_data']['full_path'];
                     //$folder = "cms/thumb";
                    //$this->resizeNewImage($full_path,$folder,480,828);
                    delete_file($this->input->post('exists_image'), FCPATH."uploads/cms/");
                    
                    
                    }
                    
                }
                        
                if ($this->filedata['status'] == 0) {
                    $response = array('status' => 0, 'message' => $this->filedata['error']);  
                }else{
               
                    $options_data = array(
                        
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'image'             => $image
                        
                    );
                    $option = array(
                        'table' => $this->_table,
                        'data' => $options_data,
                        'where' => array('id' => $where_id)
                    );
                    $update = $this->common_model->customUpdate($option);
                    $response = array('status' => 1, 'message' => lang('cms_success_update'), 'url' => base_url('emailTemplate'));
              }  

        endif;

        echo json_encode($response);
    }

    public function usedTemplate(){

        $id = $this->input->post('id');
        if (!empty($id)) {
            
            $other_update_data = array('active_template' => 0);
            $other_update_option = array(
                'table' => 'vendor_sale_email_template',
                'data' => $other_update_data,
                'where_not_in' => array('id' => $id) // Exclude the requested ID
            );
            $this->common_model->customUpdate($other_update_option);

            $update_data = array('active_template' => 1);
            
            $update_option = array(
                'table' => 'vendor_sale_email_template',
                'data' => $update_data,
                'where' => array('id' => $id)
            );
            // print_r($update_option);die;
        //    $this->common_model->customUpdate($update_option);
           if (!$this->common_model->customUpdate($update_option)) {
            $response = array('status' => 0, 'message' => 'Failed to Update');
        }else{
            $response = array('status' => 1, 'message' => 'Successfully Updated', 'url' => base_url('emailTemplate'));
            
        }
        

            
        }
        echo json_encode($response);
        
    }
}
