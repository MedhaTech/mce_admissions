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
                                              <th width="55%">Department and Quota</th>
                                              <th width="20%">Aided</th>
                                              <th width="20%">UnAided</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php $i=1;
                            foreach ($feeDetails as $key=>$val) {
                                echo "<tr>";
                                echo "<td>".$i++.".</td>";
                                echo "<td>".$key."</td>";
                                if (array_key_exists('Aided',$val)){
                                    $aided_total_fee = $val['Aided']['total_demand'] + $val['Aided']['corpus_fund'];
                                    echo "<td>".anchor('admin/editFeeStructure/'.$val['Aided']['id'],number_format($aided_total_fee),0)."</td>";
                                }else{
                                    echo "<td> -- </td>";
                                }
                                if (array_key_exists('UnAided',$val)){
                                    $unaided_total_fee = $val['UnAided']['total_demand'] + $val['UnAided']['corpus_fund'];
                                    echo "<td>".anchor('admin/editFeeStructure/'.$val['UnAided']['id'],number_format($unaided_total_fee),0)."</td>";
                                }else{
                                    echo "<td> -- </td>";
                                }
                                echo "</tr>";
                                
                                ?>
                                          <!-- <tr>
                            <td>1</td>
                            <td><?php echo $fee->quota; ?></td>
                            <td><a href="<?php echo base_url('admin/viewfeesturcture/'); ?>"><?php echo ($fee->total_demand + $fee->corpus_fund); ?></a></td>
                            <td><a href="<?php echo base_url('admin/viewfeesturcture/'); ?>"><?php echo ($fee->total_demand + $fee->corpus_fund); ?></a></td>
                        </tr> -->
                                          <?php } ?>
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