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
                          <div class="col-md-4">
                              <label class="form-label text-primary">FATHER DETAILS</label>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" placeholder="Enter Name" id="father_name"
                                      value="<?php echo (set_value('father_name')) ? set_value('father_name') : $father_name; ?>"
                                      name="father_name">
                                  <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Mobile</label>
                                  <input type="number" class="form-control" placeholder="Enter Mobile" id="father_mobile"
                                      value="<?php echo (set_value('father_mobile')) ? set_value('father_mobile') : $father_mobile; ?>"
                                      name="father_mobile">
                                  <span class="text-danger"><?php echo form_error('father_mobile'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Email</label>
                                  <input type="text" class="form-control" placeholder="Enter Email" id="father_email"
                                      value="<?php echo (set_value('father_email')) ? set_value('father_email') : $father_email; ?>"
                                      name="father_email">
                                  <span class="text-danger"><?php echo form_error('father_email'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Occupation</label>
                                  <input type="text" class="form-control" placeholder="Enter Occupation"
                                      id="father_occupation"
                                      value="<?php echo (set_value('father_occupation')) ? set_value('father_occupation') : $father_occupation; ?>"
                                      name="father_occupation">
                                  <span class="text-danger"><?php echo form_error('father_occupation'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Annual Income</label>
                                  <input type="number" class="form-control" placeholder="Enter Annual Income"
                                      id="father_annual_income"
                                      value="<?php echo (set_value('father_annual_income')) ? set_value('father_annual_income') : $father_annual_income; ?>"
                                      name="father_annual_income">
                                  <span class="text-danger"><?php echo form_error('father_annual_income'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label class="form-label text-primary">MOTHER DETAILS</label>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" placeholder="Enter Name" id="mother_name"
                                      value="<?php echo (set_value('mother_name')) ? set_value('mother_name') : $mother_name; ?>"
                                      name="mother_name">
                                  <span class="text-danger"><?php echo form_error('mother_name'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Mobile</label>
                                  <input type="number" class="form-control" placeholder="Enter Mobile" id="mother_mobile"
                                      value="<?php echo (set_value('mother_mobile')) ? set_value('mother_mobile') : $mother_mobile; ?>"
                                      name="mother_mobile">
                                  <span class="text-danger"><?php echo form_error('mother_mobile'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Email</label>
                                  <input type="text" class="form-control" placeholder="Enter Email" id="mother_email"
                                      value="<?php echo (set_value('mother_email')) ? set_value('mother_email') : $mother_email; ?>"
                                      name="mother_email">
                                  <span class="text-danger"><?php echo form_error('mother_email'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Occupation</label>
                                  <input type="text" class="form-control" placeholder="Enter Occupation"
                                      id="mother_occupation"
                                      value="<?php echo (set_value('mother_occupation')) ? set_value('mother_occupation') : $mother_occupation; ?>"
                                      name="mother_occupation">
                                  <span class="text-danger"><?php echo form_error('mother_occupation'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Annual Income</label>
                                  <input type="number" class="form-control" placeholder="Enter Annual Income"
                                      id="mother_annual_income"
                                      value="<?php echo (set_value('mother_annual_income')) ? set_value('mother_annual_income') : $mother_annual_income; ?>"
                                      name="mother_annual_income">
                                  <span class="text-danger"><?php echo form_error('mother_annual_income'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label class="form-label text-primary">GUARDIAN DETAILS</label>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" placeholder="Enter Name" id="guardian_name"
                                      value="<?php echo (set_value('guardian_name')) ? set_value('guardian_name') : $guardian_name; ?>"
                                      name="guardian_name">
                                  <span class="text-danger"><?php echo form_error('guardian_name'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Mobile</label>
                                  <input type="number" class="form-control" placeholder="Enter Mobile"
                                      id="guardian_mobile"
                                      value="<?php echo (set_value('guardian_mobile')) ? set_value('guardian_mobile') : $guardian_mobile; ?>"
                                      name="guardian_mobile">
                                  <span class="text-danger"><?php echo form_error('guardian_mobile'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Email</label>
                                  <input type="text" class="form-control" placeholder="Enter Email" id="guardian_email"
                                      value="<?php echo (set_value('guardian_email')) ? set_value('guardian_email') : $guardian_email; ?>"
                                      name="guardian_email">
                                  <span class="text-danger"><?php echo form_error('guardian_email'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Occupation</label>
                                  <input type="text" class="form-control" placeholder="Enter Occupation"
                                      id="guardian_occupation"
                                      value="<?php echo (set_value('guardian_occupation')) ? set_value('guardian_occupation') : $guardian_occupation; ?>"
                                      name="guardian_occupation">
                                  <span class="text-danger"><?php echo form_error('guardian_occupation'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Annual Income</label>
                                  <input type="number" class="form-control" placeholder="Enter Annual Income"
                                      id="guardian_annual_income"
                                      value="<?php echo (set_value('guardian_annual_income')) ? set_value('guardian_annual_income') : $guardian_annual_income; ?>"
                                      name="guardian_annual_income">
                                  <span class="text-danger"><?php echo form_error('guardian_annual_income'); ?></span>
                              </div>
                          </div>
                      </div>
                      <hr>
                      <div class="row m-2">
                          <div class="col-12 text-right">
                              <button class="btn btn-danger btn-sm" type="submit">Update Details</button>
                              <?php echo anchor('student/parentdetails', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                      <div class="row">
                          <div class="col-md-6">
                              <?php echo anchor('student/personaldetails', 'BACK', 'class="btn btn-danger btn-square" '); ?>
                          </div>
                          <div class="col-md-6 text-right">
                              <button type="submit" class="btn btn-info btn-square" name="Update" id="Update"> SAVE &
                                  PROCEED </button>
                              <?php echo anchor('student/parentdetails', 'NEXT', 'class="btn btn-danger btn-square float-right" '); ?>
                          </div>
                      </div>
                  </div>
                  <?php echo form_close(); ?>
              </div>
          </div>

  </div>
  </section>
  </div>