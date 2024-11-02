<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Medications extends Common_Controller {

    public $data = array();
    public $file_data = "";
    // public $_table = 'culture_source';
    // public $_tables = 'patient_medications';
    public $_tables = 'vendor_sale_patient_consultation';
    // public $_tables = 'clinic';
    
    public $title = "Medications";

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
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        $this->data['id'] = $_GET['id'];
        
       $id=  decoding($_GET['id']);
      
        $option = array(
            'table' => 'vendor_sale_patient_consultation',
            'select' => 'vendor_sale_patient_consultation`.*,vendor_sale_users.first_name,vendor_sale_users.last_name,vendor_sale_doctors.name as doctor_name',
            'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_patient.id=vendor_sale_patient_consultation.patient_id','left'),
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_patient.user_id','left'),
                    array('vendor_sale_doctors', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                ),
            'where' => array('vendor_sale_patient_consultation.patient_id' => $id,'type'=>'medication')
            
            
        );

        $this->data['list'] = $this->common_model->customGet($option);


        // print_r($this->data);die;
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
        $this->data['id'] = decoding($_GET['id']);
        
// print_r($this->input->post('id'));die;
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
                    'users.hospital_id'=>$hospital_id
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);
            
    
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
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);
        }
        
        

        $this->load->view('add', $this->data);
    }

    /**
     * @method menu_category_add
     * @description add dynamic rows
     * @return array
     */
    public function add() {

        $this->form_validation->set_rules('type', "type", 'required|trim');
        if ($this->form_validation->run() == true) {
           
           
            $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
              
            $options_medication = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('type'),
                'search' => $this->input->post('search'),  
                'since' => $this->input->post('since'),                
                'condition_type' => $this->input->post('condition_type'),                
                'condition_significance' => $this->input->post('condition_significance'),                
                'comment' => $this->input->post('comment'),                             
                'showSummary' => $this->input->post('showSummary'),                
            );
            $optionMedication = array('table' => 'vendor_sale_consultation_medication', 'data' => $options_medication);
            $this->common_model->customInsert($optionMedication);

                $options_data = array(
                    'patient_id'=> decoding($this->input->post('patient_id')),
                    'facility_user_id'=> $LoginID,
                    'consultation_type' => $this->input->post('consultationType'),
                    'consultation_date' => $this->input->post('consultation_date'),
                    'type' => $this->input->post('type'),
                    'presenting_complaint' => $this->input->post('presenting_complaint'),
                    'search' => $this->input->post('search'),  
                    'since' => $this->input->post('since'),                
                    'condition_type' => $this->input->post('condition_type'),                
                    'condition_significance' => $this->input->post('condition_significance'),                
                    'comment' => $this->input->post('comment'),                
                    'value' => $this->input->post('value'),                
                    'severity' => $this->input->post('severity'),                
                    'relationship' => $this->input->post('relationship'),                
                    'showSummary' => $this->input->post('showSummary'),                
                );
                $option = array('table' => $this->_tables, 'data' => $options_data);
      

                        if ($this->common_model->customInsert($option)) {

                            $response = array('status' => 1, 'message' => "Successfully add medication", 'url' => base_url($this->router->fetch_class()));
                        } else {
                            $response = array('status' => 0, 'message' => "Failed to Updated");
                        }
                    // }
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
        // $this->data['patient_id'] = decoding($_GET['id']);
        
        // $this->data['patient_id'] = $this->input->post('id');

        // print_r($this->data['patient_id']);die;
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
                    'users.hospital_id'=>$hospital_id
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);
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
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);
        }



        $id = decoding($this->input->post('id'));
        
        if (!empty($id)) {
            $option = array(
                'table' => $this->_tables,
                'where' => array('id' => $id),
                'single' => true
            );
           
            $results_row = $this->common_model->customGet($option);
            // print_r($results_row);die;
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

        $where_id = $this->input->post('consultationId');
    // print_r($where_id);
        // Proceed with the update logic directly, without form validation
        if ($where_id) {
    
            $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    
            $options_data = array(
                'consultation_type' => $this->input->post('consultationType'),
                'consultation_date' => $this->input->post('consultation_date'),
                'type' => $this->input->post('type'),
                'search' => $this->input->post('search'),  
                'since' => $this->input->post('since'),                
                'condition_type' => $this->input->post('condition_type'),                
                'condition_significance' => $this->input->post('condition_significance'),                
                'comment' => $this->input->post('comment')
            );
    
            $option = array(
                'table' => 'vendor_sale_patient_consultation',
                'data' => $options_data,
                'where' => array('id' => $where_id)
            );
    
            if ($this->common_model->customUpdate($option)) {
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url($this->router->fetch_class()));
            } else {
                $response = array('status' => 0, 'message' => "Failed to Update");
            }
    
        } else {
            $response = array('status' => 0, 'message' => "No ID provided");
        }
    
        echo json_encode($response);
    }
    
    public function fetchMedication() {
        $output = '';
        $query = $this->input->post('query');
        // print_r($query);die;
        if ($query) {
            $results = $this->common_model->fetchConsultMedication($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_medication" id="consultation_medication" onclick="getSearchconsultationMedication()">';
            if (!empty($results)) {
                foreach ($results as $row) {
                    $output .= '<option value="'.$row['search'].'">'.$row['search'].'</option>';
                   
                }
            } else {
                $output .= '<option>No Data Found</option>';
            }
            $output .= '</select>';
            echo $output;
        }
    }

}
