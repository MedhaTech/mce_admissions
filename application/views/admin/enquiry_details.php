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
                <button class="btn btn-primary btn-sm btn-icon-split" id="block_student" name="block_student">
                  <span class="icon text-white-50">
                    <i class="fas fa-lock"></i>
                  </span>
                  <span class="text"> Block Seat</span>
                </button>
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
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Category</label>
                      <!-- <input type="text" class="form-control" id="aided_unaided" name="aided_unaided" placeholder="" readonly> -->
                      <?php
                      echo form_dropdown('aided_unaided', $type_options, '', 'class="form-control input-xs" id="aided_unaided"');
                      ?>
                      <span class="text-danger"><?php echo form_error('aided_unaided'); ?></span>
                    </div>
                  </div>

                </div>

                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">College Fee</label>
                      <input type="text" class="form-control" id="demand_fee_total" name="demand_fee_total" placeholder="Total College fee" readonly>
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
                      <label class="form-label">Finalised Fee</label>
                      <input type="text" class="form-control" id="proposed_amount" name="proposed_amount" placeholder="Finalised Fee" readonly>
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
                      <label class="form-label">Payable Fee</label>
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


      <div class="modal fade" id="block_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      echo form_dropdown('subquota', $subquota_options, (set_value('subquota')) ? set_value('subquota') : '', 'class="form-control" id="subquota" disabled '); ?>
                      <span class="text-danger"><?php echo form_error('subquota'); ?></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Category</label>
                      <!-- <input type="text" class="form-control" id="aided_unaided" name="aided_unaided" placeholder="" readonly> -->
                      <?php
                      echo form_dropdown('aided_unaided', $type_options, '', 'class="form-control input-xs" id="aided_unaided"');
                      ?>
                      <span class="text-danger"><?php echo form_error('aided_unaided'); ?></span>
                    </div>
                  </div>

                </div>

                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Tution Fee</label>
                      <input type="text" class="form-control" id="demand_fee_total" name="demand_fee_total" placeholder="Total College fee" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Corpus Fund</label>
                      <input type="number" class="form-control" id="corpus_fee" name="corpus_fee" placeholder="Corpus Fee" min="0" value="0">
                    </div>
                  </div>


                </div>

                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">MTES Corpus Fund</label>
                      <input type="number" class="form-control" id="corpus_fee_mtes" name="corpus_fee_mtes" placeholder="MTES Corpus Fee" min="0" value="0">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Finalised Fee</label>
                      <input type="text" class="form-control" id="final_amount" name="final_amount" placeholder="Enter Finalized Fee" readonly>
                    </div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Cash / DD Details</label>
                      <input type="text" class="form-control" id="cash" name="cash" placeholder="Cash / DD Details">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Bank Name</label>
                      <input type="text" class="form-control" id="bank" name="bank" placeholder="Bank Name">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Date</label>
                      <input type="date" class="form-control" id="date" name="date">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Amount</label>
                      <input type="text" class="form-control" id="bank" name="bank" placeholder="Amount">
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col">
                    <button type="button" class="btn btn-secondary btn-sm tx-13" data-dismiss="modal">Close</button>
                  </div>
                  <div class="col text-right">
                    <input type="submit" name="insert_block" id="insert_block" value="Block Seat" class="btn btn-danger btn-sm" />
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






      $("#aided_unaided").change(function() {
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
              $('#demand_fee_total').val(data.total_demand);
              var demand = data.total_demand;
              $('#corpus_fee').val(data.corpus_fund);
              var corpus = data.corpus_fund;
              var proposed = parseInt(demand) + parseInt(corpus);
              $('#proposed_amount').val(proposed);
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
      $("#corpus_fee").change(function() {
        event.preventDefault();
        var final_amount = finalAmount();
        $('#final_amount').val(finalAmount);
      });

      function finalAmount() {
        var demand = $("#demand_fee_total").val();
        var corpus = $("#corpus_fee").val();
        var proposed = parseInt(demand) + parseInt(corpus);
        var concession_fee = $("#concession_fee").val();
        var final_amount = parseInt(proposed) - parseInt(concession_fee);
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



      $("#aided_unaided").change(function() {

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
        var aided_unaided = $("#aided_unaided").val();

        var college_fee_total = $("#demand_fee_total").val();
        var mgt_fee_total = $("#corpus_fee").val();

        var proposed_amount = $("#proposed_amount").val();
        var additional_amount = $("#additional_amount").val();
        var concession_type = $("#concession_type").val();
        var concession_fee = $("#concession_fee").val();
        var final_amount = $('#final_amount').val();



        $.ajax({
          'type': 'POST',
          'url': base_url + 'admin/admitStudent',
          'data': {
            "id": id,
            "aided_unaided": aided_unaided,
            'course': course,
            'course_val': course_val,
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


    	$("#quota").change(function(){
			event.preventDefault();
	            	
			var quota = $("#quota").val();
			
			if(quota == ' '){
			   alert("Please Select Quota");
			}else{
			  $.ajax({'type':'POST',
				'url':base_url+'admin/subquotaDropdown',
				'data':{'quota':quota, 'flag':'S'},
				'dataType':'text',
				'cache':false,
				'success':function(data){
					$('select[name="subquota"]').empty();
					$('select[name="subquota"]').append(data);
					$('select[name="subquota"]').removeAttr("disabled");
		
				}
			  });
			  
			}
		});
		


    });
  </script>