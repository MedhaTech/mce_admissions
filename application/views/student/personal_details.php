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
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Date of Birth</label>
                                  <input type="date" class="form-control" placeholder="Enter DOB"
                                      id="date_of_birth"
                                      value="<?php echo (set_value('date_of_birth')) ? set_value('date_of_birth') : $date_of_birth; ?>"
                                      name="date_of_birth">
                                  <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Gender<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" placeholder="Enter Gender" id="gender"
                                      value="<?php echo (set_value('gender')) ? set_value('gender') : $gender; ?>"
                                      name="gender">
                                  <span class="text-danger"><?php echo form_error('gender'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Sports</label>
                                  <?php $sports_options = array(" "=>"Select Sports","State Level"=>"State Level","National Level"=>"National Level","International Level"=>"International Level","Not Applicable"=>"Not Applicable");
                                        echo form_dropdown('sports', $sports_options, (set_value('sports')) ? set_value('sports') : $sports , 'class="form-control" id="sports"'); 
                                  ?>
                                  <span class="text-danger"><?php echo form_error('sports'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Blood Group</label>
                                  <?php $blood_groups = array(" "=>"Select Blood Group","O-"=>"O-","O+"=>"O+","A-"=>"A-","A+"=>"A+","B-"=>"B-","B+"=>"B+","AB-"=>"AB-","AB+"=>"AB+");
                                        echo form_dropdown('blood_group', $blood_groups, (set_value('blood_group')) ? set_value('blood_group') : $blood_group, 'class="form-control" id="blood_group"'); 
                                  ?>
                                  <span class="text-danger"><?php echo form_error('blood_group'); ?></span>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Place of Birth</label>
                                  <input type="text" class="form-control" placeholder="Enter Birth Place"
                                      id="place_of_birth"
                                      value="<?php echo (set_value('place_of_birth')) ? set_value('place_of_birth') : $place_of_birth; ?>"
                                      name="place_of_birth">
                                  <span class="text-danger"><?php echo form_error('place_of_birth'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Country of Birth</label>
                                  <input type="text" class="form-control" placeholder="Enter Nationality"
                                      id="country_of_birth"
                                      value="<?php echo (set_value('country_of_birth')) ? set_value('country_of_birth') : $country_of_birth; ?>"
                                      name="country_of_birth">
                                  <span class="text-danger"><?php echo form_error('country_of_birth'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Nationality</label>
                                  <input type="text" class="form-control" placeholder="Enter Nationality"
                                      id="nationality"
                                      value="<?php echo (set_value('nationality')) ? set_value('nationality') : $nationality; ?>"
                                      name="nationality">
                                  <span class="text-danger"><?php echo form_error('nationality'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Religion</label>
                                  <input type="text" class="form-control" placeholder="Enter Religion" id="religion"
                                      value="<?php echo (set_value('religion')) ? set_value('religion') : $religion; ?>"
                                      name="religion">
                                  <span class="text-danger"><?php echo form_error('religion'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Caste</label>
                                  <input type="text" class="form-control" placeholder="Enter Caste" id="caste"
                                      value="<?php echo (set_value('caste')) ? set_value('caste') : $caste; ?>"
                                      name="caste">
                                  <span class="text-danger"><?php echo form_error('caste'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Mother Tongue</label>
                                  <input type="text" class="form-control" placeholder="Enter Mother Tongue"
                                      id="mother_tongue"
                                      value="<?php echo (set_value('mother_tongue')) ? set_value('mother_tongue') : $mother_tongue; ?>"
                                      name="mother_tongue">
                                  <span class="text-danger"><?php echo form_error('mother_tongue'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Disability</label>
                                   
                                  <?php $select_options = array(" "=>"Select ","yes"=>"yes","no"=>"no");
                                        echo form_dropdown('disability', $select_options, (set_value('disability')) ? set_value('disability') : $disability , 'class="form-control" id="disability"'); 
                                  ?>
                                  <span class="text-danger"><?php echo form_error('disability'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12 yes">
                              <div class="form-group">
                                  <label class="labeldis" id="type_of_disability1" name="type_of_disability1">Type of Disability</label>
                                  <input type="text" class="form-control labeldis" placeholder="Enter Type of Disability"
                                      id="type_of_disability" 
                                      value="<?php echo (set_value('type_of_disability')) ? set_value('type_of_disability') : $type_of_disability; ?>"
                                      name="type_of_disability">
                                  <!-- <span class="text-danger"><?php echo form_error('type_of_disability'); ?></span> -->
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Economically Backward</label>
                                  <?php $select_options = array(" "=>"Select ","yes"=>"yes","no"=>"no");
                                        echo form_dropdown('economically_backward', $select_options, (set_value('economically_backward')) ? set_value('economically_backward') : $economically_backward , 'class="form-control" id="economically_backward"'); 
                                  ?>
                                  <span class="text-danger"><?php echo form_error('economically_backward'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Domicile of State</label>
                                  <?php 
                                     echo form_dropdown('domicile_of_state', $states, (set_value('domicile_of_state')) ? set_value('domicile_of_state') : $domicile_of_state, 'class="form-control form-control" id="domicile_of_state"'); 
                                 ?>
                                  <span class="text-danger"><?php echo form_error('domicile_of_state'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Hobbies</label>
                                  <input type="text" class="form-control" placeholder="Enter Hobbies" id="hobbies"
                                      value="<?php echo (set_value('hobbies')) ? set_value('hobbies') : $hobbies; ?>"
                                      name="hobbies">
                                  <span class="text-danger"><?php echo form_error('hobbies'); ?></span>
                              </div>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-6">
                              <label class="form-label text-primary">Current Address</label>
                              <div class="form-row">
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Address</label>
                                  <input type="text" class="form-control" placeholder="Enter Current Address"
                                      id="current_address"
                                      value="<?php echo (set_value('current_address')) ? set_value('current_address') : $current_address; ?>"
                                      name="current_address">
                                  <span class="text-danger"><?php echo form_error('current_address'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">City</label>
                                  <input type="text" class="form-control" placeholder="Enter Current City"
                                      id="current_city"
                                      value="<?php echo (set_value('current_city')) ? set_value('current_city') : $current_city; ?>"
                                      name="current_city">
                                  <span class="text-danger"><?php echo form_error('current_city'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">District</label>
                                  <input type="text" class="form-control" placeholder="Enter Current District"
                                      id="current_district"
                                      value="<?php echo (set_value('current_district')) ? set_value('current_district') : $current_district; ?>"
                                      name="current_district">
                                  <span class="text-danger"><?php echo form_error('current_district'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">State</label>
                                  <input type="text" class="form-control" placeholder="Enter Current State"
                                      id="current_state"
                                      value="<?php echo (set_value('current_state')) ? set_value('current_state') : $current_state; ?>"
                                      name="current_state">
                                  <span class="text-danger"><?php echo form_error('current_state'); ?></span>
                              </div>
                              <div class="form-group col-md-6 col-sm-12">
                                  <label class="form-label">Country</label>
                                  <input type="text" class="form-control" placeholder="Enter Current Country"
                                      id="current_country"
                                      value="<?php echo (set_value('current_country')) ? set_value('current_country') : $current_country; ?>"
                                      name="current_country">
                                  <span class="text-danger"><?php echo form_error('current_country'); ?></span>
                              </div>
                              <div class="form-group col-md-6 col-sm-12">
                                  <label class="form-label">Pincode</label>
                                  <input type="number" class="form-control" placeholder="Enter Current Pincode"
                                      id="current_pincode"
                                      value="<?php echo (set_value('current_pincode')) ? set_value('current_pincode') : $current_pincode; ?>"
                                      name="current_pincode">
                                  <span class="text-danger"><?php echo form_error('current_pincode'); ?></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group row m-0">
                                  <label class="form-label col-md-6 text-primary">Permanent Address</label>
                                  <div class="col-md-6 custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                                      <label class="form-label custom-control-label" for="customCheck1">Same As Current Address</label>
                                  </div>
                              </div>
                              <div class="form-row">
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">Address</label>
                                  <input type="text" class="form-control" placeholder="Enter Permanent Address"
                                      id="present_address"
                                      value="<?php echo (set_value('present_address')) ? set_value('present_address') : $present_address; ?>"
                                      name="present_address">
                                  <span class="text-danger"><?php echo form_error('present_address'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">City</label>
                                  <input type="text" class="form-control" placeholder="Enter Permanent State"
                                      id="present_city"
                                      value="<?php echo (set_value('present_city')) ? set_value('present_city') : $present_city; ?>"
                                      name="present_city">
                                  <span class="text-danger"><?php echo form_error('present_city'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">District</label>
                                  <input type="text" class="form-control" placeholder="Enter Permanent State"
                                      id="present_district"
                                      value="<?php echo (set_value('present_district')) ? set_value('present_district') : $present_district; ?>"
                                      name="present_district">
                                  <span class="text-danger"><?php echo form_error('present_district'); ?></span>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                  <label class="form-label">State</label>
                                  <input type="text" class="form-control" placeholder="Enter Permanent State"
                                      id="present_state"
                                      value="<?php echo (set_value('present_state')) ? set_value('present_state') : $present_state; ?>"
                                      name="present_state">
                                  <span class="text-danger"><?php echo form_error('present_state'); ?></span>
                              </div>
                              <div class="form-group col-md-6 col-sm-12">
                                  <label class="form-label">Country</label>
                                  <input type="text" class="form-control" placeholder="Enter Permanent Country"
                                      id="present_country"
                                      value="<?php echo (set_value('present_country')) ? set_value('present_country') : $present_country; ?>"
                                      name="present_country">
                                  <span class="text-danger"><?php echo form_error('present_country'); ?></span>
                              </div>
                              <div class="form-group col-md-6 col-sm-12">
                                  <label class="form-label">Pincode</label>
                                  <input type="number" class="form-control" placeholder="Enter Permanent Pincode"
                                      id="present_pincode"
                                      value="<?php echo (set_value('present_pincode')) ? set_value('present_pincode') : $present_pincode; ?>"
                                      name="present_pincode">
                                  <span class="text-danger"><?php echo form_error('present_pincode'); ?></span>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                      <div class="row">
                          <div class="col-md-6">
                              <?php echo anchor('student/entranceexamdetails', 'BACK', 'class="btn btn-danger btn-square" '); ?>
                          </div>
                          <div class="col-md-6 text-right">
                              <button type="submit" class="btn btn-info btn-square" name="Update" id="Update"> SAVE 
                              </button>
                              <?php echo anchor('student/parentdetails', 'NEXT', 'class="btn btn-danger btn-square float-right" '); ?>
                          </div>
                      </div>
                  </div>
                  <?php echo form_close(); ?>
              </div>
          </div>
      </section>
</div>

<script>
   $(document).ready(function() {
    var base_url = '<?php echo base_url(); ?>';

        $(".labeldis").hide();
        $("#disability").change(function () {
            if($("#disability").val() == "yes") {
                $(".labeldis").show();
            }
        })

        $("#disability").change(function () {
            if($("#disability").val() == "no") {
                $(".labeldis").hide();
            }
        })
    })
</script>