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
                              <div class="card-header bg-dark">
                                  <h3 class="card-title">
                                      <?=$page_title;?>
                                  </h3>
                              </div>
                              <div class="card-body">
                                  <table class="table table-hover text-center">
                                      <thead>
                                          <tr>
                                              <th width="10%">S.NO</th>
                                              <th width="20%">Stream</th>
                                              <th width="70%" class="text-left">DEPARTMENT</th>
                                              <!-- <th width="15%">TOTAL <br /> INTAKE</th> -->
                                              <!-- <th width="15%">MGMT <br /> INTAKE</th> -->
                                              <!-- <th width="15%">COLLEGE <br /> INTAKE</th> -->
                                              <!-- <th width="15%">COMED-K <br /> INTAKE</th> -->
                                              <!-- <th width="15%">KEA <br /> INTAKE</th> -->
                                              <!-- <th width="15%">SNQ <br /> INTAKE</th> -->
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php $i=1;  
                                            foreach ($details as $details1) {
                                                echo "<tr>";
                                                echo "<td>".$i++.".</td>";
                                                echo "<td>".$details1->stream_name."</td>";
                                                echo "<td class='text-left'>".$details1->department_name.' ['.$details1->department_short_name.']'."</td>";
                                                // echo "<td class='text-center font-weight-bold'>".$details1->intake."</td>";
                                                // echo "<td class='bg-gray-light'>".$details1->mgmt_intake."</td>";
                                                // echo "<td class=''>".$details1->college_intake."</td>";
                                                // echo "<td>".$details1->comed_k_intake."</td>";
                                                // echo "<td>".$details1->kea_intake."</td>";
                                                // echo "<td>".$details1->snq_intake."</td>";
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