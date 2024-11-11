<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        ADMISSION DETAILS
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <!-- <?php echo anchor('student/admissiondetails', '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?> -->
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
                                <label class="form-label mb-0">Student Name</label><br>
                                <?php
                                if($admissionDetails->student_name != NULL)
                                    {
                                        echo $admissionDetails->student_name;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>  
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Mobile</label><br>
                                <?php
                                if($admissionDetails->mobile != NULL)
                                    {
                                        echo $admissionDetails->mobile;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Email</label><br>
                                <?php
                                if($admissionDetails->email != NULL)
                                    {
                                        echo $admissionDetails->email;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Aadhaar Number</label><br>
                                <?php
                                if($admissionDetails->aadhaar != NULL)
                                    {
                                        echo $admissionDetails->aadhaar;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Department</label><br>
                                <?php
                                if($this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"] != NULL)
                                    {
                                        echo $this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"];
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                            <?php if (!empty($student_photo)): ?>
                                <div class="student-photo" style="width: 120px; height: 160px; border: 1px solid #000; overflow: hidden;">
                                    <img src="<?php echo base_url($student_photo); ?>" alt="Student Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            <?php else: ?>
                                <p>No photo available.</p>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Quota</label><br>
                                <?php
                                if($admissionDetails->quota != NULL)
                                    {
                                        echo $admissionDetails->quota;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Sub Quota</label><br>
                                <?php
                                if($admissionDetails->sub_quota != NULL)
                                    {
                                        echo $admissionDetails->sub_quota;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Category Allocated</label><br>
                                <?php
                                if($admissionDetails->category_allotted != NULL)
                                    {
                                        echo $admissionDetails->category_allotted;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Category Claimed</label><br>
                                <?php
                                if($admissionDetails->category_claimed != NULL)
                                    {
                                        echo $admissionDetails->category_claimed;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">College Code</label><br>
                                <?php
                                if($admissionDetails->college_code != NULL)
                                    {
                                        echo $admissionDetails->college_code;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($admissionDetails->stream_id == '3'): ?>
                    <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Batch (pass out year)</label><br>
                                    <?php
                                    if ($admissionDetails->batch != NULL) {
                                        echo $admissionDetails->batch;
                                    } else {
                                        echo "--";
                                    }
                                    ?>
                            </div>
                          </div>
                           <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label mb-0">Degree Level</label><br>
                                    <?php
                                    if ($admissionDetails->degree_level != NULL) {
                                        echo $admissionDetails->degree_level;
                                    } else {
                                        echo "--";
                                    }
                                    ?>
                                </div>
                            </div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
            <!-- /.col -->
            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        ENTRANCE EXAM DETAILS
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
                                <label class="form-label mb-0">Entrance Type</label><br>
                                <?php
                                if($admissionDetails->entrance_type != NULL)
                                    {
                                        echo $admissionDetails->entrance_type;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Entrance Registration Number</label><br>
                                <?php
                                if($admissionDetails->entrance_reg_no != NULL)
                                    {
                                        echo $admissionDetails->entrance_reg_no;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Entrance Exam Rank</label><br>
                                <?php
                                if($admissionDetails->entrance_rank != NULL)
                                    {
                                        echo $admissionDetails->entrance_rank;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Admission Order No</label><br>
                                <?php
                                if($admissionDetails->admission_order_no != NULL)
                                    {
                                        echo $admissionDetails->admission_order_no;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Admission Order Date</label><br>
                                <?php
                                if($admissionDetails->admission_order_date != NULL)
                                    {
                                        echo $admissionDetails->admission_order_date;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Paid</label><br>
                                <?php
                                if($admissionDetails->fees_paid != NULL)
                                    {
                                        echo $admissionDetails->fees_paid;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Receipt No</label><br>
                                <?php
                                if($admissionDetails->fees_receipt_no != NULL)
                                    {
                                        echo $admissionDetails->fees_receipt_no;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Receipt Date</label><br>
                                <?php
                                if($admissionDetails->fees_receipt_date != NULL)
                                    {
                                        echo $admissionDetails->fees_receipt_date;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                        PERSONAL DETAILS
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
                                <label class="form-label mb-0">Date of Birth</label><br>
                                <?php
                                if($admissionDetails->date_of_birth != NULL)
                                    {
                                        echo $admissionDetails->date_of_birth;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Gender</label><br>
                                <?php
                                if($admissionDetails->gender != NULL)
                                    {
                                        echo $admissionDetails->gender;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Sports</label><br>
                                <?php
                                if($admissionDetails->sports != NULL)
                                    {
                                        echo $admissionDetails->sports;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Blood Group</label><br>
                                <?php
                                if($admissionDetails->blood_group != NULL)
                                    {
                                        echo $admissionDetails->blood_group;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Place of Birth</label><br>
                                <?php
                                if($admissionDetails->place_of_birth != NULL)
                                    {
                                        echo $admissionDetails->place_of_birth;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Country of Birth</label><br>
                                <?php
                                if($admissionDetails->country_of_birth != NULL)
                                    {
                                        echo $admissionDetails->country_of_birth;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Nationality</label><br>
                                <?php
                                if($admissionDetails->nationality != NULL)
                                    {
                                        echo $admissionDetails->nationality;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Religion</label><br>
                                <?php
                                if($admissionDetails->religion != NULL)
                                    {
                                        echo $admissionDetails->religion;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Mother Tongue</label><br>
                                <?php
                                if($admissionDetails->mother_tongue != NULL)
                                    {
                                        echo $admissionDetails->mother_tongue;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Caste</label><br>
                                <?php
                                if($admissionDetails->caste != NULL)
                                    {
                                        echo $admissionDetails->caste;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Disability</label><br>
                                <?php
                                if($admissionDetails->disability != NULL)
                                    {
                                        echo $admissionDetails->disability;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Type of Disability</label><br>
                                <?php
                                if($admissionDetails->type_of_disability != NULL)
                                    {
                                        echo $admissionDetails->type_of_disability;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Economically Backward</label><br>
                                <?php
                                if($admissionDetails->economically_backward != NULL)
                                    {
                                        echo $admissionDetails->economically_backward;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Domicile of State</label><br>
                                <?php
                                if($admissionDetails->domicile_of_state != NULL)
                                    {
                                        echo $admissionDetails->domicile_of_state;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Hobbies</label><br>
                                <?php
                                if($admissionDetails->hobbies != NULL)
                                    {
                                        echo $admissionDetails->hobbies;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mb-0 text-primary">CURRENT ADDRESS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->current_address != NULL)
                                    {
                                        echo $admissionDetails->current_address;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->current_city != NULL)
                                    {
                                        echo $admissionDetails->current_city;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current District</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->current_district != NULL)
                                    {
                                        echo $admissionDetails->current_district;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->current_state != NULL)
                                    {
                                        echo $admissionDetails->current_state;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current Country</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->current_country != NULL)
                                    {
                                        echo $admissionDetails->current_country;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current Pincode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->current_pincode != NULL)
                                    {
                                        echo $admissionDetails->current_pincode;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label mb-0 text-primary">PERMANENT ADDRESS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Permanent Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->present_address != NULL)
                                    {
                                        echo $admissionDetails->present_address;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->present_city != NULL)
                                    {
                                        echo $admissionDetails->present_city;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent District</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->present_district != NULL)
                                    {
                                        echo $admissionDetails->present_district;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->present_state != NULL)
                                    {
                                        echo $admissionDetails->present_state;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent Country</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->present_country != NULL)
                                    {
                                        echo $admissionDetails->present_country;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent Pincode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->present_pincode != NULL)
                                    {
                                        echo $admissionDetails->present_pincode;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        PARENTS DETAILS
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
                            <label class="form-label mb-0 text-primary">FATHER DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->father_name != NULL)
                                    {
                                        echo $admissionDetails->father_name;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->father_mobile != NULL)
                                    {
                                        echo $admissionDetails->father_mobile;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->father_email != NULL)
                                    {
                                        echo $admissionDetails->father_email;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->father_occupation != NULL)
                                    {
                                        echo $admissionDetails->father_occupation;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->father_annual_income != NULL)
                                    {
                                        echo $admissionDetails->father_annual_income;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-0 text-primary">MOTHER DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->mother_name != NULL)
                                    {
                                        echo $admissionDetails->mother_name;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->mother_mobile != NULL)
                                    {
                                        echo $admissionDetails->mother_mobile;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->mother_email != NULL)
                                    {
                                        echo $admissionDetails->mother_email;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->mother_occupation != NULL)
                                    {
                                        echo $admissionDetails->mother_occupation;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->mother_annual_income != NULL)
                                    {
                                        echo $admissionDetails->mother_annual_income;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-0 text-primary">GUARDIAN DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->guardian_name != NULL)
                                    {
                                        echo $admissionDetails->guardian_name;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->guardian_mobile != NULL)
                                    {
                                        echo $admissionDetails->guardian_mobile;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->guardian_email != NULL)
                                    {
                                        echo $admissionDetails->guardian_email;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->guardian_occupation != NULL)
                                    {
                                        echo $admissionDetails->guardian_occupation;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($admissionDetails->guardian_annual_income != NULL)
                                    {
                                        echo $admissionDetails->guardian_annual_income;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        EDUCATION QUALIFICATION DETAILS
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
                    <?php     if (count($educations_details)) {
                   foreach ($educations_details as $edu) { ?>
                    <div class="form-row">

                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Level</label><br>
                                <?php
                                if($edu->education_level != NULL)
                                    {
                                        echo $edu->education_level;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution Type</label><br>
                                <?php
                                if($edu->inst_type != NULL)
                                    {
                                        echo $edu->inst_type;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Board / University</label><br>
                                <?php
                                if($edu->inst_board != NULL)
                                    {
                                        echo $edu->inst_board;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution Name</label><br>
                                <?php
                                if($edu->inst_name != NULL)
                                    {
                                        echo $edu->inst_name;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution Address</label><br>
                                <?php
                                if($edu->inst_address != NULL)
                                    {
                                        echo $edu->inst_address;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution City</label><br>
                                <?php
                                if($edu->inst_city != NULL)
                                    {
                                        echo $edu->inst_city;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution State</label><br>
                                <?php
                                if($edu->inst_state != NULL)
                                    {
                                        echo $edu->inst_state;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution Country</label><br>
                                <?php
                                if($edu->inst_country != NULL)
                                    {
                                        echo $edu->inst_country;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Medium of Instruction</label><br>
                                <?php
                                if($edu->medium_of_instruction != NULL)
                                    {
                                        echo $edu->medium_of_instruction;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Register Number</label><br>
                                <?php
                                if($edu->register_number != NULL)
                                    {
                                        echo $edu->register_number;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Year of Passing</label><br>
                                <?php
                                if($edu->year_of_passing != NULL)
                                    {
                                        echo $edu->year_of_passing;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Maximum Marks</label><br>
                              
                                <?php
                                if($edu->maximum != NULL)
                                    {
                                        echo $edu->maximum;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Obtained Marks</label><br>
                              
                                <?php
                                if($edu->obtained != NULL)
                                    {
                                        echo $edu->obtained;
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Aggregate</label><br>
                                <!-- <p><?= $edu->aggregate;?>%</p> -->
                                <?php
                                if($edu->aggregate != NULL)
                                    {
                                        echo $edu->aggregate.'%';
                                    }
                                else{
                                        echo "--" ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <table class="table" border="1">
                    <?php
                                if(($edu->education_level == 'SSLC')||($edu->education_level == 'PUC'))
                                    {
                                        ?>
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Min Marks</th>
                                <th>Max Marks</th>
                                <th>Obtained Marks</th>
                            </tr>
                        </thead>
                        <?php } else{ ?>
                            <thead>
                            <tr>
                                <th>Years</th>
                                <th>Percentage(%)</th>
                                <th>Max Marks</th>
                                <th>Obtained Marks</th>
                            </tr>
                        </thead>

                            <?php }?>
                        <tbody>
                            <?php
                            for ($i = 1; $i <= 6; $i++) {
                                $subject_name = $edu->{"subject_" . $i . "_name"};
                                $min_marks = $edu->{"subject_" . $i . "_min_marks"};
                                $max_marks = $edu->{"subject_" . $i . "_max_marks"};
                                $obtained_marks = $edu->{"subject_" . $i . "_obtained_marks"};
                            
                                if($subject_name!= ''){
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
                            <?php } }?>
                        
                        </tbody>
                        
                    </table>
                    <hr>

                   <?php }   } ?>

                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        DOCUMENTS
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
                anchor('assets/students/' . $id.'/'.$file, '<i class="fas fa-download"></i> Download ', 'class="btn btn-outline-info btn-sm" target="_blank"')

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
            <div class="card m-2 shadow">
            <?php if($flow_status==1) {?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkbox vertical">&nbsp;&nbsp;
                                <!-- <label><input type="checkbox" name="iAgree" id="iAgree" value="I Agree" disabled="true" onclick="enable()"> I hereby declare that the entries made by me in the Application
                                    Form are complete and true to the best of my knowledge, belief and information. I
                                    acknowledge that the college has the authority for taking punitive actions against
                                    me for violation or non-compliance of the same*</label> -->
                                    <input type="checkbox" class="form-check-input" id="applyCheck"
                                    onclick="enable()">
                                    <label class="form-check-label text-gray font--12" for="applyCheck">
                                   Fee once paid will not be refunded under any circumstances - Kindly verify the data entered before final submission.</label><br>
                                 
                                </div>
                                <div class="checkbox vertical">&nbsp;&nbsp;
                                <!-- <label><input type="checkbox" name="iAgree" id="iAgree" value="I Agree" disabled="true" onclick="enable()"> I hereby declare that the entries made by me in the Application
                                    Form are complete and true to the best of my knowledge, belief and information. I
                                    acknowledge that the college has the authority for taking punitive actions against
                                    me for violation or non-compliance of the same*</label> -->
                                   
                                   <input type="checkbox" class="form-check-input" id="applyCheck1"
                                    onclick="enable()">
                                    <label class="form-check-label text-gray font--12" for="applyCheck1">
                                   Submit the necessary documents along with fee receipt for further processing.</label>
                                </div>

                              
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label class="font-weight-normal">Applicant Name</label>
                                <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo (set_value('student_name')) ? set_value('student_name') : $student_name; ?>" placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('student_name'); ?></span>
                            </div>
                        </div>
                        <!-- <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <?php //print_r($admissionDetails); 
                                ?>
                                <label class="font-weight-normal">Parent Name</label>
                                <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo (set_value('father_name')) ? set_value('father_name') : $father_name; ?>" placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                            </div>
                        </div> -->
                        <div class="col-md-3 mt-2">
                            <div class="form-group">
                                <label class="font-weight-normal">Date</label>
                                <input type="text" class="form-control" id="date" name="date" value="<?php echo date('d/m/Y'); ?>" placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('date'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="card-footer">
                    <?php //echo anchor('student/enquiries/', '<i class="fas fa-credit-card fa-sm fa-fw"></i> Back', 'class="btn btn-danger btn-sm float-right" ');  ?>
                    <!-- <?php echo anchor('student/admissionfee/', '<i class="fas fa-save fa-sm fa-fw"></i> SUBMIT APPLICATION', 'class="btn btn-danger btn-square btn-sm float-right"'); ?> -->
                    <button class="btn btn-danger btn-square btn-sm float-right"
                    type="submit" value="submit" name="submit" id="submit"
                    disabled="true"onclick="window.location.href='completed';"><i class="fas fa-save fa-sm fa-fw"></i> Submit Application</button>                                    
                </div>
                <?php }?>
            </div>




    </section>
    <!-- /.content -->
</div>

<script>
function enable() {
    var applyCheck = document.getElementById("applyCheck");
    var applyCheck1 = document.getElementById("applyCheck1");
    var submit = document.getElementById("submit");
    if (applyCheck.checked && applyCheck1.checked) {
        submit.removeAttribute("disabled")
    } else {
        submit.disabled = "true";
    }
}
</script>