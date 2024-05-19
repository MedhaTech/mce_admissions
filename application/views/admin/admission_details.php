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
                                <?php $encryptId = base64_encode($admissionDetails->id);
                                echo anchor('admin/admissionsletter/'.$encryptId, '<i class="fas fa-download fa-sm fa-fw"></i> Admit Letter ', 'class="btn btn-danger btn-sm"'); ?>
                            </li>
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
                                <label class="form-label mb-0">Student Name</label>
                                <p><?= $admissionDetails->student_name; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Mobile</label>
                                <p><?= $admissionDetails->mobile; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Email</label>
                                <p><?= $admissionDetails->email; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Aadhaar Number</label>
                                <p><?= $admissionDetails->aadhaar; ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Department</label>
                                <p><?=$this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Quota</label>
                                <p><?= $admissionDetails->quota; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Sub Quota</label>
                                <p><?= $admissionDetails->sub_quota; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Category Allocated</label>
                                <p><?= $admissionDetails->category_allotted; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Category Claimed</label>
                                <p><?= $admissionDetails->category_claimed; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">College Code</label>
                                <p><?= $admissionDetails->college_code; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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
                                <label class="form-label mb-0">Entrance Type</label>
                                <p><?= $admissionDetails->entrance_type; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Entrance Registration Number</label>
                                <p><?= $admissionDetails->entrance_reg_no; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Entrance Exam Rank</label>
                                <p><?= $admissionDetails->entrance_rank; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Admission Order No</label>
                                <p><?= $admissionDetails->admission_order_no; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Admission Order Date</label>
                                <p><?= $admissionDetails->admission_order_date; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Paid</label>
                                <p><?= $admissionDetails->fees_paid; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Receipt No</label>
                                <p><?= $admissionDetails->fees_receipt_no; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Receipt Date</label>
                                <p><?= $admissionDetails->fees_receipt_date; ?></p>
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
                                <label class="form-label mb-0">Date of Birth</label>
                                <p><?= $admissionDetails->date_of_birth; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Gender</label>
                                <p><?= $admissionDetails->gender; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Sports</label>
                                <p><?= $admissionDetails->sports; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Blood Group</label>
                                <p><?= $admissionDetails->blood_group; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Place of Birth</label>
                                <p><?= $admissionDetails->place_of_birth; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Country of Birth</label>
                                <p><?= $admissionDetails->country_of_birth; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Nationality</label>
                                <p><?= $admissionDetails->nationality; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Religion</label>
                                <p><?= $admissionDetails->religion; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Mother Tongue</label>
                                <p><?= $admissionDetails->mother_tongue; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Caste</label>
                                <p><?= $admissionDetails->caste; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Disability</label>
                                <p><?= $admissionDetails->disability; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Type of Disability</label>
                                <p><?= $admissionDetails->type_of_disability; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Economically Backward</label>
                                <p><?= $admissionDetails->economically_backward; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Domicile of State</label>
                                <p><?= $admissionDetails->domicile_of_state; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Hobbies</label>
                                <p><?= $admissionDetails->hobbies; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mb-0 text-primary">CURRENT ADDRESS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->current_address; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->current_city; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current District</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->current_district; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->current_state; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current Country</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->current_country; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Current Pincode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->current_pincode; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label mb-0 text-primary">PERMANENT ADDRESS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Permanent Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->present_address; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->present_city; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent District</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->present_district; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->present_state; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent Country</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->present_country; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">permanent Pincode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->present_pincode; ?></p>
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
                            <label class="form-label mb-0 text-primary">FATHER DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->father_name; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->father_mobile; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->father_email; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->father_occupation; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->father_annual_income; ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-0 text-primary">MOTHER DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->mother_name; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->mother_mobile; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->mother_email; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->mother_occupation; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->mother_annual_income; ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-0 text-primary">GUARDIAN DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->guardian_name; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->guardian_mobile; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->guardian_email; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->guardian_occupation; ?></p>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><?= $admissionDetails->guardian_annual_income; ?></p>
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
                                <label class="form-label mb-0">Level</label>
                                <p><?= $edu->education_level;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution Type</label>
                                <p><?= $edu->inst_type;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Board / University</label>
                                <p><?= $edu->inst_board;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution Name</label>
                                <p><?= $edu->inst_name;?></p>
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution Address</label>
                                <p><?= $edu->inst_address;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution City</label>
                                <p><?= $edu->inst_city;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution State</label>
                                <p><?= $edu->inst_state;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Institution Country</label>
                                <p><?= $edu->inst_country;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Medium of Instruction</label>
                                <p><?= $edu->medium_of_instruction;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Register Number</label>
                                <p><?= $edu->register_number;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Year of Passing</label>
                                <p><?= $edu->year_of_passing;?></p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <label class="form-label mb-0">Aggregate</label>
                                <p><?= $edu->aggregate;?>%</p>
                            </div>
                        </div>
                    </div>
                    <table class="table table-border">
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
                                if($subject_name){
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
                            <?php } } ?>

                        </tbody>

                    </table>
                    <hr>

                    <?php }   } ?>

                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">Documents</h3>
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
        </div>

        




    </section>
    <!-- /.content -->
</div>