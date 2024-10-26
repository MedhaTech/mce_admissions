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
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Career
                                              Guidance Fee</label>
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
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="university_development_fund"
                                                  id="university_development_fund" class="form-control"
                                                  value="<?php echo (set_value('university_development_fund'))?set_value('university_development_fund'):$fee_structure['university_development_fund'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Cultural Activities Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="promotion_of_indian_cultural_activities_fee"
                                                  id="promotion_of_indian_cultural_activities_fee" class="form-control"
                                                  value="<?php echo (set_value('promotion_of_indian_cultural_activities_fee'))?set_value('promotion_of_indian_cultural_activities_fee'):$fee_structure['promotion_of_indian_cultural_activities_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Library
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="library_fee"
                                                  id="library_fee" class="form-control"
                                                  value="<?php echo (set_value('library_fee'))?set_value('library_fee'):$fee_structure['library_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                 
                                  
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">                                              Registration
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="university_registration_fee"
                                                  id="university_registration_fee" class="form-control"
                                                  value="<?php echo (set_value('university_registration_fee'))?set_value('university_registration_fee'):$fee_structure['university_registration_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Application Fee & Admission
                                              fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="admission_fee" id="admission_fee"
                                                  class="form-control"
                                                  value="<?php echo (set_value('admission_fee'))?set_value('admission_fee'):$fee_structure['admission_fee'];?>">
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
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">Tution
                                              Fee</label>
                                          <div class="col-md-7">
                                              <input type="text" name="tution_fee" id="tution_fee" class="form-control"
                                                  value="<?php echo (set_value('tution_fee'))?set_value('tution_fee'):$fee_structure['tution_fee'];?>">
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-5 col-form-label text-right">College
                                              Other Fee</label>
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
                                              class="col-md-5 col-form-label text-right font-weight-bold">OVERALL FINAL
                                              FEE</label>
                                          <div class="col-md-7">
                                              <input type="text" name="final_fee" id="final_fee" class="form-control"
                                                  value="<?php echo (set_value('final_fee'))?set_value('final_fee'):$fee_structure['final_fee'];?>"
                                                  readonly>
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
                                          <button type="submit" class="btn btn-info btn-square" name="Update"
                                              id="Update"> UPDATE </button>
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

  

    $("#e_consortium_fee").change(function() {
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

    $("#library_fee").change(function() {
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

    $("#tution_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

    $("#college_other_fee").change(function() {
        event.preventDefault();
        calFeeTotal();
    });

   

    function calFeeTotal() {
       
        var e_consortium_fee = parseInt($('#e_consortium_fee').val());
        var library_fee = parseInt($('#library_fee').val());
      
        var career_guidance_counseling_fee = parseInt($('#career_guidance_counseling_fee').val());
        var university_development_fund = parseInt($('#university_development_fund').val());
        var promotion_of_indian_cultural_activities_fee = parseInt($(
            '#promotion_of_indian_cultural_activities_fee').val());
        var tution_fee = parseInt($('#tution_fee').val());
        var university_registration_fee = parseInt($('#university_registration_fee').val());
        var admission_fee = parseInt($('#admission_fee').val());
        var total_university_fee =  e_consortium_fee + library_fee +career_guidance_counseling_fee + university_development_fund +
            promotion_of_indian_cultural_activities_fee +  university_registration_fee + admission_fee;

      
      
        var college_other_fee = parseInt($('#college_other_fee').val());
       

        var total_tution_fee =  college_other_fee + tution_fee ;

      

        var final_fee = total_tution_fee + total_university_fee;

        $('#total_university_fee').val(total_university_fee);
        $('#total_tution_fee').val(total_tution_fee);
       
        $('#final_fee').val(final_fee);
    }

});
  </script>