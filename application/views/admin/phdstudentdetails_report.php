  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="card card-info shadow">
                  <div class="card-header">
                      <h3 class="card-title">
                          <?= $page_title; ?>
                      </h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                  <!-- <button class="btn btn-danger btn-sm" id="get_details" type="submit">Download</button> -->
                                  <?php echo anchor('admin/reports', '<span class="icon"><i class="fas fa-arrow-left"></i></span> <span class="text">Back to List</span>', 'class="btn btn-secondary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
                              </li>
                              <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
              
                      <?php echo form_open_multipart($action, 'class="user" id="enquiry_list"'); ?>

                      <div class="form-row">

                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">

                                  <label class="label font-13">Course<span class="text-danger">*</span></label>
                                  <?php
                                    echo form_dropdown('course', $course_options, (set_value('course')) ? set_value('course') : $course, 'class="form-control form-control" id="course"');
                                    ?>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label font-13">Admission Status<span class="text-danger">*</span></label>
                                  <?php echo form_dropdown('admission_status', $admissionStatus, (set_value('admission_status')) ? set_value('admission_status') : $admission_status, 'class="form-control" id="status"'); ?>
                                  <span class="text-danger"><?php echo form_error('admission_status'); ?></span>
                              </div>
                          </div>
                      </div>
                    


                      <div class="form-row">
                          <label class="col-md-12 text-bold">Select Fields </label>

                <?php  ?>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]" value="date_place_of_birth"  <?php echo in_array('date_place_of_birth', $selected_values) ? 'checked' : ''; ?>> Date and Place of Birth </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('caste_category', $selected_values) ? 'checked' : ''; ?> value="caste_category"> Caste and Category </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('nationality', $selected_values) ? 'checked' : ''; ?> value="nationality"> Nationality </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('religion', $selected_values) ? 'checked' : ''; ?> value="religion"> Religion </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('aadhar', $selected_values) ? 'checked' : ''; ?> value="aadhar"> Aadhar </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('current_address', $selected_values) ? 'checked' : ''; ?> value="current_address"> Current Address </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('present_address', $selected_values) ? 'checked' : ''; ?> value="present_address"> Present Address </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('father_details', $selected_values) ? 'checked' : ''; ?> value="father_details"> Father Details </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('mother_details', $selected_values) ? 'checked' : ''; ?> value="mother_details"> Mother Details </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('guardian_details', $selected_values) ? 'checked' : ''; ?> value="guardian_details"> Guardian Details </label>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('previous_exam_details', $selected_values) ? 'checked' : ''; ?> value="previous_exam_details"> Previous Exam Details </label>
                              </div>
                          </div>
                          <!--<div class="col-md-3">-->
                          <!--	<div class="checkbox">-->
                          <!--		<label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('date_place_of_birth', $selected_values) ? 'checked' : ''; ?> value="fee_payment_details">  Fee Payment Details </label>-->
                          <!--	</div>-->
                          <!--</div>-->
                          <div class="col-md-3">
                              <div class="checkbox">
                                  <label> <input type="checkbox" id="selectedValues" name="selectedValues[]"  <?php echo in_array('other_details', $selected_values) ? 'checked' : ''; ?> value="other_details"> Other Details </label>
                              </div>
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-sm-2"> &nbsp;</div>
                          <div class="col-sm-10 text-right">
                              <button type="submit" class="btn btn-danger btn-sm" name="download" id="get_details"><i class="fas fa-download"></i> Download </button>
                              <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i class="fas fa-edit"></i> Filter </button>
                          </div>
                      </div>

                      </form>
                      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <?php
                            echo $admissions;
                            ?>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>

  <script>
      $(document).ready(function() {
          var base_url = '<?php echo base_url(); ?>';


          $("#get_details").click(function() {
              event.preventDefault();

              var form = $("#enquiry_list");
              var course = $("#course").val();
              var status = $("#status").val();

              $("#get_details").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Downloading...');
              $("#get_details").prop('disabled', true);

              //$("#res").hide();
              //$("#process").show();



              $.ajax({
                  'type': 'POST',
                  'url': base_url + 'admin/phdstudentdetails_report/1',
                  data: form.serialize(),
                  'dataType': 'json',
                  'cache': false,
                  'success': function(data) {
                      var filename = "Student Detail Report.xls";
                      var $a = $("<a>");
                      $a.attr("href", data.file);
                      $("body").append($a);
                      $a.attr("download", filename);
                      $a[0].click();
                      $a.remove();
                      $("#get_details").html('Download');
                      $("#get_details").prop('disabled', false);
                  }
              });

          });


      });
  </script>