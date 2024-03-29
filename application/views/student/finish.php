<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="card m-2 card-info">
                <div class="card-header ">
                    <div class="card-title">
                        <h6 class="m-0 font-weight-bold">Admission Details</h6>
                    </div>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <?php echo anchor('admin/admissiondetails', '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
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
            <div class="card container-fluid">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="m-0 font-weight-bold text-info">Admission and Entrance Exam Details</h6>
                        </div>
                        <div class="col-6 text-right">
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Date of Birth</label><br>
                                <?= $personalDetails->date_of_birth; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Gender</label><br>
                                <?= $personalDetails->gender; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Sports</label><br>
                                <?= $personalDetails->sports; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Blood Group</label><br>
                                <?= $personalDetails->blood_group; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Place of Birth</label><br>
                                <?= $personalDetails->place_of_birth; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Country of Birth</label><br>
                                <?= $personalDetails->country_of_birth; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Nationality</label><br>
                                <?= $personalDetails->nationality; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Religion</label><br>
                                <?= $personalDetails->religion; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Caste</label><br>
                                <?= $personalDetails->caste; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Mother Tongue</label><br>
                                <?= $personalDetails->mother_tongue; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Disability</label><br>
                                <?= $personalDetails->disability; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Type of Disability</label><br>
                                <?= $personalDetails->type_of_disability; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Economically Backward</label><br>
                                <?= $personalDetails->economically_backward; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Domicile of State</label><br>
                                <?= $personalDetails->domicile_of_state; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Hobbies</label><br>
                                <?= $personalDetails->hobbies; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Current Address</label><br>
                                <?= $personalDetails->current_address; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Current City</label><br>
                                <?= $personalDetails->current_city; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Current District</label><br>
                                <?= $personalDetails->current_district; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Current State</label><br>
                                <?= $personalDetails->current_state; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Current Country</label><br>
                                <?= $personalDetails->current_country; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Current Pincode</label><br>
                                <?= $personalDetails->current_pincode; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Present Address</label><br>
                                <?= $personalDetails->present_address; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Present City</label><br>
                                <?= $personalDetails->present_city; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Present District</label><br>
                                <?= $personalDetails->present_district; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Present State</label><br>
                                <?= $personalDetails->present_state; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Present Country</label><br>
                                <?= $personalDetails->present_country; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Present Pincode</label><br>
                                <?= $personalDetails->present_pincode; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-info">Parents Details</h6>
                            </div>

                            <hr>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="16%">Details</th>
                                    <th width="28%">Father</th>
                                    <th width="28%">Mother</th>
                                    <th width="28%">Guardian</th>
                                </tr>
                                <tr>
                                    <th class="p-1 form-label">Name</th>
                                    <td><?= $parentDetails->father_name; ?></td>
                                    <td><?= $parentDetails->mother_name; ?></td>
                                    <td><?= $parentDetails->guardian_name; ?></td>
                                </tr>
                                <tr>
                                    <th class="p-1 form-label">Mobile</th>
                                    <td><?= $parentDetails->father_mobile; ?></td>
                                    <td><?= $parentDetails->mother_mobile; ?></td>
                                    <td><?= $parentDetails->guardian_mobile; ?></td>
                                </tr>
                                <tr>
                                    <th class="p-1 form-label">Email</th>
                                    <td><?= $parentDetails->father_email; ?></td>
                                    <td><?= $parentDetails->mother_email; ?></td>
                                    <td><?= $parentDetails->guardian_email; ?></td>
                                </tr>
                                <tr>
                                    <th class="p-1 form-label">Occupation</th>
                                    <td><?= $parentDetails->father_occupation; ?></td>
                                    <td><?= $parentDetails->mother_occupation; ?></td>
                                    <td><?= $parentDetails->guardian_occupation; ?></td>
                                </tr>
                                <tr>
                                    <th class="p-1 form-label">Annual Income</th>
                                    <td><?= $parentDetails->father_annual_income; ?></td>
                                    <td><?= $parentDetails->mother_annual_income; ?></td>
                                    <td><?= $parentDetails->guardian_annual_income; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>



                </div>

            </div>

            <div class="card container-fluid">

                <div class="card-body">


                    <div class="row">
                        <div class="col-md-12">
                            <p>I hereby declare that the entries made by me in the Application Form are complete and
                                true to the best of my knowledge, belief and information. I acknowledge that the
                                college has the authority for taking punitive actions against me for violation or
                                non-compliance of the same*</p>
                            <div class="checkbox vertical"><label><input type="checkbox" name="iAgree" id="iAgree"
                                        value="I Agree"> I Agree
                                </label></div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <?php //echo anchor('admin/enquiries/', '<i class="fas fa-credit-card fa-sm fa-fw"></i> Back', 'class="btn btn-danger btn-sm float-right" '); ?>
                    <?php echo anchor('admin/enquiries/', '<i class="fas fa-credit-card fa-sm fa-fw"></i> Make Payment', 'class="btn btn-danger btn-sm float-right" '); ?>
                </div>


    </section>
    <!-- /.content -->
</div>