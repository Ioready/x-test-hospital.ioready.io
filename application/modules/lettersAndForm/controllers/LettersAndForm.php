<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
class LettersAndForm extends Common_Controller {

    public $data = array();
    public $file_data = "";
    public $_table = 'culture_source';
    public $_tables = 'letters_and_form';
    // public $_tables = 'clinic';
    
    public $title = "Letters And Form";

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
        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['model_'] = $this->router->fetch_class();
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        // $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        
        $CareUnitID = $_SESSION['user_id'];
        $option = array(
            'table' => ' users',
            'select' => 'users.*',
            'where' => array(
                'users.delete_status' => 0,
                'users.id'=>$CareUnitID
            ),
            'single' => true,
        );

        $this->data['careUnitID'] = $this->common_model->customGet($option);

        // print_r($this->data['careUnitID']);die;
        // $option = array('table' => $this->_tables);

       $id=  decoding($_GET['id']);
    //    print_r($id);die;
        $option = array(
            'table' => 'letters_and_form',
            'select' =>'letters_and_form`.*,vendor_sale_users.first_name,vendor_sale_users.last_name',
            'join' => array(
                array('vendor_sale_users', 'letters_and_form.user_id=vendor_sale_users.id', 'left'),
            ),
            
            'where' => array('letters_and_form.patient_id' => $id)
        );


        $this->data['list'] = $this->common_model->customGet($option);

        $form_option = array(
            'table' => 'vendor_sale_imaging_request_form',
            'select' =>'vendor_sale_imaging_request_form`.*,vendor_sale_users.first_name,vendor_sale_users.last_name,vendor_sale_booking_form.title',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_imaging_request_form.patient_id=vendor_sale_users.id', 'left'),
                array('vendor_sale_booking_form', 'vendor_sale_imaging_request_form.id=vendor_sale_booking_form.form_id', 'left'),
            ),
            
            'where' => array('vendor_sale_imaging_request_form.patient_id' => $id)
        );

        $this->data['form_list'] = $this->common_model->customGet($form_option);
        
        // print_r($this->data['list']);die;
       
        $this->load->admin_render('list', $this->data, 'inner_script');
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

    //         if($this->ion_auth->is_all_roleslogin()){

    //             $option = array(
    //                 'table' => ' doctors',
    //                 'select' => 'doctors.*',
    //                 'join' => array(
    //                     array('users', 'doctors.user_id=users.id', 'left'),
    //                 ),
                    
    //                 'where' => array(
    //                     'users.delete_status' => 0,
    //                     'doctors.user_id'=>$CareUnitID
    //                     // 'users.hospital_id'=>$hospital_id
    //                 ),
    //                 'single' => true,
    //             );

    //     $datadoctors = $this->common_model->customGet($option);


    // $option = array(
    //         'table' => ' doctors',
    //         'select' => 'users.*',
    //         'join' => array(
    //             array('users', 'doctors.user_id=users.id', 'left'),
    //             array('user_profile UP', 'UP.user_id=users.id', 'left'),
    //             // array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                
    //         ),
            
    //         'where' => array(
    //             'users.delete_status' => 0,
    //             // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
    //             // 'users.hospital_id'=>$hospital_id
    //         ),
    //         'order' => array('users.id' => 'desc'),
    //     );
    //     $this->data['doctors'] = $this->common_model->customGet($option);
        

    //     $this->data['send_mail_template'] = $this->common_model->customGet(array('table' => 'send_mail_template', 'select' => 'send_mail_template.*', 'where' => array('user_id' =>$datadoctors->facility_user_id)));

        

    // } else if ($this->ion_auth->is_facilityManager()) {
        
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
                // 'users.hospital_id'=>$hospital_id
            ),
            'order' => array('users.id' => 'desc'),
        );
        $this->data['doctors'] = $this->common_model->customGet($option);

        // $send_mail_template = $this->common_model->customGet(array('table' => 'send_mail_template', 'select' => 'send_mail_template.app_name', 'where' => array('user_id' =>$CareUnitID)));
        $send_mail_template = $this->common_model->customGet(array('table' => 'send_mail_template', 'select' => 'send_mail_template.app_name'));
        // print_r($send_mail_template);die;
       $template_name =[];
        foreach($send_mail_template as $key=>$datavalues){
            $template_name[$key] =  $datavalues->app_name;

       } 

    //    $send_mailt=  implode(', ', array_map(function($val){return sprintf("'%s'", $val);}, $template_name));
    $this->data['send_mail_template']=$template_name;
    // }
    // print_r($template_name);
        $this->load->view('add', $this->data);
    }


    function viewLetters() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/updateBookingForm";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        $this->data['form_id'] = decoding($_GET['form_id']);
        // print_r($this->data['patient_id']);die;
        // $option = array('table' => $this->_tables);

        $form_id=  decoding($_GET['form_id']);
       $id=  decoding($_GET['id']);
    //    print_r($form_id);die;
    $option = array(
        'table' => 'vendor_sale_letters_and_form',
        'where' => array('id' => $form_id),
        'single' => true
    );
    // $results_row = $this->common_model->customGet($option);


        $this->data['result'] = $this->common_model->customGet($option);
        // print_r($this->data['list']);die;
        $this->load->admin_render('view_letters', $this->data, 'inner_script');
                // $this->load->view('booking_form', $this->data, 'inner_script');
    }


    function open_model_form() {

        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrlData'] = $this->router->fetch_class() . "/add";
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
                    ),
                    
                    'where' => array(
                        'users.delete_status' => 0,
                        // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
                        'users.hospital_id'=>$hospital_id
                    ),
                    'order' => array('users.id' => 'desc'),
                );
            $this->data['doctors'] = $this->common_model->customGet($option);
            $this->data['send_mail_template'] = $this->common_model->customGet(array('table' => 'send_mail_template', 'select' => 'send_mail_template.*', 'where' => array('user_id' =>$datadoctors->facility_user_id)));

        

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

                $send_mail_template = $this->common_model->customGet(array('table' => 'send_mail_template', 'select' => 'send_mail_template.app_name', 'where' => array('user_id' =>$CareUnitID)));
            $$template_name =[];
                foreach($send_mail_template as $key=>$datavalues){
                    $template_name[$key] =  $datavalues->app_name;

            } 

            $send_mailt=  implode(', ', array_map(function($val){return sprintf("'%s'", $val);}, $template_name));
            $this->data['send_mail_template']=$send_mailt;
            }
                $this->load->view('forms', $this->data);
    }


    function bookingForm() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/addBookingForm";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        // print_r($this->data['patient_id']);die;
        // $option = array('table' => $this->_tables);

       $id=  decoding($_GET['id']);
    //    print_r($id);die;
        $option = array(
            'table' => 'letters_and_form',
            'select' =>'letters_and_form`.*,vendor_sale_users.first_name,vendor_sale_users.last_name',
            'join' => array(
                array('vendor_sale_users', 'letters_and_form.user_id=vendor_sale_users.id', 'left'),
            ),
            
            'where' => array('letters_and_form.patient_id' => $id)
        );


        $this->data['list'] = $this->common_model->customGet($option);
        // print_r($this->data['list']);die;
        $this->load->admin_render('booking_form', $this->data, 'inner_script');
                // $this->load->view('booking_form', $this->data, 'inner_script');
    }



    public function addBookingForm() {

        // print_r($this->input->post());die;
        // $this->form_validation->set_rules('appointment_type', "appointment_type", 'required|trim');
        // if ($this->form_validation->run() == true) {
           
            $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

            $optionsBooking = array(
                   
                'patient_id' => $this->input->post('patient_id'),
                'facility_user_id' => $CareUnitID,
                'form_type' =>'booking_form',
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'first_name' => $this->input->post('first_name'),
                'surname' => $this->input->post('surname'),
                'dob' => $this->input->post('dob'),
            );

            $optionBookingForm = array('table' => 'vendor_sale_imaging_request_form', 'data' => $optionsBooking);
            $this->common_model->customInsert($optionBookingForm);
            $lastInsertedId = $this->db->insert_id();
           
                $options_data = array(
                   
                    'patient_id' => $this->input->post('patient_id'),
                    'facility_user_id' => $CareUnitID,
                    'form_id'=>$lastInsertedId,
                    'appointment_type' =>$this->input->post('appointment_type'),
                    'completed_by' => $this->input->post('completed_by'),
                    'completed_date' => $this->input->post('completed_date'),
                    'empi_number' => $this->input->post('empi_number'),
                    'nhs_number' => $this->input->post('nhs_number'),
                    'nhs_referral' => $this->input->post('nhs_referral'),
                    'gender' => $this->input->post('gender'),
                    'title' => $this->input->post('title'),
                    'first_name' => $this->input->post('first_name'),
                    'surname' => $this->input->post('surname'),
                    'dob' => $this->input->post('dob'),
                    'contact' => $this->input->post('contact'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'player' => $this->input->post('player'),
                    'sponsor_details' => $this->input->post('sponsor_details'),
                    'insurer_information' => $this->input->post('insurer_information'),
                    'insurer' => $this->input->post('insurer'),
                    'policy_number' => $this->input->post('policy_number'),
                    'authorisation_if_known' => $this->input->post('authorisation_if_known'),
                    'next_of_kin_name' => $this->input->post('next_of_kin_name'),
                    'next_of_kin_contact' => $this->input->post('next_of_kin_contact'),
                    'interpreter_needed' => $this->input->post('interpreter_needed'),
                    'interpreter_language' => $this->input->post('interpreter_language'),
                    'ethnicity' => $this->input->post('ethnicity'),
                    'complex_needs' => $this->input->post('complex_needs'),
                    'details_of_complex_needs' => $this->input->post('details_of_complex_needs'),
                    'co_morbidities' => $this->input->post('co_morbidities'),
                    'details_of_co_morbidities' => $this->input->post('details_of_co_morbidities'),
                    'dietary_requirements' => $this->input->post('dietary_requirements'),
                    'admitting_consultant' => $this->input->post('admitting_consultant'),
                    'admission_date' => $this->input->post('admission_date'),
                    'admission_time' => $this->input->post('admission_time'),
                    'location' => $this->input->post('location'),
                    'procedure_date' => $this->input->post('procedure_date'),
                    'procedure_time' => $this->input->post('procedure_time'),
                    'surgeon' => $this->input->post('surgeon'),
                    'surgeon_assistant' => $this->input->post('surgeon_assistant'),
                    'anaesthetist' => $this->input->post('anaesthetist'),
                    'referring_gp' => $this->input->post('referring_gp'),
                    'gp_address' => $this->input->post('gp_address'),
                    'medical_diagnosis_symptoms' => $this->input->post('medical_diagnosis_symptoms'),
                    'procedure_description' => $this->input->post('procedure_description'),
                    'side_of_surgery' => $this->input->post('side_of_surgery'),
                    'duration' => $this->input->post('duration'),
                    'type_of_anaesthesia' => $this->input->post('type_of_anaesthesia'),
                    'length_of_stay' => $this->input->post('length_of_stay'),
                    'special_requirements_instrumentation' => $this->input->post('special_requirements_instrumentation'),
                    'relevant_previous_medical_history' => $this->input->post('relevant_previous_medical_history'),
                    'pcu_required' => $this->input->post('pcu_required'),
                    'itu_required' => $this->input->post('itu_required'),
                    'image_intensifier_required' => $this->input->post('image_intensifier_required'),
                    'tests_investigations_required' => $this->input->post('tests_investigations_required'),
                    'procedure_urgency_category' => $this->input->post('procedure_urgency_category')
                );

                $option = array('table' => 'vendor_sale_booking_form', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {

                $response = array('status' => 1, 'message' => "Successfully added", 'url' =>base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
           
        echo json_encode($response);
    }


    function editBookingForm() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/updateBookingForm";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        $this->data['form_id'] = decoding($_GET['form_id']);
        // print_r($this->data['patient_id']);die;
        // $option = array('table' => $this->_tables);

        $form_id=  decoding($_GET['form_id']);
        $id=  decoding($_GET['id']);

        $formType = array(
            'table' => 'vendor_sale_imaging_request_form',
            'where' => array('id' => $form_id),
            'single' => true
        );

        $formTypePatients = $this->common_model->customGet($formType);

        $patientFormType = $formTypePatients->form_type;
    // print_r($patientFormType);die;
        if($patientFormType =='booking_form'){
            $option = array(
                'table' => 'vendor_sale_imaging_request_form',
                'select'=>'vendor_sale_booking_form.*',
                'join' => array(
                        array('vendor_sale_booking_form', 'vendor_sale_imaging_request_form.id=vendor_sale_booking_form.form_id', 'left'),
                    ),
                'where' => array('vendor_sale_imaging_request_form.id' => $form_id),
                'single' => true
            );

            $this->data['result'] = $this->common_model->customGet($option);
            // print_r($this->data['result']);die;
            $this->load->admin_render('edit_booking_form', $this->data, 'inner_script');

        }else{
            $option = array(
                'table' => 'vendor_sale_imaging_request_form',
                'select'=>'vendor_sale_imaging_request_form.*',
                'join' => array(
                        array('vendor_sale_booking_form', 'vendor_sale_imaging_request_form.id=vendor_sale_booking_form.form_id', 'left'),
                    ),
                'where' => array('vendor_sale_imaging_request_form.id' => $form_id),
                'single' => true
            );

            $this->data['result'] = $this->common_model->customGet($option);
            // print_r($this->data['result']);die;
            $this->load->admin_render('edit_imaging_request_form', $this->data, 'inner_script');
        }
        // $this->data['result'] = $this->common_model->customGet($option);
        // // print_r($this->data['result']);die;
        // $this->load->admin_render('edit_booking_form', $this->data, 'inner_script');

        
    }



    public function updateBookingForm() {

        
            $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
            
            $formType = array(
                'table' => 'vendor_sale_imaging_request_form',
                'where' => array('id' => $this->input->post('form_id')),
                'single' => true
            );
    
            $formTypePatients = $this->common_model->customGet($formType);
            $patientFormType = $formTypePatients->form_type;

        // print_r($patientFormType);die;
            if($patientFormType =='booking_form'){

                $optionsBooking = array(
                   
                    // 'patient_id' => $this->input->post('patient_id'),
                    // 'facility_user_id' => $CareUnitID,
                    'form_type' =>'booking_form',
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'first_name' => $this->input->post('first_name'),
                    'surname' => $this->input->post('surname'),
                    'dob' => $this->input->post('dob'),
                );
    
                $optionBookingForm = array('table' => 'vendor_sale_imaging_request_form', 'data' => $optionsBooking, 'where' => array('id' => $this->input->post('form_id')));
    
                $this->common_model->customUpdate($optionBookingForm);


                $options_data = array(
                   
                    'appointment_type' =>$this->input->post('appointment_type'),
                    'completed_by' => $this->input->post('completed_by'),
                    'completed_date' => $this->input->post('completed_date'),
                    'empi_number' => $this->input->post('empi_number'),
                    'nhs_number' => $this->input->post('nhs_number'),
                    'nhs_referral' => $this->input->post('nhs_referral'),
                    'gender' => $this->input->post('gender'),
                    'title' => $this->input->post('title'),
                    'first_name' => $this->input->post('first_name'),
                    'surname' => $this->input->post('surname'),
                    'dob' => $this->input->post('dob'),
                    'contact' => $this->input->post('contact'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'player' => $this->input->post('player'),
                    'sponsor_details' => $this->input->post('sponsor_details'),
                    'insurer_information' => $this->input->post('insurer_information'),
                    'insurer' => $this->input->post('insurer'),
                    'policy_number' => $this->input->post('policy_number'),
                    'authorisation_if_known' => $this->input->post('authorisation_if_known'),
                    'next_of_kin_name' => $this->input->post('next_of_kin_name'),
                    'next_of_kin_contact' => $this->input->post('next_of_kin_contact'),
                    'interpreter_needed' => $this->input->post('interpreter_needed'),
                    'interpreter_language' => $this->input->post('interpreter_language'),
                    'ethnicity' => $this->input->post('ethnicity'),
                    'complex_needs' => $this->input->post('complex_needs'),
                    'details_of_complex_needs' => $this->input->post('details_of_complex_needs'),
                    'co_morbidities' => $this->input->post('co_morbidities'),
                    'details_of_co_morbidities' => $this->input->post('details_of_co_morbidities'),
                    'dietary_requirements' => $this->input->post('dietary_requirements'),
                    'admitting_consultant' => $this->input->post('admitting_consultant'),
                    'admission_date' => $this->input->post('admission_date'),
                    'admission_time' => $this->input->post('admission_time'),
                    'location' => $this->input->post('location'),
                    'procedure_date' => $this->input->post('procedure_date'),
                    'procedure_time' => $this->input->post('procedure_time'),
                    'surgeon' => $this->input->post('surgeon'),
                    'surgeon_assistant' => $this->input->post('surgeon_assistant'),
                    'anaesthetist' => $this->input->post('anaesthetist'),
                    'referring_gp' => $this->input->post('referring_gp'),
                    'gp_address' => $this->input->post('gp_address'),
                    'medical_diagnosis_symptoms' => $this->input->post('medical_diagnosis_symptoms'),
                    'procedure_description' => $this->input->post('procedure_description'),
                    'side_of_surgery' => $this->input->post('side_of_surgery'),
                    'duration' => $this->input->post('duration'),
                    'type_of_anaesthesia' => $this->input->post('type_of_anaesthesia'),
                    'length_of_stay' => $this->input->post('length_of_stay'),
                    'special_requirements_instrumentation' => $this->input->post('special_requirements_instrumentation'),
                    'relevant_previous_medical_history' => $this->input->post('relevant_previous_medical_history'),
                    'pcu_required' => $this->input->post('pcu_required'),
                    'itu_required' => $this->input->post('itu_required'),
                    'image_intensifier_required' => $this->input->post('image_intensifier_required'),
                    'tests_investigations_required' => $this->input->post('tests_investigations_required'),
                    'procedure_urgency_category' => $this->input->post('procedure_urgency_category')
                );
            
                $option = array('table' => 'vendor_sale_booking_form', 'data' => $options_data, 'where' => array('form_id' => $this->input->post('form_id')));

                // print_r($option);die;
                // $this->common_model->customUpdate($option);

                if ($this->common_model->customUpdate($option)) {

                    $response = array('status' => 1, 'message' => "Successfully updated", 'url' =>base_url($this->router->fetch_class()));
                    } else {
                        $response = array('status' => 0, 'message' => "Failed to updated");
                    }

            }else{

                $options_data = array(
                    
                    'surname' =>$this->input->post('surname'),
                    'first_name' => $this->input->post('first_name'),
                    'dob' => $this->input->post('dob'),
                    'gender' => $this->input->post('gender'),
                    'hospital_number' => $this->input->post('hospital_number'),
                    'address' => $this->input->post('address'),
                    'post_code' => $this->input->post('post_code'),
                    'tel_home' => $this->input->post('tel_home'),
                    'tel_mobile' => $this->input->post('tel_mobile'),
                    'date_time' => $this->input->post('date_time'),
                    'op' => $this->input->post('op'),
                    'ip' => $this->input->post('ip'),
                    'oxygen' => $this->input->post('oxygen'),
                    'pregnant' => $this->input->post('pregnant'),
                    'xray' => $this->input->post('xray'),
                    'first_day_of_lmp' => $this->input->post('first_day_of_lmp'),
                    'breastfeeding' => $this->input->post('breastfeeding'),
                    'signature' => $this->input->post('signature'),
                    'date' => $this->input->post('date'),
                    'referrer_signature' => $this->input->post('referrer_signature'),
                    'referrer_date' => $this->input->post('referrer_date'),
                    'referrer_name_address' => $this->input->post('referrer_name_address'),
                    'medication_required_allergies' => $this->input->post('medication_required_allergies'),
                    'medication_required_medication' => $this->input->post('medication_required_medication'),
                    'medication_required_dose' => $this->input->post('medication_required_dose'),
                    'medication_required_date' => $this->input->post('medication_required_date'),
                    'medication_required_signature' => $this->input->post('medication_required_signature'),
                    'medication_required_gmc_no' => $this->input->post('medication_required_gmc_no'),
                    'mri_patients_cardiac_pacemaker' => $this->input->post('mri_patients_cardiac_pacemaker'),
                    'mri_patients_heart_valve' => $this->input->post('mri_patients_heart_valve'),
                    'mri_patients_metal_fragments' => $this->input->post('mri_patients_metal_fragments'),
                    'mri_patients_cranial_surgery' => $this->input->post('mri_patients_cranial_surgery'),
                    'mri_patients_metal_body' => $this->input->post('mri_patients_metal_body'),
                    'mri_patients_anti_coagulant' => $this->input->post('mri_patients_anti_coagulant'),
                    'mri_patients_provide_egfr' => $this->input->post('mri_patients_provide_egfr'),
                    'imaging_department_staff' => $this->input->post('imaging_department_staff'),
                    'returned_check_id' => $this->input->post('returned_check_id'),
                    'operator_use_patient_height' => $this->input->post('operator_use_patient_height'),
                    'operator_use_patient_weight' => $this->input->post('operator_use_patient_weight'),
                    'operator_use_kv' => $this->input->post('operator_use_kv'),
                    'operator_use_mas' => $this->input->post('operator_use_mas'),
                    'pperators_name_signature' => $this->input->post('pperators_name_signature'),
                    'operators_number_of_exposures_films' => $this->input->post('operators_number_of_exposures_films'),
                    'operators_dose_cgycm' => $this->input->post('operators_dose_cgycm'),
                    'operators_fluoro_time' => $this->input->post('operators_fluoro_time'),
                    'operators_examination_justified_name_signature' => $this->input->post('operators_examination_justified_name_signature'),
                    'patient_holding_record_pregnancy' => $this->input->post('patient_holding_record_pregnancy'),
                    'patient_holding_record_comforter_carer' => $this->input->post('patient_holding_record_comforter_carer'),
                    'patient_holding_record_signature' => $this->input->post('patient_holding_record_signature'),
                    'patient_holding_record_ffd' => $this->input->post('patient_holding_record_ffd'),
                    'patient_holding_record_patient_carer_distance' => $this->input->post('patient_holding_record_patient_carer_distance'),
                    'patient_holding_record_patient_dose' => $this->input->post('patient_holding_record_patient_dose'),
                    'checklist_patient_id_check' => $this->input->post('checklist_patient_id_check'),
                    'checklist_exam_justification' => $this->input->post('checklist_exam_justification'),
                    'checklist_previous_exams' => $this->input->post('checklist_previous_exams'),
                    'checklist_risk_explained' => $this->input->post('checklist_risk_explained'),
                    'checklist_within_limits' => $this->input->post('checklist_within_limits'),
                    'checklist_report_flagged' => $this->input->post('checklist_report_flagged'),
                    'notes' => $this->input->post('notes'),
                    'operator_comments' => $this->input->post('operator_comments'),
                );
    
                // $optionBookingForm = array('table' => 'vendor_sale_imaging_request_form', 'data' => $optionsBooking);
                $option = array('table' => 'vendor_sale_imaging_request_form', 'data' => $options_data, 'where' => array('id' => $this->input->post('form_id')));
                // print_r($option);die;
                // $this->common_model->customUpdate($optionBookingForm);

                if ($this->common_model->customUpdate($option)) {

                    $response = array('status' => 1, 'message' => "Successfully updated", 'url' =>base_url($this->router->fetch_class()));
                    } else {
                        $response = array('status' => 0, 'message' => "Failed to updated");
                    }
            }

            
               
            echo json_encode($response);
    }


    function deleteBookingForm() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/updateBookingForm";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        $this->data['form_id'] = decoding($_GET['form_id']);
       
        $form_id=  decoding($_GET['form_id']);
        $id=  decoding($_GET['id']);
    
    // $option = array(
    //     'table' => 'vendor_sale_booking_form',
    //     'where' => array('id' => $form_id),
    // );
   
    //     $this->common_model->customDelete($option);

    $form_option = array(
        'table' => 'vendor_sale_letters_and_form',
        'where' => array('id' => $form_id),
    );

    $this->common_model->customDelete($form_option);

    $option = array(
        'table' => 'vendor_sale_imaging_request_form',
        'where' => array('id' => $form_id),
    );

    $this->common_model->customDelete($option);
    
       
        $this->session->set_flashdata('message', 'Deleted Successfully.');
        redirect('lettersAndForm?id=' . encoding($id));
       
    }

    /**
     * @method menu_category_add
     * @description add dynamic rows
     * @return array
     */
    public function add() {

        // print_r($this->input->post());die;
        $this->form_validation->set_rules('details', "details", 'required|trim');
        if ($this->form_validation->run() == true) {
           
           
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
                $options_data = array(
                   
                    'patient_id' => $this->input->post('patient_id'),
                    'user_id' => $CareUnitID,
                    'facility_user_id' => $hospital_id,
                    'details' => $this->input->post('details'),
                    'type' => $this->input->post('type'),
                    'template_id' => $this->input->post('template_id'),
                    'is_active' => 1,
                    'create_date' => datetime()
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_letters_and_form', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
$response = array('status' => 1, 'message' => "Successfully added", 'url' =>base_url($this->router->fetch_class()));
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
     * @method menu_category_edit
     * @description edit dynamic rows
     * @return array
     */
    public function edit() {
        $this->data['title'] = "Edit " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/update";
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
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }


    

   
    /**
     * @method menu_category_update
     * @description update dynamic rows
     * @return array
     */
    public function update() {

        $this->form_validation->set_rules('name', "Name", 'required|trim');
        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;
            $image = $this->input->post('exists_image');

            if (!empty($_FILES['image']['name'])) {
                $this->filedata = $this->commonUploadImage($_POST, 'submenu', 'image');
                if ($this->filedata['status'] == 1) {
                    $image = 'uploads/submenu/' . $this->filedata['upload_data']['file_name'];
                    delete_file($this->input->post('exists_image'), FCPATH);
                }
            }
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            } else {

                $options_data = array(
                    'name' => $this->input->post('name')
                );
                $option = array(
                    'table' => $this->_table,
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url($this->router->fetch_class()));
            }
        endif;

        echo json_encode($response);
    }




 public function getAllEmailTemplate(){

    $id = $this->input->post('id');     
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
                // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
                'users.hospital_id'=>$hospital_id
            ),
            'order' => array('users.id' => 'desc'),
        );
        $this->data['doctors'] = $this->common_model->customGet($option);

        $this->data['send_mail_template'] = $this->common_model->customGet(array('table' => 'send_mail_template', 'select' => 'send_mail_template.*', 'where' => array('user_id' =>$datadoctors->facility_user_id)));

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

       $optionData = array('table' => 'send_mail_template', 'select' => 'send_mail_template.description', 'where' => array('user_id' =>$CareUnitID,'app_name'=>$id),
       'single' => true,
    );

        $send_mail_template = $this->common_model->customGet($optionData);
        
        $response= $send_mail_template->description;
        
    }

    echo $response;

    }


    function imagingRequestForm() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/addImagingRequestForm";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        // print_r($this->data['patient_id']);die;
        // $option = array('table' => $this->_tables);

       $id=  decoding($_GET['id']);
    //    print_r($id);die;
        $option = array(
            'table' => 'letters_and_form',
            'select' =>'letters_and_form`.*,vendor_sale_users.first_name,vendor_sale_users.last_name',
            'join' => array(
                array('vendor_sale_users', 'letters_and_form.user_id=vendor_sale_users.id', 'left'),
            ),
            
            'where' => array('letters_and_form.patient_id' => $id)
        );


        $this->data['list'] = $this->common_model->customGet($option);
        // print_r($this->data['list']);die;
        $this->load->admin_render('imaging_request_form', $this->data, 'inner_script');
                // $this->load->view('booking_form', $this->data, 'inner_script');
    }


    public function addImagingRequestForm() {

        // print_r($this->input->post());die;
        // $this->form_validation->set_rules('appointment_type', "appointment_type", 'required|trim');
        // if ($this->form_validation->run() == true) {
           
            $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
           
                $options_data = array(
                    'patient_id' => $this->input->post('patient_id'),
                    'facility_user_id' => $CareUnitID,
                    'surname' =>$this->input->post('surname'),
                    'first_name' => $this->input->post('first_name'),
                    'dob' => $this->input->post('dob'),
                    'gender' => $this->input->post('gender'),
                    'hospital_number' => $this->input->post('hospital_number'),
                    'address' => $this->input->post('address'),
                    'post_code' => $this->input->post('post_code'),
                    'tel_home' => $this->input->post('tel_home'),
                    'tel_mobile' => $this->input->post('tel_mobile'),
                    'date_time' => $this->input->post('date_time'),
                    'op' => $this->input->post('op'),
                    'ip' => $this->input->post('ip'),
                    'oxygen' => $this->input->post('oxygen'),
                    'pregnant' => $this->input->post('pregnant'),
                    'xray' => $this->input->post('xray'),
                    'first_day_of_lmp' => $this->input->post('first_day_of_lmp'),
                    'breastfeeding' => $this->input->post('breastfeeding'),
                    'signature' => $this->input->post('signature'),
                    'date' => $this->input->post('date'),
                    'referrer_signature' => $this->input->post('referrer_signature'),
                    'referrer_date' => $this->input->post('referrer_date'),
                    'referrer_name_address' => $this->input->post('referrer_name_address'),
                    'medication_required_allergies' => $this->input->post('medication_required_allergies'),
                    'medication_required_medication' => $this->input->post('medication_required_medication'),
                    'medication_required_dose' => $this->input->post('medication_required_dose'),
                    'medication_required_date' => $this->input->post('medication_required_date'),
                    'medication_required_signature' => $this->input->post('medication_required_signature'),
                    'medication_required_gmc_no' => $this->input->post('medication_required_gmc_no'),
                    'mri_patients_cardiac_pacemaker' => $this->input->post('mri_patients_cardiac_pacemaker'),
                    'mri_patients_heart_valve' => $this->input->post('mri_patients_heart_valve'),
                    'mri_patients_metal_fragments' => $this->input->post('mri_patients_metal_fragments'),
                    'mri_patients_cranial_surgery' => $this->input->post('mri_patients_cranial_surgery'),
                    'mri_patients_metal_body' => $this->input->post('mri_patients_metal_body'),
                    'mri_patients_anti_coagulant' => $this->input->post('mri_patients_anti_coagulant'),
                    'mri_patients_provide_egfr' => $this->input->post('mri_patients_provide_egfr'),
                    'imaging_department_staff' => $this->input->post('imaging_department_staff'),
                    'returned_check_id' => $this->input->post('returned_check_id'),
                    'operator_use_patient_height' => $this->input->post('operator_use_patient_height'),
                    'operator_use_patient_weight' => $this->input->post('operator_use_patient_weight'),
                    'operator_use_kv' => $this->input->post('operator_use_kv'),
                    'operator_use_mas' => $this->input->post('operator_use_mas'),
                    'pperators_name_signature' => $this->input->post('pperators_name_signature'),
                    'operators_number_of_exposures_films' => $this->input->post('operators_number_of_exposures_films'),
                    'operators_dose_cgycm' => $this->input->post('operators_dose_cgycm'),
                    'operators_fluoro_time' => $this->input->post('operators_fluoro_time'),
                    'operators_examination_justified_name_signature' => $this->input->post('operators_examination_justified_name_signature'),
                    'patient_holding_record_pregnancy' => $this->input->post('patient_holding_record_pregnancy'),
                    'patient_holding_record_comforter_carer' => $this->input->post('patient_holding_record_comforter_carer'),
                    'patient_holding_record_signature' => $this->input->post('patient_holding_record_signature'),
                    'patient_holding_record_ffd' => $this->input->post('patient_holding_record_ffd'),
                    'patient_holding_record_patient_carer_distance' => $this->input->post('patient_holding_record_patient_carer_distance'),
                    'patient_holding_record_patient_dose' => $this->input->post('patient_holding_record_patient_dose'),
                    'checklist_patient_id_check' => $this->input->post('checklist_patient_id_check'),
                    'checklist_exam_justification' => $this->input->post('checklist_exam_justification'),
                    'checklist_previous_exams' => $this->input->post('checklist_previous_exams'),
                    'checklist_risk_explained' => $this->input->post('checklist_risk_explained'),
                    'checklist_within_limits' => $this->input->post('checklist_within_limits'),
                    'checklist_report_flagged' => $this->input->post('checklist_report_flagged'),
                    'notes' => $this->input->post('notes'),
                    'operator_comments' => $this->input->post('operator_comments'),
                );
                
                $option = array('table' => 'vendor_sale_imaging_request_form', 'data' => $options_data);

                // print_r($option);die;
                if ($this->common_model->customInsert($option)) {

                $response = array('status' => 1, 'message' => "Successfully added", 'url' =>base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
           
        echo json_encode($response);
    }

    public function updateStatus() {
        $id = $this->input->post('id');
        // print_r($id);die;
        $options_data = array(
            'type' => $this->input->post('status')
        );
        $option = array(
            'table' => 'vendor_sale_letters_and_form',
            'data' => $options_data,
            'where' => array('id' => $id)
        );
        $update = $this->common_model->customUpdate($option);
        $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url($this->router->fetch_class()));

    
        if ($response) {
            echo json_encode(['success' => true, 'message' => 'Status updated']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status']);
        }
    }


    function open_model_edit() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/updateLetters";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        $this->data['form_id'] = decoding($_GET['form_id']);
        // print_r($this->data['patient_id']);die;
        // $option = array('table' => $this->_tables);

        $form_id=  decoding($_GET['form_id']);
         $id=  decoding($_GET['id']);
            //    print_r($form_id);die;
        $option = array(
        'table' => 'vendor_sale_letters_and_form',
        'where' => array('id' => $form_id),
        'single' => true
        );
   
        $this->data['result'] = $this->common_model->customGet($option);
        // print_r($this->data['list']);die;
        $this->load->admin_render('edit', $this->data, 'inner_script');
                // $this->load->view('booking_form', $this->data, 'inner_script');
    }

    


    public function updateLetters() {

        // print_r($this->input->post());die;
        // $this->form_validation->set_rules('appointment_type', "appointment_type", 'required|trim');
        // if ($this->form_validation->run() == true) {
           
            $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
           
                $options_data = array(
                    'type' => $this->input->post('type'),
                    'details' => $this->input->post('details')
                );

                $option = array('table' => 'vendor_sale_letters_and_form', 'data' => $options_data, 'where' => array('id' => $this->input->post('form_id')));
                if ($this->common_model->customUpdate($option)) {

                $response = array('status' => 1, 'message' => "Successfully updated", 'url' =>base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "Failed to updated");
                }
           
        echo json_encode($response);
    }

    public function duplicateRow() {

        $form_id=  decoding($_GET['form_id']);
         $id=  decoding($_GET['id']);
        $option = array(
        'table' => 'vendor_sale_letters_and_form',
        'where' => array('id' => $form_id),
        'single' => true
        );
        $result = $this->common_model->customGet($option);
    
            // Insert the duplicate data
            $new_row = (array) $result; // Convert to array for insertion
            unset($new_row['id']);
            unset($new_row['create_date']);  
            
            $option = array('table' => 'vendor_sale_letters_and_form', 'data' => $new_row);
            if ($this->common_model->customInsert($option)) {
                $response = array('status' => 1, 'message' => "Row duplicated successfully!", 'url' =>base_url($this->router->fetch_class()));
            } else {
                $response = array('status' => 0, 'message' => "Row not found");
            }
            echo json_encode($response);
            $this->session->set_flashdata('message', 'Row duplicated successfully!');
        redirect('lettersAndForm?id=' . encoding($id));
        // echo json_encode($response);
    }

    
    
    function deleteLetters() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/updateBookingForm";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        $this->data['form_id'] = decoding($_GET['form_id']);
       
        $form_id=  decoding($_GET['form_id']);
        $id=  decoding($_GET['id']);
    
    $option = array(
        'table' => 'vendor_sale_letters_and_form',
        'where' => array('id' => $form_id),
    );
   
        $this->common_model->customDelete($option);
       
        $this->session->set_flashdata('message', 'Deleted Successfully.');
        redirect('lettersAndForm?id=' . encoding($id));
       
    }

    

    function viewBookingForm() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/updateBookingForm";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        $this->data['form_id'] = decoding($_GET['form_id']);
        // print_r($this->data['patient_id']);die;
        // $option = array('table' => $this->_tables);

        // $form_id=  decoding($_GET['form_id']);
        $form_id=  decoding($_GET['form_id']);
       $patient_id=  decoding($_GET['id']);
        //    print_r($form_id);die;
        //  $option = array(
        // 'table' => 'vendor_sale_booking_form',
        // 'where' => array('id' => '20'),
        // 'single' => true
        // );

        // $results_row = $this->common_model->customGet($option);

        // $option = array(
        //     'table' => 'vendor_sale_booking_form',
        //     'order' => array('id' => 'DESC'),  // Replace 'id' with the column you want to order by
        //     'single' => true  // Ensure only the most recent record is fetched
        // );

        if(!empty($form_id)){

        $form_option = array(
            'table' => 'vendor_sale_imaging_request_form',
            'select' =>'vendor_sale_booking_form`.*,vendor_sale_users.first_name,vendor_sale_users.last_name,vendor_sale_booking_form.title',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_imaging_request_form.patient_id=vendor_sale_users.id', 'left'),
                array('vendor_sale_booking_form', 'vendor_sale_imaging_request_form.id=vendor_sale_booking_form.form_id', 'left'),
            ),
            
            'where' => array('vendor_sale_imaging_request_form.id' => $form_id),
            'single' => true
        );
    }else{

        $form_option = array(
            'table' => 'vendor_sale_booking_form',
            'where' => array('vendor_sale_booking_form.patient_id' => $patient_id),
            'order' => array('id' => 'DESC'),  // Replace 'id' with the column you want to order by
            'single' => true  // Ensure only the most recent record is fetched
        );
    }

        // $this->data['form_list'] = $this->common_model->customGet($form_option);

        $this->data['result'] = $this->common_model->customGet($form_option);
        // print_r($this->data['result']);die; 
        $this->load->admin_render('view_booking_form', $this->data, 'inner_script');
                // $this->load->view('booking_form', $this->data, 'inner_script');
    }


    function viewImagingRequestForm() {

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrlData'] = $this->router->fetch_class() . "/updateBookingForm";
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        $this->data['form_id'] = decoding($_GET['form_id']);
        // print_r($this->data['patient_id']);die;
        // $option = array('table' => $this->_tables);

        $form_id=  decoding($_GET['form_id']);
        // print_r($form_id);die;
       $id=  decoding($_GET['id']);
        
        // $results_row = $this->common_model->customGet($option);
        if( !empty($form_id)){
            $option = array(
                'table' => 'vendor_sale_imaging_request_form',
                'where' => array('vendor_sale_imaging_request_form.id' => $form_id),
                'single' => true  // Ensure only the most recent record is fetched
            );

        }else{
            $option = array(
                'table' => 'vendor_sale_imaging_request_form',
                'order' => array('id' => 'DESC'),  // Replace 'id' with the column you want to order by
                'single' => true  // Ensure only the most recent record is fetched
            );

        }

        

        $this->data['result'] = $this->common_model->customGet($option);
        // print_r($this->data['result']);die;
        $this->load->admin_render('view_imaging_request_form', $this->data, 'inner_script');
                // $this->load->view('booking_form', $this->data, 'inner_script');
    }
    

}
