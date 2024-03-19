  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Education Details From</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Education Details</li>
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
                  <label for="student_name">School Level</label>
                  <input type="text" name="schl_level" id="schl_level" class="form-control" placeholder="Enter School Level">
                  <span class="text-danger"><?php echo form_error('schl_level'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="text">School Type</label>
                  <input type="text" name="schl_type" id="schl_type" class="form-control" placeholder="Enter School Type">
                  <span class="text-danger"><?php echo form_error('schl_type'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">School Board</label>
                  <input type="text" name="schl_board" id="schl_board" class="form-control" placeholder="Enter School Board">
                  <span class="text-danger"><?php echo form_error('schl_board'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">School Name</label>
                  <input type="text" name="schl_name" id="schl_name" class="form-control" placeholder="Enter School Name">
                  <span class="text-danger"><?php echo form_error('schl_name'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">

              <div class="col">
                <div class="form-group">
                  <label for="par_name">School City</label>
                  <input type="text" name="schl_city" id="schl_city" class="form-control" placeholder="Enter School City">
                  <span class="text-danger"><?php echo form_error('schl_city'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="text">School Year</label>
                  <input type="number" name="schl_yr" id="schl_yr" class="form-control" placeholder="Enter School Year">
                  <span class="text-danger"><?php echo form_error('schl_yr'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">School State</label>
                  <input type="text" name="schl_state" id="schl_state" class="form-control" placeholder="Enter School State">
                  <span class="text-danger"><?php echo form_error('schl_state'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email">School Country</label>
                  <input type="text" name="schl_country" id="schl_country" class="form-control" placeholder="Enter School Country">
                  <span class="text-danger"><?php echo form_error('schl_country'); ?></span>
                </div>
              </div>

            </div>

            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Medium of Instruction</label>
                  <input type="text" name="schl_mdm" id="schl_mdm" class="form-control" placeholder="Enter Medium of Instruction">
                  <span class="text-danger"><?php echo form_error('schl_mdm'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Percentage</label>
                  <input type="text" name="schl_percentage" id="schl_percentage" class="form-control" placeholder="Enter School Percentage">
                  <span class="text-danger"><?php echo form_error('schl_percentage'); ?></span>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="register_number">Marks Card No</label>
                  <input type="text" name="schl_mrks" id="schl_mrks" class="form-control" placeholder="Enter School Percentage">
                  <span class="text-danger"><?php echo form_error('schl_mrks'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">PU College Level</label>
                  <input type="text" name="pu_level" id="pu_level" class="form-control" placeholder="Enter PU College Level">
                  <span class="text-danger"><?php echo form_error('pu_level'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU College Type</label>
                  <input type="text" name="pu_typ" id="pu_typ" class="form-control" placeholder="Enter PU College Type">
                  <span class="text-danger"><?php echo form_error('pu_typ'); ?></span>
                </div>
              </div>
             <div class="col">
                <div class="form-group">
                  <label for="register_number">PU College Board</label>
                  <input type="text" name="pu_board" id="pu_board" class="form-control" placeholder="Enter PU College Board">
                  <span class="text-danger"><?php echo form_error('pu_board'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU College Name</label>
                  <input type="text" name="pu_name" id="pu_name" class="form-control" placeholder="Enter PU College Name">
                  <span class="text-danger"><?php echo form_error('pu_name'); ?></span>
                </div>
              </div>

            </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">PU College City</label>
                  <input type="text" name="pu_city" id="pu_city" class="form-control" placeholder="Enter PU College City">
                  <span class="text-danger"><?php echo form_error('pu_city'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU College Year</label>
                  <input type="text" name="pu_year" id="pu_year" class="form-control" placeholder="Enter PU College Year">
                  <span class="text-danger"><?php echo form_error('pu_year'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU College State</label>
                  <input type="text" name="pu_state" id="pu_state" class="form-control" placeholder="Enter PU College State">
                  <span class="text-danger"><?php echo form_error('pu_state'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU College Country</label>
                  <input type="text" name="pu_country" id="pu_country" class="form-control" placeholder="Enter PU College Country">
                  <span class="text-danger"><?php echo form_error('pu_country'); ?></span>
                </div>
              </div>

              </div>
            <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">PU Medium of Instruction</label>
                  <input type="text" name="pu_mdm" id="pu_mdm" class="form-control" placeholder="Enter PU Medium of Instruction">
                  <span class="text-danger"><?php echo form_error('pu_mdm'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU Percentage</label>
                  <input type="text" name="pu_percentage" id="pu_percentage" class="form-control" placeholder="Enter PU Percentage">
                  <span class="text-danger"><?php echo form_error('pu_percentage'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU Marks Card No</label>
                  <input type="text" name="pu_marks" id="pu_marks" class="form-control" placeholder="Enter PU Marks">
                  <span class="text-danger"><?php echo form_error('pu_marks'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU PCM Percentage</label>
                  <input type="text" name="pu_pcm_percentage" id="pu_pcm_percentage" class="form-control" placeholder="Enter PU PCM Percentage">
                  <span class="text-danger"><?php echo form_error('pu_pcm_percentage'); ?></span>
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
                  <label for="exam_board">PU Degree Name</label>
                  <input type="text" name="pu_dgr_name" id="pu_dgr_name" class="form-control" placeholder="Enter PU Degree Name">
                  <span class="text-danger"><?php echo form_error('pu_dgr_name'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU Marks</label>
                  <input type="text" name="pu_mark" id="pu_mark" class="form-control" placeholder="Enter PU Marks">
                  <span class="text-danger"><?php echo form_error('pu_mark'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">PU PCM Total</label>
                  <input type="text" name="pcm_total" id="pcm_total" class="form-control" placeholder="Enter PCM Total">
                  <span class="text-danger"><?php echo form_error('pcm_total'); ?></span>
                </div>
              </div>
              
              </div>
              <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Diploma College Level</label>
                  <input type="text" name="dplm_level" id="dplm_level" class="form-control" placeholder="Enter Diploma College Level">
                  <span class="text-danger"><?php echo form_error('dplm_level'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Diploma College Type</label>
                  <input type="text" name="dplm_type" id="dplm_type" class="form-control" placeholder="Enter Diploma College Type">
                  <span class="text-danger"><?php echo form_error('dplm_type'); ?></span>
                </div>
              </div>
             <div class="col">
                <div class="form-group">
                  <label for="register_number">Diploma College Board</label>
                  <input type="text" name="dplm_board" id="dplm_board" class="form-control" placeholder="Enter Diploma College Board">
                  <span class="text-danger"><?php echo form_error('dplm_board'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Diploma College Name</label>
                  <input type="text" name="dplm_clg_name" id="dplm_clg_name" class="form-control" placeholder="Enter Diploma College Name">
                  <span class="text-danger"><?php echo form_error('dplm_clg_name'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


              <div class="col">
                <div class="form-group">
                  <label for="exam_board">Diploma College City</label>
                  <input type="text" name="dplm_city" id="dplm_city" class="form-control" placeholder="Enter Diploma College City">
                  <span class="text-danger"><?php echo form_error('dplm_city'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Diploma College Year</label>
                  <input type="text" name="dplm_yr" id="dplm_yr" class="form-control" placeholder="Enter Diploma College Year">
                  <span class="text-danger"><?php echo form_error('dplm_yr'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Diploma College State</label>
                  <input type="text" name="dplm_state" id="dplm_state" class="form-control" placeholder="Enter Diploma College State">
                  <span class="text-danger"><?php echo form_error('dplm_state'); ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="register_number">Diploma College Country</label>
                  <input type="text" name="dplm_country" id="dplm_country" class="form-control" placeholder="Enter Diploma College Country">
                  <span class="text-danger"><?php echo form_error('dplm_country'); ?></span>
                </div>
              </div>

              </div>
              <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Diploma Medium of Instruction</label>
                    <input type="text" name="dplm_mdm" id="dplm_mdm" class="form-control" placeholder="Enter Diploma Medium of Instruction">
                    <span class="text-danger"><?php echo form_error('dplm_mdm'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Diploma Percentage</label>
                    <input type="text" name="dplm_percentage" id="dplm_percentage" class="form-control" placeholder="Enter Diploma Percentage">
                    <span class="text-danger"><?php echo form_error('dplm_percentage'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Diploma Marks Card No</label>
                    <input type="text" name="dplm_marks" id="dplm_marks" class="form-control" placeholder="Enter Diploma Marks">
                    <span class="text-danger"><?php echo form_error('dplm_marks'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Degree College Level</label>
                    <input type="text" name="dgr_level" id="dgr_level" class="form-control" placeholder="Enter Degree College Level">
                    <span class="text-danger"><?php echo form_error('dgr_level'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Degree College Type</label>
                    <input type="text" name="dgr_typ" id="dgr_typ" class="form-control"  placeholder="Enter Degree College Type">
                    <span class="text-danger"><?php echo form_error('dgr_typ'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Degree College Board</label>
                    <input type="text" name="dgr_board" id="dgr_board" class="form-control"  placeholder="Enter Degree College Board">
                    <span class="text-danger"><?php echo form_error('dgr_board'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Degree College Name</label>
                    <input type="text" name="dgr_name" id="dgr_name" class="form-control"  placeholder="Enter Degree College Name">
                    <span class="text-danger"><?php echo form_error('dgr_name'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Degree College City</label>
                    <input type="text" name="dgr_city" id="dgr_city" class="form-control"  placeholder="Enter Degree College City">
                    <span class="text-danger"><?php echo form_error('dgr_city'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Degree College Year</label>
                    <input type="text" name="dgr_yr" id="dgr_yr" class="form-control"  placeholder="Enter Degree College Year">
                    <span class="text-danger"><?php echo form_error('dgr_yr'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Degree College State</label>
                    <input type="text" name="dgr_state" id="dgr_state" class="form-control"  placeholder="Enter Degree College State">
                    <span class="text-danger"><?php echo form_error('dgr_state'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Degree College Country</label>
                    <input type="text" name="dgr_country" id="dgr_country" class="form-control"  placeholder="Enter Degree College Country">
                    <span class="text-danger"><?php echo form_error('dgr_country'); ?></span>
                </div>
                </div>

                </div>
                <div class="form-row">


                <div class="col">
                <div class="form-group">
                    <label for="exam_board">Degree Medium of Instruction</label>
                    <input type="text" name="dgr_mdm" id="dgr_mdm" class="form-control"  placeholder="Enter Degree Medium of Instruction">
                    <span class="text-danger"><?php echo form_error('dgr_mdm'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Degree Percentage</label>
                    <input type="text" name="dgr_percentage" id="dgr_percentage" class="form-control" placeholder="Enter Degree Percentage">
                    <span class="text-danger"><?php echo form_error('dgr_percentage'); ?></span>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="register_number">Degree Marks Card No</label>
                    <input type="text" name="dgr_markscard_no" id="dgr_markscard_no" class="form-control" placeholder="Enter Degree Marks Card Number">
                    <span class="text-danger"><?php echo form_error('dgr_markscard_no'); ?></span>
                </div>
                </div>

                </div>


              <div class="form-group row">
              <div class="col-sm-2"> &nbsp;</div>
              <div class="col-sm-10 text-right">
                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i class="fas fa-edit"></i> Submit </button>
                <?php echo anchor('admin/enquiries/', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
              </div>
            </div>

            </form>
          </div>
        </div>

      </div>
    </section>
  </div>
  <script>
    $(document).ready(function() {

      var base_url = '<?php echo base_url(); ?>';

      $('#mobile').keypress(function(e) {
        if ($(this).val().length < 10) {
          var a = [];
          var k = e.which;

          for (i = 48; i < 58; i++)
            a.push(i);

          if (!(a.indexOf(k) >= 0))
            e.preventDefault();
        } else {
          event.preventDefault();
          return false;
        }
      });

      $('#email').keyup(function() {
        $(this).val($(this).val().toLowerCase());
      });

      $("#course1").change(function() {
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
    });
  </script>