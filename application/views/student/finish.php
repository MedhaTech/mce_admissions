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
                            <div class="checkbox vertical"><label><input type="checkbox" name="iAgree" id="iAgree"
                                        value="I Agree"> I hereby declare that the entries made by me in the Application
                                    Form are complete and true to the best of my knowledge, belief and information. I
                                    acknowledge that the college has the authority for taking punitive actions against
                                    me for violation or non-compliance of the same*</label></div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <label class="font-weight-normal">Applicant Name</label>
                                <input type="text" class="form-control" id="student_name" name="student_name"
                                    value="<?php echo (set_value('student_name')) ? set_value('student_name') : $student_name; ?>"
                                    placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('student_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <?php //print_r($admissionDetails); ?>
                                <label class="font-weight-normal">Parent Name</label>
                                <input type="text" class="form-control" id="father_name" name="father_name"
                                    value="<?php echo (set_value('father_name')) ? set_value('father_name') : $father_name; ?>"
                                    placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <label class="font-weight-normal">Date</label>
                                <input type="text" class="form-control" id="date" name="date"
                                    value="<?php echo date('d/m/Y'); ?>" placeholder="Enter Student Name" readonly>
                                <span class="text-danger"><?php echo form_error('date'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php //echo anchor('student/enquiries/', '<i class="fas fa-credit-card fa-sm fa-fw"></i> Back', 'class="btn btn-danger btn-sm float-right" '); ?>
                    <?php echo anchor('student/enquiries/', '<i class="fas fa-credit-card fa-sm fa-fw"></i> Make Payment', 'class="btn btn-danger btn-square btn-sm float-right" '); ?>
                </div>
            </div>




    </section>
    <!-- /.content -->
</div>