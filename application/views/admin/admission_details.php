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
                        <li class="nav-item">
                                <?php echo anchor('admin/admissions', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
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
                                <?= $admissionDetails->dept_id; ?>
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
            <!-- /.col -->
            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Entrance Exam Details
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
                                <label class="form-label">Entrance Type</label><br>
                                <?= $admissionDetails->entrance_type; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Entrance Registration Number</label><br>
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
                                <label class="form-label">Admission Order No</label><br>
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
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Fees Receipt No</label><br>
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
                <div class="card-header ">
                    <h3 class="card-title">
                        <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                        Personal Details
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
                                <label class="form-label">Date of Birth</label><br>
                                <?= $admissionDetails->date_of_birth; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Gender</label><br>
                                <?= $admissionDetails->gender; ?>
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
                                <label class="form-label">Blood Group</label><br>
                                <?= $admissionDetails->blood_group; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Place of Birth</label><br>
                                <?= $admissionDetails->place_of_birth; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Country of Birth</label><br>
                                <?= $admissionDetails->country_of_birth; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Nationality</label><br>
                                <?= $admissionDetails->nationality; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Religion</label><br>
                                <?= $admissionDetails->religion; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Mother Tongue</label><br>
                                <?= $admissionDetails->mother_tongue; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Caste</label><br>
                                <?= $admissionDetails->caste; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Disability</label><br>
                                <?= $admissionDetails->disability; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Type of Disability</label><br>
                                <?= $admissionDetails->type_of_disability; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Economically Backward</label><br>
                                <?= $admissionDetails->economically_backward; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Domicile of State</label><br>
                                <?= $admissionDetails->domicile_of_state; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Hobbies</label><br>
                                <?= $admissionDetails->hobbies; ?>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                           <div class="col-md-6">
                              <label class="form-label text-primary">CURRENT ADDRESS</label>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Current Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->current_address; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Current City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->current_city; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Current District</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->current_district; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Current State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->current_state; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Current Country</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->current_country; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Current Pincode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->current_pincode; ?>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label class="form-label text-primary">PERMANENT ADDRESS</label>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Permanent Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->present_address; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">permanent City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->present_city; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">permanent District</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->present_district; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">permanent State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->present_state; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">permanent Country</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->present_country; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">permanent Pincode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->present_pincode; ?>
                              </div>
                          </div>
                        </div>


                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Parent's Details
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                           
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                <div class="row">
                          <div class="col-md-4">
                              <label class="form-label text-primary">FATHER DETAILS</label>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->father_name; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->father_mobile; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->father_email; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->father_occupation; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->father_annual_income; ?>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label class="form-label text-primary">MOTHER DETAILS</label>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->mother_name; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->mother_mobile; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->mother_email; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->mother_occupation; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->mother_annual_income; ?>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label class="form-label text-primary">GUARDIAN DETAILS</label>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->guardian_name; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->guardian_mobile; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->guardian_email; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->guardian_occupation; ?>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?= $admissionDetails->guardian_annual_income; ?>
                              </div>
                          </div>
                      </div>
                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Educational Qualification Details
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                           
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                 
            <?php     if (count($educations_details)) {
                   foreach ($educations_details as $edu) { ?>
                    <div class="form-row">

                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Level</label>
                                <br>
                                <?= $edu->education_level;?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Institution Type</label>
                                <br>
                                <?= $edu->inst_type;?>
                              
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Board / University</label>
                                <br>
                                <?= $edu->inst_board;?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Institution Name</label>
                                <br>
                                <?= $edu->inst_name;?>
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Institution Address</label>
                                <br>
                                <?= $edu->inst_address;?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Institution City</label>
                                <br>
                                <?= $edu->inst_city;?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Institution State</label>
                                <br>
                                <?= $edu->inst_state;?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Institution Country</label>
                                <br>
                                <?= $edu->inst_country;?>
                            </div>
                        </div>



                    </div>
                    <div class="form-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Medium of Instruction</label>
                                <br>
                                <?= $edu->medium_of_instruction;?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Register Number</label>
                                <br>
                                <?= $edu->register_number;?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Year of Passing</label>
                                <br>
                                <?= $edu->year_of_passing;?>
                            </div>
                        </div>
                      
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="label">Aggregate</label>
                                <br>
                                <?= $edu->aggregate;?>%

                            </div>
                        </div>

                   
                    </div>
                    <table class="table" border="1">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Min Marks</th>
                                <th>Max Marks</th>
                                <th>Obtained Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 1; $i <= 6; $i++) {
                                $subject_name = $edu->{"subject_" . $i . "_name"};
                                $min_marks = $edu->{"subject_" . $i . "_min_marks"};
                                $max_marks = $edu->{"subject_" . $i . "_max_marks"};
                                $obtained_marks = $edu->{"subject_" . $i . "_obtained_marks"};
                                ?>
                            <tr>
                                <td>
                                  <?= $subject_name;?>
                                </td>
                                <td>
                                <?= $min_marks;?>
                                </td>
                                <td>
                                <?= $max_marks;?> 
                                </td>
                                <td>
                                <?= $obtained_marks;?>
                                </td>
                            </tr>
                            <?php } ?>
                        
                        </tbody>
                        
                    </table>
                    <hr>

                   <?php }   } ?>

                </div>
            </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Documents
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                           
                        </ul>
                    </div>
                </div>
                <div class="card-body">

<div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
  <?php

  if (count($files)) {
    $table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
    $this->table->set_template($table_setup);
    $print_fields = array('S.NO', 'Document Type', 'Document ');
    $this->table->set_heading($print_fields);

    $i = 1;
    foreach ($files as $file) {

      $document_type = substr($file, 0, strpos($file, '.'));
      $result_array = array(
        $i++,
        //   $admissions1->app_no,


        $document_type,

        
        anchor('assets/students/' . $id.'/'.$file, '<span class="icon"><i class="fas fa-file-o"></i></span> <span class="text">Download</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm" target="_blank"')

      );
      $this->table->add_row($result_array);
    }
    $table = $this->table->generate();
    print_r($table);
  } else {
    echo "<div class='text-center'><img src='" . base_url() . "assets/img/no_data.jpg' class='nodata'></div>";
  } ?>
</div>
</div>
            </div>
           



    </section>
    <!-- /.content -->
</div>