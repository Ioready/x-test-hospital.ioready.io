<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends MY_Model {

    public function __construct() {
        parent::__construct();

        $this->load->config('ion_auth', TRUE);
        $this->load->helper('cookie');
        $this->load->helper('date');
        $this->load->library(array("ion_auth"));

        $this->identity_column = $this->config->item('identity', 'ion_auth');
        $this->store_salt = $this->config->item('store_salt', 'ion_auth');
        $this->salt_length = $this->config->item('salt_length', 'ion_auth');
        $this->join = $this->config->item('join', 'ion_auth');


        //initialize hash method options (Bcrypt)
        $this->hash_method = $this->config->item('hash_method', 'ion_auth');
        $this->default_rounds = $this->config->item('default_rounds', 'ion_auth');
        $this->random_rounds = $this->config->item('random_rounds', 'ion_auth');
        $this->min_rounds = $this->config->item('min_rounds', 'ion_auth');
        $this->max_rounds = $this->config->item('max_rounds', 'ion_auth');
    }

    /**
     * Hashes the password to be stored in the database.
     *
     * @return void
     * @author Developer
     * */
    public function hash_password($password, $salt = false) {
        if (empty($password)) {
            return FALSE;
        }

        //bcrypt
        if ($this->hash_method == 'bcrypt') {

            if ($this->random_rounds) {
                $rand = rand($this->min_rounds, $this->max_rounds);
                $rounds = array('rounds' => $rand);
            } else {
                $rounds = array('rounds' => $this->default_rounds);
            }

            $CI = & get_instance();

            $rounds['salt_prefix'] = '$2y$';
            $CI->load->library('frontbcrypt', $rounds);
            return $CI->frontbcrypt->hash($password);
        }


        if ($this->store_salt && $salt) {
            return sha1($password . $salt);
        } else {
            $salt = $this->salt();
            return $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        }
    }

    /**
     * This function takes a password and validates it
     * against an entry in the users table.
     *
     * @return void
     * @author Mathew
     * */
    public function hash_password_db($id, $password) {
        if (empty($id) || empty($password)) {
            return FALSE;
        }

        // $this->trigger_events('extra_where');

        $query = $this->db->select('id,password, salt')
                ->where('id', $id)
                ->limit(1)
                ->get('users');

        $hash_password_db = $query->row();

        if ($query->num_rows() !== 1) {
            return FALSE;
        }

        // bcrypt
        if ($this->hash_method == 'bcrypt') {
            $CI = & get_instance();
            $CI->load->library('frontbcrypt', null);

            if ($CI->frontbcrypt->verify($password, $hash_password_db->password)) {
                return TRUE;
            }
            return FALSE;
        }



        if ($this->store_salt) {
            return sha1($password . $hash_password_db->salt);
        } else {
            $salt = substr($hash_password_db->password, 0, $this->salt_length);

            return $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        }
    }

    /**
     * Generates a random salt value.
     *
     * @return void
     * @author developer
     * */
    public function salt() {
        return substr(md5(uniqid(rand(), true)), 0, $this->salt_length);
    }

    /**
     * encrypt value
     *
     * @return void
     * @author developer
     * */
    public function encryptPassword($password) {
        $salt = $this->store_salt ? $this->salt() : FALSE;
        return $this->hash_password($password, $salt);
    }

    /**
     * decript value.
     *
     * @return void
     * @author Mathew
     * */
    public function decryptPassword($id, $password) {

        return $this->hash_password_db($id, $password);
    }

    //Clear session data
    public function clearSessionData() {
        foreach ($this->session->userdata as $sess_var) {
            unset($sess_var);
        }
    }

    //Make the ID encrypted
    public function id_encrypt($str) {
        return $str * 55;
    }

    //Make the ID decrypted
    public function id_decrypt($str) {
        return $str / 55;
    }

    //Password 
    public function password_encrip($str) {
        return $str * 55;
    }

    function fetchSingleData($select, $table, $where) {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $res = $this->db->get()->row();
        return $res;
    }

    function fetchAllData($select, $table, $where) {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $res = $this->db->get()->result();
        return $res;
    }

    /* <!--INSERT RECORD FROM SINGLE TABLE--> */

    function insertData($table, $dataInsert) {
        $this->db->insert($table, $dataInsert);
        return $this->db->insert_id();
    }

    function insertTable($table, $data){
        
        $this->db->insert($table,$data);
        $num = $this->db->insert_id();
        if($num){
          return $num;
          }else{
          return FALSE;
        }
}
    /* <!--UPDATE RECORD FROM SINGLE TABLE--> */

    function updateFields($table, $data, $where) {
        $this->db->update($table, $data, $where);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deleteData($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* ---GET SINGLE RECORD--- */

    function getsingle($table, $where = '', $fld = NULL, $order_by = '', $order = '') {

        if ($fld != NULL) {
            $this->db->select($fld);
        }
        $this->db->limit(1);

        if ($order_by != '') {
            $this->db->order_by($order_by, $order);
        }
        if ($where != '') {
            $this->db->where($where);
        }

        $q = $this->db->get($table);
        $num = $q->num_rows();
        if ($num > 0) {
            return $q->row();
        }
    }

    /* <!--Join tables get single record with using where condition--> */

    function GetJoinRecord($table, $field_first, $tablejointo, $field_second, $field_val = '', $where = "", $group_by = '', $order_fld = '', $order_type = '', $limit = '', $offset = '') {
        $data = array();
        if (!empty($field_val)) {
            $this->db->select("$field_val");
        } else {
            $this->db->select("*");
        }
        $this->db->from("$table");
        $this->db->join("$tablejointo", "$tablejointo.$field_second = $table.$field_first", "inner");
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($group_by)) {
            $this->db->group_by($group_by);
        }

        $clone_db = clone $this->db;
        $total_count = $clone_db->count_all_results();

        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }
        if (!empty($order_fld) && !empty($order_type)) {
            $this->db->order_by($order_fld, $order_type);
        }
        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
        }
        return array('total_count' => $total_count, 'result' => $data);
    }

    /* ---GET MULTIPLE RECORD--- */

    function getAllwhere($table, $where = '', $order_fld = '', $order_type = '', $select = 'all', $limit = '', $offset = '', $group_by = '') {
        $data = array();
        if ($order_fld != '' && $order_type != '') {
            $this->db->order_by($order_fld, $order_type);
        }
        if ($select == 'all') {
            $this->db->select('*');
        } else {
            $this->db->select($select);
        }
        $this->db->from($table);
        if ($where != '') {
            $this->db->where($where);
        }
        if (!empty($group_by)) {
            $this->db->group_by($group_by);
        }

        $clone_db = clone $this->db;
        $total_count = $clone_db->count_all_results();

        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }

        $q = $this->db->get();
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
        }
        return array('total_count' => $total_count, 'result' => $data);
    }

    /* ---GET MULTIPLE RECORD--- */

    function getAll($table, $order_fld = '', $order_type = '', $select = 'all', $limit = '', $offset = '', $group_by = '') {
        $data = array();
        if ($select == 'all') {
            $this->db->select('*');
        } else {
            $this->db->select($select);
        }
        if ($group_by != '') {
            $this->db->group_by($group_by);
        }
        $this->db->from($table);

        $clone_db = clone $this->db;
        $total_count = $clone_db->count_all_results();

        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }
        if ($order_fld != '' && $order_type != '') {
            $this->db->order_by($order_fld, $order_type);
        }
        $q = $this->db->get();
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
        }
        return array('total_count' => $total_count, 'result' => $data);
    }

    /* <!--GET ALL COUNT FROM SINGLE TABLE--> */

    function getcount($table, $where = "") {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $q = $this->db->count_all_results($table);
        return $q;
    }

    function getTotalsum($table, $where, $data) {
        $this->db->where($where);
        $this->db->select_sum($data);
        $q = $this->db->get($table);
        return $q->row();
    }

    function GetJoinRecordNew($table, $field_first, $tablejointo, $field_second, $field, $value, $field_val, $group_by = '', $order_fld = '', $order_type = '', $limit = '', $offset = '') {
        $data = array();
        $this->db->select("$field_val");
        $this->db->from("$table");
        $this->db->join("$tablejointo", "$tablejointo.$field_second = $table.$field_first");
        $this->db->where("$table.$field", "$value");
        if (!empty($group_by)) {
            $this->db->group_by($group_by);
        }

        $clone_db = clone $this->db;
        $total_count = $clone_db->count_all_results();

        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }
        if (!empty($order_fld) && !empty($order_type)) {
            $this->db->order_by($order_fld, $order_type);
        }
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
        }
        return array('total_count' => $total_count, 'result' => $data);
    }

    function GetJoinRecordThree($table, $field_first, $tablejointo, $field_second, $tablejointhree, $field_three, $table_four, $field_four, $field_val = '', $where = "", $group_by = "", $order_fld = '', $order_type = '', $limit = '', $offset = '') {
        $data = array();
        if (!empty($field_val)) {
            $this->db->select("$field_val");
        } else {
            $this->db->select("*");
        }
        $this->db->from("$table");
        $this->db->join("$tablejointo", "$tablejointo.$field_second = $table.$field_first", 'inner');
        $this->db->join("$tablejointhree", "$tablejointhree.$field_three = $table_four.$field_four", 'inner');
        if (!empty($where)) {
            $this->db->where($where);
        }

        if (!empty($group_by)) {
            $this->db->group_by($group_by);
        }
        $clone_db = clone $this->db;
        $total_count = $clone_db->count_all_results();

        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }

        if (!empty($order_fld) && !empty($order_type)) {
            $this->db->order_by($order_fld, $order_type);
        }
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
        }
        return array('total_count' => $total_count, 'result' => $data);
    }

    function getAllwhereIn($table, $where = '', $column = '', $wherein = '', $order_fld = '', $order_type = '', $select = 'all', $limit = '', $offset = '', $group_by = '') {
        $data = array();
        if ($order_fld != '' && $order_type != '') {
            $this->db->order_by($order_fld, $order_type);
        }
        if ($select == 'all') {
            $this->db->select('*');
        } else {
            $this->db->select($select);
        }
        $this->db->from($table);
        if ($where != '') {
            $this->db->where($where);
        }
        if ($wherein != '') {
            $this->db->where_in($column, $wherein);
        }
        if ($group_by != '') {
            $this->db->group_by($group_by);
        }

        $clone_db = clone $this->db;
        $total_count = $clone_db->count_all_results();

        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }

        $q = $this->db->get();
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
        }
        return array('total_count' => $total_count, 'result' => $data);
    }

    public function fetch_data($query) {

        // $CareUnitID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
       
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
            // print_r($datadoctors->facility_user_id);die;
           
            // $this->db->like('patient_id', $query);

            $this->db->select('vendor_sale_patient.*, vendor_sale_users.first_name, vendor_sale_users.last_name');
            $this->db->from('vendor_sale_patient');
            $this->db->like('vendor_sale_patient.patient_id', $query);
            $this->db->like('vendor_sale_patient.name', $query);
            $this->db->where('vendor_sale_patient.operator_id', $hospital_id);
            // $this->db->where('vendor_sale_users.hospital_id',$hospital_id);

            // Adding relation (LEFT JOIN) with vendor_sale_users based on a column like operator_id
            $this->db->join('vendor_sale_users', 'vendor_sale_patient.operator_id = vendor_sale_users.id', 'inner');

            // Run the query
            $query = $this->db->get();
            $data = $query->result();

        // print_r($query);die;
        } else if ($this->ion_auth->is_facilityManager()) {
            
           
            // $this->db->like('patient_id', $query);
            // $this->db->like('name', $query);
            // $this->db->where('operator_id', $CareUnitID);
            // // $this->db->limit(1); 
            // $query = $this->db->get('vendor_sale_patient');

            $this->db->select('vendor_sale_patient.*, vendor_sale_users.first_name, vendor_sale_users.last_name');
            $this->db->from('vendor_sale_patient');
            $this->db->like('vendor_sale_patient.patient_id', $query);
            $this->db->like('vendor_sale_patient.name', $query);
            $this->db->where('vendor_sale_patient.operator_id', $hospital_id);
            // $this->db->where('vendor_sale_users.hospital_id',$hospital_id);

            // Adding relation (LEFT JOIN) with vendor_sale_users based on a column like operator_id
            $this->db->join('vendor_sale_users', 'vendor_sale_patient.operator_id = vendor_sale_users.id', 'inner');

            // Run the query
            $query = $this->db->get();
            $data = $query->result();

        }



        return $query->result_array(); // Ensure result_array() is used
    }


    
    // function getWhere($table,$where){ 
    //     //$this->db->order_by("id", "desc"); 
    //     $this->db->where($where);
    //     $getdata = $this->db->get($table);    
    //     $num = $getdata->num_rows();
    //     if($num> 0){ 
    //       $arr=$getdata->result();
    //       foreach ($arr as $rows)
    //       {
    //         $data[] = $rows;
    //       }
    //       $getdata->free_result();
    //       return $data;
    //       }else{ 
    //       return false;
    //       }
    //     }

    // function get_Where_join($tbl1,$tbl2,$field1,$field2,$select,$join_type,$where){   
	// 		$this->db->select($select);
	// 		$this->db->from($tbl1);
	// 		$this->db->where($where );
	// 		$this->db->join($tbl2, $tbl1.'.'.$field1.'='.$tbl2.'.'.$field2,$join_type);			
	// 		$getdata  = $this->db->get();
	// 		//echo $this->db->last_query();
	// 		//die;
	// 		$num = $getdata->num_rows();
	// 		if($num> 0){ 
	// 			$arr=$getdata->result();
	// 			foreach ($arr as $rows){
	// 				$data[] = $rows;
	// 			}
	// 			$getdata->free_result();
	// 			return $data;
	// 			} else{ 
	// 			return false;
	// 		}
	// }


    public function customQuerySql($query){
        $query =$this->db->query($query);
        if ($query->num_rows() > 0) {

        return $query->result();
        } else {
            return false;
        }
    }

    function insert($table, $data){
        $this->db->insert($table,$data);
        $num = $this->db->insert_id();
        if($num){
            return $num;
            }else{
            return FALSE;
        }
    }


    public function fetchConsultProblem($query) {

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
            $this->db->like('search', $query);
        $this->db->where('type', 'problem_heading');
        $query = $this->db->get('vendor_sale_consultation_problem_heading');

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $this->db->like('search', $query);
            $this->db->where('type', 'problem_heading');
            // $this->db->limit(1); 
            $query = $this->db->get('vendor_sale_consultation_problem_heading');
        }
        return $query->result_array(); // Ensure result_array() is used
    }

    public function fetchConsultExamination($query) {

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
            $this->db->like('search', $query);
       
        $query = $this->db->get('vendor_sale_consultation_examination');

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $this->db->like('search', $query);
            
            $query = $this->db->get('vendor_sale_consultation_examination');
        }
        return $query->result_array(); // Ensure result_array() is used
    }


    public function fetchConsultAllergy($query) {

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
            $this->db->like('search', $query);
       
        $query = $this->db->get('vendor_sale_consultation_allergy');

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $this->db->like('search', $query);
            
            $query = $this->db->get('vendor_sale_consultation_allergy');
        }
        return $query->result_array(); // Ensure result_array() is used
    }


    public function fetchConsultMedicalHistory($query) {

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
            $this->db->like('search', $query);
       
        $query = $this->db->get('vendor_sale_consultation_medical_history');

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $this->db->like('search', $query);
            
            $query = $this->db->get('vendor_sale_consultation_medical_history');
        }
        return $query->result_array(); // Ensure result_array() is used
    }

    public function fetchConsultFamilyHistory($query) {

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
            $this->db->like('search', $query);
       
        $query = $this->db->get('vendor_sale_consultation_family_history');

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $this->db->like('search', $query);
            
            $query = $this->db->get('vendor_sale_consultation_family_history');
        }
        return $query->result_array(); // Ensure result_array() is used
    }

    public function fetchConsultSocial($query) {

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
            $this->db->like('search', $query);
       
        $query = $this->db->get('vendor_sale_consultation_social');

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $this->db->like('search', $query);
            
            $query = $this->db->get('vendor_sale_consultation_social');
        }
        return $query->result_array(); // Ensure result_array() is used
    }


    public function fetchConsultMedication($query) {

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
            $this->db->like('search', $query);
       
        $query = $this->db->get('vendor_sale_consultation_medication');

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $this->db->like('search', $query);
            
            $query = $this->db->get('vendor_sale_consultation_medication');
        }
        return $query->result_array(); // Ensure result_array() is used
    }


    public function fetchConsultProduct($query) {

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
            $this->db->like('search', $query);
       
        $query = $this->db->get('vendor_sale_consultation_product');

        } else if ($this->ion_auth->is_facilityManager()) {
            
            $this->db->like('search', $query);
            
            $query = $this->db->get('vendor_sale_consultation_product');
        }
        return $query->result_array(); // Ensure result_array() is used
    }


    public function create_invoice($invoice_data, $items_data) {
        $this->db->insert('invoices', $invoice_data);
        $invoice_id = $this->db->insert_id();

        foreach ($items_data as $item) {
            $item['invoice_id'] = $invoice_id;
            $this->db->insert('invoice_items', $item);
        }
        return $invoice_id;
    }

    // Retrieve invoice details
    public function get_invoice($invoice_id) {
        $this->db->select('invoices.*, patients.name as patient_name, patients.email, patients.phone');
        $this->db->join('patients', 'patients.id = invoices.patient_id');
        return $this->db->where('invoices.id', $invoice_id)->get('invoices')->row();
    }

    // Retrieve invoice items
    public function get_invoice_items($invoice_id) {
        return $this->db->where('invoice_id', $invoice_id)->get('invoice_items')->result();
    }
    
    
}
