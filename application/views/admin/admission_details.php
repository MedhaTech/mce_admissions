  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="col-md-3 text-left">
            <span class="badge badge-<?= $admissionStatusColor[$studentDetails->status]; ?>"><?= $admissionStatus[$studentDetails->status]; ?></span>
            <h1 class="h4 mb-0 text-gray-800"><?= $studentDetails->student_name . ' Details'; ?></h1>
          </div>
          <div class="col-md-9 text-right">
            <?php
            //   if($studentDetails->status == 2){
            //     echo anchor('admin/confirm/'.$studentDetails->id,'<span class="icon"><i class="far fa-thumbs-up"></i></span><span class="text">CONFIRM</span>','class="btn btn-success btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
            //     $pay_status = 'Fee payment transaction verified.';
            //   }else{
            //     $pay_status = 'waiting for fee payment verification.';
            //   }
            echo anchor('admin/downloadIdentityCard/' . $studentDetails->id, '<span class="icon"><i class="far fa-id-card"></i></span><span class="text">ID CARD</span>', 'class="btn btn-info btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');

            if ($user_type == 1 || $user_type == 2) {
              if ($studentDetails->status != 7) {
                echo anchor('admin/updateStatus/' . $studentDetails->id . '/7', '<span class="icon"><i class="fas fa-archive"></i></span><span class="text">Archive</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              } else {
                echo anchor('admin/updateStatus/' . $studentDetails->id . '/1', '<span class="icon"><i class="fas fa-archive"></i></span><span class="text">UnArchive</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              }
            }


            if ($user_type == 1) {
              if ($studentDetails->status != 6) {
                echo anchor('admin/updateStatus/' . $studentDetails->id . '/6', '<span class="icon"><i class="fas fa-times-circle"></i></span><span class="text">Cancel</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              }
              if ($studentDetails->status == 2) {
                echo anchor('admin/confirm/' . $studentDetails->id, '<span class="icon"><i class="far fa-thumbs-up"></i></span><span class="text">CONFIRM</span>', 'class="btn btn-success btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
                echo anchor('admin/editAdmissionDetails/' . $studentDetails->id, '<span class="icon"><i class="fas fa-edit"></i></span><span class="text">Edit</span>', 'class="btn btn-info btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              }
              if ($studentDetails->status == 1) {
                echo anchor('admin/confirm/' . $studentDetails->id, '<span class="icon"><i class="far fa-thumbs-up"></i></span><span class="text">CONFIRM</span>', 'class="btn btn-success btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
                echo anchor('admin/editAdmissionDetails/' . $studentDetails->id, '<span class="icon"><i class="fas fa-edit"></i></span><span class="text">Edit</span>', 'class="btn btn-info btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              }
            }

            if ($user_type == 2 || $user_type == 3) {
              if ($studentDetails->status == 2) {
                echo anchor('admin/editAdmission/' . $studentDetails->id, '<span class="icon"><i class="fas fa-edit"></i></span><span class="text">Edit</span>', 'class="btn btn-info btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              }
              if ($studentDetails->status == 1) {
                echo anchor('admin/editAdmission/' . $studentDetails->id, '<span class="icon"><i class="fas fa-edit"></i></span><span class="text">Edit</span>', 'class="btn btn-info btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              }
            }

            if ($user_type != 5) {
              if ($studentDetails->status == 1 || $studentDetails->status == 7) {
                echo anchor('admin/updateStatus/' . $studentDetails->id . '/3', '<span class="icon"><i class="far fa-pause-circle"></i></span><span class="text">On-Hold</span>', 'class="btn btn-warning btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              }

              if ($studentDetails->status != 1 && $studentDetails->status != 7) {
                echo anchor('admin/unfreeze/' . $studentDetails->id, '<span class="icon"><i class="fas fa-unlink"></i></span><span class="text">Unfreeze</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
              }
              //   echo anchor('admin/deleteAdmission/'.$studentDetails->id.'/'.$studentDetails->enq_id,'<span class="icon"><i class="fas fa-trash"></i></span><span class="text">Delete</span>','class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2"');
            }

            // echo '<button type="button" id="viewHodCommentsBtn" class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm mr-2">
            //             <span class="icon"><i class="fas fa-comments"></i></span><span class="text">Interview Report</span>
            //       </button>';

            $backAction = 'admin/admissions';
            echo anchor($backAction, '<span class="icon"><i class="fas fa-arrow-left"></i></span><span class="text">Back to List</span>', 'class="btn btn-secondary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"');

            ?>
          </div>
        </div>

        <?php if ($this->session->flashdata('message')) { ?>
          <div align="center" class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
            <?php echo $this->session->flashdata('message') ?>
          </div>
        <?php } ?>

        <div class="card shadow mb-2">
          <div class="card-body">
            <div class="row">
              <div class="col-2">
                <label class="form-label">APPLICATION NUMBER</label>
                <h5 class="text-gray-900 text-bold">
                  <?php
                  $app_number = $studentDetails->app_no;
                  // $strlen = strlen($app_number);
                  // if($strlen == 1){  $app_number = "000".$app_number; }
                  // if($strlen == 2){  $app_number = "00".$app_number; }
                  // if($strlen == 3){  $app_number = "0".$app_number; }
                  echo "#" . $app_number;
                  ?>
                </h5>
              </div>


              <div class="col-2">
                <label class="form-label">ADM. NO</label>
                <h5 class="text-gray-900 text-bold">
                  <?php
                  echo ($studentDetails->adm_no) ? $studentDetails->adm_no : "--";
                  ?>
                </h5>
              </div>

              <div class="col-2">
                <label class="form-label">REG. NO</label>
                <h5 class="text-gray-900 text-bold">
                  <?php
                  echo ($studentDetails->reg_no) ? $studentDetails->reg_no : "--";
                  ?>
                </h5>
              </div>


              <div class="col-2 text-center">
                <label class="form-label">APPLIED FOR</label>
                <h5 class="text-gray-900 text-bold">
                  <?php
                  $course = $studentDetails->course;

                  if ($studentDetails->dsc_1 == $studentDetails->dsc_2) {
                    $combination = $studentDetails->dsc_1;
                  } else {
                    $combination = $studentDetails->dsc_1 . ' - ' . $studentDetails->dsc_2;
                  }
                  echo $course . ' [' . $combination . ']';
                  ?>
                </h5>
              </div>
              <div class="col-2 text-center">
                <label class="form-label">ADMISSION TYPE</label>
                <h5 class="text-gray-900 text-bold">
                  <?php
                  echo $studentDetails->aided_unaided;
                  ?>
                </h5>
              </div>
              <div class="col-2 text-right">
                <label class="form-label">ADMISSION STATUS</label>
                <?php

                $status = array(
                  "1" => "<h5 class='text-info text-bold'> PROCESSING </h5>",
                  "2" => "<h5 class='text-primary text-bold'> SUBMITTED </h5>",
                  "3" => "<h5 class='text-warning text-bold'> ON-HOLD </h5>",
                  "4" => "<h5 class='text-success text-bold'> CONFIRMED </h5>",
                  "5" => "<h5 class='text-danger text-bold'> REJECTED </h5>",
                  "6" => "<h5 class='text-danger text-bold'> CANCELED </h5>",
                  "7" => "<h5 class='text-danger text-bold'> ARCHIVED </h5>"
                );
                echo $status[$studentDetails->status];
                // if($studentDetails->status == 2){
                //     echo ($studentDetails->transaction_status == 2) ? '<span class="text-success m-0">'.$pay_status.'</span>'  : '<span class="text-danger m-0">'.$pay_status.'</span>';
                // }
                ?>
              </div>
            </div>
          </div>
        </div>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row">
              <div class="col-6">
                <h6 class="m-0 font-weight-bold">Profile Details</h6>
              </div>
              <div class="col-6 text-right">
              </div>
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="form-label">Name of the Applicant in full (in block letters as per SSLC Marks Card)</label>
                  <h6><?php echo ($studentDetails->student_name) ? $studentDetails->student_name : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Academic Year</label>
                  <h6><?php echo $currentAcademicYear; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">First Language</label>
                  <h6><?php echo $studentDetails->lang_1; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Second Language</label>
                  <h6><?php echo $studentDetails->lang_2; ?></h6>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Mobile</label>
                  <h6><?= ($studentDetails->mobile) ? $studentDetails->mobile : '-'; ?></h6>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <h6><?= ($studentDetails->email) ? $studentDetails->email : '-'; ?></h6>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="form-label">Official Email</label>
                  <h6 class="text-info"><?php echo ($studentDetails->official_email) ? $studentDetails->official_email : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Aadhar Card Number</label>
                  <h6><?= ($studentDetails->aadhar) ? $studentDetails->aadhar : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Date of Birth</label>
                  <h6><?= ($studentDetails->date_of_birth) ? date('d-m-Y', strtotime($studentDetails->date_of_birth)) : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Place of Birth</label>
                  <h6><?= ($studentDetails->place_of_birth) ? $studentDetails->place_of_birth : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Nationality</label>
                  <h6><?= ($studentDetails->nationality) ? $studentDetails->nationality : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Religion</label>
                  <h6><?= ($studentDetails->religion) ? $studentDetails->religion : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Caste</label>
                  <h6><?= ($studentDetails->caste) ? $studentDetails->caste : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Category</label>
                  <h6><?= ($studentDetails->category) ? $studentDetails->category : '-'; ?></h6>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="form-label">Present Address</label>
                <div class="form-group col">
                  <?= ($studentDetails->pre_location) ? $studentDetails->pre_location . ', ' . $studentDetails->pre_city . ', ' . $studentDetails->pre_district . ', ' . $studentDetails->pre_state . ', ' . $studentDetails->pre_pincode : '-'; ?>
                </div>
              </div>
              <div class="col-6">
                <label class="form-label">Permanent Address</label>
                <div class="form-group col">
                  <?= ($studentDetails->per_location) ? $studentDetails->per_location . ', ' . $studentDetails->per_city . ', ' . $studentDetails->per_district . ', ' . $studentDetails->per_state . ', ' . $studentDetails->per_pincode : '-'; ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="form-label">Family Details</label>
                <table class="table table-bordered">
                  <tr>
                    <th class="p-1 form-label" width="16%">Details</th>
                    <th class="p-1 form-label" width="28%">Father</th>
                    <th class="p-1 form-label" width="28%">Mother</th>
                    <th class="p-1 form-label" width="28%">Guardian</th>
                  </tr>
                  <tr>
                    <th class="p-1 form-label">Name</th>
                    <td class="p-1"><?= ($studentDetails->father_name) ? $studentDetails->father_name : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->mother_name) ? $studentDetails->mother_name : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->guardian_name) ? $studentDetails->guardian_name : '-'; ?></td>
                  </tr>
                  <tr>
                    <th class="p-1 form-label">Occupation</th>
                    <td class="p-1"><?= ($studentDetails->father_occupation) ? $studentDetails->father_occupation : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->mother_occupation) ? $studentDetails->mother_occupation : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->guardian_occupation) ? $studentDetails->guardian_occupation : '-'; ?></td>
                  </tr>
                  <tr>
                    <th class="p-1 form-label">Mobile</th>
                    <td class="p-1"><?= ($studentDetails->father_mobile) ? $studentDetails->father_mobile : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->mother_mobile) ? $studentDetails->mother_mobile : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->guardian_mobile) ? $studentDetails->guardian_mobile : '-'; ?></td>
                  </tr>
                  <tr>
                    <th class="p-1 form-label">Alt. Mobile</th>
                    <td class="p-1"><?= ($studentDetails->father_phone) ? $studentDetails->father_phone : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->mother_phone) ? $studentDetails->mother_phone : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->guardian_phone) ? $studentDetails->guardian_phone : '-'; ?></td>
                  </tr>
                  <tr>
                    <th class="p-1 form-label">Email</th>
                    <td class="p-1"><?= ($studentDetails->father_email) ? $studentDetails->father_email : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->mother_email) ? $studentDetails->mother_email : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->guardian_email) ? $studentDetails->guardian_email : '-'; ?></td>
                  </tr>
                  <tr>
                    <th class="p-1 form-label">Annual Income</th>
                    <td class="p-1"><?= ($studentDetails->father_annual_income) ? $studentDetails->father_annual_income : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->mother_annual_income) ? $studentDetails->mother_annual_income : '-'; ?></td>
                    <td class="p-1"><?= ($studentDetails->guardian_annual_income) ? $studentDetails->guardian_annual_income : '-'; ?></td>
                  </tr>
                </table>
              </div>
            </div>

          </div>
        </div>
        <div class="card shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h6 class="m-0 font-weight-bold">Previous Exam Details </h6>
              </div>
              <div class="col-6 text-right">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Name of the Institution last attended :</label>
                      <h6><?php echo ($studentDetails->inst_name) ? $studentDetails->inst_name : '-'; ?></h6>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">12th Exam Board</label>
                      <h6><?php echo ($studentDetails->exam_board) ? $studentDetails->exam_board : '-'; ?></h6>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">12th Register Number</label>
                      <h6><?php echo ($studentDetails->register_number) ? $studentDetails->register_number : '-'; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label">Address of the Institution last attended </label>
                  <h6><?php echo ($studentDetails->inst_address) ? $studentDetails->inst_address : '-'; ?></h6>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label class="form-label">Year & Month of Passing</label>
                  <h6><?php echo ($studentDetails->passed_year_month) ? $studentDetails->passed_year_month : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Max Marks</label>
                  <h6><?php echo ($studentDetails->max_marks) ? $studentDetails->max_marks : '-'; ?></h6>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label class="form-label">Total marks secured</label>
                  <h6><?php echo ($studentDetails->total_marks) ? $studentDetails->total_marks : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Percentage(%)</label>
                  <h6><?php echo ($studentDetails->percentage) ? $studentDetails->percentage . '%' : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Class Obtained</label>
                  <h6><?php echo ($studentDetails->class_obtained) ? $studentDetails->class_obtained : '-'; ?></h6>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col">
                <label class="form-label text-info">Subjects Studied</label>
                <div class=row>
                  <div class="form-group col-3">
                    <label class="form-label">Part-1 (A)</label>
                    <h6><?php echo ($studentDetails->subjects_studied_p1a) ? $studentDetails->subjects_studied_p1a : '-'; ?></h6>
                  </div>
                  <div class="form-group col-3">
                    <label class="form-label">Part-1 (B)</label>
                    <h6><?php echo ($studentDetails->subjects_studied_p1b) ? $studentDetails->subjects_studied_p1b : '-'; ?></h6>
                  </div>
                </div>
                <div class=row>
                  <div class="form-group col-3">
                    <label class="form-label">Part-2 (A)</label>
                    <h6><?php echo ($studentDetails->subjects_studied_p2a) ? $studentDetails->subjects_studied_p2a : '-'; ?></h6>
                  </div>
                  <div class="form-group col-3">
                    <label class="form-label">Part-2 (B)</label>
                    <h6><?php echo ($studentDetails->subjects_studied_p2b) ? $studentDetails->subjects_studied_p2b : '-'; ?></h6>
                  </div>
                  <div class="form-group col-3">
                    <label class="form-label">Part-2 (C)</label>
                    <h6><?php echo ($studentDetails->subjects_studied_p2c) ? $studentDetails->subjects_studied_p2c : '-'; ?></h6>
                  </div>
                  <div class="form-group col-3">
                    <label class="form-label">Part-2 (D)</label>
                    <h6><?php echo ($studentDetails->subjects_studied_p2d) ? $studentDetails->subjects_studied_p2d : '-'; ?></h6>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <label class="form-label text-info">Other Details</label>
            <div class="row">
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Other State</label>
                  <h6><?php echo ($studentDetails->other_state) ? $studentDetails->other_state : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Sports</label>
                  <h6><?php echo ($studentDetails->sports) ? $studentDetails->sports : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">NCC</label>
                  <h6><?php echo ($studentDetails->ncc) ? $studentDetails->ncc : '-'; ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">NSS</label>
                  <h6><?php echo ($studentDetails->nss) ? $studentDetails->nss : '-'; ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        // if($studentDetails->transaction_status == 2){
        //     $borderStatus = 'border-top-success';
        //     $verifiedText = '<span class="text-success"> <i class="far fa-check-square"></i> Verified</span>';
        // }else{
        //     $borderStatus = null;
        //     $verifiedText = null;
        // }
        ?>
        <div class="card shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h6 class="m-0 font-weight-bold">Fee Payment Details </h6>
              </div>
              <div class="col-6 text-right">
              </div>
            </div>
          </div>
          <div class="card-body">
            <?php
            $proposed_amount = ($studentDetails->proposed_amount) ? $studentDetails->proposed_amount : 0;
            $additional_amount = ($studentDetails->additional_amount) ? $studentDetails->additional_amount : 0;
            $concession_fee = ($studentDetails->concession_fee) ? $studentDetails->concession_fee : 0;
            $final_amount = ($studentDetails->final_amount) ? $studentDetails->final_amount : 0;
            ?>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="form-label">Course Fee + Additional Fee - Concession Fee (Rs.)</label>
                  <h5><?php echo number_format($proposed_amount, 0) . ' + ' . number_format($additional_amount, 0) . ' - ' . number_format($concession_fee, 0); ?></h5>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label class="form-label">Total Fee (Rs.)</label>
                  <h4 class="text-primary"><?php echo number_format($studentDetails->final_amount, 2); ?></h4>
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
                  <h4 class="text-danger"><?php $balance_amount = ($studentDetails->final_amount) - ($paid_amount);
                                          echo number_format($balance_amount, 2); ?></h4>
                </div>
              </div>
            </div>
            <!--<label class="form-label text-info">Other Details</label>-->
            <div class="row">
              <div class="col-4">
                <h6 class="font-weight-bold text-dark mt-3">Transaction Details</h6>
              </div>
              <div class="col-8 text-right">
                <h6 class="font-weight-bold text-dark mt-3">Next Due Date: <?php echo ($studentDetails->next_due_date != "0000-00-00") ? "<span class='text-danger'>" . date('d-m-Y', strtotime($studentDetails->next_due_date)) . "</span>" : "----"; ?><?php echo "<button type='button' id='due_date_update' name='due_date_update' class='btn btn-outline-danger btn-sm ml-3'>Update</button>"; ?></h6>

              </div>
            </div>
            <?php
            if ($transactionDetails) {
              $table_setup = array('table_open' => '<table class="table table-hover font14">');
              $this->table->set_template($table_setup);
              $print_fields = array('S.No', 'Receipt No.', 'Receipt Date', 'Mode of Payment', 'Ref./Transaction ID', 'Ref. Date', 'Bank & Branch', 'Amount', 'Status');
              $this->table->set_heading($print_fields);

              $transactionTypes = array("1" => "Cash", "2" => "Cheque/DD", "3" => "Online Payment");

              $i = 1;
              $total = 0;
              foreach ($transactionDetails as $transactionDetails1) {
                if ($transactionDetails1->transaction_status != '2') {
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

                  if ($transactionDetails1->transaction_status) {
                    $transaction_status = "<span class='text-success'>Verified</span>";
                  } else {

                    $transaction_status = "<span class='text-warning'>Processing</span> <br>" . anchor('admin/approvePayment/' . $transactionDetails1->id, 'Approve', 'class="btn btn-danger btn-sm"');
                  }

                  $result_array = array(
                    $i++,
                    ($transactionDetails1->receipt_no) ? anchor('admin/downloadReceipt/' . $studentDetails->id . '/' . $transactionDetails1->id, $transactionDetails1->receipt_no) : "-",
                    ($transactionDetails1->transaciton_date != "0000-00-00") ? date('d-m-Y', strtotime($transactionDetails1->transaciton_date)) : "-",
                    $transactionTypes[$transactionDetails1->transaction_type],
                    $transactionDetails1->reference_no,
                    date('d-m-Y', strtotime($transactionDetails1->reference_date)),
                    $transactionDetails1->bank_name,
                    // $trans,
                    number_format($transactionDetails1->amount, 0),
                    // ($transactionDetails1->balance_amount) ? number_format($transactionDetails1->balance_amount,0) : 0,
                    $transaction_status
                  );
                  $this->table->add_row($result_array);
                }
              }

              echo $this->table->generate();
            } else {
              echo "<h6 class='text-left'> No transaction details found..! </h6>";
            }
            ?>
            <div class="row">
              <div class="col-12">
                <h6 class="font-weight-bold text-dark mt-3">Remarks: <?php echo ($studentDetails->remarks) ? nl2br($studentDetails->remarks) : "--"; ?></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h6 class="m-0 font-weight-bold">Documents </h6>
              </div>
              <div class="col-6 text-right">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <?php
              $document_options = array("" => "Select", "SSLC" => "SSLC/ICSE Marks Card", "PUC" => "PUC Provisional Marks Card", "Caste" => "Caste Certificate", "Migration" => "Migration Certificate", "Income" => "Income Certificate", "Aadhar" => "Aadhar Card", "PAN" => "PAN Card");
              $url = './assets/students/' . $studentDetails->id;
              if (is_dir($url)) {
                if ($dh = opendir($url)) {
                  while (($file = readdir($dh)) !== false) {
                    $filenames[] = $file;
                  }
                  closedir($dh);
                }
              } else {
                $filenames = array();
              }
              $files = $filenames;

              $len = sizeof($files);
              if ($len > 2) {
                $k = 1;
                for ($i = 0; $i < $len; $i++) {
                  if ($files[$i] != '.' && $files[$i] != '..') {
                    $x = substr($files[$i], 0, strrpos($files[$i], '.'));
              ?>
                    <div class="col-2">
                      <div class="card m-2">
                        <div class="card-body p-2">
                          <img src="<?= base_url(); ?>assets/students/<?= $studentDetails->id . '/' . $files[$i]; ?>" class="document">
                          <h6 class="m-2 form-label text-gray-800">
                            <?php
                            if (array_key_exists($x, $document_options)) {
                              echo $document_options[$x];
                            } else {
                              echo "Profile Pic";
                            }
                            ?>
                          </h6>
                          <div class="row">
                            <div class="col">
                              <?php echo anchor(base_url() . 'assets/students/' . $studentDetails->id . '/' . $files[$i], 'Download', 'class="btn btn-outline-primary btn-sm m-2" target="_blank"'); ?>
                            </div>
                            <div class="col text-right">

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
              <?php
                  }
                }
              } else {
                echo '<div class="col-12 text-center">';
                echo "<h6> No documents uploaded.. </h6>";
                echo '</div>';
              }
              ?>
            </div>

          </div>
        </div>

        <?php if (false) { ?>
          <div class="card shadow mb-4" id="viewHodComments">
            <div class="card-header">
              <div class="row">
                <div class="col-6">
                  <h6 class="m-0 font-weight-bold">HOD Interview Report </h6>
                </div>
                <div class="col-6 text-right">
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php if ($hod_interviews) { ?>
                <table class="table table-hover">
                  <tr>
                    <th>1. Self Introduction</th>
                    <td><?php echo nl2br($hod_interviews->ques_1); ?></td>
                  </tr>
                  <tr>
                    <th>2. Why did you choose BMS?</th>
                    <td><?php echo nl2br($hod_interviews->ques_2); ?></td>
                  </tr>
                  <tr>
                    <th>3. How do you Know BMSCW?</th>
                    <td><?php echo nl2br($ques_3_values[$hod_interviews->ques_3]); ?></td>
                  </tr>
                  <tr>
                    <th>4. Why BCA?</th>
                    <td><?php echo nl2br($hod_interviews->ques_4); ?></td>
                  </tr>
                  <tr>
                    <th>5. What do you like to do in your spare time?</th>
                    <td><?php echo nl2br($hod_interviews->ques_5); ?></td>
                  </tr>
                  <tr>
                    <td>6. How can you contribute to our college?</td>
                    <td><?php echo nl2br($hod_interviews->ques_6); ?></td>
                  </tr>
                  <tr>
                    <th>7. Your Strength & weakness</th>
                    <td><?php echo nl2br($hod_interviews->ques_7); ?></td>
                  </tr>
                  <tr>
                    <th>8. Which subject do you find most challenging?</th>
                    <td><?php echo nl2br($hod_interviews->ques_8); ?></td>
                  </tr>
                  <tr>
                    <th>9. Have you been a leader/ displayed leadership qualities?</th>
                    <td><?php echo nl2br($hod_interviews->ques_9); ?></td>
                  </tr>
                  <tr>
                    <th>10. Remarks: </th>
                    <td><?php echo nl2br($ques_10_values[$hod_interviews->ques_10]); ?></td>
                  </tr>
                  <tr>
                    <th>11. Details informed to students by Interviewer </th>
                    <td><?php echo nl2br($hod_interviews->ques_11); ?></td>
                  </tr>
                  <tr>
                    <th>Submitted On</th>
                    <td><?php echo date('d-m-Y h:i A', strtotime($hod_interviews->given_on)); ?></td>
                  </tr>
                </table>
              <?php } else {
                echo "<h5 class='text-center text-warning'>still interview not taken by HOD.</h5>";
              } ?>
            </div>
          </div>
        <?php } ?>

        <div class="modal fade" id="due_date_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
              <div class="modal-header">
                <h6 class="modal-title text-bold" id="exampleModalLabel"> <i class="fas fa-calendar"></i> Update Next Due Date </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" id="insert_form">
                  <div class="form-row">
                    <div class="col-6">
                      <div class="form-group">
                        <label class="form-label">Next Due Date</label>
                        <input type="date" class="form-control" placeholder="Enter Date" id="next_due_date" name="next_due_date" value="">
                        <span class="text-danger"><?php echo form_error('next_due_date'); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Remarks</label>
                        <textarea id="remarks" name="remarks" class="form-control" placeholder="Enter Remarks" rows="5"></textarea>
                        <span class="text-danger"><?php echo form_error('remarks'); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <button type="button" class="btn btn-secondary btn-sm tx-13" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col text-right">
                      <input type="submit" name="insert" id="insert" value="Update Details" class="btn btn-danger btn-sm" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        <script>
          $(document).ready(function() {
            var base_url = '<?php echo base_url(); ?>';

            $("#viewHodCommentsBtn").click(function() {
              $('html, body').animate({
                scrollTop: $("#viewHodComments").offset().top
              }, 2000);
            });

            $("#due_date_update").click(function() {
              event.preventDefault();
              $('#due_date_modal').modal('show');
            });

            $("#insert").click(function() {
              event.preventDefault();
              var id = '<?php echo $studentDetails->id; ?>';
              var next_due_date = $("#next_due_date").val();
              var remarks = $("#remarks").val();

              $.ajax({
                'type': 'POST',
                'url': base_url + 'admin/updateNextDueDate',
                'data': {
                  "id": id,
                  "next_due_date": next_due_date,
                  "remarks": remarks
                },
                'dataType': 'text',
                'cache': false,
                'beforeSend': function() {
                  $('#insert').val("Inserting...");
                  $("#insert").attr("disabled", true);
                },
                'success': function(data) {
                  $('#insert').val("Inserted");
                  $('#due_date_modal').modal('hide');
                  var url = base_url + 'admin/admissionDetails/' + id
                  window.location.replace(url);
                }
              });

            });

          });
        </script>