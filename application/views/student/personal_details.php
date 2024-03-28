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

        <div class="card card-info shadow">
        <div class="card-header py-3 d-flex flex-row align-items-start justify-content">
                      <!-- <h6 class="m-0"><?= $page_title; ?></h6> -->
          <h6 class="m-0">Personal Details</h6>
        </div>
          <div class="card-body">
            <form action="https://bmscw.edu.in/admissions/student/profile_details" name="form" novalidate method="post" accept-charset="utf-8">
            <div class="row">
             <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" placeholder="Enter DOB" id="date_of_birth" value="<?php echo (set_value('date_of_birth')) ? set_value('date_of_birth') : $date_of_birth; ?>"name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
              <div class="form-group">
                <label class="label">Gender<span class="text-danger">*</span></label>
                 <?php $gender_options = array(" "=>"Select Gender","Male"=>"Male","Female"=>"Female","Not Prefer to Say"=>"Not Prefer to Say");
                  echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control form-control-sm" id="gender"'); 
                 ?>
                <span
                  class="text-danger"><?php echo form_error('gender'); ?></span>
               </div>
              </div>
               <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Sports</label>
                    <input type="text" class="form-control" placeholder="Enter Sports" id="sports" value="<?php echo (set_value('sports')) ? set_value('sports') : $sports; ?>" name="sports">
    		            <span class="text-danger"><?php echo form_error('sports'); ?></span>
                  </div>
              </div>
               <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Blood Group</label>
                    <input type="text" class="form-control" placeholder="Enter Blood Group" id="blood_group" value="<?php echo (set_value('blood_group')) ? set_value('blood_group') : $blood_group; ?>" name="blood_group">
    		            <span class="text-danger"><?php echo form_error('blood_group'); ?></span>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Birth Place</label>
                    <input type="text" class="form-control" placeholder="Enter Birth Place" id="place_of_birth" value="<?php echo (set_value('place_of_birth')) ? set_value('place_of_birth') : $place_of_birth; ?>" name="place_of_birth">
    		            <span class="text-danger"><?php echo form_error('place_of_birth'); ?></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Country of Birth</label>
                    <input type="text" class="form-control" placeholder="Enter Nationality" id="country_of_birth" value="<?php echo (set_value('country_of_birth')) ? set_value('country_of_birth') : $country_of_birth; ?>" name="country_of_birth">
    		            <span class="text-danger"><?php echo form_error('country_of_birth'); ?></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Nationality</label>
                    <input type="text" class="form-control" placeholder="Enter Nationality" id="religion" value="<?php echo (set_value('nationality')) ? set_value('nationality') : $nationality; ?>" name="nationality">
    		            <span class="text-danger"><?php echo form_error('nationality'); ?></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Religion</label>
                    <input type="text" class="form-control" placeholder="Enter Religion" id="religion" value="<?php echo (set_value('religion')) ? set_value('religion') : $religion; ?>" name="religion">
    		            <span class="text-danger"><?php echo form_error('religion'); ?></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Caste</label>
                    <input type="text" class="form-control" placeholder="Enter Caste" id="caste" value="<?php echo (set_value('caste')) ? set_value('caste') : $caste; ?>" name="caste">
    		            <span class="text-danger"><?php echo form_error('caste'); ?></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Mother Tongue</label>
                    <input type="text" class="form-control" placeholder="Enter Mother Tongue" id="mother_tongue" value="<?php echo (set_value('mother_tongue')) ? set_value('mother_tongue') : $mother_tongue; ?>" name="mother_tongue">
    		        <span class="text-danger"><?php echo form_error('mother_tongue'); ?></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Disability</label>
                    <input type="text" class="form-control" placeholder="Enter Disability" id="religion" name="religion">
    		        <span class="text-danger"></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Type of Disability</label>
                    <input type="text" class="form-control" placeholder="Enter Type of Disability" id="caste" name="caste">
    		        <span class="text-danger"></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Economically Backward</label>
                    <input type="text" class="form-control" placeholder="Enter Economically Backward" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
              </div>
              <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <label class="form-label">Hobbies</label>
                    <input type="text" class="form-control" placeholder="Enter Hobbies" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">    
                  <label class="form-label text-primary">CURRENT ADDRESS</label>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Current Address</label>
                    <input type="text" class="form-control" placeholder="Enter Current Address" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Current City</label>
                    <input type="text" class="form-control" placeholder="Enter Current City" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                    <label class="form-label">Current State</label>
                    <input type="text" class="form-control" placeholder="Enter Current State" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Current Country</label>
                    <input type="text" class="form-control" placeholder="Enter Current Country" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Current Pincode</label>
                    <input type="text" class="form-control" placeholder="Enter Current Pincode" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
              </div>
              <div class="col-md-6">    
                  <div class="form-group row m-0">
                    <label class="form-label col-md-6 text-primary">PERMANENT ADDRESS</label>
                    <div class="col-md-6 custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="form-label custom-control-label" for="customCheck1">Same As Present Address</label>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Permanent Address</label>
                    <input type="text" class="form-control" placeholder="Enter Permanent Address" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Permanent City</label>
                    <input type="text" class="form-control" placeholder="Enter Permanent State" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Permanent State</label>
                    <input type="text" class="form-control" placeholder="Enter Permanent State" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Permanent Country</label>
                    <input type="text" class="form-control" placeholder="Enter Permanent Country" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                    <label class="form-label">Permanent Pincode</label>
                    <input type="text" class="form-control" placeholder="Enter Permanent Pincode" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
              </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">    
                  <label class="form-label text-primary">FATHER DETAILS</label>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Mobile</label>
                    <input type="text" class="form-control" placeholder="Enter Mobile" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Enter Email" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Occupation</label>
                    <input type="text" class="form-control" placeholder="Enter Occupation" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">  
                  <label class="form-label">Annual Income</label>
                    <input type="text" class="form-control" placeholder="Enter Annual Income" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">    
                  <label class="form-label text-primary">MOTHER DETAILS</label>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Mobile</label>
                    <input type="text" class="form-control" placeholder="Enter Mobile" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Enter Email" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Occupation</label>
                    <input type="text" class="form-control" placeholder="Enter Occupation" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Annual Income</label>
                    <input type="text" class="form-control" placeholder="Enter Annual Income" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">    
                  <label class="form-label text-primary">GUARDIAN DETAILS</label>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Mobile</label>
                    <input type="text" class="form-control" placeholder="Enter Mobile" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Enter Email" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Occupation</label>
                    <input type="text" class="form-control" placeholder="Enter Occupation" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">    
                  <label class="form-label">Annual Income</label>
                    <input type="text" class="form-control" placeholder="Enter Annual Income" id="date_of_birth" name="date_of_birth">
    		            <span class="text-danger"><?php echo form_error('date_of_birth'); ?></span>
                  </div>
                </div>
            </div>
            <hr>
            <div class="row m-2">
                <div class="col-12 text-right">
                                      <button class="btn btn-danger btn-sm" type="submit">Update Details</button>
                   <a href="#" class="btn btn-secondary btn-sm">Cancel</a>                </div>
            </div>
            </form>          </div>
        </div>
        </div>

      </div>
    </section>
  </div>