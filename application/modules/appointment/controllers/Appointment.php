<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends Common_Controller {

    public $data = array();
    public $file_data = "";
    public $_table = 'appointment';
    public $title = "Appointment Form";

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

       
        // print_r($this->data['results']);die;
        $this->data['parent'] = $this->title;
       
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();

        // $this->data['formUrlAdd'] = $this->router->fetch_class() . "/addPatient";
        $this->data['formUrl'] = $this->router->fetch_class() . "/add";

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

        $role_name = $this->input->post('role_name');
        $today = date('Y-m-d');
        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );
        
        if ($vendor_profile_activate == "No") {
            $vendor_profile_activate = 0;
        } else {
            $vendor_profile_activate = 1;
        }
        $option = array(
            'table' => 'appointment',
            'select' => 'appointment.*, users.first_name, users.last_name',
            'join' => array(
                array('users', 'users.id = appointment.doctor_id', 'left')
            ),
            'order' => array('appointment.id' => 'desc'),
            // 'where' => array('appointment.status' => 0),
        );
       
        $appointment_table = $this->common_model->customGet($option);
    //    print_r($facility_table);die;
        $dataArray = array();
        
        //$dataArray1 = array();
        
        foreach ($appointment_table as $key => $value) {
            $care_idArray = json_decode($value->care_unit_id);
            $careunidArray = array();
            foreach ($care_idArray as $key => $single) {

                $dadadadd = $this->common_model->customGetss($single);
               
                $careunidArray[] = $dadadadd;
               // $careunidArray[] = $dadadadd->care_unit_code;
               
                $careunidid = implode(', ', $careunidArray);
                
            }  
            $value->name = $careunidid;
            $dataArray[] = $value; 
           //print_r($value);die;

        }

        
         $this->data['list'] = $dataArray;



         $user_id = $this->session->userdata('user_id');
         $option = array(
             'table' => USERS . ' as user',
             'select' => 'user.*, UP.address1,UP.city,UP.country,UP.state,UP.description,'
             . 'UP.designation,UP.website,group.name as group_name,group.id as g_id,'
             . 'UP.doc_file,UP.company_name,UP.category_id,UP.profile_pic img,UP.doc_file as nda_doc,UP.doc_file_referral',
             'join' => array(
                 array(USER_GROUPS . ' as u_group', 'u_group.user_id=user.id', ''),
                 array(GROUPS . ' as group', 'group.id=u_group.group_id', ''),
                 array('user_profile as UP', 'UP.user_id=user.id', 'left')),
             'where' => array('user.id' => $user_id),
             'single' => true
         );
         $this->data['userData'] = $this->common_model->customGet($option);

        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($this->ion_auth->is_all_roleslogin()){

            $option = array(
                'table' => ' doctors',
                'select' => 'doctors.*',
                'join' => array(
                    array('users', 'doctors.user_id=users.id', 'left'),
                ),
                'where' => array(
                    'users.delete_status' => 0,
                    'users.hospital_id'=>$hospital_id
                    // 'doctors.user_id'=>$CareUnitID
                ),
                'single' => true,
            );
    
            $datadoctors = $this->common_model->customGet($option);
            

            $optionDoctor = array(
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
                    // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
                ),
               
            );
            $doctorsData = $this->common_model->customGet($optionDoctor);

            $optionPractitioner = array(
                'table' => 'practitioner',
                'select' => '*',
                 'where' => array('hospital_id'=>$hospital_id,'delete_status' => 0), 'order' => array('name' => 'ASC')
            );
            $practitionerData = $this->common_model->customGet($optionPractitioner);
        $combinedData = array_merge($practitionerData,$doctorsData);
        $this->data['practitioner'] = $combinedData;

        
       $option = array(
        'table' => ' doctors',
        'select' => 'doctors.*',
        'join' => array(
            array('users', 'doctors.user_id=users.id', 'left'),
        ),
        'where' => array(
            'users.delete_status' => 0,
            'users.hospital_id'=>$hospital_id
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
        ),
        'where' => array(
            'users.delete_status' => 0,
            'users.hospital_id'=>$hospital_id
            // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
        ),
        'order' => array('users.id' => 'desc'),
    );
    $this->data['doctorsname'] = $this->common_model->customGet($option);

    $option = array(
        'table' => 'clinic',
        'select' => '*', 'where' => array('hospital_id'=>$hospital_id), 'order' => array('name' => 'ASC')
    );
    $this->data['clinic_location'] = $this->common_model->customGet($option);
    


        $option = array(
            'table' => 'clinic_appointment',
            'select' => 'clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name',
            'join' => array(
                array('users as U', 'clinic_appointment.location_appointment = U.id', 'left'),
                array('patient as pa', 'clinic_appointment.patient = pa.user_id', 'left'),
                array('clinic as cl', 'clinic_appointment.location_appointment = cl.id', 'left'),
                array('user_profile as UP', 'UP.user_id = U.id', 'left'),
                array('practitioner as pr', 'clinic_appointment.practitioner = pr.id', 'left'),
            ),
            'where' => array(
                'clinic_appointment.status' => 0,
                // 'clinic_appointment.start_date_appointment' => $today,
                // 'clinic_appointment.theatre_date_time' => $today,
                // 'clinic_appointment.out_start_time_at' => $today,
                // 'clinic_appointment.start_date_availability' => $today
                'clinic_appointment.created_at' => date('Y-m-d', strtotime('created_at')),
                
            ),
            // 'or_where' => array(
            //     'clinic_appointment.start_date_appointment' => $today,
            //     'clinic_appointment.theatre_date_time' => $today,
            //     'clinic_appointment.out_start_time_at' => $today,
            //     'clinic_appointment.start_date_availability' => $today
            // ),
            'order' => array(
            'clinic_appointment.start_date_appointment' => 'desc',
                'clinic_appointment.theatre_date_time' => 'desc',
                'clinic_appointment.out_start_time_at' => 'desc',
                'clinic_appointment.start_date_availability' => 'desc'
            )
        );
    
        // $this->data['all_appointment'] = $this->common_model->customGet($option);
        

        $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        FROM vendor_sale_clinic_appointment
        LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
        LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        WHERE (
            vendor_sale_clinic_appointment.start_date_appointment LIKE '%$today%'
            OR vendor_sale_clinic_appointment.theatre_date_time LIKE '%$today%'
            OR vendor_sale_clinic_appointment.out_start_time_at LIKE '%$today%'
            OR vendor_sale_clinic_appointment.start_date_availability LIKE '%$today%'
        )
        ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                 vendor_sale_clinic_appointment.theatre_date_time DESC,
                 vendor_sale_clinic_appointment.out_start_time_at DESC,
                 vendor_sale_clinic_appointment.start_date_availability DESC";

$result = $this->db->query($sql);


// $hospital_id = (int)$hospital_id; // Assuming $hospital_id is an integer
                
//                 $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, 
//                 pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
//          FROM vendor_sale_users as U
//          LEFT JOIN vendor_sale_clinic_appointment ON vendor_sale_clinic_appointment.location_appointment = U.id
//          LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
//          LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
//          LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
//          LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
//          WHERE U.hospital_id = ? 
//          AND (
//              vendor_sale_clinic_appointment.start_date_appointment LIKE ? 
//              OR vendor_sale_clinic_appointment.theatre_date_time LIKE ? 
//              OR vendor_sale_clinic_appointment.out_start_time_at LIKE ? 
//              OR vendor_sale_clinic_appointment.start_date_availability LIKE ?
//          )
//          ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
//                   vendor_sale_clinic_appointment.theatre_date_time DESC,
//                   vendor_sale_clinic_appointment.out_start_time_at DESC,
//                   vendor_sale_clinic_appointment.start_date_availability DESC";
                         
//  // Safely bind the variables in the query
//  $result = $this->db->query($sql, array("%$today%", "%$today%", "%$today%", "%$today%"));
//  $result = $this->db->query($sql, array($hospital_id, "%$today%", "%$today%", "%$today%", "%$today%"));
//  $totalAppointment = $result->result();


$this->data['all_appointment'] = $result->result();

        // print_r($this->data['all_appointment']);die;
    
        } else if ($this->ion_auth->is_facilityManager()) {
            

            $departmentanddoctordata = $this->input->post('departmentanddoctordata');

            $departmentanddoctordata = $this->input->post('departmentanddoctordata');

            if (is_array($departmentanddoctordata) && !empty($departmentanddoctordata)) {
                // Option to retrieve doctors data
                $optionDoctor = array(
                    'table' => 'doctors',
                    'select' => 'users.*',
                    'join' => array(
                        array('users', 'doctors.user_id=users.id', 'left'),
                        array('user_profile UP', 'UP.user_id=users.id', 'left'),
                        array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                    ),
                    'where' => array(
                        'users.delete_status' => 0,
                        'users.hospital_id'=>$hospital_id
                        // 'doctors.facility_user_id' => $CareUnitID,
                    ),
                    'where_in' => array('doctors.user_id' => $departmentanddoctordata),  // Use where_in to check for multiple IDs
                    'order' => array('users.id' => 'asc'),
                );
                $doctorsData = $this->common_model->customGet($optionDoctor);
              

                
       
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
            // 'doctors.facility_user_id'=>$doctorsData->facility_user_id
        ),
        'order' => array('users.id' => 'desc'),
    );
    $this->data['doctorsname'] = $this->common_model->customGet($option);

    $option = array(
        'table' => 'clinic',
        'select' => '*', 'where' => array('hospital_id'=>$hospital_id), 'order' => array('name' => 'ASC')
    );
    $this->data['clinic_location'] = $this->common_model->customGet($option);

            
                $optionPractitioner = array(
                    'table' => 'practitioner',
                    'select' => '*',
                    'where' => array(
                        'hospital_id' => $hospital_id,
                        // 'delete_status' => 0,
                        // 'id' => 10,
                    ),
                    'where_in' => array('practitioner.id' => $departmentanddoctordata),  // Use where_in to check for multiple IDs
                    'order' => array('id' => 'ASC')
                );
                $practitionerData = $this->common_model->customGet($optionPractitioner);
                $combinedData = array_merge($practitionerData, $doctorsData);
                $data['practitioner'] = $combinedData;
                // echo json_encode($data['practitioner']);
                $this->data['practitioner_filter'] = $combinedData;
              
            }
            else{
            $optionDoctor = array(
                'table' => 'doctors',
                'select' => 'users.*',
                'join' => array(
                    array('users', 'doctors.user_id=users.id', 'left'),
                    array('user_profile UP', 'UP.user_id=users.id', 'left'),
                    array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                ),
                'where' => array(
                    'users.delete_status' => 0,
                    'users.hospital_id'=>$hospital_id
                    // 'doctors.facility_user_id' => $CareUnitID
                ),
                'order' => array('users.id' => 'asc'),
            );
            $doctorsData = $this->common_model->customGet($optionDoctor);
    
            $optionPractitioner = array(
                'table' => 'practitioner',
                'select' => '*',
                'where' => array(
                    'hospital_id' => $hospital_id,
                    // 'id' => 10,
                    'delete_status' => 0
                ),
                'order' => array('id' => 'ASC')
            );
            $practitionerData = $this->common_model->customGet($optionPractitioner);
            $combinedData = array_merge($practitionerData,$doctorsData);
            $this->data['practitioner'] = $combinedData;
       
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
                    // 'doctors.facility_user_id'=>$CareUnitID
                ),
                'order' => array('users.id' => 'desc'),
            );
            $this->data['doctorsname'] = $this->common_model->customGet($option);
        
            $option = array(
                'table' => 'clinic',
                'select' => '*', 'where' => array('hospital_id'=>$hospital_id), 'order' => array('name' => 'ASC')
            );
            $this->data['clinic_location'] = $this->common_model->customGet($option);

       
                
             
        // $selectedDate = $this->input->post('selectedDate');
        // if(!empty($selectedDate)){
        
        // $this->load->model('common_model');  // Make sure your model is loaded
    
        // $option = array(
        //     'table' => 'clinic_appointment',
        //     'select' => 'clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name',
        //     'join' => array(
        //         array('users as U', 'clinic_appointment.location_appointment = U.id', 'left'),
        //         array('patient as pa', 'clinic_appointment.patient = pa.user_id', 'left'),
        //         array('clinic as cl', 'clinic_appointment.location_appointment = cl.id', 'left'),
        //         array('user_profile as UP', 'UP.user_id = U.id', 'left'),
        //         array('practitioner as pr', 'clinic_appointment.practitioner = pr.id', 'left'),
        //     ),
        //     'where' => array(
        //         'clinic_appointment.status' => 0
        //     ),
        //     'or_where' => array(
        //         'clinic_appointment.start_date_appointment' => $selectedDate,
        //         'clinic_appointment.theatre_date_time' => $selectedDate,
        //         'clinic_appointment.out_start_time_at' => $selectedDate,
        //         'clinic_appointment.start_date_availability' => $selectedDate
        //     ),
        //     'order' => array(
        //     'clinic_appointment.start_date_appointment' => 'desc',
        //         'clinic_appointment.theatre_date_time' => 'desc',
        //         'clinic_appointment.out_start_time_at' => 'desc',
        //         'clinic_appointment.start_date_availability' => 'desc'
        //     )
        // );
    
        // $data = $this->common_model->customGet($option);
        // echo json_encode($data);
        // $this->data['all_appointment'] = $data;
               
        //     }else{
        //         $current_date = date('Y-m-d');
        //         $dateToUse = $current_date;
        
        // $this->load->model('common_model');  // Make sure your model is loaded
    
        $option = array(
            'table' => 'clinic_appointment',
            'select' => 'clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name',
            'join' => array(
                array('users as U', 'clinic_appointment.location_appointment = U.id', 'left'),
                array('patient as pa', 'clinic_appointment.patient = pa.user_id', 'left'),
                array('clinic as cl', 'clinic_appointment.location_appointment = cl.id', 'left'),
                array('user_profile as UP', 'UP.user_id = U.id', 'left'),
                array('practitioner as pr', 'clinic_appointment.practitioner = pr.id', 'left'),
            ),
            'where' => array(
                'clinic_appointment.status' => 0,
                // 'clinic_appointment.start_date_appointment' => $today,
                // 'clinic_appointment.DATE(start_date_appointment)' =>  $today,
                // 'clinic_appointment.practitioner' => 10,
            ),
            // 'or_where' => array(
            //     'clinic_appointment.start_date_appointment' => $dateToUse,
            //     'clinic_appointment.theatre_date_time' => $dateToUse,
            //     'clinic_appointment.out_start_time_at' => $dateToUse,
            //     'clinic_appointment.start_date_availability' => $dateToUse
            // ),
            'order' => array(
            'clinic_appointment.start_date_appointment' => 'desc',
                'clinic_appointment.theatre_date_time' => 'desc',
                'clinic_appointment.out_start_time_at' => 'desc',
                'clinic_appointment.start_date_availability' => 'desc'
            )
        );
    
        // $this->data['all_appointment'] = $this->common_model->customGet($option);


        
        $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        FROM vendor_sale_clinic_appointment
        LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
        LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        WHERE (
            vendor_sale_clinic_appointment.start_date_appointment LIKE '%$today%'
            OR vendor_sale_clinic_appointment.theatre_date_time LIKE '%$today%'
            OR vendor_sale_clinic_appointment.out_start_time_at LIKE '%$today%'
            OR vendor_sale_clinic_appointment.start_date_availability LIKE '%$today%'
        )
        ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                 vendor_sale_clinic_appointment.theatre_date_time DESC,
                 vendor_sale_clinic_appointment.out_start_time_at DESC,
                 vendor_sale_clinic_appointment.start_date_availability DESC";

$result = $this->db->query($sql);
// $result = $this->db->query($sql);

// $hospital_id = (int)$hospital_id; // Assuming $hospital_id is an integer
                
//                 $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, 
//                 pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
//          FROM vendor_sale_users as U
//          LEFT JOIN vendor_sale_clinic_appointment ON vendor_sale_clinic_appointment.location_appointment = U.id
//          LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
//          LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
//          LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
//          LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
//          WHERE U.hospital_id = ? 
//          AND (
//              vendor_sale_clinic_appointment.start_date_appointment LIKE ? 
//              OR vendor_sale_clinic_appointment.theatre_date_time LIKE ? 
//              OR vendor_sale_clinic_appointment.out_start_time_at LIKE ? 
//              OR vendor_sale_clinic_appointment.start_date_availability LIKE ?
//          )
//          ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
//                   vendor_sale_clinic_appointment.theatre_date_time DESC,
//                   vendor_sale_clinic_appointment.out_start_time_at DESC,
//                   vendor_sale_clinic_appointment.start_date_availability DESC";
                         
//  // Safely bind the variables in the query
//  $result = $this->db->query($sql, array($hospital_id, "%$today%", "%$today%", "%$today%", "%$today%"));
//  $totalAppointment = $result->result();

$this->data['all_appointment'] = $result->result();
        // print_r($this->data['all_appointment']);die;
        
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
            // 'doctors.facility_user_id'=>$CareUnitID
        ),
        'order' => array('users.id' => 'desc'),
    );
    $this->data['doctorsname'] = $this->common_model->customGet($option);

    $option = array(
        'table' => 'clinic',
        'select' => '*', 'where' => array('hospital_id'=>$hospital_id), 'order' => array('name' => 'ASC')
    );
    $this->data['clinic_location'] = $this->common_model->customGet($option);
}


}

                // print_r($this->data['all_appointment']);die;


                                $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                                $option = array(
                                    'table' => USERS . ' as user',
                                    'select' => 'user.id,user.first_name,user.last_name,user.email,user.login_id,user.created_on,user.active,group.name as group_name,UP.doc_file,CU.care_unit_code,CU.name',
                                    'join' => array(
                                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                                        array('user_profile UP', 'UP.user_id=user.id', 'left'),
                                        array('care_unit CU', 'CU.id=user.care_unit_id', 'left'),
                                        array('doctors AS d', 'd.user_id = user.id', 'left')
                                    ),
                                
                                    'where' => array('user.delete_status' => 0, 'group.id' => 5, 'user.login_id' => $LoginID),
                                    'order' => array('user.id' => 'desc')
                                );
                                $this->data['doctors'] = $this->common_model->customGet($option);

                                $user_id = $this->session->userdata('user_id');
                                // print_r($user_id);die;

                                $option = array(
                                    'table' => USERS . ' as user',
                                    'select' => 'user.*, group.name as group_name, UP.doc_file, CU.care_unit_code, CU.name, h.admin_id',
                                    'join' => array(
                                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id = user.id', 'left'),
                                        array(GROUPS . ' as group', 'group.id = ugroup.group_id', 'left'),
                                        array('user_profile AS UP', 'UP.user_id = user.id', 'left'),
                                        array('care_unit AS CU', 'CU.id = user.care_unit_id', 'left'),
                                        array('hospital AS h', 'h.user_id = user.id', 'left')
                                    ),
                                    'where' => array(
                                        'user.delete_status' => 0,
                                        'group.id' => 6,
                                        // 'h.admin_id' => $user_id
                                    ),
                                    'order' => array('user.id' => 'DESC') // Order descending by user id
                                );

        $this->data['hospitals'] = $this->common_model->customGet($option);
                            
       

        
               //print_r($this->data['userlocation']);die;
               $option = array('table' => 'countries',
               'select' => '*'
           );
           $this->data['countries'] = $this->common_model->customGet($option);
       
       
           $option = array(
               'table' => 'care_unit',
               'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
           );
           $this->data['care_unit'] = $this->common_model->customGet($option);
       
           $option = array(
               'table' => 'appointment_type',
               'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
           );
           $this->data['appointment_type'] = $this->common_model->customGet($option);
       
           $option = array(
               'table' => 'type_of_stay',
               'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
           );
           $this->data['type_of_stay'] = $this->common_model->customGet($option);


           $option = array('table' => 'countries',
           'select' => '*'
       );
       $this->data['countries'] = $this->common_model->customGet($option);
   
   
       $option = array(
           'table' => 'care_unit',
           'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
       );
       $this->data['care_unit'] = $this->common_model->customGet($option);
   
       $option = array(
           'table' => 'appointment_type',
           'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
       );
       $this->data['appointment_type'] = $this->common_model->customGet($option);
   
       $option = array(
           'table' => 'type_of_stay',
           'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
       );
       $this->data['type_of_stay'] = $this->common_model->customGet($option);



        $this->load->admin_render('text', $this->data, 'inner_script');
    }


    public function getLocationFilter() {

        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

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


            $optionDoctor = array(
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
                    // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
                ),
               
            );
            $doctorsData = $this->common_model->customGet($optionDoctor);

    

            $optionPractitioner = array(
                'table' => 'practitioner',
                'select' => '*',
                 'where' => array('hospital_id'=>$hospital_id,'delete_status' => 0), 'order' => array('name' => 'ASC')
            );
    
    
        $response = '';
        $id = $this->input->post('id');
    
        if ($id == 'practitioner') {
            $optionDoctor = array(
                'table' => 'doctors',
                'select' => 'users.*',
                'join' => array(
                    array('users', 'doctors.user_id=users.id', 'left'),
                    array('user_profile UP', 'UP.user_id=users.id', 'left'),
                    array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                ),
                'where' => array(
                    'users.delete_status' => 0,
                    'users.hospital_id'=>$hospital_id
                    // 'doctors.facility_user_id' => $datadoctors->facility_user_id
                ),
                'order' => array('users.id' => 'asc'),
            );
            $doctorsData = $this->common_model->customGet($optionDoctor);
    
            $optionPractitioner = array(
                'table' => 'practitioner',
                'select' => '*',
                'where' => array(
                    // 'hospital_id' => $datadoctors->facility_user_id,
                    'hospital_id' => $hospital_id,
                    'delete_status' => 0
                ),
                'order' => array('name' => 'ASC')
            );
            $practitionerData = $this->common_model->customGet($optionPractitioner);
            $practitioner = array_merge($practitionerData, $doctorsData);
            
        } elseif ($id == 'location' || $id == 'clinic') {
            $option = array(
                'table' => 'clinic',
                'select' => '*',
                // 'where' => array('hospital_id' => $datadoctors->facility_user_id, 'delete_status' => 0),
                'where' => array('hospital_id' => $hospital_id, 'delete_status' => 0),
                'order' => array('name' => 'ASC')
            );
            $practitioner = $this->common_model->customGet($option);
    
        }



        } else if ($this->ion_auth->is_facilityManager()) {

            $response = '';
            $id = $this->input->post('id');
        
            if ($id == 'practitioner') {
                $optionDoctor = array(
                    'table' => 'doctors',
                    'select' => 'users.*',
                    'join' => array(
                        array('users', 'doctors.user_id=users.id', 'left'),
                        array('user_profile UP', 'UP.user_id=users.id', 'left'),
                        array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
                    ),
                    'where' => array(
                        'users.delete_status' => 0,
                        'users.hospital_id'=>$hospital_id
                        // 'doctors.facility_user_id' => $CareUnitID
                    ),
                    'order' => array('users.id' => 'asc'),
                );
                $doctorsData = $this->common_model->customGet($optionDoctor);
        
                $optionPractitioner = array(
                    'table' => 'practitioner',
                    'select' => '*',
                    'where' => array(
                        // 'hospital_id' => $CareUnitID,
                        'hospital_id' =>$hospital_id,
                        'delete_status' => 0
                    ),
                    'order' => array('name' => 'ASC')
                );
                $practitionerData = $this->common_model->customGet($optionPractitioner);
                $practitioner = array_merge($practitionerData, $doctorsData);
                
            } elseif ($id == 'location' || $id == 'clinic') {
                $option = array(
                    'table' => 'clinic',
                    'select' => '*',
                    'where' => array('hospital_id' =>$hospital_id, 'delete_status' => 0),
                    'order' => array('name' => 'ASC')
                );
                $practitioner = $this->common_model->customGet($option);
        
            }
            }
    
        echo json_encode($practitioner);
    }
    
    

    
    // public function getLocationFilter()
    // {
    //     $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    //     $response = array();
    //     $id = $this->input->post('id');
       
    //     if ($id == 'practitioner') {
        
    //         $optionDoctor = array(
    //             'table' => 'doctors',
    //             'select' => 'users.*',
    //             'join' => array(
    //                 array('users', 'doctors.user_id=users.id', 'left'),
    //                 array('user_profile UP', 'UP.user_id=users.id', 'left'),
    //                 array('doctors_qualification', 'doctors_qualification.user_id=users.id', 'left'),
    //             ),
    //             'where' => array(
    //                 'users.delete_status' => 0,
    //                 'doctors.facility_user_id' => $CareUnitID
    //             ),
    //             'order' => array('users.id' => 'asc'),
    //         );
    //         $doctorsData = $this->common_model->customGet($optionDoctor);
    
    //         $optionPractitioner = array(
    //             'table' => 'practitioner',
    //             'select' => '*',
    //             'where' => array(
    //                 'hospital_id' => $CareUnitID,
    //                 'delete_status' => 0
    //             ),
    //             'order' => array('name' => 'ASC')
    //         );
    //         $practitionerData = $this->common_model->customGet($optionPractitioner);
    //         $practitioner = array_merge($practitionerData,$doctorsData);
            
            
    //         $data.= '<select id="view_id" name="state" class="form-control" size="1" multiple>';
    //         $data.= '<option value="" selected>Select  All</option>';

    //         foreach ($practitioner as $practitioner_list) {
    //             $data .= '<option value="' . $practitioner_list->id . '">' . $practitioner_list->name . $practitioner_list->first_name . ' ' . $practitioner_list->last_name . '</option>';
    //         }
            
    //         $data.= '</select>';
            
           
    //     }else if ($id == 'location') {
           
        
    //         $option = array(
    //             'table' => 'clinic',
    //             'select' => '*', 'where' => array('hospital_id'=>$CareUnitID,'delete_status' => 0), 'order' => array('name' => 'ASC')
    //         );
    //         $clinic_location = $this->common_model->customGet($option);
            
    //         $data.= '<select id="state" onchange="getCities(this.value)" name="state" class="form-control" size="1">';
    //         $data.= '<option value="" disabled selected>Please select</option>';
            
            
    //         foreach ($clinic_location as $clinic_location_list) {
               
    //             $data.= '<option value="' . $clinic_location_list->id . '">' . $clinic_location_list->clinic_location . '</option>';
    //         }
            
            
    //          $data.= '</select>';
            
           
    //     }else  if ($id == 'clinic') {
           
        
    //         $option = array(
    //             'table' => 'clinic',
    //             'select' => '*', 'where' => array('hospital_id'=>$CareUnitID,'delete_status' => 0), 'order' => array('name' => 'ASC')
    //         );
    //         $clinic_location = $this->common_model->customGet($option);
            
    //         $data.= '<select id="state" onchange="getCities(this.value)" name="state" class="form-control" size="1">';
    //         $data.= '<option value="" disabled selected>Please select</option>';
            
            
    //         foreach ($clinic_location as $clinic_location_list) {
               
    //             $data.= '<option value="' . $clinic_location_list->id . '">' . $clinic_location_list->name . '</option>';
    //         }
            
            
    //          $data.= '</select>';
            
           
    //     }

        
    //     echo json_encode($data);
    // }

    /**
     * @method profile
     * @description get profile
     * @return array
     */
    
    /**
     * @method open_model
     * @description load model box
     * @return array
     */
    function open_model() {

        $paramValue = $this->input->get('search');
        
        $this->db->like('patient_id', $paramValue);
        $this->db->limit(1); 
$results = $this->db->get('vendor_sale_patient')->result_array();

$this->data['results'] = $results;
      $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/add";
        $this->data['model'] = $this->router->fetch_class();
       
        $user_id = $this->session->userdata('user_id');

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
        $option = array(
            'table' => USERS . ' as user',
            'select' => 'user.*, UP.address1,UP.city,UP.country,UP.state,UP.description,'
            . 'UP.designation,UP.website,group.name as group_name,group.id as g_id,'
            . 'UP.doc_file,UP.company_name,UP.category_id,UP.profile_pic img,UP.doc_file as nda_doc,UP.doc_file_referral',
            'join' => array(
                array(USER_GROUPS . ' as u_group', 'u_group.user_id=user.id', ''),
                array(GROUPS . ' as group', 'group.id=u_group.group_id', ''),
                array('user_profile as UP', 'UP.user_id=user.id', 'left')),
            'where' => array('user.id' => $user_id),
            'single' => true
        );
        $this->data['userData'] = $this->common_model->customGet($option);

        $option = array(
            'table' => USERS . ' as user',
            'select' => 'user.*, UP.address1,UP.city,UP.country,UP.state,UP.description,'
            . 'UP.designation,UP.website,group.name as group_name,group.id as g_id,'
            . 'UP.doc_file,UP.company_name,UP.category_id,UP.profile_pic img,UP.doc_file as nda_doc,UP.doc_file_referral',
            'join' => array(
                array(USER_GROUPS . ' as u_group', 'u_group.user_id=user.id', ''),
                array(GROUPS . ' as group', 'group.id=u_group.group_id', ''),
                array('user_profile as UP', 'UP.user_id=user.id', 'left')),
                'where' => array('group.id' => 6),
        );
        
        $this->data['userlocation'] = $this->common_model->customGet($option);


        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

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
            ),
            'where' => array(
                'users.delete_status' => 0,
                'users.hospital_id'=>$hospital_id
                // 'doctors.facility_user_id'=>$datadoctors->facility_user_id
            ),
            'order' => array('users.id' => 'desc'),
        );
        $this->data['doctorsname'] = $this->common_model->customGet($option);

        $option = array(
            'table' => 'clinic',
            'select' => '*', 
            'where' => array('hospital_id'=>$hospital_id,'delete_status' => 0), 'order' => array('name' => 'ASC')
        );
        $this->data['clinic_location'] = $this->common_model->customGet($option);


        $option = array(
            'table' => 'practitioner',
            'select' => '*',
             'where' => array('hospital_id'=>$hospital_id,'delete_status' => 0), 'order' => array('name' => 'ASC')
        );
        $this->data['practitioner'] = $this->common_model->customGet($option);


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
        $this->data['doctorsname'] = $this->common_model->customGet($option);


        $option = array(
            'table' => 'clinic',
            'select' => '*', 'where' => array('hospital_id'=>$hospital_id,'delete_status' => 0), 'order' => array('name' => 'ASC')
        );
        $this->data['clinic_location'] = $this->common_model->customGet($option);

        $option = array(
            'table' => 'practitioner',
            'select' => '*', 'where' => array('hospital_id'=>$hospital_id,'delete_status' => 0), 'order' => array('name' => 'ASC')
        );
        $this->data['practitioner'] = $this->common_model->customGet($option);
        
    }



         //print_r($this->data['userlocation']);die;
        $option = array('table' => 'countries',
        'select' => '*'
    );
    $this->data['countries'] = $this->common_model->customGet($option);


    $option = array(
        'table' => 'care_unit',
        'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
    );
    $this->data['care_unit'] = $this->common_model->customGet($option);

    $option = array(
        'table' => 'appointment_type',
        'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
    );
    $this->data['appointment_type'] = $this->common_model->customGet($option);

    $option = array(
        'table' => 'type_of_stay',
        'select' => '*', 'where' => array('delete_status' => 0), 'order' => array('name' => 'ASC')
    );
    $this->data['type_of_stay'] = $this->common_model->customGet($option);
    
        $this->load->admin_render('add', $this->data, 'inner_script');
    }

    /**
     * @method users_add
     * @description add dynamic rows
     * @return array
     */



     function open_model_new() {

        $this->data['title'] = "addPatient " . $this->title;
        $this->data['formUrlAddNew'] = $this->router->fetch_class() . "/addPatient";
        $this->data['formUrl'] = $this->router->fetch_class() . "/add";


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

$CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

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

        $this->load->admin_render('add_new_patient', $this->data, 'inner_script');

        // $this->load->view('add_new_patient', $this->data);
    }


    public function addPatient()
    {

        // "<pre>";
        // echo 'patient';
        // print_r($this->input->post());die;
        // "<pre>";
        
    $operator_id = ($this->ion_auth->is_admin()) ? 0 : $this->session->userdata('user_id');

    
    if($this->ion_auth->is_subAdmin()){
    // if($this->ion_auth->is_all_roleslogin()){

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
    
       
    $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    
        $this->form_validation->set_rules('first_name', 'first_name', 'trim');
        $this->form_validation->set_rules('last_name', 'last_name', 'trim');
        // $this->form_validation->set_rules('title', 'title', 'trim');
        $this->form_validation->set_rules('day', 'day', 'trim|required');
        $this->form_validation->set_rules('month', 'month', 'trim|required');
        $this->form_validation->set_rules('year', 'year', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|required');
        //  $this->form_validation->set_rules('comment', 'comment', 'trim|required');
        $this->form_validation->set_rules('phone_type', 'phone_type', 'trim|required');
        // if ($this->input->post('infection_surveillance_checklist') != 'N/A') {
            $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');
        // }
        $this->form_validation->set_rules('user_email', 'user_email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('address_lookup', 'address_lookup', 'trim|required');
        // $this->form_validation->set_rules('streem_address', 'streem_address', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim');
        $this->form_validation->set_rules('post_code', 'post_code', 'trim');
        $this->form_validation->set_rules('country', 'country', 'trim');
       
        // $this->form_validation->set_rules('relation', 'relation', 'trim');
        // $this->form_validation->set_rules('storedDataType', 'Relation Type', 'trim|required');

        // $this->form_validation->set_rules('storedData', 'storedData', 'trim|required');
        $this->form_validation->set_rules('privacy_policy', 'privacy_policy', 'trim|required');
        $this->form_validation->set_rules('card_number', 'card_number', 'trim|required');
        $this->form_validation->set_rules('exp_month_year', 'exp_month_year', 'trim|required');
        $this->form_validation->set_rules('cvv', 'cvv', 'trim|required');
        $this->form_validation->set_rules('System_id', 'System_id', 'trim|required');
        

        if ($this->form_validation->run() == true) {

            $operator_id = ($this->ion_auth->is_admin()) ? 0 : $this->session->userdata('user_id');

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
                        'date_of_birth' => $day.'/'.$month.'/'.$year,
                        // 'date_of_birth' => (!empty($this->input->post('date_of_birth'))) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : date('Y-m-d'),
                        // 'profile_pic' => $image,
                        'phone' => $this->input->post('phone_number'),
                        'country_code'=>$this->input->post('country'),
                        'gender'=>$this->input->post('gender'),
                        'gender'=>$this->input->post('gender'),
                        'zipcode_access'=>$this->input->post('post_code'),
                        // 'phone_code' => $this->input->post('phone_code'),
                        'care_unit_id' => $this->input->post('care_unit_id'),
                        // 'zipcode_access' => json_encode($this->input->post('zipcode')),
                        'email_verify' => 1,
                        'hospital_id'=>$hospital_id,
                        'is_pass_token' => $this->input->post('password'),
                        'created_on' => strtotime(datetime())
                    );
                    $insert_user_id = $this->ion_auth->register($identity, $password, $email, $additional_data, array(7));
                    // $insert_id = $this->db->insert_id();

                    
                }

                
            // if ($this->input->post('patient_mode') == 'New') {
            $option = array(
                'table' => 'care_unit',
                'where' => array(
                    'id' => $this->input->post('care_unit_id'),
                ),
                'single' => true
            );
            $digitscode = 10;
                $p_id = strtoupper(substr(preg_replace('/[^A-Za-z0-9\-]/', '', $username[0]), 0, 10)) . rand(pow(10, $digits - 1), pow(10, $digits) - 1);


            $CareUnit = $this->common_model->customGet($option);
            $patient_unique = strtoupper($CareUnit->care_unit_code) . '' . $p_id;

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
                    'operator_id' =>$hospital_id,
                    // 'operator_id' => $hospitalAndDoctorId,
                    'patient_id' => $patient_unique,
                    
                    'address' => ucwords($this->input->post('address_lookup')),
                    'additional_comment_option' => $this->input->post('comment'),

                    'room_number' => (!empty($this->input->post('room_number'))) ? $this->input->post('room_number') : null,
                    'symptom_onset' => $this->input->post('symptom_onset')? $this->input->post('symptom_onset') : null,
                    'culture_source' => $this->input->post('culture_source'),
                    'organism' => $this->input->post('organism'),
                    'precautions' => $this->input->post('precautions'),
                    'care_unit_id' => $this->input->post('care_unit_id'),
                    'doctor_id' => $this->input->post('doctor_id')? $this->input->post('doctor_id') : null,
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

                // print_r($insert_user_id);die;
                $option2 = array(
                    'table' => 'user_address',
                    'data' => array(
                        'user_id' => $insert_user_id,
                        'company_name' => $this->input->post('Company'),
                        'occupation' => $this->input->post('Occupation'),
                        'religion' => $this->input->post('religion'),
                        'ethnicity' => $this->input->post('ethnicity'),
                        'address1' => $this->input->post('address_lookup'),
                        'address2' => $this->input->post('streem_address'),
                        'city' => $this->input->post('city'),
                        'country' => $this->input->post('country'),
                        'pin_code' => $this->input->post('post_code'),
                        'is_billing' => $this->input->post('initial_rx'),
                        'date_of_death' => $this->input->post('death_day').'/'.$this->input->post('death_month').'/'.$this->input->post('death_year'),

                        )
                );
                $insert_id1 = $this->common_model->customInsert($option2);



                $option3 = array(
                    'table' => 'patient_communication_relation',
                    'data' => array(
                        'user_id' => $insert_user_id,
                        'relation' => $this->input->post('relation'),
                        'relation_number' => $this->input->post('storedData'),
                        'policy_number' => $this->input->post('policy_number'),
                        'authorisation_code' => $this->input->post('authorisation_code'),
                        'receive_emails' => $this->input->post('receive_emails'),
                        'receive_sms_messages' => $this->input->post('receive_sms_messages'),
                        'has_consented_to_promotional_marketing' => $this->input->post('has_consented_to_promotional_marketing'),
                        'receive_payment_reminders' => $this->input->post('receive_payment_reminders'),
                        'privacy_policy' => $this->input->post('privacy_policy'),
                        'System_id' => $this->input->post('System_id'),
                        

                        )
                );
                $insert_id2 = $this->common_model->customInsert($option3);

                $option3 = array(
                    'table' => 'patient_billing_detail',
                    'data' => array(
                        'user_id' => $insert_user_id,
                        'billing_detail' => $this->input->post('billing_detail'),
                        'payment_reference' => $this->input->post('payment_reference'),
                        'card_number' => $this->input->post('card_number'),
                        'exp_month_year' => $this->input->post('exp_month_year'),
                        'cvv' => $this->input->post('cvv'),
                        
                        

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

                        $redirect_to = base_url($this->router->fetch_class());
                        $show_redirection_alert = true;

                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – UTI') {
                        $redirect_to = base_url($this->router->fetch_class());
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – RTI') {
                        $redirect_to = base_url($this->router->fetch_class());
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer – GITI') {
                        $redirect_to = base_url($this->router->fetch_class());
                        $show_redirection_alert = true;
                    } elseif ($this->input->post('infection_surveillance_checklist') == 'McGeer –SSTI') {
                        $redirect_to = base_url($this->router->fetch_class());
                        $show_redirection_alert = true;
                    }
                    // $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                    $this->session->set_flashdata('message',"Successfully added");
                    redirect($this->router->fetch_class().'/open_model');
                    // $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
                } else {
                    $response = array('status' => 0, 'message' => "Failed to add");
                }
                $this->session->set_flashdata('message',"Successfully added");
                redirect($this->router->fetch_class().'/open_model');
                // $response = array('status' => 1, 'show_redirection_alert' => $show_redirection_alert, 'message' => "Successfully added", 'url' => $redirect_to);
            } else {
                $response = array('status' => 0, 'message' => "Failed to add");
            }
            //  }
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        $this->session->set_flashdata('message',"Successfully added");
                redirect($this->router->fetch_class().'/open_model');
        // echo json_encode($response);
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



public function fetch() {
    $output = '';
    $query = $this->input->post('query');
    if ($query) {
        $results = $this->common_model->fetch_data($query);
        $output .= '<select class="form-control select2" name="patient" id="patient">';
        if (!empty($results)) {
            foreach ($results as $row) {
                $output .= '<option value="'.$row['user_id'].'">( '.$row['patient_id'].')  -'.$row['name'].' - '. $row['address'].'</option>';
               
            }
        } else {
            $output .= '<option>No Data Found</option>';
        }
        $output .= '</select>';
        echo $output;
    }
}

    public function add() {

    //    echo "<pre>";
    //     print_r($this->input->post('patient'));die;
    //     echo "</pre>";


        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;
        
        $option = array('table' => "users",
            'where' => array('active' => 1)
        );
        $this->data['users'] = $this->common_model->customGet($option);
       
        // $this->form_validation->set_rules('patient', lang('patient'), 'required');

        $this->form_validation->set_rules('doctor_name', lang('doctor_name'), 'required');
       
     
        if ($this->form_validation->run() == true) {

        //  $doctor_id =    $this->input->post('doctor_name');
         

        //  $query = $this->db->get_where('users', array('id' => $doctor_id));
        //             $result = $query->row();
        //             $email = $result->username;
        //             $from = getConfig('admin_email');
        //             $subject = "Appointment for Patient";
        //             $password = "test";
        //             $title = "Appointment doctor";
        //             $data['name'] = ucwords($this->input->post('patient'));
        //             $data['content'] = "Appointment" . "<p>username: " . $email . "</p><p>Password: " . $password . "</p>";
        //             $template = $this->load->view('email-template/registration', $data, true);
        //             $this->send_email_smtp($email, $from, $subject, $template, $title);

        //             $practitioner =    $this->input->post('practitioner');
         

        //  $practitionerquery = $this->db->get_where('practitioner', array('id' => $practitioner));

        //             $result = $practitionerquery->row();
        //             $email = $result->email;
        //             $from = getConfig('admin_email');
        //             $subject = "Appointment for Patient";
        //             $password = "test";
        //             $title = "Appointment doctor";
        //             $data['name'] = ucwords($this->input->post('patient'));
        //             $data['content'] = "Appointment" . "<p>username: " . $email . "</p><p>Password: " . $password . "</p>";
        //             $template = $this->load->view('email-template/registration', $data, true);
        //             $this->send_email_smtp($email, $from, $subject, $template, $title);

                    // Try sending email
                    
        //  $date = $this->input->post('date');
        //  $start_time_range = $this->input->post('time_start'); // Example start time
        //  $end_time_range = $this->input->post('time_end');
        //     $option = array(
        //         'table' => 'appointment',
        //         'select' => 'appointment.*, users.first_name, users.last_name',
        //         'join' => array(
        //             array('users', 'users.id = appointment.doctor_id', 'left')
        //         ),
        //         'where' => array(
        //             'appointment.doctor_id' => $doctor_id,
        //             'date' => $date,
        //             'time_end >=' => $start_time_range,
        //             'time_start <=' => $end_time_range
        //         )
                
        //     );
         
        //     $appointment_doctor = $this->common_model->customGet($option);
           
        //     if(!empty($appointment_doctor)){
                  
                //         $response = array('status' => 0, 'message' => 'Already time slot is booked ?');
                    
                // }  else {

                    // $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';


                    // $additional_data_profile = array(
                    //     'type'=>$this->input->post('type'),
                    //     'patient' => $this->input->post('patient')? : "",
                    //     'location_appointment' => $this->input->post('location_appointment')? : "",
                    //     'clinician_appointment' => $this->input->post('location_appointment')? : "",
                    //     'practitioner'=>$this->input->post('practitioner')? : "",
                    //     'appointment_type' => $this->input->post('appointment_type')? : "",
                    //     'start_date_appointment' => $this->input->post('start_date_appointment')? : "",
                    //     'end_date_appointment' => $this->input->post('end_date_appointment')? : "",
                    //     'comment_appointment' => $this->input->post('comment_appointment')? : "",
                    //     'doctor_name' => $this->input->post('doctor_name')? : "",
                    //     'theatre_clinician' => $this->input->post('theatre_clinician')? : "",

                    //     'theatre_anaesthetic_type'=>$this->input->post('theatre_anaesthetic_type')? : "",
                    //     'theatre_admission_date_time' => $this->input->post('theatre_admission_date_time')? : "",
                    //     'theatre_anaesthetist' => $this->input->post('theatre_anaesthetist')? : "",

                    //     'theatre_type_of_stay' => $this->input->post('theatre_type_of_stay')? : "",

                    //     'theatre_date_time' => $this->input->post('theatre_date_time')? : "",
                    //     'theatre_time_duration' => $this->input->post('theatre_time_duration')? : "",

                    //     'status' => '0',
                                     
                    // );
                   
// $operator_id = ($this->ion_auth->is_admin()) ? 0 : $this->session->userdata('user_id');
//     if($this->ion_auth->is_subAdmin()){

//         $option = array(
//             'table' => ' doctors',
//             'select' => 'doctors.*',
//             'join' => array(
//                 array('users', 'doctors.user_id=users.id', 'left'),
//             ),
//             'where' => array(
//                 'users.delete_status' => 0,
//                 'doctors.user_id'=>$operator_id
//             ),
//             'single' => true,
//         );

//         $datadoctors = $this->common_model->customGet($option);
//       $CareUnitID=  $datadoctors->facility_user_id;

//     } else if ($this->ion_auth->is_facilityManager()) {
        
        
//   $CareUnitID = $operator_id;
        
//     }

                    



                    // $this->db->insert('clinic_appointment', $additional_data_profile); 
                    $additional_data_profile = array(
                        'type' => $this->input->post('type') ?: null,
                        'patient' => $this->input->post('patient') ?: null,
                        'location_appointment' => $this->input->post('location_appointment') ?: null,
                        'clinician_appointment' => $this->input->post('location_appointment') ?: null,
                        'practitioner' => $this->input->post('practitioner') ?: null,
                        'appointment_type' => $this->input->post('appointment_type') ?: null,
                        'start_date_appointment' => $this->input->post('start_date_appointment') ?: $this->input->post('theatre_date_time') ?: $this->input->post('out_start_time_at') ?:$this->input->post('start_date_availability') ?: null,
                        'end_date_appointment' => $this->input->post('end_date_appointment') ?:$this->input->post('end_time_date_availability') ?:$this->input->post('out_end_time_at') ?: null,
                        'comment_appointment' => $this->input->post('comment_appointment') ?: null,
                        'doctor_name' => $this->input->post('doctor_name') ?: null,
                        'theatre_clinician' => $this->input->post('theatre_clinician') ?: null,
                        'theatre_anaesthetic_type' => $this->input->post('theatre_anaesthetic_type') ?: null,
                        'theatre_admission_date_time' => $this->input->post('theatre_admission_date_time') ?: null,
                        'theatre_anaesthetist' => $this->input->post('theatre_anaesthetist') ?: null,
                        'theatre_type_of_stay' => $this->input->post('theatre_type_of_stay') ?: null,
                        'theatre_date_time' => $this->input->post('theatre_date_time') ?: null,
                        'theatre_time_duration' => $this->input->post('theatre_time_duration') ?: null,

                        'out_start_time_at'=>$this->input->post('out_start_time_at') ?: null,
                        'out_end_time_at'=>$this->input->post('out_end_time_at') ?: null,
                        'start_date_availability'=>$this->input->post('start_date_availability') ?: null,
                        'end_time_date_availability'=>$this->input->post('end_time_date_availability') ?: null,
                        'status' => '0',
                    );
                    
                    // print_r($additional_data_profile);die;
                    $this->db->insert('clinic_appointment', $additional_data_profile); 

                    $insert_id = $this->db->insert_id();
                    
                    $practitioner = $this->input->post('practitioner');
                    // 'sender_id' => $practitioner ?: null;
           

// $operator_id = ($this->ion_auth->is_admin()) ? 0 : $this->session->userdata('user_id');

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


$additional_notification = array(
                       
    'type_id' => 'clinic_appointment',
    'patient_id' => $this->input->post('patient'),
    'care_unit_id' => $this->input->post('location_appointment'),
    'clinic_appointment_id' => $insert_id,
    'user_id' => $user_id,
    'facility_user_id'=>$hospital_id,
    'sender_id' => $this->input->post('doctor_name'),
);


$this->db->insert('notifications', $additional_notification); 
$notifications_id = $this->db->insert_id();


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
                // 'doctors.user_id'=>$operator_id
            ),
            'single' => true,
        );

        $datadoctors = $this->common_model->customGet($option);
      $CareUnitID=  $datadoctors->facility_user_id;

    //   echo "<pre>";
    //   print_r($this->input->post('patient'));die;
    //   echo "</pre>";

    //   $additional_notification = array(
                       
    //     'type_id' => 'clinic_appointment',
    //     'patient_id' => $this->input->post('patient'),
    //     'care_unit_id' => $this->input->post('location_appointment'),
    //     'clinic_appointment_id' => $insert_id,
    //     'user_id' => $operator_id,
    //     'facility_user_id'=>$hospital_id,
    //     'sender_id' => $this->input->post('doctor_name'),
    // );
    
   
    // $this->db->insert('notifications', $additional_notification); 
    // $notifications_id = $this->db->insert_id();

    } else if ($this->ion_auth->is_facilityManager()) {
        
        
        // echo "<pre>";
        // print_r($this->input->post('patient'));die;
        // echo "</pre>";

//   $CareUnitID = $operator_id;

//   $additional_notification = array(
                       
//     'type_id' => 'clinic_appointment',
//     'patient_id' => $this->input->post('patient'),
//     'care_unit_id' => $this->input->post('location_appointment'),
//     'clinic_appointment_id' => $insert_id,
//     'user_id' => $this->input->post('practitioner') ?: $this->input->post('theatre_clinician') ?: null,
//     'facility_user_id'=>$hospital_id,
//     'user_id' => $operator_id,
//     'sender_id' => $this->input->post('doctor_name'),
// );


// $this->db->insert('notifications', $additional_notification); 
// $notifications_id = $this->db->insert_id();

//  $additional_notification = array(
                            
//             'type_id' => 'clinic_appointment',
//             'patient_id' => $this->input->post('patient'),
//             'care_unit_id' => $this->input->post('location_appointment'),
//             'clinic_appointment_id' => $insert_id,
//             'user_id' => $this->input->post('practitioner') ?: $this->input->post('theatre_clinician') ?: null,
//             'facility_user_id'=>$CareUnitID,
//             'sender_id' => $this->input->post('doctor_name'),
//         );
        
//     $this->db->insert('notifications', $additional_notification); 
//     $notifications_id = $this->db->insert_id();




    }

                    


                        // if($this->input->post('type') == "clinic_appointment"){
                        
                        //     $additional_notification = array(
                            
                        //         'type_id' => 'clinic_appointment',
                        //         'patient_id' => $this->input->post('patient'),
                        //         'care_unit_id' => $this->input->post('location_appointment'),
                        //         'clinic_appointment_id' => $insert_id,
                        //         'user_id' => $CareUnitID,
                        //         'sender_id' => $this->input->post('doctor_name'),
                        //     );
                            
                        //     $this->db->insert('notifications', $additional_notification); 
                        //     $notifications_id = $this->db->insert_id();
                        
                        // }else if($this->input->post('type') == "clinic_appointment"){

                        //     $query = $this->db->get_where('users', array('email' => $this->input->post('theatre_clinician')));
                        //     $receiver = $query->row();
                        //     $receiver_id = $receiver->id;
                            
                        //     $additional_notification = array(
                                
                        //         'care_unit_id' => $this->input->post('location_appointment'),
                        //         'clinic_appointment_id	' => $insert_id,
                        //         'user_id' => $receiver_id,
                        //         'sender_id' => $this->input->post('doctor_name'),
                        //     );
                            

                        //     $this->db->insert('notifications', $additional_notification); 


                        // }else if($this->input->post('type') == "availability_location"){ 

                        //     $query = $this->db->get_where('users', array('email' => $this->input->post('availability_practitioner')));
                        //     $receiver = $query->row();
                        //     $receiver_id = $receiver->id;
                            
                        //     $additional_notification = array(
                                
                        //         'care_unit_id' => $this->input->post('location_appointment'),
                        //         'clinic_appointment_id' => $insert_id,
                        //         'user_id' => $receiver_id,
                        //         'sender_id' => $this->input->post('doctor_name'),
                        //     );
                            

                        //     $this->db->insert('notifications', $additional_notification); 

                        // }else if($this->input->post('type') == "out_of_office_location"){ 

                        //     $query = $this->db->get_where('users', array('email' => $this->input->post('out_of_office_practitioner')));
                        //     $receiver = $query->row();
                        //     $receiver_id = $receiver->id;

                            
                        //     $additional_notification = array(
                                
                        //         'care_unit_id' => $this->input->post('location_appointment'),
                        //         'clinic_appointment_id' => $insert_id,
                        //         'user_id' => $receiver_id,
                        //         'sender_id' => $this->input->post('doctor_name'),
                        //     );
                            

                        //     $this->db->insert('notifications', $additional_notification);

                        // }
                            
                    if ($insert_id) {
                        $html = array();
                        $response = array('status' => 1, 'message' => 'Added Successfully', 'url' => base_url($this->router->fetch_class()));
                    } else {
                        $response = array('status' => 0, 'message' => lang('user_failed'));
                    }

                }

        // } else {
        //     $messages = (validation_errors()) ? validation_errors() : '';
        //     $response = array('status' => 0, 'message' => $messages);
        // }
        echo json_encode($response);
    }
   
    /**
     * @method user_edit
     * @description edit dynamic rows
     * @return array
     */

     
    public function edit() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;
        $id = decoding($_GET['id']);


        if (!empty($id)) {
           

            $option = array(
                'table' => 'appointment',
                'select' => 'appointment.*, users.first_name, users.last_name',
                'join' => array(
                    array('users', 'users.id = appointment.doctor_id', 'left')
                ),
                'where' => array('appointment.id' => $id),
                'single' => true
            );

            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {
                // $option = array('table' => 'countries',
                //     'select' => '*');
                // $this->data['countries'] = $this->common_model->customGet($option);
                // $option = array('table' => 'states',
                //     'select' => '*');
                $this->data['states'] = $this->common_model->customGet($option);
                $this->data['results'] = $results_row;
               // print_r( json_decode($this->data['results']->care_unit_id));die;
                $option = array('table' => 'care_unit',
                    'select' => '*','where'=>array('delete_status'=>0),'order' => array('name' => 'ASC'));
                $this->data['care_unit'] = $this->common_model->customGet($option);
                $option = array('table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name,UP.doc_file',
                'join' => array(array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left'),
                    array('user_profile UP', 'UP.user_id=user.id', 'left')),
                'order' => array('user.id' => 'ASC'),
                'where' => array('user.delete_status' => 0,
                    'group.id' => 3),
                'order' => array('user.first_name' => 'ASC')
            );

            $this->data['staward'] = $this->common_model->customGet($option);
                $this->load->admin_render('edit', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('vendors');
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect('vendors');
        }
    }

    /**
     * @method user_update
     * @description update dynamic rows
     * @return array
     */
    public function update() {
        
        $this->form_validation->set_rules('date', lang('date'), 'required');
        $this->form_validation->set_rules('time_start', lang('time_start'), 'required');
        $this->form_validation->set_rules('time_end', lang('time_end'), 'required');
        // $this->form_validation->set_rules('patient_name', lang('patient_name'), 'required');
        $this->form_validation->set_rules('doctor_name', lang('doctor_name'), 'required');
        // $this->form_validation->set_rules('reason', lang('reason'), 'required');
     
       
        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == true){
        
            $options_data = array(
                        
                'date' => $this->input->post('date'),
                'time_start' => $this->input->post('time_start'),
                'time_end' => $this->input->post('time_end'),
                // 'patient_id' => $this->input->post('patient_name'),
                'doctor_id' => $this->input->post('doctor_name'),
                // 'reason' => $this->input->post('reason'),
               
            );
            // $update= $this->ion_auth->update($where_id, $options_data);
            $update = $this->db->update('vendor_sale_appointment', $options_data, array('id' => $where_id));
            // $update= $this->db->update('vendor_sale_appointment', $additional_data_profile);  
                if ($update) {
                    $html = array();
                    $response = array('status' => 1, 'message' => 'updated Successfully', 'url' => base_url('mdSteward/edit'), 'id' => encoding($this->input->post('id')));
                } else {
                    $response = array('status' => 0, 'message' => "The appointment address already exists");
                }
            } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
            }
            echo json_encode($response);
            }


    public function updateAccountStatus() {
        $id = decoding($this->input->post('userId'));
        $status = $this->input->post('status');
        if ($status == "No") {
            $status = 0;
        } else {
            $status = 1;
        }
        $options_data = array(
                        
            'status' => $status
        );
        $update = $this->db->update('vendor_sale_appointment', $options_data, array('id' => $id));
        // $update = $this->common_model->customUpdate(array('table' => 'appointment', 'data' => array('0' => $status), 'where' => array('id' => $id)));
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
                'data' => array('status' => 1),
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

    public function filterAppointmentsByDate()
    {
        $selectedDate = $this->input->post('selectedDate');
        
        $this->load->model('common_model');  // Make sure your model is loaded
    
        $option = array(
            'table' => 'clinic_appointment',
            'select' => 'clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name',
            'join' => array(
                array('users as U', 'clinic_appointment.location_appointment = U.id', 'left'),
                array('patient as pa', 'clinic_appointment.patient = pa.user_id', 'left'),
                array('clinic as cl', 'clinic_appointment.location_appointment = cl.id', 'left'),
                array('user_profile as UP', 'UP.user_id = U.id', 'left'),
                array('practitioner as pr', 'clinic_appointment.practitioner = pr.id', 'left'),
            ),
            'where' => array(
                'clinic_appointment.status' => 0
            ),
            'or_where' => array(
                'clinic_appointment.start_date_appointment' => $selectedDate,
                'clinic_appointment.theatre_date_time' => $selectedDate,
                'clinic_appointment.out_start_time_at' => $selectedDate,
                'clinic_appointment.start_date_availability' => $selectedDate
            )
        );
    
        $data['all_appointment'] = $this->common_model->customGet($option);
    // print_t($data['all_appointment']);die;
        // Respond with JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data['all_appointment']));
    }
    
public function filterdateDepartment(){

    $selectedDate = $this->input->post('selectedDate');
    $practitionerId = $this->input->post('departmentId'); // Capture practitioner ID
    

    if (is_array($practitionerId)) {
        $practitionerId = implode(',', $practitionerId);
    }

$CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';


$sql = "SELECT vendor_sale_practitioner.*
        FROM vendor_sale_practitioner
        -- WHERE (vendor_sale_practitioner.id IN ($practitionerId))
        -- AND (
        --     vendor_sale_practitioner.hospital_id LIKE '%$CareUnitID%'
            
        -- )
        ";

$result = $this->db->query($sql);

$doctorsData = $result->result();
// print_r($doctorsData);die;

$sql = "SELECT U.*, U.first_name, U.last_name
        FROM vendor_sale_doctors
        LEFT JOIN vendor_sale_users as U ON vendor_sale_doctors.user_id = U.id
        -- WHERE (vendor_sale_doctors.user_id IN ($practitionerId))
        -- AND (
        --     vendor_sale_doctors.facility_user_id LIKE '%$CareUnitID%'
            
        -- )
        ";

$result = $this->db->query($sql);

$practitionerData = $result->result();

$practitioner = array_merge($doctorsData, $practitionerData);


if(!empty($practitionerId)){


$sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        FROM vendor_sale_clinic_appointment
        LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
        LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        WHERE (vendor_sale_clinic_appointment.practitioner IN ($practitionerId) OR vendor_sale_clinic_appointment.theatre_clinician IN ($practitionerId))
        AND (
            vendor_sale_clinic_appointment.start_date_appointment LIKE '%$selectedDate%'
            OR vendor_sale_clinic_appointment.theatre_date_time LIKE '%$selectedDate%'
            OR vendor_sale_clinic_appointment.out_start_time_at LIKE '%$selectedDate%'
            OR vendor_sale_clinic_appointment.start_date_availability LIKE '%$selectedDate%'
        )
        ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                 vendor_sale_clinic_appointment.theatre_date_time DESC,
                 vendor_sale_clinic_appointment.out_start_time_at DESC,
                 vendor_sale_clinic_appointment.start_date_availability DESC";

$result = $this->db->query($sql);

$all_appointment = $result->result();

}else{
//     $sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
//         FROM vendor_sale_clinic_appointment
//         LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
//         LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
//         LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
//         LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
//         LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
//          WHERE (vendor_sale_clinic_appointment.practitioner IN ($practitionerId) OR vendor_sale_clinic_appointment.theatre_clinician IN ($practitionerId))
//         WHERE (
//             vendor_sale_clinic_appointment.start_date_appointment LIKE '%$selectedDate%'
//             OR vendor_sale_clinic_appointment.theatre_date_time LIKE '%$selectedDate%'
//             OR vendor_sale_clinic_appointment.out_start_time_at LIKE '%$selectedDate%'
//             OR vendor_sale_clinic_appointment.start_date_availability LIKE '%$selectedDate%'
//         )
//         ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
//                  vendor_sale_clinic_appointment.theatre_date_time DESC,
//                  vendor_sale_clinic_appointment.out_start_time_at DESC,
//                  vendor_sale_clinic_appointment.start_date_availability DESC";

// $result = $this->db->query($sql);

$sql = "SELECT vendor_sale_clinic_appointment.*, U.first_name, U.last_name, UP.address1, UP.city, UP.state, pa.name as patient_name, cl.name as clinic_name, cl.clinic_location, pr.name as practitioner_name
        FROM vendor_sale_clinic_appointment
        LEFT JOIN vendor_sale_users as U ON vendor_sale_clinic_appointment.location_appointment = U.id
        LEFT JOIN vendor_sale_patient as pa ON vendor_sale_clinic_appointment.patient = pa.user_id
        LEFT JOIN vendor_sale_clinic as cl ON vendor_sale_clinic_appointment.location_appointment = cl.id
        LEFT JOIN vendor_sale_user_profile as UP ON UP.user_id = U.id
        LEFT JOIN vendor_sale_practitioner as pr ON vendor_sale_clinic_appointment.practitioner = pr.id
        -- WHERE (vendor_sale_clinic_appointment.practitioner IN ($practitionerId) OR vendor_sale_clinic_appointment.theatre_clinician IN ($practitionerId))
        WHERE (
            vendor_sale_clinic_appointment.start_date_appointment LIKE '%$selectedDate%'
            OR vendor_sale_clinic_appointment.theatre_date_time LIKE '%$selectedDate%'
            OR vendor_sale_clinic_appointment.out_start_time_at LIKE '%$selectedDate%'
            OR vendor_sale_clinic_appointment.start_date_availability LIKE '%$selectedDate%'
        )
        ORDER BY vendor_sale_clinic_appointment.start_date_appointment DESC,
                 vendor_sale_clinic_appointment.theatre_date_time DESC,
                 vendor_sale_clinic_appointment.out_start_time_at DESC,
                 vendor_sale_clinic_appointment.start_date_availability DESC";

$result = $this->db->query($sql);

$all_appointment = $result->result();
}


//    $output ='<tbody>'?>
//                                             <?php
//                                                 $start_time = strtotime('07:00');
//                                                 $end_time = strtotime('24:00');
//                                                 $interval = 1 * 60;

//                                                 for ($time = $start_time; $time <= $end_time; $time += $interval) {
//                                                     $formatted_time = date('H:i', $time);
//                                                     echo '<tr><td class="time-cell">' . $formatted_time . '</td>';
                                                   
//                                                     foreach ($practitioner as $department) {
//                                                         $appointment_found = true;
                                                       
//                                                         foreach ($all_appointment as $appointment) {
//                                                             $appointmentTime = date('H:i', strtotime($appointment->start_date_appointment));
//                                                             $end_date_appointment = date('H:i', strtotime($appointment->end_date_appointment));
//                                                             $appointment_date = date('Y-m-d', strtotime($appointment->start_date_appointment));
                                                            
//                                                             $out_start_time_at = date('H:i', strtotime($appointment->out_start_time_at));
//                                                             $out_end_time_at = date('H:i', strtotime($appointment->out_end_time_at));
//                                                             $out_start_timeAt = date('Y-m-d', strtotime($appointment->out_start_time_at));
                                                            
//                                                             $start_date_availability = date('H:i', strtotime($appointment->start_date_availability));
//                                                             $end_time_date_availability = date('H:i', strtotime($appointment->end_time_date_availability));
//                                                             $start_dateAvailability = date('Y-m-d', strtotime($appointment->start_date_availability));
                                                            
//                                                             $theatre_date_time = date('H:i', strtotime($appointment->theatre_date_time));
//                                                             $theatre_time_duration = $appointment->theatre_time_duration;
//                                                             $durationInSeconds = $theatre_time_duration * 60;
//                                                             $theatre_end_time = date('H:i', strtotime($theatre_date_time . " +$durationInSeconds seconds"));
//                                                             $theatre_dateTime = date('Y-m-d', strtotime($appointment->theatre_date_time));
                                                            
                                                            
//                                                             $current_date = date('Y-m-d');
                                                        

//                                                             if ($appointment->practitioner == $department->id || $appointment->theatre_clinician == $department->id) {
//                                                                 if ($appointment->type == 'clinic_appointment' && $formatted_time >= $appointmentTime && $formatted_time <= $end_date_appointment) {
//                                                                     if ($formatted_time == $appointmentTime) {
//                                                                         echo '<td class="day-cell appointment-row" rowspan="' . (($end_date_appointment - $appointmentTime) / $interval) . '" id="dateDisplay" data-date="' . $appointment_date . '" data-day="' . $appointment->practitioner . '"><label style="background-color:green; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: green; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->comment_appointment . '<br>' . $appointmentTime . ' - ' . $end_date_appointment . '</span></label></td>';
//                                                                     }
//                                                                     $appointment_found = false;
//                                                                     break;
//                                                                 } elseif ($appointment->type == 'out_of_office_appointment' && $formatted_time >= $out_start_time_at && $formatted_time <= $out_end_time_at) {
//                                                                     if ($formatted_time == $out_start_time_at) {
//                                                                         echo '<td class="day-cell appointment-row" rowspan="' . (($out_end_time_at - $out_start_time_at) / $interval) . '" id="dateDisplay" data-date="' . $out_start_timeAt . '" data-day="' . $appointment->practitioner . '"><label style="background-color:pink; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: pink; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->out_of_office_comment . '<br>' . $out_start_time_at . ' - ' . $out_end_time_at . '</span></label></td>';
//                                                                     }
//                                                                     $appointment_found = false;
//                                                                     break;
//                                                                 } elseif ($appointment->type == 'availability_appointment' && $formatted_time >= $start_date_availability && $formatted_time <= $end_time_date_availability) {
//                                                                     if ($formatted_time == $start_date_availability) {
//                                                                         echo '<td class="day-cell appointment-row" rowspan="' . (($end_time_date_availability - $start_date_availability) / $interval) . '" id="dateDisplay" data-date="' . $start_dateAvailability . '" data-day="' . $appointment->practitioner . '"><label style="background-color:#40E0D0; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: #40E0D0; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>Available<br>' . $start_date_availability . ' - ' . $end_time_date_availability . '</span></label></td>';
//                                                                     }
//                                                                     $appointment_found = false;
//                                                                     break;
//                                                                 } elseif ($appointment->type == 'theatre_appointment' && $formatted_time >= $theatre_date_time && $formatted_time <= $theatre_end_time) {
//                                                                     if ($formatted_time == $theatre_date_time) {
//                                                                         echo '<td class="day-cell appointment-row" rowspan="' . (($theatre_end_time - $theatre_date_time) / $interval) . '" id="dateDisplay" data-date="' . $theatre_dateTime . '" data-day="' . $appointment->theatre_clinician . '"><label style="background-color:#800080; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: #800080; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->theatre_comment . '<br>' . $theatre_date_time . ' - ' . $theatre_end_time . '</span></label></td>';
//                                                                     }
//                                                                     $appointment_found = false;
//                                                                     break;
//                                                                 }
//                                                                 // $appointment_found = false;
//                                                                 // break;
//                                                             }
//                                                         }
//                                                         if ($appointment_found) {
//                                                             echo '<td class="day-cell" data-time="' . $formatted_time . '" data-day="' . $department->id . '"></td>';
//                                                         }
//                                                     }
//                                                     echo '</tr>';
//                                                 }
//                                             '
//                                         </tbody>';



$output ='<tbody>'?>
                                            
                                        <?php
                                            $start_time = strtotime('07:00');
                                            $end_time = strtotime('24:00');
                                            $interval = 15 * 60;

                                            for ($time = $start_time; $time <= $end_time; $time += $interval) {

                                                $formatted_time = date('H:i', $time);
                                           
                                                echo '<tr>
                                                <td class="time-cell">' . $formatted_time . '</td>';
                                               
                                                foreach ($practitioner as $key => $value)
                                                {
                                                $object = $value->id;
                                               
                                                
                                                        echo '<td class="time-cell">';
                                                       
                                                    
                                                    foreach ($all_appointment as $appointment) {
                                                        
                                                        $appointmentTime = date('H:i', strtotime($appointment->start_date_appointment));
                                                        $end_date_appointment = date('H:i', strtotime($appointment->end_date_appointment));
                                                        $appointment_date = date('Y-m-d', strtotime($appointment->start_date_appointment));
                                                        
                                                        $out_start_time_at = date('H:i', strtotime($appointment->out_start_time_at));
                                                        $out_end_time_at = date('H:i', strtotime($appointment->out_end_time_at));
                                                        $out_start_timeAt = date('Y-m-d', strtotime($appointment->out_start_time_at));
                                                        
                                                        $start_date_availability = date('H:i', strtotime($appointment->start_date_availability));
                                                        $end_time_date_availability = date('H:i', strtotime($appointment->end_time_date_availability));
                                                        $start_dateAvailability = date('Y-m-d', strtotime($appointment->start_date_availability));
                                                        
                                                        $theatre_date_time = date('H:i', strtotime($appointment->theatre_date_time));
                                                        $theatre_time_duration = $appointment->theatre_time_duration;
                                                        $durationInSeconds = $theatre_time_duration * 60;
                                                        $theatre_end_time = date('H:i', strtotime($theatre_date_time . " +$durationInSeconds seconds"));
                                                        $theatre_dateTime = date('Y-m-d', strtotime($appointment->theatre_date_time));
                                                        
                                                        
                                                        $current_date = date('Y-m-d');

                                                       

                                                                    if ($appointment->practitioner == $object && $formatted_time >= $appointmentTime && $formatted_time <= $end_date_appointment) {
                                                                        if ($formatted_time == $appointmentTime) {
                                                                            echo '<label style="background-color:green; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: green; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->comment_appointment . '<br>' . $appointmentTime . ' - ' . $end_date_appointment . '</span></label>';
                                                                        }
                                                                        
                                                                    } elseif ($appointment->practitioner == $object && $formatted_time >= $out_start_time_at && $formatted_time <= $out_end_time_at) {
                                                                        if ($formatted_time == $out_start_time_at) {
                                                                            echo '<label style="background-color:pink; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: pink; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->out_of_office_comment . '<br>' . $out_start_time_at . ' - ' . $out_end_time_at . '</span></label>';
                                                                        }
                                                                        
                                                                    } elseif ($appointment->practitioner == $object && $formatted_time >= $start_date_availability && $formatted_time <= $end_time_date_availability) {
                                                                        if ($formatted_time == $start_date_availability) {
                                                                            echo '<label style="background-color:#40E0D0; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: #40E0D0; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>Available<br>' . $start_date_availability . ' - ' . $end_time_date_availability . '</span></label>';
                                                                        }
                                                                        
                                                                    } elseif ($appointment->theatre_clinician == $object && $formatted_time >= $theatre_date_time && $formatted_time <= $theatre_end_time) {
                                                                        if ($formatted_time == $theatre_date_time) {
                                                                            echo '<label style="background-color:#800080; text-align: center; border: 2px solid; border-radius: 5px; padding: 11px;"><span style="background-color: #800080; color: white;"><strong>' . $appointment->first_name . ' ' . $appointment->last_name . '</strong><br>' . $appointment->theatre_comment . '<br>' . $theatre_date_time . ' - ' . $theatre_end_time . '</span></label>';
                                                                        }
                                                                       
                                                                }
                                                                    
                                                        }
                                                        echo '</td>';
                                                   
                                                }
                                                         
                                                        
                                                        echo '</tr>';
                                                   
                                     }
                                          
                                   '</tbody>';  

                                        
                                  
}

}
