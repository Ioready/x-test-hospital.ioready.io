<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Common_Controller {

    public $data = array();
    public $file_data = "";

    public function __construct() {
        parent::__construct();
        $this->is_auth_admin();
    }

    /**
     * @method index
     * @description listing display
     * @return array
     */
    public function index() {
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";

        if ($this->ion_auth->is_superAdmin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }

       else if ($this->ion_auth->is_admin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }
        else if ($this->ion_auth->is_facilityManager()) {
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

        $optionSetting = array(
            'table' => 'setting',
            'select' => 'setting.*',
            'where'=>array('user_id'=>$hospital_id),
            'single'=>true,
        );

        $this->data['list'] = $this->common_model->customGet($optionSetting);

        $this->load->admin_render('add', $this->data, 'inner_script');
    }

    public function emailSetting() {
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";

        if ($this->ion_auth->is_superAdmin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }

       else if ($this->ion_auth->is_admin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }
        else if ($this->ion_auth->is_facilityManager()) {
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

        // print_r($hospital_id);die;

        $this->load->admin_render('email_setting', $this->data, 'inner_script');
    }


    
    public function paymentSetting() {
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";

        if ($this->ion_auth->is_superAdmin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }

       else if ($this->ion_auth->is_admin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }
        else if ($this->ion_auth->is_facilityManager()) {
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

        $optionPayment = array(
            'table' => 'payment_gateway',
            'select' => 'payment_gateway.*',
            'where'=>array('user_id'=>$hospital_id),
            'single'=>true,
        );

        $this->data['list'] = $this->common_model->customGet($optionPayment);
// print_r($this->data['list']);die;
        $this->load->admin_render('payment_setting', $this->data, 'inner_script');
    }

    public function bankTransferSetting() {
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";
        // $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        if ($this->ion_auth->is_superAdmin()) {
            $user_id = $this->session->userdata('user_id');
        $LoginID = $user_id;

        }
        else if ($this->ion_auth->is_facilityManager()) {
            $user_id = $this->session->userdata('user_id');
        $LoginID = $user_id;

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

            $LoginID = $authUser->hospital_id;
            // 'users.hospital_id'=>$hospital_id
            
        }

        $optionPayment = array(
            'table' => 'bank_setting',
            'select' => 'bank_setting.*',
            'where' => array('bank_setting.user_id' => $LoginID),
            'single' => true,
        );
        

        $this->data['list'] = $this->common_model->customGet($optionPayment);
// print_r($this->data['list']);die;
        $this->load->admin_render('bank_transfer', $this->data, 'inner_script');
    }

    
    // public function addBankSetting() {

    //     // print_r($this->input->post());die;
    //     $this->data['parent'] = "Settings";
    //     $this->data['title'] = "Settings";

    //     $this->form_validation->set_rules('bank_details', 'bank_details is required', 'required');
    //     $allData = $this->input->post();
    //     $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
       
    //     if ($this->form_validation->run() == true) {

    //     $option = array(
    //         'table' => 'bank_setting',
    //         'data' => array(
    //             'user_id' => $LoginID,
    //             'bank_details' => $this->input->post('bank_details'),
                
    //         )
    //     );
    //     $insert_id = $this->common_model->customInsert($option);
    //     $response = array('status' => 1, 'message' =>  "Successfully added");
        
    // } else {
    //     $messages = (validation_errors()) ? validation_errors() : '';
    //     $response = array('status' => 0, 'message' => $messages);

    // }
    
    // echo json_encode($response);

    // }

    public function addBankSetting() {
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";
    
        $this->form_validation->set_rules('bank_details', 'Bank Details', 'required');
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    
        if ($this->form_validation->run() == true) {
            // Check if there's already a bank setting for the user
            $option_check = array(
                'table' => 'bank_setting',
                'where' => array('user_id' => $LoginID)
            );
            $existingRecord = $this->common_model->customGet($option_check);
    
            // Prepare data for insertion or update
            $data = array(
                'user_id' => $LoginID,
                'bank_details' => $this->input->post('bank_details'),
            );
    
            if (!empty($existingRecord)) {
                // Update existing record
                $option_update = array(
                    'table' => 'bank_setting',
                    'data' => $data,
                    'where' => array('user_id' => $LoginID)
                );
                $this->common_model->customUpdate($option_update);
                $response = array('status' => 1, 'message' => "Successfully updated");
            } else {
                // Insert new record
                $option_insert = array(
                    'table' => 'bank_setting',
                    'data' => $data
                );
                $insert_id = $this->common_model->customInsert($option_insert);
                $response = array('status' => 1, 'message' => "Successfully added");
            }
        } else {
            // Validation error message
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
    
        echo json_encode($response);
    }
    

    public function addPaymentSetting() {



        if ($this->ion_auth->is_superAdmin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;

        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";

        $this->form_validation->set_rules('secret_key', lang('secret_key'), 'required');
        $this->form_validation->set_rules('publishable_key', lang('publishable_key'), 'required');
        $allData = $this->input->post();
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
       
        if ($this->form_validation->run() == true) {

        
        
   

    $optionheader = array(
        'table' => 'payment_gateway',
        'select' => 'payment_gateway`.*',
        'where' => array('payment_gateway.user_id' => $hospital_id),
        'single'=>true,

    );

    $resultdata = $this->common_model->customGet($optionheader);
    if(!empty($resultdata)){

   
        $email = strtolower($this->input->post('email'));
       
        $additional_data = array(
            'secret_key' => $this->input->post('secret_key'),
            'publishable_key' => $this->input->post('publishable_key'),
        );

        // $update_data = array('active_template' => 1);
        
        $update_option = array(
            'table' => 'payment_gateway',
            'data' => $additional_data,
            'where' => array('user_id'=>$hospital_id)
        );
       
             $this->common_model->customUpdate($update_option);                
            $this->session->set_flashdata('success', 'Successfully updated');

        }else{
            $option = array(
                'table' => 'payment_gateway',
                'data' => array(
                    'user_id' => $hospital_id,
                    'secret_key' => $this->input->post('secret_key'),
                    'publishable_key' => $this->input->post('publishable_key'),
                )
            );
            $insert_id = $this->common_model->customInsert($option);
            $response = array('status' => 1, 'message' =>  "Successfully added");
                
                $this->session->set_flashdata('success', 'Successfully added');
        }
    } else {
        $messages = (validation_errors()) ? validation_errors() : '';
        $response = array('status' => 0, 'message' => $messages);

    }
    
    echo json_encode($response); 
        
        } else if ($this->ion_auth->is_admin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;

        
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";

        $this->form_validation->set_rules('secret_key', lang('secret_key'), 'required');
        $this->form_validation->set_rules('publishable_key', lang('publishable_key'), 'required');
        $allData = $this->input->post();
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
       
        if ($this->form_validation->run() == true) {

        
        
   

    $optionheader = array(
        'table' => 'payment_gateway',
        'select' => 'payment_gateway`.*',
        'where' => array('payment_gateway.user_id' => $hospital_id),
        'single'=>true,

    );

    $resultdata = $this->common_model->customGet($optionheader);
    if(!empty($resultdata)){

   
        $email = strtolower($this->input->post('email'));
       
        $additional_data = array(
            'secret_key' => $this->input->post('secret_key'),
            'publishable_key' => $this->input->post('publishable_key'),
        );

        // $update_data = array('active_template' => 1);
        
        $update_option = array(
            'table' => 'payment_gateway',
            'data' => $additional_data,
            'where' => array('user_id'=>$hospital_id)
        );
       
             $this->common_model->customUpdate($update_option);                
            $this->session->set_flashdata('success', 'Successfully updated');

        }else{
            $option = array(
                'table' => 'payment_gateway',
                'data' => array(
                    'user_id' => $hospital_id,
                    'secret_key' => $this->input->post('secret_key'),
                    'publishable_key' => $this->input->post('publishable_key'),
                )
            );
            $insert_id = $this->common_model->customInsert($option);
            $response = array('status' => 1, 'message' =>  "Successfully added");
                
                $this->session->set_flashdata('success', 'Successfully added');
        }
    } else {
        $messages = (validation_errors()) ? validation_errors() : '';
        $response = array('status' => 0, 'message' => $messages);

    }
    
    echo json_encode($response);

        } else if ($this->ion_auth->is_facilityManager()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;

        
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";

        $this->form_validation->set_rules('secret_key', lang('secret_key'), 'required');
        $this->form_validation->set_rules('publishable_key', lang('publishable_key'), 'required');
        $allData = $this->input->post();
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
       
        if ($this->form_validation->run() == true) {

        
        
   

    $optionheader = array(
        'table' => 'payment_gateway',
        'select' => 'payment_gateway`.*',
        'where' => array('payment_gateway.user_id' => $hospital_id),
        'single'=>true,

    );

    $resultdata = $this->common_model->customGet($optionheader);
    if(!empty($resultdata)){

   
        $email = strtolower($this->input->post('email'));
       
        $additional_data = array(
            'secret_key' => $this->input->post('secret_key'),
            'publishable_key' => $this->input->post('publishable_key'),
        );

        // $update_data = array('active_template' => 1);
        
        $update_option = array(
            'table' => 'payment_gateway',
            'data' => $additional_data,
            'where' => array('user_id'=>$hospital_id)
        );
       
             $this->common_model->customUpdate($update_option);                
            $this->session->set_flashdata('success', 'Successfully updated');

        }else{
            $option = array(
                'table' => 'payment_gateway',
                'data' => array(
                    'user_id' => $hospital_id,
                    'secret_key' => $this->input->post('secret_key'),
                    'publishable_key' => $this->input->post('publishable_key'),
                )
            );
            $insert_id = $this->common_model->customInsert($option);
            $response = array('status' => 1, 'message' =>  "Successfully added");
                
                $this->session->set_flashdata('success', 'Successfully added');
        }
    } else {
        $messages = (validation_errors()) ? validation_errors() : '';
        $response = array('status' => 0, 'message' => $messages);

    }
    
    echo json_encode($response);
        
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
           

           
            $this->data['parent'] = "Settings";
            $this->data['title'] = "Settings";
    
            $this->form_validation->set_rules('secret_key', lang('secret_key'), 'required');
            $this->form_validation->set_rules('publishable_key', lang('publishable_key'), 'required');
            $allData = $this->input->post();
            $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
           
            if ($this->form_validation->run() == true) {
    
            
            
       

        $optionheader = array(
            'table' => 'payment_gateway',
            'select' => 'payment_gateway`.*',
            'where' => array('payment_gateway.user_id' => $hospital_id),
            'single'=>true,

        );

        $resultdata = $this->common_model->customGet($optionheader);
        if(!empty($resultdata)){

       
            $email = strtolower($this->input->post('email'));
           
            $additional_data = array(
                'secret_key' => $this->input->post('secret_key'),
                'publishable_key' => $this->input->post('publishable_key'),
            );

            // $update_data = array('active_template' => 1);
            
            $update_option = array(
                'table' => 'payment_gateway',
                'data' => $additional_data,
                'where' => array('user_id'=>$hospital_id)
            );
           
                 $this->common_model->customUpdate($update_option);                
                $this->session->set_flashdata('success', 'Successfully updated');

            }else{
                $option = array(
                    'table' => 'payment_gateway',
                    'data' => array(
                        'user_id' => $hospital_id,
                        'secret_key' => $this->input->post('secret_key'),
                        'publishable_key' => $this->input->post('publishable_key'),
                    )
                );
                $insert_id = $this->common_model->customInsert($option);
                $response = array('status' => 1, 'message' =>  "Successfully added");
                    
                    $this->session->set_flashdata('success', 'Successfully added');
            }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
    
        }
        
        echo json_encode($response);
        
        }

    }


    public function add_days() {
        $total_patient_days = $this->input->post('total_patient_days');

        $options = array('table' => SETTING,
            'where' => array(
                'option_name' => "total_patient_days"
            )
        );
        $result = $this->common_model->customGet($options);
        if (empty($result)) {
            $options = array('table' => SETTING,
                'data' => array(
                    'option_value' => (!empty($total_patient_days)) ? $total_patient_days : 0,
                    'option_name' => "total_patient_days"
                )
            );
            $this->common_model->customInsert($options);
        } else {
            $options = array('table' => SETTING,
                'data' => array(
                    'option_value' => (!empty($total_patient_days)) ? $total_patient_days : 0,
                ),
                'where' => array(
                    'option_name' => "total_patient_days"
                )
            );
            $this->common_model->customUpdate($options);
        }

        $this->session->set_flashdata('success', "Successfully added");
        redirect('reports');
    }

    public function un_days() {

        $options = array('table' => SETTING,
            'data' => array(
                'option_value' => 0,
            ),
            'where' => array(
                'option_name' => "total_patient_days"
            )
        );
        $this->common_model->customUpdate($options);
    }

    /**
     * @method setting_add
     * @description add dynamic rows
     * @return array
     */
    public function setting_add() {

        // print_r($this->input->post());die;

        if ($this->ion_auth->is_superAdmin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }

       else if ($this->ion_auth->is_admin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }
        else if ($this->ion_auth->is_facilityManager()) {
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

        if ($this->ion_auth->is_superAdmin()) {

        $user_id = $hospital_id;
        // $user_id = $this->session->userdata('user_id');

        $allOptions = is_options();
        $image = $this->input->post('site_logo_url');
        $image_login = $this->input->post('loginBackgroud');
        if (!empty($_FILES['user_image']['name'])) {
            $this->filedata = $this->commonUploadImage($_POST, 'app', 'user_image');
            if ($this->filedata['status'] == 1) {
                $image = 'uploads/app/' . $this->filedata['upload_data']['file_name'];
                delete_file($this->input->post('site_logo_url'), FCPATH);
            }
        }
        if (!empty($_FILES['login_background']['name'])) {
            $this->filedata = $this->commonUploadImage($_POST, 'app', 'login_background');
            if ($this->filedata['status'] == 1) {
                $image_login = 'uploads/app/' . $this->filedata['upload_data']['file_name'];
            }
        }
        foreach ($allOptions as $rows) {
            $option = array('table' => SETTING,
                'where' => array('user_id'=>$user_id,'option_name' => $rows, 'status' => 1),
                'single' => true,
            );
            $is_value = $this->common_model->customGet($option);
            if (!empty($is_value)) {
                $options = array('table' => SETTING,
                    'data' => array(
                        'option_value' => (isset($_POST[$rows])) ? $_POST[$rows] : "",
                    ),
                    'where' => array('user_id'=>$user_id,'option_name' => $rows)
                );
                if (!empty($image) && $rows == 'site_logo') {
                    $options['data']['option_value'] = $image;
                }
                if (!empty($image_login) && $rows == 'login_background') {
                    $options['data']['option_value'] = $image_login;
                }
                $this->common_model->customUpdate($options);
            } else {

               
                $options = array('table' => SETTING,
                    'data' => array(
                        'user_id' => $user_id,
                        'option_value' => (isset($_POST[$rows])) ? $_POST[$rows] : "",
                        'option_name' => $rows
                    )
                );
                
                if (!empty($image) && $rows == 'site_logo') {
                    $options['data']['option_value'] = $image;
                }
                if (!empty($image_login) && $rows == 'login_background') {
                    $options['data']['option_value'] = $image_login;
                }
                $this->common_model->customInsert($options);
            }
        }

        $response = array('status' => 1, 'message' => lang('setting_success_message'), 'url' => "");

    }else if($this->ion_auth->is_facilityManager()){

        $user_id = $hospital_id;

        $allOptions = is_options();
        $image = $this->input->post('site_logo_url');
        $image_login = $this->input->post('loginBackgroud');
        if (!empty($_FILES['user_image']['name'])) {
            $this->filedata = $this->commonUploadImage($_POST, 'app', 'user_image');
            if ($this->filedata['status'] == 1) {
                $image = 'uploads/app/' . $this->filedata['upload_data']['file_name'];
                delete_file($this->input->post('site_logo_url'), FCPATH);
            }
        }
        if (!empty($_FILES['login_background']['name'])) {
            $this->filedata = $this->commonUploadImage($_POST, 'app', 'login_background');
            if ($this->filedata['status'] == 1) {
                $image_login = 'uploads/app/' . $this->filedata['upload_data']['file_name'];
            }
        }
        foreach ($allOptions as $rows) {
            $option = array('table' => SETTING,
                'where' => array('user_id'=>$user_id,'option_name' => $rows, 'status' => 1),
                'single' => true,
            );
            $is_value = $this->common_model->customGet($option);
            if (!empty($is_value)) {
                $options = array('table' => SETTING,
                    'data' => array(
                        'option_value' => (isset($_POST[$rows])) ? $_POST[$rows] : "",
                    ),
                    'where' => array('user_id'=>$user_id,'option_name' => $rows)
                );
                if (!empty($image) && $rows == 'site_logo') {
                    $options['data']['option_value'] = $image;
                }
                if (!empty($image_login) && $rows == 'login_background') {
                    $options['data']['option_value'] = $image_login;
                }
                $this->common_model->customUpdate($options);
            } else {

                $options = array('table' => SETTING,
                    'data' => array(
                        'user_id' => $user_id,
                        'option_value' => (isset($_POST[$rows])) ? $_POST[$rows] : "",
                        'option_name' => $rows
                    )
                );
                if (!empty($image) && $rows == 'site_logo') {
                    $options['data']['option_value'] = $image;
                }
                if (!empty($image_login) && $rows == 'login_background') {
                    $options['data']['option_value'] = $image_login;
                }
                $this->common_model->customInsert($options);
            }
        }

        $response = array('status' => 1, 'message' => lang('setting_success_message'), 'url' => "");

        }else{

        }

        echo json_encode($response);
    }

    public function setting_email_add()
    {
        if ($this->ion_auth->is_superAdmin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;

        $this->load->library('form_validation');
    // Set validation rules
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == FALSE) {
        // Form validation failed, redirect back to the form with errors
        $this->session->set_flashdata('error', validation_errors());
        redirect('setting/emailSetting');
    }else{
        $optionheader = array(
            'table' => 'vendor_sale_email_host',
            'select' => 'vendor_sale_email_host`.*',
            'where' => array('vendor_sale_email_host.user_id' => $hospital_id),
            'single'=>true,

        );

        $resultdata = $this->common_model->customGet($optionheader);
        if(!empty($resultdata)){

       
            $email = strtolower($this->input->post('email'));
           
            $additional_data = array(
                // 'user_id' => $hospital_id,
                'mail_driver' => $this->input->post('mail_driver'),
                'Mail_Host' => $this->input->post('Mail_Host'),
                'mail_port' =>$this->input->post('mail_port'),
                'email'=>$email,
                'password' => $this->input->post('password'),
                'encryption' => $this->input->post('encryption'),
                'from_address' => $this->input->post('from_address'),
                'name' => $this->input->post('name'),
                'created_on' => date('Y-m-d H:i:s')
            );

            // $update_data = array('active_template' => 1);
            
            $update_option = array(
                'table' => 'vendor_sale_email_host',
                'data' => $additional_data,
                'where' => array('user_id'=>$hospital_id)
            );
           
                 $this->common_model->customUpdate($update_option);                
                $this->session->set_flashdata('success', 'Successfully updated');

            }else{
                $email = strtolower($this->input->post('email'));
           
                $additional_data = array(
                    'user_id' => $hospital_id,
                    'mail_driver' => $this->input->post('mail_driver'),
                    'Mail_Host' => $this->input->post('Mail_Host'),
                    'mail_port' =>$this->input->post('mail_port'),
                    'email'=>$email,
                    'password' => $this->input->post('password'),
                    'encryption' => $this->input->post('encryption'),
                    'from_address' => $this->input->post('from_address'),
                    'name' => $this->input->post('name'),
                    'created_on' => date('Y-m-d H:i:s')
                );
                
                    $this->db->insert('vendor_sale_email_host', $additional_data);
    
                    // $this->session->set_flashdata('success', "Successfully added");
                    
                    $this->session->set_flashdata('success', 'Successfully added');
            }
        redirect('setting/emailSetting');
        } 
        
        } else if ($this->ion_auth->is_admin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;

        $this->load->library('form_validation');
    // Set validation rules
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == FALSE) {
        // Form validation failed, redirect back to the form with errors
        $this->session->set_flashdata('error', validation_errors());
        redirect('setting/emailSetting');
    }else{
        $optionheader = array(
            'table' => 'vendor_sale_email_host',
            'select' => 'vendor_sale_email_host`.*',
            'where' => array('vendor_sale_email_host.user_id' => $hospital_id),
            'single'=>true,

        );

        $resultdata = $this->common_model->customGet($optionheader);
        if(!empty($resultdata)){

       
            $email = strtolower($this->input->post('email'));
           
            $additional_data = array(
                // 'user_id' => $hospital_id,
                'mail_driver' => $this->input->post('mail_driver'),
                'Mail_Host' => $this->input->post('Mail_Host'),
                'mail_port' =>$this->input->post('mail_port'),
                'email'=>$email,
                'password' => $this->input->post('password'),
                'encryption' => $this->input->post('encryption'),
                'from_address' => $this->input->post('from_address'),
                'name' => $this->input->post('name'),
                'created_on' => date('Y-m-d H:i:s')
            );

            // $update_data = array('active_template' => 1);
            
            $update_option = array(
                'table' => 'vendor_sale_email_host',
                'data' => $additional_data,
                'where' => array('user_id'=>$hospital_id)
            );
           
                 $this->common_model->customUpdate($update_option);                
                $this->session->set_flashdata('success', 'Successfully updated');

            }else{
                $email = strtolower($this->input->post('email'));
           
                $additional_data = array(
                    'user_id' => $hospital_id,
                    'mail_driver' => $this->input->post('mail_driver'),
                    'Mail_Host' => $this->input->post('Mail_Host'),
                    'mail_port' =>$this->input->post('mail_port'),
                    'email'=>$email,
                    'password' => $this->input->post('password'),
                    'encryption' => $this->input->post('encryption'),
                    'from_address' => $this->input->post('from_address'),
                    'name' => $this->input->post('name'),
                    'created_on' => date('Y-m-d H:i:s')
                );
                
                    $this->db->insert('vendor_sale_email_host', $additional_data);
    
                    // $this->session->set_flashdata('success', "Successfully added");
                    
                    $this->session->set_flashdata('success', 'Successfully added');
            }
        redirect('setting/emailSetting');
        } 
        
        } else if ($this->ion_auth->is_facilityManager()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;

        $this->load->library('form_validation');
    // Set validation rules
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == FALSE) {
        // Form validation failed, redirect back to the form with errors
        $this->session->set_flashdata('error', validation_errors());
        redirect('setting/emailSetting');
    }else{
        $optionheader = array(
            'table' => 'vendor_sale_email_host',
            'select' => 'vendor_sale_email_host`.*',
            'where' => array('vendor_sale_email_host.user_id' => $hospital_id),
            'single'=>true,

        );

        $resultdata = $this->common_model->customGet($optionheader);
        if(!empty($resultdata)){

       
            $email = strtolower($this->input->post('email'));
           
            $additional_data = array(
                // 'user_id' => $hospital_id,
                'mail_driver' => $this->input->post('mail_driver'),
                'Mail_Host' => $this->input->post('Mail_Host'),
                'mail_port' =>$this->input->post('mail_port'),
                'email'=>$email,
                'password' => $this->input->post('password'),
                'encryption' => $this->input->post('encryption'),
                'from_address' => $this->input->post('from_address'),
                'name' => $this->input->post('name'),
                'created_on' => date('Y-m-d H:i:s')
            );

            // $update_data = array('active_template' => 1);
            
            $update_option = array(
                'table' => 'vendor_sale_email_host',
                'data' => $additional_data,
                'where' => array('user_id'=>$hospital_id)
            );
           
                 $this->common_model->customUpdate($update_option);                
                $this->session->set_flashdata('success', 'Successfully updated');

            }else{
                $email = strtolower($this->input->post('email'));
           
                $additional_data = array(
                    'user_id' => $hospital_id,
                    'mail_driver' => $this->input->post('mail_driver'),
                    'Mail_Host' => $this->input->post('Mail_Host'),
                    'mail_port' =>$this->input->post('mail_port'),
                    'email'=>$email,
                    'password' => $this->input->post('password'),
                    'encryption' => $this->input->post('encryption'),
                    'from_address' => $this->input->post('from_address'),
                    'name' => $this->input->post('name'),
                    'created_on' => date('Y-m-d H:i:s')
                );
                
                    $this->db->insert('vendor_sale_email_host', $additional_data);
    
                    // $this->session->set_flashdata('success', "Successfully added");
                    
                    $this->session->set_flashdata('success', 'Successfully added');
            }
        redirect('setting/emailSetting');
        } 

        
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
           

            $this->load->library('form_validation');
    // Set validation rules
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == FALSE) {
        // Form validation failed, redirect back to the form with errors
        $this->session->set_flashdata('error', validation_errors());
        redirect('setting/emailSetting');
    }else{

        $optionheader = array(
            'table' => 'vendor_sale_email_host',
            'select' => 'vendor_sale_email_host`.*',
            'where' => array('vendor_sale_email_host.user_id' => $hospital_id),
            'single'=>true,

        );

        $resultdata = $this->common_model->customGet($optionheader);
        if(!empty($resultdata)){

       
            $email = strtolower($this->input->post('email'));
           
            $additional_data = array(
                // 'user_id' => $hospital_id,
                'mail_driver' => $this->input->post('mail_driver'),
                'Mail_Host' => $this->input->post('Mail_Host'),
                'mail_port' =>$this->input->post('mail_port'),
                'email'=>$email,
                'password' => $this->input->post('password'),
                'encryption' => $this->input->post('encryption'),
                'from_address' => $this->input->post('from_address'),
                'name' => $this->input->post('name'),
                'created_on' => date('Y-m-d H:i:s')
            );

            // $update_data = array('active_template' => 1);
            
            $update_option = array(
                'table' => 'vendor_sale_email_host',
                'data' => $additional_data,
                'where' => array('user_id'=>$hospital_id)
            );
           
                 $this->common_model->customUpdate($update_option);                
                $this->session->set_flashdata('success', 'Successfully updated');

            }else{
                $email = strtolower($this->input->post('email'));
           
                $additional_data = array(
                    'user_id' => $hospital_id,
                    'mail_driver' => $this->input->post('mail_driver'),
                    'Mail_Host' => $this->input->post('Mail_Host'),
                    'mail_port' =>$this->input->post('mail_port'),
                    'email'=>$email,
                    'password' => $this->input->post('password'),
                    'encryption' => $this->input->post('encryption'),
                    'from_address' => $this->input->post('from_address'),
                    'name' => $this->input->post('name'),
                    'created_on' => date('Y-m-d H:i:s')
                );
                
                    $this->db->insert('vendor_sale_email_host', $additional_data);
    
                    // $this->session->set_flashdata('success', "Successfully added");
                    
                    $this->session->set_flashdata('success', 'Successfully added');
            }
        redirect('setting/emailSetting');
        } 
            
        }

    
    }

    public function sending_mail_test()
    {
        
        // print_r('hello');die;
        $this->load->library('email'); // Note: no $config param needed
       
        $this->email->from('aditya_urmaliya@ioready.io');
        $this->email->to('vinaydci8496@gmail.com');
        $this->email->subject('Test email from CI and Gmail');
        $this->email->message('This is a test.');
        $this->email->send();
        
      
    }


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

        $this->load->admin_render('consultation', $this->data, 'inner_script');
    }


    public function addConsult() {

        // echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";


        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == true) {
            // $this->filedata['status'] = 1;
            
            // if ($this->filedata['status'] == 0) {
            //     $response = array('status' => 0, 'message' => $this->filedata['error']);
            // // }
            // } else {
            
                // $options_data = array(
                //     'user_id'=> $LoginID,
                //     'internal_name' => $this->input->post('internal_name'),
                //     'name' => $this->input->post('name'),
                //     'question' => $this->input->post('question'),                    
                // );
                $options_data = array(
                    'user_id'=> $LoginID,
                    'internal_name' => $this->input->post('internal_name'),
                    'name' => $this->input->post('name'),
                    'question' => json_encode($this->input->post('question')), // Convert array to JSON
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_user_consultation_setting', 'data' => $options_data);
               
                $this->common_model->customInsert($option);

               $consultation_id = $this->db->insert_id();


            //    $custome_name = $this->input->post('custome_name');
            //    $response_type = $this->input->post('response_type');

                // $options_data = array(
                //     'custome_name' => $custome_name,
                //     'response_type' => $response_type
                // );

                $options_data1 = array(
                    'consultation_id' => $consultation_id,
                    // 'question_name' => json_encode($options_data),
                    'question_name' => $this->input->post('name'),
                    'question' => json_encode($this->input->post('question')),                    
                );
                $option1 = array('table' => 'vendor_sale_consultation_question', 'data' => $options_data1);

                if ($this->common_model->customInsert($option1)) {

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

            // print_r($id);die;
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

    public function updateConsultation() {
       
        $where_id = $this->input->post('id');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == true){
        //     $messages = (validation_errors()) ? validation_errors() : '';
        //     $response = array('status' => 0, 'message' => $messages);
        // else:
        //     $this->filedata['status'] = 1;

        //     if ($this->filedata['status'] == 0) {
        //         $response = array('status' => 1, 'message' => $this->filedata['error']);
        //     } else {

              
                // $options_data = array(
                //     'internal_name' => $this->input->post('internal_name'),
                //     'name' => $this->input->post('name'),
                //     'question' => $this->input->post('question'),                    
                // );

                $options_data = array(
                    'internal_name' => $this->input->post('internal_name'),
                    'name' => $this->input->post('name'),
                    'question' => json_encode($this->input->post('question')), // Convert array to JSON
                );
                // $option = array('table' => 'vendor_sale_user_consultation_setting', 'data' => $options_data);

                
                $option = array(
                    'table' =>'user_consultation_setting',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);
                
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('contactus/edit'), 'id' => encoding($this->input->post('id')));
                
            
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }

        echo json_encode($response);
    }
    function delete_consultation()
    {

        $option = array(
            'table' => 'user_consultation_setting',
            'where' => array('id' => $this->input->post('id'))
        );
        
        $this->common_model->customDelete($option);

        $response = array('status' => 200, 'message' => 'Deleted Successfully', 'url' => base_url($this->router->fetch_class()));
        echo json_encode($response);
    }
}
