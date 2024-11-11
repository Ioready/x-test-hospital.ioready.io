<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Patient extends Common_Controller
{

    public $data = array();
    public $file_data = "";
    public $_table = 'patient';
    public $title = "Patient";

    public function __construct()
    {
        parent::__construct();
        $this->is_auth_admin();
        $this->load->model('Common_model');
    }

    /**
     * @method index
     * @description listing display
     * @return array
     */
   
    public function index()
    {
        $selectedMonth = $this->input->get('month');
        $selectedYear = $this->input->get('year');

        // Initialize $from and $to based on $selectedMonth and $selectedYear
        if ($selectedMonth && $selectedYear) {
            // Convert the month to a string with two characters
            $selectedMonth = str_pad($selectedMonth, 2, '0', STR_PAD_LEFT);

            $startDate = $selectedYear . '-' . $selectedMonth . '-01';
            $endDate = $selectedYear . '-' . $selectedMonth . '-' . date('t', strtotime($startDate));
            $from = $startDate;
            $to = $endDate;
            $_GET['date'] = $startDate;
            $_GET['date1'] =  $endDate;
        }

        // else{
        //     if (!empty($selectedMonth) || !empty($selectedYear)) {
        //     }
        // }

        //    print_r($_GET); die;
        

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['model'] = 'patient/open_model';
        $this->data['table'] = $this->_table;
        $AdminCareUnitID = isset($_SESSION['admin_care_unit_id']) ? $_SESSION['admin_care_unit_id'] : '';
        
        $option = array('table' => 'care_unit', 'where' => array('delete_status' => 0, 'is_active' => 1), 'order' => array('name' => 'ASC'));
        // print_r($option);
        if (!empty($AdminCareUnitID)) {
            
            $option['where']['id'] = $AdminCareUnitID;
        }
        
        $this->data['careUnit'] = $this->common_model->customGet($option);
        $this->data['careUnits'] = json_decode($AdminCareUnitID);
        
        $y = $this->data['careUnits'];
        //print_r($y);die;
       // $x = count($y);
        
        $careUnitData = array();
        foreach ($this->data['careUnits'] as $value) {
            
            $option = array(
                'table' => 'care_unit',
                'select' => 'care_unit.id,care_unit.name',
                'where' => array('care_unit.id' => $value)
            );
            $careUnitData[] = $this->common_model->customGet($option);
        }
        $arraySingle = call_user_func_array('array_merge', $careUnitData);
        $this->data['careUnitsUser'] = $arraySingle;
        
        $this->data['careUnits_list'] = json_decode($AdminCareUnitID);
// print_r($this->data['careUnits_list']);die;
        $careUnitData_list = array();
                 
        foreach ($this->data['careUnits_list'] as $value) {

            $option = array(
                'table' => 'patient',
                'select' => 'patient.patient_id as pid,care_unit.name as care_unit_name,doctors.name as doctor_name,users.first_name as md_stayward,patient.date_of_start_abx',
                'join' => array(
                    array('care_unit', 'care_unit.id=patient.care_unit_id'),
                    array('doctors', 'doctors.id=patient.doctor_id'),
                    array('users', 'users.id=patient.md_steward_id')
                ),
                // 'where' => array('patient.id' => $value)
            );

            $careUnitData_list[] = $this->common_model->customGet($option);
        }



        $UsersCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        $this->data['careUnitID'] = $careUnitID = (isset($_GET['careUnit'])) ? $_GET['careUnit'] : "";

        $careUnitID = (isset($_GET['careUnit'])) ? $_GET['careUnit'] : "";
        $from = (isset($_GET['date']) && !empty($_GET['date'])) ? date('Y-m-d', strtotime($_GET['date'])) : "";
        $to = (isset($_GET['date1']) && !empty($_GET['date1'])) ? date('Y-m-d', strtotime($_GET['date1'])) : "";


        // $Sql = "SELECT vendor_sale_patient.id as patient_id,vendor_sale_patient.patient_id as pid,vendor_sale_care_unit.name,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID ORDER BY `patient_id` DESC";
        
       
        if (!empty($careUnitID) and !empty($from) and !empty($to)) {

            $Sql = "SELECT vendor_sale_patient.id as patient_id,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.total_days_of_patient_stay,vendor_sale_patient_consult.initial_dot,vendor_sale_patient.culture_source as culture_source_name,vendor_sale_patient.organism as organism_name,vendor_sale_patient.patient_id as pid,vendor_sale_care_unit.name,vendor_sale_doctors.name as doctor_name,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND vendor_sale_patient.care_unit_id = $careUnitID AND vendor_sale_patient.date_of_start_abx  >= '$from'  AND vendor_sale_patient.date_of_start_abx <= '$to' ORDER BY `patient_id` DESC";
        } else if (!empty($from) and !empty($to)) {

            $Sql = "SELECT vendor_sale_patient.id as patient_id,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.total_days_of_patient_stay,vendor_sale_patient_consult.initial_dot,vendor_sale_patient.culture_source as culture_source_name,vendor_sale_patient.organism as organism_name,vendor_sale_patient.patient_id as pid,vendor_sale_care_unit.name,vendor_sale_doctors.name as doctor_name,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND  vendor_sale_patient.date_of_start_abx  >= '$from'  AND vendor_sale_patient.date_of_start_abx <= '$to' ORDER BY `patient_id` DESC";
        } else if (!empty($careUnitID)) {

            $Sql = "SELECT vendor_sale_patient.id as patient_id,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.total_days_of_patient_stay,vendor_sale_patient_consult.initial_dot,vendor_sale_patient.culture_source as culture_source_name,vendor_sale_patient.organism as organism_name,vendor_sale_patient.patient_id as pid,vendor_sale_care_unit.name,vendor_sale_doctors.name as doctor_name,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND vendor_sale_patient.care_unit_id = $careUnitID ORDER BY `patient_id` DESC";
        } else {

            $Sql = "SELECT vendor_sale_patient.id as patient_id,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.total_days_of_patient_stay,vendor_sale_patient_consult.initial_dot,vendor_sale_patient.culture_source as culture_source_name,vendor_sale_patient.organism as organism_name,vendor_sale_patient.patient_id as pid,vendor_sale_care_unit.name,vendor_sale_doctors.name as doctor_name,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID ORDER BY `patient_id` DESC";
        }


        
        $careunit_facility_counts = $this->common_model->customQuery($Sql);

        $arraySingles = call_user_func_array('array_merge', $careUnitData_list);

        $this->data['careUnitsUser_list'] = $careunit_facility_counts;

        if ($_GET["export"] == 'Export') {

            $this->patientExport($from, $to, $careUnitID);
            return;
        }


        // print_r($UsersCareUnitID);die;


        
    
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
                        
                    }

        
        $option = array(
            'table' => 'users U',
            'select' => 'P.id as patient_id,P.patient_id as pid,P.name as patient_name,P.date_of_start_abx,P.address,P.total_days_of_patient_stay,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.md_patient_status,P.created_date,'
                . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.comment',
            'join' => array(
                // array('patient P', 'U.id=P.md_steward_id','left'),
                array('patient P', 'U.id=P.user_id','inner'),
                array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                array('doctors DOC', 'DOC.user_id=P.doctor_id', 'left'),
                array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                array('organism Org', 'Org.name=P.organism', 'left'),
                array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left')
            ),
            
            // 'where'=>array('P.care_unit_id,'. $careUnitID),
            // 'where'=>array('P.md_steward_id,'. $UsersCareUnitID),
            // 'where'=>array('P.id,'. '1'),
            // 'where'=>array('U.hospital_id,'. $hospital_id),
            'group_by' => 'pid'
        );


        if (!empty($careUnitID)) {
            $option['where']['P.care_unit_id'] = $careUnitID;
        }

        // if (!empty($UsersCareUnitID)) {
        //     $option['where']['P.operator_id'] = $UsersCareUnitID;
        // }
        if (!empty($hospital_id)) {
            
            $option['where']['U.hospital_id'] = $hospital_id;
        }
        // vendor_sale_patient.operator_id = $UsersCareUnitID
        if (!empty($AdminCareUnitID)) {
            $option['where']['P.care_unit_id']  = $AdminCareUnitID;
        }
        if (!empty($from)) {
            $option['where']['DATE(P.date_of_start_abx) >='] = $from;
        }
        if (!empty($to)) {
            $option['where']['DATE(P.date_of_start_abx) <='] = $to;
        }
        $option['order'] = array('P.id' => 'desc');

        $this->data['list'] = $this->common_model->customGet($option);

        // print_r($this->data['list']);die;
        $this->load->admin_render('list', $this->data, 'inner_script');
    }

    public function summary(){
        $this->data['patient_id'] = decoding($_GET['id']);
            $this->data['parent'] = $this->title;
            $this->data['title'] = $this->title;

            $this->data['formUrl'] = $this->router->fetch_class() . "/update";
            $id = decoding($_GET['id']);
            if (!empty($id)) {
                // print_r($id); die;
                $option = array(
                    'table' => 'patient P',
                    'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                        . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                        . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                        . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option,PC.comment,U.email as patient_email,U.email as password, U.phone as patient_phone_number,U.date_of_birth,U.gender,U.phone_code',
                    'join' => array(
                        array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                        array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                        array('users U', 'U.id=P.user_id', 'left'),
                        array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                        array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                        array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                        array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                        array('organism Org', 'Org.name=P.organism', 'left'),
                        array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                        array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                        array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left'),
                        
                    ),
                    'single' => true
                );
                $option['where']['P.id'] = $id;
                $results_row = $this->common_model->customGet($option);

                $optionAppointment = array(
                    'table' => 'patient P',
                    'select' => 'NS.*,CA.start_date_appointment,CA.end_date_appointment,CA.type,CA.location_appointment,CA.clinician_appointment,CA.appointment_type,CA.practitioner',
                    'join' => array(
                        array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                        array('users U', 'U.id=P.user_id', 'inner'),
                        array('clinic_appointment CA', 'U.id=CA.patient', 'inner'),
                        array('notifications NS', 'CA.id=NS.clinic_appointment_id', 'inner')
                    ),
                    // 'single' => true
                );
                $optionAppointment['where']['P.id'] = $id;
                $this->data['results_rowAppointment'] = $this->common_model->customGet($optionAppointment);

                $optionTask = array(
                    'table' => 'patient P',
                    'select' => 'TK.*,DOC.name as doctor_name',
                    'join' => array(
                       
                        array('users U', 'U.id=P.user_id', 'left'),
                        array('task TK', 'U.id=TK.patient_name', 'inner'),
                        array('doctors DOC', 'DOC.user_id=TK.assign_to', 'left'),
                        // array('notifications NS', 'CA.id=NS.clinic_appointment_id', 'left')
                    ),
                    // 'single' => true
                );
                $optionTask['where']['P.id'] = $id;
                $this->data['results_task'] = $this->common_model->customGet($optionTask);
            //    print_r($this->data['results_task']);die;


                if (!empty($results_row)) {

                    $results_row->md_steward_response = clone $results_row;
                    $filteredData = $this->applyAlgo($results_row);
                    // echo"<pre>"; 
                    // print_r($filteredData); die;
                    $this->data['results'] = $filteredData;

                    
                    $this->load->admin_render('summary', $this->data, 'inner_script');
                } else {
                    $this->session->set_flashdata('error', lang('not_found'));
                    redirect('patient');
                }
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('patient');
            }

        // $this->load->admin_render('summary', $this->data, 'inner_script');
    }


    public function communication(){

            $this->data['parent_id'] = $_GET['id'];
            $this->data['parent'] = $this->title;
            $this->data['title'] = $this->title;

            $this->data['formUrl'] = $this->router->fetch_class() . "/update";
            $this->data['formUrlSms'] = $this->router->fetch_class() . "/communicationSendSms";
            $id = decoding($_GET['id']);

            if (!empty($id)) {

                $option = array(
                    'table' => 'patient P',
                    'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                        . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                        . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                        . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option,PC.comment,U.email as patient_email,U.email as password, U.phone as patient_phone_number,U.date_of_birth,U.gender,U.phone_code',
                    'join' => array(
                        array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                        array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                        array('users U', 'U.id=P.user_id', 'left'),
                        array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                        array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                        array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                        array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                        array('organism Org', 'Org.name=P.organism', 'left'),
                        array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                        array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                        array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left'),
                        
                    ),
                    'single' => true
                );
                $option['where']['P.id'] = $id;
                $results_row = $this->common_model->customGet($option);

                if (!empty($results_row)) {

                    $results_row->md_steward_response = clone $results_row;
                    $filteredData = $this->applyAlgo($results_row);
                    $this->data['results'] = $filteredData;
                    
                    $optionSms = array(
                        'table' => 'patient_sms_communication',
                         'select' => 'patient_sms_communication.*',
                        'where' => array('patient_id' => $id),
                    );
                    $this->data['sms_results'] = $this->common_model->customGet($optionSms);
                    $this->load->admin_render('communication', $this->data, 'inner_script');
                } else {
                    $this->session->set_flashdata('error', lang('not_found'));
                    redirect('patient');
                }
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('patient');
                
            }

        // $this->load->admin_render('summary', $this->data, 'inner_script');
    }

    function communicationSendSms() {

        $data = $this->input->post();
        // print_r($data);die;
        $return['code'] = 200;
        // $this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email|is_unique[' . USERS . '.email]');
        // $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[11]|is_unique[' . USERS . '.phone]');
        // $this->form_validation->set_rules('patient_sms_comment', 'patient_sms_comment', 'trim|required');
        // if ($this->form_validation->run() == FALSE) {
        //     $error = $this->form_validation->rest_first_error_string();
        //     $return['status'] = 0;
        //     $return['message'] = $error;
        // } else {
            // $email = extract_value($data, 'email', '');
            $phone = extract_value($data, 'mobile', '');
            $genOtp = mt_rand(100000, 999999);
            $option = array(
                'table' => 'users',
                'where' => array('otp' => $genOtp),
            );
            $alreadyUsedOtp = $this->common_model->customGet($option);
           

            $login_session_key = get_guid();

            $option = array(
                'table' => 'patient_sms_communication',
                'data' => array(
                    'patient_id'=>$data['patient_id'],
                    'phone' => $phone,
                    'facility_user_id'=>$data['md_steward_id'],
                    'patient_sms_comment' => $data['patient_sms_comment'],
                    'birthdaytime' => $data['birthdaytime'],
                ),
            );
            $this->common_model->customInsert($option);

            $postfields = array('mobile' => $phone,
                'message' => "Your patient send information " . $data['patient_sms_comment'],
            );

            // print_r($postfields);die;
            $this->smsSend($postfields);

        // }
        // $this->response($return);
    //     $response = ['status' => '1', 'message' => 'SMS sent successfully'];
    // echo json_encode($response);
   $patientId= encoding($data['patient_id']);
    $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
    $this->session->set_flashdata('error', $response);
    redirect($this->router->fetch_class().'/communication/?id='.$patientId);
    
        // redirect('patient');
    }


    public function consultationTemplates($vendor_profile_activate = "No") {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $this->data['patient_id'] = decoding($_GET['id']);
        $id = decoding($_GET['id']);
        
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

        $id = decoding($_GET['id']);

        $optionheader = array(
            'table' => 'vendor_sale_patient_consultation',
            'select' => 'vendor_sale_patient_consultation.*,vendor_sale_users.first_name,vendor_sale_users.last_name,vendor_sale_consultation_allergy.search as allergy_search,vendor_sale_consultation_allergy.comment as allergy_comment,vendor_sale_consultation_examination.search as examination_search,vendor_sale_consultation_family_history.search as family_search,vendor_sale_consultation_medical_history.search as medical_his_search,vendor_sale_consultation_medication.search as medication_search,vendor_sale_consultation_problem_heading.search as problem_heading_search,vendor_sale_consultation_product.search as product_search,vendor_sale_consultation_social.search as social_search',
            'join' => array(
                array('vendor_sale_patient', 'vendor_sale_patient.id=vendor_sale_patient_consultation.patient_id','left'),
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_patient.user_id','left'),
                array('vendor_sale_consultation_allergy', 'vendor_sale_consultation_allergy.consultation_id=vendor_sale_patient_consultation.id','left'),
                array('vendor_sale_consultation_examination', 'vendor_sale_consultation_examination.consultation_id=vendor_sale_patient_consultation.id','left'),
                array('vendor_sale_consultation_family_history', 'vendor_sale_consultation_family_history.consultation_id=vendor_sale_patient_consultation.id','left'),
                array('vendor_sale_consultation_medical_history', 'vendor_sale_consultation_medical_history.consultation_id=vendor_sale_patient_consultation.id','left'),
                array('vendor_sale_consultation_medication', 'vendor_sale_consultation_medication.consultation_id=vendor_sale_patient_consultation.id','left'),
                array('vendor_sale_consultation_problem_heading', 'vendor_sale_consultation_problem_heading.consultation_id=vendor_sale_patient_consultation.id','left'),
                array('vendor_sale_consultation_product', 'vendor_sale_consultation_product.consultation_id=vendor_sale_patient_consultation.id','left'),
                array('vendor_sale_consultation_social', 'vendor_sale_consultation_social.consultation_id=vendor_sale_patient_consultation.id','left'),
                // array('vendor_sale_consultation_medical_history', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                // array('vendor_sale_consultation_medical_history', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                // array('vendor_sale_doctors', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                // array('users', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type', 'left'),
            ),
            // 'where' => array('vendor_sale_patient_consultation.patient_id' => $id),
            'order' => array('vendor_sale_patient_consultation.id' => 'DESC')
        );
        

        $this->data['list'] = $this->common_model->customGet($optionheader);
        // print_r($this->data['list']); die;
        
        if (!empty($id)) {

            $option = array(
                'table' => 'patient P',
                'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                    . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                    . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                    . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option,PC.comment,U.email as patient_email,U.email as password, U.phone as patient_phone_number,U.date_of_birth,U.gender,U.phone_code',
                'join' => array(
                    array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                    array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                    array('users U', 'U.id=P.user_id', 'left'),
                    array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                    array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                    array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                    array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                    array('organism Org', 'Org.name=P.organism', 'left'),
                    array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                    array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                    array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left'),
                    
                ),
                'single' => true
            );
            $option['where']['P.id'] = $id;
            $results_row = $this->common_model->customGet($option);

            if (!empty($results_row)) {

                $results_row->md_steward_response = clone $results_row;
                $filteredData = $this->applyAlgo($results_row);
                $this->data['results'] = $filteredData;
            }
        }


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
                    // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
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
                    // 'doctors.facility_user_id'=>$CareUnitID
                    'users.hospital_id'=>$hospital_id
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);
        }
        
        
        $this->load->admin_render('consultation', $this->data, 'inner_script');
    }


    public function fetchViewConsultation() {
        $consultation = '';
        $query = $this->input->post('consultation_id');
        if ($query) {
            // $optionheader = array(
            //     'table' => 'vendor_sale_patient_consultation',
            //     'select' => 'vendor_sale_patient_consultation.*,vendor_sale_users.first_name,vendor_sale_users.last_name,vendor_sale_doctors.name as doctor_name',
            //     'join' => array(
            //         array('vendor_sale_patient', 'vendor_sale_patient.id=vendor_sale_patient_consultation.patient_id','left'),
            //         array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_patient.user_id','left'),
            //         array('vendor_sale_doctors', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
            //     ),
            //     'where' => array('vendor_sale_patient_consultation.id' => $query),
            //     'single' => true,
            // );

            $optionheader = array(
                'table' => 'vendor_sale_patient_consultation',
                'select' => 'vendor_sale_patient_consultation.*,vendor_sale_users.first_name,vendor_sale_users.last_name,,vendor_sale_doctors.name as doctor_name,vendor_sale_consultation_allergy.search as allergy_search,vendor_sale_consultation_allergy.comment as allergy_comment,vendor_sale_consultation_allergy.severity as allergy_severity,vendor_sale_consultation_allergy.type as allergy_type,vendor_sale_consultation_examination.search as examination_search,vendor_sale_consultation_examination.comment as examination_comment,vendor_sale_consultation_examination.value as examination_value,vendor_sale_consultation_examination.type as examination_type,vendor_sale_consultation_family_history.comment as family_comment,vendor_sale_consultation_family_history.search as family_search,vendor_sale_consultation_family_history.relationship,vendor_sale_consultation_family_history.type as family_type,vendor_sale_consultation_medical_history.search as medical_his_search,vendor_sale_consultation_medical_history.since as medical_history_since,vendor_sale_consultation_medical_history.condition_type as medical_history_condition_type,vendor_sale_consultation_medical_history.condition_significance as medical_history_condition_significance,vendor_sale_consultation_medical_history.comment as medical_history_comment,vendor_sale_consultation_medical_history.type as medical_history_type,vendor_sale_consultation_medication.search as medication_search,vendor_sale_consultation_medication.since as medication_since,vendor_sale_consultation_medication.condition_type as medication_condition_type,vendor_sale_consultation_medication.condition_significance as medication_condition_significance,vendor_sale_consultation_medication.comment as medication_comment,vendor_sale_consultation_medication.type as medication_type,vendor_sale_consultation_problem_heading.search as problem_heading_search,vendor_sale_consultation_problem_heading.since as problem_since,vendor_sale_consultation_problem_heading.condition_type as problem_condition_type,vendor_sale_consultation_problem_heading.condition_significance as problem_condition_significance,vendor_sale_consultation_problem_heading.comment as problem_comment,vendor_sale_consultation_problem_heading.type as problem_heading_type,vendor_sale_consultation_product.search as product_search,vendor_sale_consultation_product.since as product_since,vendor_sale_consultation_product.condition_type as product_condition_type,vendor_sale_consultation_product.condition_significance as product_condition_significance,vendor_sale_consultation_product.comment as product_comment,vendor_sale_consultation_product.type as product_type,vendor_sale_consultation_social.search as social_search,vendor_sale_consultation_social.since as social_since,vendor_sale_consultation_social.condition_type as social_condition_type,vendor_sale_consultation_social.condition_significance as social_condition_significance,vendor_sale_consultation_social.comment as social_comment,vendor_sale_consultation_social.type as social_type',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_patient.id=vendor_sale_patient_consultation.patient_id','left'),
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_patient.user_id','left'),
                    array('vendor_sale_consultation_allergy', 'vendor_sale_consultation_allergy.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_examination', 'vendor_sale_consultation_examination.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_family_history', 'vendor_sale_consultation_family_history.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_medical_history', 'vendor_sale_consultation_medical_history.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_medication', 'vendor_sale_consultation_medication.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_problem_heading', 'vendor_sale_consultation_problem_heading.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_product', 'vendor_sale_consultation_product.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_social', 'vendor_sale_consultation_social.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_doctors', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                    // array('vendor_sale_consultation_medical_history', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                    // array('vendor_sale_consultation_medical_history', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                    // array('vendor_sale_doctors', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                    // array('users', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type', 'left'),
                ),
                'where' => array('vendor_sale_patient_consultation.id' => $query),
                 'single' => true,
               
            );
           
            $results = $this->common_model->customGet($optionheader);
        // print_r($results);die;
            
            echo json_encode($results);

        }
    }

    public function editConsultation() {
        $consultation = '';
        $query = $this->input->post('consultation_id');
        if ($query) {
            // $optionheader = array(
            //     'table' => 'vendor_sale_patient_consultation',
            //     'select' => 'vendor_sale_patient_consultation.*,vendor_sale_users.first_name,vendor_sale_users.last_name,vendor_sale_doctors.name as doctor_name',
            //     'join' => array(
            //         array('vendor_sale_patient', 'vendor_sale_patient.id=vendor_sale_patient_consultation.patient_id','left'),
            //         array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_patient.user_id','left'),
            //         array('vendor_sale_doctors', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
            //     ),
            //     'where' => array('vendor_sale_patient_consultation.id' => $query),
            //     'single' => true,
            // );

            $optionheader = array(
                'table' => 'vendor_sale_patient_consultation',
                'select' => 'vendor_sale_patient_consultation.*,vendor_sale_users.first_name,vendor_sale_users.last_name,,vendor_sale_doctors.name as doctor_name,vendor_sale_consultation_allergy.search as allergy_search,vendor_sale_consultation_allergy.comment as allergy_comment,vendor_sale_consultation_allergy.severity as allergy_severity,vendor_sale_consultation_examination.search as examination_search,vendor_sale_consultation_examination.comment as examination_comment,vendor_sale_consultation_examination.value as examination_value,vendor_sale_consultation_family_history.comment as family_comment,vendor_sale_consultation_family_history.search as family_search,vendor_sale_consultation_family_history.relationship,vendor_sale_consultation_medical_history.search as medical_his_search,vendor_sale_consultation_medical_history.since as medical_history_since,vendor_sale_consultation_medical_history.condition_type as medical_history_condition_type,vendor_sale_consultation_medical_history.condition_significance as medical_history_condition_significance,vendor_sale_consultation_medical_history.comment as medical_history_comment,vendor_sale_consultation_medication.search as medication_search,vendor_sale_consultation_medication.since as medication_since,vendor_sale_consultation_medication.condition_type as medication_condition_type,vendor_sale_consultation_medication.condition_significance as medication_condition_significance,vendor_sale_consultation_medication.comment as medication_comment,vendor_sale_consultation_problem_heading.search as problem_heading_search,vendor_sale_consultation_problem_heading.since as problem_since,vendor_sale_consultation_problem_heading.condition_type as problem_condition_type,vendor_sale_consultation_problem_heading.condition_significance as problem_condition_significance,vendor_sale_consultation_problem_heading.comment as problem_comment,vendor_sale_consultation_product.search as product_search,vendor_sale_consultation_product.since as product_since,vendor_sale_consultation_product.condition_type as product_condition_type,vendor_sale_consultation_product.condition_significance as product_condition_significance,vendor_sale_consultation_product.comment as product_comment,vendor_sale_consultation_social.search as social_search,vendor_sale_consultation_social.since as social_since,vendor_sale_consultation_social.condition_type as social_condition_type,vendor_sale_consultation_social.condition_significance as social_condition_significance,vendor_sale_consultation_social.comment as social_comment',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_patient.id=vendor_sale_patient_consultation.patient_id','left'),
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_patient.user_id','left'),
                    array('vendor_sale_consultation_allergy', 'vendor_sale_consultation_allergy.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_examination', 'vendor_sale_consultation_examination.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_family_history', 'vendor_sale_consultation_family_history.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_medical_history', 'vendor_sale_consultation_medical_history.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_medication', 'vendor_sale_consultation_medication.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_problem_heading', 'vendor_sale_consultation_problem_heading.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_product', 'vendor_sale_consultation_product.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_consultation_social', 'vendor_sale_consultation_social.consultation_id=vendor_sale_patient_consultation.id','left'),
                    array('vendor_sale_doctors', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                    // array('vendor_sale_consultation_medical_history', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                    // array('vendor_sale_consultation_medical_history', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                    // array('vendor_sale_doctors', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type','left'),
                    // array('users', 'doctors.user_id=vendor_sale_patient_consultation.consultation_type', 'left'),
                ),
                'where' => array('vendor_sale_patient_consultation.id' => $query),
                 'single' => true,
               
            );
           
            $this->data['results'] = $this->common_model->customGet($optionheader);
            
        // print_r($results);die;
            
        $this->load->admin_render('edit_patient_consultation', $this->data, 'inner_script');
            // echo json_encode($results);

        }
    }


    public function patientMedication($vendor_profile_activate = "No") {

        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model_medicine'] = $this->router->fetch_class()."/open_model_medication";
        $this->data['formUrlMedicine'] = $this->router->fetch_class() . "/add_medicine";
        $id = decoding($_GET['id']);
        
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
            'where' => array('users.hospital_id'=>$hospital_id)
        );

        $this->data['list'] = $this->common_model->customGet($optionheader);

        $id = decoding($_GET['id']);
        if (!empty($id)) {

            $option = array(
                'table' => 'patient P',
                'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                    . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                    . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                    . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option,PC.comment,U.email as patient_email,U.email as password, U.phone as patient_phone_number,U.date_of_birth,U.gender,U.phone_code',
                'join' => array(
                    array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                    array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                    array('users U', 'U.id=P.user_id', 'left'),
                    array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                    array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                    array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                    array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                    array('organism Org', 'Org.name=P.organism', 'left'),
                    array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                    array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                    array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left'),
                    
                ),
                'single' => true
            );
            $option['where']['P.id'] = $id;
            $results_row = $this->common_model->customGet($option);

            if (!empty($results_row)) {

                $results_row->md_steward_response = clone $results_row;


                $filteredData = $this->applyAlgo($results_row);
                // echo"<pre>"; 
                // print_r($filteredData); die;
                $this->data['results'] = $filteredData;
            }
        }

        $this->data['initial_dx'] = $this->common_model->customGet(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['culture_source'] = $this->common_model->customGet(array('table' => 'culture_source', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['organism'] = $this->common_model->customGet(array('table' => 'organism', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['precautions'] = $this->common_model->customGet(array('table' => 'precautions', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['initial_rx'] = $this->common_model->customGet(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        // $this->data['doctors'] = $this->common_model->customGet(array('table' => 'doctors', 'select' => 'id,name', 'where' => array('is_active' => 1, 'facility_user_id'=>$this->hospital->facility_user_id, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        
       
        
        $this->load->admin_render('patient_medication', $this->data, 'inner_script');
    }

   
    public function open_model_medication(){
    
        $id = decoding($_GET['id']);


            $this->data['parent'] = $this->title;
            $this->data['title'] = $this->title;

            $this->data['formUrl'] = $this->router->fetch_class() . "/update";
            $id = decoding($_GET['id']);
            if (!empty($id)) {

                    $this->load->admin_render('add_medicine', $this->data, 'inner_script');
                
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('patient');
            }
    }

    public function add_medicine() {

       
        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
       
        $this->form_validation->set_rules('patient_id', "patient_id", 'required|trim');
        $this->form_validation->set_rules('type', "type", 'required|trim');
       

        $this->form_validation->set_rules('initial_rx', "initial_rx", 'required');
        $this->form_validation->set_rules('detail', "detail", 'required|trim');
        $this->form_validation->set_rules('last_recorded', "last_recorded", 'required|trim');
        $this->form_validation->set_rules('last_prescribed', "last_prescribed", 'required|trim');
        
        if ($this->form_validation->run() == true) {
             
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
            
            //   if($CareUnitID != 1){
                // $employees = $this->input->post('initial_rx');
                // $medicine_name = implode(", ",$employees);
                
            // print_r($medicine_name);die;
                $options_data = array(
                    'patient_id' =>$this->input->post('patient_id'), // Use 'true' for xss_clean
                    'user_id' =>$CareUnitID,
                    'facility_user_id' =>$hospital_id,
                    'type' =>$this->input->post('type'),
                    'initial_rx' =>$this->input->post('initial_rx'), // Decoded to an array, then encoded back to JSON
                    'detail' =>$this->input->post('detail'),
                    'last_recorded' =>$this->input->post('last_recorded'),
                    'last_prescribed' =>$this->input->post('last_prescribed'),
                    'status'=>'0',
                    'created_at'=>now(),
                );
                // print_r($options_data);die;
                
                // $this->load->database();
                // $this->db->insert('patient_medicine',$options_data); 
                // return ($this->db->affected_rows() != 1) ? false : true; 
                // $patient_id = $this->input->post('patient_id');
                // $user_id = $CareUnitID;
                // $facility_user_id = $CareUnitID;
                // $type = $this->input->post('type');
                // $initial_rx = $medicine_name;
                // $detail = $this->input->post('detail');
                // $last_recorded = $this->input->post('last_recorded');
                // $last_prescribed = $this->input->post('last_prescribed');
                

                // $this->load->database();

                // $sql12 = "INSERT INTO `medication` (`patient_id`, `user_id`, `facility_user_id`, `type`, `initial_rx`, `details`, `last_recorded`, `last_prescribed`, `status`, `created_at`)
                //  VALUES ('5256', '274', '274', 'operation', '15,25', 'dfghjkvvghbjh', CURRENT_TIME(), CURRENT_TIME(), '0', CURRENT_TIME())";
        
                // Execute the query
                // $this->db->query($sql12);
        
                // // Optionally, you can check if the query was successful
                // if ($this->db->affected_rows() > 0) {
                //     echo "Data inserted successfully.";
                //     die;
                // } else {
                //     echo "Failed to insert data.";
                //     die;
                // }




            //     $patient_id = $this->input->post('patient_id');
               
                    
            //     $type = $this->input->post('type');
            //     $initial_rx = $medicine_name;
            //     $detail = $this->input->post('detail');
            //     $last_recorded = $this->input->post('last_recorded');
            //     $last_prescribed = $this->input->post('last_prescribed');
            //     $user_id = $CareUnitID;
            //     $facility_user_id = $CareUnitID;
            //     $this->load->database();

            // // Define your custom query
            // $sql = "INSERT INTO `vendor_sale_patient_medicine` (`id`, `patient_id`, `user_id`, `facility_user_id`, `type`, `initial_rx`, `details`, `last_recorded`, `last_prescribed`, `status`, `created_at`)
            //  VALUES (NULL, $patient_id, $user_id, $facility_user_id, $type, $initial_rx, $detail, $last_recorded, $last_prescribed, '0', CURRENT_TIME())";
    
            // $this->db->query($sql);
    
            // // Optionally, you can check if the query was successful
            // if ($this->db->affected_rows() > 0) {
            //     echo "Data inserted successfully.";
            // } else {
            //     echo "Failed to insert data.";
            // }

        // $this->db->insert('vendor_sale_patient_medicine',$options_data);
        // $num = $this->db->insert_id();
        // print_r($num);die;
        // if($num){
        //   return $num;
        //   }else{
        //   return FALSE;
        // }

                $option = array('table' => 'medication', 'data' => $options_data);
                $patient_id = $this->common_model->customInsert($option);
                // $this->db->insert('patient_medicine', $options_data);

              
                $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
              
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    /**
     * @method index
     * @description listing display
     * @return array
     */
    public function existing_list($patient_ids)
    {
        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['model'] = 'patient/open_model';
        $this->data['table'] = $this->_table;
        // $patient_ids = $this->db->get('patient_id');
        $option = array('table' => 'care_unit', 'where' => array('delete_status' => 0, 'is_active' => 1));
        $this->data['careUnit'] = $this->common_model->customGet($option);

        $this->data['careUnitID'] = $careUnitID = (isset($_GET['careUnit'])) ? $_GET['careUnit'] : "";
        $option = array(
            'table' => 'patient P',
            'select' => 'P.id as patient_id,P.patient_id as pid,P.name as patient_name,P.date_of_start_abx,P.total_days_of_patient_stay,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.comment',
            'join' => array(
                array('care_unit CI', 'CI.id=P.care_unit_id', 'inner'),
                array('doctors DOC', 'DOC.id=P.doctor_id', 'inner'),
                array('users U', 'U.id=P.md_steward_id', 'left'),
                array('patient_consult PC', 'PC.patient_id=P.id', 'inner'),
                array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                array('organism Org', 'Org.name=P.organism', 'left'),
                array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left')
            ),
            'order' => array('P.id' => 'DESC')
        );
        $option['where']['P.patient_id'] = $patient_ids;
        if (!empty($careUnitID)) {
            $option['where']['P.care_unit_id'] = $careUnitID;
        }
        $option['order'] = array('P.id' => 'desc');
        $this->data['list'] = $this->common_model->customGet($option);
        // print_r($this->common_model->customGet($option));die;
        $this->load->admin_render('existing_list', $this->data, 'inner_script');
    }

    /**
     * @method open_model
     * @description load model box
     * @return array
     */
    function open_model()
    {
    
        $this->data['title'] = "Add " . $this->title;
        // $this->data['formUrl'] = $this->router->fetch_class() . "/add";
        $this->data['formUrl'] = $this->router->fetch_class() . "/addPatient";
        $this->data['formUrlRelation'] = $this->router->fetch_class() . "/addRelationship";
        
        
        $AdminCareUnitID = isset($_SESSION['admin_care_unit_id']) ? $_SESSION['admin_care_unit_id'] : '';

        $option = array('table' => 'care_unit', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc'));
        if (!empty($AdminCareUnitID)) {
            $option['where']['id']  = $AdminCareUnitID;
        }
        $this->data['care_unit'] = $this->common_model->customGet($option);

        $option = array('table' => 'countries','select' => '*','where'=>array('shortname'=>'GB'));
        $this->data['countries'] = $this->common_model->customGet($option);

        $option = array('table' => 'states',
                    'select' => '*');
                $this->data['states'] = $this->common_model->customGet($option);



        $this->data['careUnitss'] = json_decode($AdminCareUnitID);

        $careUnitDatas = array();
        foreach ($this->data['careUnitss'] as $value) {

            $option = array(
                'table' => 'care_unit',
                'select' => 'care_unit.id,care_unit.name',
                'where' => array('care_unit.id' => $value)
            );
            $careUnitDatas[] = $this->common_model->customGet($option);
        }
        $arraySingle = call_user_func_array('array_merge', $careUnitDatas);
        $this->data['careUnitsUser'] = $arraySingle;
       
        $user_id = $this->session->userdata('user_id');

        $option3 = array(
            'table' => 'doctors',
            'select' => 'doctors.*',
            'where' => array(
                'doctors.delete_status' => 0,
                'doctors.user_id'=> $user_id
            ),
            'single'=>true,
        );

        $this->hospital = $this->common_model->customGet($option3);
        $this->hospital->facility_user_id;
        $this->data['initial_dx'] = $this->common_model->customGet(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['culture_source'] = $this->common_model->customGet(array('table' => 'culture_source', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['organism'] = $this->common_model->customGet(array('table' => 'organism', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['precautions'] = $this->common_model->customGet(array('table' => 'precautions', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['initial_rx'] = $this->common_model->customGet(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        // $this->data['doctors'] = $this->common_model->customGet(array('table' => 'doctors', 'select' => 'id,name', 'where' => array('is_active' => 1, 'facility_user_id'=>$this->hospital->facility_user_id, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        


        
        // $option = array(

        //     'table' => 'users',
        //     'select' => 'users.id, CONCAT(first_name," ",last_name) as doctor_name, doctors.facility_user_id', 
        //     'join' => array(
        //         array('doctors', 'doctors.user_id = users.id', 'inner'),
        //     ),
        //     'where' => array(
        //         'users.delete_status' => 0,
        //         'doctors.facility_user_id' => $this->hospital->facility_user_id
        //     ),
        // );
        

        // $this->data['doctors'] = $this->common_model->customGet($option);


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


        // echo "<pre>";
        // print_r($this->data['staward']);
        // die;
        $option2 = array(
            'table' => USERS . ' as user',
            'select' => 'user.*,group.name as group_name,UP.doc_file',
            'join' => array(
                array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                array('user_profile UP', 'UP.user_id=user.id', 'inner')
            ),
            'order' => array('user.id' => 'ASC'),
            'where' => array(
                'user.delete_status' => 0,
                'group.id' => 6
            ),
            'order' => array('user.first_name' => 'ASC')
        );

        $this->data['stawardss'] = $this->common_model->customGet($option2);
        // $this->load->view('new_patient', $this->data);
        $this->load->admin_render('new_patient', $this->data, 'inner_script');
        // $this->load->view('add', $this->data);
    }


    public function openRelationship(){
    
        $id = decoding($_GET['id']);
            $this->data['parent'] = $this->title;
            $this->data['title'] = $this->title;

            $this->data['formUrl'] = $this->router->fetch_class() . "/update";
            $id = decoding($_GET['id']);
            if (!empty($id)) {

                    $this->load->admin_render('add_relation', $this->data, 'inner_script');
                
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('patient');
            }
    }



    public function addRelationship(){

        // "<pre>";
        // echo 'relation data';
        // print_r($this->input->post());die;
        // "<pre>";

            // $data_to_store = $this->input->post();
           
            // $this->session->set_userdata('stored_data', $data_to_store);
    
            
            // $response = array('success' => true);
            // echo json_encode($response);
       

    
        // $id = decoding($_GET['id']);
        //     $this->data['parent'] = $this->title;
        //     $this->data['title'] = $this->title;

        //     $this->data['formUrl'] = $this->router->fetch_class() . "/update";

        //     $id = decoding($_GET['id']);

        // $this->form_validation->set_rules('name', 'Name', 'trim');
        // $this->form_validation->set_rules('address', 'Address', 'trim');
        // $this->form_validation->set_rules('room_number', 'Room Number', 'trim');
        // $this->form_validation->set_rules('symptom_onset', 'Infection Onset', 'trim|required|in_list[Hospital,Facility]');
        // $this->form_validation->set_rules('care_unit_id', 'Care Unit', 'trim|required|numeric');
        // $this->form_validation->set_rules('doctor_id', 'Doctor', 'trim|required|numeric');
        // $this->form_validation->set_rules('md_steward_id', 'MD Steward', 'trim|required');
        //  $this->form_validation->set_rules('md_stayward_consult', 'MD Stayward Consult', 'trim|required|in_list[Yes,No]');
        // $this->form_validation->set_rules('criteria_met', 'Criteria Met', 'trim|required|in_list[Yes,No]');
        
       
        // if ($this->form_validation->run() == true) {
        //     $operator_id = ($this->ion_auth->is_admin()) ? 0 : $this->session->userdata('user_id');
           
        //             $option = array(
        //                 'table' => 'notifications',
        //                 'data' => array(
        //                     'user_id' => $insert_user_id,
        //                     'sender_id' => 1,
        //                     'message' => "ID: $patient_unique_id New patient added",
        //                     'user_type' => "USER",
        //                     'type_id' => $patient_unique_id,
        //                     'care_unit_id' => $this->input->post('care_unit_id'),
        //                     'patient_id' => $patient_id,
        //                     'sent_time' => date('Y-m-d H:i:s')
        //                 )
        //             );
        //             $this->common_model->customInsert($option);
        //             $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
        //         } else {
        //             $response = array('status' => 0, 'message' => "Failed to add");
        //         }
                // $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
       
        // echo json_encode($response);

    }



    /**
     * @method patientExport
     * @description export patient list
     * @return array
     */
    function monthYearPatientExport()
    {
        //         echo"<pre>";print_r($_GET);
        // die('hello');  
        $careUnitID = $this->input->get('careUnitID');
        $selectedMonth = $this->input->get('month');
        $selectedYear = $this->input->get('year');

        // Initialize $from and $to based on $selectedMonth and $selectedYear
        if ($selectedMonth && $selectedYear) {
            // Convert the month to a string with two characters
            $selectedMonth = str_pad($selectedMonth, 2, '0', STR_PAD_LEFT);

            $startDate = $selectedYear . '-' . $selectedMonth . '-01';
            $endDate = $selectedYear . '-' . $selectedMonth . '-' . date('t', strtotime($startDate));
            $from = $startDate;
            $to = $endDate;
        }
        $UsersCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin()) {
            $option = array(
                'table' => 'patient P',
                'select' => 'P.infection_surveillance_checklist,P.total_days_of_patient_stay,P.patient_id as patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                    . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,Pre.name as precautions_name,CS.name as culture_source_name,Org.name as organism_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                    . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                    . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,IRX.price as price1,IRX2.price as price2,P.created_date,P.date_of_start_abx',
                'join' => array(
                    array('care_unit CI', 'CI.id=P.care_unit_id', 'inner'),
                    array('doctors DOC', 'DOC.id=P.doctor_id', 'inner'),
                    array('users U', 'U.id=P.md_steward_id', 'inner'),
                    array('patient_consult PC', 'PC.patient_id=P.id', 'inner'),
                    array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                    array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                    array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                    array('organism Org', 'Org.name=P.organism', 'left'),
                    array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                    array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                    array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left')
                )
            );
            if (!empty($careUnitID)) {
                $option['where']['P.care_unit_id'] = $careUnitID;
            }
            if (!empty($from)) {
                $option['where']['DATE(P.date_of_start_abx) >='] = $from;
            }
            if (!empty($to)) {
                $option['where']['DATE(P.date_of_start_abx) <='] = $to;
            }
            $AdminCareUnitID = isset($_SESSION['admin_care_unit_id']) ? $_SESSION['admin_care_unit_id'] : '';
            if (!empty($AdminCareUnitID)) {
                $option['where']['P.care_unit_id']  = $AdminCareUnitID;
            }
            $option['order'] = array('P.name' => 'asc');
            $patientList = $this->common_model->customGet($option);
        } else {

            if (!empty($careUnitID) and !empty($from) and !empty($to)) {


                $Sql = "SELECT vendor_sale_patient.id,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_patient.md_stayward_response,vendor_sale_patient.psa,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_culture_source.name as culture_source_name,vendor_sale_organism.name as organism_name,vendor_sale_precautions.name as precautions_name,ird2.name as new_initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,irx2.name as new_initial_rx_name,vendor_sale_patient_consult.initial_dot,vendor_sale_patient_consult.new_initial_dot,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_culture_source ON vendor_sale_culture_source.name= vendor_sale_patient.culture_source JOIN vendor_sale_organism ON vendor_sale_organism.name= vendor_sale_patient.organism JOIN vendor_sale_precautions ON vendor_sale_precautions.name= vendor_sale_patient.precautions LEFT JOIN vendor_sale_initial_dx ird2 ON ird2.id= vendor_sale_patient_consult.new_initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx LEFT JOIN vendor_sale_initial_rx irx2 ON irx2.id= vendor_sale_patient_consult.new_initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND vendor_sale_patient.care_unit_id = $careUnitID AND vendor_sale_patient.date_of_start_abx  >= '$from'  AND vendor_sale_patient.date_of_start_abx <= '$to' ORDER BY `patient_id` ASC";
            } else if (!empty($from) and !empty($to)) {


                $Sql = "SELECT vendor_sale_patient.id,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_patient.md_stayward_response,vendor_sale_patient.psa,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_culture_source.name as culture_source_name,vendor_sale_organism.name as organism_name,vendor_sale_precautions.name as precautions_name,ird2.name as new_initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,irx2.name as new_initial_rx_name,vendor_sale_patient_consult.initial_dot,vendor_sale_patient_consult.new_initial_dot,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_culture_source ON vendor_sale_culture_source.name= vendor_sale_patient.culture_source JOIN vendor_sale_organism ON vendor_sale_organism.name= vendor_sale_patient.organism JOIN vendor_sale_precautions ON vendor_sale_precautions.name= vendor_sale_patient.precautions LEFT JOIN vendor_sale_initial_dx ird2 ON ird2.id= vendor_sale_patient_consult.new_initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx LEFT JOIN vendor_sale_initial_rx irx2 ON irx2.id= vendor_sale_patient_consult.new_initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND vendor_sale_patient.date_of_start_abx  >= '$from'  AND vendor_sale_patient.date_of_start_abx <= '$to' ORDER BY `patient_id` ASC";
            } else if (!empty($careUnitID)) {


                $Sql = "SELECT vendor_sale_patient.id,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_patient.md_stayward_response,vendor_sale_patient.psa,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_culture_source.name as culture_source_name,
                vendor_sale_organism.name as organism_name,vendor_sale_precautions.name as precautions_name,ird2.name as new_initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,irx2.name as new_initial_rx_name,vendor_sale_patient_consult.initial_dot,vendor_sale_patient_consult.new_initial_dot,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_culture_source ON vendor_sale_culture_source.name= vendor_sale_patient.culture_source JOIN vendor_sale_organism ON vendor_sale_organism.name= vendor_sale_patient.organism JOIN vendor_sale_precautions ON vendor_sale_precautions.name= vendor_sale_patient.precautions LEFT JOIN vendor_sale_initial_dx ird2 ON ird2.id= vendor_sale_patient_consult.new_initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx LEFT JOIN vendor_sale_initial_rx irx2 ON irx2.id= vendor_sale_patient_consult.new_initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND vendor_sale_patient.care_unit_id = $careUnitID ORDER BY `patient_id` ASC";
            } else {

                $Sql = "SELECT vendor_sale_patient.id,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_patient.md_stayward_response,vendor_sale_patient.psa,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_culture_source.name as culture_source_name,vendor_sale_organism.name as organism_name,vendor_sale_precautions.name as precautions_name,ird2.name as new_initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,irx2.name as new_initial_rx_name,vendor_sale_patient_consult.initial_dot,vendor_sale_patient_consult.new_initial_dot,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_culture_source ON vendor_sale_culture_source.name= vendor_sale_patient.culture_source JOIN vendor_sale_organism ON vendor_sale_organism.name= vendor_sale_patient.organism JOIN vendor_sale_precautions ON vendor_sale_precautions.name= vendor_sale_patient.precautions LEFT JOIN vendor_sale_initial_dx ird2 ON ird2.id= vendor_sale_patient_consult.new_initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx LEFT JOIN vendor_sale_initial_rx irx2 ON irx2.id= vendor_sale_patient_consult.new_initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID ORDER BY `patient_id` ASC";

                /*$Sql = "SELECT vendor_sale_patient.id ,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID ORDER BY `patient_id` ASC"; */
            }

            $patientList = $this->common_model->customQuery($Sql);
        }


        $print_array = array();
        if (!empty($patientList)) {
            foreach ($patientList as $Row) {
                if ($Row->md_stayward_response == 'NoResponse') {
                    $x = "Neutral";
                }
                if ($Row->md_stayward_response == '') {
                    $x = "Neutral";
                }
                if ($Row->md_stayward_response == 'Agree') {
                    $x = "Agree";
                }
                if ($Row->md_stayward_response == 'Disagree') {
                    $x = "Disagree";
                }
                if ($Row->md_stayward_response == 'Modify') {
                    $x = "Modify";
                }

                if ($Row->psa == 'NoResponse') {
                    $y = "No Response";
                }
                if ($Row->psa == 'Neutral') {
                    $y = "Neutral";
                }
                if ($Row->psa == '') {
                    $y = "Neutral";
                }
                if ($Row->psa == 'Agree') {
                    $y = "Agree";
                }
                if ($Row->psa == 'Disagree') {
                    $y = "Disagree";
                }


                if ($Row->symptom_onset == 'Facility') {
                    $symptom_onset = 'Facility/HAI';
                } else if ($Row->symptom_onset == 'Hospital') {
                    $symptom_onset = 'Hospital/CAI';
                } else {
                    $symptom_onset = '';
                }


                if ($Row->precautions_name == 'Airborne') {
                    $precautions = 'A';
                } else if ($Row->precautions_name == 'Contact') {
                    $precautions = 'C';
                } else if ($Row->precautions_name == 'Droplet') {
                    $precautions = 'D';
                } else if ($Row->precautions_name == 'N/A') {
                    $precautions = 'N/A';
                }

                if ($Row->room_number == 'NULL') {
                    $room_number = 'NA';
                } else if ($Row->room_number == 'NA') {
                    $room_number = 'NA';
                } else if ($Row->room_number == null) {
                    $room_number = 'NA';
                } else {
                    $room_number = $Row->room_number;
                }

                $print_array[] = array(
                    //'CreateDate' => date('m/d/Y h:i:s A', strtotime($Row->created_date)),
                    'PatientID' => $Row->patient_id,
                    // 'CareUnitName' => $Row->care_unit_name,
                    // 'PatientName' => $Row->patient_name,
                    // 'PatientAddress' => $Row->address,
                    'RoomNumber' => $room_number,
                    'SymptomOnset' => $symptom_onset,
                    'CultureSource' => $Row->culture_source_name,
                    'Organism' => $Row->organism_name,
                    //'Precautions' => $Row->precautions_name,
                    'Precautions' => $precautions,
                    'DateOfStartAbx' => date('m/d/Y', strtotime($Row->date_of_start_abx)),
                    'DoctorName' => $Row->doctor_name,
                    'InitialDX' => $Row->initial_dx_name,
                    'InitialRX' => $Row->initial_rx_name,
                    'InitialDOT' => $Row->initial_dot,
                    //'MDStewardConsult' => $Row->md_stayward_consult,
                    'MDSteward' => $Row->md_stayward,

                    /* $x=(!empty($Row->md_stayward_response ? $Row->md_stayward_response=='NoResponse':"Neutral")) ? $Row->md_stayward_response :"Neutral",*/

                    'MDStewardResponse' => $x,
                    'PSA' => $y,
                    'NewInitialDX' => $Row->new_initial_dx_name,
                    'NewInitialRX' => $Row->new_initial_rx_name,
                    'NewInitialDOT' => $Row->new_initial_dot
                );
            }
           
            if (!empty($print_array)) {
                //$fp = fopen('PatientList.csv', 'w');
                // Define the CSV filename based on the selected month and year

                $filename = "PatientList.csv";

                // Set the HTTP response headers to trigger a download
                header('Content-Type: text/csv');
                header("Content-Disposition: attachment; filename=\"$filename\"");

                // Create a writable stream to output the CSV
                $output = fopen('php://output', 'w');

                // Add a header row
                fputcsv($output, array_keys($print_array[0]));

                // Add print_array rows
                foreach ($print_array as $row) {
                    fputcsv($output, $row);
                }

                // Close the output stream
                fclose($output);

                // Terminate the script
                exit();
            }
        } else {
            if (!empty($created_date)) {
                $this->session->set_flashdata('error', "Records not found for this date " . $_GET['date']);
            } else {
                $this->session->set_flashdata('error', "Records not found");
            }

            redirect('patient');
        }
    }

    function patientExport($from, $to, $careUnitID)
    {
        /* $careUnitID = (isset($_GET['careUnitID'])) ? $_GET['careUnitID'] : "";
                    $from = (isset($_GET['date']) && !empty($_GET['date'])) ? date('Y-m-d', strtotime($_GET['date'])) : "";
                    $to = (isset($_GET['date1']) && !empty($_GET['date1'])) ? date('Y-m-d', strtotime($_GET['date1'])) : "";  */

        $UsersCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin()) {
            $option = array(
                'table' => 'patient P',
                'select' => 'P.infection_surveillance_checklist,P.total_days_of_patient_stay,P.patient_id as patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                    . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,Pre.name as precautions_name,CS.name as culture_source_name,Org.name as organism_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                    . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                    . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,IRX.price as price1,IRX2.price as price2,P.created_date,P.date_of_start_abx',
                'join' => array(
                    array('care_unit CI', 'CI.id=P.care_unit_id', 'inner'),
                    array('doctors DOC', 'DOC.id=P.doctor_id', 'inner'),
                    array('users U', 'U.id=P.md_steward_id', 'inner'),
                    array('patient_consult PC', 'PC.patient_id=P.id', 'inner'),
                    array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                    array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                    array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                    array('organism Org', 'Org.name=P.organism', 'left'),
                    array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                    array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                    array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left')
                )
            );

            if (!empty($careUnitID)) {
                $option['where']['P.care_unit_id'] = $careUnitID;
            }
            if (!empty($from)) {
                $option['where']['DATE(P.date_of_start_abx) >='] = $from;
            }
            if (!empty($to)) {
                $option['where']['DATE(P.date_of_start_abx) <='] = $to;
            }
            $AdminCareUnitID = isset($_SESSION['admin_care_unit_id']) ? $_SESSION['admin_care_unit_id'] : '';
            if (!empty($AdminCareUnitID)) {
                $option['where']['P.care_unit_id']  = $AdminCareUnitID;
            }
            $option['order'] = array('P.name' => 'asc');
            $patientList = $this->common_model->customGet($option);
        } else {

            if (!empty($careUnitID) and !empty($from) and !empty($to)) {


                $Sql = "SELECT vendor_sale_patient.id,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_patient.md_stayward_response,vendor_sale_patient.psa,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_culture_source.name as culture_source_name,vendor_sale_organism.name as organism_name,vendor_sale_precautions.name as precautions_name,ird2.name as new_initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,irx2.name as new_initial_rx_name,vendor_sale_patient_consult.initial_dot,vendor_sale_patient_consult.new_initial_dot,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_culture_source ON vendor_sale_culture_source.name= vendor_sale_patient.culture_source JOIN vendor_sale_organism ON vendor_sale_organism.name= vendor_sale_patient.organism JOIN vendor_sale_precautions ON vendor_sale_precautions.name= vendor_sale_patient.precautions LEFT JOIN vendor_sale_initial_dx ird2 ON ird2.id= vendor_sale_patient_consult.new_initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx LEFT JOIN vendor_sale_initial_rx irx2 ON irx2.id= vendor_sale_patient_consult.new_initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND vendor_sale_patient.care_unit_id = $careUnitID AND vendor_sale_patient.date_of_start_abx  >= '$from'  AND vendor_sale_patient.date_of_start_abx <= '$to' ORDER BY `patient_id` ASC";
            } else if (!empty($from) and !empty($to)) {


                $Sql = "SELECT vendor_sale_patient.id,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_patient.md_stayward_response,vendor_sale_patient.psa,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_culture_source.name as culture_source_name,vendor_sale_organism.name as organism_name,vendor_sale_precautions.name as precautions_name,ird2.name as new_initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,irx2.name as new_initial_rx_name,vendor_sale_patient_consult.initial_dot,vendor_sale_patient_consult.new_initial_dot,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_culture_source ON vendor_sale_culture_source.name= vendor_sale_patient.culture_source JOIN vendor_sale_organism ON vendor_sale_organism.name= vendor_sale_patient.organism JOIN vendor_sale_precautions ON vendor_sale_precautions.name= vendor_sale_patient.precautions LEFT JOIN vendor_sale_initial_dx ird2 ON ird2.id= vendor_sale_patient_consult.new_initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx LEFT JOIN vendor_sale_initial_rx irx2 ON irx2.id= vendor_sale_patient_consult.new_initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND vendor_sale_patient.date_of_start_abx  >= '$from'  AND vendor_sale_patient.date_of_start_abx <= '$to' ORDER BY `patient_id` ASC";
            } else if (!empty($careUnitID)) {


                $Sql = "SELECT vendor_sale_patient.id,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_patient.md_stayward_response,vendor_sale_patient.psa,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_culture_source.name as culture_source_name,
                vendor_sale_organism.name as organism_name,vendor_sale_precautions.name as precautions_name,ird2.name as new_initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,irx2.name as new_initial_rx_name,vendor_sale_patient_consult.initial_dot,vendor_sale_patient_consult.new_initial_dot,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_culture_source ON vendor_sale_culture_source.name= vendor_sale_patient.culture_source JOIN vendor_sale_organism ON vendor_sale_organism.name= vendor_sale_patient.organism JOIN vendor_sale_precautions ON vendor_sale_precautions.name= vendor_sale_patient.precautions LEFT JOIN vendor_sale_initial_dx ird2 ON ird2.id= vendor_sale_patient_consult.new_initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx LEFT JOIN vendor_sale_initial_rx irx2 ON irx2.id= vendor_sale_patient_consult.new_initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID AND vendor_sale_patient.care_unit_id = $careUnitID ORDER BY `patient_id` ASC";
            } else {

                $Sql = "SELECT vendor_sale_patient.id,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.room_number,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_patient.md_stayward_response,vendor_sale_patient.psa,vendor_sale_initial_dx.name as initial_dx_name,vendor_sale_culture_source.name as culture_source_name,vendor_sale_organism.name as organism_name,vendor_sale_precautions.name as precautions_name,ird2.name as new_initial_dx_name,vendor_sale_initial_rx.name as initial_rx_name,irx2.name as new_initial_rx_name,vendor_sale_patient_consult.initial_dot,vendor_sale_patient_consult.new_initial_dot,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_patient_consult ON vendor_sale_patient_consult.patient_id= vendor_sale_patient.id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_initial_dx ON vendor_sale_initial_dx.id= vendor_sale_patient_consult.initial_dx JOIN vendor_sale_culture_source ON vendor_sale_culture_source.name= vendor_sale_patient.culture_source JOIN vendor_sale_organism ON vendor_sale_organism.name= vendor_sale_patient.organism JOIN vendor_sale_precautions ON vendor_sale_precautions.name= vendor_sale_patient.precautions LEFT JOIN vendor_sale_initial_dx ird2 ON ird2.id= vendor_sale_patient_consult.new_initial_dx JOIN vendor_sale_initial_rx ON vendor_sale_initial_rx.id= vendor_sale_patient_consult.initial_rx LEFT JOIN vendor_sale_initial_rx irx2 ON irx2.id= vendor_sale_patient_consult.new_initial_rx JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID ORDER BY `patient_id` ASC";

                /*$Sql = "SELECT vendor_sale_patient.id ,vendor_sale_patient.patient_id ,vendor_sale_care_unit.name,vendor_sale_patient.symptom_onset,vendor_sale_patient.culture_source,vendor_sale_patient.organism,vendor_sale_doctors.name as doctor_name,vendor_sale_users.first_name as md_stayward,vendor_sale_patient.date_of_start_abx FROM vendor_sale_patient JOIN vendor_sale_care_unit ON vendor_sale_care_unit.id = vendor_sale_patient.care_unit_id JOIN vendor_sale_doctors ON vendor_sale_doctors.id= vendor_sale_patient.doctor_id JOIN vendor_sale_users ON vendor_sale_users.id= vendor_sale_patient.md_steward_id  WHERE vendor_sale_patient.operator_id = $UsersCareUnitID ORDER BY `patient_id` ASC"; */
            }

            $patientList = $this->common_model->customQuery($Sql);
        }

        $print_array = array();

        if (!empty($patientList)) {
            foreach ($patientList as $Row) {
                if ($Row->md_stayward_response == 'NoResponse') {
                    $x = "Neutral";
                }
                if ($Row->md_stayward_response == '') {
                    $x = "Neutral";
                }
                if ($Row->md_stayward_response == 'Agree') {
                    $x = "Agree";
                }
                if ($Row->md_stayward_response == 'Disagree') {
                    $x = "Disagree";
                }
                if ($Row->md_stayward_response == 'Modify') {
                    $x = "Modify";
                }

                if ($Row->psa == 'NoResponse') {
                    $y = "No Response";
                }
                if ($Row->psa == 'Neutral') {
                    $y = "Neutral";
                }
                if ($Row->psa == '') {
                    $y = "Neutral";
                }
                if ($Row->psa == 'Agree') {
                    $y = "Agree";
                }
                if ($Row->psa == 'Disagree') {
                    $y = "Disagree";
                }


                if ($Row->symptom_onset == 'Facility') {
                    $symptom_onset = 'Facility/HAI';
                } else if ($Row->symptom_onset == 'Hospital') {
                    $symptom_onset = 'Hospital/CAI';
                } else {
                    $symptom_onset = '';
                }


                if ($Row->precautions_name == 'Airborne') {
                    $precautions = 'A';
                } else if ($Row->precautions_name == 'Contact') {
                    $precautions = 'C';
                } else if ($Row->precautions_name == 'Droplet') {
                    $precautions = 'D';
                } else if ($Row->precautions_name == 'N/A') {
                    $precautions = 'N/A';
                }

                if ($Row->room_number == 'NULL') {
                    $room_number = 'NA';
                } else if ($Row->room_number == 'NA') {
                    $room_number = 'NA';
                } else if ($Row->room_number == null) {
                    $room_number = 'NA';
                } else {
                    $room_number = $Row->room_number;
                }

                $print_array[] = array(
                    //'CreateDate' => date('m/d/Y h:i:s A', strtotime($Row->created_date)),
                    'PatientID' => $Row->patient_id,
                    'CareUnitName' => $Row->care_unit_name,
                    // 'PatientName' => $Row->patient_name,
                    // 'PatientAddress' => $Row->address,
                    'RoomNumber' => $room_number,
                    'SymptomOnset' => $symptom_onset,
                    'CultureSource' => $Row->culture_source_name,
                    'Organism' => $Row->organism_name,
                    //'Precautions' => $Row->precautions_name,
                    'Precautions' => $precautions,
                    'DateOfStartAbx' => date('m/d/Y', strtotime($Row->date_of_start_abx)),
                    'DoctorName' => $Row->doctor_name,
                    'InitialDX' => $Row->initial_dx_name,
                    'InitialRX' => $Row->initial_rx_name,
                    'InitialDOT' => $Row->initial_dot,
                    //'MDStewardConsult' => $Row->md_stayward_consult,
                    'MDSteward' => $Row->md_stayward,

                    /* $x=(!empty($Row->md_stayward_response ? $Row->md_stayward_response=='NoResponse':"Neutral")) ? $Row->md_stayward_response :"Neutral",*/

                    'MDStewardResponse' => $x,
                    'PSA' => $y,
                    'NewInitialDX' => $Row->new_initial_dx_name,
                    'NewInitialRX' => $Row->new_initial_rx_name,
                    'NewInitialDOT' => $Row->new_initial_dot
                    //'total_days_of_patient_stay' => $Row->total_days_of_patient_stay,
                    //'infection_surveillance_checklist' => $Row->infection_surveillance_checklist,
                    //'price1' => $Row->price1,
                    //'price2' => $Row->price2,
                );
            }

            if (!empty($print_array)) {
                //$fp = fopen('PatientList.csv', 'w');
                $HeaderTitle = array(
                    //'Admission Date',
                    'PatientID',
                    'Care Unit Name',
                    // 'Patient Name',
                    // 'Patient Address',
                    'Room Number',
                    'Infection Onset',
                    'Culture Source',
                    'Organism',
                    'Precautions',
                    'Date Of Start ABX',
                    'Provider Doctor',
                    'Diagnosis',
                    'Antibiotic Name',
                    //'Initial DOT',
                    'Days of Therapy',
                    // 'MD Steward Consult',
                    'MD Steward',
                    'MD Steward Response',
                    'PSA',
                    'New Diagnosis',
                    'New Antibiotic Name',
                    //'New Initial DOT'
                    'New Days of Therapy',
                    //'Total Days Of Patient Stay',
                    //'Infection Surveillance Checklist',
                    //'Antibiotic Price',
                    //'New Antibiotic Price',


                );

                $filename = "PatientList.csv";
                $fp = fopen('php://output', 'w');

                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename=' . $filename);
                fputcsv($fp, $HeaderTitle);
                foreach ($print_array as $row) {
                    fputcsv($fp, $row);
                }
                readfile($filename);
            }
        } else {

            if (!empty($created_date)) {
                $this->session->set_flashdata('error', "Records not found for this date " . $_GET['date']);
            } else {
                $this->session->set_flashdata('error', "Records not found");
            }

            redirect('patient');
        }
    }

    function patientImport()
    {
        if (!empty($_POST['careUnit'])) {
            if (!empty($_FILES['patientFile']['name'])) {
                $fileNameExt = $_FILES["patientFile"]["name"];
                $ext = pathinfo($fileNameExt, PATHINFO_EXTENSION);
                if (strtolower($ext) == "csv") {
                    if ($_FILES["patientFile"]["size"] > 0) {
                        $fileName = $_FILES["patientFile"]["tmp_name"];
                        $file = fopen($fileName, "r");
                        $InsertArray = array();
                        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                            if ($column[0] != "PatientID") {
                                $InsertArray[] = array(
                                    'PatientID' => $column[0],
                                    'CareUnitName' => $column[1],
                                    'PatientName' => $column[2],
                                    'PatientAddress' => $column[3],
                                    'SymptomOnset' => $column[4],
                                    'CultureSource' => $column[5],
                                    'Organism' => $column[6],
                                    // 'MDStewardConsult' => $column[5],
                                    'MDStewardResponse' => $column[7],
                                    'PSA' => $column[8],
                                    'TotalDaysOfPatientStay' => $column[9],
                                    'InfectionSurveillanceChecklist' => $column[10],
                                    'DoctorName' => $column[11],
                                    'MDSteward' => $column[12],
                                    'InitialRX' => $column[13],
                                    'InitialDX' => $column[14],
                                    'InitialDOT' => $column[15],
                                    'NewInitialRX' => $column[16],
                                    'NewInitiaDX' => $column[17],
                                    'NewInitialDOT' => $column[18],
                                );
                            }
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', "Invalid file, Please select CSV file.");
                    redirect('patient');
                }
            } else {
                $this->session->set_flashdata('error', "Invalid file, Please select CSV file.");
                redirect('patient');
            }
            //dump($InsertArray);
            if (!empty($InsertArray)) {
                foreach ($InsertArray as $Row) {

                    $doctor_id = "";
                    $doctorName = ucwords(trim($Row['DoctorName']));
                    $Query = $this->db->query("SELECT id FROM vendor_sale_doctors WHERE name = '" . $doctorName . "' limit 1");
                    $result = $Query->row_array();
                    if (!empty($result)) {
                        $doctor_id = $result['id'];
                    }
                    $md_steward_id = "";
                    $doctorName = ucwords(trim($Row['MDSteward']));
                    $Query = $this->db->query("SELECT id FROM vendor_sale_users WHERE full_name = '" . $doctorName . "' limit 1");
                    $result = $Query->row_array();
                    if (!empty($result)) {
                        $md_steward_id = $result['id'];
                    }
                    if (!empty($doctor_id) && !empty($md_steward_id)) {
                        $result = array();
                        if (!empty($Row['PatientID'])) {
                            $Query = $this->db->query("SELECT id FROM vendor_sale_patient WHERE patient_id = '" . $Row['PatientID'] . "' limit 1");
                            $result = $Query->row_array();
                        }
                        if (empty($result)) {
                            $option = array(
                                'table' => 'patient',
                                'data' => array(
                                    'patient_id' => randomUnique(),
                                    'name' => ucwords($Row['PatientName']),
                                    'address' => ucwords($Row['PatientAddress']),
                                    'symptom_onset' => $Row['SymptomOnset'],
                                    'CultureSource' => $Row['culture_source'],
                                    'Organism' => $Row['organism'],
                                    'total_days_of_patient_stay' => $Row['TotalDaysOfPatientStay'],
                                    'infection_surveillance_checklist' => $Row['InfectionSurveillanceChecklist'],
                                    'care_unit_id' => $_POST['careUnit'],
                                    'doctor_id' => $doctor_id,
                                    'md_steward_id' => $md_steward_id,
                                    //  'md_stayward_consult' => ucfirst($Row['MDStewardConsult']),
                                    'md_stayward_response' => ucfirst($Row['MDStewardResponse']),
                                    'psa' => ucfirst($Row['PSA']),
                                    'created_date' => date('Y-m-d H:i:s')
                                )
                            );
                            $patient_id = $this->common_model->customInsert($option);
                            if (!empty($patient_id)) {

                                $InitialDXID = null;
                                $InitialDX = ucwords(trim($Row['InitialDX']));
                                $Query = $this->db->query("SELECT id FROM vendor_sale_initial_dx WHERE name = '" . $InitialDX . "' limit 1");
                                $result = $Query->row_array();
                                if (!empty($result)) {
                                    $InitialDXID = $result['id'];
                                }

                                $InitialRXID = null;
                                $InitialRX = ucwords(trim($Row['InitialRX']));
                                $Query = $this->db->query("SELECT id FROM vendor_sale_initial_rx WHERE name = '" . $InitialRX . "' limit 1");
                                $result = $Query->row_array();
                                if (!empty($result)) {
                                    $InitialRXID = $result['id'];
                                }


                                $NewInitiaDXID = null;
                                $NewInitiaDX = ucwords(trim($Row['NewInitiaDX']));
                                $Query = $this->db->query("SELECT id FROM vendor_sale_initial_dx WHERE name = '" . $NewInitiaDX . "' limit 1");
                                $result = $Query->row_array();
                                if (!empty($result)) {
                                    $NewInitiaDXID = $result['id'];
                                }

                                $NewInitialRXID = null;
                                $NewInitialRX = ucwords(trim($Row['NewInitialRX']));
                                $Query = $this->db->query("SELECT id FROM vendor_sale_initial_rx WHERE name = '" . $NewInitialRX . "' limit 1");
                                $result = $Query->row_array();
                                if (!empty($result)) {
                                    $NewInitialRXID = $result['id'];
                                }
                                $option = array(
                                    'table' => 'patient_consult',
                                    'data' => array(
                                        'patient_id' => $patient_id,
                                        'initial_rx' => $InitialRXID,
                                        'initial_dx' => $InitialDXID,
                                        'initial_dot' => (!empty($Row['InitialDOT'])) ? $Row['InitialDOT'] : null,
                                        'new_initial_rx' => $NewInitialRXID,
                                        'new_initial_dx' => $NewInitiaDXID,
                                        'new_initial_dot' => (!empty($Row['NewInitialDOT'])) ? $Row['NewInitialDOT'] : null
                                    )
                                );
                                $insert_id = $this->common_model->customInsert($option);
                            }
                        }
                    }
                }
                $this->session->set_flashdata('success', "Successfully file import");
                redirect('patient');
            }
        } else {
            $this->session->set_flashdata('error', "Please select any one Care Unit");
            redirect('patient');
        }
    }

    /**
     * @method add
     * @description add dynamic rows
     * @return array
     */
    public function add()
    {

    

        $this->form_validation->set_rules('name', 'Name', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'trim');
        $this->form_validation->set_rules('room_number', 'Room Number', 'trim');
        $this->form_validation->set_rules('symptom_onset', 'Infection Onset', 'trim|required|in_list[Hospital,Facility]');
        $this->form_validation->set_rules('care_unit_id', 'Care Unit', 'trim|required|numeric');
        $this->form_validation->set_rules('doctor_id', 'Doctor', 'trim|required|numeric');
        // $this->form_validation->set_rules('md_steward_id', 'MD Steward', 'trim|required');
        //  $this->form_validation->set_rules('md_stayward_consult', 'MD Stayward Consult', 'trim|required|in_list[Yes,No]');
        // $this->form_validation->set_rules('criteria_met', 'Criteria Met', 'trim|required|in_list[Yes,No]');
        if ($this->input->post('infection_surveillance_checklist') != 'N/A') {
            $this->form_validation->set_rules('criteria_met', 'Criteria Met', 'trim|required|in_list[Yes,No]');
        }
        $this->form_validation->set_rules('patient_id', 'Patient Id', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('initial_rx', 'Initial RX', 'trim|required|numeric');
        $this->form_validation->set_rules('initial_dx', 'Initial DX', 'trim|required|numeric');
        $this->form_validation->set_rules('initial_dot', 'Days of Therapy', 'trim|required|numeric');
        $this->form_validation->set_rules('new_initial_rx', 'New Initial RX', 'trim');
        $this->form_validation->set_rules('new_initial_dx', 'New Initial DX', 'trim');
        $this->form_validation->set_rules('new_initial_dot', 'New Days of Therapy', 'trim');
        $this->form_validation->set_rules('infection_surveillance_checklist', 'Infection Surveillance Checklist', 'trim');
        // $this->form_validation->set_rules('md_stayward_response', 'MD Stayward Response', 'trim');
        // $this->form_validation->set_rules('culture_source', 'Culture Source', 'trim|required|in_list[NA,Sputum,Stool,Wound,Urine,Blood,Nares]');
        $this->form_validation->set_rules('culture_source', 'Culture Source', 'trim|required');
        $this->form_validation->set_rules('organism', 'Organism', 'trim|required');
        $this->form_validation->set_rules('precautions', 'Precautions', 'trim|required');
        //$this->form_validation->set_rules('organism', 'organism', 'trim|required|in_list[NA,Candida,C. auris,Citrobacter,Cdiff,Coag Neg Staph,COVID-19,Enterobacter,Enterococcus,Ecoli,ESBL ecoli,ESBL klebsiella,Klebsiella,MDRO,MRSA,MSSA,Proteus,Pseudomonas,Streptococcus,VRE,Other]');

        // $this->form_validation->set_rules('psa', 'PSA(Provider Steward Agreement)', 'trim');
        // $this->form_validation->set_rules('additional_comment_option[]', 'Additional Comment', 'trim');
        //$this->form_validation->set_rules('patient_mode', 'Patient Mode', 'trim|required|in_list[New,Existing]');
        if ($this->form_validation->run() == true) {
            $operator_id = ($this->ion_auth->is_admin()) ? 0 : $this->session->userdata('user_id');


            $email = strtolower($this->input->post('user_email'));
                $identity = ($identity_column === 'email') ? $email : $this->input->post('user_email');
                $password = $this->input->post('password');
                $username = explode('@', $this->input->post('user_email'));
                $digits = 5;
                $code = strtoupper(substr(preg_replace('/[^A-Za-z0-9\-]/', '', $username[0]), 0, 5)) . rand(pow(10, $digits - 1), pow(10, $digits) - 1);
                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'email,id',
                    'where' => array('email' => $email, 'delete_status' => 1),
                    'single' => true
                );
                $email_exist = $this->common_model->customGet($option);


                if ($LoginID != 1 && $LoginID != NULL) {
                    $x = $LoginID;
                } else if ($LoginID == 1) {
                    $x = NULL;
                }

                if (empty($email_exist)) {

                    // print_r($this->input->post('phone'));die;

                    $additional_data = array(
                        'first_name' => $this->input->post('name'),
                        'last_name' => $this->input->post('last_name'),
                        //'team_code' => $code,
                        'login_id' => $x,
                        'username' => $code,
                        // 'date_of_birth' => (!empty($this->input->post('date_of_birth'))) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : date('Y-m-d'),
                        // 'profile_pic' => $image,
                        'phone' => $this->input->post('phone'),
                        'phone_code' => $this->input->post('phone_code'),
                        'care_unit_id' => $this->input->post('care_unit_id'),
                        'zipcode_access' => $this->input->post('zipcode'),
                        'email_verify' => 1,
                        'is_pass_token' => $this->input->post('password'),
                        'created_on' => strtotime(datetime())
                    );
                    $insert_user_id = $this->ion_auth->register($identity, $password, $email, $additional_data, array(6));

                }


            // if ($this->input->post('patient_mode') == 'New') {
            $option = array(
                'table' => 'care_unit',
                'where' => array(
                    'id' => $this->input->post('care_unit_id'),
                ),
                'single' => true
            );
            $CareUnit = $this->common_model->customGet($option);
            $patient_unique_id = strtoupper($CareUnit->care_unit_code) . '' . $this->input->post('patient_id');

            $option = array(
                'table' => 'patient',
                'where' => array(
                'patient_id' => $patient_unique_id,
                )
            );
            $IsPatientUniqueID = $this->common_model->customGet($option);
            /* } else {
                $IsPatientUniqueID = array();
                $patient_unique_id = $this->input->post('patient_id');
            } */

            /* if (!empty($IsPatientUniqueID)) {
                $response = array('status' => 0, 'message' => "Patient id already exists");
            } else { */
            $option = array(
                'table' => 'patient',
                'data' => array(
                    'name' => ucwords($this->input->post('name')),
                    'operator_id' => $operator_id,
                    'patient_id' => $patient_unique_id,
                    
                    'address' => ucwords($this->input->post('address')),
                    //'room_number' => $this->input->post('room_number'),
                    'room_number' => (!empty($this->input->post('room_number'))) ? $this->input->post('room_number') : null,
                    'symptom_onset' => $this->input->post('symptom_onset'),
                    'culture_source' => $this->input->post('culture_source'),
                    'organism' => $this->input->post('organism'),
                    'precautions' => $this->input->post('precautions'),
                    'care_unit_id' => $this->input->post('care_unit_id'),
                    'doctor_id' => $this->input->post('doctor_id'),
                    'md_steward_id' => (!empty($this->input->post('md_steward_id'))) ? $this->input->post('md_steward_id') : null,
                    // 'md_stayward_consult' => $this->input->post('md_stayward_consult'),
                    'criteria_met' => $this->input->post('criteria_met'),
                    'md_stayward_response' => (!empty($this->input->post('md_stayward_response'))) ? $this->input->post('md_stayward_response') : null,
                    'psa' => (!empty($this->input->post('psa'))) ? $this->input->post('psa') : null,
                    //'pct' => (!empty($this->input->post('pct'))) ? $this->input->post('pct') : null,
                    'total_days_of_patient_stay' => (!empty($this->input->post('total_days_of_patient_stay'))) ? $this->input->post('total_days_of_patient_stay') : 0,
                    'infection_surveillance_checklist' => $this->input->post('infection_surveillance_checklist'),
                    'date_of_start_abx' => date('Y-m-d', strtotime($this->input->post('date_of_start_abx'))),
                    // 'pct' => (!empty($this->input->post('pct'))) ? $this->input->post('pct') : null,
                    'user_id' =>$insert_user_id,
                    'created_date' => date('Y-m-d H:i:s')
                )
            );

            $patient_id = $this->common_model->customInsert($option);
            if ($patient_id) {
                $option = array(
                    'table' => 'patient_consult',
                    'data' => array(
                        'patient_id' => $patient_id,
                        'initial_rx' => $this->input->post('initial_rx'),
                        'initial_dx' => $this->input->post('initial_dx'),
                        //'culture_source' => $this->input->post('culture_source'),
                        'initial_dot' => $this->input->post('initial_dot'),
                        'new_initial_rx' => (!empty($this->input->post('new_initial_rx'))) ? $this->input->post('new_initial_rx') : $this->input->post('initial_rx'),
                        'new_initial_dx' => (!empty($this->input->post('new_initial_dx'))) ? $this->input->post('new_initial_dx') : $this->input->post('initial_dx'),
                        'new_initial_dot' => (!empty($this->input->post('new_initial_dot'))) ? $this->input->post('new_initial_dot') : $this->input->post('initial_dot'),
                        // 'additional_comment_option' => (!empty($this->input->post('additional_comment_option'))) ? json_encode($this->input->post('additional_comment_option')) : null,
                    )
                );
                $insert_id = $this->common_model->customInsert($option);

                $option = array(
                    'table' => 'notifications',
                    'data' => array(
                        'user_id' => $insert_user_id,
                        'sender_id' => 1,
                        'message' => "ID: $patient_unique_id New patient added",
                        'user_type' => "USER",
                        'type_id' => $patient_unique_id,
                        'care_unit_id' => $this->input->post('care_unit_id'),
                        'patient_id' => $patient_id,
                        'sent_time' => date('Y-m-d H:i:s')
                    )
                );
                $patient_id = $this->common_model->customInsert($option);

                if ($patient_id) {
                    $option = array(
                        'table' => 'patient_consult',
                        'data' => array(
                            'patient_id' => $patient_id,
                            'initial_rx' => $this->input->post('initial_rx'),
                            'initial_dx' => $this->input->post('initial_dx'),
                            //'culture_source' => $this->input->post('culture_source'),
                            'initial_dot' => $this->input->post('initial_dot'),
                            'new_initial_rx' => (!empty($this->input->post('new_initial_rx'))) ? $this->input->post('new_initial_rx') : $this->input->post('initial_rx'),
                            'new_initial_dx' => (!empty($this->input->post('new_initial_dx'))) ? $this->input->post('new_initial_dx') : $this->input->post('initial_dx'),
                            'new_initial_dot' => (!empty($this->input->post('new_initial_dot'))) ? $this->input->post('new_initial_dot') : $this->input->post('initial_dot'),
                            'additional_comment_option' => (!empty($this->input->post('additional_comment_option'))) ? json_encode($this->input->post('additional_comment_option')) : null,

                        )
                    );
                    $insert_id = $this->common_model->customInsert($option);



                    $option = array(
                        'table' => 'notifications',
                        'data' => array(
                            'user_id' => $insert_user_id,
                            'sender_id' => 1,
                            'message' => "ID: $patient_unique_id New patient added",
                            'user_type' => "USER",
                            'type_id' => $patient_unique_id,
                            'care_unit_id' => $this->input->post('care_unit_id'),
                            'patient_id' => $patient_id,
                            'sent_time' => date('Y-m-d H:i:s')
                        )
                    );
                    $this->common_model->customInsert($option);

                    if ($this->input->post('infection_surveillance_checklist') == 'N/A') {

                        $redirect_to = base_url($this->router->fetch_class());
                        $show_redirection_alert = false;

                    } elseif ($this->input->post('infection_surveillance_checklist') == 'Loeb') {

                        $redirect_to = base_url() . 'application/modules/patient/views/form1.html';
                        $show_redirection_alert = true;

                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – UTI') {
                        $redirect_to = base_url() . 'application/modules/patient/views/form2.html';
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – RTI') {
                        $redirect_to = base_url() . 'application/modules/patient/views/form3.html';
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – GITI') {
                        $redirect_to = base_url() . 'application/modules/patient/views/form4.html';
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer –SSTI') {
                        $redirect_to = base_url() . 'application/modules/patient/views/form5.html';
                        $show_redirection_alert = true;
                    }
                    $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
                $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
            } else {
                $response = array('status' => 0, 'message' => "Failed to add");
            }
            //  }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }



    // public function store_data_in_session() {
    //     // Get data from the AJAX request
    //     $data_to_store = $this->input->post('data');

    //     // Store data in session
    //     $this->session->set_userdata('stored_data', $data_to_store);

    //     // Send response (optional)
    //     $response = array('success' => true);
    //     echo json_encode($response);
    // }

    public function addPatient()
    {

        // "<pre>";
        // echo 'patient';
        // print_r($this->input->post());die;
        // "<pre>";
        
    $operator_id = ($this->ion_auth->is_admin()) ? 0 : $this->session->userdata('user_id');

    
    if($this->ion_auth->is_subAdmin()){

        $option = array(
            'table' => ' doctors',
            'select' => 'doctors.*',
            'join' => array(
                array('users', 'doctors.user_id=users.id', 'left'),
            ),
            'where' => array(
                'users.delete_status' => 0,
                'doctors.user_id'=>$operator_id
            ),
            'single' => true,
        );

        $datadoctors = $this->common_model->customGet($option);
      $hospitalAndDoctorId=  $datadoctors->facility_user_id;

    } else if ($this->ion_auth->is_facilityManager()) {
        
        
  $hospitalAndDoctorId = $operator_id;
        
    }
       

    
        $this->form_validation->set_rules('first_name', 'first_name', 'trim');
        $this->form_validation->set_rules('last_name', 'last_name', 'trim');
        // $this->form_validation->set_rules('title', 'title', 'trim');
        $this->form_validation->set_rules('day', 'day', 'trim|required');
        $this->form_validation->set_rules('month', 'month', 'trim|required');
        $this->form_validation->set_rules('year', 'year', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|required');
        $this->form_validation->set_rules('phone_type', 'phone_type', 'trim|required');
        $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');
        $this->form_validation->set_rules('user_email', 'user_email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('address_lookup', 'address_lookup', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim');
        // $this->form_validation->set_rules('post_code', 'post_code', 'trim');
        $this->form_validation->set_rules('country', 'country', 'trim');
       
        // $this->form_validation->set_rules('relation', 'relation', 'trim');
        // $this->form_validation->set_rules('storedDataType', 'Relation Type', 'trim|required');

        // $this->form_validation->set_rules('storedData', 'storedData', 'trim|required');
        // $this->form_validation->set_rules('privacy_policy', 'privacy_policy', 'trim|required');
        // $this->form_validation->set_rules('card_number', 'card_number', 'trim|required');
        // $this->form_validation->set_rules('exp_month_year', 'exp_month_year', 'trim|required');
        // $this->form_validation->set_rules('cvv', 'cvv', 'trim|required');
        // $this->form_validation->set_rules('System_id', 'System_id', 'trim|required');
        

        if ($this->form_validation->run() == true) {
            $operator_id = ($this->ion_auth->is_admin()) ? 0 : $this->session->userdata('user_id');


            $email = strtolower($this->input->post('user_email'));
                $identity = ($identity_column === 'email') ? $email : $this->input->post('user_email');
                $password = $this->input->post('password');
                $username = explode('@', $this->input->post('user_email'));
                $digits = 5;
                $code = strtoupper(substr(preg_replace('/[^A-Za-z0-9\-]/', '', $username[0]), 0, 5)) . rand(pow(10, $digits - 1), pow(10, $digits) - 1);
                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'email,id',
                    'where' => array('email' => $email, 'delete_status' => 1),
                    'single' => true
                );
                $email_exist = $this->common_model->customGet($option);


                if ($LoginID != 1 && $LoginID != NULL) {
                    $x = $LoginID;
                } else if ($LoginID == 1) {
                    $x = NULL;
                }

                if (empty($email_exist)) {

                    if ($this->ion_auth->is_facilityManager()) {

                        $day = $this->input->post('day');
                   $month = $this->input->post('month');
                   $year = $this->input->post('year');
                    $additional_data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'full_name'=>$this->input->post('first_name').' '.$this->input->post('last_name'),
                        //'team_code' => $code,
                        'login_id' => $x,
                        'username' => $code,
                        'date_of_birth' => $year.'-'.$month.'-'.$day,
                        // 'date_of_birth' => (!empty($this->input->post('date_of_birth'))) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : date('Y-m-d'),
                        // 'profile_pic' => $image,
                        'phone' => $this->input->post('phone_number') ? $this->input->post('phone_number') : null,
                        'country_code'=>$this->input->post('country') ? $this->input->post('country') : null,
                        'gender'=>$this->input->post('gender') ? $this->input->post('gender') : null,
                        // 'gender'=>$this->input->post('gender'),
                        'zipcode_access'=>$this->input->post('post_code') ? $this->input->post('post_code') : null,
                        // 'phone_code' => $this->input->post('phone_code'),
                        'care_unit_id' => $this->input->post('care_unit_id') ? $this->input->post('care_unit_id') : null,
                        // 'zipcode_access' => json_encode($this->input->post('zipcode')),
                        'email_verify' => 1,
                        'is_pass_token' => $this->input->post('password'),
                        'hospital_id' =>$hospitalAndDoctorId,
                        'user_id'=>$hospitalAndDoctorId,
                        'created_on' => strtotime(datetime())
                    );

                        // $insert_id = $this->ion_auth->register($identity, $password, $email, $additional_data, array(7));
    
                        // $user_id = $this->session->userdata('user_id');
                        
                    } else if($this->ion_auth->is_all_roleslogin()) {


                    $user_id = $this->session->userdata('user_id');

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

                    // $additional_dataHospital = array(
                    //     'first_name' => $this->input->post('first_name'),
                    //     'last_name' => $this->input->post('last_name'),
                    //     'team_code' => $code,
                    //     'username' => $username[0],
                    //     'date_of_birth' => (!empty($this->input->post('date_of_birth'))) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : date('Y-m-d'),
                    //     'profile_pic' => $image,
                    //     'phone' => $this->input->post('phone_no'),
                    //     'email_verify' => 1,
                    //     'is_pass_token' => $password,
                    //     'hospital_id' =>$authUser->hospital_id,
                    //     'created_on' => strtotime(datetime())
                    // );




                    // print_r($this->input->post());die;
                   $day = $this->input->post('day');
                   $month = $this->input->post('month');
                   $year = $this->input->post('year');
                    $additional_data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'full_name'=>$this->input->post('first_name').' '.$this->input->post('last_name'),
                        //'team_code' => $code,
                        'login_id' => $x,
                        'username' => $code,
                        'date_of_birth' => $year.'-'.$month.'-'.$day,
                        // 'date_of_birth' => (!empty($this->input->post('date_of_birth'))) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : date('Y-m-d'),
                        // 'profile_pic' => $image,
                        'phone' => $this->input->post('phone_number') ? $this->input->post('phone_number') : null,
                        'country_code'=>$this->input->post('country') ? $this->input->post('country') : null,
                        'gender'=>$this->input->post('gender') ? $this->input->post('gender') : null,
                        // 'gender'=>$this->input->post('gender'),
                        'zipcode_access'=>$this->input->post('post_code') ? $this->input->post('post_code') : null,
                        // 'phone_code' => $this->input->post('phone_code'),
                        'care_unit_id' => $this->input->post('care_unit_id') ? $this->input->post('care_unit_id') : null,
                        // 'zipcode_access' => json_encode($this->input->post('zipcode')),
                        'email_verify' => 1,
                        'is_pass_token' => $this->input->post('password'),
                        'hospital_id' =>$authUser->hospital_id,
                        'created_on' => strtotime(datetime())
                    );

                    // $insert_user_id = $this->ion_auth->register($identity, $password, $email, $additional_data, array(7));
                    // $insert_id = $this->db->insert_id();     
                }
            }
            $insert_user_id = $this->ion_auth->register($identity, $password, $email, $additional_data, array(7));
    
            $insert_id = $this->db->insert_id();  

            // if ($this->input->post('patient_mode') == 'New') {
            $option = array(
                'table' => 'care_unit',
                'where' => array(
                    'id' => $this->input->post('care_unit_id') ? $this->input->post('care_unit_id') : null,
                ),
                'single' => true
            );
            $digitscode = 10;
                $p_id = strtoupper(substr(preg_replace('/[^A-Za-z0-9\-]/', '', $username[0]), 0, 10)) . rand(pow(10, $digits - 1), pow(10, $digits) - 1);


            $CareUnit = $this->common_model->customGet($option);
            $patient_unique = strtoupper($CareUnit->care_unit_code) . '' . $p_id;

            $patient_unique_id = strtoupper($CareUnit->care_unit_code) . '' . $this->input->post('patient_id') ? $this->input->post('patient_id') : null;

            $option = array(
                'table' => 'patient',
                'where' => array(
                'patient_id' => $patient_unique_id,
                )
            );
            $IsPatientUniqueID = $this->common_model->customGet($option);
            /* } else {
                $IsPatientUniqueID = array();
                $patient_unique_id = $this->input->post('patient_id');
            } */

            /* if (!empty($IsPatientUniqueID)) {
                $response = array('status' => 0, 'message' => "Patient id already exists");
            } else { */
                
            // $option = array(
            //     'table' => 'patient',
            //     'data' => array(
            //         'name' => ucwords($this->input->post('first_name').' '.$this->input->post('first_name')),
            //         'operator_id' => $operator_id,
            //         'patient_id' => $patient_unique,
                    
            //         'address' => ucwords($this->input->post('address_lookup')),
            //         'additional_comment_option' => $this->input->post('comment'),

            //         'room_number' => (!empty($this->input->post('room_number'))) ? $this->input->post('room_number') : null,
            //         'symptom_onset' => $this->input->post('symptom_onset')? $this->input->post('symptom_onset') : null,
            //         'culture_source' => $this->input->post('culture_source'),
            //         'organism' => $this->input->post('organism'),
            //         'precautions' => $this->input->post('precautions'),
            //         'care_unit_id' => $this->input->post('care_unit_id'),
            //         'doctor_id' => $this->input->post('doctor_id'),
            //         'md_steward_id' => (!empty($this->input->post('md_steward_id'))) ? $this->input->post('md_steward_id') : null,
            //         // 'md_stayward_consult' => $this->input->post('md_stayward_consult'),
            //         'criteria_met' => $this->input->post('criteria_met'),
            //         'md_stayward_response' => (!empty($this->input->post('md_stayward_response'))) ? $this->input->post('md_stayward_response') : null,
            //         'psa' => (!empty($this->input->post('psa'))) ? $this->input->post('psa') : null,
            //         //'pct' => (!empty($this->input->post('pct'))) ? $this->input->post('pct') : null,
            //         'total_days_of_patient_stay' => (!empty($this->input->post('total_days_of_patient_stay'))) ? $this->input->post('total_days_of_patient_stay') : 0,
            //         'infection_surveillance_checklist' => $this->input->post('infection_surveillance_checklist'),
            //         'date_of_start_abx' => date('Y-m-d', strtotime($this->input->post('date_of_start_abx'))),
            //         // 'pct' => (!empty($this->input->post('pct'))) ? $this->input->post('pct') : null,
            //         'user_id' =>$insert_user_id,
            //         'created_date' => date('Y-m-d H:i:s')
                    

            //     )
            // );

            $option = array(
                'table' => 'patient',
                'data' => array(
                    'name' => ucwords($this->input->post('first_name').' '.$this->input->post('last_name')),
                    'operator_id' => $hospitalAndDoctorId,
                    'patient_id' => $patient_unique,
                    
                    'address' => ucwords($this->input->post('address_lookup')) ? $this->input->post('address_lookup') : null,
                    'additional_comment_option' => json_encode($this->input->post('additional_comment_option')) ? json_encode($this->input->post('additional_comment_option')) : null,
                    'comment' => $this->input->post('patient_comment') ? $this->input->post('patient_comment') : null,

                    'room_number' => (!empty($this->input->post('room_number'))) ? $this->input->post('room_number') : null,
                    'symptom_onset' => $this->input->post('symptom_onset') ? $this->input->post('symptom_onset') : null,
                    'culture_source' => $this->input->post('culture_source') ? $this->input->post('culture_source') : null,
                    'organism' => $this->input->post('organism') ? $this->input->post('organism') : null,
                    'precautions' => $this->input->post('precautions') ? $this->input->post('precautions') : null,
                    'care_unit_id' => $this->input->post('care_unit_id') ? $this->input->post('care_unit_id') : null,
                    'doctor_id' => $this->input->post('doctor_id')? $this->input->post('doctor_id') : null,
                    'md_steward_id' => (!empty($this->input->post('md_steward_id'))) ? $this->input->post('md_steward_id') : $hospitalAndDoctorId,
                    // 'md_stayward_consult' => $this->input->post('md_stayward_consult'),
                    'criteria_met' => $this->input->post('criteria_met') ? $this->input->post('criteria_met') : null,
                    'md_stayward_response' => (!empty($this->input->post('md_stayward_response'))) ? $this->input->post('md_stayward_response') : null,
                    'psa' => (!empty($this->input->post('psa'))) ? $this->input->post('psa') : null,
                    //'pct' => (!empty($this->input->post('pct'))) ? $this->input->post('pct') : null,
                    'total_days_of_patient_stay' => (!empty($this->input->post('total_days_of_patient_stay'))) ? $this->input->post('total_days_of_patient_stay') : 0,
                    'infection_surveillance_checklist' => $this->input->post('infection_surveillance_checklist')? $this->input->post('infection_surveillance_checklist') : null,
                    'date_of_start_abx' => date('Y-m-d', strtotime($this->input->post('date_of_start_abx'))) ? $this->input->post('date_of_start_abx') : null,
                    // 'pct' => (!empty($this->input->post('pct'))) ? $this->input->post('pct') : null,
                    'user_id' =>$insert_user_id,
                    'created_date' => date('Y-m-d H:i:s')
                    
                )
            );

            // print_r($option);die;

            $patient_id = $this->common_model->customInsert($option);
        //     $query = $this->db->order_by('created_on', 'desc')->limit(1)->get('vendor_sale_email_host');
        // $result = $query->row();

        $query = $this->db->order_by('created_on', 'desc')->limit(1)->get('vendor_sale_email_host');
        $result = $query->row();


                        // $EmailTemplate = getEmailTemplate("welcome");
                   
                        // $html = array();
                        // $html['logo'] = base_url() . getConfig('site_logo');
                        // $html['site'] = getConfig('site_name');
                        // $html['site_meta_title'] = getConfig('site_meta_title');
                        // $name = $this->input->post('first_name') . " " . $this->input->post('last_name');
                        // $html['user'] = ucwords($name);
                        // $html['email'] = $email;
                        // $html['password'] = $password;
                        // $html['token'] = $random_id;
                        // $html['website'] = base_url();
                        // $html['content'] = $EmailTemplate->description;
                        // $template = $this->load->view('email-template/registration', $html, true);
                        // $title = '[' . getConfig('site_name') . '] ' . $EmailTemplate->title;
                        // $this->sendEmail($email, $from, $subject, $template, $title);



                    // $this->load->library('email');
                    // $fromName="ioready";
                    // $to= $email;
                    // $subject="Patient Registration Login Credentials";
                    // $message= "Patient account login Credentials" . "<p>username: " . $email . "</p><p>Password: " . $password . "</p>";
                    // $from = $result->email;
                    // $this->email->from($from, $fromName);
                    // $this->email->to($to);
            
                    // $this->email->subject($subject);
                    // $this->email->message($message);
            
                    // if($this->email->send())
                    // {
                    //     echo "Mail Sent Successfully";
                    // }
                    // else
                    // {
                    //     echo "Failed to send email";
                    //     show_error($this->email->print_debugger());             
                    //         }

            if ($patient_id) {
                $option = array(
                    'table' => 'patient_consult',
                    'data' => array(
                        'patient_id' => $patient_id,
                        'initial_rx' => $this->input->post('initial_rx') ? $this->input->post('initial_rx') : null,
                        'initial_dx' => $this->input->post('initial_dx') ? $this->input->post('initial_dx') : null,
                        //'culture_source' => $this->input->post('culture_source'),
                        'initial_dot' => $this->input->post('initial_dot') ? $this->input->post('initial_dot') : null,
                        'new_initial_rx' => (!empty($this->input->post('new_initial_rx'))) ? $this->input->post('new_initial_rx') : null,
                        'new_initial_dx' => (!empty($this->input->post('new_initial_dx'))) ? $this->input->post('new_initial_dx') : null,
                        'new_initial_dot' => (!empty($this->input->post('new_initial_dot'))) ? $this->input->post('new_initial_dot') : null,
                        // 'additional_comment_option' => (!empty($this->input->post('additional_comment_option'))) ? json_encode($this->input->post('additional_comment_option')) : null,
                    )
                );

                
                $insert_id = $this->common_model->customInsert($option);

                if(!empty($this->input->post('Occupation'))){

                
                $option2 = array(
                    'table' => 'user_address',
                    'data' => array(
                        'user_id' => $insert_user_id,
                        'company_name' => $this->input->post('Company') ? $this->input->post('Company') : null,
                        'occupation' => $this->input->post('Occupation') ? $this->input->post('Occupation') : null,
                        'religion' => $this->input->post('religion') ? $this->input->post('religion') : null,
                        'ethnicity' => $this->input->post('ethnicity') ? $this->input->post('ethnicity') : null,
                        'address1' => $this->input->post('address_lookup') ? $this->input->post('address_lookup') : null,
                        'address2' => $this->input->post('streem_address') ? $this->input->post('streem_address') : null,
                        'city' => $this->input->post('city') ? $this->input->post('city') : null,
                        'country' => $this->input->post('country') ? $this->input->post('country') : null,
                        'pin_code' => $this->input->post('post_code') ? $this->input->post('post_code') : null,
                        'is_billing' => $this->input->post('initial_rx') ? $this->input->post('initial_rx') : null,
                        'date_of_death' => $this->input->post('death_day') ? $this->input->post('death_day') : null .'/'.($this->input->post('death_month') ? $this->input->post('death_month') : null) .'/'.($this->input->post('death_year') ? $this->input->post('death_year') : null),

                        )
                );
              
                $insert_id1 = $this->common_model->customInsert($option2);
            }
                // print_r($insert_id1);die;

                $option3 = array(
                    'table' => 'patient_communication_relation',
                    'data' => array(
                        'user_id' => $insert_user_id,
                        'relation' => $this->input->post('relation') ? $this->input->post('relation') : null,
                        'relation_number' => $this->input->post('storedData') ? $this->input->post('storedData') : null,
                        'policy_number' => $this->input->post('policy_number') ? $this->input->post('policy_number') : null,
                        'authorisation_code' => $this->input->post('authorisation_code') ? $this->input->post('authorisation_code') : null,
                        'receive_emails' => $this->input->post('receive_emails') ? $this->input->post('receive_emails') : null,
                        'receive_sms_messages' => $this->input->post('receive_sms_messages') ? $this->input->post('receive_sms_messages') : null,
                        'has_consented_to_promotional_marketing' => $this->input->post('has_consented_to_promotional_marketing') ? $this->input->post('has_consented_to_promotional_marketing') : null,
                        'receive_payment_reminders' => $this->input->post('receive_payment_reminders') ? $this->input->post('receive_payment_reminders') : null,
                        'privacy_policy' => $this->input->post('privacy_policy') ? $this->input->post('privacy_policy') : null,
                        'System_id' => $this->input->post('System_id') ? $this->input->post('System_id') : null,
                        

                        )
                );
               
                $insert_id2 = $this->common_model->customInsert($option3);

                $option3 = array(
                    'table' => 'patient_billing_detail',
                    'data' => array(
                        'user_id' => $insert_user_id,
                        'billing_detail' => $this->input->post('billing_detail') ? $this->input->post('billing_detail') : null,
                        'payment_reference' => $this->input->post('payment_reference') ? $this->input->post('payment_reference') : null,
                        'card_number' => $this->input->post('card_number') ? $this->input->post('card_number') : null,
                        'exp_month_year' => $this->input->post('exp_month_year') ? $this->input->post('exp_month_year') : null,
                        'cvv' => $this->input->post('cvv') ? $this->input->post('cvv') : null,
                        
                        

                        )
                );
                $insert_id3 = $this->common_model->customInsert($option3);


                $option = array(
                    'table' => 'notifications',
                    'data' => array(
                        'user_id' => $insert_user_id,
                        'sender_id' => 1,
                        'message' => "ID: $patient_unique_id New patient added",
                        'user_type' => "USER",
                        'type_id' => $patient_unique_id,
                        'care_unit_id' => $this->input->post('care_unit_id') ? $this->input->post('care_unit_id') : null,
                        'patient_id' => $patient_id,
                        'sent_time' => date('Y-m-d H:i:s')
                    )
                );
                $patient_id = $this->common_model->customInsert($option);

                

                if ($patient_id) {
                    $option = array(
                        'table' => 'patient_consult',
                        'data' => array(
                            'patient_id' => $patient_id,
                            'initial_rx' => $this->input->post('initial_rx') ? $this->input->post('initial_rx') : null,
                            'initial_dx' => $this->input->post('initial_dx') ? $this->input->post('initial_dx') : null,
                            //'culture_source' => $this->input->post('culture_source'),
                            'initial_dot' => $this->input->post('initial_dot') ? $this->input->post('initial_dot') : null,
                            'new_initial_rx' => (!empty($this->input->post('new_initial_rx'))) ? $this->input->post('new_initial_rx') : null,
                            'new_initial_dx' => (!empty($this->input->post('new_initial_dx'))) ? $this->input->post('new_initial_dx') : null,
                            'new_initial_dot' => (!empty($this->input->post('new_initial_dot'))) ? $this->input->post('new_initial_dot') : null,
                            // 'new_initial_rx' => (!empty($this->input->post('new_initial_rx'))) ? $this->input->post('new_initial_rx') : $this->input->post('initial_rx'),
                            // 'new_initial_dx' => (!empty($this->input->post('new_initial_dx'))) ? $this->input->post('new_initial_dx') : $this->input->post('initial_dx'),
                            // 'new_initial_dot' => (!empty($this->input->post('new_initial_dot'))) ? $this->input->post('new_initial_dot') : $this->input->post('initial_dot'),
                            'additional_comment_option' => (!empty($this->input->post('additional_comment_option'))) ? json_encode($this->input->post('additional_comment_option')) : null,

                        )
                    );
                    $insert_id = $this->common_model->customInsert($option);



                    $option = array(
                        'table' => 'notifications',
                        'data' => array(
                            'user_id' => $insert_user_id,
                            'sender_id' => 1,
                            'message' => "ID: $patient_unique_id New patient added",
                            'user_type' => "USER",
                            'type_id' => $patient_unique_id,
                            'care_unit_id' => $this->input->post('care_unit_id') ? $this->input->post('care_unit_id') : null,
                            'patient_id' => $patient_id,
                            'sent_time' => date('Y-m-d H:i:s')
                        )
                    );
                    $this->common_model->customInsert($option);

                    if ($this->input->post('infection_surveillance_checklist') == 'N/A') {

                        $redirect_to = base_url($this->router->fetch_class());
                        $show_redirection_alert = false;

                    } elseif ($this->input->post('infection_surveillance_checklist') == 'Loeb') {

                        $redirect_to = base_url() . 'application/modules/patient/views/form1.html';
                        $show_redirection_alert = true;

                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – UTI') {
                        $redirect_to = base_url() . 'application/modules/patient/views/form2.html';
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – RTI') {
                        $redirect_to = base_url() . 'application/modules/patient/views/form3.html';
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – GITI') {
                        $redirect_to = base_url() . 'application/modules/patient/views/form4.html';
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer –SSTI') {
                        $redirect_to = base_url() . 'application/modules/patient/views/form5.html';
                        $show_redirection_alert = true;
                    }
                    $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
                $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
            } else {
                $response = array('status' => 0, 'message' => "Failed to add");
            }
            //  }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }

    /**
     * @method edit
     * @description edit dynamic rows
     * @return array
     */

    public function edit()
    {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/update";

        $option = array('table' => 'countries','select' => '*','where'=>array('shortname'=>'GB'));
        $this->data['countries'] = $this->common_model->customGet($option);

        // $option = array('table' => 'states',
        //             'select' => '*');
        // $this->data['states'] = $this->common_model->customGet($option);
       
     
                $AdminCareUnitID = isset($_SESSION['admin_care_unit_id']) ? $_SESSION['admin_care_unit_id'] : '';

                $option = array('table' => 'care_unit', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc'));
                if (!empty($AdminCareUnitID)) {
                    $option['where']['id']  = $AdminCareUnitID;
                }
                $this->data['care_unit'] = $this->common_model->customGet($option);
        
                $option = array('table' => 'countries','select' => '*','where'=>array('shortname'=>'GB'));
                $this->data['countries'] = $this->common_model->customGet($option);
        
                $option = array('table' => 'states',
                            'select' => '*','where'=>array('country_id'=>'230'));
                        $this->data['states'] = $this->common_model->customGet($option);
        
        $allstatesId = [];
        $allData = [];
        foreach($this->data['states'] as $state_ids){
            $allstatesId['all_state_id'] = $state_ids->id_state;
           $allData = $allstatesId['all_state_id'];

           $option = array('table' => 'cities',
                        'select' => '*','where_in'=>array('state_id'=>$allData));
                $this->data['cities'] = $this->common_model->customGet($option);

                // $this->data['cities']);
        }       
                
        
                $this->data['careUnitss'] = json_decode($AdminCareUnitID);
        
                $careUnitDatas = array();
                foreach ($this->data['careUnitss'] as $value) {
        
                    $option = array(
                        'table' => 'care_unit',
                        'select' => 'care_unit.id,care_unit.name',
                        'where' => array('care_unit.id' => $value)
                    );
                    $careUnitDatas[] = $this->common_model->customGet($option);
                }
                $arraySingle = call_user_func_array('array_merge', $careUnitDatas);
                $this->data['careUnitsUser'] = $arraySingle;
                //print_r($arraySingle);die;
                // print_r($this->data['careUnitsUser']);die;
                $user_id = $this->session->userdata('user_id');
        
                $option3 = array(
                    'table' => 'doctors',
                    'select' => 'doctors.*',
                    'where' => array(
                        'doctors.delete_status' => 0,
                        'doctors.user_id'=> $user_id
                    ),
                    'single'=>true,
                );
        
                $this->hospital = $this->common_model->customGet($option3);
                $this->hospital->facility_user_id;
                $this->data['initial_dx'] = $this->common_model->customGet(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
                $this->data['culture_source'] = $this->common_model->customGet(array('table' => 'culture_source', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
                $this->data['organism'] = $this->common_model->customGet(array('table' => 'organism', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
                $this->data['precautions'] = $this->common_model->customGet(array('table' => 'precautions', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
                $this->data['initial_rx'] = $this->common_model->customGet(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
                // $this->data['doctors'] = $this->common_model->customGet(array('table' => 'doctors', 'select' => 'id,name', 'where' => array('is_active' => 1, 'facility_user_id'=>$this->hospital->facility_user_id, 'delete_status' => 0), 'order' => array('name' => 'asc')));
                
        
        
                
                // $option = array(
        
                //     'table' => 'users',
                //     'select' => 'users.id, CONCAT(first_name," ",last_name) as doctor_name, doctors.facility_user_id', 
                //     'join' => array(
                //         array('doctors', 'doctors.user_id = users.id', 'inner'),
                //     ),
                //     'where' => array(
                //         'users.delete_status' => 0,
                //         'doctors.facility_user_id' => $this->hospital->facility_user_id
                //     ),
                // );
                
        
                // $this->data['doctors'] = $this->common_model->customGet($option);
        
        
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
        
        
                // echo "<pre>";
                // print_r($this->data['staward']);
                // die;
                $option2 = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.*,group.name as group_name,UP.doc_file',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                        array('user_profile UP', 'UP.user_id=user.id', 'inner')
                    ),
                    'order' => array('user.id' => 'ASC'),
                    'where' => array(
                        'user.delete_status' => 0,
                        'group.id' => 6
                    ),
                    'order' => array('user.first_name' => 'ASC')
                );
        
                $this->data['stawardss'] = $this->common_model->customGet($option2);


        
        $id = decoding($_GET['id']);

        // print_r($id);die;
        if (!empty($id)) {

            $option = array(
                'table' => 'patient P',
                'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,U.first_name as patient_first_name,U.last_name as patient_last_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                    . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                    . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                    . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,P.additional_comment_option,P.comment,U.email as patient_email,U.email as password,U.gender,U.*,PCR.*,PBD.*,PNS.*,UAS.*,P.doctor_id as patient_doctor_id',
                'join' => array(
                    array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                    array('doctors DOC', 'DOC.user_id=P.doctor_id', 'left'),
                    array('users U', 'U.id=P.user_id', 'left'),
                    array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                    array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                    array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                    array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                    array('organism Org', 'Org.name=P.organism', 'left'),
                    array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                    array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                    array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left'),
                    array('patient_communication_relation PCR', 'PCR.user_id=U.id', 'left'),
                    array('patient_billing_detail PBD', 'PCR.user_id=U.id', 'left'),
                    array('notifications PNS', 'PNS.user_id=U.id', 'left'),
                    array('user_address UAS', 'UAS.user_id=U.id', 'left'),
                    
                ),
                'single' => true
            );
            $option['where']['P.id'] = $id;
            $results_row = $this->common_model->customGet($option);
            
            if (!empty($results_row)) {

                $results_row->md_steward_response = clone $results_row;

                $filteredData = $this->applyAlgo($results_row);
                // echo"<pre>"; print_r($filteredData); die;
                $this->data['results'] = $filteredData;
                // print_r($this->data['results']);die;
                $this->load->admin_render('edit_patient', $this->data, 'inner_script');
                // $this->load->admin_render('edit', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('patient');
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect('patient');
        }
    }

    public function patientDetails()
    {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/update";
        $id = decoding($_GET['id']);
       
        if (!empty($id)) {

            $option = array(
                'table' => 'patient P',
                'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                    . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                    . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                    . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option,PC.comment,U.email as patient_email,U.email as password,U.date_of_birth',
                'join' => array(
                    array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                    array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                    array('users U', 'U.id=P.md_steward_id', 'left'),
                    array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                    array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                    array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                    array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                    array('organism Org', 'Org.name=P.organism', 'left'),
                    array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                    array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                    array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left')
                ),
                'single' => true
            );
            $option['where']['P.id'] = $id;
            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {

                

                $results_row->md_steward_response = clone $results_row;
                // print_r($results_row);die;

                $filteredData = $this->applyAlgo($results_row);
                // echo"<pre>";
                $this->data['results'] = $filteredData;
                // print_r($this->data['results']); die;
                $this->load->admin_render('patient_details', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('patient');
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect('patient');
        }
    }

    


    public function applyAlgo($results_row)
    {
        $data = $results_row->md_steward_response;
        // echo "<pre>";
        // print_r($data);
        // die;
        if ($data) {
            if ($data->symptom_onset === "Facility") {

                $validinitialDx = [
                    "*UTI-NHSN",
                    "*CAUTI-NHSN",
                    "UTI",
                    "UTI - Catheter",
                    "Pneumonia",
                    "Bronchitis",
                    "URI",
                    "Dental Infection/Abscess",
                    "Wound Infection",
                    "Cellulitis/Soft Tissue Infection",
                    "Leukocytosis",
                    "Fever/Sepsis"
                ];

                $initialDxName = strtolower($data->initial_dx_name);
                $validinitialDxLower = array_map('strtolower', $validinitialDx);
                if (in_array($initialDxName, $validinitialDxLower)) {
                    $validinfection_surveillance = [
                        "Loeb",
                        "McGeer – UTI",
                        "McGeer – RTI",
                        "McGeer – GITI",
                        "McGeer –SSTI",
                    ];

                    $infection_surveillanceName = strtolower($data->infection_surveillance_checklist);
                    $validinfection_surveillanceLower = array_map('strtolower', $validinfection_surveillance);
                    // echo gettype((int)$data->initial_dot); die('kk');
                    if ((int)$data->initial_dot <= 5) {
                        if (in_array($infection_surveillanceName, $validinfection_surveillanceLower)) {
                            $data->agree = (int)false;
                            $data->modify = (int)false;
                            $data->neutral = (int)true;
                            $data->disagree = (int)false;
                        } elseif ($infection_surveillanceName === strtolower("N/A")) {
                            $data->agree = (int)false;
                            $data->modify = (int)false;
                            $data->neutral = (int)true;
                            $data->disagree = (int)false;
                        } else {
                            # code...
                        }
                    } elseif ((int)$data->initial_dot == 6 || (int)$data->initial_dot == 7) {
                        if (in_array($infection_surveillanceName, $validinfection_surveillanceLower)) {
                            if ($data->criteria_met === "Yes") {
                                $data->agree = (int)true;
                                $data->modify = (int)false;
                                $data->neutral = (int)false;
                                $data->disagree = (int)false;
                                $data->new_initial_dot = $data->initial_dot;
                            } else {
                                $data->agree = (int)false;
                                $data->modify = (int)true;
                                $data->neutral = (int)false;
                                $data->disagree = (int)false;
                                $data->new_initial_dot = "5";
                            }
                        } elseif ($infection_surveillanceName === strtolower("N/A")) {
                            $data->agree = (int)true;
                            $data->modify = (int)false;
                            $data->neutral = (int)false;
                            $data->disagree = (int)false;
                            $data->new_initial_dot = $data->initial_dot;
                        } else {
                            # code...
                        }
                    } else {
                        if (in_array($infection_surveillanceName, $validinfection_surveillanceLower)) {
                            if ($data->criteria_met === "Yes") {
                                $data->agree = (int)false;
                                $data->modify = (int)true;
                                $data->neutral = (int)false;
                                $data->disagree = (int)false;
                                $data->new_initial_dot = "7";
                            } else {
                                $data->agree = (int)false;
                                $data->modify = (int)false;
                                $data->neutral = (int)false;
                                $data->disagree = (int)true;
                                $data->new_initial_dot = "5";
                            }
                        } elseif ($infection_surveillanceName === strtolower("N/A")) {
                            $data->agree = (int)false;
                            $data->modify = (int)true;
                            $data->neutral = (int)false;
                            $data->disagree = (int)false;
                            $data->new_initial_dot = "7";
                        } else {
                            # code...
                        }
                    }
                } else {
                }
            } elseif (false) {
                # code...
            } else {
                # code...
            }
        } else {
            # code...
        }
        $results_row->md_steward_response = $data;
        return $results_row;
    }


    /**
     * @method menu_category_edit
     * @description edit dynamic rows
     * @return array
     */
    public function edit_patient()
    {
        $this->data['title'] = "Edit " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/update";
        $id = decoding($this->input->post('id'));
        $AdminCareUnitID = isset($_SESSION['admin_care_unit_id']) ? $_SESSION['admin_care_unit_id'] : '';

        $option = array(
            'table' => 'care_unit',
             'select' => 'id,name',
             'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc'));
        if (!empty($AdminCareUnitID)) {
            $option['where']['id']  = $AdminCareUnitID;
        }
        $this->data['care_unit'] = $this->common_model->customGet($option);

        $this->data['careUnitss'] = json_decode($AdminCareUnitID);

        $careUnitDatas = array();
        foreach ($this->data['careUnitss'] as $value) {

            $option = array(
                'table' => 'care_unit',
                'select' => 'care_unit.id,care_unit.name',
                'where' => array('care_unit.id' => $value)
            );
        $careUnitDatas[] = $this->common_model->customGet($option);
        }
        $arraySingle = call_user_func_array('array_merge', $careUnitDatas);
        $this->data['careUnitsUser'] = $arraySingle;
// print_r($this->data['careUnitsUser']);die;

        $this->data['initial_dx'] = $this->common_model->customGet(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['culture_source'] = $this->common_model->customGet(array('table' => 'culture_source', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['organism'] = $this->common_model->customGet(array('table' => 'organism', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['precautions'] = $this->common_model->customGet(array('table' => 'precautions', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['initial_rx'] = $this->common_model->customGet(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['doctors'] = $this->common_model->customGet(array('table' => 'doctors', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));

        
$CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if($this->ion_auth->is_subAdmin()){

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
            'doctors.facility_user_id'=>$datadoctors->facility_user_id
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
            'doctors.facility_user_id'=>$CareUnitID
        ),
        'order' => array('users.id' => 'desc'),
    );
    $this->data['doctors'] = $this->common_model->customGet($option);
}


    // echo "<pre>";
    // print_r($this->data['staward']);
    // die;
    $option2 = array(
        'table' => USERS . ' as user',
        'select' => 'user.*,group.name as group_name,UP.doc_file',
        'join' => array(
            array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
            array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
            array('user_profile UP', 'UP.user_id=user.id', 'inner')
        ),
        'order' => array('user.id' => 'ASC'),
        'where' => array(
            'user.delete_status' => 0,
            'group.id' => 6
        ),
        'order' => array('user.first_name' => 'ASC')
    );

    $this->data['stawardss'] = $this->common_model->customGet($option2);

        $option = array(
            'table' => 'users U',
            'select' => 'U.id,CONCAT(first_name," ",last_name) name',
            'join' => array('users_groups as UG' => 'UG.user_id=U.id'),
            'where' => array('U.active' => 1, 'U.delete_status' => 0, 'UG.group_id' => 3),
            'order' => array('first_name' => 'asc')
        );
        $this->data['md_steward'] = $this->common_model->customGet($option);
        $option = array(
            'table' => USERS . ' as user',
            'select' => 'user.*,group.name as group_name,UP.doc_file',
            'join' => array(
                array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                array('user_profile UP', 'UP.user_id=user.id', 'left')
            ),
            'order' => array('user.id' => 'ASC'),
            'where' => array(
                'user.delete_status' => 0, 'user.id' => $_SESSION['user_id'],
                'group.id' => 5
            ),
            'order' => array('user.first_name' => 'ASC')
        );

        $this->data['staward'] = $this->common_model->customGet($option);

        $option2 = array(
            'table' => USERS . ' as user',
            'select' => 'user.*,group.name as group_name,UP.doc_file',
            'join' => array(
                array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                array('user_profile UP', 'UP.user_id=user.id', 'left')
            ),
            'order' => array('user.id' => 'ASC'),
            'where' => array(
                'user.delete_status' => 0,
                'group.id' => 3
            ),
            'order' => array('user.first_name' => 'ASC')
        );

        $this->data['stawardsss'] = $this->common_model->customGet($option2);

        if (!empty($id)) {
            $option = array(
                'table' => 'patient P',
                'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id as patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                    . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                    . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                    . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option',
                'join' => array(
                    array('care_unit CI', 'CI.id=P.care_unit_id', 'inner'),
                    array('doctors DOC', 'DOC.id=P.doctor_id', 'inner'),
                    array('users U', 'U.id=P.md_steward_id', 'left'),
                    array('patient_consult PC', 'PC.patient_id=P.id', 'inner'),
                    array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                    array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                    array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                    array('organism Org', 'Org.name=P.organism', 'left'),
                    array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                    array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                    array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left')
                ),
                'single' => true
            );
            $option['where']['P.id'] = $id;
            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {
                $this->data['results'] = $results_row;
               
                $this->load->view('update', $this->data);
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
    public function update()
    {
        $this->form_validation->set_rules('first_name', 'first_name', 'trim');
        $this->form_validation->set_rules('last_name', 'last_name', 'trim');
        // $this->form_validation->set_rules('title', 'title', 'trim');
        $this->form_validation->set_rules('day', 'day', 'trim|required');
        $this->form_validation->set_rules('month', 'month', 'trim|required');
       


        $where_id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) :
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else :

            $patient_id = $this->common_model->customGet(array('table' => 'patient', 'select' => 'id,user_id', 'where' => array('id' => $where_id),
        'single'=>true));


        $day = $this->input->post('day');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

            $userdata = array(
                'table' => 'users',
                'data' => array(
                'first_name' => $this->input->post('first_name') ? $this->input->post('first_name') : null,
                'last_name' => $this->input->post('last_name') ? $this->input->post('last_name') : null,
                //'team_code' => $code,
                'login_id' => $x ? $x : null,
                'username' => $code ? $code : null,
                'date_of_birth' => $year.'-'.$month.'-'.$day,
                // 'date_of_birth' => (!empty($this->input->post('date_of_birth'))) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : date('Y-m-d'),
                // 'profile_pic' => $image,
                'phone' => $this->input->post('phone_number') ? $this->input->post('phone_number') : null,
                'phone_code' => $this->input->post('phone_type') ? $this->input->post('phone_type') : null,
                'care_unit_id' => $this->input->post('care_unit_id') ? $this->input->post('care_unit_id') : null,
                'zipcode_access' => $this->input->post('zipcode') ? $this->input->post('zipcode') : null,
                'email_verify' => 1,
                'is_pass_token' => $this->input->post('password') ? $this->input->post('password') : null,
                'created_on' => strtotime(datetime())),
            'where' => array('id' => $patient_id->user_id)
        );
        $this->common_model->customupdate($userdata);

            $option = array(
                'table' => 'patient',
                'data' => array(
                    'name' => ucwords($this->input->post('first_name')) ? $this->input->post('first_name') : null,
                    'address' => ucwords($this->input->post('address')) ? $this->input->post('address') : null,
                    'room_number' => (!empty($this->input->post('room_number'))) ? $this->input->post('room_number') : null,
                    'symptom_onset' => $this->input->post('symptom_onset') ? $this->input->post('symptom_onset') : null,
                    'culture_source' => $this->input->post('culture_source') ? $this->input->post('culture_source') : null,
                    'organism' => $this->input->post('organism') ? $this->input->post('organism') : null,
                    'precautions' => $this->input->post('precautions') ? $this->input->post('precautions') : null,
                    'care_unit_id' => $this->input->post('care_unit_id') ? $this->input->post('care_unit_id') : null,
                    'doctor_id' => $this->input->post('doctor_id') ? $this->input->post('doctor_id') : null,
                    'md_steward_id' => (!empty($this->input->post('md_steward_id'))) ? $this->input->post('md_steward_id') : null,
                    //'md_stayward_consult' => $this->input->post('md_stayward_consult'),
                    'criteria_met' => $this->input->post('criteria_met') ? $this->input->post('criteria_met') : null,
                    'md_stayward_response' => (!empty($this->input->post('md_stayward_response'))) ? $this->input->post('md_stayward_response') : null,
                    'psa' => (!empty($this->input->post('psa'))) ? $this->input->post('psa') : null,
                    'infection_surveillance_checklist' => $this->input->post('infection_surveillance_checklist') ? $this->input->post('infection_surveillance_checklist') : null,
                    'total_days_of_patient_stay' => (!empty($this->input->post('total_days_of_patient_stay'))) ? $this->input->post('total_days_of_patient_stay') : 0,
                    'date_of_start_abx' => date('Y-m-d', strtotime($this->input->post('date_of_start_abx'))) ? $this->input->post('date_of_start_abx') : null,
                    //'pct' => (!empty($this->input->post('pct'))) ? $this->input->post('pct') : null,
                    'updated_date' => date('Y-m-d H:i:s')
                ),
                'where' => array('id' => $where_id)
            );
            $this->common_model->customupdate($option);
            $option = array(
                'table' => 'patient_consult',
                'data' => array(
                    'initial_dx' => (!empty($this->input->post('initial_dx'))) ? $this->input->post('initial_dx') : null,
                    // 'culture_source' => (!empty($this->input->post('culture_source'))) ? $this->input->post('culture_source') : null,
                    'initial_rx' => (!empty($this->input->post('initial_rx'))) ? $this->input->post('initial_rx') : null,
                    'initial_dot' => (!empty($this->input->post('initial_dot'))) ? $this->input->post('initial_dot') : null,
                    'new_initial_rx' => (!empty($this->input->post('new_initial_rx'))) ? $this->input->post('new_initial_rx') : null,
                    'new_initial_dx' => (!empty($this->input->post('new_initial_dx'))) ? $this->input->post('new_initial_dx') : null,
                    'new_initial_dot' => (!empty($this->input->post('new_initial_dot'))) ? $this->input->post('new_initial_dot') :null,
                    'additional_comment_option' => (!empty($this->input->post('additional_comment_option'))) ? json_encode($this->input->post('additional_comment_option')) : null
                ),
                'where' => array('patient_id' => $where_id)
            );
            $Update = $this->common_model->customupdate($option);
            if ($this->input->post('infection_surveillance_checklist') == 'N/A') {
                $redirect_to = base_url($this->router->fetch_class());
                $show_redirection_alert = false;
            } elseif ($this->input->post('infection_surveillance_checklist') == 'Loeb') {
                $redirect_to = base_url() . 'application/modules/patient/views/form1.html';
                $show_redirection_alert = true;
            } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – UTI') {
                $redirect_to = base_url() . 'application/modules/patient/views/form2.html';
                $show_redirection_alert = true;
            } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – RTI') {
                $redirect_to = base_url() . 'application/modules/patient/views/form3.html';
                $show_redirection_alert = true;
            } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – GITI') {
                $redirect_to = base_url() . 'application/modules/patient/views/form4.html';
                $show_redirection_alert = true;
            } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer –SSTI') {
                $redirect_to = base_url() . 'application/modules/patient/views/form5.html';
                $show_redirection_alert = true;
            }
            $response = array('status' => 1, 'message' => 'updated Successfully', 'show_redirection_alert' => $show_redirection_alert, 'url' => $redirect_to, 'id' => encoding($this->input->post('id')));
        endif;

        echo json_encode($response);
    }

    function delete_patient()
    {

        $option = array(
            'table' => 'patient',
            'where' => array('id' => $this->input->post('patient_id'))
        );
        $this->common_model->customDelete($option);
        $option = array(
            'table' => 'patient_consult',
            'where' => array('patient_id' => $this->input->post('patient_id'))
        );
        $this->common_model->customDelete($option);
        $option = array(
            'table' => 'notifications',
            'where' => array(
                'patient_id' => $this->input->post('patient_id')
            )
        );
        $this->common_model->customDelete($option);

        $response = array('status' => 200, 'message' => 'Deleted Successfully', 'url' => base_url($this->router->fetch_class()));
        echo json_encode($response);
    }


    function send_mail_smtp($template)
    {

        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.ionos.com'; //'smtp.mailtrap.io';//ssl://smtp.gmail.com
        $config['smtp_port'] = '465'; //2525';//465
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = "dnr@idcaresteward.com"; //"cd3f624d7cd7a0";//'pawan.mobiwebtech@gmail.com';
        $config['smtp_pass'] = "!0c@R3%7ew@R0"; //"5e1dbcb52e12d4";//'********';
        $config['charset'] = 'iso-8859-1';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;
        $config['wordwrap'] = TRUE;
        $from = 'dnr@idcaresteward.com';
        $title = "IDCARE";
        $subject = "Changes in MD Steward Recommandation";
        // $to = array('dpdev@visvero.net', 'vajay8679@gmail.com');
        $to = ['dpdev@visvero.net'];

        /* $this->db->select('email');
        $list = $this->db->get('vendor_sale_doctors')->result_array(); */
        $doctor_id = $_POST['doctor_id'];
        $option = array(
            'table' => 'doctors',
            'where' => array('id' => $doctor_id)
        );
        $p_mail =  $this->common_model->customGet($option);
        // print_r($x[0]['email']);
        //print_r($x[0]->email);
        $providers_mail = $p_mail[0]->email;

        $md_steward_id = $_POST['md_steward_id'];
        $option = array(
            'table' => 'users',
            'where' => array('id' => $md_steward_id)
        );
        $m_mail =  $this->common_model->customGet($option);
        $md_steward_mail = $m_mail[0]->email;
        array_push($to, $providers_mail, $md_steward_mail);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($from, $title);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($template);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    function email_smtp()
    {
        // print_r("helllllllllllll");die;
        $md_stayward_response = $_POST['md_stayward_response']; //"md_stayward_response";
        $psa = $_POST['psa'];
        $new_initial_dx = $_POST['new_initial_dx'];
        $new_initial_rx = $_POST['new_initial_rx'];
        $new_initial_dot = $_POST['new_initial_dot'];
        // $pct = $_POST['pct'];
        $patient_id = $_POST['patient_id'];
        // $doctor_id = $_POST['doctor_id'];
        $template1 = "
        Patient ID: $patient_id<br>
        MD Steward Response: $md_stayward_response<br> 
        PSA(Provider Steward Agreement): $psa<br>
        New Diagnosis: $new_initial_dx<br>
        New Antibiotic Name: $new_initial_rx<br>
        New Days of Therapy: $new_initial_dot <br>";


        $template = $this->send_mail_smtp($template1);

        return $template;
    }

    /*     function get_patient_id()
    {
        $option = array(
            'table' => 'patient',
            'select' => 'patient_id',
            'where' => array('care_unit_id' => $this->input->post('careunit_id')),
            'order' => array('patient_id' => 'ASC')
        );
        $result = $this->common_model->customGet($option);
        $html = ' <select id="patient_id" name="patient_id" class="form-control select-chosen" size="1">';
        foreach ($result as $row) {
            $html .= '<option value="' . $row->patient_id . '">' . $row->patient_id . '</option>';
        }

        $html .= '</select>';
        echo $html;
    } */



    function send_mail_smtp1($template2, $to_email)
    {


        // $this->load->library('email');

        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'ssl://smtp.ionos.com';
        // $config['smtp_port'] = '465'; //2525';//465
        // $config['smtp_timeout'] = '7';
        // $config['smtp_user'] = "dnr@idcaresteward.com"; //"cd3f624d7cd7a0";//'pawan.mobiwebtech@gmail.com';
        // $config['smtp_pass'] = "!0c@R3%7ew@R0"; //"5e1dbcb52e12d4";//'********';
        // $config['charset'] = 'iso-8859-1';
        // $config['newline'] = "\r\n";
        // $config['mailtype'] = 'html';
        // $config['validation'] = TRUE;
        // $config['wordwrap'] = TRUE;
        // $from = 'dnr@idcaresteward.com';
        // $title = "IDCARE";
        // $subject = "IDCARE-Patient Details";
        
        // $to = explode(',', $to_email);


        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");
        // $this->email->from($from, $title);
        // $this->email->to($to);
        // $this->email->subject($subject);
        // $this->email->message($template2);

        // if ($this->email->send()) {

        //     return true;
        // }

        $emailConfig = array(
            //  'protocol' => 'smtp',
            //   'smtp_host' => 'ssl://smtp.gmail.com',
            //   'smtp_port' => '465',
            //   'smtp_user' => 'chandalekhyani@gmail.com',
            //   'smtp_pass' => 'jethalaldaya',
            //   'mailtype'  => 'html',
            //   'charset'   => 'iso-8859-1'
    
            // 'protocol' => 'smtp',
            //     'smtp_host' => 'ssl://smtp.gmail.com',
            //     'smtp_port' => 587,
            //     'smtp_user' => 'tech.sunilvishwakarma@gmail.com',
            //     'smtp_pass' => 'zmwiylikyaocxenp',
            //     'mailtype' => 'html',
            // 'smtp_timeout' => '4',
            //     'charset' => 'iso-8859-1'
    
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'kalpanaofficial94@gmail.com',
            'smtp_pass' => 'avbcfhvzvypfftgz',
            'smtp_timeout' => '4',
            'charset' => 'iso-8859-1',
            'mailtype'=>'html'
    
            
    
            // 'protocol' => 'smtp',
            //     'smtp_host' => 'http://mail.ioready.io:2080',
            //     'smtp_port' => 2080,
            //     'smtp_user' => 'aditya_urmaliya@ioready.io',
            //     'smtp_pass' => 'S^VpL2$aOC_,',
            //     'mailtype' => 'html',
            //     'charset' => 'iso-8859-1'
          );
           
    
          // Set your email information
          $from = array('email' => $from, 'name' => $title);
          $to = array($email);
          $subject = 'New Registration: '.$this->input->post('name').'-'.$this->input->post('mobile1');
           
          $message = 'Details are: <br />'.$this->input->post('name').'<br />'.$this->input->post('fname').'<br />'.$this->input->post('mobile1').'<br />'.$this->input->post('mobile2').'<br />'.$this->input->post('email').'<br />'.$this->input->post('locality').'<br />';
          $this->load->library('email', $emailConfig);
          $this->email->set_newline("\r\n");
          $this->email->from($from['email'], $from['name']);
          $this->email->to($to);
          $this->email->subject($subject);
          $this->email->message($template);
          if (!$this->email->send()) {
              // Raise error message
              show_error($this->email->print_debugger());
          }
          else {
              // Show success notification or other things here
              echo 'Success to send email';
          }
    
    
  


    }

    function email_smtp1()
    {

        $email = $_POST['to_email'];
        $patient_id = $_POST['patient_id'];
        $room_number = $_POST['room_number'];
        $care_unit_name = ucwords($_POST['care_unit_name']);
        $doctor_name = ucwords($_POST['doctor_name']);
        if ($_POST['symptom_onset'] == 'Facility') {
            $symptom_onset = 'Facility/HAI';
        } else if ($_POST['symptom_onset'] == 'Hospital') {
            $symptom_onset = 'Hospital/CAI';
        } else {
            $symptom_onset = '';
        }
        $culture_source_name = $_POST['culture_source_name'];
        $organism_name = $_POST['organism_name'];
        $precautions_name = $_POST['precautions_name'];
        $md_steward = ucwords($_POST['md_steward']);
        $date_of_start_abx = date('m/d/Y', strtotime($_POST['date_of_start_abx']));
        $initial_rx_name = $_POST['initial_rx_name'];
        $initial_dx_name = $_POST['initial_dx_name'];
        $initial_dot = $_POST['initial_dot'];
        $infection_surveillance_checklist = $_POST['infection_surveillance_checklist'];
        $criteria_met = $_POST['criteria_met'];
        $md_stayward_response = $_POST['md_stayward_response'];
        $new_initial_rx_name = $_POST['new_initial_rx_name'];
        $psa = $_POST['psa'];
        $new_initial_dx_name = $_POST['new_initial_dx_name'];
        $new_initial_dot = $_POST['new_initial_dot'];
        $additional_comment_option = str_replace(array('[', '"', ']'), '', $_POST['additional_comment_option']);



        $template = '<h3 align="left"><strong>Patient</strong> Info</h3>
       <table border="1" width="50%" cellpadding="5">
        <tr>
         <td width="30%">Patient ID</td>
         <td width="70%">' . $patient_id . '</td>
        </tr>
        <tr>
         <td width="30%">Room Number</td>
         <td width="70%">' . $room_number . '</td>
        </tr>
        <tr>
         <td width="30%">Care Unit</td>
         <td width="70%">' . $care_unit_name . '</td>
        </tr>
        <tr>
         <td width="30%">Provider MD</td>
         <td width="70%">' . $doctor_name . '</td>
        </tr>
        <tr>
         <td width="30%">Infection Onset</td>
         <td width="70%">' . $symptom_onset . '</td>
        </tr>
        <tr>
         <td width="30%">MD Steward</td>
         <td width="70%">' . $md_steward . '</td>
        </tr>
        <tr>
         <td width="30%">Date of start abx</td>
         <td width="70%">' . $date_of_start_abx . '</td>
         </tr>
       </table>
       </br>
    
       <h3 align="left"><strong>Initial</strong> Info</h3>
       <table border="1" width="50%" cellpadding="5">
        <tr>
         <td width="30%">Antibiotic Name</td>
         <td width="70%">' . $initial_rx_name . '</td>
        </tr>
        <tr>
         <td width="30%">Diagnosis</td>
         <td width="70%">' . $initial_dx_name . '</td>
        </tr>
        <tr>
         <td width="30%">Days of Therapy</td>
         <td width="70%">' . $initial_dot . '</td>
        </tr>
        <tr>
         <td width="30%">ABX Checklist</td>
         <td width="70%">' . $infection_surveillance_checklist . '</td>
        </tr>
        <tr>
         <td width="30%">Criteria Met</td>
         <td width="70%">' . $criteria_met . '</td>
        </tr>
        <tr>
         <td width="30%">Culture Source</td>
         <td width="70%">' . $culture_source_name . '</td>
        </tr>
        <tr>
         <td width="30%">Organism</td>
         <td width="70%">' . $organism_name . '</td>
        </tr>
        <tr>
        <td width="30%">Precautions</td>
        <td width="70%">' . $precautions_name . '</td>
       </tr>
       </table>
       </br>
    
       <h3 align="left"><strong>MD Steward</strong> Recommendation</h3>
       <table border="1" width="50%" cellpadding="5">
        <tr>
         <td width="30%">MD Steward Response</td>
         <td width="70%">' . $md_stayward_response . '</td>
        </tr>
        <tr>
         <td width="30%">NEW Antibiotic Name</td>
         <td width="70%">' . $new_initial_rx_name . '</td>
        </tr>
        <tr>
         <td width="30%">PSA(Provider Steward Agreement)</td>
         <td width="70%">' . $psa . '</td>
        </tr>
        <tr>
         <td width="30%">New Diagnosis</td>
         <td width="70%">' . $new_initial_dx_name . '</td>
        </tr>
        <tr>
         <td width="30%">New Days of Therapy</td>
         <td width="70%">' . $new_initial_dot . '</td>
        </tr>
        <tr>
         <td width="30%">Additional Comment</td>
         <td width="70%">' . $additional_comment_option . '</td>
        </tr>
       </table>';
        $title ="patient details";
       
        $user_id = $this->session->userdata('user_id');
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
        $from = $authUser->email;
        $name = $this->input->post('first_name');
        // $email = $email;

        $mobile = '78965412365';
        $subject = 'Hello hospital';

        // $template2 = $this->send_mail_smtp1($template3, $to_email);

        $template2 = $this->sendEmail($email, $from, $subject, $template, $title);

        return $template2;
    }

    function open_consult() {

        $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrlConsult'] = $this->router->fetch_class() . "/addConsult";
        $this->data['formUrlModel'] = $this->router->fetch_class() . "/addQuestion";

        $this->data['patient_id'] = decoding($_GET['id']);
        $id = decoding($_GET['id']);
        // print_r($id);die;
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
                    // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
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
                    //'doctors.facility_user_id'=>$CareUnitID
                    'users.hospital_id'=>$hospital_id
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);
        }

        // print_r($this->data['doctors']);die;

        $this->load->admin_render('patient_consultation', $this->data, 'inner_script');
    }


    
    public function addConsult() {

        // echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";


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


        $this->form_validation->set_rules('patient_id', "patient_id", 'required|trim');
        if ($this->form_validation->run() == true) {


            $diagramurl=  json_encode($this->input->post('question'));
    //    print_r($diagramurl);die;
        $options_data = array(
            'patient_id' => decoding($this->input->post('patient_id')) ?? NULL,
            'facility_user_id' => $LoginID ?? NULL,
            'consultation_type' => $this->input->post('consultationType') ?? NULL,
            'consultation_date' => $this->input->post('consultation_date') ?? NULL,
            'type' => $this->input->post('diagram_type')
    ?: $this->input->post('presenting_type')
    ?: $this->input->post('product_type')
    ?: $this->input->post('medication_type')
    ?: $this->input->post('social_type')
    ?: $this->input->post('family_type')
    ?: $this->input->post('medical_type')
    ?: $this->input->post('allergy_type')
    ?: $this->input->post('examination_type')
    ?: $this->input->post('problem_type')
    ?: $this->input->post('comments_type'),

            // 'type' => $this->input->post('diagram_type') ?? $this->input->post('presenting_type') ?? $this->input->post('product_type') ?? $this->input->post('medication_type') ?? $this->input->post('social_type') ?? $this->input->post('family_type') ?? $this->input->post('medical_type') ?? $this->input->post('allergy_type') ?? $this->input->post('examination_type') ?? $this->input->post('problem_type') ?? $this->input->post('comments_type'),
            'presenting_type' => $this->input->post('presenting_type') ?? NULL,
            'product_type' => $this->input->post('product_type') ?? NULL,
            'medication_type' => $this->input->post('medication_type') ?? NULL,
            'social_type' => $this->input->post('social_type') ?? NULL,
            'family_type' => $this->input->post('family_type') ?? NULL,
            'medical_type' => $this->input->post('medical_type') ?? NULL,
            'allergy_type' => $this->input->post('allergy_type') ?? NULL,
            'examination_type' => $this->input->post('examination_type') ?? NULL,
            'problem_type' => $this->input->post('problem_type') ?? NULL,
            'comments_type' => $this->input->post('comments_type') ?? NULL,
            'diagram_type' => $this->input->post('diagram_type') ?? NULL,

            'presenting_complaint' => $this->input->post('presenting_complaint') ?? NULL,
            'search' => $this->input->post('product_search') ?? NULL,  
            'since' => $this->input->post('product_since') ?? NULL,                
            'condition_type' => $this->input->post('product_condition_type') ?? NULL,                
            'condition_significance' => $this->input->post('product_condition_significance') ?? NULL,                
            'comment' => $this->input->post('product_comment') ?? NULL,                
            'value' => $this->input->post('examination_value') ?? NULL,                
            'severity' => $this->input->post('allergy_severity') ?? NULL,                
            'relationship' => $this->input->post('relationship') ?? NULL,                
            'showSummary' => $this->input->post('showSummary') ?? NULL,                
            'diagram_url' => json_encode($this->input->post('question')) ?? NULL,
        );
        $option = array('table' => 'vendor_sale_patient_consultation', 'data' => $options_data);
        
        // Insert data into the table
        $insert_id =$this->common_model->customInsert($option);

        // print_r($insert_id);die;           
            if($this->input->post('product_type')=='product'){

            
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('product_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('product_search'),  
                'since' => $this->input->post('product_since'),                
                'condition_type' => $this->input->post('product_condition_type'),                
                'condition_significance' => $this->input->post('product_condition_significance'),                
                'comment' => $this->input->post('product_comment'),                              
                'showSummary' => $this->input->post('productSummary'),                
            );
            $option = array('table' => 'vendor_sale_consultation_product', 'data' => $options_data);
            $this->common_model->customInsert($option);

        }
         if($this->input->post('medication_type')=='medication'){
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('medication_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('medication_search'),  
                'since' => $this->input->post('medication_since'),                
                'condition_type' => $this->input->post('medication_condition_type'),                
                'condition_significance' => $this->input->post('medication_condition_significance'),                
                'comment' => $this->input->post('medication_comment'),                               
                'showSummary' => $this->input->post('medicationSummary'),                
            );
            $option = array('table' => 'vendor_sale_consultation_medication', 'data' => $options_data);
            $this->common_model->customInsert($option);
        }
        
        if($this->input->post('social_type')=='social'){
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('social_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('social_search'),  
                'since' => $this->input->post('social_since'),                
                'condition_type' => $this->input->post('social_condition_type'),                
                'condition_significance' => $this->input->post('social_condition_significance'),                
                'comment' => $this->input->post('social_comment'),                             
                'showSummary' => $this->input->post('showSummary'),                
            );
            $option = array('table' => 'vendor_sale_consultation_social', 'data' => $options_data);
            $this->common_model->customInsert($option);
        }
         if($this->input->post('family_type')=='family_history'){
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('family_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('family_history_search'),                 
                'comment' => $this->input->post('family_history_comment'),                               
                'relationship' => $this->input->post('relationship'),                
                'showSummary' => $this->input->post('familyHistorySummary'),                
            );
            $option = array('table' => 'vendor_sale_consultation_family_history', 'data' => $options_data);
            $this->common_model->customInsert($option);
        }
         if($this->input->post('medical_type')=='medical_history'){
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('medical_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('medical_history_search'),  
                'since' => $this->input->post('medical_history_since'),                
                'condition_type' => $this->input->post('medical_history_condition_type'),                
                'condition_significance' => $this->input->post('medical_history_condition_significance'),                
                'comment' => $this->input->post('medical_history_comment'),                           
                'showSummary' => $this->input->post('medicalHistorySummary'),                
            );
            $option = array('table' => 'vendor_sale_consultation_medical_history', 'data' => $options_data);
            $this->common_model->customInsert($option);
        }
         if($this->input->post('allergy_type')=='allergy'){
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('allergy_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('allergy_search'),           
                'comment' => $this->input->post('allergy_comment'),                               
                'severity' => $this->input->post('allergy_severity'),                               
                'showSummary' => $this->input->post('allergySummary'),                
            );
            $option = array('table' => 'vendor_sale_consultation_allergy', 'data' => $options_data);
            $this->common_model->customInsert($option);
        }
         if($this->input->post('examination_type')=='examination'){
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('examination_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('examination_search'),             
                'comment' => $this->input->post('examination_comment'),                
                'value' => $this->input->post('examination_value'),                
                            
            );
            $option = array('table' => 'vendor_sale_consultation_examination', 'data' => $options_data);
            $this->common_model->customInsert($option);
        }
         if($this->input->post('problem_type')=='problem_heading'){
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('problem_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('problem_search'),  
                'since' => $this->input->post('problem_since'),                
                'condition_type' => $this->input->post('problem_condition_type'),                
                'condition_significance' => $this->input->post('problem_condition_significance'),                
                'comment' => $this->input->post('problem_comment'),                             
                'showSummary' => $this->input->post('showSummary'),                
            );
            $option = array('table' => 'vendor_sale_consultation_problem_heading', 'data' => $options_data);
            $this->common_model->customInsert($option);

        }
        //  if($this->input->post('presenting_type')=='presenting_complaint'){
        //     $options_data = array(
        //         'patient_id'=> decoding($this->input->post('patient_id')),
        //         'facility_user_id'=> $LoginID,
        //         'type' => $this->input->post('presenting_type'),
        //         'search' => $this->input->post('search'),  
        //         'since' => $this->input->post('since'),                
        //         'condition_type' => $this->input->post('condition_type'),                
        //         'condition_significance' => $this->input->post('condition_significance'),                
        //         'comment' => $this->input->post('comment'),                               
        //         'showSummary' => $this->input->post('showSummary'),                
        //     );
        //     $option = array('table' => 'vendor_sale_consultation_presenting_complaint', 'data' => $options_data);
        //     $this->common_model->customInsert($option);

        // }
         if($this->input->post('diagram_type')=='diagram'){
            $options_data = array(
                'patient_id'=> decoding($this->input->post('patient_id')),
                'facility_user_id'=> $LoginID,
                'type' => $this->input->post('diagram_type'),
                'consultation_id'=>$insert_id,
                'search' => $this->input->post('search'),  
                'since' => $this->input->post('since'),                
                'condition_type' => $this->input->post('condition_type'),                
                'condition_significance' => $this->input->post('condition_significance'),                
                'comment' => $this->input->post('comment'),                             
                'showSummary' => $this->input->post('showSummary'),                
            );
            $option = array('table' => 'vendor_sale_consultation_medication', 'data' => $options_data);
            $this->common_model->customInsert($option);
        
        }
        //  if($this->input->post('comments_type')=='comment'){
        //     $options_data = array(
        //         'patient_id'=> decoding($this->input->post('patient_id')),
        //         'facility_user_id'=> $LoginID,
        //         'type' => $this->input->post('comments_type'),
        //         'search' => $this->input->post('search'),  
        //         'since' => $this->input->post('since'),                
        //         'condition_type' => $this->input->post('condition_type'),                
        //         'condition_significance' => $this->input->post('condition_significance'),                
        //         'comment' => $this->input->post('comment'),                                
        //         'showSummary' => $this->input->post('showSummary'),                
        //     );
        //     $option = array('table' => 'vendor_sale_consultation_comment', 'data' => $options_data);
        //     $this->common_model->customInsert($option);
        // }
       

        
                // $options_data = array(
                //     'patient_id'=> decoding($this->input->post('patient_id')),
                //     'facility_user_id'=> $LoginID,
                //     'consultation_type' => $this->input->post('consultationType'),
                //     'consultation_date' => $this->input->post('consultation_date'),
                //     'type' => $this->input->post('diagram_type'),
                //     'presenting_complaint' => $this->input->post('presenting_complaint'),
                //     'search' => $this->input->post('search'),  
                //     'since' => $this->input->post('since'),                
                //     'condition_type' => $this->input->post('condition_type'),                
                //     'condition_significance' => $this->input->post('condition_significance'),                
                //     'comment' => $this->input->post('comment'),                
                //     'value' => $this->input->post('value'),                
                //     'severity' => $this->input->post('severity'),                
                //     'relationship' => $this->input->post('relationship'),                
                //     'showSummary' => $this->input->post('showSummary'),                
                //     'diagram_url' => $this->input->post('question'),                
                // );
                // $option = array('table' => 'vendor_sale_patient_consultation', 'data' => $options_data);
                
                // if ($this->common_model->customInsert($option)) {
                    
                    // $this->common_model->customInsert($option);

                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                // } else {
                //     $response = array('status' => 0, 'message' => "Failed to add");
                // }
            // }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }


    public function updateConsultation()
    {

    //    echo "<pre>";
    //     print_r($this->input->post());die;
    //     echo "</pre>";

        $where_id = $this->input->post('consultationId');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->form_validation->set_rules('consultationId', "consultationId", 'required|trim');
    //     if ($this->form_validation->run() == true) {
           

    //         $option = array(
    //             'table' => 'vendor_sale_patient_consultation',
    //             'data' => array(
    //             'consultation_type' => $this->input->post('consultationType'),
    //             'consultation_date' => $this->input->post('consultation_date'),
    //             'type' => $this->input->post('type'),
    //             'presenting_complaint' => $this->input->post('presenting_complaint'),
    //             'search' => $this->input->post('search'),  
    //             'since' => $this->input->post('since'),                
    //             'condition_type' => $this->input->post('condition_type'),                
    //             'condition_significance' => $this->input->post('condition_significance'),                
    //             'comment' => $this->input->post('comment'),                
    //             'value' => $this->input->post('value'),                
    //             'severity' => $this->input->post('severity'),                
    //             'relationship' => $this->input->post('relationship'),                
    //             'showSummary' => $this->input->post('showSummary'),
    //         ),      
    //         'where' => array('id' => $where_id)          
    //         );

    //         // $Update = $this->common_model->customupdate($option);
           
    //         if ($this->common_model->customupdate($option)) {
                    
                   

    //             $response = array('status' => 1, 'message' => "Successfully Updated", 'url' => base_url($this->router->fetch_class()));
    //         } else {
    //             $response = array('status' => 0, 'message' => "Failed to Updated");
    //         }
    //     // }
    // } else {
    //     $messages = (validation_errors()) ? validation_errors() : '';
    //     $response = array('status' => 0, 'message' => $messages);
    // }

    if ($this->form_validation->run() == true) {


        $diagramurl=  json_encode($this->input->post('question'));
//    print_r($diagramurl);die;
    $options_data = array(
        'patient_id' => decoding($this->input->post('patient_id')) ?? NULL,
        'facility_user_id' => $LoginID ?? NULL,
        'consultation_type' => $this->input->post('consultationType') ?? NULL,
        'consultation_date' => $this->input->post('consultation_date') ?? NULL,
        'type' => $this->input->post('diagram_type')
?: $this->input->post('presenting_type')
?: $this->input->post('product_type')
?: $this->input->post('medication_type')
?: $this->input->post('social_type')
?: $this->input->post('family_type')
?: $this->input->post('medical_type')
?: $this->input->post('allergy_type')
?: $this->input->post('examination_type')
?: $this->input->post('problem_type')
?: $this->input->post('comments_type'),

        // 'type' => $this->input->post('diagram_type') ?? $this->input->post('presenting_type') ?? $this->input->post('product_type') ?? $this->input->post('medication_type') ?? $this->input->post('social_type') ?? $this->input->post('family_type') ?? $this->input->post('medical_type') ?? $this->input->post('allergy_type') ?? $this->input->post('examination_type') ?? $this->input->post('problem_type') ?? $this->input->post('comments_type'),
        'presenting_type' => $this->input->post('presenting_type') ?? NULL,
        'product_type' => $this->input->post('product_type') ?? NULL,
        'medication_type' => $this->input->post('medication_type') ?? NULL,
        'social_type' => $this->input->post('social_type') ?? NULL,
        'family_type' => $this->input->post('family_type') ?? NULL,
        'medical_type' => $this->input->post('medical_type') ?? NULL,
        'allergy_type' => $this->input->post('allergy_type') ?? NULL,
        'examination_type' => $this->input->post('examination_type') ?? NULL,
        'problem_type' => $this->input->post('problem_type') ?? NULL,
        'comments_type' => $this->input->post('comments_type') ?? NULL,
        'diagram_type' => $this->input->post('diagram_type') ?? NULL,

        'presenting_complaint' => $this->input->post('presenting_complaint') ?? NULL,
        'search' => $this->input->post('product_search') ?? NULL,  
        'since' => $this->input->post('product_since') ?? NULL,                
        'condition_type' => $this->input->post('product_condition_type') ?? NULL,                
        'condition_significance' => $this->input->post('product_condition_significance') ?? NULL,                
        'comment' => $this->input->post('product_comment') ?? NULL,                
        'value' => $this->input->post('examination_value') ?? NULL,                
        'severity' => $this->input->post('allergy_severity') ?? NULL,                
        'relationship' => $this->input->post('relationship') ?? NULL,                
        'showSummary' => $this->input->post('showSummary') ?? NULL,                
        'diagram_url' => json_encode($this->input->post('question')) ?? NULL,
    );
    $option = array('table' => 'vendor_sale_patient_consultation', 'data' => $options_data, 'where' => array('id' => $where_id));
    
    // Insert data into the table
    $insert_id =$this->common_model->customupdate($option);

    // print_r($insert_id);die;           
        if($this->input->post('product_type')=='product'){

        
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('product_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('product_search'),  
            'since' => $this->input->post('product_since'),                
            'condition_type' => $this->input->post('product_condition_type'),                
            'condition_significance' => $this->input->post('product_condition_significance'),                
            'comment' => $this->input->post('product_comment'),                              
            'showSummary' => $this->input->post('productSummary'),                
        );
        $option = array('table' => 'vendor_sale_consultation_product', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);

    }
     if($this->input->post('medication_type')=='medication'){
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('medication_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('medication_search'),  
            'since' => $this->input->post('medication_since'),                
            'condition_type' => $this->input->post('medication_condition_type'),                
            'condition_significance' => $this->input->post('medication_condition_significance'),                
            'comment' => $this->input->post('medication_comment'),                               
            'showSummary' => $this->input->post('medicationSummary'),                
        );
        $option = array('table' => 'vendor_sale_consultation_medication', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);
    }
    
    if($this->input->post('social_type')=='social'){
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('social_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('social_search'),  
            'since' => $this->input->post('social_since'),                
            'condition_type' => $this->input->post('social_condition_type'),                
            'condition_significance' => $this->input->post('social_condition_significance'),                
            'comment' => $this->input->post('social_comment'),                             
            'showSummary' => $this->input->post('showSummary'),                
        );
        $option = array('table' => 'vendor_sale_consultation_social', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);
    }
     if($this->input->post('family_type')=='family_history'){
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('family_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('family_history_search'),                 
            'comment' => $this->input->post('family_history_comment'),                               
            'relationship' => $this->input->post('relationship'),                
            'showSummary' => $this->input->post('familyHistorySummary'),                
        );
        $option = array('table' => 'vendor_sale_consultation_family_history', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);
    }
     if($this->input->post('medical_type')=='medical_history'){
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('medical_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('medical_history_search'),  
            'since' => $this->input->post('medical_history_since'),                
            'condition_type' => $this->input->post('medical_history_condition_type'),                
            'condition_significance' => $this->input->post('medical_history_condition_significance'),                
            'comment' => $this->input->post('medical_history_comment'),                           
            'showSummary' => $this->input->post('medicalHistorySummary'),                
        );
        $option = array('table' => 'vendor_sale_consultation_medical_history', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);
    }
     if($this->input->post('allergy_type')=='allergy'){
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('allergy_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('allergy_search'),           
            'comment' => $this->input->post('allergy_comment'),                               
            'severity' => $this->input->post('allergy_severity'),                               
            'showSummary' => $this->input->post('allergySummary'),                
        );
        $option = array('table' => 'vendor_sale_consultation_allergy', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);
    }
     if($this->input->post('examination_type')=='examination'){
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('examination_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('examination_search'),             
            'comment' => $this->input->post('examination_comment'),                
            'value' => $this->input->post('examination_value'),                
                        
        );
        $option = array('table' => 'vendor_sale_consultation_examination', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);
    }
     if($this->input->post('problem_type')=='problem_heading'){
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('problem_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('problem_search'),  
            'since' => $this->input->post('problem_since'),                
            'condition_type' => $this->input->post('problem_condition_type'),                
            'condition_significance' => $this->input->post('problem_condition_significance'),                
            'comment' => $this->input->post('problem_comment'),                             
            'showSummary' => $this->input->post('showSummary'),                
        );
        $option = array('table' => 'vendor_sale_consultation_problem_heading', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);

    }
   
     if($this->input->post('diagram_type')=='diagram'){
        $options_data = array(
            'patient_id'=> decoding($this->input->post('patient_id')),
            'facility_user_id'=> $LoginID,
            'type' => $this->input->post('diagram_type'),
            'consultation_id'=>$insert_id,
            'search' => $this->input->post('search'),  
            'since' => $this->input->post('since'),                
            'condition_type' => $this->input->post('condition_type'),                
            'condition_significance' => $this->input->post('condition_significance'),                
            'comment' => $this->input->post('comment'),                             
            'showSummary' => $this->input->post('showSummary'),                
        );
        $option = array('table' => 'vendor_sale_consultation_medication', 'data' => $options_data, 'where' => array('id' => $where_id));
        $this->common_model->customupdate($option);
    
    }

                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url($this->router->fetch_class()));
            // } else {
            //     $response = array('status' => 0, 'message' => "Failed to add");
            // }
        // }
    } else {
        $messages = (validation_errors()) ? validation_errors() : '';
        $response = array('status' => 0, 'message' => $messages);
    }

    echo json_encode($response);

    }

    public function fetch() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchConsultProblem($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_problem_heading" id="consultation_problem_heading" onclick="getSearchProblem()">';
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

    public function fetchExamination() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchConsultExamination($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_examination" id="consultation_examination" onclick="getSearchExamination()">';
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


    public function fetchAllergy() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchConsultAllergy($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_allergy" id="consultation_allergy" onclick="getSearchAllergy()">';
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
    public function fetchMedicalHistory() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchConsultMedicalHistory($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_medical_history" id="consultation_medical_history" onclick="getSearchconsultationMedicalHistory()">';
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

    public function fetchFamilyHistory() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchConsultFamilyHistory($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_family_history" id="consultation_family_history" onclick="getSearchconsultationFamilyHistory()">';
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


    public function fetchSocial() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchConsultSocial($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_social" id="consultation_social" onclick="getSearchconsultationSocial()">';
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


    public function fetchMedication() {
        $output = '';
        $query = $this->input->post('query');
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

    public function fetchProduct() {
        $output = '';
        $query = $this->input->post('query');
        if ($query) {
            $results = $this->common_model->fetchConsultProduct($query);
            // print_r($results);die;
            $output .= '<select class="form-control select2" name="consultation_product" id="consultation_product" onclick="getSearchconsultationProduct()">';
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
                    'question' => $this->input->post('diagram'),
                    'recipient_template' => $this->input->post('bodies_template'),                         
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

    public function getStates()
    {
        $response = array();
        $id = $this->input->post('id');
       
        if (!empty($id)) {
           

            $options = array(
                'table' => 'states',
                'select' => 'states.*',
                'where' => array('country_id' => $id),
            );
            $states = $this->common_model->customGet($options);
            
            $data.= '<select id="state" onchange="getCities(this.value)" name="state" class="form-control" size="1">';
            $data.= '<option value="" disabled selected>Please select</option>';
            
            
            foreach ($states as $state_list) {
               
                $data.= '<option value="' . $state_list->id_state . '">' . $state_list->state . '</option>';
            }
            
            
             $data.= '</select>';
        }

        
        echo json_encode($data);

    //    return  json_encode($response);
    }
    
    public function getCity()
    {
        $response = array();
        $id = $this->input->post('id');
        if (!empty($id)) {
            $options = array(
                'table' => 'cities',
                'select' => 'cities.*',
                'where' => array('state_id' => $id),
            );
            $cities = $this->common_model->customGet($options);

            $data.= '<select id="city" name="city" class="form-control" size="1">';
            $data.= '<option value="" disabled selected>Please select</option>';
            
            
            foreach ($cities as $cities_list) {
               
                $data.= '<option value="' . $cities_list->id_city . '">' . $cities_list->city . '</option>';
            }
            
             $data.= '</select>';
        }
        echo json_encode($data);
    }

    function open_model_invoice() {
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrlInvoice'] = $this->router->fetch_class() . "/addPatientInvoice";

        $this->data['patient_id'] = decoding($_GET['id']);
        // $patient_id = decoding($_GET['id']);
        // print_r($patient_id);die;
        $patient_id = $this->input->post('id');
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        // print_r($id);die;
        $role_name = $this->input->post('role_name');

        // $optionPatient = array(
        //     'table' => 'vendor_sale_users',
        //     'select' => 'vendor_sale_patient.*',
        //     'join' => array(
        //         array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
        //     ),
        //     'where' => array('vendor_sale_patient.id'=>$id),
        //     'single'=>true,
        // );

        // $this->data['patient'] = $this->common_model->customGet($optionPatient);

        // $optionPractitioner = array(
        //     'table' => 'vendor_sale_users',
        //     'select' => 'vendor_sale_practitioner.*',
        //     'join' => array(
        //         array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
        //     ),
        //     'where' => array('vendor_sale_users.id'=>$LoginID),
           
        // );

        // $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);

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
                    // 'doctors.user_id'=>$LoginID
                    'users.hospital_id'=>$hospital_id
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
                'where' => array('vendor_sale_patient.id'=>$patient_id),
                'single'=>true,
               
            );
    
            $this->data['patient'] = $this->common_model->customGet($optionPatient);
    
            $optionPractitioner = array(
                'table' => 'vendor_sale_users',
                'select' => 'vendor_sale_practitioner.*',
                'join' => array(
                    array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
                ),
                // 'where' => array('vendor_sale_practitioner.hospital_id'=>$datadoctors->facility_user_id),
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
                    // 'doctors.facility_user_id'=>$LoginID
                    'users.hospital_id'=>$hospital_id
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctors'] = $this->common_model->customGet($option);
    
            $this->data['patient_id'] = decoding($_GET['id']);
            $id = $this->input->post('id');
            $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
            // print_r($patient_id);die;
            $role_name = $this->input->post('role_name');
    
            $optionPatient = array(
                'table' => 'vendor_sale_users',
                'select' => 'vendor_sale_patient.*',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
                ),
                'where' => array('vendor_sale_patient.id'=>$patient_id),
                'single'=>true,
                
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

// print_r($this->data['practitioner']);die;
        

        $this->load->view('add_invoice', $this->data);
    }

    function consultationInvoice() {

        $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        // $this->data['formUrlModel'] = $this->router->fetch_class() . "/addQuestion";
        $this->data['model'] = $this->router->fetch_class();

        $this->data['patient_id'] = decoding($_GET['id']);
        $id = decoding($_GET['id']);
        
        // print_r($id);die;
        $role_name = $this->input->post('role_name');

        $optionPatient = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_patient.*',
            'join' => array(
                array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
            ),
            'where' => array('vendor_sale_patient.id'=>$id),
            'single'=>true,
        );

        $this->data['patient'] = $this->common_model->customGet($optionPatient);
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

        $id = decoding($_GET['id']);
        
        $optionheader = array(
            'table' => 'vendor_sale_invoice',
            'select' => 'vendor_sale_invoice.*',
            'where' => array('vendor_sale_invoice.patient_id' => $id)
        );

        

        $this->data['list'] = $this->common_model->customGet($optionheader);
        // print_r($this->data['list']); die;
        
        if (!empty($id)) {

            $option = array(
                'table' => 'patient P',
                'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                    . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                    . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                    . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option,PC.comment,U.email as patient_email,U.email as password, U.phone as patient_phone_number,U.date_of_birth,U.gender,U.phone_code',
                'join' => array(
                    array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                    array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                    array('users U', 'U.id=P.user_id', 'left'),
                    array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                    array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                    array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                    array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                    array('organism Org', 'Org.name=P.organism', 'left'),
                    array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                    array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                    array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left'),
                    
                ),
                'single' => true
            );
            $option['where']['P.id'] = $id;
            $results_row = $this->common_model->customGet($option);

            if (!empty($results_row)) {

                $results_row->md_steward_response = clone $results_row;
                $filteredData = $this->applyAlgo($results_row);
                $this->data['results'] = $filteredData;
            }
        }

        $this->load->admin_render('consultation_invoice', $this->data, 'inner_script');
    }


    public function addPatientInvoice() {
        
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
                        $products = $this->input->post('products');
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

                    // $options_data = array(    
                         
                    //     'total_amount'=> $total_prices->total_price,                                              
                    //     'Paid' => '0.00',                         
                    //     'Outstanding' => $total_prices->total_price,                                            
                    // );
                    // $optionUpdate = array(
                    //     'table' => 'vendor_sale_invoice',
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



    public function editInvoice() {
        $this->data['title'] = "Edit Invoice" . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/updateInvoice";

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
        
        $role_name = $this->input->post('role_name');

       
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
                'table' => 'vendor_sale_invoice',
                'where' => array('id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);

            $optionItem = array(
                'table' => 'vendor_sale_invoice_items',
                'select'=>'vendor_sale_invoice_items.*',
                'where' => array('vendor_sale_invoice_items.invoice_id' => $id),
            );

            $results_rowItem = $this->common_model->customGet($optionItem);

           $patient_id = $results_row->patient_id;
        //    print_r($patient_id);die;
            $optionPatient = array(
                'table' => 'vendor_sale_users',
                'select' => 'vendor_sale_users.first_name,vendor_sale_users.last_name',
                'join' => array(
                    array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
                ),
                'where' => array('vendor_sale_patient.id'=>$patient_id),
                'single' => true
            );
    
            $patient_data = $this->common_model->customGet($optionPatient);
            $results_row->patient_item = $patient_data;

            // if (!is_array($results_rowItem)) {
            //     $results_row['invoice_item'] = array($results_rowItem); // Convert to array if necessary
            // }
            
            // Assign the array of invoice items to the main invoice result
            $results_row->invoice_item = $results_rowItem;


            if (!empty($results_row)) {
                $this->data['results'] = $results_row;
                // print_r($this->data['results']);die;
                $this->load->view('edit_invoice', $this->data);
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


    public function updateInvoice() {
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
                    'table' => 'vendor_sale_invoice',
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


                
                // $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('contactus/edit'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
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

        $id = decoding($this->input->post('id'));
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
                
                
                $this->data['results'] = $results_row;
                $this->data['resultsItem'] = $resultsItem;
                // print_r($this->data['results']);die;
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

    // public function process() {
    //     // Load necessary models or libraries for processing payment

    //     $this->form_validation->set_rules('invoice_date', "invoice_date", 'required|trim');
    //     // $where_id = $this->input->post('id');
    //     $model = $this->input->post('model');
    //     $id = $this->input->post('id');

    //     if ($this->form_validation->run() == FALSE):
    //         $messages = (validation_errors()) ? validation_errors() : '';
    //         $response = array('status' => 0, 'message' => $messages);
    //     else:
    //         $this->filedata['status'] = 1;

    //         if ($this->filedata['status'] == 0) {
    //             $response = array('status' => 0, 'message' => $this->filedata['error']);
    //         } else {

        

    //     // print_r($this->input->post());die;

    //     $options_data = array(
    //         // 'user_id'=> $LoginID,
    //         // 'facility_user_id'=> $LoginID,
    //         'patient_id' => $this->input->post('patient'),
    //         'invoice_id	' => $this->input->post('id'),                       
    //         'selected_date	' => $this->input->post('invoice_date'),                         
    //         'pay_amount	' => $this->input->post('amount'),                                               
    //         'payment_type' => $this->input->post('billing_to'),                         
                                     
    //     );
    //     // print_r($options_data);die;
    //     $option = array('table' => 'vendor_sale_invoice_pay', 'data' => $options_data);
    //     $invoice_id= $this->common_model->customInsert($option);
        

    //     if (!empty($id)) {
    //         $option = array(
    //             'table' => 'vendor_sale_invoice',
    //             'data' => array('vendor_sale_invoice.Paid' => $this->input->post('amount'),'vendor_sale_invoice.Outstanding' => '0.00','vendor_sale_invoice.status' => 'Paid'),
    //             'where' => array('vendor_sale_invoice.id' => $id)
    //         );
    //         $delete = $this->common_model->customUpdate($option);

    //     // Here you would typically call your payment gateway integration,
    //     // for example, sending a request to PayPal, Stripe, etc.
    //     // For now, let's just simulate a successful payment response.

    //     // $response = [
    //     //     'status' => 'success',
    //     //     'message' => 'Payment was processed successfully'
    //     // ];

    //     // echo json_encode($response);
    //     $response = array('status' => 1, 'message' => "Payment was processed successfully", 'url' => base_url('contactus/edit'), 'id' => encoding($this->input->post('id')));
                
    //         }
    //     }
    //     endif;
    

    //     echo json_encode($response);
    
    // }




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

    // patient logs

    function patientLogs() {

        $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        // $this->data['formUrlModel'] = $this->router->fetch_class() . "/addQuestion";
        $this->data['model'] = $this->router->fetch_class();

        $this->data['patient_id'] = decoding($_GET['id']);
        $id = decoding($_GET['id']);
        
        // print_r($id);die;
        $role_name = $this->input->post('role_name');

        $optionPatient = array(
            'table' => 'vendor_sale_users',
            'select' => 'vendor_sale_patient.*',
            'join' => array(
                array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
            ),
            'where' => array('vendor_sale_patient.id'=>$id),
            'single'=>true,
        );

        $this->data['patient'] = $this->common_model->customGet($optionPatient);
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

        $id = decoding($_GET['id']);
        
        $optionheader = array(
            'table' => 'vendor_sale_invoice',
            'select' => 'vendor_sale_invoice.*',
            'where' => array('vendor_sale_invoice.patient_id' => $id)
        );

        $this->data['list'] = $this->common_model->customGet($optionheader);
        

            $id = decoding($_GET['id']);
            if (!empty($id)) {
                // print_r($id); die;
                $optionPatient = array(
                    'table' => 'patient P',
                    'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                        . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                        . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                        . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option,PC.comment,U.email as patient_email,U.email as password, U.phone as patient_phone_number,U.date_of_birth,U.gender,U.phone_code',
                    'join' => array(
                        array('care_unit CI', 'CI.id=P.care_unit_id', 'left'),
                        array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                        array('users U', 'U.id=P.user_id', 'left'),
                        array('patient_consult PC', 'PC.patient_id=P.id', 'left'),
                        array('initial_rx IRX', 'IRX.id=PC.initial_rx', 'left'),
                        array('initial_dx IDX', 'IDX.id=PC.initial_dx', 'left'),
                        array('culture_source CS', 'CS.name=P.culture_source', 'left'),
                        array('organism Org', 'Org.name=P.organism', 'left'),
                        array('precautions Pre', 'Pre.name=P.precautions', 'left'),
                        array('initial_rx IRX2', 'IRX2.id=PC.new_initial_rx', 'left'),
                        array('initial_dx IDX2', 'IDX2.id=PC.new_initial_dx', 'left'),
                        
                    ),
                    'single' => true
                );
                $option['where']['P.id'] = $id;
                $results_row = $this->common_model->customGet($optionPatient);

                $optionAppointment = array(
                    'table' => 'patient P',
                    'select' => 'NS.*,CA.start_date_appointment,CA.end_date_appointment,CA.type,CA.location_appointment,CA.clinician_appointment,CA.appointment_type,CA.practitioner,PR.name as practiner_name',
                    'join' => array(
                        array('doctors DOC', 'DOC.id=P.doctor_id', 'left'),
                        array('users U', 'U.id=P.user_id', 'inner'),
                        array('clinic_appointment CA', 'U.id=CA.patient', 'inner'),
                        array('notifications NS', 'CA.id=NS.clinic_appointment_id', 'inner'),
                        array('vendor_sale_practitioner PR', 'PR.id=CA.practitioner','left')
                    ),
                    // 'single' => true
                );
                $optionAppointment['where']['P.id'] = $id;
                $this->data['results_rowAppointment'] = $this->common_model->customGet($optionAppointment);


                
// print_r($this->data['results_rowAppointment']);die;
                $optionTask = array(
                    'table' => 'patient P',
                    'select' => 'TK.*,DOC.name as doctor_name',
                    'join' => array(
                       
                        array('users U', 'U.id=P.user_id', 'left'),
                        array('task TK', 'U.id=TK.patient_name', 'inner'),
                        array('doctors DOC', 'DOC.user_id=TK.assign_to', 'left'),
                        // array('notifications NS', 'CA.id=NS.clinic_appointment_id', 'left')
                    ),
                    // 'single' => true
                );
                $optionTask['where']['P.id'] = $id;
                $this->data['results_task'] = $this->common_model->customGet($optionTask);


                $optionmedication = array(
                    'table' => 'vendor_sale_consultation_medication M',
                    'select' => 'M.*',
                );
                $optionmedication['where']['M.patient_id'] = $id;
                $this->data['results_medication'] = $this->common_model->customGet($optionmedication);


                $optionLabs = array(
                    'table' => 'vendor_sale_patient_labs L',
                    'select' => 'L.*,U.first_name as doctor_fname,U.last_name as doctor_lname ',
                    'join' => array(
                        array('users U', 'U.id=L.doctor_id', 'left'),
                        // array('notifications NS', 'CA.id=NS.clinic_appointment_id', 'left')
                    ),
                );
                $optionLabs['where']['L.patient_id'] = $id;
                $this->data['patient_labs'] = $this->common_model->customGet($optionLabs);

                $optionCommunication = array(
                    'table' => 'vendor_sale_patient_sms_communication psmsc',
                    'select' => 'psmsc.*',  
                );
                $optionCommunication['where']['psmsc.patient_id'] = $id;
                $this->data['patient_communication'] = $this->common_model->customGet($optionCommunication);

// print_r($this->data['patient_communication']);die;
                
            if (!empty($results_row)) {

                $results_row->md_steward_response = clone $results_row;
                $filteredData = $this->applyAlgo($results_row);
                $this->data['results'] = $filteredData;
            }
            
        }

        $this->load->admin_render('patient_logs', $this->data, 'inner_script');
    }
    

    // public function pay() {
    //     $this->data['title'] = "Pay " . $this->title;
    //     $this->data['formUrl'] = $this->router->fetch_class() . "/process";
           
    //     $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

    //     // if($this->ion_auth->is_subAdmin()){
    //         if ($this->ion_auth->is_facilityManager()) {
    //             $user_id = $this->session->userdata('user_id');
    //         $hospital_id = $user_id;
            
    //         } else if($this->ion_auth->is_all_roleslogin()) {
    //             $user_id = $this->session->userdata('user_id');
    //             $optionData = array(
    //                 'table' => USERS . ' as user',
    //                 'select' => 'user.*,group.name as group_name',
    //                 'join' => array(
    //                     array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
    //                     array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
    //                 ),
    //                 'order' => array('user.id' => 'DESC'),
    //                 'where' => array('user.id'=>$user_id),
    //                 'single'=>true,
    //             );
            
    //             $authUser = $this->common_model->customGet($optionData);
            
    //             $hospital_id = $authUser->hospital_id;
    //             // 'users.hospital_id'=>$hospital_id
                
    //         }


    //     if($this->ion_auth->is_all_roleslogin()){

    //         $option = array(
    //             'table' => ' doctors',
    //             'select' => 'doctors.*',
    //             'join' => array(
    //                 array('users', 'doctors.user_id=users.id', 'left'),
    //             ),
                
    //             'where' => array(
    //                 'users.delete_status' => 0,
    //                 // 'doctors.user_id'=>$CareUnitID
    //             ),
    //             'single' => true,
    //         );

    //         $datadoctors = $this->common_model->customGet($option);


    //         $option = array(
    //             'table' => ' doctors',
    //             'select' => 'users.*',
    //             'join' => array(
    //                 array('users', 'doctors.user_id=users.id', 'left'),
    //                 array('user_profile UP', 'UP.user_id=users.id', 'left'),
    //                 // array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                    
    //             ),
                
    //             'where' => array(
    //                 'users.delete_status' => 0,
    //                 'users.hospital_id'=>$hospital_id
    //                 // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
    //             ),
    //             'order' => array('users.id' => 'desc'),
    //         );
    //         $this->data['doctors'] = $this->common_model->customGet($option);




    //         $this->data['patient_id'] = decoding($_GET['id']);
    //         $id = $this->input->post('id');
    //         $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
            
    //         $role_name = $this->input->post('role_name');

    //         $optionPatient = array(
    //             'table' => 'vendor_sale_users',
    //             'select' => 'vendor_sale_patient.*',
    //             'join' => array(
    //                 array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
    //             ),
    //             // 'where' => array('vendor_sale_patient.md_steward_id'=>$datadoctors->facility_user_id),
    //             'where' => array('users.hospital_id'=>$hospital_id),
            
    //         );

    //         $this->data['patient'] = $this->common_model->customGet($optionPatient);

    //         $optionPractitioner = array(
    //             'table' => 'vendor_sale_users',
    //             'select' => 'vendor_sale_practitioner.*',
    //             'join' => array(
    //                 array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
    //             ),
    //             'where' => array('vendor_sale_practitioner.hospital_id'=>$hospital_id),
    //             // 'where' => array('vendor_sale_practitioner.hospital_id'=>$datadoctors->facility_user_id),
    //             // 'single'=>true,
    //         );

    //         $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);
    //         // print_r($datadoctors->facility_user_id);die;

    //     } else if ($this->ion_auth->is_facilityManager()) {
            
    //         $option = array(
    //             'table' => ' doctors',
    //             'select' => 'users.*',
    //             'join' => array(
    //                 array('users', 'doctors.user_id=users.id', 'left'),
    //                 array('user_profile UP', 'UP.user_id=users.id', 'left'),
    //                 array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                    
    //             ),
                
    //             'where' => array(
    //                 'users.delete_status' => 0,
    //                 'users.hospital_id'=>$hospital_id
    //                 // 'doctors.facility_user_id'=>$CareUnitID
    //             ),
    //             'order' => array('users.id' => 'desc'),
    //         );
    //         $this->data['doctors'] = $this->common_model->customGet($option);

    //         $this->data['patient_id'] = decoding($_GET['id']);
    //         $id = $this->input->post('id');
    //         $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    //         // print_r($LoginID);die;
    //         $role_name = $this->input->post('role_name');

    //         $optionPatient = array(
    //             'table' => 'vendor_sale_users',
    //             'select' => 'vendor_sale_patient.*',
    //             'join' => array(
    //                 array('vendor_sale_patient', 'vendor_sale_users.id=vendor_sale_patient.user_id','left')
    //             ),
    //             // 'where' => array('vendor_sale_patient.md_steward_id'=>$LoginID),
    //             'where' => array('users.hospital_id'=>$hospital_id),
                
    //         );

    //         $this->data['patient'] = $this->common_model->customGet($optionPatient);

    //         // print_r($this->data['patient']);die;

    //         $optionPractitioner = array(
    //             'table' => 'vendor_sale_users',
    //             'select' => 'vendor_sale_practitioner.*',
    //             'join' => array(
    //                 array('vendor_sale_practitioner', 'vendor_sale_users.id=vendor_sale_practitioner.hospital_id','left')
    //             ),
    //             'where' => array('vendor_sale_practitioner.hospital_id'=>$hospital_id),
    //             // 'single'=>true,
    //         );

    //         $this->data['practitioner'] = $this->common_model->customGet($optionPractitioner);
    //     }

    //     $id = decoding($this->input->post('id'));
    //     if (!empty($id)) {
    //         // $option = array(
    //         //     'table' => $this->_table,
    //         //     'where' => array('id' => $id),
    //         //     'single' => true
    //         // );

    //         $option = array(
    //             'table' => 'vendor_sale_invoice',
    //             'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice_items.price as total_price,vendor_sale_invoice_items.product_name,,vendor_sale_invoice_items.rate,,vendor_sale_invoice_items.quantity,',
    //             'join' => array(
    //                 array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
    //                 array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
    //             ),
    //             'where' => array('vendor_sale_invoice.id' => $id),
    //             // 'group_by' => 'vendor_sale_invoice.id', // Group by invoice ID to get total price for each invoice
    //             'order' => array('vendor_sale_invoice.id' => 'DESC'),
    //             'single' => true

    //         );
    //         $results_row = $this->common_model->customGet($option);

    //         $optionItem = array(
    //             'table' => 'vendor_sale_invoice',
    //             'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice_items.price as total_price,vendor_sale_invoice_items.product_name,,vendor_sale_invoice_items.rate,,vendor_sale_invoice_items.quantity,',
    //             'join' => array(
    //                 array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
    //                 array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
    //             ),
    //             'where' => array('vendor_sale_invoice_items.invoice_id' => $id),
    //             // 'group_by' => 'vendor_sale_invoice.id', // Group by invoice ID to get total price for each invoice
    //             'order' => array('vendor_sale_invoice.id' => 'DESC'),
                

    //         );
    //         $resultsItem = $this->common_model->customGet($optionItem);

    //         if (!empty($results_row)) {
    //             $this->data['results'] = $results_row;
    //             $this->data['resultsItem'] = $resultsItem;
    //             // print_r($this->data['results']);die;
    //             $this->load->view('pay', $this->data);
    //         } else {
    //             $this->session->set_flashdata('error', lang('not_found'));
    //             redirect($this->router->fetch_class());
    //         }
    //     } else {
    //         $this->session->set_flashdata('error', lang('not_found'));
    //         redirect($this->router->fetch_class());
    //     }
    // }

// public function process() {
//         // Load necessary models or libraries for processing payment
//         // print_r($_POST());
//         // echo 'check error';
//         // $token  = $_POST['stripeToken'];
//     //    
//     // header('Content-Type: application/json');

//     // // Load Stripe library
//     // \Stripe\Stripe::setApiKey('sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx'); // Replace with your actual secret key

//     // // Retrieve token from request
//     // $json = file_get_contents('php://input');
//     // $data = json_decode($json, true);
//     // $token = $data['token'];

//     $token =  $this->input->post('stripeToken');
//         // print_r($token);die;

//     if(!empty($_POST['stripeToken'])){
//         $this->form_validation->set_rules('invoice_date', "invoice_date", 'required|trim');
//         // $where_id = $this->input->post('id');
       
//         $id = $this->input->post('id');

//         if ($this->form_validation->run() == FALSE){
//             $messages = (validation_errors()) ? validation_errors() : '';
//             $response = array('status' => 0, 'message' => $messages);
//         }else{
//             $this->filedata['status'] = 1;

//             if ($this->filedata['status'] == 0) {
//                 $response = array('status' => 0, 'message' => $this->filedata['error']);
//             } else {

        

        

//         $options_data = array(
//             // 'user_id'=> $LoginID,
//             // 'facility_user_id'=> $LoginID,
//             'patient_id' => $this->input->post('patient'),
//             'invoice_id	' => $this->input->post('id'),                       
//             'selected_date	' => $this->input->post('invoice_date'),                         
//             'pay_amount	' => $this->input->post('amount'),                                               
//             'payment_type' => $this->input->post('billing_to'),                         
                                     
//         );
//         // print_r($options_data);die;
//         $option = array('table' => 'vendor_sale_invoice_pay', 'data' => $options_data);
//         $invoice_id= $this->common_model->customInsert($option);
        

//         if (!empty($id)) {
//             $option = array(
//                 'table' => 'vendor_sale_invoice',
//                 'data' => array('vendor_sale_invoice.Paid' => $this->input->post('amount'),'vendor_sale_invoice.Outstanding' => '0','vendor_sale_invoice.status' => 'Paid'),
//                 'where' => array('vendor_sale_invoice.id' => $id)
//             );
//             $delete = $this->common_model->customUpdate($option);

//             // stripe payment gateway

//             $option = array(
//                 'table' => 'payment_gateway',
//                 'select' => 'payment_gateway.*',
//                 'order' => array('payment_gateway.id' => 'DESC'),
//                 'single'=>true,
//             );
    
//             $stripe_payment_gateway = $this->common_model->customGet($option);

//         // print_r($_POST['stripeToken']);die;
//             // if(!empty($_POST['stripeToken']))
//             // {
//                 //get token, card and user info from the form
//                 $token  = $_POST['stripeToken'];
                
//                 $email = $this->input->post('email');
//                 $itemName = $this->input->post('billing_to');
//                 $itemNumber = $this->input->post('invoice_number');
//                 $itemPrice = $this->input->post('amount');
//                 $currency = "usd";
//                 $orderID = "SKA92712382139";

//                 //include Stripe PHP library
//                 require_once APPPATH."third_party/stripe/init.php";
                
//                 //set api key
//                 $stripe = array(
//                   "secret_key"      => "sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx",
//                   "publishable_key" => "pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj"
//                 );
    
//                 // $stripe = array(
//                 //     "secret_key"      => $stripe_payment_gateway->secret_key,
//                 //     "publishable_key" => $stripe_payment_gateway->publishable_key
//                 //   );
                
               

//                 \Stripe\Stripe::setApiKey("sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx");
                                
//                 $customer = \Stripe\Customer::create(array(
//                     'email' => $email,
//                     'source'  => $token
//                 ));
                
               
                
                

//                 try {
//                     // Assuming the customer has been created successfully
//                     $charge = \Stripe\Charge::create(array(
//                         'customer' => $customer->id,
//                         'amount' => $itemPrice, // Amount in cents
//                         'currency' => $currency, // e.g., "usd"
//                         'description' => $itemName,
//                         'metadata' => array(
//                             'item_id' => $itemNumber
//                         )
//                     ));
                    
//                     // Successfully created charge
//                     // echo 'Charge successful: ' . $charge->id;
                
//                 } catch (\Stripe\Exception\CardException $e) {
//                     // Card was declined
//                     echo 'Card error: ' . $e->getMessage();
//                 } catch (\Stripe\Exception\InvalidRequestException $e) {
//                     // Invalid parameters were supplied to Stripe's API
//                     echo 'Invalid request: ' . $e->getMessage();
//                 } catch (\Stripe\Exception\AuthenticationException $e) {
//                     // Authentication with Stripe's API failed
//                     echo 'Authentication error: ' . $e->getMessage();
//                 } catch (\Stripe\Exception\ApiConnectionException $e) {
//                     // Network communication with Stripe failed
//                     echo 'Network error: ' . $e->getMessage();
//                 } catch (\Stripe\Exception\ApiErrorException $e) {
//                     // Display a generic error to the user
//                     echo 'Stripe error: ' . $e->getMessage();
//                 } catch (Exception $e) {
//                     // Something else happened, completely unrelated to Stripe
//                     echo 'Error: ' . $e->getMessage();
//                 }
//                 // // retrieve charge details
//                 // $chargeJson = $charge->jsonSerialize();

//                 // try {
//                 //     $charge = Stripe\Charge::create([
//                 //         'customer' => $customer->id,
//                 //         'amount'   => 2500,  // In cents
//                 //         'currency' => 'usd',
//                 //         'description' => $itemName,
//                 //         'metadata' => ['item_id' => $itemNumber]
//                 //     ]);
//                 // } catch (\Stripe\Exception\ApiErrorException $e) {
//                 //     $response = ['status' => 0, 'message' => $e->getMessage()];
//                 //     echo json_encode($response);
//                 //     die;
//                 // }
                
//                 //check whether the charge is successful
//                 // if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) &&              $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
//                 // {
//                 //     //order details 
//                 //     $amount = $chargeJson['amount'];
//                 //     $balance_transaction = $chargeJson['balance_transaction'];
//                 //     $currency = $chargeJson['currency'];
//                 //     $status = $chargeJson['status'];
//                 //     $date = date("Y-m-d H:i:s");
                
                    
//                     //insert tansaction data into the database
//                     // $dataDB = array(
//                     //     'user_id' => $user_id,
//                     //     'plan_id' => $plan_id,
//                     //     'name' => $name,
//                     //     'email' => $email, 
//                     //     'card_num' => $card_num, 
//                     //     'card_cvc' => $card_cvc, 
//                     //     'card_exp_month' => $card_exp_month, 
//                     //     'card_exp_year' => $card_exp_year, 
//                     //     'item_name' => $itemName, 
//                     //     'item_number' => $itemNumber, 
//                     //     'item_price' => $itemPrice, 
//                     //     'item_price_currency' => $currency, 
//                     //     'paid_amount' => $amount, 
//                     //     'paid_amount_currency' => $currency, 
//                     //     'txn_id' => $balance_transaction, 
//                     //     'payment_status' => $status,
//                     //     'created' => $date,
//                     //     'modified' => $date
//                     // );
    
//                     // if ($this->db->insert('orders', $dataDB)) {
//                     //     if($this->db->insert_id() && $status == 'succeeded'){
//                     //         $data['insertID'] = $this->db->insert_id();
//                     //         // $this->load->view('payment_success', $data);
                            
//                     //         $this->load->admin_render('payment_success', $data);
//                     //         // redirect('Welcome/payment_success','refresh');
//                     //     }else{
//                     //         echo "Transaction has been failed";
//                     //     }
//                     // }
//                     // else
//                     // {
//                     //     echo "not inserted. Transaction has been failed";
//                     // }
    
//                 // }
//                 // else
//                 // {
//                 //     echo "Invalid Token";
//                 //     $statusMsg = "";
//                 // }
//             // }
//         // Here you would typically call your payment gateway integration,
//         // for example, sending a request to PayPal, Stripe, etc.
//         // For now, let's just simulate a successful payment response.

        

//         // $response = [
//         //     'status' => 'success',
//         //     'message' => 'Payment was processed successfully'
//         // ];

//         // echo json_encode($response);
//         // $response = array('status' => 1, 'message' => "Payment was processed successfully", 'url' => base_url('contactus/edit'), 'id' => encoding($this->input->post('id')));
                
//         //     }
//         // }
//         // endif;
    

//         // echo json_encode($response);
//             $response = array('status' => 1, 'message' => "Payment is Successfully", 'url' => base_url($this->router->fetch_class()));
            
//         } else {
//         $messages = (validation_errors()) ? validation_errors() : '';
//         $response = array('status' => 0, 'message' => $messages);
//           }
//        }
//     }
    
//     } else {
//                 $response = array('status' => 0, 'message' => "Stripe token is empty");
            
//             }
//         echo json_encode($response);
    
// }

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

    // public function pdfInvoice() {
    //     $this->data['title'] = "PDF Invoice " . $this->title;
    //     $this->data['formUrl'] = $this->router->fetch_class() . "/update";


           
    //     $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';


    //     $id = decoding($this->input->post('id'));
    //     // $id = decoding($this->input->post('pdfInvoice'));
    //     // print_r($id);die;
    //     if (!empty($id)) {
    //         // $option = array(
    //         //     'table' => $this->_table,
    //         //     'where' => array('id' => $id),
    //         //     'single' => true
    //         // );

    //         $option = array(
    //             'table' => 'vendor_sale_invoice',
    //             'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_users.email as patient_email, 
    //                         SUM(vendor_sale_invoice_items.price) as total_price,vendor_sale_invoice_items.product_name,vendor_sale_invoice_items.rate,vendor_sale_invoice_items.quantity,vendor_sale_invoice_items.price',
    //             'join' => array(
    //                 array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id', 'left'),
    //                 array('vendor_sale_users', 'vendor_sale_users.id = vendor_sale_patient.user_id', 'left'),
    //                 array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id', 'left')
    //             ),
    //             'where' => array('vendor_sale_invoice.id' => $id, 'vendor_sale_invoice.delete_status' => 0),
    //             'group_by' => 'vendor_sale_invoice.id',
    //             'order' => array('vendor_sale_invoice.id' => 'DESC'),
    //             'single' => true
    //         );
            
    //         // $results_row = $this->common_model->customGet($option);
            

    //         $results_row = $this->common_model->customGet($option);
    //         if (!empty($results_row)) {
    //             $this->data['results'] = $results_row;

    //             $optionItem = array(
    //                 'table' => 'vendor_sale_invoice',
    //                 'select' => 'vendor_sale_invoice.*, vendor_sale_patient.name as patient_name, vendor_sale_invoice_items.price as total_price,vendor_sale_invoice_items.product_name,,vendor_sale_invoice_items.rate,,vendor_sale_invoice_items.quantity,',
    //                 'join' => array(
    //                     array('vendor_sale_patient', 'vendor_sale_patient.id = vendor_sale_invoice.patient_id ', 'left'),
    //                     array('vendor_sale_invoice_items', 'vendor_sale_invoice.id = vendor_sale_invoice_items.invoice_id ', 'left')
    //                 ),
    //                 'where' => array('vendor_sale_invoice_items.invoice_id' => $id),
    //                 // 'group_by' => 'vendor_sale_invoice.id', // Group by invoice ID to get total price for each invoice
    //                 'order' => array('vendor_sale_invoice.id' => 'DESC'),
                    
    
    //             );
    //             $resultsItem = $this->common_model->customGet($optionItem);
    //             $this->data['resultsItem'] = $resultsItem;
    //             // print_r($this->data['resultsItem']);die;
    //             $this->load->view('pdf_invoice', $this->data);
    //         } else {
    //             $this->session->set_flashdata('error', lang('not_found'));
    //             redirect($this->router->fetch_class());
    //         }
    //     } else {
    //         $this->session->set_flashdata('error', lang('not_found'));
    //         redirect($this->router->fetch_class());
    //     }
    // }



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

    
}
