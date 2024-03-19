  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Personal Details From</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Personal Details</li>
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
                  <label for="student_name">Birth Date</label>
                  <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Enter Birth Date">
                  <span class="text-danger"><?php echo form_error('birth_date'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="text">Gender</label>
                  <?php $gender_options = array(" " => "Select Gender", "Male" => "Male", "Female" => "Female", "Not Prefer to Say" => "Not Prefer to Say");
                  echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control" id="gender"');
                  ?>
                  <span class="text-danger"><?php echo form_error('gender'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">Current Address</label>
                  <input type="text" name="crnt_address" id="crnt_address" class="form-control" placeholder="Enter Current Address">
                  <span class="text-danger"><?php echo form_error('crnt_address'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">Current City</label>
                  <input type="text" name="crnt_city" id="crnt_city" class="form-control" placeholder="Enter Current City">
                  <span class="text-danger"><?php echo form_error('crnt_city'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">

              <div class="col">
                <div class="form-group">
                  <label for="par_name">Current State</label>
                  <input type="text" name="crnt_state" id="crnt_state" class="form-control" placeholder="Enter Current State">
                  <span class="text-danger"><?php echo form_error('crnt_state'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="text">Current Pincode</label>
                  <input type="number" name="crnt_pincode" id="crnt_pincode" class="form-control" placeholder="Enter Current Pincode">
                  <span class="text-danger"><?php echo form_error('crnt_pincode'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">Current Country</label>
                  <input type="text" name="crnt_country" id="crnt_country" class="form-control" placeholder="Enter Current Country">
                  <span class="text-danger"><?php echo form_error('crnt_country'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">Current Phone</label>
                  <input type="text" name="crnt_phone" id="crnt_phone" class="form-control" placeholder="Enter Current Phone">
                  <span class="text-danger"><?php echo form_error('crnt_phone'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Permanent Address</label>
                  <input type="text" name="prmt_address" id="prmt_address" class="form-control" placeholder="Enter Permanent Address">
                  <span class="text-danger"><?php echo form_error('prmt_address'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Permanent City</label>
                  <input type="text" name="prmt_city" id="prmt_city" class="form-control" placeholder="Enter Permanent City">
                  <span class="text-danger"><?php echo form_error('prmt_city'); ?></span>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="register_number">Permanent State</label>
                  <input type="text" name="prmt_state" id="prmt_state" class="form-control" placeholder="Enter Permanent State">
                  <span class="text-danger"><?php echo form_error('prmt_state'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Permanent Pincode</label>
                  <input type="text" name="prmt_pincode" id="prmt_pincode" class="form-control" placeholder="Enter Permanent Pincode">
                  <span class="text-danger"><?php echo form_error('prmt_pincode'); ?></span>
                </div>
              </div>
              

            </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Permanent Country</label>
                  <input type="text" name="prmt_country" id="prmt_country" class="form-control" placeholder="Enter Permanent Country">
                  <span class="text-danger"><?php echo form_error('prmt_counter'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Permanent Phone</label>
                  <input type="text" name="prmt_phone" id="prmt_phone" class="form-control" placeholder="Enter Permanent Phone">
                  <span class="text-danger"><?php echo form_error('prmt_phone'); ?></span>
                </div>
              </div>
             <div class="col">
                <div class="form-group">
                  <label for="register_number">Mobile</label>
                  <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile">
                  <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Emergency No</label>
                  <input type="text" name="emrgy_no" id="emrgy_no" class="form-control" placeholder="Enter Emergency Number">
                  <span class="text-danger"><?php echo form_error('emrgy_no'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Email Id</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                  <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Domicile</label>
                  <input type="text" name="domicile" id="domicile" class="form-control" placeholder="Enter Domicile">
                  <span class="text-danger"><?php echo form_error('domicile'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Area</label>
                  <input type="text" name="area" id="area" class="form-control" placeholder="Enter Area">
                  <span class="text-danger"><?php echo form_error('area'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Birth Place</label>
                  <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="Enter Birth Place">
                  <span class="text-danger"><?php echo form_error('birth_place'); ?></span>
                </div>
              </div>

              </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Birth State</label>
                  <input type="text" name="birth_state" id="birth_state" class="form-control" placeholder="Enter Birth State">
                  <span class="text-danger"><?php echo form_error('birth_state'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Birth Country</label>
                  <input type="text" name="birth_country" id="birth_country" class="form-control" placeholder="Enter Birth Country">
                  <span class="text-danger"><?php echo form_error('birth_country'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Birth Pincode</label>
                  <input type="text" name="birth_pincode" id="birth_pincode" class="form-control" placeholder="Enter Birth Pincode">
                  <span class="text-danger"><?php echo form_error('birth_pincode'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Nationality</label>
                  <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Nationality">
                  <span class="text-danger"><?php echo form_error('nationality'); ?></span>
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
                  <label for="exam_board">NRI</label>
                  <input type="text" name="nri" id="nri" class="form-control" placeholder="Enter NRI">
                  <span class="text-danger"><?php echo form_error('nri'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Religion</label>
                  <input type="text" name="religion" id="religion" class="form-control" placeholder="Enter Religion">
                  <span class="text-danger"><?php echo form_error('religion'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Caste</label>
                  <input type="text" name="caste" id="caste" class="form-control" placeholder="Enter Caste">
                  <span class="text-danger"><?php echo form_error('caste'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Sub-Caste</label>
                  <input type="text" name="sub_caste" id="sub_caste" class="form-control" placeholder="Enter Sub Caste">
                  <span class="text-danger"><?php echo form_error('sub_caste'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Mother Tongue</label>
                  <input type="text" name="mthr_tongue" id="mthr_tongue" class="form-control" placeholder="Enter Mother Tongue">
                  <span class="text-danger"><?php echo form_error('mthr_tongue'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Disability</label>
                  <input type="text" name="disability" id="disability" class="form-control" placeholder="Enter Disability">
                  <span class="text-danger"><?php echo form_error('disability'); ?></span>
                </div>
              </div>
             <div class="col">
                <div class="form-group">
                  <label for="register_number">Type of Disability</label>
                  <input type="text" name="typ_of_disability" id="typ_of_disability" class="form-control" placeholder="Enter Type of Disability">
                  <span class="text-danger"><?php echo form_error('typ_of_disability'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Economically Backward</label>
                  <input type="text" name="economical_backward" id="economical_backward" class="form-control" placeholder="Enter Economical Backward">
                  <span class="text-danger"><?php echo form_error('economical_backward'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Hobbies</label>
                  <input type="text" name="hobbies" id="hobbies" class="form-control" placeholder="Enter Hobbies">
                  <span class="text-danger"><?php echo form_error('hobbies'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Sports</label>
                  <input type="text" name="sports" id="sports" class="form-control" placeholder="Enter Sports">
                  <span class="text-danger"><?php echo form_error('sports'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Sports Name</label>
                  <input type="text" name="sports_name" id="sports_name" class="form-control" placeholder="Enter Sports Name">
                  <span class="text-danger"><?php echo form_error('sports_name'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Cultural Activities</label>
                  <input type="text" name="cultural_activities" id="cultural_activities" class="form-control" placeholder="Enter Cultural ACtivities">
                  <span class="text-danger"><?php echo form_error('cultural_activities'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Participated at</label>
                    <input type="text" name="participate_at" id="participate_at" class="form-control" placeholder="Enter Participate At">
                    <span class="text-danger"><?php echo form_error('participate_at'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Famous Personalities</label>
                    <input type="text" name="famous_personalities" id="famous_personalities" class="form-control" placeholder="Enter Famous Personalities">
                    <span class="text-danger"><?php echo form_error('famous_personalities'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">S/B account no</label>
                    <input type="text" name="sb_account_no" id="sb_account_no" class="form-control" placeholder="Enter SB Account Number">
                    <span class="text-danger"><?php echo form_error('sb_account_no'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Aadhar number</label>
                    <input type="text" name="aadhar_no" id="aadhar_no" class="form-control" placeholder="Enter Aadhar Number">
                    <span class="text-danger"><?php echo form_error('aadhar_no'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Residing at</label>
                    <input type="text" name="residing" id="residing" class="form-control" placeholder="Enter Residing At">
                    <span class="text-danger"><?php echo form_error('residing'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Traveling From</label>
                    <input type="text" name="trvlg_frm" id="trvlg_frm" class="form-control" placeholder="Enter Travelling From">
                    <span class="text-danger"><?php echo form_error('trvlg_frm'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Traveling To</label>
                    <input type="text" name="trvlg_to" id="trvlg_to" class="form-control" placeholder="Enter Travelling To">
                    <span class="text-danger"><?php echo form_error('trvlg_to'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Occupation</label>
                    <input type="text" name="fthr_occupation" id="fthr_occupation" class="form-control" placeholder="Enter Father Occupation">
                    <span class="text-danger"><?php echo form_error('fthr_occupation'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Father PAN No</label>
                    <input type="text" name="fthr_pan" id="fthr_pan" class="form-control" placeholder="Enter Father Pan Number">
                    <span class="text-danger"><?php echo form_error('fthr_pan'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Name</label>
                    <input type="text" name="fthr_name" id="fthr_name" class="form-control" placeholder="Enter Father Name">
                    <span class="text-danger"><?php echo form_error('fthr_name'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Name as per SSLC</label>
                    <input type="text" name="fthr_name_sslc" id="fthr_name_sslc" class="form-control" placeholder="Enter Father Name as per SSLC">
                    <span class="text-danger"><?php echo form_error('fthr_name_ssla'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Annual Income</label>
                    <input type="text" name="fthr_income" id="fthr_income" class="form-control" placeholder="Enter Fther Annual Income">
                    <span class="text-danger"><?php echo form_error('fthr_income'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Father Address</label>
                    <input type="text" name="fthr_address" id="fthr_address" class="form-control" placeholder="Enter Father Address">
                    <span class="text-danger"><?php echo form_error('fthr_address'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father EmailID</label>
                    <input type="text" name="fthr_email" id="fthr_email" class="form-control" placeholder="Enter Father EmailID">
                    <span class="text-danger"><?php echo form_error('fthr_email'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father City</label>
                    <input type="text" name="fthr_city" id="fthr_city" class="form-control" placeholder="Enter Father City">
                    <span class="text-danger"><?php echo form_error('fthr_city'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father State</label>
                    <input type="text" name="fthr_state" id="fthr_state" class="form-control" placeholder="Enter Father State">
                    <span class="text-danger"><?php echo form_error('fthr_state'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Father Pincode</label>
                    <input type="text" name="fthr_pincode" id="fthr_pincode" class="form-control" placeholder="Enter Father Pincode">
                    <span class="text-danger"><?php echo form_error('fthr_pincode'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Country</label>
                    <input type="text" name="fthr_country" id="fthr_country" class="form-control" placeholder="Enter Father Country">
                    <span class="text-danger"><?php echo form_error('fthr_country'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Mobile 1</label>
                    <input type="text" name="fthr_mbl1" id="fthr_mbl1" class="form-control" placeholder="Enter Father Mobile 1">
                    <span class="text-danger"><?php echo form_error('fthr_mbl1'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Mobile 2</label>
                    <input type="text" name="fthr_mbl2" id="fthr_mbl2" class="form-control" placeholder="Enter Father Mobile 2">
                    <span class="text-danger"><?php echo form_error('fthr_mbl2'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Father Telephone</label>
                    <input type="text" name="fthr_tel" id="fthr_tel" class="form-control" placeholder="Enter Father Telephone">
                    <span class="text-danger"><?php echo form_error('fthr_tel'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Occupation</label>
                    <input type="text" name="mthr_occupation" id="mthr_occupation" class="form-control" placeholder="Enter Mother Occupation">
                    <span class="text-danger"><?php echo form_error('mthr_occupation'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Pan no</label>
                    <input type="text" name="mthr_pan" id="mthr_pan" class="form-control" placeholder="Enter Mother Pan No">
                    <span class="text-danger"><?php echo form_error('mthr_pan'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Name</label>
                    <input type="text" name="mthr_name" id="mthr_name" class="form-control" placeholder="Enter Mother Name">
                    <span class="text-danger"><?php echo form_error('mthr_name'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Mother  Annual Income</label>
                    <input type="text" name="mthr_income" id="mthr_income" class="form-control" placeholder="Enter Mother Income">
                    <span class="text-danger"><?php echo form_error('mthr_income'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Address</label>
                    <input type="text" name="mthr_address" id="mthr_address" class="form-control" placeholder="Enter Mother Address">
                    <span class="text-danger"><?php echo form_error('mthr_address'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother EmailID</label>
                    <input type="text" name="mthr_email" id="mthr_email" class="form-control" placeholder="Enter Mother EmailId">
                    <span class="text-danger"><?php echo form_error('mthr_email'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother City</label>
                    <input type="text" name="mthr_city" id="mthr_city" class="form-control" placeholder="Enter Mother City">
                    <span class="text-danger"><?php echo form_error('mthr_city'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Mother State</label>
                    <input type="text" name="mthr_state" id="mthr_state" class="form-control" placeholder="Enter Mother State">
                    <span class="text-danger"><?php echo form_error('mthr_state'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Pincode</label>
                    <input type="text" name="mthr_pincode" id="mthr_pincode" class="form-control" placeholder="Enter Mother Pincode">
                    <span class="text-danger"><?php echo form_error('mthr_pincode'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Country</label>
                    <input type="text" name="mthr_country" id="mthr_country" class="form-control" placeholder="Enter Mother Country">
                    <span class="text-danger"><?php echo form_error('mthr_country'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Mobile 1</label>
                    <input type="text" name="mthr_mbl1" id="mthr_mbl1" class="form-control" placeholder="Enter Mother Mobile 1">
                    <span class="text-danger"><?php echo form_error('mthr_mbl1'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Mother Mobile 2</label>
                    <input type="text" name="mthr_mbl2" id="mthr_mbl2" class="form-control" placeholder="Enter Mother Mobile 2">
                    <span class="text-danger"><?php echo form_error('mthr_mbl2'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Telephone</label>
                    <input type="text" name="mbl_tel" id="mbl_tel" class="form-control" placeholder="Enter Mother Telephone">
                    <span class="text-danger"><?php echo form_error('mbl_tel'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Occupation</label>
                    <input type="text" name="gar_occupation" id="gar_occupation" class="form-control" placeholder="Enter Guardian Occupation">
                    <span class="text-danger"><?php echo form_error('gar_occupation'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Name</label>
                    <input type="text" name="gar_name" id="gar_name" class="form-control" placeholder="Enter Guardian Name">
                    <span class="text-danger"><?php echo form_error('gar_name'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Guardian Address</label>
                    <input type="text" name="gar_address" id="gar_address" class="form-control" placeholder="Enter Guardian Address">
                    <span class="text-danger"><?php echo form_error('gar_address'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian City</label>
                    <input type="text" name="gar_city" id="gar_city" class="form-control" placeholder="Enter Guardian City">
                    <span class="text-danger"><?php echo form_error('gar_city'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian State</label>
                    <input type="text" name="gar_state" id="gar_state" class="form-control" placeholder="Enter Guardian State">
                    <span class="text-danger"><?php echo form_error('gar_state'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Pincode</label>
                    <input type="text" name="gar_pincode" id="gar_pincode" class="form-control" placeholder="Enter Guardian Pincode">
                    <span class="text-danger"><?php echo form_error('gar_pincode'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Guardian Mobile 1</label>
                    <input type="text" name="gar_mbl1" id="gar_mbl1" class="form-control" placeholder="Enter Guardian Mobile 1">
                    <span class="text-danger"><?php echo form_error('gar_mbl1'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Mobile 2</label>
                    <input type="text" name="gar_mbl2" id="gar_mbl2" class="form-control" placeholder="Enter Guardian Mobile 2">
                    <span class="text-danger"><?php echo form_error('gar_mbl2'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Telephone</label>
                    <input type="text" name="gar_tel" id="gar_tel" class="form-control" placeholder="Enter Guardian Telephone">
                    <span class="text-danger"><?php echo form_error('gar_tel'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Office Address</label>
                    <input type="text" name="fthr_ofc_address" id="fthr_ofc_address" class="form-control" placeholder="Enter Father Office Address">
                    <span class="text-danger"><?php echo form_error('fthr_ofc_address'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Father Office City</label>
                    <input type="text" name="fthr_ofc_city" id="fthr_ofc_city" class="form-control" placeholder="Enter Father Office City">
                    <span class="text-danger"><?php echo form_error('fthr_ofc_city'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Office State</label>
                    <input type="text" name="fthr_ofc_state" id="fthr_ofc_state" class="form-control" placeholder="Enter Father Office State">
                    <span class="text-danger"><?php echo form_error('fthr_ofc_state'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Office Country</label>
                    <input type="text" name="fthr_ofc_country" id="fthr_ofc_country" class="form-control" placeholder="Enter Father Office Country">
                    <span class="text-danger"><?php echo form_error('fthr_ofc_country'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Office Pincode</label>
                    <input type="text" name="fthr_ofc_pincode" id="fthr_ofc_pincode" class="form-control" placeholder="Enter Father Office Pincode">
                    <span class="text-danger"><?php echo form_error('fthr_ofc_pincode'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Father Office EmailID</label>
                    <input type="text" name="fthr_ofc_email" id="fthr_ofc_email" class="form-control" placeholder="Enter Father Office EmailId">
                    <span class="text-danger"><?php echo form_error('fthr_ofc_email'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Office Mobile No 1</label>
                    <input type="text" name="fthr_ofc_mbl1" id="fthr_ofc_mbl1" class="form-control" placeholder="Enter Father Office Mobile 1">
                    <span class="text-danger"><?php echo form_error('fthr_ofc_mbl1'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Office Mobile No 2</label>
                    <input type="text" name="fthr_ofc_mbl2" id="fthr_ofc_mbl2" class="form-control" placeholder="Enter Father Office Mobile 2">
                    <span class="text-danger"><?php echo form_error('fthr_ofc_mbl2'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Father Office Phone with STDCode</label>
                    <input type="text" name="fthr_std" id="fthr_std" class="form-control" placeholder="Enter Father Office Phone with STD Code">
                    <span class="text-danger"><?php echo form_error('fthr_std'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Mother Office Address</label>
                    <input type="text" name="mthr_ofc_address" id="mthr_ofc_address" class="form-control" placeholder="Enter Mother Office Address">
                    <span class="text-danger"><?php echo form_error('mthr_ofc_address'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Office City</label>
                    <input type="text" name="mthr_ofc_city" id="mthr_ofc_city" class="form-control" placeholder="Enter Mother Office City">
                    <span class="text-danger"><?php echo form_error('mthr_ofc_city'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Office State</label>
                    <input type="text" name="mthr_ofc_state" id="mthr_ofc_state" class="form-control" placeholder="Enter Mother Office State">
                    <span class="text-danger"><?php echo form_error('mthr_ofc_state'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Office Country</label>
                    <input type="text" name="mthr_ofc_country" id="mthr_ofc_country" class="form-control" placeholder="Enter Mother Office Country">
                    <span class="text-danger"><?php echo form_error('mthr_ofc_country'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Mother Office PinCode</label>
                    <input type="text" name="mthr_ofc_pincode" id="mthr_ofc_pincode" class="form-control" placeholder="Enter Mother Office Pincode">
                    <span class="text-danger"><?php echo form_error('mthr_ofc_pincode'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Office EmailID</label>
                    <input type="text" name="mthr_ofc_email" id="mthr_ofc_email" class="form-control" placeholder="Enter Mother Office EmailId">
                    <span class="text-danger"><?php echo form_error('mthr_ofc_email'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Office Mobile No 1</label>
                    <input type="text" name="mthr_ofc_mbl1" id="mthr_ofc_mbl1" class="form-control" placeholder="Enter Mother Office Mobile 1">
                    <span class="text-danger"><?php echo form_error('mthr_ofc_mbl1'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Mother Office Mobile No 2</label>
                    <input type="text" name="mthr_ofc_mbl2" id="mthr_ofc_mbl2" class="form-control" placeholder="Enter Mother Office Mobile 2">
                    <span class="text-danger"><?php echo form_error('mthr_ofc_mbl2'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Mother Office Phone with STDCode</label>
                    <input type="text" name="mthr_std" id="mthr_std" class="form-control" placeholder="Enter Mother Office Phone with STD code">
                    <span class="text-danger"><?php echo form_error('mthr_std'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Office Address</label>
                    <input type="text" name="gar_ofc_address" id="gar_ofc_address" class="form-control" placeholder="Enter Guardian Office Address">
                    <span class="text-danger"><?php echo form_error('gar_ofc_address'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Office City</label>
                    <input type="text" name="gar_ofc_city" id="gar_ofc_city" class="form-control" placeholder="Enter Guardian office City">
                    <span class="text-danger"><?php echo form_error('gar_ofc_city'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Office State</label>
                    <input type="text" name="gar_ofc_state" id="gar_ofc_state" class="form-control" placeholder="Enter Guardian Office State">
                    <span class="text-danger"><?php echo form_error('gar_ofc_state'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Guardian Office Country</label>
                    <input type="text" name="gar_ofc_country" id="gar_ofc_country" class="form-control" placeholder="Enter Guardian Office Country">
                    <span class="text-danger"><?php echo form_error('gar_ofc_country'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Office Pincode</label>
                    <input type="text" name="gar_ofc_pincode" id="gar_ofc_pincode" class="form-control" placeholder="Enter Guardian Office Pincode">
                    <span class="text-danger"><?php echo form_error('gar_ofc_pincode'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Office EmailID</label>
                    <input type="text" name="gar_ofc_email" id="gar_ofc_email" class="form-control" placeholder="Enter Guardian Office EmailId">
                    <span class="text-danger"><?php echo form_error('gar_ofc_email'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Office Mobile 1</label>
                    <input type="text" name="gar_ofc_mbl1" id="gar_ofc_mbl1" class="form-control" placeholder="Enter Guardian Office Mobile 1">
                    <span class="text-danger"><?php echo form_error('gar_ofc_mbl1'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Guardian Office Mobile 2</label>
                    <input type="text" name="gar_ofc_mbl2" id="gar_ofc_mbl2" class="form-control" placeholder="Enter Guardian Office mobile 2">
                    <span class="text-danger"><?php echo form_error('gar_ofc_mbl2'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Guardian Office Phone with STDCode</label>
                    <input type="text" name="gar_std" id="grd_std" class="form-control" placeholder="Enter Guardian Office Phone with STD Code">
                    <span class="text-danger"><?php echo form_error('grd_std'); ?></span>
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