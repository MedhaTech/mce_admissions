  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- Main content -->
          <div class="content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">

                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      <?=$page_title;?>
                                  </h3>
                              </div>
                              <div class="card-body">
                                  <table class="table table-hover">
                                      <thead>
                                          <tr>
                                              <th width="5%">S.No</th>
                                              <th width="20%">Stream</th>
                                              <th width="35%">Department</th>
                                              <th width="15%">Total Intake</th>
                                              <th width="15%">MGMT INTAKE</th>
                                              <th width="15%">COLLEGE INTAKE</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php $i=1;  
                                            foreach ($details as $details1) {
                                                echo "<tr>";
                                                echo "<td>".$i++.".</td>";
                                                echo "<td>".$details1->stream_name.' ['.$details1->stream_short_name.']'."</td>";
                                                echo "<td>".$details1->department_name.' ['.$details1->department_short_name.']'."</td>";
                                                echo "<td>".$details1->intake."</td>";
                                                echo "<td>".$details1->mgmt_intake."</td>";
                                                echo "<td>".$details1->college_intake."</td>";
                                                echo "</tr>";
                                            } 
                                           ?>
                                  </table>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </section>
  </div>
  <!-- End of Main Content -->