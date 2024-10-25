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

                      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <input type="hidden" name="report_type" id="report_type" value="<?= $report_type; ?>">
                          <?php
                            echo $enquiries;
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


              var report = $("#report_type").val();

              $("#get_details").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Downloading...');
              $("#get_details").prop('disabled', true);

              //$("#res").hide();
              //$("#process").show();


              if (report == "7") {
                  $.ajax({
                      'type': 'POST',
                      'url': base_url + 'admin/mtechreport/7/1',
                      'data': {
                          'report': report
                      },
                      'dataType': 'json',
                      'cache': false,
                      'success': function(data) {
                          var filename = "All Mtech Enquiries Report.xls";
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
              }
             
              if (report == "8") {
                  $.ajax({
                      'type': 'POST',
                      'url': base_url + 'admin/mtechreport/8/1',
                      'data': {
                          'report': report
                      },
                      'dataType': 'json',
                      'cache': false,
                      'success': function(data) {
                          var filename = "Mtech ⁠Non-Karnataka Enquiries Report.xls";
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

              }
              if (report == "9") {
                  $.ajax({
                      'type': 'POST',
                      'url': base_url + 'admin/mtechreport/9/1',
                      'data': {
                          'report': report
                      },
                      'dataType': 'json',
                      'cache': false,
                      'success': function(data) {
                          var filename = "Mtech ⁠Sports Quota Enquiries Report.xls";
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

              }


          });


      });
  </script>