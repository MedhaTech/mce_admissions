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
                                <?= $this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"]; ?>
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
                                <label class="form-label">College Code</label><br>
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
                                <label class="form-label">Fees Receipt Number</label><br>
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
                    <?php // print_r($fees); 
                    ?>
                    <div class="row">
                        <!-- <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total College Fee + Corpus Fund - Concession Fee (Rs.)</label>
                                  <h4><?php echo number_format($fees->total_college_fee, 2) . ' + ' . number_format($fees->corpus_fund, 2) . ' - ' . number_format($studentDetails->concession_fee, 2); ?>
                                  </h4>
                              </div>
                          </div> -->
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">College Fee</label>
                                <h4><?php echo number_format($fees->total_college_fee, 2); ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Corpus Fund</label>
                                <h4><?php echo number_format($fees->corpus_fund, 2); ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Concession Fee</label>
                                <h4><?php echo number_format($fees->concession_fee, 2); ?>
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
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Total Fee (Rs.)</label>
                                <h4 class="text-primary"><?php echo number_format($fees->final_fee, 2); ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Paid Fee (Rs.)</label>
                                <h4 class="text-success"><?php echo number_format($paid_amount, 2); ?></h4>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Balance Fee (Rs.)</label>
                                <h4 class="text-danger">
                                    <?php $balance_amount = $fees->final_fee - $paid_amount;
                                    echo number_format($balance_amount, 2); ?>
                                </h4>
                                <!-- <?php echo anchor('', 'Pay Balance Fee', 'class="btn btn-danger btn-sm"'); ?> -->
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
                                <?php echo anchor('admin/new_payment/' . $encryptId, '<i class="fas fa-plus fa-sm fa-fw"></i> Create New Payment ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                </div>
                <?php $rec = 0;   // to update Admisison Date

                if ($paymentDetail) {
                    $rec = 0;
                    $table_setup = array('table_open' => '<table class="table table-hover font14">');
                    $this->table->set_template($table_setup);
                    $print_fields = array('S.No', 'Amount', 'Date',  'Status');
                    $this->table->set_heading($print_fields);

                    $statusTypes = array("0" => "Not Paid", "1" => "Paid", "2" => "Failed", "3" => "Processing");

                    $i = 1;
                    $total = 0;
                    foreach ($paymentDetail as $paymentDetails1) {





                        $result_array = array(
                            $i++,
                            number_format($paymentDetails1->final_fee, 2),
                            $paymentDetails1->requested_on,
                            $statusTypes[$paymentDetails1->status]



                        );
                        $this->table->add_row($result_array);
                    }

                    echo $this->table->generate();
                } else {
                    $rec = 1;
                    echo "<h6 class='text-left'> No payment details found..! </h6>";
                }
                ?>

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

                </div>
                <?php $rec = 0;   // to update Admisison Date
                //   print_r($transactionDetails);
                if ($transactionDetails) {
                    $rec = 0;
                    $table_setup = array('table_open' => '<table class="table table-hover font14">');
                    $this->table->set_template($table_setup);
                    $print_fields = array('S.No', 'Receipt', 'Date', 'Mode of Payment', 'Amount');
                    $this->table->set_heading($print_fields);

                    $transactionTypes = array("1" => "Cash", "2" => "DD", "3" => "Online Payment");

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



                        $result_array = array(
                            $i++,
                            ($transactionDetails1->receipt_no) ? anchor('admin/receiptletter/' . $admissionDetails->id . '/' . $transactionDetails1->id, $transactionDetails1->receipt_no) : "-",
                            ($transactionDetails1->transaction_date != "") ? date('d-m-Y', strtotime($transactionDetails1->transaction_date)) : "-",
                            $trans,
                            number_format($transactionDetails1->amount, 2),
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
                    <div class="col-md-8 offset-1">





                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">E
                                Learning
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="e_learning_fee" id="e_learning_fee" class="form-control" value="<?php echo (set_value('e_learning_fee')) ? set_value('e_learning_fee') : $fee_structure->e_learning_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('e_learning_fee', $stud_id);

                            if ($readonlyvalue) {
                                $readonly = "disabled";
                            } else {
                                $readonly = "";
                            }

                            ?>
                            <div class="col-md-1">
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="e_learning_fee_checkbox" value="<?php echo (set_value('e_learning_fee')) ? set_value('e_learning_fee') : $fee_structure->e_learning_fee; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Eligibility
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="eligibility_fee" id="eligibility_fee" class="form-control" value="<?php echo (set_value('eligibility_fee')) ? set_value('eligibility_fee') : $fee_structure->eligibility_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('eligibility_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="eligibility_fee_checkbox" value="<?php echo (set_value('eligibility_fee')) ? set_value('eligibility_fee') : $fee_structure->eligibility_fee; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">e
                                Consortium
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="e_consortium_fee" id="e_consortium_fee" class="form-control" value="<?php echo (set_value('e_consortium_fee')) ? set_value('e_consortium_fee') : $fee_structure->e_consortium_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('e_consortium_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="e_consortium_fee_checkbox" value="<?php echo (set_value('e_consortium_fee')) ? set_value('e_consortium_fee') : $fee_structure->e_consortium_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Sport
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="sport_fee" id="sport_fee" class="form-control" value="<?php echo (set_value('sport_fee')) ? set_value('sport_fee') : $fee_structure->sport_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('sport_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="sport_fee_checkbox" value="<?php echo (set_value('sport_fee')) ? set_value('sport_fee') : $fee_structure->sport_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Sports
                                Development
                                fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="sports_development_fee" id="sports_development_fee" class="form-control" value="<?php echo (set_value('sports_development_fee')) ? set_value('sports_development_fee') : $fee_structure->sports_development_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('sports_development_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="sports_development_fee_checkbox" value="<?php echo (set_value('sports_development_fee')) ? set_value('sports_development_fee') : $fee_structure->sports_development_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Career
                                Guidance &
                                Counseling fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="career_guidance_counseling_fee" id="career_guidance_counseling_fee" class="form-control" value="<?php echo (set_value('career_guidance_counseling_fee')) ? set_value('career_guidance_counseling_fee') : $fee_structure->career_guidance_counseling_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('career_guidance_counseling_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="career_guidance_counseling_fee_checkbox" value="<?php echo (set_value('career_guidance_counseling_fee')) ? set_value('career_guidance_counseling_fee') : $fee_structure->career_guidance_counseling_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">University
                                Development
                                fund</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="university_development_fund" id="university_development_fund" class="form-control" value="<?php echo (set_value('university_development_fund')) ? set_value('university_development_fund') : $fee_structure->university_development_fund; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('university_development_fund', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="university_development_fund_checkbox" value="<?php echo (set_value('university_development_fund')) ? set_value('university_development_fund') : $fee_structure->university_development_fund; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Promotion
                                of indian
                                Cultural Activities Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="promotion_of_indian_cultural_activities_fee" id="promotion_of_indian_cultural_activities_fee" class="form-control" value="<?php echo (set_value('promotion_of_indian_cultural_activities_fee')) ? set_value('promotion_of_indian_cultural_activities_fee') : $fee_structure->promotion_of_indian_cultural_activities_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('promotion_of_indian_cultural_activities_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="promotion_of_indian_cultural_activities_fee_checkbox" value="<?php echo (set_value('promotion_of_indian_cultural_activities_fee')) ? set_value('promotion_of_indian_cultural_activities_fee') : $fee_structure->promotion_of_indian_cultural_activities_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Teachers
                                Development
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="teachers_development_fee" id="teachers_development_fee" class="form-control" value="<?php echo (set_value('teachers_development_fee')) ? set_value('teachers_development_fee') : $fee_structure->teachers_development_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('teachers_development_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="teachers_development_fee_checkbox" value="<?php echo (set_value('teachers_development_fee')) ? set_value('teachers_development_fee') : $fee_structure->teachers_development_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Student
                                Development
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="student_development_fee" id="student_development_fee" class="form-control" value="<?php echo (set_value('student_development_fee')) ? set_value('student_development_fee') : $fee_structure->student_development_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('student_development_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="student_development_fee_checkbox" value="<?php echo (set_value('student_development_fee')) ? set_value('student_development_fee') : $fee_structure->student_development_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Indian
                                Red Cross
                                Membership Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="indian_red_cross_membership_fee" id="indian_red_cross_membership_fee" class="form-control" value="<?php echo (set_value('indian_red_cross_membership_fee')) ? set_value('indian_red_cross_membership_fee') : $fee_structure->indian_red_cross_membership_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('indian_red_cross_membership_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="indian_red_cross_membership_fee_checkbox" value="<?php echo (set_value('indian_red_cross_membership_fee')) ? set_value('indian_red_cross_membership_fee') : $fee_structure->indian_red_cross_membership_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Women
                                Cell
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="women_cell_fee" id="women_cell_fee" class="form-control" value="<?php echo (set_value('women_cell_fee')) ? set_value('women_cell_fee') : $fee_structure->women_cell_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('women_cell_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="women_cell_fee_checkbox" value="<?php echo (set_value('women_cell_fee')) ? set_value('women_cell_fee') : $fee_structure->women_cell_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">NSS
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="nss_fee" id="nss_fee" class="form-control" value="<?php echo (set_value('nss_fee')) ? set_value('nss_fee') : $fee_structure->nss_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('nss_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="nss_fee_checkbox" value="<?php echo (set_value('nss_fee')) ? set_value('nss_fee') : $fee_structure->nss_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">University
                                Registration
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="university_registration_fee" id="university_registration_fee" class="form-control" value="<?php echo (set_value('university_registration_fee')) ? set_value('university_registration_fee') : $fee_structure->university_registration_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('university_registration_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="university_registration_fee_checkbox" value="<?php echo (set_value('university_registration_fee')) ? set_value('university_registration_fee') : $fee_structure->university_registration_fee; ?>">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-12 col-form-label text-right font-weight-bold">
                                <hr />
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Admission
                                fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="admission_fee" id="admission_fee" class="form-control" value="<?php echo (set_value('admission_fee')) ? set_value('admission_fee') : $fee_structure->admission_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('admission_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="admission_fee_checkbox" value="<?php echo (set_value('admission_fee')) ? set_value('admission_fee') : $fee_structure->admission_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Processing
                                Fee paid
                                at
                                KEA</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="processing_fee_paid_at_kea" id="processing_fee_paid_at_kea" class="form-control" value="<?php echo (set_value('processing_fee_paid_at_kea')) ? set_value('processing_fee_paid_at_kea') : $fee_structure->processing_fee_paid_at_kea; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('processing_fee_paid_at_kea', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="processing_fee_paid_at_kea_checkbox" value="<?php echo (set_value('processing_fee_paid_at_kea')) ? set_value('processing_fee_paid_at_kea') : $fee_structure->processing_fee_paid_at_kea; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">Tution
                                Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="tution_fee" id="tution_fee" class="form-control" value="<?php echo (set_value('tution_fee')) ? set_value('tution_fee') : $fee_structure->tution_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('tution_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="tution_fee_checkbox" value="<?php echo (set_value('tution_fee')) ? set_value('tution_fee') : $fee_structure->tution_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right">College
                                Other Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="college_other_fee" id="college_other_fee" class="form-control" value="<?php echo (set_value('college_other_fee')) ? set_value('college_other_fee') : $fee_structure->college_other_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('college_other_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="college_other_fee_checkbox" value="<?php echo (set_value('college_other_fee')) ? set_value('college_other_fee') : $fee_structure->college_other_fee; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right font-weight-bold">Skill
                                Development Fee</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="skill_development_fee" id="skill_development_fee" class="form-control" value="<?php echo (set_value('skill_development_fee')) ? set_value('skill_development_fee') : $fee_structure->skill_development_fee; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('skill_development_fee', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="skill_development_fee_checkbox" value="<?php echo (set_value('skill_development_fee')) ? set_value('skill_development_fee') : $fee_structure->skill_development_fee; ?>">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right font-weight-bold">CORPUS
                                FUND</label>
                            <div class="col-md-6">
                                <input type="text" readonly name="corpus_fund" id="corpus_fund" class="form-control" value="<?php echo (set_value('corpus_fund')) ? set_value('corpus_fund') : $fee_structure->corpus_fund; ?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-1">
                                <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('corpus_fund', $stud_id);

                                if ($readonlyvalue) {
                                    $readonly = "disabled";
                                } else {
                                    $readonly = "";
                                }

                                ?>
                                <input type="checkbox" <?= $readonly; ?> name="fees[]" id="corpus_fund_checkbox" value="<?php echo (set_value('corpus_fund')) ? set_value('corpus_fund') : $fee_structure->corpus_fund; ?>">
                            </div>
                        </div>
                        <hr />

                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-5 col-form-label text-right font-weight-bold">TOTAL AMOUNT</label>
                            <div class="col-md-7">
                                <input type="text" name="final_fee" id="final_fee" class="form-control" value="" readonly>
                                <span class="text-danger"><?php echo form_error('final_fee'); ?></span>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="hidden" id="rec" name="rec" value="<?= $rec; ?>" readonly />
                        <input type="hidden" id="paid_amount" name="paid_amount" value="<?= $paid_amount; ?>" readonly />
                        <label class="form-label text-primary">Mode of Payment</label>

                        <div class="form-group  col-sm-12">
                            <label class="radio-inline mr-3">
                                <input type="radio" name="mode_of_payment" id="mode_of_payment" value="Cash"> Cash
                            </label>
                            <label class="radio-inline mr-3">
                                <input type="radio" name="mode_of_payment" id="mode_of_payment" value="ChequeDD"> DD
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
                                <input type="date" class="form-control" placeholder="Enter Date" id="cash_date" name="cash_date" value="">
                                <span class="text-danger"><?php echo form_error('cash_date'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">Reference No.:</label>
                                <input type="text" class="form-control" placeholder="Enter number" id="reference_id" name="reference_id" value="">
                                <span class="text-danger"><?php echo form_error('reference_id'); ?></span>
                            </div>
                            <!-- <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">Amount:</label>
                                <input type="number" class="form-control" placeholder="Enter amount" id="cash_amount" name="cash_amount" value="">
                                <span class="text-danger"><?php echo form_error('cash_amount'); ?></span>
                            </div> -->
                        </div>
                        <div id="cheque_dd_details">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">DD Date:</label>
                                <input type="date" class="form-control" placeholder="Enter Date" id="cheque_dd_date" name="cheque_dd_date" value="">
                                <span class="text-danger"><?php echo form_error('cheque_dd_date'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">DD Number:</label>
                                <input type="text" class="form-control" placeholder="Enter number" id="cheque_dd_number" name="cheque_dd_number" value="">
                                <span class="text-danger"><?php echo form_error('cheque_dd_number'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">Bank Name & Branch:</label>
                                <input type="text" class="form-control" placeholder="Enter bank name" id="cheque_dd_bank" name="cheque_dd_bank" value="">
                                <span class="text-danger"><?php echo form_error('cheque_dd_bank'); ?></span>
                            </div>
                            <!-- <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">Amount:</label>
                                <input type="number" class="form-control" placeholder="Enter amount" id="cheque_dd_amount" name="cheque_dd_amount" value="">
                                <span class="text-danger"><?php echo form_error('cheque_dd_amount'); ?></span>
                            </div> -->
                        </div>
                        <div id="online_payment_details">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">Transaction Date:</label>
                                <input type="date" class="form-control" placeholder="Enter Date" id="transaction_date" name="transaction_date" value="">
                                <span class="text-danger"><?php echo form_error('transaction_date'); ?></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">Transaction Reference ID:</label>
                                <input type="text" class="form-control" placeholder="Enter number" id="transaction_id" name="transaction_id" value="">
                                <span class="text-danger"><?php echo form_error('transaction_id'); ?></span>
                            </div>
                            <!-- <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label">Amount:</label>
                                <input type="number" class="form-control" placeholder="Enter amount" id="transaction_amount" name="transaction_amount" value="">
                                <span class="text-danger"><?php echo form_error('transaction_amount'); ?></span>
                            </div> -->
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
    $(document).ready(function() {
        var base_url = '<?php echo base_url(); ?>';

        $("#cash_details").hide();
        $("#cheque_dd_details").hide();
        $("#online_payment_details").hide();

        $('input[type=radio][name=mode_of_payment]').change(function() {
            if (this.value == "Cash") {
                $("#cash_details").show();
                $("#cheque_dd_details").hide();
                $("#online_payment_details").hide();
            }
            if (this.value == "ChequeDD") {
                $("#cash_details").hide();
                $("#cheque_dd_details").show();
                $("#online_payment_details").hide();
            }
            if (this.value == "OnlinePayment") {
                $("#cash_details").hide();
                $("#cheque_dd_details").hide();
                $("#online_payment_details").show();
            }

            $('#cash_amount').keypress(function(e) {
                var a = [];
                var k = e.which;
                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k) >= 0)) {
                    e.preventDefault();
                    $(".error").css("display", "inline");
                } else {
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

                if (!(a.indexOf(k) >= 0)) {
                    e.preventDefault();
                    $(".error").css("display", "inline");
                } else {
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

                if (!(a.indexOf(k) >= 0)) {
                    e.preventDefault();
                    $(".error").css("display", "inline");
                } else {
                    $(".error").css("display", "none");
                }

                setTimeout(function() {
                    $('.error').fadeOut('slow');
                }, 2000);

            });
        });
    })
</script>
<script>
    $(document).ready(function() {
        // Function to update final fee based on selected checkboxes
        function updateFinalFee() {
            var sum = 0;
            var corpusFundChecked = false;

            // Iterate over each checkbox that needs to be considered
            $('input[type="checkbox"]').each(function() {
                if ($(this).prop('checked')) {
                    var inputId = $(this).attr('id').replace('_checkbox', '');
                    var inputValue = parseFloat($('#' + inputId).val());

                    if ($(this).attr('id') === 'corpus_fund_checkbox') {
                        // If corpus_fund_checkbox is checked, uncheck all others
                        corpusFundChecked = true;
                        sum = inputValue; // Set sum to only the corpus fund value
                    } else {
                        // Add value to sum only if it's not corpus_fund_checkbox
                        sum += inputValue;
                    }
                }
            });

            // Update the final_fee input with the calculated sum
            $('#final_fee').val(sum.toFixed(2));

            // If corpus_fund_checkbox is checked, uncheck all other checkboxes
            if (corpusFundChecked) {
                $('input[type="checkbox"]').each(function() {
                    if ($(this).attr('id') !== 'corpus_fund_checkbox' && $(this).prop('checked')) {
                        $(this).prop('checked', false);
                    }
                });
            }
        }

        // Attach change event listener to relevant checkboxes
        $('input[type="checkbox"]').change(function() {
            updateFinalFee(); // Update the final fee whenever a checkbox changes
        });

        // Initialize final fee on page load
        updateFinalFee();
    });
</script>
<script>
      $(document).ready(function() {
          // Listen for form submission
          $('form').submit(function(event) {
              // Prevent the default form submission
              event.preventDefault();

              // Array to store selected checkbox values
              var selectedFees = [];

              // Iterate over each checked checkbox
              $('input[name="fees[]"]:checked').each(function() {
                  // Get the value of the checkbox (e.g., 'e_learning_fee')
                  var feeValue = $(this).val();

                  // Find the corresponding text field value based on feeValue
                  var textFieldValue = $('#' + feeValue).val();

                  // Prepare data for submission
                  selectedFees.push({
                      name: $(this).attr('id'),
                      value: feeValue,
                      textFieldValue: textFieldValue
                  });
              });
              var finalFee = $('#final_fee').val();

              // Add final fee and selectedFees array as hidden input fields to the form
              $('<input>').attr({
                  type: 'hidden',
                  name: 'final_fee',
                  value: finalFee
              }).appendTo('form');

              // Add selectedFees array as a hidden input field to the form
              $('<input>').attr({
                  type: 'hidden',
                  name: 'selected_fees',
                  value: JSON.stringify(selectedFees)
              }).appendTo('form');

              // Submit the form programmatically
              this.submit();
          });
      });
  </script>