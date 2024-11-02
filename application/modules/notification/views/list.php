<style>
    .select2-container,
    .select2-drop,
    .select2-search,
    .select2-search input {
        width: 100% !important; /* Adjust width as needed */
    }

    /* Additional CSS for responsiveness */
    @media (max-width: 768px) {
        .page-heading h2 {
            font-size: 20px; /* Adjust font size for smaller screens */
        }
    }
</style>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($headline)) ? ucwords($headline) : "" ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url('pwfpanel'); ?>"><?php echo lang('home'); ?></a>
            </li>
            <li>
                <a href="<?php echo site_url('notification'); ?>"><?php echo "Notification"; ?></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <?php
                        $message = $this->session->flashdata('success');
                        if (!empty($message)): ?>
                            <div class="col-md-12">
                                <div class="alert alert-success"><?php echo $message; ?></div>
                            </div>
                        <?php endif; ?>
                        <?php
                        $error = $this->session->flashdata('error');
                        if (!empty($error)): ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            </div>
                        <?php endif; ?>
                        <div id="message"></div>
                        <div class="col-sm-12">
                            <div class="table-responsive m-4">
                                <table id="not" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="font-size:14px;">S. No.</th>
                                            <th class="text-center" style="font-size:14px;">User</th>
                                            <th class="text-center" style="font-size:14px;">Message</th>
                                            <th class="text-center" style="font-size:14px;">Date</th>
                                            <th class="text-center" style="font-size:14px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($notifications as $notification) : ?>
                                            <tr>
                                                <td><?= $notification->id ?></td>
                                                <td><?= $notification->patient ?></td>
                                                <td><?= $notification->message ?></td>
                                                <td><?= $notification->date ?></td>
                                                <td><!-- Add action buttons here --></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
