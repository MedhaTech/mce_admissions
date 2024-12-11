  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">

              <div class="card">
                  <div class="card-header bg-dark">
                      <h6 class="m-0"><?= $page_title; ?></h6>
                  </div>
                  <div class="card-body">
                  
                  <!-- <?php echo validation_errors(); ?> -->

                      <?php echo form_open_multipart($action, 'class="user"'); ?>

                      <div class="form-row">

                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label for="student_name">Student Full Name (As per SSLC)</label>
                                  <input type="text" name="student_name" id="student_name" class="form-control"
                                      value="<?php echo (set_value('student_name')) ? set_value('student_name') : $student_name; ?>">
                                  <span class="text-danger"><?php echo form_error('student_name'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label for="text">Student Mobile</label>
                                  <input type="number" name="mobile" id="mobile" class="form-control"
                                      value="<?php echo (set_value('mobile')) ? set_value('mobile') : $mobile; ?>">
                                  <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label for="email">Student Email</label>
                                  <input type="text" name="email" id="email" class="form-control"
                                      value="<?php echo (set_value('email')) ? set_value('email') : $email; ?>">
                                  <span class="text-danger"><?php echo form_error('email'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label for="dsc-2">Aadhaar Number </label>
                                  <input type="number" name="aadhaar" id="aadhaar" class="form-control"
                                      value="<?php echo (set_value('aadhaar')) ? set_value('aadhaar') : $aadhaar; ?>">
                                  <span class="text-danger"><?php echo form_error('aadhaar'); ?></span>
                              </div>
                          </div>

                      </div>

                      <div class="form-row">

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="stream">Stream Name</label>
                                    <select name="stream" id="stream" class="form-control">
                                        <option value="">Select Stream</option>
                                        <option value="1" <?php echo set_select('stream', '1'); ?>>BE</option>
                                        <option value="2" <?php echo set_select('stream', '2'); ?>>MTech</option>
                                        <option value="3" <?php echo set_select('stream', '3'); ?>>PhD</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('stream'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Department</label>
                                    <?php 
                                    // Get the selected value for the course
                                    $selected_course = set_value('course');
                                    echo form_dropdown('course', [], $selected_course, 'class="form-control" id="course"'); 
                                    ?>
                                    <span class="text-danger"><?php echo form_error('course'); ?></span>
                                </div>
                            </div>

                          <!-- <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">College Code</label>
                                  <?php
                                    // echo form_dropdown('college_code', $code_options, (set_value('college_code')) ? set_value('college_code') : $college_code, 'class="form-control input-xs" id="college_code"');
                                    ?>
                                  <span class="text-danger"><?php echo form_error('college_code'); ?></span>
                              </div>
                          </div> -->
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Quota </label>
                                  <?php 
                                    echo form_dropdown('quota', $quota_options, (set_value('quota')) ? set_value('quota') : '', 'class="form-control" id="quota" disabled'); ?>
                                  <span class="text-danger"><?php echo form_error('quota'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">College Code</label>
                                  <?php
                                    echo form_dropdown('subquota', $subquota_options, (set_value('subquota')) ? set_value('subquota') : $sub_quota, 'class="form-control input-xs" id="subquota" disabled');
                                    ?>
                                  <span class="text-danger"><?php echo form_error('subquota'); ?></span>
                                  <input type="hidden" name="college_code" id="college_code" class="form-control"
                                      value="<?php echo (set_value('college_code')) ? set_value('college_code') : $college_code; ?>">
                              
                              </div>
                          </div>
                      </div>
                      <div class="form-row">
                          
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Category Claimed</label>
                                  <?php
                                    echo form_dropdown('category_claimed', $category_options, (set_value('category_claimed')) ? set_value('category_claimed') : $category_claimed, 'class="form-control input-xs" id="category_claimed"');
                                    ?>
                                  <span class="text-danger"><?php echo form_error('category_claimed'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">Category Allotted</label>
                                  <?php
                                    echo form_dropdown('category_allotted', $type_options, (set_value('category_allotted')) ? set_value('category_allotted') : $category_allotted, 'class="form-control input-xs" id="category_allotted"');
                                    ?>
                                  <span class="text-danger"><?php echo form_error('category_allotted'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Sports/Cultural Activities<span
                                          class="text-danger">*</span></label>
                                  <?php $sports_options = array(" " => "Select Sports", "District" => "District", "State" => "State", "National" => "National", "International" => "International", "Not Applicable" => "Not Applicable");
                                    echo form_dropdown('sports', $sports_options, (set_value('sports')) ? set_value('sports') : $sports, 'class="form-control input-xs" id="sports"');
                                    ?>
                                  <span class="text-danger"><?php echo form_error('sports'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Activity Name<span
                                          class="text-danger"></span></label>
                                          <input type="text" name="sports_activity" id="sports_activity" class="form-control"
                                      value="<?php echo (set_value('sports_activity')) ? set_value('sports_activity') : $sports_activity; ?>"
                                      placeholder="Enter Sports Activity">
                                  <span class="text-danger"><?php echo form_error('sports_activity'); ?></span>
                              </div>
                          </div>
                      </div>

                        <div class="form-row">
                            <!-- Batch Field -->
                            <!-- <div id="batchRow" class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="batch">Batch(pass out year)</label>
                                    <input type="text" name="batch" id="batch" class="form-control" 
                                        value="<?php echo (set_value('batch')) ? set_value('batch') : $batch; ?>">
                                    <span class="text-danger"><?php echo form_error('batch'); ?></span>
                                </div>
                            </div> -->

                            <!-- Admission Based on Level Field -->
                            <div id="batchRow" class="col-md-3 col-sm-12">
                                <div class="form-group">
                                <label class="label">Admission Based On<span class="text-danger">*</span></label>
                                    <?php $level_options = array(" " => "Select Level", "MTech" => "MTech", "M.Sc" => "M.Sc", "M.ScEngg" => "M.ScEngg");
                                    echo form_dropdown('admission_based', $level_options, (set_value('admission_based')) ? set_value('admission_based') : $admission_based, 'class="form-control " id="admission_based"');
                                    ?>
                                    <span class="text-danger"><?php echo form_error('admission_based'); ?></span>
                                </div>
                            </div>

                            <!-- Degree Level Field -->
                            <div id="degreeLevelRow" class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="degree_level">Degree Level</label>
                                    <input type="text" name="degree_level" id="degree_level" class="form-control"
                                        value="<?php echo (set_value('degree_level')) ? set_value('degree_level') : $degree_level; ?>">
                                    <span class="text-danger"><?php echo form_error('degree_level'); ?></span>
                                </div>
                            </div>
                        </div>

                      <div class="form-row">
                          <div id="entrancetype" class="form-group col-md-4 col-sm-12">
                              <label class="label">Entrance Type<span class="text-danger">*</span></label>
                              <?php $entrance_options = array(" " => "Select Entrance type", "CET" => "CET", "COMED-K" => "COMED-K", "GOI " => "GOI ", "J&K" => "J&K");
                                echo form_dropdown('entrance_type', $entrance_options, (set_value('entrance_type')) ? set_value('entrance_type') : $entrance_type, 'class="form-control" id="entrance_type"');
                                ?>
                              <span class="text-danger"><?php echo form_error('entrance_type'); ?></span>
                          </div>
                          <!-- <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Entrance Registration Number<span
                                          class="text-danger">*</span></label>
                                  <input type="text" name="entrance_reg_no" id="entrance_reg_no" class="form-control"
                                      value="<?php echo (set_value('entrance_reg_no')) ? set_value('entrance_reg_no') : $entrance_reg_no; ?>"
                                      placeholder="Enter Entrance Registration Number">
                                  <span class="text-danger"><?php echo form_error('entrance_reg_no'); ?></span>
                              </div>
                          </div> -->
                          <div id="orderno"class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Admission Order No<span class="text-danger">*</span></label>
                                  <input type="text" name="admission_order_no" id="admission_order_no"
                                      class="form-control"
                                      value="<?php echo (set_value('admission_order_no')) ? set_value('admission_order_no') : $admission_order_no; ?>"
                                      placeholder="Enter Admission Order No">
                                  <span class="text-danger"><?php echo form_error('admission_order_no'); ?></span>
                              </div>
                          </div>
                          <div id="rank" class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Entrance Exam Rank<span class="text-danger">*</span></label>
                                  <input type="number" name="entrance_rank" id="entrance_rank" class="form-control"
                                      value="<?php echo (set_value('entrance_rank')) ? set_value('entrance_rank') : $entrance_rank; ?>"
                                      placeholder="Enter Entrance Exam Rank">
                                  <span class="text-danger"><?php echo form_error('entrance_rank'); ?></span>
                              </div>
                          </div>
                      </div>

                      <div class="form-row">
                           <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Entrance Registration Number<span
                                          class="text-danger">*</span></label>
                                  <input type="text" name="entrance_reg_no" id="entrance_reg_no" class="form-control"
                                      value="<?php echo (set_value('entrance_reg_no')) ? set_value('entrance_reg_no') : $entrance_reg_no; ?>"
                                      placeholder="Enter Entrance Registration Number">
                                  <span class="text-danger"><?php echo form_error('entrance_reg_no'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Admission Order Date<span class="text-danger">*</span></label>

                                  <input type="date" name="admission_order_date" id="admission_order_date"
                                      class="form-control"
                                      value="<?php echo (set_value('admission_order_date')) ? set_value('admission_order_date') : $admission_order_date; ?>"
                                      placeholder="Enter Admission Order Date">
                                  <span class="text-danger"><?php echo form_error('admission_order_date'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Fees Paid<span class="text-danger">*</span></label>
                                  <input type="number" name="fees_paid" id="fees_paid" class="form-control"
                                      value="<?php echo (set_value('fees_paid')) ? set_value('fees_paid') : $fees_paid; ?>"
                                      placeholder="Enter Fees Paid">
                                  <span class="text-danger"><?php echo form_error('fees_paid'); ?></span>
                              </div>
                          </div>
                      </div>

                      <div class="form-row">
                          <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Fees Receipt No<span class="text-danger">*</span></label>
                                  <input type="text" name="fees_receipt_no" id="fees_receipt_no" class="form-control"
                                      value="<?php echo (set_value('fees_receipt_no')) ? set_value('fees_receipt_no') : $fees_receipt_no; ?>"
                                      placeholder="Enter Fees Receipt No">
                                  <span class="text-danger"><?php echo form_error('fees_receipt_no'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Fees Receipt Date<span class="text-danger">*</span></label>
                                  <input type="date" name="fees_receipt_date" id="fees_receipt_date"
                                      class="form-control"
                                      value="<?php echo (set_value('fees_receipt_date')) ? set_value('fees_receipt_date') : $fees_receipt_date; ?>"
                                      placeholder="Enter Fees Receipt Date">
                                  <span class="text-danger"><?php echo form_error('fees_receipt_date'); ?></span>
                              </div>
                          </div>
                      </div><br>
                      <div class="form-row">
                          <div class="col">
                              <div class="form-group">
                                  <label class="form-label">University Fee</label>
                                  <input type="text" class="form-control" id="total_university_fee"
                                      name="total_university_fee" placeholder="Total College fee"
                                      value="<?php echo (set_value('total_university_fee')) ? set_value('total_university_fee') : $total_university_fee; ?>"
                                      readonly>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-group">
                                  <label class="form-label">Corpus Fund</label>
                                  <input type="text" class="form-control" id="corpus_fee" name="corpus_fee"
                                      placeholder="Corpus Fee"
                                      value="<?php echo (set_value('corpus_fee')) ? set_value('corpus_fee') : $corpus_fee; ?>"
                                      readonly>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-group">
                                  <label class="form-label">Tution Fee</label>
                                  <input type="text" class="form-control" id="total_tution_fee" name="total_tution_fee"
                                      placeholder="Finalised Fee"
                                      value="<?php echo (set_value('total_tution_fee')) ? set_value('total_tution_fee') : $total_tution_fee; ?>"
                                      readonly>
                              </div>
                          </div>



                      </div>

                      <div class="form-row">

                          <!-- <div class="col">
                              <div class="form-group">
                                  <label class="form-label">Concession Type</label>
                                  <?php $concession_type_options = array("" => "Select", "Sports Quota" => "Sports Quota", "Management Quota" => "Management Quota");
                                    echo form_dropdown('concession_type', $concession_type_options, (set_value('concession_type')) ? set_value('concession_type') : $concession_type, 'class="form-control input-xs" id="concession_type"'); ?>

                              </div>
                          </div> -->
                          <!-- <div class="col">
                              <div class="form-group">
                                  <label class="form-label">Concession Amount (if any)</label> -->
                                  <input type="hidden" class="form-control" id="concession_fee" name="concession_fee"
                                      placeholder="Enter Concession Fee"
                                      value="<?php echo (set_value('concession_fee')) ? set_value('concession_fee') : $concession_fee; ?>">
                              <!-- </div>
                          </div> -->
                       

                      </div>

                      <div class="form-row">
                      <div class="col">
                              <div class="form-group">
                                  <label class="form-label">College Fee</label>
                                  <input type="text" class="form-control" id="total_college_fee"
                                      name="total_college_fee" placeholder="Payable Fee"
                                      value="<?php echo (set_value('total_college_fee')) ? set_value('total_college_fee') : $total_college_fee; ?>"
                                      readonly>
                              </div>
                          </div>

                          <div class="col">
                              <div class="form-group">
                                  <label class="form-label">Remarks</label>
                                  <input type="text" class="form-control" id="remarks" name="remarks"
                                      placeholder="Enter remarks">
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-group">
                                  <label class="form-label">Final Fee</label>
                                  <input type="text" class="form-control" id="final_amount" name="final_amount"
                                      placeholder="Payable Fee"
                                      value="<?php echo (set_value('final_amount')) ? set_value('final_amount') : $final_amount; ?>"
                                      readonly>
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


});
  </script>
  <script>
$(document).ready(function() {
    var base_url = '<?php echo base_url(); ?>';

    $('#update_comments').prop("disabled", true);
    $('#insert').prop("disabled", true);
    // $('#insert_block').prop("disabled", true);


    $("#course").change(function() {
        event.preventDefault();

        var course = $("#course").val();
        var stream = $("#stream").val();
        $('#subquota').prop("disabled", true);
        if (course == ' ') {
            alert("Please Select Course");
            $('#quota').prop("disabled", false);
            $('#subquota').prop("disabled", true);
        } else {
            $.ajax({
                'type': 'POST',
                'url': base_url + 'admin/quotaDropdown',
                'data': {
                    
                    'course':course,
                    'stream':stream,
                    'flag': 'S'
                },
                'dataType': 'text',
                'cache': false,
                'success': function(data) {
                    $('select[name="quota"]').empty();
                    $('select[name="quota"]').append(data);
                    $('select[name="quota"]').removeAttr("disabled");

                }
            });
            $('#subquota').prop("disabled", true);
        }

        // if (course != " ") {
        //     $('#quota').val(' ');
        //     $('#subquota').val(' ');
        //     $('#quota').prop("disabled", false);
        // } else {
        //     $('#quota').val(' ');
        //     $('#quota').prop("disabled", true);
        //     $('#subquota').val(' ');
        //     $('#subquota').prop("disabled", true);
        // }
       
    });

    $("#quota").change(function() {
        event.preventDefault();

        var course = $("#course").val();
        var quota = $("#quota").val();
        var stream = $("#stream").val();
        // alert(quota);die;

        if (quota == ' ') {
            alert("Please Select Quota");
        } else {
            $.ajax({
                'type': 'POST',
                'url': base_url + 'admin/subquotaDropdown',
                'data': {
                    'quota': quota,
                    'course':course,
                    'flag': 'S',
                    'stream': stream
                },
                'dataType': 'text',
                'cache': false,
                'success': function(data) {
                    $('select[name="subquota"]').empty();
                    $('select[name="subquota"]').append(data);
                    $('select[name="subquota"]').removeAttr("disabled");

                }
            });

        }
    });




    $("#subquota").change(function() {
        event.preventDefault();
        var course = $("#course").val();
        var subquota = $("#subquota").val();
        var quota = $("#quota").val();
        var stream = $("#stream").val();

        if (subquota != "" && quota != '') {
            var page = base_url + 'admin/getFee';
            $.ajax({
                'type': 'POST',
                'url': page,
                'data': {
                    'course': course,
                    'quota': quota,
                    'subquota': subquota,
                    'stream': stream
                },
                'dataType': 'json',
                'cache': false,
                'success': function(data) {

                    $('#total_university_fee').val(data.total_university_fee);
                    var total_university_fee = data.total_university_fee;
                    $('#corpus_fee').val(data.corpus_fund);
                    var corpus = data.corpus_fund;
                    $('#total_tution_fee').val(data.total_tution_fee);
                    var total_tution_fee = data.total_tution_fee;



                    var total_college_fee = collegeAmount();
                    $('#total_college_fee').val(collegeAmount);
                    var final_amount = finalAmount();
                    $('#final_amount').val(finalAmount);
                }
            });
            var selectedText = $(this).find('option:selected').text();
                
                // Extract the part before the dash
                var textBeforeDash = selectedText.split('-')[0].trim();
                
                // Update the hidden field
                $('#college_code').val(textBeforeDash);
        }
    });

    $("#concession_fee").change(function() {
        event.preventDefault();
        var final_amount = finalAmount();
        $('#final_amount').val(finalAmount);
        var total_college_fee = collegeAmount();
        $('#total_college_fee').val(collegeAmount);
    });
    $("#corpus_fee").change(function() {
        event.preventDefault();
        var final_amount = finalAmount();
        $('#final_amount').val(finalAmount);
    });

    function finalAmount() {
        var total_university_fee = $("#total_university_fee").val();
        var total_tution_fee = $("#total_tution_fee").val();
        var concession_fee = $("#concession_fee").val();
        var corpus = $("#corpus_fee").val();

        if (concession_fee == '') {
            var concession_fee = 0;
        }

        var total_college_fee = parseInt(total_university_fee) + parseInt(total_tution_fee) - parseInt(
            concession_fee);


        var final_amount = parseInt(total_college_fee) + parseInt(corpus);
        return final_amount;
    }

    function collegeAmount() {
        var total_university_fee = $("#total_university_fee").val();
        var total_tution_fee = $("#total_tution_fee").val();
        var concession_fee = $("#concession_fee").val();
        if (concession_fee == '') {
            var concession_fee = 0;
        }


        var total_college_fee = parseInt(total_university_fee) + parseInt(total_tution_fee) - parseInt(
            concession_fee);

        return total_college_fee;
    }



    $("#admit_student").click(function() {
        event.preventDefault();
        $('#student_modal').modal('show');
    });

    $("#block_student").click(function() {
        event.preventDefault();
        $('#block_modal').modal('show');
    });

    $('#final_amount').keypress(function(e) {
        var a = [];
        var k = e.which;

        for (i = 48; i < 58; i++)
            a.push(i);

        if (!(a.indexOf(k) >= 0)) {
            e.preventDefault();
            $(".error").css("display", "inline");
        } else {
            $(".error").css("display", "none");
        }

        setTimeout(function() {
            $('.error').fadeOut('slow');
        }, 2000);

    });



    // $("#subquota").change(function() {

    //     if (this.value.length >= 1) {
    //         $('#insert').prop("disabled", false);
    //     } else {
    //         $('#insert').prop("disabled", true);
    //     }
    // });
    






});
  </script>

  <script>

        $(document).ready(function(){
        $('#stream').change(function(){
            var stream_id = $(this).val();
            if (stream_id != '') {
                $.ajax({
                    url: "<?php echo base_url('admin/getDepartmentsByStream'); ?>",  // Replace with actual URL
                    method: "POST",
                    data: {stream_id: stream_id},
                    dataType: "json",
                    success: function(data) {
                        var departmentOptions = '<option value="">Select Department</option>';
                        $.each(data, function(index, department){
                            departmentOptions += '<option value="'+department.department_id+'">'+department.department_name+'</option>';
                        });
                        $('#course').html(departmentOptions);  // Updated to '#course'
                    }
                });
            } else {
                $('#course').html('<option value="">Select Department</option>');  // Updated to '#course'
            }
        });
    });


    // Hide the Batch and Degree Level fields by default
    $('#batchRow, #degreeLevelRow').hide();

    // Show/Hide Batch and Degree Level based on the selected stream
    $('#stream').change(function() {
        var stream_id = $(this).val();

        if (stream_id == '3') {
            // Show Batch and Degree Level fields for PhD
            $('#batchRow, #degreeLevelRow').show();
        } else {
            // Hide Batch and Degree Level fields for other streams
            $('#batchRow, #degreeLevelRow').hide();
        }
    });

        // Hide the Batch and Degree Level fields by default
        $('#entrancetype, #rank, #orderno').show();

        // Show/Hide Batch and Degree Level based on the selected stream
        $('#stream').change(function() {
            var stream_id = $(this).val();

            if (stream_id == '3') {
                // Show Batch and Degree Level fields for PhD
                $('#entrancetype, #rank, #orderno').hide();
            } else {
                // Hide Batch and Degree Level fields for other streams
                $('#entrancetype, #rank, #orderno').show();
            }
        });

    // Trigger change event on page load to apply the correct initial visibility
    $('#stream').trigger('change');

  </script>