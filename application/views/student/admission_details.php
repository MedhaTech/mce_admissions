    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="card card-info shadow">
                    <div class="card-header">
                        <h3 class="card-title">
                            <?=$page_title;?>
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                <?php echo anchor('student/dashboard', '<i class="fas fa-tachometer-alt"></i> Dashboard ', 'class="btn btn-dark btn-sm"'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
        
                        <?php echo form_open_multipart($action, 'class="user"'); ?>

                        <div class="row">

                            <div class="col-md-4 col-sm-12">

                                <div class="form-group">
                                    <label class="label">Name as per SSLC<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="student_name" name="student_name"
                                        value="<?php echo (set_value('student_name')) ? set_value('student_name') : $student_name; ?>"
                                        placeholder="Enter Student Name" readonly>
                                    <span class="text-danger"><?php echo form_error('student_name'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Mobile<span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" id="mobile"
                                        value="<?php echo (set_value('mobile')) ? set_value('mobile') : $mobile; ?>"
                                        class="form-control" placeholder="Enter Mobile Number" readonly>
                                    <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Email Id<span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email"
                                        value="<?php echo (set_value('email')) ? set_value('email') : $email; ?>"
                                        class="form-control" placeholder="Enter Email Id" readonly>
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Stream<span class="text-danger">*</span></label>
                                    <input type="text" value="<?= $this->admin_model->get_stream_by_id($admissionDetails->stream_id)["stream_name"]; ?>"
                                        class="form-control" placeholder="Enter Department Id" readonly>
                                    <span class="text-danger"><?php echo form_error('dept_id'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Department<span class="text-danger">*</span></label>
                                    <input type="text" value="<?= $this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"]; ?>"
                                        class="form-control" placeholder="Enter Department Id" readonly>
                                    <span class="text-danger"><?php echo form_error('dept_id'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Quota<span class="text-danger">*</span></label>
                                    <input type="text" name="quota" id="quota"
                                        value="<?php echo (set_value('quota')) ? set_value('quota') : $quota; ?>"
                                        class="form-control" placeholder="Enter Quota" readonly>
                                    <span class="text-danger"><?php echo form_error('quota'); ?></span>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">SubQuota<span class="text-danger">*</span></label>
                                    <input type="text" name="sub_quota" id="sub_quota"
                                        value="<?php echo (set_value('sub_quota')) ? set_value('sub_quota') : $sub_quota; ?>"
                                        class="form-control" placeholder="Enter SubQuota" readonly>
                                    <span class="text-danger"><?php echo form_error('sub_quota'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Category Claimed<span class="text-danger">*</span></label>
                                    <input type="text" name="category_claimed" id="category_claimed"
                                        value="<?php echo (set_value('category_claimed')) ? set_value('category_claimed') : $category_claimed; ?>"
                                        class="form-control" placeholder="Enter Category Claimed" readonly>
                                    <!-- <?php echo form_dropdown('category_claimed', $type_options, (set_value('category_claimed')) ? set_value('category_claimed') : $category_claimed, 'class="form-control" id="category_claimed"'); ?> -->
                                    <span class="text-danger"><?php echo form_error('category_claimed'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Category Allocated<span class="text-danger">*</span></label>
                                    <input type="text" name="category_allotted" id="category_allotted"
                                        value="<?php echo (set_value('category_allotted')) ? set_value('category_allotted') : $category_allotted; ?>"
                                        class="form-control" placeholder="Enter Category Allocatted" readonly>
                                    <span class="text-danger"><?php echo form_error('category_allotted'); ?></span>
                                </div>
                            </div>

                            

                        </div>
                        <div class="form-row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">College Code<span class="text-danger">*</span></label>
                                    <input type="text" name="college_code" id="college_code" class="form-control"
                                        value="<?php echo (set_value('college_code')) ? set_value('college_code') : $college_code; ?>"
                                        placeholder="Enter College Code" readonly>
                                    <span class="text-danger"><?php echo form_error('college_code'); ?></span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label class="label">Sports/Cultural Activities<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="sports" id="sports"
                                    value="<?php echo (set_value('sports')) ? set_value('sports') : $sports; ?>"
                                    class="form-control" placeholder="Enter Sports" readonly>
                                <!-- <?php $sports_options = array(" "=>"Select Sports","District"=>"District","State"=>"State","National"=>"National","International"=>"International","Not Applicable"=>"Not Applicable");
                                          echo form_dropdown('sports', $sports_options, (set_value('sports')) ? set_value('sports') : $sports, 'class="form-control" id="sports"'); ?> -->
                                <span class="text-danger"><?php echo form_error('sports'); ?></span>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Aadhaar Number<span class="text-danger">*</span></label>
                                    <input type="text" name="aadhaar" id="aadhaar"
                                        value="<?php echo (set_value('aadhaar')) ? set_value('aadhaar') : $aadhaar; ?>"
                                        class="form-control" placeholder="Enter Aadhaar Number" readonly>
                                    <span class="text-danger"><?php echo form_error('aadhaar'); ?></span>
                                </div>
                            </div>
                        </div>

                        <?php if ($admissionDetails->stream_id == 3): ?>
                            <div class="form-row">
                                <!-- Batch Input Field -->
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="label">Batch (pass out year)<span class="text-danger">*</span></label>
                                        <input type="text" name="batch" id="batch" class="form-control"
                                            value="<?php echo (set_value('batch')) ? set_value('batch') : $admissionDetails->batch; ?>"
                                            placeholder="Enter Batch" readonly>
                                        <span class="text-danger"><?php echo form_error('batch'); ?></span>
                                    </div>
                                </div>

                                <!-- Degree Level Input Field -->
                                <div class="form-group col-md-4 col-sm-12">
                                    <label class="label">Degree Level<span class="text-danger">*</span></label>
                                    <input type="text" name="degree_level" id="degree_level" class="form-control"
                                        value="<?php echo (set_value('degree_level')) ? set_value('degree_level') : $admissionDetails->degree_level; ?>"
                                        placeholder="Enter Degree Level" readonly>
                                    <span class="text-danger"><?php echo form_error('degree_level'); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php echo form_close(); ?>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo anchor('student/dashboard', 'BACK', 'class="btn btn-danger btn-square" '); ?>
                            </div>
                            <div class="col-md-6 text-right">
                                <?php echo anchor('student/entranceexamdetails', 'NEXT', 'class="btn btn-danger btn-square float-right" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>