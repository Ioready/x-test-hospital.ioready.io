
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<style>
    .modal-footer .btn + .btn {
        margin-bottom: 5px !important;
        margin-left: 5px;
    }
</style>
<style>
   
   /* body {
     background-color: #f8f9fa;
     font-family: Arial, sans-serif;
   } */
   /* .container {
     background-color: #fff;
     padding: 2rem;
     border-radius: 8px;
     box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
   } */
   .invoice-header {
     display: flex;
     justify-content: space-between;
     align-items: center;
   }
   .invoice-header img {
     width: 100px;
   }
   .invoice-info {
     font-size: 0.9rem;
     color: #6c757d;
   }
   .invoice-title {
     font-size: 1.5rem;
     font-weight: bold;
     color: #333;
   }
   .table {
     margin-top: 1rem;
   }
   .table th, .table td {
     vertical-align: middle;
   }
   .table thead th {
     background-color: #e9ecef;
     color: #333;
   }
   .table tbody tr:last-child td {
     border-top: 2px solid #dee2e6;
   }
   .terms {
     font-size: 0.85rem;
     color: #6c757d;
     margin-top: 1.5rem;
   }
   @media (max-width: 767px) {
     .invoice-header {
       flex-direction: column;
       align-items: center;
     }
     .invoice-header img {
       margin-bottom: 15px;
     }
     .invoice-title, .invoice-info, .billed-to {
       text-align: center;
     }
   }
 </style>


<div id="commonModalReceipt" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
               
            <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h5 style="text-align:center; margin-left: auto;"><strong><?php echo "Patient invoice details" ?></strong></h5>
                    <button onclick="generatePDF()" class="btn btn-outline-success" style="margin-left: 60%;"> <i class="fa fa-download"></i> Download</button>

                </div>
                
                <div class="modal-body" id="patient-invoice">
                    <div class="form-body">
                        <div class="row">
                          <div class="my-5">
                                  <div class="invoice-header">
                                      <div>
                                          <img src="https://ioready.io/wp-content/uploads/2024/02/cropped-your_vision_ourinnovation__500_x_500_px_-removebg-preview.png" alt="Logo">
                                          <p class="invoice-info">
                                          ioready, 33-02, Persiaran Austin Heights, Taman Mount Austin, 81100 Johor Bahru, Johor, Malaysia
                                          </p>
                                      </div>
                                      <div class="text-right">
                                          <h4 class="invoice-title">ioready</h4>
                                          <p class="invoice-info">
                                          info@ioready.io<br>
                                          +60 14-715 6675
                                          </p>
                                      </div>
                                      </div>
                                      <div class="row my-4">
                                      <div class="col-md-6">
                                          <p class="invoice-info">
                                          <strong>Invoice Date:</strong> <?php echo $results->invoice_date;?><br>
                                          <strong>Due Date:</strong> 31-07-2024<br>
                                          <?php if($results->status =='Paid'){?>
                                          <strong>Status:</strong> <span class="paid" style="background:green;color:white;"></span><?php echo $results->status;?> 
                                          <?php }else{?>
                                            <strong>Status:</strong><h3> <span class="outstanding" style="color:green;"></span></h3><?php echo $results->status;?> 
                                          <?php }?>
                                          </p>
                                      </div>
                                      <div class="col-md-6 text-md-right">
                                          <h5 class="invoice-title"><?php echo $results->invoice_number;?></h5>
                                      </div>
                                      </div>
                                      <div class="row my-4">
                                      <div class="col-md-12 billed-to">
                                          <p><strong>Billed To:</strong><br>
                                          <strong><?php echo $results->patient_name;?></strong><br>
                                          <?php echo $results->patient_email;?><br>
                                          ioready-2
                                          </p>
                                      </div>
                                      </div>
                                      <div class="table-responsive">
                                      <table class="table table-bordered">
                                          <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Item</th>
                                              <th>Quantity</th>
                                              <th>Unit Price</th>
                                              <th>Tax</th>
                                              <th>Price (USD)</th>
                                          </tr>
                                          </thead>
                                          <tbody>

                                            <?php  $i=0;
                                            foreach($resultsItem as $rows){ 
                                              $i++;
                                              ?>
                                          <tr>
                                             
                                              <td><?php echo $i?></td>
                                              <td><?php echo $rows->product_name; ?></td>
                                                    <td><?php echo $rows->rate; ?></td>
                                                    <td><?php echo $rows->quantity; ?> Pcs</td>
                                                    <td>10%</td>
                                                    <td><?php echo $rows->total_price; ?></td>
                                          </tr>
                                          <?php }?>
                                          <tr>
                                              <td colspan="5" class="text-right"><strong>Sub Total:</strong></td>
                                              <td>$<?php echo $results->total_amount;?></td>
                                          </tr>
                                          <tr>
                                              <td colspan="5" class="text-right"><strong>VAT (10%):</strong></td>
                                              <td>$0.00</td>
                                          </tr>
                                          <tr>
                                              <td colspan="5" class="text-right"><strong>Total:</strong></td>
                                              <td>$<?php echo $results->total_amount;?></td>
                                          </tr>
                                          <tr>
                                              <td colspan="5" class="text-right"><strong>Total Paid:</strong></td>
                                              <td>$<?php echo $results->Paid;?> <h3><span style="color:green;"><strong> Done</strong></span></h3></td>
                                          </tr>
                                          </tbody>
                                      </table>
                                      </div>
                                      <div class="terms">
                                      <p><strong>Terms and Conditions</strong><br>
                                      Thank you for your business.</p>
                                      </div>
                              </div>
                          </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                  </div>
            
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<script>
    function generatePDF() {
        const element = document.getElementById('patient-invoice');
        
        html2pdf(element, {
            margin: 10,
            filename: 'patient-invoice_receipt.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    }
</script>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>

