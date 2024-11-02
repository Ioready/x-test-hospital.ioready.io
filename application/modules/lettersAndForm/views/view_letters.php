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

<style>
    .save-btn{
    font-weight:700;
    font-size: 1.5rem;
    padding: 0.6rem 2.25rem;
    background:#337ab7;
}
.save-btn:hover{
    /* background-color:#00008B !important; */
    background:#00008B !important;
}

.lettersform:hover {
  background-color: #def1f3;
}

.nav-link{
    color: black!important;
    font-weight: 900!important;
}
.nav-pills .nav-link.active{
    background-color:white!important;
}
.no-border {
    border-left: none!important;
    border-right: none!important;
}
.letter-type{
    background-color: antiquewhite;
    padding: 11px;
    /* margin-top: 12px; */
    padding-top: initial;
}
</style>
<div id="page-content">
<div class="block_list full">
    <div class="row text-center">

        <div class="col-sm-6 col-md-2 mb-4">
            <a href="<?php echo base_url() . 'index.php/patient/summary?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 10px; ">
                <div class="widget-extra themed-background-dark"   style="background:#337ab7;">
                    <h4 style="font-size:14px; font-weight:600; color:white;">Summery</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen fw-bold"><?php echo $active;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4">
            <a href="<?php echo base_url(). 'index.php/patient/consultationTemplates?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Consultation</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url().'index.php/Medications?id=' . encoding($patient_id);?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Medications</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4">
        <a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                    <h4 style="font-size:16px; font-weight:600; color:white;">Letters and forms</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patientPrescription?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Prescriptions</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'labs?id=' . encoding($patient_id);?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Labs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/patient/consultationInvoice?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Invoices</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <!-- <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url(). 'index.php/accountStatement?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                    <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Account statements</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div> -->
                
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patient/communication?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Communication</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patientDocuments?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Documents</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4">
                <a href="<?php echo base_url() . 'index.php/patient/patientLogs?id=' . encoding($patient_id); ?>" class="widget widget-hover-effect2 rounded" style="border-radius: 20px;;">
                        <div class="widget-extra themed-background" style="background-color:#337ab7; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);">
                            <h4 style="font-size:16px; font-weight:600; color:white;">Logs</h4>
                        </div>
                        <div class="widget-extra-full"><span class="h2 animation-expandOpen fw-bold text-dark"><?php echo $inactive;?></span></div>
                    </a>
                </div>
                
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="=" crossorigin="anonymous" />
      
    </div>

            <!-- </div> -->

    <!-- Datatables Content -->
    <div class="block full">

<div class="block-title ">

    <!-- <ul class="nav nav-pills nav-fill nav-tabss" id="pills-tab" role="tablist" style="width: fit-content;">
       
        <a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($patient_id); ?>"  style="color: black;padding: 9px;font-weight: 900;background-color: ghostwhite;"> Back to Letters
        </a>
        
    </ul> -->

</div>


<div class="">
    
    <?php if ($this->ion_auth->is_facilityManager()) { ?>
        <div class="row">
        <div class="col-sm-8 col-md-8">
        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
        <h3><strong> Letters</strong></h3>
            <!-- <a href="javascript:void(0)"  onclick="open_modal('<?php echo $model; ?>')" class="btn btn-sm btn-secondary save-btn nav-tab-appointment tab-pane-second active" id="letters_id" style="background-color:#337ab7;">
                <?php //echo "New letter"; ?> 
            </a> -->


            <!-- <button type="button" data-toggle="modal" data-target="#sidebar-right" class="btn btn-primary navbar-btn pull-left btn btn-sm btn-secondary save-btn tab-pane-second" id="forms_id" style="display:none; background-color:#337ab7;">New forms</button> -->
    </div>
            <!-- <div class="col-sm-4 col-md-4"> -->
            <!-- <button style="background-color: white;border-radius: 6px;padding-left: 22px;padding-right: 22px;">All</button>
            <button style="background-color: white;border-radius: 6px;padding-left: 12px;padding-right: 12px;">Created Date</button>
            <button style="background-color: white;border-radius: 6px;padding-left: 12px;padding-right: 12px;">
            <span>
            <i class="fa fa-light fa-border-all"></i></span>
            </button>
            </div>
            </div> -->
    <?php } ?>
</div>
    <br><br>
<div class="show-grid">
  <div class="row">
    <div class="col-sm-6" style="border-right:none;"><a href="<?php echo base_url(). 'index.php/lettersAndForm?id=' . encoding($patient_id); ?>">
    <span for="" class="text-success"><strong> < Letters </strong></span> </a></div>
    <div class="col-sm-1 no-border" style="width: auto;"> <?php if($result->type == 'Completed'){ ?>

                <button type="button" class="btn" style="background-color: lightgreen;"><b><?php echo $result->type;?></b></button>
            <?php }else if($result->type == 'Awaiting Review'){?>
                <button type="button" class="btn" style="background-color: azure;"><b><?php echo $result->type;?></b></button>
            <?php }else if($result->type == 'Awaiting Correction'){?>
                <button type="button" class="btn" style="background-color: antiquewhite;"><b><?php echo $result->type;?></b></button>

            <?php }else {?>
                <button type="button" class="btn" style="background-color: coral;"><b><?php echo $result->type;?></b></button>
            <?php }?>
    </div>&nbsp;

    <div class="col-sm-1 no-border"><button for="" type="button" class="btn btn-outline-success"><b><i class="fas fa-solid fa-share"></i> Share</b></button></div>
    <div class="col-sm-1 no-border"><button type="button" class="btn btn-default"><b><i class="fas fa-regular fa-envelope"></i> Email</b></button></div>
    <div class="col-sm-1 no-border"><button type="button" class="btn btn-outline-success"><b><i class="fas fa-solid fa-print"></i> Print</b></button></div>
    <div class="col-sm-1 no-border"><button type="button" class="btn btn-outline-success"> <b><i class="fas fa-edit"></i> Edit</b></button></div>
    <!-- <div class="col-sm-1 no-border"><span>...</span></div> -->
    
  </div>

    <div class="row">
        <div class="col-sm-10"><label for=""><?php echo $result->template_id;?></label></div>
            <div class="col-sm-2">
                <select name="status" id="statusDropdown" class="form-control" onchange="updateStatus('<?php echo $result->id; ?>')">
                    <option value="None" <?php echo ($result->type == 'None') ? 'selected' : ''; ?>>None</option>
                    <option value="Awaiting Review" <?php echo ($result->type == 'Awaiting Review') ? 'selected' : ''; ?>>Awaiting Review</option>
                    <option value="Awaiting Correction" <?php echo ($result->type == 'Awaiting Correction') ? 'selected' : ''; ?>>Awaiting Correction</option>
                    <option value="Completed" <?php echo ($result->type == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="show-grid">
  
  <div class="row">
    <div class="col-sm-10"><label for="">Page:</label><select name="" id=""><option value="1">1</option></select> <label for="">Of 2</label></div>
    <div class="col-sm-2"><label for="">Zoom</label> <button type="button" class="btn btn-success" style="background-color: darkcyan;">+</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" style="background-color: darkcyan;">-</button></div>
  </div>
  
</div>

    <div class="mt-5">
        
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrlData) ?>" enctype="multipart/form-data">

            <div class="row">
                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id;?>">
                <input type="hidden" name="form_id" id="form_id" value="<?php echo $form_id;?>">
                
                <div class="col-md-12" style="background-color: ghostwhite;">
                    <!-- <label for="letter_body" class="form-label">Letter Body:</label> -->
                    <div style="background-color: white;padding: 98px;"><?php echo $result->details;?></div>
                    <!-- <textarea name="letter_body" id="letter_body" rows="10" class="form-control" placeholder="Write your letter here..."> <?php echo $result->details;?></textarea> -->
                </div>


            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
   
<!-- </div>
</div> -->

<script>
function updateStatus(id) {
    var status = document.getElementById('statusDropdown').value;
// alert(status);
    // AJAX request to update status
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo base_url("lettersAndForm/updateStatus"); ?>', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest'); // For AJAX detection

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // alert('Status updated successfully');
            window.location.reload();
        }
    };
    
    xhr.send('id=' + id + '&status=' + status);
}
</script>


<script>
    $(document).ready(function() {
  $('#patient_ids').click(function() {
   var patientsdata = $('#patient_id').val();
  
  $('#patient_id_data').val(patientsdata);

  });
});
</script>

<script>
    $(document).ready(function() {
        $(".nav-tabss .nav-link").click(function() {
            $(".nav-tabss .nav-link").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane-second").hide();
            var targetPaneId = $(this).attr("href");
            $(targetPaneId).show();
        });

        $(".nav-tab-appointment .nav-link-second").click(function() {
            $(".nav-tab-appointment .nav-link-second").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane-second").hide();

            var targetPaneId = $(this).data("target");
            $(targetPaneId).show();
        });
    });
    function toggleHidden() {
    var element = document.getElementById("elementToToggle");
    element.classList.add("hidden");
  }
    function toggleDisplay() {
    var element = document.getElementById("elementToToggle");
    element.classList.remove("hidden");
    document.getElementById("autoClickButton").click();
    document.getElementById("autoClickButton").focus();
  }
  window.onload = function() {
    document.getElementById("autoClickButton").click();
    document.getElementById("autoClickButton").focus();
  };
    
</script>

<style>

* {
  box-sizing: border-box;
}
.show-grid {
  padding: 10px;
}

.show-grid .row {
  margin-bottom: 15px;
}

.show-grid [class^=col-] {
    padding-top: 10px;
    padding-bottom: 10px;
    /* background-color: #eee; */
    /* background-color: rgba(86,61,124,.15); */
    border: 1px solid #ddd;
    border: 1px solid rgba(86,61,124,.2);
}



    .btnPrevious,
.btnNext{
	display: inline-block;
	border: 1px solid #444348;
	border-radius: 3px;
	margin: 5px;
	color: #444348;
	font-size: 14px;
	padding: 10px 15px;
	cursor: pointer;
}

.nav-tabss {
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    width: 316px;
    border: 1px solid;
    border-radius: inherit;
}
.nav-tab-appointment{
    margin-bottom: 0;
    list-style: none;
    border-radius: inherit;
    background-color:white;

}
.nav-tab-appointment.active-link{
    margin-bottom: 0;
    list-style: none;
    border-radius: inherit;
    background-color:white;

}

.nav-pills-second{
    background-color:white;
}
.nav-pills-second>li {
    float: left;
}
.nav-pills-second.ul li:active .underline {
	transition: none;
	background-color: red;
}

.nav-link>a.active.underline {
	width: 100%;
	background-color: red;
}


</style>


<style>
       .dots {
    display: inline-block;
    cursor: pointer;
}

.dots div {
    width: 5px;
    height: 5px;
    margin: 2px;
    background-color: black;
    border-radius: 50%;
    display: inline-block;
}

.menu {
    display: none;
    position: absolute;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 10px 0;
}

.menu ul li {
    padding: 8px 20px;
}

.menu ul li a {
    text-decoration: none;
    color: black;
}

.menu ul li a:hover {
    background-color: #f1f1f1;
}

    </style>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    var dotsMenus = document.querySelectorAll('[id^="dotsMenu"]');

    dotsMenus.forEach(function(dotsMenu) {
        dotsMenu.addEventListener("click", function(event) {
            event.stopPropagation();
            var id = this.id.replace('dotsMenu', '');
            var menu = document.getElementById('menuDropdown' + id);

            // Close all other menus
            document.querySelectorAll('.menu').forEach(function(otherMenu) {
                if (otherMenu !== menu) {
                    otherMenu.style.display = 'none';
                }
            });

            // Toggle the current menu
            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener("click", function(event) {
        document.querySelectorAll('.menu').forEach(function(menu) {
            menu.style.display = 'none';
        });
    });
});

</script>


<script>
    $ (document).ready (function () {
	$ (".modal a").not (".dropdown-toggle").on ("click", function () {
		$ (".modal").modal ("hide");
	});
});
</script>

<style>
    .pen body {
	padding-top:50px;
}

/* Social Buttons - Twitter, Facebook, Google Plus */
.btn-twitter {
	background: #00acee;
	color: #fff
}
.btn-twitter:link, .btn-twitter:visited {
	color: #fff
}
.btn-twitter:active, .btn-twitter:hover {
	background: #0087bd;
	color: #fff
}

.btn-instagram {
	color:#fff;
	background-color:#3f729b;
	border-color:rgba(0,0,0,0.2);
}
.btn-instagram:focus,.btn-instagram.focus {
	color:#fff;
	background-color:#305777;
	border-color:rgba(0,0,0,0.2);
}
.btn-instagram:hover {
	color:#fff;
	background-color:#305777;
	border-color:rgba(0,0,0,0.2);
}

.btn-github {
	color:#fff;
	background-color:#444;
	border-color:rgba(0,0,0,0.2);
}
.btn-github:focus,.btn-github.focus {
	color:#fff;
	background-color:#2b2b2b;
	border-color:rgba(0,0,0,0.2);
}
.btn-github:hover {
	color:#fff;
	background-color:#2b2b2b;
	border-color:rgba(0,0,0,0.2);
}

/* MODAL FADE LEFT RIGHT BOTTOM */
.modal.fade:not(.in).left .modal-dialog {
	-webkit-transform: translate3d(-25%, 0, 0);
	transform: translate3d(-25%, 0, 0);
}
.modal.fade:not(.in).right .modal-dialog {
	-webkit-transform: translate3d(25%, 0, 0);
	transform: translate3d(25%, 0, 0);
}
.modal.fade:not(.in).bottom .modal-dialog {
	-webkit-transform: translate3d(0, 25%, 0);
	transform: translate3d(0, 25%, 0);
}

.modal.right .modal-dialog {
	position:absolute;
	top:0;
	right:0;
	margin:0;
}

.modal.left .modal-dialog {
	position:absolute;
	top:0;
	left:0;
	margin:0;
}

.modal.left .modal-dialog.modal-sm {
	max-width:300px;
}

.modal.left .modal-content, .modal.right .modal-content {
	min-height:100vh;
	border:0;
}
</style>
