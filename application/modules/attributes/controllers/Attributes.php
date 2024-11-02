<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes extends Common_Controller {

    public $data = array();
    public $file_data = "";
    public $_table = 'appointment_type';
    public $title = "Appointment Type";

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
        $option = array('table' => $this->_table, 'where' => array('delete_status' => 0),'order'=>array('name'=>'asc'));
        $this->data['list'] = $this->common_model->customGet($option);
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
        $this->load->view('add', $this->data);
    }

    /**
     * @method menu_category_add
     * @description add dynamic rows
     * @return array
     */
    public function add() {

        $this->form_validation->set_rules('name', "Name", 'required|trim');
        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            $image = "";
            if (!empty($_FILES['image']['name'])) {
                $this->filedata = $this->commonUploadImage($_POST, 'submenu', 'image');
                if ($this->filedata['status'] == 1) {
                    $image = 'uploads/submenu/' . $this->filedata['upload_data']['file_name'];
                }
            }
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            } else {
                $options_data = array(
                    'name' => $this->input->post('name'),
                    'is_active' => 1,
                    'create_date' => datetime()
                );
                $option = array('table' => $this->_table, 'data' => $options_data);
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

    public function clinic() {
        $user_id = $this->session->userdata('user_id');

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . 'clinic';
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['title'] = 'clinic';
        $this->data['tablePrefix'] = 'vendor_sale_' . 'clinic';
        $this->data['table'] = 'clinic';
        $option = array('table' => 'clinic',
        //  'where' => array('hospital_id'=>$user_id,'delete_status' => 0),
         'order'=>array('name'=>'asc'));
        $this->data['list'] = $this->common_model->customGet($option);
        $this->load->admin_render('list_clinic', $this->data, 'inner_script');
    }

    /**
     * @method open_model
     * @description load model box
     * @return array
     */
    function open_model_clinic() {
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrlClinic'] = $this->router->fetch_class() . "/add_clinic";
        $this->load->view('add_clinic', $this->data);
    }

    /**
     * @method menu_category_add
     * @description add dynamic rows
     * @return array
     */
    public function add_clinic() {

        $this->form_validation->set_rules('name', "Name", 'required|trim');
        $this->form_validation->set_rules('clinic_location', "Clinic Location", 'required|trim');
        if ($this->form_validation->run() == true) {
            
                $user_id = $this->session->userdata('user_id');
                $options_data = array(
                    'name' => $this->input->post('name'),
                    'clinic_location' => $this->input->post('clinic_location'),
                    'hospital_id' => $user_id,
                    'is_active' => 1,
                    'create_date' => datetime()
                );
                $option = array('table' => 'clinic', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
                    $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class().'/'.'clinic'));
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
    public function edit_clinic() {
        $this->data['title'] = "Edit " . 'Clinic';
        $this->data['formUrlClinic'] = $this->router->fetch_class() . "/update_clinic";
        $id = decoding($this->input->post('id'));
        if (!empty($id)) {
            $option = array(
                'table' => 'clinic',
                'where' => array('id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {
                $this->data['results'] = $results_row;
                $this->load->view('edit_clinic', $this->data);
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
    public function update_clinic() {

        $this->form_validation->set_rules('name', "Name", 'required|trim');
        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            

                $options_data = array(
                    'name' => $this->input->post('name'),
                    'clinic_location' => $this->input->post('clinic_location')
                );
                $option = array(
                    'table' => 'clinic',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url($this->router->fetch_class()));
            
        endif;

        echo json_encode($response);
    }



    public function practitioner() {
        $user_id = $this->session->userdata('user_id');

        $this->data['url'] = base_url() . $this->router->fetch_class();
        $this->data['pageTitle'] = "Add " . $this->title;
        $this->data['parent'] = $this->router->fetch_class();
        $this->data['model'] = $this->router->fetch_class();
        $this->data['title'] = $this->title;
        $this->data['tablePrefix'] = 'vendor_sale_' . 'practitioner';
        $this->data['table'] = 'practitioner';
        $option = array('table' => 'practitioner', 
        // 'where' => array('hospital_id'=>$user_id,'delete_status' => 0),
        'order'=>array('name'=>'asc'));
        $this->data['list'] = $this->common_model->customGet($option);
        $this->load->admin_render('list_practitioner', $this->data, 'inner_script');
    }

    /**
     * @method open_model
     * @description load model box
     * @return array
     */
    function open_model_practitioner() {
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/add_practitioner";
        $this->load->view('add_practitioner', $this->data);
    }

    /**
     * @method menu_category_add
     * @description add dynamic rows
     * @return array
     */
    public function add_practitioner() {

        $this->form_validation->set_rules('name', "Name", 'required|trim');

        $email = strtolower($this->input->post('email'));
        // print_r($email);die;
        $zipcode = $this->input->post('zipcode');
        $options = array(
            'table' => 'practitioner',
            'select' => 'practitioner.email,practitioner.id',
            'where' => array('practitioner.email' => $email, 'practitioner.delete_status' => 0),
            'single' => true
        );
        $exist_email = $this->common_model->customGet($options);
        if (!empty($exist_email)) {

            $this->form_validation->set_rules('email', lang('email'), 'trim|xss_clean|is_unique[practitioner.email]');
        }

        if ($this->form_validation->run() == true) {
            
                $user_id = $this->session->userdata('user_id');

                $options_data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'hospital_id' => $user_id,
                    'is_active' => 1,
                    'create_date' => datetime()
                );
                $option = array('table' => 'practitioner', 'data' => $options_data);
                if ($this->common_model->customInsert($option)) {
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

    /**
     * @method menu_category_edit
     * @description edit dynamic rows
     * @return array
     */
    public function edit_practitioner() {
        $this->data['title'] = "Edit " . 'Practitioner';
        $this->data['formUrl'] = $this->router->fetch_class() . "/update_practitioner";
        $id = decoding($this->input->post('id'));
        if (!empty($id)) {
            $option = array(
                'table' => 'practitioner',
                'where' => array('id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {
                $this->data['results'] = $results_row;
                $this->load->view('edit_practitioner', $this->data);
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect($this->router->fetch_class());
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    public function update_practitioner() {

        $this->form_validation->set_rules('name', "Name", 'required|trim');
        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
           
                $options_data = array(
                    'name' => $this->input->post('name')
                );
                $option = array(
                    'table' => 'practitioner',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url($this->router->fetch_class()));
            // }
        endif;

        echo json_encode($response);
    }

}
