<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card card-info shadow">
                <div class="card-header">
                    <h3 class="card-title">
                        <?= $page_title; ?>
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <?php $encryptId = base64_encode($admissionDetails->id);
                                echo anchor('admin/admissionDetails/' . $encryptId, '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-sm"'); ?>
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
                                    placeholder="Enter Student Name">
                                <span class="text-danger"><?php echo form_error('student_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">Mobile<span class="text-danger">*</span></label>
                                <input type="text" name="mobile" id="mobile"
                                    value="<?php echo (set_value('mobile')) ? set_value('mobile') : $mobile; ?>"
                                    class="form-control" placeholder="Enter Mobile Number">
                                <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">Email Id<span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email"
                                    value="<?php echo (set_value('email')) ? set_value('email') : $email; ?>"
                                    class="form-control" placeholder="Enter Email Id">
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">Aadhaar Number<span class="text-danger">*</span></label>
                                <input type="text" name="aadhaar" id="aadhaar"
                                    value="<?php echo (set_value('aadhaar')) ? set_value('aadhaar') : $aadhaar; ?>"
                                    class="form-control" placeholder="Enter Aadhaar Number">
                                <span class="text-danger"><?php echo form_error('aadhaar'); ?></span>
                            </div>
                        </div>
                        <!-- <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Department<span class="text-danger">*</span></label>
                                    <input type="text"
                                     value="<?= $this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"]; ?>"
                                        class="form-control" placeholder="Enter Department Id" >
                                    <span class="text-danger"><?php echo form_error('dept_id'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">Quota<span class="text-danger">*</span></label>
                                    <input type="text" name="quota" id="quota"
                                        value="<?php echo (set_value('quota')) ? set_value('quota') : $quota; ?>"
                                        class="form-control" placeholder="Enter Quota" >
                                    <span class="text-danger"><?php echo form_error('quota'); ?></span>
                                </div>
                            </div> -->
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">Category Allocated<span class="text-danger">*</span></label>
                                <?php echo form_dropdown('category_allotted', $category_options, (set_value('category_allotted')) ? set_value('category_allotted') : $category_allotted, 'class="form-control" id="category_allotted"'); ?>
                                <span class="text-danger"><?php echo form_error('category_allotted'); ?></span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">Category Claimed<span class="text-danger">*</span></label>
                                <?php echo form_dropdown('category_claimed', $category_options, (set_value('category_claimed')) ? set_value('category_claimed') : $category_claimed, 'class="form-control" id="category_claimed"'); ?>
                                <span class="text-danger"><?php echo form_error('category_claimed'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="label">Sports/Cultural Activities<span class="text-danger">*</span></label>
                            <!-- <input type="text" name="sports" id="sports"
                                    value="<?php echo (set_value('sports')) ? set_value('sports') : $sports; ?>"
                                    class="form-control" placeholder="Enter Sports" > -->
                            <?php $sports_options = array(" " => "Select Sports", "State Level" => "State Level", "National Level" => "National Level", "International Level" => "International Level", "Not Applicable" => "Not Applicable");
                            echo form_dropdown('sports', $sports_options, (set_value('sports')) ? set_value('sports') : $sports, 'class="form-control" id="sports"'); ?>
                            <span class="text-danger"><?php echo form_error('sports'); ?></span>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">USN<span class="text-danger">*</span></label>
                                <input type="text" name="usn" id="usn"
                                    value="<?php echo (set_value('usn')) ? set_value('usn') : $usn; ?>"
                                    class="form-control" placeholder="Enter USN">
                                <span class="text-danger"><?php echo form_error('usn'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">Admission Based On<span class="text-danger">*</span></label>
                                <?php
                                echo form_dropdown('admission_based', $admissionBased_options, (set_value('admission_based')) ? set_value('admission_based') : $admission_based, 'class="form-control " id="admission_based"');
                                ?>

                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <!-- <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="label">SubQuota<span class="text-danger">*</span></label>
                                    <input type="text" name="sub_quota" id="sub_quota"
                                        value="<?php echo (set_value('sub_quota')) ? set_value('sub_quota') : $sub_quota; ?>"
                                        class="form-control" placeholder="Enter SubQuota" >
                                    <span class="text-danger"><?php echo form_error('sub_quota'); ?></span>
                                </div>
                            </div> -->

                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo anchor('admin/admissionDetails/' . $encryptId, '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-square"'); ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-success btn-square" name="Update" id="Update"> UPDATE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </section>
</div>