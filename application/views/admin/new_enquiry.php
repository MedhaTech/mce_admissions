  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">

              <div class="card card-dark">
                  <div class="card-header">
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


                          <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                  <label for="exam_board">SSLC Percentage/Grade</label>
                                  <input type="text" name="sslc_grade" id="sslc_grade" class="form-control"
                                      value="<?php echo (set_value('sslc_grade')) ? set_value('sslc_grade') : $sslc_grade; ?>">
                                  <span class="text-danger"><?php echo form_error('sslc_grade'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                  <label for="admission_based">Admission Based on</label>
                                  <?php $admission_options = array(" "=>"Select Admission Based On","PUC"=>"PUC","DIPLOMA"=>"DIPLOMA","GTTC"=>"GTTC"); 
                                     echo form_dropdown('admission_based', $admission_options, (set_value('admission_based')) ? set_value('admission_based') : $admission_based , 'class="form-control " id="admission_based"'); 
                                ?>
                                  <span class="text-danger"><?php echo form_error('admission_based'); ?></span>
                              </div>
                          </div>

                      </div>

                      <div class="row entyp">
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="label font-13 entyp">PUC-I(10+1) Percentage<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control  entyp"
                                id="puc1_grade"
                                value="<?php echo (set_value('puc1_grade')) ? set_value('puc1_grade') : $puc1_grade; ?>"
                                name="puc1_grade">
                            <span
                                class="text-danger"><?php echo form_error('puc1_grade'); ?></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="label font-13 entyp">PUC-II(10+2) Percentage</label>
                            <input type="number" class="form-control  entyp"
                                id="puc2_grade"
                                value="<?php echo (set_value('puc2_grade')) ? set_value('puc2_grade') : $puc2_grade; ?>"
                                name="puc2_grade">
                            <span
                                class="text-danger"><?php echo form_error('puc2_grade'); ?></span>
                        </div>
                    </div>

                    <div class="row dip">
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="label font-13 dip">DIPLOMA-I Percentage<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control  dip"
                                id="diploma1_grade"
                                value="<?php echo (set_value('diploma1_grade')) ? set_value('diploma1_grade') : $diploma1_grade; ?>"
                                name="diploma1_grade">
                            <span
                                class="text-danger"><?php echo form_error('diploma1_grade'); ?></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="label font-13 dip">DIPLOMA-II Percentage<span
                            class="text-danger">*</span></label>
                            <input type="number" class="form-control  dip"
                                id="diploma2_grade"
                                value="<?php echo (set_value('diploma2_grade')) ? set_value('diploma2_grade') : $diploma2_grade; ?>"
                                name="diploma2_grade">
                            <span
                                class="text-danger"><?php echo form_error('diploma2_grade'); ?></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="label font-13 dip">DIPLOMA-III Percentage</label>
                            <input type="number" class="form-control  dip"
                                id="diploma3_grade"
                                value="<?php echo (set_value('diploma3_grade')) ? set_value('diploma3_grade') : $diploma3_grade; ?>"
                                name="diploma3_grade">
                            <span
                                class="text-danger"><?php echo form_error('diploma3_grade'); ?></span>
                        </div>
                    </div>

                    <div class="row gtc">
                        <div class="form-group col-md-3 col-sm-12">
                            <label class="label font-13 gtc">GT & TC-I Percentage<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control  gtc"
                                id="gttc1_grade"
                                value="<?php echo (set_value('gttc1_grade')) ? set_value('gttc1_grade') : $gttc1_grade; ?>"
                                name="gttc1_grade">
                            <span
                                class="text-danger"><?php echo form_error('gttc1_grade'); ?></span>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label class="label font-13 gtc">GT & TC-II Percentage<span
                            class="text-danger">*</span></label>
                            <input type="number" class="form-control  gtc"
                                id="gttc2_grade"
                                value="<?php echo (set_value('gttc2_grade')) ? set_value('gttc2_grade') : $gttc2_grade; ?>"
                                name="gttc2_grade">
                            <span
                                class="text-danger"><?php echo form_error('gttc2_grade'); ?></span>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label class="label font-13 gtc">GT & TC-III Percentage<span
                            class="text-danger">*</span></label>
                            <input type="number" class="form-control  gtc"
                                id="gttc3_grade"
                                value="<?php echo (set_value('gttc3_grade')) ? set_value('gttc3_grade') : $gttc3_grade; ?>"
                                name="gttc3_grade">
                            <span
                                class="text-danger"><?php echo form_error('gttc3_grade'); ?></span>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label class="label font-13 gtc">GT & TC-IV Percentage</label>
                            <input type="number" class="form-control  gtc"
                                id="gttc4_grade"
                                value="<?php echo (set_value('gttc4_grade')) ? set_value('gttc4_grade') : $gttc4_grade; ?>"
                                name="gttc4_grade">
                            <span
                                class="text-danger"><?php echo form_error('gttc4_grade'); ?></span>
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
                                  <label for="dsc-2">Aadhaar Number </label>
                                  <input type="text" name="aadhaar" id="aadhaar" class="form-control"
                                      value="<?php echo (set_value('aadhaar')) ? set_value('aadhaar') : $aadhaar; ?>">
                                  <span class="text-danger"><?php echo form_error('aadhaar'); ?></span>
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

    $(".entyp").hide();
    $(".dip").hide();
    $(".gtc").hide();
        $("#admission_based").change(function () {
            if($("#admission_based").val() == "PUC") {
                $(".entyp").show();
                $(".dip").hide();
                $(".gtc").hide();
            }
        })

        $("#admission_based").change(function () {
            if($("#admission_based").val() == "DIPLOMA") {
                $(".dip").show();
                $(".entyp").hide();
                $(".gtc").hide();
            }
        })

        $("#admission_based").change(function () {
            if($("#admission_based").val() == "GTTC") {
                $(".gtc").show();
                $(".entyp").hide();
                $(".dip").hide();
            }
        })
});
  </script>