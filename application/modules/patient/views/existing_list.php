<!-- Page content -->

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>



 

<style>

.btn {
    margin: 1px 0;
    background-color: #b9adad;
}

.modal_popup{
    display: none;
}

.form-group {
    margin-bottom: 10px;
}


.modal-body1 {
    padding: 0px 15px;
}
.sendmail{
    float: right;
    margin: -41px 0;
}

.mailmodel{
    margin-left:-15px;
    margin-right:-15px;
}

@media only screen and (min-width: 668px) and (max-width: 1600px) {
        .sendmail{
            margin-top: -17px;
                 }  
    }

    @media only screen and (max-width: 600px) {
        .sendmail{
            margin-top: -32px;
                 }  
       
        }


        .card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    /* margin-bottom: 30px; */
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
}
.l-bg-cherry {
    background: linear-gradient(to right, #337a, #337a) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #337a, #337a) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #337a, #337a) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #337a, #337a) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    /* text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: -5px;
    top: 20px;
    opacity: 0.1; */
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}
</style>

<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url($parent); ?>"><?php echo $title; ?></a>
        </li>
    </ul>
   
    <?php if ($this->ion_auth->is_admin() or $this->ion_auth->is_subAdmin() or $this->ion_auth->is_user() or $this->ion_auth->is_facilityManager()) { ?>
        <div class="block full">
            <div class="row text-center">
                <div class="col-sm-6 col-lg-12">
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="panel panel-default">
                        <div >
                            
                            <ul class="nav nav-pills nav-fill nav-tabss mt-4" id="pills-tab" role="tablist" >
                                <li class="nav-item">
                                <a href="<?php echo site_url('patient'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "patient") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide text-dark">Patient</span></a>
                                    <!-- <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab">Practice Contacts</a> -->
                                </li>
                                <li class="nav-item">
                                
                                <a href="<?php echo base_url() . 'index.php/patient/summary?id=' . encoding($results->id); ?>" data-toggle="tooltip"><span class="sidebar-nav-mini-hide text-dark">Summary</span></a>

                                </li>
                                <!-- <li class="nav-item">
                                <a href="<?php echo site_url('patient/consultationTemplates'); ?>" class=" <?php echo (strtolower($this->router->fetch_class()) == "consultationTemplates") ? "active" : "" ?>"><span class="sidebar-nav-mini-hide text-dark">Consultation Templates</span></a>
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab"></a>
                                </li> -->
                                <li class="nav-item">
                                <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($results->id); ?>"data-toggle="tooltip"><span class="sidebar-nav-mini-hide text-dark"> Consultation Templates</span></a>
                                    <!-- <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab"></a> -->
                                </li>
                                <li class="nav-item">
                                
                                <a href="<?php echo base_url() . 'index.php/patient/communication?id=' . encoding($results->id); ?>" data-toggle="tooltip"><span class="sidebar-nav-mini-hide text-dark">Communication</span></a>
                                </li>
                                
                            </ul>
                        </div> 

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="=" crossorigin="anonymous" />
                <div class="m-4">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="card l-bg-cherry">
                                <div class="card-statistic-3 m-4">
                            
                                    <div class="card-icon card-icon-large"><i class="fas fa-tint" style="font-size:3em;"></i></div> <!-- Using fa-tint icon -->
<div class="mb-4">
    <h4 class="card-title mb-0">Blood Group</h4>
    <h4 class="text-center fw-bold m-2">A+</h4>
</div>

                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-lg-3">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 m-4">
                <div class="card-icon card-icon-large"><i class="fas fa-heartbeat" style="font-size:3em;"></i></div> <!-- Using fa-heartbeat icon -->
<div class="mb-4">
    <h4 class="card-title mb-0">Blood Pressure</h4>
    <h4 class="text-center fw-bold m-2">120/80</h4>
</div>


                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-lg-3">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 m-4">
                <div class="card-icon card-icon-large"><i class="fas fa-heartbeat" style="font-size:3em;"></i></div> <!-- Using fa-heartbeat icon -->
<div class="mb-4">
    <h4 class="card-title mb-0">Hert rate</h4>
    <h4 class="text-center fw-bold m-2">120/80</h4>
</div>

                </div>
            </div>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 m-4">
                <div class="card-icon card-icon-large"><i class="fas fa-thermometer-half" style="font-size:3em;"></i></div> <!-- Using fa-thermometer-half icon -->
<div class="mb-4">
    <h4 class="card-title mb-0">Temperature</h4>
    <h4 class="text-center fw-bold m-2">98.6°F</h4> <!-- Example temperature value in Fahrenheit -->
</div>

            </div>
        </div>
    </div>
</div>




                            
                            <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong><?php echo $title; ?></strong> Panel</h2>

            <h2><a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-primary">
                    <i class="gi gi-circle_plus"></i> <?php echo $title; ?>
                </a></h2>

        </div>

        <div class="table-responsive">
            <table id="common_datatable_menucat"  class="table table-vcenter table-condensed table-bordered text-center">
                <thead>
                <tr class="text-xs" >

                        <th style="width:10px ;font-size: 1.3rem; !important"  style="">Sr. No</th>
                        <th  style="font-size: 1.3rem; !important" >Date Of Start ABX</th>
                        <th  style="font-size: 1.3rem; !important">Patient ID</th>
                        <th style="font-size: 1.3rem; !important">Care Unit</th>
                        <th style="font-size: 1.3rem; !important">Provider MD</th>
                        <th style="font-size: 1.3rem; !important">Diagnosis</th>
                        <th style="font-size: 1.3rem; !important" >Room Number</th>
                        <th style="font-size: 1.3rem; !important">Infection Onset</th>
                        <th style="font-size: 1.3rem; !important">Total Days</th>
                        <th style="font-size: 1.3rem; !important">Culture Source</th>
                        <th style="font-size: 1.3rem; !important">Organism</th>
                        <th style="font-size: 1.3rem; !important">Antibiotic Name</th>
                        <th style="font-size: 1.3rem; !important">MD Steward</th>
                        <th style="font-size: 1.4rem; !important"><?php echo lang('action'); ?></th>
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
                                <td><?php echo $rowCount; ?></td> 
                                <td><?php echo date('m/d/Y',strtotime($rows->date_of_start_abx)); ?></td>           
                                <td><?php echo $rows->pid; ?></td>
                                <td><?php echo $rows->care_unit_name; ?></td>
                                <td><?php echo $rows->doctor_name; ?></td>
                                <td><?php echo $rows->initial_dx_name; ?></td> 
                                <td><?php echo $rows->room_number; ?></td>   
                                <?php  if($rows->symptom_onset == 'Facility')  { ?>
                                            <td><?php echo 'Facility/HAI'; ?></td> 
                                            <?php } else if ($rows->symptom_onset == 'Hospital'){ ?>
                                            <td><?php echo 'Hospital/CAI'; ?></td>  
                                            <?php }else  { ?> 
                                            <td><?php echo 'NULL'; ?></td>  
                                            <?php } ?>  

                                            <td><?php echo $rows->initial_dot; ?></td>  

                                            <?php  if(!empty($rows->culture_source_name))  { ?>
                                                <td><?php echo $rows->culture_source_name; ?></td>
                                            <?php }else  { ?> 
                                            <td><?php echo 'NULL'; ?></td>  
                                            <?php } ?>    
                                            
                                            <?php  if(!empty($rows->organism_name))  { ?>
                                                <td><?php echo $rows->organism_name; ?></td>
                                            <?php }else  { ?> 
                                            <td><?php echo 'NULL'; ?></td>  
                                            <?php } ?>
                                <td><?php echo $rows->initial_rx_name; ?></td>
                                <td><?php echo ucfirst($rows->md_stayward); ?></td>
                                <td class="actions">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-warning" onclick="editFn('patient', 'edit_patient', '<?php echo encoding($rows->patient_id) ?>', 'patient');"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url() . 'index.php/patient/edit?id=' . encoding($rows->patient_id); ?>" data-toggle="tooltip" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
        <!--                                    <a href="<?php echo base_url() . 'patient/edit_parient?id=' . encoding($rows->patient_id); ?>" data-toggle="tooltip" class="btn btn-default" target="_blank"><i class="fa fa-pencil"></i></a>-->
                                    <a href="javascript:void(0)" onclick="deletePatient('<?php echo $rows->patient_id; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
<!--                                       <a href="<?php echo base_url() . 'patient/existing_list/' . $rows->pid; ?>" target='_blank' data-toggle="tooltip" class="btn btn-default">View List</a>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<div id="form-modal-box"></div>
</div>

<style>
/* width */
::-webkit-scrollbar {
  /* width: 10px; */
  display: none;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>