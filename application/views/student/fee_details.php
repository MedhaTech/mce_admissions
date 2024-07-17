  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="card card-info shadow mb-2">
                  <?php if ($this->session->flashdata('process')) : ?>
                      <div class="alert alert-danger">
                          <?php echo $this->session->flashdata('process'); ?>
                      </div>
                  <?php endif; ?>
                  <div class="card-header">
                      <h3 class="card-title">FEE DETAILS </h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                  <?php echo anchor('student/dashboard', '<i class="fas fa-tachometer-alt"></i> Dashboard ', 'class="btn btn-dark btn-sm"'); ?>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">

                      <div class="row">
                          <!-- <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total College Fee + Corpus Fund - Concession Fee (Rs.)</label>
                                  <h4><?php echo number_format($fees->total_college_fee, 0) . ' + ' . number_format($fees->corpus_fund, 0) . ' - ' . number_format($studentDetails->concession_fee, 0); ?>
                                  </h4>
                              </div>
                          </div> -->
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">College Fee</label>
                                  <h4><?php echo number_format($fees->total_college_fee, 0); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Corpus Fund</label>
                                  <h4><?php echo number_format($fees->corpus_fund, 0); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Concession Fee</label>
                                  <h4><?php echo number_format($fees->concession_fee, 0); ?>
                                  </h4>
                              </div>
                          </div>
                          <!-- <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total College Fee + Corpus Fund - Concession Fee
                                      (Rs.)</label>
                                  <h4><?php echo number_format($fees->total_college_fee, 0) . ' + ' . number_format($fees->corpus_fund, 0) . ' - ' . number_format($studentDetails->concession_fee, 0); ?>
                                  </h4>
                              </div>
                          </div> -->
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total Fee (Rs.)</label>
                                  <h4 class="text-primary"><?php echo number_format($fees->final_fee, 2); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Paid Fee (Rs.)</label>
                                  <h4 class="text-success"><?php echo number_format($paid_amount, 2); ?></h4>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Balance Fee (Rs.)</label>
                                  <h4 class="text-danger">
                                      <?php $balance_amount = $fees->final_fee - $paid_amount;
                                        echo number_format($balance_amount, 2); ?>
                                  </h4>

                                  <!-- <?php echo form_open_multipart($action, 'class="user"'); ?>

                                  <input type="hidden" name="usn" id="usn" value="<?= $student->adm_no; ?>">
                                  <input type="hidden" name="name" id="name" value="<?= $student->student_name; ?>">
                                  <input type="hidden" name="email" id="email" value="<?= $student->email; ?>">
                                  <input type="hidden" name="mobile" id="mobile" value="<?= $student->mobile; ?>">
                                  <input type="hidden" name="amount" id="amount" value="<?= $balance_amount; ?>">
                                  <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"> Pay Balance Fee </button>
                                 
                                  </form> -->
                              </div>
                          </div>
                      </div>

                  </div>
              </div>

              <div class="card m-2 shadow card-info">
                  <div class="card-header">
                      <h3 class="card-title">Payment Amount Details</h3>
                      <div class="card-tools">

                      </div>
                  </div>
                  <div class="card-body">

                  </div>
                  <?php $rec = 0;   // to update Admisison Date

                    if ($paymentDetail) {
                        $rec = 0;
                        $table_setup = array('table_open' => '<table class="table table-hover font14">');
                        $this->table->set_template($table_setup);
                        $print_fields = array('S.No', 'Amount', 'Date',  'Status','Action');
                        $this->table->set_heading($print_fields);

                        $statusTypes = array("0" => "Not Paid", "1" => "Paid", "2" => "Failed", "3" => "Processing");

                        $i = 1;
                        $total = 0;
                        foreach ($paymentDetail as $paymentDetails1) {


                            if ($paymentDetails1->status == 0) {

                                $action1 ='<form action="' . base_url(htmlspecialchars($action)) . '" method="post" class="user">
        <input type="hidden" name="usn" id="usn" value="' . htmlspecialchars($student->adm_no) . '">
        <input type="hidden" name="name" id="name" value="' . htmlspecialchars($student->student_name) . '">
        <input type="hidden" name="email" id="email" value="' . htmlspecialchars($student->email) . '">
        <input type="hidden" name="aided_unaided" id="aided_unaided" value="' . htmlspecialchars($student->sub_quota) . '">
        <input type="hidden" name="mobile" id="mobile" value="' . htmlspecialchars($student->mobile) . '">
        <input type="hidden" name="amount" id="amount" value="' . htmlspecialchars($paymentDetails1->final_fee) . '">
          <input type="hidden" name="type" id="type" value="' . htmlspecialchars($paymentDetails1->type) . '">
          <input type="hidden" name="pay_id" id="pay_id" value="' . htmlspecialchars($paymentDetails1->id) . '">
        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update">Pay Now</button>
    </form>';

                                $result_array = array(
                                    $i++,
                                    $paymentDetails1->final_fee,
                                    $paymentDetails1->requested_on,
                                    $statusTypes[$paymentDetails1->status],
                                    $action1



                                );
                                $this->table->add_row($result_array);
                            }
                        }

                        echo $this->table->generate();
                    } else {
                        $rec = 1;
                        echo "<h6 class='text-left'> No payment details found..! </h6>";
                    }
                    ?>

              </div>

              <div class="card shadow card-info">
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
                    <h6 class="font-weight-bold text-dark mt-3">Next Due Date: <?php echo ($studentDetails->next_due_date != "0000-00-00") ? "<span class='text-danger'>" . date('d-m-Y', strtotime($studentDetails->next_due_date)) . "</span>" : "----"; ?><?php echo "<button type='button' id='due_date_update' name='due_date_update' class='btn btn-outline-danger btn-sm ml-3'>Update</button>"; ?></h6>  
                    
                </div> -->
                  </div>
                  <?php $rec = 0;   // to update Admisison Date
                    //   print_r($transactionDetails);
                    if ($transactionDetails) {
                        $rec = 0;
                        $table_setup = array('table_open' => '<table class="table table-hover font14">');
                        $this->table->set_template($table_setup);
                        $print_fields = array('S.No', 'Receipt', 'Date', 'Mode of Payment', 'Amount');
                        $this->table->set_heading($print_fields);

                        $transactionTypes = array("1" => "Cash", "2" => "Cheque/DD", "3" => "Online Payment");

                        $i = 1;
                        $total = 0;
                        foreach ($transactionDetails as $transactionDetails1) {

                            $trans = null;
                            if ($transactionDetails1->transaction_type == 1) {
                                $trans = $transactionTypes[$transactionDetails1->transaction_type];
                            }
                            if ($transactionDetails1->transaction_type == 2) {
                                $trans = $transactionTypes[$transactionDetails1->transaction_type] . "<br> No:" . $transactionDetails1->reference_no . '<br> Dt:' . date('d-m-Y', strtotime($transactionDetails1->reference_date)) . ' <br> Bank: ' . $transactionDetails1->bank_name;
                            }
                            if ($transactionDetails1->transaction_type == 3) {
                                $trans = $transactionTypes[$transactionDetails1->transaction_type] . "<br> No:" . $transactionDetails1->reference_no . '<br> Dt:' . date('d-m-Y', strtotime($transactionDetails1->reference_date));
                            }

                            // if($transactionDetails1->transaction_status == 1){
                            //     $transaction_status = "<span class='text-success'>Verified</span>";
                            // }else if($transactionDetails1->transaction_status == 2){
                            //     $transaction_status = "<span class='text-danger'>Cancelled</span><br><span class='text-dark'>".nl2br($transactionDetails1->remarks)."</span>";
                            // }else{

                            //     $transaction_status = "<span class='text-warning'>Processing</span> <br>".anchor('admin/approvePayment/'.$transactionDetails1->id,'Approve','class="btn btn-info btn-sm"').' '.anchor('admin/deletePayment/'.$transactionDetails1->id.'/'.$transactionDetails1->admissions_id,'Delete','class="btn btn-danger btn-sm"');
                            // }

                            $result_array = array(
                                $i++,
                                ($transactionDetails1->receipt_no) ? anchor('student/downloadReceipt/' . $transactionDetails1->admissions_id . '/' . $transactionDetails1->id, $transactionDetails1->receipt_no) : "-",
                                ($transactionDetails1->transaction_date != "") ? date('d-m-Y', strtotime($transactionDetails1->transaction_date)) : "-",
                                $trans,
                                number_format($transactionDetails1->amount, 0),
                                $transaction_status
                            );
                            $this->table->add_row($result_array);
                        }

                        echo $this->table->generate();
                    } else {
                        $rec = 1;
                        echo "<h6 class='text-left'> No transaction details found..! </h6>";
                    }
                    ?>

              </div>
          </div>
      </section>
  </div>
  <script>
      $(document).ready(function() {
          // Function to calculate totals
          function calculateTotals() {
              var totalMinMarks = 0;
              var totalMaxMarks = 0;
              var totalObtainedMarks = 0;

              // Loop through each row
              $('tbody tr').each(function() {
                  var minMarks = parseFloat($(this).find('input[name$="_min_marks"]').val()) || 0;
                  var maxMarks = parseFloat($(this).find('input[name$="_max_marks"]').val()) || 0;
                  var obtainedMarks = parseFloat($(this).find('input[name$="_obtained_marks"]').val()) || 0;

                  totalMinMarks += minMarks;
                  totalMaxMarks += maxMarks;
                  totalObtainedMarks += obtainedMarks;
              });

              // Update total fields
              $('#total_min_marks').val(totalMinMarks);
              $('#total_max_marks').val(totalMaxMarks);
              $('#total_obtained_marks').val(totalObtainedMarks);

              // Calculate aggregate percentage
              var aggregate = (totalObtainedMarks / totalMaxMarks) * 100;
              $('#aggregate').val(aggregate.toFixed(2) + '%');

          }

          // Calculate totals on input change
          $('input[type="number"]').on('input', calculateTotals);

      });
  </script>