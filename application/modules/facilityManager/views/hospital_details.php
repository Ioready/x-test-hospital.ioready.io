
    <!-- Page content -->
    <div id="page-content">
        <!--        <div id="msg"></div>-->
        <!-- eShop Overview Block -->
        <div class="block full">
        <?php if ($this->ion_auth->is_superAdmin()) { ?>
                <h2>
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary m-4" style="background:#337ab7;">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            

            <?php }else if ($this->ion_auth->is_admin()) { ?>
                <h2>
                    <a href="<?php echo base_url().'index.php/' . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary m-4" style="background:#337ab7;">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
            <?php }else if($this->ion_auth->is_facilityManager()){ ?>
                    <h2>
                    <a href="<?php echo base_url() . $this->router->fetch_class(); ?>/open_model" class="btn btn-sm btn-primary m-4" style="background:#337ab7;">
                        <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                    </a></h2>
                <?php } ?>
                
            <!-- eShop Overview Title -->
            <div class="block-title">
                <h2><strong>Hospital Dashboard</strong> Overview</h2>
            </div>
            <!-- END eShop Overview Title -->
            <!-- eShop Overview Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                                        <!-- <div class="stat-percent font-bold text-primary"> <i class="fa fa-plus"></i></div> -->
                        
                        <!-- <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                       
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $careUnit; ?></h1>
                                        <h5 class="text-primary"><strong>Total Care Unit</strong></h5>
                                    </div>
                                </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                       
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $initial_dx; ?></h1>
                                        
                                        <h5 class="text-primary"><strong>Total Infections</strong></h5>
                                    </div>
                                </div>
                         </div>

                        <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                       
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo $initial_rx; ?></h1>
                                       
                                        <h5 class="text-primary"><strong>Total Antibiotic</strong></h5>
                                    </div>
                                </div>
                        </div> -->

                    
     <div class="row p-4 m-2">
    <div class="col-md-4 ">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#EDEAFF; box-shadow: 0px 2px 2px rgba(0, 0, 0, 1);border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="no-margins fw-bold"><?php echo $doctors; ?></h1>
                        <h5 class="text-dark"><strong>Total Doctor</strong></h5>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/doctor.png" style="height: 65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#DAEBFF; box-shadow: 0px 2px 2px rgba(0, 0, 0, 1); border-radius:20px">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="no-margins fw-bold"><?php echo $total_patient; ?></h1>
                        <h5 class="text-dark"><strong>Total Patient</strong></h5>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/patient.png" style="height:65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class=" mb-3">
            <div class="card-body p-4" style="background-color:#FFE0B7; box-shadow: 0px 2px 2px rgba(0, 0, 0, 1);border-radius:20px;">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="no-margins fw-bold"><?php echo $total_patient_today; ?></h1>
                        <h5 class="text-dark"><strong>Total Patient Today</strong></h5>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/intravenous-therapy.png" style="height:65px;width:45px;filter: invert(47%) sepia(69%) saturate(959%) hue-rotate(121deg) brightness(98%) contrast(86%);" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  


                        <div class="col-lg-12" style="overflow-x: auto ">
                                    <!-- Datatables Content -->
                                    <div class="block full">
                                        <div class="block-title">
                                            <h2 class="fw-bold"><strong>Hospital</strong> Panel</h2>
                                            
                                        </div>
                                        <div class="table-responsive">
                                            <table id="common_datatable_menucat" class="table table-vcenter table-condensed table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem;">Sr. No</th>
                                                        <th class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem;">Name</th>
                                                        <th class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem;">Address</th>
                                                        <th class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem;">Contact</th>
                                                        <th class="text-center fw-bold" style="background-color:#DBEAFF;font-size:1.3rem"><?php echo lang('action'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Dummy data
                                                    $dummyData = [
                                                        ['name' => 'John Doe', 'address' => '123 Main St', 'contact' => '123-456-7890'],
                                                        ['name' => 'Jane Smith', 'address' => '456 Elm St', 'contact' => '456-789-0123'],
                                                        ['name' => 'Mike Johnson', 'address' => '789 Oak St', 'contact' => '789-012-3456'],
                                                    ];

                                                    foreach ($dummyData as $index => $data):
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $index + 1; ?></td>
                                                            <td class="text-center"><?php echo $data['name']; ?></td>
                                                            <td class="text-center"><?php echo $data['address']; ?></td>
                                                            <td class="text-center"><?php echo $data['contact']; ?></td>
                                                            <td class="actions text-center">
                                                                <div>
                                                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="editFn('<?php echo $model; ?>', 'edit', '<?php echo encoding($index); ?>', '<?php echo $model; ?>');">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-xs btn-default" onclick="viewFn('<?php echo $model; ?>', 'view', '<?php echo encoding($index); ?>', '<?php echo $model; ?>');">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="deleteFn('<?php echo $table; ?>', 'id', '<?php echo encoding($index); ?>', '<?php echo $model; ?>','','<?php echo $data['name']; ?>')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END Datatables Content -->
                                </div>