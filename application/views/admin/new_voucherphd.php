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
                                  <div class="col-md-12">


                                      <div class="form-group row">

                                          <label for="staticEmail" class="col-md-4 col-form-label  ">Select All</label>
                                          <div class="col-md-2">
                                              <input type="checkbox" value="0" id="selectAllCheckbox">
                                          </div>


                                      </div>


                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">Fees</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  Final Amount

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  Already Paid

                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  Balance Amount
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">

                                              </label>
                                          </div>

                                      </div>
                                      <hr>

                                     

                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">e
                                              Consortium
                                              Fee</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->e_consortium_fee; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'e_consortium_fee', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->e_consortium_fee - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="e_consortium_fee" id="e_consortium_fee" class="form-control" value="<?php echo (set_value('e_consortium_fee')) ? set_value('e_consortium_fee') : $fee_structure->e_consortium_fee; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'e_consortium_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="e_consortium_fee_checkbox" value="<?php echo (set_value('e_consortium_fee')) ? set_value('e_consortium_fee') : $fee_structure->e_consortium_fee; ?>">
                                          </div>
                                      </div>
                                
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">Career
                                              Guidance fee</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->career_guidance_counseling_fee; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'career_guidance_counseling_fee', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->career_guidance_counseling_fee - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="career_guidance_counseling_fee" id="career_guidance_counseling_fee" class="form-control" value="<?php echo (set_value('career_guidance_counseling_fee')) ? set_value('career_guidance_counseling_fee') : $fee_structure->career_guidance_counseling_fee; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'career_guidance_counseling_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="career_guidance_counseling_fee_checkbox" value="<?php echo (set_value('career_guidance_counseling_fee')) ? set_value('career_guidance_counseling_fee') : $fee_structure->career_guidance_counseling_fee; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">University
                                              Development
                                              fund</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->university_development_fund; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'university_development_fund', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->university_development_fund - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="university_development_fund" id="university_development_fund" class="form-control" value="<?php echo (set_value('university_development_fund')) ? set_value('university_development_fund') : $fee_structure->university_development_fund; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'university_development_fund', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="university_development_fund_checkbox" value="<?php echo (set_value('university_development_fund')) ? set_value('university_development_fund') : $fee_structure->university_development_fund; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">Promotion
                                              of indian
                                              Cultural Activities Fee</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->promotion_of_indian_cultural_activities_fee; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'promotion_of_indian_cultural_activities_fee', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->promotion_of_indian_cultural_activities_fee - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="promotion_of_indian_cultural_activities_fee" id="promotion_of_indian_cultural_activities_fee" class="form-control" value="<?php echo (set_value('promotion_of_indian_cultural_activities_fee')) ? set_value('promotion_of_indian_cultural_activities_fee') : $fee_structure->promotion_of_indian_cultural_activities_fee; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'promotion_of_indian_cultural_activities_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="promotion_of_indian_cultural_activities_fee_checkbox" value="<?php echo (set_value('promotion_of_indian_cultural_activities_fee')) ? set_value('promotion_of_indian_cultural_activities_fee') : $fee_structure->promotion_of_indian_cultural_activities_fee; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">Library
                                              Fee</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->library_fee; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'library_fee', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->library_fee - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="library_fee" id="library_fee" class="form-control" value="<?php echo (set_value('library_fee')) ? set_value('library_fee') : $fee_structure->library_fee; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'library_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="library_fee_checkbox" value="<?php echo (set_value('library_fee')) ? set_value('library_fee') : $fee_structure->library_fee; ?>">
                                          </div>
                                      </div>
                                      
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">
                                              Registration
                                              Fee</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->university_registration_fee; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'university_registration_fee', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->university_registration_fee - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="university_registration_fee" id="university_registration_fee" class="form-control" value="<?php echo (set_value('university_registration_fee')) ? set_value('university_registration_fee') : $fee_structure->university_registration_fee; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'university_registration_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="university_registration_fee_checkbox" value="<?php echo (set_value('university_registration_fee')) ? set_value('university_registration_fee') : $fee_structure->university_registration_fee; ?>">
                                          </div>
                                      </div>


                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-12 col-form-label   font-weight-bold">
                                              <hr />
                                          </label>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">Application Fee & Admission fee
                                              fee</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->admission_fee; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'admission_fee', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->admission_fee - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="admission_fee" id="admission_fee" class="form-control" value="<?php echo (set_value('admission_fee')) ? set_value('admission_fee') : $fee_structure->admission_fee; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'admission_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="admission_fee_checkbox" value="<?php echo (set_value('admission_fee')) ? set_value('admission_fee') : $fee_structure->admission_fee; ?>">
                                          </div>
                                      </div>
                                    
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">Tution
                                              Fee</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->tution_fee; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'tution_fee', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->tution_fee - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="tution_fee" id="tution_fee" class="form-control" value="<?php echo (set_value('tution_fee')) ? set_value('tution_fee') : $fee_structure->tution_fee; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'tution_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="tution_fee_checkbox" value="<?php echo (set_value('tution_fee')) ? set_value('tution_fee') : $fee_structure->tution_fee; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label  ">College
                                              Other Fee</label>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php echo  $fee_structure->college_other_fee; ?>

                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <label for="staticEmail" class="col-form-label  ">
                                                  <?php $paid = $this->admin_model->checkFieldGreaterThanZerovalue($fee_structure->id, 'college_other_fee', $stud_id); ?>
                                                  <?= $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="staticEmail" class="col-form-label  ">

                                                  <?= $fee_structure->college_other_fee - $paid; ?>
                                              </label>
                                          </div>
                                          <div class="col-md-2">
                                              <input type="text" readonly name="college_other_fee" id="college_other_fee" class="form-control" value="<?php echo (set_value('college_other_fee')) ? set_value('college_other_fee') : $fee_structure->college_other_fee; ?>">
                                              <span class="text-danger"></span>
                                          </div>
                                          <div class="col-md-1">
                                              <?php $readonlyvalue = $this->admin_model->checkFieldGreaterThanZero1($fee_structure->id, 'college_other_fee', $stud_id);

                                                if ($readonlyvalue) {
                                                    $readonly = "disabled";
                                                } else {
                                                    $readonly = "";
                                                }

                                                ?>
                                              <input type="checkbox" <?= $readonly; ?> name="fees[]" id="college_other_fee_checkbox" value="<?php echo (set_value('college_other_fee')) ? set_value('college_other_fee') : $fee_structure->college_other_fee; ?>">
                                          </div>
                                      </div>
                               



                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-md-4 col-form-label   font-weight-bold">TOTAL AMOUNT</label>
                                          <div class="col-md-7">
                                              <input type="text" name="final_fee" id="final_fee" class="form-control" value="" readonly>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>
                                      <div class="col-sm-12">

                                          <label class="form-label text-primary">Voucher Type</label>

                                          <div class="form-group  col-sm-12">
                                              <label class="radio-inline mr-3">
                                                  <input type="radio" name="voucher_type" id="voucher_type" value="1"> Cash
                                              </label>
                                              <label class="radio-inline mr-3">
                                                  <input type="radio" name="voucher_type" id="voucher_type" value="2"> Bank DD
                                              </label>
                                              <label class="radio-inline mr-3">
                                                  <input type="radio" name="voucher_type" id="voucher_type" value="5"> DD
                                              </label>
                                              <label class="radio-inline mr-3">
                                                  <input type="radio" name="voucher_type" id="voucher_type" value="4"> Bank Transfer
                                              </label>
                                              <label class="radio-inline mr-3">
                                                  <input type="radio" name="voucher_type" id="voucher_type" value="3"> Online
                                              </label>
                                              <span class="text-danger"><?php echo form_error('voucher_type'); ?></span>
                                          </div>


                                          <div id="dd_details">
                                              <div class="form-group col-md-6 col-sm-12">
                                                  <label class="form-label">DD Date:</label>
                                                  <input type="date" class="form-control" placeholder="Enter Date" id="dd_date" name="dd_date" value="">
                                                  <span class="text-danger"><?php echo form_error('dd_date'); ?></span>
                                              </div>
                                              <div class="form-group col-md-6 col-sm-12">
                                                  <label class="form-label">DD Number:</label>
                                                  <input type="text" class="form-control" placeholder="Enter number" id="dd_number" name="dd_number" value="">
                                                  <span class="text-danger"><?php echo form_error('dd_number'); ?></span>
                                              </div>
                                              <div class="form-group col-md-6 col-sm-12">
                                                  <label class="form-label">Bank Name & Branch:</label>
                                                  <input type="text" class="form-control" placeholder="Enter bank name" id="dd_bank" name="dd_bank" value="">
                                                  <span class="text-danger"><?php echo form_error('dd_bank'); ?></span>
                                              </div>

                                          </div>



                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <?php echo anchor('admin/paymentDetail/' . base64_encode($stud_id), 'BACK', 'class="btn btn-dark btn-square" '); ?>
                                      </div>
                                      <div class="col-md-6  ">
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


          $("#dd_details").hide();


          $('input[type=radio][name=voucher_type]').change(function() {

              if (this.value == "5" || this.value == "2") {

                  $("#dd_details").show();

              } else {
                  $("#dd_details").hide();
              }


          });
          // Function to update final fee based on selected checkboxes
          function updateFinalFee() {
              var sum = 0;
              var corpusFundChecked = false;

              // Iterate over each checkbox that needs to be considered
              $('input[type="checkbox"]').each(function() {
                  if ($(this).prop('checked')) {
                      var inputId = $(this).attr('id').replace('_checkbox', '');
                      $('#' + inputId).removeAttr('readonly');
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
          $('#selectAllCheckbox').change(function() {
              // Check if the master checkbox is checked
              var isChecked = $(this).is(':checked');

              // Select or deselect all checkboxes that are not disabled and not with the ID 'corpus_fund_checkbox'
              $('input[type="checkbox"]:not(:disabled):not(#corpus_fund_checkbox)').prop('checked', isChecked);
          });
          // Attach change event listener to relevant checkboxes
          $('input[type="checkbox"]').change(function() {
              updateFinalFee(); // Update the final fee whenever a checkbox changes
          });
          $('input[type="text"]').change(function() {
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
                  var inputId = $(this).attr('id').replace('_checkbox', '');
                  var inputValue = parseFloat($('#' + inputId).val());
                  // Find the corresponding text field value based on feeValue
                  var textFieldValue = $('#' + feeValue).val();

                  // Prepare data for submission
                  selectedFees.push({
                      name: $(this).attr('id'),
                      value: feeValue,
                      textFieldValue: textFieldValue,
                      newvalue: inputValue
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