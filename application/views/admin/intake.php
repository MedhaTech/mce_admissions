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
                                  <table class="table table-hover text-center table-sm">
                                      <thead>
                                          <tr>
                                              <th width="5%">S.NO</th>
                                              <th width="20%">STREAM</th>
                                              <th width="35%">DEPARTMENT</th>
                                              <th width="15%">TOTAL <br /> INTAKE</th>
                                              <th width="15%">MGMT <br /> INTAKE</th>
                                              <th width="15%">COMED-K <br /> INTAKE</th>
                                              <th width="15%">KEA <br /> INTAKE</th>
                                              <th width="15%">SNQ <br /> INTAKE</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php $i=1;
                                            echo "<tr><th class='bg-gray' colspan='8'>UG COURSES (AIDED)</th></tr>";
                                            foreach ($aided as $aided1) {
                                                echo "<tr>";
                                                echo "<td>".$i++.".</td>";
                                                echo "<td>".$aided1->stream_name."</td>";
                                                echo "<td class='text-left'>".$aided1->department_name.' ['.$aided1->department_short_name.']'."</td>";
                                                echo "<td class='text-center font-weight-bold'>".$aided1->aided_intake."</td>";
                                                echo "<td class='bg-gray-light'>".$aided1->aided_mgmt_intake."</td>";
                                                echo "<td>".$aided1->aided_comed_k_intake."</td>";
                                                echo "<td>".$aided1->aided_kea_intake."</td>";
                                                echo "<td>".$aided1->aided_snq_intake."</td>";
                                                echo "</tr>";
                                            } 
                                            $i=1;
                                            echo "<tr><th class='bg-gray' colspan='8'>UG COURSES (UNAIDED)</th></tr>";
                                            foreach ($unaided as $unaided1) {
                                                echo "<tr>";
                                                echo "<td>".$i++.".</td>";
                                                echo "<td>".$unaided1->stream_name."</td>";
                                                echo "<td class='text-left'>".$unaided1->department_name.' ['.$unaided1->department_short_name.']'."</td>";
                                                echo "<td class='text-center font-weight-bold'>".$unaided1->unaided_intake."</td>";
                                                echo "<td class='bg-gray-light'>".$unaided1->unaided_mgmt_intake."</td>";
                                                echo "<td>".$unaided1->unaided_comed_k_intake."</td>";
                                                echo "<td>".$unaided1->unaided_kea_intake."</td>";
                                                echo "<td>".$unaided1->unaided_snq_intake."</td>";
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