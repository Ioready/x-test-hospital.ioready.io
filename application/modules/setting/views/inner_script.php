<link href="<?php echo base_url();?>backend_asset/plugins/switchery/switchery.css" rel="stylesheet">
<script src="<?php echo base_url();?>backend_asset/plugins/switchery/switchery.js"></script>
<script>

jQuery('body').on('click', '#submit', function () {
        
        var form_name= this.form.id;
        if(form_name=='[object HTMLInputElement]')
            form_name='addFormAjax';
        $("#"+form_name).validate({
            // rules: {
            //     game_join_time: 
            //     {
            //          required: true,
            //          max: 120,
            //          min:  30
            //     }
               
            // },
            rules: {
                secret_key: "required",
                publishable_key: "required",
                
                
            },
            messages: {
                secret_key: '<?php echo lang('secret key');?>',
                publishable_key: '<?php echo lang('publishable key');?>',
               
                
            },
            // messages: {
            //     game_join_time: 'Game Join Time field is required',
              
            // },
            submitHandler: function (form) {
                jQuery(form).ajaxSubmit({
                });
            }
        });

    });


  


    jQuery('body').on('change', '.input_img2', function () {

        var file_name = jQuery(this).val();
        var fileObj = this.files[0];
        var calculatedSize = fileObj.size / (1024 * 1024);
        var split_extension = file_name.split(".");
        var ext = ["jpg", "gif", "png", "jpeg"];
        if (jQuery.inArray(split_extension[1].toLowerCase(), ext) == -1)
        {
            $(this).val(fileObj.value = null);
            //showToaster('error',"You Can Upload Only .jpg, gif, png, jpeg  files !");
            $('.ceo_file_error').html('<?php echo lang('image_upload_error'); ?>');
            return false;
        }
        if (calculatedSize > 1)
        {
            $(this).val(fileObj.value = null);
            //showToaster('error',"File size should be less than 1 MB !");
            $('.ceo_file_error').html(' 1MB');
            return false;
        }
        if (jQuery.inArray(split_extension[1].toLowerCase(), ext) != -1 && calculatedSize < 10)
        {
            $('.ceo_file_error').html('');
            readURL(this);
        }
    });

    jQuery('body').on('change', '.input_img3', function () {

        var file_name = jQuery(this).val();
        var fileObj = this.files[0];
        var calculatedSize = fileObj.size / (1024 * 1024);
        var split_extension = file_name.split(".");
        var ext = ["jpg", "gif", "png", "jpeg"];
        if (jQuery.inArray(split_extension[1].toLowerCase(), ext) == -1)
        {
            $(this).val(fileObj.value = null);
            //showToaster('error',"You Can Upload Only .jpg, gif, png, jpeg  files !");
            $('.ceo_file_error').html('<?php echo lang('image_upload_error'); ?>');
            return false;
        }
        if (calculatedSize > 1)
        {
            $(this).val(fileObj.value = null);
            //showToaster('error',"File size should be less than 1 MB !");
            $('.ceo_file_error').html(' 1MB');
            return false;
        }
        if (jQuery.inArray(split_extension[1].toLowerCase(), ext) != -1 && calculatedSize < 10)
        {
            $('.ceo_file_error').html('');
            readURL(this);
        }
    });
    function readURL(input) {
        var cur = input;
        if (cur.files && cur.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(cur).hide();
                $(cur).next('span:first').hide();
                $(cur).next().next('img').attr('src', e.target.result);
                $(cur).next().next('img').css("display", "block");
                $(cur).next().next().next('span').attr('style', "");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    jQuery('body').on('click', '.remove_img', function () {
        var img = jQuery(this).prev()[0];
        var span = jQuery(this).prev().prev()[0];
        var input = jQuery(this).prev().prev().prev()[0];
        jQuery(img).attr('src', '').css("display", "none");
        jQuery(span).css("display", "block");
        jQuery(input).css("display", "inline-block");
        jQuery(this).css("display", "none");
        jQuery(".image_hide").css("display", "block");
        jQuery("#user_image").val("");
    });

    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, {color: '#1AB394'});
    
    var elem1 = document.querySelector('.js-switch1');
    var switchery1 = new Switchery(elem1, {color: '#1AB394'});

    function deleteConsultation(id) {
        bootbox.confirm({
            message: "Do you really want to delete task?",
            buttons: {
                confirm: {
                    label: 'Ok',
                    className: '<?php echo THEME_BUTTON; ?>'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function(result) {
                if (result) {
                    var url = "<?php echo base_url() ?>setting/delete_consultation";
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 200) {
                                $("#msg").html("<div class='alert alert-success'>" + response.message + "</div>");
                                setTimeout(function() {
                                    window.location.href = response.url;
                                }, 1500);
                            } else {
                                $("#msg").html("<div class='alert alert-danger'>" + response.message + "</div>");
                            }
                        },
                        error: function(error, ror, r) {
                            bootbox.alert(error);
                        },
                    });
                } else {
                    $('.modal-backdrop').remove();
                }
            }
        });
    }
</script>


