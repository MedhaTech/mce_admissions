  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $page_title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="col-md-6 text-left">
            <span class="badge badge-<?= $enquiryStatusColor[$enquiryDetails->status]; ?>"><?= $enquiryStatus[$enquiryDetails->status]; ?></span>
            <h1 class="h4 mb-0 text-gray-800"><?= $enquiryDetails->student_name . ' Details'; ?></h1>
          </div>
          <div class="col-md-6 text-right">
            <?php if ($enquiryDetails->status != 6) { ?>
              <?php if ($user_type != 5) { ?>
                <button class="btn btn-info btn-sm btn-icon-split" id="admit_student" name="admit_student">
                  <span class="icon text-white-50">
                    <i class="fas fa-user"></i>
                  </span>
                  <span class="text">Admit Student</span>
                </button>
              <?php } ?>
              <?php echo anchor('admin/editEnquiry/' . $enquiryDetails->id, '<span class="icon"><i class="fas fa-edit"></i></span><span class="text">Edit</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
            <?php } ?>
            <?php echo anchor('admin/enquiries', '<span class="icon"><i class="fas fa-arrow-left"></i></span><span class="text">Back to List</span>', 'class="btn btn-secondary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
          </div>
        </div>

        <?php if ($this->session->flashdata('message')) { ?>
          <div align="center" class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
            <?php echo $this->session->flashdata('message') ?>
          </div>
        <?php } ?>

        <div class="card mb-4 border-top-<?= $enquiryStatusColor[$enquiryDetails->status]; ?>">
          <div class="card-body">
            <table class="table">
              <tr>
                <th width="20%">Applicant Name</th>
                <td width="80%"><?= $enquiryDetails->student_name; ?></td>
              </tr>
             
              <tr>
                <th>Mobile</th>
                <td><?= $enquiryDetails->mobile; ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?= $enquiryDetails->email; ?></td>
              </tr>
              <tr>
                <th>Course</th>
                <td><?= $enquiryDetails->course; ?></td>
              </tr>
              <tr>
                <th>State</th>
                <td><?= $enquiryDetails->state; ?></td>
              </tr>
              <tr>
                <th>City</th>
                <td><?= $enquiryDetails->city; ?></td>
              </tr>
              <tr>
                <th>Exam Board</th>
                <td><?= $enquiryDetails->exam_board; ?></td>
              </tr>
              <tr>
                <th>Register Number</th>
                <td><?= $enquiryDetails->register_number; ?></td>
              </tr>
            </table>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <?php echo 'By : ' . $enquiryDetails->reg_by; ?>
              </div>
              <div class="col-md-6 text-right">
                <?php echo 'Reg. Date : ' . date('d-m-Y h:i A', strtotime($enquiryDetails->reg_date)); ?>
              </div>
            </div>
          </div>
        </div>

        <?php
        foreach ($comments as $comments1) {
        ?>
          <div class="card mb-4">
            <div class="card-body">
              <?php echo $comments1->comments; ?>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-6">
                  <?php echo 'By : ' . $comments1->given_by; ?>
                </div>
                <div class="col-md-6 text-right">
                  <?php echo 'On : ' . date('d-m-Y h:i A', strtotime($comments1->given_on)); ?>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

        <?php
        if ($enquiryDetails->status != 6) {
        ?>
          <div class="card mb-4">
            <div class="card-body">
              <?php echo form_open('admin/updateComments/' . $enquiryDetails->id, 'class="user"'); ?>

              <div class="form-group row">
                <div class="col-sm-12">
                  <textarea class="form-control" name="comments" id="comments" placeholder="Enter update/comments here.." rows="5"></textarea>
                  <span class="text-danger"><?php echo form_error('comments'); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-3">
                  <div class="form-group row">
                    <input type="hidden" name="old_status" id="old_status" value="<?= $enquiryDetails->status; ?>" />
                    <label for="staticEmail" class="col-sm-4 col-form-label text-bold text-right">Status</label>
                    <div class="col-sm-8">
                      <?php
                      unset($enquiryStatus[6]);
                      echo form_dropdown('status', $enquiryStatus, $enquiryDetails->status, 'class="form-control" id="status"'); ?>
                      <span class="text-danger"><?php echo form_error('status'); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-9 text-right">
                  <button type="submit" class="btn btn-danger btn-sm" name="update_comments" id="update_comments"><i class="fas fa-edit"></i> Update</button>
                  <?php echo anchor('admin/enquiries', '<span class="icon"><i class="fas fa-arrow-left"></i></span><span class="text">Back to List</span>', 'class="btn btn-secondary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
                </div>
              </div>

              </form>
            </div>
          </div>
        <?php
        }
        ?>
      </div>

      <div class="modal fade" id="student_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content tx-14">
            <div class="modal-header">
              <h6 class="modal-title text-bold" id="exampleModalLabel"> <?= $enquiryDetails->student_name; ?> Details</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" id="insert_form">
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Course</label>
                      <?php echo form_dropdown('course', $course_options, '', 'class="form-control" id="course"'); ?>
                      <span class="text-danger"><?php echo form_error('course'); ?></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">DSC-1 </label>
                      <?php $dsc_options = array("" => "Select");
                      echo form_dropdown('dsc_1', $dsc_options, (set_value('dsc_1')) ? set_value('dsc_1') : '', 'class="form-control" id="dsc_1" disabled'); ?>
                      <span class="text-danger"><?php echo form_error('dsc_1'); ?></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">DSC-2 </label>
                      <?php $dsc_options = array("" => "Select");
                      echo form_dropdown('dsc_2', $dsc_options, (set_value('dsc_2')) ? set_value('dsc_2') : '', 'class="form-control" id="dsc_2" disabled'); ?>
                      <span class="text-danger"><?php echo form_error('dsc_2'); ?></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Type</label>
                      <input type="text" class="form-control" id="aided_unaided" name="aided_unaided" placeholder="" readonly>
                      <?php // $type_options = array(""=>"Select","Aided"=>"Aided","UnAided"=>"UnAided");
                      //    echo form_dropdown('aided_unaided', $type_options, '','class="form-control input-xs" id="aided_unaided"'); 
                      ?>
                      <span class="text-danger"><?php echo form_error('aided_unaided'); ?></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Category</label>
                      <?php $category_options = array("" => "Select", "GM" => "GM", "SC" => "SC", "ST" => "ST", "C-1" => "C-1", "2A" => "2A", "2B" => "2B", "3A" => "3A", "3B" => "3B");
                      echo form_dropdown('category', $category_options, '', 'class="form-control input-xs" id="category" disabled'); ?>
                      <span class="text-danger"><?php echo form_error('category'); ?></span>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-4">
                    <div class="form-group">
                      <label class="form-label">College Fee Amount</label>
                      <input type="text" class="form-control" id="college_fee_total" name="college_fee_total" placeholder="College Fee" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="form-label">Mgt. Fee Amount</label>
                      <input type="text" class="form-control" id="mgt_fee_total" name="mgt_fee_total" placeholder="Mgt. Fee" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="form-label">Proposed Fee Amount</label>
                      <input type="text" class="form-control" id="proposed_amount" name="proposed_amount" placeholder="Enter Proposed Fee" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-4">
                    <div class="form-group">
                      <label class="form-label">Additional Amount (if any)</label>
                      <input type="text" class="form-control" id="additional_amount" name="additional_amount" placeholder="Enter Additional Fee" value="0">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="form-label">Concession Type</label>
                      <?php $concession_type_options = array("" => "Select", "Sports Quota" => "Sports Quota", "Management Quota" => "Management Quota");
                      echo form_dropdown('concession_type', $concession_type_options, '', 'class="form-control input-xs" id="concession_type"'); ?>

                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="form-label">Concession Amount (if any)</label>
                      <input type="text" class="form-control" id="concession_fee" name="concession_fee" placeholder="Enter Concession Fee" value="0">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-label">Finalised Fee</label>
                      <input type="text" class="form-control" id="final_amount" name="final_amount" placeholder="Enter Finalized Fee" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label class="form-label">First Language</label>
                      <?php echo form_dropdown('lang_1', $languages, (set_value('lang_1')) ? set_value('lang_1') : '', 'class="form-control" id="lang_1"'); ?>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label class="form-label">Second Language</label>
                      <?php echo form_dropdown('lang_2', $languages, (set_value('lang_2')) ? set_value('lang_2') : '', 'class="form-control" id="lang_2"'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <button type="button" class="btn btn-secondary btn-sm tx-13" data-dismiss="modal">Close</button>
                  </div>
                  <div class="col text-right">
                    <input type="submit" name="insert" id="insert" value="Admit Student" class="btn btn-danger btn-sm" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(document).ready(function() {
      var base_url = '<?php echo base_url(); ?>';

      $('#update_comments').prop("disabled", true);
      $('#insert').prop("disabled", true);

      $("#course22").change(function() {
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

      $("#course1").change(function() {

        event.preventDefault();
        var course = $("#course").val();
        if (course == "") {
          alert("Please select all fields..!");
        } else {
          var page = base_url + 'admin/getFeeCombination';
          $.ajax({
            'type': 'POST',
            'url': page,
            'data': {
              'course': course
            },
            'dataType': 'json',
            'cache': false,
            'success': function(data) {
              $('select[name="combination"]').empty();
              var mySelect = $('#combination');
              $.each(data, function(val, text) {
                mySelect.append(
                  $('<option></option>').val(val).html(text)
                );
              });
              if (course == "BCOM") {
                mySelect.append(
                  $('<option></option>').val("BCOM UA").html("BCOM UA")
                );
              }
            }
          });
        }
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

      $("#dsc_1").change(function() {
        event.preventDefault();
        checkType();
      });

      $("#dsc_2").change(function() {
        event.preventDefault();
        checkType();
      });


      function checkType() {
        var dsc_1 = $("#dsc_1").val();
        var dsc_2 = $("#dsc_2").val();
        var progType = null;
        $.ajax({
          'type': 'POST',
          'url': base_url + 'admin/checkProgType',
          'data': {
            'dsc_1': dsc_1,
            'dsc_2': dsc_2
          },
          'dataType': 'text',
          'cache': false,
          'success': function(data) {
            // 	console.log(data);
            if (data) {
              $('#aided_unaided').val(data);
              $('#category').val('');
              $('#category').prop("disabled", false);

              $('#proposed_amount').val('');
              $('#additional_amount').val('0');
              $('#concession_fee').val('0');
              $('#concession_type').val('');
              $('#final_amount').val('');
            }
          }
        });
        // 			return progType;
      }

      $("#combination").change(function() {

        event.preventDefault();
        var course = $("#course").val();
        var combination = $("#combination").val();
        var category = $("#category").val();

        var aua = changeAUA(combination);
        $('#aided_unaided').val(aua);

        if (combination == "BCOM UA") {
          combination = "BCOM";
        }

        if (combination != "" && category != '') {
          var page = base_url + 'admin/getFee';
          $.ajax({
            'type': 'POST',
            'url': page,
            'data': {
              'course': course,
              'combination': combination,
              'category': category
            },
            'dataType': 'json',
            'cache': false,
            'success': function(data) {
              $('#proposed_amount').val(data);
              var final_amount = finalAmount();
              $('#final_amount').val(finalAmount);
            }
          });
        }
      });

      function changeAUA(combination) {
        var res = null;

        if (combination == "JPE") res = "UnAided";
        if (combination == "HES") res = "Aided";
        if (combination == "HEK") res = "Aided";
        if (combination == "PES") res = "Aided";
        if (combination == "PCM") res = "Aided";
        if (combination == "CBZ") res = "Aided";
        if (combination == "CZMB") res = "UnAided";
        if (combination == "CBBT") res = "UnAided";
        if (combination == "PCMs") res = "UnAided";
        if (combination == "BCA") res = "UnAided";
        if (combination == "BCA MQ") res = "UnAided";
        if (combination == "BBA") res = "UnAided";
        if (combination == "BCOM") res = "Aided";
        if (combination == "BCOM MQ") res = "UnAided";
        if (combination == "BCOM UA") res = "UnAided";
        if (combination == "RM") res = "UnAided";
        if (combination == "IT") res = "UnAided";

        return res;

      }

      $("#category1").change(function() {
        event.preventDefault();
        var course = $("#course").val();
        var combination = $("#combination").val();
        var category = $("#category").val();

        if (combination == "BCOM UA") {
          combination = "BCOM";
        }

        if (combination != "" && category != '') {
          var page = base_url + 'admin/getFee';
          $.ajax({
            'type': 'POST',
            'url': page,
            'data': {
              'course': course,
              'combination': combination,
              'category': category
            },
            'dataType': 'json',
            'cache': false,
            'success': function(data) {
              $('#proposed_amount').val(data);
              var final_amount = finalAmount();
              $('#final_amount').val(finalAmount);
            }
          });
        }
      });

      $("#category").change(function() {
        event.preventDefault();
        var course = $("#course").val();
        var course_val = $("#course option:selected").text();

        var dsc_1 = $("#dsc_1").val();
        var dsc_1_val = $("#dsc_1 option:selected").text();

        var dsc_2 = $("#dsc_2").val();
        var dsc_2_val = $("#dsc_2 option:selected").text();

        var category = $("#category").val();
        var aided_unaided = $("#aided_unaided").val();

        if (aided_unaided != "" && category != '') {
          var page = base_url + 'admin/getFee';
          $.ajax({
            'type': 'POST',
            'url': page,
            'data': {
              'course': course,
              'course_val': course_val,
              'dsc_1': dsc_1,
              'dsc_2': dsc_2,
              'dsc_1_val': dsc_1_val,
              'dsc_2_val': dsc_2_val,
              'category': category,
              'aided_unaided': aided_unaided
            },
            'dataType': 'json',
            'cache': false,
            'success': function(data) {
              // console.log(data); 
              $('#proposed_amount').val(parseInt(data.total_fee));
              $('#college_fee_total').val(parseInt(data.college_fee_total));
              $('#mgt_fee_total').val(parseInt(data.mgt_fee_total));
              var final_amount = finalAmount();
              $('#final_amount').val(finalAmount);
            }
          });
        }
      });

      $("#additional_amount").change(function() {
        event.preventDefault();
        var final_amount = finalAmount();
        $('#final_amount').val(finalAmount);
      });

      $("#concession_fee").change(function() {
        event.preventDefault();
        var final_amount = finalAmount();
        $('#final_amount').val(finalAmount);
      });

      function finalAmount() {
        var proposed_amount = $("#proposed_amount").val();
        var additional_amount = $("#additional_amount").val();
        var concession_fee = $("#concession_fee").val();
        var final_amount = parseInt(proposed_amount) + parseInt(additional_amount) - parseInt(concession_fee);
        return final_amount;
      }

      $('#comments').on('keyup', function() {
        if (this.value.length >= 5) {
          $('#update_comments').prop("disabled", false);
        } else {
          $('#update_comments').prop("disabled", true);
        }
      });

      $("#admit_student").click(function() {
        event.preventDefault();
        $('#student_modal').modal('show');
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



      $('#final_amount').on('keyup', function() {

        if (this.value.length >= 3) {
          $('#insert').prop("disabled", false);
        } else {
          $('#insert').prop("disabled", true);
        }
      });

      $("#insert").click(function() {
        event.preventDefault();
        var id = '<?php echo $enquiryDetails->id; ?>';

        var course = $("#course").val();
        var course_val = $("#course option:selected").text();

        var dsc_1 = $("#dsc_1").val();
        var dsc_1_val = $("#dsc_1 option:selected").text();

        var dsc_2 = $("#dsc_2").val();
        var dsc_2_val = $("#dsc_2 option:selected").text();

        var category = $("#category").val();
        var aided_unaided = $("#aided_unaided").val();

        var college_fee_total = $("#college_fee_total").val();
        var mgt_fee_total = $("#mgt_fee_total").val();

        var proposed_amount = $("#proposed_amount").val();
        var additional_amount = $("#additional_amount").val();
        var concession_type = $("#concession_type").val();
        var concession_fee = $("#concession_fee").val();
        var final_amount = $('#final_amount').val();

        var lang_1 = $('#lang_1').val();
        var lang_2 = $('#lang_2').val();

        $.ajax({
          'type': 'POST',
          'url': base_url + 'admin/admitStudent',
          'data': {
            "id": id,
            "aided_unaided": aided_unaided,
            'course': course,
            'course_val': course_val,
            'dsc_1': dsc_1,
            'dsc_2': dsc_2,
            'dsc_1_val': dsc_1_val,
            'dsc_2_val': dsc_2_val,
            'lang_1': lang_1,
            'lang_2': lang_2,
            "category": category,
            "college_fee_total": college_fee_total,
            "mgt_fee_total": mgt_fee_total,
            "proposed_amount": proposed_amount,
            "additional_amount": additional_amount,
            "concession_type": concession_type,
            "concession_fee": concession_fee,
            "final_amount": final_amount
          },
          'dataType': 'text',
          'cache': false,
          'beforeSend': function() {
            $('#insert').val("Inserting...");
            $("#insert").attr("disabled", true);
          },
          'success': function(data) {
            $('#insert').val("Inserted");
            $('#student_modal').modal('hide');
            var url = base_url + 'admin/enquiryDetails/' + id
            window.location.replace(url);
          }
        });

      });


    });
  </script>