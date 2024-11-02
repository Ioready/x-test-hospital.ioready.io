<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserSettings extends Common_Controller {

    public $data = array();
    public $file_data = "";
    // public $_table = 'contactus';
    public $_table = 'doctors_contactus';
    
    public $title = "User Setting";

    public function __construct() {
        parent::__construct();
        $this->is_auth_admin();
    }

    /**
     * @method index
     * @description listing display
     * @return array
     */
    public function index($status = "No")
    {

        $this->data['parent'] = "User";
        $this->data['title'] = "Users";
        $this->data['status'] = ($status == "Yes") ? 1 : 0;
        $role_name = $this->input->post('role_name');
        $this->data['roles'] = array(
            'role_name' => $role_name
        );

        
        if ($this->ion_auth->is_facilityManager()) {
            
            // $option = array(
            //     'table' => USERS . ' as user',
            //     'select' => 'user.*,group.name as group_name',
            //     'join' => array(
            //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
            //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
            //     ),
            //     'order' => array('user.id' => 'DESC'),
            //     'where' => array('user.hospital_id' =>$user_id,),
            //     'where_not_in' => array('group.id' => array(1, 2, 4,5,6,7))
            // );

            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.email_verify' => 1,'user.hospital_id' =>$user_id),
                'where_not_in' => array(
                    'group.id' => array(1, 2, 4,5,6,7)
                )
            );
    
            $this->data['active'] = count($this->common_model->customGet($option));
    
            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.email_verify' => 0,'user.hospital_id' =>$user_id),
                'where_not_in' => array(
                    'group.id' => array(1, 2, 4,5,6,7)
                )
            );
    
            $this->data['inactive'] = count($this->common_model->customGet($option));


        } else if($this->ion_auth->is_all_roleslogin()) {

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

            // $option = array(
            //     'table' => USERS . ' as user',
            //     'select' => 'user.*,group.name as group_name',
            //     'join' => array(
            //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
            //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
            //     ),
            //     'order' => array('user.id' => 'DESC'),
            //     'where' => array('user.hospital_id' =>$authUser->hospital_id,),
            //     'where_not_in' => array('group.id' => array(1, 2, 4,5,6,7))
            // );

            
            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.email_verify' => 1,'user.hospital_id' =>$authUser->hospital_id,),
                'where_not_in' => array(
                    'group.id' => array(1, 2, 4,5,6,7)
                )
            );
    
            $this->data['active'] = count($this->common_model->customGet($option));
    
            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.email_verify' => 0,'user.hospital_id' =>$authUser->hospital_id),
                'where_not_in' => array(
                    'group.id' => array(1, 2, 4,5,6,7)
                )
            );
    
            $this->data['inactive'] = count($this->common_model->customGet($option));

        }



// $this->data['list'] = $this->common_model->customGet($option);

        // $option = array(
        //     'table' => USERS . ' as user',
        //     'select' => 'user.*,group.name as group_name',
        //     'join' => array(
        //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
        //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
        //     ),
        //     'order' => array('user.id' => 'DESC'),
        //     'where' => array('user.email_verify' => 1),
        //     'where_not_in' => array(
        //         'group.id' => array(1, 2, 4,5,6,7)
        //     )
        // );

        // $this->data['active'] = count($this->common_model->customGet($option));

        // $option = array(
        //     'table' => USERS . ' as user',
        //     'select' => 'user.*,group.name as group_name',
        //     'join' => array(
        //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
        //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
        //     ),
        //     'order' => array('user.id' => 'DESC'),
        //     'where' => array('user.email_verify' => 0),
        //     'where_not_in' => array(
        //         'group.id' => array(1, 2, 4,5,6,7)
        //     )
        // );

        // $this->data['inactive'] = count($this->common_model->customGet($option));

        $this->load->admin_render('list', $this->data, 'inner_script');
    }


    public function user_list()
    {
        $user_id = decoding($this->uri->segment(3));

        $this->data['parent'] = "User";
        $this->data['title'] = "Users";

        // $option = array(
        //     'table' => USERS . ' as user',
        //     'select' => 'user.*,group.name as group_name',
        //     'join' => array(
        //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
        //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
        //     ),
        //     'order' => array('user.id' => 'DESC'),
        //     // 'where' => array('user.id' => $user_id),
        //     'where_not_in' => array('group.id' => array(1, 2, 4,5,6,7))
        // );
        if ($this->ion_auth->is_facilityManager()) {
            
            // $option = array(
            //     'table' => USERS . ' as user',
            //     'select' => 'user.*,group.name as group_name',
            //     'join' => array(
            //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
            //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
            //     ),
            //     'order' => array('user.id' => 'DESC'),
            //     'where' => array('user.hospital_id' =>$user_id,),
            //     'where_not_in' => array('group.id' => array(1, 2, 4,5,6,7))
            // );

            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.email_verify' => 1,'user.hospital_id' =>$user_id),
                'where_not_in' => array(
                    'group.id' => array(1, 2, 4,5,6,7)
                )
            );
    
            $this->data['active'] = count($this->common_model->customGet($option));
    
            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.email_verify' => 0,'user.hospital_id' =>$user_id),
                'where_not_in' => array(
                    'group.id' => array(1, 2, 4,5,6,7)
                )
            );
    
            $this->data['inactive'] = count($this->common_model->customGet($option));


        } else if($this->ion_auth->is_all_roleslogin()) {

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

            // $option = array(
            //     'table' => USERS . ' as user',
            //     'select' => 'user.*,group.name as group_name',
            //     'join' => array(
            //         array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
            //         array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
            //     ),
            //     'order' => array('user.id' => 'DESC'),
            //     'where' => array('user.hospital_id' =>$authUser->hospital_id,),
            //     'where_not_in' => array('group.id' => array(1, 2, 4,5,6,7))
            // );

            
            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.email_verify' => 1,'user.hospital_id' =>$authUser->hospital_id,),
                'where_not_in' => array(
                    'group.id' => array(1, 2, 4,5,6,7)
                )
            );
    
            $this->data['active'] = count($this->common_model->customGet($option));
    
            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*,group.name as group_name',
                'join' => array(
                    array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                    array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                ),
                'order' => array('user.id' => 'DESC'),
                'where' => array('user.email_verify' => 0,'user.hospital_id' =>$authUser->hospital_id),
                'where_not_in' => array(
                    'group.id' => array(1, 2, 4,5,6,7)
                )
            );
    
            $this->data['inactive'] = count($this->common_model->customGet($option));

        }

        $this->data['list'] = $this->common_model->customGet($option);


        $this->load->admin_render('user_list', $this->data, 'inner_script');
    }

    public function get_users_list()
    {

        $columns = array(
            'id',
            'team_code',
            'first_name',
            'email',
            // 'phone',
            // 'purchase_amount',
            // 'deposit_amount',
            // 'due_amount',
            //            'active',
            'created_on',
            'action',
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');

        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $UserStatus = $this->input->post('UserStatus');

        $this->data['user'] = array(
            'from_date' => $from_date,
            'to_date' => $to_date
        );

        $where = ' user.email_verify=' . $UserStatus . ' AND user.id IS NOT NULL';
        if (!empty($from_date) || !empty($to_date)) {
            $from_date = date('Y-m-d', strtotime($from_date));

            $to_date = date('Y-m-d', strtotime($to_date));

            if ($to_date == '1970-01-01') {
                $where = " DATE(created_date) >= '" . $from_date . "'";
            } else {

                $where = " DATE(created_date) >= '" . $from_date . "' and DATE(created_date) <='" . $to_date . "'";
            }
        }

        if (!empty($this->input->post('search')['value'])) {
            $search = $this->input->post('search')['value'];
            $where .= ' and (user.first_name like "%' . $search . '%" or user.email like "%' . $search . '%" or user.phone like "%' . $search . '%")';
        }

        $data = array();
        $totalData = 0;
        $totalFiltered = 0;
        // if ($this->ion_auth->is_vendor()) {
        //     $vendor_user_id = $this->session->userdata('user_id');
        //     $where .= ' and referral.user_id="' . $vendor_user_id . '"';
        //     $option = array(
        //         'table' => 'user_referrals as referral',
        //         'select' => 'user.*,referral.user_id,referral.invite_user_id',
        //         'join' => array(array('users as user' => 'user.id=referral.invite_user_id'),
        //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=referral.user_id', 'left'),
        //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')),
        //         'order' => array('user.id' => 'DESC'),
        //         'where' => $where,
        //         'where_not_in' => array('group.id' => array(1, 2, 4)));
        // } else {
        $option = array(
            'table' => USERS . ' as user',
            'select' => 'user.*,group.name as group_name',
            'join' => array(
                array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
            ),
            'order' => array('user.id' => 'DESC'),
            // 'where' => $where,
            'where_not_in' => array('group.id' => array(1, 2, 4,5,6,7)),
            'order' => array('user.id' => "DESC")
        );
        // }


        $user_list = $this->common_model->customGet($option);


        if (!empty($user_list) && count($user_list) != 0) {
            $totalData = count($user_list);
            $totalFiltered = $totalData;
            if ($this->ion_auth->is_vendor()) {

                $vendor_user_id = $this->session->userdata('user_id');

                // $where .= ' and referral.user_id="' . $vendor_user_id . '"';
                $options = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.*,group.name as group_name',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                    ),
                    'order' => array('user.id' => 'DESC'),
                    'limit' => array($limit => $start),
                    // 'where' => $where,
                    'where_not_in' => array('group.id' => array(1, 2, 4,5,6,7)),
                    'order' => array('user.id' => "DESC")
                );
            } else {
                $options = array(
                    'table' => USERS . ' as user',
                    'select' => 'user.*,group.name as group_name',
                    'join' => array(
                        array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
                        array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
                    ),
                    'order' => array('user.id' => 'DESC'),
                    'limit' => array($limit => $start),
                    // 'where' => $where,
                    'where_not_in' => array('group.id' => array(1, 2, 4,5,6,7)),
                    'order' => array('user.id' => "DESC")
                );
            }

            $users_list = $this->common_model->customGet($options);

            if (!empty($users_list)) {
                foreach ($users_list as $users) {

                    $option = array(
                        'table' => 'users as USR',
                        'select' => 'USR.id as user_id,USR.email_verify,USR.verify_mobile,UPC.verification_status as pan_status',
                        'join' => array(
                            'user_pan_card as UPC' => 'UPC.user_id=USR.id'
                        ),
                        'where' => array(
                            'USR.id' => $users->id, 'USR.email_verify' => 1,
                            'USR.verify_mobile' => 1, 'UPC.verification_status' => 2
                        )
                    );
                    $userData = $this->common_model->customGet($option);
                    if (!empty($userData)) {
                        $stat = '<p class="btn btn-success btn-sm">Verified</p>';
                    } else {
                        $stat = '<p class="btn btn-danger btn-sm">Pending</p>';
                    }

                    $start++;
                    $userData['id'] = $start;
                    //$userData['team_code'] = isset($users->team_code) ? $users->team_code : '';
                    $userData['first_name'] = isset($users->first_name) ? $users->first_name . ' ' . $users->last_name : '';
                    $userData['email'] = isset($users->email) ? $users->email : '';
                    //$userData['phone'] = isset($users->phone) ? $users->phone : '';
                    //$userData['active'] = (isset($users->active) && $users->active == 1) ? '<p class="text-success">' . lang('active') . '</p>' : '<p  class="text-danger">' . lang('deactive') . '</p>';

                    if (!empty($users->created_date)) {
                        $datetime = UTCToConvertIST($users->created_date, 'Asia/Kolkata');
                    }

                    //$userData['created_on'] = isset($datetime) ? $datetime : '';
                    $userData['created_on'] = isset($users->created_on) ? date('d-m-Y H:i', $users->created_on) : '';

                    if ($users->id != 1) {
                        if ($users->email_verify == 1) {
                            $userActiveUrl = "'" . USERS . "','id','" . encoding($users->id) . "','" . $users->email_verify . "'";
                            $active_buttn = '<a href="javascript:void(0)" class="on-default edit-row" onclick="statusFn(' . $userActiveUrl . ')" title="Inactive Now"><img width="20" src="' . base_url() . ACTIVE_ICON . '" /></a>';
                            $active_buttn = ' <a href="javascript:void(0)" onclick="statusFn(' . $userActiveUrl . ')"  data-toggle="tooltip" title="Inactive Now" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>';
                        } else {
                            $userActiveUrl = "'" . USERS . "','id','" . encoding($users->id) . "','" . $users->email_verify . "'";
                            $active_buttn = '<a href="javascript:void(0)" class="on-default edit-row text-danger" onclick="statusFn(' . $userActiveUrl . ')" title="Active Now"><img width="20" src="' . base_url() . INACTIVE_ICON . '" /></a>';
                            $active_buttn = ' <a href="javascript:void(0)" onclick="statusFn(' . $userActiveUrl . ')"  data-toggle="tooltip" title="Active Now" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>';
                        }
                        $userEditUrl = "'" . USERS . "','user_edit','" . encoding($users->id) . "'";
                        $chip_url = "'" . USERS . "','open_chip_model','" . encoding($users->id) . "'";
                        $cash_url = "'" . USERS . "','open_cash_model','" . encoding($users->id) . "'";
                        $remove_cash_url = "'" . USERS . "','remove_cash_model','" . encoding($users->id) . "'";
                        $user_edit = '<a href="javascript:void(0)" class="on-default edit-row" onclick="editFn(' . $userEditUrl . ');"><img width="20" src="' . base_url() . EDIT_ICON . '" /></a>';
                        $user_edit = ' <a href="' . base_url() . 'users/user_edit?id=' . encoding($users->id) . '" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>';

                        $delUserUrl = "'" . USERS . "','id','" . encoding($users->id) . "','users','users/delUsers'";
                        $delete_btn = '<a href="javascript:void(0)" onclick="deleteFn(' . $delUserUrl . ')" class="on-default edit-row text-danger"><img width="20" src="' . base_url() . DELETE_ICON . '" /></a><hr>';
                        $delete_btn = ' <a href="javascript:void(0)" onclick="deleteFn(' . $delUserUrl . ')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';

                        $myRefferls = '<a href="' . base_url() . 'users/myReferrals/' . $users->id . '" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> My Referrals</a>';

                        //$my_prediction = '<a href="' . base_url() . 'ipl/prediction/' . encoding($users->id) . '" class="btn btn-warning btn-sm"><img width="18" src="' . base_url() . CRICKET_ICON . '" />Prediction (' . $totalPrediction . '/100)</a>';
                        //$stat ='ver';

                        if ($this->ion_auth->is_admin()) {
                            $userData['action'] = $user_edit . $active_buttn . $delete_btn;

                        } else if ($this->ion_auth->is_subAdmin() or $this->ion_auth->is_all_roleslogin()) {
                            $user = getUser($this->session->userdata('user_id'));

                            $option = array(
                                'table' => 'subadmin_access',
                                'select' => 'modules',
                                // 'where' => array('user_id' => $user->id),
                                'single' => true
                            );
                            $subadminDetails = commonGetHelper($option);
                            $access_modules = explode(',', $subadminDetails->modules);
                            $act_status = '';
                            foreach ($access_modules as $module) {
                                if ($module == "user_edit") {
                                    $act_status = $user_edit;
                                } else if ($module == "user_status") {
                                    $act_status .= $active_buttn;
                                } else if ($module == "user_delete") {
                                    $act_status .= $delete_btn;
                                } else if ($module == "user_pan_card") {
                                    //$act_status .= $getPanDetails;
                                } else if ($module == "user_bank_account") {
                                    // $act_status .= $getBankDetails;
                                } else if ($module == "user_aadhar_card") {
                                    //$act_status .= $getAadharCardDetails;
                                } else if ($module == "user_private_contest") {
                                    // $act_status .= $user_contest;
                                } else if ($module == "user_joined_contest") {
                                    // $act_status .= $join_contest;
                                } else if ($module == "user_match_team") {
                                    // $act_status .= $match_teams;
                                } else if ($module == "user_transaction_wallet") {
                                    //$act_status .= $transactions;
                                } else if ($module == "user_add_cash") {
                                    // $act_status .= $add_cash;
                                } else if ($module == "user_add_chip") {
                                    // $act_status .= $add_chip;
                                } else if ($module == "user_remove_cash") {
                                    //$act_status .= $remove_cash;
                                } else if ($module == "user_prediction") {
                                    // $act_status .= $my_prediction;
                                } else if ($module == "user_my_referrals") {
                                    // $act_status .= $myRefferls;
                                }
                            }

                            $userData['action'] = $stat . $act_status;

                            //$userData['action'] = $user_contest . $join_contest . $match_teams;
                        } else if ($this->ion_auth->is_facilityManager() or $this->ion_auth->is_all_roleslogin()) {
                            $user = getUser($this->session->userdata('user_id'));

                            $option = array(
                                'table' => 'subadmin_access',
                                'select' => 'modules',
                                'where' => array('user_id' => $user->id),
                                'single' => true
                            );
                            $subadminDetails = commonGetHelper($option);
                            $access_modules = explode(',', $subadminDetails->modules);
                            $act_status = '';
                            foreach ($access_modules as $module) {
                                if ($module == "user_edit") {
                                    $act_status = $user_edit;
                                } else if ($module == "user_status") {
                                    $act_status .= $active_buttn;
                                } else if ($module == "user_delete") {
                                    $act_status .= $delete_btn;
                                } else if ($module == "user_pan_card") {
                                    //$act_status .= $getPanDetails;
                                } else if ($module == "user_bank_account") {
                                    // $act_status .= $getBankDetails;
                                } else if ($module == "user_aadhar_card") {
                                    //$act_status .= $getAadharCardDetails;
                                } else if ($module == "user_private_contest") {
                                    // $act_status .= $user_contest;
                                } else if ($module == "user_joined_contest") {
                                    // $act_status .= $join_contest;
                                } else if ($module == "user_match_team") {
                                    // $act_status .= $match_teams;
                                } else if ($module == "user_transaction_wallet") {
                                    //$act_status .= $transactions;
                                } else if ($module == "user_add_cash") {
                                    // $act_status .= $add_cash;
                                } else if ($module == "user_add_chip") {
                                    // $act_status .= $add_chip;
                                } else if ($module == "user_remove_cash") {
                                    //$act_status .= $remove_cash;
                                } else if ($module == "user_prediction") {
                                    // $act_status .= $my_prediction;
                                } else if ($module == "user_my_referrals") {
                                    // $act_status .= $myRefferls;
                                }
                            }

                            $userData['action'] = $stat . $act_status;

                            //$userData['action'] = $user_contest . $join_contest . $match_teams;
                        }

                        $data[] = $userData;
                    }
                }
            }
        }
        // pr($data);
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }




    public function index_old($vendor_profile_activate = "No") {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $role_name = $this->input->post('role_name');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }
        
        $this->data['roles'] = array(
            'role_name' => $role_name
        );


        $AdminCareUnitID = isset($_SESSION['admin_care_unit_id']) ? $_SESSION['admin_care_unit_id'] : '';
        $option = array('table' => 'care_unit', 'where' => array('delete_status' => 0, 'is_active' => 1), 'order' => array('name' => 'ASC'));
        if (!empty($AdminCareUnitID)) {

            $option['where']['id'] = $AdminCareUnitID;
        }
        //print_r(json_decode($AdminCareUnitID));die;
        $this->data['careUnit'] = $this->common_model->customGet($option);
        // print_r($this->data['careUnit']);die;
        $this->data['careUnits'] = json_decode($AdminCareUnitID);

        $y = $this->data['careUnits'];
        $x = count($y);
        // print_r($x);die;

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

        //$this->data['careUnits_list'] = json_decode($AdminCareUnitID);
        $careUnitData_list = array();
                 
        foreach ($this->data['careUnits_list'] as $value) {

            $option = array(
                'table' => 'patient',
                'select' => 'patient.patient_id as pid,care_unit.name as care_unit_name,doctors.name as doctor_name,users.first_name as md_stayward,patient.date_of_start_abx',
                'join' => array(
                    array('care_unit', 'care_unit.id=patient.care_unit_id'),
                    array('doctors', 'doctors.id=patient.doctor_id'),
                    array('user', 'user.id=patient.md_steward_id')
                ),
                'where' => array('patient.id' => $value)
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


        // $arraySingles = call_user_func_array('array_merge', $careUnitData_list);
        $this->data['careUnitsUser_list'] = $careunit_facility_counts;



        // $this->data['careUnitID'] = $careUnitID = (isset($_GET['careUnit'])) ? $_GET['careUnit'] : "";

        // $careUnitID = (isset($_GET['careUnit'])) ? $_GET['careUnit'] : "";

        // print_r($UsersCareUnitID);die;
        // $from = (isset($_GET['date']) && !empty($_GET['date'])) ? date('Y-m-d', strtotime($_GET['date'])) : "";
        // $to = (isset($_GET['date1']) && !empty($_GET['date1'])) ? date('Y-m-d', strtotime($_GET['date1'])) : "";

        // echo $from; echo "<br>";
        // echo $to; echo "<br>";
        // echo $careUnitID; echo "<br>"; die;


        if ($_GET["export"] == 'Export') {

            $this->patientExport($from, $to, $careUnitID);
            return;
        }

        $option = array(
            'table' => 'patient P',
            'select' => 'P.id as patient_id,P.patient_id as pid,P.name as patient_name,P.date_of_start_abx,P.address,P.total_days_of_patient_stay,P.room_number,P.symptom_onset,P.md_stayward_consult,P.criteria_met,P.md_stayward_response,P.psa,P.created_date,'
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
            //'group_by' => 'P.patient_id'
            'group_by' => 'pid'
        );
        if (!empty($careUnitID)) {
            $option['where']['P.care_unit_id'] = $careUnitID;
        }
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

        /* print_r($option);die; */

        $this->data['list'] = $this->common_model->customGet($option);



        $this->load->admin_render('list_old', $this->data, 'inner_script');
    }



    public function letterTemplate($vendor_profile_activate = "No") {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $role_name = $this->input->post('role_name');

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if($LoginID != 1 && $LoginID != NULL ){
            $x = $LoginID;
        }
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
            'table' => 'vendor_sale_lettel_header',
            'select' => 'vendor_sale_lettel_header`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_header.user_id' => $hospital_id)
        );

        $this->data['header_list'] = $this->common_model->customGet($optionheader);

        $option_body = array(
            'table' => 'vendor_sale_lettel_bodies',
            'select' => 'vendor_sale_lettel_bodies`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_bodies.user_id' => $hospital_id)
        );

        $this->data['body_list'] = $this->common_model->customGet($option_body);

        $optionrecipient = array(
            'table' => 'vendor_sale_lettel_recipients',
            'select' => 'vendor_sale_lettel_recipients`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_recipients.user_id' => $hospital_id)
        );

        $this->data['recipients_list'] = $this->common_model->customGet($optionrecipient);

        $optionfooter = array(
            'table' => 'vendor_sale_lettel_footer',
            'select' => 'vendor_sale_lettel_footer`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_footer.user_id','left')
            ),
            'where' => array('vendor_sale_lettel_footer.user_id' => $hospital_id)
        );

        $this->data['footer_list'] = $this->common_model->customGet($optionfooter);

        
        $this->load->admin_render('directory', $this->data, 'inner_script');
    }



    public function header($vendor_profile_activate = "No") {

        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        // $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/addHeader";

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

        $option1 ="SELECT `vendor_sale_doctors_contactus`.`title`,`vendor_sale_doctors_contactus`.`first_name`, `vendor_sale_doctors_contactus`.`last_name`,`vendor_sale_doctors_contactus`.`company`,
        `vendor_sale_doctors_contactus`.`id`, 
        `vendor_sale_doctors_contactus`.`contacts_clinician`,
        `vendor_sale_doctors_contactus`.`comment`,
        `vendor_sale_doctors_contactus`.`created_at`,
        -- `vendor_sale_users`.`first_name 'as f_name'`,
        -- `vendor_sale_users`.`last_name as l_name`,
        `vendor_sale_doctors_contactus`.`user_id`,`vendor_sale_doctors_contactus`.`phone_type`,`vendor_sale_doctors_contactus`.`phone_number`,`vendor_sale_doctors_contactus`.`user_email`
        ,`vendor_sale_doctors_contactus`.`address_lookup`,`vendor_sale_doctors_contactus`.`streem_address`,`vendor_sale_doctors_contactus`.`city`,`vendor_sale_doctors_contactus`.`post_code`
        ,`vendor_sale_doctors_contactus`.`country`,`vendor_sale_doctors_contactus`.`billing_detail`,`vendor_sale_doctors_contactus`.`payment_reference`
        ,`vendor_sale_doctors_contactus`.`System`,`vendor_sale_doctors_contactus`.`healthcode`
        FROM `vendor_sale_doctors_contactus` 
        LEFT JOIN `vendor_sale_users` ON 
        `vendor_sale_users`.`id` = `vendor_sale_doctors_contactus`.`user_id`
        WHERE `vendor_sale_doctors_contactus`.`delete_status` = 0  and
        `vendor_sale_doctors_contactus`.`user_id` =$LoginID
        ORDER BY `vendor_sale_doctors_contactus`.`id` DESC";
        
        $this->data['list'] = $this->common_model->customQuery($option1);

        $this->load->admin_render('header', $this->data, 'inner_script');
    }


    public function bodies($vendor_profile_activate = "No") {
        
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrl'] = $this->router->fetch_class() . "/addBodies";
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

       
        $optionheader = array(
            'table' => 'vendor_sale_lettel_header',
            'select' => 'vendor_sale_lettel_header`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
            ),
            // 'where' => array('vendor_sale_lettel_header.user_id' => $LoginID)
        );

        $this->data['header_list'] = $this->common_model->customGet($optionheader);


        $this->load->admin_render('bodies', $this->data, 'inner_script');
    }

    public function recipients($vendor_profile_activate = "No") {
        
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $this->data['formUrl'] = $this->router->fetch_class() . "/addRecipients";
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

        $option1 ="SELECT `vendor_sale_doctors_contactus`.`title`,`vendor_sale_doctors_contactus`.`first_name`, `vendor_sale_doctors_contactus`.`last_name`,`vendor_sale_doctors_contactus`.`company`,
        `vendor_sale_doctors_contactus`.`id`, 
        `vendor_sale_doctors_contactus`.`contacts_clinician`,
        `vendor_sale_doctors_contactus`.`comment`,
        `vendor_sale_doctors_contactus`.`created_at`,
        -- `vendor_sale_users`.`first_name 'as f_name'`,
        -- `vendor_sale_users`.`last_name as l_name`,
        `vendor_sale_doctors_contactus`.`user_id`,`vendor_sale_doctors_contactus`.`phone_type`,`vendor_sale_doctors_contactus`.`phone_number`,`vendor_sale_doctors_contactus`.`user_email`
        ,`vendor_sale_doctors_contactus`.`address_lookup`,`vendor_sale_doctors_contactus`.`streem_address`,`vendor_sale_doctors_contactus`.`city`,`vendor_sale_doctors_contactus`.`post_code`
        ,`vendor_sale_doctors_contactus`.`country`,`vendor_sale_doctors_contactus`.`billing_detail`,`vendor_sale_doctors_contactus`.`payment_reference`
        ,`vendor_sale_doctors_contactus`.`System`,`vendor_sale_doctors_contactus`.`healthcode`
        FROM `vendor_sale_doctors_contactus` 
        LEFT JOIN `vendor_sale_users` ON 
        `vendor_sale_users`.`id` = `vendor_sale_doctors_contactus`.`user_id`
        WHERE `vendor_sale_doctors_contactus`.`delete_status` = 0  and
        `vendor_sale_doctors_contactus`.`user_id` =$LoginID
        ORDER BY `vendor_sale_doctors_contactus`.`id` DESC";
        
        $this->data['list'] = $this->common_model->customQuery($option1);

        $optionheader = array(
            'table' => 'vendor_sale_lettel_bodies',
            'select' => 'vendor_sale_lettel_bodies`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
            ),
            // 'where' => array('vendor_sale_lettel_bodies.user_id' => $LoginID)
        );

        $this->data['body_list'] = $this->common_model->customGet($optionheader);

        $this->load->admin_render('recipients', $this->data, 'inner_script');
    }


    public function footer($vendor_profile_activate = "No") {
        
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
        $role_name = $this->input->post('role_name');
        $this->data['formUrl'] = $this->router->fetch_class() . "/addFooter";


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

        $option1 ="SELECT `vendor_sale_doctors_contactus`.`title`,`vendor_sale_doctors_contactus`.`first_name`, `vendor_sale_doctors_contactus`.`last_name`,`vendor_sale_doctors_contactus`.`company`,
        `vendor_sale_doctors_contactus`.`id`, 
        `vendor_sale_doctors_contactus`.`contacts_clinician`,
        `vendor_sale_doctors_contactus`.`comment`,
        `vendor_sale_doctors_contactus`.`created_at`,
        -- `vendor_sale_users`.`first_name 'as f_name'`,
        -- `vendor_sale_users`.`last_name as l_name`,
        `vendor_sale_doctors_contactus`.`user_id`,`vendor_sale_doctors_contactus`.`phone_type`,`vendor_sale_doctors_contactus`.`phone_number`,`vendor_sale_doctors_contactus`.`user_email`
        ,`vendor_sale_doctors_contactus`.`address_lookup`,`vendor_sale_doctors_contactus`.`streem_address`,`vendor_sale_doctors_contactus`.`city`,`vendor_sale_doctors_contactus`.`post_code`
        ,`vendor_sale_doctors_contactus`.`country`,`vendor_sale_doctors_contactus`.`billing_detail`,`vendor_sale_doctors_contactus`.`payment_reference`
        ,`vendor_sale_doctors_contactus`.`System`,`vendor_sale_doctors_contactus`.`healthcode`
        FROM `vendor_sale_doctors_contactus` 
        LEFT JOIN `vendor_sale_users` ON 
        `vendor_sale_users`.`id` = `vendor_sale_doctors_contactus`.`user_id`
        WHERE `vendor_sale_doctors_contactus`.`delete_status` = 0  and
        `vendor_sale_doctors_contactus`.`user_id` =$LoginID
        ORDER BY `vendor_sale_doctors_contactus`.`id` DESC";
        
        $this->data['list'] = $this->common_model->customQuery($option1);

        $optionheader = array(
            'table' => 'vendor_sale_lettel_recipients',
            'select' => 'vendor_sale_lettel_recipients`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
            ),
            // 'where' => array('vendor_sale_lettel_recipients.user_id' => $LoginID)
        );

        $this->data['recipient_list'] = $this->common_model->customGet($optionheader);

        $this->load->admin_render('footer', $this->data, 'inner_script');
    }




    function open_model() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/add";
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

        $this->load->admin_render('add', $this->data, 'inner_script');
    }

    /**
     * @method users_add
     * @description add dynamic rows
     * @return array
     */



     function open_consult() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Add " . $this->title;
        $this->data['formUrl'] = $this->router->fetch_class() . "/addConsult";
        $this->data['formUrlModel'] = $this->router->fetch_class() . "/addQuestion";

        
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

                // print_r($this->data['users']);die;

        $this->load->admin_render('add_consultation', $this->data, 'inner_script');
    }

    /**
     * @method users_add
     * @description add dynamic rows
     * @return array
     */

     

     public function addHeader() {

        //                 echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
        // $this->form_validation->set_rules('description', "Description", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

                    $image = '';
		
                        $new_name = time().$_FILES["image"]['name'];
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = '*';
                        $config['file_name'] = $new_name;
                        $config['overwrite'] = TRUE;
                        $config['remove_spaces'] = TRUE;
                        // echo $new_name;die;
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('image')) {
                            $error = array('error' => $this->upload->display_errors());
                            echo $error['error'];
                            }else{ 
                            $imageDetailArray = $this->upload->data();
                            $image =  $imageDetailArray['file_name'];
                        } 
                    


                $options_data = array(
                    'user_id'=> $LoginID,
                    'internal_name' => $this->input->post('internal_name'),
                    'header_checked' => $this->input->post('header_checked'),
                    'logo' => $image,
                                        
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_lettel_header', 'data' => $options_data);
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

    public function addFooter() {

        // echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
        // $this->form_validation->set_rules('description', "Description", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

                    $image = '';
		
                        $new_name = time().$_FILES["image"]['name'];
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = '*';
                        $config['file_name'] = $new_name;
                        $config['overwrite'] = TRUE;
                        $config['remove_spaces'] = TRUE;
                        // echo $new_name;die;
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('image')) {
                            $error = array('error' => $this->upload->display_errors());
                            echo $error['error'];
                            }else{ 
                            $imageDetailArray = $this->upload->data();
                            $image =  $imageDetailArray['file_name'];
                        } 
                    

            //             $image = "";
            // if (!empty($_FILES['user_image']['name'])) {
            //     $this->filedata = $this->commonUploadImage($_POST, 'users', 'user_image');
            //     if ($this->filedata['status'] == 1) {
            //         $image = 'uploads/users/' . $this->filedata['upload_data']['file_name'];
            //     }
            // }


                $options_data = array(
                    'user_id'=> $LoginID,
                    'recipient_id'=> $this->input->post('recipient_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'header_checked' => $this->input->post('footer_booked'),
                    'logo' => $image,
                                        
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_lettel_footer', 'data' => $options_data);
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

    public function addBodies() {

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
        $this->form_validation->set_rules('header_id', "header", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

                $options_data = array(
                    'user_id'=> $LoginID,
                    'header_id'=> $this->input->post('header_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'bodies_template' => $this->input->post('bodies_template'),
                    
                                        
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_lettel_bodies', 'data' => $options_data);
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

    public function addRecipients() {

        // echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";

        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');
        $this->form_validation->set_rules('body_id', "body_id", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
             

                $options_data = array(
                    'user_id'=> $LoginID,
                    'body_id'=> $this->input->post('body_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'recipient_template' => $this->input->post('bodies_template'),
                    
                                        
                );
                // print_r($options_data);die;
                $option = array('table' => 'vendor_sale_lettel_recipients', 'data' => $options_data);
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

    public function editHeader() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;

        $id = decoding($_GET['id']);
       
        
        if (!empty($id)) {
            // print_r($id);die;
            $optionheader = array(
                'table' => 'vendor_sale_lettel_header',
                'select' => 'vendor_sale_lettel_header`.*',
                'join' => array(
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
                ),
                // 'where' => array('vendor_sale_lettel_header.user_id' => $LoginID),
                'where' => array('vendor_sale_lettel_header.id' => $id),
           'single' => true
            );
            $results_row = $this->common_model->customGet($optionheader);
          
            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;

            
                $this->load->admin_render('edit_header', $this->data, 'inner_script');
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


     public function updateHeader() {
       
        $where_id = $this->input->post('header_id');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'internal_name' => $this->input->post('internal_name'),
                    'header_checked' => $this->input->post('header_checked'),
                    'logo' => $this->input->post('image'),                    
                );
                // $option = array('table' => 'vendor_sale_user_consultation_setting', 'data' => $options_data);

                
                $option = array(
                    'table' =>'vendor_sale_lettel_header',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);
                
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('userSettings'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }


    public function editBody() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;


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

        $id = decoding($_GET['id']);
       
        
        if (!empty($id)) {
            // print_r($id);die;
            $optionheader = array(
                'table' => 'vendor_sale_lettel_bodies',
                'select' => 'vendor_sale_lettel_bodies`.*',
                'join' => array(
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
                ),
                // 'where' => array('vendor_sale_lettel_header.user_id' => $LoginID),
                'where' => array('vendor_sale_lettel_bodies.id' => $id),
           'single' => true
            );
            $results_row = $this->common_model->customGet($optionheader);
        
    
            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;

            
                $optionheader = array(
                    'table' => 'vendor_sale_lettel_header',
                    'select' => 'vendor_sale_lettel_header`.*',
                    'join' => array(
                        array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_header.user_id','left')
                    ),
                    'where' => array('vendor_sale_lettel_header.user_id' => $hospital_id)
                );
        
                $this->data['header_list'] = $this->common_model->customGet($optionheader);

                
                $this->load->admin_render('edit_body', $this->data, 'inner_script');
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


     public function updateBody() {
       
        $where_id = $this->input->post('body_id');
        // print_r($where_id);die;
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'header_id' => $this->input->post('header_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'bodies_template' => $this->input->post('bodies_template'),
                                    
                );
               
                
                $optionBody = array(
                    'table' =>'vendor_sale_lettel_bodies',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                
                $update = $this->common_model->customUpdate($optionBody);
                // print_r($update);die;
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('userSettings'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }


    public function editRecipients() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;


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

        $id = decoding($_GET['id']);
       
        
        if (!empty($id)) {
            // print_r($id);die;
            $optionheader = array(
                'table' => 'vendor_sale_lettel_recipients',
                'select' => 'vendor_sale_lettel_recipients`.*',
                'join' => array(
                            array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
                        ),
                'where' => array('vendor_sale_lettel_recipients.id' => $id),
           'single' => true
            );
            $results_row = $this->common_model->customGet($optionheader);
      
            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;

            
                $optionheader = array(
                    'table' => 'vendor_sale_lettel_bodies',
                    'select' => 'vendor_sale_lettel_bodies`.*',
                    'join' => array(
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_bodies.user_id','left')
                ),
                    'where' => array('vendor_sale_lettel_bodies.user_id' => $hospital_id)
                );
        
                $this->data['body_list'] = $this->common_model->customGet($optionheader);

                
                $this->load->admin_render('edit_recipients', $this->data, 'inner_script');
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


     public function updateRecipients() {
       
        $where_id = $this->input->post('recipients_id');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'body_id' => $this->input->post('body_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'recipient_template' => $this->input->post('bodies_template'),
                                    
                );
               
                
                $optionRecipient = array(
                    'table' =>'vendor_sale_lettel_recipients',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                
                $update = $this->common_model->customUpdate($optionRecipient);
                // print_r($update);die;
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('userSettings'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }


    public function editFooters() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;


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

        $id = decoding($_GET['id']);
        if (!empty($id)) {
            
            $optionheader = array(
                'table' => 'vendor_sale_lettel_footer',
                'select' => 'vendor_sale_lettel_footer`.*',
                'join' => array(
                    array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_footer.user_id','left')
                ),
                'where' => array('vendor_sale_lettel_footer.id' => $id),
           'single' => true
            );
            $results_row = $this->common_model->customGet($optionheader);
            
    
            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;

            
                $optionheader = array(
                    'table' => 'vendor_sale_lettel_recipients',
                'select' => 'vendor_sale_lettel_recipients`.*',
                'join' => array(
                            array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_lettel_recipients.user_id','left')
                        ),
                    'where' => array('vendor_sale_lettel_recipients.user_id' => $hospital_id)
                );
        
                $this->data['recipient_list'] = $this->common_model->customGet($optionheader);

                
                $this->load->admin_render('edit_footer', $this->data, 'inner_script');
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


     public function updateFooters() {
       
        $where_id = $this->input->post('footer_id');
        // print_r($where_id);die;
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'recipient_id' => $this->input->post('recipient_id'),
                    'internal_name' => $this->input->post('internal_name'),
                    'header_checked' => $this->input->post('footer_booked'),
                    'logo' => $this->input->post('image'),
                                    
                );
               
                
                $optionBody = array(
                    'table' =>'vendor_sale_lettel_footer',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                
                $update = $this->common_model->customUpdate($optionBody);
                // print_r($update);die;
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('userSettings'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }

    public function add() {

        //                 echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";
        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        // $this->form_validation->set_rules('facility_manager_id', "Facility Manager Name", 'required|xss_clean');
        $this->form_validation->set_rules('first_name', "first_name", 'required|trim');
        // $this->form_validation->set_rules('description', "Description", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            } else {
                // $options_data = array(
                //     'facility_manager_id' => $LoginID,
                //     'title' => $this->input->post('title'),
                //     'description' => $this->input->post('description'),

                //     'is_active' => 1,
                //     'create_date' => strtotime(datetime()),
                // );

                $options_data = array(
                    'user_id'=> $LoginID,
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'title' => $this->input->post('title'),
                    'company' => $this->input->post('company'),
                    'contacts_clinician' => $this->input->post('contacts_clinician'),
                    'comment' => $this->input->post('comment'),
                    'phone_type' => $this->input->post('phone_type'),
                    'phone_number' => $this->input->post('phone_number'),
                    'user_email' => $this->input->post('user_email'),
                    'address_lookup' => $this->input->post('address_lookup'),
                    'streem_address' => $this->input->post('streem_address'),
                    'city' => $this->input->post('city'),
                    'post_code' => $this->input->post('post_code'),
                    'country' => $this->input->post('country'),
                    'billing_detail' => $this->input->post('billing_detail'),
                    'payment_reference' => $this->input->post('payment_reference'),
                    'System' => $this->input->post('System'),
                    'healthcode' => $this->input->post('healthcode'),
                    
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

    public function consultationTemplates($vendor_profile_activate = "No") {
        $this->data['parent'] = $this->title;
        $this->data['title'] = $this->title;
        $this->data['model'] = $this->router->fetch_class();
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

        $optionheader = array(
            'table' => 'vendor_sale_user_consultation_setting',
            'select' => 'vendor_sale_user_consultation_setting`.*',
            'join' => array(
                array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_user_consultation_setting.user_id','left')
            ),
            // 'where' => array('vendor_sale_user_consultation_setting.user_id' => $LoginID)
        );

        $this->data['list'] = $this->common_model->customGet($optionheader);

        $this->load->admin_render('consultation', $this->data, 'inner_script');
    }


    public function addConsult() {

        // echo "<pre>";
        

        // print_r($this->input->post());die;
        // echo "</pre>";


        $LoginID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == true) {
            $this->filedata['status'] = 1;
            
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            // }
            } else {
            
                $options_data = array(
                    'user_id'=> $LoginID,
                    'internal_name' => $this->input->post('internal_name'),
                    'name' => $this->input->post('name'),
                    'question' => $this->input->post('question'),                    
                );
                $option = array('table' => 'vendor_sale_user_consultation_setting', 'data' => $options_data);
                $this->common_model->customInsert($option);

               $consultation_id = $this->db->insert_id();


               $custome_name = $this->input->post('custome_name');
               $response_type = $this->input->post('response_type');

                $options_data = array(
                    'custome_name' => $custome_name,
                    'response_type' => $response_type
                );

                $options_data1 = array(
                    'consultation_id' => $consultation_id,
                    'question_name' => json_encode($options_data),
                    'question' => $this->input->post('question'),                    
                );
                $option1 = array('table' => 'vendor_sale_consultation_question', 'data' => $options_data1);

                if ($this->common_model->customInsert($option1)) {
                    
                   

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
                    'question' => $this->input->post('question'),
                    // 'recipient_template' => $this->input->post('bodies_template'),                         
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

    /**
     * @method user_edit
     * @description edit dynamic rows
     * @return array
     */

     public function consultEdit() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;
        $id = decoding($_GET['id']);
        // print_r($id);die;
        
        if (!empty($id)) {

 
            $option = array(
                'table' => contactus . ' as R',
                'select' => 'R.*, '
                . 'U.id as u_id,U.first_name,U.last_name,',
                'join' => array(
                    array(USERS . ' as U', 'U.id=R.facility_manager_id', '')),
                'where' => array('R.id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);


            // if (!empty($results_row)) {
                
                // $this->data['results'] = $results_row;

                $optionheader = array(
                    'table' => 'vendor_sale_user_consultation_setting',
                    'select' => 'vendor_sale_user_consultation_setting`.*',
                    'join' => array(
                        array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_user_consultation_setting.user_id','left')
                    ),
                    // 'where' => array('vendor_sale_user_consultation_setting.id' => $id),
                    'single'=>true,
                );
        
                $this->data['list'] = $this->common_model->customGet($optionheader);

                // print_r($this->data['list']);die;

                $this->load->admin_render('edit_consultation', $this->data, 'inner_script');
            // } else {
            //     $this->session->set_flashdata('error', lang('not_found'));
            //     redirect($this->router->fetch_class());
            // }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect($this->router->fetch_class());
        }
    }

    public function edit() {
        $this->data['parent'] = $this->title;
        $this->data['title'] = "Edit " . $this->title;
        $id = decoding($_GET['id']);
        // print_r($id);die;
        
        if (!empty($id)) {


            $option = array(
                'table' => contactus . ' as R',
                'select' => 'R.*, '
                . 'U.id as u_id,U.first_name,U.last_name,',
                'join' => array(
                    array(USERS . ' as U', 'U.id=R.facility_manager_id', '')),
                'where' => array('R.id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);


            if (!empty($results_row)) {
                
                $this->data['results'] = $results_row;


            // $option = "SELECT `vendor_sale_users`.`id`,`vendor_sale_users`.`first_name`, 
            //                 `vendor_sale_users`.`last_name`
            //                 FROM `vendor_sale_users` 
            //                 LEFT JOIN `vendor_sale_users_groups` ON `vendor_sale_users_groups`.`user_id` = `vendor_sale_users`.`id`
            //                 LEFT JOIN `vendor_sale_groups` ON `vendor_sale_groups`.`id` = `vendor_sale_users_groups`.`group_id`
            //                 WHERE `vendor_sale_users`.`delete_status` = 0 and `vendor_sale_users_groups`.`group_id` = 5
            //                 ORDER BY `vendor_sale_users`.`first_name` ASC";

                // $this->data['care_unit'] = $this->common_model->customQuery($option);

                $optionheader = array(
                    'table' => 'vendor_sale_user_consultation_setting',
                    'select' => 'vendor_sale_user_consultation_setting`.*',
                    'join' => array(
                        array('vendor_sale_users', 'vendor_sale_users.id=vendor_sale_user_consultation_setting.user_id','left')
                    ),
                    'where' => array('vendor_sale_user_consultation_setting.id' => $id),
                    'single'=>true,
                );
        
                $this->data['list'] = $this->common_model->customGet($optionheader);

                

                $this->load->admin_render('edit', $this->data, 'inner_script');
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


    public function update() {
       
        $where_id = $this->input->post('id');
        $this->form_validation->set_rules('internal_name', "internal_name", 'required|trim');

        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $this->filedata['status'] = 1;

            if ($this->filedata['status'] == 0) {
                $response = array('status' => 1, 'message' => $this->filedata['error']);
            } else {

              
                $options_data = array(
                    'internal_name' => $this->input->post('internal_name'),
                    'name' => $this->input->post('name'),
                    'question' => $this->input->post('question'),                    
                );
                // $option = array('table' => 'vendor_sale_user_consultation_setting', 'data' => $options_data);

                
                $option = array(
                    'table' =>'vendor_sale_user_consultation_setting',
                    'data' => $options_data,
                    'where' => array('id' => $where_id)
                );
                $update = $this->common_model->customUpdate($option);
                
                $response = array('status' => 1, 'message' => "Successfully updated", 'url' => base_url('contactus/edit'), 'id' => encoding($this->input->post('id')));
                
            }
        endif;

        echo json_encode($response);
    }

    function delete_patient()
    {

        $option = array(
            'table' => 'user_consultation_setting',
            'where' => array('id' => $this->input->post('id'))
        );
        // $this->common_model->customDelete($option);
        // $option = array(
        //     'table' => 'patient_consult',
        //     'where' => array('patient_id' => $this->input->post('id'))
        // );
        // $this->common_model->customDelete($option);
        // $option = array(
        //     'table' => 'notifications',
        //     'where' => array(
        //         'patient_id' => $this->input->post('id')
        //     )
        // );
        $this->common_model->customDelete($option);

        $response = array('status' => 200, 'message' => 'Deleted Successfully', 'url' => base_url($this->router->fetch_class()));
        echo json_encode($response);
    }



   /*  public function update1() {

        $this->form_validation->set_rules('title', lang('title'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('description', lang('description'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('facility_manager_id', "Facility Manager", 'required|trim|xss_clean');
        $newpass = $this->input->post('new_password');
        $user_email = $this->input->post('user_email');
        if ($newpass != "") {
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[6]|max_length[14]');
            //$this->form_validation->set_rules('confirm_password1', 'Confirm Password', 'trim|required|xss_clean|matches[new_password]');
            if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $this->input->post('new_password'))) {
                $response = array('status' => 0, 'message' => "The Password Should be required alphabetic and numeric");
                echo json_encode($response);
                exit;
            }
        }
        $where_id = $this->input->post('id');
        #print_r($where_id);die('ajay');
        if ($this->form_validation->run() == FALSE):
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else:
            $option = array(
                'table' => USERS,
                'select' => 'email',
                'where' => array('email' => $user_email, 'id !=' => $where_id)
            );
            $is_unique_email = $this->common_model->customGet($option);
            if (empty($is_unique_email)) {
                $this->filedata['status'] = 1;
                $image = $this->input->post('exists_image');
                if (!empty($_FILES['user_image']['name'])) {
                    $this->filedata = $this->commonUploadImage($_POST, 'users', 'user_image');

                    if ($this->filedata['status'] == 1) {
                        $image = 'uploads/users/' . $this->filedata['upload_data']['file_name'];
                        unlink_file($this->input->post('exists_image'), FCPATH);
                    }
                }
                if ($this->filedata['status'] == 0) {
                    $response = array('status' => 0, 'message' => $this->filedata['error']);
                } else {
                    if (empty($newpass)) {
                        $currentPass = $this->input->post('current_password');
                    } else {
                        $currentPass = $newpass;
                    }
                    $options_data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'last_name' => $this->input->post('last_name'),
                        'date_of_birth' => "0000-00-00",
                        'gender' => "OTHER",
                        'phone' => $this->input->post('phone_no'),
                        'profile_pic' => $image,
                        'email' => $user_email,
                        'zipcode_access' => json_encode($this->input->post('zipcode')),
                        'facility_manager_id' => $this->input->post('facility_manager_id'),
                        'is_pass_token' => $currentPass,
                    );
                    $this->ion_auth->update($where_id, $options_data);
                    $additional_data_profile = array(
                        'description' => $this->input->post('description'),
                        'designation' => $this->input->post('designation'),
                        'website' => $this->input->post('website'),
                        'country' => $this->input->post('country'),
                        'state' => $this->input->post('state'),
                        'city' => $this->input->post('city'),
                        'address1' => $this->input->post('address1'),
                        'category_id' => (!empty($this->input->post('category_id'))) ? implode(",", $this->input->post('category_id')) : "",
                        'company_name' => $this->input->post('company_name'),
                        'profile_pic' => $image,
                        'update_date' => date('Y-m-d H:i:s')
                    );
                    $this->db->where("user_id", $where_id);
                    $this->db->update('vendor_sale_user_profile', $additional_data_profile);
                    if ($newpass != "") {
                     $change = $this->ion_auth->change_password($user_email, $this->input->post('current_password'), $this->input->post('new_password'));
                       // $pass_new = $this->common_model->encryptPassword($this->input->post('new_password'));
                        //$this->common_model->customUpdate(array('table' => 'users', 'data' => array('password' => $pass_new), 'where' => array('id' => $where_id)));
                    }
                    $response = array('status' => 1, 'message' => 'updated Successfully', 'url' => base_url('mdSteward/edit'), 'id' => encoding($this->input->post('id')));
                }
            } else {
                $response = array('status' => 0, 'message' => "The email address already exists");
            }

        endif;

        echo json_encode($response);
    } */

    public function updateAccountStatus() {
        $id = decoding($this->input->post('userId'));
        $status = $this->input->post('status');
        if ($status == "No") {
            $status = 0;
        } else {
            $status = 1;
        }
        $update = $this->common_model->customUpdate(array('table' => 'users', 'data' => array('active' => $status), 'where' => array('id' => $id)));
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


    // public function index($status = "No")
    // {

    //     $this->data['parent'] = "User";
    //     $this->data['title'] = "Users";
    //     $this->data['status'] = ($status == "Yes") ? 1 : 0;
    //     $role_name = $this->input->post('role_name');
    //     $this->data['roles'] = array(
    //         'role_name' => $role_name
    //     );
    //     $option = array(
    //         'table' => USERS . ' as user',
    //         'select' => 'user.*,group.name as group_name',
    //         'join' => array(
    //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
    //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
    //         ),
    //         'order' => array('user.id' => 'DESC'),
    //         'where' => array('user.email_verify' => 1),
    //         'where_not_in' => array(
    //             'group.id' => array(1, 3, 4)
    //         )
    //     );

    //     $this->data['active'] = count($this->common_model->customGet($option));

    //     $option = array(
    //         'table' => USERS . ' as user',
    //         'select' => 'user.*,group.name as group_name',
    //         'join' => array(
    //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
    //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
    //         ),
    //         'order' => array('user.id' => 'DESC'),
    //         'where' => array('user.email_verify' => 0),
    //         'where_not_in' => array(
    //             'group.id' => array(1, 3, 4)
    //         )
    //     );

    //     $this->data['inactive'] = count($this->common_model->customGet($option));

    //     $this->load->admin_render('list', $this->data, 'inner_script');
    // }

    // public function user_list()
    // {
    //     $user_id = decoding($this->uri->segment(3));

    //     $this->data['parent'] = "User";
    //     $this->data['title'] = "Users";

    //     $option = array(
    //         'table' => USERS . ' as user',
    //         'select' => 'user.*,group.name as group_name',
    //         'join' => array(
    //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
    //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
    //         ),
    //         'order' => array('user.id' => 'DESC'),
    //         'where' => array('user.id' => $user_id),
    //         'where_not_in' => array('group.id' => array(1, 3, 4))
    //     );

    //     $this->data['list'] = $this->common_model->customGet($option);


    //     $this->load->admin_render('user_list', $this->data, 'inner_script');
    // }

    // public function get_users_list()
    // {

    //     $columns = array(
    //         'id',
    //         'team_code',
    //         'first_name',
    //         'email',
    //         // 'phone',
    //         // 'purchase_amount',
    //         // 'deposit_amount',
    //         // 'due_amount',
    //         //            'active',
    //         'created_on',
    //         'action',
    //     );

    //     $limit = $this->input->post('length');
    //     $start = $this->input->post('start');

    //     $from_date = $this->input->post('from_date');
    //     $to_date = $this->input->post('to_date');
    //     $UserStatus = $this->input->post('UserStatus');

    //     $this->data['user'] = array(
    //         'from_date' => $from_date,
    //         'to_date' => $to_date
    //     );

    //     $where = ' user.email_verify=' . $UserStatus . ' AND user.id IS NOT NULL';
    //     if (!empty($from_date) || !empty($to_date)) {
    //         $from_date = date('Y-m-d', strtotime($from_date));

    //         $to_date = date('Y-m-d', strtotime($to_date));

    //         if ($to_date == '1970-01-01') {
    //             $where = " DATE(created_date) >= '" . $from_date . "'";
    //         } else {

    //             $where = " DATE(created_date) >= '" . $from_date . "' and DATE(created_date) <='" . $to_date . "'";
    //         }
    //     }

    //     if (!empty($this->input->post('search')['value'])) {
    //         $search = $this->input->post('search')['value'];
    //         $where .= ' and (user.first_name like "%' . $search . '%" or user.email like "%' . $search . '%" or user.phone like "%' . $search . '%")';
    //     }

    //     $data = array();
    //     $totalData = 0;
    //     $totalFiltered = 0;
    //     // if ($this->ion_auth->is_vendor()) {
    //     //     $vendor_user_id = $this->session->userdata('user_id');
    //     //     $where .= ' and referral.user_id="' . $vendor_user_id . '"';
    //     //     $option = array(
    //     //         'table' => 'user_referrals as referral',
    //     //         'select' => 'user.*,referral.user_id,referral.invite_user_id',
    //     //         'join' => array(array('users as user' => 'user.id=referral.invite_user_id'),
    //     //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=referral.user_id', 'left'),
    //     //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')),
    //     //         'order' => array('user.id' => 'DESC'),
    //     //         'where' => $where,
    //     //         'where_not_in' => array('group.id' => array(1, 2, 4)));
    //     // } else {
    //     $option = array(
    //         'table' => USERS . ' as user',
    //         'select' => 'user.*,group.name as group_name',
    //         'join' => array(
    //             array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
    //             array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
    //         ),
    //         'order' => array('user.id' => 'DESC'),
    //         'where' => $where,
    //         'where_not_in' => array('group.id' => array(1, 3, 4)),
    //         'order' => array('user.id' => "DESC")
    //     );
    //     // }


    //     $user_list = $this->common_model->customGet($option);


    //     if (!empty($user_list) && count($user_list) != 0) {
    //         $totalData = count($user_list);
    //         $totalFiltered = $totalData;
    //         if ($this->ion_auth->is_vendor()) {

    //             $vendor_user_id = $this->session->userdata('user_id');

    //             // $where .= ' and referral.user_id="' . $vendor_user_id . '"';
    //             $options = array(
    //                 'table' => USERS . ' as user',
    //                 'select' => 'user.*,group.name as group_name',
    //                 'join' => array(
    //                     array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
    //                     array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
    //                 ),
    //                 'order' => array('user.id' => 'DESC'),
    //                 'limit' => array($limit => $start),
    //                 'where' => $where,
    //                 'where_not_in' => array('group.id' => array(1, 3, 4)),
    //                 'order' => array('user.id' => "DESC")
    //             );
    //         } else {
    //             $options = array(
    //                 'table' => USERS . ' as user',
    //                 'select' => 'user.*,group.name as group_name',
    //                 'join' => array(
    //                     array(USER_GROUPS . ' as ugroup', 'ugroup.user_id=user.id', 'left'),
    //                     array(GROUPS . ' as group', 'group.id=ugroup.group_id', 'left')
    //                 ),
    //                 'order' => array('user.id' => 'DESC'),
    //                 'limit' => array($limit => $start),
    //                 'where' => $where,
    //                 'where_not_in' => array('group.id' => array(1, 3, 4)),
    //                 'order' => array('user.id' => "DESC")
    //             );
    //         }

    //         $users_list = $this->common_model->customGet($options);

    //         if (!empty($users_list)) {
    //             foreach ($users_list as $users) {

    //                 $option = array(
    //                     'table' => 'users as USR',
    //                     'select' => 'USR.id as user_id,USR.email_verify,USR.verify_mobile,UPC.verification_status as pan_status',
    //                     'join' => array(
    //                         'user_pan_card as UPC' => 'UPC.user_id=USR.id'
    //                     ),
    //                     'where' => array(
    //                         'USR.id' => $users->id, 'USR.email_verify' => 1,
    //                         'USR.verify_mobile' => 1, 'UPC.verification_status' => 2
    //                     )
    //                 );
    //                 $userData = $this->common_model->customGet($option);
    //                 if (!empty($userData)) {
    //                     $stat = '<p class="btn btn-success btn-sm">Verified</p>';
    //                 } else {
    //                     $stat = '<p class="btn btn-danger btn-sm">Pending</p>';
    //                 }

    //                 $start++;
    //                 $userData['id'] = $start;
    //                 //$userData['team_code'] = isset($users->team_code) ? $users->team_code : '';
    //                 $userData['first_name'] = isset($users->first_name) ? $users->first_name . ' ' . $users->last_name : '';
    //                 $userData['email'] = isset($users->email) ? $users->email : '';
    //                 //$userData['phone'] = isset($users->phone) ? $users->phone : '';
    //                 //$userData['active'] = (isset($users->active) && $users->active == 1) ? '<p class="text-success">' . lang('active') . '</p>' : '<p  class="text-danger">' . lang('deactive') . '</p>';

    //                 if (!empty($users->created_date)) {
    //                     $datetime = UTCToConvertIST($users->created_date, 'Asia/Kolkata');
    //                 }

    //                 //$userData['created_on'] = isset($datetime) ? $datetime : '';
    //                 $userData['created_on'] = isset($users->created_on) ? date('d-m-Y H:i', $users->created_on) : '';

    //                 if ($users->id != 1) {
    //                     if ($users->email_verify == 1) {
    //                         $userActiveUrl = "'" . USERS . "','id','" . encoding($users->id) . "','" . $users->email_verify . "'";
    //                         $active_buttn = '<a href="javascript:void(0)" class="on-default edit-row" onclick="statusFn(' . $userActiveUrl . ')" title="Inactive Now"><img width="20" src="' . base_url() . ACTIVE_ICON . '" /></a>';
    //                         $active_buttn = ' <a href="javascript:void(0)" onclick="statusFn(' . $userActiveUrl . ')"  data-toggle="tooltip" title="Inactive Now" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>';
    //                     } else {
    //                         $userActiveUrl = "'" . USERS . "','id','" . encoding($users->id) . "','" . $users->email_verify . "'";
    //                         $active_buttn = '<a href="javascript:void(0)" class="on-default edit-row text-danger" onclick="statusFn(' . $userActiveUrl . ')" title="Active Now"><img width="20" src="' . base_url() . INACTIVE_ICON . '" /></a>';
    //                         $active_buttn = ' <a href="javascript:void(0)" onclick="statusFn(' . $userActiveUrl . ')"  data-toggle="tooltip" title="Active Now" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>';
    //                     }
    //                     $userEditUrl = "'" . USERS . "','user_edit','" . encoding($users->id) . "'";
    //                     $chip_url = "'" . USERS . "','open_chip_model','" . encoding($users->id) . "'";
    //                     $cash_url = "'" . USERS . "','open_cash_model','" . encoding($users->id) . "'";
    //                     $remove_cash_url = "'" . USERS . "','remove_cash_model','" . encoding($users->id) . "'";
    //                     $user_edit = '<a href="javascript:void(0)" class="on-default edit-row" onclick="editFn(' . $userEditUrl . ');"><img width="20" src="' . base_url() . EDIT_ICON . '" /></a>';
    //                     $user_edit = ' <a href="' . base_url() . 'users/user_edit?id=' . encoding($users->id) . '" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>';

    //                     $delUserUrl = "'" . USERS . "','id','" . encoding($users->id) . "','users','users/delUsers'";
    //                     $delete_btn = '<a href="javascript:void(0)" onclick="deleteFn(' . $delUserUrl . ')" class="on-default edit-row text-danger"><img width="20" src="' . base_url() . DELETE_ICON . '" /></a><hr>';
    //                     $delete_btn = ' <a href="javascript:void(0)" onclick="deleteFn(' . $delUserUrl . ')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';

    //                     $myRefferls = '<a href="' . base_url() . 'users/myReferrals/' . $users->id . '" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> My Referrals</a>';

    //                     //$my_prediction = '<a href="' . base_url() . 'ipl/prediction/' . encoding($users->id) . '" class="btn btn-warning btn-sm"><img width="18" src="' . base_url() . CRICKET_ICON . '" />Prediction (' . $totalPrediction . '/100)</a>';
    //                     //$stat ='ver';
    //                     if ($this->ion_auth->is_admin()) {
    //                         $userData['action'] = $user_edit . $active_buttn . $delete_btn;
    //                     } else if ($this->ion_auth->is_subAdmin()) {
    //                         $user = getUser($this->session->userdata('user_id'));

    //                         $option = array(
    //                             'table' => 'subadmin_access',
    //                             'select' => 'modules',
    //                             'where' => array('user_id' => $user->id),
    //                             'single' => true
    //                         );
    //                         $subadminDetails = commonGetHelper($option);
    //                         $access_modules = explode(',', $subadminDetails->modules);
    //                         $act_status = '';
    //                         foreach ($access_modules as $module) {
    //                             if ($module == "user_edit") {
    //                                 $act_status = $user_edit;
    //                             } else if ($module == "user_status") {
    //                                 $act_status .= $active_buttn;
    //                             } else if ($module == "user_delete") {
    //                                 $act_status .= $delete_btn;
    //                             } else if ($module == "user_pan_card") {
    //                                 //$act_status .= $getPanDetails;
    //                             } else if ($module == "user_bank_account") {
    //                                 // $act_status .= $getBankDetails;
    //                             } else if ($module == "user_aadhar_card") {
    //                                 //$act_status .= $getAadharCardDetails;
    //                             } else if ($module == "user_private_contest") {
    //                                 // $act_status .= $user_contest;
    //                             } else if ($module == "user_joined_contest") {
    //                                 // $act_status .= $join_contest;
    //                             } else if ($module == "user_match_team") {
    //                                 // $act_status .= $match_teams;
    //                             } else if ($module == "user_transaction_wallet") {
    //                                 //$act_status .= $transactions;
    //                             } else if ($module == "user_add_cash") {
    //                                 // $act_status .= $add_cash;
    //                             } else if ($module == "user_add_chip") {
    //                                 // $act_status .= $add_chip;
    //                             } else if ($module == "user_remove_cash") {
    //                                 //$act_status .= $remove_cash;
    //                             } else if ($module == "user_prediction") {
    //                                 // $act_status .= $my_prediction;
    //                             } else if ($module == "user_my_referrals") {
    //                                 // $act_status .= $myRefferls;
    //                             }
    //                         }

    //                         $userData['action'] = $stat . $act_status;

    //                         //$userData['action'] = $user_contest . $join_contest . $match_teams;
    //                     } else if ($this->ion_auth->is_facilityManager()) {
    //                         $user = getUser($this->session->userdata('user_id'));

    //                         $option = array(
    //                             'table' => 'subadmin_access',
    //                             'select' => 'modules',
    //                             'where' => array('user_id' => $user->id),
    //                             'single' => true
    //                         );
    //                         $subadminDetails = commonGetHelper($option);
    //                         $access_modules = explode(',', $subadminDetails->modules);
    //                         $act_status = '';
    //                         foreach ($access_modules as $module) {
    //                             if ($module == "user_edit") {
    //                                 $act_status = $user_edit;
    //                             } else if ($module == "user_status") {
    //                                 $act_status .= $active_buttn;
    //                             } else if ($module == "user_delete") {
    //                                 $act_status .= $delete_btn;
    //                             } else if ($module == "user_pan_card") {
    //                                 //$act_status .= $getPanDetails;
    //                             } else if ($module == "user_bank_account") {
    //                                 // $act_status .= $getBankDetails;
    //                             } else if ($module == "user_aadhar_card") {
    //                                 //$act_status .= $getAadharCardDetails;
    //                             } else if ($module == "user_private_contest") {
    //                                 // $act_status .= $user_contest;
    //                             } else if ($module == "user_joined_contest") {
    //                                 // $act_status .= $join_contest;
    //                             } else if ($module == "user_match_team") {
    //                                 // $act_status .= $match_teams;
    //                             } else if ($module == "user_transaction_wallet") {
    //                                 //$act_status .= $transactions;
    //                             } else if ($module == "user_add_cash") {
    //                                 // $act_status .= $add_cash;
    //                             } else if ($module == "user_add_chip") {
    //                                 // $act_status .= $add_chip;
    //                             } else if ($module == "user_remove_cash") {
    //                                 //$act_status .= $remove_cash;
    //                             } else if ($module == "user_prediction") {
    //                                 // $act_status .= $my_prediction;
    //                             } else if ($module == "user_my_referrals") {
    //                                 // $act_status .= $myRefferls;
    //                             }
    //                         }

    //                         $userData['action'] = $stat . $act_status;

    //                         //$userData['action'] = $user_contest . $join_contest . $match_teams;
    //                     }

    //                     $data[] = $userData;
    //                 }
    //             }
    //         }
    //     }
    //     // pr($data);
    //     $json_data = array(
    //         "draw" => intval($this->input->post('draw')),
    //         "recordsTotal" => intval($totalData),
    //         "recordsFiltered" => intval($totalFiltered),
    //         "data" => $data
    //     );
    //     echo json_encode($json_data);
    // }

    /**
     * @method open_model
     * @description load model box
     * @return array
     */
    // function open_model()
    // {
    //     $this->data['title'] = lang("add_user");
    //     $option = array(
    //         'table' => 'countries',
    //         'select' => '*'
    //     );
    //     $this->data['countries'] = $this->common_model->customGet($option);
    //     $this->load->admin_render('add', $this->data, 'inner_script');
    // }

    /**
     * @method users_add
     * @description add dynamic rows
     * @return array
     */
    public function users_add()
    {
        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;
        // validate form input
        $this->form_validation->set_rules('first_name', lang('first_name'), 'required|trim|xss_clean');
        //$this->form_validation->set_rules('last_name', lang('last_name'), 'required|trim|xss_clean');
        //$this->form_validation->set_rules('user_email', lang('user_email'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('user_email', lang('user_email'), 'trim|xss_clean|is_unique[users.email]');
        $this->form_validation->set_rules('password', lang('password'), 'trim|required|xss_clean|min_length[6]|max_length[14]');
        if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $this->input->post('password'))) {
            $response = array('status' => 0, 'message' => "The Password Should be required alphabetic and numeric");
            echo json_encode($response);
            exit;
        }
        if ($this->form_validation->run() == true) {

            $this->filedata['status'] = 1;
            $image = "";
            if (!empty($_FILES['user_image']['name'])) {
                $this->filedata = $this->commonUploadImage($_POST, 'users', 'user_image');
                if ($this->filedata['status'] == 1) {
                    $image = 'uploads/users/' . $this->filedata['upload_data']['file_name'];
                }
            }
            if ($this->filedata['status'] == 0) {
                $response = array('status' => 0, 'message' => $this->filedata['error']);
            } else {
                $email = strtolower($this->input->post('user_email'));
                $identity = ($identity_column === 'email') ? $email : $this->input->post('user_email');
                $password = $this->input->post('password');
                $username = explode('@', $this->input->post('user_email'));
                $digits = 5;
                $code = strtoupper(substr(preg_replace('/[^A-Za-z0-9\-]/', '', $username[0]), 0, 5)) . rand(pow(10, $digits - 1), pow(10, $digits) - 1);

                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'team_code' => $code,
                    'username' => $username[0],
                    'date_of_birth' => (!empty($this->input->post('date_of_birth'))) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : date('Y-m-d'),
                    'profile_pic' => $image,
                    'phone' => $this->input->post('phone_no'),
                    'email_verify' => 1,
                    'is_pass_token' => $password,
                    'created_on' => strtotime(datetime())
                );
                if ($this->ion_auth->is_vendor()) {

                    $insert_id = $this->ion_auth->register($identity, $password, $email, $additional_data, array(3));

                    $user_id = $this->session->userdata('user_id');
                } else {

                    $insert_id = $this->ion_auth->register($identity, $password, $email, $additional_data, array(2));
                }

                if ($insert_id) {

                    $additional_data = array(
                        'country' => $this->input->post('country'),
                        'user_id' => $insert_id,
                        'profile_pic' => $image,
                        'update_date' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('vendor_sale_user_profile', $additional_data);

                    $from = getConfig('admin_email');
                    $subject = "Playwin Fantasy Registration Login Credentials";
                    $title = "Playwin Fantasy Registration";
                    $data['name'] = ucwords($this->input->post('first_name'));
                    $data['content'] = "Playwin Fantasy account login Credentials"
                        . "<p>username: " . $email . "</p><p>Password: " . $password . "</p>";
                    $template = $this->load->view('user_signup_mail', $data, true);
                    $this->send_email_smtp($email, $from, $subject, $template, $title);
                    // $this->send_email($email, $from, $subject, $template, $title);
                    $response = array('status' => 1, 'message' => lang('user_success'), 'url' => base_url('users'));
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
    public function user_edit()
    {
        $this->data['title'] = lang("edit_user");
        $id = decoding($_GET['id']);
        if (!empty($id)) {
            /* $option = array(
              'table' => USERS . ' as user',
              'select' => 'user.*,group.name as group_name,group.id as g_id',
              'join' => array(USER_GROUPS . ' u_group' => 'u_group.user_id=user.id',
              GROUPS . ' group' => 'group.id=u_group.group_id'),
              'where' => array('user.id' => $id),
              'single' => true
              ); */
            $option = array(
                'table' => 'countries',
                'select' => '*'
            );
            $this->data['countries'] = $this->common_model->customGet($option);
            $option = array(
                'table' => USERS . ' as user',
                'select' => 'user.*, UP.address1,UP.city,UP.country,UP.state,UP.description,'
                    . 'UP.designation,UP.website,group.name as group_name,group.id as g_id,'
                    . 'UP.doc_file,UP.company_name,UP.category_id,UP.profile_pic img,UP.doc_file as nda_doc,UP.doc_file_referral',
                'join' => array(
                    array(USER_GROUPS . ' as u_group', 'u_group.user_id=user.id', ''),
                    array(GROUPS . ' as group', 'group.id=u_group.group_id', ''),
                    array('user_profile as UP', 'UP.user_id=user.id', 'left')
                ),
                'where' => array('user.id' => $id),
                'single' => true
            );
            $results_row = $this->common_model->customGet($option);
            if (!empty($results_row)) {
                $this->data['results'] = $results_row;
                $this->load->admin_render('edit', $this->data, 'inner_script');
            } else {
                $this->session->set_flashdata('error', lang('not_found'));
                redirect('users');
            }
        } else {
            $this->session->set_flashdata('error', lang('not_found'));
            redirect('users');
        }
    }

    /**
     * @method user_update
     * @description update dynamic rows
     * @return array
     */
    public function user_update()
    {

        $this->form_validation->set_rules('first_name', lang('first_name'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('last_name', lang('last_name'), 'required|trim|xss_clean');
        $this->form_validation->set_rules('user_email', lang('user_email'), 'required|trim|xss_clean');
        $newpass = $this->input->post('new_password');
        $user_email = $this->input->post('user_email');
        if ($newpass != "") {
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[6]|max_length[14]');
            //$this->form_validation->set_rules('confirm_password1', 'Confirm Password', 'trim|required|xss_clean|matches[new_password]');
            if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $this->input->post('new_password'))) {
                $response = array('status' => 0, 'message' => "The Password Should be required alphabetic and numeric");
                echo json_encode($response);
                exit;
            }
        }

        $where_id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE) :
            $messages = (validation_errors()) ? validation_errors() : '';
            $response = array('status' => 0, 'message' => $messages);
        else :

            $option = array(
                'table' => USERS,
                'select' => 'email',
                'where' => array('email' => $user_email, 'id !=' => $where_id)
            );
            $is_unique_email = $this->common_model->customGet($option);

            if (empty($is_unique_email)) {

                $this->filedata['status'] = 1;
                $image = $this->input->post('exists_image');

                if (!empty($_FILES['user_image']['name'])) {
                    $this->filedata = $this->commonUploadImage($_POST, 'users', 'user_image');

                    if ($this->filedata['status'] == 1) {
                        $image = 'uploads/users/' . $this->filedata['upload_data']['file_name'];
                        unlink_file($this->input->post('exists_image'), FCPATH);
                    }
                }
                if ($this->filedata['status'] == 0) {
                    $response = array('status' => 0, 'message' => $this->filedata['error']);
                } else {

                    if (empty($newpass)) {
                        $currentPass = $this->input->post('current_password');
                    } else {
                        $currentPass = $newpass;
                    }

                    $options_data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'date_of_birth' => (!empty($this->input->post('date_of_birth'))) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : "0000-00-00",
                        'phone' => $this->input->post('phone_no'),
                        'profile_pic' => $image,
                        'email' => $user_email,
                        'is_pass_token' => $currentPass,
                    );

                    $this->ion_auth->update($where_id, $options_data);


                    $additional_data = array(
                        'country' => $this->input->post('country'),
                        'update_date' => date('Y-m-d H:i:s')
                    );
                    $this->db->where("user_id", $where_id);
                    $this->db->update('vendor_sale_user_profile', $additional_data);

                    if (!empty($image)) {
                        $additional_data = array(
                            'profile_pic' => $image
                        );
                        $this->db->where("user_id", $where_id);
                        $this->db->update('vendor_sale_user_profile', $additional_data);
                    }




                    if ($newpass != "") {
                        $pass_new = $this->common_model->encryptPassword($this->input->post('new_password'));
                        $this->common_model->customUpdate(array('table' => 'users', 'data' => array('password' => $pass_new), 'where' => array('id' => $where_id)));
                    }

                    $response = array('status' => 1, 'message' => lang('user_success_update'), 'url' => base_url('users/user_edit'), 'id' => encoding($this->input->post('id')));
                }
            } else {
                $response = array('status' => 0, 'message' => "The email address already exists");
            }

        endif;

        echo json_encode($response);
    }

    /**
     * @method export_user
     * @description export users
     * @return array
     */
    // public function export_user()
    // {

    //     $option = array(
    //         'table' => USERS,
    //         'select' => '*'
    //     );
    //     $users = $this->common_model->customGet($option);

    //     // $userslist = $this->Common_model->getAll(USERS,'name','ASC');
    //     $print_array = array();
    //     $i = 1;
    //     foreach ($users as $value) {


    //         $print_array[] = array('s_no' => $i, 'name' => $value->name, 'email' => $value->email);
    //         $i++;
    //     }

    //     $filename = "user_email_csv.csv";
    //     $fp = fopen('php://output', 'w');

    //     header('Content-type: application/csv');
    //     header('Content-Disposition: attachment; filename=' . $filename);
    //     fputcsv($fp, array('S.no', 'User Name', 'Email'));

    //     foreach ($print_array as $row) {
    //         fputcsv($fp, $row);
    //     }
    // }

    /**
     * @method reset_password
     * @description reset password
     * @return array
     */
    // public function reset_password()
    // {
    //     $user_id_encode = $this->uri->segment(3);

    //     $data['id_user_encode'] = $user_id_encode;

    //     if (!empty($_POST) && isset($_POST)) {

    //         $user_id_encode = $_POST['user_id'];

    //         if (!empty($user_id_encode)) {

    //             $user_id = base64_decode(base64_decode(base64_decode(base64_decode($user_id_encode))));


    //             $this->form_validation->set_rules('new_password', 'Password', 'required');
    //             $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

    //             if ($this->form_validation->run() == FALSE) {
    //                 $this->load->view('reset_password', $data);
    //             } else {


    //                 $user_pass = $_POST['new_password'];

    //                 $data1 = array('password' => md5($user_pass));
    //                 $where = array('id' => $user_id);

    //                 $out = $this->common_model->updateFields(USERS, $data1, $where);



    //                 if ($out) {

    //                     $this->session->set_flashdata('passupdate', 'Password Successfully Changed.');
    //                     $data['success'] = 1;
    //                     $this->load->view('reset_password', $data);
    //                 } else {

    //                     $this->session->set_flashdata('error_passupdate', 'Password Already Changed.');
    //                     $this->load->view('reset_password', $data);
    //                 }
    //             }
    //         } else {

    //             $this->session->set_flashdata('error_passupdate', 'Unable to Change Password, Authentication Failed.');
    //             $this->load->view('reset_password');
    //         }
    //     } else {
    //         $this->load->view('reset_password', $data);
    //     }
    // }

    /**
     * @method get_user_ajax
     * @description get user list by ajax
     * @return array
     */
    public function get_user_ajax()
    {
        $search = $this->input->get('search');
        $organization_id = $this->input->get('id');
        $user_id_upper = $this->input->get('user_id_upper');
        if (empty($organization_id)) {
            echo json_encode(array());
            exit;
        }
        $option = array(
            'table' => HIERARCHY_ROLE_ORDER . ' as roles',
            'select' => 'role_id',
            'where' => array(
                'roles.organization_id' => $organization_id
            ),
            'order' => array('roles.id' => 'desc'),
            'single' => true,
            'group_by' => array('roles.id')
        );
        $roles = $this->common_model->customGet($option);
        $option = array(
            'table' => USER_GROUPS . ' as groups',
            'select' => 'user.id,groups.group_id',
            'join' => array(USERS . ' as user' => 'user.id=groups.user_id'),
            'where' => array('groups.group_id' => $roles->role_id, 'groups.organization_id' => $organization_id)
        );
        $user_roles = $this->common_model->customGet($option);
        $usr = 1;
        if (!empty($user_roles)) {
            foreach ($user_roles as $user) {
                $usr .= "," . $user->id;
            }
        }
        $sql = "SELECT user.`id` as id, CONCAT(user.`first_name`,' ',user.`last_name`,' (',name,')') as name, ug.organization_id FROM "
            . "`users` as user INNER JOIN users_groups as ug ON ug.user_id=user.id "
            . " INNER JOIN groups as gr ON (gr.id=ug.group_id) "
            . " INNER JOIN user_hierarchy as UH ON (UH.child_user_id=user.id)"
            . " WHERE UH.user_id='" . $user_id_upper . "' AND  user.`id` IN(" . $usr . ") AND ug.organization_id  = '" . $organization_id . "'  AND user.`first_name` LIKE '%" . $search . "%' "
            . "";
        $users = $this->common_model->customQuery($sql);
        echo json_encode($users);
    }

    /**
     * @method delUsers
     * @description delete users
     * @return array
     */
    public function delUsers()
    {
        $response = "";
        $id = decoding($this->input->post('id')); // delete id
        $table = $this->input->post('table'); //table name
        $id_name = $this->input->post('id_name'); // table field name
        if (!empty($table) && !empty($id) && !empty($id_name)) {

            $option = array(
                'table' => $table,
                'where' => array($id_name => $id),
                'single' => true
            );
            $userDetails = $this->common_model->customGet($option);

            /* $options_data = array(
              'user_id' => $id,
              'first_name' => $userDetails->first_name,
              'email' => $userDetails->email,
              'pass_token' => $userDetails->is_pass_token,
              'date_of_birth' => $userDetails->date_of_birth,
              'phone' => $userDetails->phone,
              'gender' => $userDetails->gender,
              'team_code' => 0,
              'profile_pic' => $userDetails->profile_pic,
              'created_on' => $userDetails->created_on,
              );

              $option = array('table' => 'users_delete_history', 'data' => $options_data);
              $delete_history = $this->common_model->customInsert($option); */
            if ($userDetails) {
                $option = array(
                    'table' => $table,
                    'where' => array($id_name => $id)
                );
                $delete = $this->common_model->customDelete($option);

                if ($delete) {
                    $response = 200;
                } else
                    $response = 400;
            }
        } else {
            $response = 400;
        }
        echo $response;
    }

    function checkStr()
    {
        $str = "";

        $ci = get_instance();

        if (!empty($str) && isset($str)) {
            $contest = explode(" ", $str);

            if (count($contest) > 1) {
                echo $contest[0] . ' ' . $contest[1];
            } else {
                echo $contest[0];
            }
        } else {
            echo $str;
        }
    }

}
