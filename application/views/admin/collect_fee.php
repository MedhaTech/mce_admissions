<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Admission Details
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                           
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Student Name</label><br>
                                <?= $admissionDetails->student_name; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Mobile</label><br>
                                <?= $admissionDetails->mobile; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Email</label><br>
                                <?= $admissionDetails->email; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">AAdhar Number</label><br>
                                <?= $admissionDetails->aadhar; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Department</label><br>
                                <?= $departmentDetails->dept_name; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Quota</label><br>
                                <?= $admissionDetails->quota; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Sub Quota</label><br>
                                <?= $admissionDetails->sub_quota; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Category Allocated</label><br>
                                <?= $admissionDetails->category_allotted; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Category Claimed</label><br>
                                <?= $admissionDetails->category_claimed; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">College Code</label><br>
                                <?= $admissionDetails->college_code; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Sports</label><br>
                                <?= $admissionDetails->sports; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Entrance Type</label><br>
                                <?= $admissionDetails->entrance_type; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Entrance Register Number</label><br>
                                <?= $admissionDetails->entrance_reg_no; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Entrance Exam Rank</label><br>
                                <?= $admissionDetails->entrance_rank; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Admission Order Number</label><br>
                                <?= $admissionDetails->admission_order_no; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Admission Order Date</label><br>
                                <?= $admissionDetails->admission_order_date; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Fees Paid</label><br>
                                <?= $admissionDetails->fees_paid; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Fees Receip Number</label><br>
                                <?= $admissionDetails->fees_receipt_no; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Fees Receipt Date</label><br>
                                <?= $admissionDetails->fees_receipt_date; ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="card m-2 shadow card-info">
                  <div class="card-header">
                      <h3 class="card-title">Student Fee Details</h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
                      <?php // print_r($fees); ?>
                      <div class="row">
                          <!-- <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total College Fee + Corpus Fund - Concession Fee (Rs.)</label>
                                  <h4><?php echo number_format($fees->total_college_fee,0).' + '.number_format($fees->corpus_fund,0).' - '.number_format($studentDetails->concession_fee,0); ?>
                                  </h4>
                              </div>
                          </div> -->
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">College Fee</label>
                                  <h4><?php echo number_format($fees->total_college_fee,0); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Corpus Fund</label>
                                  <h4><?php echo number_format($fees->corpus_fund,0); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Concession Fee</label>
                                  <h4><?php echo number_format($fees->concession_fee,0); ?>
                                  </h4>
                              </div>
                          </div>
                          <!-- <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total College Fee + Corpus Fund - Concession Fee
                                      (Rs.)</label>
                                  <h4><?php echo number_format($fees->total_college_fee,0).' + '.number_format($fees->corpus_fund,0).' - '.number_format($studentDetails->concession_fee,0); ?>
                                  </h4>
                              </div>
                          </div> -->
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Total Fee (Rs.)</label>
                                  <h4 class="text-primary"><?php echo number_format($fees->final_fee,2); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Paid Fee (Rs.)</label>
                                  <h4 class="text-success"><?php echo number_format($paid_amount,2); ?></h4>
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Balance Fee (Rs.)</label>
                                  <h4 class="text-danger">
                                      <?php $balance_amount = $fees->final_fee - $paid_amount; 
                                        echo number_format($balance_amount,2); ?>
                                  </h4>
                                  <!-- <?php echo anchor('','Pay Balance Fee','class="btn btn-danger btn-sm"'); ?> -->
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
            
            <!-- /.col -->
            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Payment Mode
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                           
                        </ul>
                    </div>
                </div>
                
                <div class="card-body">
                <?php echo form_open_multipart($action, 'class="user"'); ?>
                <div class="col-md-6 col-sm-12">
                        <input type="hidden" id="rec" name="rec" value="<?=$rec;?>" readonly/>
                        <input type="hidden" id="paid_amount" name="paid_amount" value="<?=$paid_amount;?>" readonly/>
                        <label class="form-label text-primary">Mode of Payment</label>
                        
                        <div class="form-group  col-sm-12">
                            <label class="radio-inline mr-3">
                              <input type="radio" name="mode_of_payment" id="mode_of_payment" value="Cash"> Cash
                            </label>
                            <label class="radio-inline mr-3">
                              <input type="radio" name="mode_of_payment" id="mode_of_payment" value="ChequeDD"> Cheque/DD
                            </label>
                            <label class="radio-inline mr-3">
                              <input type="radio" name="mode_of_payment" id="mode_of_payment" value="OnlinePayment"> Online Payment
                            </label>    
                            <span class="text-danger"><?php echo form_error('mode_of_payment'); ?></span>
                        </div>
                        
                        <div id="cash_details">
                            <h6 class="form-label text-primary">Pay by cash in MCE College Accounts Office.</h6>
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Paid Date:</label>
                                <input type="date" class="form-control" placeholder="Enter Date" id="cash_date" name="cash_date" value="" >
                        		<span class="text-danger"><?php echo form_error('cash_date'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Amount:</label>
                                <input type="text" class="form-control" placeholder="Enter amount" id="cash_amount" name="cash_amount" value="" >
                    		    <span class="text-danger"><?php echo form_error('cash_amount'); ?></span>
                            </div>
                        </div>
                        <div id="cheque_dd_details">
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Cheque/DD Date:</label>
                                <input type="date" class="form-control" placeholder="Enter Date" id="cheque_dd_date" name="cheque_dd_date" value="" >
                        		<span class="text-danger"><?php echo form_error('cheque_dd_date'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Cheque/DD Number:</label>
                                <input type="text" class="form-control" placeholder="Enter number" id="cheque_dd_number" name="cheque_dd_number" value="" >
                    		    <span class="text-danger"><?php echo form_error('cheque_dd_number'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Bank Name & Branch:</label>
                                <input type="text" class="form-control" placeholder="Enter bank name" id="cheque_dd_bank" name="cheque_dd_bank" value="" >
                    		    <span class="text-danger"><?php echo form_error('cheque_dd_bank'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Amount:</label>
                                <input type="text" class="form-control" placeholder="Enter amount" id="cheque_dd_amount" name="cheque_dd_amount" value="" >
                    		    <span class="text-danger"><?php echo form_error('cheque_dd_amount'); ?></span>
                            </div>
                        </div>
                        <div id="online_payment_details">
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Transaction Date:</label>
                                <input type="date" class="form-control" placeholder="Enter Date" id="transaction_date" name="transaction_date" value=""  >
                        		<span class="text-danger"><?php echo form_error('transaction_date'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Transaction Reference ID:</label>
                                <input type="text" class="form-control" placeholder="Enter number" id="transaction_id" name="transaction_id" value="" >
                    		    <span class="text-danger"><?php echo form_error('transaction_id'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">    
                                <label class="form-label">Amount:</label>
                                <input type="text" class="form-control" placeholder="Enter amount" id="transaction_amount" name="transaction_amount" value="" >
                    		    <span class="text-danger"><?php echo form_error('transaction_amount'); ?></span>
                            </div>
                        </div>
                      </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
           

        

    </section>
    <!-- /.content -->
</div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
        
        $("#cash_details").hide();
        $("#cheque_dd_details").hide();
        $("#online_payment_details").hide();
        
        $('input[type=radio][name=mode_of_payment]').change(function() {
            if(this.value == "Cash"){
                $("#cash_details").show();
                $("#cheque_dd_details").hide();
                $("#online_payment_details").hide();
            }
            if(this.value == "ChequeDD"){
                $("#cash_details").hide();
                $("#cheque_dd_details").show();
                $("#online_payment_details").hide();
            }
            if(this.value == "OnlinePayment"){
                $("#cash_details").hide();
                $("#cheque_dd_details").hide();
                $("#online_payment_details").show();
            }
        });
    })
</script>