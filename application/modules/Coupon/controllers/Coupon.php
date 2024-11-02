<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends Common_Controller {

    public $data = array();
    public $file_data = "";
    public $_table = 'vendor_sale_coupons';
    public $title = "Coupon";

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

       
         $hospital = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

         $option = array(
            'table' => 'coupons',
            'select' => 'coupon_type,coupon_code,user_size,total_use_user,cash_type,amount,id,used_type,min_amount,max_amount,percentage_in_amount',
            // 'where' => array('coupon_code' => $coupon_code,'end_date >=' => $currDate,'start_date <=' => $currDate,'status' => 1),
            'where' => array('delete_status' => 0),
            'where_in' => array('coupon_type' => array(0,1,2,3, 4)),
            
        );
       
        $this->data['list'] = $this->common_model->customGet($option);
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
        $this->load->view('add', $this->data);
    }

    /**
     * @method menu_category_add
     * @description add dynamic rows
     * @return array
     */
    public function add() {

        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
      

        $this->form_validation->set_rules('cash_type', "cash_type", 'required');
        $this->form_validation->set_rules('used_type', "used_type", 'required');
        $this->form_validation->set_rules('coupon_type', "coupon_type", 'required');
        $this->form_validation->set_rules('user_size', "user_size", 'required');
        $this->form_validation->set_rules('min_amount', "min_amount", 'required');
        $this->form_validation->set_rules('amount', "amount", 'required');
        $this->form_validation->set_rules('percentage_in_amount', "percentage_in_amount", 'required');

        $this->form_validation->set_rules('start_date', "start_date", 'required');
        $this->form_validation->set_rules('end_date', "end_date", 'required');
       

        
        if ($this->form_validation->run() == true) {
            
                    // $name = $this->input->post('name');

                    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    $code = "";
                    for ($i = 0; $i < 8; $i++) {
                        $code .= $chars[mt_rand(0, strlen($chars)-1)];
                    }

                    $options_data = array(
                        'cash_type' => $this->input->post('cash_type'),
                        'coupon_code' =>$code,
                        // 'total_use_user' => 1,
                        'used_type' => $this->input->post('used_type'),
                        'coupon_type'=> $this->input->post('coupon_type'),
                        'user_size'=> $this->input->post('user_size'),
                        'min_amount'=> $this->input->post('min_amount'),
                        // 'max_amount'=>,
                        'amount'=>$this->input->post('amount'),
                        'percentage_in_amount'=>$this->input->post('percentage_in_amount'),
                        'start_date'=>$this->input->post('start_date'),
                        'end_date'=>$this->input->post('end_date'),
                      
                    );
                    
                    
                    $option = array('table' => $this->_table, 'data' => $options_data);
                    $this->common_model->customInsert($option);

                        $response = array('status' => 1, 'message' => "Successfully added", 'url' => base_url($this->router->fetch_class()));
                   
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
        $this->data['updateFormUrl'] = $this->router->fetch_class() . "/update";
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

        // $this->form_validation->set_rules('name', "User Name", 'required|trim');
        $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
      

        $this->form_validation->set_rules('cash_type', "cash_type", 'required|trim');
        $this->form_validation->set_rules('used_type', "used_type", 'required|trim');
        $this->form_validation->set_rules('coupon_type', "coupon_type", 'required|trim');
        $this->form_validation->set_rules('user_size', "user_size", 'required|trim');
        $this->form_validation->set_rules('min_amount', "min_amount", 'required|trim');
        $this->form_validation->set_rules('amount', "amount", 'required|trim');
        $this->form_validation->set_rules('percentage_in_amount', "percentage_in_amount", 'required|trim');

        $this->form_validation->set_rules('start_date', "start_date", 'required|trim');
        $this->form_validation->set_rules('end_date', "end_date", 'required|trim');

        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == TRUE):
        


            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    $code = "";
                    for ($i = 0; $i < 8; $i++) {
                        $code .= $chars[mt_rand(0, strlen($chars)-1)];
                    }

                    $options_data = array(
                        'cash_type' => $this->input->post('cash_type'),
                        'coupon_code' =>$code,
                        // 'total_use_user' => 1,
                        'used_type' => $this->input->post('used_type'),
                        'coupon_type'=> $this->input->post('coupon_type'),
                        'user_size'=> $this->input->post('user_size'),
                        'min_amount'=> $this->input->post('min_amount'),
                        // 'max_amount'=>,
                        'amount'=>$this->input->post('amount'),
                        'percentage_in_amount'=>$this->input->post('percentage_in_amount'),
                        'start_date'=>$this->input->post('start_date'),
                        'end_date'=>$this->input->post('end_date'),
                      
                    );
                    
                    $option = array(
                        'table' => $this->_table,
                        'data' => $options_data,
                        'where' => array('id' => $where_id)
                    );
                    $update = $this->common_model->customUpdate($option);
                    $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url($this->router->fetch_class()));
                
        endif;

        echo json_encode($response);
    }

    public function delete() {
        
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        
        if (!empty($table) && !empty($id) && !empty($id_name)) {
            // print_r($id_name);die;
            $option = array(
                'table' => $table,
                'data' => array('delete_status' => 1),
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
