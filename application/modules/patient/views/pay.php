<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<style>
    .modal-footer .btn + .btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }
</style>
<style>
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        } */

        /* .container {
            max-width: 1000px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        } */

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
<div id="commonModalPayPatient" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <form class="form-horizontal" role="form" id="addFormAjaxData" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                 -->
                 <form class="form-horizontal" role="form" id="addFormAjaxData" method="post" action="<?php echo site_url('/patient/process'); ?>" enctype="multipart/form-data">
               
            <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h2 class="modal-title"><?php echo "Add Payment on account" ?></h2>
                    <h4 style="margin-left: 233px;"><span><strong><?php echo $results->invoice_number;?></strong></span></h2>
                </div>
                <div class="modal-body">
                    
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">

                       

                        <!-- Invoice Form Section -->
                        <div class="form-container">
                            <!-- Invoice Form -->
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

                                    <!-- Card details will be added here -->
                                    <div id="card-details-container"></div>
                                </div>
    
                            </div>

                            <!-- Billing and Comments -->
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
                        <div class="total-amount">
                                    Total amount: £<?php echo $results->total_amount; ?>
                         </div>


                         <div class="card card0" style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; height:300px; overflow-y:auto">
    <div style="display: flex;" id="wrapper">


                         <div class="card card0" style="width: 100%;background-color: #f8f9fa; border-right: 1px solid #dee2e6; height: 58%;">
                                <div class="d-flex" id="wrapper">
                                    <!-- Sidebar -->
                                    <div class="bg-light border-right" id="sidebar-wrapper">
                                        <div class="sidebar-heading pt-5 pb-4"><strong>PAY WITH</strong></div>
                                        <div class="list-group list-group-flush customNavMenus"> 

                                           

                                    <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item bg-light">
                                        <div class="list-div my-2">
                                            <div class="fa fa-credit-card"></div> &nbsp;&nbsp; Card
                                        </div>
                                    </a>
                                    <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item bg-light">
                                        <div class="list-div my-2">
                                            <div class="fa fa-home"></div> &nbsp;&nbsp; Bank
                                        </div>
                                    </a>
                                    <a data-toggle="tab" href="#menu4" id="tab4" class="tabs list-group-item bg-light">
                                        <div class="list-div my-2">
                                            <div class="fa fa-money"></div> &nbsp;&nbsp; Cash
                                        </div>
                                    </a>
                                    <a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item bg-light">
                                        <div class="list-div my-2">
                                            <div class="fa fa-qrcode"></div> &nbsp;&nbsp;&nbsp; Visa QR <span id="new-label">NEW</span>
                                        </div>
                                    </a>

                                    <!-- Add the CSS and jQuery code -->
                                    <style>
                                    /* Subscribe me on Youtube
                                    https://bit.ly/3m9avif
                                    */

                                    #customNavMenus a{
                                        list-style:none;
                                        width:60px;
                                    }
                                    #customNavMenus a{
                                        cursor:pointer;
                                    }
                                    .active{
                                        /* background-color:royalblue; */
                                        /* color:white; */
                                    }

                                    /* Not nessessary css start */
                                    #customNavMenus a{display:inline-block;}

                                    </style>

                                <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

                                <script>
                       
                                $("#customNavMenus").on('click', 'a', function () {
                                    $("#customNavMenus a.active").removeClass("active");
                                    // adding classname 'active' to current click li 
                                    $(this).addClass("active");
                                });

                                </script>

                                            

                                        </div>
                                    </div> <!-- Page Content -->
                                    <div id="page-content-wrapper">

                                        <div class="tab-content">
                                        <div id="menu4" class="tab-pane">
                                                <div class="row justify-content-center">
                                                    <div class="col-11">
                                                        <div class="form-card">
                                                            <h3 class="mt-0 mb-4 text-center">Enter Cash details to pay</h3>
                                                            

                                                        <div class="row">
                                                       
                                                            <!-- Total Amount -->
                                                            <div class="form-group">
                                                                <label for="totalAmount">Total Amount</label>
                                                                <input type="number" class="form-control" id="totalAmount" name="totalAmount" placeholder="Enter total amount" readonly value="<?php echo $results->total_amount; ?>">
                                                            </div>

                                                            <!-- Cash Received -->
                                                            <div class="form-group">
                                                                <label for="cashReceived">Cash Received</label>
                                                                <input type="number" class="form-control" id="cashReceived" name="cashReceived" placeholder="Enter cash received" oninput="updateTotals()">
                                                            </div>

                                                            <!-- Total Paid -->
                                                            <div class="form-group">
                                                                <label for="totalPaid">Total Paid</label>
                                                                <input type="number" class="form-control" id="totalPaid" name="totalPaid" readonly>
                                                            </div>

                                                            <!-- Balance -->
                                                            <div class="form-group">
                                                                <label for="balance">Balance</label>
                                                                <input type="number" class="form-control" id="balance" readonly>
                                                            </div>
                                                       
                                                    </div>

                                                    <script>
                                                        function updateTotals() {
                                                            const totalAmount = parseFloat(document.getElementById('totalAmount').value) || 0;
                                                            const cashReceived = parseFloat(document.getElementById('cashReceived').value) || 0;

                                                            // Calculate Total Paid
                                                            const totalPaid = cashReceived;

                                                            // Calculate Balance
                                                            const balance = totalAmount - totalPaid;

                                                            // Update fields
                                                            document.getElementById('totalPaid').value = totalPaid.toFixed(2);
                                                            document.getElementById('balance').value = balance.toFixed(2);
                                                        }
                                                    </script>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div id="menu1" class="tab-pane">
                                                <div class="row justify-content-center">
                                                    <div class="col-11">
                                                        <!-- <div class="form-card">
                                                            <h3 class="mt-0 mb-4 text-center">Enter bank details to pay</h3>
                                                            
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group"> <input type="text" id="bk_nm" name="bank_name" placeholder="BBB Bank"> <label>BANK NAME</label> </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <div class="col-12">
                                                                        <div class="input-group"> <input type="text" name="ben_nm" id="ben-nm" placeholder="John Smith"> <label>BENEFICIARY NAME</label> </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="input-group"> <input type="text" name="ben_account" id="ben_account" placeholder="123456789"> <label>Bank Account</label> </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="input-group"> <input type="text" name="scode" placeholder="ABCDAB1S" class="placeicon" minlength="8" maxlength="11"> <label>SWIFT CODE</label> </div>
                                                                    </div>
                                                                </div>
                                                               
                                                        </div> -->

                                                        <div class="form-card">
                                                            <h3 class="mt-0 mb-4 text-center">Enter bank details to pay</h3>
                                                            <span>Cardholder's name:</span>
                                                                <input 
                                                                    type="text" name="user_name" id="user_name"
                                                                    class="form-control mb-3" 
                                                                    placeholder="Cardholder name" 
                                                                    
                                                                    title="Name should contain only letters and spaces" 
                                                                    >

                                                                    <span>Cardholder's Email:</span>
                                                                <input 
                                                                    type="email" name="email" id="email"
                                                                    class="form-control mb-3" 
                                                                    placeholder="text@email" 
                                                                    
                                                                    title="Name should contain only letters and spaces" 
                                                                    >
                                                                <br>

                                                        <label>Transaction ID:</label><input type="text" name="transaction_id" id="transaction_id" placeholder="Transaction ID">
                                                        <!-- <input type="text" name="bank_name" placeholder="BBB Bank"> -->
                                                        <!-- <input type="text" name="beneficiary_name" placeholder="John Smith"> -->
                                                        <!-- <input type="text" name="account_number" placeholder="123456789"> -->
                                                        <!-- <input type="text" name="swift_code" placeholder="ABCDAB1S"> -->
                                                        <label>Upload PDF Receipt:</label> <input type="file" name="receipt_pdf" accept=".pdf">
                                                        <label>Upload PNG Receipt:</label> <input type="file" name="receipt_png" accept=".png">

                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="menu2" class="tab-pane in active">
                                                <div class="row justify-content-center">
                                                    <div class="col-11">
                                                        
                                                        <div class="form-card">
                                                            <h3 class="mt-0 mb-4 text-center">Enter your card details to pay</h3>
                                                           
                                                                <span>Cardholder's name:</span>
                                                                <input 
                                                                    type="text" name="user_name" id="user_name"
                                                                    class="form-control mb-3" 
                                                                    placeholder="Cardholder name" 
                                                                    pattern="^[a-zA-Z\s]+$" 
                                                                    title="Name should contain only letters and spaces" 
                                                                    >

                                                                    <span>Cardholder's Email:</span>
                                                                <input 
                                                                    type="email" name="email" id="email"
                                                                    class="form-control mb-3" 
                                                                    placeholder="text@email" 
                                                                    
                                                                    title="Name should contain only letters and spaces" 
                                                                    >
                                                                <br>
                                                                <div class="form-control" id="card-element">

                                                                </div>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="menu3" class="tab-pane">
                                                <div class="row justify-content-center">
                                                    <div class="col-11">
                                                        <h3 class="mt-0 mb-4 text-center">Scan the QR code to pay</h3>
                                                        <div class="row justify-content-center" style="width: 200px;">
                                                            <!-- Display the QR Code Image -->
                                                            <?php if (!empty($qr_code_url)): ?>
                                                               
                                                                <img src="<?= $qr_code_url ?>" alt="Invoice QR Code">
                                                            <?php endif; ?>
                                                            <!-- <div id="qr"> <img src="https://i.imgur.com/DD4Npfw.jpg" width="200px" height="200px"> </div> -->
                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <!-- </div> -->
                        
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    
                    <button type="submit" id="submit" class="btn btn-sm btn-primary m-2"  style="background: #337ab7">Save invoice</button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

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
    $("#tab4").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab4").addClass("active1");
        $("#tab4").removeClass("bg-light");
    });
})
</script>

<script>
$(document).ready(function() {
    // Menu Toggle Script
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // Tab activation script
    $(".tabs").click(function () {
        $(".tabs").removeClass("active1 bg-light"); // Reset all tabs
        $(this).addClass("active1"); // Activate clicked tab
    });
});
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

