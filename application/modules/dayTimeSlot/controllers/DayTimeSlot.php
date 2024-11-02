<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DayTimeSlot extends Common_Controller {

    public $data = array();
    public $file_data = "";
    public $_table = 'day_time_slot';
    public $title = "Week Form";

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
    
        $this->load->admin_render('list', $this->data, 'inner_script');
    }

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
      $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/add";
       
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
      
        $this->load->admin_render('add', $this->data, 'inner_script');
    }

    /**
     * @method users_add
     * @description add dynamic rows
     * @return array
     */
    public function add() {
        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;
        
        $option = array('table' => "users",
            'where' => array('active' => 1)
        );
        $this->data['users'] = $this->common_model->customGet($option);
       
        print_r($this->input->post('selectedDay'));die;
        $this->form_validation->set_rules('date', lang('date'), 'required');
        $this->form_validation->set_rules('time_start', lang('time_start'), 'required');
        $this->form_validation->set_rules('time_end', lang('time_end'), 'required');
        $this->form_validation->set_rules('doctor_name', lang('doctor_name'), 'required');
        
     
        if ($this->form_validation->run() == true) {

         $doctor_id =    $this->input->post('doctor_name');
         $date = $this->input->post('date');
         $start_time_range = $this->input->post('time_start'); // Example start time
         $end_time_range = $this->input->post('time_end');
            $option = array(
                'table' => 'appointment',
                'select' => 'appointment.*, users.first_name, users.last_name',
                'join' => array(
                    array('users', 'users.id = appointment.doctor_id', 'left')
                ),
                'where' => array(
                    'appointment.doctor_id' => $doctor_id,
                    'date' => $date,
                    'time_end >=' => $start_time_range,
                    'time_start <=' => $end_time_range
                )
                
            );
         
            $appointment_doctor = $this->common_model->customGet($option);
           
            if(!empty($appointment_doctor)){
                  
                        $response = array('status' => 0, 'message' => 'Already time slot is booked ?');
                    
                }  else {

                    $additional_data_profile = array(
                        
                        'date' => $this->input->post('date'),
                        'time_start' => $this->input->post('time_start'),
                        'time_end' => $this->input->post('time_end'),
                        'doctor_id' => $this->input->post('doctor_name'),
                       
                       
                    );

                    $insert_id =$this->db->insert('vendor_sale_appointment', $additional_data_profile); 
                 
                    if ($insert_id) {
                        $html = array();
                        $response = array('status' => 1, 'message' => 'Added Successfully', 'url' => base_url($this->router->fetch_class()));
                    } else {
                        $response = array('status' => 0, 'message' => lang('user_failed'));
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

}
