<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PatientDocuments extends Common_Controller {

    public $data = array();
    public $file_data = "";
    public $_table = 'patient_document_folder';
    public $_tables = 'patient_document_folder';
    // public $_tables = 'clinic';
    
    public $title = "Patient Documents";

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
        $this->data['modelFileGallery'] = $this->router->fetch_class()."/fileGallery";
        
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . $this->_table;
        $this->data['table'] = $this->_table;
        $this->data['patient_id'] = decoding($_GET['id']);
        // print_r($this->data['patient_id']);die;
        // $option = array('table' => $this->_tables);

       $id=  decoding($_GET['id']);
    //    print_r($id);die;
        $option = array(
            'table' => 'vendor_sale_patient_document_folder',
            'select' =>'vendor_sale_patient_document_folder`.*,vendor_sale_users.first_name,vendor_sale_users.last_name',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_patient_document_folder.user_id=vendor_sale_users.id', 'left'),
            ),
            
            'where' => array('vendor_sale_patient_document_folder.patient_id' => $id),
            'order' => array('vendor_sale_patient_document_folder.id' => 'DESC'),
        );

        $this->data['list'] = $this->common_model->customGet($option);

        $option = array(
            'table' => 'patient P',
            'select' => 'P.total_days_of_patient_stay,P.infection_surveillance_checklist,P.date_of_start_abx,P.md_patient_status,P.id ,P.patient_id,P.name as patient_name,P.address,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
                . 'P.care_unit_id,CI.name as care_unit_name,P.doctor_id,P.culture_source,P.organism,P.precautions,CS.name as culture_source_name,Org.name as organism_name,Pre.name as precautions_name,DOC.name as doctor_name,P.md_steward_id,U.first_name as md_steward,'
                . 'PC.initial_rx,IRX.name as initial_rx_name,PC.initial_dx,IDX.name as initial_dx_name,PC.initial_dot,'
                . 'PC.new_initial_rx,IRX2.name as new_initial_rx_name,PC.new_initial_dx,IDX2.name as new_initial_dx_name,PC.new_initial_dot,PC.additional_comment_option,PC.comment,U.email as patient_email,U.email as password, U.phone as patient_phone_number,U.date_of_birth,U.gender,U.phone_code,P.blood_group,P.blood_pressure,P.heart_rate,P.temperature',
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
            $this->data['results'] = $results_row;
            $patient_id=  decoding($_GET['id']);
            // print_r($patient_id);die;
            // $folder_id = $this->input->post('folder_id');
       
            $option = array(
                'table' => 'vendor_sale_patient_document_uploads',
                'where' => array('patient_id' => $patient_id),
                // 'single' => true
            );
            $results_files = $this->common_model->customGet($option);
            $this->data['results_files'] = $results_files;

          
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
                'doctors.facility_user_id'=>$CareUnitID
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
        // print_r($this->data['send_mail_template']);die;
    }
        
    // print_r($this->data['doctors']);die;
        $this->load->view('add', $this->data);
    }


    function open_modal_documents() {
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrlPDF'] = $this->router->fetch_class() . "/addPatientPdf";
        $this->data['patient_id'] = $this->input->post('id');
        $this->data['initial_dx'] = $this->common_model->customGet(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['culture_source'] = $this->common_model->customGet(array('table' => 'culture_source', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['organism'] = $this->common_model->customGet(array('table' => 'organism', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['precautions'] = $this->common_model->customGet(array('table' => 'precautions', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        $this->data['initial_rx'] = $this->common_model->customGet(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
        

        $id=  $this->input->post('id');
        //    print_r($id);die;
            $option = array(
                'table' => 'vendor_sale_patient_document_folder',
                'select' =>'vendor_sale_patient_document_folder`.*,vendor_sale_users.first_name,vendor_sale_users.last_name',
                'join' => array(
                    array('vendor_sale_users', 'vendor_sale_patient_document_folder.user_id=vendor_sale_users.id', 'left'),
                ),
                
                'where' => array('vendor_sale_patient_document_folder.patient_id' => $id)
            );
    
            $this->data['folder_name'] = $this->common_model->customGet($option);

        
        
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
                'doctors.facility_user_id'=>$CareUnitID
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
        // print_r($this->data['send_mail_template']);die;
    }
        
    // print_r($this->data['doctors']);die;
        $this->load->view('uploads_file', $this->data);
    }

    /**
     * @method menu_category_add
     * @description add dynamic rows
     * @return array
     */
    
    public function add() {

        $this->form_validation->set_rules('folder_name', "folder_name", 'required|trim');
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
        
                $options_data = array(
                   
                    'patient_id' => $this->input->post('patient_id'),
                    'user_id' => $user_id,
                    'facility_user_id' => $hospital_id,
                    'folder_name' => $this->input->post('folder_name'),
                    'is_active' => 1,
                    'create_date' => datetime()
                );
                $option = array('table' => 'vendor_sale_patient_document_folder', 'data' => $options_data);
                $this->common_model->customInsert($option);

                $response = array('status' => 1, 'message' => "Successfully added", 'url' =>base_url($this->router->fetch_class()));
                
        } else {
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        }
        echo json_encode($response);
    }


    public function addPatientPdf()

        {

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

            $this->form_validation->set_rules('folder_id', "folder id", 'required|trim');
            $this->form_validation->set_rules('file', 'File');
    
            if ($this->form_validation->run() == true) {
    
                $this->load->library('upload');
                $image = array();
                $ImageCount = count($_FILES['image_name']['name']);
                for ($i = 0; $i < $ImageCount; $i++) {
    
                    $_FILES['file']['name'] = $_FILES['image_name']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['image_name']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['image_name']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['image_name']['size'][$i];
    
                    // File upload configuration
                    $uploadPath = 'uploads/file/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'pdf|jpg|jpeg|png|ods|odt|doc|txt|docx|csv|xlsx|xls|ppt|pptx';
                    $config['max_size'] = 102400 * 2000;
                    $config['file_name'] = $_FILES['files']['name'][$i];
                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
    
                    // Upload file to server $image = $this->input->post('file');
    
                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $image = 'uploads/file/' . $uploadData['file_name'];
                    } else {
                        $image = "";
                    }
                    if (!$image) {
                        $response = array('status' => 0, 'message' => $this->filedata['error']);
                    } else {
                        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                        $options_data = array(
                   
                            'patient_id' => $this->input->post('patient_id'),
                            'user_id' => $CareUnitID,
                            'facility_user_id' => $hospital_id,
                            'folder_id' => $this->input->post('folder_id'),
                            'file_name' => $image,
                            'is_active' => 1,
                            'create_date' => datetime()
                        );
                        $option = array('table' => 'vendor_sale_patient_document_uploads', 'data' => $options_data);
                        // $this->common_model->customInsert($option);

    
                        // $option = array('table' => $this->_table, 'data' => $options_data);
    
                        if ($this->common_model->customInsert($option)) {
                            $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                        } else {
                            $response = array('status' => 0, 'message' => "Failed to add");
                        }
                    }
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

     public function fileGallery(){

            $this->data['title'] = "View " . $this->title;
            $this->data['back'] = $this->router->fetch_class();
            $this->data['patient_id'] = $this->input->post('id');
            $this->data['initial_dx'] = $this->common_model->customGet(array('table' => 'initial_dx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
            $this->data['culture_source'] = $this->common_model->customGet(array('table' => 'culture_source', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
            $this->data['organism'] = $this->common_model->customGet(array('table' => 'organism', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
            $this->data['precautions'] = $this->common_model->customGet(array('table' => 'precautions', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
            $this->data['initial_rx'] = $this->common_model->customGet(array('table' => 'initial_rx', 'select' => 'id,name', 'where' => array('is_active' => 1, 'delete_status' => 0), 'order' => array('name' => 'asc')));
            
    
            $patient_id=  $this->input->post('id');
// print_r($patient_id);die;

            $folder_id = $this->input->post('folder_id');
        if (!empty($patient_id)) {
            $option = array(
                'table' => 'vendor_sale_patient_document_uploads',
                'where' => array('folder_id' => $folder_id,'patient_id'=>$patient_id),
                // 'single' => true
            );
            $results_row = $this->common_model->customGet($option);
          
            if (!empty($results_row)) {

                
                $this->data['results'] = $results_row;
                $this->load->view('show_file_list', $this->data);
            } else {
                
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }

     }


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
                'doctors.facility_user_id'=>$CareUnitID
            ),
            'order' => array('users.id' => 'desc'),
        );
        $this->data['doctors'] = $this->common_model->customGet($option);

        $send_mail_template = $this->common_model->customGet(array('table' => 'send_mail_template', 'select' => 'send_mail_template.description', 'where' => array('user_id' =>$CareUnitID,'app_name'=>$id)));
       $template_name =[];
        foreach($send_mail_template as $key=>$datavalues){
            $template_name[$key] =  $datavalues->description;

       } 
    //    print_r($template_name);die;
    //    $send_mailts= json_decode($template_name, true);
    //    $send_mailts=  implode(" ", $template_name);

//        $cleaned_content = str_replace(['<p>', '</p>'], '', $send_mailts);

// // Remove \r\n and \n
// $cleaned_content = str_replace(["\r\n", "\n"], '', $send_mailts);

// // Optionally remove &nbsp; if needed
// $cleaned_content = str_replace('&nbsp;', '', $send_mailts);



// $html_content = htmlspecialchars_decode($template_name, ENT_QUOTES);
// print_r($html_content);die;
// Replace <p> tags with newline characters
$text_content = preg_replace('/<p>(.*?)<\/p>/', "$1\n", $template_name);

// Replace <br> and <br/> tags with newline characters
$text_content = preg_replace('/<br\s*\/?>/', "\n", $text_content);

// Remove any remaining HTML tags
// $text_content = strip_tags($text_content);

// Convert escaped newline characters to actual newline characters
// $text_content = str_replace(['\r\n', '\n'], "\n", $text_content);

// Output the resulting text
// $text_content1= nl2br($text_content);
$send_mailts=  implode(', ', array_map(function($val){return sprintf("%s", $val);}, $text_content));
// $send_mailts=  implode(" ", $text_content);
       $response=  $this->data['send_mail_template']=$send_mailts;
        // print_r($this->data['send_mail_template']);die;
    }

    echo json_encode($response);

    }

}
