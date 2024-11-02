<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('userSettings/consultationTemplates');?>">Consultation template</a>
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    
    
 
    
    <div class="block full">
        <div class="block-title">
            <h2><strong>Consultation template</strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="editFormAjaxUser" method="post" action="<?php echo base_url('userSettings/update') ?>" enctype="multipart/form-data">

        <!-- <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('business/vendors_add') ?>" enctype="multipart/form-data"> -->
            <!-- <div class="modal-header">
                <h3 class="modal-title"><strong> Basic Details</strong></h3>
            </div> -->
            <!-- <div class="loaders">
                <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
            </div> -->


            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12" >

                        <div class="form-group">
                           <div class="col-md-4">

                           <div class="col-md-12">
                            <h3>
                            <label class="">General information</label>
                            </h3>
                            <p>
                            The internal name and description are for reference only. They won't display to patients.
                            </p>
                              
                            </div>

                           </div>

                           <div class="col-md-8">
                            <div class="col-md-12">
                            <label class="">Internal name</label>
                                <input type="text" class="form-control" name="internal_name" id="internal_name" value="<?php echo $list->internal_name;?>" placeholder="<?php echo lang('Internal name');?>" />
                            </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $list->id; ?>" />

                    <div id="select_question"></div>

                    <?php if($list->name != null){ ?>


                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <h3><label class=""> Section</label></h3>
                                        <p>The internal name and description are for reference only. They won t display to patients.</p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-12">
                                        <label class="">Name</label>
                                        <input type="text" class="form-control" name="name" id="phone_number" value="<?php echo $list->name;?>" placeholder="<?php echo lang('Name');?>" /><br>
                                        <?php if($list->question != null){ ?>
                                            <div style="font-weight: 600;font-size: large;">
                                            <i class="fa fa-bars"></i> <?php echo $list->question;?><button type="button" class="btn btn-danger" style="float: right;">Delete</button> </div><br>
                                            
                                        <?php }?>
                                        <div style="font-weight: 600;font-size: large;" id="addQuestion"></div><br>

            
                                        <button type="button" style="color:green; background:white; border: 1px solid green; border-radius:5px; padding:5px;" data-toggle="modal" data-target="#myModal"> Add a question</button>
                                    </div>
                                </div>
                            </div>
                                <a class="add-text-field"><button style="color:green; border:none; background: white;"><strong>Duplicate</strong></button></a> 
                                <a class="remove-extend-field"><button style="color:red; border:none; background:white;"><strong>Delete</strong></button></a>
                        </div>

                   <?php }?>
                    <div id="extend-field">
                    
                    <!-- <p id="addQuestion"></p> -->
                    </div>
                    
                    

                    <div class="col-md-12">
                        <br>
                         <button type="button" id="extend">Add Section </button>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit"  class="btn btn-sm btn-primary" id="submit">Save Changes</button>
                </div>
            </div>
        </form>
        
    </div>

    <!-- Modal -->
<!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form id="myForm" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Question.</h4>
                </div>
                <div class="modal-body">
                    <p>Question.</p>
                    <select name="question" id="question" class="form-control">
                    <option value="">Select a question type</option>
                        <option value="Presenting Complaint">Presenting complaint</option>
                        <option value="Problem Heading">Problem heading</option>
                        <option value="Allergy">Allergy</option>
                        <option value="Current Hedication">Current medication</option>
                        <option value="Examination">Examination</option>
                        <option value="Family History">Family history</option>
                        <option value="Medical History">Medical history</option>
                        <option value="Social History">Social history</option>
                        <option value="Prescibe Medication">Prescibe medication</option>
                        <option value="Dispense Products">Dispense products</option>
                        <option value="Diagram">Diagram</option>
                        <option value="" disabled>---------</option>
                        <option value="Custome Question">Custome question</option>


                    </select>
                    <br>
                    <div id="examination" style="display:none">
                            <label for="">Examination Field</label>
                            <input type="text" class="form-control" name="name" id="name">
                            
                        </div>

                        <div id="custome_question" style="display:none">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                            <label for="">Response Type</label>
                            <input type="text" class="form-control" name="response_type">
                        </div>
                        <div id="diagram" style="display:none">
                            <div class="row">
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_f.jpg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_f.jpg" alt="Body 1" width="145px;" style="margin-left: 39px;">
                                    <div>Body 1</div>
                                </div>
                        
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_m.jpg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_m.jpg" alt="Body 2" width="149px;" style="margin-left: 39px;">
                                    <div>Body 2</div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_m.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_m.jpeg" alt="Male" width="195px;" style="margin-left: 39px;">
                                    <div>Male</div>
                                </div>
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_f.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_f.jpeg" alt="Female" width="145px;" style="margin-left: 39px;">
                                    <div>Female</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_b.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_b.jpeg" alt="Boy" width="145px;" style="margin-left: 39px;">
                                        <div>Boy</div>
                                </div>
                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_g.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/body_2_g.jpeg" alt="Girl" width="145px;" style="margin-left: 39px;">
                                    <div>Girl</div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 card" onclick="selectDiagram('https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/hand.jpeg')">
                                    <img src="https://s3.eu-west-2.amazonaws.com/app.heydoc.co.uk-assets/diagrams/hand.jpeg" alt="Hand" width="145px;" style="margin-left: 39px;">
                                    <div>Hand</div>
                                </div>

                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="submit" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Submit</button>
                </div>
            </div>

            </form>
        </div>
    </div>

<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<!-- <script>
    $('#myForm').on('submit', function(event) {
    event.preventDefault();
        var selectQuestion = $('select#question').find(':selected').val();
       
        var dataa =  $( "#addQuestion" ).html('<i class="fa fa-bars"></i> ' + ' '+ selectQuestion + ' '+ '<button type="button" class="btn btn-danger" style="float: right;">Delete</button>');
        var dataa =  $( "#select_question" ).html('<input type="hidden" name="question" id="question" value="'+selectQuestion+'">');

});

</script> -->

<script>

    $('#addQuestion').on('click', '.btn-danger', function() {
        $(this).closest('div').remove(); 
        var valueToRemove = $(this).siblings('input').val(); 
        $('#select_question').find('input[value="' + valueToRemove + '"]').remove();
    });


    $('#myForm').on('submit', function(event) {
        event.preventDefault();
        var selectQuestion = $('select#question').find(':selected').val();

        $("#addQuestion").append('<div style="padding-top: 15px;"><i class="fa fa-bars"></i> ' + selectQuestion + ' <button type="button" class="btn btn-danger" style="float: right;">Delete</button></div>');
        
        $("#select_question").append('<input type="text" name="question[]" value="' + selectQuestion + '">');
    });

    // If you want to handle the change event of the dropdown to add data
    $('select#question').on('submit', function() {
        var selectQuestion = $(this).find(':selected').val();
        
        // Append new data to the existing content
        $("#addQuestion").append('<div style="padding-top: 15px;"><i class="fa fa-bars"></i> ' + selectQuestion + ' <button type="button" class="btn btn-danger" style="float: right;">Delete</button></div>');
        
        // Add a hidden input field with the selected value
        $("#select_question").append('<input type="text" name="question[]" value="' + selectQuestion + '">');
    });
</script>

<script>
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>


<script>
function selectDiagram(diagramName) {
    // Assuming you want to post the selected diagram name to the server

    alert(diagramName);
    
    $.ajax({
        type: "POST",
        url: "your_server_url_here",
        data: { diagram: diagramName },
        success: function(response) {
            // Handle response from the server
            console.log("Response from server:", response);
            // You can update the UI or do something else with the response here
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error("Error:", error);
        }
    });
}
</script>


<script>
    $('#question').on('change', function() {
  $('#custome_question').css('display', 'none');
  if ( $(this).val() === 'Custome Question' ) {
    $('#custome_question').css('display', 'block');
  }

  $('#diagram').css('display', 'none');
  if ( $(this).val() === 'Diagram' ) {
    $('#diagram').css('display', 'block');
  }

  $('#examination').css('display', 'none');
  if ( $(this).val() === 'Examination' ) {
    $('#examination').css('display', 'block');
  }
  
});

</script>
<script type="text/javascript">
    $('#date_of_birth').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        endDate:'today'       
    });
/*    $("#zipcode").select2({
        allowClear: true
    });*/
</script>



<script>
    $(document).ready(function(){
	
	$("#extend").click(function(e){
		e.preventDefault();
		$("#extend-field").append('<div class="col-md-12"><div class="form-group"><div class="col-md-4"><div class="col-md-12"><h3><label class=""> Section</label></h3><p>The internal name and description are for reference only. They won t display to patients.</p></div></div><div class="col-md-8"><div class="col-md-12"><label class="">Name</label><input type="text" class="form-control" name="name" id="phone_number" placeholder="<?php echo lang('Name');?>" /><br><div style="font-weight: 600;font-size: large;" id="addQuestion"><i class="fa fa-bars"></i> <?php echo $list->question;?><button type="button" class="btn btn-danger" style="float: right;">Delete</button> </div><br><button type="button" style="color:green; background:white; border: 1px solid green; border-radius:5px; padding:5px;" data-toggle="modal" data-target="#myModal"> Add a question</button></div></div></div> <a class="add-text-field"><button style="color:green; border:none; background: white;"><strong>Duplicate</strong></button></a> <a class="remove-extend-field"><button style="color:red; border:none; background:white;"><strong>Delete</strong></button></a></div>');
	});

	
	$("#extend-field").on("click",".add-text-field",function(e){
		e.preventDefault();
		$("#extend-field").append('<div class="col-md-12"><div class="form-group"><div class="col-md-4"><div class="col-md-12"><h3><label class=""> Section</label></h3><p>The internal name and description are for reference only. They won t display to patients.</p></div></div><div class="col-md-8"><div class="col-md-12"><label class="">Name</label><input type="text" class="form-control" name="name" id="phone_number" placeholder="<?php echo lang('Name');?>" /><br><div style="font-weight: 600;font-size: large;" id="addQuestion"><i class="fa fa-bars"></i> <?php echo $list->question;?><button type="button" class="btn btn-danger" style="float: right;">Delete</button> </div><br><button type="button" style="color:green; background:white; border: 1px solid green; border-radius:5px; padding:5px;" data-toggle="modal" data-target="#myModal"> Add a question</button></div></div></div><a class="add-text-field"><button style="color:green; border:none; background:white;"><strong>Duplicate</strong></button></a><a class="remove-extend-field"><button style="color:red; border:none; background:white;"><strong>Delete</strong></button></a></div>')
		

	});

	$("#extend-field").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});
});

</script>

<script>
    $(document).on("click","#cust_btn",function(){
  
  $("#myModal").modal("toggle");
  
})
</script>

<script>
    window.onload = function () {
    const pieces = document.getElementsByTagName('svg');
    for (var i = 0; pieces.length; i++) {
        let _piece = pieces[i];
        _piece.onclick = function(t) {
            if (t.target.getAttribute('data-position') != null) document.getElementById('data').innerHTML = t.target.getAttribute('data-position');
            if (t.target.parentElement.getAttribute('data-position') != null) document.getElementById('data').innerHTML = t.target.parentElement.getAttribute('data-position');
        }
    }
}
</script>
<style>
    .human-body {
    width: 207px;
    position: relative;
    padding-top: 146px;
    /* height: 260px; */
    display: block;
    margin: 0px auto;
}
.human-body svg:hover {
    cursor: pointer;
}
.human-body svg:hover path {
    fill: #ff7d16;
}
.human-body svg {
    position: absolute;
    left: 50%;
    fill: #57c9d5;
}

.human-body svg.head {
    margin-left: -25.5px;
    top: -5px;
}
.human-body svg.shoulder {
    margin-left: -42.5px;
    top: 26px;
}


.human-body svg.arm {
    margin-left: -71px;
    top: 40px;
}

.human-body svg.cheast {
    margin-left: -32.5px;
    top: 31px;
}


.human-body svg.stomach {
    margin-left: -27.5px;
    top: 40px;
}

.human-body svg.legs {
    margin-left: -32.5px;
    top: 61px;
    z-index: 9999;
}

.human-body svg.hands {
    margin-left: -51.5px;
    top: 77px;
}

#area {
    display: block;
    width: 50%;
    clear: both;
    padding: 0px;
    text-align: center;
    font-size: 13px;
    font-family: Courier New;
    color: #a5a5a5;
}

#area #data {
    color: black;
}
</style>

<script>
// Changes class name on div to switch between colours

const card = document.getElementById('card-click');

card.addEventListener('click', function() {
  card.classList.toggle('card-toggled');
})


</script>

<style>
    .card {
  /* height:120px; */
  /* width:320px; */
  /* background-color: #fff; */
  border: 1px solid #30336b;
  /* transition: 0.75s; */
}

/* .card-toggled {
  border: 2px solid #6ab04c;
  transition: 0.75s;
} */
</style>