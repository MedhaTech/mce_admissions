  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content-header">
          <div class="container-fluid">

              <!-- <h1 class="h3 mb-2 text-gray-800"> Grievance Tickets </h1> -->

              <div class="card card-gray mb-4">
                  <div class="card-header">
                      <h3 class="m-0 card-title text-uppercase"><?= $page_title; ?></h6>
                  </div>
                  <div class="card-body">

                      <?php echo form_open_multipart($action, 'class="user"'); ?>

                      <div class="form-row">

                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">School Level</label>
                                  <input type="text" name="school_level" id="school_level" class="form-control"
                                      placeholder="Enter School Level">
                                  <span class="text-danger"><?php echo form_error('school_level'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">School Type</label>
                                  <input type="text" name="school_type" id="school_type" class="form-control"
                                      placeholder="Enter School Type">
                                  <span class="text-danger"><?php echo form_error('school_type'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">School Board</label>
                                  <input type="text" name="school_board" id="school_board" class="form-control"
                                      placeholder="Enter School Board">
                                  <span class="text-danger"><?php echo form_error('school_board'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">School Name</label>
                                  <input type="text" name="school_name" id="school_name" class="form-control"
                                      placeholder="Enter School Name">
                                  <span class="text-danger"><?php echo form_error('school_name'); ?></span>
                              </div>
                          </div>

                      </div>

                      <div class="form-row">

                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">School City</label>
                                  <input type="text" name="school_city" id="school_city" class="form-control"
                                      placeholder="Enter School City">
                                  <span class="text-danger"><?php echo form_error('school_city'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">School Year</label>
                                  <input type="number" name="school_year" id="school_year" class="form-control"
                                      placeholder="Enter School Year">
                                  <span class="text-danger"><?php echo form_error('school_year'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">School State</label>
                                  <input type="text" name="school_state" id="school_state" class="form-control"
                                      placeholder="Enter School State">
                                  <span class="text-danger"><?php echo form_error('school_state'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">School Country</label>
                                  <input type="text" name="school_country" id="school_country" class="form-control"
                                      placeholder="Enter School Country">
                                  <span class="text-danger"><?php echo form_error('school_country'); ?></span>
                              </div>
                          </div>

                      </div>

                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Medium of Instruction</label>
                                  <input type="text" name="school_medium" id="school_medium" class="form-control"
                                      placeholder="Enter Medium of Instruction">
                                  <span class="text-danger"><?php echo form_error('school_medium'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Percentage</label>
                                  <input type="text" name="school_percentage" id="school_percentage"
                                      class="form-control" placeholder="Enter School Percentage">
                                  <span class="text-danger"><?php echo form_error('school_percentage'); ?></span>
                              </div>
                          </div>

                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Marks Card No</label>
                                  <input type="text" name="school_marks" id="school_marks" class="form-control"
                                      placeholder="Enter School Percentage">
                                  <span class="text-danger"><?php echo form_error('school_marks'); ?></span>
                              </div>
                          </div>

                      </div>
                      <h2 class="card-title">
                          PU College Details
                      </h2><br><br>
                      <div class="form-row">
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU college Level</label>
                                  <input type="text" name="pu_level" id="pu_level" class="form-control"
                                      placeholder="Enter PU college Level">
                                  <span class="text-danger"><?php echo form_error('pu_level'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU college Type</label>
                                  <input type="text" name="pu_type" id="pu_type" class="form-control"
                                      placeholder="Enter PU college Type">
                                  <span class="text-danger"><?php echo form_error('pu_type'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU college Board</label>
                                  <input type="text" name="pu_board" id="pu_board" class="form-control"
                                      placeholder="Enter PU college Board">
                                  <span class="text-danger"><?php echo form_error('pu_board'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU college Name</label>
                                  <input type="text" name="pu_name" id="pu_name" class="form-control"
                                      placeholder="Enter PU college Name">
                                  <span class="text-danger"><?php echo form_error('pu_name'); ?></span>
                              </div>
                          </div>

                      </div>
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU college City</label>
                                  <input type="text" name="pu_clg_city" id="pu_clg_city" class="form-control"
                                      placeholder="Enter PU college City">
                                  <span class="text-danger"><?php echo form_error('pu_clg_city'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU college Year</label>
                                  <input type="text" name="pu_year" id="pu_year" class="form-control"
                                      placeholder="Enter PU college Year">
                                  <span class="text-danger"><?php echo form_error('pu_year'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU college State</label>
                                  <input type="text" name="pu_state" id="pu_state" class="form-control"
                                      placeholder="Enter PU college State">
                                  <span class="text-danger"><?php echo form_error('pu_state'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU college Country</label>
                                  <input type="text" name="pu_country" id="pu_country" class="form-control"
                                      placeholder="Enter PU college Country">
                                  <span class="text-danger"><?php echo form_error('pu_country'); ?></span>
                              </div>
                          </div>

                      </div>
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU Medium of Instruction</label>
                                  <input type="text" name="pu_medium" id="pu_medium" class="form-control"
                                      placeholder="Enter PU Medium of Instruction">
                                  <span class="text-danger"><?php echo form_error('pu_medium'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU Percentage</label>
                                  <input type="text" name="pu_percentage" id="pu_percentage" class="form-control"
                                      placeholder="Enter PU Percentage">
                                  <span class="text-danger"><?php echo form_error('pu_percentage'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU Marks Card No</label>
                                  <input type="text" name="pu_marks" id="pu_marks" class="form-control"
                                      placeholder="Enter PU Marks">
                                  <span class="text-danger"><?php echo form_error('pu_marks'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU PCM Percentage</label>
                                  <input type="text" name="pu_pcm_percentage" id="pu_pcm_percentage"
                                      class="form-control" placeholder="Enter PU PCM Percentage">
                                  <span class="text-danger"><?php echo form_error('pu_pcm_percentage'); ?></span>
                              </div>
                          </div>

                      </div>
                      <!-- <div class="form-row">

              <div class="col-md-3 col-sm-6">
                <div class="form-group">
                  <label for="dsc-2">Aadhaar Number </label>
                  <input type="text" name="aadhaar" id="aadhaar" class="form-control" value="<?php echo (set_value('aadhaar')) ? set_value('aadhaar') : $aadhaar; ?>">
                  <span class="text-danger"><?php echo form_error('aadhaar'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="form-group">
                  <label for="dsc-2">Gender </label>
                  <?php $gender_options = array(" " => "Select Gender", "Male" => "Male", "Female" => "Female", "Not Prefer to Say" => "Not Prefer to Say");
                  echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control" id="gender"');
                  ?>
                  <span class="text-danger"><?php echo form_error('gender'); ?></span>
                </div>
              </div>
            </div> -->
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU Degree Name</label>
                                  <input type="text" name="pu_dgr_name" id="pu_dgr_name" class="form-control"
                                      placeholder="Enter PU Degree Name">
                                  <span class="text-danger"><?php echo form_error('pu_dgr_name'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU Marks</label>
                                  <input type="text" name="pu_mark" id="pu_mark" class="form-control"
                                      placeholder="Enter PU Marks">
                                  <span class="text-danger"><?php echo form_error('pu_mark'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">PU PCM Total</label>
                                  <input type="text" name="pu_pcm_total" id="pu_pcm_total" class="form-control"
                                      placeholder="Enter PCM Total">
                                  <span class="text-danger"><?php echo form_error('pu_pcm_total'); ?></span>
                              </div>
                          </div>

                      </div>
                      <h2 class="card-title">
                          Diploma College Details
                      </h2><br><br>
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma college Level</label>
                                  <input type="text" name="diploma_level" id="diploma_level" class="form-control"
                                      placeholder="Enter Diploma college Level">
                                  <span class="text-danger"><?php echo form_error('diploma_level'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma college Type</label>
                                  <input type="text" name="diploma_type" id="diploma_type" class="form-control"
                                      placeholder="Enter Diploma college Type">
                                  <span class="text-danger"><?php echo form_error('diploma_type'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma college Board</label>
                                  <input type="text" name="diploma_board" id="diploma_board" class="form-control"
                                      placeholder="Enter Diploma college Board">
                                  <span class="text-danger"><?php echo form_error('diploma_board'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma college Name</label>
                                  <input type="text" name="diploma_clg_name" id="diploma_clg_name" class="form-control"
                                      placeholder="Enter Diploma college Name">
                                  <span class="text-danger"><?php echo form_error('diploma_clg_name'); ?></span>
                              </div>
                          </div>

                      </div>
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma college City</label>
                                  <input type="text" name="diploma_city" id="diploma_city" class="form-control"
                                      placeholder="Enter Diploma college City">
                                  <span class="text-danger"><?php echo form_error('diploma_city'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma college Year</label>
                                  <input type="text" name="diploma_year" id="diploma_year" class="form-control"
                                      placeholder="Enter Diploma college Year">
                                  <span class="text-danger"><?php echo form_error('diploma_year'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma college State</label>
                                  <input type="text" name="diploma_state" id="diploma_state" class="form-control"
                                      placeholder="Enter Diploma college State">
                                  <span class="text-danger"><?php echo form_error('diploma_state'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma college Country</label>
                                  <input type="text" name="diploma_country" id="diploma_country" class="form-control"
                                      placeholder="Enter Diploma college Country">
                                  <span class="text-danger"><?php echo form_error('diploma_country'); ?></span>
                              </div>
                          </div>

                      </div>
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma Medium of Instruction</label>
                                  <input type="text" name="diploma_medium" id="diploma_medium" class="form-control"
                                      placeholder="Enter Diploma Medium of Instruction">
                                  <span class="text-danger"><?php echo form_error('diploma_medium'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma Percentage</label>
                                  <input type="text" name="diploma_percentage" id="diploma_percentage"
                                      class="form-control" placeholder="Enter Diploma Percentage">
                                  <span class="text-danger"><?php echo form_error('diploma_percentage'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Diploma Marks Card No</label>
                                  <input type="text" name="diploma_marks" id="diploma_marks" class="form-control"
                                      placeholder="Enter Diploma Marks">
                                  <span class="text-danger"><?php echo form_error('diploma_marks'); ?></span>
                              </div>
                          </div>

                      </div>
                      <h2 class="card-title">
                          Degree College Details
                      </h2><br><br>
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree college Level</label>
                                  <input type="text" name="degree_level" id="degree_level" class="form-control"
                                      placeholder="Enter Degree college Level">
                                  <span class="text-danger"><?php echo form_error('degree_level'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree college Type</label>
                                  <input type="text" name="degree_type" id="degree_type" class="form-control"
                                      placeholder="Enter Degree college Type">
                                  <span class="text-danger"><?php echo form_error('degree_type'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree college Board</label>
                                  <input type="text" name="degree_board" id="degree_board" class="form-control"
                                      placeholder="Enter Degree college Board">
                                  <span class="text-danger"><?php echo form_error('degree_board'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree college Name</label>
                                  <input type="text" name="degree_name" id="degree_name" class="form-control"
                                      placeholder="Enter Degree college Name">
                                  <span class="text-danger"><?php echo form_error('degree_name'); ?></span>
                              </div>
                          </div>

                      </div>
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree college City</label>
                                  <input type="text" name="degree_city" id="degree_city" class="form-control"
                                      placeholder="Enter Degree college City">
                                  <span class="text-danger"><?php echo form_error('degree_city'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree college Year</label>
                                  <input type="text" name="degree_year" id="degree_year" class="form-control"
                                      placeholder="Enter Degree college Year">
                                  <span class="text-danger"><?php echo form_error('degree_year'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree college State</label>
                                  <input type="text" name="degree_state" id="degree_state" class="form-control"
                                      placeholder="Enter Degree college State">
                                  <span class="text-danger"><?php echo form_error('degree_state'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree college Country</label>
                                  <input type="text" name="degree_country" id="degree_country" class="form-control"
                                      placeholder="Enter Degree college Country">
                                  <span class="text-danger"><?php echo form_error('degree_country'); ?></span>
                              </div>
                          </div>

                      </div>
                      <div class="form-row">


                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree Medium of Instruction</label>
                                  <input type="text" name="degree_medium" id="degree_medium" class="form-control"
                                      placeholder="Enter Degree Medium of Instruction">
                                  <span class="text-danger"><?php echo form_error('degree_medium'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree Percentage</label>
                                  <input type="text" name="degree_percentage" id="degree_percentage"
                                      class="form-control" placeholder="Enter Degree Percentage">
                                  <span class="text-danger"><?php echo form_error('degree_percentage'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-6">
                              <div class="form-group">
                                  <label class="label">Degree Marks Card No</label>
                                  <input type="text" name="degree_markscard_no" id="degree_markscard_no"
                                      class="form-control" placeholder="Enter Degree Marks Card Number">
                                  <span class="text-danger"><?php echo form_error('degree_markscard_no'); ?></span>
                              </div>
                          </div>

                      </div>

                      </form>
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                              class="fas fa-edit"></i> Submit </button>
                      <?php echo anchor('admin/enquiries/', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm float-right" '); ?>
                  </div>
              </div>

          </div>
      </section>
  </div>