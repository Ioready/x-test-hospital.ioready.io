<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .tab-content {
            margin-top: 20px;
        }

        .table-actions {
            display: flex;
            gap: 5px;
        }

        .modal-content {
            max-width: 700px;
            margin: auto;
        }

        .modal-header {
            justify-content: center;
        }

        .btn-icon {
            padding: 5px;
            font-size: 14px;
        }

        .btn-icon.edit {
            background-color: #5cb85c;
            color: white;
        }

        .btn-icon.delete {
            background-color: #d9534f;
            color: white;
        }

        .status-active {
            color: green;
        }

        .status-inactive {
            color: red;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .tab-pane {
            padding-top: 20px;
        }
        .fade {
            opacity: 1!important;
        
        }
    </style>

    <!-- module permission css -->
    <style>
        .card {
            margin-bottom: 2rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .permissions-table {
            width: 100%;
        }

        .permission-switch {
            display: inline-block;
            width: 3rem;
        }

        .search-input {
            max-width: 250px;
        }

        .container {
            max-width: 1500px;
        }

        @media (max-width: 768px) {
            .permissions-table {
                font-size: 12px;
            }

            .card {
                margin-bottom: 1rem;
            }

            .search-input {
                width: 100%;
                margin-top: 1rem;
            }
        }
        div{
            font-size: medium;
        }
        button{
            font-size: medium!important;
        }
        .button-data{
            background: cornflowerblue!important;
            font-size: medium!important;
            color: cornsilk;
        }
        .heading-div{
            padding-left: 20px;
        }
    </style>

<div id="page-content">
  <div class="heading-div">
<ul class="breadcrumb breadcrumb-top" style="background: white;padding-left: 20px; height: 42px;">
    <li style="display: inline-block; ">
        <a href="<?php echo site_url('pwfpanel');?>" style="text-decoration: none; color:black;">Home</a>
    </li>
    <li style="display: inline-block;">
        <a href="<?php echo site_url('users');?>" style="text-decoration: none; color:black;font-weight:bold;">Users</a>
    </li>
</ul>
</div>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
    <div class="block-title" >
            <!-- <h2 class="fw-bold text-dark">Users Panel</h2> -->
            <ul class="nav nav-tabs" id="userRoleTab" role="tablist">
            <?php 
                $all_permission = $this->ion_auth->is_permission();
                if (!empty($all_permission['form_permission'])) {
                foreach($all_permission['form_permission'] as $permission){
                   
                    $menu_view =$permission->menu_view;
                    $menu_create= $permission->menu_create;
                    $menu_update= $permission->menu_update;
                    $menu_delete =$permission->menu_delete;
                    $menu_name =$permission->menu_name;
                    // echo $menu_name;
                    // if ($menu_name == 'Contacts') { 
                    //    if ($menu_view =='1') {
            ?>
                <?php if ($menu_name == 'Users') { 
                       if ($menu_view =='1') {?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user"
                        aria-selected="true">User</a>
                </li>
                <?php } } if ($menu_name == 'Role & Permission Management') { 
                       if ($menu_view =='1') {?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="role-tab" data-bs-toggle="tab" href="#role" role="tab" aria-controls="role"
                        aria-selected="false">Role & Permission</a>
                </li>
                <?php }} if ($menu_name == 'Module Permission') { 
                       if ($menu_view =='1') {?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="role-tab" data-bs-toggle="tab" href="#module" role="tab" aria-controls="role"
                        aria-selected="false">Module Permission</a>
                </li>
                <?php }} }}?>
            </ul>
        </div>

    <?php if($this->ion_auth->is_facilityManager()){?>


        <div class="block-title" >
            <!-- <h2 class="fw-bold text-dark">Users Panel</h2> -->
            <ul class="nav nav-tabs" id="userRoleTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user"
                        aria-selected="true">User</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="role-tab" data-bs-toggle="tab" href="#role" role="tab" aria-controls="role"
                        aria-selected="false">Role & Permission</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="role-tab" data-bs-toggle="tab" href="#module" role="tab" aria-controls="role"
                        aria-selected="false">Module Permission</a>
                </li>
            </ul>
        </div>


        <?php } ?>


        
            <div class="table-responsive" >
                 <div class="tab-content" id="userRoleTabContent">

                    <?php 
                        $all_permission = $this->ion_auth->is_permission();
                        if (!empty($all_permission['form_permission'])) {
                        foreach($all_permission['form_permission'] as $permission){
                        
                            $menu_view =$permission->menu_view;
                            $menu_create= $permission->menu_create;
                            $menu_update= $permission->menu_update;
                            $menu_delete =$permission->menu_delete;
                            $menu_name =$permission->menu_name;
                            // echo $menu_name;
                            if ($menu_name == 'Users') { 
                               if ($menu_view =='1') {?>
                  

                    <!-- User Tab -->
                    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>User Management</h4>
                        <?php if ($menu_create =='1') {?>
                            <button class="btn btn-primary button-data" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add
                                User</button>
                            <?php }?>
                        </div>
                        <?php if ($menu_view =='1') {?>
                        <table id="userTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            <?php
                                            if (isset($list) && !empty($list)):
                                                $rowCount = 0;
                                                foreach ($list as $rows):
                                                    $rowCount++;
                                            ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="text-center"><?php echo $rowCount; ?></td>            
                                            <!-- <td><?php echo $rows->team_code; ?></td> -->
                                            <td><?php echo $rows->first_name. ' '.$rows->last_name; ?></td>
                                            <td class="text-center"><?php echo $rows->phone; ?></td>
                                            <td><?php echo $rows->email; ?></td>
                                            <td><?php echo $rows->group_name; ?></td>
                                            <!-- <td class="text-center"><?php if($rows->active == 1) echo '<p class="text-success">'.lang('active').'</p>'; else echo '<p  class="text-danger">'.lang('deactive').'</p>';?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($rows->created_date));?></td> -->
                                                
                                            <td><span class="status-active">Active</span></td>
                                                <!-- <td> -->
                                                    <!-- <div class="table-actions"> -->
                                                        <!-- <button class="btn btn-icon edit" data-bs-toggle="modal"
                                                            data-bs-target=".bd-example-modal-lg">✏️</button> -->
                                                            <!-- <button class="btn btn-icon edit" data-bs-toggle="modal" data-bs-target="#addRoleModal">✏️</button> -->
                                                            <!-- <button class="btn btn-icon edit" data-bs-toggle="modal" data-bs-target="#addUserModal">✏️</button> -->
                                                            <!-- <a href="javascript:void(0)" class="on-default edit-row" onclick="editFn('<?php echo USERS;?>','user_edit','<?php echo encoding($rows->id); ?>');"><img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a>
                                    
                                                        <button class="btn btn-icon delete">
                                                            <a href="javascript:void(0)" onclick="deleteFn('<?php echo USERS;?>','remove_cash_model','<?php echo $rows->id; ?>')">🗑️</a> 
                                                        </button>

                                                    </div> -->
                                                <!-- </td> -->


                                                <td class="actions">
                                        <div class="btn-group btn-group-xs">
                                        <!-- <a href="javascript:void(0)" class="on-default edit-row" onclick="editFn('users','open_user_edit','<?php echo encoding($rows->id); ?>');"><img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a> -->
                                                
                                        <!-- <a href="javascript:void(0)" class="on-default edit-row" onclick="editFn('<?php echo USERS;?>','user_edit','<?php echo encoding($rows->id); ?>');"><img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a> -->
                                    <?php if ($menu_update =='1') { ?>
                                    <a href="javascript:void(0)" class="on-default edit-row user-edit-data" id="<?php echo $rows->id; ?>">
                                    <img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a>

                                    <?php  if($rows->id != 1){if($rows->active == 1) {?>
                                    <a href="javascript:void(0)" class="on-default edit-row" onclick="statusFn('<?php echo USERS;?>','id','<?php echo encoding($rows->id);?>','<?php echo $rows->active;?>')" title="Inactive Now"><img width="20" src="<?php echo base_url().ACTIVE_ICON;?>" /></a>
                                    <?php } else { ?>
                                    <a href="javascript:void(0)" class="on-default edit-row text-danger" onclick="statusFn('<?php echo USERS;?>','id','<?php echo encoding($rows->id); ?>','<?php echo $rows->active;?>')" title="Active Now"><img width="20" src="<?php echo base_url().INACTIVE_ICON;?>" /></a>
                                    <?php }  } if ($menu_update =='1') {?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo USERS;?>','id','<?php echo encoding($rows->id); ?>','users/managements','users/deleteUsers')" class="on-default edit-row text-danger"><img width="20" src="<?php echo base_url().DELETE_ICON;?>" /></a>
                                    <?php } ?>

                                    <hr>
                                    </div>
                                    </td>

                                            </tr>

                                                <?php } endforeach;
                                            endif; ?>

                            
                                
                            </tbody>
                        </table>
                        <?php }?>
                    </div>

                    <?php }}}} if($this->ion_auth->is_facilityManager()){?>

                    <!-- User Tab -->
                    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>User Management</h4>
                            <button class="btn btn-primary button-data" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add
                                User</button>
                        </div>
                        <table id="userTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                            if (isset($list) && !empty($list)):
                                                $rowCount = 0;
                                                foreach ($list as $rows):
                                                    $rowCount++;
                                            ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="text-center"><?php echo $rowCount; ?></td>            
                                            <!-- <td><?php echo $rows->team_code; ?></td> -->
                                            <td><?php echo $rows->first_name. ' '.$rows->last_name; ?></td>
                                            <td class="text-center"><?php echo $rows->phone; ?></td>
                                            <td><?php echo $rows->email; ?></td>
                                            <td><?php echo $rows->group_name; ?></td>
                                            <!-- <td class="text-center"><?php if($rows->active == 1) echo '<p class="text-success">'.lang('active').'</p>'; else echo '<p  class="text-danger">'.lang('deactive').'</p>';?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($rows->created_date));?></td> -->
                                                
                                            <td><span class="status-active">Active</span></td>
                                                <!-- <td> -->
                                                    <!-- <div class="table-actions"> -->
                                                        <!-- <button class="btn btn-icon edit" data-bs-toggle="modal"
                                                            data-bs-target=".bd-example-modal-lg">✏️</button> -->
                                                            <!-- <button class="btn btn-icon edit" data-bs-toggle="modal" data-bs-target="#addRoleModal">✏️</button> -->
                                                            <!-- <button class="btn btn-icon edit" data-bs-toggle="modal" data-bs-target="#addUserModal">✏️</button> -->
                                                            <!-- <a href="javascript:void(0)" class="on-default edit-row" onclick="editFn('<?php echo USERS;?>','user_edit','<?php echo encoding($rows->id); ?>');"><img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a>
                                    
                                                        <button class="btn btn-icon delete">
                                                            <a href="javascript:void(0)" onclick="deleteFn('<?php echo USERS;?>','remove_cash_model','<?php echo $rows->id; ?>')">🗑️</a> 
                                                        </button>

                                                    </div> -->
                                                <!-- </td> -->


                                                <td class="actions">
                                        <div class="btn-group btn-group-xs">
                                        <!-- <a href="javascript:void(0)" class="on-default edit-row" onclick="editFn('users','open_user_edit','<?php echo encoding($rows->id); ?>');"><img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a> -->
                                                
                                        <!-- <a href="javascript:void(0)" class="on-default edit-row" onclick="editFn('<?php echo USERS;?>','user_edit','<?php echo encoding($rows->id); ?>');"><img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a> -->
                                    
                                    <a href="javascript:void(0)" class="on-default edit-row user-edit-data" id="<?php echo $rows->id; ?>">
                                    <img width="20" src="<?php echo base_url().EDIT_ICON;?>" />
                            </a>
                                    <?php if($rows->id != 1){if($rows->active == 1) {?>
                                    <a href="javascript:void(0)" class="on-default edit-row" onclick="statusFn('<?php echo USERS;?>','id','<?php echo encoding($rows->id);?>','<?php echo $rows->active;?>')" title="Inactive Now"><img width="20" src="<?php echo base_url().ACTIVE_ICON;?>" /></a>
                                    <?php } else { ?>
                                    <a href="javascript:void(0)" class="on-default edit-row text-danger" onclick="statusFn('<?php echo USERS;?>','id','<?php echo encoding($rows->id); ?>','<?php echo $rows->active;?>')" title="Active Now"><img width="20" src="<?php echo base_url().INACTIVE_ICON;?>" /></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" onclick="deleteFn('<?php echo USERS;?>','id','<?php echo encoding($rows->id); ?>','users/managements','users/deleteUsers')" class="on-default edit-row text-danger"><img width="20" src="<?php echo base_url().DELETE_ICON;?>" /></a>
                                    <hr>
                                    </div>
                                    </td>

                                            </tr>

                                                <?php } endforeach;
                                            endif; ?>

                            
                                
                            </tbody>
                        </table>
                    </div>

                    <?php }
                        $all_permission = $this->ion_auth->is_permission();
                        if (!empty($all_permission['form_permission'])) {
                        foreach($all_permission['form_permission'] as $permission){
                        
                            $menu_view =$permission->menu_view;
                            $menu_create= $permission->menu_create;
                            $menu_update= $permission->menu_update;
                            $menu_delete =$permission->menu_delete;
                            $menu_name =$permission->menu_name;
                            // echo $menu_name;
                            if ($menu_name == 'Role & Permission Management') { 
                               
                    ?>
                    <!-- Role & Permission Tab -->
                    <div class="tab-pane fade" id="role" role="tabpanel" aria-labelledby="role-tab">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Role & Permission Management</h4>
                            <?php if ($menu_create =='1') {?>
                            <button class="btn btn-primary button-data" data-bs-toggle="modal" data-bs-target="#addRoleModal">+ Create Role
                                & Permission</button>
                                <?php }?>
                        </div>

                        <?php if ($menu_view =='1') {?>
                        <table id="roleTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Role</th>
                                    <th>Descriptions</th>
                                    <th>Permission</th>
                                    <!-- <th>status</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            if (isset($roles_list) && !empty($roles_list)):
                                                $rowCount = 0;
                                                foreach ($roles_list as $rows):
                                                    $rowCount++;
                                                    ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><a href="#"><?php echo $rows->name; ?></a></td>
                                            <td><?php echo $rows->description; ?></td>
                                            <td><button class="btn btn-light">Edit</button></td>
                                        
                                            <!-- <td>
                                                <div class="table-actions">
                                                
                                                <button class="btn btn-icon edit">✏️</button>
                                                    <button class="btn btn-icon delete">🗑️</button>
                                                </div>
                                            </td> -->

                                            <td class="actions">
                                            <?php if ($menu_update =='1') {?>
                                                <a href="javascript:void(0)" class="on-default edit-row" onclick="editFn('users','roles_edit','<?php echo encoding($rows->id); ?>');"><img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a>
                                                
                                                <?php
                                            
                                                if($rows->active == 1) {?>
                                                
                                                <a href="javascript:void(0)" class="on-default edit-row" onclick="statusFn('<?php echo GROUPS;?>','id','<?php echo encoding($rows->id);?>','<?php echo $rows->active;?>')" title="Inactive Now"><img width="20" src="<?php echo base_url().ACTIVE_ICON;?>" /></a>
                                                <?php } else { ?>
                                                <a href="javascript:void(0)" class="on-default edit-row text-danger" onclick="statusFn('<?php echo GROUPS;?>','id','<?php echo encoding($rows->id); ?>','<?php echo $rows->active;?>')" title="Active Now"><img width="20" src="<?php echo base_url().INACTIVE_ICON;?>" /></a>
                                                <?php } } if ($menu_delete =='1') {?>
                                            <a href="javascript:void(0)" onclick="deleteRole('<?php echo GROUPS;?>','id','<?php echo encoding($rows->id); ?>','users/managements')" class="on-default edit-row text-danger"><img width="20" src="<?php echo base_url().DELETE_ICON;?>" /></a>
                                            <?php }?>
                                                </td>

                                                </tr>
                                            
                                                <?php endforeach;
                                            endif; ?>

                                <!-- <tr>
                                    <td><input type="checkbox"></td>
                                    <td><a href="#">Doctor</a></td>
                                    <td>Lorem ipsum</td>
                                    <td><button class="btn btn-light">Edit</button></td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="btn btn-icon edit">✏️</button>
                                            <button class="btn btn-icon delete">🗑️</button>
                                        </div>
                                    </td>
                                </tr> -->
                                
                            </tbody>
                        </table>

                        </div>

                    <?php }}}} if($this->ion_auth->is_facilityManager()){?>

                        <!-- Role & Permission Tab -->
                    <div class="tab-pane fade" id="role" role="tabpanel" aria-labelledby="role-tab">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Role & Permission Management</h4>
                            <button class="btn btn-primary button-data" data-bs-toggle="modal" data-bs-target="#addRoleModal">+ Create Role
                                & Permission</button>
                        </div>

                        <table id="roleTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Role</th>
                                    <th>Descriptions</th>
                                    <th>Permission</th>
                                    <!-- <th>status</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            if (isset($roles_list) && !empty($roles_list)):
                                                $rowCount = 0;
                                                foreach ($roles_list as $rows):
                                                    $rowCount++;
                                                    ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td> <a href="#"><?php echo ($rows->name == 'SubAdmin') ? 'Doctor' : $rows->name; ?></a></td>
                                            <td><?php echo $rows->description; ?></td>
                                            <td><button class="btn btn-light">Edit</button></td>
                                        
                                            <!-- <td>
                                                <div class="table-actions">
                                                
                                                <button class="btn btn-icon edit">✏️</button>
                                                    <button class="btn btn-icon delete">🗑️</button>
                                                </div>
                                            </td> -->

                                            <td class="actions">
                                                <?php if($rows->name == 'SubAdmin'){?>
                                                
                                            <?php } else if($rows->name == 'Patient'){

                                             }else{?>
                                                <a href="javascript:void(0)" class="on-default edit-row" onclick="editFn('users','roles_edit','<?php echo encoding($rows->id); ?>');"><img width="20" src="<?php echo base_url().EDIT_ICON;?>" /></a>
                                                
                                                <?php
                                            
                                                if($rows->active == 1) {?>
                                                
                                                <a href="javascript:void(0)" class="on-default edit-row" onclick="statusFn('<?php echo GROUPS;?>','id','<?php echo encoding($rows->id);?>','<?php echo $rows->active;?>')" title="Inactive Now"><img width="20" src="<?php echo base_url().ACTIVE_ICON;?>" /></a>
                                                <?php } else { ?>
                                                <a href="javascript:void(0)" class="on-default edit-row text-danger" onclick="statusFn('<?php echo GROUPS;?>','id','<?php echo encoding($rows->id); ?>','<?php echo $rows->active;?>')" title="Active Now"><img width="20" src="<?php echo base_url().INACTIVE_ICON;?>" /></a>
                                                <?php } ?>
                                            <a href="javascript:void(0)" onclick="deleteRole('<?php echo GROUPS;?>','id','<?php echo encoding($rows->id); ?>','users/managements')" class="on-default edit-row text-danger"><img width="20" src="<?php echo base_url().DELETE_ICON;?>" /></a>
                                                <?php }?>

                                                </td>

                                                </tr>
                                            
                                                <?php endforeach;
                                            endif; ?>

                                <!-- <tr>
                                    <td><input type="checkbox"></td>
                                    <td><a href="#">Doctor</a></td>
                                    <td>Lorem ipsum</td>
                                    <td><button class="btn btn-light">Edit</button></td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="btn btn-icon edit">✏️</button>
                                            <button class="btn btn-icon delete">🗑️</button>
                                        </div>
                                    </td>
                                </tr> -->
                                
                            </tbody>
                        </table>
                    </div>

                    <?php }
                        $all_permission = $this->ion_auth->is_permission();
                        if (!empty($all_permission['form_permission'])) {
                        foreach($all_permission['form_permission'] as $permission){
                        
                            $menu_view =$permission->menu_view;
                            $menu_create= $permission->menu_create;
                            $menu_update= $permission->menu_update;
                            $menu_delete =$permission->menu_delete;
                            $menu_name =$permission->menu_name;
                            // echo $menu_name;
                            if ($menu_name == 'Module Permission') { 
                               if ($menu_view =='1') {
                    ?>

                    <!--module permission tab -->
                    <div class="tab-pane fade" id="module" role="tabpanel" aria-labelledby="role-tab">
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>Group Permission</h3>
                    <input type="text" class="form-control search-input" placeholder="Search...">
                    </div>

                    <form class="form-horizontal p-4" role="form" id="addFormAjax" method="post" action="<?php echo base_url('users/rolePermission') ?>" enctype="multipart/form-data">
                            
                    <?php if ($menu_view =='1') {?>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="">Roles</label>
                            <select class="form-select" id="role_id" name="role" required>
                        
                            <option readonly>Please Select</option>
                            <?php echo $module_permission->role_id; ?>
                        <?php foreach ($roles_list as $rows): ?>
                            <?php if($rows->name =='SubAdmin'){ ?>
                                <option value="<?php echo $rows->id; ?>" <?php echo ($module_permission->role_id == $rows->id) ? 'selected' : ''; ?>><?php echo 'Doctor'; ?></option>
                                <?php }else if($rows->name !='SubAdmin'){?>
                                    
                                    <!-- <option value="<?php echo $rows->id; ?>" <?php $module_permission->role_id ==$rows->id?'selected':''?>><?php echo $rows->name; ?></option> -->
                                    <option value="<?php echo $rows->id; ?>" <?php echo ($module_permission->role_id == $rows->id) ? 'selected' : ''; ?>><?php echo $rows->name; ?></option>

                                    <?php }?>
                                            
                            <?php endforeach?>
                        </select>
                        
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        
                    </div>
                    <?php } if ($menu_view =='1') {?>

                    <div class="row">
        
                        <?php foreach($module_list as $rows) { ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <span><?php echo $rows->menu_name; ?></span>
                                        <div class="form-check form-switch permission-switch">
                                            <input class="form-check-input servicecheck" type="checkbox" id="<?php echo $rows->menu_id; ?>" name="menu_id[]" value="<?php echo $rows->menu_id; ?>">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table permissions-table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Permissions</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <tr>
                                                    <td>View All Records</td>
                                                    <td class="text-end">
                                                        <input type="checkbox" class="servicecheckviewAll" name="view_all_<?php echo $rows->menu_id; ?>" id="view_all" onclick="selectAll('<?php echo $rows->menu_key; ?>')">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>View</td>
                                                    <td class="text-end"><input type="checkbox" name="view_<?php echo $rows->menu_id; ?>" id="view"  class="role-checkbox <?php echo $rows->menu_key; ?> servicecheckView<?php echo $rows->menu_key; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Create</td>
                                                    <td class="text-end"><input type="checkbox" name="create_<?php echo $rows->menu_id; ?>" id="create" class="role-checkbox <?php echo $rows->menu_key; ?> servicecheckCreate<?php echo $rows->menu_key; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Delete</td>
                                                    <td class="text-end"><input type="checkbox" name="delete_<?php echo $rows->menu_id; ?>" id="delete" class="role-checkbox <?php echo $rows->menu_key; ?> servicecheckDelete<?php echo $rows->menu_key; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Update</td>
                                                    <td class="text-end"><input type="checkbox" name="update_<?php echo $rows->menu_id; ?>" id="update" class="role-checkbox <?php echo $rows->menu_key; ?> servicecheckUpdate<?php echo $rows->menu_key; ?>"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if ($menu_update =='1') {?>
                            <button type="submit" id="submit"  class="btn btn-sm btn-primary" style="background:#337ab7;"><?php echo lang('submit_btn');?></button>
                            <?php } ?>
                        </div>
                        
                    </div>

                    <?php } ?>
                    </form>

                    <?php }}}} if($this->ion_auth->is_facilityManager()){?>

                       <!--module permission tab -->
                    <div class="tab-pane fade" id="module" role="tabpanel" aria-labelledby="role-tab">
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>Group Permission</h3>
                    <input type="text" class="form-control search-input" placeholder="Search...">
                    </div>

                    <form class="form-horizontal p-4" role="form" id="addFormAjax" method="post" action="<?php echo base_url('users/rolePermission') ?>" enctype="multipart/form-data">
                            
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="">Roles</label>
                            <select class="form-select" id="role_id" name="role" required>
                        
                            <option readOnly>Please Select</option>
                            <?php echo $module_permission->role_id; ?>
                        <?php foreach ($roles_list as $rows): ?>
                            <?php if($rows->name =='SubAdmin'){ ?>
                                <option value="<?php echo $rows->id; ?>" <?php echo ($module_permission->role_id == $rows->id) ? 'selected' : ''; ?>><?php echo 'Doctor'; ?></option>
                                <?php }else if($rows->name !='SubAdmin'){?>
                                    
                                    <!-- <option value="<?php echo $rows->id; ?>" <?php $module_permission->role_id ==$rows->id?'selected':''?>><?php echo $rows->name; ?></option> -->
                                    <option value="<?php echo $rows->id; ?>" <?php echo ($module_permission->role_id == $rows->id) ? 'selected' : ''; ?>><?php echo $rows->name; ?></option>

                                    <?php }?>
                                            
                            <?php endforeach?>
                        </select>
                        
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        
                    </div>

                    <div class="row">
        
                        <?php foreach($module_list as $rows) { ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <span><?php echo $rows->menu_name; ?></span>
                                        <div class="form-check form-switch permission-switch">
                                            <input class="form-check-input servicecheck" type="checkbox" id="<?php echo $rows->menu_id; ?>" name="menu_id[]" value="<?php echo $rows->menu_id; ?>">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table permissions-table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Permissions</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <tr>
                                                    <td>View All Records</td>
                                                    <td class="text-end">
                                                        <input type="checkbox" class="servicecheckviewAll" name="view_all_<?php echo $rows->menu_id; ?>" id="view_all" onclick="selectAll('<?php echo $rows->menu_key; ?>')">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>View</td>
                                                    <td class="text-end"><input type="checkbox" name="view_<?php echo $rows->menu_id; ?>" id="view"  class="role-checkbox <?php echo $rows->menu_key; ?> servicecheckView<?php echo $rows->menu_key; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Create</td>
                                                    <td class="text-end"><input type="checkbox" name="create_<?php echo $rows->menu_id; ?>" id="create" class="role-checkbox <?php echo $rows->menu_key; ?> servicecheckCreate<?php echo $rows->menu_key; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Delete</td>
                                                    <td class="text-end"><input type="checkbox" name="delete_<?php echo $rows->menu_id; ?>" id="delete" class="role-checkbox <?php echo $rows->menu_key; ?> servicecheckDelete<?php echo $rows->menu_key; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Update</td>
                                                    <td class="text-end"><input type="checkbox" name="update_<?php echo $rows->menu_id; ?>" id="update" class="role-checkbox <?php echo $rows->menu_key; ?> servicecheckUpdate<?php echo $rows->menu_key; ?>"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <button type="submit" id="submit"  class="btn btn-sm btn-primary" style="background:#337ab7;"><?php echo lang('submit_btn');?></button>
                    
                        </div>
                        
                    </div>

                    </form> 
                    <?php }?>
                
                    <!-- Add User Modal -->
                    <!-- <div class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addUserModal">
                    <div class="modal-dialog modal-lg"> -->

                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="addUserModalLabel"><strong> Add User</strong></h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                            

                            <form class="form-horizontal p-4" role="form" id="addFormAjax" method="post" action="<?php echo base_url('users/users_add') ?>" enctype="multipart/form-data">
                                
                                <div class="alert alert-danger" id="error-box" style="display: none"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group me-2">
                                                <label class="control-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" />
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group me-2">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group me-2">
                                            <label class="control-label"><?php echo lang('user_email');?></label>
                                            <input type="email" class="form-control" name="user_email" id="user_email" placeholder="<?php echo lang('user_email');?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group me-2">
                                            <label class="control-label">Country</label>
                                            <select id="country" name="country" class="form-control select2" size="1">
                                                <option value="" disabled selected>Please select</option>
                                                <?php foreach($countries as $country){?>
                                                <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group me-2">
                                            <label class="control-label"><?php echo lang('phone_no');?></label>
                                            <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="<?php echo lang('phone_no');?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group me-2">
                                            <label class="control-label"><?php echo lang('password');?></label>
                                            <input type="text" class="form-control" name="password" id="password" placeholder="<?php echo lang('password');?>" value="<?php echo randomPassword();?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <!-- <select class="form-select" id="role" name="role">
                                                
                                            <?php //foreach ($roles_list as $rows): ?>
                                                    <option value="<?php //echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                                                                
                                                <?php //endforeach?>
                                            </select> -->

                                            <select class="form-select" id="role" name="role">
                                                <?php foreach ($roles_list as $rows): ?>
                                                    <?php if ($rows->name !== 'Patient' && $rows->name !== 'Doctor' && $rows->name !== 'SubAdmin'): ?>
                                                        <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group me-2">
                                            <label class="control-label"><?php echo lang('profile_image'); ?></label>
                                            <div class="group_filed">
                                                <div class="img_back_prieview_Academic">
                                                    <div class="images_box_upload_ven_adduser_vendore">
                                                        <div id="image-preview-adduser-vendore">
                                                            <input type="file" name="user_image" id="image-upload-adduser-vendore" />
                                                        </div>
                                                    </div>
                                                    <div id="image-preview-adduser">
                                                        <label for="image-upload-adduser-vendore" id="image-label-adduser-vendore"  class="btn btn-sm btn-primary" style="background:#337ab7;">Upload Logo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ceo_file_error file_error text-danger"></div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" id="submit"  class="btn btn-sm btn-primary" style="background:#337ab7;"><?php echo lang('submit_btn');?></button>
                                        
                                        </div>
                                    </div>
                                </div>

                            </form>

                            </div>
                        </div>
                        
                    </div>

                </div>

                <!-- Add Role Modal (Similar to User) -->

                <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addRoleModalLabel">Create Role & Permission</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                    
                                <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('users/roles_add') ?>" enctype="multipart/form-data">
                                    
                                    <div class="modal-body">
                                    
                                        <div class="alert alert-danger" id="error-box" style="display: none"></div>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><?php echo lang('role_name');?></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="role_name" id="role_name" placeholder="<?php echo lang('role_name');?>" />
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><?php echo lang('description');?></label>
                                                        <div class="col-md-9">
                                                            <textarea type="text" class="form-control" name="description" id="description" placeholder="<?php echo lang('description');?>"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="space-22"></div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success ms-2">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        </div>

        

    <!-- END Datatables Content -->
    </div>
<!-- END Page Content -->
<div id="form-modal-box"></div>

<div id="form-modal-box-user"></div>

<!-- <input type="hidden" id="UserStatus" value="<?php echo $status;?>" /> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        // Initialize DataTables for both User and Role & Permission tables
        $(document).ready(function () {
            $('#userTable').DataTable();
            $('#roleTable').DataTable();
        });
    </script>

<script type="text/javascript">
    function selectAll(menuName) {
        // Get the state of the "View All Records" checkbox
        var isChecked = event.target.checked; // Use 'event.target' to get the checkbox that triggered the event

        // Select all checkboxes with the class corresponding to the menu name
        var checkboxes = document.querySelectorAll('.role-checkbox.' + menuName);

        // Iterate over the checkboxes and set their checked property
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = isChecked; // Set the checkbox state based on "View All Records"
        });
    }
</script>

<script type="text/javascript">
    $(document).on('change', '#role_id', function() {
        var role = $("#role_id").val(); 
        
        $.ajax({
            url: '<?php echo base_url(); ?>users/menu_settings_onchange',  // Ensure URL is correct
            data: { 'role': role }, 
            type: 'POST',
            dataType: 'json', // Expecting JSON response from the server
            success: function(data) {
                // Uncheck all checkboxes initially
                $(".servicecheck").prop('checked', false);

                $(".servicecheckviewall").prop('checked', false);
                $(".servicecheckView").prop('checked', false);
                $(".servicecheckCreate").prop('checked', false);
                $(".servicecheckDelete").prop('checked', false);
                $(".servicecheckUpdate").prop('checked', false);
                
                // Check if data is returned and in the correct format
                if (Array.isArray(data)) {
                    
                    $.each(data, function(i, val) {
                        var svalue = val.menu_id; // Assuming 'menu_id' is in the returned JSON
                        var menu_key = val.menu_key; // Assuming 'menu_id' is in the returned JSON
                       

                        // Ensure that 'menu_id' (svalue) is not empty before proceeding

                        if (svalue) {

                        var view = val.menu_view;
                        var create = val.menu_create;
                        var update = val.menu_update;
                        var deletevalue = val.menu_delete;
                        
                        var myCheckbox = "#" + svalue; 
                        


                            // Check if the checkbox with this ID exists, then set it to checked
                            if ($(myCheckbox).length) {

                                $(myCheckbox).prop('checked', true); 	
                            
                                var myview = "#" + view;
                                var mycreate = "#" + create;
                                var myupdate = "#" + update;
                                var mydelete = "#" + deletevalue;
                                

                                    if (view && $(myview).length) {
                                        $('.servicecheckView'+menu_key).prop('checked', true);  // Set checked to true if condition is met
                                    } else {
                                        $('.servicecheckView'+menu_key).prop('checked', false); // Otherwise, set it to false
                                    }

                                    if (create && $(mycreate).length) {
                                        $('.servicecheckCreate'+menu_key).prop('checked', true);  // Set checked to true if condition is met
                                    } else {
                                        $('.servicecheckCreate'+menu_key).prop('checked', false); // Otherwise, set it to false
                                    }

                                    if (update && $(myupdate).length) {
                                        $('.servicecheckUpdate'+menu_key).prop('checked', true);  // Set checked to true if condition is met
                                    } else {
                                        $('.servicecheckUpdate'+menu_key).prop('checked', false); // Otherwise, set it to false
                                    }

                                    if (deletevalue && $(mydelete).length) {
                                        $('.servicecheckDelete'+menu_key).prop('checked', true);  // Set checked to true if condition is met
                                    } else {
                                        $('.servicecheckDelete'+menu_key).prop('checked', false); // Otherwise, set it to false
                                    }



                        } else {
                            $(".servicecheckviewall").prop('checked', false);
                            $(".servicecheckView").prop('checked', false);
                            $(".servicecheckCreate").prop('checked', false);
                            $(".servicecheckDelete").prop('checked', false);
                            $(".servicecheckUpdate").prop('checked', false);
                                console.log("Checkbox not found for ID: " + myCheckbox);
                            }

                        } else {
                            console.log("menu_id is empty or invalid for this entry.");
                        }
                    });
                } else {
                    console.error('Unexpected data format', data);  // Error if data is not an array
                }
            },
            error: function(xhr, status, error) {
                alert("An error occurred: " + error); // Notify user of error
                console.log("Status: " + status);      // Log the error status
                console.log("Error: " + error);        // Log the error details
                console.log(xhr.responseText);         // Log the server response for debugging
            }
        });
    });
</script>