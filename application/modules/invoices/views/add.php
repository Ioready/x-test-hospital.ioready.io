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
            margin-left: -5px;
            margin-right: -22px;
        }
    </style>
<div id="commonModal" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="addFormAjax" method="post" action="<?php echo base_url($formUrl) ?>" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> <?php echo "Add invoice" ?></h2>
                </div>
                <div class="modal-body">
                    <!-- <div class="loaders">
                        <img src="<?php echo base_url() . 'backend_asset/images/Preloader_2.gif'; ?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">

                       

                        <!-- Invoice Form Section -->
                        <div class="form-container">
                            <!-- Invoice Form -->
                            <div class="form-section">
                                <h2>Create new Invoice</h2>
                                <div class="form-group">
                                    <label for="header">Header <span class="required" style="color:red;">*</span></label>
                                    <select name="header" id="header" required>
                                    
                                    <?php  foreach($doctors as $row){ ?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->first_name.' '.$row->last_name;?></option>
                                        <?php } ?>
                                        <!-- <option value="Droitwich Knee Clinic & Bromsgrove P...">Droitwich Knee Clinic & Bromsgrove P...</option> -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="select-date">Select Date <span class="required" style="color:red;">*</span></label>
                                    <input type="date" name="invoice_date" id="invoice_date" required>
                                </div>

                                <div class="form-group">
                                    <label for="practitioner">Practitioner</label>
                                    
                                    <select name="practitioner" id="practitioner">
                                    <?php  foreach($practitioner as $row){
                                        if(!empty($row->name)){
                                         ?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                        <?php } } ?>
                                    </select>
                                    <!-- <input type="text" name="practitioner" id="practitioner" placeholder="Select Practitioner"> -->
                                </div>
                            </div>

                            <!-- Billing and Comments -->
                            <div class="form-section">
                                <h2>Billing</h2>
                                <div class="form-group">
                                    <label for="patient">Patient <span style="color:red;">*</span></label>
                                    
                                    <select name="patient" id="patient">
                                    <?php  foreach($patient as $row){ 
                                        if(!empty($row->name)){
                                            ?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                        <?php } } ?>
                                    </select>

                                    <!-- <input type="hidden" name="patient" id="patient" value="<?php echo $patient->id;?>"><h3><span><?php echo $patient->name;?></span></h3> -->
                                </div>

                                <div class="form-group">
                                    <label for="billing">Billing to <span style="color:red;">*</span></label>
                                    <select name="billing_to" id="billing_to">
                                    <option value="">Select Billing Type</option>
                                    <option value="Self Pay">Self Pay</option>
                                    <option value="Insurance">Insurance</option>
                                    <option value="Medicare">Medicare</option>
                                    <option value="Company">Company</option>
                                    <option value="Government Program">Government Program</option>
                                    <option value="Other">Other</option>
                                    </select>
                                </div>

                                <h2>Comments</h2>
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea name="notes" id="notes" placeholder="Enter notes"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="internal-notes">Internal notes</label>
                                    <textarea name="internal_notes" id="internal_notes" placeholder="Enter internal notes"></textarea>
                                </div>
                            </div>
                        </div>

                        
                        <div class="panel panel-default">
                        <!-- <div class="panel-heading">Dynamic Form Fields - Add & Remove Multiple fields</div> -->
                        <div class="panel-heading">Item Description</div>
                        <div class="panel-body">
                                       
                       <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <input type="search" class="form-control" id="products" name="products[]" onkeyup="myFunction()" placeholder="Products">
                            <input type="hidden" class="form-control" id="products_idss" name="products_idss[]" onkeyup="myFunction()" placeholder="Products">
                            
                            
                            
                            <!-- <div id="result_product"></div> -->
                        </div>
                    </div>
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <input type="text" class="form-control product_rate" id="rate" name="rate[]" placeholder="Rate" oninput="calculatePrice(this)" readonly>
                        </div>
                    </div>
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <input type="number" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity" oninput="calculatePrice(this)">
                        </div>
                    </div>
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <input type="number" class="form-control" id="price" name="price[]" value="" placeholder="Price" readonly>
                        </div>
                    </div>

                    <span id="productStock" style="color: red;"></span>
                            <div id="item_fields">
                            </div>

                            <div id="result_product"></div>
                        </div>
                        <!-- </div> -->
  
                            <!-- Total Amount at the bottom -->
                            <div class="save-invoice-section">
                                <div class="total-amount">
                                    Total amount:  <input type="text" class="form-control" id="total_price" name="total_price" value="" readonly>
                                    <!-- <span id="total_price"></span> -->
                                </div>
                                <button class="add-invoice-item" type="button"  onclick="education_fields();"> <span class="add-invoice-item" aria-hidden="true">+ Add invoice item</span> </button>

                                <!-- <button type="button" id="submit" class="add-invoice-item">+ Add invoice item</button> -->

                            </div>
                            <input type="hidden" name="id" value="<?php echo $results->id; ?>" />

                            <div class="space-22"></div>

   

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    
                    <button type="submit" id="submit" class="btn btn-sm btn-primary m-2 submit_stock"  style="background: #337ab7">Save invoice</button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<script>
    function calculatePrice(element) {
    // Find the parent element containing all inputs
    var parent = element.closest('.form-group').parentElement.parentElement;
    
    // Get the rate and quantity fields
    var rate = parent.querySelector('#rate').value;
    var quantity = parent.querySelector('#quantity').value;

    // Ensure rate and quantity are valid numbers
    rate = parseFloat(rate) || 0;
    quantity = parseFloat(quantity) || 0;

    // Calculate the price
    var price = rate * quantity;

    // Update the price field
    parent.querySelector('#price').value = price.toFixed(2); // display 2 decimal places

    updateTotalPrice();
    // parent.querySelector('#total_price').value = sum(price.toFixed(2));
}

function updateTotalPrice() {
    var total = 0;
    
    // Loop through all price fields and sum their values
    var prices = document.querySelectorAll('#price');
    prices.forEach(function(priceField) {
        var price = parseFloat(priceField.value) || 0;
        total += price;
    });

    // Update the total price field
    // document.getElementById('total_price').value = '£ '+ total.toFixed(2);
    document.getElementById('total_price').value = + total;
}


</script>
<script>
    var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('item_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group product_item"> <input type="search" class="form-control" id="product_item" name="products[]" placeholder="Products name" onkeyup="myProductFunction()"><input type="hidden" class="form-control" id="products_iditem" name="products_idss[]" onkeyup="myFunction()" placeholder="Products"><span id="productStockNew" style="color: red;"></span><div id="result_productsjkjk"></div></div></div><div class="col-sm-2 nopadding"><div class="form-group"> <input type="number" class="form-control product_rates" id="rate" name="rate[]" value="" placeholder="Rate" oninput="calculatePrice(this)" readOnly></div></div><div class="col-sm-2 nopadding"><div class="form-group"> <input type="number" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity" oninput="calculatePrice(this)"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="price" name="price[]" value="" placeholder="Price" readonly></div></div> <div class="col-sm-2"><div class="form-group">  <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span> </button></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest);
    updateTotalPrice();
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>
