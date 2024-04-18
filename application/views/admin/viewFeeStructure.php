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
                                      <?=$page_title;?>
                                  </h3>
                              </div>
                              <?php echo form_open('admin/editFeeStructure/' . $fee_structure['id'],'class="user" enctype="multipart/form-data"'); ?>
                              <div class="card-body">
                                  <!-- <?php echo form_open_multipart($action, 'class="user"'); ?> -->
                                  <div class="col-md-8 offset-1">
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right">Department</label>
                                          <div class="col-md-7">
                                              <?php 
                                                if($fee_structure['department_id']){
                                                    $dept1 = $this->admin_model->getDetailsbyfield($fee_structure['department_id'],'department_id','departments')->row();
                                                    $dept_name = $dept1->department_name;
                                                }else{
                                                    $dept_name = "All Departments";
                                                }
                                            ?>
                                              <input type="text" name="department" id="department" class="form-control"
                                                  value="<?php echo (set_value('department'))?set_value('department'):$dept_name;?>"
                                                  readonly>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right">Quota</label>
                                          <div class="col-md-7">
                                              <input type="text" name="quota" id="quota" class="form-control"
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
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">E
                                              Learning
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('e_learning_fee'))?set_value('e_learning_fee'):$fee_structure['e_learning_fee'];?>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Eligibility
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('eligibility_fee'))?set_value('eligibility_fee'):$fee_structure['eligibility_fee'];?>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">e
                                              Consortium
                                              Fee :</label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('e_consortium_fee'))?set_value('e_consortium_fee'):$fee_structure['e_consortium_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Sport
                                              Fee :</label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('sport_fee'))?set_value('sport_fee'):$fee_structure['sport_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Sports
                                              Development
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('sports_development_fee'))?set_value('sports_development_fee'):$fee_structure['sports_development_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Career
                                              Guidance &
                                              Counseling Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('career_guidance_counseling_fee'))?set_value('career_guidance_counseling_fee'):$fee_structure['career_guidance_counseling_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">University
                                              Development
                                              Fund : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('university_development_fund'))?set_value('university_development_fund'):$fee_structure['university_development_fund'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Promotion
                                              of indian
                                              Cultural Activities Fee :</label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('promotion_of_indian_cultural_activities_fee'))?set_value('promotion_of_indian_cultural_activities_fee'):$fee_structure['promotion_of_indian_cultural_activities_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Teachers
                                              Development
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('teachers_development_fee'))?set_value('teachers_development_fee'):$fee_structure['teachers_development_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Student
                                              Development
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('student_development_fee'))?set_value('student_development_fee'):$fee_structure['student_development_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Indian
                                              Red Cross
                                              Membership Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('indian_red_cross_membership_fee'))?set_value('indian_red_cross_membership_fee'):$fee_structure['indian_red_cross_membership_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Women
                                              Cell
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('women_cell_fee'))?set_value('women_cell_fee'):$fee_structure['women_cell_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">NSS
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('nss_fee'))?set_value('nss_fee'):$fee_structure['nss_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">University
                                              Registration
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('university_registration_fee'))?set_value('university_registration_fee'):$fee_structure['university_registration_fee'];?>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">TOTAL
                                              UNIVERSITY FEE : </label>
                                          <div class="col-md-7 col-form-label font-weight-bold">
                                              <?php echo (set_value('total_university_fee'))?set_value('total_university_fee'):number_format($fee_structure['total_university_fee']);?>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-12 col-form-label text-right font-weight-bold">
                                              <hr />
                                          </label>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Admission
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('admission_fee'))?set_value('admission_fee'):$fee_structure['admission_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Processing
                                              Fee paid
                                              at
                                              KEA : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('processing_fee_paid_at_kea'))?set_value('processing_fee_paid_at_kea'):$fee_structure['processing_fee_paid_at_kea'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">Tution
                                              Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('tution_fee'))?set_value('tution_fee'):$fee_structure['tution_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label font-weight-normal text-right">College
                                              Other Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('college_other_fee'))?set_value('college_other_fee'):$fee_structure['college_other_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-normal">Skill
                                              Development Fee : </label>
                                          <div class="col-md-7 col-form-label">
                                              <?php echo (set_value('skill_development_fee'))?set_value('skill_development_fee'):$fee_structure['skill_development_fee'];?>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">TOTAL
                                              TUTION FEE : </label>
                                          <div class="col-md-7 col-form-label font-weight-bold">
                                              <?php echo (set_value('total_tution_fee'))?set_value('total_tution_fee'):number_format($fee_structure['total_tution_fee']);?>
                                          </div>
                                      </div>

                                      <hr />

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">TOTAL COLLEGE
                                              FEE : </label>
                                          <div class="col-md-7 col-form-label font-weight-bold">
                                              <?php echo (set_value('total_college_fee'))?set_value('total_college_fee'):number_format($fee_structure['total_college_fee']);?>
                                          </div>
                                      </div>
                                      <hr />

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">CORPUS
                                              FUND : </label>
                                          <div class="col-md-7 col-form-label font-weight-bold">
                                              <?php echo (set_value('corpus_fund'))?set_value('corpus_fund'):number_format($fee_structure['corpus_fund']);?>
                                          </div>
                                      </div>
                                      <hr />

                                      <div class="form-group row">
                                          <label for="staticEmail"
                                              class="col-md-5 col-form-label text-right font-weight-bold">OVERALL FINAL
                                              FEE : </label>
                                          <div class="col-md-7 col-form-label font-weight-bold">
                                              <?php echo (set_value('final_fee'))?set_value('final_fee'):number_format($fee_structure['final_fee'],0);?>
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

    $("#skill_development_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#corpus_fund").change(function() {
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
        var skill_development_fee = parseInt($('#skill_development_fee').val());

        var corpus_fund = parseInt($('#corpus_fund').val());

        var total_tution_fee = admission_fee + processing_fee_paid_at_kea + tution_fee + college_other_fee +
            skill_development_fee;

        var total_college_fee = total_tution_fee + total_university_fee;

        var final_fee = total_college_fee + corpus_fund;

        $('#total_university_fee').val(total_university_fee);
        $('#total_tution_fee').val(total_tution_fee);
        $('#total_college_fee').val(total_college_fee);
        $('#final_fee').val(final_fee);
    }

});
  </script>