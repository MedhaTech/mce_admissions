<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">

            <!-- <h1 class="h3 mb-2 text-gray-800"> Grievance Tickets </h1> -->

            <div class="card card-info shadow mb-2">
                <div class="card-header">
                    <h3 class="card-title">
                        EDUCATION DETAILS
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <?php $encryptId = base64_encode($personalDetails->id);
                                echo anchor('admin/admissionDetails/' . $encryptId, '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-sm"'); ?>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <?php

                        if (count($educations_details)) {
                            $table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
                            $this->table->set_template($table_setup);
                            $print_fields = array('S.NO', 'Level', 'Board ', 'Institution Name', 'Institution City', 'Medium of Instruction', 'Aggregate(%)', 'Register Number', 'Year of Passing', 'Actions');
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
                                    $edu->aggregate,
                                    $edu->register_number,
                                    $edu->year_of_passing,
                                    anchor('admin/updateeducationdetails/' . $edu->id . '/' . $student_id, '<span class="icon"><i class="fas fa-edit"></i></span> <span class="text">Edit</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"')

                                );
                                $this->table->add_row($result_array);
                            }
                            $table = $this->table->generate();
                            print_r($table);
                        } ?>
                    </div>
                </div>
            </div>
            <div class="card card-info shadow mb-2">
                <?php if (count($educations_details) == 0) { ?>
                    <div class="card-header">
                        <h3 class="m-0 card-title text-uppercase">New Education Details</h6>
                    </div>
                    <?php echo form_open_multipart($action, 'class="user"'); ?>

                    <div class="card-body">


                        <div class="form-row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Level</label>
                                    <?php $level_options = array("SSLC" => "SSLC");
                                    echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : 'education_level', 'class="form-control " id="education_level"');
                                    ?>
                                    <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Board / University</label>
                                    <input type="text" name="inst_board" id="inst_board"
                                        value="<?php echo (set_value('inst_board')) ? set_value('inst_board') : $inst_board; ?>"
                                        class="form-control" placeholder="Enter Institution Board">
                                    <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Institution Name</label>
                                    <input type="text" name="inst_name" id="inst_name"
                                        value="<?php echo (set_value('inst_name')) ? set_value('inst_name') : $inst_name; ?>"
                                        class="form-control" placeholder="Enter Institution Name">
                                    <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                                </div>
                            </div>


                        </div>

                        <div class="form-row">
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Institution Address</label>
                                    <input type="text" name="inst_address" id="inst_address"
                                        value="<?php echo (set_value('inst_address')) ? set_value('inst_address') : $inst_address; ?>"
                                        class="form-control" placeholder="Enter Institution Address">
                                    <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">

                                    <label class="label">Institution Country</label>

                                    <select name="inst_country" id="inst_country" class="form-control input-lg select2">
                                        <option value="" <?= $selected_country === '' ? 'selected' : '' ?>>Select Country
                                        </option>
                                        <?php foreach ($countries as $country): ?>
                                            <option data-id="<?= $country->id ?>" value="<?= $country->name ?>"
                                                <?= $selected_country === $country->name ? 'selected' : '' ?>>
                                                <?= $country->name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('inst_country'); ?></span>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Institution State</label>

                                    <!-- <input type="text" name="inst_state" id="inst_state" class="form-control" placeholder="Enter Institution State"> -->
                                    <select name="inst_state" id="inst_state" class="form-control input-lg select2">
                                        <option value="">Select State</option>
                                    </select>

                                    <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">

                                    <label class="label">Institution City</label>
                                    <select name="inst_city" id="inst_city" class="form-control input-lg select2">
                                        <option value="">Select City</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('inst_city'); ?></span>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Medium of Instruction</label>

                                    <?php

                                    // $instruction_options= array(" " => "Select Medium of instruction") + $this->globals->medium_of_instruction();
                                    echo form_dropdown('medium_of_instruction', $instruction_options, (set_value('medium_of_instruction')) ? set_value('medium_of_instruction') : $medium_of_instruction, 'class="form-control form-control" id="medium_of_instruction"');
                                    ?>

                                    <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Register Number</label>
                                    <input type="text" name="register_number"
                                        value="<?php echo (set_value('register_number')) ? set_value('register_number') : $register_number; ?>"
                                        id="register_number" class="form-control" placeholder="Enter Register Number">
                                    <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Year of Passing</label>
                                    <input type="month" name="year_of_passing"
                                        value="<?php echo (set_value('year_of_passing')) ? set_value('year_of_passing') : $year_of_passing; ?>"
                                        id="year_of_passing" class="form-control" placeholder="Enter School Year">
                                    <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
                                </div>
                            </div>
                        </div>
                        <table class="table" border="1">
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Max Marks</th>
                                    <th>Min Marks</th>

                                    <th>Obtained Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Subject 1 -->
                                <tr>
                                    <td>
                                        <input type="text" name="subject_1_name" id="subject_1_name" class="form-control"
                                            placeholder="Enter Subject Name"
                                            value="<?php echo (set_value('subject_1_name')) ? set_value('subject_1_name') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_1_name'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_1_max_marks" id="subject_1_max_marks"
                                            class="form-control" placeholder="Enter Max Marks"
                                            value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_1_min_marks" id="subject_1_min_marks"
                                            class="form-control" placeholder="Enter Min Marks"
                                            value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks"
                                            class="form-control" placeholder="Enter Obtained Marks"
                                            value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : ''; ?>">
                                        <span
                                            class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                    </td>
                                </tr>
                                <!-- Subject 2 -->
                                <tr>
                                    <td>
                                        <input type="text" name="subject_2_name" id="subject_2_name" class="form-control"
                                            placeholder="Enter Subject Name"
                                            value="<?php echo (set_value('subject_2_name')) ? set_value('subject_2_name') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_2_name'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_2_max_marks" id="subject_2_max_marks"
                                            class="form-control" placeholder="Enter Max Marks"
                                            value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_2_min_marks" id="subject_2_min_marks"
                                            class="form-control" placeholder="Enter Min Marks"
                                            value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks"
                                            class="form-control" placeholder="Enter Obtained Marks"
                                            value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : ''; ?>">
                                        <span
                                            class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                    </td>
                                </tr>
                                <!-- Subject 3 -->
                                <tr>
                                    <td>
                                        <input type="text" name="subject_3_name" id="subject_3_name" class="form-control"
                                            placeholder="Enter Subject Name"
                                            value="<?php echo (set_value('subject_3_name')) ? set_value('subject_3_name') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_3_name'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_3_max_marks" id="subject_3_max_marks"
                                            class="form-control" placeholder="Enter Max Marks"
                                            value="<?php echo (set_value('subject_3_max_marks')) ? set_value('subject_3_max_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_3_max_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_3_min_marks" id="subject_3_min_marks"
                                            class="form-control" placeholder="Enter Min Marks"
                                            value="<?php echo (set_value('subject_3_min_marks')) ? set_value('subject_3_min_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_3_min_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_3_obtained_marks" id="subject_3_obtained_marks"
                                            class="form-control" placeholder="Enter Obtained Marks"
                                            value="<?php echo (set_value('subject_3_obtained_marks')) ? set_value('subject_3_obtained_marks') : ''; ?>">
                                        <span
                                            class="text-danger"><?php echo form_error('subject_3_obtained_marks'); ?></span>
                                    </td>
                                </tr>
                                <!-- Subject 4 -->
                                <tr>
                                    <td>
                                        <input type="text" name="subject_4_name" id="subject_4_name" class="form-control"
                                            placeholder="Enter Subject Name"
                                            value="<?php echo (set_value('subject_4_name')) ? set_value('subject_4_name') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_4_name'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_4_max_marks" id="subject_4_max_marks"
                                            class="form-control" placeholder="Enter Max Marks"
                                            value="<?php echo (set_value('subject_4_max_marks')) ? set_value('subject_4_max_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_4_max_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_4_min_marks" id="subject_4_min_marks"
                                            class="form-control" placeholder="Enter Min Marks"
                                            value="<?php echo (set_value('subject_4_min_marks')) ? set_value('subject_4_min_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_4_min_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_4_obtained_marks" id="subject_4_obtained_marks"
                                            class="form-control" placeholder="Enter Obtained Marks"
                                            value="<?php echo (set_value('subject_4_obtained_marks')) ? set_value('subject_4_obtained_marks') : ''; ?>">
                                        <span
                                            class="text-danger"><?php echo form_error('subject_4_obtained_marks'); ?></span>
                                    </td>
                                </tr>
                                <!-- Subject 5 -->
                                <tr>
                                    <td>
                                        <input type="text" name="subject_5_name" id="subject_5_name" class="form-control"
                                            placeholder="Enter Subject Name"
                                            value="<?php echo (set_value('subject_5_name')) ? set_value('subject_5_name') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_5_name'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_5_max_marks" id="subject_5_max_marks"
                                            class="form-control" placeholder="Enter Max Marks"
                                            value="<?php echo (set_value('subject_5_max_marks')) ? set_value('subject_5_max_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_5_max_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_5_min_marks" id="subject_5_min_marks"
                                            class="form-control" placeholder="Enter Min Marks"
                                            value="<?php echo (set_value('subject_5_min_marks')) ? set_value('subject_5_min_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_5_min_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_5_obtained_marks" id="subject_5_obtained_marks"
                                            class="form-control" placeholder="Enter Obtained Marks"
                                            value="<?php echo (set_value('subject_5_obtained_marks')) ? set_value('subject_5_obtained_marks') : ''; ?>">
                                        <span
                                            class="text-danger"><?php echo form_error('subject_5_obtained_marks'); ?></span>
                                    </td>
                                </tr>
                                <!-- Subject 6 -->
                                <tr>
                                    <td>
                                        <input type="text" name="subject_6_name" id="subject_6_name" class="form-control"
                                            placeholder="Enter Subject Name"
                                            value="<?php echo (set_value('subject_6_name')) ? set_value('subject_6_name') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_6_name'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_6_max_marks" id="subject_6_max_marks"
                                            class="form-control" placeholder="Enter Max Marks"
                                            value="<?php echo (set_value('subject_6_max_marks')) ? set_value('subject_6_max_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_6_max_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_6_min_marks" id="subject_6_min_marks"
                                            class="form-control" placeholder="Enter Min Marks"
                                            value="<?php echo (set_value('subject_6_min_marks')) ? set_value('subject_6_min_marks') : ''; ?>">
                                        <span class="text-danger"><?php echo form_error('subject_6_min_marks'); ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="subject_6_obtained_marks" id="subject_6_obtained_marks"
                                            class="form-control" placeholder="Enter Obtained Marks"
                                            value="<?php echo (set_value('subject_6_obtained_marks')) ? set_value('subject_6_obtained_marks') : ''; ?>">
                                        <span
                                            class="text-danger"><?php echo form_error('subject_6_obtained_marks'); ?></span>
                                    </td>
                                </tr>
                            </tbody>
                            <!-- <tfoot>
                                  <tr>
                                      <th>Total</th>
                                      <th> <input type="text" name="total_max_marks" id="total_max_marks" class="form-control" value="" readonly></th>
                                      <th><input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                      <th><input type="text" name="total_obtained_marks" id="total_obtained_marks" class="form-control" value="" readonly></th>
                                  </tr>

                              </tfoot> -->
                        </table>
                        <div class="form-row">
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Obtained Marks</label>
                                    <input type="text" name="total_obtained_marks" id="total_obtained_marks"
                                        class="form-control"
                                        value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>"
                                        readonly>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Maximum Marks</label>
                                    <input type="text" name="total_max_marks" id="total_max_marks" class="form-control"
                                        value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>"
                                        readonly>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="label">Aggregate Percentage</label>
                                    <input type="text" name="aggregate" id="aggregate" class="form-control"
                                        value="<?php echo (set_value('aggregate')) ? set_value('aggregate') : ''; ?>"
                                        readonly>

                                </div>
                            </div>

                        </div>


                    </div>

                    <?php if ($personalDetails->admission_based == "PUC") { ?>
                        <div class="card-body" id="card1">

                            <h3>PUC DETAILS FORM</h3>

                            <div class="form-row">

                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Level</label>
                                        <?php $level_options = array("PUC" => "PUC");
                                        echo form_dropdown('puc_education_level', $level_options, (set_value('puc_education_level')) ? set_value('puc_education_level') : 'puc_education_level', 'class="form-control " id="puc_education_level"');
                                        ?>
                                        <span class="text-danger"><?php echo form_error('puc_education_level'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Board / University</label>
                                        <input type="text" name="puc_inst_board" id="puc_inst_board"
                                            value="<?php echo (set_value('puc_inst_board')) ? set_value('puc_inst_board') : $puc_inst_board; ?>"
                                            class="form-control" placeholder="Enter Institution Board">
                                        <span class="text-danger"><?php echo form_error('puc_inst_board'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Name</label>
                                        <input type="text" name="puc_inst_name" id="puc_inst_name"
                                            value="<?php echo (set_value('puc_inst_name')) ? set_value('puc_inst_name') : $puc_inst_name; ?>"
                                            class="form-control" placeholder="Enter Institution Name">
                                        <span class="text-danger"><?php echo form_error('puc_inst_name'); ?></span>
                                    </div>
                                </div>


                            </div>

                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Address</label>
                                        <input type="text" name="puc_inst_address" id="puc_inst_address"
                                            value="<?php echo (set_value('puc_inst_address')) ? set_value('puc_inst_address') : $puc_inst_address; ?>"
                                            class="form-control" placeholder="Enter Institution Address">
                                        <span class="text-danger"><?php echo form_error('puc_inst_address'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution Country</label>

                                        <select name="puc_inst_country" id="puc_inst_country"
                                            class="form-control input-lg select2">
                                            <option selected="">Select Country</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option data-id="<?= $country->id ?>" value="<?= $country->name ?>">
                                                    <?= $country->name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('puc_inst_country'); ?></span>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution State</label>

                                        <!-- <input type="text" name="puc_inst_state" id="puc_inst_state" class="form-control" placeholder="Enter Institution State"> -->
                                        <select name="puc_inst_state" id="puc_inst_state" class="form-control input-lg select2">
                                            <option value="">Select State</option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('puc_inst_state'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution City</label>
                                        <select name="puc_inst_city" id="puc_inst_city" class="form-control input-lg select2">
                                            <option value="">Select City</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('puc_inst_city'); ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Medium of Instruction</label>

                                        <?php
                                        echo form_dropdown('puc_medium_of_instruction', $instruction_options, (set_value('puc_medium_of_instruction')) ? set_value('puc_medium_of_instruction') : $puc_medium_of_instruction, 'class="form-control form-control" id="puc_medium_of_instruction"');
                                        ?>

                                        <span class="text-danger"><?php echo form_error('puc_medium_of_instruction'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Register Number</label>
                                        <input type="text" name="puc_register_number"
                                            value="<?php echo (set_value('puc_register_number')) ? set_value('puc_register_number') : $puc_register_number; ?>"
                                            id="puc_register_number" class="form-control" placeholder="Enter Register Number">
                                        <span class="text-danger"><?php echo form_error('puc_register_number'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Year of Passing</label>
                                        <input type="month" name="puc_year_of_passing"
                                            value="<?php echo (set_value('puc_year_of_passing')) ? set_value('puc_year_of_passing') : $puc_year_of_passing; ?>"
                                            id="puc_year_of_passing" class="form-control" placeholder="Enter School Year">
                                        <span class="text-danger"><?php echo form_error('puc_year_of_passing'); ?></span>
                                    </div>
                                </div>
                            </div>




                            <table class="table" border="1">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Max Marks</th>
                                        <th>Min Marks</th>

                                        <th>Obtained Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Subject 1 -->
                                    <tr>
                                        <td>
                                            <input type="text" name="puc_subject_1_name" id="puc_subject_1_name"
                                                class="form-control" placeholder="Enter Subject Name"
                                                value="<?php echo (set_value('puc_subject_1_name')) ? set_value('puc_subject_1_name') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('puc_subject_1_name'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_1_max_marks" id="puc_subject_1_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('puc_subject_1_max_marks')) ? set_value('puc_subject_1_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_1_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_1_min_marks" id="puc_subject_1_min_marks"
                                                class="form-control" placeholder="Enter Min Marks"
                                                value="<?php echo (set_value('puc_subject_1_min_marks')) ? set_value('puc_subject_1_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_1_min_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_1_obtained_marks"
                                                id="puc_subject_1_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('puc_subject_1_obtained_marks')) ? set_value('puc_subject_1_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_1_obtained_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 2 -->
                                    <tr>
                                        <td>
                                            <input type="text" name="puc_subject_2_name" id="puc_subject_2_name"
                                                class="form-control" placeholder="Enter Subject Name"
                                                value="<?php echo (set_value('puc_subject_2_name')) ? set_value('puc_subject_2_name') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('puc_subject_2_name'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_2_max_marks" id="puc_subject_2_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('puc_subject_2_max_marks')) ? set_value('puc_subject_2_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_2_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_2_min_marks" id="puc_subject_2_min_marks"
                                                class="form-control" placeholder="Enter Min Marks"
                                                value="<?php echo (set_value('puc_subject_2_min_marks')) ? set_value('puc_subject_2_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_2_min_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_2_obtained_marks"
                                                id="puc_subject_2_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('puc_subject_2_obtained_marks')) ? set_value('puc_subject_2_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_2_obtained_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 3 -->
                                    <tr>
                                        <td>
                                            <input type="text" name="puc_subject_3_name" id="puc_subject_3_name"
                                                class="form-control" placeholder="Enter Subject Name"
                                                value="<?php echo (set_value('puc_subject_3_name')) ? set_value('puc_subject_3_name') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('puc_subject_3_name'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_3_max_marks" id="puc_subject_3_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('puc_subject_3_max_marks')) ? set_value('puc_subject_3_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_3_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_3_min_marks" id="puc_subject_3_min_marks"
                                                class="form-control" placeholder="Enter Min Marks"
                                                value="<?php echo (set_value('puc_subject_3_min_marks')) ? set_value('puc_subject_3_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_3_min_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_3_obtained_marks"
                                                id="puc_subject_3_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('puc_subject_3_obtained_marks')) ? set_value('puc_subject_3_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_3_obtained_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 4 -->
                                    <tr>
                                        <td>
                                            <input type="text" name="puc_subject_4_name" id="puc_subject_4_name"
                                                class="form-control" placeholder="Enter Subject Name"
                                                value="<?php echo (set_value('puc_subject_4_name')) ? set_value('puc_subject_4_name') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('puc_subject_4_name'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_4_max_marks" id="puc_subject_4_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('puc_subject_4_max_marks')) ? set_value('puc_subject_4_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_4_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_4_min_marks" id="puc_subject_4_min_marks"
                                                class="form-control" placeholder="Enter Min Marks"
                                                value="<?php echo (set_value('puc_subject_4_min_marks')) ? set_value('puc_subject_4_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_4_min_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_4_obtained_marks"
                                                id="puc_subject_4_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('puc_subject_4_obtained_marks')) ? set_value('puc_subject_4_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_4_obtained_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 5 -->
                                    <tr>
                                        <td>
                                            <input type="text" name="puc_subject_5_name" id="puc_subject_5_name"
                                                class="form-control" placeholder="Enter Subject Name"
                                                value="<?php echo (set_value('puc_subject_5_name')) ? set_value('puc_subject_5_name') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('puc_subject_5_name'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_5_max_marks" id="puc_subject_5_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('puc_subject_5_max_marks')) ? set_value('puc_subject_5_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_5_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_5_min_marks" id="puc_subject_5_min_marks"
                                                class="form-control" placeholder="Enter Min Marks"
                                                value="<?php echo (set_value('puc_subject_5_min_marks')) ? set_value('puc_subject_5_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_5_min_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_5_obtained_marks"
                                                id="puc_subject_5_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('puc_subject_5_obtained_marks')) ? set_value('puc_subject_5_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_5_obtained_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 6 -->
                                    <tr>
                                        <td>
                                            <input type="text" name="puc_subject_6_name" id="puc_subject_6_name"
                                                class="form-control" placeholder="Enter Subject Name"
                                                value="<?php echo (set_value('puc_subject_6_name')) ? set_value('puc_subject_6_name') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('puc_subject_6_name'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_6_max_marks" id="puc_subject_6_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('puc_subject_6_max_marks')) ? set_value('puc_subject_6_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_6_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_6_min_marks" id="puc_subject_6_min_marks"
                                                class="form-control" placeholder="Enter Min Marks"
                                                value="<?php echo (set_value('puc_subject_6_min_marks')) ? set_value('puc_subject_6_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_6_min_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="puc_subject_6_obtained_marks"
                                                id="puc_subject_6_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('puc_subject_6_obtained_marks')) ? set_value('puc_subject_6_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('puc_subject_6_obtained_marks'); ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- <tfoot>
                                      <tr>
                                          <th>Total</th>
                                          <th><input type="text" name="puc_total_min_marks" id="puc_total_min_marks" class="form-control" value="" readonly></th>
                                          <th> <input type="text" name="puc_total_max_marks" id="puc_total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="puc_total_obtained_marks" id="puc_total_obtained_marks" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                            </table>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Obtained Marks</label>
                                        <input type="text" name="puc_total_obtained_marks" id="puc_total_obtained_marks"
                                            value="<?php echo (set_value('puc_total_obtained_marks')) ? set_value('puc_total_obtained_marks') : ''; ?>"
                                            class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Maximum Marks</label>
                                        <input type="text" name="puc_total_max_marks" id="puc_total_max_marks"
                                            value="<?php echo (set_value('puc_total_max_marks')) ? set_value('puc_total_max_marks') : ''; ?>"
                                            class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Aggregate Percentage</label>
                                        <input type="text" name="puc_aggregate" id="puc_aggregate"
                                            value="<?php echo (set_value('puc_aggregate')) ? set_value('puc_aggregate') : ''; ?>"
                                            class="form-control" readonly>

                                    </div>
                                </div>

                            </div>


                        </div>

                    <?php } ?>
                    <?php if ($personalDetails->admission_based == "DIPLOMA") { ?>
                        <div class="card-body" id="card2">


                            <h3>Diploma Details</h3>

                            <div class="form-row">

                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Level</label>
                                        <?php $level_options = array("Diploma" => "Diploma");
                                        echo form_dropdown('diploma_education_level', $level_options, (set_value('diploma_education_level')) ? set_value('diploma_education_level') : 'diploma_education_level', 'class="form-control " id="diploma_education_level"');
                                        ?>
                                        <span class="text-danger"><?php echo form_error('diploma_education_level'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Board / University</label>
                                        <input type="text" name="diploma_inst_board" id="diploma_inst_board"
                                            value="<?php echo (set_value('diploma_inst_board')) ? set_value('diploma_inst_board') : $diploma_inst_board; ?>"
                                            class="form-control" placeholder="Enter Institution Board">
                                        <span class="text-danger"><?php echo form_error('diploma_inst_board'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Name</label>
                                        <input type="text" name="diploma_inst_name" id="diploma_inst_name"
                                            value="<?php echo (set_value('diploma_inst_name')) ? set_value('diploma_inst_name') : $diploma_inst_name; ?>"
                                            class="form-control" placeholder="Enter Institution Name">
                                        <span class="text-danger"><?php echo form_error('diploma_inst_name'); ?></span>
                                    </div>
                                </div>



                            </div>

                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Address</label>
                                        <input type="text" name="diploma_inst_address" id="diploma_inst_address"
                                            value="<?php echo (set_value('diploma_inst_address')) ? set_value('diploma_inst_address') : $diploma_inst_address; ?>"
                                            class="form-control" placeholder="Enter Institution Address">
                                        <span class="text-danger"><?php echo form_error('diploma_inst_address'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution Country</label>

                                        <select name="diploma_inst_country" id="diploma_inst_country"
                                            class="form-control input-lg select2">
                                            <option selected="">Select Country</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option data-id="<?= $country->id ?>" value="<?= $country->name ?>">
                                                    <?= $country->name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('diploma_inst_country'); ?></span>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution State</label>

                                        <!-- <input type="text" name="diploma_inst_state" id="diploma_inst_state" class="form-control" placeholder="Enter Institution State"> -->
                                        <select name="diploma_inst_state" id="diploma_inst_state"
                                            class="form-control input-lg select2">
                                            <option value="">Select State</option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('diploma_inst_state'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution City</label>
                                        <select name="diploma_inst_city" id="diploma_inst_city"
                                            class="form-control input-lg select2">
                                            <option value="">Select City</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('diploma_inst_city'); ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Medium of Instruction</label>

                                        <?php

                                        // $instruction_options= array(" " => "Select Medium of instruction") + $this->globals->diploma_medium_of_instruction();
                                        echo form_dropdown('diploma_medium_of_instruction', $instruction_options, (set_value('diploma_medium_of_instruction')) ? set_value('diploma_medium_of_instruction') : $diploma_medium_of_instruction, 'class="form-control form-control" id="diploma_medium_of_instruction"');
                                        ?>

                                        <span
                                            class="text-danger"><?php echo form_error('diploma_medium_of_instruction'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Register Number</label>
                                        <input type="text" name="diploma_register_number"
                                            value="<?php echo (set_value('diploma_register_number')) ? set_value('diploma_register_number') : $diploma_register_number; ?>"
                                            id="diploma_register_number" class="form-control"
                                            placeholder="Enter Register Number">
                                        <span class="text-danger"><?php echo form_error('diploma_register_number'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Year of Passing</label>
                                        <input type="month" name="diploma_year_of_passing"
                                            value="<?php echo (set_value('diploma_year_of_passing')) ? set_value('diploma_year_of_passing') : $diploma_year_of_passing; ?>"
                                            id="diploma_year_of_passing" class="form-control" placeholder="Enter School Year">
                                        <span class="text-danger"><?php echo form_error('diploma_year_of_passing'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <table class="table" border="1">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Obtained Marks</th>
                                        <th>Maximum Marks</th>
                                        <th>Percentage%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Subject 1 -->
                                    <tr>
                                        <th><input type="text" name="diploma_subject_1_name" id="diploma_subject_1_name"
                                                class="form-control font-weight-bold" placeholder="I Year" value="I Year"
                                                readonly></th>
                                        <td>
                                            <input type="number" name="diploma_subject_1_obtained_marks"
                                                id="diploma_subject_1_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('diploma_subject_1_obtained_marks')) ? set_value('diploma_subject_1_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_1_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="diploma_subject_1_max_marks"
                                                id="diploma_subject_1_max_marks" class="form-control"
                                                placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('diploma_subject_1_max_marks')) ? set_value('diploma_subject_1_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_1_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="diploma_subject_1_min_marks"
                                                id="diploma_subject_1_min_marks" placeholder="Enter Percentage"
                                                class="form-control"
                                                value="<?php echo (set_value('diploma_subject_1_min_marks')) ? set_value('diploma_subject_1_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_1_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 2 -->
                                    <tr>
                                        <th><input type="text" name="diploma_subject_2_name" id="diploma_subject_2_name"
                                                class="form-control font-weight-bold" placeholder="II Year" value="II Year"
                                                readonly></th>
                                        <td>
                                            <input type="number" name="diploma_subject_2_obtained_marks"
                                                id="diploma_subject_2_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('diploma_subject_2_obtained_marks')) ? set_value('diploma_subject_2_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_2_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="diploma_subject_2_max_marks"
                                                id="diploma_subject_2_max_marks" class="form-control"
                                                placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('diploma_subject_2_max_marks')) ? set_value('diploma_subject_2_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_2_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="diploma_subject_2_min_marks"
                                                id="diploma_subject_2_min_marks" placeholder="Enter Percentage"
                                                class="form-control"
                                                value="<?php echo (set_value('diploma_subject_2_min_marks')) ? set_value('diploma_subject_2_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_2_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 3 -->
                                    <tr>
                                        <th><input type="text" name="diploma_subject_3_name" id="diploma_subject_3_name"
                                                class="form-control font-weight-bold" placeholder="III Year" value="III Year"
                                                readonly></th>
                                        <td>
                                            <input type="number" name="diploma_subject_3_obtained_marks"
                                                id="diploma_subject_3_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('diploma_subject_3_obtained_marks')) ? set_value('diploma_subject_3_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_3_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="diploma_subject_3_max_marks"
                                                id="diploma_subject_3_max_marks" class="form-control"
                                                placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('diploma_subject_3_max_marks')) ? set_value('diploma_subject_3_max_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_3_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="diploma_subject_3_min_marks"
                                                id="diploma_subject_3_min_marks" placeholder="Enter Percentage"
                                                class="form-control"
                                                value="<?php echo (set_value('diploma_subject_3_min_marks')) ? set_value('diploma_subject_3_min_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('diploma_subject_3_min_marks'); ?></span>
                                        </td>
                                    </tr>

                                </tbody>
                                <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="diploma_total_min_marks" id="diploma_total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="diploma_total_max_marks" id="diploma_total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="diploma_aggregate" id="diploma_aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                            </table>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Obtained Marks</label>
                                        <input type="text" name="diploma_total_obtained_marks"
                                            value="<?php echo (set_value('diploma_total_obtained_marks')) ? set_value('diploma_total_obtained_marks') : ''; ?>"
                                            id="diploma_total_obtained_marks" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Maximum Marks</label>
                                        <input type="text" name="diploma_total_max_marks"
                                            value="<?php echo (set_value('diploma_total_max_marks')) ? set_value('diploma_total_max_marks') : ''; ?>"
                                            id="diploma_total_max_marks" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Aggregate Percentage</label>
                                        <input type="text" name="diploma_aggregate"
                                            value="<?php echo (set_value('diploma_aggregate')) ? set_value('diploma_aggregate') : ''; ?>"
                                            id="diploma_aggregate" class="form-control" readonly>

                                    </div>
                                </div>

                            </div>


                        </div>
                    <?php } ?>
                    <?php if ($personalDetails->admission_based == "GTTC") { ?>
                        <div class="card-body" id="card2">


                            <h3>GT & TC </h3>

                            <div class="form-row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Level</label>
                                        <?php $level_options = array("Diploma" => "Diploma");
                                        echo form_dropdown('gt_education_level', $level_options, (set_value('gt_education_level')) ? set_value('gt_education_level') : 'gt_education_level', 'class="form-control " id="gt_education_level"');
                                        ?>
                                        <span class="text-danger"><?php echo form_error('gt_education_level'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Board / University</label>
                                        <input type="text" name="gt_inst_board" id="gt_inst_board"
                                            value="<?php echo (set_value('gt_inst_board')) ? set_value('gt_inst_board') : $gt_inst_board; ?>"
                                            class="form-control" placeholder="Enter Institution Board">
                                        <span class="text-danger"><?php echo form_error('gt_inst_board'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Name</label>
                                        <input type="text" name="gt_inst_name" id="gt_inst_name"
                                            value="<?php echo (set_value('gt_inst_name')) ? set_value('gt_inst_name') : $gt_inst_name; ?>"
                                            class="form-control" placeholder="Enter Institution Name">
                                        <span class="text-danger"><?php echo form_error('gt_inst_name'); ?></span>
                                    </div>
                                </div>



                            </div>

                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Address</label>
                                        <input type="text" name="gt_inst_address" id="gt_inst_address"
                                            value="<?php echo (set_value('gt_inst_address')) ? set_value('gt_inst_address') : $gt_inst_address; ?>"
                                            class="form-control" placeholder="Enter Institution Address">
                                        <span class="text-danger"><?php echo form_error('gt_inst_address'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution Country</label>

                                        <select name="gt_inst_country" id="gt_inst_country"
                                            class="form-control input-lg select2">
                                            <option selected="">Select Country</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option data-id="<?= $country->id ?>" value="<?= $country->name ?>">
                                                    <?= $country->name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('gt_inst_country'); ?></span>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution State</label>

                                        <!-- <input type="text" name="gt_inst_state" id="gt_inst_state" class="form-control" placeholder="Enter Institution State"> -->
                                        <select name="gt_inst_state" id="gt_inst_state" class="form-control input-lg select2">
                                            <option value="">Select State</option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('gt_inst_state'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution City</label>
                                        <select name="gt_inst_city" id="gt_inst_city" class="form-control input-lg select2">
                                            <option value="">Select City</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('gt_inst_city'); ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Medium of Instruction</label>

                                        <?php

                                        // $instruction_options= array(" " => "Select Medium of instruction") + $this->globals->gt_medium_of_instruction();
                                        echo form_dropdown('gt_medium_of_instruction', $instruction_options, (set_value('gt_medium_of_instruction')) ? set_value('gt_medium_of_instruction') : $gt_medium_of_instruction, 'class="form-control form-control" id="gt_medium_of_instruction"');
                                        ?>

                                        <span class="text-danger"><?php echo form_error('gt_medium_of_instruction'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Register Number</label>
                                        <input type="text" name="gt_register_number"
                                            value="<?php echo (set_value('gt_register_number')) ? set_value('gt_register_number') : $gt_register_number; ?>"
                                            id="gt_register_number" class="form-control" placeholder="Enter Register Number">
                                        <span class="text-danger"><?php echo form_error('gt_register_number'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Year of Passing</label>
                                        <input type="month" name="gt_year_of_passing"
                                            value="<?php echo (set_value('gt_year_of_passing')) ? set_value('gt_year_of_passing') : $gt_year_of_passing; ?>"
                                            id="gt_year_of_passing" class="form-control" placeholder="Enter School Year">
                                        <span class="text-danger"><?php echo form_error('gt_year_of_passing'); ?></span>
                                    </div>
                                </div>
                            </div>


                            <table class="table" border="1">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Obtained Marks</th>
                                        <th>Maximum Marks</th>
                                        <th>Percentage%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Subject 1 -->
                                    <tr>
                                        <th><input type="text" name="gt_subject_1_name" id="gt_subject_1_name"
                                                class="form-control font-weight-bold" placeholder="I Year" value="I Year"
                                                readonly></th>
                                        <td>
                                            <input type="number" name="gt_subject_1_obtained_marks"
                                                id="gt_subject_1_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('gt_subject_1_obtained_marks')) ? set_value('gt_subject_1_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('gt_subject_1_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="gt_subject_1_max_marks" id="gt_subject_1_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('gt_subject_1_max_marks')) ? set_value('gt_subject_1_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('gt_subject_1_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="gt_subject_1_min_marks"
                                                id="gt_subject_1_min_marks" placeholder="Enter Percentage" class="form-control"
                                                value="<?php echo (set_value('gt_subject_1_min_marks')) ? set_value('gt_subject_1_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('gt_subject_1_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 2 -->
                                    <tr>
                                        <th><input type="text" name="gt_subject_2_name" id="gt_subject_2_name"
                                                class="form-control font-weight-bold" placeholder="II Year" value="II Year"
                                                readonly></th>
                                        <td>
                                            <input type="number" name="gt_subject_2_obtained_marks"
                                                id="gt_subject_2_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('gt_subject_2_obtained_marks')) ? set_value('gt_subject_2_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('gt_subject_2_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="gt_subject_2_max_marks" id="gt_subject_2_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('gt_subject_2_max_marks')) ? set_value('gt_subject_2_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('gt_subject_2_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="gt_subject_2_min_marks"
                                                id="gt_subject_2_min_marks" placeholder="Enter Percentage" class="form-control"
                                                value="<?php echo (set_value('gt_subject_2_min_marks')) ? set_value('gt_subject_2_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('gt_subject_2_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 3 -->
                                    <tr>
                                        <th><input type="text" name="gt_subject_3_name" id="gt_subject_3_name"
                                                class="form-control font-weight-bold" placeholder="III Year" value="III Year"
                                                readonly></th>
                                        <td>
                                            <input type="number" name="gt_subject_3_obtained_marks"
                                                id="gt_subject_3_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('gt_subject_3_obtained_marks')) ? set_value('gt_subject_3_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('gt_subject_3_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="gt_subject_3_max_marks" id="gt_subject_3_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('gt_subject_3_max_marks')) ? set_value('gt_subject_3_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('gt_subject_3_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="gt_subject_3_min_marks"
                                                id="gt_subject_3_min_marks" class="form-control" placeholder="Enter Percentage"
                                                value="<?php echo (set_value('gt_subject_3_min_marks')) ? set_value('gt_subject_3_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('gt_subject_3_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 4 -->
                                    <tr>
                                        <th><input type="text" name="gt_subject_4_name" id="gt_subject_4_name"
                                                class="form-control font-weight-bold" placeholder="IV Year" value="IV Year"
                                                readonly></th>
                                        <td>
                                            <input type="number" name="gt_subject_4_obtained_marks"
                                                id="gt_subject_4_obtained_marks" class="form-control"
                                                placeholder="Enter Obtained Marks"
                                                value="<?php echo (set_value('gt_subject_4_obtained_marks')) ? set_value('gt_subject_4_obtained_marks') : ''; ?>">
                                            <span
                                                class="text-danger"><?php echo form_error('gt_subject_4_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="gt_subject_4_max_marks" id="gt_subject_4_max_marks"
                                                class="form-control" placeholder="Enter Max Marks"
                                                value="<?php echo (set_value('gt_subject_4_max_marks')) ? set_value('gt_subject_4_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('gt_subject_4_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="gt_subject_4_min_marks"
                                                id="gt_subject_4_min_marks" placeholder="Enter Percentage" class="form-control"
                                                value="<?php echo (set_value('gt_subject_4_min_marks')) ? set_value('gt_subject_4_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('gt_subject_4_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="gt_total_min_marks" id="gt_total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="gt_total_max_marks" id="gt_total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="gt_aggregate" id="gt_aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                            </table>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Obtained Marks</label>
                                        <input type="text" name="gt_total_obtained_marks"
                                            value="<?php echo (set_value('gt_total_obtained_marks')) ? set_value('gt_total_obtained_marks') : ''; ?>"
                                            id="gt_total_obtained_marks" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Maximum Marks</label>
                                        <input type="text" name="gt_total_max_marks"
                                            value="<?php echo (set_value('gt_total_max_marks')) ? set_value('gt_total_max_marks') : ''; ?>"
                                            id="gt_total_max_marks" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Aggregate Percentage</label>
                                        <input type="text" name="gt_aggregate"
                                            value="<?php echo (set_value('gt_aggregate')) ? set_value('gt_aggregate') : ''; ?>"
                                            id="gt_aggregate" class="form-control" readonly>

                                    </div>
                                </div>

                            </div>



                        </div>
                    <?php } ?>
                    <?php if ($personalDetails->admission_based == "BE") { ?>
                        <div class="card-body" id="card2">


                            <h3>BE</h3>

                            <div class="form-row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Level</label>
                                        <?php $level_options = array("BE" => "BE");
                                        echo form_dropdown('deg_education_level', $level_options, (set_value('deg_education_level')) ? set_value('deg_education_level') : 'deg_education_level', 'class="form-control " id="deg_education_level"');
                                        ?>
                                        <span class="text-danger"><?php echo form_error('deg_education_level'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Board / University</label>
                                        <input type="text" name="deg_inst_board" id="deg_inst_board" value="<?php echo (set_value('deg_inst_board')) ? set_value('deg_inst_board') : $deg_inst_board; ?>" class="form-control" placeholder="Enter Institution Board">
                                        <span class="text-danger"><?php echo form_error('deg_inst_board'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Name</label>
                                        <input type="text" name="deg_inst_name" id="deg_inst_name" value="<?php echo (set_value('deg_inst_name')) ? set_value('deg_inst_name') : $deg_inst_name; ?>" class="form-control" placeholder="Enter Institution Name">
                                        <span class="text-danger"><?php echo form_error('deg_inst_name'); ?></span>
                                    </div>
                                </div>



                            </div>

                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Address</label>
                                        <input type="text" name="deg_inst_address" id="deg_inst_address" value="<?php echo (set_value('deg_inst_address')) ? set_value('deg_inst_address') : $deg_inst_address; ?>" class="form-control" placeholder="Enter Institution Address">
                                        <span class="text-danger"><?php echo form_error('deg_inst_address'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution Country</label>

                                        <select name="deg_inst_country" id="deg_inst_country" class="form-control input-lg select2">
                                            <option selected="">Select Country</option>
                                            <?php foreach ($countries as $country) : ?>
                                                <option data-id="<?= $country->id ?>" value="<?= $country->name ?>"><?= $country->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('deg_inst_country'); ?></span>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution State</label>

                                        <!-- <input type="text" name="gt_inst_state" id="gt_inst_state" class="form-control" placeholder="Enter Institution State"> -->
                                        <select name="deg_inst_state" id="deg_inst_state" class="form-control input-lg select2">
                                            <option value="">Select State</option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('deg_inst_state'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution City</label>
                                        <select name="deg_inst_city" id="deg_inst_city" class="form-control input-lg select2">
                                            <option value="">Select City</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('deg_inst_city'); ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Medium of Instruction</label>

                                        <?php

                                        // $instruction_options= array(" " => "Select Medium of instruction") + $this->globals->gt_medium_of_instruction();
                                        echo form_dropdown('deg_medium_of_instruction', $instruction_options, (set_value('deg_medium_of_instruction')) ? set_value('deg_medium_of_instruction') : $deg_medium_of_instruction, 'class="form-control form-control" id="deg_medium_of_instruction"');
                                        ?>

                                        <span class="text-danger"><?php echo form_error('deg_medium_of_instruction'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Register Number</label>
                                        <input type="text" name="deg_register_number" value="<?php echo (set_value('deg_register_number')) ? set_value('deg_register_number') : $deg_register_number; ?>" id="deg_register_number" class="form-control" placeholder="Enter Register Number">
                                        <span class="text-danger"><?php echo form_error('deg_register_number'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Year of Passing</label>
                                        <input type="month" name="deg_year_of_passing" value="<?php echo (set_value('deg_year_of_passing')) ? set_value('deg_year_of_passing') : $deg_year_of_passing; ?>" id="deg_year_of_passing" class="form-control" placeholder="Enter School Year">
                                        <span class="text-danger"><?php echo form_error('deg_year_of_passing'); ?></span>
                                    </div>
                                </div>
                            </div>


                            <table class="table" border="1">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Obtained Marks</th>
                                        <th>Maximum Marks</th>
                                        <th>Percentage%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Subject 1 -->
                                    <tr>
                                        <th><input type="text" name="deg_subject_1_name" id="deg_subject_1_name" class="form-control font-weight-bold" placeholder="I year" value="I year" readonly></th>
                                        <td>
                                            <input type="number" name="deg_subject_1_obtained_marks" id="deg_subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('deg_subject_1_obtained_marks')) ? set_value('deg_subject_1_obtained_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_1_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="deg_subject_1_max_marks" id="deg_subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('deg_subject_1_max_marks')) ? set_value('deg_subject_1_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_1_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="deg_subject_1_min_marks" id="deg_subject_1_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('deg_subject_1_min_marks')) ? set_value('deg_subject_1_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_1_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 2 -->
                                    <tr>
                                        <th><input type="text" name="deg_subject_2_name" id="deg_subject_2_name" class="form-control font-weight-bold" placeholder="II year" value="II year" readonly></th>
                                        <td>
                                            <input type="number" name="deg_subject_2_obtained_marks" id="deg_subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('deg_subject_2_obtained_marks')) ? set_value('deg_subject_2_obtained_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_2_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="deg_subject_2_max_marks" id="deg_subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('deg_subject_2_max_marks')) ? set_value('deg_subject_2_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_2_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="deg_subject_2_min_marks" id="deg_subject_2_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('deg_subject_2_min_marks')) ? set_value('deg_subject_2_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_2_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 3 -->
                                    <tr>
                                        <th><input type="text" name="deg_subject_3_name" id="deg_subject_3_name" class="form-control font-weight-bold" placeholder="III year" value="III year" readonly></th>
                                        <td>
                                            <input type="number" name="deg_subject_3_obtained_marks" id="deg_subject_3_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('deg_subject_3_obtained_marks')) ? set_value('deg_subject_3_obtained_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_3_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="deg_subject_3_max_marks" id="deg_subject_3_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('deg_subject_3_max_marks')) ? set_value('deg_subject_3_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_3_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="deg_subject_3_min_marks" id="deg_subject_3_min_marks" class="form-control" placeholder="Enter Percentage" value="<?php echo (set_value('deg_subject_3_min_marks')) ? set_value('deg_subject_3_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_3_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 4 -->
                                    <tr>
                                        <th><input type="text" name="deg_subject_4_name" id="deg_subject_4_name" class="form-control font-weight-bold" placeholder="IV year" value="IV year" readonly></th>
                                        <td>
                                            <input type="number" name="deg_subject_4_obtained_marks" id="deg_subject_4_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('deg_subject_4_obtained_marks')) ? set_value('deg_subject_4_obtained_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_4_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="deg_subject_4_max_marks" id="deg_subject_4_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('deg_subject_4_max_marks')) ? set_value('deg_subject_4_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_4_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="deg_subject_4_min_marks" id="deg_subject_4_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('deg_subject_4_min_marks')) ? set_value('deg_subject_4_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('deg_subject_4_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="gt_total_min_marks" id="gt_total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="gt_total_max_marks" id="gt_total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="gt_aggregate" id="gt_aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                            </table>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Obtained Marks</label>
                                        <input type="text" name="deg_total_obtained_marks" value="<?php echo (set_value('deg_total_obtained_marks')) ? set_value('deg_total_obtained_marks') : ''; ?>" id="deg_total_obtained_marks" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Maximum Marks</label>
                                        <input type="text" name="deg_total_max_marks" value="<?php echo (set_value('deg_total_max_marks')) ? set_value('deg_total_max_marks') : ''; ?>" id="deg_total_max_marks" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Aggregate Percentage</label>
                                        <input type="text" name="deg_aggregate" value="<?php echo (set_value('deg_aggregate')) ? set_value('deg_aggregate') : ''; ?>" id="deg_aggregate" class="form-control" readonly>

                                    </div>
                                </div>

                            </div>



                        </div>
                    <?php } ?>

                    <?php if ($personalDetails->admission_based == "MTech") { ?>
                        <div class="card-body" id="card2">


                            <h3>MTech</h3>

                            <div class="form-row">

                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Level</label>
                                        <?php $level_options = array("MTech" => "MTech");
                                        echo form_dropdown('mtech_education_level', $level_options, (set_value('mtech_education_level')) ? set_value('mtech_education_level') : 'mtech_education_level', 'class="form-control " id="mtech_education_level"');
                                        ?>
                                        <span class="text-danger"><?php echo form_error('mtech_education_level'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Board / University</label>
                                        <input type="text" name="mtech_inst_board" id="mtech_inst_board" value="<?php echo (set_value('mtech_inst_board')) ? set_value('mtech_inst_board') : $mtech_inst_board; ?>" class="form-control" placeholder="Enter Institution Board">
                                        <span class="text-danger"><?php echo form_error('mtech_inst_board'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Name</label>
                                        <input type="text" name="mtech_inst_name" id="mtech_inst_name" value="<?php echo (set_value('mtech_inst_name')) ? set_value('mtech_inst_name') : $mtech_inst_name; ?>" class="form-control" placeholder="Enter Institution Name">
                                        <span class="text-danger"><?php echo form_error('mtech_inst_name'); ?></span>
                                    </div>
                                </div>



                            </div>

                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution Address</label>
                                        <input type="text" name="mtech_inst_address" id="mtech_inst_address" value="<?php echo (set_value('mtech_inst_address')) ? set_value('mtech_inst_address') : $mtech_inst_address; ?>" class="form-control" placeholder="Enter Institution Address">
                                        <span class="text-danger"><?php echo form_error('mtech_inst_address'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution Country</label>

                                        <select name="mtech_inst_country" id="mtech_inst_country" class="form-control input-lg select2">
                                            <option selected="">Select Country</option>
                                            <?php foreach ($countries as $country) : ?>
                                                <option data-id="<?= $country->id ?>" value="<?= $country->name ?>"><?= $country->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('mtech_inst_country'); ?></span>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Institution State</label>

                                        <!-- <input type="text" name="diploma_inst_state" id="diploma_inst_state" class="form-control" placeholder="Enter Institution State"> -->
                                        <select name="mtech_inst_state" id="mtech_inst_state" class="form-control input-lg select2">
                                            <option value="">Select State</option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('mtech_inst_state'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">

                                        <label class="label">Institution City</label>
                                        <select name="mtech_inst_city" id="mtech_inst_city" class="form-control input-lg select2">
                                            <option value="">Select City</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('mtech_inst_city'); ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Medium of Instruction</label>

                                        <?php

                                        // $instruction_options= array(" " => "Select Medium of instruction") + $this->globals->diploma_medium_of_instruction();
                                        echo form_dropdown('mtech_medium_of_instruction', $instruction_options, (set_value('mtech_medium_of_instruction')) ? set_value('mtech_medium_of_instruction') : $mtech_medium_of_instruction, 'class="form-control form-control" id="mtech_medium_of_instruction"');
                                        ?>

                                        <span class="text-danger"><?php echo form_error('mtech_medium_of_instruction'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Register Number</label>
                                        <input type="text" name="mtech_register_number" value="<?php echo (set_value('mtech_register_number')) ? set_value('mtech_register_number') : $mtech_register_number; ?>" id="mtech_register_number" class="form-control" placeholder="Enter Register Number">
                                        <span class="text-danger"><?php echo form_error('mtech_register_number'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Year of Passing</label>
                                        <input type="month" name="mtech_year_of_passing" value="<?php echo (set_value('mtech_year_of_passing')) ? set_value('mtech_year_of_passing') : $mtech_year_of_passing; ?>" id="mtech_year_of_passing" class="form-control" placeholder="Enter School Year">
                                        <span class="text-danger"><?php echo form_error('mtech_year_of_passing'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <table class="table" border="1">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Obtained Marks</th>
                                        <th>Maximum Marks</th>
                                        <th>Percentage%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Subject 1 -->
                                    <tr>
                                        <th><input type="text" name="mtech_subject_1_name" id="mtech_subject_1_name" class="form-control font-weight-bold" placeholder="I year" value="I year" readonly></th>
                                        <td>
                                            <input type="number" name="mtech_subject_1_obtained_marks" id="mtech_subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('mtech_subject_1_obtained_marks')) ? set_value('mtech_subject_1_obtained_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('mtech_subject_1_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="mtech_subject_1_max_marks" id="mtech_subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('mtech_subject_1_max_marks')) ? set_value('mtech_subject_1_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('mtech_subject_1_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="mtech_subject_1_min_marks" id="mtech_subject_1_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('mtech_subject_1_min_marks')) ? set_value('mtech_subject_1_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('mtech_subject_1_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 2 -->
                                    <tr>
                                        <th><input type="text" name="mtech_subject_2_name" id="mtech_subject_2_name" class="form-control font-weight-bold" placeholder="II year" value="II year" readonly></th>
                                        <td>
                                            <input type="number" name="mtech_subject_2_obtained_marks" id="mtech_subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('mtech_subject_2_obtained_marks')) ? set_value('mtech_subject_2_obtained_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('mtech_subject_2_obtained_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="number" name="mtech_subject_2_max_marks" id="mtech_subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('mtech_subject_2_max_marks')) ? set_value('mtech_subject_2_max_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('diploma_subject_2_max_marks'); ?></span>
                                        </td>
                                        <td>
                                            <input type="text" readonly name="mtech_subject_2_min_marks" id="mtech_subject_2_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('mtech_subject_2_min_marks')) ? set_value('mtech_subject_2_min_marks') : ''; ?>">
                                            <span class="text-danger"><?php echo form_error('mtech_subject_2_min_marks'); ?></span>
                                        </td>
                                    </tr>
                                    <!-- Subject 3 -->

                                </tbody>
                                <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="diploma_total_min_marks" id="diploma_total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="diploma_total_max_marks" id="diploma_total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="diploma_aggregate" id="diploma_aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                            </table>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Obtained Marks</label>
                                        <input type="text" name="mtech_total_obtained_marks" value="<?php echo (set_value('mtech_total_obtained_marks')) ? set_value('mtech_total_obtained_marks') : ''; ?>" id="mtech_total_obtained_marks" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Maximum Marks</label>
                                        <input type="text" name="mtech_total_max_marks" value="<?php echo (set_value('mtech_total_max_marks')) ? set_value('mtech_total_max_marks') : ''; ?>" id="mtech_total_max_marks" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="label">Aggregate Percentage</label>
                                        <input type="text" name="mtech_aggregate" value="<?php echo (set_value('mtech_aggregate')) ? set_value('mtech_aggregate') : ''; ?>" id="mtech_aggregate" class="form-control" readonly>

                                    </div>
                                </div>

                            </div>


                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo anchor('admin/admissionDetails/' . $encryptId, '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-square"'); ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-info btn-square" name="Update" id="Update"> UPDATE
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        // Function to calculate totals
        function calculateTotals() {
            let totalObtainedMarks = 0;
            let totalMaxMarks = 0;

            // Iterate through each subject row in the table
            for (let i = 1; i <= 6; i++) { // Assuming you have 6 subjects as per your example
                // Get obtained marks and max marks for each subject
                let obtainedMarks = parseFloat(document.getElementById(`subject_${i}_obtained_marks`).value) || 0;
                let maxMarks = parseFloat(document.getElementById(`subject_${i}_max_marks`).value) || 0;

                // Add to cumulative totals
                totalObtainedMarks += obtainedMarks;
                totalMaxMarks += maxMarks;
            }

            // Calculate aggregate percentage
            let aggregatePercentage = (totalObtainedMarks / totalMaxMarks) * 100;

            // Update total fields

            $('#total_max_marks').val(totalMaxMarks);
            $('#total_obtained_marks').val(totalObtainedMarks);

            // Calculate aggregate percentage

            $('#aggregate').val(aggregatePercentage.toFixed(2) + '%');

        }

        function calculateTotals1() {
            let totalObtainedMarks = 0;
            let totalMaxMarks = 0;

            // Iterate through each subject row in the table
            for (let i = 1; i <= 6; i++) { // Assuming you have 6 subjects as per your example
                // Get obtained marks and max marks for each subject
                let obtainedMarksInput = document.getElementById(`puc_subject_${i}_obtained_marks`);
                let maxMarksInput = document.getElementById(`puc_subject_${i}_max_marks`);

                // Check if inputs exist before accessing their values
                if (obtainedMarksInput && maxMarksInput) {
                    let obtainedMarks = parseFloat(obtainedMarksInput.value) || 0;
                    let maxMarks = parseFloat(maxMarksInput.value) || 0;

                    // Add to cumulative totals
                    totalObtainedMarks += obtainedMarks;
                    totalMaxMarks += maxMarks;
                }
            }

            // Calculate aggregate percentage
            let aggregatePercentage = (totalObtainedMarks / totalMaxMarks) * 100;

            // Update total fields

            $('#puc_total_max_marks').val(totalMaxMarks);
            $('#puc_total_obtained_marks').val(totalObtainedMarks);

            // Calculate aggregate percentage

            $('#puc_aggregate').val(aggregatePercentage.toFixed(2) + '%');

        }

        function calculateTotals2() {
            let totalObtainedMarks = 0;
            let totalMaxMarks = 0;

            // Iterate through each subject row in the table
            for (let i = 1; i <= 3; i++) { // Assuming you have 6 subjects as per your example
                // Get obtained marks and max marks for each subject
                let obtainedMarksInput = document.getElementById(`diploma_subject_${i}_obtained_marks`);
                let maxMarksInput = document.getElementById(`diploma_subject_${i}_max_marks`);
                let minMarksInput = document.getElementById(`diploma_subject_${i}_min_marks`);
                // Check if inputs exist before accessing their values
                if (obtainedMarksInput && maxMarksInput) {
                    let obtainedMarks = parseFloat(obtainedMarksInput.value) || 0;
                    let maxMarks = parseFloat(maxMarksInput.value) || 0;
                    let percent = (obtainedMarks / maxMarks) * 100;


                    // Update the percentage field for the subject
                    minMarksInput.value = percent.toFixed(2) + '%';
                    // Add to cumulative totals
                    totalObtainedMarks += obtainedMarks;
                    totalMaxMarks += maxMarks;
                }
            }

            // Calculate aggregate percentage
            let aggregatePercentage = (totalObtainedMarks / totalMaxMarks) * 100;

            // Update total fields

            $('#diploma_total_max_marks').val(totalMaxMarks);
            $('#diploma_total_obtained_marks').val(totalObtainedMarks);

            // Calculate aggregate percentage

            $('#diploma_aggregate').val(aggregatePercentage.toFixed(2) + '%');

        }

        function calculateTotals3() {
            let totalObtainedMarks = 0;
            let totalMaxMarks = 0;


            // Iterate through each subject row in the table
            // Iterate through each subject row in the table
            for (let i = 1; i <= 4; i++) { // Assuming you have 6 subjects as per your example
                // Get obtained marks and max marks for each subject
                let obtainedMarksInput = document.getElementById(`gt_subject_${i}_obtained_marks`);
                let maxMarksInput = document.getElementById(`gt_subject_${i}_max_marks`);
                let minMarksInput = document.getElementById(`gt_subject_${i}_min_marks`);
                // Check if inputs exist before accessing their values
                if (obtainedMarksInput && maxMarksInput) {
                    let obtainedMarks = parseFloat(obtainedMarksInput.value) || 0;
                    let maxMarks = parseFloat(maxMarksInput.value) || 0;
                    let percent = (obtainedMarks / maxMarks) * 100;


                    // Update the percentage field for the subject
                    minMarksInput.value = percent.toFixed(2) + '%';
                    // Add to cumulative totals
                    totalObtainedMarks += obtainedMarks;
                    totalMaxMarks += maxMarks;
                }
            }
            // Calculate aggregate percentage
            let aggregatePercentage = (totalObtainedMarks / totalMaxMarks) * 100;

            // Update total fields

            $('#gt_total_max_marks').val(totalMaxMarks);
            $('#gt_total_obtained_marks').val(totalObtainedMarks);

            // Calculate aggregate percentage

            $('#gt_aggregate').val(aggregatePercentage.toFixed(2) + '%');

        }


        // Calculate totals on input change
        $('input[type="number"]').on('input', calculateTotals);
        $('input[type="number"]').on('input', calculateTotals1);
        $('input[type="number"]').on('input', calculateTotals2);
        $('input[type="number"]').on('input', calculateTotals3);

        $('#inst_country').change(function() {
            var country_id = $(this).find(':selected').data('id');


            // AJAX call to get states
            $.ajax({
                url: '<?php echo base_url('student/get_states'); ?>',
                type: 'post',
                data: {
                    country_id: country_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $('#inst_state').empty();
                    $('#inst_state').show();
                    $('#inst_city').show(); // Hide city dropdown if visible
                    $('#inst_city').empty(); // Clear city dropdown

                    $('#inst_state').append("<option value=''>Select State</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#inst_state').append("<option data-id='" + id + "' value='" + name +
                            "'>" + name + "</option>");
                    }
                }
            });
        });

        // AJAX request when a state is selected
        $('#inst_state').change(function() {
            var state_id = $(this).find(':selected').data('id');

            // AJAX call to get cities
            $.ajax({
                url: '<?php echo base_url('student/get_cities'); ?>',
                type: 'post',
                data: {
                    state_id: state_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $('#inst_city').empty();
                    $('#inst_city').show();

                    $('#inst_city').append("<option value=''>Select City</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#inst_city').append("<option value='" + name + "'>" + name +
                            "</option>");
                    }
                }
            });
        });
        $('#puc_inst_country').change(function() {
            var country_id = $(this).find(':selected').data('id');


            // AJAX call to get states
            $.ajax({
                url: '<?php echo base_url('student/get_states'); ?>',
                type: 'post',
                data: {
                    country_id: country_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $('#puc_inst_state').empty();
                    $('#puc_inst_state').show();
                    $('#puc_inst_city').show(); // Hide city dropdown if visible
                    $('#puc_inst_city').empty(); // Clear city dropdown

                    $('#puc_inst_state').append("<option value=''>Select State</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#puc_inst_state').append("<option data-id='" + id + "' value='" +
                            name + "'>" + name + "</option>");
                    }
                }
            });
        });

        // AJAX request when a state is selected
        $('#puc_inst_state').change(function() {
            var state_id = $(this).find(':selected').data('id');

            // AJAX call to get cities
            $.ajax({
                url: '<?php echo base_url('student/get_cities'); ?>',
                type: 'post',
                data: {
                    state_id: state_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $('#puc_inst_city').empty();
                    $('#puc_inst_city').show();

                    $('#puc_inst_city').append("<option value=''>Select City</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#puc_inst_city').append("<option value='" + name + "'>" + name +
                            "</option>");
                    }
                }
            });
        });
        $('#diploma_inst_country').change(function() {
            var country_id = $(this).find(':selected').data('id');


            // AJAX call to get states
            $.ajax({
                url: '<?php echo base_url('student/get_states'); ?>',
                type: 'post',
                data: {
                    country_id: country_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $('#diploma_inst_state').empty();
                    $('#diploma_inst_state').show();
                    $('#diploma_inst_city').show(); // Hide city dropdown if visible
                    $('#diploma_inst_city').empty(); // Clear city dropdown

                    $('#diploma_inst_state').append("<option value=''>Select State</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#diploma_inst_state').append("<option data-id='" + id + "' value='" +
                            name + "'>" + name + "</option>");
                    }
                }
            });
        });

        // AJAX request when a state is selected
        $('#diploma_inst_state').change(function() {
            var state_id = $(this).find(':selected').data('id');

            // AJAX call to get cities
            $.ajax({
                url: '<?php echo base_url('student/get_cities'); ?>',
                type: 'post',
                data: {
                    state_id: state_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $('#diploma_inst_city').empty();
                    $('#diploma_inst_city').show();

                    $('#diploma_inst_city').append("<option value=''>Select City</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#diploma_inst_city').append("<option value='" + name + "'>" + name +
                            "</option>");
                    }
                }
            });
        });
        $('#gt_inst_country').change(function() {
            var country_id = $(this).find(':selected').data('id');


            // AJAX call to get states
            $.ajax({
                url: '<?php echo base_url('student/get_states'); ?>',
                type: 'post',
                data: {
                    country_id: country_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $('#gt_inst_state').empty();
                    $('#gt_inst_state').show();
                    $('#gt_inst_city').show(); // Hide city dropdown if visible
                    $('#gt_inst_city').empty(); // Clear city dropdown

                    $('#gt_inst_state').append("<option value=''>Select State</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#gt_inst_state').append("<option data-id='" + id + "' value='" +
                            name + "'>" + name + "</option>");
                    }
                }
            });
        });

        // AJAX request when a state is selected
        $('#gt_inst_state').change(function() {
            var state_id = $(this).find(':selected').data('id');

            // AJAX call to get cities
            $.ajax({
                url: '<?php echo base_url('student/get_cities'); ?>',
                type: 'post',
                data: {
                    state_id: state_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $('#gt_inst_city').empty();
                    $('#gt_inst_city').show();

                    $('#gt_inst_city').append("<option value=''>Select City</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#gt_inst_city').append("<option value='" + name + "'>" + name +
                            "</option>");
                    }
                }
            });
        });
        document.getElementById('cardSelector').addEventListener('change', function() {
            const selectedValue = this.value;

            // Hide all card bodies
            const cardBodies = document.querySelectorAll('.card-body');
            cardBodies.forEach(body => body.style.display = 'none');

            // Show the selected card body
            if (selectedValue) {
                const selectedCard = document.getElementById(selectedValue);
                const selectedCardBody = selectedCard.querySelector('.card-body');
                selectedCardBody.style.display = 'block';
            }
        });
    });
</script>