  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-sm-6">
            <h4></h4>
          </div> -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $page_title; ?></li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <?php if ($this->session->flashdata('message')) { ?>
          <div align="center" class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
            <?php echo $this->session->flashdata('message') ?>
          </div>
        <?php } ?>

        <div class="card mb-4 border-top-<?= $enquiryStatusColor[$enquiryDetails->status]; ?>">
          <div class="card-body">
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
                      <span class="text"> Admit Student</span>
                    </button>
                  <?php } ?>
                  <?php echo anchor('admin/editEnquiry/' . $enquiryDetails->id, '<span class="icon"><i class="fas fa-edit"></i></span> <span class="text">Edit</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
                <?php } ?>
                <?php echo anchor('admin/enquiries', '<span class="icon"><i class="fas fa-arrow-left"></i></span> <span class="text">Back to List</span>', 'class="btn btn-secondary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
              </div>
            </div>
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
                <th width="20%">Parent/Guardian Name</th>
                <td width="80%"><?= $enquiryDetails->par_name; ?></td>
              </tr>

              <tr>
                <th>Parent/Guardian Mobile</th>
                <td><?= $enquiryDetails->par_mobile; ?></td>
              </tr>
              <tr>
                <th>Parent/Guardian Email</th>
                <td><?= $enquiryDetails->par_email; ?></td>
              </tr>
              <tr>
                <th>Branch Preference-I</th>
                <td><?= $enquiryDetails->course; ?></td>
              </tr>
              <tr>
                <th>Branch Preference-II</th>
                <td><?= $enquiryDetails->course1; ?></td>
              </tr>
              <tr>
                <th>Branch Preference-III</th>
                <td><?= $enquiryDetails->course2; ?></td>
              </tr>
              <tr>
                <th>Gender</th>
                <td><?= $enquiryDetails->gender; ?></td>
              </tr>
              <tr>
                <th>Adhaar Number</th>
                <td><?= $enquiryDetails->adhaar; ?></td>
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
                <th>Category</th>
                <td><?= $enquiryDetails->category; ?></td>
              </tr>
              <tr>
                <th>SSLC Percentage/Grade</th>
                <td><?= $enquiryDetails->sslc_grade; ?></td>
              </tr>
              <tr>
                <th>PUC-I(10+1) Percentage/Grade</th>
                <td><?= $enquiryDetails->puc1_grade; ?></td>
              </tr>
              <tr>
                <th>PUC-II(10+2) Percentage/Grade</th>
                <td><?= $enquiryDetails->puc2_grade; ?></td>
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
                      <label class="form-label">Department</label>
                      <?php echo form_dropdown('course', $course_options, (set_value('course')) ? set_value('course') : $course, 'class="form-control" id="course"');  ?>
                      <span class="text-danger"><?php echo form_error('course'); ?></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Quota </label>
                      <?php $state_options = array("" => "Select");
                      echo form_dropdown('quota', $quota_options, (set_value('quota')) ? set_value('quota') : '', 'class="form-control" id="quota" '); ?>
                      <span class="text-danger"><?php echo form_error('quota'); ?></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Sub Quota </label>
                      <?php
                      echo form_dropdown('subquota', $subquota_options, (set_value('subquota')) ? set_value('subquota') : '', 'class="form-control" id="subquota" '); ?>
                      <span class="text-danger"><?php echo form_error('subquota'); ?></span>
                    </div>
                  </div>


                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Category Allotted</label>
                      <!-- <input type="text" class="form-control" id="aided_unaided" name="aided_unaided" placeholder="" readonly> -->
                      <?php
                      echo form_dropdown('category_allotted', $type_options, '', 'class="form-control input-xs" id="category_allotted"');
                      ?>
                      <span class="text-danger"><?php echo form_error('category_allotted'); ?></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Category Claimed</label>
                      <!-- <input type="text" class="form-control" id="aided_unaided" name="aided_unaided" placeholder="" readonly> -->
                      <?php
                      echo form_dropdown('category_claimed', $type_options, '', 'class="form-control input-xs" id="category_claimed"');
                      ?>
                      <span class="text-danger"><?php echo form_error('category_claimed'); ?></span>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">University Fee</label>
                      <input type="text" class="form-control" id="total_university_fee" name="total_university_fee" placeholder="Total College fee" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Corpus Fund</label>
                      <input type="text" class="form-control" id="corpus_fee" name="corpus_fee" placeholder="Corpus Fee" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Tution Fee</label>
                      <input type="text" class="form-control" id="total_tution_fee" name="total_tution_fee" placeholder="Finalised Fee" readonly>
                    </div>
                  </div>



                </div>

                <div class="form-row">

                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Concession Type</label>
                      <?php $concession_type_options = array("" => "Select", "Sports Quota" => "Sports Quota", "Management Quota" => "Management Quota");
                      echo form_dropdown('concession_type', $concession_type_options, '', 'class="form-control input-xs" id="concession_type"'); ?>

                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Concession Amount (if any)</label>
                      <input type="text" class="form-control" id="concession_fee" name="concession_fee" placeholder="Enter Concession Fee" value="0">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">College Fee</label>
                      <input type="text" class="form-control" id="total_college_fee" name="total_college_fee" placeholder="Payable Fee" readonly>
                    </div>
                  </div>

                </div>

                <div class="form-row">


                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Remarks</label>
                      <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter remarks">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Final Fee</label>
                      <input type="text" class="form-control" id="final_amount" name="final_amount" placeholder="Payable Fee" readonly>
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
      // $('#insert_block').prop("disabled", true);

      $("#quota").change(function() {
        event.preventDefault();

        var course = $("#course").val();

        if (course == ' ') {
          alert("Please Select Department");
        } else {
          $.ajax({
            'type': 'POST',
            'url': base_url + 'admin/subquotaDropdown',
            'data': {
              'quota': quota,
              'flag': 'S'
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


        if (subquota != "" && quota != '') {
          var page = base_url + 'admin/getFee';
          $.ajax({
            'type': 'POST',
            'url': page,
            'data': {
              'course': course,
              'quota': quota,
              'subquota': subquota
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
        var total_college_fee = parseInt(total_university_fee) + parseInt(total_tution_fee) - parseInt(concession_fee);


        var final_amount = parseInt(total_college_fee) + parseInt(corpus);
        return final_amount;
      }

      function collegeAmount() {
        var total_university_fee = $("#total_university_fee").val();
        var total_tution_fee = $("#total_tution_fee").val();
        var concession_fee = $("#concession_fee").val();

        var total_college_fee = parseInt(total_university_fee) + parseInt(total_tution_fee) - parseInt(concession_fee);

        return total_college_fee;
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



      $("#category_claimed").change(function() {

        if (this.value.length >= 1) {
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



        var category = $("#category").val();
        var category_allotted = $("#category_allotted").val();
        var category_claimed = $("#category_claimed").val();

        var total_university_fee = $("#total_university_fee").val();
        var corpus = $("#corpus_fee").val();

        var total_tution_fee = $("#total_tution_fee").val();
        var total_college_fee = $("#total_college_fee").val();

        var concession_type = $("#concession_type").val();
        var concession_fee = $("#concession_fee").val();
        var final_amount = $('#final_amount').val();



        $.ajax({
          'type': 'POST',
          'url': base_url + 'admin/admitStudent',
          'data': {
            "id": id,
            "category_allotted": category_allotted,
            "category_claimed": category_claimed,
            'course': course,
            'course_val': course_val,
            'corpus': corpus,
            "category": category,
            "total_university_fee": total_university_fee,
            "total_college_fee": total_college_fee,
            "total_tution_fee": total_tution_fee,

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