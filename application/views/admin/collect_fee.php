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
                                <label class="form-label">Aadhaar Number</label><br>
                                <?= $admissionDetails->aadhaar; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Department</label><br>
                                <?= $admissionDetails->dept_name; ?>
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
                
                <div class="card m-2 shadow card-info">
                  <div class="card-header">
                      <h3 class="card-title">Transaction Amount Details</h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
                <!-- <div class="col-4">
                    <h6 class="font-weight-bold text-dark mt-3">Transaction Details</h6>        
                </div>
                <div class="col-8 text-right">
                    <h6 class="font-weight-bold text-dark mt-3">Next Due Date: <?php echo ($studentDetails->next_due_date != "0000-00-00") ? "<span class='text-danger'>".date('d-m-Y', strtotime($studentDetails->next_due_date))."</span>" : "----"; ?><?php echo "<button type='button' id='due_date_update' name='due_date_update' class='btn btn-outline-danger btn-sm ml-3'>Update</button>"; ?></h6>  
                    
                </div> -->
                   </div>
              <?php $rec = 0;   // to update Admisison Date
            //   print_r($transactionDetails);
                if($transactionDetails){
                    $rec = 0;
                    $table_setup = array ('table_open'=> '<table class="table table-hover font14">');
        			$this->table->set_template($table_setup);
        			$print_fields = array('S.No', 'Receipt', 'Date', 'Mode of Payment' ,'Amount');
        			$this->table->set_heading($print_fields);
        			
        			$transactionTypes = array("1" => "Cash", "2"=>"Cheque/DD", "3"=>"Online Payment");
        			
        			$i = 1; $total = 0;
        			foreach ($transactionDetails as $transactionDetails1){
        			    
        			    $trans = null;
        			    if($transactionDetails1->transaction_type == 1){
        			        $trans = $transactionTypes[$transactionDetails1->transaction_type];
        			    }
        			    if($transactionDetails1->transaction_type == 2){
        			        $trans = $transactionTypes[$transactionDetails1->transaction_type]."<br> No:".$transactionDetails1->reference_no.'<br> Dt:'.date('d-m-Y', strtotime($transactionDetails1->reference_date)).' <br> Bank: '.$transactionDetails1->bank_name;
        			    }
        			    if($transactionDetails1->transaction_type == 3){
        			       $trans = $transactionTypes[$transactionDetails1->transaction_type]."<br> No:".$transactionDetails1->reference_no.'<br> Dt:'.date('d-m-Y', strtotime($transactionDetails1->reference_date));
        			    }
        			    
        			    // if($transactionDetails1->transaction_status == 1){
        			    //     $transaction_status = "<span class='text-success'>Verified</span>";
        			    // }else if($transactionDetails1->transaction_status == 2){
        			    //     $transaction_status = "<span class='text-danger'>Cancelled</span><br><span class='text-dark'>".nl2br($transactionDetails1->remarks)."</span>";
        			    // }else{
        			        
        			    //     $transaction_status = "<span class='text-warning'>Processing</span> <br>".anchor('admin/approvePayment/'.$transactionDetails1->id,'Approve','class="btn btn-info btn-sm"').' '.anchor('admin/deletePayment/'.$transactionDetails1->id.'/'.$transactionDetails1->admissions_id,'Delete','class="btn btn-danger btn-sm"');
        			    // }
        			    
        				$result_array = array($i++, 
        				                    ($transactionDetails1->receipt_no) ? anchor('admin/downloadReceipt/'.$admissionDetails->id.'/'.$transactionDetails1->id, $transactionDetails1->receipt_no) : "-",
        				                    ($transactionDetails1->transaciton_date != "01-01-1970") ? date('d-m-Y', strtotime($transactionDetails1->transaciton_date)) : "-",
        				                    $trans,
        				                    number_format($transactionDetails1->amount,0),
        				                    $transaction_status
                                        );    
        			    $this->table->add_row($result_array);    
        			}
        			
            		echo $this->table->generate();
            		
                }else{
                    $rec = 1;
                    echo "<h6 class='text-left'> No transaction details found..! </h6>";
                }
            ?>
                
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
                <?php if ($this->session->flashdata('message')) { ?>
                                    <div align="center" class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
                                        <?php echo $this->session->flashdata('message') ?>
                                    </div>
                                    <?php } ?>
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
                                <input type="number" class="form-control" placeholder="Enter amount" id="cash_amount" name="cash_amount" value="" >
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
                                <input type="number" class="form-control" placeholder="Enter amount" id="cheque_dd_amount" name="cheque_dd_amount" value="" >
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
                                <input type="number" class="form-control" placeholder="Enter amount" id="transaction_amount" name="transaction_amount" value="" >
                    		    <span class="text-danger"><?php echo form_error('transaction_amount'); ?></span>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-danger btn-sm" type="submit">Collect Payment</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
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

            $('#cash_amount').keypress(function(e) {
                var a = [];
                var k = e.which;
                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0)){
                    e.preventDefault();
                    $(".error").css("display", "inline");
                }else{
                    $(".error").css("display", "none");
                }
                    
                setTimeout(function() { 
                    $('.error').fadeOut('slow'); 
                }, 2000); 
                
        });
        
        $('#cheque_dd_amount').keypress(function(e) {
                var a = [];
                var k = e.which;
                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0)){
                    e.preventDefault();
                    $(".error").css("display", "inline");
                }else{
                    $(".error").css("display", "none");
                }
                    
                setTimeout(function() { 
                    $('.error').fadeOut('slow'); 
                }, 2000); 
                
        });
        
        $('#transaction_amount').keypress(function(e) {
                var a = [];
                var k = e.which;
                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0)){
                    e.preventDefault();
                    $(".error").css("display", "inline");
                }else{
                    $(".error").css("display", "none");
                }
                    
                setTimeout(function() { 
                    $('.error').fadeOut('slow'); 
                }, 2000); 
                
        });
        });
    })
</script>