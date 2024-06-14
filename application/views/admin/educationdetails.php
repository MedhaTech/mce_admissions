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
                                  <?php echo anchor('admin/admissions', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-sm"'); ?>
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
                                $print_fields = array('S.NO', 'Level', 'Board ', 'Institution Name', 'Institution City', 'Medium of Instruction', 'Register Number', 'Year of Passing', 'Actions');
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
                                        anchor('admin/updateeducationdetails/' . $edu->id, '<span class="icon"><i class="fas fa-edit"></i></span> <span class="text">Edit</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"')

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
              <div class="card card-info shadow mb-2">
                  <div class="card-header">
                      <h3 class="m-0 card-title text-uppercase">New Education Details</h6>
                  </div>
                  <div class="card-body">
                      <?php echo form_open_multipart($action, 'class="user"'); ?>

                      <div class="form-row">

                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Level</label>
                                  <?php $level_options = array(" " => "Select Level", "SSLC" => "SSLC", "PUC" => "PUC", "Diploma" => "Diploma", "Degree" => "Degree");
                                    echo form_dropdown('education_level', $level_options, (set_value('education_level')) ? set_value('education_level') : 'education_level', 'class="form-control " id="education_level"');
                                    ?>
                                  <span class="text-danger"><?php echo form_error('education_level'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Institution Type</label>
                                  <input type="text" name="inst_type" id="inst_type" class="form-control" placeholder="Enter Institution Type">
                                  <span class="text-danger"><?php echo form_error('inst_type'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Board / University</label>
                                  <input type="text" name="inst_board" id="inst_board" class="form-control" placeholder="Enter Institution Board">
                                  <span class="text-danger"><?php echo form_error('inst_board'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Institution Name</label>
                                  <input type="text" name="inst_name" id="inst_name" class="form-control" placeholder="Enter Institution Name">
                                  <span class="text-danger"><?php echo form_error('inst_name'); ?></span>
                              </div>
                          </div>


                      </div>

                      <div class="form-row">
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Institution Address</label>
                                  <input type="text" name="inst_address" id="inst_address" class="form-control" placeholder="Enter Institution Address">
                                  <span class="text-danger"><?php echo form_error('inst_address'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Institution City</label>
                                  <input type="text" name="inst_city" id="inst_city" class="form-control" placeholder="Enter Institution City">
                                  <span class="text-danger"><?php echo form_error('inst_city'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Institution State</label>
                                  <input type="text" name="inst_state" id="inst_state" class="form-control" placeholder="Enter Institution State">
                                  <span class="text-danger"><?php echo form_error('inst_state'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Institution Country</label>
                                  <input type="text" name="inst_country" id="inst_country" class="form-control" placeholder="Enter Institution Country">
                                  <span class="text-danger"><?php echo form_error('inst_country'); ?></span>
                              </div>
                          </div>



                      </div>
                      <div class="form-row">
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Medium of Instruction</label>
                                  <input type="text" name="medium_of_instruction" id="medium_of_instruction" class="form-control" placeholder="Enter Medium of Instruction">
                                  <span class="text-danger"><?php echo form_error('medium_of_instruction'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Register Number</label>
                                  <input type="number" name="register_number" id="register_number" class="form-control" placeholder="Enter Register Number">
                                  <span class="text-danger"><?php echo form_error('register_number'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Year of Passing</label>
                                  <input type="month" name="year_of_passing" id="year_of_passing" class="form-control" placeholder="Enter School Year">
                                  <span class="text-danger"><?php echo form_error('year_of_passing'); ?></span>
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
                              <!-- Subject 1 -->
                              <tr>
                                  <td>
                                      <input type="text" name="subject_1_name" id="subject_1_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_1_name')) ? set_value('subject_1_name') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_1_name'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_1_min_marks" id="subject_1_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_1_min_marks')) ? set_value('subject_1_min_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_1_min_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_1_max_marks" id="subject_1_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_1_max_marks')) ? set_value('subject_1_max_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_1_max_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_1_obtained_marks" id="subject_1_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_1_obtained_marks')) ? set_value('subject_1_obtained_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_1_obtained_marks'); ?></span>
                                  </td>
                              </tr>
                              <!-- Subject 2 -->
                              <tr>
                                  <td>
                                      <input type="text" name="subject_2_name" id="subject_2_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_2_name')) ? set_value('subject_2_name') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_2_name'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_2_min_marks" id="subject_2_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_2_min_marks')) ? set_value('subject_2_min_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_2_min_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_2_max_marks" id="subject_2_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_2_max_marks')) ? set_value('subject_2_max_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_2_max_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_2_obtained_marks" id="subject_2_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_2_obtained_marks')) ? set_value('subject_2_obtained_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_2_obtained_marks'); ?></span>
                                  </td>
                              </tr>
                              <!-- Subject 3 -->
                              <tr>
                                  <td>
                                      <input type="text" name="subject_3_name" id="subject_3_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_3_name')) ? set_value('subject_3_name') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_3_name'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_3_min_marks" id="subject_3_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_3_min_marks')) ? set_value('subject_3_min_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_3_min_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_3_max_marks" id="subject_3_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_3_max_marks')) ? set_value('subject_3_max_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_3_max_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_3_obtained_marks" id="subject_3_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_3_obtained_marks')) ? set_value('subject_3_obtained_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_3_obtained_marks'); ?></span>
                                  </td>
                              </tr>
                              <!-- Subject 4 -->
                              <tr>
                                  <td>
                                      <input type="text" name="subject_4_name" id="subject_4_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_4_name')) ? set_value('subject_4_name') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_4_name'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_4_min_marks" id="subject_4_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_4_min_marks')) ? set_value('subject_4_min_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_4_min_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_4_max_marks" id="subject_4_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_4_max_marks')) ? set_value('subject_4_max_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_4_max_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_4_obtained_marks" id="subject_4_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_4_obtained_marks')) ? set_value('subject_4_obtained_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_4_obtained_marks'); ?></span>
                                  </td>
                              </tr>
                              <!-- Subject 5 -->
                              <tr>
                                  <td>
                                      <input type="text" name="subject_5_name" id="subject_5_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_5_name')) ? set_value('subject_5_name') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_5_name'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_5_min_marks" id="subject_5_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_5_min_marks')) ? set_value('subject_5_min_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_5_min_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_5_max_marks" id="subject_5_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_5_max_marks')) ? set_value('subject_5_max_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_5_max_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_5_obtained_marks" id="subject_5_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_5_obtained_marks')) ? set_value('subject_5_obtained_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_5_obtained_marks'); ?></span>
                                  </td>
                              </tr>
                              <!-- Subject 6 -->
                              <tr>
                                  <td>
                                      <input type="text" name="subject_6_name" id="subject_6_name" class="form-control" placeholder="Enter Subject Name" value="<?php echo (set_value('subject_6_name')) ? set_value('subject_6_name') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_6_name'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_6_min_marks" id="subject_6_min_marks" class="form-control" placeholder="Enter Min Marks" value="<?php echo (set_value('subject_6_min_marks')) ? set_value('subject_6_min_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_6_min_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_6_max_marks" id="subject_6_max_marks" class="form-control" placeholder="Enter Max Marks" value="<?php echo (set_value('subject_6_max_marks')) ? set_value('subject_6_max_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_6_max_marks'); ?></span>
                                  </td>
                                  <td>
                                      <input type="number" name="subject_6_obtained_marks" id="subject_6_obtained_marks" class="form-control" placeholder="Enter Obtained Marks" value="<?php echo (set_value('subject_6_obtained_marks')) ? set_value('subject_6_obtained_marks') : ''; ?>">
                                      <span class="text-danger"><?php echo form_error('subject_6_obtained_marks'); ?></span>
                                  </td>
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>Total</th>
                                  <th> <input type="text" name="total_min_marks" id="total_min_marks" class="form-control" value="" readonly></th>
                                  <th><input type="text" name="total_max_marks" id="total_max_marks" class="form-control" value="" readonly></th>
                                  <th><input type="text" name="total_obtained_marks" id="total_obtained_marks" class="form-control" value="" readonly></th>
                              </tr>

                          </tfoot>
                      </table>
                      <div class="form-row">
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Aggregate Percentage</label>
                                  <input type="text" name="aggregate" id="aggregate" class="form-control" readonly>

                              </div>
                          </div>

                      </div>


                  </div>
                  <!-- <div class="card-footer">
                      <button type="submit" class="btn btn-danger btn-sm" name="Insert" id="Insert"><i class="fas fa-edit"></i> Submit </button>
                      <?php echo anchor('student/dashboard/', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm float-right" '); ?>
                  </div> -->
                  <div class="card-footer">
                      <div class="row">
                          <div class="col-md-6">
                            
                          </div>
                          <div class="col-md-6 text-right">
                              <button type="submit" class="btn btn-info btn-square" name="Update" id="Update"> SAVE 
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

          // Calculate totals on input change
          $('input[type="number"]').on('input', calculateTotals);

      });
  </script>