  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- Main content -->
          <div class="content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 mb-4">

                          <div class="card mb-4">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      <?=$page_title;?>
                                  </h3>
                              </div>
                              <div class="card-body">
                                  <?php echo form_open('admin/editFeeStructure/' . $fee_structure['id'],'class="user" enctype="multipart/form-data"'); ?>
                                  <div class="col-md-8 offset-1">
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right">Quota</label>
                                          <div class="col-md-7">
                                              <input type="text" name="quota" id="department" class="form-control"
                                                  value="<?php echo (set_value('quota'))?set_value('quota'):$fee_structure['quota'];?>"
                                                  readonly>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Sub
                                              Quota</label>
                                          <div class="col-md-7">
                                              <input type="text" name="sub_quota" id="sub_quota" class="form-control"
                                                  value="<?php echo (set_value('sub_quota'))?set_value('sub_quota'):$fee_structure['sub_quota'];?>"
                                                  readonly>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">E
                                              Learning
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="e_learning_fee" id="e_learning_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('e_learning_fee'))?set_value('e_learning_fee'):$fee_structure['e_learning_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right">Eligibility
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="eligibility_fee" id="eligibility_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('eligibility_fee'))?set_value('eligibility_fee'):$fee_structure['eligibility_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">e
                                              Consortium
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="e_consortium_fee" id="e_consortium_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('e_consortium_fee'))?set_value('e_consortium_fee'):$fee_structure['e_consortium_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Sport
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="sport_fee" id="sport_fee" class="form-control"
                                                  value="<?php echo (set_value('sport_fee'))?set_value('sport_fee'):$fee_structure['sport_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Sports
                                              Development
                                              fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="sports_development_fee"
                                                  id="sports_development_fee" class="form-control"
                                                  value="<?php echo (set_value('sports_development_fee'))?set_value('sports_development_fee'):$fee_structure['sports_development_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Career
                                              Guidance &
                                              Counseling fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="career_guidance_counseling_fee"
                                                  id="career_guidance_counseling_fee" class="form-control"
                                                  value="<?php echo (set_value('career_guidance_counseling_fee'))?set_value('career_guidance_counseling_fee'):$fee_structure['career_guidance_counseling_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">University
                                              Development
                                              fund</label>
                                          <div class="col-md-7">
                                              <input type="text" name="university_development_fund"
                                                  id="university_development_fund" class="form-control"
                                                  value="<?php echo (set_value('university_development_fund'))?set_value('university_development_fund'):$fee_structure['university_development_fund'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Promotion
                                              of indian
                                              Cultural Activities Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="promotion_of_indian_cultural_activities_fee"
                                                  id="promotion_of_indian_cultural_activities_fee" class="form-control"
                                                  value="<?php echo (set_value('promotion_of_indian_cultural_activities_fee'))?set_value('promotion_of_indian_cultural_activities_fee'):$fee_structure['promotion_of_indian_cultural_activities_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Teachers
                                              Development
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="teachers_development_fee"
                                                  id="teachers_development_fee" class="form-control"
                                                  value="<?php echo (set_value('teachers_development_fee'))?set_value('teachers_development_fee'):$fee_structure['teachers_development_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Student
                                              Development
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="student_development_fee"
                                                  id="student_development_fee" class="form-control"
                                                  value="<?php echo (set_value('student_development_fee'))?set_value('student_development_fee'):$fee_structure['student_development_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Indian
                                              Red Cross
                                              Membership Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="indian_red_cross_membership_fee"
                                                  id="indian_red_cross_membership_fee" class="form-control"
                                                  value="<?php echo (set_value('indian_red_cross_membership_fee'))?set_value('indian_red_cross_membership_fee'):$fee_structure['indian_red_cross_membership_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Women
                                              Cell
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="women_cell_fee" id="women_cell_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('women_cell_fee'))?set_value('women_cell_fee'):$fee_structure['women_cell_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">NSS
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="nss_fee" id="nss_fee" class="form-control"
                                                  value="<?php echo (set_value('nss_fee'))?set_value('nss_fee'):$fee_structure['nss_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">University
                                              Registration
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="university_registration_fee"
                                                  id="university_registration_fee" class="form-control"
                                                  value="<?php echo (set_value('university_registration_fee'))?set_value('university_registration_fee'):$fee_structure['university_registration_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">TOTAL
                                              UNIVERSITY FEE</label>
                                          <div class="col-md-7">
                                              <input type="text" name="total_university_fee" id="total_university_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('total_university_fee'))?set_value('total_university_fee'):$fee_structure['total_university_fee'];?>"
                                                  readonly>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-12 col-form-label text-right font-weight-bold">
                                              <hr />
                                          </label>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Admission
                                              fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="admission_fee" id="admission_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('admission_fee'))?set_value('admission_fee'):$fee_structure['admission_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Processing
                                              Fee paid
                                              at
                                              KEA</label>
                                          <div class="col-md-7">
                                              <input type="text" name="processing_fee_paid_at_kea"
                                                  id="processing_fee_paid_at_kea" class="form-control"
                                                  value="<?php echo (set_value('processing_fee_paid_at_kea'))?set_value('processing_fee_paid_at_kea'):$fee_structure['processing_fee_paid_at_kea'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Tution
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="tution_fee" id="tution_fee" class="form-control"
                                                  value="<?php echo (set_value('tution_fee'))?set_value('tution_fee'):$fee_structure['tution_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">COLLEGE
                                              OTHER
                                              FEE</label>
                                          <div class="col-md-7">
                                              <input type="text" name="college_other_fee" id="college_other_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('college_other_fee'))?set_value('college_other_fee'):$fee_structure['college_other_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">TOTAL
                                              TUTION FEE</label>
                                          <div class="col-md-7">
                                              <input type="text" name="total_tution_fee" id="total_tution_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('total_tution_fee'))?set_value('total_tution_fee'):$fee_structure['total_tution_fee'];?>"
                                                  readonly>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <hr />

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">TOTAL
                                              DEMAND</label>
                                          <div class="col-md-7">
                                              <input type="text" name="total_demand" id="total_demand"
                                                  class="form-control"
                                                  value="<?php echo (set_value('total_demand'))?set_value('total_demand'):$fee_structure['total_demand'];?>"
                                                  readonly>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <hr />
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">SKILL
                                              DEVELOPMENT FEE</label>
                                          <div class="col-md-7">
                                              <input type="text" name="skill_development_fee" id="skill_development_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('skill_development_fee'))?set_value('skill_development_fee'):$fee_structure['skill_development_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">CORPUS
                                              FUND</label>
                                          <div class="col-md-7">
                                              <input type="text" name="corpus_fund" id="corpus_fund"
                                                  class="form-control"
                                                  value="<?php echo (set_value('corpus_fund'))?set_value('corpus_fund'):$fee_structure['corpus_fund'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <div class="col-md-7 offset-5">
                                              <button type="submit" class="btn btn-danger btn-sm" name="Update"
                                                  id="Update"><i class="fas fa-edit"></i> Update </button>
                                              <?php echo anchor('admin/feestructure/', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>

                                          </div>

                                      </div>


                                      <div class="form-group row">
                                          <div class="col-sm-2"> &nbsp;</div>
                                          <div class="col-sm-10 text-right">

                                          </div>
                                      </div>

                                      </form>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
      </section>



  </div>
  <!-- End of Main Content -->

  <script>
$(document).ready(function() {

    $("#e_learning_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#eligibility_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#e_consortium_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#sport_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#sports_development_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#career_guidance_counseling_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#university_development_fund").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#promotion_of_indian_cultural_activities_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#teachers_development_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#student_development_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#indian_red_cross_membership_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#women_cell_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#nss_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#university_registration_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#admission_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#processing_fee_paid_at_kea").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#tution_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#college_other_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    function calFeeTotal() {
        var e_learning_fee = parseInt($('#e_learning_fee').val());
        var eligibility_fee = parseInt($('#eligibility_fee').val());
        var e_consortium_fee = parseInt($('#e_consortium_fee').val());
        var sport_fee = parseInt($('#sport_fee').val());
        var sports_development_fee = parseInt($('#sports_development_fee').val());
        var career_guidance_counseling_fee = parseInt($('#career_guidance_counseling_fee').val());
        var university_development_fund = parseInt($('#university_development_fund').val());
        var promotion_of_indian_cultural_activities_fee = parseInt($(
            '#promotion_of_indian_cultural_activities_fee').val());
        var teachers_development_fee = parseInt($('#teachers_development_fee').val());
        var student_development_fee = parseInt($('#student_development_fee').val());
        var indian_red_cross_membership_fee = parseInt($('#indian_red_cross_membership_fee').val());
        var women_cell_fee = parseInt($('#women_cell_fee').val());
        var nss_fee = parseInt($('#nss_fee').val());
        var university_registration_fee = parseInt($('#university_registration_fee').val());


        var total_university_fee = e_learning_fee + eligibility_fee + e_consortium_fee + sport_fee +
            sports_development_fee + career_guidance_counseling_fee + university_development_fund +
            promotion_of_indian_cultural_activities_fee + teachers_development_fee +
            student_development_fee +
            indian_red_cross_membership_fee + women_cell_fee + nss_fee + university_registration_fee

        var admission_fee = parseInt($('#admission_fee').val());
        var processing_fee_paid_at_kea = parseInt($('#processing_fee_paid_at_kea').val());
        var tution_fee = parseInt($('#tution_fee').val());
        var college_other_fee = parseInt($('#college_other_fee').val());

        var total_tution_fee = admission_fee + processing_fee_paid_at_kea + tution_fee + college_other_fee;

        var total_demand = total_tution_fee + total_university_fee;

        $('#total_university_fee').val(total_university_fee);
        $('#total_tution_fee').val(total_tution_fee);
        $('#total_demand').val(total_demand);
    }

});
  </script>