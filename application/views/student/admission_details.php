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

        <div class="card shadow mb-4">
          <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><?= $page_title; ?></h6>
            <h3 class="card-title">
               Admission Details
            </h3>
          </div>
          <div class="card-body">
            
            <!-- <?php print_r($facultyDetails); ?> -->

            <?php echo form_open_multipart($action, 'class="user"'); ?>

            <div class="form-row">

              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                <label class="label">Student Full Name (As per SSLC)</label>
                  <input type="text" class="form-control"
                   id="student_name" name="student_name" placeholder="Enter Student Name">
                  <span
                  class="text-danger"><?php echo form_error('student_name'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">First Name</label>
                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name">
                  <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Middle Name</label>
                  <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Enter Middle Name">
                  <span class="text-danger"><?php echo form_error('middle_name'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Last Name</label>
                  <input type="text" name="last_name" id="lastname" class="form-control" placeholder="Enter Last Name">
                  <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">college Code</label>
                  <input type="text" name="clg_code" id="clg_code" class="form-control" placeholder="Enter college Code">
                  <span class="text-danger"><?php echo form_error('clg_code'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">USN</label>
                  <input type="text" name="usn" id="usn" class="form-control" placeholder="Enter USN">
                  <span class="text-danger"><?php echo form_error('usn'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Stream</label>
                  <input type="text" name="stream" id="stream" class="form-control" placeholder="Enter Stream">
                  <span class="text-danger"><?php echo form_error('stream'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">


              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Course</label>
                  <input type="text" name="course" id="course" class="form-control" placeholder="Enter Course">
                  <span class="text-danger"><?php echo form_error('course'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Branch</label>
                  <input type="text" name="branch" id="branch" class="form-control" placeholder="Enter Branch">
                  <span class="text-danger"><?php echo form_error('branch'); ?></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Semester</label>
                  <input type="text" name="semester" id="semester" class="form-control" placeholder="Enter Semester">
                  <span class="text-danger"><?php echo form_error('semester'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">


              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Quota</label>
                  <input type="text" name="quota" id="quota" class="form-control" placeholder="Enter Quota">
                  <span class="text-danger"><?php echo form_error('quota'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Sub Quota</label>
                  <input type="text" name="sub_quota" id="sub_quota" class="form-control" placeholder="Enter Sub Quota">
                  <span class="text-danger"><?php echo form_error('sub_quota'); ?></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Special Quota</label>
                  <input type="text" name="special_quota" id="special_quota" class="form-control" placeholder="Enter Special Quota">
                  <span class="text-danger"><?php echo form_error('special_quota'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label class="label">Category Claimed</label>
                  <?php $state_options = array("" => "Select", "Karnataka" => "General");
                  echo form_dropdown('categoryg_claimed', $state_options, (set_value('categoryg_claimed')) ? set_value('categoryg_claimed') : $state, 'class="form-control" id="categoryg_claimed" placeholder="Select Category clained" '); ?>
                  <span class="text-danger"><?php echo form_error('categoryg_claimed'); ?></span>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label class="label">Category Allocated</label>
                  <input type="text" name="category_allocated" id="category_allocated" class="form-control" placeholder="Enter Category Allocated">
                  <span class="text-danger"><?php echo form_error('category_allocated'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">


              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Admission Date</label>
                  <input type="text" name="admission_date" id="admission_date" class="form-control" placeholder="Enter Admission Date">
                  <span class="text-danger"><?php echo form_error('admission_date'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Admission Number</label>
                  <input type="text" name="admission_number" id="admission_number" class="form-control" placeholder="Enter Admission Number">
                  <span class="text-danger"><?php echo form_error('admission_number'); ?></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Student Registration Number</label>
                  <input type="text" name="student_reg_no" id="student_reg_no" class="form-control" placeholder="Enter Student Register Number">
                  <span class="text-danger"><?php echo form_error('student_reg_no'); ?></span>
                </div>
              </div>

              </div>
            <!-- <div class="form-row">

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="dsc-2">Adhaar Number </label>
                  <input type="text" name="adhaar" id="adhaar" class="form-control" value="<?php echo (set_value('adhaar')) ? set_value('adhaar') : $adhaar; ?>">
                  <span class="text-danger"><?php echo form_error('adhaar'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="dsc-2">Gender </label>
                  <?php $gender_options = array(" " => "Select Gender", "Male" => "Male", "Female" => "Female", "Not Prefer to Say" => "Not Prefer to Say");
                  echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control" id="gender"');
                  ?>
                  <span class="text-danger"><?php echo form_error('gender'); ?></span>
                </div>
              </div>
            </div> -->
            <div class="form-row">
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Cet Rank</label>
                  <input type="text" name="cet_rank" id="cet_rank" class="form-control" placeholder="Enter Cet Rank">
                  <span class="text-danger"><?php echo form_error('cet_rank'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Admission Year
                  </label>
                  <?php
                  echo form_dropdown('admission_year', $course_options, (set_value('admission_year')) ? set_value('admission_year') : $course1, 'class="form-control" id="adms_yr" placeholder="select"'); ?>
                  <span class="text-danger"><?php echo form_error('admission_year'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                <label class="label">Term</label>
                  <input type="text" name="term" id="term" class="form-control" placeholder="Enter Term">
                  <span class="text-danger"><?php echo form_error('term'); ?></span>
                </div>
              </div>
            </div>
            <div class="form-row">


              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Admission Type</label>
                  <input type="text" name="admission_type" id="admission_type" class="form-control" placeholder="Enter Admission Type">
                  <span class="text-danger"><?php echo form_error('admission_type'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Admission Based On</label>
                  <input type="text" name="admission_based_on" id="admission_based_on" class="form-control" placeholder="Enter Admission Based On">
                  <span class="text-danger"><?php echo form_error('admission_based_on'); ?></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">Blood Group</label>
                  <input type="text" name="blood_group" id="blood_group" class="form-control" placeholder="Enter Blood Group">
                  <span class="text-danger"><?php echo form_error('blood_group'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">college Fees Paid</label>
                  <input type="text" name="clg_fee_paid" id="clg_fee_paid" class="form-control" placeholder="Enter college Fee Paid">
                  <span class="text-danger"><?php echo form_error('clg_fee_paid'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">college Fees Receipt No</label>
                  <input type="text" name="clg_fee_recpt_no" id="clg_fee_recpt_no" class="form-control" placeholder="Enter college Fee Receip No">
                  <span class="text-danger"><?php echo form_error('clg_fee_recpt_no'); ?></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">college Fees Receipt Date</label>
                  <input type="text" name="clg_fee_recpt_date" id="clg_fee_recpt_date" class="form-control" placeholder="Enter college Fee Receip Date">
                  <span class="text-danger"><?php echo form_error('clg_fee_recpt_date'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">CET/COMEDK Fees Paid</label>
                  <input type="text" name="cet_fee_paid" id="cet_fee_paid" class="form-control" placeholder="Enter Cet Fee Paid">
                  <span class="text-danger"><?php echo form_error('cet_fee_paid'); ?></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">CET/COMEDK Fees Receipt No</label>
                  <input type="text" name="cet_fee_recpt_no" id="cet_fee_recpt_no" class="form-control" placeholder="Enter Cet Fee Receipt Number">
                  <span class="text-danger"><?php echo form_error('cet_fee_recpt_no'); ?></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="label">CET/COMEDK Fees Receipt Date</label>
                  <input type="text" name="cet_fee_recpt_date" id="cet_fee_recpt_date" class="form-control" placeholder="Enter Cet Fee Receipt Date">
                  <span class="text-danger"><?php echo form_error('cet_fee_recpt_date'); ?></span>
                </div>
              </div>

              </div>

            <div class="form-group row">
              <div class="col-sm-2"> &nbsp;</div>
              <div class="col-sm-10 text-right">
                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i class="fas fa-edit"></i> Submit </button>
                <?php echo anchor('admi', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
              </div>
            </div>

            </form>
          </div>
        </div>

      </div>
    </section>
  </div>