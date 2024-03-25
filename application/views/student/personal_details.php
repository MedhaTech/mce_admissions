  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h4>Personal Details From</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Personal Details</li>
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
               Personal Details
            </h3>
          </div>
          <div class="card-body">
            <!-- <?php print_r($facultyDetails); ?> -->

            <?php echo form_open_multipart($action, 'class="user"'); ?>

            <div class="form-row">

              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Birth Date</label>
                  <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Enter Birth Date">
                  <span class="text-danger"><?php echo form_error('birth_date'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Gender</label>
                  <?php $gender_options = array(" " => "Select Gender", "Male" => "Male", "Female" => "Female", "Not Prefer to Say" => "Not Prefer to Say");
                  echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control" id="gender"');
                  ?>
                  <span class="text-danger"><?php echo form_error('gender'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Current Address</label>
                  <input type="text" name="current_address" id="current_address" class="form-control" placeholder="Enter Current Address">
                  <span class="text-danger"><?php echo form_error('current_address'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Current City</label>
                  <input type="text" name="current_city" id="current_city" class="form-control" placeholder="Enter Current City">
                  <span class="text-danger"><?php echo form_error('current_city'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">

              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Current State</label>
                  <input type="text" name="current_state" id="current_state" class="form-control" placeholder="Enter Current State">
                  <span class="text-danger"><?php echo form_error('current_state'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Current Pincode</label>
                  <input type="number" name="current_pincode" id="current_pincode" class="form-control" placeholder="Enter Current Pincode">
                  <span class="text-danger"><?php echo form_error('current_pincode'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Current Country</label>
                  <input type="text" name="current_country" id="current_country" class="form-control" placeholder="Enter Current Country">
                  <span class="text-danger"><?php echo form_error('current_country'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Current Phone</label>
                  <input type="text" name="current_phone" id="current_phone" class="form-control" placeholder="Enter Current Phone">
                  <span class="text-danger"><?php echo form_error('current_phone'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">


              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Permanent Address</label>
                  <input type="text" name="per_address" id="per_address" class="form-control" placeholder="Enter Permanent Address">
                  <span class="text-danger"><?php echo form_error('per_address'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Permanent City</label>
                  <input type="text" name="per_city" id="per_city" class="form-control" placeholder="Enter Permanent City">
                  <span class="text-danger"><?php echo form_error('per_city'); ?></span>
                </div>
              </div>

              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Permanent State</label>
                  <input type="text" name="per_state" id="per_state" class="form-control" placeholder="Enter Permanent State">
                  <span class="text-danger"><?php echo form_error('per_state'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Permanent Pincode</label>
                  <input type="text" name="per_pincode" id="per_pincode" class="form-control" placeholder="Enter Permanent Pincode">
                  <span class="text-danger"><?php echo form_error('per_pincode'); ?></span>
                </div>
              </div>
              

            </div>
            <div class="form-row">


              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Permanent Country</label>
                  <input type="text" name="per_country" id="per_country" class="form-control" placeholder="Enter Permanent Country">
                  <span class="text-danger"><?php echo form_error('per_country'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Permanent Phone</label>
                  <input type="text" name="per_phone" id="per_phone" class="form-control" placeholder="Enter Permanent Phone">
                  <span class="text-danger"><?php echo form_error('per_phone'); ?></span>
                </div>
              </div>
             <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Mobile</label>
                  <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile">
                  <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Emergency No</label>
                  <input type="text" name="emrgy_no" id="emrgy_no" class="form-control" placeholder="Enter Emergency Number">
                  <span class="text-danger"><?php echo form_error('emrgy_no'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">


              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Email Id</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                  <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Domicile</label>
                  <input type="text" name="domicile" id="domicile" class="form-control" placeholder="Enter Domicile">
                  <span class="text-danger"><?php echo form_error('domicile'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Area</label>
                  <input type="text" name="area" id="area" class="form-control" placeholder="Enter Area">
                  <span class="text-danger"><?php echo form_error('area'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Birth Place</label>
                  <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="Enter Birth Place">
                  <span class="text-danger"><?php echo form_error('birth_place'); ?></span>
                </div>
              </div>

              </div>
            <div class="form-row">


              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Birth State</label>
                  <input type="text" name="birth_state" id="birth_state" class="form-control" placeholder="Enter Birth State">
                  <span class="text-danger"><?php echo form_error('birth_state'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Birth Country</label>
                  <input type="text" name="birth_country" id="birth_country" class="form-control" placeholder="Enter Birth Country">
                  <span class="text-danger"><?php echo form_error('birth_country'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Birth Pincode</label>
                  <input type="text" name="birth_pincode" id="birth_pincode" class="form-control" placeholder="Enter Birth Pincode">
                  <span class="text-danger"><?php echo form_error('birth_pincode'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Nationality</label>
                  <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Nationality">
                  <span class="text-danger"><?php echo form_error('nationality'); ?></span>
                </div>
              </div>

              </div>
            <!-- <div class="form-row">

              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="dsc-2">Adhaar Number </label>
                  <input type="text" name="adhaar" id="adhaar" class="form-control" value="<?php echo (set_value('adhaar')) ? set_value('adhaar') : $adhaar; ?>">
                  <span class="text-danger"><?php echo form_error('adhaar'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
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


              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">NRI</label>
                  <input type="text" name="nri" id="nri" class="form-control" placeholder="Enter NRI">
                  <span class="text-danger"><?php echo form_error('nri'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Religion</label>
                  <input type="text" name="religion" id="religion" class="form-control" placeholder="Enter Religion">
                  <span class="text-danger"><?php echo form_error('religion'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Caste</label>
                  <input type="text" name="caste" id="caste" class="form-control" placeholder="Enter Caste">
                  <span class="text-danger"><?php echo form_error('caste'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Sub-Caste</label>
                  <input type="text" name="sub_caste" id="sub_caste" class="form-control" placeholder="Enter Sub Caste">
                  <span class="text-danger"><?php echo form_error('sub_caste'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Mother Tongue</label>
                  <input type="text" name="mother_tongue" id="mother_tongue" class="form-control" placeholder="Enter Mother Tongue">
                  <span class="text-danger"><?php echo form_error('mother_tongue'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Disability</label>
                  <input type="text" name="disability" id="disability" class="form-control" placeholder="Enter Disability">
                  <span class="text-danger"><?php echo form_error('disability'); ?></span>
                </div>
              </div>
             <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Type of Disability</label>
                  <input type="text" name="type_of_disability" id="type_of_disability" class="form-control" placeholder="Enter Type of Disability">
                  <span class="text-danger"><?php echo form_error('type_of_disability'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Economically Backward</label>
                  <input type="text" name="economical_backward" id="economical_backward" class="form-control" placeholder="Enter Economical Backward">
                  <span class="text-danger"><?php echo form_error('economical_backward'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Hobbies</label>
                  <input type="text" name="hobbies" id="hobbies" class="form-control" placeholder="Enter Hobbies">
                  <span class="text-danger"><?php echo form_error('hobbies'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Sports</label>
                  <input type="text" name="sports" id="sports" class="form-control" placeholder="Enter Sports">
                  <span class="text-danger"><?php echo form_error('sports'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Sports Name</label>
                  <input type="text" name="sports_name" id="sports_name" class="form-control" placeholder="Enter Sports Name">
                  <span class="text-danger"><?php echo form_error('sports_name'); ?></span>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label class="label">Cultural Activities</label>
                  <input type="text" name="cultural_activities" id="cultural_activities" class="form-control" placeholder="Enter Cultural ACtivities">
                  <span class="text-danger"><?php echo form_error('cultural_activities'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Participated at</label>
                    <input type="text" name="participate_at" id="participate_at" class="form-control" placeholder="Enter Participate At">
                    <span class="text-danger"><?php echo form_error('participate_at'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Famous Personalities</label>
                    <input type="text" name="famous_personalities" id="famous_personalities" class="form-control" placeholder="Enter Famous Personalities">
                    <span class="text-danger"><?php echo form_error('famous_personalities'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">S/B account no</label>
                    <input type="text" name="sb_account_no" id="sb_account_no" class="form-control" placeholder="Enter SB Account Number">
                    <span class="text-danger"><?php echo form_error('sb_account_no'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Aadhar number</label>
                    <input type="text" name="aadhar_no" id="aadhar_no" class="form-control" placeholder="Enter Aadhar Number">
                    <span class="text-danger"><?php echo form_error('aadhar_no'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Residing at</label>
                    <input type="text" name="residing" id="residing" class="form-control" placeholder="Enter Residing At">
                    <span class="text-danger"><?php echo form_error('residing'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Traveling From</label>
                    <input type="text" name="travelling_from" id="travelling_from" class="form-control" placeholder="Enter Travelling From">
                    <span class="text-danger"><?php echo form_error('travelling_from'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Traveling To</label>
                    <input type="text" name="travelling_to" id="travelling_to" class="form-control" placeholder="Enter Travelling To">
                    <span class="text-danger"><?php echo form_error('travelling_to'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Occupation</label>
                    <input type="text" name="father_occupation" id="father_occupation" class="form-control" placeholder="Enter Father Occupation">
                    <span class="text-danger"><?php echo form_error('father_occupation'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father PAN No</label>
                    <input type="text" name="father_pan" id="father_pan" class="form-control" placeholder="Enter Father Pan Number">
                    <span class="text-danger"><?php echo form_error('father_pan'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Name</label>
                    <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter Father Name">
                    <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Name as per SSLC</label>
                    <input type="text" name="father_name_sslc" id="father_name_sslc" class="form-control" placeholder="Enter Father Name as per SSLC">
                    <span class="text-danger"><?php echo form_error('father_name_sslc'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Annual Income</label>
                    <input type="text" name="father_income" id="father_income" class="form-control" placeholder="Enter Fther Annual Income">
                    <span class="text-danger"><?php echo form_error('father_income'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Address</label>
                    <input type="text" name="father_address" id="father_address" class="form-control" placeholder="Enter Father Address">
                    <span class="text-danger"><?php echo form_error('father_address'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father EmailID</label>
                    <input type="text" name="father_email" id="father_email" class="form-control" placeholder="Enter Father EmailID">
                    <span class="text-danger"><?php echo form_error('father_email'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father City</label>
                    <input type="text" name="father_city" id="father_city" class="form-control" placeholder="Enter Father City">
                    <span class="text-danger"><?php echo form_error('father_city'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father State</label>
                    <input type="text" name="father_state" id="father_state" class="form-control" placeholder="Enter Father State">
                    <span class="text-danger"><?php echo form_error('father_state'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Pincode</label>
                    <input type="text" name="father_pincode" id="father_pincode" class="form-control" placeholder="Enter Father Pincode">
                    <span class="text-danger"><?php echo form_error('father_pincode'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Country</label>
                    <input type="text" name="father_country" id="father_country" class="form-control" placeholder="Enter Father Country">
                    <span class="text-danger"><?php echo form_error('father_country'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Mobile 1</label>
                    <input type="text" name="father_mbl1" id="father_mbl1" class="form-control" placeholder="Enter Father Mobile 1">
                    <span class="text-danger"><?php echo form_error('father_mbl1'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Mobile 2</label>
                    <input type="text" name="father_mbl2" id="father_mbl2" class="form-control" placeholder="Enter Father Mobile 2">
                    <span class="text-danger"><?php echo form_error('father_mbl2'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Telephone</label>
                    <input type="text" name="father_tel" id="father_tel" class="form-control" placeholder="Enter Father Telephone">
                    <span class="text-danger"><?php echo form_error('father_tel'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Occupation</label>
                    <input type="text" name="mother_occupation" id="mother_occupation" class="form-control" placeholder="Enter Mother Occupation">
                    <span class="text-danger"><?php echo form_error('mother_occupation'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Pan no</label>
                    <input type="text" name="mother_pan" id="mother_pan" class="form-control" placeholder="Enter Mother Pan No">
                    <span class="text-danger"><?php echo form_error('mother_pan'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Name</label>
                    <input type="text" name="mother_name" id="mother_name" class="form-control" placeholder="Enter Mother Name">
                    <span class="text-danger"><?php echo form_error('mother_name'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother  Annual Income</label>
                    <input type="text" name="mother_income" id="mother_income" class="form-control" placeholder="Enter Mother Income">
                    <span class="text-danger"><?php echo form_error('mother_income'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Address</label>
                    <input type="text" name="mother_address" id="mother_address" class="form-control" placeholder="Enter Mother Address">
                    <span class="text-danger"><?php echo form_error('mother_address'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother EmailID</label>
                    <input type="text" name="mother_email" id="mother_email" class="form-control" placeholder="Enter Mother EmailId">
                    <span class="text-danger"><?php echo form_error('mother_email'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother City</label>
                    <input type="text" name="mother_city" id="mother_city" class="form-control" placeholder="Enter Mother City">
                    <span class="text-danger"><?php echo form_error('mother_city'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother State</label>
                    <input type="text" name="mother_state" id="mother_state" class="form-control" placeholder="Enter Mother State">
                    <span class="text-danger"><?php echo form_error('mother_state'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Pincode</label>
                    <input type="text" name="mother_pincode" id="mother_pincode" class="form-control" placeholder="Enter Mother Pincode">
                    <span class="text-danger"><?php echo form_error('mother_pincode'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Country</label>
                    <input type="text" name="mother_country" id="mother_country" class="form-control" placeholder="Enter Mother Country">
                    <span class="text-danger"><?php echo form_error('mother_country'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Mobile 1</label>
                    <input type="text" name="mother_mbl1" id="mother_mbl1" class="form-control" placeholder="Enter Mother Mobile 1">
                    <span class="text-danger"><?php echo form_error('mother_mbl1'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Mobile 2</label>
                    <input type="text" name="mother_mbl2" id="mother_mbl2" class="form-control" placeholder="Enter Mother Mobile 2">
                    <span class="text-danger"><?php echo form_error('mother_mbl2'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Telephone</label>
                    <input type="text" name="mother_tel" id="mother_tel" class="form-control" placeholder="Enter Mother Telephone">
                    <span class="text-danger"><?php echo form_error('mother_tel'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Occupation</label>
                    <input type="text" name="guardian_occupation" id="guardian_occupation" class="form-control" placeholder="Enter Guardian Occupation">
                    <span class="text-danger"><?php echo form_error('guardian_occupation'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Name</label>
                    <input type="text" name="guardian_name" id="guardian_name" class="form-control" placeholder="Enter Guardian Name">
                    <span class="text-danger"><?php echo form_error('guardian_name'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Address</label>
                    <input type="text" name="guardian_address" id="guardian_address" class="form-control" placeholder="Enter Guardian Address">
                    <span class="text-danger"><?php echo form_error('guardian_address'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian City</label>
                    <input type="text" name="guardian_city" id="guardian_city" class="form-control" placeholder="Enter Guardian City">
                    <span class="text-danger"><?php echo form_error('guardian_city'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian State</label>
                    <input type="text" name="guardian_state" id="guardian_state" class="form-control" placeholder="Enter Guardian State">
                    <span class="text-danger"><?php echo form_error('guardian_state'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Pincode</label>
                    <input type="text" name="guardian_pincode" id="guardian_pincode" class="form-control" placeholder="Enter Guardian Pincode">
                    <span class="text-danger"><?php echo form_error('guardian_pincode'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Mobile 1</label>
                    <input type="text" name="guardian_mbl1" id="guardian_mbl1" class="form-control" placeholder="Enter Guardian Mobile 1">
                    <span class="text-danger"><?php echo form_error('guardian_mbl1'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Mobile 2</label>
                    <input type="text" name="guardian_mbl2" id="guardian_mbl2" class="form-control" placeholder="Enter Guardian Mobile 2">
                    <span class="text-danger"><?php echo form_error('guardian_mbl2'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Telephone</label>
                    <input type="text" name="guardian_tel" id="guardian_tel" class="form-control" placeholder="Enter Guardian Telephone">
                    <span class="text-danger"><?php echo form_error('guardian_tel'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office Address</label>
                    <input type="text" name="father_ofc_address" id="father_ofc_address" class="form-control" placeholder="Enter Father Office Address">
                    <span class="text-danger"><?php echo form_error('father_ofc_address'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office City</label>
                    <input type="text" name="father_ofc_city" id="father_ofc_city" class="form-control" placeholder="Enter Father Office City">
                    <span class="text-danger"><?php echo form_error('father_ofc_city'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office State</label>
                    <input type="text" name="father_ofc_state" id="father_ofc_state" class="form-control" placeholder="Enter Father Office State">
                    <span class="text-danger"><?php echo form_error('father_ofc_state'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office Country</label>
                    <input type="text" name="father_ofc_country" id="father_ofc_country" class="form-control" placeholder="Enter Father Office Country">
                    <span class="text-danger"><?php echo form_error('father_ofc_country'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office Pincode</label>
                    <input type="text" name="father_ofc_pincode" id="father_ofc_pincode" class="form-control" placeholder="Enter Father Office Pincode">
                    <span class="text-danger"><?php echo form_error('father_ofc_pincode'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office EmailID</label>
                    <input type="text" name="father_ofc_email" id="father_ofc_email" class="form-control" placeholder="Enter Father Office EmailId">
                    <span class="text-danger"><?php echo form_error('father_ofc_email'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office Mobile No 1</label>
                    <input type="text" name="father_ofc_mbl1" id="father_ofc_mbl1" class="form-control" placeholder="Enter Father Office Mobile 1">
                    <span class="text-danger"><?php echo form_error('father_ofc_mbl1'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office Mobile No 2</label>
                    <input type="text" name="father_ofc_mbl2" id="father_ofc_mbl2" class="form-control" placeholder="Enter Father Office Mobile 2">
                    <span class="text-danger"><?php echo form_error('father_ofc_mbl2'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Father Office Phone with STDCode</label>
                    <input type="text" name="father_std" id="father_std" class="form-control" placeholder="Enter Father Office Phone with STD Code">
                    <span class="text-danger"><?php echo form_error('father_std'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office Address</label>
                    <input type="text" name="mother_ofc_address" id="mother_ofc_address" class="form-control" placeholder="Enter Mother Office Address">
                    <span class="text-danger"><?php echo form_error('mother_ofc_address'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office City</label>
                    <input type="text" name="mother_ofc_city" id="mother_ofc_city" class="form-control" placeholder="Enter Mother Office City">
                    <span class="text-danger"><?php echo form_error('mother_ofc_city'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office State</label>
                    <input type="text" name="mother_ofc_state" id="mother_ofc_state" class="form-control" placeholder="Enter Mother Office State">
                    <span class="text-danger"><?php echo form_error('mother_ofc_state'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office Country</label>
                    <input type="text" name="mother_ofc_country" id="mother_ofc_country" class="form-control" placeholder="Enter Mother Office Country">
                    <span class="text-danger"><?php echo form_error('mother_ofc_country'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office PinCode</label>
                    <input type="text" name="mother_ofc_pincode" id="mother_ofc_pincode" class="form-control" placeholder="Enter Mother Office Pincode">
                    <span class="text-danger"><?php echo form_error('mother_ofc_pincode'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office EmailID</label>
                    <input type="text" name="mother_ofc_email" id="mother_ofc_email" class="form-control" placeholder="Enter Mother Office EmailId">
                    <span class="text-danger"><?php echo form_error('mother_ofc_email'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office Mobile No 1</label>
                    <input type="text" name="mother_ofc_mbl1" id="mother_ofc_mbl1" class="form-control" placeholder="Enter Mother Office Mobile 1">
                    <span class="text-danger"><?php echo form_error('mother_ofc_mbl1'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office Mobile No 2</label>
                    <input type="text" name="mother_ofc_mbl2" id="mother_ofc_mbl2" class="form-control" placeholder="Enter Mother Office Mobile 2">
                    <span class="text-danger"><?php echo form_error('mother_ofc_mbl2'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Mother Office Phone with STDCode</label>
                    <input type="text" name="mother_std" id="mother_std" class="form-control" placeholder="Enter Mother Office Phone with STD code">
                    <span class="text-danger"><?php echo form_error('mother_std'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office Address</label>
                    <input type="text" name="guardian_ofc_address" id="guardian_ofc_address" class="form-control" placeholder="Enter Guardian Office Address">
                    <span class="text-danger"><?php echo form_error('guardian_ofc_address'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office City</label>
                    <input type="text" name="guardian_ofc_city" id="guardian_ofc_city" class="form-control" placeholder="Enter Guardian office City">
                    <span class="text-danger"><?php echo form_error('guardian_ofc_city'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office State</label>
                    <input type="text" name="guardian_ofc_state" id="guardian_ofc_state" class="form-control" placeholder="Enter Guardian Office State">
                    <span class="text-danger"><?php echo form_error('guardian_ofc_state'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office Country</label>
                    <input type="text" name="guardian_ofc_country" id="guardian_ofc_country" class="form-control" placeholder="Enter Guardian Office Country">
                    <span class="text-danger"><?php echo form_error('guardian_ofc_country'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office Pincode</label>
                    <input type="text" name="guardian_ofc_pincode" id="guardian_ofc_pincode" class="form-control" placeholder="Enter Guardian Office Pincode">
                    <span class="text-danger"><?php echo form_error('guardian_ofc_pincode'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office EmailID</label>
                    <input type="text" name="guardian_ofc_email" id="guardian_ofc_email" class="form-control" placeholder="Enter Guardian Office EmailId">
                    <span class="text-danger"><?php echo form_error('guardian_ofc_email'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office Mobile 1</label>
                    <input type="text" name="guardian_ofc_mbl1" id="guardian_ofc_mbl1" class="form-control" placeholder="Enter Guardian Office Mobile 1">
                    <span class="text-danger"><?php echo form_error('guardian_ofc_mbl1'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office Mobile 2</label>
                    <input type="text" name="guardian_ofc_mbl2" id="guardian_ofc_mbl2" class="form-control" placeholder="Enter Guardian Office mobile 2">
                    <span class="text-danger"><?php echo form_error('guardian_ofc_mbl2'); ?></span>
                </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <label class="label">Guardian Office Phone with STDCode</label>
                    <input type="text" name="guardian_std" id="guardian_std" class="form-control" placeholder="Enter Guardian Office Phone with STD Code">
                    <span class="text-danger"><?php echo form_error('guardian_std'); ?></span>
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