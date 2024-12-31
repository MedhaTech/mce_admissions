  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="card card-info shadow">
                  <div class="card-header">
                      <h3 class="card-title">
                          <?= $page_title; ?>
                      </h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                  <button class="btn btn-danger btn-sm" id="get_details" type="submit">Download</button>
                                  <?php echo anchor('admin/reports', '<span class="icon"><i class="fas fa-arrow-left"></i></span> <span class="text">Back to List</span>', 'class="btn btn-secondary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
                              </li>
                              <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
                      <?php echo form_open_multipart($action, 'class="user"'); ?>

                      <div class="form-row">

                         <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                 
                              <p> Category Allotted</p>
                              <?php 
                                 echo form_dropdown('category_allotted', $type_options, (set_value('category_allotted')) ? set_value('category_allotted') : $category_allotted, 'class="form-control form-control" id="category_allotted"'); 
                              ?>
                                  <span class="text-danger"><?php echo form_error('category_allotted'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                 
                              <p> Category Claimed</p>
                              <?php 
                                 echo form_dropdown('category_claimed', $claimed_options, (set_value('category_claimed')) ? set_value('category_claimed') : $category_claimed, 'class="form-control form-control" id="category_claimed"'); 
                              ?>
                                  <span class="text-danger"><?php echo form_error('category_claimed'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                              <p> Gender </p>
                                  <?php $gender_options = array("all" => "All", "Male" => "Male", "Female" => "Female", "Not Prefer to Say" => "Not Prefer to Say"); echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control" id="gender"'); ?>
                                  <span class="text-danger"><?php echo form_error('gender'); ?></span>
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                              <label for="category_allotted">&nbsp;
                                  </label>
                              <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                              class="fas fa-edit"></i> Filter </button>
                              </div>
                          </div>

                      </div>
                      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <?php
                          echo $admissions;
                          ?>
                      </div>
                  </div>
                
              </div>
          </div>
      </section>
  </div>


  <script>
      $(document).ready(function() {
          var base_url = '<?php echo base_url(); ?>';


          $("#get_details").click(function() {
              event.preventDefault();


              var category = $("#category").val();

              $("#get_details").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Downloading...');
              $("#get_details").prop('disabled', true);

              //$("#res").hide();
              //$("#process").show();


    
                  $.ajax({
                      'type': 'POST',
                      'url': base_url + 'admin/category_admissions_report/1',
                      'data': {
                          'category': category
                      },
                      'dataType': 'json',
                      'cache': false,
                      'success': function(data) {
                          var filename = "Category wise Admission Report.xls";
                          var $a = $("<a>");
                          $a.attr("href", data.file);
                          $("body").append($a);
                          $a.attr("download", filename);
                          $a[0].click();
                          $a.remove();
                          $("#get_details").html('Download');
                          $("#get_details").prop('disabled', false);
                      }
                  });
            


          });


      });
  </script>