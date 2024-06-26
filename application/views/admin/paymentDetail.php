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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Entrance Register Number</label><br>
                                <?= $admissionDetails->entrance_reg_no; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
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
                      <h3 class="card-title">Payment Amount Details</h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                              <?php echo anchor('admin/new_payment/'.$encryptId, '<i class="fas fa-plus fa-sm fa-fw"></i> Create New Payment ', 'class="btn btn-dark btn-sm"'); ?>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
           
                   </div>
              <?php $rec = 0;   // to update Admisison Date
          
                if($paymentDetail){
                    $rec = 0;
                    $table_setup = array ('table_open'=> '<table class="table table-hover font14">');
        			$this->table->set_template($table_setup);
        			$print_fields = array('S.No', 'Amount', 'Date',  'Status');
        			$this->table->set_heading($print_fields);
        			
                    $statusTypes = array("0" => "Not Paid", "1"=>"Paid", "2"=>"Failed", "3"=>"Processing");
        			
        			$i = 1; $total = 0;
        			foreach ($paymentDetail as $paymentDetails1){
        			    
        			  
        			   
        		
        			    
        				$result_array = array($i++, 
                        $paymentDetails1->final_fee,
                        $paymentDetails1->requested_on,
                        $statusTypes[$paymentDetails1->status]

                       

                                        );    
        			    $this->table->add_row($result_array);    
        			}
        			
            		echo $this->table->generate();
            		
                }else{
                    $rec = 1;
                    echo "<h6 class='text-left'> No payment details found..! </h6>";
                }
            ?>
                
                </div>
             
            
       
        </div>
        

    </section>
    <!-- /.content -->
</div>

