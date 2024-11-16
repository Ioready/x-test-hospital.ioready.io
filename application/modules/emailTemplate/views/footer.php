<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <ul class="breadcrumb breadcrumb-top">
        <li>
            <a href="<?php echo site_url('pwfpanel');?>">Home</a>
        </li>
        <li>
		<a href="<?php echo site_url('emailTemplate/letterTemplate');?>"><strong>Back</strong></a>
         
        </li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    
    
 
    
    <div class="block full">
        <div class="block-title">
            <h2><strong>Footer</strong> Panel</h2>
        </div>
        <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">

        <!-- <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url('business/vendors_add') ?>" enctype="multipart/form-data"> -->
            <!-- <div class="modal-header">
                <h3 class="modal-title"><strong> Header</strong></h3>
            </div> -->
            <!-- <div class="loaders">
                <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
            </div> -->
            <div class="alert alert-danger" id="error-box" style="display: none"></div>
            <div class="form-body">
                <div class="row">


				<div class="col-md-12" >

                    
					<div class="form-group">
						<div class="col-md-2"></div>

						<div class="col-md-10">
							<div class="col-md-12">
							<label class="">Select Recipients*</label><br>
							<select name="recipient_id" id="recipient_id" class="form-control">
                                <option value="">Select Recipients</option>
                                <?php 
                                foreach($recipient_list as $row){ ?>
                                     <option value="<?php echo $row->id?>"><?php echo $row->internal_name?></option>

                               <?php }
                                ?>
                            </select>
							</div>
							<!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span> -->
							
							
						</div>

					</div>
					</div>

                    <div class="col-md-12" >

                    
                        <div class="form-group">
                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                            <div class="col-md-12">
                            <label class="">Internal name*</label><br>
                            <span>This is used for internal reference and won't be seen by patients.</span>
                                <input type="text" class="form-control" name="internal_name" id="internal_name" placeholder="<?php echo lang('first_name');?>" />
                            </div>
                            <!-- <span class="help-block m-b-none col-md-offset-3"><i class="fa fa-arrow-circle-o-up"></i> <?php echo lang('english_note');?></span> -->
                            
                            
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10" style="padding-left: 32px;">
                                
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="footer_booked" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            Set this as the primary footer and select it by default
                            </label>
                            </div>
                            
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >
                        <div class="form-group">
                            <div class="col-md-2">

                            </div>

                             <div class="col-md-10">
                                <div class="col-md-12">
                                    <label class="">Upload your footer * </label><br>
                                    <span>Make sure the image size is below 2MB and the image format is PNG or JPG/JPEG.</span>

                                    <!-- CHANGE THE ACTION TO THE PHP SCRIPT THAT WILL PROCESS THE FILE VIA AJAX -->

                                        <input id="file-upload" type="file" name="image" accept="image/jpg,image/gif, image/jpeg, image/png"/>
                                        <label for="file-upload" id="file-drag">
                                            <!-- Select a file to upload
                                            <br />OR
                                            <br />Drag a file into this box -->
                                            
                                            <br /><br /><span id="file-upload-btn" class="button">Browse files</span>
                                        </label>
                                        
                                        <progress id="file-progress" value="0">
                                            <span>0</span>%
                                        </progress>
                                        
                                        <output for="file-upload" id="messages"></output>




                                    <!-- <input type="file" class="form-control" id="comment" name="comment" rows="3"> -->
                                </div>
                            
                            </div>
                        </div>
                    </div>


                 

            </div>
            <div class="text-right">
                <button type="submit" id="submit" class="btn btn-sm btn-primary" >Save</button>
            </div>
        </form>
        
    </div>
<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
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
<style>
    body {
	font-family : sans-serif;
}

.button {
	background      : #005f95;
	border          : none;
	border-radius   : 3px;
	color           : white;
	display         : inline-block;
	font-size       : 19px;
	font-weight     : bolder;
	letter-spacing  : 0.02em;
	padding         : 10px 20px;
	text-align      : center;
	text-shadow     : 0px 1px 2px rgba(0, 0, 0, 0.75);
	text-decoration : none;
	text-transform  : uppercase;
	transition      : all 0.2s;
}

.btn:hover {
	background : #4499c9;
}

.btn:active {
	background : #49ADE5;
}

input[type="file"] {
	display : none;
}

#file-drag {
	border        : 2px dashed #555;
	border-radius : 7px;
	color         : #555;
	cursor        : pointer;
	display       : block;
	font-weight   : bold;
	margin        : 1em 0;
	padding       : 3em;
	text-align    : center;
	transition    : background 0.3s, color #ddd;
    background : #ddd;
}

#file-drag:hover {
	background : #ddd;
}

#file-drag:hover,
#file-drag.hover {
	border-color : #3070A5;
	border-style : solid;
	box-shadow   : inset 0 3px 4px #888;
	color        : #3070A5;
}

#file-progress {
	display : none;
	margin  : 1em auto;
	width   : 100%;
}

#file-upload-btn {
	margin : auto;
}

#file-upload-btn:hover {
	background : #4499c9;
}

#file-upload-form {
	margin : auto;	
	width  : 40%;
}

progress {
	appearance    : none;
	background    : #eee;
	border        : none;
	border-radius : 3px;
	box-shadow    : 0 2px 5px rgba(0, 0, 0, 0.25) inset;
	height        : 30px;
}

progress[value]::-webkit-progress-value {
	background :
		-webkit-linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		-webkit-linear-gradient(right,
			#005f95,
			#07294d);
	background :
		linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		linear-gradient(right,
			#005f95,
			#07294d);
	background-size : 60px 30px, 100% 100%, 100% 100%;
	border-radius   : 3px;
}

progress[value]::-moz-progress-bar {
	background :
	-moz-linear-gradient(-45deg, 
		transparent 33%,
		rgba(0, 0, 0, .2) 33%, 
		rgba(0,0, 0, .2) 66%,
		transparent 66%),
	-moz-linear-gradient(right,
		#005f95,
		#07294d);
	background :
		linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		linear-gradient(right,
			#005f95,
			#07294d);
	background-size : 60px 30px, 100% 100%, 100% 100%;
	border-radius   : 3px;
}

ul {
	list-style-type : none;
	margin          : 0;
	padding         : 0;
}
</style>

<script>
    (function() {
	function Init() {
		var fileSelect = document.getElementById('file-upload'),
			fileDrag = document.getElementById('file-drag'),
			submitButton = document.getElementById('submit-button');

		fileSelect.addEventListener('change', fileSelectHandler, false);

		// Is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) 
		{
			// File Drop
			fileDrag.addEventListener('dragover', fileDragHover, false);
			fileDrag.addEventListener('dragleave', fileDragHover, false);
			fileDrag.addEventListener('drop', fileSelectHandler, false);
		}
	}

	function fileDragHover(e) {
		var fileDrag = document.getElementById('file-drag');

		e.stopPropagation();
		e.preventDefault();
		
		fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
	}

	function fileSelectHandler(e) {
		// Fetch FileList object
		var files = e.target.files || e.dataTransfer.files;

		// Cancel event and hover styling
		fileDragHover(e);

		// Process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			parseFile(f);
			uploadFile(f);
		}
	}

	function output(msg) {
		var m = document.getElementById('messages');
		m.innerHTML = msg;
	}

	function parseFile(file) {
		output(
			'<ul>'
			+	'<li>Name: <strong>' + encodeURI(file.name) + '</strong></li>'
			+	'<li>Type: <strong>' + file.type + '</strong></li>'
			+	'<li>Size: <strong>' + (file.size / (1024 * 1024)).toFixed(2) + ' MB</strong></li>'
			+ '</ul>'
		);
	}

	function setProgressMaxValue(e) {
		var pBar = document.getElementById('file-progress');

		if (e.lengthComputable) {
			pBar.max = e.total;
		}
	}

	function updateFileProgress(e) {
		var pBar = document.getElementById('file-progress');

		if (e.lengthComputable) {
			pBar.value = e.loaded;
		}
	}

	function uploadFile(file) {

		var xhr = new XMLHttpRequest(),
			fileInput = document.getElementById('class-roster-file'),
			pBar = document.getElementById('file-progress'),
			fileSizeLimit = 1024;	// In MB
		if (xhr.upload) {
			// Check if file is less than x MB
			if (file.size <= fileSizeLimit * 1024 * 1024) {
				// Progress bar
				pBar.style.display = 'inline';
				xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
				xhr.upload.addEventListener('progress', updateFileProgress, false);

				// File received / failed
				xhr.onreadystatechange = function(e) {
					if (xhr.readyState == 4) {
						// Everything is good!
						
						// progress.className = (xhr.status == 200 ? "success" : "failure");
						// document.location.reload(true);
					}
				};

				// Start upload
				xhr.open('POST', document.getElementById('file-upload-form').action, true);
				xhr.setRequestHeader('X-File-Name', file.name);
				xhr.setRequestHeader('X-File-Size', file.size);
				xhr.setRequestHeader('Content-Type', 'multipart/form-data');
				xhr.send(file);
			} else {
				output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
			}
		}
	}

	// Check for the various File API support.
	if (window.File && window.FileList && window.FileReader) {
		Init();
	} else {
		document.getElementById('file-drag').style.display = 'none';
	}
})();
</script>