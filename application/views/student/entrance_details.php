  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h4>Admission Details From</h4>
          </div> -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admission Details</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- <h1 class="h3 mb-2 text-gray-800"> Grievance Tickets </h1> -->

        <div class="card card-info shadow">
        <div class="card-header py-3 d-flex flex-row align-items-start justify-content">
           
          <h6 class="m-0">Entrance Exam Details</h6>
        </div>
          <div class="card-body">
            
           

          <?php echo validation_errors(); ?>
            <?php echo form_open_multipart($action, 'class="user"'); ?>

            <div class="form-row">
               <div class="form-group col-md-4 col-sm-12">
                  <label class="label">Entrance Type<span class="text-danger">*</span></label>
                  <?php $entrance_options = array(" "=>"Select Entrance type","CET"=>"CET","COMED-K"=>"COMED-K","GOI "=>"GOI ","J&K"=>"J&K");
                    echo form_dropdown('entrance_type', $entrance_options, (set_value('entrance_type')) ? set_value('entrance_type') : $entrance_type , 'class="form-control" id="entrance_type"'); 
                   ?>
                  <span
                  class="text-danger"><?php echo form_error('entrance_type'); ?></span>
               </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Entrance Registration Number<span class="text-danger">*</span></label>
                  <input type="text" name="entrance_reg_no" id="entrance_reg_no" class="form-control" value="<?php echo (set_value('entrance_reg_no')) ? set_value('entrance_reg_no') : $entrance_reg_no; ?>"  placeholder="Enter Entrance Registration Number">
                  <span class="text-danger"><?php echo form_error('entrance_reg_no'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Entrance Exam Rank<span class="text-danger">*</span></label>
                  <input type="text" name="entrance_rank" id="entrance_rank" class="form-control" value="<?php echo (set_value('entrance_rank')) ? set_value('entrance_rank') : $entrance_rank; ?>" placeholder="Enter Entrance Exam Rank">
                  <span class="text-danger"><?php echo form_error('entrance_rank'); ?></span>
                </div>
              </div>
              </div>

              <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Admission Order No<span class="text-danger">*</span></label>
                  <input type="text" name="admission_order_no" id="admission_order_no" class="form-control" value="<?php echo (set_value('admission_order_no')) ? set_value('admission_order_no') : $admission_order_no; ?>" placeholder="Enter Admission Order No">
                  <span class="text-danger"><?php echo form_error('admission_order_no'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Admission Order Date<span class="text-danger">*</span></label>
                 
                  <input type=".$newDate." name="admission_order_date" id="admission_order_date" class="form-control" value="<?php echo (set_value('admission_order_date')) ? set_value('admission_order_date') : $admission_order_date; ?>" placeholder="Enter Admission Order Date">
                  <span class="text-danger"><?php echo form_error('admission_order_date'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Fees Paid<span class="text-danger">*</span></label>
                  <input type="text" name="fees_paid" id="fees_paid" class="form-control" value="<?php echo (set_value('fees_paid')) ? set_value('fees_paid') : $fees_paid; ?>" placeholder="Enter Fees Paid">
                  <span class="text-danger"><?php echo form_error('fees_paid'); ?></span>
                </div>
              </div>
              </div>

              <div class="form-row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Fees Receipt No<span class="text-danger">*</span></label>
                  <input type="text" name="fees_receipt_no" id="fees_receipt_no" class="form-control" value="<?php echo (set_value('fees_receipt_no')) ? set_value('fees_receipt_no') : $fees_receipt_no; ?>" placeholder="Enter Fees Receipt No">
                  <span class="text-danger"><?php echo form_error('fees_receipt_no'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Fees Receipt Date<span class="text-danger">*</span></label>
                  <input type="date" name="fees_receipt_date" id="fees_receipt_date" class="form-control" value="<?php echo (set_value('fees_receipt_date')) ? set_value('fees_receipt_date') : $fees_receipt_date; ?>" placeholder="Enter Fees Receipt Date">
                  <span class="text-danger"><?php echo form_error('fees_receipt_date'); ?></span>
                </div>
              </div>
              </div>

            <div class="form-group row">
              <div class="col-sm-2"> &nbsp;</div>
              <div class="col-sm-10 text-right">
                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i class="fas fa-edit"></i> Submit </button>  
                <?php echo anchor('student/entranceexamdetails', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
              </div>
            </div>

            <?php echo form_close(); ?>
          </div>
        </div>

      </div>
    </section>
  </div>