<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AllPlans extends Common_Controller {

    public $data = array();
    public $file_data = "";
    public $_table = 'admin_plans';
    public $title = "Admin Plans";

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

       
         $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
         
        $option = array('table' => $this->_table, 'where' => array('status' => 0), 'order' => array('id' => 'desc'));
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

    // function open_model_edit() {
    //     $this->data['title'] = "Add " . $this->title;
    //     $this->data['formUrl'] = $this->router->fetch_class() . "/add";
    //     $this->load->view('edit', $this->data);
    // }

    /**
     * @method menu_category_add
     * @description add dynamic rows
     * @return array
     */
    public function add() {

       
// "<pre>";
// print_r($this->input->post());die;
// "<pre>";

        $this->form_validation->set_rules('plan_name', "Plan Name", 'required|trim');
        $this->form_validation->set_rules('price', "Price", 'required|trim');
        $this->form_validation->set_rules('Duration', "Duration", 'required|trim');
        $this->form_validation->set_rules('plan_description', "plan_description", 'required|trim');
        // $this->form_validation->set_rules('icons', "icons", 'required');
        
        if ($this->form_validation->run() == true) {
            
           
                // $option = array('table' => $this->_table, 'where' => array('PlanName' => $this->input->post('plan_name')),array('DurationInMonths' => $this->input->post('Duration')));
              
                // if (!$this->common_model->customGet($option)) {
                    $plan_name = $this->input->post('plan_name');
                    

                    $image = "";
                    if (!empty($_FILES['icons']['name'])) {
                        $this->filedata = $this->commonUploadImage($_POST, 'icons', 'icons');
                        if ($this->filedata['status'] == 1) {
                            $image = 'uploads/icons/' . $this->filedata['upload_data']['file_name'];
                        }
                    }

                    $options_data = array(
                        'PlanName' => $plan_name,
                        'Price' => $this->input->post('price'),
                        'DurationInMonths' =>$this->input->post('Duration'),
                        'plan_description' => $this->input->post('plan_description'),
                        'icons' => $image,
                    );
                    $option = array('table' => $this->_table, 'data' => $options_data);
                   $this->common_model->customInsert($option);

                

                        $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                  
                    
                // } else {
                //     $response = array('status' => 0, 'message' => "PlanName already exists");
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
    public function open_model_edit() {
        $this->data['title'] = "Edit " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/update";
        $id = $this->input->get('id');
       
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

        $this->form_validation->set_rules('plan_name', "Plan Name", 'required|trim');
        $this->form_validation->set_rules('price', "Price", 'required|trim');
        $this->form_validation->set_rules('Duration', "Duration", 'required|trim');
        $this->form_validation->set_rules('plan_description', "plan_description", 'required|trim');
        
        // if ($this->form_validation->run() == true) {
            
           
                // $option = array('table' => $this->_table, 'where' => array('PlanName' => $this->input->post('plan_name')),array('DurationInMonths' => $this->input->post('Duration')));
              
                // if (!$this->common_model->customGet($option)) {
                    
                    
                    // $options_data = array(
                    //     'PlanName' => $this->input->post('plan_name'),
                    //     'Price' => $this->input->post('price'),
                    //     'DurationInMonths' =>$this->input->post('Duration'),
                    //     'plan_description' => $this->input->post('plan_description'),
                    // );
                    // $option = array('table' => $this->_table, 'data' => $options_data);
                //    $this->common_model->customInsert($option);
                // }

        $where_id = $this->input->post('id');
        
        if ($this->form_validation->run() == true):
        //     $messages = (validation_errors()) ? validation_errors() : '';
        //     $response = array('status' => 1, 'message' => $messages);
        // else:
        //     $this->filedata['status'] = 0;
           
        //     if ($this->filedata['status'] == 1) {
        //         $response = array('status' => 1, 'message' => $this->filedata['error']);
        //     } else {
                // print_r($this->input->post('plan_description'));die;


                $image = "";
                    if (!empty($_FILES['icons']['name'])) {
                        $this->filedata = $this->commonUploadImage($_POST, 'icons', 'icons');
                        if ($this->filedata['status'] == 1) {
                            $image = 'uploads/icons/' . $this->filedata['upload_data']['file_name'];
                        }
                    }
                    
                $option = array('table' => $this->_table, 'where' => array('id =' => $where_id));
                if (!empty($this->common_model->customGet($option))) {

                    

                    $options_data = array(
                        'PlanName' => $this->input->post('plan_name'),
                        'Price' => $this->input->post('price'),
                        'DurationInMonths' =>$this->input->post('Duration'),
                        'plan_description' => $this->input->post('plan_description'),
                        'icons' => $image,
                    );
                    
                    $option = array(
                        'table' => $this->_table,
                        'data' => $options_data,
                        'where' => array('id' => $where_id)
                    );
                    // print_r($option);die;
                    $update = $this->common_model->customUpdate($option);
                    $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url($this->router->fetch_class()));
                } else {
                    $response = array('status' => 0, 'message' => "plan id is empty"); 
                }
            // }
        endif;

        echo json_encode($response);
    }

}
