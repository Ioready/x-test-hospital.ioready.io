<style>
    .modal-footer .btn + .btn {
    margin-bottom: 5px !important;
    margin-left: 5px;
}
</style>
<div id="commonModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrlClinic) ?>" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo  "Add Clinic" ?></h2>
                    </div>
                <div class="modal-body">
                    <!-- <div class="loaders">
                        <img src="<?php //echo base_url().'backend_asset/images/Preloader_2.gif';?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Clinic Location</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="clinic_location" id="clinic_location" placeholder="clinic location" />
                                    </div>
                                </div>
                            </div>

                            <div class="space-22"></div>
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


    <script>


function getStates(countryId) {
   

    $.ajax({
        url: 'admin/getStates',
        type: 'POST',
        dataType: "json",
        data: { id: countryId },
        success: function(response) {
            $('#state_div').html(response);
            
        },
        error: function(xhr, status, error) {
            // console.error(xhr.responseText);
        }
    });
}


function getCities(stateId) {
    $.ajax({
        url: 'admin/getCity',
        type: 'POST',
        dataType: "json",
        data: { id: stateId },
        success: function(response) {
   
    $('#city').html(response);
},
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

</script>

    <script>
        $(document).ready(function() {
            $('#postalCode').on('keyup', function() {
                var postalCode = $(this).val();
                
                    $.ajax({
                        url: 'https://data.opendatasoft.com/api/records/1.0/search/',
                        data: {
                            dataset: 'geonames-postal-code@public',
                            q: postalCode,
                            // rows: 1
                        },
                        success: function(response) {
                            var records = response.records;
                            if (records.length > 0) {
                                var record = records[0].fields;
                                var html = '<p>City: ' + record.place_name + '</p>';
                                html += '<p>State: ' + record.admin_name1 + '</p>';
                                html += '<p>Country: ' + record.country_code + '</p>';
                                if(record.country_code == 'GB'){
                                    var countryData = 'United Kingdom';
                                }else{
                                    var countryData = record.country_code;
                                }
                                $('#city_in').val(record.place_name);

                                $('#state_in').val(record.admin_name1);

                                $('#country_in').val(countryData);

                                $('#result').html(html);


                            } else {
                                $('#result').html('<p>No results found</p>');
                            }
                        },
                        error: function() {
                            $('#result').html('<p>An error occurred while fetching data</p>');
                        }
                    });
                
            });
        });
    </script>
    
</div>