  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">

              <div class="card card-info shadow">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0"><?= $page_title; ?></h6>
                  </div>
                  <div class="card-body">
                      <?php echo form_open_multipart($action, 'class="user"'); ?>

                      <div class="form-row">

                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="student_name">Student Full Name (As per SSLC)</label>
                                  <input type="text" name="student_name" id="student_name" class="form-control"
                                      value="<?php echo (set_value('student_name')) ? set_value('student_name') : $student_name; ?>">
                                  <span class="text-danger"><?php echo form_error('student_name'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="text">Student Mobile</label>
                                  <input type="number" name="mobile" id="mobile" class="form-control"
                                      value="<?php echo (set_value('mobile')) ? set_value('mobile') : $mobile; ?>">
                                  <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="email">Student Email</label>
                                  <input type="text" name="email" id="email" class="form-control"
                                      value="<?php echo (set_value('email')) ? set_value('email') : $email; ?>">
                                  <span class="text-danger"><?php echo form_error('email'); ?></span>
                              </div>
                          </div>

                      </div>

                      <div class="form-row">

                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="par_name">Parent/Guardian Name</label>
                                  <input type="text" name="par_name" id="par_name" class="form-control"
                                      value="<?php echo (set_value('par_name')) ? set_value('par_name') : $par_name; ?>">
                                  <span class="text-danger"><?php echo form_error('par_name'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="text">Parent/Guardian Mobile</label>
                                  <input type="number" name="par_mobile" id="par_mobile" class="form-control"
                                      value="<?php echo (set_value('par_mobile')) ? set_value('par_mobile') : $par_mobile; ?>">
                                  <span class="text-danger"><?php echo form_error('par_mobile'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="email">Parent/Guardian Email</label>
                                  <input type="text" name="par_email" id="par_email" class="form-control"
                                      value="<?php echo (set_value('par_email')) ? set_value('par_email') : $par_email; ?>">
                                  <span class="text-danger"><?php echo form_error('par_email'); ?></span>
                              </div>
                          </div>

                      </div>

                      <div class="form-row">


                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="exam_board">SSLC Percentage/Grade</label>
                                  <input type="text" name="sslc_grade" id="sslc_grade" class="form-control"
                                      value="<?php echo (set_value('sslc_grade')) ? set_value('sslc_grade') : $sslc_grade; ?>">
                                  <span class="text-danger"><?php echo form_error('sslc_grade'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="register_number">PUC-I(10+1) Percentage/Grade</label>
                                  <input type="text" name="puc1_grade" id="puc1_grade" class="form-control"
                                      value="<?php echo (set_value('puc1_grade')) ? set_value('puc1_grade') : $puc1_grade; ?>">
                                  <span class="text-danger"><?php echo form_error('puc1_grade'); ?></span>
                              </div>
                          </div>

                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="register_number">PUC-II(10+2) Percentage/Grade</label>
                                  <input type="text" name="puc2_grade" id="puc2_grade" class="form-control"
                                      value="<?php echo (set_value('puc2_grade')) ? set_value('puc2_grade') : $puc2_grade; ?>">
                                  <span class="text-danger"><?php echo form_error('puc2_grade'); ?></span>
                              </div>
                          </div>

                      </div>
                      <div class="form-row">
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dsc-1">State </label>
                                  <?php
                                  echo form_dropdown('state', $states, (set_value('state')) ? set_value('state') : $state, 'class="form-control" id="state" '); ?>
                                  <span class="text-danger"><?php echo form_error('state'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dsc-2">City </label>
                                  <input type="text" name="city" id="city" class="form-control"
                                      value="<?php echo (set_value('city')) ? set_value('city') : $city; ?>">
                                  <span class="text-danger"><?php echo form_error('city'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dsc-2">Category</label>
                                  <?php echo form_dropdown('category', $type_options, '', 'class="form-control input-xs" id="category"'); ?>
                                  <span class="text-danger"><?php echo form_error('category'); ?></span>
                              </div>
                          </div>

                      </div>
                      <div class="form-row">

                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dsc-2">Adhaar Number </label>
                                  <input type="text" name="adhaar" id="adhaar" class="form-control"
                                      value="<?php echo (set_value('adhaar')) ? set_value('adhaar') : $adhaar; ?>">
                                  <span class="text-danger"><?php echo form_error('adhaar'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dsc-2">Gender </label>
                                  <?php $gender_options = array(" " => "Select Gender", "Male" => "Male", "Female" => "Female", "Not Prefer to Say" => "Not Prefer to Say"); echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control" id="gender"'); ?>
                                  <span class="text-danger"><?php echo form_error('gender'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Sports/Cultural Activities<span
                                          class="text-danger">*</span></label>
                                  <?php $sports_options = array(" "=>"Select Sports","State"=>"State","National"=>"National","International"=>"International");
                                        echo form_dropdown('sports', $sports_options, (set_value('sports')) ? set_value('sports') : 'sports', 'class="form-control " id="sports"'); 
                                  ?>
                                  <span class="text-danger"><?php echo form_error('sports'); ?></span>
                              </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="course">Branch Preference-I
                                  </label>
                                  <?php echo form_dropdown('course', $course_options, (set_value('course')) ? set_value('course') : $course, 'class="form-control" id="course"'); ?>
                                  <span class="text-danger"><?php echo form_error('course'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="course">Branch Preference-II
                                  </label>
                                  <?php echo form_dropdown('course1', $course_options, (set_value('course1')) ? set_value('course1') : $course1, 'class="form-control" id="course1"'); ?>
                                  <span class="text-danger"><?php echo form_error('course1'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="course">Branch Preference-III
                                  </label>
                                  <?php echo form_dropdown('course2', $course_options, (set_value('course2')) ? set_value('course2') : $course2, 'class="form-control" id="course2"'); ?>
                                  <span class="text-danger"><?php echo form_error('course2'); ?></span>
                              </div>
                          </div>
                      </div>
                      <!-- <div class="form-group row">
                          <div class="col-sm-2"> &nbsp;</div>
                          <div class="col-sm-10 text-right">
                              <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                      class="fas fa-edit"></i> Submit </button>
                              <?php echo anchor('admin/enquiries/', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
                          </div>
                      </div> -->
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                              class="fas fa-edit"></i> Submit </button>
                      <?php echo anchor('admin/enquiries/', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm float-right" '); ?>
                      <!-- <button type="submit" class="btn btn-info">Sign in</button> -->
                      <!-- <button type="submit" class="btn btn-default float-right">Cancel</button> -->
                  </div>
                  </form>
              </div>

          </div>
      </section>

  </div>
  <script>
$(document).ready(function() {

    var base_url = '<?php echo base_url(); ?>';

    $('#mobile').keypress(function(e) {
        if ($(this).val().length < 10) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
                a.push(i);

            if (!(a.indexOf(k) >= 0))
                e.preventDefault();
        } else {
            event.preventDefault();
            return false;
        }
    });

    $('#email').keyup(function() {
        $(this).val($(this).val().toLowerCase());
    });

    $("#course1").change(function() {
        event.preventDefault();
        var course = $("#course").val();

        if (course == "BA") {
            var myOptions = {
                ' ': 'Select',
                JPE: 'JPE',
                JPK: 'JPK',
                HES: 'HES',
                HEK: 'HEK',
                PES: 'PES'
            };
        }
        if (course == "BBA") {
            var myOptions = {
                BBA: 'BBA',
            };
        }
        if (course == "BCA") {
            var myOptions = {
                BCA: 'BCA',
            };
        }
        if (course == "BSC") {
            var myOptions = {
                ' ': 'Select',
                CBZ: 'CBZ',
                CZMB: 'CZMB',
                CBBT: 'CBBT',
                PMCs: 'PMCs',
                PCM: 'PCM'
            };
        }
        if (course == "BCOM") {
            var myOptions = {
                BCOM: 'BCOM',
            };
        }
        if (course == "B.VOC") {
            var myOptions = {
                ' ': 'Select',
                IT: 'IT',
                RM: 'RM'
            };
        }

        $('select[name="combination"]').empty();
        //  $('select[name="combination"]').append($('<option></option>').val(val).html(text));
        var mySelect = $('#combination');
        $.each(myOptions, function(val, text) {
            mySelect.append(
                $('<option></option>').val(val).html(text)
            );
        });
    });

    $("#course").change(function() {
        event.preventDefault();

        var course = $("#course").val();

        if (course == ' ') {
            alert("Please Select Course");
        } else {
            $.ajax({
                'type': 'POST',
                'url': base_url + 'admin/combinationsDropdown',
                'data': {
                    'course': course,
                    'flag': 'S'
                },
                'dataType': 'text',
                'cache': false,
                'success': function(data) {
                    $('select[name="dsc_1"]').empty();
                    $('select[name="dsc_1"]').append(data);
                    $('select[name="dsc_1"]').removeAttr("disabled");

                    $('select[name="dsc_2"]').empty();
                    $('select[name="dsc_2"]').append(data);
                    $('select[name="dsc_2"]').removeAttr("disabled");
                }
            });

        }
    });
});
  </script>