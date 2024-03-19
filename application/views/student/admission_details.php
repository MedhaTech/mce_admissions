  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Admission Details From</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admission Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- <h1 class="h3 mb-2 text-gray-800"> Grievance Tickets </h1> -->

        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $page_title; ?></h6>
          </div>
          <div class="card-body">
            <!-- <?php print_r($facultyDetails); ?> -->

            <?php echo form_open_multipart($action, 'class="user"'); ?>

            <div class="form-row">

              <div class="col">
                <div class="form-group">
                <label class="label">Student Full Name (As per SSLC)</label>
                  <input type="text" class="form-control"
                   id="name" name="name" placeholder="Enter Student Name">
                  <span
                  class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="text">Middle Name</label>
                  <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Enter Middle Name">
                  <span class="text-danger"><?php echo form_error('middlename'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">Last Name</label>
                  <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Last Name">
                  <span class="text-danger"><?php echo form_error('lastname'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">

              <div class="col">
                <div class="form-group">
                  <label for="par_name">College Code</label>
                  <input type="text" name="clg_code" id="clg_code" class="form-control" placeholder="Enter College Code">
                  <span class="text-danger"><?php echo form_error('clg_code'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="text">USN</label>
                  <input type="text" name="usn" id="usn" class="form-control" placeholder="Enter USN">
                  <span class="text-danger"><?php echo form_error('clg_code'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">Stream</label>
                  <input type="text" name="stream" id="stream" class="form-control" placeholder="Enter Stream">
                  <span class="text-danger"><?php echo form_error('stream'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Course</label>
                  <input type="text" name="course" id="course" class="form-control" placeholder="Enter Course">
                  <span class="text-danger"><?php echo form_error('course'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Branch</label>
                  <input type="text" name="branch" id="branch" class="form-control" placeholder="Enter Branch">
                  <span class="text-danger"><?php echo form_error('branch'); ?></span>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="register_number">Semester</label>
                  <input type="text" name="semester" id="semester" class="form-control" placeholder="Enter Semester">
                  <span class="text-danger"><?php echo form_error('semester'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Quota</label>
                  <input type="text" name="quota" id="quota" class="form-control" placeholder="Enter Quota">
                  <span class="text-danger"><?php echo form_error('quota'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Sub Quota</label>
                  <input type="text" name="sub_quota" id="sub_quota" class="form-control" placeholder="Enter Sub Quota">
                  <span class="text-danger"><?php echo form_error('sub_quota'); ?></span>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="register_number">Special Quota</label>
                  <input type="text" name="spl_quota" id="spl_quota" class="form-control" placeholder="Enter Special Quota">
                  <span class="text-danger"><?php echo form_error('spl_quota'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="dsc-1">Category Claimed</label>
                  <?php $state_options = array("" => "Select", "Karnataka" => "General");
                  echo form_dropdown('ctg_claimed', $state_options, (set_value('ctg_claimed')) ? set_value('state') : $state, 'class="form-control" id="ctg_claimed" placeholder="Select Category clained" '); ?>
                  <span class="text-danger"><?php echo form_error('ctg_claimed'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="dsc-2">Category Allocated</label>
                  <input type="text" name="ctg_allocated" id="ctg_allocated" class="form-control" placeholder="Enter Category Allocated">
                  <span class="text-danger"><?php echo form_error('ctg_allocated'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Admission Date</label>
                  <input type="text" name="adms_date" id="adms_date" class="form-control" placeholder="Enter Admission Date">
                  <span class="text-danger"><?php echo form_error('adms_date'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Admission Number</label>
                  <input type="text" name="adms_num" id="adms_num" class="form-control" placeholder="Enter Admission Number">
                  <span class="text-danger"><?php echo form_error('adms_num'); ?></span>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="register_number">Student Registration Number</label>
                  <input type="text" name="student_reg_no" id="student_reg_no" class="form-control" placeholder="Enter Student Register Number">
                  <span class="text-danger"><?php echo form_error('student_reg_no'); ?></span>
                </div>
              </div>

              </div>
            <!-- <div class="form-row">

              <div class="col">
                <div class="form-group">
                  <label for="dsc-2">Adhaar Number </label>
                  <input type="text" name="adhaar" id="adhaar" class="form-control" value="<?php echo (set_value('adhaar')) ? set_value('adhaar') : $adhaar; ?>">
                  <span class="text-danger"><?php echo form_error('adhaar'); ?></span>
                </div>
              </div>
              <div class="col">
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
            <div class="col">
                <div class="form-group">
                  <label for="register_number">Cet Rank</label>
                  <input type="text" name="cet_rank" id="cet_rank" class="form-control" placeholder="Enter Cet Rank">
                  <span class="text-danger"><?php echo form_error('cet_rank'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="course">Admission Year
                  </label>
                  <?php
                  echo form_dropdown('adms_yr', $course_options, (set_value('adms_yr')) ? set_value('adms_yr') : $course1, 'class="form-control" id="adms_yr" placeholder="select"'); ?>
                  <span class="text-danger"><?php echo form_error('adms_yr'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                <label for="exam_board">Term</label>
                  <input type="text" name="term" id="term" class="form-control" placeholder="Enter Term">
                  <span class="text-danger"><?php echo form_error('term'); ?></span>
                </div>
              </div>
            </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Admission Type</label>
                  <input type="text" name="adms_type" id="adms_type" class="form-control" placeholder="Enter Admission Type">
                  <span class="text-danger"><?php echo form_error('adms_type'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Admission Based On</label>
                  <input type="text" name="adms_based_on" id="adms_based_on" class="form-control" placeholder="Enter Admission Based On">
                  <span class="text-danger"><?php echo form_error('adms_based_on'); ?></span>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="register_number">Blood Group</label>
                  <input type="text" name="blood_grp" id="blood_grp" class="form-control" placeholder="Enter Blood Group">
                  <span class="text-danger"><?php echo form_error('blood_grp'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">College Fees Paid</label>
                  <input type="text" name="clg_fee_paid" id="clg_fee_paid" class="form-control" placeholder="Enter College Fee Paid">
                  <span class="text-danger"><?php echo form_error('clg_fee_paid'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">College Fees Receipt No</label>
                  <input type="text" name="clg_fee_recp_no" id="clg_fee_recp_no" class="form-control" placeholder="Enter College Fee Receip No">
                  <span class="text-danger"><?php echo form_error('clg_fee_recp_no'); ?></span>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="register_number">College Fees Receipt Date</label>
                  <input type="text" name="clg_fee_recp_date" id="clg_fee_recp_date" class="form-control" placeholder="Enter College Fee Receip Date">
                  <span class="text-danger"><?php echo form_error('clg_fee_recp_date'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">CET/COMEDK Fees Paid</label>
                  <input type="text" name="cet_fee_paid" id="cet_fee_paid" class="form-control" placeholder="Enter Cet Fee Paid">
                  <span class="text-danger"><?php echo form_error('cet_fee_paid'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">CET/COMEDK Fees Receipt No</label>
                  <input type="text" name="cet_fee_recp_no" id="cet_fee_recp_no" class="form-control" placeholder="Enter Cet Fee Receipt Number">
                  <span class="text-danger"><?php echo form_error('cet_fee_recp_no'); ?></span>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="register_number">CET/COMEDK Fees Receipt Date</label>
                  <input type="text" name="cet_fee_recp_date" id="cet_fee_recp_date" class="form-control" placeholder="Enter Cet Fee Receipt Date">
                  <span class="text-danger"><?php echo form_error('cet_fee_recp_date'); ?></span>
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