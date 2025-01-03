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
                              <button type="submit" class="btn btn-danger btn-sm" name="download" id="get_details"><i class="fas fa-download"></i> Download </button>
                                  <?php echo anchor('admin/reports', '<span class="icon"><i class="fas fa-arrow-left"></i></span> <span class="text">Back to List</span>', 'class="btn btn-secondary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
                              </li>
                              <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                          </ul>
                      </div>
</div>
                      <div class="card-body">
                      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <?php
                          echo $table;
                          ?>
                      </div>
            
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


              var admissions = $("#admissions").val();

              $("#get_details").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Downloading...');
              $("#get_details").prop('disabled', true);

              //$("#res").hide();
              //$("#process").show();


    
                  $.ajax({
                      'type': 'POST',
                      'url': base_url + 'admin/consolidated_report/1',
                      'data': {
                          'admissions': admissions
                      },
                      'dataType': 'json',
                      'cache': false,
                      'success': function(data) {
                          var filename = "consolidated Student Report.xls";
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

