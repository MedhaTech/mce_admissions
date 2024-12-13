  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content-header">
          <div class="container-fluid">

              <!-- <h1 class="h3 mb-2 text-gray-800"> Grievance Tickets </h1> -->

              <div class="card card-info mb-4">
                  <div class="card-header">
                      <h3 class="m-0 card-title text-uppercase"><?= $page_title; ?></h6>
                  </div>
                  <div class="card-body">


                      <?php echo form_open_multipart($action, 'class="user"'); ?>

                      <?php if ($education_level == "SSLC" || $education_level == "PUC") { ?>

                          <div class="form-row">

                              <div class="col-md-4 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Level</label>
                                      <?php $level_options = array($education_level => $education_level,);
                                        echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : $education_level, 'class="form-control "  id="education_level"');
                                        ?>
                                      <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                                  </div>
                              </div>

                              <div class="col-md-4 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Board / University</label>
                                      <input type="text" name="inst_board" id="inst_board" class="form-control" placeholder="Enter Institution Board" value="<?php echo (set_value('inst_board')) ? set_value('inst_board') : $inst_board; ?>">
                                      <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Institution Name</label>
                                      <input type="text" name="inst_name" id="inst_name" class="form-control" placeholder="Enter Institution Name" value="<?php echo (set_value('inst_name')) ? set_value('inst_name') : $inst_name; ?>">
                                      <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                                  </div>
                              </div>


                          </div>

                          <div class="form-row">
                              <div class="col-md-3 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Institution Address</label>
                                      <input type="text" name="inst_address" id="inst_address" class="form-control" placeholder="Enter Institution Address" value="<?php echo (set_value('inst_address')) ? set_value('inst_address') : $inst_address; ?>">
                                      <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                                  </div>
                              </div>
                              <div class="col-md-3 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Institution Country</label>

                                      <select name="inst_country" id="inst_country" class="form-control input-lg select2">
                                          <option>Select Country</option>
                                          <?php foreach ($countries as $country) : ?>
                                              <?php
                                                $selected = ($country->name == $inst_country) ? 'selected' : '';
                                                ?>
                                              <option data-id="<?= $country->id ?>" value="<?= $country->name ?>" <?= $selected ?>><?= $country->name ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                      <span class="text-danger"><?php echo form_error('inst_country'); ?></span>
                                  </div>
                              </div>
                              <div class="col-md-3 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Institution State</label>
                                      <select name="inst_state" id="inst_state" class="form-control input-lg select2">
                                          <option>Select State</option>
                                          <?php foreach ($states as $state) : ?>
                                              <?php
                                                $selected = ($state->name == $inst_state) ? 'selected' : '';
                                                ?>
                                              <option data-id="<?= $state->id ?>" value="<?= $state->name ?>" <?= $selected ?>><?= $state->name ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                      <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                                  </div>
                              </div>
                              <div class="col-md-3 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Institution City</label>
                                      <select name="inst_city" id="inst_city" class="form-control input-lg select2">
                                          <option>Select City</option>
                                          <?php foreach ($cities as $city) : ?>
                                              <?php
                                                $selected = ($city->name == $inst_city) ? 'selected' : '';
                                                ?>
                                              <option data-id="<?= $city->id ?>" value="<?= $city->name ?>" <?= $selected ?>><?= $city->name ?></option>
                                          <?php endforeach; ?>
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
                                        echo form_dropdown('medium_of_instruction', $instruction_options, (set_value('medium_of_instruction')) ? set_value('medium_of_instruction') : $medium_of_instruction, 'class="form-control form-control" id="medium_of_instruction"');
                                        ?>
                                      <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                                  </div>
                              </div>
                              <div class="col-md-3 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Register Number</label>
                                      <input type="text" name="register_number" id="register_number" class="form-control" placeholder="Enter Register Number" value="<?php echo (set_value('register_number')) ? set_value('register_number') : $register_number; ?>">
                                      <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                                  </div>
                              </div>
                              <div class="col-md-3 col-sm-6">
                                  <div class="form-group">
                                      <label class="label">Year of Passing</label>
                                      <input type="month" name="year_of_passing" id="year_of_passing" class="form-control" placeholder="Enter School Year" value="<?php echo (set_value('year_of_passing')) ? set_value('year_of_passing') : $year_of_passing; ?>">
                                      <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
                                  </div>
                              </div>
                          </div>
                          <table class="table table-bordered">
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
                                          <input type="text" name="subject_1_name" id="subject_1_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_1_name')) ? set_value('subject_1_name') : $subject_1_name; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_1_name'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_1_max_marks" id="subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : $subject_1_max_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_1_min_marks" id="subject_1_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : $subject_1_min_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                      </td>

                                      <td>
                                          <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : $subject_1_obtained_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                      </td>
                                  </tr>
                                  <!-- Subject 2 -->
                                  <tr>
                                      <td>
                                          <input type="text" name="subject_2_name" id="subject_2_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_2_name')) ? set_value('subject_2_name') : $subject_2_name; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_2_name'); ?></span>
                                      </td>

                                      <td>
                                          <input type="number" name="subject_2_max_marks" id="subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : $subject_2_max_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_2_min_marks" id="subject_2_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : $subject_2_min_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : $subject_2_obtained_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                      </td>
                                  </tr>
                                  <!-- Subject 3 -->
                                  <tr>
                                      <td>
                                          <input type="text" name="subject_3_name" id="subject_3_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_3_name')) ? set_value('subject_3_name') : $subject_3_name; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_3_name'); ?></span>
                                      </td>

                                      <td>
                                          <input type="number" name="subject_3_max_marks" id="subject_3_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_3_max_marks')) ? set_value('subject_3_max_marks') : $subject_3_max_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_3_max_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_3_min_marks" id="subject_3_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_3_min_marks')) ? set_value('subject_3_min_marks') : $subject_3_min_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_3_min_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_3_obtained_marks" id="subject_3_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_3_obtained_marks')) ? set_value('subject_3_obtained_marks') : $subject_3_obtained_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_3_obtained_marks'); ?></span>
                                      </td>
                                  </tr>
                                  <!-- Subject 4 -->
                                  <tr>
                                      <td>
                                          <input type="text" name="subject_4_name" id="subject_4_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_4_name')) ? set_value('subject_4_name') : $subject_4_name; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_4_name'); ?></span>
                                      </td>

                                      <td>
                                          <input type="number" name="subject_4_max_marks" id="subject_4_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_4_max_marks')) ? set_value('subject_4_max_marks') : $subject_4_max_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_4_max_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_4_min_marks" id="subject_4_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_4_min_marks')) ? set_value('subject_4_min_marks') : $subject_4_min_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_4_min_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_4_obtained_marks" id="subject_4_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_4_obtained_marks')) ? set_value('subject_4_obtained_marks') : $subject_4_obtained_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_4_obtained_marks'); ?></span>
                                      </td>
                                  </tr>
                                  <!-- Subject 5 -->
                                  <tr>
                                      <td>
                                          <input type="text" name="subject_5_name" id="subject_5_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_5_name')) ? set_value('subject_5_name') : $subject_5_name; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_5_name'); ?></span>
                                      </td>

                                      <td>
                                          <input type="number" name="subject_5_max_marks" id="subject_5_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_5_max_marks')) ? set_value('subject_5_max_marks') : $subject_5_max_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_5_max_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_5_min_marks" id="subject_5_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_5_min_marks')) ? set_value('subject_5_min_marks') : $subject_5_min_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_5_min_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_5_obtained_marks" id="subject_5_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_5_obtained_marks')) ? set_value('subject_5_obtained_marks') : $subject_5_obtained_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_5_obtained_marks'); ?></span>
                                      </td>
                                  </tr>
                                  <!-- Subject 6 -->
                                  <tr>
                                      <td>
                                          <input type="text" name="subject_6_name" id="subject_6_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_6_name')) ? set_value('subject_6_name') : $subject_6_name; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_6_name'); ?></span>
                                      </td>

                                      <td>
                                          <input type="number" name="subject_6_max_marks" id="subject_6_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_6_max_marks')) ? set_value('subject_6_max_marks') : $subject_6_max_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_6_max_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_6_min_marks" id="subject_6_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_6_min_marks')) ? set_value('subject_6_min_marks') : $subject_6_min_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_6_min_marks'); ?></span>
                                      </td>
                                      <td>
                                          <input type="number" name="subject_6_obtained_marks" id="subject_6_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_6_obtained_marks')) ? set_value('subject_6_obtained_marks') : $subject_6_obtained_marks; ?>">
                                          <span class="text-danger"><?php echo form_error('subject_6_obtained_marks'); ?></span>
                                      </td>
                                  </tr>
                              </tbody>
                              <!-- <tfoot>
                                  <tr>
                                      <th>Total</th>
                                      <th<input type="text" name="total_max_marks" value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>" id="total_max_marks" class="form-control" readonly></th>
                                      <th> <input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                      
                                    <th><input type="text" name="total_obtained_marks" value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>" id="total_obtained_marks" class="form-control" readonly></th>  
                                  </tr>

                              </tfoot> -->
                          </table>
                          <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Obtained Marks</label>
                                          <input type="text" name="total_obtained_marks" value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>" id="total_obtained_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Maximum Marks</label>
                                          <input type="text" name="total_max_marks" value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>" id="total_max_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Aggregate Percentage</label>
                                          <input type="text" name="aggregate" value="<?php echo (set_value('aggregate')) ? set_value('aggregate') : ''; ?>" id="aggregate" class="form-control" readonly>

                                      </div>
                                  </div>

                              </div>
                      <?php } ?>

                      <?php if ($education_level == "Diploma" && $personalDetails->lateral_entry == "DIPLOMA") { ?>
                          <div class="card-body" id="card2">


                              <h3>Diploma Details</h3>

                              <div class="form-row">

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Level</label>
                                          <?php $level_options = array($education_level => $education_level,);
                                            echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : $education_level, 'class="form-control "  id="education_level"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                                      </div>
                                  </div>

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Board / University</label>
                                          <input type="text" name="inst_board" id="inst_board" class="form-control" placeholder="Enter Institution Board" value="<?php echo (set_value('inst_board')) ? set_value('inst_board') : $inst_board; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Name</label>
                                          <input type="text" name="inst_name" id="inst_name" class="form-control" placeholder="Enter Institution Name" value="<?php echo (set_value('inst_name')) ? set_value('inst_name') : $inst_name; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                                      </div>
                                  </div>


                              </div>

                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Address</label>
                                          <input type="text" name="inst_address" id="inst_address" class="form-control" placeholder="Enter Institution Address" value="<?php echo (set_value('inst_address')) ? set_value('inst_address') : $inst_address; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Country</label>

                                          <select name="inst_country" id="inst_country" class="form-control input-lg select2">
                                              <option>Select Country</option>
                                              <?php foreach ($countries as $country) : ?>
                                                  <?php
                                                    $selected = ($country->name == $inst_country) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $country->id ?>" value="<?= $country->name ?>" <?= $selected ?>><?= $country->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_country'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution State</label>
                                          <select name="inst_state" id="inst_state" class="form-control input-lg select2">
                                              <option>Select State</option>
                                              <?php foreach ($states as $state) : ?>
                                                  <?php
                                                    $selected = ($state->name == $inst_state) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $state->id ?>" value="<?= $state->name ?>" <?= $selected ?>><?= $state->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution City</label>
                                          <select name="inst_city" id="inst_city" class="form-control input-lg select2">
                                              <option>Select City</option>
                                              <?php foreach ($cities as $city) : ?>
                                                  <?php
                                                    $selected = ($city->name == $inst_city) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $city->id ?>" value="<?= $city->name ?>" <?= $selected ?>><?= $city->name ?></option>
                                              <?php endforeach; ?>
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
                                            echo form_dropdown('medium_of_instruction', $instruction_options, (set_value('medium_of_instruction')) ? set_value('medium_of_instruction') : $medium_of_instruction, 'class="form-control form-control" id="medium_of_instruction"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Register Number</label>
                                          <input type="text" name="register_number" id="register_number" class="form-control" placeholder="Enter Register Number" value="<?php echo (set_value('register_number')) ? set_value('register_number') : $register_number; ?>">
                                          <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Year of Passing</label>
                                          <input type="month" name="year_of_passing" id="year_of_passing" class="form-control" placeholder="Enter School Year" value="<?php echo (set_value('year_of_passing')) ? set_value('year_of_passing') : $year_of_passing; ?>">
                                          <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
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
                                          <th><input type="text" name="subject_1_name" id="subject_1_name" class="form-control font-weight-bold" placeholder="I year" value="I year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : $subject_1_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_1_max_marks" id="subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : $subject_1_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_1_min_marks" id="subject_1_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : $subject_1_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 2 -->
                                      <tr>
                                          <th><input type="text" name="subject_2_name" id="subject_2_name" class="form-control font-weight-bold" placeholder="II year" value="II year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : $subject_2_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_2_max_marks" id="subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : $subject_2_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_2_min_marks" id="subject_2_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : $subject_2_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 3 -->
                                      <tr>
                                          <th><input type="text" name="subject_3_name" id="subject_3_name" class="form-control font-weight-bold" placeholder="III year" value="III year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_3_obtained_marks" id="subject_3_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_3_obtained_marks')) ? set_value('subject_3_obtained_marks') : $subject_3_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_3_max_marks" id="subject_3_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_3_max_marks')) ? set_value('subject_3_max_marks') : $subject_3_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_3_min_marks" id="subject_3_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_3_min_marks')) ? set_value('subject_3_min_marks') : $subject_3_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_min_marks'); ?></span>
                                          </td>
                                      </tr>

                                  </tbody>
                                  <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="total_max_marks" id="total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="aggregate" id="aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                              </table>
                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Obtained Marks</label>
                                          <input type="text" name="total_obtained_marks" value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>" id="total_obtained_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Maximum Marks</label>
                                          <input type="text" name="total_max_marks" value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>" id="total_max_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Aggregate Percentage</label>
                                          <input type="text" name="aggregate" value="<?php echo (set_value('aggregate')) ? set_value('aggregate') : ''; ?>" id="aggregate" class="form-control" readonly>

                                      </div>
                                  </div>

                              </div>


                          </div>
                      <?php } ?>
                      <?php if ($education_level == "Diploma" && $personalDetails->lateral_entry == "GTTC") { ?>
                          <div class="card-body" id="card2">


                              <h3>GT & TC </h3>


                              <div class="form-row">

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Level</label>
                                          <?php $level_options = array($education_level => $education_level,);
                                            echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : $education_level, 'class="form-control "  id="education_level"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                                      </div>
                                  </div>

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Board / University</label>
                                          <input type="text" name="inst_board" id="inst_board" class="form-control" placeholder="Enter Institution Board" value="<?php echo (set_value('inst_board')) ? set_value('inst_board') : $inst_board; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Name</label>
                                          <input type="text" name="inst_name" id="inst_name" class="form-control" placeholder="Enter Institution Name" value="<?php echo (set_value('inst_name')) ? set_value('inst_name') : $inst_name; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                                      </div>
                                  </div>


                              </div>

                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Address</label>
                                          <input type="text" name="inst_address" id="inst_address" class="form-control" placeholder="Enter Institution Address" value="<?php echo (set_value('inst_address')) ? set_value('inst_address') : $inst_address; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Country</label>

                                          <select name="inst_country" id="inst_country" class="form-control input-lg select2">
                                              <option>Select Country</option>
                                              <?php foreach ($countries as $country) : ?>
                                                  <?php
                                                    $selected = ($country->name == $inst_country) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $country->id ?>" value="<?= $country->name ?>" <?= $selected ?>><?= $country->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_country'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution State</label>
                                          <select name="inst_state" id="inst_state" class="form-control input-lg select2">
                                              <option>Select State</option>
                                              <?php foreach ($states as $state) : ?>
                                                  <?php
                                                    $selected = ($state->name == $inst_state) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $state->id ?>" value="<?= $state->name ?>" <?= $selected ?>><?= $state->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution City</label>
                                          <select name="inst_city" id="inst_city" class="form-control input-lg select2">
                                              <option>Select City</option>
                                              <?php foreach ($cities as $city) : ?>
                                                  <?php
                                                    $selected = ($city->name == $inst_city) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $city->id ?>" value="<?= $city->name ?>" <?= $selected ?>><?= $city->name ?></option>
                                              <?php endforeach; ?>
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
                                            echo form_dropdown('medium_of_instruction', $instruction_options, (set_value('medium_of_instruction')) ? set_value('medium_of_instruction') : $medium_of_instruction, 'class="form-control form-control" id="medium_of_instruction"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Register Number</label>
                                          <input type="text" name="register_number" id="register_number" class="form-control" placeholder="Enter Register Number" value="<?php echo (set_value('register_number')) ? set_value('register_number') : $register_number; ?>">
                                          <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Year of Passing</label>
                                          <input type="month" name="year_of_passing" id="year_of_passing" class="form-control" placeholder="Enter School Year" value="<?php echo (set_value('year_of_passing')) ? set_value('year_of_passing') : $year_of_passing; ?>">
                                          <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
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
                                          <th><input type="text" name="subject_1_name" id="subject_1_name" class="form-control font-weight-bold" placeholder="I year" value="I year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : $subject_1_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_1_max_marks" id="subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : $subject_1_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_1_min_marks" id="subject_1_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : $subject_1_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 2 -->
                                      <tr>
                                          <th><input type="text" name="subject_2_name" id="subject_2_name" class="form-control font-weight-bold" placeholder="II year" value="II year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : $subject_2_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_2_max_marks" id="subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : $subject_2_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_2_min_marks" id="subject_2_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : $subject_2_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 3 -->
                                      <tr>
                                          <th><input type="text" name="subject_3_name" id="subject_3_name" class="form-control font-weight-bold" placeholder="III year" value="III year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_3_obtained_marks" id="subject_3_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_3_obtained_marks')) ? set_value('subject_3_obtained_marks') : $subject_3_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_3_max_marks" id="subject_3_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_3_max_marks')) ? set_value('subject_3_max_marks') : $subject_3_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_3_min_marks" id="subject_3_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_3_min_marks')) ? set_value('subject_3_min_marks') : $subject_3_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <tr>
                                          <th><input type="text" name="subject_4_name" id="subject_4_name" class="form-control font-weight-bold" placeholder="III year" value="III year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_4_obtained_marks" id="subject_4_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_4_obtained_marks')) ? set_value('subject_4_obtained_marks') : $subject_4_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_4_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_4_max_marks" id="subject_4_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_4_max_marks')) ? set_value('subject_4_max_marks') : $subject_4_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_4_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_4_min_marks" id="subject_4_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_4_min_marks')) ? set_value('subject_4_min_marks') : $subject_4_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_4_min_marks'); ?></span>
                                          </td>
                                      </tr>

                                  </tbody>
                                  <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="total_max_marks" id="total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="aggregate" id="aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                              </table>
                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Obtained Marks</label>
                                          <input type="text" name="total_obtained_marks" value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>" id="total_obtained_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Maximum Marks</label>
                                          <input type="text" name="total_max_marks" value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>" id="total_max_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Aggregate Percentage</label>
                                          <input type="text" name="aggregate" value="<?php echo (set_value('aggregate')) ? set_value('aggregate') : ''; ?>" id="aggregate" class="form-control" readonly>

                                      </div>
                                  </div>

                              </div>



                          </div>
                      <?php } ?>
                      <?php if ($education_level == "BE") { ?>
                          <div class="card-body" id="card2">


                              <h3>BE</h3>


                              <div class="form-row">

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Level</label>
                                          <?php $level_options = array($education_level => $education_level,);
                                            echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : $education_level, 'class="form-control "  id="education_level"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                                      </div>
                                  </div>

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Board / University</label>
                                          <input type="text" name="inst_board" id="inst_board" class="form-control" placeholder="Enter Institution Board" value="<?php echo (set_value('inst_board')) ? set_value('inst_board') : $inst_board; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Name</label>
                                          <input type="text" name="inst_name" id="inst_name" class="form-control" placeholder="Enter Institution Name" value="<?php echo (set_value('inst_name')) ? set_value('inst_name') : $inst_name; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                                      </div>
                                  </div>


                              </div>

                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Address</label>
                                          <input type="text" name="inst_address" id="inst_address" class="form-control" placeholder="Enter Institution Address" value="<?php echo (set_value('inst_address')) ? set_value('inst_address') : $inst_address; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Country</label>

                                          <select name="inst_country" id="inst_country" class="form-control input-lg select2">
                                              <option>Select Country</option>
                                              <?php foreach ($countries as $country) : ?>
                                                  <?php
                                                    $selected = ($country->name == $inst_country) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $country->id ?>" value="<?= $country->name ?>" <?= $selected ?>><?= $country->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_country'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution State</label>
                                          <select name="inst_state" id="inst_state" class="form-control input-lg select2">
                                              <option>Select State</option>
                                              <?php foreach ($states as $state) : ?>
                                                  <?php
                                                    $selected = ($state->name == $inst_state) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $state->id ?>" value="<?= $state->name ?>" <?= $selected ?>><?= $state->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution City</label>
                                          <select name="inst_city" id="inst_city" class="form-control input-lg select2">
                                              <option>Select City</option>
                                              <?php foreach ($cities as $city) : ?>
                                                  <?php
                                                    $selected = ($city->name == $inst_city) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $city->id ?>" value="<?= $city->name ?>" <?= $selected ?>><?= $city->name ?></option>
                                              <?php endforeach; ?>
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
                                            echo form_dropdown('medium_of_instruction', $instruction_options, (set_value('medium_of_instruction')) ? set_value('medium_of_instruction') : $medium_of_instruction, 'class="form-control form-control" id="medium_of_instruction"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Register Number</label>
                                          <input type="text" name="register_number" id="register_number" class="form-control" placeholder="Enter Register Number" value="<?php echo (set_value('register_number')) ? set_value('register_number') : $register_number; ?>">
                                          <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Year of Passing</label>
                                          <input type="month" name="year_of_passing" id="year_of_passing" class="form-control" placeholder="Enter School Year" value="<?php echo (set_value('year_of_passing')) ? set_value('year_of_passing') : $year_of_passing; ?>">
                                          <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
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
                                          <th><input type="text" name="subject_1_name" id="subject_1_name" class="form-control font-weight-bold" placeholder="I year" value="I year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : $subject_1_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_1_max_marks" id="subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : $subject_1_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_1_min_marks" id="subject_1_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : $subject_1_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 2 -->
                                      <tr>
                                          <th><input type="text" name="subject_2_name" id="subject_2_name" class="form-control font-weight-bold" placeholder="II year" value="II year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : $subject_2_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_2_max_marks" id="subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : $subject_2_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_2_min_marks" id="subject_2_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : $subject_2_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 3 -->
                                      <tr>
                                          <th><input type="text" name="subject_3_name" id="subject_3_name" class="form-control font-weight-bold" placeholder="III year" value="III year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_3_obtained_marks" id="subject_3_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_3_obtained_marks')) ? set_value('subject_3_obtained_marks') : $subject_3_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_3_max_marks" id="subject_3_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_3_max_marks')) ? set_value('subject_3_max_marks') : $subject_3_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_3_min_marks" id="subject_3_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_3_min_marks')) ? set_value('subject_3_min_marks') : $subject_3_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <tr>
                                          <th><input type="text" name="subject_4_name" id="subject_4_name" class="form-control font-weight-bold" placeholder="IV year" value="IV year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_4_obtained_marks" id="subject_4_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_4_obtained_marks')) ? set_value('subject_4_obtained_marks') : $subject_4_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_4_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_4_max_marks" id="subject_4_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_4_max_marks')) ? set_value('subject_4_max_marks') : $subject_4_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_4_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_4_min_marks" id="subject_4_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_4_min_marks')) ? set_value('subject_4_min_marks') : $subject_4_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_4_min_marks'); ?></span>
                                          </td>
                                      </tr>

                                  </tbody>
                                  <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="total_max_marks" id="total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="aggregate" id="aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                              </table>
                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Obtained Marks</label>
                                          <input type="text" name="total_obtained_marks" value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>" id="total_obtained_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Maximum Marks</label>
                                          <input type="text" name="total_max_marks" value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>" id="total_max_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Aggregate Percentage</label>
                                          <input type="text" name="aggregate" value="<?php echo (set_value('aggregate')) ? set_value('aggregate') : ''; ?>" id="aggregate" class="form-control" readonly>

                                      </div>
                                  </div>

                              </div>



                          </div>
                      <?php } ?>
                      <?php if ($education_level == "MTech") { ?>
                          <div class="card-body" id="card2">


                              <h3>MTech</h3>

                              <div class="form-row">

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Level</label>
                                          <?php $level_options = array($education_level => $education_level,);
                                            echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : $education_level, 'class="form-control "  id="education_level"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                                      </div>
                                  </div>

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Board / University</label>
                                          <input type="text" name="inst_board" id="inst_board" class="form-control" placeholder="Enter Institution Board" value="<?php echo (set_value('inst_board')) ? set_value('inst_board') : $inst_board; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Name</label>
                                          <input type="text" name="inst_name" id="inst_name" class="form-control" placeholder="Enter Institution Name" value="<?php echo (set_value('inst_name')) ? set_value('inst_name') : $inst_name; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                                      </div>
                                  </div>


                              </div>

                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Address</label>
                                          <input type="text" name="inst_address" id="inst_address" class="form-control" placeholder="Enter Institution Address" value="<?php echo (set_value('inst_address')) ? set_value('inst_address') : $inst_address; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Country</label>

                                          <select name="inst_country" id="inst_country" class="form-control input-lg select2">
                                              <option>Select Country</option>
                                              <?php foreach ($countries as $country) : ?>
                                                  <?php
                                                    $selected = ($country->name == $inst_country) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $country->id ?>" value="<?= $country->name ?>" <?= $selected ?>><?= $country->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_country'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution State</label>
                                          <select name="inst_state" id="inst_state" class="form-control input-lg select2">
                                              <option>Select State</option>
                                              <?php foreach ($states as $state) : ?>
                                                  <?php
                                                    $selected = ($state->name == $inst_state) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $state->id ?>" value="<?= $state->name ?>" <?= $selected ?>><?= $state->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution City</label>
                                          <select name="inst_city" id="inst_city" class="form-control input-lg select2">
                                              <option>Select City</option>
                                              <?php foreach ($cities as $city) : ?>
                                                  <?php
                                                    $selected = ($city->name == $inst_city) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $city->id ?>" value="<?= $city->name ?>" <?= $selected ?>><?= $city->name ?></option>
                                              <?php endforeach; ?>
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
                                            echo form_dropdown('medium_of_instruction', $instruction_options, (set_value('medium_of_instruction')) ? set_value('medium_of_instruction') : $medium_of_instruction, 'class="form-control form-control" id="medium_of_instruction"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Register Number</label>
                                          <input type="text" name="register_number" id="register_number" class="form-control" placeholder="Enter Register Number" value="<?php echo (set_value('register_number')) ? set_value('register_number') : $register_number; ?>">
                                          <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Year of Passing</label>
                                          <input type="month" name="year_of_passing" id="year_of_passing" class="form-control" placeholder="Enter School Year" value="<?php echo (set_value('year_of_passing')) ? set_value('year_of_passing') : $year_of_passing; ?>">
                                          <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
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
                                          <th><input type="text" name="subject_1_name" id="subject_1_name" class="form-control font-weight-bold" placeholder="I year" value="I year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : $subject_1_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_1_max_marks" id="subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : $subject_1_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_1_min_marks" id="subject_1_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : $subject_1_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 2 -->
                                      <tr>
                                          <th><input type="text" name="subject_2_name" id="subject_2_name" class="form-control font-weight-bold" placeholder="II year" value="II year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : $subject_2_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_2_max_marks" id="subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : $subject_2_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_2_min_marks" id="subject_2_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : $subject_2_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                          </td>
                                      </tr>

                                  </tbody>
                                  <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="total_max_marks" id="total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="aggregate" id="aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                              </table>
                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Obtained Marks</label>
                                          <input type="text" name="total_obtained_marks" value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>" id="total_obtained_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Maximum Marks</label>
                                          <input type="text" name="total_max_marks" value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>" id="total_max_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Aggregate Percentage</label>
                                          <input type="text" name="aggregate" value="<?php echo (set_value('aggregate')) ? set_value('aggregate') : ''; ?>" id="aggregate" class="form-control" readonly>

                                      </div>
                                  </div>

                              </div>


                          </div>
                      <?php } ?>
                      <?php if ($education_level == "M.Sc") { ?>
                          <div class="card-body" id="card2">


                              <h3>M.Sc</h3>

                              <div class="form-row">

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Level</label>
                                          <?php $level_options = array($education_level => $education_level,);
                                            echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : $education_level, 'class="form-control "  id="education_level"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                                      </div>
                                  </div>

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Board / University</label>
                                          <input type="text" name="inst_board" id="inst_board" class="form-control" placeholder="Enter Institution Board" value="<?php echo (set_value('inst_board')) ? set_value('inst_board') : $inst_board; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Name</label>
                                          <input type="text" name="inst_name" id="inst_name" class="form-control" placeholder="Enter Institution Name" value="<?php echo (set_value('inst_name')) ? set_value('inst_name') : $inst_name; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                                      </div>
                                  </div>


                              </div>

                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Address</label>
                                          <input type="text" name="inst_address" id="inst_address" class="form-control" placeholder="Enter Institution Address" value="<?php echo (set_value('inst_address')) ? set_value('inst_address') : $inst_address; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Country</label>

                                          <select name="inst_country" id="inst_country" class="form-control input-lg select2">
                                              <option>Select Country</option>
                                              <?php foreach ($countries as $country) : ?>
                                                  <?php
                                                    $selected = ($country->name == $inst_country) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $country->id ?>" value="<?= $country->name ?>" <?= $selected ?>><?= $country->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_country'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution State</label>
                                          <select name="inst_state" id="inst_state" class="form-control input-lg select2">
                                              <option>Select State</option>
                                              <?php foreach ($states as $state) : ?>
                                                  <?php
                                                    $selected = ($state->name == $inst_state) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $state->id ?>" value="<?= $state->name ?>" <?= $selected ?>><?= $state->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution City</label>
                                          <select name="inst_city" id="inst_city" class="form-control input-lg select2">
                                              <option>Select City</option>
                                              <?php foreach ($cities as $city) : ?>
                                                  <?php
                                                    $selected = ($city->name == $inst_city) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $city->id ?>" value="<?= $city->name ?>" <?= $selected ?>><?= $city->name ?></option>
                                              <?php endforeach; ?>
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
                                            echo form_dropdown('medium_of_instruction', $instruction_options, (set_value('medium_of_instruction')) ? set_value('medium_of_instruction') : $medium_of_instruction, 'class="form-control form-control" id="medium_of_instruction"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Register Number</label>
                                          <input type="text" name="register_number" id="register_number" class="form-control" placeholder="Enter Register Number" value="<?php echo (set_value('register_number')) ? set_value('register_number') : $register_number; ?>">
                                          <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Year of Passing</label>
                                          <input type="month" name="year_of_passing" id="year_of_passing" class="form-control" placeholder="Enter School Year" value="<?php echo (set_value('year_of_passing')) ? set_value('year_of_passing') : $year_of_passing; ?>">
                                          <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
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
                                          <th><input type="text" name="subject_1_name" id="subject_1_name" class="form-control font-weight-bold" placeholder="I year" value="I year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : $subject_1_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_1_max_marks" id="subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : $subject_1_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_1_min_marks" id="subject_1_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : $subject_1_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 2 -->
                                      <tr>
                                          <th><input type="text" name="subject_2_name" id="subject_2_name" class="form-control font-weight-bold" placeholder="II year" value="II year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : $subject_2_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_2_max_marks" id="subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : $subject_2_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_2_min_marks" id="subject_2_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : $subject_2_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                          </td>
                                      </tr>

                                  </tbody>
                                  <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="total_max_marks" id="total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="aggregate" id="aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                              </table>
                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Obtained Marks</label>
                                          <input type="text" name="total_obtained_marks" value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>" id="total_obtained_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Maximum Marks</label>
                                          <input type="text" name="total_max_marks" value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>" id="total_max_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Aggregate Percentage</label>
                                          <input type="text" name="aggregate" value="<?php echo (set_value('aggregate')) ? set_value('aggregate') : ''; ?>" id="aggregate" class="form-control" readonly>

                                      </div>
                                  </div>

                              </div>


                          </div>
                      <?php } ?>
                      <?php if ($education_level == "M.Sc Engg") { ?>
                          <div class="card-body" id="card2">


                              <h3>M.Sc Engg</h3>

                              <div class="form-row">

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Level</label>
                                          <?php $level_options = array($education_level => $education_level,);
                                            echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : $education_level, 'class="form-control "  id="education_level"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                                      </div>
                                  </div>

                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Board / University</label>
                                          <input type="text" name="inst_board" id="inst_board" class="form-control" placeholder="Enter Institution Board" value="<?php echo (set_value('inst_board')) ? set_value('inst_board') : $inst_board; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Name</label>
                                          <input type="text" name="inst_name" id="inst_name" class="form-control" placeholder="Enter Institution Name" value="<?php echo (set_value('inst_name')) ? set_value('inst_name') : $inst_name; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                                      </div>
                                  </div>


                              </div>

                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Address</label>
                                          <input type="text" name="inst_address" id="inst_address" class="form-control" placeholder="Enter Institution Address" value="<?php echo (set_value('inst_address')) ? set_value('inst_address') : $inst_address; ?>">
                                          <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution Country</label>

                                          <select name="inst_country" id="inst_country" class="form-control input-lg select2">
                                              <option>Select Country</option>
                                              <?php foreach ($countries as $country) : ?>
                                                  <?php
                                                    $selected = ($country->name == $inst_country) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $country->id ?>" value="<?= $country->name ?>" <?= $selected ?>><?= $country->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_country'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution State</label>
                                          <select name="inst_state" id="inst_state" class="form-control input-lg select2">
                                              <option>Select State</option>
                                              <?php foreach ($states as $state) : ?>
                                                  <?php
                                                    $selected = ($state->name == $inst_state) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $state->id ?>" value="<?= $state->name ?>" <?= $selected ?>><?= $state->name ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                          <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Institution City</label>
                                          <select name="inst_city" id="inst_city" class="form-control input-lg select2">
                                              <option>Select City</option>
                                              <?php foreach ($cities as $city) : ?>
                                                  <?php
                                                    $selected = ($city->name == $inst_city) ? 'selected' : '';
                                                    ?>
                                                  <option data-id="<?= $city->id ?>" value="<?= $city->name ?>" <?= $selected ?>><?= $city->name ?></option>
                                              <?php endforeach; ?>
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
                                            echo form_dropdown('medium_of_instruction', $instruction_options, (set_value('medium_of_instruction')) ? set_value('medium_of_instruction') : $medium_of_instruction, 'class="form-control form-control" id="medium_of_instruction"');
                                            ?>
                                          <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Register Number</label>
                                          <input type="text" name="register_number" id="register_number" class="form-control" placeholder="Enter Register Number" value="<?php echo (set_value('register_number')) ? set_value('register_number') : $register_number; ?>">
                                          <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Year of Passing</label>
                                          <input type="month" name="year_of_passing" id="year_of_passing" class="form-control" placeholder="Enter School Year" value="<?php echo (set_value('year_of_passing')) ? set_value('year_of_passing') : $year_of_passing; ?>">
                                          <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
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
                                          <th><input type="text" name="subject_1_name" id="subject_1_name" class="form-control font-weight-bold" placeholder="I year" value="I year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : $subject_1_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_1_max_marks" id="subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : $subject_1_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_1_min_marks" id="subject_1_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : $subject_1_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 2 -->
                                      <tr>
                                          <th><input type="text" name="subject_2_name" id="subject_2_name" class="form-control font-weight-bold" placeholder="II year" value="II year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : $subject_2_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_2_max_marks" id="subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : $subject_2_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_2_min_marks" id="subject_2_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : $subject_2_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                          </td>
                                      </tr>
                                      <!-- Subject 3 -->
                                      <tr>
                                          <th><input type="text" name="subject_3_name" id="subject_3_name" class="form-control font-weight-bold" placeholder="III year" value="III year" readonly></th>
                                          <td>
                                              <input type="number" name="subject_3_obtained_marks" id="subject_3_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_3_obtained_marks')) ? set_value('subject_3_obtained_marks') : $subject_3_obtained_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_obtained_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="number" name="subject_3_max_marks" id="subject_3_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_3_max_marks')) ? set_value('subject_3_max_marks') : $subject_3_max_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_max_marks'); ?></span>
                                          </td>
                                          <td>
                                              <input type="text" readonly name="subject_3_min_marks" id="subject_3_min_marks" placeholder="Enter Percentage" class="form-control" value="<?php echo (set_value('subject_3_min_marks')) ? set_value('subject_3_min_marks') : $subject_3_min_marks; ?>">
                                              <span class="text-danger"><?php echo form_error('subject_3_min_marks'); ?></span>
                                          </td>
                                      </tr>

                                  </tbody>
                                  <!-- <tfoot>
                                      <tr>
                                          <th>Total/Aggregate</th>
                                          <th><input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="total_max_marks" id="total_max_marks" class="form-control" value="" readonly></th>
                                          <th><input type="text" name="aggregate" id="aggregate" class="form-control" value="" readonly></th>
                                      </tr>

                                  </tfoot> -->
                              </table>
                              <div class="form-row">
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Obtained Marks</label>
                                          <input type="text" name="total_obtained_marks" value="<?php echo (set_value('total_obtained_marks')) ? set_value('total_obtained_marks') : ''; ?>" id="total_obtained_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Maximum Marks</label>
                                          <input type="text" name="total_max_marks" value="<?php echo (set_value('total_max_marks')) ? set_value('total_max_marks') : ''; ?>" id="total_max_marks" class="form-control" readonly>

                                      </div>
                                  </div>
                                  <div class="col-md-3 col-sm-6">
                                      <div class="form-group">
                                          <label class="label">Aggregate Percentage</label>
                                          <input type="text" name="aggregate" value="<?php echo (set_value('aggregate')) ? set_value('aggregate') : ''; ?>" id="aggregate" class="form-control" readonly>

                                      </div>
                                  </div>

                              </div>


                          </div>
                      <?php } ?>

                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-danger btn-sm" name="Insert" id="Insert"><i class="fas fa-edit"></i> Submit </button>
                      <?php echo anchor('student/educationdetails', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm float-right" '); ?>
                  </div>
                  </form>
              </div>

          </div>
      </section>
  </div>
  <script>
      $(document).ready(function() {
        <?php if ($education_level == "SSLC" || $education_level == "PUC") { ?>
            $('input[type="number"]').on('input', calculateTotals);
          calculateTotals();
          <?php }?>
          <?php if ($education_level == "Diploma" && $personalDetails->lateral_entry == "DIPLOMA") { ?>
            $('input[type="number"]').on('input', calculateTotals2);
           calculateTotals2();
          <?php }?>
          <?php if ($education_level == "Diploma" && $personalDetails->lateral_entry == "GTTC") { ?>
            $('input[type="number"]').on('input', calculateTotals3);
            calculateTotals3();
          <?php }?>
          <?php if ($education_level == "BE") { ?>
            $('input[type="number"]').on('input', calculateTotals3);
            calculateTotals4();
          <?php }?>
          <?php if ($education_level == "MTech") { ?>
            $('input[type="number"]').on('input', calculateTotals3);
            calculateTotals5();
          <?php }?>
          <?php if ($education_level == "M.Sc") { ?>
            $('input[type="number"]').on('input', calculateTotals3);
            calculateTotals6();
          <?php }?>
          <?php if ($education_level == "M.Sc Engg") { ?>
            $('input[type="number"]').on('input', calculateTotals3);
            calculateTotals7();
          <?php }?>
         
          
          

          // Function to calculate totals
          function calculateTotals() {
              var totalMinMarks = 0;
              var totalMaxMarks = 0;
              var totalObtainedMarks = 0;

              // Loop through each row
              $('tbody tr').each(function() {
                  var minMarks = parseFloat($(this).find('input[name$="_min_marks"]').val()) || 0;
                  var maxMarks = parseFloat($(this).find('input[name$="_max_marks"]').val()) || 0;
                  var obtainedMarks = parseFloat($(this).find('input[name$="_obtained_marks"]').val()) || 0;

                  totalMinMarks += minMarks;
                  totalMaxMarks += maxMarks;
                  totalObtainedMarks += obtainedMarks;
              });

              // Update total fields
              $('#total_min_marks').val(totalMinMarks);
              $('#total_max_marks').val(totalMaxMarks);
              $('#total_obtained_marks').val(totalObtainedMarks);

              // Calculate aggregate percentage
              var aggregate = (totalObtainedMarks / totalMaxMarks) * 100;
              $('#aggregate').val(aggregate.toFixed(2) + '%');

          }
          function calculateTotals2() {
              let totalObtainedMarks = 0;
              let totalMaxMarks = 0;

              // Iterate through each subject row in the table
              for (let i = 1; i <= 3; i++) { // Assuming you have 6 subjects as per your example
                  // Get obtained marks and max marks for each subject
                  let obtainedMarksInput = document.getElementById(`subject_${i}_obtained_marks`);
                  let maxMarksInput = document.getElementById(`subject_${i}_max_marks`);
                  let minMarksInput = document.getElementById(`subject_${i}_min_marks`);
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

              $('#total_max_marks').val(totalMaxMarks);
              $('#total_obtained_marks').val(totalObtainedMarks);

              // Calculate aggregate percentage

              $('#aggregate').val(aggregatePercentage.toFixed(2) + '%');

          }

          function calculateTotals3() {
              let totalObtainedMarks = 0;
              let totalMaxMarks = 0;


              // Iterate through each subject row in the table
              // Iterate through each subject row in the table
              for (let i = 1; i <= 4; i++) { // Assuming you have 6 subjects as per your example
                  // Get obtained marks and max marks for each subject
                  let obtainedMarksInput = document.getElementById(`subject_${i}_obtained_marks`);
                  let maxMarksInput = document.getElementById(`subject_${i}_max_marks`);
                  let minMarksInput = document.getElementById(`subject_${i}_min_marks`);
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

              $('#total_max_marks').val(totalMaxMarks);
              $('#total_obtained_marks').val(totalObtainedMarks);

              // Calculate aggregate percentage

              $('#aggregate').val(aggregatePercentage.toFixed(2) + '%');

          }

          function calculateTotals4() {
              let totalObtainedMarks = 0;
              let totalMaxMarks = 0;


              // Iterate through each subject row in the table
              // Iterate through each subject row in the table
              for (let i = 1; i <= 4; i++) { // Assuming you have 6 subjects as per your example
                  // Get obtained marks and max marks for each subject
                  let obtainedMarksInput = document.getElementById(`subject_${i}_obtained_marks`);
                  let maxMarksInput = document.getElementById(`subject_${i}_max_marks`);
                  let minMarksInput = document.getElementById(`subject_${i}_min_marks`);
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

              $('#total_max_marks').val(totalMaxMarks);
              $('#total_obtained_marks').val(totalObtainedMarks);

              // Calculate aggregate percentage

              $('#aggregate').val(aggregatePercentage.toFixed(2) + '%');

          }

          function calculateTotals5() {
              let totalObtainedMarks = 0;
              let totalMaxMarks = 0;

              // Iterate through each subject row in the table
              for (let i = 1; i <= 3; i++) { // Assuming you have 6 subjects as per your example
                  // Get obtained marks and max marks for each subject
                  let obtainedMarksInput = document.getElementById(`subject_${i}_obtained_marks`);
                  let maxMarksInput = document.getElementById(`subject_${i}_max_marks`);
                  let minMarksInput = document.getElementById(`subject_${i}_min_marks`);
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

              $('#total_max_marks').val(totalMaxMarks);
              $('#total_obtained_marks').val(totalObtainedMarks);

              // Calculate aggregate percentage

              $('#aggregate').val(aggregatePercentage.toFixed(2) + '%');

          }

          function calculateTotals6() {
              let totalObtainedMarks = 0;
              let totalMaxMarks = 0;

              // Iterate through each subject row in the table
              for (let i = 1; i <= 3; i++) { // Assuming you have 6 subjects as per your example
                  // Get obtained marks and max marks for each subject
                  let obtainedMarksInput = document.getElementById(`subject_${i}_obtained_marks`);
                  let maxMarksInput = document.getElementById(`subject_${i}_max_marks`);
                  let minMarksInput = document.getElementById(`subject_${i}_min_marks`);
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

              $('#total_max_marks').val(totalMaxMarks);
              $('#total_obtained_marks').val(totalObtainedMarks);

              // Calculate aggregate percentage

              $('#aggregate').val(aggregatePercentage.toFixed(2) + '%');

          }

          function calculateTotals7() {
              let totalObtainedMarks = 0;
              let totalMaxMarks = 0;

              // Iterate through each subject row in the table
              for (let i = 1; i <= 3; i++) { // Assuming you have 6 subjects as per your example
                  // Get obtained marks and max marks for each subject
                  let obtainedMarksInput = document.getElementById(`subject_${i}_obtained_marks`);
                  let maxMarksInput = document.getElementById(`subject_${i}_max_marks`);
                  let minMarksInput = document.getElementById(`subject_${i}_min_marks`);
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

              $('#total_max_marks').val(totalMaxMarks);
              $('#total_obtained_marks').val(totalObtainedMarks);

              // Calculate aggregate percentage

              $('#aggregate').val(aggregatePercentage.toFixed(2) + '%');

          }


          // Calculate totals on input change
        //   $('input[type="number"]').on('input', calculateTotals);
        //   $('input[type="number"]').on('input', calculateTotals2);
        //   $('input[type="number"]').on('input', calculateTotals3);

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
                          $('#inst_state').append("<option data-id='" + id + "' value='" + name + "'>" + name + "</option>");
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
                          $('#inst_city').append("<option value='" + name + "'>" + name + "</option>");
                      }
                  }
              });
          });
      });
  </script>