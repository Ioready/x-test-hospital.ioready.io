<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Pwfpanel extends Common_Controller
{

    // public $data = "";
    public $data = array();
    function __construct()
    {

        parent::__construct();
        $this->load->library(array('ion_auth'));
        $this->load->helper(array('language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        session_start();
        $_SESSION["error_message"] = '';
    }

    public function index()
    {
        $data['parent'] = "Dashboard";
        if (!$this->ion_auth->logged_in()) {
            //$this->session->set_flashdata('message', 'Your session has been expired');
            redirect('pwfpanel/login', 'refresh');
        } else {

            $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
            

            if ($this->ion_auth->is_superAdmin() || $this->ion_auth->is_admin()) {
                // $data['parent'] = "Dashboard";
                $user_id = $this->session->userdata('user_id');
                $data['careUnit'] = $this->common_model->customCount(array('table' => 'care_unit', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0)));
                $data['initial_dx'] = $this->common_model->customCount(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0)));
                $data['initial_rx'] = $this->common_model->customCount(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0)));

                $data['doctors'] = $this->common_model->customCount(array('table' => 'doctors', 'select' => 'id,name', 'where' => array('is_active' => 1, 'facility_user_id'=>$user_id, 'delete_status' => 0)));
                
               
                $option = array(
                    'table' => 'coupons',
                    'select' => 'coupon_type,coupon_code,user_size,total_use_user,cash_type,amount,id,used_type,min_amount,max_amount,percentage_in_amount',
                    // 'where' => array('coupon_code' => $coupon_code,'end_date >=' => $currDate,'start_date <=' => $currDate,'status' => 1),
                    'where' => array('delete_status' => 0),
                    'where_in' => array('coupon_type' => array(0,1,2,3, 4)),
                    
                );
                $data['total_coupon'] = $this->common_model->customCount($option);

                $optionOrder = array(
                    'table' => 'orders',
                    'select' => 'orders.*,U.first_name ,U.last_name,p.PlanName,p.Price,p.DurationInMonths',
                    'join' => array(
                                   
                                    array('users AS U', 'U.id = orders.user_id', 'left'),
                                    array('admin_plans AS p', 'p.id = orders.plan_id', 'left')
                                ),
                );
        
        
                $data['total_order'] = $this->common_model->customCount($optionOrder);



            $optionHospital = array(
                'table' => USERS . ' as user',
                'select' => 'user.*, group.name as group_name, UP.doc_file, CU.care_unit_code, CU.name, h.admin_id',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id = user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id = ugroup.group_id', 'left'),
                    array('user_profile AS UP', 'UP.user_id = user.id', 'left'),
                    array('care_unit AS CU', 'CU.id = user.care_unit_id', 'left'),
                    array('hospital AS h', 'h.user_id = user.id', 'inner')
                ),
                'where' => array(
                    'user.delete_status' => 0,
                    'group.id' => 6,
                    'h.admin_id' => $user_id,
                ),
                'order' => array('user.id' => 'DESC') // Order descending by user id
            );

            $data['total_hospital'] = $this->common_model->customCount($optionHospital);


                $adminOption = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.id',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                        array('user_profile UP', 'UP.user_id=user.id', 'left')
                    ),
                    'order' => array('user.id' => 'ASC'),
                    'where' => array(
                        'user.delete_status' => 0,
                        'group.id' => 2
                    ),
                    'order' => array('user.id' => 'desc'),
                );
                $data['total_admin'] = $this->common_model->customCount($adminOption);


                $option_order = array(
                    'table' => 'admin_plans',
                    'select' => 'admin_plans.*',
                );
                $data['total_plans'] = $this->common_model->customCount($option_order);

                // $option_order = array(
                //     'table' => 'user_subscribers',
                //     'select' => 'user_subscribers.*',
                // );
                // $data['total_order'] = $this->common_model->customCount($option_order);


                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.id',
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
                    'order' => array('user.id' => 'desc'),
                );
                $data['total_md_steward'] = $this->common_model->customCount($option);

                $option = array(
                    'table' => "patient P",
                    'select' => "P.id"
                );
                // print_r($this->data['total_md_steward']);die;

                $data['total_patient'] = $this->common_model->customCount($option);
                $option = array(
                    'table' => 'task',
                    'select' => 'task.id',
                    'join' => array(
                        
                        array('doctors doc', 'doc.id=task.assign_to', 'left')
                    ),
                    // 'order' => array('task.id' => 'ASC'),
                    'where' => array(
                        'task.status' => 'pending',
                        'task.user_id' => $user_id
                    ),
                    'order' => array('task.id' => 'desc'),
                );
                // print_r($option);die;
                $data['total_task'] = $this->common_model->customCount($option);
                $option = array(
                    'table' => "patient P",
                    'select' => "P.id",
                    'where' => array('DATE(created_date)' => date('Y-m-d'))
                );

                $data['total_patient_today'] = $this->common_model->customCount($option);
               
                // print_r($this->data['total_order']);die;
               
                $option = array('table' => 'admin_plans', 'where' => array('status' => 0), 'order' => array('id' => 'desc'));
                $data['all_plan_list'] = $this->common_model->customGet($option);

                if ($this->ion_auth->is_subAdmin()) {
                    


                        // $date = date("Y-m-d");

                        // $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                        // $week = $this->input->get('weeks');
                        // $month = $this->input->get('month');
                        // $year = $this->input->get('year');

                        // $whereClause = '';
                        // if (!empty($week)) {
                        //     $startDate = date("Y-m-d", strtotime("last monday", strtotime("+$week week")));
                        //     $endDate = date("Y-m-d", strtotime("next sunday", strtotime("+$week week")));
                        //     $whereClause = "AND created_date BETWEEN '$startDate' AND '$endDate'";

                        // } elseif (!empty($month) && !empty($year)) {
                        //     $startDate = "$year-$month-01";
                        //     $endDate = date("Y-m-t", strtotime($startDate)); // Last day of the month
                        //     $whereClause = "AND created_date BETWEEN '$startDate' AND '$endDate'";
                        
                        // } elseif (!empty($year)) {
                        //     $whereClause = "AND YEAR(created_date) = '$year'";
                        
                        // }


                        // Construct the SQL query
                        // $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                        // $sql = "SELECT vendor_sale_patient.operator_id 
                        //         FROM vendor_sale_patient 
                        //         WHERE vendor_sale_patient.doctor_id = $AdminCareUnitID $whereClause";
                        //         //  $sql .= $whereClause;
                        // $careunit_facility_counts = $this->common_model->customQuery($sql);
                        // $user_facility_counts = count($careunit_facility_counts);
                        // $data['total_patient_doctors'] = $user_facility_counts;



                //     $date = date("Y-m-d");
                //     $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                // $Sql = "SELECT vendor_sale_patient.operator_id FROM vendor_sale_patient WHERE vendor_sale_patient.doctor_id = $AdminCareUnitID";
                // $careunit_facility_counts = $this->common_model->customQuery($Sql);
                // $user_facility_counts = count($careunit_facility_counts);
                // $data['total_patient_doctors'] = $user_facility_counts;


                // $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                // $Sql = "SELECT vendor_sale_patient.operator_id FROM vendor_sale_patient WHERE vendor_sale_patient.doctor_id = $AdminCareUnitID AND  DATE(created_date) = '$date'";
                // $careunit_facility_counts = $this->common_model->customQuery($Sql);
                // $user_facility_counts = count($careunit_facility_counts);
                // $data['total_today_patient_doctors'] = $user_facility_counts;


                // $data['initial_dx_doctor'] = $this->common_model->customCount(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0)));
                // $data['initial_rx_doctor'] = $this->common_model->customCount(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0)));

                

                // $this->load->admin_render('dashboard', $data);

                if($this->ion_auth->is_all_roleslogin()) {

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
                
                $date = date("Y-m-d");   
                $week = $this->input->get('weeks');
                $month = $this->input->get('month');
                $year = $this->input->get('year');

                // Build the WHERE clause based on the selected date range
                $whereClause = '';

                if (!empty($week)) {
                    // Calculate the start and end dates for the selected week
                    $startDate = date("Y-m-d", strtotime("last monday", strtotime("+$week week")));
                    $endDate = date("Y-m-d", strtotime("next sunday", strtotime("+$week week")));
                    $whereClause = "AND created_date BETWEEN '$startDate' AND '$endDate'";
                } elseif (!empty($month) && !empty($year)) {
                    // Create the date range for the selected month and year
                    $startDate = "$year-$month-01";
                    $endDate = date("Y-m-t", strtotime($startDate)); // Last day of the month
                    $whereClause = "AND created_date BETWEEN '$startDate' AND '$endDate'";
                
                } elseif (!empty($year)) {
                    // Filter by the selected year
                    $whereClause = "AND YEAR(created_date) = '$year'";

                    
                }
                // print_r($whereClause);die;

                $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                
                $Sql = "SELECT vendor_sale_users.care_unit_id FROM vendor_sale_users WHERE vendor_sale_users.id = '$CareUnitID'";
                // print_r($Sql);die;
                $careUnit_list_id = $this->common_model->customQuery($Sql);
                $care_unit_ids = [];
                foreach ($careUnit_list_id as $values) {
                    $care_unit_ids = $values->care_unit_id;
                }

                $transaction_array = str_replace(array('[', '"', ']'), '', $care_unit_ids);
                $careUnit_lists = explode(",", $transaction_array);
                //  print_r($y);die;
                $careunit_facility_counts = [];
                foreach ($careUnit_lists as $uids) {
                    $Sql = "SELECT vendor_sale_care_unit.id,vendor_sale_care_unit.care_unit_code,vendor_sale_care_unit.name,vendor_sale_care_unit.email FROM vendor_sale_care_unit WHERE vendor_sale_care_unit.id ='$uids'";
                    $careunit_facility_counts[] = $this->common_model->customQuery($Sql);
                }
                $arraySingle = call_user_func_array('array_merge', $careunit_facility_counts);
                $y = count($arraySingle);
                //print_r($y);die;
                // $this->data['careUnit'] = $arraySingle;
                $data['careUnit'] = $y;


                $data['initial_dx'] = $this->common_model->customCount(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0) ,$whereClause));
                $data['initial_rx'] = $this->common_model->customCount(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0)));
                
                $data['total_earning'] = $this->common_model->customGet(array(
                    'table' => 'vendor_sale_invoice_pay',
                    'select' => 'pay_amount',
                    'where' => array('facility_user_id' => $CareUnitID)
                ));
                
                // Sum the `pay_amount` column in PHP
                $total_pay = 0;
                foreach ($data['total_earning'] as $value) {
                    $total_pay += $value->pay_amount;
                }
                
                $data['total_pay'] =$total_pay;
                // print_r($data['total_earning']);die;
                // $data['doctors'] = $this->common_model->customCount(array('table' => 'doctors', 'select' => 'id,name', 'where' => array('is_active' => 1, 'doctors.facility_user_id'=>$user_id, 'delete_status' => 0)));

                
                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.id',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                        array('user_profile UP', 'UP.user_id=user.id', 'inner'),
                        // array('doctors D', 'D.facility_user_id=user.id', 'inner')
                    ),
                    // 'order' => array('user.id' => 'ASC'),
                    'where' => array(
                        'user.delete_status' => 0,
                        'group.id' => 5,
                        // 'user.id'=>$CareUnitID 
                        // 'D.facility_user_id'=>$hospital_id
                        'user.hospital_id'=>$hospital_id 
                    ) ,$whereClause,
                    
                    'order' => array('user.id' => 'desc'),
                );
                $data['doctors'] = $this->common_model->customCount($option);
                // print_r($data['doctors']);die;
                $option = array(
                    'table' => ' doctors',
                    'select' => 'users.*,doctors_qualification.*',
                    'join' => array(
                        array('users', 'doctors.user_id=users.id', 'left'),
                        array('user_profile UP', 'UP.user_id=users.id', 'left'),
                        array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                        
                    ),
                    
                    'where' => array(
                        'users.delete_status' => 0,
                        // 'doctors.facility_user_id'=>$CareUnitID
                        'users.hospital_id'=>$hospital_id
                    ),$whereClause,
                    'order' => array('users.id' => 'desc'),
                );
                $data['doctors_list'] = $this->common_model->customGet($option);
                // print_r($data['doctors_list']);die;


                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.id',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                        array('user_profile UP', 'UP.user_id=user.id', 'inner')
                    ),
                    'order' => array('user.id' => 'ASC'),
                    'where' => array(
                        'user.delete_status' => 0,
                        'group.id' => 5
                    ),$whereClause,
                    'order' => array('user.id' => 'desc'),
                );
                $data['total_md_steward'] = $this->common_model->customCount($option);

                $option = array(
                    'table' => "patient P",
                    'select' => "P.id"
                );
               
                $datadoctors = $this->common_model->customGet($option);
                $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                $option = array(
                    'table' => ' doctors',
                    'select' => 'doctors.*',
                    'join' => array(
                        array('users', 'doctors.user_id=users.id', 'left'),  
                    ),
                    $whereClause,
                    'where' => array(
                        'users.delete_status' => 0,
                        'doctors.facility_user_id'=>$CareUnitID
                    ),
                    'single' => true,
                );

            $datadoctorsss = $this->common_model->customGet($option);
                
// 'user.hospital_id'=>$hospital_id 

                $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                // $Sql = "SELECT vendor_sale_patient.operator_id FROM vendor_sale_patient WHERE vendor_sale_patient.operator_id = $hospital_id $whereClause";
               
                $optionAppointment = array(
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
                
                    'group_by' => 'pid'
                );
        
        
                // if (!empty($date)) {
                //     $optionAppointment['where']['P.created_date'] = $date;
                // }
        
                if (!empty($hospital_id)) {
                    
                    $optionAppointment['where']['U.hospital_id'] = $hospital_id;
                }
                
                $careunit_facility_counts= $this->common_model->customGet($optionAppointment);
                $user_facility_counts = count($careunit_facility_counts);
                $data['total_patient_doctors'] = $user_facility_counts;
                // $careunit_facility_counts = $this->common_model->customQuery($Sql);
                // $user_facility_counts = count($careunit_facility_counts);
                // $data['total_patient'] = $user_facility_counts;
                // print_r($data['total_patient_doctors']);die;


                $date = date("Y-m-d");
                // print_r($date);die;
                $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
               
                // $Sql = "SELECT vendor_sale_patient.operator_id FROM vendor_sale_patient WHERE vendor_sale_patient.operator_id = $hospital_id AND  DATE(created_date) = '$date'  $whereClause";
                
                $optionAppointment = array(
                    'table' => 'users U',
                    'select' => 'P.id as patient_id,P.patient_id as pid,P.name as patient_name,P.date_of_start_abx,P.address,P.total_days_of_patient_stay,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.md_patient_status,P.created_date,'
                        . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                        . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                        . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.comment,U.email,U.phone',
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
                    // 'where'=> array(date('P.created_date')=>$date),
                    'group_by' => 'pid'
                );
                // $this->db->where('DATE(P.created_date)', $date);
        
                if (!empty($date)) {
                    $optionAppointment['where']['DATE(P.created_date)'] = $date;
                }
        
                if (!empty($hospital_id)) {
                    
                    $optionAppointment['where']['U.hospital_id'] = $hospital_id;
                }
                
                $careunit_facility_counts= $this->common_model->customGet($optionAppointment);
                $user_facility_counts = count($careunit_facility_counts);
                $data['total_today_patient_doctors'] = $user_facility_counts;

               
                
                $data['today_patient_list'] = $this->common_model->customGet($optionAppointment);

                // $option = array(
                //     'table' => USERS . ' as user',
                //     'select' => 'user.id',
                //     'join' => array(
                //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                //         array('user_profile UP', 'UP.user_id=user.id', 'inner')
                //     ),
                //     'order' => array('user.id' => 'ASC'),
                //     'where' => array(
                //         'user.delete_status' => 0,
                //         'group.id' => 5,
                //         'user.id'=>$AdminCareUnitID,
                //     ) , $whereClause,
                //     'order' => array('user.id' => 'desc'),
                // );
                $AppointmentcurrentDate = date('Y-m-d');
                $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        FROM vendor_sale_clinic_appointment
        LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
        LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        WHERE (
            vendor_sale_clinic_appointment.start_date_appointment LIKE '%$AppointmentcurrentDate%'
            OR vendor_sale_clinic_appointment.theatre_date_time LIKE '%$AppointmentcurrentDate%'
            OR vendor_sale_clinic_appointment.out_start_time_at LIKE '%$AppointmentcurrentDate%'
            OR vendor_sale_clinic_appointment.start_date_availability LIKE '%$AppointmentcurrentDate%'
        )
        ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                 vendor_sale_clinic_appointment.theatre_date_time DESC,
                 vendor_sale_clinic_appointment.out_start_time_at DESC,
                 vendor_sale_clinic_appointment.start_date_availability DESC";

                $result = $this->db->query($sql);

                $totalAppointment = $result->result();

                // print_r($option);die;
                $data['total_appointment'] = $this->common_model->customCount($totalAppointment);
                
              

        $AppointmentcurrentDate = date('Y-m-d');
                $sql = "SELECT 
                vsca.*, 
                U.first_name, 
                U.last_name, 
                UP.address1, 
                UP.city, 
                UP.state, 
                pa.name as patient_name, 
                cl.name as clinic_name, 
                cl.clinic_location, 
                pr.name as practitioner_name
                FROM vendor_sale_clinic_appointment vsca
                LEFT JOIN vendor_sale_users U ON vsca.location_appointment = U.id
                LEFT JOIN vendor_sale_patient pa ON vsca.patient = pa.user_id
                LEFT JOIN vendor_sale_clinic cl ON vsca.location_appointment = cl.id
                LEFT JOIN vendor_sale_user_profile UP ON UP.user_id = U.id
                LEFT JOIN vendor_sale_practitioner pr ON vsca.practitioner = pr.id
                WHERE (
                vsca.start_date_appointment LIKE ?
                OR vsca.theatre_date_time LIKE ?
                OR vsca.out_start_time_at LIKE ?
                OR vsca.start_date_availability LIKE ?
                )
                ORDER BY vsca.start_date_appointment DESC,
                    vsca.theatre_date_time DESC,
                    vsca.out_start_time_at DESC,
                    vsca.start_date_availability DESC";

                // Bind the $currentDate parameter with wildcards
                $result = $this->db->query($sql, array('%' . $AppointmentcurrentDate . '%', '%' . $AppointmentcurrentDate . '%', '%' . $AppointmentcurrentDate . '%', '%' . $AppointmentcurrentDate . '%'));

                $data['clinic_appointment'] = $result->result();


                $this->load->admin_render('dashboard', $data);

                    // redirect('patient', 'refresh');
                }
                /* else if ($this->ion_auth->is_facilityManager()) {
                    
               
                    $this->load->admin_render('dashboard', $data);
                } */ else {
                   
                    // print_r($data);die;
                    // $this->load->admin_render('dashboard', $data);
                }
            
               

            }
             else if ($this->ion_auth->is_vendor()) {
                $this->load->admin_render('vendorDashboard', $this->data, 'inner_script');

            } 
             else if ($this->ion_auth->is_facilityManager()) {
                $user_id = $this->session->userdata('user_id');
                // print_r($user_id);die;

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
                
                
                $date = date("Y-m-d");   
                $week = $this->input->get('weeks');
                $month = $this->input->get('month');
                $year = $this->input->get('year');

                // Build the WHERE clause based on the selected date range
                $whereClause = '';

                if (!empty($week)) {
                    // Calculate the start and end dates for the selected week
                    $startDate = date("Y-m-d", strtotime("last monday", strtotime("+$week week")));
                    $endDate = date("Y-m-d", strtotime("next sunday", strtotime("+$week week")));
                    $whereClause = "AND created_date BETWEEN '$startDate' AND '$endDate'";
                } elseif (!empty($month) && !empty($year)) {
                    // Create the date range for the selected month and year
                    $startDate = "$year-$month-01";
                    $endDate = date("Y-m-t", strtotime($startDate)); // Last day of the month
                    $whereClause = "AND created_date BETWEEN '$startDate' AND '$endDate'";
                
                } elseif (!empty($year)) {
                    // Filter by the selected year
                    $whereClause = "AND YEAR(created_date) = '$year'";

                    
                }
                // print_r($whereClause);die;

                $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                
                $Sql = "SELECT vendor_sale_users.care_unit_id FROM vendor_sale_users WHERE vendor_sale_users.id = '$CareUnitID'";
                // print_r($Sql);die;
                $careUnit_list_id = $this->common_model->customQuery($Sql);
                $care_unit_ids = [];
                foreach ($careUnit_list_id as $values) {
                    $care_unit_ids = $values->care_unit_id;
                }

                $transaction_array = str_replace(array('[', '"', ']'), '', $care_unit_ids);
                $careUnit_lists = explode(",", $transaction_array);
                //  print_r($y);die;
                $careunit_facility_counts = [];
                foreach ($careUnit_lists as $uids) {
                    $Sql = "SELECT vendor_sale_care_unit.id,vendor_sale_care_unit.care_unit_code,vendor_sale_care_unit.name,vendor_sale_care_unit.email FROM vendor_sale_care_unit WHERE vendor_sale_care_unit.id ='$uids'";
                    $careunit_facility_counts[] = $this->common_model->customQuery($Sql);
                }
                $arraySingle = call_user_func_array('array_merge', $careunit_facility_counts);
                $y = count($arraySingle);
                //print_r($y);die;
                // $this->data['careUnit'] = $arraySingle;
                $data['careUnit'] = $y;


                $data['initial_dx'] = $this->common_model->customCount(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('hospital_id'=>$hospital_id,'is_active' => 1, 'delete_status' => 0)));
                $data['initial_rx'] = $this->common_model->customCount(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('hospital_id'=>$hospital_id,'is_active' => 1, 'delete_status' => 0)));
                // $data['doctors'] = $this->common_model->customCount(array('table' => 'doctors', 'select' => 'id,name', 'where' => array('is_active' => 1, 'doctors.facility_user_id'=>$user_id, 'delete_status' => 0)));

                $data['total_earning'] = $this->common_model->customGet(array(
                    'table' => 'vendor_sale_invoice_pay',
                    'select' => 'pay_amount',
                    'where' => array('facility_user_id' => $hospital_id)
                ));
                
                // Sum the `pay_amount` column in PHP
                $total_pay = 0;
                foreach ($data['total_earning'] as $value) {
                    $total_pay += $value->pay_amount;
                }
                
                $data['total_pay'] =$total_pay;
                // print_r($total_pay);
                // die;
                
                

                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.id',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                        array('user_profile UP', 'UP.user_id=user.id', 'inner'),
                        // array('doctors D', 'D.facility_user_id=user.id', 'inner')
                    ),
                    // 'order' => array('user.id' => 'ASC'),
                    'where' => array(
                        'user.delete_status' => 0,
                        'group.id' => 5,
                        // 'user.id'=>$CareUnitID 
                        // 'D.facility_user_id'=>$hospital_id
                        'user.hospital_id'=>$hospital_id 
                    ) ,$whereClause,
                    
                    'order' => array('user.id' => 'desc'),
                );
                $data['doctors'] = $this->common_model->customCount($option);
                // print_r($data['doctors']);die;
                $option = array(
                    'table' => ' doctors',
                    'select' => 'users.*,doctors_qualification.*',
                    'join' => array(
                        array('users', 'doctors.user_id=users.id', 'left'),
                        array('user_profile UP', 'UP.user_id=users.id', 'left'),
                        array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                        
                    ),
                    
                    'where' => array(
                        'users.delete_status' => 0,
                        // 'doctors.facility_user_id'=>$CareUnitID
                        'users.hospital_id'=>$hospital_id
                    ),$whereClause,
                    'order' => array('users.id' => 'desc'),
                );
                $data['doctors_list'] = $this->common_model->customGet($option);
                // print_r($data['doctors_list']);die;


                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.id',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                        array('user_profile UP', 'UP.user_id=user.id', 'inner')
                    ),
                    'order' => array('user.id' => 'ASC'),
                    'where' => array(
                        'user.delete_status' => 0,
                        'group.id' => 5
                    ),$whereClause,
                    'order' => array('user.id' => 'desc'),
                );
                $data['total_md_steward'] = $this->common_model->customCount($option);

                $option = array(
                    'table' => "patient P",
                    'select' => "P.id"
                );
               
                $datadoctors = $this->common_model->customGet($option);
                $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                $option = array(
                    'table' => ' doctors',
                    'select' => 'doctors.*',
                    'join' => array(
                        array('users', 'doctors.user_id=users.id', 'left'),  
                    ),
                    $whereClause,
                    'where' => array(
                        'users.delete_status' => 0,
                        'doctors.facility_user_id'=>$CareUnitID
                    ),
                    'single' => true,
                );

            $datadoctorsss = $this->common_model->customGet($option);
                
// 'user.hospital_id'=>$hospital_id 

                $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                // $Sql = "SELECT vendor_sale_patient.operator_id FROM vendor_sale_patient WHERE vendor_sale_patient.operator_id = $hospital_id $whereClause";
               
                $optionAppointment = array(
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
                
                    'group_by' => 'pid'
                );
        
        
                // if (!empty($date)) {
                //     $optionAppointment['where']['P.created_date'] = $date;
                // }
        
                if (!empty($hospital_id)) {
                    
                    $optionAppointment['where']['U.hospital_id'] = $hospital_id;
                }
                
                $careunit_facility_counts= $this->common_model->customGet($optionAppointment);
                $user_facility_counts = count($careunit_facility_counts);
                $data['total_patient'] = $user_facility_counts;
                // $careunit_facility_counts = $this->common_model->customQuery($Sql);
                // $user_facility_counts = count($careunit_facility_counts);
                // $data['total_patient'] = $user_facility_counts;
                // print_r($data['total_patient']);die;


                $date = date("Y-m-d");
                // print_r($date);die;
                $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
               
                // $Sql = "SELECT vendor_sale_patient.operator_id FROM vendor_sale_patient WHERE vendor_sale_patient.operator_id = $hospital_id AND  DATE(created_date) = '$date'  $whereClause";
                
                $optionAppointment = array(
                    'table' => 'users U',
                    'select' => 'P.id as patient_id,P.patient_id as pid,P.name as patient_name,P.date_of_start_abx,P.address,P.total_days_of_patient_stay,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.md_patient_status,P.created_date,'
                        . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                        . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                        . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.comment,U.email,U.phone',
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
                    // 'where'=> array(date('P.created_date')=>$date),
                    'group_by' => 'pid'
                );
                // $this->db->where('DATE(P.created_date)', $date);
        
                if (!empty($date)) {
                    $optionAppointment['where']['DATE(P.created_date)'] = $date;
                }
        
                if (!empty($hospital_id)) {
                    
                    $optionAppointment['where']['U.hospital_id'] = $hospital_id;
                }
                
                $careunit_facility_counts= $this->common_model->customGet($optionAppointment);
                $user_facility_counts = count($careunit_facility_counts);
                $data['total_patient_today'] = $user_facility_counts;

               
                
                $data['today_patient_list'] = $this->common_model->customGet($optionAppointment);

                // $option = array(
                //     'table' => USERS . ' as user',
                //     'select' => 'user.id',
                //     'join' => array(
                //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                //         array('user_profile UP', 'UP.user_id=user.id', 'inner')
                //     ),
                //     'order' => array('user.id' => 'ASC'),
                //     'where' => array(
                //         'user.delete_status' => 0,
                //         'group.id' => 5,
                //         'user.id'=>$AdminCareUnitID,
                //     ) , $whereClause,
                //     'order' => array('user.id' => 'desc'),
                // );

                // $today = date('Y-m-d'); // Assuming you're getting the current date
                // $hospital_id = (int)$hospital_id; // Assuming $hospital_id is an integer
                
        //         $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, 
        //         pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        //  FROM vendor_sale_users as U
        //  LEFT JOIN vendor_sale_clinic_appointment ON vendor_sale_clinic_appointment.location_appointment = U.id
        //  LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        //  LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        //  LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        //  LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        //  WHERE U.hospital_id = ? 
        //  AND (
        //      vendor_sale_clinic_appointment.start_date_appointment LIKE ? 
        //      OR vendor_sale_clinic_appointment.theatre_date_time LIKE ? 
        //      OR vendor_sale_clinic_appointment.out_start_time_at LIKE ? 
        //      OR vendor_sale_clinic_appointment.start_date_availability LIKE ?
        //  )
        //  ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
        //           vendor_sale_clinic_appointment.theatre_date_time DESC,
        //           vendor_sale_clinic_appointment.out_start_time_at DESC,
        //           vendor_sale_clinic_appointment.start_date_availability DESC";

//         $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, 
//         pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
//  FROM vendor_sale_clinic_appointment
//  LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
//  LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
//  LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
//  LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
//  LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
//  WHERE (
//      vendor_sale_clinic_appointment.start_date_appointment LIKE ? 
//      OR vendor_sale_clinic_appointment.theatre_date_time LIKE ? 
//      OR vendor_sale_clinic_appointment.out_start_time_at LIKE ? 
//      OR vendor_sale_clinic_appointment.start_date_availability LIKE ?
//  )
//  ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
//           vendor_sale_clinic_appointment.theatre_date_time DESC,
//           vendor_sale_clinic_appointment.out_start_time_at DESC,
//           vendor_sale_clinic_appointment.start_date_availability DESC";

// $result = $this->db->query($sql, array("%$today%", "%$today%", "%$today%", "%$today%", $hospital_id));
// $result = $this->db->query($sql, array("%$today%", "%$today%", "%$today%", "%$today%"));
// $totalAppointment = $result->result();
// print_r($totalAppointment);die;
//  $data['total_appointment'] = count($totalAppointment);
 
// $data['total_appointment'] = $result->result();
                // Assuming you have a customCount method in common_model for counting
                // $data['total_appointment'] = $this->common_model->customCount($totalAppointment);
                
                // print_r($data['total_appointment']);die;

        // $AppointmentcurrentDate = date('Y-m-d');
        // $today = date('Y-m-d'); // Assuming you're getting the current date
        // $hospital_id = (int)$hospital_id; // Assuming $hospital_id is an integer
        
        // $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        // FROM vendor_sale_clinic_appointment
        // LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
        // LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        // LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        // LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        // LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        // -- WHERE (vendor_sale_clinic_appointment.practitioner IN ($practitionerId) OR vendor_sale_clinic_appointment.theatre_clinician IN ($practitionerId))
        // WHERE (
        //     vendor_sale_clinic_appointment.start_date_appointment LIKE '%$today%'
        //     OR vendor_sale_clinic_appointment.theatre_date_time LIKE '%$today%'
        //     OR vendor_sale_clinic_appointment.out_start_time_at LIKE '%$today%'
        //     OR vendor_sale_clinic_appointment.start_date_availability LIKE '%$today%'
        // )
        // ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
        //          vendor_sale_clinic_appointment.theatre_date_time DESC,
        //          vendor_sale_clinic_appointment.out_start_time_at DESC,
        //          vendor_sale_clinic_appointment.start_date_availability DESC";

// $result = $this->db->query($sql);

// $data['clinic_appointment'] = $result->result();




// print_r($data['clinic_appointment']);die;
        
        // $result = $this->db->query($sql, array("%$today%", "%$today%", "%$today%", "%$today%", $hospital_id));
        // $result = $this->db->query($sqlList, array("%$today%", "%$today%", "%$today%", "%$today%"));
        // $totalAppointment = $result->result();
        // $data['clinic_appointment'] = $this->common_model->customQuery($sqlList);
        // $data['clinic_appointment'] = $this->common_model->customGet($result);

        // $data['clinic_appointment'] = $this->common_model->customQuery($result);
        // Assuming you have a customCount method in common_model for counting
        // $data['total_appointment'] = $this->common_model->customCount($totalAppointment);
        
                // $data['clinic_appointment'] = $result->result();


                $today = date('Y-m-d'); // Assuming you're getting the current date
$hospital_id = (int)$hospital_id; // Assuming $hospital_id is an integer

$sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, 
               pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        FROM vendor_sale_clinic_appointment
        LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
        LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        WHERE (
            vendor_sale_clinic_appointment.start_date_appointment LIKE ? 
            OR vendor_sale_clinic_appointment.theatre_date_time LIKE ? 
            OR vendor_sale_clinic_appointment.out_start_time_at LIKE ? 
            OR vendor_sale_clinic_appointment.start_date_availability LIKE ?
        )
        AND U.hospital_id = ?
        ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                 vendor_sale_clinic_appointment.theatre_date_time DESC,
                 vendor_sale_clinic_appointment.out_start_time_at DESC,
                 vendor_sale_clinic_appointment.start_date_availability DESC";

$result = $this->db->query($sql, array("%$today%", "%$today%", "%$today%", "%$today%", $hospital_id));
$totalAppointment = $result->result();

// Assuming you have a customCount method in common_model for counting
$data['total_appointment'] = $this->common_model->customCount($totalAppointment);


                // $result = $this->db->query($sql);

                // $totalAppointment = $result->result();

                // // print_r($option);die;
                // $data['total_appointment'] = $this->common_model->customCount($totalAppointment);
                
              

        $AppointmentcurrentDate = date('Y-m-d');
        $today = date('Y-m-d'); // Assuming you're getting the current date
        $hospital_id = (int)$hospital_id; // Assuming $hospital_id is an integer
        
        $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, 
                       pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
                FROM vendor_sale_clinic_appointment
                LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
                LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
                LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
                LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
                LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
                WHERE (
                    vendor_sale_clinic_appointment.start_date_appointment LIKE ? 
                    OR vendor_sale_clinic_appointment.theatre_date_time LIKE ? 
                    OR vendor_sale_clinic_appointment.out_start_time_at LIKE ? 
                    OR vendor_sale_clinic_appointment.start_date_availability LIKE ?
                )
                AND U.hospital_id = ?
                ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                         vendor_sale_clinic_appointment.theatre_date_time DESC,
                         vendor_sale_clinic_appointment.out_start_time_at DESC,
                         vendor_sale_clinic_appointment.start_date_availability DESC";
        
        $result = $this->db->query($sql, array("%$today%", "%$today%", "%$today%", "%$today%", $hospital_id));
        $totalAppointment = $result->result();
        
        // Assuming you have a customCount method in common_model for counting
        $data['total_appointment'] = $this->common_model->customCount($totalAppointment);
        
        
                $data['clinic_appointment'] = $result->result();


                
                
                $this->load->admin_render('dashboard', $data);

        

             }
             else if ($this->ion_auth->is_all_roleslogin()) {
                $user_id = $this->session->userdata('user_id');
                // print_r($user_id);die;
              

                 if($this->ion_auth->is_all_roleslogin()) {
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
                $date = date("Y-m-d");   
                $week = $this->input->get('weeks');
                $month = $this->input->get('month');
                $year = $this->input->get('year');

                // Build the WHERE clause based on the selected date range
                $whereClause = '';

                if (!empty($week)) {
                    // Calculate the start and end dates for the selected week
                    $startDate = date("Y-m-d", strtotime("last monday", strtotime("+$week week")));
                    $endDate = date("Y-m-d", strtotime("next sunday", strtotime("+$week week")));
                    $whereClause = "AND created_date BETWEEN '$startDate' AND '$endDate'";
                } elseif (!empty($month) && !empty($year)) {
                    // Create the date range for the selected month and year
                    $startDate = "$year-$month-01";
                    $endDate = date("Y-m-t", strtotime($startDate)); // Last day of the month
                    $whereClause = "AND created_date BETWEEN '$startDate' AND '$endDate'";
                
                } elseif (!empty($year)) {
                    // Filter by the selected year
                    $whereClause = "AND YEAR(created_date) = '$year'";

                    
                }
                // print_r($whereClause);die;

                $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                
                $Sql = "SELECT vendor_sale_users.care_unit_id FROM vendor_sale_users WHERE vendor_sale_users.id = '$CareUnitID'";
                // print_r($Sql);die;
                $careUnit_list_id = $this->common_model->customQuery($Sql);
                $care_unit_ids = [];
                foreach ($careUnit_list_id as $values) {
                    $care_unit_ids = $values->care_unit_id;
                }

                $transaction_array = str_replace(array('[', '"', ']'), '', $care_unit_ids);
                $careUnit_lists = explode(",", $transaction_array);
                //  print_r($y);die;
                $careunit_facility_counts = [];
                foreach ($careUnit_lists as $uids) {
                    $Sql = "SELECT vendor_sale_care_unit.id,vendor_sale_care_unit.care_unit_code,vendor_sale_care_unit.name,vendor_sale_care_unit.email FROM vendor_sale_care_unit WHERE vendor_sale_care_unit.id ='$uids'";
                    $careunit_facility_counts[] = $this->common_model->customQuery($Sql);
                }
                $arraySingle = call_user_func_array('array_merge', $careunit_facility_counts);
                $y = count($arraySingle);
                //print_r($y);die;
                // $this->data['careUnit'] = $arraySingle;
                $data['careUnit'] = $y;

              
                
                $data['initial_dx'] = $this->common_model->customCount(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('hospital_id'=>$hospital_id,'is_active' => 1, 'delete_status' => 0)));
                $data['initial_rx'] = $this->common_model->customCount(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('hospital_id'=>$hospital_id,'is_active' => 1, 'delete_status' => 0)));
                // $data['doctors'] = $this->common_model->customCount(array('table' => 'doctors', 'select' => 'id,name', 'where' => array('is_active' => 1, 'doctors.facility_user_id'=>$user_id, 'delete_status' => 0)));
              
                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.id',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                        array('user_profile UP', 'UP.user_id=user.id', 'inner'),
                        // array('doctors D', 'D.facility_user_id=user.id', 'inner')
                    ),
                    // 'order' => array('user.id' => 'ASC'),
                    'where' => array(
                        'user.delete_status' => 0,
                        'group.id' => 5,
                        // 'user.id'=>$CareUnitID 
                        // 'D.facility_user_id'=>$hospital_id
                        'user.hospital_id'=>$hospital_id 
                    ) ,$whereClause,
                    
                    'order' => array('user.id' => 'desc'),
                );
                $data['doctors'] = $this->common_model->customCount($option);
                // print_r($data['doctors']);die;
                $option = array(
                    'table' => ' doctors',
                    'select' => 'users.*,doctors_qualification.*',
                    'join' => array(
                        array('users', 'doctors.user_id=users.id', 'left'),
                        array('user_profile UP', 'UP.user_id=users.id', 'left'),
                        array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                        
                    ),
                    
                    'where' => array(
                        'users.delete_status' => 0,
                        // 'doctors.facility_user_id'=>$CareUnitID
                        'users.hospital_id'=>$hospital_id
                    ),$whereClause,
                    'order' => array('users.id' => 'desc'),
                );
                $data['doctors_list'] = $this->common_model->customGet($option);
                // print_r($data['doctors_list']);die;


                $option = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.id',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                        array('user_profile UP', 'UP.user_id=user.id', 'inner')
                    ),
                    'order' => array('user.id' => 'ASC'),
                    'where' => array(
                        'user.delete_status' => 0,
                        'group.id' => 5
                    ),$whereClause,
                    'order' => array('user.id' => 'desc'),
                );
                $data['total_md_steward'] = $this->common_model->customCount($option);

                $option = array(
                    'table' => "patient P",
                    'select' => "P.id"
                );
               
                $datadoctors = $this->common_model->customGet($option);
                $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                $option = array(
                    'table' => ' doctors',
                    'select' => 'doctors.*',
                    'join' => array(
                        array('users', 'doctors.user_id=users.id', 'left'),  
                    ),
                    $whereClause,
                    'where' => array(
                        'users.delete_status' => 0,
                        'doctors.facility_user_id'=>$CareUnitID
                    ),
                    'single' => true,
                );

            $datadoctorsss = $this->common_model->customGet($option);
                
// 'user.hospital_id'=>$hospital_id 

                $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                // $Sql = "SELECT vendor_sale_patient.operator_id FROM vendor_sale_patient WHERE vendor_sale_patient.operator_id = $hospital_id $whereClause";
               
                $optionAppointment = array(
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
                
                    'group_by' => 'pid'
                );
        
        
                // if (!empty($date)) {
                //     $optionAppointment['where']['P.created_date'] = $date;
                // }
        
                if (!empty($hospital_id)) {
                    
                    $optionAppointment['where']['U.hospital_id'] = $hospital_id;
                }
                
                $careunit_facility_counts= $this->common_model->customGet($optionAppointment);
                $user_facility_counts = count($careunit_facility_counts);
                $data['total_patient_doctors'] = $user_facility_counts;
                // $careunit_facility_counts = $this->common_model->customQuery($Sql);
                // $user_facility_counts = count($careunit_facility_counts);
                // $data['total_patient'] = $user_facility_counts;
                // print_r($data['total_patient_doctors']);die;


                $date = date("Y-m-d");
                // print_r($date);die;
                $AdminCareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
               
                // $Sql = "SELECT vendor_sale_patient.operator_id FROM vendor_sale_patient WHERE vendor_sale_patient.operator_id = $hospital_id AND  DATE(created_date) = '$date'  $whereClause";
                
                $optionAppointment = array(
                    'table' => 'users U',
                    'select' => 'P.id as patient_id,P.patient_id as pid,P.name as patient_name,P.date_of_start_abx,P.address,P.total_days_of_patient_stay,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.md_patient_status,P.created_date,'
                        . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                        . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                        . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.comment,U.email,U.phone',
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
                    // 'where'=> array(date('P.created_date')=>$date),
                    'group_by' => 'pid'
                );
                // $this->db->where('DATE(P.created_date)', $date);
        
                if (!empty($date)) {
                    $optionAppointment['where']['DATE(P.created_date)'] = $date;
                }
        
                if (!empty($hospital_id)) {
                    
                    $optionAppointment['where']['U.hospital_id'] = $hospital_id;
                }
                
                $careunit_facility_counts= $this->common_model->customGet($optionAppointment);
                $user_facility_counts = count($careunit_facility_counts);
                $data['total_today_patient_doctors'] = $user_facility_counts;

               
                
                // $data['today_patient_list'] = $this->common_model->customGet($optionAppointment);


                $optionAppointment = array(
                    'table' => 'users U',
                    'select' => 'P.id as patient_id,P.patient_id as pid,P.name as patient_name,P.date_of_start_abx,P.address,P.total_days_of_patient_stay,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.md_patient_status,P.created_date,'
                        . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                        . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                        . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.comment,U.email,U.phone',
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
                    // 'where'=> array(date('P.created_date')=>$date),
                    'group_by' => 'pid'
                );
                // $this->db->where('DATE(P.created_date)', $date);
        
                if (!empty($date)) {
                    $optionAppointment['where']['DATE(P.created_date)'] = $date;
                }
        
                if (!empty($hospital_id)) {
                    
                    $optionAppointment['where']['U.hospital_id'] = $hospital_id;
                }
                
                $careunit_facility_counts= $this->common_model->customGet($optionAppointment);
                $user_facility_counts = count($careunit_facility_counts);
                $data['total_patient_today'] = $user_facility_counts;


                $totalPatients = array(
                    'table' => 'users U',
                    'select' => 'P.id as patient_id,P.patient_id as pid,P.name as patient_name,P.date_of_start_abx,P.address,P.total_days_of_patient_stay,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.md_patient_status,P.created_date,'
                        . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_stayward,'
                        . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                        . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.comment,U.email,U.phone',
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
                    // 'where'=> array(date('P.created_date')=>$date),
                    'group_by' => 'pid'
                );
                if (!empty($hospital_id)) {
                    
                    $totalPatients['where']['U.hospital_id'] = $hospital_id;
                }
                
                $totalPatient_counts= $this->common_model->customGet($totalPatients);
                $totalPatientHospital = count($totalPatient_counts);

                $data['total_patient'] = $totalPatientHospital;

               
                
                $data['today_patient_list'] = $this->common_model->customGet($optionAppointment);


                // $option = array(
                //     'table' => USERS . ' as user',
                //     'select' => 'user.id',
                //     'join' => array(
                //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                //         array('user_profile UP', 'UP.user_id=user.id', 'inner')
                //     ),
                //     'order' => array('user.id' => 'ASC'),
                //     'where' => array(
                //         'user.delete_status' => 0,
                //         'group.id' => 5,
                //         'user.id'=>$AdminCareUnitID,
                //     ) , $whereClause,
                //     'order' => array('user.id' => 'desc'),
                // );

                $today = date('Y-m-d'); // Assuming you're getting the current date
$hospital_id = (int)$hospital_id; // Assuming $hospital_id is an integer

$sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, 
               pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        FROM vendor_sale_clinic_appointment
        LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
        LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        WHERE (
            vendor_sale_clinic_appointment.start_date_appointment LIKE ? 
            OR vendor_sale_clinic_appointment.theatre_date_time LIKE ? 
            OR vendor_sale_clinic_appointment.out_start_time_at LIKE ? 
            OR vendor_sale_clinic_appointment.start_date_availability LIKE ?
        )
        AND U.hospital_id = ?
        ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                 vendor_sale_clinic_appointment.theatre_date_time DESC,
                 vendor_sale_clinic_appointment.out_start_time_at DESC,
                 vendor_sale_clinic_appointment.start_date_availability DESC";

$result = $this->db->query($sql, array("%$today%", "%$today%", "%$today%", "%$today%", $hospital_id));
$totalAppointment = $result->result();

// Assuming you have a customCount method in common_model for counting
$data['total_appointment'] = $this->common_model->customCount($totalAppointment);


                // $result = $this->db->query($sql);

                // $totalAppointment = $result->result();

                // // print_r($option);die;
                // $data['total_appointment'] = $this->common_model->customCount($totalAppointment);
                
              

        $AppointmentcurrentDate = date('Y-m-d');
        $today = date('Y-m-d'); // Assuming you're getting the current date
        $hospital_id = (int)$hospital_id; // Assuming $hospital_id is an integer
        
        $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, 
                       pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
                FROM vendor_sale_clinic_appointment
                LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
                LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
                LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
                LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
                LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
                WHERE (
                    vendor_sale_clinic_appointment.start_date_appointment LIKE ? 
                    OR vendor_sale_clinic_appointment.theatre_date_time LIKE ? 
                    OR vendor_sale_clinic_appointment.out_start_time_at LIKE ? 
                    OR vendor_sale_clinic_appointment.start_date_availability LIKE ?
                )
                AND U.hospital_id = ?
                ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                         vendor_sale_clinic_appointment.theatre_date_time DESC,
                         vendor_sale_clinic_appointment.out_start_time_at DESC,
                         vendor_sale_clinic_appointment.start_date_availability DESC";
        
        $result = $this->db->query($sql, array("%$today%", "%$today%", "%$today%", "%$today%", $hospital_id));
        $totalAppointment = $result->result();
        
        // Assuming you have a customCount method in common_model for counting
        $data['total_appointment'] = $this->common_model->customCount($totalAppointment);
        
        
                $data['clinic_appointment'] = $result->result();


                $this->load->admin_render('dashboard', $data);


            } else {

                
                $this->session->set_flashdata('message', 'You are not authorised to access administration');
                // echo "not login";
                redirect('pwfpanel/login', 'refresh');
            }
        }
    }

    public function getcharts()
    {
        $return = array();
        $return['status'] = 200;
        $filterval = $this->input->post('filterval');
        $year = date('Y');
        $where = " YEAR(U.`created_date`) = $year ";
        $where1 = " YEAR(U.`datetime`) = $year ";
        if ($filterval == "lastYear") {
            $year = date("Y", strtotime("-1 year"));
            $where = " YEAR(U.`created_date`) = $year ";
            $where1 = " YEAR(U.`datetime`) = $year ";
        }
        if ($filterval == "lastMonth") {
            $month = date("m", strtotime("-1 month"));
            $where = " YEAR(U.`created_date`) = $year AND MONTH(U.`created_date`) = $month ";
            $where1 = " YEAR(U.`datetime`) = $year AND MONTH(U.`datetime`) = $month ";
        }
        if ($filterval == "currentMonth") {
            $month = date("m");
            $where = " YEAR(U.`created_date`) = $year AND MONTH(U.`created_date`) = $month ";
            $where1 = " YEAR(U.`datetime`) = $year AND MONTH(U.`datetime`) = $month ";
        }
        if ($filterval == "today") {
            $date = date("Y-m-d");
            $where = " DATE(U.`created_date`) = $date ";
            $where1 = " DATE(U.`datetime`) = $date ";
        }

        $Sql = "SELECT COUNT(U.id) total ,MONTH(U.`created_date`) as months
        FROM  vendor_sale_patient U
        WHERE   $where 
        GROUP BY  MONTH(U.`created_date`)";
        $TotalVendors = $this->common_model->customQuery($Sql);
        $vendor = array();
        $totalv = 0;
        foreach ($TotalVendors as $rows) {
            $temp = array();
            $temp[] = $rows->months;
            $temp[] = $rows->total;
            $vendor[] = $temp;
            $totalv = $totalv + $rows->total;
        }

        $return['vendors'] = $vendor;

        $return['totalv'] = $totalv;

        echo json_encode($return);
    }

    public function getTablesVendor()
    {
        $return = array();
        $return['status'] = 200;
        $filterval = $this->input->post('filterval');
        $year = date('Y');
        $where = " YEAR(U.`created_date`) = $year ";
        $where1 = " YEAR(U.`datetime`) = $year ";
        if ($filterval == "lastYear") {
            $year = date("Y", strtotime("-1 year"));
            $where = " YEAR(U.`created_date`) = $year ";
            $where1 = " YEAR(U.`datetime`) = $year ";
        }
        if ($filterval == "lastMonth") {
            $month = date("m", strtotime("-1 month"));
            $where = " YEAR(U.`created_date`) = $year AND MONTH(U.`created_date`) = $month ";
            $where1 = " YEAR(U.`datetime`) = $year AND MONTH(U.`datetime`) = $month ";
        }
        if ($filterval == "currentMonth") {
            $month = date("m");
            $where = " YEAR(U.`created_date`) = $year AND MONTH(U.`created_date`) = $month ";
            $where1 = " YEAR(U.`datetime`) = $year AND MONTH(U.`datetime`) = $month ";
        }
        if ($filterval == "today") {
            $date = date("Y-m-d");
            $where = " DATE(U.`created_date`) = $date ";
            $where1 = " DATE(U.`datetime`) = $date ";
        }

        $Sql = "SELECT MONTH(U.`created_date`) as months,U.*
        FROM  vendor_sale_users U  INNER JOIN vendor_sale_users_groups UG on UG.user_id=U.id
        WHERE   $where AND UG.group_id =3 ";
        $return['vendors'] = $this->common_model->customQuery($Sql);
        $this->load->view('table_vendor', $return);
    }

    public function getTablesUsers()
    {
        $return = array();
        $return['status'] = 200;
        $filterval = $this->input->post('filterval');
        $year = date('Y');
        $where = " YEAR(U.`created_date`) = $year ";
        $where1 = " YEAR(U.`datetime`) = $year ";
        if ($filterval == "lastYear") {
            $year = date("Y", strtotime("-1 year"));
            $where = " YEAR(U.`created_date`) = $year ";
            $where1 = " YEAR(U.`datetime`) = $year ";
        }
        if ($filterval == "lastMonth") {
            $month = date("m", strtotime("-1 month"));
            $where = " YEAR(U.`created_date`) = $year AND MONTH(U.`created_date`) = $month ";
            $where1 = " YEAR(U.`datetime`) = $year AND MONTH(U.`datetime`) = $month ";
        }
        if ($filterval == "currentMonth") {
            $month = date("m");
            $where = " YEAR(U.`created_date`) = $year AND MONTH(U.`created_date`) = $month ";
            $where1 = " YEAR(U.`datetime`) = $year AND MONTH(U.`datetime`) = $month ";
        }

        if ($filterval == "today") {
            $date = date("Y-m-d");
            $where = " DATE(U.`created_date`) = $date ";
            $where1 = " DATE(U.`datetime`) = $date ";
        }

        $Sql = "SELECT MONTH(U.`created_date`) as months,U.*
        FROM  vendor_sale_users U  INNER JOIN vendor_sale_users_groups UG on UG.user_id=U.id
        WHERE   $where AND UG.group_id =2 ";
        $return['users'] = $this->common_model->customQuery($Sql);
        $this->load->view('table_user', $return);
    }

    public function getTablesEnquiries()
    {
        $return = array();
        $return['status'] = 200;
        $filterval = $this->input->post('filterval');
        $year = date('Y');
        $where = " YEAR(U.`created_date`) = $year ";
        $where1 = " YEAR(CU.`datetime`) = $year ";
        if ($filterval == "lastYear") {
            $year = date("Y", strtotime("-1 year"));
            $where = " YEAR(U.`created_date`) = $year ";
            $where1 = " YEAR(CU.`datetime`) = $year ";
        }
        if ($filterval == "lastMonth") {
            $month = date("m", strtotime("-1 month"));
            $where = " YEAR(U.`created_date`) = $year AND MONTH(U.`created_date`) = $month ";
            $where1 = " YEAR(CU.`datetime`) = $year AND MONTH(CU.`datetime`) = $month ";
        }
        if ($filterval == "currentMonth") {
            $month = date("m");
            $where = " YEAR(U.`created_date`) = $year AND MONTH(U.`created_date`) = $month ";
            $where1 = " YEAR(CU.`datetime`) = $year AND MONTH(CU.`datetime`) = $month ";
        }

        if ($filterval == "today") {
            $date = date("Y-m-d");
            $where = " DATE(U.`created_date`) = $date ";
            $where1 = " DATE(U.`datetime`) = $date ";
        }

        $Sql = "SELECT U.*,CU.id as inq_id,CU.email as clinet_email,CU.rq_licenses,CU.rq_software_categories,
        CU.rq_expected_live,CU.rq_solution_offering,CU.description,CU.datetime as enquiry_date,
        P.company_name,UP.first_name as c_first_name,UP.last_name as c_last_name
        FROM  vendor_sale_client_inquiry CU INNER JOIN  vendor_sale_users U ON U.id=CU.vendor_id
        INNER JOIN vendor_sale_users UP ON UP.id=CU.user_id 
        INNER JOIN vendor_sale_user_profile P ON P.user_id=U.id
        WHERE  $where1 AND CU.is_request_draft = 'no'
        ";
        $return['enquiries'] = $this->common_model->customQuery($Sql);
        $this->load->view('table_enquiries', $return);
    }

    public function logAuth()
    {
        $this->data['title'] = $this->lang->line('login_heading');
        $this->load->view('login_new', $this->data);
    }


    public function resendTwoFactor()
    {
        // die('kkk');

        $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // table update with 2fa code in current user mail id
        // Update vendor_sale_users table with 2FA code
        $userID = $this->ion_auth->get_user_id();

        // Retrieve the email from the vendor_sale_users table using the user ID
        $query = $this->db->get_where('vendor_sale_users', array('id' => $userID));
        $result = $query->row();

        // Check if a user was found and get the email
        $email = isset($result->email) ? $result->email : '';


        $updateData = array(
            'twofactor_code' => $code,
            'update_on' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $userID);
        $this->db->update('vendor_sale_users', $updateData);
        $isTwoFactorDone = $this->twoFactor($code, $email);
        if ($isTwoFactorDone) {
            $this->session->set_flashdata('error_message', '');
            $_SESSION["code_expired"] = '';
            $_SESSION["wrong_code"] = '';
            $this->session->set_flashdata('success_message', 'We re-sent code to your email.');

            $this->load->view('pwfpanel/2fa', 'refresh');
        } else {
            $this->session->set_flashdata('success_message', '');

            $this->session->set_flashdata('error_message', $this->ion_auth->errors());
            redirect('pwfpanel/login', 'refresh');
        }

        // return back()->with('success', 'We re-sent code to on your email.');
    }


    public function twoFactor($code, $to_email)
    {
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = '587';  // Use TLS port
        $config['smtp_timeout'] = '30';  // Set a higher timeout value, e.g., 30 seconds
        $config['smtp_crypto'] = 'tls';  // Use TLS encryption
        $config['smtp_user'] = 'arpitjain.digiprima@gmail.com';
        $config['smtp_pass'] = 'boosqinmynpzbbwg';   // Replace with your Gmail app password
        $config['charset'] = 'iso-8859-1';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;
        $config['wordwrap'] = TRUE;
        $config['mail_debug'] = true;  // Enable debugging

        $from = 'arpitjain.digiprima@gmail.com';
        // Replace with your Gmail email
        $title = 'Hospital Management';
        $subject = 'Hospital Management Login Varification Mail';

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($from, $title);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $message = '<div class="container text-center">
    

        <h3 class="text-center">Mail Sent from Hospital Management</h3>
        <p class="text-center">You are receiving this email because we received a token request for your account.</p>
        <h1 class="text-center" style="font-size: 2em;">Your code is: ' . $code . '.</h1>
        <p class="text-center">This token will expire in 5 minutes.</p>
        <p class="text-center">Thank you</p>
        </div>';

        $this->email->message($message);

        if ($this->email->send()) {
            // echo "Sent mail";
            return true;
        } else {
            // echo "Failed mail";
            echo "Debugging information: " . $this->email->print_debugger();
            return false;
        }
    }

    public function two_factor_confirm()
    {

        $code = $this->input->post('code');
        $userID = $this->ion_auth->get_user_id();

        // Retrieve the email from the vendor_sale_users table using the user ID
        $query = $this->db->get_where('vendor_sale_users', array('id' => $userID));
        $result = $query->row();

        // Check if a user was found and get the email
        $code_from_table = isset($result->twofactor_code) ? $result->twofactor_code : '';
        $table_update_on = new DateTime($result->update_on);
        $current_date = new DateTime(date('Y-m-d H:i:s'));

        // Calculate the difference
        $time_difference = $table_update_on->diff($current_date);

        // Check if the difference is greater than or equal to 5 minutes
        if ($time_difference->i >= 5) {
            // Output the difference
            $_SESSION["wrong_code"] = '';
            $_SESSION["code_expired"] = "code is expired, please resend it.";
            $this->load->view('pwfpanel/2fa', 'refresh');
        } else {
            // echo "Time Difference is less than 5 minutes";
            if ($code == $code_from_table) {

                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('pwfpanel', 'refresh');
            } else {
                $_SESSION["code_expired"] = '';
                $_SESSION["wrong_code"] = "You have entered the wrong code";
                $this->load->view('pwfpanel/2fa', 'refresh');
            }
        }
    }


    public function login()
    {
        
        // echo 'hello user login';die;
        $this->data['title'] = $this->lang->line('login_heading');
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
        if (strtolower(getConfig('google_captcha')) == 'on') {
            $this->form_validation->set_rules('g-recaptcha-response', 'Google recaptcha', 'required');
        
}
        
        if ($this->form_validation->run() == true) {
            $is_captcha = true;
            if (strtolower(getConfig('google_captcha')) == 'on') {
                if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                    $secret = getConfig('secret_key');
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
                    $responseData = json_decode($verifyResponse);
                    $is_captcha = $responseData->success;
                }
            }
            
            if ($is_captcha) {
                
                $remember = (bool) $this->input->post('remember');
                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                    
                    
                    if ($this->ion_auth->is_superAdmin()) {
                        
                        $option = array(
                            'table' => 'users',
                            'select' => 'users.id',
                            'join' => array(
                                'users_groups' => 'users_groups.user_id=users.id',
                                'groups' => 'groups.id=users_groups.group_id'
                            ),
                            'where' => array(
                                'users.email' => $this->input->post('identity'),
                                'groups.id' => 1
                            ),
                        );
                        $isAdmin = $this->common_model->customGet($option);
                        
                        redirect('pwfpanel', 'refresh');

                    }

                     if($this->ion_auth->is_admin()) {
                        $option = array(
                            'table' => 'users',
                            'select' => 'users.id',
                            'join' => array(
                                'users_groups' => 'users_groups.user_id=users.id',
                                'groups' => 'groups.id=users_groups.group_id'
                            ),
                            'where' => array(
                                'users.email' => $this->input->post('identity'),
                                'groups.id' => 2
                            ),
                        );
                        $isAdmin = $this->common_model->customGet($option);
                        redirect('pwfpanel', 'refresh');

                //     } else if ($this->ion_auth->is_subAdmin()) {
                //         $option = array(
                //             'table' => 'users',
                //             'select' => 'users.id,users.care_unit_id',
                //             'join' => array(
                //                 'users_groups' => 'users_groups.user_id=users.id',
                //                 'groups' => 'groups.id=users_groups.group_id'
                //             ),
                //             'where' => array(
                //                 'users.email' => $this->input->post('identity'),
                //                 'groups.id' => 4
                //             ),
                //         );
                //         $option = array(
                //             'table' => USERS . ' as user',
                //             'select' => 'user.id,user.first_name,user.last_name,user.email,user.login_id,user.created_on,user.active,group.name as group_name,UP.doc_file,CU.care_unit_code,CU.name,d.facility_user_id',
                //             'join' => array(
                //                 array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                //                 array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                //                 array('user_profile UP', 'UP.user_id=user.id', 'left'),
                //                 array('care_unit CU', 'CU.id=user.care_unit_id', 'left'),
                //                 array('doctors AS d', 'd.user_id = user.id', 'left')
                //             ),
                           
                //             'where' => array('user.email' => $this->input->post('identity') )
                            
                //         );
                //         //print_r($optionds);die;
                       
                //         $isAdmin = $this->common_model->customGet($option);
                //         $doctorfacility=$isAdmin[0]->facility_user_id;
                //         $option1 = array(
                //             'table' => 'vendor_sale_hospital',
                //             'select' => 'token_uniq',
                //             'where' => array('user_id' =>$doctorfacility),
                //             'single' => true,
                //         );
                        



                //         $result2 = $this->db->get_where($option1['table'], $option1['where'])->row();
                //         if($this->input->post('uniq_id')!=null){
                //        $tokenid= $result2->token_uniq;
                //        if ($tokenid==$this->input->post('uniq_id')) {
                        
                       
                //         if (!empty($isAdmin)) {
                //             $_SESSION['admin_care_unit_id'] = $isAdmin[0]->care_unit_id;
                //             $option = array(
                //                 'table' => 'login_session',
                //                 'where' => array(
                //                     'user_id' => $isAdmin[0]->id
                //                 ),
                //             );
                //             $isLogin = $this->common_model->customGet($option);
                //             if (!empty($isLogin) or empty($isLogin)) {

                //                 $option = array(
                //                     'table' => 'login_session',
                //                     'data' => array(
                //                         'login_session_key' => get_guid(),
                //                         'user_id' => $isAdmin[0]->id,
                //                         'login_ip' => $_SERVER['REMOTE_ADDR'],
                //                         'last_login' => time()
                //                     ),
                //                 );
                //                 $this->common_model->customInsert($option);
                //             }
                //         }
                //         redirect('pwfpanel', 'refresh');
                //     }else{
                //         $this->session->set_flashdata('error', 'Please input  token');
           
                //         redirect('pwfpanel/login', 'refresh');
                //     }
                // }else {
                //     $this->session->set_flashdata('error', 'Please input  token');
                //     redirect('pwfpanel/login', 'refresh');
                // }
                
                    } 
                    if ($this->ion_auth->is_facilityManager()) {
                        $option = array(
                            'table' => 'users',
                            'select' => 'users.id,users.care_unit_id',
                            'join' => array(
                                'users_groups' => 'users_groups.user_id=users.id',
                                'groups' => 'groups.id=users_groups.group_id'
                            ),
                            'where' => array(
                                'users.email' => $this->input->post('identity'),
                                'groups.id' => 5
                            ),
                        );
                        $option1 = array(
                            'table' => 'vendor_sale_hospital',
                            'select' => 'token_uniq',
                            'where' => array('email' => $this->input->post('identity')),
                            'single' => true,
                        );
                        



                        $result2 = $this->db->get_where($option1['table'], $option1['where'])->row();
                        //print_r($result->token_uniq);
                        //$uniqid=$result->token_uniq
                        if($this->input->post('uniq_id')!=null){
                            
                            if ($result2->token_uniq== $this->input->post('uniq_id')) {   

                                    $isAdmin = $this->common_model->customGet($option);
                                    if (!empty($isAdmin)) {
                                        $_SESSION['admin_care_unit_id'] = $isAdmin[0]->care_unit_id;
                                        $option = array(
                                            'table' => 'login_session',
                                            'where' => array(
                                                'user_id' => $isAdmin[0]->id
                                            ),
                                        );
                                        $isLogin = $this->common_model->customGet($option);
                                        if (!empty($isLogin) or empty($isLogin)) {

                                            $option = array(
                                                'table' => 'login_session',
                                                'data' => array(
                                                    'login_session_key' => get_guid(),
                                                    'user_id' => $isAdmin[0]->id,
                                                    'login_ip' => $_SERVER['REMOTE_ADDR'],
                                                    'last_login' => time()
                                                ),
                                            );
                                            $this->common_model->customInsert($option);
                                        }
                                    }
                                redirect('pwfpanel', 'refresh');

                            }else{
                                $this->session->set_flashdata('error', 'Please input  token');
                                redirect('pwfpanel/login', 'refresh');
                            }

                        }else {
                            $this->session->set_flashdata('error', 'Please input  token');
                            redirect('pwfpanel/login', 'refresh');
                        }
                    } 


                    if ($this->ion_auth->is_all_roleslogin()) {
                            
                        $option = array(
                            'table' => 'users',
                            'select' => 'users.*',
                            'join' => array(
                                'users_groups' => 'users_groups.user_id=users.id',
                                'groups' => 'groups.id=users_groups.group_id'
                            ),
                            'where' => array(
                                'users.email' => $this->input->post('identity'),
                                // 'groups.id' => 5
                            ),
                            'single' => true,
                        );
                        $isAdmin = $this->common_model->customGet($option);

                       
                        $option1 = array(
                            'table' => 'vendor_sale_hospital',
                            'select' => 'token_uniq',
                            'where' => array('user_id' => $isAdmin->hospital_id),
                            'single' => true,
                        );
                        
                        $result2 = $this->common_model->customGet($option1);


                        // $result2 = $this->db->get_where($option1['table'], $option1['where'])->row();
                       
                        //$uniqid=$result->token_uniq
                        if($this->input->post('uniq_id')!=null){
                           
                            if ($result2->token_uniq== $this->input->post('uniq_id')) {   

                                   
                                    if (!empty($isAdmin)) {
                                        
                                        $_SESSION['admin_care_unit_id'] = $isAdmin->care_unit_id;
                                        $option2 = array(
                                            'table' => 'login_session',
                                            'where' => array(
                                                'user_id' => $isAdmin->id
                                            ),
                                            'single' => true,
                                        );
                                        $isLogin = $this->common_model->customGet($option2);
                                        
                                        if (!empty($isLogin) or empty($isLogin)) {

                                            $option3 = array(
                                                'table' => 'login_session',
                                                'data' => array(
                                                    'login_session_key' => get_guid(),
                                                    'user_id' => $isAdmin->id,
                                                    'login_ip' => $_SERVER['REMOTE_ADDR'],
                                                    'last_login' => time()
                                                ),
                                            );
                                            $this->common_model->customInsert($option3);
                                       
                                redirect('pwfpanel', 'refresh');
                            }
                        }

                            }else{
                                $this->session->set_flashdata('error', 'Please input  token');
                                redirect('pwfpanel/login', 'refresh');
                            }

                        }else {
                            $this->session->set_flashdata('error', 'Please input  token');
                            redirect('pwfpanel/login', 'refresh');
                        }
                    }
                
                } else if (empty($isAdmin)) {
                    $this->session->set_flashdata('message', "Incorrect Login");
                    redirect('pwfpanel/login');
                // }
                $this->session->set_flashdata('message', $this->ion_auth->messages());

                $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

                // table update with 2fa code in current user mail id
                // Update vendor_sale_users table with 2FA code
                $userID = $this->ion_auth->get_user_id();

                // Retrieve the email from the vendor_sale_users table using the user ID
                $query = $this->db->get_where('vendor_sale_users', array('id' => $userID));
                $result = $query->row();

                // Check if a user was found and get the email
                $email = isset($result->email) ? $result->email : '';


                $updateData = array(
                    'twofactor_code' => $code,
                    'update_on' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', $userID);
                $this->db->update('vendor_sale_users', $updateData);
                $isTwoFactorDone = $this->twoFactor($code, $email);
                // die('kkk');

                if ($isTwoFactorDone) {

                    $this->load->view('pwfpanel/2fa', 'refresh');
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect('pwfpanel/login', 'refresh');
                }
                redirect('pwfpanel', 'refresh');
            // }

                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect('pwfpanel/login', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', "Robot verification failed, please try again");
                redirect('pwfpanel/login', 'refresh');
            }
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
                'placeholder' => 'Identity'
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'placeholder' => 'Password'
            );
            $this->data['parent'] = "Login";
            $this->data['title'] = "Login";
            
            $this->load->view('login', $this->data);
        }
    }

    /**
     * @method vendorLogin
     * @description login authentication
     * @return array
     */
    public function vendorLogin()
    {
        $this->data['title'] = $this->lang->line('login_heading');
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if (strtolower(getConfig('google_captcha')) == 'on') {
            $this->form_validation->set_rules('g-recaptcha-response', 'Google recaptcha', 'required');
        }

        if ($this->form_validation->run() == true) {

            $is_captcha = true;
            if (strtolower(getConfig('google_captcha')) == 'on') {
                if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                    $secret = getConfig('secret_key');
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
                    $responseData = json_decode($verifyResponse);
                    $is_captcha = $responseData->success;
                }
            }

            if ($is_captcha) {

                $remember = (bool) $this->input->post('remember');

                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                    $option = array(
                        'table' => 'users',
                        'select' => 'users.id',
                        'join' => array(
                            'users_groups' => 'users_groups.user_id=users.id',
                            'groups' => 'groups.id=users_groups.group_id'
                        ),
                        'where' => array(
                            'users.email' => $this->input->post('identity'),
                            'groups.id' => 3
                        ),
                    );
                    $isAdmin = $this->common_model->customGet($option);
                    if (empty($isAdmin)) {
                        $this->session->set_flashdata('message', "Incorrect Login");
                        redirect('site/authVendorLogin');
                    }
                    $this->session->set_flashdata('message', $this->ion_auth->messages());

                    redirect('pwfpanel', 'refresh');
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect('site/authVendorLogin', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
                }
            } else {
                $this->session->set_flashdata('message', "Robot verification failed, please try again");
                redirect('site/authVendorLogin', 'refresh');
            }
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
                'placeholder' => 'Identity'
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'placeholder' => 'Password'
            );
            $this->load->view('vendor_login', $this->data);
        }
    }

    /**
     * @method authSecurityLogin
     * @description security point double check login point configuration
     * @return array
     */
    function authSecurityLogin()
    {
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
        if ($this->form_validation->run() == true) {
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), false)) {
                $this->session->set_userdata('isConfigLoggedIn', TRUE);
                $this->session->set_flashdata('success', "Successfully security unlock");
                redirect('configuration');
            } else {
                $this->session->set_flashdata('errMessage', "Incorrect Login");
                redirect('configuration');
            }
        } else {
            $errMessage = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->session->set_flashdata('errMessage', $errMessage);
            redirect('configuration');
        }
    }

    /**
     * @method logout
     * @description logout
     * @return array
     */
    public function logout()
    {
        $this->data['title'] = "Logout";
        $logout = $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        $logoutUrl = base_url() . 'pwfpanel/login';
        if ($this->ion_auth->is_admin()) {
            $logoutUrl = base_url() . '/pwfpanel/login';
        } else if ($this->ion_auth->is_vendor()) {
            $logoutUrl = base_url() . 'site/authVendorLogin';
        } else if ($this->ion_auth->is_subAdmin()) {
            $logoutUrl = base_url() . 'pwfpanel/login';
        } else if ($this->ion_auth->is_facilityManager()) {
            $logoutUrl = base_url() . 'pwfpanel/login';
        }
        $this->session->unset_userdata('isConfigLoggedIn');
        $response = array('status' => 1, 'message' => $this->ion_auth->messages(), 'url' => $logoutUrl);
        echo json_encode($response);
    }

    /**
     * @method profile
     * @description profile display
     * @return array
     */
    public function profile()
    {
        $user= $this->session->userdata('user_id');
        $this->data['parent'] = "Profile";
        // $this->adminIsAuth();
        $option = array(
            'table' => 'users',
            'select' => 'users.*',
            'where' => array('id' => $user),
            'single' => true,
        );
      // print_r($option);die;
        $userss = $this->common_model->customGet($option);
        $this->data['user'] =$userss;
        $this->data['title'] = "Profile";
       
        $this->load->admin_render('profile', $this->data, 'inner_script');
    }

    /**
     * @method updateProfile
     * @description user profile update
     * @return array
     */
    public function updateProfile()
    {
        $this->adminIsAuth();
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', "Last Name", 'required');
        if ($this->form_validation->run() == true) {

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name')
            );
            if ($this->ion_auth->update($this->session->userdata('user_id'), $additional_data)) {
                $this->session->set_flashdata('message', 'your profile account has been updated successfully');
                redirect('pwfpanel/profile');
            } else {
                $this->session->set_flashdata('message', 'your profile account has been updated successfully');
                redirect('pwfpanel/profile');
            }
        } else {
            $requireds = strip_tags($this->form_validation->error_string());
            $result = explode("\n", trim($requireds, "\n"));
            $this->session->set_flashdata('error', $result);
            redirect('pwfpanel/profile/');
        }
    }

    /**
     * @method password
     * @description change password dispaly
     * @return array
     */
    public function password()
    {
        $this->data['parent'] = "Password";
        $this->adminIsAuth();
        $this->data['error'] = "";
        $this->data['message'] = "";
        $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
        $this->data['old_password'] = array(
            'name' => 'old',
            'id' => 'old',
            'type' => 'password',
            'class' => 'form-control'
        );
        $this->data['new_password'] = array(
            'name' => 'new',
            'id' => 'new',
            'type' => 'password',
            'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            'class' => 'form-control'
        );
        $this->data['new_password_confirm'] = array(
            'name' => 'new_confirm',
            'id' => 'new_confirm',
            'type' => 'password',
            'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            'class' => 'form-control'
        );
        $this->data['user_id'] = array(
            'name' => 'user_id',
            'id' => 'user_id',
            'type' => 'hidden',
            'value' => $this->session->userdata('user_id'),
        );
        $this->data['title'] = "Password";
        $this->load->admin_render('changePassword', $this->data);
    }

    /**
     * @method change_password
     * @description change password
     * @return array
     */
    public function change_password()
    {
        $data['parent'] = "Password";
        $this->adminIsAuth();

        $data['title'] = "Password";
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[6]|max_length[14]|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

        if (!$this->ion_auth->logged_in()) {
            redirect('pwfpanel/login', 'refresh');
        }

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false) {

            $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $data['old_password'] = array(
                'name' => 'old',
                'id' => 'old',
                'type' => 'password',
                'class' => 'form-control'
            );
            $data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'type' => 'password',
                'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
                'class' => 'form-control'
            );
            $data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
                'class' => 'form-control'
            );
            $data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $this->session->userdata('user_id'),
            );
            $this->load->admin_render('changePassword', $data);
        } else {

            $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('message', "The new password has been saved successfully.");
                redirect('pwfpanel/password');
            } else {
                $this->session->set_flashdata('error', "The old password you entered was incorrect");
                redirect('pwfpanel/change_password');
            }
        }
    }

    /**
     * @method forgot_password
     * @description forgot password
     * @return array
     */
    public function forgot_password()
    {
        $this->data['parent'] = "Forgot Password";
        if ($this->config->item('identity', 'ion_auth') != 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        } else {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }
        if ($this->form_validation->run() == false) {
            $this->data['type'] = $this->config->item('identity', 'ion_auth');
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'placeholder' => 'Email',
                'class' => 'form-control'
            );
            if ($this->config->item('identity', 'ion_auth') != 'email') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('forgot_password', $this->data);
        } else {
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();
            if (empty($identity)) {
                if ($this->config->item('identity', 'ion_auth') != 'email') {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                } else {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("pwfpanel/forgot_password", 'refresh');
            }
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});
            if ($forgotten) {

                $dataArr = array();
                $dataArr['email'] = $forgotten['identity'];
                /* Get User Data From Users Table */
                $result = $this->common_model->getsingle(USERS, $dataArr);

                /** Verification email * */
                $EmailTemplate = getEmailTemplate("forgot_password");
                if (!empty($EmailTemplate)) {
                    $html = array();
                    $html['active_url'] = base_url() . "pwfpanel/reset_password/" . $forgotten['forgotten_password_code'];
                    $html['logo'] = base_url() . getConfig('site_logo');
                    $html['site'] = getConfig('site_name');
                    $html['site_meta_title'] = getConfig('site_meta_title');
                    $html['user'] = ucwords($result->first_name);
                    $html['email'] = $result->email;
                    $html['content'] = $EmailTemplate->description;
                    $email_template = $this->load->view('email-template/forgot_password', $html, true);
                    $title = '[' . getConfig('site_name') . '] ' . $EmailTemplate->title;
                    send_mail($email_template, $title, $forgotten['identity'], getConfig('admin_email'));
                }
                //$this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('message', "An email has been sent Reset Password link, please check spam folder if you do not received it in your inbox and add our mail id in your addressbook.");
                redirect("pwfpanel/login", 'refresh'); //we should display a confirmation 
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("pwfpanel/forgot_password", 'refresh');
            }
        }
    }

    /**
     * @method reset_password
     * @description reset password
     * @return array
     */
    public function reset_password($code = NULL)
    {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[6]|max_length[14]|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $this->input->post('new'))) {
                if (isset($_POST['new'])) {
                    $this->data['message'] = "The Password Should be required alphabetic and numeric";
                }

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'placeholder' => 'New Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                    'class' => 'form-control input-lg'
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'placeholder' => 'Confirm Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                    'class' => 'form-control input-lg'
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;


                $this->load->view('pwfpanel/reset_password', $this->data);
            } else if ($this->form_validation->run() == false) {

                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'placeholder' => 'New Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'placeholder' => 'Confirm Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;


                $this->load->view('pwfpanel/reset_password', $this->data);
            } else {

                if ($user->id != $this->input->post('user_id')) {


                    $this->ion_auth->clear_forgotten_password_code($code);

                    $this->session->set_flashdata('message', $this->lang->line('error_csrf'));
                    redirect('pwfpanel/reset_password/' . $code, 'refresh');
                } else {

                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {

                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect("pwfpanel/login", 'refresh');
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('pwfpanel/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', "Token has been expired");
            redirect("pwfpanel/forgot_password", 'refresh');
        }
    }

    public function reset_password_app($code = NULL)
    {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);
        $this->data['reset_type'] = "APP";
        if ($user) {

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[6]|max_length[14]|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $this->input->post('new'))) {
                if (isset($_POST['new'])) {
                    $this->data['message'] = "The Password Should be required alphabetic and numeric";
                }

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'placeholder' => 'New Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                    'class' => 'form-control input-lg'
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'placeholder' => 'Confirm Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                    'class' => 'form-control input-lg'
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;


                $this->load->view('pwfpanel/reset_password_app', $this->data);
            } else if ($this->form_validation->run() == false) {

                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'placeholder' => 'New Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'placeholder' => 'Confirm Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;


                $this->load->view('pwfpanel/reset_password_app', $this->data);
            } else {

                if ($user->id != $this->input->post('user_id')) {


                    $this->ion_auth->clear_forgotten_password_code($code);

                    $this->session->set_flashdata('message', $this->lang->line('error_csrf'));
                    redirect('pwfpanel/reset_password_app/' . $code, 'refresh');
                } else {

                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
                    if ($change) {

                        $this->session->set_flashdata('success', $this->ion_auth->messages());
                        redirect('pwfpanel/passConfirmAuth/');
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('pwfpanel/reset_password_app/' . $code, 'refresh');
                    }
                }
            }
        } else {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', "Token has been expired");
            redirect('pwfpanel/passConfirmAuth/');
        }
    }

    public function resetPasswordApp($code = NULL)
    {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {


            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[6]|max_length[14]|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {

                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'placeholder' => 'New Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'placeholder' => 'Confirm Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;


                $this->load->view('pwfpanel/reset_password_app', $this->data);
            } else if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $this->input->post('new'))) {
                $this->data['message'] = "The Password Should be required alphabetic and numeric";
                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'placeholder' => 'New Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'placeholder' => 'Confirm Password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;


                $this->load->view('pwfpanel/reset_password_app', $this->data);
            } else {

                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {


                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));
                } else {
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};
                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
                    if ($change) {

                        $options = array(
                            'table' => USERS,
                            'data' => array('is_pass_token' => $this->input->post('new')),
                            'where' => array('id' => $user->id)
                        );
                        $this->common_model->customUpdate($options);


                        $this->session->set_flashdata('success', $this->ion_auth->messages());
                        redirect('pwfpanel/passConfirmAuth/');
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('pwfpanel/resetPasswordApp/' . $code, 'refresh');
                    }
                }
            }
        } else {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', "Reset Password link has been expired");
            redirect("pwfpanel/forgot_password", 'refresh');
        }
    }

    public function passConfirmAuth()
    {
        $this->load->view('pwfpanel/success_view');
    }

    /**
     * @method _get_csrf_nonce
     * @description generate csrf
     * @return array
     */
    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    /**
     * @method _valid_csrf_nonce
     * @description valid csrf
     * @return array
     */
    public function _valid_csrf_nonce()
    {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function orders()
    {
        // $id = decoding($this->input->post('id'));
        $option = array(
            'table' => 'orders',
            'select' => 'users.phone,users.email,users.first_name,users.last_name,orders.id,orders.order_code as order_id,orders.order_date,
                            IFNULL(shipping_date,"") as shipping_date,orders.final_price as total_amount,
                            orders.transact_status,orders.delivery_fee,orders.discounted_price,
                            user_address.address1,user_address.address2,user_address.city,"India" as country,
                            user_address.pin_code,states.name as state_name',
            'join' => array(
                'users' => 'users.id=orders.user_id',
                'user_address' => 'user_address.id=orders.address_id',
                'states' => 'states.id=user_address.state'
            ),
            // 'where' => array('orders.id' => $id),
            'single' => true
        );
        $this->data['order'] = $order = $this->common_model->customGet($option);
        if (!empty($order)) {
            $option = array(
                'table' => 'order_products as BTMOP',
                'select' => 'item.item_code,item.item_name,item.image,BTMOP.product_qty,BTMOP.product_price,BTMOP.total_product_price,BTMOP.final_price',
                'join' => array('item' => 'item.id=BTMOP.product_id'),
                'where' => array('BTMOP.order_id' => $id)
            );
            $this->data['products'] = $this->common_model->customGet($option);
        }
        $this->load->view('order_details', $this->data);
    }

    public function viewOrder()
    {
        $id = decoding($this->input->post('id'));
        $option = array(
            'table' => 'orders',
            'select' => 'users.phone,users.email,users.first_name,users.last_name,orders.total_product_price,orders.id,orders.order_code as order_id,orders.order_date,
                            IFNULL(shipping_date,"") as shipping_date,orders.final_price as total_amount,
                            orders.transact_status,orders.delivery_fee,orders.discounted_price,
                            user_address.address1,user_address.address2,user_address.city,"India" as country,
                            user_address.pin_code,states.name as state_name',
            'join' => array(
                'users' => 'users.id=orders.user_id',
                'user_address' => 'user_address.id=orders.address_id',
                'states' => 'states.id=user_address.state'
            ),
            'where' => array('orders.id' => $id),
            'single' => true
        );
        $this->data['order'] = $order = $this->common_model->customGet($option);
        if (!empty($order)) {
            $option = array(
                'table' => 'order_products as BTMOP',
                'select' => 'item.item_code,item.item_name,item.image,BTMOP.product_qty,BTMOP.product_price,BTMOP.total_product_price,BTMOP.final_price',
                'join' => array('item' => 'item.id=BTMOP.product_id'),
                'where' => array('BTMOP.order_id' => $id)
            );
            $this->data['products'] = $this->common_model->customGet($option);
        }
        $this->load->view('order_details', $this->data);
    }

    public function editOrder()
    {
        $id = decoding($this->input->post('id'));
        $option = array(
            'table' => 'orders',
            'select' => 'users.email,users.first_name,users.last_name,orders.total_product_price,orders.id,orders.order_code as order_id,orders.order_date,
                            IFNULL(shipping_date,"") as shipping_date,orders.final_price as total_amount,
                            orders.transact_status,orders.delivery_fee,orders.discounted_price,orders.payment_status,produced_date,packed_date,delivered_date,dispatched_date',
            'join' => array('users' => 'users.id=orders.user_id'),
            'where' => array('orders.id' => $id),
            'single' => true
        );
        $this->data['results'] = $order = $this->common_model->customGet($option);
        $this->load->view('order_edit', $this->data);
    }

    public function order_update()
    {

        $this->form_validation->set_rules('transact_status', "transact_status", 'required|trim|xss_clean|numeric');
        $this->form_validation->set_rules('shipping_date', "shipping_date", 'trim|xss_clean');
        $this->form_validation->set_rules('payment_status', "payment_status", 'trim|xss_clean');
        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE) :
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else :

            $option = array(
                'table' => 'orders',
                'where' => array('id' => $where_id),
                'single' => true
            );
            $orderUser = $this->common_model->customGet($option);
            $statusDate = $this->input->post('status_date');
            $option = array(
                'table' => 'orders',
                'data' => array(
                    'transact_status' => $this->input->post('transact_status'),
                    'shipping_date' => $this->input->post('shipping_date'),
                    'payment_status' => $this->input->post('payment_status')
                ),
                'where' => array('id' => $where_id)
            );
            $status = $this->input->post('transact_status');
            $message = "Your order #$orderUser->order_code status update";
            if ($status == 1) {
                $option['data']['produced_date'] = $statusDate;
                $message = "Your order #$orderUser->order_code has been process";
            } else if ($status == 2) {
                $option['data']['packed_date'] = $statusDate;
                $message = "Your order #$orderUser->order_code has been packed";
            } else if ($status == 3) {
                $option['data']['dispatched_date'] = $statusDate;
                $message = "Your order #$orderUser->order_code has been dispatched";
            } else if ($status == 4) {
                $option['data']['delivered_date'] = $statusDate;
                $message = "Your order #$orderUser->order_code has been completed";
            }
            $update = $this->common_model->customUpdate($option);
            if (true) {



                /** send push notification * */
                $option = array(
                    'table' => 'users_device_history',
                    'select' => 'device_token',
                    'where' => array(
                        'user_id' => $orderUser->user_id,
                    ),
                    'single' => true
                );
                $deviceHistory = $this->common_model->customGet($option);
                if (!empty($deviceHistory)) {
                    $data_array = array(
                        'title' => "Order Status",
                        'body' => $message,
                        'type' => "Push",
                        'badges' => 1,
                    );
                    send_android_notification($data_array, $deviceHistory->device_token, 1);

                    $options = array(
                        'table' => 'notifications',
                        'data' => array(
                            'user_id' => $orderUser->user_id,
                            'type_id' => 0,
                            'sender_id' => 1,
                            'noti_type' => 'Order Status',
                            'message' => $message,
                            'read_status' => 'NO',
                            'sent_time' => date('Y-m-d H:i:s'),
                            'user_type' => 'USER'
                        )
                    );
                    $this->common_model->customInsert($options);
                }
                $response = array('status' => 1, 'message' => 'Order updated Successfully', 'url' => base_url('pwfpanel'));
            } else {
                $response = array('status' => 0, 'message' => "Order can't update", 'url' => base_url('pwfpanel'));
            }

        endif;

        echo json_encode($response);
    }
}
