  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- Main content -->
          <div class="content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">

                          <div class="card card-gray">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      <?= $page_title; ?>
                                  </h3>
                              </div>

                              <div class="card-body">
                                  <?php echo form_open_multipart($action, 'class="user"'); ?>
                                  <div class="col-md-8 offset-1">





                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">E
                                              Learning
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="e_learning_fee" id="e_learning_fee" class="form-control" value="<?php echo (set_value('e_learning_fee')) ? set_value('e_learning_fee') : $fee_structure['e_learning_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('e_learning_fee', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                          <div class="col-md-1">
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="e_learning_fee_checkbox" value="<?php echo (set_value('e_learning_fee')) ? set_value('e_learning_fee') : $fee_structure['e_learning_fee']; ?>">
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Eligibility
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="eligibility_fee" id="eligibility_fee" class="form-control" value="<?php echo (set_value('eligibility_fee')) ? set_value('eligibility_fee') : $fee_structure['eligibility_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('eligibility_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="eligibility_fee_checkbox" value="<?php echo (set_value('eligibility_fee')) ? set_value('eligibility_fee') : $fee_structure['eligibility_fee']; ?>">
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">e
                                              Consortium
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="e_consortium_fee" id="e_consortium_fee" class="form-control" value="<?php echo (set_value('e_consortium_fee')) ? set_value('e_consortium_fee') : $fee_structure['e_consortium_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('e_consortium_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="e_consortium_fee_checkbox" value="<?php echo (set_value('e_consortium_fee')) ? set_value('e_consortium_fee') : $fee_structure['e_consortium_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Sport
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="sport_fee" id="sport_fee" class="form-control" value="<?php echo (set_value('sport_fee')) ? set_value('sport_fee') : $fee_structure['sport_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('sport_fee', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="sport_fee_checkbox" value="<?php echo (set_value('sport_fee')) ? set_value('sport_fee') : $fee_structure['sport_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Sports
                                              Development
                                              fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="sports_development_fee" id="sports_development_fee" class="form-control" value="<?php echo (set_value('sports_development_fee')) ? set_value('sports_development_fee') : $fee_structure['sports_development_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('sports_development_fee', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="sports_development_fee_checkbox" value="<?php echo (set_value('sports_development_fee')) ? set_value('sports_development_fee') : $fee_structure['sports_development_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Career
                                              Guidance &
                                              Counseling fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="career_guidance_counseling_fee" id="career_guidance_counseling_fee" class="form-control" value="<?php echo (set_value('career_guidance_counseling_fee')) ? set_value('career_guidance_counseling_fee') : $fee_structure['career_guidance_counseling_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('career_guidance_counseling_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="career_guidance_counseling_fee_checkbox" value="<?php echo (set_value('career_guidance_counseling_fee')) ? set_value('career_guidance_counseling_fee') : $fee_structure['career_guidance_counseling_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">University
                                              Development
                                              fund</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="university_development_fund" id="university_development_fund" class="form-control" value="<?php echo (set_value('university_development_fund')) ? set_value('university_development_fund') : $fee_structure['university_development_fund']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('university_development_fund', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="university_development_fund_checkbox" value="<?php echo (set_value('university_development_fund')) ? set_value('university_development_fund') : $fee_structure['university_development_fund']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Promotion
                                              of indian
                                              Cultural Activities Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="promotion_of_indian_cultural_activities_fee" id="promotion_of_indian_cultural_activities_fee" class="form-control" value="<?php echo (set_value('promotion_of_indian_cultural_activities_fee')) ? set_value('promotion_of_indian_cultural_activities_fee') : $fee_structure['promotion_of_indian_cultural_activities_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('promotion_of_indian_cultural_activities_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="promotion_of_indian_cultural_activities_fee_checkbox" value="<?php echo (set_value('promotion_of_indian_cultural_activities_fee')) ? set_value('promotion_of_indian_cultural_activities_fee') : $fee_structure['promotion_of_indian_cultural_activities_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Teachers
                                              Development
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="teachers_development_fee" id="teachers_development_fee" class="form-control" value="<?php echo (set_value('teachers_development_fee')) ? set_value('teachers_development_fee') : $fee_structure['teachers_development_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('teachers_development_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="teachers_development_fee_checkbox" value="<?php echo (set_value('teachers_development_fee')) ? set_value('teachers_development_fee') : $fee_structure['teachers_development_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Student
                                              Development
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="student_development_fee" id="student_development_fee" class="form-control" value="<?php echo (set_value('student_development_fee')) ? set_value('student_development_fee') : $fee_structure['student_development_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('student_development_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="student_development_fee_checkbox" value="<?php echo (set_value('student_development_fee')) ? set_value('student_development_fee') : $fee_structure['student_development_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Indian
                                              Red Cross
                                              Membership Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="indian_red_cross_membership_fee" id="indian_red_cross_membership_fee" class="form-control" value="<?php echo (set_value('indian_red_cross_membership_fee')) ? set_value('indian_red_cross_membership_fee') : $fee_structure['indian_red_cross_membership_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('indian_red_cross_membership_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="indian_red_cross_membership_fee_checkbox" value="<?php echo (set_value('indian_red_cross_membership_fee')) ? set_value('indian_red_cross_membership_fee') : $fee_structure['indian_red_cross_membership_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Women
                                              Cell
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="women_cell_fee" id="women_cell_fee" class="form-control" value="<?php echo (set_value('women_cell_fee')) ? set_value('women_cell_fee') : $fee_structure['women_cell_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('women_cell_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="women_cell_fee_checkbox" value="<?php echo (set_value('women_cell_fee')) ? set_value('women_cell_fee') : $fee_structure['women_cell_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">NSS
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="nss_fee" id="nss_fee" class="form-control" value="<?php echo (set_value('nss_fee')) ? set_value('nss_fee') : $fee_structure['nss_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('nss_fee', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="nss_fee_checkbox" value="<?php echo (set_value('nss_fee')) ? set_value('nss_fee') : $fee_structure['nss_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">University
                                              Registration
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="university_registration_fee" id="university_registration_fee" class="form-control" value="<?php echo (set_value('university_registration_fee')) ? set_value('university_registration_fee') : $fee_structure['university_registration_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('university_registration_fee', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="university_registration_fee_checkbox" value="<?php echo (set_value('university_registration_fee')) ? set_value('university_registration_fee') : $fee_structure['university_registration_fee']; ?>">
                                          </div>
                                      </div>


                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-12 col-form-label text-right font-weight-bold">
                                              <hr />
                                          </label>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Admission
                                              fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="admission_fee" id="admission_fee" class="form-control" value="<?php echo (set_value('admission_fee')) ? set_value('admission_fee') : $fee_structure['admission_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('admission_fee', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="admission_fee_checkbox" value="<?php echo (set_value('admission_fee')) ? set_value('admission_fee') : $fee_structure['admission_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Processing
                                              Fee paid
                                              at
                                              KEA</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="processing_fee_paid_at_kea" id="processing_fee_paid_at_kea" class="form-control" value="<?php echo (set_value('processing_fee_paid_at_kea')) ? set_value('processing_fee_paid_at_kea') : $fee_structure['processing_fee_paid_at_kea']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('processing_fee_paid_at_kea', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="processing_fee_paid_at_kea_checkbox" value="<?php echo (set_value('processing_fee_paid_at_kea')) ? set_value('processing_fee_paid_at_kea') : $fee_structure['processing_fee_paid_at_kea']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Tution
                                              Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="tution_fee" id="tution_fee" class="form-control" value="<?php echo (set_value('tution_fee')) ? set_value('tution_fee') : $fee_structure['tution_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('tution_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="tution_fee_checkbox" value="<?php echo (set_value('tution_fee')) ? set_value('tution_fee') : $fee_structure['tution_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">College
                                              Other Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="college_other_fee" id="college_other_fee" class="form-control" value="<?php echo (set_value('college_other_fee')) ? set_value('college_other_fee') : $fee_structure['college_other_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('college_other_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="college_other_fee_checkbox" value="<?php echo (set_value('college_other_fee')) ? set_value('college_other_fee') : $fee_structure['college_other_fee']; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right font-weight-bold">Skill
                                              Development Fee</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="skill_development_fee" id="skill_development_fee" class="form-control" value="<?php echo (set_value('skill_development_fee')) ? set_value('skill_development_fee') : $fee_structure['skill_development_fee']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('skill_development_fee', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="skill_development_fee_checkbox" value="<?php echo (set_value('skill_development_fee')) ? set_value('skill_development_fee') : $fee_structure['skill_development_fee']; ?>">
                                          </div>
                                      </div>


                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right font-weight-bold">CORPUS
                                              FUND</label>
                                          <div class="col-md-6">
                                              <input type="text" readonly name="corpus_fund" id="corpus_fund" class="form-control" value="<?php echo (set_value('corpus_fund')) ? set_value('corpus_fund') : $fee_structure['corpus_fund']; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                          <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero('corpus_fund', $stud_id);

                                            if ($readonlyvalue) {
                                                $readonly = "disabled";
                                            } else {
                                                $readonly = "";
                                            }

                                            ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="corpus_fund_checkbox" value="<?php echo (set_value('corpus_fund')) ? set_value('corpus_fund') : $fee_structure['corpus_fund']; ?>">
                                          </div>
                                      </div>
                                      <hr />

                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right font-weight-bold">TOTAL AMOUNT</label>
                                          <div class="col-md-7">
                                              <input type="text" name="final_fee" id="final_fee" class="form-control" value="" readonly>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <?php echo anchor('admin/feestructure', 'BACK', 'class="btn btn-dark btn-square" '); ?>
                                      </div>
                                      <div class="col-md-6 text-right">
                                          <button type="submit" class="btn btn-info btn-square" name="create" id="create"> CREATE </button>
                                      </div>
                                  </div>
                              </div>
                              </form>
                          </div>

                      </div>
                  </div>
              </div>
      </section>



  </div>
  <!-- End of Main Content -->

  <script>
  $(document).ready(function() {
    // Function to update final fee based on selected checkboxes
    function updateFinalFee() {
      var sum = 0;
      var corpusFundChecked = false;

      // Iterate over each checkbox that needs to be considered
      $('input[type="checkbox"]').each(function() {
        if ($(this).prop('checked')) {
          var inputId = $(this).attr('id').replace('_checkbox', '');
          var inputValue = parseFloat($('#' + inputId).val());
          
          if ($(this).attr('id') === 'corpus_fund_checkbox') {
            // If corpus_fund_checkbox is checked, uncheck all others
            corpusFundChecked = true;
            sum = inputValue; // Set sum to only the corpus fund value
          } else {
            // Add value to sum only if it's not corpus_fund_checkbox
            sum += inputValue;
          }
        }
      });

      // Update the final_fee input with the calculated sum
      $('#final_fee').val(sum.toFixed(2));

      // If corpus_fund_checkbox is checked, uncheck all other checkboxes
      if (corpusFundChecked) {
        $('input[type="checkbox"]').each(function() {
          if ($(this).attr('id') !== 'corpus_fund_checkbox' && $(this).prop('checked')) {
            $(this).prop('checked', false);
          }
        });
      }
    }

    // Attach change event listener to relevant checkboxes
    $('input[type="checkbox"]').change(function() {
      updateFinalFee(); // Update the final fee whenever a checkbox changes
    });

    // Initialize final fee on page load
    updateFinalFee();
  });
</script>

  <script>
      $(document).ready(function() {
          // Listen for form submission
          $('form').submit(function(event) {
              // Prevent the default form submission
              event.preventDefault();

              // Array to store selected checkbox values
              var selectedFees = [];

              // Iterate over each checked checkbox
              $('input[name="fees[]"]:checked').each(function() {
                  // Get the value of the checkbox (e.g., 'e_learning_fee')
                  var feeValue = $(this).val();

                  // Find the corresponding text field value based on feeValue
                  var textFieldValue = $('#' + feeValue).val();

                  // Prepare data for submission
                  selectedFees.push({
                      name: $(this).attr('id'),
                      value: feeValue,
                      textFieldValue: textFieldValue
                  });
              });
              var finalFee = $('#final_fee').val();

              // Add final fee and selectedFees array as hidden input fields to the form
              $('<input>').attr({
                  type: 'hidden',
                  name: 'final_fee',
                  value: finalFee
              }).appendTo('form');

              // Add selectedFees array as a hidden input field to the form
              $('<input>').attr({
                  type: 'hidden',
                  name: 'selected_fees',
                  value: JSON.stringify(selectedFees)
              }).appendTo('form');

              // Submit the form programmatically
              this.submit();
          });
      });
  </script>