
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>

<!-- Page content -->
<<<<<<< HEAD
<div id="page-content" class="container" style="background-color:whitesmoke">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('pwfpanel'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>

    <!-- Form Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <h3 class="mb-2"><strong><?php echo $title; ?></strong> Panel</h3>
        </div>
        <div class="card-body">
            <form id="editFormAjaxUser" method="post" action="<?php echo base_url('index.php/facilityManager/update'); ?>" enctype="multipart/form-data">
                <div id="error-box" class="alert alert-danger d-none"></div>

                <div class="mb-3 row">
                    <label for="hospital_name" class="col-md-3 col-form-label">Hospital Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="hospital_name" id="hospital_name" placeholder="Hospital Name" value="<?php echo $results->hospital_name; ?>" required>
=======
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($this->router->fetch_class()); ?>"><strong>Back</strong></a>
        </li>
    </ul>
    <!-- END Datatables Header -->
    <div class="row">
 
        <div class="col-md-12" >    <div class="block full">
                <div class="block-title">
                    <h2><strong><?php echo $title;?></strong> Panel</h2>
                </div>        
                <form class="form-horizontal" role="form" id="editFormAjaxUser" method="post" action="<?php echo base_url('index.php/facilityManager/update') ?>" enctype="multipart/form-data">
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
>>>>>>> f9ec4ca75be17a2af803ff803443840509349bc7
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="first_name" class="col-md-3 col-form-label">First Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $results->first_name; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $results->last_name; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="user_email" class="col-md-3 col-form-label"><?php echo lang('user_email'); ?></label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $results->email; ?>" readonly>
                        <input type="hidden" name="admin_id" value="<?php echo $this->session->userdata('user_id'); ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="current_password" class="col-md-3 col-form-label">Current Password</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="current_password" id="current_password" value="<?php echo $results->is_pass_token; ?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="new_password" class="col-md-3 col-form-label"><?php echo lang('new_password'); ?></label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                    </div>
                </div>

                <!-- Hidden Fields -->
                <input type="hidden" name="id" value="<?php echo $results->id; ?>">
                <input type="hidden" name="password" value="<?php echo $results->password; ?>">
                <input type="hidden" name="exists_image" value="<?php echo $results->profile_pic; ?>">

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">Save Changes</button>
</div>

            </form>
        </div>
    </div>
</div>

<!-- Date Picker Script -->
<script type="text/javascript">
    $(document).ready(function () {
       
        $('#date_of_birth').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        endDate: 'today'
    });
    /*    $("#zipcode").select2({
     allowClear: true
     });*/

        // jQuery Validation for form
        $("#editFormAjaxUser").validate({
            rules: {
                hospital_name: "required",
                first_name: "required",
                last_name: "required",
                new_password: {
                    minlength: 6
                }
            },
            messages: {
                hospital_name: "Please enter the hospital name",
                first_name: "Please enter the first name",
                last_name: "Please enter the last name",
                new_password: {
                    minlength: "Password must be at least 6 characters long"
                }
            },
            errorElement: 'div',
            errorClass: 'text-danger'
        });
    });
</script>

