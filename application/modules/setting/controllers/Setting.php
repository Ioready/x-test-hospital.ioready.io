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
        $this->load->admin_render('add', $this->data, 'inner_script');
    }

    public function emailSetting() {
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";
        $this->load->admin_render('email_setting', $this->data, 'inner_script');
    }


    
    public function paymentSetting() {
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";
        $optionPayment = array(
            'table' => 'payment_gateway',
            'select' => 'payment_gateway.*',
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
        $this->data['parent'] = "Settings";
        $this->data['title'] = "Settings";

        $this->form_validation->set_rules('secret_key', lang('secret_key'), 'required');
        $this->form_validation->set_rules('publishable_key', lang('publishable_key'), 'required');
        $allData = $this->input->post();
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
       
        if ($this->form_validation->run() == true) {

        $option = array(
            'table' => 'payment_gateway',
            'data' => array(
                'user_id' => $LoginID,
                'secret_key' => $this->input->post('secret_key'),
                'publishable_key' => $this->input->post('publishable_key'),
            )
        );
        $insert_id = $this->common_model->customInsert($option);
        $response = array('status' => 1, 'message' =>  "Successfully added");
        
    } else {
        $messages = (validation_errors()) ? validation_errors() : '';
        $response = array('status' => 0, 'message' => $messages);

    }
    
    echo json_encode($response);

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
                'where' => array('option_name' => $rows, 'status' => 1),
                'single' => true,
            );
            $is_value = $this->common_model->customGet($option);
            if (!empty($is_value)) {
                $options = array('table' => SETTING,
                    'data' => array(
                        'option_value' => (isset($_POST[$rows])) ? $_POST[$rows] : "",
                    ),
                    'where' => array('option_name' => $rows)
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
        echo json_encode($response);
    }

    public function setting_email_add()
    {
       
        $this->load->library('form_validation');

    // Set validation rules
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == FALSE) {
        // Form validation failed, redirect back to the form with errors
        $this->session->set_flashdata('error', validation_errors());
        redirect('setting/emailSetting');
    }else{
            $email = strtolower($this->input->post('email'));
           
            $additional_data = array(
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
                $this->session->set_flashdata('success', "Successfully added");
                
                $this->session->set_flashdata('success', 'Successfully added');
        redirect('setting/emailSetting');
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


}
