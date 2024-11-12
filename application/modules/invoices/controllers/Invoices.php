<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends Common_Controller {

    public $data = array();
    public $file_data = "";
    // public $_table = 'contactus';
    // public $_table = 'doctor_invoice';
    public $_table = 'vendor_sale_invoice';
    public $title = "Invoice";

    public function __construct() {
        parent::__construct();
        $this->is_auth_admin();
        $this->load->config('stripe');
        $this->load->library('ciqrcode'); 

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

        // $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if ($this->ion_auth->is_facilityManager()) {
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

        $option1 ="SELECT `vendor_sale_doctor_invoice`.`id`,`vendor_sale_doctor_invoice`.`header`, `vendor_sale_doctor_invoice`.`start_date`,`vendor_sale_doctor_invoice`.`practitioner`,
        `vendor_sale_doctor_invoice`.`patient`, 
        `vendor_sale_doctor_invoice`.`billing_to`,
        `vendor_sale_doctor_invoice`.`note_comment`,
        `vendor_sale_doctor_invoice`.`created_at`,
        `vendor_sale_doctor_invoice`.`total`,
        `vendor_sale_doctor_invoice`.`user_id`,`vendor_sale_doctor_invoice`.`interal_comment`,`vendor_sale_doctor_invoice`.`status`
        FROM `vendor_sale_doctor_invoice` 
        LEFT JOIN `vendor_sale_users` ON 
        `vendor_sale_users`.`id` = `vendor_sale_doctor_invoice`.`user_id`
        WHERE `vendor_sale_doctor_invoice`.`status` = 0  and
        `vendor_sale_doctor_invoice`.`user_id` =$LoginID
        ORDER BY `vendor_sale_doctor_invoice`.`id` DESC";
        
        $this->data['list'] = $this->common_model->customQuery($option1);


        $id = decoding($_GET['id']);
        
        $optionInvoice = array(
            'table' => 'vendor_sale_invoice',
            'select' => 'vendor_sale_invoice.*,vendor_sale_patient.name as patient_name',
            'join' => array(
                array('vendor_sale_patient', 'vendor_sale_invoice.patient_id=vendor_sale_patient.id', 'left'),
            ),
            'where' => array('vendor_sale_invoice.facility_user_id' => $LoginID)
        );

        $this->data['invoice_list'] = $this->common_model->customQuery($optionInvoice);


        $this->load->admin_render('list', $this->data, 'inner_script');
    }



    public function directory($vendor_profile_activate = "No") {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $role_name = $this->input->post('role_name');

        // $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if ($this->ion_auth->is_facilityManager()) {
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

        $this->load->admin_render('directory', $this->data, 'inner_script');
    }

    /**
     * @method open_model
     * @description load model box
     * @return array
     */



    function open_model() {
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/add";
        $this->data['patient_id'] = $this->input->post('id');
        $this->data['initial_dx'] = $this->common_model->customGet(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['culture_source'] = $this->common_model->customGet(array('table' => 'culture_source', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['organism'] = $this->common_model->customGet(array('table' => 'organism', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['precautions'] = $this->common_model->customGet(array('table' => 'precautions', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['initial_rx'] = $this->common_model->customGet(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        
        
        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        
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
        
        // if($this->ion_auth->is_subAdmin()){
        if($this->ion_auth->is_all_roleslogin()){
        $option = array(
            'table' => ' doctors',
            'select' => 'doctors.*',
            'join' => array(
                array('users', 'doctors.user_id=users.id', 'left'),
            ),
            
            'where' => array(
                'users.delete_status' => 0,
                'doctors.user_id'=>$CareUnitID
                
            ),
            'single' => true,
        );

        $datadoctors = $this->common_model->customGet($option);


    $option = array(
            'table' => ' doctors',
            'select' => 'users.*',
            'join' => array(
                array('users', 'doctors.user_id=users.id', 'left'),
                array('user_profile UP', 'UP.user_id=users.id', 'left'),
                // array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                
            ),
            
            'where' => array(
                'users.delete_status' => 0,
                'users.hospital_id'=>$hospital_id
                // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
            ),
            'order' => array('users.id' => 'desc'),
        );
        $this->data['doctors'] = $this->common_model->customGet($option);




        $this->data['patient_id'] = decoding($_GET['id']);
        $id = $this->input->post('id');
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        
        $role_name = $this->input->post('role_name');

        $optionPatient = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_patient.*',
            'join' => array(
                array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
            ),
            // 'where' => array('vendor_sale_patient.md_steward_id'=>$datadoctors->facility_user_id),
            'where' => array('vendor_sale_users.hospital_id'=>$hospital_id),
           
        );

        $this->data['patient'] = $this->common_model->customGet($optionPatient);

        $optionPractitioner = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_practitioner.*',
            'join' => array(
                array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
            ),
            'where' => array('vendor_sale_practitioner.hospital_id'=>$hospital_id),
            // 'single'=>true,
        );

        $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);
        // print_r($datadoctors->facility_user_id);die;

    } else if ($this->ion_auth->is_facilityManager()) {
        
        $option = array(
            'table' => ' doctors',
            'select' => 'users.*',
            'join' => array(
                array('users', 'doctors.user_id=users.id', 'left'),
                array('user_profile UP', 'UP.user_id=users.id', 'left'),
                array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                
            ),
            
            'where' => array(
                'users.delete_status' => 0,
                // 'doctors.facility_user_id'=>$CareUnitID
                'users.hospital_id'=>$hospital_id
            ),
            'order' => array('users.id' => 'desc'),
        );
        $this->data['doctors'] = $this->common_model->customGet($option);

        $this->data['patient_id'] = decoding($_GET['id']);
        $id = $this->input->post('id');
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        // print_r($LoginID);die;
        $role_name = $this->input->post('role_name');

        $optionPatient = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_patient.*',
            'join' => array(
                array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
            ),
            'where' => array('vendor_sale_users.hospital_id'=>$hospital_id),
            
        );

        $this->data['patient'] = $this->common_model->customGet($optionPatient);

        // print_r($this->data['patient']);die;

        $optionPractitioner = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_practitioner.*',
            'join' => array(
                array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
            ),
            'where' => array('vendor_sale_practitioner.hospital_id'=>$hospital_id),
            // 'single'=>true,
        );

        $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);
    }
        
    // print_r($this->data['doctors']);die;
        $this->load->view('add', $this->data);
    }

    /**
     * @method users_add
     * @description add dynamic rows
     * @return array
     */


     



    // public function add() {

    //     //                 echo "<pre>";
    //     // print_r($this->input->post());die;
    //     // echo "</pre>";
    //     $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

    //     // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
    //     $this->form_validation->set_rules('header', "header", 'required|trim');
    //     $this->form_validation->set_rules('start_date', "start_date", 'required|trim');
    //     $this->form_validation->set_rules('practitioner', "practitioner", 'required|trim');
    //     $this->form_validation->set_rules('patient', "patient", 'required|trim');
    //     // $this->form_validation->set_rules('description', "Description", 'required|trim');

    //     if ($this->form_validation->run() == true) {
    //         $this->filedata['status'] = 1;
            
    //         if ($this->filedata['status'] == 0) {
    //             $response = array('status' => 0, 'message' => $this->filedata['error']);
    //         } else {
               

    //             $options_data = array(
    //                 'user_id'=> $LoginID,
    //                 'header' => $this->input->post('header'),
    //                 'start_date' => $this->input->post('start_date'),
    //                 'practitioner' => $this->input->post('practitioner'),
    //                 'patient' => $this->input->post('patient'),
    //                 'billing_to' => $this->input->post('billing_to'),
    //                 'note_comment' => $this->input->post('note_comment'),
                    
    //                 'interal_comment' => $this->input->post('interal_comment'),
    //                 'status	' => '0',

                    
    //             );
    //             $option = array('table' => $this->_table, 'data' => $options_data);
    //             if ($this->common_model->customInsert($option)) {
    //                 $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
    //             } else {
    //                 $response = array('status' => 0, 'message' => "Failed to add");
    //             }
    //         }
    //     } else {
    //         $messages = (validation_errors()) ? validation_errors() : '';
    //         $response = array('status' => 0, 'message' => $messages);
    //     }
    //     echo json_encode($response);
    // }


    public function add() {

        // print_r($this->input->post());die;

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
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

        $this->form_validation->set_rules('patient', "patient", 'required|trim');
       
        if ($this->form_validation->run() == true) {
            
            $option = array(
                'table' => 'vendor_sale_invoice',
                'order' => array('id' => 'DESC'),
                'single' => true
            );
            $query = $this->common_model->customGet($option);
            
            if (!empty($query)) {
                $last_invoice_number = $query->id;
                $new_invoice_number = 'INV#' . str_pad($last_invoice_number + 1, 5, '0', STR_PAD_LEFT);
            } else {
                // If there are no records, start with the first invoice number
                $new_invoice_number = 'INV#00001';
            }
    
            // print_r($new_invoice_number);die;

                $options_data = array(
                    'user_id'=> $LoginID,
                    'facility_user_id'=> $hospital_id,
                    'patient_id' => $this->input->post('patient'),
                    'invoice_number' => $new_invoice_number,                         
                    'invoice_date' => $this->input->post('invoice_date'),                         
                    'total_amount' => $this->input->post('total_price'),
                    'Outstanding' => $this->input->post('total_price'),                         
                    'header' => $this->input->post('header'),                         
                    'billing_to' => $this->input->post('billing_to'),                         
                    'practitioner' => $this->input->post('practitioner'),                         
                    'notes' => $this->input->post('notes'),                         
                    'internal_notes' => $this->input->post('internal_notes'),                         
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_invoice', 'data' => $options_data);
                $invoice_id= $this->common_model->customInsert($option);
                if ($invoice_id) {
                    

                    if ($invoice_id) {
                        // Insert products linked to the invoice
                        $products = $this->input->post('products_idss');
                        // $products = $this->input->post('consultation_product');
                        $rates = $this->input->post('rate');
                        $quantities = $this->input->post('quantity');
                        $prices = $this->input->post('price');
                
                        // Prepare products data
                        for ($i = 0; $i < count($products); $i++) {
                            $productData = array(
                                'invoice_id' => $invoice_id,
                                'product_name' => $products[$i],
                                'rate' => $rates[$i],
                                'quantity' => $quantities[$i],
                                'price' => $prices[$i]
                            );
                
                            // Insert each product into the database
                            $optionItem = array('table' => 'vendor_sale_invoice_items', 'data' => $productData);
                            $this->common_model->customInsert($optionItem);

                            $option = array(
                                'table' => ' vendor_sale_doctor_product',
                                'select' => 'vendor_sale_doctor_product.*',
                               
                                'where' => array(
                                    'vendor_sale_doctor_product.id'=>$products[$i]
                                ),
                                'single' => true,
                            );
                        
                            $results_row = $this->common_model->customGet($option);
                            $stock_level= $results_row->stock_level;
                            $totalstock_level = $stock_level - $quantities[$i];
                            $options_data = array(
                                'stock_level' => $totalstock_level ?? null,
                            );

                            // print_r($options_data);die;
                            // $option = $this->db->insert('doctor_product', $options_data); 
            
                            $option = array('table' => 'vendor_sale_doctor_product', 'data' => $options_data, 'where' => array('id' => $products[$i]));
                            
                            $this->common_model->customUpdate($option);
                            
                        }
                
                    }
                    // $invoice_id = $this->Invoice_model->create_invoice($invoice_data, $items_data);

                    $option = array(
                        'table' => 'vendor_sale_invoice_items',
                        'select' => 'SUM(vendor_sale_invoice_items.price) as total_price',
                        
                        'where' => array('vendor_sale_invoice_items.invoice_id' => $invoice_id),
                        'group_by' => 'vendor_sale_invoice_items.invoice_id',
                        'single'=>true,
                       
                    );
                    
                    $total_prices = $this->common_model->customGet($option);

                    // print_r($total_prices->total_price);die;

                    // $options_data = array(    
                         
                    //     'total_amount'=> $total_prices->total_price,                                              
                    //     'Paid' => '0.00',                         
                    //     'Outstanding' => $total_prices->total_price,                                            
                    // );
                    // $optionUpdate = array(
                    //     'table' => $this->_table,
                    //     'data' => $options_data,
                    //     'where' => array('id' => $invoice_id)
                    // );
                    // $update = $this->common_model->customUpdate($optionUpdate);


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


    /**
     * @method user_edit
     * @description edit dynamic rows
     * @return array
     */
    public function edit() {
        $this->data['title'] = "Edit " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/update";


           
        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

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

    // if($this->ion_auth->is_subAdmin()){
    if($this->ion_auth->is_all_roleslogin()){

        $option = array(
            'table' => ' doctors',
            'select' => 'doctors.*',
            'join' => array(
                array('users', 'doctors.user_id=users.id', 'left'),
            ),
            
            'where' => array(
                'users.delete_status' => 0,
                // 'doctors.user_id'=>$CareUnitID
            ),
            'single' => true,
        );

        $datadoctors = $this->common_model->customGet($option);


    $option = array(
            'table' => ' doctors',
            'select' => 'users.*',
            'join' => array(
                array('users', 'doctors.user_id=users.id', 'left'),
                array('user_profile UP', 'UP.user_id=users.id', 'left'),
                // array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                
            ),
            
            'where' => array(
                'users.delete_status' => 0,
                'users.hospital_id'=>$hospital_id
                // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
            ),
            'order' => array('users.id' => 'desc'),
        );
        $this->data['doctors'] = $this->common_model->customGet($option);




        $this->data['patient_id'] = decoding($_GET['id']);
        $id = $this->input->post('id');
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        
        $role_name = $this->input->post('role_name');

        $optionPatient = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_patient.*',
            'join' => array(
                array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
            ),
            'where' => array('vendor_sale_patient.md_steward_id'=>$hospital_id),
           
        );

        $this->data['patient'] = $this->common_model->customGet($optionPatient);

        $optionPractitioner = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_practitioner.*',
            'join' => array(
                array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
            ),
            // 'where' => array('vendor_sale_practitioner.hospital_id'=>$datadoctors->facility_user_id),
            // 'single'=>true,
        );

        $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);
        // print_r($datadoctors->facility_user_id);die;

    } else if ($this->ion_auth->is_facilityManager()) {
        
        $option = array(
            'table' => ' doctors',
            'select' => 'users.*',
            'join' => array(
                array('users', 'doctors.user_id=users.id', 'left'),
                array('user_profile UP', 'UP.user_id=users.id', 'left'),
                array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                
            ),
            
            'where' => array(
                'users.delete_status' => 0,
                'users.hospital_id'=>$hospital_id
                // 'doctors.facility_user_id'=>$CareUnitID
            ),
            'order' => array('users.id' => 'desc'),
        );
        $this->data['doctors'] = $this->common_model->customGet($option);

        $this->data['patient_id'] = decoding($_GET['id']);
        $id = $this->input->post('id');
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        // print_r($LoginID);die;
        $role_name = $this->input->post('role_name');

        $optionPatient = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_patient.*',
            'join' => array(
                array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
            ),
            'where' => array('users.hospital_id'=>$hospital_id),
            
        );

        $this->data['patient'] = $this->common_model->customGet($optionPatient);

        // print_r($this->data['patient']);die;

        $optionPractitioner = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_practitioner.*',
            'join' => array(
                array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
            ),
            'where' => array('vendor_sale_practitioner.hospital_id'=>$hospital_id),
            // 'single'=>true,
        );

        $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);
    }

        $id = decoding($this->input->post('id'));
        if (!empty($id)) {
            
            $option = array(
                'table' => $this->_table,
                'where' => array('id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);

            $optionItem = array(
                'table' => 'vendor_sale_invoice_items',
                'select'=>'vendor_sale_invoice_items.*,vendor_sale_doctor_product.name as invoice_product_name,vendor_sale_doctor_product.id as invoice_product_id',
                'join'=>array(array('vendor_sale_doctor_product','vendor_sale_doctor_product.id =vendor_sale_invoice_items.product_name','left')),
                'where' => array('vendor_sale_invoice_items.invoice_id' => $id),
            );
            $results_rowItem = $this->common_model->customGet($optionItem);
            // if (!is_array($results_rowItem)) {
            //     $results_row['invoice_item'] = array($results_rowItem); // Convert to array if necessary
            // }
            
            // Assign the array of invoice items to the main invoice result
            $results_row->invoice_item = $results_rowItem;


            if (!empty($results_row)) {
                $this->data['results'] = $results_row;
                // print_r($this->data['results']);die;
                $this->load->view('edit', $this->data);
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


    public function update() {
        $this->form_validation->set_rules('invoice_date', "invoice_date", 'required|trim');
        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            } else {

                $options_data = array(    
                    'patient_id' => $this->input->post('patient'),                    
                    'invoice_date' => $this->input->post('invoice_date'),                         
                    'total_amount' => $this->input->post('total_price'),                         
                    'Outstanding' => $this->input->post('total_price'),                         
                    'header	' => $this->input->post('header	'),                         
                    'billing_to' => $this->input->post('billing_to'),                         
                    'practitioner' => $this->input->post('practitioner'),                         
                    'notes' => $this->input->post('notes'),                         
                    'internal_notes' => $this->input->post('internal_notes'),                         
                );
                $option = array(
                    'table' => $this->_table,
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);

                $option = [
                    'table' => 'vendor_sale_invoice_items',
                    'where' => [
                        'invoice_id' => $where_id,
                        // 'menu_id' => $menu_id
                    ]
                ];
                
                $this->common_model->customDelete($option);

                if ($update) {
                    

                    if ($update) {
                        // Insert products linked to the invoice
                        $products = $this->input->post('products');
                        $rates = $this->input->post('rate');
                        $quantities = $this->input->post('quantity');
                        $prices = $this->input->post('price');
                // print_r($prices);die;
                        // Prepare products data

                        

                        for ($i = 0; $i < count($products); $i++) {
                            $productData = array(
                                'invoice_id' => $where_id,
                                'product_name' => $products[$i],
                                'rate' => $rates[$i],
                                'quantity' => $quantities[$i],
                                'price' => $prices[$i]
                            );
                
                            // Insert each product into the database
                            $optionItem = array('table' => 'vendor_sale_invoice_items', 'data' => $productData);
                            $this->common_model->customInsert($optionItem);
                            // $this->invoice_model->insert_invoice_product($productData);
                        }
                
                    }
                    // $invoice_id = $this->Invoice_model->create_invoice($invoice_data, $items_data);

                    $option = array(
                        'table' => 'vendor_sale_invoice_items',
                        'select' => 'SUM(vendor_sale_invoice_items.price) as total_price',
                        
                        'where' => array('vendor_sale_invoice_items.invoice_id' => $invoice_id),
                        'group_by' => 'vendor_sale_invoice_items.invoice_id',
                        'single'=>true,
                       
                    );
                    
                    $total_prices = $this->common_model->customGet($option);

                    // print_r($total_prices->total_price);die;

                    $options_data = array(    
                         
                        'total_amount'=> $total_prices->total_price,                                              
                        'Paid' => '0.00',                         
                        'Outstanding' => $total_prices->total_price,                                            
                    );
                    $optionUpdate = array(
                        'table' => $this->_table,
                        'data' => $options_data,
                        'where' => array('id' => $invoice_id)
                    );
                    $update = $this->common_model->customUpdate($optionUpdate);


                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }


                
                // $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('contactus/edit'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

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
    public function delete() {
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        if (!empty($id)) {
            $option = array(
                'table' => 'vendor_sale_invoice',
                'data' => array('vendor_sale_invoice.delete_status' => 1),
                'where' => array('vendor_sale_invoice.id' => $id)
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


    


    public function managements(){

        // print_r('jkjdkskjsd');die;
        
            $this->data['parent'] = $this->title;
            $this->data['title'] = $this->title;
            $this->data['model'] = $this->router->fetch_class();
            $role_name = $this->input->post('role_name');
    
            $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    
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

            // if($LoginID != 1 && $LoginID != NULL ){
            //     $x = $LoginID;
            // }

            // $option = array(
            //     'table' => 'vendor_sale_invoice',
            //     'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, SUM(vendor_sale_invoice_items.price) as total_price',
            //     'join' => array(
            //         array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
            //         array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
            //     ),
            //     'where' => array('vendor_sale_invoice.facility_user_id' => $hospital_id, 'delete_status' => 0),
            //     'group_by' => 'vendor_sale_invoice.id',
            //     'order' => array('vendor_sale_invoice.id' => 'DESC'),
            // );
            
            // $option = array(
            //     'table' => 'vendor_sale_invoice',
            //     'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice.total_amount as total_price',
            //     'join' => array(
            //         array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
            //         array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
            //     ),
            //     'where' => array('vendor_sale_invoice.facility_user_id' =>$hospital_id, 'delete_status' => 0),
            //     'order' => array('vendor_sale_invoice.id' =>'DESC'),
            //     'group_by' => 'vendor_sale_invoice.id',
            // );
            // $this->data['invoice_list'] = $this->common_model->customGet($option);

            // $option = array(
            //     'table' => 'vendor_sale_invoice',
            //     'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice.total_amount as total_price', // Adjusting total_amount with SUM
            //     'join' => array(
            //         array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id', 'left'),
            //     ),
            //     'where' => array('vendor_sale_invoice.facility_user_id' => $hospital_id, 'delete_status' => 0),
            //     'order' => array('vendor_sale_invoice.id' => 'DESC'), // Order by DESC for invoice ID
            // );
            
            // $this->data['invoice_list'] = $this->common_model->customGet($option);
            

            $this->db->select('vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice.total_amount as total_price');
            $this->db->from('vendor_sale_invoice');
            $this->db->join('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id', 'left');
            $this->db->where('vendor_sale_invoice.facility_user_id', $hospital_id);
            $this->db->where('delete_status', 0);
            $this->db->order_by('vendor_sale_invoice.id', 'DESC');  // Ensuring descending order

            $query = $this->db->get();
            // echo $this->db->last_query(); die; // This will show you the raw SQL query to check if it's correct
            $this->data['invoice_list'] = $query->result();

            
            
            // print_r($this->data['invoice_list']);die;
            // $this->data['roles'] = array(
            //     'role_name' => $role_name
            // );
            // if ($vendor_profile_activate == "No") {
            //     $vendor_profile_activate = 0;
            // } else {
            //     $vendor_profile_activate = 1;
            // }
    
    
            $this->load->admin_render('management', $this->data, 'inner_script');
        
    }

    private function generateInvoiceQR($invoiceData) {
        // Define path to save the QR code image
        
        $qrCodePath = FCPATH.'uploads/qr_codes/invoice_'.$invoiceData['id'].'.png';
        
        // QR code configuration
        $params['data'] = json_encode($invoiceData); // Data for QR code
        $params['level'] = 'H'; // Error correction level (H = High)
        $params['size'] = 10; // Size of QR code
        $params['savename'] = $qrCodePath;
        
        // Generate the QR Code
        $this->ciqrcode->generate($params);
        // print_r($params);die;
        // Return the URL of the QR code image
        return base_url('uploads/qr_codes/invoice_'.$invoiceData['id'].'.png');
    }
    

    public function pay() {
        $this->data['title'] = "Pay " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/process";
           
        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // if($this->ion_auth->is_subAdmin()){
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


        if($this->ion_auth->is_all_roleslogin()){

            $option = array(
                'table' => ' doctors',
                'select' => 'doctors.*',
                'join' => array(
                    array('users', 'doctors.user_id=users.id', 'left'),
                ),
                
                'where' => array(
                    'users.delete_status' => 0,
                    // 'doctors.user_id'=>$CareUnitID
                ),
                'single' => true,
            );

            $datadoctors = $this->common_model->customGet($option);


            $option = array(
                'table' => ' doctors',
                'select' => 'users.*',
                'join' => array(
                    array('users', 'doctors.user_id=users.id', 'left'),
                    array('user_profile UP', 'UP.user_id=users.id', 'left'),
                    // array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                    
                ),
                
                'where' => array(
                    'users.delete_status' => 0,
                    'users.hospital_id'=>$hospital_id
                    // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);




            $this->data['patient_id'] = decoding($_GET['id']);
            $id = $this->input->post('id');
            $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
            
            $role_name = $this->input->post('role_name');

            $optionPatient = array(
                'table' => 'vendor_sale_users',
                'select' => 'vendor_sale_patient.*',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
                ),
                // 'where' => array('vendor_sale_patient.md_steward_id'=>$datadoctors->facility_user_id),
                'where' => array('users.hospital_id'=>$hospital_id),
            
            );

            $this->data['patient'] = $this->common_model->customGet($optionPatient);

            $optionPractitioner = array(
                'table' => 'vendor_sale_users',
                'select' => 'vendor_sale_practitioner.*',
                'join' => array(
                    array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
                ),
                'where' => array('vendor_sale_practitioner.hospital_id'=>$hospital_id),
                // 'where' => array('vendor_sale_practitioner.hospital_id'=>$datadoctors->facility_user_id),
                // 'single'=>true,
            );

            $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);
            // print_r($datadoctors->facility_user_id);die;

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $option = array(
                'table' => ' doctors',
                'select' => 'users.*',
                'join' => array(
                    array('users', 'doctors.user_id=users.id', 'left'),
                    array('user_profile UP', 'UP.user_id=users.id', 'left'),
                    array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                    
                ),
                
                'where' => array(
                    'users.delete_status' => 0,
                    'users.hospital_id'=>$hospital_id
                    // 'doctors.facility_user_id'=>$CareUnitID
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);

            $this->data['patient_id'] = decoding($_GET['id']);
            $id = $this->input->post('id');
            $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
            // print_r($LoginID);die;
            $role_name = $this->input->post('role_name');

            $optionPatient = array(
                'table' => 'vendor_sale_users',
                'select' => 'vendor_sale_patient.*',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
                ),
                // 'where' => array('vendor_sale_patient.md_steward_id'=>$LoginID),
                'where' => array('users.hospital_id'=>$hospital_id),
                
            );

            $this->data['patient'] = $this->common_model->customGet($optionPatient);

            // print_r($this->data['patient']);die;

            $optionPractitioner = array(
                'table' => 'vendor_sale_users',
                'select' => 'vendor_sale_practitioner.*',
                'join' => array(
                    array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
                ),
                'where' => array('vendor_sale_practitioner.hospital_id'=>$hospital_id),
                // 'single'=>true,
            );

            $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);
        }

        $id = decoding($this->input->post('id'));
        $invoice_id =$id;

        // patient invoice QR Code


        // $this->data['qr_code_url'] = $this->generateInvoiceQR($invoice_id);
        // print_r($this->data['qr_code_url']);die;

        if (!empty($id)) {
            // $option = array(
            //     'table' => $this->_table,
            //     'where' => array('id' => $id),
            //     'single' => true
            // );

            $option = array(
                'table' => 'vendor_sale_invoice',
                'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice_items.price as total_price,vendor_sale_invoice_items.product_name,,vendor_sale_invoice_items.rate,,vendor_sale_invoice_items.quantity,',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
                    array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
                ),
                'where' => array('vendor_sale_invoice.id' => $id),
                // 'group_by' => 'vendor_sale_invoice.id', // Group by invoice ID to get total price for each invoice
                'order' => array('vendor_sale_invoice.id' => 'DESC'),
                'single' => true

            );
            $results_row = $this->common_model->customGet($option);

            $optionItem = array(
                'table' => 'vendor_sale_invoice',
                'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice_items.price as total_price,vendor_sale_invoice_items.product_name,,vendor_sale_invoice_items.rate,,vendor_sale_invoice_items.quantity,',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
                    array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
                ),
                'where' => array('vendor_sale_invoice_items.invoice_id' => $id),
                // 'group_by' => 'vendor_sale_invoice.id', // Group by invoice ID to get total price for each invoice
                'order' => array('vendor_sale_invoice.id' => 'DESC'),
                

            );
            $resultsItem = $this->common_model->customGet($optionItem);

            if (!empty($results_row)) {
                $invoiceData = array(
                    'id' => $results_row->id,
                    'patient_name' => $results_row->patient_name,
                    'total_price' => $results_row->total_price,
                    // Add any other necessary data here
                );
                // print_r($invoiceData);die;
                $this->data['qr_code_url'] = $this->generateInvoiceQR($invoiceData);
                // print_r($this->data['qr_code_url'] );die;
                $this->data['results'] = $results_row;
                $this->data['resultsItem'] = $resultsItem;
                
                $this->load->view('pay', $this->data);
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }


   

public function process() {



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

            // print_r($hospital_id);die;

    $token =  $this->input->post('stripeToken');
        // print_r($token);die;

    // if(!empty($_POST['stripeToken'])){
        $this->form_validation->set_rules('invoice_date', "invoice_date", 'required|trim');
        // $where_id = $this->input->post('id');
       
        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE){
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }else{
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            } else {

        if (!empty($id)) {
            
            // stripe payment gateway

            $option = array(
                'table' => 'payment_gateway',
                'select' => 'payment_gateway.*',
                'order' => array('payment_gateway.id' => 'DESC'),
                'single'=>true,
            );
    
            $stripe_payment_gateway = $this->common_model->customGet($option);

        // print_r($_POST['stripeToken']);die;
            if(!empty($_POST['stripeToken']))
            {
                //get token, card and user info from the form
                $token  = $_POST['stripeToken'];
                
                $email = $this->input->post('email');
                $itemName = $this->input->post('billing_to');
                $itemNumber = $this->input->post('invoice_number');
                $itemPrice = $this->input->post('amount');
                $currency = "usd";
                $orderID = "SKA92712382139";

                //include Stripe PHP library
                require_once APPPATH."third_party/stripe/init.php";
                
                //set api key
                $stripe = array(
                  "secret_key"      => "sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx",
                  "publishable_key" => "pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj"
                );
    
                // $stripe = array(
                //     "secret_key"      => $stripe_payment_gateway->secret_key,
                //     "publishable_key" => $stripe_payment_gateway->publishable_key
                //   );
                
               

                \Stripe\Stripe::setApiKey("sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx");
                                
                $customer = \Stripe\Customer::create(array(
                    'email' => $email,
                    'source'  => $token
                ));
                
               
                
                

                try {
                    // Assuming the customer has been created successfully
                    $charge = \Stripe\Charge::create(array(
                        'customer' => $customer->id,
                        'amount' => $itemPrice, // Amount in cents
                        'currency' => $currency, // e.g., "usd"
                        'description' => $itemName,
                        'metadata' => array(
                            'item_id' => $itemNumber
                        )
                    ));
                    


                    $options_data = array(
                        // 'user_id'=> $LoginID,
                        'facility_user_id'=> $hospital_id,
                        'patient_id' => $this->input->post('patient'),
                        'invoice_id	' => $this->input->post('id'),                       
                        'selected_date	' => $this->input->post('invoice_date'),                         
                        'pay_amount	' => $this->input->post('amount'),                                               
                        'payment_type' => $this->input->post('billing_to'),
                        'payment_method'=>'card',
                        // 'name' => $this->input->post('user_name'),
                        // 'email' => $this->input->post('email'), 
                        // 'card_num' => $card_num, 
                // 'card_cvc' => $card_cvc, 
                // 'card_exp_month' => $card_exp_month, 
                // 'card_exp_year' => $card_exp_year,                         
                                                 
                    );
                    // print_r($options_data);die;
                    $option = array('table' => 'vendor_sale_invoice_pay', 'data' => $options_data);
                    $invoice_id= $this->common_model->customInsert($option);
        
                    
                    $option = array(
                        'table' => 'vendor_sale_invoice',
                        'data' => array('vendor_sale_invoice.Paid' => $this->input->post('amount'),'vendor_sale_invoice.Outstanding' => '0.00','vendor_sale_invoice.status' => 'Paid'),
                        'where' => array('vendor_sale_invoice.id' => $id)
                    );
                    $delete = $this->common_model->customUpdate($option);

                    
                    // Successfully created charge
                    // echo 'Charge successful: ' . $charge->id;
                
                } catch (\Stripe\Exception\CardException $e) {
                    // Card was declined
                    echo 'Card error: ' . $e->getMessage();
                } catch (\Stripe\Exception\InvalidRequestException $e) {
                    // Invalid parameters were supplied to Stripe's API
                    echo 'Invalid request: ' . $e->getMessage();
                } catch (\Stripe\Exception\AuthenticationException $e) {
                    // Authentication with Stripe's API failed
                    echo 'Authentication error: ' . $e->getMessage();
                } catch (\Stripe\Exception\ApiConnectionException $e) {
                    // Network communication with Stripe failed
                    echo 'Network error: ' . $e->getMessage();
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    // Display a generic error to the user
                    echo 'Stripe error: ' . $e->getMessage();
                } catch (Exception $e) {
                    // Something else happened, completely unrelated to Stripe
                    echo 'Error: ' . $e->getMessage();
                }
            }
            
            if(!empty($this->input->post('transaction_id'))){

            $transaction_id = $this->input->post('transaction_id');

           
            $options_data = array(
                // 'user_id'=> $LoginID,
                'facility_user_id'=> $hospital_id,
                'patient_id' => $this->input->post('patient'),
                'invoice_id	' => $this->input->post('id'),                       
                'selected_date	' => $this->input->post('invoice_date'),                         
                'pay_amount	' => $this->input->post('amount'),                                               
                'payment_type' => $this->input->post('billing_to'),  
                // 'name' => $this->input->post('user_name'),
                // 'email' => $this->input->post('email'), 
                'txn_id' => $transaction_id, 
                'payment_method'=>'bank transaction',                     
                                         
            );
            // print_r($options_data);die;
            $option = array('table' => 'vendor_sale_invoice_pay', 'data' => $options_data);
            $invoice_id= $this->common_model->customInsert($option);
            $option = array(
                'table' => 'vendor_sale_invoice',
                'data' => array('vendor_sale_invoice.Paid' => $this->input->post('amount'),'vendor_sale_invoice.Outstanding' => '0.00','vendor_sale_invoice.status' => 'Paid'),
                'where' => array('vendor_sale_invoice.id' => $id)
            );
            $delete = $this->common_model->customUpdate($option);
            }


            if(!empty($this->input->post('cashReceived'))){

                // $transaction_id = $this->input->post('transaction_id');
    
               
                $options_data = array(
                    // 'user_id'=> $LoginID,
                    'facility_user_id'=> $hospital_id,
                    'patient_id' => $this->input->post('patient'),
                    'invoice_id	' => $this->input->post('id'),                       
                    'selected_date	' => $this->input->post('invoice_date'),                         
                    'pay_amount	' => $this->input->post('amount'),                                               
                    'payment_type' => $this->input->post('billing_to'),  
                    // 'name' => $this->input->post('user_name'),
                    // 'email' => $this->input->post('email'), 
                    // 'txn_id' => $transaction_id, 
                    'payment_method'=>'cash',                     
                                             
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_invoice_pay', 'data' => $options_data);
                $invoice_id= $this->common_model->customInsert($option);
            
    
                $option = array(
                    'table' => 'vendor_sale_invoice',
                    'data' => array('vendor_sale_invoice.Paid' => $this->input->post('amount'),'vendor_sale_invoice.Outstanding' => '0.00','vendor_sale_invoice.status' => 'Paid'),
                    'where' => array('vendor_sale_invoice.id' => $id)
                );
                $delete = $this->common_model->customUpdate($option);
    
    
                }
            $response = array('status' => 1, 'message' => "Payment is Successfully", 'url' => base_url($this->router->fetch_class()));
            
        } else {
        $messages = (validation_errors()) ? validation_errors() : '';
        $response = array('status' => 0, 'message' => $messages);
          }
       }
    }
    
    // } else {
    //         $response = array('status' => 0, 'message' => "Stripe token is empty");
            
    //         }
        echo json_encode($response);
    
}


    public function pdfInvoice() {
        $this->data['title'] = "PDF Invoice " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/update";


           
        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';


        $id = decoding($this->input->post('id'));
        // $id = decoding($this->input->post('pdfInvoice'));
        // print_r($id);die;
        if (!empty($id)) {
            // $option = array(
            //     'table' => $this->_table,
            //     'where' => array('id' => $id),
            //     'single' => true
            // );

            $option = array(
                'table' => 'vendor_sale_invoice',
                'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_users.email as patient_email, 
                            SUM(vendor_sale_invoice_items.price) as total_price,vendor_sale_invoice_items.product_name,vendor_sale_invoice_items.rate,vendor_sale_invoice_items.quantity,vendor_sale_invoice_items.price',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id', 'left'),
                    array('vendor_sale_users', 'vendor_sale_users.id = vendor_sale_patient.user_id', 'left'),
                    array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id', 'left')
                ),
                'where' => array('vendor_sale_invoice.id' => $id, 'vendor_sale_invoice.delete_status' => 0),
                'group_by' => 'vendor_sale_invoice.id',
                'order' => array('vendor_sale_invoice.id' => 'DESC'),
                'single' => true
            );
            
            // $results_row = $this->common_model->customGet($option);
            

            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {
                $this->data['results'] = $results_row;

                $optionItem = array(
                    'table' => 'vendor_sale_invoice',
                    'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice_items.price as total_price,vendor_sale_invoice_items.product_name,,vendor_sale_invoice_items.rate,,vendor_sale_invoice_items.quantity,',
                    'join' => array(
                        array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
                        array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
                    ),
                    'where' => array('vendor_sale_invoice_items.invoice_id' => $id),
                    // 'group_by' => 'vendor_sale_invoice.id', // Group by invoice ID to get total price for each invoice
                    'order' => array('vendor_sale_invoice.id' => 'DESC'),
                    
    
                );
                $resultsItem = $this->common_model->customGet($optionItem);
                $this->data['resultsItem'] = $resultsItem;
                // print_r($this->data['resultsItem']);die;
                $this->load->view('pdf_invoice', $this->data);
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    public function pdfInvoiceReceipt() {
        $this->data['title'] = "PDF Invoice " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/update";


           
        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';


        $id = decoding($this->input->post('id'));
        // $id = decoding($this->input->post('pdfInvoice'));
        // print_r($id);die;
        if (!empty($id)) {
            // $option = array(
            //     'table' => $this->_table,
            //     'where' => array('id' => $id),
            //     'single' => true
            // );

            $option = array(
                'table' => 'vendor_sale_invoice',
                'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_users.email as patient_email, 
                            SUM(vendor_sale_invoice_items.price) as total_price,vendor_sale_invoice_items.product_name,vendor_sale_invoice_items.rate,vendor_sale_invoice_items.quantity,vendor_sale_invoice_items.price',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id', 'left'),
                    array('vendor_sale_users', 'vendor_sale_users.id = vendor_sale_patient.user_id', 'left'),
                    array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id', 'left')
                ),
                'where' => array('vendor_sale_invoice.id' => $id, 'vendor_sale_invoice.delete_status' => 0),
                'group_by' => 'vendor_sale_invoice.id',
                'order' => array('vendor_sale_invoice.id' => 'DESC'),
                'single' => true
            );
            
            // $results_row = $this->common_model->customGet($option);
            

            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {
                $this->data['results'] = $results_row;

                $optionItem = array(
                    'table' => 'vendor_sale_invoice',
                    'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice_items.price as total_price,vendor_sale_invoice_items.product_name,,vendor_sale_invoice_items.rate,,vendor_sale_invoice_items.quantity,',
                    'join' => array(
                        array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
                        array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
                    ),
                    'where' => array('vendor_sale_invoice_items.invoice_id' => $id),
                    // 'group_by' => 'vendor_sale_invoice.id', // Group by invoice ID to get total price for each invoice
                    'order' => array('vendor_sale_invoice.id' => 'DESC'),
                    
    
                );
                $resultsItem = $this->common_model->customGet($optionItem);
                $this->data['resultsItem'] = $resultsItem;
                // print_r($this->data['resultsItem']);die;
                $this->load->view('invoice_receipt', $this->data);
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    
    public function fetchAllProduct() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchAllProducts($query);
            // print_r($results);die;
            // $output .= '<select class="form-control select2" name="consultation_product[]" id="consultation_product" onclick="getSearchAllProduct()">';
            // if (!empty($results)) {
            //     foreach ($results as $row) {
            //         $output .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                   
            //     }
            // } else {
            //     $output .= '<option>No Data Found</option>';
            // }
            // $output .= '</select>';
            // echo $output;

            // $output .= '<select class="form-control select2" name="consultation_product[]" id="consultation_product" onclick="getSearchAllProduct()">';
            // if (!empty($results)) {
            //     foreach ($results as $row) {
            //         $output .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                   
            //     }
            // } else {
            //     $output .= '<option>No Data Found</option>';
            // }
            // $output .= '</select>';

            echo json_encode($results);
        }
    }

    public function fetchProductDetail(){
        $query = $this->input->post('query');


        $option = array(
            'table' => ' vendor_sale_doctor_product',
            'select' => 'vendor_sale_doctor_product.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_doctor_product.user_id=vendor_sale_users.id', 'left'),
            ),
            
            'where' => array(
                // 'vendor_sale_doctor_product.delete_status' => 0,
                'vendor_sale_doctor_product.id'=>$query
            ),
            'single' => true,
        );
    
        $results_row = $this->common_model->customGet($option);
        echo json_encode($results_row);
        // print_r($results_row);die;

    }

    public function fetchAllProductSearch() {
        $output = '';
        $query = $this->input->post('query');
        
        if ($query) {
            $results = $this->common_model->fetchAllProductsItem($query);

        //     $results = $this->common_model->fetchAllProductsItem($query);
        //     // print_r($results);die;
        //     $output .= '<select class="form-control select2" name="consultation_product[]" id="consultation_productadd" onclick="getSearchAllProductAdd()">';
        //     if (!empty($results)) {
        //         foreach ($results as $row) {
        //             $output .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                   
        //         }
        //     } else {
        //         $output .= '<option>No Data Found</option>';
        //     }
        //     $output .= '</select>';
        //     echo $output;
        echo json_encode($results);
        }
    }

    public function fetchProductDetailAdd(){
        $query = $this->input->post('query');


        $option = array(
            'table' => ' vendor_sale_doctor_product',
            'select' => 'vendor_sale_doctor_product.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_doctor_product.user_id=vendor_sale_users.id', 'left'),
            ),
            
            'where' => array(
                // 'vendor_sale_doctor_product.delete_status' => 0,
                'vendor_sale_doctor_product.id'=>$query
            ),
            'single' => true,
        );
    
        $results_row = $this->common_model->customGet($option);
        echo json_encode($results_row);
        // print_r($results_row);die;

    }
    


    // Edit item search function 

    public function fetchAllProductEdit() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchAllProducts($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_product[]" id="consultation_product_update" onclick="getSearchAllProductUpdate()">';
            if (!empty($results)) {
                foreach ($results as $row) {
                    $output .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                   
                }
            } else {
                $output .= '<option>No Data Found</option>';
            }
            $output .= '</select>';
            echo $output;
        }
    }
    public function fetchAllProductSearchEdit() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchAllProducts($query);
            // print_r($results);die;
            // $output .= '<select class="form-control select2" name="consultation_product[]" id="consultation_product_edit" onclick="getSearchAllProductEdit()">';
            // if (!empty($results)) {
            //     foreach ($results as $row) {
            //         $output .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                   
            //     }
            // } else {
            //     $output .= '<option>No Data Found</option>';
            // }
            // $output .= '</select>';
            echo json_encode($results);
        }
    }

}
