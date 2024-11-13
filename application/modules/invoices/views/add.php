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
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
    <!-- Close Button -->
    <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 24px; cursor: pointer; color: #333;">
        <span aria-hidden="true">&times;</span><span style="font-size: 14px; margin-left: 5px;">Close</span>
    </button>

    <!-- Modal Title -->
    <h2 style="font-size: 20px; font-weight: bold; color: #007bff; margin: 0;">
        <i class="fa fa-pencil" style="margin-right: 10px;"></i> <?php echo "Add invoice"; ?>
    </h2>
</div>

                <div class="modal-body"style="padding: 20px;" >
                    <!-- <div class="loaders">
                        <img src="<?php echo base_url() . 'backend_asset/images/Preloader_2.gif'; ?>" class="loaders-img" class="img-responsive">
                    </div> -->
                    <div class="alert alert-danger" id="error-box" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">

                       

                          <!-- Form Body -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">

<!-- Invoice Form Section -->
<div style="flex: 1; min-width: 300px;">

    <!-- Create New Invoice -->
    <h2 style="font-size: 20px; margin-bottom: 15px;">Create New Invoice</h2>

    <!-- Header -->
    <div style="margin-bottom: 15px;">
        <label for="header">Header <span style="color: red;">*</span></label>
        <select id="header" name="header" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;">
            <?php foreach ($doctors as $row) { ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->first_name . ' ' . $row->last_name; ?></option>
            <?php } ?>
        </select>
    </div>

    <!-- Select Date -->
    <div style="margin-bottom: 15px;">
        <label for="invoice_date">Select Date <span style="color: red;">*</span></label>
        <input type="date" id="invoice_date" name="invoice_date" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;">
    </div>

    <!-- Practitioner -->
    <div style="margin-bottom: 15px;">
        <label for="practitioner">Practitioner</label>
        <select id="practitioner" name="practitioner" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;">
            <?php foreach ($practitioner as $row) {
                if (!empty($row->name)) { ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>

<!-- Billing and Comments Section -->
<div style="flex: 1; min-width: 300px;">

    <!-- Billing -->
    <h2 style="font-size: 20px; margin-bottom: 15px;">Billing</h2>

    <div style="margin-bottom: 15px;">
        <label for="patient">Patient <span style="color: red;">*</span></label>
        <select id="patient" name="patient" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;">
            <?php foreach ($patient as $row) {
                if (!empty($row->name)) { ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
            <?php } } ?>
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="billing_to">Billing to <span style="color: red;">*</span></label>
        <select id="billing_to" name="billing_to" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;">
            <option value="">Select Billing Type</option>
            <option value="Self Pay">Self Pay</option>
            <option value="Insurance">Insurance</option>
            <option value="Medicare">Medicare</option>
            <option value="Company">Company</option>
            <option value="Government Program">Government Program</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <!-- Comments -->
    <h2 style="font-size: 20px; margin-bottom: 15px;">Comments</h2>

    <div style="margin-bottom: 15px;">
        <label for="notes">Notes</label>
        <textarea id="notes" name="notes" placeholder="Enter notes" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;"></textarea>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="internal_notes">Internal Notes</label>
        <textarea id="internal_notes" name="internal_notes" placeholder="Enter internal notes" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;"></textarea>
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
                            <div class="save-invoice-section mb-4">
                               
                               

                                    <!-- Total Amount Section -->
    <div style="margin-top: 20px; text-align: right;">
        <label>Total Amount:</label>
        <input type="text" id="total_price" name="total_price" value="£ 0.00" readonly style="padding: 10px; width: 150px; border: 1px solid #ced4da; border-radius: 4px;">
    </div>

    <!-- Add Item Button -->
    <button type="button" onclick="education_fields();" style="margin-top: 15px; padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">+ Add Invoice Item</button>

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
