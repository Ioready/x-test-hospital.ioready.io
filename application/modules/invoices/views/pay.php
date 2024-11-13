<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<style>
    .modal-footer .btn + .btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }
</style>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .patient-info {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .details {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .details span {
            margin-right: 10px;
        }

        .expand-label {
            color: #007B83;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .expand-section {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
        }

        .expand-section svg {
            margin-right: 5px;
        }

        .save-invoice-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .save-button {
            background-color: #00695C;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .total-amount {
            font-weight: bold;
            font-size: 16px;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .form-container .form-section {
            flex: 1;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select, .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            height: 80px;
        }

        .line-items-container {
            margin-top: 30px;
        }

        .line-items-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .line-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .line-item div {
            flex: 1;
        }

        .add-invoice-item {
            background-color: #00695C;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
            }

            .save-invoice-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .save-button {
                width: 100%;
                margin-bottom: 10px;
            }
        }
        .form-horizontal .form-group {
            margin-left: 0px!important;
            /* margin-right: -15px; */
        }
    </style>
<div id="commonModal" class="modal fade bd-example-modal-lg invoicepay" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <!-- id="addFormAjax" -->
        <!-- data-stripe-publishable-key="sk_test_afm5UcS9SFFjYgSs5hTWIG7Y00G5E2b2Zx" -->

            
            <form class="form-horizontal form-validation" role="form" id="addFormAjaxData" method="post" action="<?php echo site_url('/invoices/process'); ?>" enctype="multipart/form-data">

            <div class="modal-header text-center" style="padding: 20px; background-color: #f5f5f5; border-bottom: 1px solid #ddd;">
    <!-- Close Button -->
    <button type="button" class="close" data-dismiss="modal" style="position: absolute; top: 15px; right: 20px; font-size: 24px;">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>

    <!-- Modal Title -->
    <h2 class="modal-title" style="font-weight: 600;font-size:20px; color: #333; margin-bottom: 10px;">
        <?php echo "Add Payment on Account"; ?>
      &nbsp;  &nbsp;  &nbsp;  <span><strong><?php echo $results->invoice_number; ?></strong></span>
    </h2>

    <!-- Invoice Number -->
    <h4 style="margin-left: 20px; color: #555;">
       
    </h4>

    <!-- Hidden Input for Invoice Number -->
    <input type="hidden" name="invoice_number" value="<?php echo $results->invoice_number; ?>">
</div>

                

                <!-- stripe payment gateway -->

            <div class="modal-body">

                <div class="container-fluid px-0">
                    <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                        <div class="form-container">
                          
                            <div class="form-section">
                                
                                <div class="form-group">
                                    <label for="select-date">Select Date <span class="required" style="color:red;">*</span></label>
                                    <input type="date" name="invoice_date" id="invoice_date" value="<?php echo $results->invoice_date;?>">
                                </div>
                                <div class="form-group">
                                    <label for="billing">Select Payment type <span style="color:red;">*</span></label>
                                    <select name="billing_to" id="billing_to">
                                    <option value="">Select Billing Type</option>
                                    <option value="Self Pay" <?php echo $results->billing_to =='Self Pay'?'selected':'';?>>Self Pay</option>
                                    <option value="Insurance" <?php echo $results->billing_to =='Insurance'?'selected':'';?>>Insurance</option>
                                    <option value="Medicare" <?php echo $results->billing_to =='Medicare'?'selected':'';?>>Medicare</option>
                                    <option value="Company" <?php echo $results->billing_to =='Company'?'selected':'';?>>Company</option>
                                    <option value="Government Program" <?php echo $results->billing_to =='Government Program'?'selected':'';?>>Government Program</option>
                                    <option value="Other" <?php echo $results->billing_to =='Other'?'selected':'';?>>Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="notes">Amount</label>
                                    <input type="text" name="amount" id="amount" placeholder="Enter Amount" value="<?php echo $results->total_amount; ?>" readOnly>
                                    <!-- <button class="add-invoice-item" type="button" onclick="education_fields();">
                                        <span aria-hidden="true">+ Add card</span>
                                    </button> -->

                                    
                                    <div id="card-details-container"></div>
                                </div>
    
                            </div>

                           
                            <div class="form-section">
                                
                                <div class="form-group">
                                    <label for="patient">Patient Details<span style="color:red;">*</span></label>
                                    <input type="hidden" name="patient" id="patient" value="<?php echo $results->patient_id;?>"><h3><span><?php echo $results->patient_name;?></span></h3>

                                        <table border="1" cellspacing="0" cellpadding="10" style="width: 100%; border-collapse: collapse;">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Rate</th>
                                                    <th>Quantity</th>
                                                    <th>Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($resultsItem as $rows){ ?>
                                                <tr>
                                                    <td><?php echo $rows->product_name; ?></td>
                                                    <td><?php echo $rows->rate; ?></td>
                                                    <td><?php echo $rows->quantity; ?></td>
                                                    <td><?php echo $rows->total_price; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                </div>

                            </div>
                        </div>

                            <div class="save-invoice-section">
                               
                            </div>
                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />

                            <div class="space-22"></div>
                        </div>
                      <!-- Total Amount Section -->
<div class="total-amount" style="font-size: 18px; font-weight: bold; margin-bottom: 20px;;">
    Total amount: £<?php echo $results->total_amount; ?>
</div>

<!-- Payment Sidebar and Tabs -->
<div class="card card0" style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; height:300px;overflow-y:auto">
    <div style="display: flex;" id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="width: 250px;background-color: #f8f9fa; border-right: 1px solid #dee2e6;">
            <div style="font-size: 18px; color: #007bff; text-align: center; padding: 20px 0; font-weight: bold;">PAY WITH</div>
            <div class="customNavMenus" style="padding: 10px;">

                <!-- Payment Methods -->
                <a data-toggle="tab" href="#menu2" id="tab2" style="display: block; padding: 10px; font-size: 14px; color: #333; text-decoration: none; background-color: #fff; margin-bottom: 5px; border-radius: 4px;">
                    <div style="display: flex; align-items: center;">
                        <div class="fa fa-credit-card" style="margin-right: 10px;"></div> Card
                    </div>
                </a>

                <a data-toggle="tab" href="#menu1" id="tab1" style="display: block; padding: 10px; font-size: 14px; color: #333; text-decoration: none; background-color: #fff; margin-bottom: 5px; border-radius: 4px;">
                    <div style="display: flex; align-items: center;">
                        <div class="fa fa-home" style="margin-right: 10px;"></div> Bank
                    </div>
                </a>

                <a data-toggle="tab" href="#menu4" id="tab4" style="display: block; padding: 10px; font-size: 14px; color: #333; text-decoration: none; background-color: #fff; margin-bottom: 5px; border-radius: 4px;">
                    <div style="display: flex; align-items: center;">
                        <div class="fa fa-money" style="margin-right: 10px;"></div> Cash
                    </div>
                </a>

                <a data-toggle="tab" href="#menu3" id="tab3" style="display: block; padding: 10px; font-size: 14px; color: #333; text-decoration: none; background-color: #fff; margin-bottom: 5px; border-radius: 4px;">
                    <div style="display: flex; align-items: center;">
                        <div class="fa fa-qrcode" style="margin-right: 10px;"></div> Visa QR <span style="color: #dc3545; font-weight: bold;">NEW</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tab Content -->
        <div id="page-content-wrapper" style="flex-grow: 1; padding: 20px;">
            <div class="tab-content">

                <!-- Cash Payment Tab -->
                <div id="menu4" class="tab-pane">
                    <h3 style="text-align: center; margin-bottom: 20px;">Enter Cash details to pay</h3>
                    <div class="form-group">
                        <label for="totalAmount">Total Amount</label>
                        <input type="number" id="totalAmount" name="totalAmount" class="form-control" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;" readonly value="<?php echo $results->total_amount; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cashReceived">Cash Received</label>
                        <input type="number" id="cashReceived" name="cashReceived" class="form-control" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;" placeholder="Enter cash received" oninput="updateTotals()">
                    </div>
                    <div class="form-group">
                        <label for="totalPaid">Total Paid</label>
                        <input type="number" id="totalPaid" name="totalPaid" class="form-control" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;" readonly>
                    </div>
                    <div class="form-group">
                        <label for="balance">Balance</label>
                        <input type="number" id="balance" class="form-control" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;" readonly>
                    </div>
                </div>

                <div id="menu4" class="tab-pane">
                <h3 style="text-align: center; margin-bottom: 20px;">Enter Cash details to pay</h3>

                <!-- Total Amount Input -->
                <div style="margin-bottom: 15px;">
                    <label>Total Amount</label>
                    <input type="number" id="totalAmount" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;" readonly value="<?php echo $results->total_amount; ?>">
                </div>

                <!-- Cash Received Input -->
                <div style="margin-bottom: 15px;">
                    <label>Cash Received</label>
                    <input type="number" id="cashReceived" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;" placeholder="Enter cash received" oninput="updateTotals()">
                </div>

                <!-- Total Paid Input -->
                <div style="margin-bottom: 15px;">
                    <label>Total Paid</label>
                    <input type="number" id="totalPaid" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;" readonly>
                </div>

                <!-- Balance Input -->
                <div style="margin-bottom: 15px;">
                    <label>Balance</label>
                    <input type="number" id="balance" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;" readonly>
                </div>
            </div>


                <!-- Bank Payment Tab -->
                <div id="menu1" class="tab-pane">
                    <h3 style="text-align: center; margin-bottom: 20px;">Enter bank details to pay</h3>
                    <label>Cardholder's Name:</label>
                    <input type="text" id="user_name" class="form-control" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 4px;" placeholder="Cardholder name">
                    <label>Cardholder's Email:</label>
                    <input type="email" id="email" class="form-control" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 4px;" placeholder="text@email.com">
                    <label>Transaction ID:</label>
                    <input type="text" id="transaction_id" class="form-control" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 4px;" placeholder="Transaction ID">
                    <label>Upload PDF Receipt:</label>
                    <input type="file" accept=".pdf" style="width: 100%; padding: 5px; margin-bottom: 15px;">
                    <label>Upload PNG Receipt:</label>
                    <input type="file" accept=".png" style="width: 100%; padding: 5px;">
                </div>

                <!-- Card Payment Tab -->
                <div id="menu2" class="tab-pane in active">
                    <h3 style="text-align: center; margin-bottom: 20px;">Enter your card details to pay</h3>
                    <label>Cardholder's Name:</label>
                    <input type="text" id="user_name_card" class="form-control" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 4px;" placeholder="Cardholder name">
                    <label>Cardholder's Email:</label>
                    <input type="email" id="email_card" class="form-control" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 4px;" placeholder="text@email.com">
                    <div class="form-control" id="card-element" style="padding: 10px; border-radius: 4px; margin-bottom: 15px;"></div>
                </div>

                <!-- QR Payment Tab -->
                <div id="menu3" class="tab-pane">
                    <h3 style="text-align: center; margin-bottom: 20px;">Scan the QR code to pay</h3>
                    <?php if (!empty($qr_code_url)): ?>
                        <img src="<?= $qr_code_url ?>" alt="Invoice QR Code" style="width: 200px; height: 200px; display: block; margin: 0 auto;">
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>

                        

                    </div>
                </div>


            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" class="close" data-dismiss="modal" >Close</button>
                    
                    <button type="submit" id="submit" class="btn btn-sm btn-primary m-2"  style="background: #337ab7" value="Pay $ <?php echo $results->total_amount; ?>" >Pay $ <?php echo $results->total_amount; ?></button>
                    <!-- <div class="col-md-12"> <input type="submit" id="submit"  value="Pay $ <?php echo $results->total_amount; ?>" class="btn btn-success placeicon"> </div> -->
                </div>
        </form>

        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->

<script src="https://js.stripe.com/v3/"></script>


<!-- <script src="https://js.stripe.com/v3/"></script> -->

<!-- <script type="text/javascript">
    const stripe = Stripe('pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj'); // Your publishable key
 
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    $(document).on('submit', "#addFormAjaxData", async function (event) {
        event.preventDefault(); // Prevent default form submission
        $("#submit").val("Sending..").attr('disabled', true);

        const { token, error } = await stripe.createToken(card);

        if (error) {
            $('#card-errors').text(error.message);
            $("#submit").val("Submit Payment").removeAttr('disabled');
            return; // Stop further execution
        }

        // Append the token to the form data
        const formData = new FormData(this);
        formData.append('stripeToken', token.id);
        // formData.append('card', token);

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (response) {
                console.log(response);
                try {
                    const data = JSON.parse(response);
                console.log(data);
                    if (data.status == 1) {
                        toastr.success(data.message);
                        $(".invoicepay").modal('hide');
                        setTimeout(() => location.reload(true), 1000);
                    } else {
                        toastr.error(data.message);
                        $('#error-box').show().html(data.message).delay(1000).fadeOut(800);
                    }
                } catch (e) {
                    $('#error-box').show().html('Unexpected error.').delay(1000).fadeOut(800);
                } finally {
                    $("#submit").val("Submit Payment").removeAttr('disabled');
                    $(".loaders").fadeOut("slow");
                }
            },
            error: function () {
                toastr.error('Request failed.');
                $("#submit").val("Submit Payment").removeAttr('disabled');
                $(".loaders").fadeOut("slow");
            }
        });
    });

</script> -->



<!-- <script type="text/javascript">
    const stripe = Stripe('pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj'); // Your publishable key

    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    $(document).on('submit', "#addFormAjaxData", async function (event) {
        event.preventDefault(); // Prevent default form submission
        $("#submit").val("Sending..").attr('disabled', true);

        // Check if `transaction_id` is present
        const cashReceived = $('#cashReceived').val();
        const transactionId = $('#transaction_id').val();
        if (transactionId) {
            // If `transaction_id` exists, submit the form without creating a new token
          

                    // function submitFormWithoutToken(transactionId) {
                    const formData = new FormData(document.getElementById("addFormAjaxData"));
                    formData.append('transaction_id', transactionId);

                    $.ajax({
                        type: "POST",
                        url: $("#addFormAjaxData").attr('action'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            $(".loaders").fadeIn("slow");
                        },
                        success: function (response) {
                            handleResponse(response);
                        },
                        error: function () {
                            toastr.error('Request failed.');
                            $("#submit").val("Submit Payment").removeAttr('disabled');
                            $(".loaders").fadeOut("slow");
                        }
                    });
                // }

                                function handleResponse(response) {
                        try {
                            const data = JSON.parse(response);
                            if (data.status == 1) {
                                toastr.success(data.message);
                                $(".invoicepay").modal('hide');
                                setTimeout(() => location.reload(true), 1000);
                            } else {
                                toastr.error(data.message);
                                $('#error-box').show().html(data.message).delay(1000).fadeOut(800);
                            }
                        } catch (e) {
                            $('#error-box').show().html('Unexpected error.').delay(1000).fadeOut(800);
                        } finally {
                            $("#submit").val("Submit Payment").removeAttr('disabled');
                            $(".loaders").fadeOut("slow");
                        }
                    }

        } else if (cashReceived) {
            // If `transaction_id` exists, submit the form without creating a new token
           
                    // function submitFormWithoutTokenCash(cashReceived) {
                    const formData = new FormData(document.getElementById("addFormAjaxData"));
                    formData.append('cashReceived', cashReceived);

                    $.ajax({
                        type: "POST",
                        url: $("#addFormAjaxData").attr('action'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            $(".loaders").fadeIn("slow");
                        },
                        success: function (response) {
                            handleResponse(response);
                        },
                        error: function () {
                            toastr.error('Request failed.');
                            $("#submit").val("Submit Payment").removeAttr('disabled');
                            $(".loaders").fadeOut("slow");
                        }
                    });

                // }
                            function handleResponse(response) {
                    try {
                        const data = JSON.parse(response);
                        if (data.status == 1) {
                            toastr.success(data.message);
                            $(".invoicepay").modal('hide');
                            setTimeout(() => location.reload(true), 1000);
                        } else {
                            toastr.error(data.message);
                            $('#error-box').show().html(data.message).delay(1000).fadeOut(800);
                        }
                    } catch (e) {
                        $('#error-box').show().html('Unexpected error.').delay(1000).fadeOut(800);
                    } finally {
                        $("#submit").val("Submit Payment").removeAttr('disabled');
                        $(".loaders").fadeOut("slow");
                    }
                }
        }
        else {
            // Proceed with creating a token if `transaction_id` is not available
            const { token, error } = await stripe.createToken(card);

            if (error) {
                $('#card-errors').text(error.message);
                $("#submit").val("Submit Payment").removeAttr('disabled');
                return; // Stop further execution
            }

            // Append the token to the form data
            const formData = new FormData(this);
            formData.append('stripeToken', token.id);

            // Submit the form with the token
            submitFormWithToken(formData);
        

    function submitFormWithToken(formData) {
        $.ajax({
            type: "POST",
            url: $("#addFormAjaxData").attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (response) {
                handleResponse(response);
            },
            error: function () {
                toastr.error('Request failed.');
                $("#submit").val("Submit Payment").removeAttr('disabled');
                $(".loaders").fadeOut("slow");
            }
        });

            function handleResponse(response) {
            try {
                const data = JSON.parse(response);
                if (data.status == 1) {
                    toastr.success(data.message);
                    $(".invoicepay").modal('hide');
                    setTimeout(() => location.reload(true), 1000);
                } else {
                    toastr.error(data.message);
                    $('#error-box').show().html(data.message).delay(1000).fadeOut(800);
                }
            } catch (e) {
                $('#error-box').show().html('Unexpected error.').delay(1000).fadeOut(800);
            } finally {
                $("#submit").val("Submit Payment").removeAttr('disabled');
                $(".loaders").fadeOut("slow");
            }
        }

    }

    
}
});
   

   
</script> -->


<script type="text/javascript">
    const stripe = Stripe('pk_test_9ec6REkAGDDrUTCf5WqhxOJA00kzzU4vmj'); // Your publishable key
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    $(document).on('submit', "#addFormAjaxData", async function (event) {
        event.preventDefault(); // Prevent default form submission
        $("#submit").val("Sending..").attr('disabled', true);

        const cashReceived = $('#cashReceived').val();
        const transactionId = $('#transaction_id').val();

        // If `transaction_id` or `cashReceived` is present, submit form without creating a token
        if (transactionId || cashReceived) {
            const formData = new FormData(this);
            if (transactionId) formData.append('transaction_id', transactionId);
            if (cashReceived) formData.append('cashReceived', cashReceived);

            submitForm(formData); // Submit form data without Stripe token
        } else {
            // If neither `transaction_id` nor `cashReceived`, create a Stripe token
            const { token, error } = await stripe.createToken(card);

            if (error) {
                $('#card-errors').text(error.message);
                $("#submit").val("Submit Payment").removeAttr('disabled');
                return; // Stop further execution
            }

            // Append the Stripe token to the form data
            const formData = new FormData(this);
            formData.append('stripeToken', token.id);
            submitForm(formData); // Submit form data with Stripe token
        }
    });

    // General form submission function
    function submitForm(formData) {
        $.ajax({
            type: "POST",
            url: $("#addFormAjaxData").attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".loaders").fadeIn("slow");
            },
            success: function (response) {
                handleResponse(response);
            },
            error: function () {
                toastr.error('Request failed.');
                $("#submit").val("Submit Payment").removeAttr('disabled');
                $(".loaders").fadeOut("slow");
            }
        });
    }

    // Handle the AJAX response
    function handleResponse(response) {
        try {
            const data = JSON.parse(response);
            if (data.status == 1) {
                toastr.success(data.message);
                $(".invoicepay").modal('hide');
                setTimeout(() => location.reload(true), 1000);
            } else {
                toastr.error(data.message);
                $('#error-box').show().html(data.message).delay(1000).fadeOut(800);
            }
        } catch (e) {
            $('#error-box').show().html('Unexpected error.').delay(1000).fadeOut(800);
        } finally {
            $("#submit").val("Submit Payment").removeAttr('disabled');
            $(".loaders").fadeOut("slow");
        }
    }
</script>



<!-- Stripe JS -->



<style>
    *{margin: 0;padding: 0}
    body{overflow-x: hidden;background: #000000}
    #bg-div{margin: 0;margin-top:100px;margin-bottom:100px}
    #border-btm{padding-bottom: 20px;margin-bottom: 0px;box-shadow: 0px 35px 2px -35px lightgray}
    #test{margin-top: 0px;margin-bottom: 40px;border: 1px solid #FFE082;border-radius: 0.25rem;width: 60px;height: 30px;background-color: #FFECB3}
    .active1{color: #00C853 !important;font-weight: bold}
    .bar4{width: 35px;height: 5px;background-color: #ffffff;margin: 6px 0}
    .list-group .tabs{color: #000000}
    #menu-toggle{height: 50px}
    #new-label{padding: 2px;font-size: 10px;font-weight: bold;background-color: red;color: #ffffff;border-radius: 5px;margin-left: 5px}
    #sidebar-wrapper{min-height: 100vh;margin-left: -15rem;-webkit-transition: margin .25s ease-out;-moz-transition: margin .25s ease-out;-o-transition: margin .25s ease-out;transition: margin .25s ease-out}
    #sidebar-wrapper .sidebar-heading{padding: 0.875rem 1.25rem;font-size: 1.2rem}
    #sidebar-wrapper .list-group{width: 15rem}
    #page-content-wrapper{min-width: 100vw;padding-left: 20px;padding-right: 20px}
    #wrapper.toggled #sidebar-wrapper{margin-left: 0}
    .list-group-item.active{z-index: 2;color: #fff;background-color: #fff !important;border-color: #fff !important}
    @media (min-width: 768px){
        #sidebar-wrapper{margin-left: 0}
        #page-content-wrapper{min-width: 0;width: 100%}
        #wrapper.toggled #sidebar-wrapper{margin-left: -15rem;display: none}}
        
        .card0{margin-top: 10px;margin-bottom: 10px}
        .top-highlight{color: #00C853;font-weight: bold;font-size: 20px}
        .form-card input, .form-card textarea{padding: 10px 15px 5px 15px;border: none;border: 1px solid lightgrey;border-radius: 6px;margin-bottom: 25px;margin-top: 2px;width: 100%;box-sizing: border-box;font-family: arial;color: #2C3E50;font-size: 14px;letter-spacing: 1px}
        .form-card input:focus, .form-card textarea:focus{-moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;-webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;box-shadow: 0px 0px 0px 1.5px skyblue !important;font-weight: bold;border: 1px solid skyblue;outline-width: 0}
        input.btn-success{height: 50px;color: #ffffff;opacity: 0.9}
        #below-btn a{font-weight: bold;color: #000000}
        .input-group{position:relative;width:100%;overflow:hidden}
        /* .input-group input{position:relative;height:90px;margin-left: 1px;margin-right: 1px;border-radius:6px;padding-top: 30px;padding-left: 25px} */
        .input-group label{position:absolute;height: 24px;background: none;border-radius: 6px;line-height: 48px;font-size: 15px;color: gray;width:100%;font-weight:100;padding-left: 25px}
        input:focus + label{color: #1E88E5}
        #qr{margin-bottom: 150px;margin-top: 50px}
</style>
<script>

$(document).ready(function(){
    //Menu Toggle Script
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // For highlighting activated tabs
    $("#tab1").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light"); 
        $("#tab1").addClass("active1");
        $("#tab1").removeClass("bg-light");
    });
    $("#tab2").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab2").addClass("active1");
        $("#tab2").removeClass("bg-light");
    });
    $("#tab3").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab3").addClass("active1");
        $("#tab3").removeClass("bg-light");
    });
})
</script>


<script>
function education_fields() {
    // Container where card details will be appended
    var container = document.getElementById("card-details-container");

    // Card details HTML structure
    var cardDetails = `
        <div class="card-details-group">
            <label for="card-number">Card Number</label>
            <input type="text" name="card_number[]" class="form-control" placeholder="Enter card number">

            <label for="expiry-date">Expiry Date</label>
            <input type="text" name="expiry_date[]" class="form-control" placeholder="MM/YY">

            <label for="cvv">CVV</label>
            <input type="text" name="cvv[]" class="form-control" placeholder="CVV">

            <button type="button" class="remove-card" onclick="removeCard(this)">Remove Card</button>
        </div>
    `;

    // Append card details to the container
    container.insertAdjacentHTML("beforeend", cardDetails);
}

// Function to remove a card field if needed
function removeCard(button) {
    button.parentElement.remove();
}

</script>
<style>
    .card-details-group {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .remove-card {
        margin-top: 10px;
        color: red;
        cursor: pointer;
        background: none;
        border: none;
    }
</style>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
        text-align: left;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
</style>

