<script>
    var urls = "<?php echo base_url() ?>";
    /* window.setTimeout(function () {
     bootbox.hideAll();
     }, 2000);*/

    /** start script in application **/


    var logout = function () {
        bootbox.confirm('<?php echo lang('Logout_Confirmation'); ?>', function (isTrue) {
            if (isTrue) {
                $.ajax({
                    url: '<?php echo base_url() . 'pwfpanel/logout' ?>',
                    type: 'POST',
                    dataType: "JSON",
                    success: function (data) {
                        window.location.href = data.url;
                    }
                });
            }
        });

    }

    var addFormBoot = function (ctrl, method)
    {
        $(document).on('submit', "#add-form-common", function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
                data: formData, //only input
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $(".loaders").fadeIn("slow");
                },
                success: function (response, textStatus, jqXHR) {
                    try {
                        var data = $.parseJSON(response);
                        if (data.status == 1)
                        {
//                            bootbox.alert({
//                                message: data.message,
//                                callback: function (
//
//
//                                        ) { /* your callback code */
//                                }
//                            });
                            $("#commonModal").modal('show');
                            toastr.success(data.message);


                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url(); ?>" + ctrl;
                            }, 2000);
                            $(".loaders").fadeOut("slow");

                        } else {
                            toastr.error(data.message);
                            $('#error-box').show();
                            $("#error-box").html(data.message);
                            $(".loaders").fadeOut("slow");
                            setTimeout(function () {
                                $('#error-box').hide(800);
                            }, 1000);
                        }
                    } catch (e) {
                        $('#error-box').show();
                        $("#error-box").html(data.message);
                        $(".loaders").fadeOut("slow");
                        setTimeout(function () {
                            $('#error-box').hide(800);
                        }, 1000);
                    }
                }
            });

        });
    }

    var updateFormBoot = function (ctrl, method)
    {
        $("#edit-form-common").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
                data: formData, //only input
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $(".loaders").fadeIn("slow");
                },
                success: function (response, textStatus, jqXHR) {
                    try {
                        var data = $.parseJSON(response);
                        if (data.status == 1)
                        {
//                            bootbox.alert({
//                                message: data.message,
//                                callback: function (
//
//
//                                        ) { /* your callback code */
//                                }
//                            });
                            $("#commonModal").modal('hide');
                            toastr.success(data.message);
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url(); ?>" + ctrl;
                            }, 2000);
                            $(".loaders").fadeOut("slow");

                        } else {
                            $('#error-box').show();
                            $("#error-box").html(data.message);
                            $(".loaders").fadeOut("slow");
                            setTimeout(function () {
                                $('#error-box').hide(800);
                            }, 1000);
                        }
                    } catch (e) {
                        $('#error-box').show();
                        $("#error-box").html(data.message);
                        $(".loaders").fadeOut("slow");
                        setTimeout(function () {
                            $('#error-box').hide(800);
                        }, 1000);
                    }
                }
            });

        });
    }

    var editFn = function (ctrl, method, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
            type: 'POST',
            data: {'id': id},
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (data, textStatus, jqXHR) {

                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
                addFormBoot();
                $(".loaders").fadeOut("slow");
            }
        });
    }

    var editHeader = function (ctrl, method, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
            type: 'POST',
            data: {'id': id},
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (data, textStatus, jqXHR) {

                $('#form-modal-box-header').html(data);
                $("#commonModal").modal('show');
                addFormBoot();
                $(".loaders").fadeOut("slow");
            }
        });
    }
    

    var payFn = function (ctrl, method, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
            type: 'POST',
            data: {'id': id},
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (data, textStatus, jqXHR) {

                $('#form-modal-box-pay').html(data);
                $("#commonModal").modal('show');
                addFormBoot();
                $(".loaders").fadeOut("slow");
            }
        });
    }

    var payFnP = function (ctrl, method, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
            type: 'POST',
            data: {'id': id},
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (data, textStatus, jqXHR) {

                $('#form-modal-box-payp').html(data);
                $("#commonModalPayPatient").modal('show');
                addFormBoot();
                $(".loaders").fadeOut("slow");
            }
        });
    }



    var pdfInvoice = function (ctrl, method, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
            type: 'POST',
            data: {'id': id},
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (data, textStatus, jqXHR) {

                $('#form-modal-box-pdf').html(data);
                $("#commonModal").modal('show');
                addFormBoot();
                $(".loaders").fadeOut("slow");
            }
        });
    }

    var pdfInvoiceReceipt = function (ctrl, method, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
            type: 'POST',
            data: {'id': id},
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (data, textStatus, jqXHR) {

                $('#form-modal-box-receipt').html(data);
                $("#commonModalReceipt").modal('show');
                addFormBoot();
                $(".loaders").fadeOut("slow");
            }
        });
    }

    

    var viewFn = function (ctrl, method, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + ctrl + "/" + method,
            type: 'POST',
            data: {'id': id},
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (data, textStatus, jqXHR) {

                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
                addFormBoot();
                $(".loaders").fadeOut("slow");
            }
        });
    }

    var open_modal = function (controller) {
        var id = $('#patient_id').val();
        // alert(id);
        if(id==''){
            $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });

        }else{
            var id = $('#patient_id').val();
            $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',id:id},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });
        }
        
    }

    var open_modal_documents = function (controller) {
        var id = $('#patient_id').val();
        // alert(id);
        if(id==''){
            $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_modal_documents",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });

        }else{
            var id = $('#patient_id').val();
            $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_modal_documents",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',id:id},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });
        }
        
    }

    var open_modal_documents_gallery = function (controller) {
        var id = $('#patient_id').val();
        var folder_id = $('#folder_id').val();
        // alert(id);
        if(id==''){
            $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/fileGallery",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });

        }else{
            var id = $('#patient_id').val();
            var folder_id = $('#folder_id').val();
            $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/fileGallery",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',id:id,folder_id:folder_id},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });
        }
        
    }

    var open_model_new = function (controller) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model_new",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModalNew").modal('show');
            }
        });
    }
    var open_model_medication = function (controller) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model_medication",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-medicine-box').html(data);
                $("#commonModalMedicine").modal('show');
            }
        });
    }

    
    var open_modal_edit = function (controller, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model_edit" + "?id=" + id,
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });
    }

    $(document).on("click",".user-edit-data",function() {
    // var open_modal_edit_user = function (controller) {
        var id = $(this).attr("id");
        // alert(id);
        $.ajax({
            url: '<?php echo base_url(); ?>'+"/users/open_model_edit_user",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',id:id},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box-user').html(data);
                $("#commonModalUser").modal('show');
            }
        });
    });


    var open_model_invoice = function (controller) {
        var id = $('#patient_id').val();
        

        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model_invoice",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',id:id},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });
    }

    var open_modal_edit_letters = function (controller, id) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model_edit" + "?id=" + id,
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box-edit').html(data);
                $("#commonModal").modal('show');
            }
        });
    }
    

    var deleteFn = function (table, field, id, ctrl, method, txt) {

        console.log(txt);
        if(typeof method == "undefined" || method==""){
            method = "index.php/users/delete";
        }
        bootbox.confirm({
            message: "Do you really want to delete "+txt+"?",
            buttons: {
                confirm: {
                    label: 'OK',
                    className: '<?php echo THEME_BUTTON; ?>'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    var url = "<?php echo base_url() ?>"+method;
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {id: id, id_name: field, table: table},
                        success: function (response) {
                            if (response == 200) {

                                $("#message").html("<div class='alert alert-success'><?php echo lang('delete_success'); ?></div>");
                                window.setTimeout(function () {
                                    window.location.reload();
                                    window.location.href = "<?php echo base_url(); ?>" + ctrl;
                                }, 1000);
                            }else{
                                $("#message").html("<div class='alert alert-danger'>This Record cannot delete because have used in other module</div>"); 
                            }
                        },
                        error: function (error, ror, r) {
                            bootbox.alert(error);
                        },
                    });
                }
            }
        });

    }

    var deleteFnInvoice = function (table, field, id, ctrl, method, txt) {

        console.log(txt);
        if(typeof method == "undefined" || method==""){
            method = "index.php/invoices/delete";
        }
        bootbox.confirm({
            message: "Do you really want to delete "+txt+"?",
            buttons: {
                confirm: {
                    label: 'OK',
                    className: '<?php echo THEME_BUTTON; ?>'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    var url = "<?php echo base_url() ?>"+method;
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {id: id, id_name: field, table: table},
                        success: function (response) {
                            if (response == 200) {

                                $("#message").html("<div class='alert alert-success'><?php echo lang('delete_success'); ?></div>");
                                window.setTimeout(function () {
                                    window.location.reload();
                                    window.location.href = "<?php echo base_url(); ?>" + ctrl;
                                }, 1000);
                            }else{
                                $("#message").html("<div class='alert alert-danger'>This Record cannot delete because have used in other module</div>"); 
                            }
                        },
                        error: function (error, ror, r) {
                            bootbox.alert(error);
                        },
                    });
                }
            }
        });

        }


    var deleteFnClinic = function (table, field, id, ctrl, method, txt) {

console.log(txt);
if(typeof method == "undefined" || method==""){
    method = "index.php/users/delete";
}
bootbox.confirm({
    message: "Do you really want to delete "+txt+"?",
    buttons: {
        confirm: {
            label: 'OK',
            className: '<?php echo THEME_BUTTON; ?>'
        },
        cancel: {
            label: 'Cancel',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if (result) {
            var url = "<?php echo base_url() ?>"+method;
            $.ajax({
                method: "POST",
                url: url,
                data: {id: id, id_name: field, table: table},
                success: function (response) {
                    if (response == 200) {

                        $("#message").html("<div class='alert alert-success'><?php echo lang('delete_success'); ?></div>");
                        window.setTimeout(function () {
                            window.location.reload();
                            window.location.href = "<?php echo base_url(); ?>" + ctrl;
                        }, 1000);
                    }else{
                        $("#message").html("<div class='alert alert-danger'>This Record cannot delete because have used in other module</div>"); 
                    }
                },
                error: function (error, ror, r) {
                    bootbox.alert(error);
                },
            });
        }
    }
});

}
    var deleteFn1 = function (table, field, create_date, ctrl, method, txt) {

if(typeof method == "undefined" || method==""){
    method = "users/delete";
}
bootbox.confirm({
    message: "Do you really want to delete "+txt+"?",
    buttons: {
        confirm: {
            label: 'OK',
            className: '<?php echo THEME_BUTTON; ?>'
        },
        cancel: {
            label: 'Cancel',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if (result) {
            var url = "<?php echo base_url() ?>"+method;
            $.ajax({
                method: "POST",
                url: url,
                data: {create_date: create_date, id_name: field, table: table},
                success: function (response) {
                    if (response == 200) {

                        $("#message").html("<div class='alert alert-success'><?php echo lang('delete_success'); ?></div>");
                        window.setTimeout(function () {
                            window.location.reload();
                            window.location.href = "<?php echo base_url(); ?>" + ctrl;
                        }, 1000);
                    }else{
                        $("#message").html("<div class='alert alert-danger'>This Record cannot delete because have used in other module</div>"); 
                    }
                },
                error: function (error, ror, r) {
                    bootbox.alert(error);
                },
            });
        }
    }
});

}

    var deleteRole = function (table, field, id, ctrl) {
        bootbox.confirm({
            message: "<?php echo lang('delete'); ?>",
            buttons: {
                confirm: {
                    label: 'OK',
                    className: '<?php echo THEME_BUTTON; ?>'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    var url = "<?php echo base_url() ?>users/delete_role";
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {id: id, id_name: field, table: table},
                        success: function (response) {
                            if (response == 200) {

                                $("#message").html("<div class='alert alert-success'><?php echo lang('delete_success'); ?></div>");
                                window.setTimeout(function () {
                                    window.location.href = "<?php echo base_url(); ?>" + ctrl;
                                }, 2000);
                            }
                            else{
                                $("#message").html("<div class='alert alert-danger'><?php echo lang('delete_failed'); ?></div>");
                                window.setTimeout(function () {
                                    window.location.href = "<?php echo base_url(); ?>" + ctrl;
                                }, 2000);
                            }
                        },
                        error: function (error, ror, r) {
                            bootbox.alert(error);
                        },
                    });
                }
            }
        });
    }
   var statusFn = function (table, field, id, status) {
        var message = "";
        if (status == 1) {
            message = "<?php echo lang('deactive'); ?>";
        } else if (status == 0) {
            message = "<?php echo lang('active'); ?>";
        }

        bootbox.confirm({
            message: "Do you want to " + message + " it?",
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
            callback: function (result) {
                if (result) {
                    var url = "<?php echo base_url() ?>pwfpanel/status";
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {id: id, id_name: field, table: table, status: status},
                        success: function (response) {
                            if (response == 200) {
                                setTimeout(function () {
                                    $("#message").html("<div class='alert alert-success'><?php echo lang('change_status_success'); ?></div>");
                                });
                                window.location.reload();
                            }
                        },
                        error: function (error, ror, r) {
                            bootbox.alert(error);
                        },
                    });
                }
            }
        });


    }


    var commonStatusFn = function (table, field, id, status) {
        var message = "";
        if (status == 1) {
            message = "<?php echo lang('deactive'); ?>";
        } else if (status == 0) {
            message = "<?php echo lang('active'); ?>";
        }

        bootbox.confirm({
            message: "Do you want to " + message + " it?",
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
            callback: function (result) {
                if (result) {
                    var url = "<?php echo base_url() ?>pwfpanel/commonStatus";
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {id: id, id_name: field, table: table, status: status},
                        success: function (response) {
                            if (response == 200) {
                                setTimeout(function () {
                                    $("#message").html("<div class='alert alert-success'><?php echo lang('change_status_success'); ?></div>");
                                });
                                window.location.reload();
                            }
                        },
                        error: function (error, ror, r) {
                            bootbox.alert(error);
                        },
                    });
                }
            }
        });
    }

    var editStatusFn = function (table, field, id, status, txt) {
        var message = "";
        if (status == 1) {
            message = "<?php echo lang('deactive'); ?>";
        } else if (status == 0) {
            message = "<?php echo lang('active'); ?>";
        }

        bootbox.confirm({
            message: "Do you want to " + message + " "+txt+"?",
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
            callback: function (result) {
                if (result) {
                    var url = "<?php echo base_url() ?>pwfpanel/commonEditStatus";
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {id: id, id_name: field, table: table, status: status},
                        success: function (response) {
                            if (response == 200) {
                                setTimeout(function () {
                                    $("#message").html("<div class='alert alert-success'><?php echo lang('change_status_success'); ?></div>");
                                });
                                window.location.reload();
                            }
                        },
                        error: function (error, ror, r) {
                            bootbox.alert(error);
                        },
                    });
                }
            }
        });
    }

     var custom_open_modal = function (controller) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {

                $('#form-modal-box').html(data);
                $("#custombntmd").modal('show');
                $("body").addClass("addbody");


            }
        });
    }
    

    var open_modal_clinic = function (controller) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model_clinic",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });
    }

    var open_model_practitioner = function (controller) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model_practitioner",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });
    }

    var open_model_form = function (controller) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + controller + "/open_model_form",
            type: 'POST',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            success: function (data, textStatus, jqXHR) {
                $('#form-modal-box').html(data);
                $("#commonModal").modal('show');
            }
        });
    }

    
    /** end script in application **/

</script>

<!-- <script>
    $(document).ready(function() {
        $("#products").keyup(function() {
            var query = $(this).val();
            alert(query);
            console.log(query);
            if (query != '') {
                $.ajax({
                    url: "<?php echo site_url('invoices/fetchAllProduct'); ?>",
                    method: "POST",
                    data: {query: query},
                    success: function(data) {
                        $('#result_product').html(data);
                    }
                });
            } else {
                $('#result_product').html('');
            }
        });
    });
</script>

<script>
    function getSearchAllProduct() {
        var searchValue = document.getElementById("consultation_allergy").value;

        document.getElementById("products").value = searchValue;
    }
</script> -->
<script>
    function myFunction() {
    let x = document.getElementById("products");
    query= x.value;
    if (query != '') {
                    $.ajax({
                        url: "<?php echo site_url('invoices/fetchAllProduct'); ?>",
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $('#result_product').html(data);
                        }
                    });
                } else {
                    $('#result_product').html('');
                }

}
</script>
<script>
    function getSearchAllProduct() {
        var searchValue = document.getElementById("consultation_product").value;

        document.getElementById("products").value = searchValue;
    }
</script>

<script>
    function myProductFunction() {
    let x = document.getElementById("product_item");
    // let x = document.getElementsByClassName("product_item");
    query= x.value;
    // alert(query); 
    
    if (query != '') {
                    $.ajax({
                        url: "<?php echo site_url('invoices/fetchAllProductSearch'); ?>",
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $('#result_productsjkjk').html(data);
                        }
                    });
                } else {
                    $('#result_productsjkjk').html('');
                }
}
</script>
<script>
    function getSearchAllProductAdd() {
        var searchValue = document.getElementById("consultation_productadd").value;

        document.getElementById("product_item").value = searchValue;
    }
</script>


<!-- Edit invoice product items -->

<script>
    function myFunctionUpdate() {
    let x = document.getElementById("products");
    query= x.value;
    if (query != '') {
                    $.ajax({
                        url: "<?php echo site_url('invoices/fetchAllProduct'); ?>",
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $('#result_product').html(data);
                        }
                    });
                } else {
                    $('#result_product').html('');
                }

}
</script>
<script>
    function getSearchAllProductUpdate() {
        var searchValue = document.getElementById("consultation_product_update").value;

        document.getElementById("products").value = searchValue;
    }
</script>

<script>
    function myProductFunctionEdit() {
    let x = document.getElementById("product_item");
    // let x = document.getElementsByClassName("product_item");
    query= x.value;
    // alert(query); 
    
    if (query != '') {
                    $.ajax({
                        url: "<?php echo site_url('invoices/fetchAllProductSearchEdit '); ?>",
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $('#result_productsjkjk').html(data);
                        }
                    });
                } else {
                    $('#result_productsjkjk').html('');
                }
}
</script>
<script>
    function getSearchAllProductEdit() {
        var searchValue = document.getElementById("consultation_product_edit").value;

        document.getElementById("product_item").value = searchValue;
    }
</script>



