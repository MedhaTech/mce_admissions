  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="card card-info shadow">
                  <div class="card-header">
                      <h3 class="card-title">
                          <?=$page_title;?>
                      </h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                  <?php echo anchor('student/dashboard', '<i class="fas fa-tachometer-alt"></i> Dashboard ', 'class="btn btn-dark btn-sm"'); ?>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
                      <?php echo form_open_multipart($action, 'class="user"'); ?>
                      <div class="form-row">
                          <div class="form-group col-md-4 col-sm-12">
                              <label class="label">Entrance Exam Type<span class="text-danger">*</span></label>
                              <?php $entrance_options = array(" "=>"Select Entrance Exam Type","CET"=>"CET","COMED-K"=>"COMED-K","GOI"=>"GOI","J&K"=>"J&K","OTHERS"=>"OTHERS"); 
                                    echo form_dropdown('entrance_type', $entrance_options, (set_value('entrance_type')) ? set_value('entrance_type') : $entrance_type , 'class="form-control" id="entrance_type"'); 
                              ?>
                              <span class="text-danger"><?php echo form_error('entrance_type'); ?></span>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Cet/Comed-k Registration Number<span
                                          class="text-danger">*</span></label>
                                  <input type="text" name="entrance_reg_no" id="entrance_reg_no" class="form-control"
                                      value="<?php echo (set_value('entrance_reg_no')) ? set_value('entrance_reg_no') : $entrance_reg_no; ?>"
                                      placeholder="Enter Entrance Registration Number">
                                  <span class="text-danger"><?php echo form_error('entrance_reg_no'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Cet/Comed-k Exam Rank<span class="text-danger">*</span></label>
                                  <input type="number" name="entrance_rank" id="entrance_rank" class="form-control"
                                      value="<?php echo (set_value('entrance_rank')) ? set_value('entrance_rank') : $entrance_rank; ?>"
                                      placeholder="Enter Entrance Exam Rank">
                                  <span class="text-danger"><?php echo form_error('entrance_rank'); ?></span>
                              </div>
                          </div>
                      </div>

                      <div class="form-row">
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="label">Admission Order No<span class="text-danger">*</span></label>
                                  <input type="text" name="admission_order_no" id="admission_order_no"
                                      class="form-control"
                                      value="<?php echo (set_value('admission_order_no')) ? set_value('admission_order_no') : $admission_order_no; ?>"
                                      placeholder="Enter Admission Order No">
                                  <span class="text-danger"><?php echo form_error('admission_order_no'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="label entyp">Admission Order Date<span class="text-danger">*</span></label>

                                  <input type="date" name="admission_order_date" id="admission_order_date"
                                      class="form-control entyp"
                                      value="<?php echo (set_value('admission_order_date')) ? set_value('admission_order_date') : $admission_order_date; ?>"
                                      placeholder="Enter Admission Order Date">
                                  <span class="text-danger"><?php echo form_error('admission_order_date'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="label entyp">Fees Paid<span class="text-danger">*</span></label>
                                  <input type="number" name="fees_paid" id="fees_paid" class="form-control entyp"
                                      value="<?php echo (set_value('fees_paid')) ? set_value('fees_paid') : $fees_paid; ?>"
                                      placeholder="Enter Fees Paid">
                                  <span class="text-danger"><?php echo form_error('fees_paid'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <div class="form-group">
                                  <label class="label entyp">Fees Receipt No<span class="text-danger">*</span></label>
                                  <input type="text" name="fees_receipt_no" id="fees_receipt_no" class="form-control entyp"
                                      value="<?php echo (set_value('fees_receipt_no')) ? set_value('fees_receipt_no') : $fees_receipt_no; ?>"
                                      placeholder="Enter Fees Receipt No">
                                  <span class="text-danger"><?php echo form_error('fees_receipt_no'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-2 col-sm-12">
                              <div class="form-group">
                                  <label class="label entyp">Fees Receipt Date<span class="text-danger">*</span></label>
                                  <input type="date" name="fees_receipt_date" id="fees_receipt_date"
                                      class="form-control entyp"
                                      value="<?php echo (set_value('fees_receipt_date')) ? set_value('fees_receipt_date') : $fees_receipt_date; ?>"
                                      placeholder="Enter Fees Receipt Date">
                                  <span class="text-danger"><?php echo form_error('fees_receipt_date'); ?></span>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="card-footer">
                      <div class="row">
                          <div class="col-md-6">
                              <?php echo anchor('student/admissiondetails', 'BACK', 'class="btn btn-danger btn-square" '); ?>
                          </div>
                          <div class="col-md-6 text-right">
                              <button type="submit"  class="btn btn-info btn-square" name="Update" id="Update"> SAVE 
                              </button>
                              <?php echo anchor('student/personaldetails', 'NEXT', 'class="btn btn-danger btn-square float-right" '); ?>
                          </div>
                      </div>
                  </div>
                  <?php echo form_close(); ?>
              </div>
          </div>
      </section>
  </div>

  <!-- <script>
    function changefield()
    {
        var submit = document.getElementById("entrance_type");
        if(submit.value == "MANAGMENT")
        {
            document.getElementById("admission_order_date").style.visibility="hidden";
            document.getElementById("fees_paid").style.visibility="hidden";
            document.getElementById("fees_receipt_no").style.visibility="hidden";
            document.getElementById("fees_receipt_date").style.visibility="hidden";
        }
        else
        {
            document.getElementById("admission_order_date").style.visibility="visible";
            document.getElementById("fees_paid").style.visibility="visible";
            document.getElementById("fees_receipt_no").style.visibility="visible";
            document.getElementById("fees_receipt_date").style.visibility="visible";
        }
    }
</script> -->

<script>
   $(document).ready(function() {
    var base_url = '<?php echo base_url(); ?>';

        $(".entyp").hide();
        $("#entrance_type").change(function () {
            if($("#entrance_type").val() == "MANAGMENT") {
                $(".entyp").hide();
            }
        })

        $("#entrance_type").change(function () {
            if($("#entrance_type").val() == "CET") {
                $(".entyp").show();
            }
        })

        $("#entrance_type").change(function () {
            if($("#entrance_type").val() == "COMED-K") {
                $(".entyp").show();
            }
        })

        $("#entrance_type").change(function () {
            if($("#entrance_type").val() == "GOI") {
                $(".entyp").show();
            }
        })

        $("#entrance_type").change(function () {
            if($("#entrance_type").val() == "J&K") {
                $(".entyp").show();
            }
        })
    })
</script>