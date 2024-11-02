<script src="<?php echo base_url() . 'backend_asset/admin/js/' ?>helpers/ckeditor/ckeditor.js"></script>
<style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}

.multi-bg-example {
  width: 100%;
  height: 100px;
  background-image: url(firefox.png), url(bubbles.png), linear-gradient(to right, rgb(238 242 245), rgb(255 255 255 / 0%));
  background-repeat: no-repeat, no-repeat, no-repeat;
  background-position:
    bottom right,
    left,
    right;
}

</style>
<div id="commonModal" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo (isset($title)) ? ucwords($title) : "" ?></h2>
                    </div>
                <div class="modal-body">

                <div style="background-color: cornsilk;" class="multi-bg-example">

                    <img src="<?php echo base_url().'backend_asset/images/email_gmail_mail.png';?>" alt="Preloader Image" style="width: 100px; margin-left: 64px">
                </div>

                    <!-- <div class="loaders">
                        <img src="<?php echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <!-- <label class="col-md-3 control-label">Patient Name</label> -->
                                    
                                    <div class="col-md-9">
                                    <h4 class="no-margins fw-bold"></h4>
                                        <input type="hidden" class="form-control" name="patient_id" id="patient_id_data" value="<?php print_r($this->data['patient_id']);?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="row">
                                    <div class="col-sm-3">
                                    <label class="control-label">letter body</label>
                                    
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <button class="btn" style="border: 1px solid; background-color: green;">Save As draft</button> -->
                                    
                                    </div>
                                    <div class="col-sm-3">
                                    <!-- <button class="btn" style="border: 1px solid; background-color: white;">Restore Preview</button> -->
                                    
                                    </div>
                                    <div class="col-sm-3">

                                        <select name="type" id="type" class="form-control">
                                            <option value="Awaiting Review">Awaiting Review</option>
                                            <option value="Awaiting Currection">Awaiting Currection</option>
                                            <option value="Completed">Completed</option>
                                            
                                        </select>

                                    </div>

                                </div>
                            

                            
                                <div class="form-group">
                                    
                                    <div class="col-md-12">
                                    <textarea name="details" id="body" rows="10"></textarea>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                    <div class="col-md-12">
                                    <input type="hidden" name="template_id" id="template_id" >
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="space-22"></div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('reset_btn');?></button>
                    <button  style="background: #337ab7" type="submit" id="submit" class="btn btn-sm btn-primary m-2" ><?php echo lang('submit_btn');?></button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    <?php
// Convert PHP array to JSON so it can be used in JavaScript
$template_names = json_encode($send_mail_template);
// echo $template_names;
?>
</div>

<script>
    CKEDITOR.plugins.addExternal('countryselector', '/path/to/ckeditor/plugins/countryselector/', 'plugin.js');
    CKEDITOR.plugins.addExternal('patientselector', '/path/to/ckeditor/plugins/patientselector/', 'plugin.js');
    
    CKEDITOR.replace('body', {
        allowedContent: true,
        on: {
            instanceReady: function(ev) {
                // Configure paragraph tags or disable them if necessary
                this.dataProcessor.writer.setRules('p', {
                    indent: false,
                    breakBeforeOpen: true,
                    breakAfterOpen: false,
                    breakBeforeClose: false,
                    breakAfterClose: true,
                });
            }
        },
        extraPlugins: 'countryselector,patientselector',
        toolbar: [
            { name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates'] },
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker'] },
            '/',
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
            '/',
            { name: 'styles', items: ['Styles', 'Format'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] },
            '/',
            { name: 'custom', items: ['CountrySelector', 'Patient'] }  // Add the custom dropdown here
        ],
        height: 300
    });

    CKEDITOR.plugins.add('countryselector', {
        init: function(editor) {
            editor.ui.addRichCombo('CountrySelector', {
                label: 'Insert Template',
                title: 'Insert Template',
                voiceLabel: 'Insert Template',
                className: 'cke_format',
                multiSelect: false,
                panel: {
                    css: [CKEDITOR.skin.getPath('editor')].concat(editor.config.contentsCss),
                    voiceLabel: editor.lang.panelVoiceLabel
                },
                // init: function() {
                    
                //     var countries = [<?php echo $send_mail_template; ?>];
                    
                //     for (var i = 0; i < countries.length; i++) {
                //         // alert(countries[i]);
                //         this.add(countries[i], countries[i], countries[i]);
                //     }
                // },

                init: function() {
                    // alert(send_mail_template);
                    var countries = <?php echo json_encode($send_mail_template); ?>;
                    for (var i = 0; i < countries.length; i++) {
                        // Assuming `this.add` takes three parameters and does something meaningful
                        this.add(countries[i], countries[i], countries[i]);
                    }
                },

                // init: function() {
                //     // Get template names from PHP and add each one to the dropdown
                //     var templates = <?php echo $template_names; ?>;
                //     for (var i = 0; i < templates.length; i++) {
                //         this.add(templates[i], templates[i], templates[i]);
                //     }
                // },

            //     init: function() {
            //     var countries = [
            //         'United States', 'Canada', 'United Kingdom', 'Australia', 'Germany', 'France', 'India', 'China', 'Japan', 'Russia'
            //     ];

            //     for (var i = 0; i < countries.length; i++) {
            //         this.add(countries[i], countries[i], countries[i]);
            //     }
            // },

                onClick: function(value) {
                    var id = value;
                    $('#template_id').val(id);
                    $.ajax({
                        url: '<?php echo base_url(); ?>' + "lettersAndForm/getAllEmailTemplate",
                        type: 'POST',
                        data: {id: id},
                        
                        success: function(data, textStatus, jqXHR) {
                            editor.setData(data);  // Directly replace the content with new data
                        }
                    });
                }
            });
        }
    });
</script>

<script>

CKEDITOR.plugins.add('patientselector', {
    init: function(editor) {
        editor.ui.addRichCombo('Patient', {
            label: 'Patient',
            title: 'Patient',
            voiceLabel: 'Patient',
            className: 'cke_format1',
            multiSelect: false,

            panel: {
                css: [CKEDITOR.skin.getPath('editor')].concat(editor.config.contentsCss),
                voiceLabel: editor.lang.panelVoiceLabel
            },

            init: function() {
                var countries = [
                    'United States', 'Canada', 'United Kingdom', 'Australia', 'Germany', 'France', 'India', 'China', 'Japan', 'Russia'
                ];

                for (var i = 0; i < countries.length; i++) {
                    this.add(countries[i], countries[i], countries[i]);
                }
            },

            onClick: function(value) {
                editor.insertText(value);
            }
        });
    }
});


</script>




