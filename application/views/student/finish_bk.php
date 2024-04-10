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
                                <?php echo anchor('student/admissiondetails', '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
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
                            <li class="nav-item">
                                <?php echo anchor('student/entranceexamdetails', '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
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
                            <li class="nav-item">
                                <?php echo anchor('student/personaldetails', '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
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
                            <li class="nav-item">
                                <?php echo anchor('student/parentdetails', '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
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
                            <li class="nav-item">
                                <?php echo anchor('student/educationdetails', '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <?php

                    if (count($educations_details)) {
                        $table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
                        $this->table->set_template($table_setup);
                        $print_fields = array('S.NO', 'Level', 'Board ', 'Institution Name', 'Institution City', 'Medium of Instruction', 'Register Number', 'Year of Passing', 'Aggregate (%)');
                        $this->table->set_heading($print_fields);

                        $i = 1;
                        foreach ($educations_details as $edu) {
                            $result_array = array(
                                $i++,
                                //   $admissions1->app_no,


                                $edu->education_level,

                                $edu->inst_board,
                                $edu->inst_name,
                                $edu->inst_city,
                                $edu->medium_of_instruction,
                                $edu->register_number,
                                $edu->year_of_passing,
                                $edu->aggregate
                            );
                            $this->table->add_row($result_array);
                        }
                        $table = $this->table->generate();
                        print_r($table);
                    }  ?>
                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Documents
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <?php echo anchor('student/documents', '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
            <div class="card m-2 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkbox vertical"><label><input type="checkbox" name="iAgree" id="iAgree" value="I Agree"> I hereby declare that the entries made by me in the Application
                                    Form are complete and true to the best of my knowledge, belief and information. I
                                    acknowledge that the college has the authority for taking punitive actions against
                                    me for violation or non-compliance of the same*</label></div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <label class="font-weight-normal">Applicant Name</label>
                                <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo (set_value('student_name')) ? set_value('student_name') : $student_name; ?>" placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('student_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <?php //print_r($admissionDetails); 
                                ?>
                                <label class="font-weight-normal">Parent Name</label>
                                <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo (set_value('father_name')) ? set_value('father_name') : $father_name; ?>" placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <label class="font-weight-normal">Date</label>
                                <input type="text" class="form-control" id="date" name="date" value="<?php echo date('d/m/Y'); ?>" placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('date'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php //echo anchor('student/enquiries/', '<i class="fas fa-credit-card fa-sm fa-fw"></i> Back', 'class="btn btn-danger btn-sm float-right" '); 
                    ?>
                    <?php echo anchor('student/admissionfee/', '<i class="fas fa-credit-card fa-sm fa-fw"></i> Make Payment', 'class="btn btn-danger btn-square btn-sm float-right" '); ?>
                </div>
            </div>




    </section>
    <!-- /.content -->
</div>