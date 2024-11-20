<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . "third_party/MX/Controller.php";

class Common_Controller extends MX_Controller {

    public $filedata = "";

    function __construct() {
        parent::__construct();
        $this->lang->load('en', 'english');
    }

    public function is_auth_admin() {

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('message', 'Your session has been expired');
            // redirect('index.php/pwfpanel/login', 'refresh');
            redirect('pwfpanel/login', 'refresh');

        }else if ($this->ion_auth->is_superAdmin()) {
            return true;
        }else if ($this->ion_auth->is_admin()) {
            return true;
        } else if ($this->ion_auth->is_vendor()) {
            return true;
        } 
        else if ($this->ion_auth->is_subAdmin()) {
            return true;
        } 
        else if ($this->ion_auth->is_facilityManager()) {
            return true;
        } else if ($this->ion_auth->is_patient()) {
            return true;
        }else if ($this->ion_auth->is_user()) {
            return true;
        }else if($this->ion_auth->is_all_roleslogin()){
            return true;
        }
        else {
            $this->session->set_flashdata('message', 'You are not authorised to access administration');
            redirect('pwfpanel/login', 'refresh');
        }
    }

    /**
     * @project Developer
     * @method uploadImage
     * @description common method upload value
     * @access public
     * @return string
     */
    public function uploadImage($data = '', $folder = '') {

        $config = array(
            'upload_path' => "./uploads/" . $folder,
            'allowed_types' => "gif|jpg|png|jpeg",
            'max_size' => "5048",
            'max_height' => "2048",
            'max_width' => "2048",
            'file_name' => time() . "_" . $_FILES['file_name']['name']
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file_name')) {
            $this->filedata = array('upload_data' => $this->upload->data());
            $this->filedata['status'] = 1;
            return $this->filedata;
        } else {
            $this->filedata = array('error' => $this->upload->display_errors());
            $this->filedata['status'] = 0;
            return $this->filedata;
        }
    }

    /**
     * @project Developer
     * @method uploadImageThumb
     * @description image resize according to height and width global method
     * @access public
     * @param image_data, url, original_crop
     * @return string
     */
    public function uploadImageThumb($folder = '', $height = '', $width = '', $i) {
        $_FILES['assetimage[]']['name'] = $_FILES['assetimage']['name'][$i];
        $_FILES['assetimage[]']['tmp_name'] = $_FILES['assetimage']['tmp_name'][$i];
        $_FILES['assetimage[]']['type'] = $_FILES['assetimage']['type'][$i];
        $_FILES['assetimage[]']['size'] = $_FILES['assetimage']['size'][$i];
        $_FILES['assetimage[]']['error'] = $_FILES['assetimage']['error'][$i];
        $config = array(
            'upload_path' => "./uploads/" . $folder,
            'allowed_types' => "gif|jpg|png|jpeg",
            'max_size' => "5048",
            'max_height' => "2048",
            'max_width' => "2048",
            'min_height' => $height,
            'min_width' => $width,
            'file_name' => time() . "_" . $_FILES['assetimage[]']['name']
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('assetimage[]')) {
            $this->filedata = array('upload_data' => $this->upload->data());
            $this->filedata['status'] = 1;
            $this->resizeImageBig($this->upload->data());
            $this->resizeImageSmall($this->upload->data());
            return $this->filedata;
        } else {
            $this->filedata = array('error' => $this->upload->display_errors());
            $this->filedata['status'] = 0;
            return $this->filedata;
        }
    }

    /**
     * @project Developer
     * @method commonUploadImage
     * @description common upload image
     * @access public
     * @param 
     * @return array
     */
    public function commonUploadImageMulti($data = '', $folder = '', $i) {

        $this->load->library('upload');
        $config = array(
            'upload_path' => "./uploads/" . $folder,
            'allowed_types' => "gif|jpg|png|jpeg",
            'max_size' => "10000000",
            'max_height' => "4048",
            'max_width' => "4048",
            'file_name' => time() . "_" . $_FILES['image']['name'][$i]
        );
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
            $this_filedata = array('upload_data' => $this->upload->data());
            $this_filedata['status'] = 1;
            return $this_filedata;
        } else {
            $this_filedata = array('error' => $this->upload->display_errors());
            $this_filedata['status'] = 0;
            return $this_filedata;
        }
    }

    public function commonUploadImage($data = '', $folder = '', $file_name = '') {

        $this->load->library('upload');
        $config = array(
            'upload_path' => "./uploads/" . $folder,
            'allowed_types' => "gif|jpg|png|jpeg",
            'max_size' => "10000000",
            'max_height' => "4048",
            'max_width' => "4048",
            'file_name' => time() . "_" . $_FILES[$file_name]['name']
        );
        $this->upload->initialize($config);
        if ($this->upload->do_upload($file_name)) {
            $this_filedata = array('upload_data' => $this->upload->data());
            $this_filedata['status'] = 1;
            return $this_filedata;
        } else {
            $this_filedata = array('error' => $this->upload->display_errors());
            $this_filedata['status'] = 0;
            return $this_filedata;
        }
    }

    public function commonUploadImageVersionUpdate($data = '', $folder = '', $file_name = '') {

        $this->load->library('upload');
        $config = array(
            'upload_path' => "./android",
            'allowed_types' => "gif|jpg|png|jpeg",
           /* 'max_size' => "10000000",
            'max_height' => "4048",
            'max_width' => "4048",*/
            'file_name' => time() . "_" . $_FILES[$file_name]['name']
        );
        $this->upload->initialize($config);
        if ($this->upload->do_upload($file_name)) {
            $this_filedata = array('upload_data' => $this->upload->data());
            $this_filedata['status'] = 1;
            return $this_filedata;
        } else {
            $this_filedata = array('error' => $this->upload->display_errors());
            $this_filedata['status'] = 0;
            return $this_filedata;
        }
    }

    public function commonUploadImageDynamic($data = '', $folder = '', $file_name = '',$minH= '',$minW= '',$maxH= '',$maxW= '',$maxSize= '') {

        $this->load->library('upload');
        $config = array(
            'upload_path' => "./uploads/" . $folder,
            'allowed_types' => "gif|jpg|png|jpeg",
           /* 'max_size' => $maxSize,
            'max_height' => $maxH,
            'max_width' => $maxW,
            'min_height' => $minH,
            'min_width' => $minW,*/
            'file_name' => time() . "_" . $_FILES[$file_name]['name']
        );
        $this->upload->initialize($config);
        if ($this->upload->do_upload($file_name)) {
            $this_filedata = array('upload_data' => $this->upload->data());
            $this_filedata['status'] = 1;
            return $this_filedata;
        } else {
            $this_filedata = array('error' => $this->upload->display_errors());
            $this_filedata['status'] = 0;
            return $this_filedata;
        }
    }

    /**
     * @project Developer
     * @method resizeImage
     * @description image resize according to height and width global method
     * @access public
     * @param image_data, url, original_crop
     * @return string
     */
    public function resizeImageBig($image_data = '') {

        $this->load->library('image_lib');

        $config['image_library'] = 'gd2';
        $config['source_image'] = $image_data['full_path'];
        $config['new_image'] = './uploads/assets/500/' . $image_data['file_name'];
        $config['width'] = 500;
        $config['height'] = 350;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        return true;
    }

    public function resizeImageSmall($image_data = '') {
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $image_data['full_path'];
        $config['new_image'] = './uploads/assets/150/' . $image_data['file_name'];
        $config['width'] = 150;
        $config['height'] = 150;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        return true;
    }

    public function image_unlink($filename, $filepath) {

        $file_path_name = $filepath . $filename;
        // print_r($file_path_name);die;
        if (file_exists($file_path_name)) {

            if (unlink($file_path_name)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function send_email($to, $from, $subject, $template, $title) {

        $this->load->library('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
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

    function send_email_smtp($email, $from, $subject, $template, $title) {

       
        $config = Array(    
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_port' => 25,
            'smtp_user' => 'tech.sunilvishwakarma@gmail.com',
            'smtp_pass' => 'zmwiylikyaocxenp',
            'smtp_timeout' => '4',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
          );
          $this->load->library('email', $config); 
              $this->email->set_newline("\r\n");
              $this->email->from($from, $title);
              $data = array(
                  'user_name'=> 'Sunil',
              );
          $this->email->to($email); 
          $this->email->subject($subject); 
          $this->email->message($template); 
          $this->email->send(); $this->email->initialize($config);
    }


function sendEmail($email, $from, $subject, $template, $title)
    {   
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
        //   echo 'Success to send email';
      }





//       $config['protocol'] = 'smtp';
// $config['smtp_host'] = 'tcp://mail.ioready.io:2079';  
// $config['smtp_port'] = '2079';  
// $config['smtp_timeout'] = '30';  
// $config['smtp_user'] = 'aditya_urmaliya@ioready.io';  
// $config['smtp_pass'] = 'S^VpL2$aOC_,';
// $config['charset'] = 'utf-8';
// $config['mailtype'] = 'html';
// $config['wordwrap'] = TRUE;
// $config['newline'] = "\r\n";
// 		$this->load->library('email', $config); // Load email template
//             $this->email->set_newline("\r\n");
//             $this->email->from($from, $title);
//             $data = array(
//     			'user_name'=> 'Kalpana',
//             );
//         $this->email->to($email); // replace it with receiver email id
// 		$this->email->subject($subject); // replace it with email subject
// 		//$message = $this->load->view('sent_register',$data,TRUE);

// 		$this->email->message($template); 
// 		$this->email->send();

//         if(!$this->email->send()) {
//             show_error($this->email->print_debugger()); 
//         }else{
//             echo 'Your e-mail has been sent!';
// }
    }



    /**
     * @project Developer
     * @method delete
     * @description common method delete value
     * @access public
     * @return boolean
     */
    public function delete() {
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        if (!empty($table) && !empty($id) && !empty($id_name)) {
            // $option = array(
            //     'table' => $table,
            //     'where' => array($id_name => $id)
            // );
            // $delete = $this->common_model->customDelete($option);

             $option = array(
                'table' => $table,
                'data' => array('delete_status' => 1),
                'where' => array($id_name => $id)
             );
             $delete = $this->common_model->customUpdate($option); 
            if ($delete) {
                $response = 200;
            } else
                $response = 400;
        }else {
            $response = 400;
        }
        echo $response;
    }

    public function delete_role() {
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        if (!empty($table) && !empty($id) && !empty($id_name)) {
            $option = array(
                'table' => USER_GROUPS,
                'select' => 'group_id',
                'where' => array('group_id' => $id)
            );
            $role_assign = $this->common_model->customGet($option);
            if (empty($role_assign)) {
                $option = array(
                    'table' => $table,
                    'where' => array($id_name => $id)
                );
                $delete = $this->common_model->customDelete($option);
                if ($delete) {
                    $response = 200;
                }
            } else
                $response = 400;
        }else {
            $response = 400;
        }
        echo $response;
    }

    /**
     * @project Developer
     * @method status
     * @description common method active or inactive value
     * @access public
     * @return boolean
     */
    public function status() {
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        $status = $this->input->post('status');
        if (!empty($table) && !empty($id) && !empty($id_name)) {
            if($table == "users"){
                $option = array(
                    'table' => $table,
                    'data' => array('email_verify' => ($status == 1) ? 0 : 1),
                    'where' => array($id_name => $id)
                );
                $update = $this->common_model->customUpdate($option);
            }else{
                $option = array(
                    'table' => $table,
                    'data' => array('active' => ($status == 1) ? 0 : 1),
                    'where' => array($id_name => $id)
                );
                $update = $this->common_model->customUpdate($option);
            }
            if ($update) {
                $response = 200;
            } else
                $response = 400;
        }else {
            $response = 400;
        }
        echo $response;
    }
  
   public function commonStatus() {
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        $status = $this->input->post('status');
        if (!empty($table) && !empty($id) && !empty($id_name)) {
            $option = array(
                'table' => $table,
                'data' => array('status' => ($status == 1) ? 0 : 1),
                'where' => array($id_name => $id)
            );
            $update = $this->common_model->customUpdate($option);
            if ($update) {
                $response = 200;
            } else
                $response = 400;
        }else {
            $response = 400;
        }
        echo $response;
    }

    public function commonEditStatus() {
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        $status = $this->input->post('status');
        if (!empty($table) && !empty($id) && !empty($id_name)) {
            $option = array(
                'table' => $table,
                'data' => array('is_active' => ($status == 1) ? 0 : 1),
                'where' => array($id_name => $id)
            );
            $update = $this->common_model->customUpdate($option);
            if ($update) {
                $response = 200;
            } else
                $response = 400;
        }else {
            $response = 400;
        }
        echo $response;
    }
 
    public static function seo_url($string) {
        $str = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $string); // Removes special chars.
        $dbl = str_replace('  ', '-', strtolower($str));
        return str_replace(' ', '-', strtolower($dbl));
    }

    public function adminIsAuth() {
        if ($this->ion_auth->is_admin()) {
            return true;
        } else if ($this->ion_auth->is_vendor()) {
            return true;
        } else if ($this->ion_auth->is_subAdmin()) {
            return true;
        }
        else if ($this->ion_auth->is_facilityManager()) {
            return true;
        }
        else {
            redirect('pwfpanel/login', 'refresh');
        }
    }

    public function get_config($key) {

        if ($this->ion_auth->is_superAdmin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }

       else if ($this->ion_auth->is_admin()) {
            $user_id = $this->session->userdata('user_id');
        $hospital_id = $user_id;
        
        }
        else if ($this->ion_auth->is_facilityManager()) {
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
        

        $option = array('table' => SETTING,
            'where' => array('option_name' => $key, 'status' => 1),
            'single' => true,
        );
        $is_result = $this->common_model->customGet($option);
        
        if (!empty($is_result)) {
            return $is_result->option_value;
        } else {
            return false;
        }
    }

    function clear_strip($var) {
        $s = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $var);
        return strip_tags(trim($s));
    }

    function clear_url_rewrite($var) {
        $s = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $var);
        $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', strip_tags(trim($s)));
        return preg_replace('/\s+/', ' ', $string);
    }

    /**
     * Function Name: pswd_regex_check
     * Description:   For Password Regular Expression
     */
    public function pswd_regex_check($str) {
        $ci = &get_instance();
        if (1 !== preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,14}$/", $str)) {
            $ci->form_validation->set_message('pswd_regex_check', 'Password must contain at least 6 characters and numbers and at least one lowercase char and at least one uppercase char and at least one digit and at least one special sign');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function sendSms($postfields = array()){

        /*$postfields = array('mobile' => "8236893792,9753589610",
                            'message' => "Your playwinfantasy verification code is 758563",
        );*/

        if(empty($postfields)){
            return false;
        }

         $postfields['sender'] = 'PLYWIN';
         $postfields['type'] = 3;
         $postfields['user'] = 'playwinfanta@2018';
         $postfields['password'] = 'sonali123@';



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://login.bulksmsgateway.in/sendmessage.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // change to 1 to verify cert 
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "playwinfanta@2018:sonali123@");
        $result = curl_exec($ch);
        if(!empty($result)){
            $result = json_decode($result);
            if($result->status == "success"){
                return true;
            }else{
                return false;
            }
        }else{
          return false;  
        }
    }

    function smsSend($postfields = array()) {

        /* $postfields = array('mobile' => "8236893792,9753589610",
          'message' => "Your playwinfantasy verification code is 758563",
          ); */

        if (empty($postfields)) {
            return false;
        }
        $postfields['sender'] = 'PLYWIN';
        $postfields['type'] = 3;
        $postfields['user'] = 'playwinfanta@2018';
        $postfields['password'] = 'sonali123@';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://login.bulksmsgateway.in/sendmessage.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // change to 1 to verify cert 
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "playwinfanta@2018:sonali123@");
        $result = curl_exec($ch);
        if (!empty($result)) {
            $result = json_decode($result);
            if (isset($result->status) && $result->status == "success") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function sending_mail(){
        $this->load->library('email'); // Note: no $config param needed
        $this->email->from('kalpanaofficial94@gmail.com', 'kalpanaofficial94@gmail.com');
        $this->email->to('tech.sunilvishwakarma@gmail.com');
        $this->email->subject('Test email from CI and Gmail');
        $this->email->message('This is a test.');
        $this->email->send();
      
    }

    public function sent_mail($email, $from, $subject, $template, $title){
       
		$config = Array(    
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'kalpanaofficial94@gmail.com',
		  'smtp_pass' => 'avbcfhvzvypfftgz',
		  'smtp_timeout' => '4',
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1'
		);
		$this->load->library('email', $config); 
            $this->email->set_newline("\r\n");
            $this->email->from($from, $title);
            $data = array(
    			'user_name'=> 'Sunil',
            );
        $this->email->to($email); 
		$this->email->subject($subject); 
		

		$this->email->message($template); 
	 $this->email->send(); $this->email->initialize($config);
        //     $this->email->from('kalpanaofficial94@gmail.com', 'Kalpana');
        //     $data = array(
    	// 		'user_name'=> 'Kalpana',
        //     );
        // $this->email->to('tech.sunilvishwakarma@gmail.com'); 
		// $this->email->subject('Hey, Thank you for Registering with us'); 
		// $this->email->message('hiiiiii'); 
		// $send = $this->email->send();
        // if($send){
        //     print_r($send);
        // }
    }


}
